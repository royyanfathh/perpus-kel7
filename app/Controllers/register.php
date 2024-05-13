<?php

namespace App\Controllers;
use App\Models\UserModel;

class register extends BaseController
{
  public function index()
  {
      $data = [
          'title' => 'Register'
      ];
      return view('pages/page-register', $data);
  }
  public function process()
  {
      if(!$this->validate([
          'nama'=> [
              'rules' => 'required|min_length[4]|max_length[50]',
              'errors' => [
                  'required' => '{field} Harus diisi',
                  'min_length' => '{field} Minimal 4 karakter',
                  'max_length' => '{field} Maksimal 50 karakter',
              ]
          ],
          'jk' =>  [
              'rules' => 'required',
              'errors' => [
                  'required' => '{field} Harus diisi'
              ]
          ],
          'telp' => [
              'rules' => 'required|min_length[11]|max_length[15]|is_unique[tb_user.telp]',
              'errors' => [
                  'required' => '{field} Harus diisi',
                  'min_length' => '{field} Minimal 11 karakter',
                  'max_length' => '{field} Maksimal 15 karakter',
                  'is_unique' => 'Nomor telpon sudah digunakan sebelumnya'
              ]
          ],
          'alamat' => [
              'rules' => 'required|min_length[5]|max_length[100]',
              'errors' => [
                  'required' => '{field} Harus diisi',
                  'min_length' => '{field} Minimal 5 karakter',
                  'max_length' => '{field} Maksimal 100 karakter'
              ]
          ],
          'email' => [
              'rules' => 'required',
              'errors' => [
                  'required' => '{field} Harus diisi'
              ]
          ],
          'username' => [
              'rules' => 'required|min_length[5]|max_length[50]',
              'errors' => [
                  'required' => '{field} Harus diisi',
                  'min_length' => '{field} Minimal 5 karakter',
                  'max_length' => '{field} Maksimal 50 karakter'
              ]
          ],
          'password' => [
              'rules' => 'required|min_length[5]|max_length[50]',
              'errors' => [
                  'required' => '{field} Harus diisi',
                  'min_length' => '{field} Minimal 5 karakter',
                  'max_length' => '{field} Maksimal 50 karakter'
              ]
          ]
      ])){
          session()->setFlashdata('error', $this->validator->listErrors());
          return redirect()->back()->withInput();
      }
      $role = 'Anggota';
      $users = new UserModel();
      $users->insert([
          'nama' => $this->request->getVar('nama'),
          'jk' => $this->request->getVar('jk'),
          'telp' => $this->request->getVar('telp'),
          'alamat' => $this->request->getVar('alamat'),
          'email' => $this->request->getVar('email'),
          'username' => $this->request->getVar('username'),
          'password' => $this->request->getVar('password'),
          'role' => $role
      ]);
      return redirect()->to('login'); 
  }
}
