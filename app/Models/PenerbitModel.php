<?php

namespace App\Models;

use CodeIgniter\Model;

class PenerbitModel extends Model
{
    public function Alldata()
   {
     return $this->db->table('tb_penerbit')
     ->orderBy('id', 'DESC')
     ->get()->getResultArray();
   }

   public function Add($data)
   {
        $this->db->table('tb_penerbit')->insert($data);
   }

   public function DeleteData($data)
   {
        $this->db->table('tb_penerbit')
        ->where('id', $data['id'])
        ->delete($data);
   }

   public function EditData($data)
   {
        $this->db->table('tb_penerbit')
        ->where('id', $data['id'])
        ->update($data);
   }
   protected $table = 'tb_penerbit';
   public function HitungData()
   {
     return $this->countAll();
   }
}
