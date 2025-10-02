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

// form tambah data
    public function create()
    {
        $data['title'] = 'Tambah Bahan Baku';
        return view('bahan/create', $data);
    }

// simpan data baru
    public function store()
    {
        $this->bahanModel->save([
            'nama'               => $this->request->getPost('nama'),
            'kategori'           => $this->request->getPost('kategori'),
            'jumlah'             => $this->request->getPost('jumlah'),
            'satuan'             => $this->request->getPost('satuan'),
            'tanggal_masuk'      => $this->request->getPost('tanggal_masuk'),
            'tanggal_kadaluwarsa'=> $this->request->getPost('tanggal_kadaluwarsa'),
            'status'             => 'tersedia',
            'created_at'         => date('Y-m-d H:i:s')
        ]);

    return redirect()->to('/bahan')->with('success', 'Bahan berhasil ditambahkan');
    }

// edit data
    public function edit($id)
    {
        $data['title'] = 'Edit Bahan Baku';
            $data['bahan'] = $this->bahanModel->find($id);

    if (!$data['bahan']) {
        return redirect()->to('/bahan')->with('error', 'Bahan tidak ditemukan');
    }

    return view('bahan/edit', $data);
    }

// update data
    public function update($id)
    {
        $this->bahanModel->update($id, [
            'nama'                => $this->request->getPost('nama'),
            'kategori'            => $this->request->getPost('kategori'),
            'jumlah'              => $this->request->getPost('jumlah'),
            'satuan'              => $this->request->getPost('satuan'),
            'tanggal_masuk'       => $this->request->getPost('tanggal_masuk'),
            'tanggal_kadaluwarsa' => $this->request->getPost('tanggal_kadaluwarsa'),
    ]);

    return redirect()->to('/bahan')->with('success', 'Bahan berhasil diperbarui');
}


}
