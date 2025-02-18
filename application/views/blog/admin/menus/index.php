<h3>Menus</h3>
<p>
  <?php echo anchor('blog/menus/add', 'Add menu', 'class="btn btn-success"'); ?>
  <?php echo anchor('blog/sub_menus/add', 'Add sub-menu', 'class="btn btn-success"'); ?>
</p>
<table class="table table-hover">
  <tr>
    <th colspan="2">Name</th>
    <th>URL</th>
    <th></th>
  </tr>
  <?php foreach ($menus as $menu): ?>
    <tr>
      <td colspan="2"><?php echo $menu->name; ?></td>
      <td>
        <?php if ($menu->url): ?>
          <?php echo anchor($menu->url, $menu->url, 'target="_blank"'); ?>
        <?php else: ?>
          <?php echo $menu->url; ?>
        <?php endif; ?>
      </td>
      <td>
        <?php echo anchor('blog/menus/edit/' . $menu->id, 'Edit'); ?>
        <a href='javascript:void(0);' onclick="deleteMenu('<?php echo $menu->id; ?>', <?php echo $menu->id; ?>);" title="Delete">Delete</a>
      </td>
    </tr>
    <?php if (menu_has_sub_menus($menu)): ?>
      <?php foreach ($menu->sub_menus as $sub_menu): ?>
        <tr>
          <td></td>
          <td><?php echo $sub_menu->name; ?></td>
          <td>
            <?php if ($sub_menu->url): ?>
              <?php echo anchor($sub_menu->url, $sub_menu->url, 'target="_blank"'); ?>
            <?php else: ?>
              <?php echo $sub_menu->url; ?>
            <?php endif; ?>
          </td>
          <td>
            <?php echo anchor('blog/sub_menus/edit/' . $sub_menu->id . '/' . $sub_menu->menu_id, 'Edit'); ?>
            <a href='javascript:void(0);' onclick="deleteSubMenu('<?php echo $sub_menu->id; ?>', <?php echo $sub_menu->id; ?>);" title="Delete">Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php endif; ?>
  <?php endforeach; ?>
</table>

<script>
  var url = '<?php echo base_url(); ?>';

  function deleteMenu(name, id) {
    var c = confirm('Do you really want to delete ' + name + '?');
    if (c === true) {
      window.location = url + 'blog/menus/delete/' + id;
    } else {
      return false;
    }
  }
</script>