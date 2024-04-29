<?php
session_start(); /* Starts the session */
session_destroy(); /* Destroy started session */
setcookie("username", "", time() - 3600); //delete cookie
setcookie("role", "", time() - 3600); //delete cookie
header("location:home.php"); /*return to front page*/
exit;
?>
