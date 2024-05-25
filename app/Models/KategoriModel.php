<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
   public function Alldata()
   {
     return $this->db->table('tb_kategori')
     ->orderBy('id', 'DESC')
     ->get()->getResultArray();
   }

   public function Add($data)
   {
        $this->db->table('tb_kategori')->insert($data);
   }

   public function DeleteData($data)
   {
        $this->db->table('tb_kategori')
        ->where('id', $data['id'])
        ->delete($data);
   }

   public function EditData($data)
   {
        $this->db->table('tb_kategori')
        ->where('id', $data['id'])
        ->update($data);
   }
}
