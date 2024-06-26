<?php
	session_start();
	$connection = mysqli_connect("localhost", "root", "");
	$db = mysqli_select_db($connection, "lms");
	$name = "";
	$email = "";
	$mobile = "";
	$book_name = "";
	$book_author = "";
	$book_no = "";
	$book_category = "";
	$book_price = "";

	if (isset($_SESSION['email'])) {
		$query = "SELECT * FROM admins WHERE email = '$_SESSION[email]'";
		$query_run = mysqli_query($connection, $query);
		while ($row = mysqli_fetch_assoc($query_run)) {
			$name = $row['first_name'];
			$email = $row['email'];
			$mobile = $row['mobile'];
		}
	}

	if (isset($_GET['bn'])) {
		$query = "SELECT * FROM books WHERE book_no = '$_GET[bn]'";
		$query_run = mysqli_query($connection, $query);
		while ($row = mysqli_fetch_assoc($query_run)) {
			$book_name = $row['book_name'];
			$book_author = $row['book_author'];
			$book_no = $row['book_no'];
			$book_category = $row['book_category'];
			$book_price = $row['book_price'];
		}
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
    alert("Book updated successfully...");
    window.location.href = "manage_book.php";
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
        <h2>Update a Book</h2>

        <div class="add-form">
       

        <form action="edit_book.php?bn=<?php echo $book_no; ?>" method="post">
    <label for="bookName">Book Name:</label>
    <input type="text" id="book_name" name="book_name" value="<?php echo $book_name;?>" class="form-control"required><br>

    <label for="authorName">Author Name:</label>
    <input type="text" id="book_author" name="book_author" value="<?php echo $book_author;?>" class="form-control" required><br>
    <label for="bookNumber">Book Number:</label>
    <input type="text" id="book_no" name="book_no" value="<?php echo $book_no;?>" class="form-control" disabled required><br>

    <label for="category">Category:</label>
    <input type="text" id="book_category" name="book_category" value="<?php echo $book_category;?>" class="form-control" required><br>

    <label for="bookPrice">Book Price:</label>
    <input type="text" id="book_price" name="book_price"  value="<?php echo $book_price;?>" class="form-control" required><br>

    <button type='submit' name="update" class='add' onclick='alertMsg()'>Update book</button>

</form>
        </div>
        <?php
        if (isset($_POST['update'])) {
            $query = "UPDATE books SET book_name = '$_POST[book_name]', book_author = '$_POST[book_author]', book_category = '$_POST[book_category]', book_price = '$_POST[book_price]' WHERE book_no = '$_GET[bn]'";
            $query_run = mysqli_query($connection, $query);
            echo '<script type="text/javascript">window.location.href = "manage_book.php";</script>';
            exit();
            
       
        }
    ?>

        </body>
</html>