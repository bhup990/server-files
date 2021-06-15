<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- sweet alert js -->
<script src="sweetalert/sweetalert.min.js"></script>
<script>
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
    ?>
    swal({
        title: "<?php echo $_SESSION['status']; ?>",
        // text: "You clicked the button!",
        icon: "<?php echo $_SESSION['status_code']; ?>",
        button: "OK",
    });
    <?php
    unset($_SESSION['status']);
}

 ?>
</script>
<!-- sweet alert js -->
