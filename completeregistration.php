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
	
	//if (username taken) wip
	
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
<h1>Registration complete!</h1>
<a href = "signup.html">return</a>