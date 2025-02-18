<h3>Comments</h3>
<!-- <p><?php echo anchor('comments/add', 'Add Comment'); ?></p> -->
<table class="table table-hover">
  <tr>
    <th>Comments</th>
    <th>Created</th>
    <th></th>
  </tr>
  <?php foreach ($comments as $comment): ?>
  <tr>
    <td><?php echo $comment->comments; ?></td>
    <td><?php echo $comment->created_at; ?></td>
    <td nowrap>
      <?php echo anchor('comments/edit/' . $comment->id, 'Edit'); ?>
      <a href='javascript:void(0);' onclick="deleteComment('<?php echo $comment->id; ?>', <?php echo $comment->id; ?>);" title="Delete">Delete</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>

<script>
  var url = '<?php echo base_url(); ?>';
  function deleteComment(name, id) {
    var c = confirm('Do you really want to delete ' + name + '?');
    if (c === true) {
      window.location = url + 'comments/delete/' + id;
    } else {
      return false;
    }
  }
</script>
