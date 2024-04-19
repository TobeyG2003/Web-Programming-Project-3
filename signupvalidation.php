<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$host = "localhost";
	$user = "tgray31";
	$pass = "tgray31";
	$dbname = "tgray31";

	$conn = new mysqli($host, $user, $pass, $dbname);
	if ($conn->connect_error) {
	echo "Could not connect to server\n";
	die("Connection failed: " . $conn->connect_error);
} else {
	echo "Connection established\n";
}
	
	$_SESSION['fname'] = $fname = $_POST["firstname"];
	$_SESSION['lname'] = $lname = $_POST["lastname"]; 
	$_SESSION['email'] = $email = $_POST["email"]; 
	$_SESSION['user'] = $user = $_POST["username"]; 
	$_SESSION['pass'] = $pass = $_POST["password"];
	$_SESSION['role'] = $role = $_POST["role"];
	
	//if (username taken) wip
	
	$sql = "INSERT INTO Users (username, password, firstname, lastname, email, role)
VALUES (\"$user\",\"$pass\",\"$fname\",\"$lname\",\"$email\",\"$role\")";

if ($conn->query($sql) === TRUE) {
    echo "Table data created successfully";
}
else {
    echo "Error creating table: " . $conn->error;
}
	$conn->close();
	header("location:completeregistration.php");
	exit;
	
} else {
	echo "bad";
}

?>