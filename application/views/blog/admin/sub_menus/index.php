<h3>Sub_menus</h3>
<p><?php echo anchor('blog/sub_menus/add', 'Add sub-menu'); ?></p>
<table>
  <tr>
    <th>Id</th>
    <th>Menu_id</th>
    <th>Name</th>
    <th>Url</th>
    <th>Sort_order</th>
    <th></th>
  </tr>
  <?php foreach ($sub_menus as $sub_menu): ?>
    <tr>
      <td><?php echo $sub_menu->id; ?></td>
      <td><?php echo $sub_menu->menu_id; ?></td>
      <td><?php echo $sub_menu->name; ?></td>
      <td><?php echo $sub_menu->url; ?></td>
      <td><?php echo $sub_menu->sort_order; ?></td>
      <td>
        <?php echo anchor('blog/sub_menus/edit/' . $sub_menu->id, 'Edit'); ?>
        <a href='javascript:void(0);' onclick="deleteSub_menu('<?php echo $sub_menu->id; ?>', <?php echo $sub_menu->id; ?>);" title="Delete">Delete</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>

<script>
  var url = '<?php echo base_url(); ?>';

  function deleteSub_menu(name, id) {
    var c = confirm('Do you really want to delete ' + name + '?');
    if (c === true) {
      window.location = url + 'blog/sub_menus/delete/' + id;
    } else {
      return false;
    }
  }
</script>