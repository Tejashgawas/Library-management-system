<?php
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "lms");

    $first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $mobile = mysqli_real_escape_string($connection, $_POST['mobile']);
  $password = $_POST['password'];
    $query = "INSERT INTO users VALUES ('', '$first_name', '$last_name', '$email','$mobile', '$password')";
    $query_run = mysqli_query($connection, $query);
?>

<script type="text/javascript">
    alert("Registration successful. You may login now!");
    window.location.href = "index.php";
</script>
