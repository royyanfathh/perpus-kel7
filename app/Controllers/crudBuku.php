<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\bukuModel;
use CodeIgniter\HTTP\ResponseInterface;

class crudBuku extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->bukuModel = new bukuModel;
    }
    public function index()
    {
        $data = [
            'title' => 'CRUD Buku',
            'buku' => $this->bukuModel->Alldata(),
        ];
        return view('pages/crud_buku', $data);
    }
    public function Add()
    {
        $data = [
            'foto_buku' => $this->request->getPost('foto_buku'),
            'judul' => $this->request->getPost('judul'),
            'penulis_id' => $this->request->getPost('penulis_id'),
            'penerbit_id' => $this->request->getPost('penerbit_id'),
            'tahun' => $this->request->getPost('tahun'),
            'jumlah' => $this->request->getPost('jumlah'),
            'kategori_id' => $this->request->getPost('kategori_id'),
            'lokasi' => $this->request->getPost('lokasi'),
            
        ];
        $this->bukuModel->Add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
        return redirect()->to(base_url('crudBuku'));
    }

    public function EditData($id)
    {
        $data = [
            'id' => $id,
            'foto_buku' => $this->request->getPost('foto_buku'),
            'judul' => $this->request->getPost('judul'),
            'penulis_id' => $this->request->getPost('penulis_id'),
            'penerbit_id' => $this->request->getPost('penerbit_id'),
            'tahun' => $this->request->getPost('tahun'),
            'jumlah' => $this->request->getPost('jumlah'),
            'kategori_id' => $this->request->getPost('kategori_id'),
            'lokasi' => $this->request->getPost('lokasi'),
            
        ];
        $this->bukuModel->EditData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update!');
        return redirect()->to(base_url('crudBuku'));
    }

    public function DeleteData($id)
    {
        $data = [
            'id' => $id
        ];
        $this->bukuModel->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus!');
        return redirect()->to(base_url('crudBuku'));
    }
}
