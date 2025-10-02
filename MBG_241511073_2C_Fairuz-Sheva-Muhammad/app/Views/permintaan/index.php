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
            <th>Jumlah Porsi</th>
            <th>Status</th>
            <th>Dibuat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($permintaan as $row): ?>
        <tr>
            <td><?= esc($row['pemohon']) ?></td>
            <td><?= esc($row['tgl_masak']) ?></td>
            <td><?= esc($row['menu_makan']) ?></td>
            <td><?= esc($row['jumlah_porsi']) ?></td>
            <td>
                <?php
                $status = $row['status'];
                $badgeClass = 'bg-secondary';

                if ($status === 'menunggu') {
                    $badgeClass = 'bg-warning text-dark';
                } elseif ($status === 'disetujui') {
                    $badgeClass = 'bg-success';
                } elseif ($status === 'ditolak') {
                    $badgeClass = 'bg-danger';
                }
                ?>
                <span class="badge <?= $badgeClass ?>"><?= $status ?></span>
            </td>
            <td><?= esc($row['created_at']) ?></td>
            <td><a href="/permintaan/detail/<?= $row['id'] ?>" class="btn btn-sm btn-info">Detail</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>
