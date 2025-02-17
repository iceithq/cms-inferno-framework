<?php

class Post_view_model extends CI_Model
{
  function __construct()
  {
    $this->load->database();
  }

  function find_all()
  {
    return $this->db->get('post_views')->result();
  }

  function find_group_by_day()
  {
    $query = "
      select date(created_at) date, count(id) total
      from post_views
      group by date(created_at)";
    return $this->db->query($query)->result();
  }

  function read($id)
  {
    return $this->db->get_where('post_views', array('id' => $id))->row();
  }

  function save($post_view)
  {
    $this->db->insert('post_views', $post_view);
  }

  function update($post_view, $id)
  {
    $this->db->update('post_views', $post_view, array('id' => $id));
  }

  function delete($id)
  {
    $this->db->delete('post_views', array('id' => $id));
  }
}
