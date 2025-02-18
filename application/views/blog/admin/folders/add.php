<h3>Add folder</h3>
<?php echo form_open('folders/add'); ?>
<p>Name<br>
  <?php echo form_input('name', $this->input->post('name'), 'class="form-control"'); ?>
  <?php echo form_error('name'); ?>
</p>
<p>
  <?php echo form_submit('submit', 'Save changes', 'class="btn btn-success"'); ?>
  or <?php echo anchor('folders', 'cancel'); ?>
</p>
<?php echo form_close(); ?>