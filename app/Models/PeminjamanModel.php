<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
   public function Alldata()
   {
     return $this->db->table('tb_peminjaman')
     ->orderBy('id', 'DESC')
     ->get()->getResultArray();
   }

   public function Add($data)
   {
        $this->db->table('tb_peminjaman')->insert($data);
   }

   public function DeleteData($data)
   {
        $this->db->table('tb_peminjaman')
        ->where('id', $data['id'])
        ->delete($data);
   }

   public function EditData($data)
   {
        $this->db->table('tb_peminjaman')
        ->where('id', $data['id'])
        ->update($data);
   }
   protected $table = 'tb_peminjaman';
   public function HitungData()
   {
     return $this->countAll();
   }

}
