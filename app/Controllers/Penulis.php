<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PenulisModel;
use App\Models\ProfilAdmin; 


class Penulis extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->PenulisModel = new PenulisModel;
        $this->ProfilAdmin = new ProfilAdmin;
    }

    public function index()
    {
        $id_admin = session()->get('id');
        $data = [
            'title' => 'CRUD Penulis',
            'penulis' => $this->PenulisModel->Alldata(),
            'admin' => $this->ProfilAdmin->Profil($id_admin),
        ];
        return view('pages/crud_penulis', $data);
    }

    public function Add()
    {
        $data = [
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'website' => $this->request->getPost('website'),
            
        ];
        $this->PenulisModel->Add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
        return redirect()->to(base_url('Penulis'));
    }

    public function EditData($id)
    {
        $data = [
            'id' => $id,
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'website' => $this->request->getPost('website'),
        ];
        $this->PenulisModel->EditData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update!');
        return redirect()->to(base_url('Penulis'));
    }

    public function DeleteData($id)
    {
        $data = [
            'id' => $id
        ];
        $this->PenulisModel->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus!');
        return redirect()->to(base_url('Penulis'));
    }
    }