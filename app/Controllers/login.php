<?php

namespace App\Controllers;
use App\Models\loginuser;

class login extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Login'
        ];
        return view('pages/page-login', $data);
    }
    public function register(): string
    {
        $data = [
            'title' => 'Register'
        ];
        return view('pages/page-register', $data);
    }

    public function login_action()
    {
        $login = new loginuser();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
        $cek = $login->get_data($email, $password);
        
        if($cek && isset($cek['email']) && isset($cek['password']) && $cek['email'] == $email && $cek['password'] == $password) {
            session()->set('email', $cek['email']);
            session()->set('username', $cek['username']);
            session()->set('id', $cek['id']);
            return redirect()->to(base_url('Home'));
        } else {
            return redirect()->to(base_url('login')); 
        }
        
    }
}
