<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h3><?= $title ?></h3>
<a href="/dashboard" class="btn btn-secondary mb-3">Kembali</a>

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
                $badgeClass = 'bg-secondary'; // default

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
                <span class="badge <?= $badgeClass ?>"><?= $status ?></span>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>
