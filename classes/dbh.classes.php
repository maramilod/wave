<?php

$sname = "localhost";
$uname = "root";
$password = "";
$port = '3306';
$db_name = 'website';

$con = new PDO("mysql:host=$sname;dbname=$db_name;port=$port", $uname, $password);

$conn = new mysqli($sname, $uname, $password, $db_name, $port);

if (!$conn) {
   echo "Connection faild!";
}

function create_unique_id()
{
   $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $characters_lenght = strlen($characters);
   $random_string = '';
   for ($i = 0; $i < 20; $i++) {
      $random_string .= $characters[mt_rand(0, $characters_lenght - 1)];
   }
   return $random_string;
}

if (isset($_COOKIE['user_id'])) {
   $user_id = $_COOKIE['user_id'];
} else {
   $user_id = '';
}
