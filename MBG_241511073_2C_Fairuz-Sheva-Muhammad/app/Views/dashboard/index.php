<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="/dashboard">MBG App</a>
    <div class="d-flex">
      <a href="/logout" class="btn btn-outline-light">Logout</a>
    </div>
  </div>
</nav>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            <h2>Selamat datang, <?= session()->get('name'); ?> 👋</h2>
            <p>Role Anda: <strong><?= session()->get('role'); ?></strong></p>
        </div>
    </div>
</div>

</body>
</html>
