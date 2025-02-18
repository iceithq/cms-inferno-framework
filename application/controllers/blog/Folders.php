<?php

class Folders extends CI_Controller {

  var $folder_model;
  var $upload_model;

  var $input;
  var $layout;
  var $form_validation;

  function __construct() {
    parent::__construct();
    $this->load->model('folder_model');
    $this->load->model('upload_model');
  }

  function index() {
    $data['folders'] = $this->folder_model->find_all();
    $this->layout->view('folders/index', $data);
  }

  function show($id) {
    $data['folder'] = $this->folder_model->read($id);
    $data['uploads'] = $this->upload_model->find_by_folder($id);
    $this->layout->view('folders/show', $data);
  }

  function add() {
    if ($this->input->post()) {
      $folder = folder_form();
      folder_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->folder_model->save($folder);
        redirect('folders');
      }
    }
    $this->layout->view('folders/add');
  }

  function edit($id) {
    if ($this->input->post()) {
      $folder = folder_form();
      folder_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->folder_model->update($folder, $id);
        redirect('folders');
      }
    }
    $data['folder'] = $this->folder_model->read($id);
    $this->layout->view('folders/edit', $data);
  }

  function delete($id) {
    $this->folder_model->delete($id);
    redirect('folders');
  }

}