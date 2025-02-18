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
class Sites extends CI_Controller
{
  var $site_model;

  var $input;
  var $layout;
  var $form_validation;

  function __construct()
  {
    parent::__construct();
    $this->load->model('blog/site_model');
    $this->load->library('form_validation');
    $this->load->library('layout');
    $this->layout->set('blog/admin/layout');
  }

  function index()
  {
    $data['sites'] = $this->site_model->find_all();
    $this->layout->view('blog/admin/sites/index', $data);
  }

  function add()
  {
    if ($this->input->post()) {
      $site = site_form();
      site_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->site_model->save($site);
        redirect('blog/sites');
      }
    }
    $this->layout->view('blog/admin/sites/add');
  }

  function edit($id)
  {
    if ($this->input->post()) {
      $site = site_form();
      site_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->site_model->update($site, $id);
        redirect('blog/sites');
      }
    }
    $data['site'] = $this->site_model->read($id);
    $this->layout->view('blog/admin/sites/edit', $data);
  }

  function delete($id)
  {
    $this->site_model->delete($id);
    redirect('blog/sites');
  }
}
