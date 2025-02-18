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
class Site extends CI_Controller
{
  var $site_model;

  var $input;
  var $layout;
  var $form_validation;
  var $session;

  function __construct()
  {
    parent::__construct();
    $this->load->helper(['html', 'url', 'form', 'blog/site']);
    $this->load->model('blog/site_model');
    $this->load->library('form_validation');
    $this->load->library('layout');
    $this->layout->set('blog/admin/layout');
  }

  function settings()
  {
    if ($this->input->post()) {
      $site = site_form();
      site_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->site_model->update($site, $this->session->userdata('site-id'));
        $this->session->set_flashdata('message', 'Your site has been updated successfully!');
        redirect('site/settings');
      }
    }
    $data['site'] = $this->site_model->read($this->session->userdata('site_id'));
    $data['message'] = $this->session->flashdata('message');
    $this->layout->view('blog/admin/site/settings', $data);
  }
}
