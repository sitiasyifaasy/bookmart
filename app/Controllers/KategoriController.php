<?php

namespace App\Controllers;

use App\Models\BukuModels;
use App\Models\KategoriModels;

class KategoriController extends BaseController
{
	protected $kategoriModel;
	protected $bukuModel;

	public function __construct()
	{
		$this->kategoriModel = new KategoriModels();
        $this->bukuModel = new BukuModels();

	}
	public function index($slug)
	{
		$data['kategori'] = $this->kategoriModel->findAll();
        $data['kategori_terpilih'] = $this->kategoriModel->where('slug', $slug)->first();
        $data['buku'] = $this->bukuModel->where('id_kategori', $data['kategori_terpilih']['id_kategori'])->findAll();
        $data['cart'] = $this->cart;
        return view('pages/bukuperkategori', $data);
		return view('homepage', $data);
	}

	//--------------------------------------------------------------------

}
