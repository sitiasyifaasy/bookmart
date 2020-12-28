<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KategoriModels;

class Kategori extends BaseController
{
    protected $kategoriModel;
    public function __construct()
    {
        $this->kategoriModel = new KategoriModels();
    }

    public function index()
    {
        $data['kategori'] = $this->kategoriModel->findAll();
        return view('admin/kategori/index', $data);
    }

    //--------------------------------------------------------------------

}
