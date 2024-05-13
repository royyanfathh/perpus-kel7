<?php

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "tb_user";
    protected $primaryKey = "id";
    protected $returnType = "object";

    
    // protected $useTimestamps = true;
    protected $allowedFields = [
      'nama',
      'jk', 
      'telp', 
      'alamat',
      'role', 
      'email', 
      'username', 
      'password'
    ];
}