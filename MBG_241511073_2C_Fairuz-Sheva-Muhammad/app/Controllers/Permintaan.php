<?php
namespace App\Controllers;

use App\Models\PermintaanModel;
use App\Models\BahanBakuModel;
use App\Models\PermintaanDetailModel;

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

    // detail permintaan
    public function detail($id)
    {
        $permintaan = $this->permintaanModel->getAllWithUser();
        $permintaan = array_filter($permintaan, fn($p) => $p['id'] == $id);
        $permintaan = reset($permintaan);

        if (!$permintaan) {
            return redirect()->to('/permintaan')->with('error', 'Permintaan tidak ditemukan');
        }

        $detailModel = new PermintaanDetailModel();
        $details = $detailModel->getByPermintaan($id);

        $data = [
            'title'      => 'Detail Permintaan',
            'permintaan' => $permintaan,
            'details'    => $details
        ];

        return view('permintaan/detail', $data);
    }

    // form tambah
    public function create()
    {
        $bahanModel = new BahanBakuModel();

        // hanya bahan yang stok > 0 dan tidak kadaluwarsa
        $bahan = $bahanModel->where('jumlah >', 0)
                            ->where('tanggal_kadaluwarsa >', date('Y-m-d'))
                            ->findAll();

        $data = [
            'title' => 'Tambah Permintaan',
            'bahan' => $bahan
        ];

        return view('permintaan/create', $data);
    }

    // simpan permintaan baru
    public function store()
    {

        $idPermintaan = $this->permintaanModel->insert([
            'pemohon_id'   => session()->get('user_id'),
            'tgl_masak'    => $this->request->getPost('tgl_masak'),
            'menu_makan'   => $this->request->getPost('menu_makan'),
            'jumlah_porsi' => $this->request->getPost('jumlah_porsi'),
            'status'       => 'menunggu',
            'created_at'   => date('Y-m-d H:i:s')
        ]);

        $pilih  = $this->request->getPost('pilih');  
        $jumlah = $this->request->getPost('jumlah');

        $detailModel = new PermintaanDetailModel();

        if ($pilih && $jumlah) {
            foreach ($pilih as $bahanId => $checked) {
                if ($checked && isset($jumlah[$bahanId]) && $jumlah[$bahanId] > 0) {
                    $detailModel->insert([
                        'permintaan_id'  => $idPermintaan,
                        'bahan_id'       => $bahanId,
                        'jumlah_diminta' => $jumlah[$bahanId]
                    ]);
                }
            }
        }
        return redirect()->to('/permintaan')->with('success', 'Permintaan berhasil dibuat');
    }
}
