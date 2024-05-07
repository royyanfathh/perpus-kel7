<?php

namespace App\Models;
use CodeIgniter\Model;

class loginuser extends Model
{
    public function get_data($email, $password)
    {
      return $this->db->table('tb_user')
      ->where(array('email' => $email, 'password' => $password))
      ->get()->getRowArray();       
    }
}
