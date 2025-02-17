<?php

class Upload_model extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function find_no_folder() {
    $this->db->where("ifnull(folder_id, 0) = 0");
    return $this->db->get('uploads')->result();
  }

  function find_by_folder($folder_id) {
    $this->db->where('folder_id', $folder_id);
    return $this->db->get('uploads')->result();
  }

  function read($id) {
    return $this->db->get_where('uploads', array('id' => $id))->row();
  }

  function save($upload) {
    $this->db->insert('uploads', $upload);
  }

  function update($upload, $id) {
    $this->db->update('uploads', $upload, array('id' => $id));
  }

  function delete($id) {
    $this->db->delete('uploads', array('id' => $id));
  }

}