<h3>Edit folder</h3>
<?php echo form_open('blog/folders/edit/' . $folder->id); ?>
<p>Name<br>
  <?php echo form_input('name', $folder->name, 'class="form-control"'); ?>
  <?php echo form_error('name'); ?>
</p>
<p>
  <?php echo form_submit('submit', 'Save changes', 'class="btn btn-success"'); ?>
  or <?php echo anchor('blog/folders', 'cancel'); ?>
</p>
<?php echo form_close(); ?>