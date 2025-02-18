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
class Home extends CI_Controller
{
  var $post_model;
  var $page_model;
  var $post_view_model;

  var $admin_service;

  var $layout;
  var $input;
  var $form_validation;
  var $session;

  function __construct()
  {
    parent::__construct();
    $this->load->helper(['html', 'url', 'form', 'blog/date', 'blog/post', 'blog/post_view']);
    $this->load->model('blog/post_model');
    $this->load->model('blog/page_model');
    $this->load->model('blog/post_view_model');
    $this->load->library('blog/admin_service');
    $this->load->library('session');
    $this->load->library('layout');
    $this->layout->theme('blog/themes/default');
    $this->layout->set('layout');
  }

  function index()
  {
    $data['menus'] = $this->admin_service->get_menus();
    $this->layout->view('home', $data);
  }

  function blog()
  {
    $data['menus'] = $this->admin_service->get_menus();
    $this->layout->view('blog', $data);
  }

  function post($id, $perma = '')
  {
    $post_view = post_view_form($id);
    $this->post_view_model->save($post_view);
    $data['post'] = $this->post_model->read($id);
    $data['menus'] = $this->admin_service->get_menus();
    $this->layout->view('post', $data);
  }

  function page($id, $perma = '')
  {
    $data['page'] = $this->page_model->read($id);
    $data['menus'] = $this->admin_service->get_menus();
    $this->layout->view('page', $data);
  }
}
