<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>From</title>
  </head>
  <body>
    <div class="Main">
      <form class="form" action="testcheck.php" method="post">
        <?php if (isset($_GET['error'])) { ?>
          <p class="error"> <?php echo $_GET['error']; ?> </p>
        <?php } ?>
        <label>Name :</label>
        <input type="text" name="name" value=""><br>

        <label>Password :</label>
        <input type="password" name="pass" value=""><br>

        <button type="submit" value="submit" name="button">Submit</button>
      </form>
    </div>
  </body>
</html>
