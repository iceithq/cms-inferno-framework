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
class Upload_model extends CI_Model
{
  function __construct()
  {
    $this->load->database();
  }

  function find_no_folder()
  {
    $this->db->where("ifnull(folder_id, 0) = 0");
    return $this->db->get('uploads')->result();
  }

  function find_by_folder($folder_id)
  {
    $this->db->where('folder_id', $folder_id);
    return $this->db->get('uploads')->result();
  }

  function read($id)
  {
    return $this->db->get_where('uploads', array('id' => $id))->row();
  }

  function save($upload)
  {
    $this->db->insert('uploads', $upload);
  }

  function update($upload, $id)
  {
    $this->db->update('uploads', $upload, array('id' => $id));
  }

  function delete($id)
  {
    $this->db->delete('uploads', array('id' => $id));
  }
}
