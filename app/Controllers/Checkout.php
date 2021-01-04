<?php

namespace App\Controllers;

use App\Models\BukuModels;
use App\Models\KategoriModels;
use App\Models\OrderdetailsModels;
use App\Models\OrderModels;

class Checkout extends BaseController
{
    protected $kategoriModel;
    protected $bukuModel;
    protected $orderModel;
    protected $orderDetailModel;
    protected $cart;
    public function __construct()
    {
        $this->kategoriModel = new KategoriModels();
        $this->bukuModel = new BukuModels();
        $this->orderModel = new OrderModels();
        $this->orderDetailModel = new OrderdetailsModels();
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
            $this->orderDetailModel->insert($row);
        }
        // Clear the shopping cart
        $this->cart->destroy();
        session()->setFlashdata('pesan', 'Berhasil memesan buku!');
        return redirect('/');
    }
    //--------------------------------------------------------------------
    public function view()
    {
        $data['order'] = $this->orderModel->where('id_user', session('id_user'))->findAll();
        return view('pages/order_view', $data);
    }
}