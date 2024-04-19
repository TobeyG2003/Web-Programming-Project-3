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
	
	$fname = $_POST["firstname"];
	$lname = $_POST["lastname"]; 
	$email = $_POST["email"]; 
	$user = $_POST["username"]; 
	$pass = $_POST["password"];
	$role = $_POST["role"];
	
	$sql = "INSERT INTO Users (username, password, firstname, lastname, email, role)
VALUES (\"$user\",\"$pass\",\"$fname\",\"$lname\",\"$email\",\"$role\")";

if ($conn->query($sql) === TRUE) {
    echo "Table STUDENTS created successfully";
}
else {
    echo "Error creating table: " . $conn->error;
}
	echo mysql_get_server_info() . "\n";
	$conn->close();
	
	$_SESSION['fname'] = $_POST["firstname"];
	$_SESSION['lname'] = $_POST["lastname"]; 
	$_SESSION['email'] = $_POST["email"]; 
	$_SESSION['user'] = $_POST["username"]; 
	$_SESSION['pass'] = $_POST["password"];
	$_SESSION['pass'] = $_POST["password"];
	$_SESSION['role'] = $_POST["role"];
	
	echo $_SESSION['fname'], $_SESSION['lname'], $_SESSION['email'], $_SESSION['user'], $_SESSION['pass'], $_SESSION['role'];
	//if (username taken) wip
} else {
	echo "bad";
}

?>