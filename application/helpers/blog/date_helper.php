<?php

define('DEFAULT_DATE_FORMAT', 'Y-m-d');
define('DEFAULT_DATETIME_FORMAT', 'Y-m-d H:i:s');
define('READABLE_DATETIME_FORMAT', 'M,d Y g:i A');

if (!function_exists('now')) {
  function now($format = DEFAULT_DATETIME_FORMAT)
  {
    $date = new DateTime();
    return $date->format($format);
  }
}

if (!function_exists('yesterday')) {
  function yesterday($format = DEFAULT_DATETIME_FORMAT)
  {
    return date($format, strtotime('-1 days', strtotime(now())));
  }
}

if (!function_exists('this_month')) {
  function this_month()
  {
    $start = date('Y-m', strtotime(now())) . '-01 00:01';
    $next_month = date('Y-m-d', strtotime('+1 month', strtotime($start))) . ' 23:59';
    $end = date('Y-m-d', strtotime('-1 day', strtotime($next_month))) . ' 23:59';
    return array($start, $end);
  }
}

if (!function_exists('month')) {
  function month()
  {
    $month = date('m', strtotime(now()));
    return $month;
  }
}

if (!function_exists('year')) {
  function year()
  {
    $year = date('Y', strtotime(now()));
    return $year;
  }
}

if (!function_exists('today')) {
  function today($format = DEFAULT_DATETIME_FORMAT)
  {
    return array(now($format), now($format));
  }
}
