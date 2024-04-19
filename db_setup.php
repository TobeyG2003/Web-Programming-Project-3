<?php
$host = "localhost";
$user = "tgray31";
$pass = "tgray31";
$dbname = "tgray31";

$conn = new mysqli($host, $user, $pass, $dbname);
$sql = "CREATE TABLE IF NOT EXISTS Users(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	username varchar(60) NOT NULL,
	password varchar(60) NOT NULL,
	firstname varchar(60) NOT NULL,
	lastname varchar(60) NOT NULL,
	email varchar(60) NOT NULL,
	role varchar(60) NOT NULL)";
	
	if ($conn->query($sql) === TRUE) {
    echo "Table users created successfully";
}
else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>