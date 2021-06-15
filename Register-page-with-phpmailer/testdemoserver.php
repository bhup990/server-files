<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Hostinger</title>
  </head>
  <body>
    <form class="" action="testdemoserver.php" method="post">
      <label for="name">Name :</label>
      <input type="text" name="name" value=""><br>
      <label for="name">Contact :</label>
      <input type="text" name="contact" value=""><br>
      <label for="name">message :</label>
      <input type="text" name="message" value=""><br>
      <button type="submit" name="button">Submit</button>
    </form>
    <?php
    if (isset($_POST['button'])) {
      $servername = "localhost";
      $database = "id16570444_signup";
      $username = "id16570444_signup_data";
      $password = "Testdemo@123";
      // Create connection
      $conn = mysqli_connect($servername, $username, $password, $database);
      $name = $_POST['name'];
      $contact = $_POST['contact'];
      $message = $_POST['message'];

      $insert = "INSERT INTO test_data(name, contact, message) VALUES ('$name','$contact','$message')";

      $query = mysqli_query($conn, $insert);

      if ($query) {
         echo "inserted";
      }else{
         echo "Not Inserted";
    }
  }
     ?>
  </body>
</html>
