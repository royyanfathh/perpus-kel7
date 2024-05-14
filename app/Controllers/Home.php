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
}
