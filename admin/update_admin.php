<?php
session_start();

if (!isset($_SESSION['id'])) {
    echo "admin not logged in";
    exit();
}

$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "lms");

// Assuming user ID is stored in $_SESSION['id']
$admin_id = $_SESSION['id'];

$query = "UPDATE admins SET first_name = '$_POST[fname]', last_name = '$_POST[lname]', email = '$_POST[email]', mobile = '$_POST[mobile]' WHERE id = $admin_id";
$query_run = mysqli_query($connection, $query);
?>
<script type="text/javascript">
    alert("Updated successfully...");
    window.location.href = "admin_dashboard.php";
</script>
