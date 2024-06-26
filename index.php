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
    <title>LMS</title>
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
</style>
<body>
    <div class="full-page">
        <div class="navbar">
            <div>
                <a href='index.php'>CollegeLib Connect</a>
            </div>
            
            <nav>
                <ul id='MenuItems'>
                <li><a href='./admin/index.php'>Admin Login</a></li>
                    <li><a href='signup.php'>Register</a></li>
                    <li><a href='index.php'>Login</a></li>
                </ul>
            </nav>
        </div>
			<div id='login-form'class='login-page'>
				
				<div class="form-box">
					<p style="text-align: center;font-size: 25px;font-family: sans-serif;padding-top: 5px;font-weight: 500;">User login</p>
					<form id='login' class='input-group-login' action="" method="post">
						<input type='text'class='input-field'name="email" placeholder='Email Id' required >
				<input type='password'class='input-field' name="password" placeholder='Enter Password' required>
				<button type='submit'name="login" class='submit-btn'>Log in</button>
                <a href="signup.php"> Not registered yet ?</a>	
			 </form>


             <?php 
           
             if(isset($_POST['login'])){
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection,"lms");
                $query = "select * from users where email = '$_POST[email]'";
                $query_run = mysqli_query($connection,$query);
                while ($row = mysqli_fetch_assoc($query_run)) {
                    if($row['email'] == $_POST['email']){
                        if($row['password'] == $_POST['password']){
                            $_SESSION['firstname'] =  $row['first_name'];
                            $_SESSION['lastname'] =  $row['last_name'];
                            $_SESSION['email'] =  $row['email'];
                            $_SESSION['id'] =  $row['id'];
                            header("Location: user_dashboard.php");
                          
                        }
                        else{
                            ?>
								<br><div style="color:red; font-size:18px; text-align:center;" class="alertdanger">Invalid Credentials!!</div>
								<?php
                        }

                    }
                   
                }
            }

            ?>

			</div>
			</div>
    
</body>
</html>