<?php
session_start();
$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");
	$fname = "";
    $lname = "";
	$email = "";
	$mobile = "";
    $admin_id = $_SESSION['id'];
	$query = "select * from admins where email = '$_SESSION[email]'";
	$query_run = mysqli_query($connection,$query);
	while ($row = mysqli_fetch_assoc($query_run)){
		$fname = $row['first_name'];
        $lname = $row['last_name'];
		$email = $row['email'];
		$mobile = $row['mobile'];
		
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../header.css">
	<link rel="stylesheet" href="../loginfrom.css">
    <link rel="stylesheet" href="../drop.css">
    <link rel="stylesheet" href="../view.css">
    <title>admin Dashboard</title>
</head>
<style>
.form-box a{
    font-size:15px;
    text-align: center;
    padding-left: 80px;
}
.form-box a:hover{
    color: yellow;
}
.nav-welcome{
    color:aliceblue;
    font-style: italic;
}
.nav-welcome #email{
    margin: 120px;
}
.nav-welcome #welcome{
    margin: 100px;
}


</style>
<body>
    <div class="full-page">
        <div class="navbar">
            <div>
            <a href='admin_dashboard.php'>CollegeLib Connect</a>
            </div>

            <div class="nav-welcome">
            <strong id="welcome">Welcome:<?php echo" {$_SESSION['firstname']}"; echo " {$_SESSION['lastname']}";?></strong>
		     <strong id="email">Email: <?php echo $_SESSION['email'];?></strong>
            </div>
            
            <nav>
                <ul id='MenuItems'>
                    <li><div class="dropdown">
                        <a class="dropbtn">My Profile</a>
                         <div class="dropdown-content">
                         <a href="view_profile.php">View Profile</a>
                         <a href="edit_profile.php">Edit Profile</a>
                        <a href="change_password.php">Change Password</a>
                         </div>
                      </div></li>
                    <li><a href="logout.php">Log Out</a></li>

                </ul>
            </nav>
        </div>
<div class="view">
<div class="viewgroup">
        <form action="update_admin.php" method="post">
					<div class="form-group">
						<label for="name">Name:</label>
						<input type="text" class="form-control" name="fname"value="<?php echo $fname;?>">
                        <input type="text" class="form-control" name="lname"value="<?php echo $lname;?>">
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="text" name="email"value="<?php echo $email;?>" class="form-control">
					</div>
					<div class="form-group">
						<label for="mobile">Mobile:</label>
						<input type="text" name="mobile" value="<?php echo $mobile;?>" class="form-control" >
					</div>
                    <button type="submit" name="update" class="update-btn ">Update</button>
				</form>
        </div>

</div>
<style>
    .form-control{
        background-color: #b8b2b2;
    }
    </style>

        
</body>
</html>