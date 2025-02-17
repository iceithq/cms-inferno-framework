<?php

function page_form() {
  $obj = &get_instance();
  return array(
    'title' => $obj->input->post('title'),
    'content' => $obj->input->post('content'),
//    'created_at' => $obj->input->post('created_at'),
  );
}

function page_form_validate() {
  $obj = &get_instance();
  $obj->form_validation->set_rules('title', 'Title', 'required');
  $obj->form_validation->set_rules('content', 'Content', 'required');
//  $obj->form_validation->set_rules('created_at', 'Created_at', 'required');
}
