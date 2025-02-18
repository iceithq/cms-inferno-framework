<?php

class Comments extends CI_Controller
{
  var $comment_model;

  var $input;
  var $layout;
  var $form_validation;

  function __construct()
  {
    parent::__construct();
    $this->load->helper(['html', 'url', 'form']);
    $this->load->model('blog/comment_model');
    $this->load->library('layout');
    $this->layout->set('blog/admin/layout');
  }

  function index()
  {
    $data['comments'] = $this->comment_model->find_all();
    $this->layout->view('blog/admin/comments/index', $data);
  }

  function add()
  {
    if ($this->input->post()) {
      $comment = comment_form();
      comment_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->comment_model->save($comment);
        redirect('blog/comments');
      }
    }
    $this->layout->view('blog/comments/add');
  }

  function edit($id)
  {
    if ($this->input->post()) {
      $comment = comment_form();
      comment_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->comment_model->update($comment, $id);
        redirect('blog/comments');
      }
    }
    $data['comment'] = $this->comment_model->read($id);
    $this->layout->view('blog/admin/comments/edit', $data);
  }

  function delete($id)
  {
    $this->comment_model->delete($id);
    redirect('blog/comments');
  }
}
