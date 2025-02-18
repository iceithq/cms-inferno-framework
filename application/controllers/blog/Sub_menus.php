<?php

class Sub_menus extends CI_Controller
{

  var $sub_menu_model;
  var $menu_model;

  var $input;
  var $layout;
  var $form_validation;

  function __construct()
  {
    parent::__construct();
    $this->load->helper(['html', 'url', 'form', 'blog/menu', 'blog/sub_menu']);
    $this->load->model('blog/sub_menu_model');
    $this->load->model('blog/menu_model');
    $this->load->library('form_validation');
    $this->load->library('layout');
    $this->layout->set('blog/admin/layout');
  }

  // function index() {
  //   $data['sub_menus'] = $this->sub_menu_model->find_all();
  //   $this->layout->view('sub_menus/index', $data);
  // }

  function add()
  {
    if ($this->input->post()) {
      $sub_menu = sub_menu_form();
      sub_menu_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->sub_menu_model->save($sub_menu);
        redirect('blog/menus');
      }
    }
    $menus = $this->menu_model->find_all();
    $data['menus'] = menus_for_dropdown($menus);
    $this->layout->view('blog/admin/sub_menus/add', $data);
  }

  function edit($id)
  {
    if ($this->input->post()) {
      $sub_menu = sub_menu_form();
      sub_menu_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->sub_menu_model->update($sub_menu, $id);
        redirect('blog/menus');
      }
    }
    $data['sub_menu'] = $this->sub_menu_model->read($id);
    $menus = $this->menu_model->find_all();
    $data['menus'] = menus_for_dropdown($menus);
    $this->layout->view('blog/admin/sub_menus/edit', $data);
  }

  function delete($id)
  {
    $this->sub_menu_model->delete($id);
    redirect('blog/sub_menus');
  }
}
