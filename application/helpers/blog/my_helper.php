<?php

function my_str_starts_with($val, $string) {
  return (strpos($string, $val) === 0);
}

function validation_errors_array() {
  $obj = &get_instance();
  $validation_errors = $obj->form_validation->error_array();
  return $validation_errors;
}

function ifempty($value, $default) {
  return $value ? $value : $default;
}

function set_output_profiler($enable_profiler) {
  $obj = &get_instance();
  if ($enable_profiler) {
    header('Content-Type: text/html');
    $obj->output->enable_profiler($enable_profiler);
  }

}

function load_view_if($condition, $view) {
  if ($condition) {
    $obj = &get_instance();
    $obj->load->view($view);
  }
}

function echo_if($condition, $message, $prefix = '', $suffix = '') {
  if ($condition) {
    echo $prefix . $message . $suffix;
  }
}

function is_environment_development() {
  return ENVIRONMENT == 'development'
    || ENVIRONMENT == 'bagdok.online.test';
}

function beautiful_number_format($number, $decimal) {
  $limit = 1000000;
  if ($number > $limit) {
    $n = round($number / $limit);
    return $n . 'M';
  }
  return number_format($number, $decimal);
}

function random_numbers($start, $end, $quantity) {
  $numbers = array();
  for ($i=0; $i<$quantity/($end-$start); $i++) {
    $numbers = array_merge($numbers, range($start, $end));
  }
  shuffle($numbers);
  return array_slice($numbers,0,$quantity);
}

function phone($href, $text = '') {
  $text = $text ? $text : $href;
  return '<a href="tel:' . $href . '">' . $text . '</a>';
}

function form_email($name, $value, $attributes) {
  return '<input type="email" name="' . $name . '" value="' . $value . '" ' . $attributes . '>';
}

function form_number($name, $value, $attributes) {
  return '<input type="number" name="' . $name . '" value="' . $value . '" ' . $attributes . '>';
}

function load_view($view, $data = null) {
  $obj = &get_instance();
  $obj->load->view(get_theme() . '/' . $view, $data);
}

function to_object($array) {
  return json_decode(json_encode($array));
}

function redirect_if($condition, $url) {
  if ($condition) {
    redirect($url);
  }
}

function guid() {
  if (function_exists('com_create_guid') === true) {
    return trim(com_create_guid(), '{}');
  }

  return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}

function app_version() {
  $line = fgets(fopen(FCPATH . '/changelog.txt', 'r'));
  return $line;
}

function email_send($from, $to, $subject, $message) {
  if ($from && $to) {
    $obj = &get_instance();
    $obj->load->library('email');

    $obj->email->from($from, '');
    $obj->email->to($to);

    $obj->email->subject($subject);
    $obj->email->message($message);

    $obj->email->send();
  }
}

function resize_image($filename, $file_type) {
  // The file
  // $filename = FCPATH . 'public/themes/simple/img/test.jpg';
  $filename_thumbnail = $filename; //FCPATH . 'public/themes/simple/img/test-thumb.jpg';

  // Set a maximum height and width
  $width = 800;
  $height = 800;

  // Get new dimensions
  list($width_orig, $height_orig) = getimagesize($filename);

  $ratio_orig = $width_orig/$height_orig;

  if ($width / $height > $ratio_orig) {
     $width = $height * $ratio_orig;
  } else {
     $height = $width / $ratio_orig;
  }
  // print_pre(array($width, $height));

  // Resample
  $image_p = imagecreatetruecolor($width, $height);
  if ($file_type == 'image/jpeg') {
    $image = imagecreatefromjpeg($filename);
  } else {
    $image = imagecreatefrompng($filename);
  }
  imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

  // Output
  // imagejpeg($image_p, null, 100);
  if ($file_type == 'image/jpeg') {
    imagejpeg($image_p, $filename_thumbnail);
  } else {
    imagepng($image_p, $filename_thumbnail);
  }
  imagedestroy($image_p);
}

function post($name, $default = '') {
  $obj = &get_instance();
  if ($obj->input->post($name)) {
    return $obj->input->post($name);
  }
  return $default;
}

