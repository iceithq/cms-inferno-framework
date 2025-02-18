<h3>New page</h3>
<?php echo form_open('blog/pages/add'); ?>
<p>Title<br>
  <?php echo form_input('title', $this->input->post('title'), 'id="title" class="form-control"'); ?>
  <?php echo form_error('title'); ?>
</p>
<p>Content<br>
  <?php echo form_textarea('content', $this->input->post('content'), 'id="content" class="form-control summernote"'); ?>
  <?php echo form_error('content'); ?>
</p>
<p>
  <?php echo form_submit('submit', 'Save page', 'id="save" class="btn btn-success"'); ?>
  or <?php echo anchor('pages', 'cancel'); ?>
</p>
<?php echo form_close(); ?>

<script>
  $(document).ready(function() {
    $('.summernote').summernote({
      height: 600
    });
  });
</script>