<h3>Edit sub-menu</h3>
<?php echo form_open('blog/sub_menus/edit/' . $sub_menu->id); ?>
<p>Menu<br>
  <?php echo form_dropdown('menu_id', $menus, $sub_menu->menu_id, 'class="form-control"'); ?>
  <?php echo form_error('menu_id'); ?>
</p>
<p>Name<br>
  <?php echo form_input('name', $sub_menu->name, 'class="form-control"'); ?>
  <?php echo form_error('name'); ?>
</p>
<p>URL<br>
  <?php echo form_input('url', $sub_menu->url, 'class="form-control"'); ?>
  <?php echo form_error('url'); ?>
</p>
<p>Sort order<br>
  <?php echo form_input('sort_order', $sub_menu->sort_order, 'class="form-control"'); ?>
  <?php echo form_error('sort_order'); ?>
</p>
<p>
  <?php echo form_submit('submit', 'Save changes', 'class="btn btn-success"'); ?>
  or <?php echo anchor('menus', 'cancel'); ?>
</p>
<?php echo form_close(); ?>