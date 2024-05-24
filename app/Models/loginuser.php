<?php

namespace App\Models;
use CodeIgniter\Model;

class loginuser extends Model
{
    public function loginUser($email, $password)
    {
      return $this->db->table('tb_user')
      ->where([
        'email' => $email,
        'password' => $password,
      ])->get()->getRowArray();
    }
}
