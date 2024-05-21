<?php

namespace App\Controllers;
use App\Models\loginuser;

class login extends BaseController
{
    public function __construct()
    {
       helper('form');
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
       
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to(base_url('login'));
    }
}
