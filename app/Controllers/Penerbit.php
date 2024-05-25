<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenerbitModel;
use CodeIgniter\HTTP\ResponseInterface;

class Penerbit extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->PenerbitModel = new PenerbitModel;
    }

    public function index()
    {
        $data = [
            'title' => 'CRUD Penerbit',
            'penerbit' => $this->PenerbitModel->Alldata(),
        ];
        return view('pages/crud_penerbit', $data);
    }

    public function Add()
    {
        $data = [
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'telp' => $this->request->getPost('telp'),
            
        ];
        $this->PenerbitModel->Add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
        return redirect()->to(base_url('Penerbit'));
    }

    public function EditData($id)
    {
        $data = [
            'id' => $id,
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'telp' => $this->request->getPost('telp'),
        ];
        $this->PenerbitModel->EditData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update!');
        return redirect()->to(base_url('Penerbit'));
    }

    public function DeleteData($id)
    {
        $data = [
            'id' => $id
        ];
        $this->PenerbitModel->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus!');
        return redirect()->to(base_url('Penerbit'));
    }
}
