<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./header.css">
	
    <title>LMS</title>
</head>
<style>

.input-group-register
{
    top: 120px;
	position:absolute;
	width:280px;
}
.input-field
{
	width: 100%;
	padding:10px 0;
	margin:5px 0;
	border-left:0;
	border-top:0;
	border-right:0;
	border-bottom: 1px solid #ffffff;
	outline:none;
	background: transparent;
}
.submit-btn
{
	width: 80%;
	height: 40px;
	padding: 10px 30px;
	cursor: pointer;
	display: block;
	margin: 40px;
	font-size: 18px;
	background: #496ee9;
	border: 0;
	outline: none;
	border-radius: 30px;
	
}
.submit-btn:hover{
	background: #e5f3ff;
}
::placeholder {
            color: rgba(255, 255, 255, 0.572);
}
body{
	background-color: #4c66bcc6;
}
.form-box
{
    width:450px;
	height:480px;
	position:absolute;
	left: 8rem;
	top: 3rem;
	background:rgba(57, 173, 255, 0.902);
	padding:20px;
    overflow: hidden;
	border-radius: 10px;
	box-shadow: 10px 10px 10px  rgba(7, 11, 117, 0.646);
}
span
{
	color:#ffffff;
	font-size:12px;
	bottom:68px;
	position:absolute;
}
#login
{
	left:50px;
}
#login input
{
	color:white;
	font-size:15;
}
#register
{
	left:350px;
}
#register input
{
	color:black;
	margin: 5px;
	font-size: 20px;
}
</style>
<body>
    <div class="full-page">
        <div class="navbar">
            <div>
                <a href='./index.html'>CollegeLib Connect</a>
            </div>
            <nav>
                <ul id='MenuItems'>
				<li><a href='admin/index.php'>Admin Login</a></li>
                    <li><a href='signup.php'>Register</a></li>
                    <li><a href='index.php'>Login</a></li>
                </ul>
            </nav>
        </div>
    
<form id='register' class='input-group-register' action="registration.php" method="post">
	
    <div class="form-box">
	<p style="text-align: center;font-size: 25px;font-family: sans-serif;padding-top: 5px;">Please Enter Your Details</p>
    <input type='text'class='input-field' name="first_name" placeholder='First Name' required>
    <input type='text'class='input-field'name="last_name" placeholder='Last Name ' required>
    <input type='email'class='input-field'name="email" placeholder='Email Id' required>
	<input type='text'class='input-field'name="mobile" placeholder='Enter mobile.no' required>
    <input type='password'class='input-field'name="password" placeholder='Enter Password' required>
    <input type='password'class='input-field'placeholder='Confirm Password'  required>
           <button type='submit'class='submit-btn'>Register</button>
        </div>
    </form>
</body>
</html>
