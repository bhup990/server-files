  <?php
$nameErrMsg = $ageErrMsg = $emailErrMsg = $cityErrMsg = $genderErrMsg = "";
$name = $age = $email = $city = $gender = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    if (empty($_POST["name"])) {
    $nameErrMsg = "Name is required";
  } else {
    $name = $_POST["name"];

    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErrMsg = "Only letters and white space allowed";
    }
  }

if (empty($_POST["age"])) {
    $ageErrMsg = "Age is required";
 }
else{
  $age = $_POST['age'];

if (!preg_match("/^([0-9]*)$/",$age)) {
      $ageErrMsg = "Only Number Are allowed";
      }
}

  if (empty($_POST["email"])) {
    $emailErrMsg = "email is required";
  } else {
    $email = $_POST["email"];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErrMsg = "Please input vaild Email";
    }
  }

    if (empty($_POST["city"])) {
    $cityErrMsg = "city is required";
  } else {
    $city = $_POST["city"];

    if (!preg_match("/^[a-zA-Z-' ]*$/",$city)) {
      $nameErrMsg = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["gender"])) {
    $genderErrMsg = "gender is required";
  } else {
    $gender = $_POST["gender"];
    }
}
?>

<html>
	<head>
		<title>Registration Page</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="content">
			<h2>Registration From with validation</h2>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

				<label for="#">Name:</label>
				<input type="text" name="name" class="text" value="<?php echo $name;?>"><span class="error">* <br><?php echo $nameErrMsg;?></span><br>

				<label for="#">Age:</label>
				<input type="text" name="age" class="text" value="<?php echo $age;?>"><span class="error">* <br><?php echo $ageErrMsg;?></span><br>

				<label for="#">Email:</label>
				<input type="text" name="email" class="text" value="<?php echo $email;?>"><span class="error">* <br>  <?php echo $emailErrMsg;?></span><br>

				<label for="#">City:</label>
				<input type="text" name="city" class="text" value="<?php echo $city;?>"><span class="error">* <br><?php echo $cityErrMsg;?></span><br>

				<label for="#">Gender :</label>
				<label for="#">Male</label>
				<input type="radio" name="gender" value="male">
				<label for="#">Female</label>
				<input type="radio" name="gender" value="female">
				<br><br>

				<button type="submit" name="submit">Submit</button>
			</form>
		</div>
    <?php
         if(isset($_POST["submit"])){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "validation_data";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
          }
      ?>

	</body>
</html>
