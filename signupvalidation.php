<?php
include 'common.php'; //add common functions
session_start(); //session variables

if ($_SERVER["REQUEST_METHOD"] == "POST") { //if submit/post from signup page
	$host = "localhost"; //db details
	$user = "tgray31";
	$pass = "tgray31";
	$dbname = "tgray31";
	$error = false; //error check
	$errmsg = ''; //err message

	$conn = new mysqli($host, $user, $pass, $dbname); //connect to db
	
	$email = $_POST["email"];  //email var
	$user = $_POST["username"]; //user var
	
	$sql_u = "SELECT * FROM Users WHERE username='$user'"; //select all rows where the username column = entered username
	$sql_e = "SELECT * FROM Users WHERE email='$email'"; //select all rows where email col = email
	$res_u = mysqli_query($conn, $sql_u); //get rows
    	$res_e = mysqli_query($conn, $sql_e); //get rows
	
	if (mysqli_num_rows($res_u) > 0) { //if rows > 0 i.e. rows with username already exist
        $errmsg .= "Username is already taken" . "<br>"; //add error
		$error = true; //error found
    }
	if(mysqli_num_rows($res_e) > 0) { //if rows > 0 i.e. rows with email already exist 
        $errmsg .= "This email is already registered" . "<br>"; //add error
		$error = true; //error found
    }
	if (!$error) { //if there isn't an error
	$_SESSION['fname'] = $_POST["firstname"]; //set session vars 
	$_SESSION['lname'] = $_POST["lastname"]; 
	$_SESSION['email'] = $_POST["email"]; 
	$_SESSION['user'] = $_POST["username"]; 
	$_SESSION['pass'] = $_POST["password"];
	$_SESSION['role'] = $_POST["role"];
	
	//echo $_SESSION['fname'], $_SESSION['lname'], $_SESSION['email'], $_SESSION['user'], $_SESSION['pass'], $_SESSION['role'];
	}
} else { //else (not entered from signup page)
	header("location:signup.php");  //redirect to signup
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<style>
	h2 {
		text-align: center;
	}
	h1 {
		margin-bottom: 0;
	}
	.box {
	text-align: center;
	}
	</style>
	<link rel="stylesheet" href="style.css">
    <title>Real Estate Kings</title>
</head>
<body>
<?= banner(); ?><br><br>
<h1>Verify Details</h1>
<div class = "box">
<?php
if ($error) { //if error found
	echo "<h2>An error has occurred.</h2>"
	. $errmsg . "<br><br>
	Please try again.<br>
	<pre><a href = './signup.php'>Retry</a> <a href = './home.html'>Return Home</a></pre>";
} else { //no error, print details
	echo "<h2>Review Details</h2>
	First Name: " . $_SESSION['fname'] . "<br>
	Last Name: " . $_SESSION['lname'] . "<br>
	Email: " . $_SESSION['email'] . "<br>
	Username: " . $_SESSION['user'] . "<br>
	Password: " . $_SESSION['pass'] . "<br>
	Role: " . $_SESSION['role'] . "<br><br>
	Is this okay?<br>
	<pre><a href = './completeregistration.php'>Continue</a> <a href = './signup.php'>Retry</a> <a href = './home.php'>Return Home</a></pre>";
	
}
?>
</div>
</body>
</html>
