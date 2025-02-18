<h3>Uploads</h3>
<!-- <p>
  <?php echo anchor('uploads/add', 'Add upload', 'class="btn btn-success"'); ?>
</p> -->

<?php echo form_open_multipart('uploads/add_minimal/' . $folder->id); ?>
<p>
  <input type="file" name="userfile" size="20" class="dropify" />
</p>
<p>
  <?php echo form_submit('submit', 'Save upload', 'class="btn btn-success"'); ?>
  <!-- or <?php echo anchor('uploads', 'cancel'); ?> -->
</p>
<?php echo form_close(); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script>
  $(function () {
    $('.dropify').dropify();
  });
</script>

<table class="table table-hover">
  <tr>
    <th></th>
    <th>Title</th>
    <th>Alt text</th>
    <th>Description</th>
    <th></th>
  </tr>
  <?php if (isset($folders)): ?>
    <?php foreach ($folders as $folder): ?>
      <tr>
        <td>📁</td>
        <td>
          <?php echo anchor('folders/show/' . $folder->id, $folder->name); ?>
        </td>
        <td></td>
        <td></td>
        <td>
          <?php echo anchor('folders/edit/' . $folder->id, 'Edit'); ?>
          <a href='javascript:void(0);' onclick="deleteFolder('<?php echo $folder->id; ?>', <?php echo $folder->id; ?>);"
            title="Delete">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
  <?php endif; ?>
  <?php foreach ($uploads as $upload): ?>
    <tr>
      <td>
        <?php if ($upload->url): ?>
          <?php echo img(array('src' => 'media/' . $upload->url, 'width' => 48)); ?>
        <?php endif; ?>
      </td>
      <td>
        <?php echo anchor('media/' . $upload->url, $upload->title); ?>
        <span class="pull-right">
          <a href="javascript:void(0)" class="copy" data-value="<?php echo upload_url($upload); ?>">📄</a>
        </span>
      </td>
      <td>
        <?php echo $upload->alt_text; ?>
      </td>
      <td>
        <?php echo $upload->description; ?>
      </td>
      <td nowrap>
        <?php echo anchor('uploads/edit/' . $upload->id, 'Edit'); ?>
        <a href='javascript:void(0);' onclick="deleteUpload('<?php echo $upload->id; ?>', <?php echo $upload->id; ?>);"
          title="Delete">Delete</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>

<script>
  var url = '<?php echo base_url(); ?>';
  function deleteUpload(name, id) {
    var c = confirm('Do you really want to delete ' + name + '?');
    if (c === true) {
      window.location = url + 'uploads/delete/' + id;
    } else {
      return false;
    }
  }

  $(function () {
    $('.copy').click(function () {
      Clipboard.copy($(this));
    });
  });
</script>