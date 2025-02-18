<h3>Add sub-menu</h3>
<?php echo form_open('blog/sub_menus/add'); ?>
<p>Menu<br>
  <?php echo form_dropdown('menu_id', $menus, $this->input->post('menu_id'), 'class="form-control"'); ?>
  <?php echo form_error('menu_id'); ?>
</p>
<p>Name<br>
  <?php echo form_input('name', $this->input->post('name'), 'class="form-control"'); ?>
  <?php echo form_error('name'); ?>
</p>
<p>URL<br>
  <?php echo form_input('url', $this->input->post('url'), 'class="form-control"'); ?>
  <?php echo form_error('url'); ?>
</p>
<p>Sort order<br>
  <?php echo form_input('sort_order', $this->input->post('sort_order'), 'class="form-control"'); ?>
  <?php echo form_error('sort_order'); ?>
</p>
<p>
  <?php echo form_submit('submit', 'Save changes', 'class="btn btn-success"'); ?>
  or <?php echo anchor('blog/menus', 'cancel'); ?>
</p>
<?php echo form_close(); ?>