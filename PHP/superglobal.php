<html>
	<head>
		
	</head>
	<body>
		<form action="superglobal.php" method="POST">
			<label>Name</label><br>
			<input type="text" name="name"><br>
			<label>Age</label><br>
			<input type="text" name="age"><br>

			<button type="submit" name="submit">Submit</button>
		</form>

		<?php

		if (isset($_POST['submit'])) {
			echo $_POST['name'];
			echo $_POST['age'];
		}

		?>
	</body>
</html>