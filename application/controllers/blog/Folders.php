<?php

class Folders extends CI_Controller
{

  var $folder_model;
  var $upload_model;

  var $input;
  var $layout;
  var $form_validation;

  function __construct()
  {
    parent::__construct();
    $this->load->helper(['html', 'url', 'form', 'blog/folder']);
    $this->load->model('blog/folder_model');
    $this->load->model('blog/upload_model');
    $this->load->library('form_validation');
    $this->load->library('layout');
    $this->layout->set('blog/admin/layout');
  }

  function index()
  {
    $data['folders'] = $this->folder_model->find_all();
    $this->layout->view('blog/folders/index', $data);
  }

  function show($id)
  {
    $data['folder'] = $this->folder_model->read($id);
    $data['uploads'] = $this->upload_model->find_by_folder($id);
    $this->layout->view('blog/admin/folders/show', $data);
  }

  function add()
  {
    if ($this->input->post()) {
      $folder = folder_form();
      folder_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->folder_model->save($folder);
        redirect('blog/folders');
      }
    }
    $this->layout->view('blog/admin/folders/add');
  }

  function edit($id)
  {
    if ($this->input->post()) {
      $folder = folder_form();
      folder_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->folder_model->update($folder, $id);
        redirect('blog/folders');
      }
    }
    $data['folder'] = $this->folder_model->read($id);
    $this->layout->view('blog/admin/folders/edit', $data);
  }

  function delete($id)
  {
    $this->folder_model->delete($id);
    redirect('blog/folders');
  }
}
