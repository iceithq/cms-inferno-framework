<h3>Pages</h3>
<p><?php echo anchor('blog/pages/add', 'New page', 'class="btn btn-success"'); ?></p>
<table class="table table-hover">
  <tr>
    <th>Title</th>
    <th>Created</th>
    <th></th>
  </tr>
  <?php foreach ($pages as $page): ?>
    <tr>
      <td><?php echo anchor('blog/home/page/' . $page->id, $page->title); ?></td>
      <td><?php echo $page->created_at; ?></td>
      <td nowwrap>
        <?php echo anchor('blog/pages/edit/' . $page->id, 'Edit', 'id="edit_page_' . $page->id . '"'); ?>
        <a href='javascript:void(0);' onclick="deletePage('<?php echo $page->id; ?>', <?php echo $page->id; ?>);" title="Delete">Delete</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>

<script>
  var url = '<?php echo base_url(); ?>';

  function deletePage(name, id) {
    var c = confirm('Do you really want to delete ' + name + '?');
    if (c === true) {
      window.location = url + 'blog/pages/delete/' + id;
    } else {
      return false;
    }
  }
</script>