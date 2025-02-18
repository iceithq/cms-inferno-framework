<h3>Folders</h3>
<p><?php echo anchor('blog/folders/add', 'Add Folder', 'class="btn btn-success"'); ?></p>
<table class="table table-hover">
  <tr>
    <th>Name</th>
    <th>Created</th>
    <th></th>
  </tr>
  <?php foreach ($folders as $folder): ?>
    <tr>
      <td><?php echo $folder->name; ?></td>
      <td><?php echo $folder->created_at; ?></td>
      <td>
        <?php echo anchor('blog/folders/edit/' . $folder->id, 'Edit'); ?>
        <a href='javascript:void(0);' onclick="deleteFolder('<?php echo $folder->id; ?>', <?php echo $folder->id; ?>);" title="Delete">Delete</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>

<script>
  var url = '<?php echo base_url(); ?>';

  function deleteFolder(name, id) {
    var c = confirm('Do you really want to delete ' + name + '?');
    if (c === true) {
      window.location = url + 'blog/folders/delete/' + id;
    } else {
      return false;
    }
  }
</script>