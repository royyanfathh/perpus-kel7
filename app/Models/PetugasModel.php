<?php

namespace App\Models;

use CodeIgniter\Model;

class PetugasModel extends Model
{
    public function Alldata()
   {
     return $this->db->table('tb_user')
     ->orderBy('id', 'DESC')
     ->get()->getResultArray();
   }

   public function Add($data)
   {
        $this->db->table('tb_user')->insert($data);
   }

   public function DeleteData($data)
   {
        $this->db->table('tb_user')
        ->where('id', $data['id'])
        ->delete($data);
   }

   public function EditData($data)
   {
        $this->db->table('tb_user')
        ->where('id', $data['id'])
        ->update($data);
   }
}
