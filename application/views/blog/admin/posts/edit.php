<h3>
  Update post
</h3>
<p>
  <?php echo anchor('blog/home/post/' . $post->id, '👁️ View post', 'target="_blank"'); ?>
</p>
<?php echo form_open('blog/posts/edit/' . $post->id); ?>
<p>Title<br>
  <?php echo form_input('title', $post->title, 'id="title" class="form-control"'); ?>
  <?php echo form_error('title'); ?>
</p>
<p>Teaser<br>
  <?php echo form_textarea('teaser', $post->teaser, 'class="form-control teaser"'); ?>
  <?php echo form_error('content'); ?>
</p>
<p>Content<br>
  <?php echo form_textarea('content', $post->content, 'id="content" class="form-control content"'); ?>
  <?php echo form_error('content'); ?>
</p>
<p>Created<br>
  <?php echo form_input('created_at', $post->created_at, 'id="created_at" class="form-control"'); ?>
  <?php echo form_error('created_at'); ?>
</p>
<p>
  <?php echo form_submit('submit', 'Update post', 'id="update" class="btn btn-success"'); ?>
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