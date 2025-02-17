<?php

function site_form() {
  $obj = &get_instance();
  return array(
    'title' => $obj->input->post('title'),
    'description' => $obj->input->post('description'),
  );
}

function site_form_validate() {
  $obj = &get_instance();
  $obj->form_validation->set_rules('title', 'Title', 'required');
  // $obj->form_validation->set_rules('description', 'Description', 'required');
}
