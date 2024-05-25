<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PenulisModel;

class Penulis extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->PenulisModel = new PenulisModel;
    }

    public function index()
    {
        $data = [
            'title' => 'CRUD Penulis',
            'penulis' => $this->PenulisModel->Alldata(),
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