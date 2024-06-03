<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailPeminjamanModel extends Model
{
    protected $table = 'tb_detail_peminjaman';
    protected $primaryKey = 'id';
    protected $allowedFields = ['peminjaman_id', 'buku_id'];
}