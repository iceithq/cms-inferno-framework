<?php

class Post_views extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('post_view_model');
  }

  function index() {
    $data['post_views'] = $this->post_view_model->find_all();
    $this->layout->view('post_views/index', $data);
  }

  function add() {
    if ($this->input->post()) {
      $post_view = post_view_form();
      post_view_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->post_view_model->save($post_view);
        redirect('post_views');
      }
    }
    $this->layout->view('post_views/add');
  }

  function edit($id) {
    if ($this->input->post()) {
      $post_view = post_view_form();
      post_view_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->post_view_model->update($post_view, $id);
        redirect('post_views');
      }
    }
    $data['post_view'] = $this->post_view_model->read($id);
    $this->layout->view('post_views/edit', $data);
  }

  function delete($id) {
    $this->post_view_model->delete($id);
    redirect('post_views');
  }

}