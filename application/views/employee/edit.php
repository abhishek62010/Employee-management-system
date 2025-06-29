<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Employee</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h3 class="mb-4">Edit Employee</h3>

    <?= form_open_multipart('employee/update/' . $emp->id) ?>
    <!-- form editing fields -->
    <?= form_close() ?>

    <div class="row mb-3">
      <div class="col">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="<?= $emp->name ?>" required>
      </div>
      <div class="col">
        <label class="form-label">Designation</label>
        <input type="text" name="designation" class="form-control" value="<?= $emp->designation ?>">
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label">Address</label>
      <textarea name="address" class="form-control" rows="3"><?= $emp->address ?></textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Current Picture</label><br>
      <?php if (!empty($emp->picture)) : ?>
        <img src="<?= base_url('uploads/' . $emp->picture) ?>" width="100" class="mb-2">
      <?php endif; ?>
      <input type="file" name="picture" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="<?= site_url('employee') ?>" class="btn btn-secondary">Cancel</a>

    <?= form_close() ?>
  </div>
</body>
</html>
