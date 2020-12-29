<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PenulisModels;

class Penulis extends BaseController
{
    protected $penulisModel;
    public function __construct()
    {
        $this->penulisModel = new PenulisModels();
    }

    public function index()
    {
        $data['penulis'] = $this->penulisModel->findAll();
        return view('admin/penulis/index', $data);
    }


    public function create()
    {
        $data['validation'] = \Config\Services::validation();
        return view('admin/penulis/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'nama_penulis' => 'required|is_unique[penulis.nama_penulis]',
            'email' => 'required',
        ])) {
            return redirect()->to('/admin/penulis/create')->withInput();
        }
        $this->penulisModel->save([
            'nama_penulis' => $this->request->getVar('nama_penulis'),
            //'slug' => url_title($this->request->getVar('nama_kategori'), '-', true),
            'email' => $this->request->getVar('email'),
        ]);

        session()->setFlashdata('pesan', 'Data penulis berhasil ditambahkan');
        return redirect()->to('/admin/penulis');
    }

    public function edit($id_penulis)
    {
        $data['validation'] = \Config\Services::validation();
        $data['penulis'] = $this->penulisModel->where(['id_penulis' => $id_penulis])->first();
        return view('admin/penulis/edit', $data);
    }

    public function update($id)
    {
        $penulisLama = $this->penulisModel->where(['id_penulis' => $id])->first();
        if ($penulisLama['nama_penulis'] == $this->request->getVar('nama_penulis')) {
            $rule_nama_penulis = 'required';
        } else {
            $rule_nama_penulis = 'required|is_unique[penulis.nama_penulis]';
        }
        if (!$this->validate([
            'nama_penulis' => $rule_nama_penulis,
            'email' => 'required',
        ])) {
            return redirect()->to('/admin/penulis/edit/' . $penulisLama['slug'])->withInput();
        }
        $this->penulisModel->save([
            'id_penulis' => $id,
            'nama_penulis' => $this->request->getVar('nama_penulis'),
            //'slug' => url_title($this->request->getVar('nama_kategori'), '-', true),
            'penulis' => $this->request->getVar('penulis'),
        ]);

        session()->setFlashdata('pesan', 'Data penulis berhasil diupdate');
        return redirect()->to('/admin/penulis');
    }

    public function delete($id)
    {
        $this->penulisModel->delete($id);
        session()->setFlashdata('pesan', 'Data penulis berhasil dihapus');
        return redirect()->to('/admin/penulis');
    }
}
