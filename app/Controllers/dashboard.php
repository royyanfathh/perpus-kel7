<?php

namespace App\Controllers;

class dashboard extends BaseController
{

    public function index(): string
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('pages/admin_dashboard', $data);
    }
}
