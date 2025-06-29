<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Employee Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
  <h2 class="mb-4">Welcome, <?= $employee->name ?? 'Employee' ?></h2>

  <?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
  <?php endif; ?>

  <?php if ($employee): ?>
    <div class="card mb-3" style="max-width: 600px;">
      <div class="row g-0">
        <div class="col-md-4">
          <?php if ($employee->picture): ?>
            <img src="<?= base_url('uploads/' . $employee->picture) ?>" class="img-fluid rounded-start" alt="Employee Photo">
          <?php else: ?>
            <img src="https://via.placeholder.com/150" class="img-fluid rounded-start" alt="No Image">
          <?php endif; ?>
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title"><?= $employee->name ?></h5>
            <p class="card-text"><strong>Designation:</strong> <?= $employee->designation ?></p>
            <p class="card-text"><strong>Address:</strong> <?= $employee->address ?></p>
            <p class="card-text"><strong>Salary:</strong> ₹<?= number_format($employee->salary, 2) ?></p>
          </div>
        </div>
      </div>
    </div>
  <?php else: ?>
    <div class="alert alert-warning">No employee details found for your account.</div>
  <?php endif; ?>

  <a href="<?= site_url('auth/logout') ?>" class="btn btn-danger">Logout</a>
</div>
</body>
</html>
