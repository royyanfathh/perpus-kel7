<?php

namespace App\Models;

use CodeIgniter\Model;

class bukuModel extends Model
{
    public function Alldata()
   {
     return $this->db->table('tb_buku')
     ->orderBy('id', 'DESC')
     ->get()->getResultArray();
   }

   public function Add($data)
   {
        $this->db->table('tb_buku')->insert($data);
   }

   public function DeleteData($data)
   {
        $this->db->table('tb_buku')
        ->where('id', $data['id'])
        ->delete($data);
   }

   public function EditData($data)
   {
        $this->db->table('tb_buku')
        ->where('id', $data['id'])
        ->update($data);
   }
   protected $table = 'tb_user';
   public function HitungData()
   {
     return $this->countAll();
   }

   public function getBuku($id = false)
   {
     if($id == false){
          return $this->findAll();
     }
     return $this->where(['id' => $id])->first();
   }
}