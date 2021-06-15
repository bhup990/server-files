
<?php
session_start();
$flag=0;

	//print_r($_POST);
	echo "code ".$_SESSION["code"]."<br>";
	echo "session_status ".session_status()."<br>";
echo "isset ".isset($_SESSION)."<br>";
	echo $_POST['captcha']."<br>  ".$_SESSION["code"]."<br>";

	if(isset($_POST) & !empty($_POST)){
		if($_POST['captcha'] == $_SESSION["code"]){
			echo "correct captcha";
			$flag=1;
		   header('Location: index.php?id='.$flag);
 
		}else{
			echo "Invalid captcha";
			$flag=2;
			 header('Location: index.php?id='.$flag);
		}
	}
?>