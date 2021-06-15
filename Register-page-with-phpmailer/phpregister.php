<?php
session_start();
    include 'connection.php';
    require 'phpmailer/PHPMailerAutoload.php';

    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['contact'])
    && isset($_POST['password']) && isset($_POST['cpassword']) ) {
      function validate($data)
      {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
      $name = validate($_POST['name']);
      $email = validate($_POST['email']);
      $contact = validate($_POST['contact']);
      $password = validate($_POST['password']);
      $cpassword = validate($_POST['cpassword']);

      if (empty($name)) {
        header('Location:register.php?nameErr=Name field empty');
        exit();
      }elseif (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        header('Location:register.php?nameErr=Only letters and white space allowed');
        exit();
      }elseif (empty($email)) {
        header('Location:register.php?emailErr=Email field empty');
        exit();
      }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        header('Location:register.php?emailErr=Invalid email format');
        exit();
      }elseif (empty($contact)) {
        header('Location:register.php?errMsg=Contact field required');
        exit();
      }elseif (!preg_match('/^[0-9]{10}+$/',$contact)) {
        header('Location:register.php?errMsg=Invaild number');
        exit();
      }elseif (empty($password) && empty($cpassword)) {
        header('Location:register.php?errMsg=Password field require');
        exit();
      }else{
        $iname = mysqli_real_escape_string($con, $_POST['name']);
        $iemail = mysqli_real_escape_string($con, $_POST['email']);
        $icontact = mysqli_real_escape_string($con, $_POST['contact']);
        $ipassword = mysqli_real_escape_string($con, $_POST['password']);
        $icpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

        $ipass = password_hash($ipassword, PASSWORD_BCRYPT);
        $icpass = password_hash($icpassword, PASSWORD_BCRYPT);

        $selectemail = "SELECT * FROM signup_data WHERE email = '$iemail' ";
        $queryemail = mysqli_query($con, $selectemail);

        $uniqueemail = mysqli_num_rows($queryemail);

        if ($uniqueemail>0) {
          header('Location:register.php?errMsg=Email Already exists');
          exit();
        }else{
           if ($ipassword !== $icpassword) {
            header('Location:register.php?errMsg=password not match');
            exit();
           }else{
            $insertquery = "INSERT INTO signup_data (username, email, contact, password, cpassword)
            VALUES('$iname','$iemail','$icontact','$ipass','$icpass')";
            $query = mysqli_query($con, $insertquery);
            if ($query) {
              header('Location:register.php?errMsg=Data Inserted Successfully');
              // emailsmtp();
              exit();
            }else{
              header('Location:register.php?errMsg=Not inseted data');
              exit();
            }
          }
        }
      }
    }
function emailsmtp(){
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
        $mail->addAddress('etest3385@gmail.com', 'person one');
        // $mail->addAddress('sbhupendra6774@gmail.com', 'person second');
        // $mail->addAddress('sbhupendr6774@gmail.com', 'person third');
        // $mail->addAddress('harshalgudhrkar@gmail.com', 'person fourth');

        $mail->addReplyTo('etest3385@gmail.com', 'Information');
        // $mail->addCC('sbhupendra6774@gmail.com');
        // $mail->addBCC('sbhupendr6774@gmail.com');


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
