<?php
$host = "localhost";
$user = "tgray31";
$pass = "tgray31";
$dbname = "tgray31";

include("configure.php");
$conn = new mysqli($host, $user, $pass, $dbname);
$sql = "CREATE TABLE USERS(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	username varchar(60) NOT NULL,
	password varchar(60) NOT NULL,
	firstname varchar(60) NOT NULL,
	lastname varchar(60) NOT NULL,
	email varchar(60) NOT NULL,
	role varchar(60) NOT NULL)";
	
	if ($conn->query($sql) === TRUE) {
    echo "Table USERS created successfully";
}
else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>