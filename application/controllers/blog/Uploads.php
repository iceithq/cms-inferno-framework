<?php

class Uploads extends CI_Controller
{
  var $upload_model;
  var $folder_model;

  var $input;
  var $layout;
  var $form_validation;
  var $upload;

  function __construct()
  {
    parent::__construct();
    $this->load->model('blog/upload_model');
    $this->load->model('blog/folder_model');
  }

  function index()
  {
    $data['folders'] = $this->folder_model->find_all();
    $data['uploads'] = $this->upload_model->find_no_folder();
    $this->layout->view('blog/admin/uploads/index', $data);
  }

  function add()
  {
    if ($this->input->post()) {
      $upload = upload_form();
      upload_form_validate();
      $this->load->library('upload', upload_config());
      if ($this->form_validation->run() != FALSE) {
        if ($this->upload->do_upload('userfile')) {
          $upload_data = $this->upload->data();
          $image_url = $upload_data['file_name'];
          $upload['url'] = $image_url;
          $image_file = FCPATH . 'uploads/' . $image_url;
          // resize_image($image_file, $upload_data['file_type']);
        } else {
          // print_pre($this->upload->display_errors());
        }
        // print_pre($upload);
        $this->upload_model->save($upload);
        redirect('blog/uploads');
      } else {
        print_pre(validation_errors());
      }
    }
    $this->layout->view('blog/admin/uploads/add');
  }

  function add_minimal($folder_id)
  {
    if ($this->input->post()) {
      $upload = upload_minimal_form($folder_id);
      // upload_form_validate();
      $this->load->library('upload', upload_config());
      // if ($this->form_validation->run() != FALSE) {
      if ($this->upload->do_upload('userfile')) {
        $upload_data = $this->upload->data();
        $image_url = $upload_data['file_name'];
        $upload['url'] = $image_url;
        $upload['title'] = $image_url;
        $image_file = FCPATH . 'media/' . $image_url;
        // resize_image($image_file, $upload_data['file_type']);

        $this->upload_model->save($upload);
        redirect('blog/folders/show/' . $folder_id);
      } else {
        // print_pre($this->upload->display_errors());
      }
      // print_pre($upload);
      // $this->upload_model->save($upload);
      // redirect('uploads');
      // } else {
      //   print_pre(validation_errors());
      // }
    }
    $this->layout->view('blog/admin/uploads/add');
  }

  function edit($id)
  {
    if ($this->input->post()) {
      $upload = upload_form();
      upload_form_validate();
      if ($this->form_validation->run() != FALSE) {
        $this->upload_model->update($upload, $id);
        redirect('blog/uploads');
      }
    }
    $data['upload'] = $this->upload_model->read($id);
    $this->layout->view('blog/admin/uploads/edit', $data);
  }

  function delete($id)
  {
    $this->upload_model->delete($id);
    redirect('blog/uploads');
  }
}
