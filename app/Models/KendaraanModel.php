<?php

namespace App\Models;

use CodeIgniter\Model;

class KendaraanModel extends Model
{
  protected $table = "kendaraan";
  protected $primaryKey = "id_kendaraan";
  protected $foreignKey = 'id_departemen';
  protected $allowedFields = [
    "jenis_kendaraan",
    "nomor_polisi", "tipe_kendaraan", "km",
    "total_saldo_tol", "pinjam", "gambar"
  ];
}
