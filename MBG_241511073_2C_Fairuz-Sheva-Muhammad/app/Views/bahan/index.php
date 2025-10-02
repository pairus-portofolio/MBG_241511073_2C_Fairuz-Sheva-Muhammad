<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h3><?= $title ?></h3>
<a href="/dashboard" class="btn btn-secondary mb-3">Kembali</a>
<a href="/bahan/create" class="btn btn-primary mb-3">Tambah Bahan Baku</a>

<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session('success') ?></div>
<?php endif; ?>

<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session('error') ?></div>
<?php endif; ?>


<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Jumlah</th>
            <th>Satuan</th>
            <th>Tgl Masuk</th>
            <th>Tgl Kadaluwarsa</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($bahan as $row): ?>
        <tr>
            <td><?= esc($row['nama']) ?></td>
            <td><?= esc($row['kategori']) ?></td>
            <td><?= esc($row['jumlah']) ?></td>
            <td><?= esc($row['satuan']) ?></td>
            <td><?= esc($row['tanggal_masuk']) ?></td>
            <td><?= esc($row['tanggal_kadaluwarsa']) ?></td>
            <td>
                <?php
                $status = $row['status_calc'];
                $badgeClass = 'bg-secondary';

                if ($status === 'kadaluwarsa') {
                    $badgeClass = 'bg-danger';
                } elseif ($status === 'habis') {
                    $badgeClass = 'bg-dark';
                } elseif ($status === 'segera_kadaluarsa') {
                    $badgeClass = 'bg-warning text-dark';
                } elseif ($status === 'tersedia') {
                    $badgeClass = 'bg-success';
                }
                ?>
                <span class="badge <?= $badgeClass ?>"><?= ucfirst(str_replace('_', ' ', $status)) ?></span></td>
            <td>
                <a href="/bahan/edit/<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
               <a href="/bahan/confirm-delete/<?= $row['id'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>
