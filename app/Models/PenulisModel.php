<?php

namespace App\Models;

use CodeIgniter\Model;

class PenulisModel extends Model
{
    public function Alldata()
   {
     return $this->db->table('tb_penulis')
     ->orderBy('id', 'DESC')
     ->get()->getResultArray();
   }

   public function Add($data)
   {
        $this->db->table('tb_penulis')->insert($data);
   }

   public function DeleteData($data)
   {
        $this->db->table('tb_penulis')
        ->where('id', $data['id'])
        ->delete($data);
   }

   public function EditData($data)
   {
        $this->db->table('tb_penulis')
        ->where('id', $data['id'])
        ->update($data);
   }
   protected $table = 'tb_penulis';
   public function HitungData()
   {
     return $this->countAll();
   }
}
