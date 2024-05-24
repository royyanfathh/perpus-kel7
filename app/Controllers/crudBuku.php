<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function crudBuku()
    {
        $data = [
            'title' => 'CRUD Buku'
        ];
        return view('pages/crud_buku', $data);
    }
}
