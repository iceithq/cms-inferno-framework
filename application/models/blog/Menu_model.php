<?php

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
