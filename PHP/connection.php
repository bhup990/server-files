<?php
$server = "localhost";
$name = "root";
$password = "";
$bd = "signup";

$con = mysqli_connect($server,$name,$password,$bd);

if (!$con) {
  echo "Connection error";
}

 ?>
