<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h3><?= $title ?></h3>
<a href="/dashboard" class="btn btn-secondary mb-3">Kembali</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Pemohon</th>
            <th>Tgl Masak</th>
            <th>Menu</th>
            <th>Porsi</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($permintaan as $p): ?>
        <tr>
            <td><?= esc($p['pemohon']) ?></td>
            <td><?= esc($p['tgl_masak']) ?></td>
            <td><?= esc($p['menu_makan']) ?></td>
            <td><?= esc($p['jumlah_porsi']) ?></td>
            <td>
                <?php
                $badgeClass = match($p['status']) {
                    'menunggu'  => 'bg-secondary',
                    'disetujui' => 'bg-success',
                    'ditolak'   => 'bg-danger',
                    default     => 'bg-dark',
                };
                ?>
                <span class="badge <?= $badgeClass ?>"><?= ucfirst($p['status']) ?></span>
            </td>
            <td>
                <a href="/gudang/permintaan/detail/<?= $p['id'] ?>" class="btn btn-sm btn-info">Detail</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>
