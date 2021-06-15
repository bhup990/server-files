<?php

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["contact"];
$message = $_POST["message"];

$mail = new PHPMailer;

$mail->IsSMTP();

$mail->Host       = "smtp.gmail.com";      // SMTP server example
$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Port       = 587;                   // set the SMTP port for the GMAIL server
$mail->Username   = "etest3385@gmail.com"; // SMTP account username example
$mail->Password   = "sbhupendra@952";      // SMTP account password example

$mail->setFrom($_POST['email']);
$mail->addAddress('etest3385@gmail.com');
$mail->addAddress('sbhupendra6774@gmail.com');
$mail->addAddress('sbhupendr6774@gmail.com');

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

?>
