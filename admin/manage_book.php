<?php
	session_start();
    #fetch data from database
    $connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");
	$name = "";
	$email = "";
	$mobile = "";
	$query = "select * from admins where email = '$_SESSION[email]'";
	$query_run = mysqli_query($connection,$query);
	while ($row = mysqli_fetch_assoc($query_run)){
		$name = $row['first_name'];
		$email = $row['email'];
		$mobile = $row['mobile'];
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
    <link rel="stylesheet" href="./add.css">
    <script type="text/javascript">
function alertMsg() {
    alert("Book added successfully...");
    window.location.href = "admin_dashboard.php";
}

</script>
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
    margin: 100px;
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
.table-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }

h4{
    font-size: 25px;
    font-family: sans-serif;
    text-align: center;
}
/* .tableback {
            height: 65vh;
            width: 900px;
        } */

.table_bordered {
            width: 100%;
            text-align: center;
            margin-top: 0px;
            font-family: sans-serif;
            width: 1000px;
            height: 100px;
 }
th, td {
            border: 1px solid blue;
            padding: 12px;
            height: 25px;
            font-family: cursive;
            font-weight: 500;
        }

th {
    background-color:#34c3eb;
}
tr:hover {
            background-color: #34c3eb;
        }

.btn{
    width: 50px;
    height: 40px;
    background-color: #2274f0;
    outline: 0px;
    border: none;
    border-radius: 10px;

}
.btn a{
    
    color: white;
    font-size: 15px;

}
.btn a:hover{
    color: black;
    font-size: 15px;

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

        <div class="table-container">
        <div class="tableback">
            <h4>Manage Books</h4>
            <table class="table_bordered">
                <tr class="head-table">
                            <th>Name</th>
							<th>Author</th>
							<th>Category</th>
							<th>ISBN No.</th>
							<th>Price</th>
							<th>Action</th>
                </tr>
                <div class="table-contents">
                <?php
						$connection = mysqli_connect("localhost","root","");
						$db = mysqli_select_db($connection,"lms");
						$query = "select * from books";
						$query_run = mysqli_query($connection,$query);
						while ($row = mysqli_fetch_assoc($query_run)){
							?>
							<tr>
								<td><?php echo $row['book_name'];?></td>
								<td><?php echo $row['book_author'];?></td>
								<td><?php echo $row['book_category'];?></td>
								<td><?php echo $row['book_no'];?></td>
								<td><?php echo $row['book_price'];?></td>
								<td><button class="btn" name=""><a href="edit_book.php?bn=<?php echo $row['book_no'];?>">Edit</a></button>
								<button class="btn"><a href="delete_book.php?bn=<?php echo $row['book_no'];?>">Delete</a></button></td>
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