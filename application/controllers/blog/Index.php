<?php

class Index extends CI_Controller
{
    var $post_model;
    var $page_model;
    var $post_view_model;

    var $admin_service;

    var $layout;
    var $input;
    var $form_validation;
    var $session;

    function __construct()
    {
        parent::__construct();
        $this->load->helper(['html', 'url', 'form', 'blog/date', 'blog/post', 'blog/post_view']);
        $this->load->model('blog/post_model');
        $this->load->model('blog/page_model');
        $this->load->model('blog/post_view_model');
        $this->load->library('blog/admin_service');
        $this->load->library('session');
        $this->load->library('layout');
        $this->layout->theme('blog/themes/default');
        $this->layout->set('layout');
    }

    function index()
    {
        $data['menus'] = $this->admin_service->get_menus();
        $this->layout->view('home', $data);
    }
}
