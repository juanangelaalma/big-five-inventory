<?php

function format_date($date)
{
    return date('d-m-Y', strtotime($date));
}

function merge_birth_data($birth_location, $birth_date)
{
    $formatted_date = format_date($birth_date);
    return "$birth_location, $formatted_date";
}

function avoidNullError($data, $key)
{
    return $data ? $data[$key] : '';
}

function translateGender($gender)
{
    if (!$gender) {
        return "";
    }
    $genders = [
      'male' => 'Laki-laki',
      'female' => 'Perempuan'
    ];
    return $genders[$gender];
}

function getPathLevel()
{
    $paths = explode("/", request()->getRequestUri());
    $level = $paths[1];
    return $level;
}

function translateRole($role) {
    $roles = [
        'admin' => 'Admin',
        'student' => 'Siswa',
        'counselor' => 'Konselor'
    ];

    return $roles[strtolower($role)];
}