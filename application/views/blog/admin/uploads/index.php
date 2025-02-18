<h3>Uploads</h3>
<p>
  <?php echo anchor('blog/folders/add', 'Add folder', 'class="btn btn-success"'); ?>
  <?php echo anchor('blog/uploads/add', 'Add upload', 'class="btn btn-success"'); ?>
</p>
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
          <?php echo anchor('blog/folders/show/' . $folder->id, $folder->name); ?>
        </td>
        <td></td>
        <td></td>
        <td>
          <?php echo anchor('blog/folders/edit/' . $folder->id, 'Edit'); ?>
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
        <?php echo anchor('media/' . $upload->url, $upload->title, 'target="_blank"'); ?>
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
        <?php echo anchor('blog/uploads/edit/' . $upload->id, 'Edit'); ?>
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
      window.location = url + 'blog/uploads/delete/' + id;
    } else {
      return false;
    }
  }

  $(function() {
    $('.copy').click(function() {
      Clipboard.copy($(this));
    });
  });
</script>