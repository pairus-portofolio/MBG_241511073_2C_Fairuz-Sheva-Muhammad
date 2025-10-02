<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h3><?= $title ?></h3>
<a href="/permintaan" class="btn btn-secondary mb-3">Kembali</a>

<div class="card mb-3">
    <div class="card-body">
        <p><strong>Pemohon:</strong> <?= esc($permintaan['pemohon']) ?></p>
        <p><strong>Tanggal Masak:</strong> <?= esc($permintaan['tgl_masak']) ?></p>
        <p><strong>Menu Makan:</strong> <?= esc($permintaan['menu_makan']) ?></p>
        <p><strong>Jumlah Porsi:</strong> <?= esc($permintaan['jumlah_porsi']) ?></p>
        <p><strong>Status:</strong> 
            <span class="badge bg-<?= $permintaan['status']=='menunggu'?'warning text-dark':($permintaan['status']=='disetujui'?'success':'danger') ?>">
                <?= esc($permintaan['status']) ?>
            </span>
        </p>
    </div>
</div>

<h5>Daftar Bahan Diminta</h5>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Bahan</th>
            <th>Jumlah Diminta</th>
            <th>Satuan</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($details as $d): ?>
        <tr>
            <td><?= esc($d['bahan']) ?></td>
            <td><?= esc($d['jumlah_diminta']) ?></td>
            <td><?= esc($d['satuan']) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>
