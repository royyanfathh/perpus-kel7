<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PeminjamanModel;
use App\Models\AnggotaModel;
use App\Models\ProfilAdmin;
use App\Models\DetailModel;
use App\Models\bukuModel;
use App\Models\DetailPeminjamanModel;

class Peminjaman extends BaseController
{
  public function __construct()
  {
    helper('form');
    $this->PeminjamanModel = new PeminjamanModel;
    $this->AnggotaModel = new AnggotaModel;
    $this->ProfilAdmin = new ProfilAdmin;
    $this->DetailModel = new DetailModel;
    $this->bukuModel = new bukuModel;
    $this->DetailPeminjamanModel = new DetailPeminjamanModel();
  }



  public function index()
  {
    $id_admin = session()->get('id');
    $data = [
      'title' => 'CRUD Peminjaman',
      'peminjaman' => $this->PeminjamanModel->Alldata(),
      'anggota' => $this->AnggotaModel->Alldata(),
      'detail' => $this->DetailModel->Alldata(),
      'admin' => $this->ProfilAdmin->Profil($id_admin),
      'buku' => $this->bukuModel->Alldata(),
    ];
    return view('pages/crud_peminjaman', $data);
  }

  public function Add()
  {
    $data = [
      'user_id' => $this->request->getPost('user_id'),
      'jumlah_buku' => $this->request->getPost('jumlah_buku'),
      'tgl_pinjam' => $this->request->getPost('tgl_pinjam'),
      'tgl_kembali' => $this->request->getPost('tgl_kembali'),
      'batas_waktu' => $this->request->getPost('batas_waktu'),
      'status' => $this->request->getPost('status'),
      'denda' => $this->request->getPost('denda'),
    ];
    $this->PeminjamanModel->Add($data);
    session()->setFlashdata('pesan', 'Peminjaman berhasil di daftarkan!');
    return redirect()->to(base_url('Peminjaman'));
  }
  public function EditData($id)
  {
    $data = [
      'id' => $id,
      'user_id' => $this->request->getPost('user_id'),
      'jumlah_buku' => $this->request->getPost('jumlah_buku'),
      'tgl_pinjam' => $this->request->getPost('tgl_pinjam'),
      'tgl_kembali' => $this->request->getPost('tgl_kembali'),
      'batas_waktu' => $this->request->getPost('batas_waktu'),
      'status' => $this->request->getPost('status'),
      'denda' => $this->request->getPost('denda'),
    ];
    $this->PeminjamanModel->EditData($data);
    session()->setFlashdata('pesan', 'Data Berhasil Di Update!');
    return redirect()->to(base_url('Peminjaman'));
  }

  public function DeleteData($id)
  {
    $data = [
      'id' => $id
    ];
    $this->PeminjamanModel->DeleteData($data);
    session()->setFlashdata('pesan', 'Data Berhasil Di Hapus!');
    return redirect()->to(base_url('Peminjaman'));
  }

  public function addDetail()
  {
    $data = [
      'peminjaman_id' => $this->request->getPost('peminjaman_id'),
      'buku_id' => $this->request->getPost('buku_id'),
    ];
    $this->DetailModel->Add($data);
    session()->setFlashdata('pesan', 'Buku Berhasil dipinjam!');
    return redirect()->to(base_url('Peminjaman'));
  }

  public function detail($id)
  {
    $detailPeminjaman = $this->DetailPeminjamanModel->where('peminjaman_id', $id)
      ->join('tb_buku', 'tb_buku.id = tb_detail_peminjaman.buku_id')
      ->findAll();

    $id_admin = session()->get('id');
    $data = [
      'title' => 'CRUD Peminjaman',
      'peminjaman_id' => $id,
      'detail_peminjaman' => $detailPeminjaman,
      'admin' => $this->ProfilAdmin->Profil($id_admin),
      'buku' => $this->bukuModel->Alldata(),
      'peminjam' => $this->PeminjamanModel->find($id),
      'anggota' => $this->AnggotaModel->Alldata(),
      'peminjaman' => $this->PeminjamanModel->Alldata(),

    ];

    return view('pages/crud_detail', $data);
  }
}
