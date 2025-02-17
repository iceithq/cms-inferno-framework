<?php

function menu_has_sub_menus($menu) {
  return count($menu->sub_menus) > 0;
}

function menus_for_dropdown($menus) {
  $data = array();
  foreach ($menus as $menu) {
    $data[$menu->id] = $menu->name;
  }
  return $data;
}

function menu_form() {
  $obj = &get_instance();
  return array(
    'name' => $obj->input->post('name'),
    'url' => $obj->input->post('url'),
    'sort_order' => $obj->input->post('sort_order'),
  );
}

function menu_form_validate() {
  $obj = &get_instance();
  $obj->form_validation->set_rules('name', 'Name', 'required');
}
