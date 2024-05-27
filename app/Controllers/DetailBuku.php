<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\bukuModel;

class DetailBuku extends BaseController
{
    public function index($id)
    {
        $data = [
            'title' => 'Detil Buku',
            //'book' => $this->bukuModel->Detail($id),
        ];

        return view('pages/detail_buku', $data);
    }   
}
