<?php

class Admin extends CI_Controller
{
  var $post_view_model;

  var $layout;

  function __construct()
  {
    parent::__construct();
    $this->load->helper(['html', 'url', 'form', 'blog/post_view']);
    $this->load->model('blog/post_view_model');
    $this->load->library('layout');
    $this->layout->set('blog/admin/layout');
  }

  function index()
  {
    $post_views = $this->post_view_model->find_group_by_day();
    list($column_chart_categories, $column_chart_data) = post_views_to_column_chart_data($post_views);
    $data['column_chart_categories'] = $column_chart_categories;
    $data['column_chart_data'] = $column_chart_data;
    $this->layout->view('blog/admin/index', $data);
  }
}
