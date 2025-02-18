<h3>Edit menu</h3>
<?php echo form_open('blog/menus/edit/' . $menu->id); ?>
<p>Name<br>
  <?php echo form_input('name', $menu->name, 'class="form-control"'); ?>
  <?php echo form_error('name'); ?>
</p>
<p>URL<br>
  <?php echo form_input('url', $menu->url, 'class="form-control"'); ?>
  <?php echo form_error('url'); ?>
</p>
<p>Sort order<br>
  <?php echo form_input('sort_order', $menu->sort_order, 'class="form-control"'); ?>
  <?php echo form_error('sort_order'); ?>
</p>
<p>
  <?php echo form_submit('submit', 'Update menu', 'class="btn btn-success"'); ?>
  or <?php echo anchor('blog/menus', 'cancel'); ?>
</p>
<?php echo form_close(); ?>