<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add New Employee</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h3>Add New Employee</h3>
      <a href="<?= site_url('employee') ?>" class="btn btn-secondary">Back to List</a>
    </div>

    <!-- Flash message -->
    <?php if ($this->session->flashdata('success')): ?>
      <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
      <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <!-- Form Start -->
    <?= form_open_multipart('employee/insert') ?>

      <div class="row mb-3">
        <div class="col-md-6">
          <label class="form-label">Name <span class="text-danger">*</span></label>
          <input type="text" name="name" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Designation</label>
          <input type="text" name="designation" class="form-control">
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">Address</label>
        <textarea name="address" class="form-control" rows="3"></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label">Salary (INR)</label>
        <input type="number" step="0.01" name="salary" class="form-control">
      </div>

      <div class="mb-3">
        <label class="form-label">Picture</label>
        <input type="file" name="picture" class="form-control">
        <small class="form-text text-muted">Max 2MB, JPG/PNG/GIF only.</small>
      </div>

      <button type="submit" class="btn btn-primary">Save Employee</button>

    <?= form_close() ?>
  </div>
</body>
</html>
