<?php

namespace App\Controllers;

use App\Models\BukuModels;
use App\Models\KategoriModels;
use App\Models\KonfirmasiModels;
use App\Models\OrderdetailsModels;
use App\Models\OrderModels;

class Checkout extends BaseController
{
    protected $kategoriModel;
    protected $bukuModel;
    protected $orderModel;
    protected $orderDetailModel;
    protected $konfirmasiModel;
    protected $cart;
    private $url = "https://api.rajaongkir.com/starter/";
    private $apiKey = "49091cfadddbed78ae8eaaf6a7535c33";
    public function __construct()
    {
        $this->kategoriModel = new KategoriModels();
        $this->bukuModel = new BukuModels();
        $this->orderModel = new OrderModels();
        $this->orderDetailModel = new OrderdetailsModels();
        $this->konfirmasiModel = new KonfirmasiModels();
        $this->cart = \Config\Services::cart();
    }
    public function index()
    {
        $data['kategori'] = $this->kategoriModel->findAll();
        $data['recent'] = $this->bukuModel->orderBy('id_buku', 'asc')->limit(6)->findAll();
        $data['cart'] = $this->cart;
        return view('pages/checkout_view', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'metode_pengiriman' => 'required',
        ])) {
            return redirect()->back()->withInput();
        }
        $orders = $this->orderModel->countAllResults() + 1;
        $this->orderModel->save([
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'total' => $this->request->getVar('total'),
            'status_order' => "Menunggu",
            'metode_pengiriman' => $this->request->getVar('metode_pengiriman'),
            'tgl_order' => date("Y-m-d"),
            'invoice' => 'INV/' . $orders,
            'id_user' => session('id_user')
        ]);
        $order_id = $this->orderModel->getInsertID();
        foreach ($this->cart->contents() as $row) {
            $row['id_order'] = $order_id;
            $row['id_buku'] = $row['id'];
            $buku = $this->bukuModel->where('id_buku', $row['id'])->first();
            $buku['stok'] = $buku['stok'] - $row['qty'];
            $this->bukuModel->save([
                'id_buku' => $buku['id_buku'],
                'stok' => $buku['stok']
            ]);
            $this->orderDetailModel->insert($row);
        }
        // Clear the shopping cart
        $this->cart->destroy();
        session()->setFlashdata('pesan', 'Berhasil memesan buku! Silahkan konfirmasi pembayaran');
        return redirect()->to('/checkout/detail/' . $order_id);
    }
    //--------------------------------------------------------------------
    public function view()
    {
        $data['order'] = $this->orderModel->where('id_user', session('id_user'))->findAll();
        $data['cart'] = $this->cart;
        return view('pages/order_view', $data);
    }

    public function detail($id)
    {
        $data['order'] = $this->orderModel->where('id_order', $id)->first();
        $data['order_detail'] = $this->orderDetailModel->getAllOrderDetail($id);
        $data['order_confirm'] = $this->konfirmasiModel->where('id_order', $id)->first();
        $data['cart'] = $this->cart;
        return view('pages/checkout_detail', $data);
    }

    public function konfirmasi($id)
    {
        $data['order'] = $this->orderModel->where('id_order', $id)->first();
        $data['validation'] = \Config\Services::validation();
        return view('pages/konfirmasi_pembayaran', $data);
    }

    public function statuspembayaran()
    {
        if (!$this->validate([
            'atas_nama' => 'required',
            'no_rekening' => 'required',
            'nominal' => 'required',
            'keterangan' => 'required',
            'nominal' => 'required',
            // 'bukti_pembayaran' => 'max_size[bukti_pembayaran,2048]|is_image[bukti_pembayaran]',
        ])) {
            return redirect()->back()->withInput();
        }
        $fotobukti = $this->request->getFile('bukti_pembayaran');
        $namabukti = $fotobukti->getName();
        $fotobukti->move(ROOTPATH . 'public/konfirmasi', $namabukti);
        $this->konfirmasiModel->save([
            'atas_nama' => $this->request->getVar('atas_nama'),
            'nominal' => $this->request->getVar('nominal'),
            'keterangan' =>  $this->request->getVar('keterangan'),
            'bukti_pembayaran' => $namabukti,
            'id_order' => $this->request->getVar('id_order'),
        ]);
        $this->orderModel->save([
            'id_order' => $this->request->getVar('id_order'),
            'status_order' => "Diproses"
        ]);
        session()->setFlashdata('pesan', 'Berhasil konfirmasi pemesanan!');
        return redirect()->to('/checkout/detail/' . $this->request->getVar('id_order'));
    }
    public function statuscancel($id)
    {
        $this->orderModel->save([
            'id_order' => $id,
            'status_order' => "Cancel"
        ]);
        return redirect()->to('/checkout/view');
    }

    private function rajaongkir($method, $id_province = null)
    {

        $endPoint = $this->url . $method;

        if ($id_province != null) {
            $endPoint = $endPoint . "?province=" . $id_province;
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $endPoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: " . $this->apiKey
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        return $response;
    }

    private function rajaongkircost($origin, $destination, $weight, $courier)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=" . $origin . "&destination=" . $destination . "&weight=" . $weight . "&courier=" . $courier,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: " . $this->apiKey,
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        return $response;
    }

    public function get_kota()
    {
        if ($this->request->isAJAX()) {
            $data = $this->rajaongkir('city');
            return $this->response->setJSON($data);
        }
    }
    public function get_cost()
    {
        if ($this->request->isAJAX()) {
            $origin = $this->request->getGet('origin');
            $destination = $this->request->getGet('destination');
            $weight = $this->request->getGet('weight');
            $courier = $this->request->getGet('courier');
            $data = $this->rajaongkircost($origin, $destination, $weight, $courier);
            return $this->response->setJSON($data);
        }
    }
}
