<?php

class Sites extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('site_model');
  }

  function index() {
    $data['sites'] = $this->site_model->find_all();
    $this->layout->view('sites/index', $data);
  }

  function add() {
    if ($this->input->post()) {
      $site = site_form();
      site_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->site_model->save($site);
        redirect('sites');
      }
    }
    $this->layout->view('sites/add');
  }

  function edit($id) {
    if ($this->input->post()) {
      $site = site_form();
      site_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->site_model->update($site, $id);
        redirect('sites');
      }
    }
    $data['site'] = $this->site_model->read($id);
    $this->layout->view('sites/edit', $data);
  }

  function delete($id) {
    $this->site_model->delete($id);
    redirect('sites');
  }

}