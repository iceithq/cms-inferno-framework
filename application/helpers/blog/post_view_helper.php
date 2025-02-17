<?php

function post_views_to_column_chart_data($post_views) {
  $categories = array();
  $data = array();
  foreach ($post_views as $post_view) {
    $categories[] = date('M d', strtotime($post_view->date));
    $data[] = (int)$post_view->total;
  }
  return array($categories, $data);
}

function post_view_form($post_id) {
  $obj = &get_instance();
  return array(
    'post_id' => $post_id,
    'ip_address' => $obj->input->ip_address(),
    'created_at' => now(),
  );
}

function post_view_form_validate() {
  $obj = &get_instance();
  $obj->form_validation->set_rules('post_id', 'Post_id', 'required');
  $obj->form_validation->set_rules('ip_address', 'Ip_address', 'required');
  $obj->form_validation->set_rules('created_at', 'Created_at', 'required');
}
