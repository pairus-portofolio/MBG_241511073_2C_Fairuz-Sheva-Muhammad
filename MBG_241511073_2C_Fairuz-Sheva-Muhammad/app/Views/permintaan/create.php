<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h3><?= $title ?></h3>
<a href="/dashboard" class="btn btn-secondary mb-3">Kembali</a>

<form action="/permintaan/store" method="post">
    <?= csrf_field() ?>

    <div class="mb-3">
        <label for="tgl_masak" class="form-label">Tanggal Masak</label>
        <input type="date" name="tgl_masak" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="menu_makan" class="form-label">Menu Makan</label>
        <input type="text" name="menu_makan" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="jumlah_porsi" class="form-label">Jumlah Porsi</label>
        <input type="number" name="jumlah_porsi" class="form-control" min="1" required>
    </div>

    <h5>Pilih Bahan</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Pilih</th>
                <th>Nama Bahan</th>
                <th>Jumlah Diminta</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bahan as $b): ?>
                <tr>
                    <td>
                        <input type="checkbox" id="pilih-<?= $b['id'] ?>" name="pilih[<?= $b['id'] ?>]" value="1"
                               onchange="toggleRequired(<?= $b['id'] ?>)">
                    </td>
                    <td>
                        <?= esc($b['nama']) ?> (stok: <?= $b['jumlah'] ?> <?= $b['satuan'] ?>)
                    </td>
                    <td>
                        <input type="number" id="jumlah-<?= $b['id'] ?>" name="jumlah[<?= $b['id'] ?>]" 
                               class="form-control" min="1">
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <button type="submit" class="btn btn-primary">Simpan Permintaan</button>
    <a href="/permintaan" class="btn btn-secondary">Kembali</a>
</form>

<script>
function toggleRequired(id) {
    const checkbox = document.getElementById('pilih-' + id);
    const jumlah   = document.getElementById('jumlah-' + id);
    if (checkbox.checked) {
        jumlah.required = true;
    } else {
        jumlah.required = false;
        jumlah.value = "";
    }
}
</script>

<?= $this->endSection() ?>
