<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="login.css">

    <style>
      .main form p{
        padding: 10px 5px;
        text-align: center;
        color: #d82828;
        border: 1px solid #ea6d6d;
        background: #fbcbcb;
      }
    </style>

    <title>Login</title>
  </head>
  <body>
  	<div class="main">
  	<form method="post" action="phpregister.php">

  			<h2>SignUp</h2>

  			<label> Username : </label>
  			<input type="text" name="name"><br>
        <?php if (isset($_GET['nameErr'])) { ?>
          <p class="nameErr"><?php echo $_GET['nameErr']; ?></p>
        <?php } ?>

  			<label> Email : </label>
  			<input type="email" name="email"><br>
        <?php if (isset($_GET['emailErr'])) { ?>
          <p class="emailErr"><?php echo $_GET['emailErr']; ?></p>
        <?php } ?>

        <label> Contact : </label>
        <input type="number" name="contact" value=""><br>

        <label> Password : </label>
        <input type="password" name="password" value=""><br>

        <label> Confirm password : </label>
        <input type="password" name="cpassword" value=""><br>

  			<div class="btn"><button type="submit" value="submit" name="signupBtn">Sign Up</button></div>
  		</form>
  </div>
</body>
</html>
