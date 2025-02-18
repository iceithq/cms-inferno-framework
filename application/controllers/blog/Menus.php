<?php

class Menus extends CI_Controller
{
  var $menu_model;

  var $admin_service;

  var $input;
  var $layout;
  var $form_validation;

  function __construct()
  {
    parent::__construct();
    $this->load->helper(['html', 'url', 'form', 'blog/menu']);
    $this->load->model('blog/menu_model');
    $this->load->library('blog/admin_service');
    $this->load->library('form_validation');
    $this->load->library('layout');
    $this->layout->set('blog/admin/layout');
  }

  function index()
  {
    $data['menus'] = $this->admin_service->get_menus();
    $this->layout->view('blog/admin/menus/index', $data);
  }

  function add()
  {
    if ($this->input->post()) {
      $menu = menu_form();
      menu_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->menu_model->save($menu);
        redirect('blog/menus');
      }
    }
    $this->layout->view('blog/admin/menus/add');
  }

  function edit($id)
  {
    if ($this->input->post()) {
      $menu = menu_form();
      menu_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->menu_model->update($menu, $id);
        redirect('blog/menus');
      }
    }
    $data['menu'] = $this->menu_model->read($id);
    $this->layout->view('blog/admin/menus/edit', $data);
  }

  function delete($id)
  {
    $this->menu_model->delete($id);
    redirect('blog/menus');
  }
}
