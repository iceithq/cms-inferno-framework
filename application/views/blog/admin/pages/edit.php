<h3>
  Update page
</h3>
<p>
  <?php echo anchor('blog/page/' . $page->id, '👁️ View page', 'target="_blank"'); ?>
</p>
<?php echo form_open('blog/pages/edit/' . $page->id); ?>
<p>Title<br>
  <?php echo form_input('title', $page->title, 'id="title" class="form-control"'); ?>
  <?php echo form_error('title'); ?>
</p>
<p>Content<br>
  <?php echo form_textarea('content', $page->content, 'id="content" class="form-control summernote"'); ?>
  <?php echo form_error('content'); ?>
</p>
<p>
  <?php echo form_submit('submit', 'Update page', 'class="btn btn-success"'); ?>
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