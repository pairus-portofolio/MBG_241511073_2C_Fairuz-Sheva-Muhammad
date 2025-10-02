<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h3><?= $title ?></h3>
<a href="/bahan" class="btn btn-secondary mb-3">Kembali</a>

<div class="card">
    <div class="card-body">
        <p><strong>Nama:</strong> <?= esc($bahan['nama']) ?></p>
        <p><strong>Kategori:</strong> <?= esc($bahan['kategori']) ?></p>
        <p><strong>Jumlah:</strong> <?= esc($bahan['jumlah']) ?></p>
        <p><strong>Satuan:</strong> <?= esc($bahan['satuan']) ?></p>
        <p><strong>Tanggal Masuk:</strong> <?= esc($bahan['tanggal_masuk']) ?></p>
        <p><strong>Tanggal Kadaluwarsa:</strong> <span class="text-danger fw-bold"><?= esc($bahan['tanggal_kadaluwarsa']) ?></span></p>
        <p><strong>Status:</strong> <?= esc($bahan['status']) ?></p>
        <form action="/bahan/delete/<?= $bahan['id'] ?>" method="post">
            <?= csrf_field() ?>
            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
            <a href="/bahan" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
