<?php
namespace App\Models;

use CodeIgniter\Model;

class PermintaanDetailModel extends Model
{
    protected $table      = 'permintaan_detail';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'permintaan_id','bahan_id','jumlah_diminta'
    ];

    // ambil detail permintaan + nama bahan
    public function getByPermintaan($permintaan_id)
    {
        return $this->select('permintaan_detail.*, bahan_baku.nama as bahan, bahan_baku.satuan')
                    ->join('bahan_baku', 'bahan_baku.id = permintaan_detail.bahan_id')
                    ->where('permintaan_detail.permintaan_id', $permintaan_id)
                    ->findAll();
    }
}
