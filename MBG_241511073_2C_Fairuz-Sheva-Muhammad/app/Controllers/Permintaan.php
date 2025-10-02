<?php
namespace App\Controllers;

use App\Models\PermintaanModel;

class Permintaan extends BaseController
{
    protected $permintaanModel;

    public function __construct()
    {
        $this->permintaanModel = new PermintaanModel();
    }

    // tampilkan semua permintaan (untuk role dapur)
    public function index()
    {
        $data['title'] = 'Daftar Permintaan Bahan';
        $data['permintaan'] = $this->permintaanModel->getAllWithUser();

        return view('permintaan/index', $data);
    }

    public function detail($id)
    {
        $permintaan = $this->permintaanModel->getAllWithUser();
        $permintaan = array_filter($permintaan, fn($p) => $p['id'] == $id);
        $permintaan = reset($permintaan);

    if (!$permintaan) {
        return redirect()->to('/permintaan')->with('error', 'Permintaan tidak ditemukan');
    }

        $detailModel = new \App\Models\PermintaanDetailModel();
        $details = $detailModel->getByPermintaan($id);

        $data = [
            'title'      => 'Detail Permintaan',
            'permintaan' => $permintaan,
            'details'    => $details
    ];

    return view('permintaan/detail', $data);
    }

}
