<?php
	session_start();
    function get_user_count(){
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"lms");
		$user_count = 0;
		$query = "select count(*) as user_count from users";
		$query_run = mysqli_query($connection,$query);
		while ($row = mysqli_fetch_assoc($query_run)){
			$user_count = $row['user_count'];
		}
		return($user_count);
	}

	function get_book_count(){
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"lms");
		$book_count = 0;
		$query = "select count(*) as book_count from books";
		$query_run = mysqli_query($connection,$query);
		while ($row = mysqli_fetch_assoc($query_run)){
			$book_count = $row['book_count'];
		}
		return($book_count);
	}

	function get_issue_book_count(){
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"lms");
		$issue_book_count = 0;
		$query = "select count(*) as issue_book_count from issued_books";
		$query_run = mysqli_query($connection,$query);
		while ($row = mysqli_fetch_assoc($query_run)){
			$issue_book_count = $row['issue_book_count'];
		}
		return($issue_book_count);
	}

	
	
	
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./header.css">
	<link rel="stylesheet" href="./loginfrom.css">
    <link rel="stylesheet" href="../drop.css">
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
.box{
    display: flex;
    flex-wrap: wrap;
    /* justify-content: space-between; */
    align-items: flex-start;
   margin: 50px;
    
}
.under-dash{
    display: flex;
    background-color:#3aaccf;
    border-radius: 20px;
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
    border-bottom-left-radius: 0px;
    justify-content: flex-end;
    align-items: center;
    height: 50px;
    width: 450px;
   margin: 0px;
   padding: 0px;
}
#Menu-Item a{
    font-size: 17px;
    padding: 10px 10px 10px 10px;
    margin: 0px;
    cursor: pointer;
}
.under-dash a {
    font-family: sans-serif;
    padding: 10px;
    border-radius: 15px;
   
   
}
.under-dash a:hover {
    background-color: #496ee9;
    color: black;
    
   
}
</style>
<body>
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

        <div class="under-dash">
        <a href="admin_dashboard.php" style="font-size: 17px; margin:15px ">Dashboard</a>
        <nav>
                <ul id='Menu-Item'>
                    <li><div class="dropdown">
                        <a class="dropbtn">Books</a>
                         <div class="dropdown-content">
                         <a href="add_book.php">Add new book</a>
                         <a href="manage_book.php">manage books</a>
                         </div>
                      </div></li>
                </ul>
            </nav>

            <a href="issue_book.php" style="font-size: 17px; margin:15px ">Issue Book</a>
           

        </div>










    <div class="box">
        <div class="box1">
            <div class="box-header">Registered Users</div>
            <div class="box-content">
            <p>No of users:<?php echo get_user_count();?><p>
            <a href="Regusers.php">View users</a>
            </div>
        </div>
        <div class="box2">
            <div class="box-header">List of Books</div>
            <div class="box-content">
                <p>No of books:<?php echo get_book_count();?><p>
            <a href="Regbooks.php">View Books</a>
             </div>
        </div>
        <div class="box2">
            <div class="box-header">Book Issued</div>
            <div class="box-content">
                <p>No of issued books:<?php echo get_issue_book_count();?><p>
            <a href="view_issued_book.php">View issued Books</a>
             </div>
        </div>
        
</div>

    
        

</body>
</html>