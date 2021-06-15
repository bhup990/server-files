<html>
	<head>
	 <title>Sent Mail</title>
<style>
	body{
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center
	}

	.main{
	width: 400px;
    height: 300px;
    display: flex;
    justify-content: center;
    align-items: center;
	}

	label{
		font-size: 20px;
        font-family: sans-serif;
	}
	input{
		padding: 5px;
        width: 300px;
        margin-bottom: 10px;

	}
	button{
		padding: 5px 15px;
    font-size: 16px;
    text-transform: capitalize;
	}
	textarea{
		width: 100%;
		margin-bottom: 10px; 
	}
	h2{
	position: absolute;
    top: 90px;
    text-transform: capitalize;
	}
</style>
	</head>
	<body>

		<h2>Send mail by Phpmailer</h2>

		<div class="main">
			<form action="mail_con.php" method="POST">
				<label for="#">Name :</label><br>
				<input type="text" name="name"><br>

				<label for="#">Phone :</label><br>
				<input type="text" name="phone"><br>

				<label for="#">Email :</label><br>
				<input type="text" name="email"><br>

				<label for="#">Message :</label><br>
				<textarea name="message" id="message" cols="30" rows="5"></textarea><br>

				<button type="submit" name="submit">submit
				</button>
			</form>
		</div>
	</body>
</html>