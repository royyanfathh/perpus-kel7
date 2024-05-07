<?php

namespace App\Controllers;

class chartjs extends BaseController
{
    public function index(): string
    {
        $data['title'] = "Pilihan Buku";
        $data['activeMenu'] = "chartjs";
        
        return view('pages/chartjs_view', $data);
    }
}
