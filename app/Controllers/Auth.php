<?php

namespace App\Controllers;

use App\Models\UserModels;
use Config\Services;

class Auth extends BaseController
{
    protected $userModels;
    public function __construct()
    {
        $this->userModels = new UserModels();
    }

    public function index()
    {
        $data = [
            'validation' => Services::validation()
        ];

        return view('auth_view', $data);
    }

    public function register()
    {
        $rules = [
            'nama_user'          => 'required|min_length[3]|max_length[30]',
            'email_user'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[user.email_user]',
            'telp_user'          => 'required|min_length[3]|max_length[13]',
            'password'           => 'required|min_length[6]|max_length[255]',
            'jns_kelamin'          => 'required',
            'konfirmasi_password'  => 'matches[password]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $this->userModels->save([
            'nama_user'          => $this->request->getVar('nama_user'),
            'email_user'         => $this->request->getVar('email_user'),
            'telp_user'          => $this->request->getVar('telp_user'),
            'password'           => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'jns_kelamin'        => $this->request->getVar('jns_kelamin'),
            'level'              => 'User'

        ]);

        session()->setFlashdata('pesan', 'Registrasi Berhasil ! Silahkan Login!!!');

        return redirect()->back();
    }

    public function login()
    {

        $session = session();
        $email_user = $this->request->getVar('email_user');
        $password = $this->request->getVar('password');
        $rules = [
            'email_user' => 'required|valid_email',
            'password' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $data = $this->userModels->where('email_user', $email_user)->first();

        if ($data) {
            $pass = $data['password'];
            $verified_pass = password_verify($password, $pass);

            if ($verified_pass) {
                $session_data = [
                    'id_user'            => $data['id_user'],
                    'nama_user'          => $data['nama_user'],
                    'email_user'         => $data['email_user'],
                    'telp_user'          => $data['telp_user'],
                    'jns_kelamin'        => $data['jns_kelamin'],
                    'level'              => $data['level'],
                    'is_login'           => true
                ];

                $session->set($session_data);

                return redirect()->to('/');
            } else {
                $session->setFlashdata('pesan_login', 'Invalid Password');

                return redirect()->to('/auth');
            }
        } else {
            $session->setFlashdata('pesan_login', 'Invalid Password');

            return redirect()->to('/auth');
        }
    }

    //--------------------------------------------------------------------

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth');
    }
}
