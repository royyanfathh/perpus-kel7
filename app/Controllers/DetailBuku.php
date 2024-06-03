<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\bukuModel;

class DetailBuku extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->bukuModel = new bukuModel;
    }
    public function index($id)
    {
        $data = [
            'title' => 'Detail Buku',
            'buku' => $this->bukuModel->getBuku($id),
        ];
        return view('pages/detail_buku', $data);
    }   
}
