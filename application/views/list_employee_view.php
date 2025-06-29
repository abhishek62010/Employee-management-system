<h2>Employees</h2>
<a href="<?php echo base_url('employee/add'); ?>">Add New</a>
<table border="1">
<tr><th>Name</th><th>Designation</th><th>Salary</th><th>Actions</th></tr>
<?php foreach ($employees as $emp): ?>
<tr>
<td><?php echo $emp->name; ?></td>
<td><?php echo $emp->designation; ?></td>
<td><?php echo $emp->salary; ?></td>
<td>
  <a href="<?php echo base_url('employee/edit/'.$emp->id); ?>">Edit</a> |
  <a href="<?php echo base_url('employee/delete/'.$emp->id); ?>" onclick="return confirm('Are you sure?')">Delete</a>
</td>
</tr>
<?php endforeach; ?>
</table>