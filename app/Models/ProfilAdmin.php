<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilAdmin extends Model
{
    public function Profil($id_admin)
    {
        return $this->db->table('tb_user')
        ->where('id', $id_admin)
        ->get()->getRowArray();
    }
}
