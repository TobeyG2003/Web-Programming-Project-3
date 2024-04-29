<?php
include 'common.php'; // Include common.php for encryption functions
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection details
$host = "localhost";
$user = "tgray31";
$pass = "tgray31";
$dbname = "tgray31";

// Attempt to establish a connection to the database
$conn = new mysqli($host, $user, $pass, $dbname);

$error = false;
$errmsg = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve email and password from POST data
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Encrypt the password provided by the user for validation
    $input_encrypted_password = encrypt($password);
    
    // Query the database to retrieve the stored encrypted password and username for the given email
    $sql = "SELECT * FROM Users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stored_encrypted_password = $row['password']; // Assuming 'password' is the column name in the database
        
        // Compare the stored encrypted password with the encrypted password provided by the user
        if ($stored_encrypted_password === $input_encrypted_password) {
            // Passwords match, login successful
            $_SESSION['email'] = $email; // Store email in session (you can store more data if needed)
            $_SESSION['username'] = $row['username']; // Store username associated with the email
            $_SESSION['role'] == $row['role'];
			
            // Set a cookie with the user's email
            $cookie_name = "user_email";
            $cookie_value = $email;
            $cookie_expire = time() + (86400 * 30); // This code sets a cookie named "user_email" with the user's email value upon successful login, and it will be available for the next 30 days.
            setcookie($cookie_name, $cookie_value, $cookie_expire, "/");
			
			// Set a cookie with the user's username
            $cookie_name = "username";
            $cookie_value = $row['username'];
            setcookie($cookie_name, $cookie_value, $cookie_expire, "/");
			
			// Set a cookie with the user's role
            $cookie_name = "role";
            $cookie_value = $row['role'];
            setcookie($cookie_name, $cookie_value, $cookie_expire, "/");
            
            // Check the role of the user
            $role = $row['role'];
            if ($role === 'seller') {
                // If the user is a seller, redirect to the seller dashboard
                header("Location: SELLDASH.php");
                exit();
            } elseif ($role === 'buyer') {
                // If the user is a buyer, redirect to the buyer dashboard
                header("Location: home.php");
                exit();
            } elseif ($role === 'admin') {
                // If the user is an admin, redirect to the admin dashboard
                header("Location: home.php");
                exit();
            } else {
                // If the role is not recognized, redirect to a default page (e.g., home)
                header("Location: home.php");
                exit();
            }
        } else {
            // Passwords don't match, login failed
            $error = true;
            $errmsg .= "Invalid email or password";
        }
    } else {
        // No user found with the provided email, login failed
        $error = true;
        $errmsg .= "User not found";
    }
} else {
    // Redirect to login page if accessed directly
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

<br><br>
<h2>Login Validation</h2>
<div class="box">
    <?php
    if ($error) {
        echo "<h3>An error has occurred:</h3>"
            . "<p>" . $errmsg . "</p>"
            . "<p><a href='./login.html'>Retry</a></p>";
    }
    ?>
</div>
</body>
</html>


