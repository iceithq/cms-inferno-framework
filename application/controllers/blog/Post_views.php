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
class Post_views extends CI_Controller
{
  var $post_view_model;

  var $input;
  var $layout;
  var $form_validation;

  function __construct()
  {
    parent::__construct();
    $this->load->model('blog/post_view_model');
  }

  function index()
  {
    $data['post_views'] = $this->post_view_model->find_all();
    $this->layout->view('blog/admin/post_views/index', $data);
  }

  function add()
  {
    if ($this->input->post()) {
      $post_view = post_view_form();
      post_view_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->post_view_model->save($post_view);
        redirect('blog/post_views');
      }
    }
    $this->layout->view('blog/admin/post_views/add');
  }

  function edit($id)
  {
    if ($this->input->post()) {
      $post_view = post_view_form();
      post_view_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->post_view_model->update($post_view, $id);
        redirect('blog/post_views');
      }
    }
    $data['post_view'] = $this->post_view_model->read($id);
    $this->layout->view('blog/admin/post_views/edit', $data);
  }

  function delete($id)
  {
    $this->post_view_model->delete($id);
    redirect('blog/post_views');
  }
}
