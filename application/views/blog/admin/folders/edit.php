<h3>Edit folder</h3>
<?php echo form_open('folders/edit/' . $folder->id); ?>
<p>Id<br>
  <?php echo form_input('id', $folder->id); ?>
  <?php echo form_error('id'); ?>
</p>
<p>Name<br>
  <?php echo form_input('name', $folder->name); ?>
  <?php echo form_error('name'); ?>
</p>
<p>Created_at<br>
  <?php echo form_input('created_at', $folder->created_at); ?>
  <?php echo form_error('created_at'); ?>
</p>
<p>
  <?php echo form_submit('submit', 'Save changes'); ?>
  or <?php echo anchor('folders', 'cancel'); ?>
</p>
<?php echo form_close(); ?>