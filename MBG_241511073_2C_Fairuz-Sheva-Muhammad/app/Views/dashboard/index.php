<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3>Selamat datang, <?= esc(session('name')) ?>!</h3>
                <p>Role Anda: <span class="badge bg-secondary"><?= esc(session('role')) ?></span></p>

                <?php if(session('role') === 'gudang'): ?>
                    <a href="/bahan" class="btn btn-success me-2">Kelola Bahan Baku</a>
                    <a href="#" class="btn btn-warning">Proses Permintaan</a>
                <?php elseif(session('role') === 'dapur'): ?>
                    <a href="/permintaan/create" class="btn btn-success">Buat Permintaan</a>
                    <a href="/permintaan" class="btn btn-warning">Lihat Status Permintaan</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
