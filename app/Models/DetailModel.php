<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailModel extends Model
{
   public function Alldata()
   {
     return $this->db->table('tb_detail_peminjaman')
     ->orderBy('id', 'DESC')
     ->get()->getResultArray();
   }

   public function Add($data)
   {
        $this->db->table('tb_detail_peminjaman')->insert($data);
   }

   public function DeleteData($data)
   {
        $this->db->table('tb_detail_peminjaman')
        ->where('id', $data['id'])
        ->delete($data);
   }

   public function EditData($data)
   {
        $this->db->table('tb_detail_peminjaman')
        ->where('id', $data['id'])
        ->update($data);
   }
}
