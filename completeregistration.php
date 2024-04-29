<?php
include 'common.php';
session_start();
if (isset($_SESSION['fname'], $_SESSION['lname'], $_SESSION['email'], $_SESSION['user'], $_SESSION['pass'], $_SESSION['role'])) {
	$host = "localhost";
	$user = "tgray31";
	$pass = "tgray31";
	$dbname = "tgray31";

	$conn = new mysqli($host, $user, $pass, $dbname);
	
	$fname = $_SESSION['fname'];
	$lname = $_SESSION['lname'];
	$email = $_SESSION['email'];
	$user = $_SESSION['user']; 
	$pass = $_SESSION['pass'];
	$role = $_SESSION['role'];
	
	$encrypted = encrypt($pass);
	
	
	$sql = "INSERT INTO Users (username, password, firstname, lastname, email, role)
VALUES (\"$user\", \"$encrypted\",\"$fname\",\"$lname\",\"$email\",\"$role\")";
echo "data added to server\n";
$conn->query($sql);
	$conn->close();
echo $_SESSION['fname'], $_SESSION['lname'], $_SESSION['email'], $_SESSION['user'], $_SESSION['pass'], $_SESSION['role'];
session_destroy();
} else {
	header("location:signup.html");
	exit;
}
?>
<<!DOCTYPE html>
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
<h1>Complete Registration</h1>
<div class = "box">
<h2>Congratulations!</h2>
Your account has been sucessfully created.<br><br>
Would you like to login?<br>
<pre><a href = './login.php'>Login</a> <a href = './home.php'>Return Home</a>
</div>
</body>
</html>