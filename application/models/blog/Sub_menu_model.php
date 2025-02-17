<?php

class Sub_menu_model extends CI_Model
{
  function __construct()
  {
    $this->load->database();
  }

  function find_by_menu($menu_id)
  {
    $this->db->where('menu_id', $menu_id);
    return $this->db->get('sub_menus')->result();
  }

  function read($id)
  {
    return $this->db->get_where('sub_menus', array('id' => $id))->row();
  }

  function save($sub_menu)
  {
    $this->db->insert('sub_menus', $sub_menu);
  }

  function update($sub_menu, $id)
  {
    $this->db->update('sub_menus', $sub_menu, array('id' => $id));
  }

  function delete($id)
  {
    $this->db->delete('sub_menus', array('id' => $id));
  }
}
