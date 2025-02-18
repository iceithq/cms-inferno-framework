<h3>Add comment</h3>
<?php echo form_open('comments/add'); ?>
<p>Id<br>
  <?php echo form_input('id', $this->input->post('id')); ?>
  <?php echo form_error('id'); ?>
</p>
<p>Post_id<br>
  <?php echo form_input('post_id', $this->input->post('post_id')); ?>
  <?php echo form_error('post_id'); ?>
</p>
<p>Comments<br>
  <?php echo form_input('comments', $this->input->post('comments')); ?>
  <?php echo form_error('comments'); ?>
</p>
<p>Created_at<br>
  <?php echo form_input('created_at', $this->input->post('created_at')); ?>
  <?php echo form_error('created_at'); ?>
</p>
<p>Created_by<br>
  <?php echo form_input('created_by', $this->input->post('created_by')); ?>
  <?php echo form_error('created_by'); ?>
</p>
<p>
  <?php echo form_submit('submit', 'Save changes'); ?>
  or <?php echo anchor('comments', 'cancel'); ?>
</p>
<?php echo form_close(); ?>