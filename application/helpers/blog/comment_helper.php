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
function comment_form()
{
  $obj = &get_instance();
  return array(
    'post_id' => $obj->input->post('post_id'),
    'comments' => $obj->input->post('comments'),
    'created_at' => $obj->input->post('created_at'),
    'created_by' => $obj->input->post('created_by'),
  );
}

function comment_form_validate()
{
  $obj = &get_instance();
  $obj->form_validation->set_rules('post_id', 'Post_id', 'required');
  $obj->form_validation->set_rules('comments', 'Comments', 'required');
  $obj->form_validation->set_rules('created_at', 'Created_at', 'required');
  $obj->form_validation->set_rules('created_by', 'Created_by', 'required');
}
