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
class Folder_model extends CI_Model
{
  function __construct()
  {
    $this->load->database();
  }

  function find_all()
  {
    return $this->db->get('folders')->result();
  }

  function read($id)
  {
    return $this->db->get_where('folders', array('id' => $id))->row();
  }

  function save($folder)
  {
    $this->db->set('created_at', now());
    $this->db->insert('folders', $folder);
  }

  function update($folder, $id)
  {
    $this->db->update('folders', $folder, array('id' => $id));
  }

  function delete($id)
  {
    $this->db->delete('folders', array('id' => $id));
  }
}
