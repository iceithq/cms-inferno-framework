<h3>Posts</h3>
<p>
  <?php echo anchor('blog/posts/add', 'New post', 'class="btn btn-success"'); ?>
</p>
<table class="table table-hover">
  <tr>
    <th></th>
    <th>Title</th>
    <th></th>
    <th>Created</th>
    <th></th>
  </tr>
  <?php foreach ($posts as $post): ?>
    <tr>
      <td>
        <?php if ($post->is_featured == 1): ?>
          <i class="fa fa-star" aria-hidden="true"></i>
        <?php else: ?>
          <i class="fa fa-star-o" aria-hidden="true"></i>
        <?php endif; ?>
      </td>
      <td>
        <?php echo anchor('blog/posts/edit/' . $post->id, $post->title); ?>
      </td>
      <td>
        <?php echo anchor('blog/post/' . $post->id . '/' . perma_link($post->title), '👁️', 'target="_blank"'); ?>
      </td>
      <td>
        <?php echo $post->created_at; ?>
      </td>
      <td nowrap>
        <a href='javascript:void(0);' onclick="deletePost('<?php echo $post->id; ?>', <?php echo $post->id; ?>);"
          title="Delete">Delete</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>

<script>
  var url = '<?php echo base_url(); ?>';

  function deletePost(name, id) {
    var c = confirm('Do you really want to delete ' + name + '?');
    if (c === true) {
      window.location = url + '/blog/posts/delete/' + id;
    } else {
      return false;
    }
  }
</script>