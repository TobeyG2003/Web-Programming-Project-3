<?php
// Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Delete the session cookie by setting its expiration to the past
setcookie(session_name(), '', time() - 3600, '/');

// Display a JavaScript alert
echo '<script>alert("Logged out successfully");</script>';

// Redirect back to the login page after a short delay
echo '<script>setTimeout(function() { window.location.href = "login.html?logout=success"; }, 1000);</script>';
?>
