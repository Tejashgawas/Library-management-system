<?php
session_start();    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./header.css">
	<link rel="stylesheet" href="./loginfrom.css">
    <link rel="stylesheet" href="./drop.css">
    <title>User Dashboard</title>
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
    
        <div class="navbar">
            <div>
            <a href='user_dashboard.php'>CollegeLib Connect</a>
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
        
        <div class="form-box">
        <form action="update_password.php" method="post">
					<div class="form-group">
						<label for="password">Enter old Password:</label>
						<input type="password" class='input-field'  name="old_password">
                        
					</div>
					<div class="form-group">
						<label for="New Password">Enter New Password:</label>
						<input type="password" name="new_password" class='input-field' >
					</div>
					<button type="submit" name="update" class='submit-btn'>Update Password</button>
				</form>
        </div>
<style>
.form-group{
    margin:30px ;
}
.input-field
{
	width: 100%;
	padding:10px 0;
	margin:5px 0;
	border-left:0;
	border-top:0;
	border-right:0;
	border-bottom: 1px solid blanchedalmond;
	outline:none;
	background: transparent;
}
.submit-btn
{
	width: 80%;
	padding: 10px 30px;
	cursor: pointer;
	display: block;
	margin: 40px;
	margin-left: 30px;
	background: #496ee9;
	border: 0;
	outline: none;
	font-size: 18px;
	border-radius: 30px;
}
.submit-btn:hover{
	background: #e5f3ff;
}

label{
    font-size: 20px;
    padding: 5px;
    font-family: cursive;
}





    </style>


</body>
</html>