<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tdf-vashi";

$con = new mysqli($servername,$username,$password,$dbname);

$name = $_POST['name'];
$email = $_POST['email'];
$mobile_no = $_POST['mobile_no'];
$select_store = $_POST['select_store'];
$your_message = $_POST['your_message'];

$query = "insert into enquiry(Name,Email,Mobile_no,Select_store,Your_message) values('$name','$email','$mobile_no','$select_store','$your_message')"; 

$run = mysqli_query($con, $query);

if ($run) {
	echo  "success";
}
else
{
	echo  "failed";
}
?>