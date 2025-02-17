<h4><?php echo $post->title; ?></h4>
<?php if ($this->session->userdata('user_id')): ?>
    <p><?php echo anchor('blog/posts/edit/' . $post->id, 'Edit'); ?></p>
<?php endif; ?>
<p>
    <?php echo date('F d, Y', strtotime($post->created_at)); ?>
</p>
<?php echo $post->content; ?>