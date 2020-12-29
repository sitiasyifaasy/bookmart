<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModels;

class User extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModels();
    }

    public function index()
    {
        $data['user'] = $this->userModel->findAll();
        return view('admin/user/index', $data);
    }

    public function delete($id)
    {
        $this->userModel->delete($id);
        session()->setFlashdata('pesan', 'Data user berhasil dihapus');
        return redirect()->to('/admin/user');
    }
}
