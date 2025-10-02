<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'MBG App') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Aplikasi pemantauan bahan baku MBG</a>
            <?php if(session()->get('logged_in')): ?>
            <div class="ms-auto">
                <span class="text-white me-3"><?= esc(session('name')) ?> (<?= esc(session('role')) ?>)</span>
                <a href="/logout" class="btn btn-outline-light btn-sm">Logout</a>
            </div>
            <?php endif; ?>
        </div>
    </nav>

    <!-- Konten -->
    <div class="container">
        <?= $this->renderSection('content') ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
