<?php
include 'common.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$_SESSION['fname'] = $fname = $_POST["firstname"];
	$_SESSION['lname'] = $lname = $_POST["lastname"]; 
	$_SESSION['email'] = $email = $_POST["email"]; 
	$_SESSION['user'] = $user = $_POST["username"]; 
	$_SESSION['pass'] = $pass = $_POST["password"];
	$_SESSION['role'] = $role = $_POST["role"];
	
	echo $_SESSION['fname'], $_SESSION['lname'], $_SESSION['email'], $_SESSION['user'], $_SESSION['pass'], $_SESSION['role'];
} else {
	header("location:signup.html");
	exit;
}
?>
<h1>Verify Details</h1>
<a href = "./completeregistration.php">Continue</a>