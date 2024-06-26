<?php
	session_start();
	#fetch data from database
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");
	$book_name = "";
	$author = "";
	$book_no = "";
	$query = "select book_name,book_author,book_no from issued_books where student_id = $_SESSION[id] AND status=0";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./header.css">
	<link rel="stylesheet" href="./loginfrom.css">
    <link rel="stylesheet" href="./drop.css">
    <link rel="stylesheet" href="./view_table.css">
    <title>User Dashboard</title>
</head>
<style>
/* .form-box a{
    font-size:15px;
    text-align: center;
    padding-left: 80px;
}
.form-box a:hover{
    color: yellow;
} */
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
.table-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
            margin-top: 0px;
        }

h4{
    font-size: 25px;
    font-family: sans-serif;
    text-align: center;
}


.table_bordered {
    
            width: 1000px;
            height: 100px;
            text-align: center;
            margin-top: 0px;
            font-family: sans-serif;
 }
th, td {
            border: 1px solid blue;
            padding: 12px;
            height: 25px;
        }

th {
    background-color:#34c3eb;
}
tr:hover {
            background-color: #34c3eb;
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
       
    <div class="table-container">
        <div class="tableback">
            <h4>Issued Book's Detail</h4>
            <table class="table_bordered">
                <tr class="head-table">
                    <th>Name</th>
                    <th>Author</th>
                    <th>Number</th>
                </tr>
                <div class="table-contents">
                    <?php
                        $query_run = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_assoc($query_run)){
                    ?>
                        <tr>
                            <td><?php echo $row['book_name'];?></td>
                            <td><?php echo $row['book_author'];?></td>
                            <td><?php echo $row['book_no'];?></td>
                        </tr>
                    <?php
                        }
                    ?>	
                </div>
            </table>
        </div>
    </div>
        
</body>
</html>