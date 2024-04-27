<?php
// Database connection
$host = "localhost";
$user = "tgray31";
$pass = "tgray31";
$dbname = "tgray31";

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve email and password from POST data
$email = $_POST['email'];
$password = $_POST['password'];

// Query to check if the email and password match in the database
$sql = "SELECT * FROM Users WHERE email = '$email' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Login successful, set session and redirect to SELLDASH.php
    session_start();
    $_SESSION['email'] = $email; // You can store other user data in session if needed
    header("Location: SELLDASH.php");
    exit();
} else {
    // Login failed, redirect back to login.html
    header("Location: login.html");
    exit();
}

$conn->close();
?>
