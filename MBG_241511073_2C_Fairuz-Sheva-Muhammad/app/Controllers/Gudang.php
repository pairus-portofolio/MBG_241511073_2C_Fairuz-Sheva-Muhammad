<?php
namespace App\Controllers;

use App\Models\PermintaanModel;
use App\Models\PermintaanDetailModel;

class Gudang extends BaseController
{
    protected $permintaanModel;
    protected $detailModel;

    public function __construct()
    {
        $this->permintaanModel = new PermintaanModel();
        $this->detailModel     = new PermintaanDetailModel();
    }

    // daftar semua permintaan
    public function index()
    {
        $permintaan = $this->permintaanModel
            ->select('permintaan.*, user.name as pemohon')
            ->join('user', 'user.id = permintaan.pemohon_id')
            ->orderBy('created_at', 'DESC')
            ->findAll();

        return view('gudang/index', [
            'title'      => 'Daftar Permintaan Bahan',
            'permintaan' => $permintaan
        ]);
    }

    // detail permintaan
    public function detail($id)
    {
        $permintaan = $this->permintaanModel
            ->select('permintaan.*, user.name as pemohon')
            ->join('user', 'user.id = permintaan.pemohon_id')
            ->find($id);

        $detail = $this->detailModel
            ->select('permintaan_detail.*, bahan_baku.nama, bahan_baku.satuan')
            ->join('bahan_baku', 'bahan_baku.id = permintaan_detail.bahan_id')
            ->where('permintaan_id', $id)
            ->findAll();

        return view('gudang/detail', [
            'title'      => 'Detail Permintaan',
            'permintaan' => $permintaan,
            'detail'     => $detail
        ]);
    }

    // setujui permintaan
    public function approve($id)
    {
        $this->permintaanModel->update($id, ['status' => 'disetujui']);
        return redirect()->to('/gudang/permintaan')->with('success', 'Permintaan berhasil disetujui');
    }

    // tolak permintaan
    public function reject($id)
    {
        $this->permintaanModel->update($id, ['status' => 'ditolak']);
        return redirect()->to('/gudang/permintaan')->with('error', 'Permintaan ditolak');
    }
}
