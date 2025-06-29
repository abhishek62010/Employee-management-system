<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Employees</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">
  <div class="d-flex justify-content-between mb-3">
    <h3>Employees</h3>
    <?php if ($this->session->userdata('role') === 'admin'): ?>
      <a href="<?= site_url('employee/add') ?>" class="btn btn-success">Add Employee</a>
    <?php endif; ?>
    <a href="<?= site_url('auth/logout') ?>" class="btn btn-secondary">Logout</a>
  </div>

  <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
  <?php endif; ?>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Photo</th>
        <th>Name</th>
        <th>Designation</th>
        <th>Salary</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($employees) && is_array($employees)): ?>
        <?php foreach ($employees as $e): ?>
          <?php if ($e): ?>
            <tr>
              <td>
                <?php if (!empty($e->picture)): ?>
                  <img src="<?= base_url('uploads/' . $e->picture) ?>" width="50" class="rounded">
                <?php else: ?>
                  <span class="text-muted">No photo</span>
                <?php endif; ?>
              </td>
              <td><?= htmlspecialchars($e->name) ?></td>
              <td><?= htmlspecialchars($e->designation ?? 'N/A') ?></td>
              <td>₹<?= number_format((float)($e->salary ?? 0), 2) ?></td>
              <td>
                <a href="<?= site_url('employee/edit/' . $e->id) ?>" class="btn btn-sm btn-info">Edit</a>
                <?php if ($this->session->userdata('role') === 'admin'): ?>
                  <a href="<?= site_url('employee/delete/' . $e->id) ?>" onclick="return confirm('Delete?')" class="btn btn-sm btn-danger">Delete</a>
                <?php endif; ?>
              </td>
            </tr>
          <?php endif; ?>
        <?php endforeach; ?>
      <?php else: ?>
        <tr><td colspan="5" class="text-center">No employees found.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
</body>
</html>
