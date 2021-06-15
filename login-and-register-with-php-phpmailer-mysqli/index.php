<?php session_start(); ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="login.css">

    <title>Login</title>
  </head>
  <body>

    <?php

    include 'connection.php';

    if (isset($_POST['loginBtn'])) {
      $email = $_POST['name'];
      $password = $_POST['password'];

      $emailCheck = "SELECT * FROM signup_data WHERE email = '$email' ";
      $emailQuery = mysqli_query($con, $emailCheck);
      $emailCount = mysqli_num_rows($emailQuery);

      if ($emailCount) {
        $emailPass = mysqli_fetch_assoc($emailQuery);
        $dbPass = $emailPass['password'];
        $_SESSION['username'] = $emailPass['username'];
        $passDecode = password_verify($password, $dbPass);

        if ($passDecode) {
          ?> <script>
            alert("Login Successfully");
          </script> <?php
          header('location:home.php');
        }else{
          ?> <script>
            alert("Password invaild");
          </script> <?php
        }
      }else{
        ?> <script>
          alert("Email invaild");
        </script> <?php
      }

    }
     ?>
  	<div class="main">
  		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

  			<h2>Login</h2>

  			<label> Email ID : </label>
  			<input type="text" name="name"><br>
        <span class="error"></span>

  			<label> Password : </label>
  			<input type="text" name="password"><br>

  			<div class="btn"><button type="submit" name="loginBtn">Login</button></div>

  			<a href="register.php">Create new account ?</a>
  		</form>
  	</div>
  </body>
  </html>
