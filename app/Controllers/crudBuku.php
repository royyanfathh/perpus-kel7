<?php

namespace App\Controllers;

class crudBuku extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'CRUD Buku'
        ];
        return view('pages/crud_buku', $data);
    }
}
