<?php

namespace App\Controllers;

use App\Models\loginuser;

class login extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->loginuser = new loginuser;
    }

    public function index()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('pages/page-login', $data);
    }

    public function cekLogin()
    {
        if (
            $this->validate([
                'email' => [
                    'label' => 'email',
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => '{field} Masih kosong!',
                        'valid_email' => '{field} Harus format email !'
                    ]
                ],
                'password' => [
                    'label' => 'password',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Masih kosong!',
                    ]
                ],

            ])
        ) {
            //jika entry valid
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $cek_login = $this->loginuser->loginUser($email, $password);
            if ($cek_login) {
                //jika login berhasil
                session()->set('nama', $cek_login['nama']);
                session()->set('email', $cek_login['email']);
                session()->set('role', $cek_login['role']);
            if($cek_login['role'] == 'Petugas') {
                return redirect()->to(base_url('dashboard'));
            }else {
                return redirect()->to(base_url('/daftarbuku'));
            }
            } else {
                //jika login gagal
                session()->setFlashdata('pesan', 'email atau password salah !');
                return redirect()->to(base_url('login'));
            }
        } else {
            //jika entry tidak valid 
            session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
            return redirect()->to(base_url('login'));
        }
    }

    public function logout()
    {
       session()->remove('nama');
       session()->remove('email');
       session()->remove('role');
       session()->setFlashdata('pesan', 'Logout sukses!');
       return redirect()->to(base_url('login'));
    }
}
