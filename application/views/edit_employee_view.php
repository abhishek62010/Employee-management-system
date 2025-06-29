<h2>Edit Employee</h2>
<?php echo form_open('employee/update/'.$employee->id); ?>
<input type="text" name="name" value="<?php echo $employee->name; ?>" required><br>
<textarea name="address"><?php echo $employee->address; ?></textarea><br>
<input type="text" name="designation" value="<?php echo $employee->designation; ?>"><br>
<input type="number" step="0.01" name="salary" value="<?php echo $employee->salary; ?>"><br>
<button type="submit">Update</button>
<?php echo form_close(); ?>