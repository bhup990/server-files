<?php

    $to = "vashi@tdfjewellery.com";
    $from = $_REQUEST['uemail'];
    $name = $_REQUEST['uname'];
    $number = $_REQUEST['uphone'];
    $store = $_REQUEST['selectstore'];
    $city = $_REQUEST['ucity'];
    

    $subject = "TDF Enquiry";

    $logo = 'img/tdf-logo.png';
    $link = '#';
  
    //Create Code for send mail with these submitted contents 
   $message = "<style type='text/css'>table,td,tr{background:#FFF}@media only screen and (max-width: 640px){body[yahoo] .deviceWidth{width:440px!important;padding:0}body[yahoo] .center{text-align:center!important}}@media only screen and (max-width: 479px){body[yahoo] .deviceWidth{width:280px!important;padding:0}body[yahoo] .center{text-align:center!important}}</style><table leftmargin='0' topmargin='0' marginwidth='0' marginheight='0' yahoo='fix' style='font-family: Georgia, Times, serif;width: 100%;background-color: #ffffff;margin: 0;padding: 0;-webkit-font-smoothing: antialiased;font-family: Georgia, Times, serif' id='body-div'><table width='100%' border='0' cellpadding='0' cellspacing='0' align='center'><table width='600' border='0' cellpadding='0' cellspacing='0' align='center' class='border-complete deviceWidth' style='border: 1px solid #f29a87;'><tr><td width='100%'><table border='0' cellpadding='0' cellspacing='0' align='center' class='deviceWidth'><tr><td id='logo' align='center' style='margin: 0 auto;padding: 14px 0;'><h1 id='banner-txt'><img src='".$logo."'></h1></td></tr></table></td></tr></table><table width='600' border='0' cellpadding='0' cellspacing='0' align='center' class='deviceWidth' bgcolor='#fff' style='border: 1px solid #f29a87;'><tr><td align='center'><h4 style='font-family: arial;font-size: 18px;padding: 20px 10px;margin: 0;color: #7c7b7b;'>User Details</h4></td></tr><tr><td class='center'><table width='100%' border='0' cellpadding='0' cellspacing='0' align='left' class='deviceWidth'><tr><td width='40%' align='center' valign='middle' bgcolor='#FFFFFF'><h5 style='font-family: arial;font-size: 18px;padding: 20px 10px;margin: 0;color: #7c7b7b;border-top: 1px solid #f29a87;'>Name</h5></td><td width='5%;' align='center' valign='middle' bgcolor='#FFFFFF'><h5 style='font-family: arial;font-size: 18px;padding: 20px 10px;margin: 0;color: #7c7b7b;border-top: 1px solid #f29a87;'>:</h5></td><td width='55%' align='center' valign='middle' bgcolor='#FFFFFF'><h5 style='font-family: arial;font-size: 18px;padding: 20px 10px;margin: 0;color: #7c7b7b;border-top: 1px solid #f29a87;'>".ucfirst($name)."</h5></td></tr><tr><td width='40%' align='center' valign='middle' bgcolor='#FFFFFF'><h5 style='font-family: arial;font-size: 18px;padding: 20px 10px;margin: 0;color: #7c7b7b;border-top: 1px solid #f29a87;'>Phone No</h5></td><td width='5%;' align='center' valign='middle' bgcolor='#FFFFFF'><h5 style='font-family: arial;font-size: 18px;padding: 20px 10px;margin: 0;color: #7c7b7b;border-top: 1px solid #f29a87;'>:</h5></td><td width='55%' align='center' valign='middle' bgcolor='#FFFFFF'><h5 style='font-family: arial;font-size: 18px;padding: 20px 10px;margin: 0;color: #7c7b7b;border-top: 1px solid #f29a87;'>".$number."</h5></td></tr><tr><td width='40%' align='center' valign='middle' bgcolor='#FFFFFF'><h5 style='font-family: arial;font-size: 18px;padding: 20px 10px;margin: 0;color: #7c7b7b;border-top: 1px solid #f29a87;'>Store</h5></td><td width='5%;' align='center' valign='middle' bgcolor='#FFFFFF'><h5 style='font-family: arial;font-size: 18px;padding: 20px 10px;margin: 0;color: #7c7b7b;border-top: 1px solid #f29a87;'>:</h5></td><td width='55%' align='center' valign='middle' bgcolor='#FFFFFF'><h5 style='font-family: arial;font-size: 18px;padding: 20px 10px;margin: 0;color: #7c7b7b;border-top: 1px solid #f29a87;'>".ucfirst($store)."</h5></td></tr><tr><td width='40%' align='center' valign='middle' bgcolor='#FFFFFF'><h5 style='font-family: arial;font-size: 18px;padding: 20px 10px;margin: 0;color: #7c7b7b;border-top: 1px solid #f29a87;'>City</h5></td><td width='5%;' align='center' valign='middle' bgcolor='#FFFFFF'><h5 style='font-family: arial;font-size: 18px;padding: 20px 10px;margin: 0;color: #7c7b7b;border-top: 1px solid #f29a87;'>:</h5></td><td width='55%' align='center' valign='middle' bgcolor='#FFFFFF'><h5 style='font-family: arial;font-size: 18px;padding: 20px 10px;margin: 0;color: #7c7b7b;border-top: 1px solid #f29a87;'>".ucfirst($city)."</h5></td></tr></table></td></tr></table><table width='600' border='0' cellpadding='0' cellspacing='0' align='center' class='border-complete deviceWidth' style='border: 1px solid #f29a87;' bgcolor='#eeeeed'><tr><td style='text-align: center;'><p id='footer-txt' style='text-align: center;color: #303032;font-family: arial;font-size: 14px;padding: 0 32px;margin: 20px;'><b> &#169; Copyright 2018 - PHI TDF</b><br/></p></td></tr></table></table></table>";

// Always set content-type when sending HTML email
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

// More headers
$headers .= 'From:'.$to;
$send = mail($to, $subject, $message, $headers);
?>

