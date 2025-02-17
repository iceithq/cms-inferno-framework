<h3>New post</h3>
<?php echo form_open('blog/posts/add'); ?>
<p>Title<br>
  <?php echo form_input('title', $this->input->post('title'), 'id="title" class="form-control"'); ?>
  <?php echo form_error('title', '<span class="text-danger">', '</span>'); ?>
</p>
<p>Teaser<br>
  <?php echo form_textarea('teaser', $this->input->post('teaser'), 'class="form-control teaser"'); ?>
  <?php echo form_error('teaser', '<span class="text-danger">', '</span>'); ?>
</p>
<p>Content<br>
  <?php echo form_textarea('content', $this->input->post('content'), 'id="content" class="form-control content"'); ?>
  <?php echo form_error('content', '<span class="text-danger">', '</span>'); ?>
</p>
<p>Created<br>
  <?php echo form_input('created_at', now(), 'id="created_at" class="form-control"'); ?>
  <?php echo form_error('created_at', '<span class="text-danger">', '</span>'); ?>
</p>
<p>
  <?php echo form_submit('submit', 'Save  post', 'id="save" class="btn btn-success"'); ?>
  or
  <?php echo anchor('blog/posts', 'cancel'); ?>
</p>
<?php echo form_close(); ?>

<script>
  $(document).ready(function() {
    $('.teaser').summernote({
      height: 200
    });
    $('.content').summernote({
      height: 600
    });
  });
</script>