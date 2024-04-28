<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1); 
//I added this to check for database connection errors

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
    $host = "localhost";
    $user = "tgray31";
    $pass = "tgray31";
    $dbname = "tgray31";
    $error = false;
    $errmsg = '';

    // Attempt to establish a connection to the database
    $conn = new mysqli($host, $user, $pass, $dbname);

    $email = $_POST["email"];
    $password = $_POST["password"];

    // Query to check if the email exists and the password matches
    $sql = "SELECT * FROM Users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login successful
        $row = $result->fetch_assoc(); // Retrieve user data
        $_SESSION['email'] = $email; // Store email in session (you can store more data if needed)
    } else {
        // Login failed
        $error = true;
        $errmsg .= "Invalid email or password";
    }
} else {
    header("location:login.html");
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
        .box {
            text-align: center;
        }
    </style>
    <link rel="stylesheet" href="style.css">
    <title>Login Validation</title>
</head>
<body>
<!-- I remove this because it's not working with my code banner()-->
<br><br>
<h2>Login Validation</h2>
<div class="box">
    <?php
    if ($error) {
        echo "<h3>An error has occurred:</h3>"
            . "<p>" . $errmsg . "</p>"
            . "<p><a href='./login.html'>Retry</a></p>";
    } else {
        echo "<h3>Login successful!</h3>"
            . "<p>You are now logged in.</p>"
            . "<p><a href='SELLDASH.php'>Go to Seller Dashboard</a></p>";
    }
    ?>
</div>
</body>
</html>
