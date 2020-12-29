<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PenerbitModels;

class Penerbit extends BaseController
{
    protected $penerbitModel;
    public function __construct()
    {
        $this->penerbitModel = new PenerbitModels();
    }

    public function index()
    {
        $data['penerbit'] = $this->penerbitModel->findAll();
        return view('admin/penerbit/index', $data);
    }


    public function create()
    {
        $data['validation'] = \Config\Services::validation();
        return view('admin/penerbit/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'nama_penerbit' => 'required|is_unique[penerbit.nama_penerbit]',
            'alamat_penerbit' => 'required',
            'email' => 'required',
            'telp_penerbit' => 'required',
        ])) {
            return redirect()->to('/admin/penerbit/create')->withInput();
        }
        $this->penerbitModel->save([
            'nama_penerbit' => $this->request->getVar('nama_penerbit'),
            //'slug' => url_title($this->request->getVar('nama_kategori'), '-', true),
            'alamat_penerbit' => $this->request->getVar('alamat_penerbit'),
            'email' => $this->request->getVar('email'),
            'telp_penerbit' => $this->request->getVar('telp_penerbit'),
        ]);

        session()->setFlashdata('pesan', 'Data penerbit berhasil ditambahkan');
        return redirect()->to('/admin/penerbit');
    }

    public function edit($id_penerbit)
    {
        $data['validation'] = \Config\Services::validation();
        $data['penerbit'] = $this->penerbitModel->where(['id_penerbit' => $id_penerbit])->first();
        return view('admin/penerbit/edit', $data);
    }

    public function update($id)
    {
        $penerbitLama = $this->penerbitModel->where(['id_penerbit' => $id])->first();
        if ($penerbitLama['nama_penerbit'] == $this->request->getVar('nama_penerbit')) {
            $rule_nama_penerbit = 'required';
        } else {
            $rule_nama_penerbit = 'required|is_unique[penerbit.nama_penerbit]';
        }
        if (!$this->validate([
            'nama_penerbit' => $rule_nama_penerbit,
            'alamat_penerbit' => 'required',
            'email' => 'required',
            'telp_penerbit' => 'required',
        ])) {
            return redirect()->to('/admin/penerbit/edit/' . $penerbitLama['slug'])->withInput();
        }
        $this->penerbitModel->save([
            'id_penerbit' => $id,
            'nama_penerbit' => $this->request->getVar('nama_penerbit'),
            //'slug' => url_title($this->request->getVar('nama_kategori'), '-', true),
            'alamat_penerbit' => $this->request->getVar('alamat_penerbit'),
            'email' => $this->request->getVar('email'),
            'telp_penerbit' => $this->request->getVar('telp_penerbit'),
            'penerbit' => $this->request->getVar('penerbit'),
        ]);

        session()->setFlashdata('pesan', 'Data penerbit berhasil diupdate');
        return redirect()->to('/admin/penerbit');
    }

    public function delete($id)
    {
        $this->penerbitModel->delete($id);
        session()->setFlashdata('pesan', 'Data penerbit berhasil dihapus');
        return redirect()->to('/admin/penerbit');
    }
}