function get($name, $default = '') {
  $obj = &get_instance();
  if ($obj->input->get($name)) {
    return $obj->input->get($name);
  }
  return $default;
}

function get_if($value, $default_value) {
  return $value ? $value : $default_value;
}

function upload_config() {
  $upload_path = './media';
  if (!is_dir($upload_path)) {
    mkdir($upload_path);
  }
  return array(
    'upload_path' => $upload_path,
    'allowed_types' => 'gif|jpg|jpeg|png',
    // 'max_size' => 2014,
    // 'max_width' => 2048,
    // 'max_height' => 2048,
  );
}

function upload_doc_config($company_id) {
  $upload_path = './uploads/' . $company_id;
  if (!is_dir($upload_path)) {
    mkdir($upload_path);
  }
  return array(
    'upload_path' => $upload_path,
    'allowed_types' => 'docx',
    'max_size' => 2014,
  );
}

function http_get_contents($url) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $contents = curl_exec($ch);
  if (curl_errno($ch)) {
//    echo curl_error($ch);
//    echo "\n<br />";
    $contents = '';
  } else {
    curl_close($ch);
  }

  if (!is_string($contents) || !strlen($contents)) {
//    echo "Failed to get contents.";
    $contents = '';
  }

  return $contents;
}

function delete_cookies($array) {
  foreach ($array as $key) {
    delete_cookie($key);
  }
}

function cookies($array, $expiration) {
  foreach ($array as $key => $value) {
    set_cookie($key, $value, $expiration);
  }
}

function sessions($array) {
  foreach ($array as $key => $value) {
    session($key, $value);
  }
}

function session($key, $value = '') {
  $obj = &get_instance();
  if ($value) {
    $obj->session->set_userdata($key, $value);
  }
  return $obj->session->userdata($key);
}

function fcm_multiple_send($server_key, $tokens, $title, $body, $icon = null) {
  $responses = array();
  foreach ($tokens as $token) {
    $r = fcm_send($server_key, $token, $title, $body, $icon);
    $responses[] = array(
      'token' => $token,
      'response' => $r,
    );
  }
  return $responses;
}

function fcm_send($server_key, $token, $title, $body, $icon = null) {
  $url = "https://fcm.googleapis.com/fcm/send";
  $headers = array(
    'Authorization: key=' . $server_key,
    'Content-Type: application/json'
  );
  $data = array(
    'to' => $token,
    'notification' => array(
      'message' => $title,
      'title' => $body,
      'sound' => 'default',
    ),
  );
  if ($icon) {
  	$data['icon'] = $icon;
  }
  return api_post2($url, $data, $headers);
}

function api_post2($url, $data, $headers = array(), $username = '', $password = '') {
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
  if ($username && $password) {
    curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
  }

  $output = curl_exec($ch);

  curl_close($ch);
  return $output;
}

function print_pre($text, $pre_text = '') {
  echo $pre_text . '<pre>';
  print_r($text);
  echo '</pre>';
}

function trimmed_base_url() {
  return trim(base_url(), '/');
}

function get_bitly($token, $long_url) {
  $ch = curl_init();

  $url = 'https://api-ssl.bitly.com/v4/shorten';
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, 1);
  $data = array('long_url' => $long_url);
  $params = json_encode($data);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $token
  ));

  $output = curl_exec($ch);

  curl_close($ch);
  return json_decode($output);
}

function api_get($url, $data) {
  $curl = curl_init();

  $params = $url . '?' . http_build_query($data);
  if (config_item('enable_profiler')) {
    echo $params . '<br>';
  }
  curl_setopt($curl, CURLOPT_URL, $params);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//  curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($curl, CURLOPT_HTTPGET, 1);

  $output = curl_exec($curl);

  curl_close($curl);
  return $output;
}

function api_post($url, $data, $username = '', $password = '') {
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, 1);
  $params = http_build_query($data);
  // echo $url . '<br>';
  // print_pre($data);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  if ($username && $password) {
    curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
  }

  $output = curl_exec($ch);

  curl_close($ch);
  return $output;
}
