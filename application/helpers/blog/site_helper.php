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
function site_form()
{
  $obj = &get_instance();
  return array(
    'title' => $obj->input->post('title'),
    'description' => $obj->input->post('description'),
  );
}

function site_form_validate()
{
  $obj = &get_instance();
  $obj->form_validation->set_rules('title', 'Title', 'required');
  // $obj->form_validation->set_rules('description', 'Description', 'required');
}
