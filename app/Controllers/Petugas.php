<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PetugasModel;
use App\Models\ProfilAdmin; 


class Petugas extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->PetugasModel = new PetugasModel;
        $this->ProfilAdmin = new ProfilAdmin;

    }
    public function index()
    {
        $id_admin = session()->get('id');
        $data = [
            'title' => 'CRUD Petugas',
            'petugas' => $this->PetugasModel->Alldata(),
            'admin' => $this->ProfilAdmin->Profil($id_admin),

        ];
        return view('pages/crud_petugas', $data);
    }
    public function Add()
    {
        $role = 'Petugas';
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
        $this->PetugasModel->Add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
        return redirect()->to(base_url('Petugas'));
    }
    public function EditData($id)
    {
        $data = [
            'id' => $id,
            'nama' => $this->request->getPost('nama')
        ];
        $this->PetugasModel->EditData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update!');
        return redirect()->to(base_url('Petugas'));
    }

    public function DeleteData($id)
    {
        $data = [
            'id' => $id
        ];
        $this->PetugasModel->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus!');
        return redirect()->to(base_url('Petugas'));
    }
}
