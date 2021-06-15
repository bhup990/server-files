<?php

$servername = "localhost";
$name = "root";
$serverPass = "";
$db_name ="signup";

$con = mysqli_connect($servername,$name,$serverPass,$db_name);

if (!$con) {
	echo "Connection Error";
}

?>