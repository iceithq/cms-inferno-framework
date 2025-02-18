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
class Pages extends CI_Controller
{
  var $page_model;

  var $input;
  var $layout;
  var $form_validation;

  function __construct()
  {
    parent::__construct();
    $this->load->helper(['html', 'url', 'form', 'blog/page', 'blog/date']);
    $this->load->model('blog/page_model');
    $this->load->library('form_validation');
    $this->load->library('layout');
    $this->layout->set('blog/admin/layout');
  }

  function index()
  {
    $data['pages'] = $this->page_model->find_all();
    $this->layout->view('blog/admin/pages/index', $data);
  }

  function add()
  {
    if ($this->input->post()) {
      $page = page_form();
      page_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->page_model->save($page);
        redirect('blog/pages');
      }
    }
    $this->layout->view('blog/admin/pages/add');
  }

  function edit($id)
  {
    if ($this->input->post()) {
      $page = page_form();
      page_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->page_model->update($page, $id);
        redirect('blog/pages');
      }
    }
    $data['page'] = $this->page_model->read($id);
    $this->layout->view('blog/admin/pages/edit', $data);
  }

  function delete($id)
  {
    $this->page_model->delete($id);
    redirect('blog/pages');
  }
}
