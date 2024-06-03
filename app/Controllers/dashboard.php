<?php

namespace App\Controllers;
use App\Models\AnggotaModel;
use App\Models\ProfilAdmin; 
use App\Models\bukuModel;
use App\Models\PenulisModel;
use App\Models\PenerbitModel;
use App\Models\KategoriModel;

class dashboard extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ProfilAdmin = new ProfilAdmin;
        $this->bukuModel = new bukuModel;
        $this->PenulisModel = new PenulisModel;
        $this->PenerbitModel = new PenerbitModel;
        $this->KategoriModel = new KategoriModel;
        $this->AnggotaModel = new AnggotaModel;

    }
    public function index()
    {
        $id_admin = session()->get('id');
        $data = [
            'title' => 'Dashboard',
            'admin' => $this->ProfilAdmin->Profil($id_admin),
            'buku' => $this->bukuModel->HitungData(),
            'penulis'=> $this->PenulisModel->HitungData(),
            'penerbit'=> $this->PenerbitModel->HitungData(),
            'kategori'=> $this->KategoriModel->HitungData(),
            'anggota'=> $this->AnggotaModel->HitungData(),
        ];
        return view('pages/admin_dashboard', $data);
    }
}
