<?php
// Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Delete the session cookie by setting its expiration to the past
setcookie(session_name(), '', time() - 3600, '/');

// Display a JavaScript alert shows success in address bar
echo '<script>alert("Logged out successfully");</script>';

// Redirect back to the login page after logout
header("Location: login.html?logout=success");
exit();
?>
