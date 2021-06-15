<?php
  session_start();
  require 'phpmailer/PHPMailerAutoload.php';
$conn = mysqli_connect("localhost", "root", "", "tdf");

if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $contact = $_POST['mobileNo'];
  $selectCity = $_POST['selectCity'];
  $message = $_POST['message'];

  $emailquery = "SELECT * FROM tdfenquiry WHERE email = '$email' ";
  $sqliquery = mysqli_query($conn, $emailquery);

  if (mysqli_num_rows($sqliquery) > 0) {
    $_SESSION['status'] = "Email Already Exists";
    $_SESSION['status_code'] = "warning";
    header('Location:modal.php');
  }else {
    $insertquery = "INSERT INTO tdfenquiry(name, email, mobileNo, selectCity, message)
                    VALUES('$name','$email','$contact','$selectCity','$message')";

    $sqiQuery = mysqli_query($conn, $insertquery);

    if ($sqiQuery) {
      ?>
      <script>
          function disableButton() {
          document.getElementById('submit').style.display="none";
          }
      </script>
      <?php
      $_SESSION['status'] = "Data Inserted";
      $_SESSION['status_code'] = "success";
      header('Location:modal.php');
      emailsmtp();
    }else {
      $_SESSION['status'] = "Not Data Inserted";
      $_SESSION['status_code'] = "error";
      header('Location:modal.php');
    }
  }
}

function emailsmtp(){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $contact = $_POST["mobileNo"];
        $selectCity = $_POST['selectCity'];
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

        $message .= "<tr><td><strong>Phone:</strong> </td><td>" . strip_tags($_POST['mobileNo']) . "</td></tr>";

        $message .= "<tr><td><strong>City:</strong> </td><td>" . strip_tags($_POST['selectCity']) . "</td></tr>";

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
