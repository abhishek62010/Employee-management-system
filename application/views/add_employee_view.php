<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add New Employee</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
  <h2 class="mb-4">Add New Employee</h2>

  <?= form_open_multipart('employee/insert', ['class' => 'row g-3']) ?>

    <div class="col-md-6">
      <label class="form-label">Name</label>
      <input type="text" name="name" class="form-control" placeholder="Enter name" required>
    </div>

    <div class="col-md-6">
      <label class="form-label">Designation</label>
      <input type="text" name="designation" class="form-control" placeholder="e.g. Developer">
    </div>

    <div class="col-12">
      <label class="form-label">Address</label>
      <textarea name="address" class="form-control" placeholder="Address..." rows="3"></textarea>
    </div>

    <div class="col-md-6">
      <label class="form-label">Salary (₹)</label>
      <input type="number" step="0.01" name="salary" class="form-control" placeholder="e.g. 50000">
    </div>

    <div class="col-md-6">
      <label class="form-label">Picture</label>
      <input type="file" name="picture" class="form-control">
    </div>

    <div class="col-12">
      <button type="submit" class="btn btn-success">Save</button>
      <a href="<?= site_url('employee') ?>" class="btn btn-secondary">Cancel</a>
    </div>

  <?= form_close() ?>
</div>
</body>
</html>
