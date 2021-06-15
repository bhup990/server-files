<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Modal Handler test</title>
    <style>
      .swal-button{
        background-color: #2196f3;
      }
    </style>
  </head>
  <body>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form action="handler.php" method="post">
        <div class="form-group">
          <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter Name" required>
        </div>

        <div class="form-group">
          <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" pattern="[1-9]{1}[0-9]{9}" name="mobileNo" id="exampleInputEmail1"  placeholder="Enter Contact Num...." required>
          <small class="form-text text-muted">We'll never share your Contact with anyone else.</small>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" name="selectCity" id="exampleInputEmail1" placeholder="Enter City" required>
        </div>

        <div class="form-group">
           <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Message"></textarea>
        </div>

        <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>

    </form>
    </div>
  </div>
</div>
</div>
    <?php include 'links.js'; ?>
  </body>
</html>
