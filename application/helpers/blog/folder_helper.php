<?php

function folder_form() {
  $obj = &get_instance();
  return array(
    'name' => $obj->input->post('name'),
    // 'created_at' => $obj->input->post('created_at'),
  );
}

function folder_form_validate() {
  $obj = &get_instance();
  $obj->form_validation->set_rules('name', 'Name', 'required');
  // $obj->form_validation->set_rules('created_at', 'Created_at', 'required');
}