<?php

namespace App\Controllers;
use App\Models\bukuModel;
use App\Models\PenulisModel;
use App\Models\PenerbitModel;

class Home extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->bukuModel = new bukuModel;
        $this->PenulisModel = new PenulisModel;
        $this->PenerbitModel = new PenerbitModel;
    }
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
            'buku' => $this->bukuModel->Alldata(),
            'penulis' => $this->PenulisModel->Alldata(),
            'penerbit' => $this->PenerbitModel->Alldata(),
            'title' => 'buku'
        ];
        return view('pages/daftarbuku', $data);
    }
}
