<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AnggotaModel;

class Anggota extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->AnggotaModel = new AnggotaModel;
    }
    public function index()
    {
        $data = [
            'title' => 'CRUD Anggota',
            'anggota' => $this->AnggotaModel->Alldata(),
        ];
        return view('pages/crud_anggota', $data);
    }
    public function Add()
    {
        $role = 'Anggota';
        $data = [
            'nama' => $this->request->getPost('nama'),
            'jk' => $this->request->getPost('jk'),
            'telp' => $this->request->getPost('telp'),
            'alamat' => $this->request->getPost('alamat'),
            'role' => $role,
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
        ];

        $this->AnggotaModel->Add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
        return redirect()->to(base_url('Anggota'));
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
        $this->AnggotaModel->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus!');
        return redirect()->to(base_url('Anggota'));
    }
}
