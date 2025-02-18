<h4><?php echo $page->title; ?></h4>
<?php if ($this->session->userdata('user_id')): ?>
  <p>
    <?php echo anchor('pages/edit/' . $page->id, 'Edit'); ?>
  </p>
<?php endif; ?>
<?php echo $page->content; ?>