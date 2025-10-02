<?php
namespace App\Controllers;

use App\Models\BahanBakuModel;

class BahanBaku extends BaseController
{
    protected $bahanModel;

    public function __construct()
    {
        $this->bahanModel = new BahanBakuModel();
    }

    // tampilkan semua data bahan
    public function index()
    {
        $data['title']  = 'Daftar Bahan Baku';
        $data['bahan']  = $this->bahanModel->getAllWithStatus();

        return view('bahan/index', $data);
    }
}
