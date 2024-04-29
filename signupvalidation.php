<?php
include 'common.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$host = "localhost";
	$user = "tgray31";
	$pass = "tgray31";
	$dbname = "tgray31";
	$error = false;
	$errmsg = '';

	$conn = new mysqli($host, $user, $pass, $dbname);
	
	$email = $_POST["email"]; 
	$user = $_POST["username"]; 
	
	$sql_u = "SELECT * FROM Users WHERE username='$user'";
    $sql_e = "SELECT * FROM Users WHERE email='$email'";
    $res_u = mysqli_query($conn, $sql_u);
    $res_e = mysqli_query($conn, $sql_e);
	
	if (mysqli_num_rows($res_u) > 0) {
        $errmsg .= "Username is already taken" . "<br>";   
		$error = true;
    }
	if(mysqli_num_rows($res_e) > 0){
        $errmsg .= "This email is already registered" . "<br>"; 
		$error = true;
    }
	if (!$error) {
	$_SESSION['fname'] = $_POST["firstname"];
	$_SESSION['lname'] = $_POST["lastname"]; 
	$_SESSION['email'] = $_POST["email"]; 
	$_SESSION['user'] = $_POST["username"]; 
	$_SESSION['pass'] = $_POST["password"];
	$_SESSION['role'] = $_POST["role"];
	
	//echo $_SESSION['fname'], $_SESSION['lname'], $_SESSION['email'], $_SESSION['user'], $_SESSION['pass'], $_SESSION['role'];
	}
} else {
	header("location:signup.html");
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
if ($error) {
	echo "<h2>An error has occurred.</h2>"
	. $errmsg . "<br><br>
	Please try again.<br>
	<pre><a href = './signup.html'>Retry</a> <a href = './home.html'>Return Home</a></pre>";
} else {
	echo "<h2>Review Details</h2>
	First Name: " . $_SESSION['fname'] . "<br>
	Last Name: " . $_SESSION['lname'] . "<br>
	Email: " . $_SESSION['email'] . "<br>
	Username: " . $_SESSION['user'] . "<br>
	Password: " . $_SESSION['pass'] . "<br>
	Role: " . $_SESSION['role'] . "<br><br>
	Is this okay?<br>
	<pre><a href = './completeregistration.php'>Continue</a> <a href = './signup.html'>Retry</a> <a href = './home.php'>Return Home</a></pre>";
	
}
?>
</div>
</body>
</html>