<?php

class Folder_model extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function find_all() {
    return $this->db->get('folders')->result();
  }

  function read($id) {
    return $this->db->get_where('folders', array('id' => $id))->row();
  }

  function save($folder) {
    $this->db->set('created_at', now());
    $this->db->insert('folders', $folder);
  }

  function update($folder, $id) {
    $this->db->update('folders', $folder, array('id' => $id));
  }

  function delete($id) {
    $this->db->delete('folders', array('id' => $id));
  }

}