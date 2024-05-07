<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data['title'] = "Dasboard";
        $data['activeMenu'] = "Dashboard";

        return view('pages/dashboard_view', $data);
    }
}
