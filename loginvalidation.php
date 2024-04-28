<?php
include 'common.php'; // Include common.php for encryption functions
session_start();

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
    
    // Query the database to retrieve the stored encrypted password and username for the given email
    $sql = "SELECT * FROM Users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stored_encrypted_password = $row['password']; // Assuming 'password' is the column name in the database
        
        // Encrypt the password provided by the user for validation
        $input_encrypted_password = encrypt($password);
        
        // Compare the stored encrypted password with the encrypted password provided by the user
        if ($stored_encrypted_password === $input_encrypted_password) {
            // Passwords match, login successful
            $_SESSION['email'] = $email; // Store email in session (you can store more data if needed)
            $_SESSION['username'] = $row['username']; // Store username associated with the email
            header("Location: SELLDASH.php"); // Redirect to dashboard or any other page
            exit();
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
<?= banner(); // Call the banner function here ?>
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


