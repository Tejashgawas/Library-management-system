<?php
	session_start();
	function get_user_issue_book_count(){
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"lms");
		$user_issue_book_count = 0;
		$query = "SELECT count(*) AS user_issue_book_count FROM issued_books WHERE student_id = $_SESSION[id]";
		$query_run = mysqli_query($connection,$query);
		while ($row = mysqli_fetch_assoc($query_run)){
			$user_issue_book_count = $row['user_issue_book_count'];
		}
		return($user_issue_book_count);
	}

    function get_user_issue_not_book_count(){
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"lms");
        $user_issue_not_book_count = 0;
        $query = "SELECT count(*) AS user_issue_not_book_count FROM issued_books WHERE student_id = $_SESSION[id] AND status = 0";
        $query_run = mysqli_query($connection,$query);
        
        while ($row = mysqli_fetch_assoc($query_run)){
            $user_issue_not_book_count = $row['user_issue_not_book_count'];
        }
        
        return $user_issue_not_book_count;
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
    margin: 100px;
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

        <div class="box">
        <div class="box1">
            <div class="box-header">Book Issued</div>
            <div class="box-content">
            <p>No of book issued:<?php echo get_user_issue_book_count();?><p>
            <a href="view_issued_book.php">View Issued Books</a>
            </div>
        </div>
        <div class="box2">
            <div class="box-header">Book Not Return</div>
            <div class="box-content">
                <p>No of book not returned:<?php echo get_user_issue_not_book_count();?><p>
            <a href="view_not_issued_book.php">View Not Returned Books</a>
             </div>
        </div>
        <div class="box2">
            <div class="box-header">List Of Books</div>
            <div class="box-content">
                <p>No of books:<?php echo get_book_count();?><p>
            <a href="Regbooks.php">View Books</a>
             </div>
        </div>

    
        

</body>
</html>