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
class Site_model extends CI_Model
{
  function __construct()
  {
    $this->load->database();
  }

  function find_all()
  {
    return $this->db->get('sites')->result();
  }

  function read($id)
  {
    return $this->db->get_where('sites', array('id' => $id))->row();
  }

  function save($site)
  {
    $this->db->insert('sites', $site);
  }

  function update($site, $id)
  {
    $this->db->update('sites', $site, array('id' => $id));
  }

  function delete($id)
  {
    $this->db->delete('sites', array('id' => $id));
  }
}
