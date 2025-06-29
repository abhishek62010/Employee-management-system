<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5" style="max-width: 400px;">
  <h4 class="mb-4">Login</h4>

  <?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
  <?php endif; ?>

  <?= form_open('auth/login_user') ?>
    <div class="mb-3">
      <input type="text" name="username" class="form-control" placeholder="Username" required>
    </div>
    <div class="mb-3">
      <input type="password" name="password" class="form-control" placeholder="Password" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">Login</button>
  <?= form_close() ?>
</div>
</body>
</html>
