<?php
session_start();
if (!isset($_SESSION['username'])) {
   echo "You Logout";
   header('location:index.php');
 }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home Page</title>
    <style>
      *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      body{
        height: 100vh;
      }
      .main{
        display: inline-block;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
      }
      button{
        margin: 30px 0;
        padding: 10px 20px;
        font-size: 20px;
      }
    </style>
  </head>
  <body>
    <div class="main">
      <h1>Welcome : <?php echo $_SESSION['username']; ?></h1>
      <p>Demo page web developer </p>

      <a href="logout.php"><button type="button" name="button">Logout</button></a>
    </div>
  </body>
</html>
