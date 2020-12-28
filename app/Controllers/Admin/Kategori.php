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

    public function create()
    {
        return view('admin/kategori/create');
    }

    public function store()
    {
        if (!$this->validate([
            'nama_kategori' => 'required|is_unique[kategori.nama_kategori]',
            'deskripsi' => 'required',
        ])) {
            return redirect()->to('/admin/kategori/create')->withInput();
        }
        $this->kategoriModel->save([
            'nama_kategori' => $this->request->getVar('nama_kategori'),
            'slug' => url_title($this->request->getVar('nama_kategori'), '-', true),
            'deskripsi' => $this->request->getVar('deskripsi'),
        ]);

        session()->setFlashdata('pesan', 'Data kategori berhasil ditambahkan');
        return redirect()->to('/admin/kategori');
    }

    public function edit($slug)
    {
        $data['kategori'] = $this->kategoriModel->where(['slug' => $slug])->first();
        return view('admin/kategori/edit', $data);
    }

    public function update($id)
    {
        $kategoriLama = $this->kategoriModel->where(['id_kategori' => $id])->first();
        if ($kategoriLama['nama_kategori'] == $this->request->getVar('nama_kategori')) {
            $rule_nama_kategori = 'required';
        } else {
            $rule_nama_kategori = 'required|is_unique[kategori.nama_kategori]';
        }
        if (!$this->validate([
            'nama_kategori' => $rule_nama_kategori,
            'deskripsi' => 'required',
        ])) {
            return redirect()->to('/admin/kategori/edit/' . $kategoriLama['slug'])->withInput();
        }
        $this->kategoriModel->save([
            'id_kategori' => $id,
            'nama_kategori' => $this->request->getVar('nama_kategori'),
            'slug' => url_title($this->request->getVar('nama_kategori'), '-', true),
            'deskripsi' => $this->request->getVar('deskripsi'),
        ]);

        session()->setFlashdata('pesan', 'Data kategori berhasil diupdate');
        return redirect()->to('/admin/kategori');
    }

    public function delete($id)
    {
        $this->kategoriModel->find($id)->delete();
        session()->setFlashdata('pesan', 'Data kategori berhasil dihapus');
        return redirect()->to('/admin/kategori');
    }
}
