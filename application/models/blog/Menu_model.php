<?php

/**
 * CMS Inferno Framework
 *
 * A place to share your thoughts and ideas
 *
 * Copyright (c) 2024 ICE IT Solutions. All rights reserved.
 *
 * CMS Inferno Framework and its user interface are protected by trademark
 * and other pending or existing intellectual property
 * rights in the Philippines.
 */
class Menu_model extends CI_Model
{
  function __construct()
  {
    $this->load->database();
  }

  function find_all()
  {
    $this->db->order_by('sort_order');
    return $this->db->get('menus')->result();
  }

  function read($id)
  {
    return $this->db->get_where('menus', array('id' => $id))->row();
  }

  function save($menu)
  {
    $this->db->insert('menus', $menu);
  }

  function update($menu, $id)
  {
    $this->db->update('menus', $menu, array('id' => $id));
  }

  function delete($id)
  {
    $this->db->delete('menus', array('id' => $id));
  }
}
