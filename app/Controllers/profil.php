<?php

namespace App\Controllers;
use App\Models\ProfilAdmin;

class profil extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ProfilAdmin = new ProfilAdmin;
    }
    public function index()
    {
        $id_admin = session()->get('id');
        $data = [
            'title' => 'Dashboard',
            'admin' => $this->ProfilAdmin->Profil($id_admin),
        ];
        return view('layout/header', $data);
    }
}
