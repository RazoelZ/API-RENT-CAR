<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
  protected $table = "peminjaman";
  protected $primaryKey = "id_peminjaman";
  protected $allowedFields = [
    "id_kendaraan", "id_user",
    "tgl_peminjaman", "jam_peminjaman",
    "km_awal", "saldo_tol_awal", "tgl_kembali",
    "jam_kembali", "km_akhir", "saldo_tol_akhir",
    "keperluan", "driver", "tujuan", "hargabbm",
    "lampiran_tol", "lampiran_bbm", "total_km", "deleted_At"
  ];
}
