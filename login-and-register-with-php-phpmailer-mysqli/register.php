
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="login.css">

    <title>Login</title>
  </head>
  <body>
  	<div class="main">
  		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

  			<h2>SignUp</h2>

  			<label> Username : </label>
  			<input type="text" name="name" required><br>

  			<label> Email : </label>
  			<input type="email" name="email" required><br>

        <label> Contact : </label>
        <input type="number" name="contact" value="" required><br>

        <label> Password : </label>
        <input type="password" name="password" value="" required><br>

        <label> Confirm password : </label>
        <input type="password" name="cpassword" value="" required><br>

  			<div class="btn"><button type="submit" name="signupBtn">Sign Up</button></div>
  		</form>
  </div>
   <?php

    include 'connection.php';
    require 'phpmailer/PHPMailerAutoload.php';

    if (isset($_POST['signupBtn'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']) ;
    $email = mysqli_real_escape_string($con, $_POST['email']) ;
    $contact = mysqli_real_escape_string($con, $_POST['contact']) ;
    $password = mysqli_real_escape_string($con, $_POST['password']) ;
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']) ;

    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

    $insertemail = "SELECT * FROM signup_data WHERE email = '$email' ";

    $query = mysqli_query($con,$insertemail);

    $emailcount = mysqli_num_rows($query);

    if ($emailcount>0) {

       $errorMsg = "Email Already Exists";

       }

    else{

      if ($password === $cpassword) {

         $insert = "INSERT INTO signup_data(username, email, contact, password, cpassword)VALUES('$name','$email','$contact','$pass','$cpass')";

         $insertquery = mysqli_query($con, $insert);

         if ($insertquery) {
           ?> <script> alert("Inserted") </script> <?php
                header('location:index.php');
                emailsmtp();
         }else{
          ?> <script> alert("Not Inserted") </script> <?php
         }

      }else{

       ?> <script> alert("Password Not Match") </script> <?php
    }
  }
}

function emailsmtp()
{
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["contact"];
        $message = $_POST["message"];

        $mail = new PHPMailer;

        $mail->IsSMTP();

        $mail->Host       = "smtp.gmail.com"; // SMTP server example
        $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
        $mail->SMTPAuth   = true;                  // enable SMTP authentication
        $mail->Port       = 587;                    // set the SMTP port for the GMAIL server
        $mail->Username   = "etest3385@gmail.com";     // SMTP account username example
        $mail->Password   = "sbhupendra@952";        // SMTP account password example

        $mail->setFrom($_POST['email']);
        $mail->addAddress('etest3385@gmail.com');

        $mail->addReplyTo('etest3385@gmail.com', 'Information');
        $mail->addCC('sbhupendra6774@gmail.com');
        $mail->addBCC('sbhupendr6774@gmail.com');


        // The subject of the message.
        $mail->Subject = 'Received Message From Client ' . $name;

        $message = '<html><body>';

        $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';

        $message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($_POST['name']) . "</td></tr>";

        $message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['email']) . "</td></tr>";

        $message .= "<tr><td><strong>Phone:</strong> </td><td>" . strip_tags($_POST['contact']) . "</td></tr>";

        $message .= "<tr><td><strong>Message</strong> </td><td>" . strip_tags($_POST['message']) . "</td></tr>";

        $message .= "</table>";
        $message .= "</body></html>";

        $mail->Body = $message;

        $mail->isHTML(true);

        if ($mail->send()) {
            echo "<h1>Mail Send Successfully</h1>";
        } else {
            echo "<h1>Something Went Wrong</h1>";
        }

    }
?>
  </body>
  </html>
