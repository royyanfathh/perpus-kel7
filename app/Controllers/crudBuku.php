<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\bukuModel;
use App\Models\PenerbitModel;
use App\Models\PenulisModel;
use App\Models\KategoriModel;
use CodeIgniter\HTTP\ResponseInterface;

class crudBuku extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->bukuModel = new bukuModel;
        $this->PenerbitModel = new PenerbitModel;
        $this->PenulisModel = new PenulisModel;
        $this->KategoriModel = new KategoriModel;
    }
    public function index()
    {
        $data = [
            'title' => 'CRUD Buku',
            'buku' => $this->bukuModel->Alldata(),
            'penerbit' => $this->PenerbitModel->Alldata(),
            'penulis' => $this->PenulisModel->Alldata(),
            'kategori' => $this->KategoriModel->Alldata(),
        ];
        return view('pages/crud_buku', $data);
    }
    public function Add()
    {
            $foto = $this->request->getFile('foto_buku');

            if ($foto && $foto->isValid()) {
                $nama_file = $foto->getRandomName();

                $data = [
                    'foto_buku' => $nama_file,
                    'judul' => $this->request->getPost('judul'),
                    'penulis_id' => $this->request->getPost('penulis_id'),
                    'penerbit_id' => $this->request->getPost('penerbit_id'),
                    'tahun' => $this->request->getPost('tahun'),
                    'jumlah' => $this->request->getPost('jumlah'),
                    'kategori_id' => $this->request->getPost('kategori_id'),
                    'lokasi' => $this->request->getPost('lokasi'),

                ];
                $foto->move('images', $nama_file);
                $this->bukuModel->Add($data);
                session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
                return redirect()->to(base_url('crudBuku'));
        }
    }

    public function EditData($id)
    {
        $foto = $this->request->getFile('foto_buku');

        if ($foto && $foto->isValid()) {
            $nama_file = $foto->getRandomName();

        $data = [
            'id' => $id,
            'foto_buku' => $nama_file,
            'judul' => $this->request->getPost('judul'),
            'penulis_id' => $this->request->getPost('penulis_id'),
            'penerbit_id' => $this->request->getPost('penerbit_id'),
            'tahun' => $this->request->getPost('tahun'),
            'jumlah' => $this->request->getPost('jumlah'),
            'kategori_id' => $this->request->getPost('kategori_id'),
            'lokasi' => $this->request->getPost('lokasi'),

        ];
        $foto->move('images', $nama_file);
        $this->bukuModel->EditData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update!');
        return redirect()->to(base_url('crudBuku'));
    }
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
