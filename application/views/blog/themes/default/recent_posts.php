<?php foreach ($recent_posts as $post): ?>
  <h4>
    <?php echo anchor('post/' . $post->id . '/' . perma_link($post->title), $post->title); ?>
  </h4>
  <p>
    <?php echo date('F d, Y', strtotime($post->created_at)); ?>
  </p>
  <?php echo $post->content; ?>
<?php endforeach; ?>
