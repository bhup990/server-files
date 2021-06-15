<?php
session_start();
include 'connection.php';

if (isset($_POST['name']) && isset($_POST['pass'])) {
  function validate($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
    $name = validate($_POST['name']);
    $pass = validate($_POST['pass']);

  if (empty($name)) {
    header('Location:test.php?error=Name is require');
    exit();
  }elseif (empty($pass)) {
    header('Location:test.php?error=Password is require');
    exit();
  }else{
     $name = mysqli_real_escape_string($con, $_POST['name']);
     $pass = mysqli_real_escape_string($con, $_POST['pass']);
     $insertquery = "INSERT INTO test_data(username, password) VALUES ('$name','$pass')";

     $runQuery = mysqli_query($con, $insertquery);
     if ($runQuery) {
       header('Location:test.php?error=Data Inserted');
     }else{
         header('Location:test.php?error=username and password incorrect');
     }
  }
}

 ?>
