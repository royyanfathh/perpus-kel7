<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Index'
        ];
        return view('pages/landing', $data);
    }

    public function buku()
    {
        $data = [
            'title' => 'buku'
        ];
        return view('pages/daftarbuku', $data);
    }
    public function crudBuku()
    {
        $data = [
            'title' => 'CRUD Buku'
        ];
        return view('pages/crud_buku', $data);
    }
}
