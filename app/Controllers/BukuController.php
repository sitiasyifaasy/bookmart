<?php

namespace App\Controllers;

use App\Models\BukuModels;
use App\Models\KategoriModels;

class BukuController extends BaseController
{
    protected $kategoriModel;
    protected $bukuModel;
    protected $cart;
    public function __construct()
    {
        $this->kategoriModel = new KategoriModels();
        $this->bukuModel = new BukuModels();
        $this->cart = \Config\Services::cart();
    }
    public function index($slug)
    {
        $data['kategori'] = $this->kategoriModel->findAll();
        $data['buku_terpilih'] = $this->bukuModel->where('slug', $slug)->first();
        $data['related'] =  $this->bukuModel->where('id_kategori', $data['buku_terpilih']['id_kategori'])->limit(5)->findAll();
        $data['cart'] = $this->cart;
        return view('pages/buku_detail', $data);
    }
    public function keranjang($id)
    {
        if (!session('is_login')) {
            session()->setFlashdata('pesanerror', 'Anda harus login dulu untuk menambahkan ke keranjang');
            return redirect()->back();
        }
        $buku = $this->bukuModel->where('id_buku', $id)->first();
        $this->cart->insert([
            'id'      => $id,
            'qty'     => 1,
            'price'   => $buku['harga'],
            'name'    => $buku['nama_buku'],
            'options' => [
                'cover' => $buku['cover']
            ]
        ]);
        session()->setFlashdata('pesan', 'Berhasil menambahkan buku ' . $buku['nama_buku'] . ' ke keranjang');
        return redirect()->back();
    }
    //--------------------------------------------------------------------

}