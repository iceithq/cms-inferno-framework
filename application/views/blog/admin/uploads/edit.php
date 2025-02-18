<h3>Edit upload</h3>
<?php echo form_open_multipart('blog/uploads/edit/' . $upload->id); ?>
<p>File<br>
  <?php $image_url = get_upload_url($upload); ?>
  <input type="file" name="userfile" size="20" class="dropify" data-default-file="<?php echo $image_url; ?>" />
</p>
<p>Title<br>
  <?php echo form_input('title', $upload->title, 'class="form-control"'); ?>
  <?php echo form_error('title'); ?>
</p>
<p>Alt_text<br>
  <?php echo form_input('alt_text', $upload->alt_text, 'class="form-control"'); ?>
  <?php echo form_error('alt_text'); ?>
</p>
<p>Description<br>
  <?php echo form_textarea('description', $upload->description, 'class="form-control"'); ?>
  <?php echo form_error('description'); ?>
</p>
<p>URL<br>
  <?php echo form_input('url', base_url('media/' . $upload->url), 'readonly class="form-control"'); ?>
</p>
<p>
  <?php echo form_submit('submit', 'Update upload', 'class="btn btn-success"'); ?>
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