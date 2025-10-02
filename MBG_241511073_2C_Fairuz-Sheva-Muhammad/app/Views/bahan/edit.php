<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h3><?= $title ?></h3>
<a href="/bahan" class="btn btn-secondary mb-3">Kembali</a>

<form action="/bahan/update/<?= $bahan['id'] ?>" method="post">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="<?= esc($bahan['nama']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Kategori</label>
        <input type="text" name="kategori" class="form-control" value="<?= esc($bahan['kategori']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Jumlah</label>
        <input type="number" name="jumlah" class="form-control" value="<?= esc($bahan['jumlah']) ?>" required min="0">
    </div>
    <div class="mb-3">
        <label>Satuan</label>
        <input type="text" name="satuan" class="form-control" value="<?= esc($bahan['satuan']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Tanggal Masuk</label>
        <input type="date" name="tanggal_masuk" class="form-control" value="<?= esc($bahan['tanggal_masuk']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Tanggal Kadaluwarsa</label>
        <input type="date" name="tanggal_kadaluwarsa" class="form-control" value="<?= esc($bahan['tanggal_kadaluwarsa']) ?>" required>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>

<?= $this->endSection() ?>
