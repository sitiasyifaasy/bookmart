<?php

namespace App\Controllers;

use App\Models\BukuModels;
use App\Models\KategoriModels;

class Home extends BaseController
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
		$data['kategori'] = $this->kategoriModel->findAll();
		$data['recent'] = $this->bukuModel->orderBy('id_buku', 'asc')->limit(6)->findAll();
		$data['cart'] = $this->cart;
		return view('homepage', $data);
	}

	//--------------------------------------------------------------------

}
