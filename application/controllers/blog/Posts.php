<?php

class Posts extends CI_Controller
{
  var $post_model;

  var $input;
  var $layout;
  var $form_validation;

  function __construct()
  {
    parent::__construct();
    $this->load->helper(['html', 'url', 'form', 'blog/post', 'blog/date']);
    $this->load->model('blog/post_model');
    $this->load->library('layout');
    $this->layout->set('blog/admin/layout');
  }

  function index()
  {
    $data['posts'] = $this->post_model->find_all();
    $this->layout->view('blog/admin/posts/index', $data);
  }

  function add()
  {
    if ($this->input->post()) {
      $post = post_form();
      post_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->post_model->save($post);
        redirect('blog/posts');
      }
    }
    $this->layout->view('blog/admin/posts/add');
  }

  function edit($id)
  {
    if ($this->input->post()) {
      $post = post_form();
      post_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->post_model->update($post, $id);
        redirect('blog/posts');
      }
    }
    $data['post'] = $this->post_model->read($id);
    $this->layout->view('blog/admin/posts/edit', $data);
  }

  function delete($id)
  {
    $this->post_model->delete($id);
    redirect('blog/posts');
  }
}
