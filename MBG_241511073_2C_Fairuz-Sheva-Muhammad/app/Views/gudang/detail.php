<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h3><?= $title ?></h3>
<a href="/gudang/permintaan" class="btn btn-secondary mb-3">Kembali</a>

<div class="mb-3">
    <strong>Pemohon:</strong> <?= esc($permintaan['pemohon']) ?><br>
    <strong>Tanggal Masak:</strong> <?= esc($permintaan['tgl_masak']) ?><br>
    <strong>Menu:</strong> <?= esc($permintaan['menu_makan']) ?><br>
    <strong>Porsi:</strong> <?= esc($permintaan['jumlah_porsi']) ?><br>
    <strong>Status:</strong> <?= esc($permintaan['status']) ?><br>
</div>

<h5>Detail Bahan Diminta</h5>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Bahan</th>
            <th>Jumlah Diminta</th>
            <th>Satuan</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($detail as $d): ?>
            <tr>
                <td><?= esc($d['nama']) ?></td>
                <td><?= esc($d['jumlah_diminta']) ?></td>
                <td><?= esc($d['satuan']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php if ($permintaan['status'] === 'menunggu'): ?>
    <form action="/gudang/permintaan/approve/<?= $permintaan['id'] ?>" method="post" style="display:inline-block">
        <?= csrf_field() ?>
        <button type="submit" class="btn btn-success">Setujui</button>
    </form>

    <form action="/gudang/permintaan/reject/<?= $permintaan['id'] ?>" method="post" style="display:inline-block">
        <?= csrf_field() ?>
        <button type="submit" class="btn btn-danger">Tolak</button>
    </form>
<?php endif; ?>

<a href="/gudang/permintaan" class="btn btn-secondary">Kembali</a>

<?= $this->endSection() ?>
