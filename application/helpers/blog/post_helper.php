<?php

function perma_link($title)
{
  // Convert special characters to ASCII
  $title = iconv('UTF-8', 'ASCII//TRANSLIT', $title);
  // Replace non-alphanumeric characters with dashes
  $title = preg_replace('/[^a-zA-Z0-9]/', '-', $title);
  // Remove any consecutive dashes
  $title = preg_replace('/-+/', '-', $title);
  // Convert the title to lowercase
  $title = strtolower($title);
  // Remove leading and trailing dashes
  $title = trim($title, '-');
  return $title;
}

function recent_posts()
{
  $obj = &get_instance();
  $recent_posts = $obj->post_model->find_top_5();
  $data['recent_posts'] = $recent_posts;
  load_view('recent_posts', $data);
}

function posts()
{
  $obj = &get_instance();
  $posts = $obj->post_model->find_all(); // TODO:
  $data['posts'] = $posts;
  load_view('posts', $data);
}

function post_form()
{
  $obj = &get_instance();
  return array(
    'title' => $obj->input->post('title'),
    'teaser' => $obj->input->post('teaser'),
    'content' => $obj->input->post('content'),
    'created_at' => $obj->input->post('created_at'),
  );
}

function post_form_validate()
{
  $obj = &get_instance();
  $obj->load->library('form_validation');
  $obj->form_validation->set_rules('title', 'Title', 'required');
  $obj->form_validation->set_rules('content', 'Content', 'required');
  //  $obj->form_validation->set_rules('created_at', 'Created_at', 'required');
}
