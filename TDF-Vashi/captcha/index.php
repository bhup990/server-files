<html>
<head>
<title>Test Form</title>
</head>
<body>
<form action="validate.php" method="post">
Enter Image Text
<input name="captcha" type="text">
<img src="captcha.php" /><br>
<input name="submit" type="submit" value="Submit">
<?php

    if($_GET['']=='')
    {
        if( $_GET['id']==1)
        {
            echo "correct captcha";
        }    
        if( $_GET['id']==2)
        {
            echo "Incorrect Captcha";
        }

    }

?>

</form>
</body>
</html>