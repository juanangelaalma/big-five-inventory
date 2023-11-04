<?php

function format_date($date) {
  return date('d-m-Y', strtotime($date));
}

function merge_birth_data($birth_location, $birth_date) {
  $formatted_date = format_date($birth_date);
  return "$birth_location, $formatted_date"; 
}

function avoidNullError($data, $key) {
  return $data ? $data[$key] : '';
}