<?php

namespace App\Controllers;

use App\Models\BukuModels;
use App\Models\KategoriModels;

class CartController extends BaseController
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
    public function index()
    {
        if (!session('is_login')) {
            session()->setFlashdata('pesanerror', 'Anda harus login dulu untuk menambahkan ke keranjang');
            return redirect('/');
        }
        $data['cart'] = $this->cart;
        // dd($data['cart']->contents());
        return view('pages/cart_view', $data);
    }
    public function remove($rowId)
    {
        $this->cart->remove($rowId);
        session()->setFlashdata('pesan', 'Berhasil menghapus buku dari keranjang');
        return redirect()->back();
    }

    public function update($rowId)
    {
        $this->cart->update([
            'rowid' => $rowId,
            'qty'   => $this->request->getVar('qty') + 1
        ]);
        return redirect()->back();
    }
}