<h3>Add upload</h3>
<?php echo form_open_multipart('blog/uploads/add'); ?>
<p>File<br>
  <input type="file" name="userfile" size="20" class="dropify" />
</p>
<p>Title<br>
  <?php echo form_input('title', $this->input->post('title'), 'class="form-control"'); ?>
  <?php echo form_error('title', '<span class="text-danger">', '</span>'); ?>
</p>
<p>Alt_text<br>
  <?php echo form_input('alt_text', $this->input->post('alt_text'), 'class="form-control"'); ?>
  <?php echo form_error('alt_text', '<span class="text-danger">', '</span>'); ?>
</p>
<p>Description<br>
  <?php echo form_textarea('description', $this->input->post('description'), 'class="form-control"'); ?>
  <?php echo form_error('description', '<span class="text-danger">', '</span>'); ?>
</p>
<p>
  <?php echo form_submit('submit', 'Save upload', 'class="btn btn-success"'); ?>
  or <?php echo anchor('blog/uploads', 'cancel'); ?>
</p>
<?php echo form_close(); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script>
  $(function() {
    $('.dropify').dropify();
  });
</script>