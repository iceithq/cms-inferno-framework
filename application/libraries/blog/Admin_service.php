<?php

class Admin_service
{
  var $menu_model;
  var $sub_menu_model;

  function __construct()
  {
    $obj = &get_instance();
    $obj->load->model('blog/menu_model');
    $obj->load->model('blog/sub_menu_model');
    $this->menu_model = $obj->menu_model;
    $this->sub_menu_model = $obj->sub_menu_model;
  }

  function get_menus()
  {
    $menus = $this->menu_model->find_all();
    foreach ($menus as $menu) {
      $menu->sub_menus = $this->sub_menu_model->find_by_menu($menu->id);
    }
    return $menus;
  }
}
