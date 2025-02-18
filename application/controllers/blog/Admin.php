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
