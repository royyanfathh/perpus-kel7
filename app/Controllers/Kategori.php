<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->KategoriModel = new KategoriModel;
    }

    public function index()
    {
        $data = [
            'title' => 'CRUD Kategori',
            'kategori' => $this->KategoriModel->Alldata(),
        ];
        return view('pages/crud_kategori', $data);
    }

    public function Add()
    {
        $data = ['nama' => $this->request->getPost('nama')];
        $this->KategoriModel->Add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
        return redirect()->to(base_url('Kategori'));
    }
    public function EditData($id)
    {
        $data = [
            'id' => $id,
            'nama' => $this->request->getPost('nama')
        ];
        $this->KategoriModel->EditData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update!');
        return redirect()->to(base_url('Kategori'));
    }

    public function DeleteData($id)
    {
        $data = [
            'id' => $id
        ];
        $this->KategoriModel->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus!');
        return redirect()->to(base_url('Kategori'));
    }
}
