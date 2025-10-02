<?php
namespace App\Models;

use CodeIgniter\Model;

class BahanBakuModel extends Model
{
    protected $table      = 'bahan_baku';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama','kategori','jumlah','satuan','tanggal_masuk','tanggal_kadaluwarsa','status','created_at'
    ];

    // ambil semua data + hitung status secara dinamis
    public function getAllWithStatus()
    {
        return $this->select("*, 
            CASE 
              WHEN jumlah = 0 THEN 'habis'
              WHEN CURRENT_DATE() >= tanggal_kadaluwarsa THEN 'kadaluwarsa'
              WHEN DATEDIFF(tanggal_kadaluwarsa, CURRENT_DATE()) <= 3 THEN 'segera_kadaluarsa'
              ELSE 'tersedia'
            END AS status_calc")
            ->orderBy('nama', 'ASC')
            ->findAll();
    }
}
