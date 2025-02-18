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
function sub_menu_form()
{
  $obj = &get_instance();
  return array(
    'menu_id' => $obj->input->post('menu_id'),
    'name' => $obj->input->post('name'),
    'url' => $obj->input->post('url'),
    'sort_order' => $obj->input->post('sort_order'),
  );
}

function sub_menu_form_validate()
{
  $obj = &get_instance();
  $obj->form_validation->set_rules('menu_id', 'Menu_id', 'required');
  $obj->form_validation->set_rules('name', 'Name', 'required');
  // $obj->form_validation->set_rules('url', 'Url', 'required');
  // $obj->form_validation->set_rules('sort_order', 'Sort_order', 'required');
}
