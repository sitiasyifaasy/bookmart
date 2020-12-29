<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BukuModels;
use App\Models\KategoriModels;
use App\Models\PenerbitModels;
use App\Models\PenulisModels;

class Buku extends BaseController
{
    protected $bukuModel;
    protected $penulisModel;
    protected $penerbitModel;
    protected $kategoriModel;
    public function __construct()
    {
        $this->bukuModel = new BukuModels();
        $this->penulisModel = new PenulisModels();
        $this->penerbitModel = new PenerbitModels();
        $this->kategoriModel = new KategoriModels();
    }

    public function index()
    {
        $data['buku'] = $this->bukuModel->getAllBuku();
        return view('admin/buku/index', $data);
    }


    public function create()
    {
        $data['validation'] = \Config\Services::validation();
        $data['penulis'] = $this->penulisModel->findAll();
        $data['penerbit'] = $this->penerbitModel->findAll();
        $data['kategori'] = $this->kategoriModel->findAll();
        return view('admin/buku/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'nama_buku' => 'required|is_unique[buku.nama_buku]',
            'harga' => 'required',
            'stok' => 'required',
            'halaman' => 'required',
            'tgl_terbit' => 'required',
            'format' => 'required',
            'cover' => 'required',
            'id_penulis' => 'required',
            'id_penerbit' => 'required',
            'id_kategori' => 'required',
        ])) {
            return redirect()->to('/admin/buku/create')->withInput();
        }
        $this->bukuModel->save([
            'nama_buku' => $this->request->getVar('nama_buku'),
            //'slug' => url_title($this->request->getVar('nama_kategori'), '-', true),
            'harga' => $this->request->getVar('harga'),
            'stok' => $this->request->getVar('stok'),
            'halaman' => $this->request->getVar('stok'),
            'tgl_terbit' => $this->request->getVar('tgl_terbit'),
            'format' => $this->request->getVar('format'),
            'cover' => $this->request->getVar('cover'),
            'id_penulis' => $this->request->getVar('id_penulis'),
            'id_penerbit' => $this->request->getVar('id_penerbit'),
            'id_kategori' => $this->request->getVar('id_kategori'),
        ]);

        session()->setFlashdata('pesan', 'Data buku berhasil ditambahkan');
        return redirect()->to('/admin/buku');
    }

    public function edit($id_buku)
    {
        $data['validation'] = \Config\Services::validation();
        $data['buku'] = $this->bukuModel->where(['id_buku' => $id_buku])->first();
        $data['penulis'] = $this->penulisModel->findAll();
        $data['penerbit'] = $this->penerbitModel->findAll();
        $data['kategori'] = $this->kategoriModel->findAll();
        return view('admin/buku/edit', $data);
    }

    public function update($id)
    {
        $bukuLama = $this->bukuModel->where(['id_buku' => $id])->first();
        if ($bukuLama['nama_buku'] == $this->request->getVar('nama_buku')) {
            $rule_nama_buku = 'required';
        } else {
            $rule_nama_buku = 'required|is_unique[buku.nama_buku]';
        }
        if (!$this->validate([
            'nama_buku' => $rule_nama_buku,
            'harga' => 'required',
            'stok' => 'required',
            'halaman' => 'required',
            'tgl_terbit' => 'required',
            'format' => 'required',
            'cover' => 'required',
            'id_penulis' => 'required',
            'id_penerbit' => 'required',
            'id_kategori' => 'required',
        ])) {
            return redirect()->to('/admin/buku/edit/' . $bukuLama['slug'])->withInput();
        }
        $this->bukuModel->save([
            'nama_buku' => $this->request->getVar('nama_buku'),
            //'slug' => url_title($this->request->getVar('nama_kategori'), '-', true),
            'harga' => $this->request->getVar('harga'),
            'stok' => $this->request->getVar('stok'),
            'halaman' => $this->request->getVar('stok'),
            'tgl_terbit' => $this->request->getVar('tgl_terbit'),
            'format' => $this->request->getVar('format'),
            'cover' => $this->request->getVar('cover'),
            'id_penulis' => $this->request->getVar('id_penulis'),
            'id_penerbit' => $this->request->getVar('id_penerbit'),
            'id_kategori' => $this->request->getVar('id_kategori'),
        ]);

        session()->setFlashdata('pesan', 'Data buku berhasil diupdate');
        return redirect()->to('/admin/buku');
    }

    public function delete($id)
    {
        $this->bukuModel->delete($id);
        session()->setFlashdata('pesan', 'Data buku berhasil dihapus');
        return redirect()->to('/admin/buku');
    }
}
