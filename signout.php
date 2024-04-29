<?php
session_start(); /* Starts the session */
session_destroy(); /* Destroy started session i.e. all session vars */
if (isset($_SERVER['HTTP_COOKIE'])) { //if there are cookies
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']); //split cookies into array
    foreach($cookies as $cookie) { //for each cookie
        $parts = explode('=', $cookie); 
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000); //delete it
        setcookie($name, '', time()-1000, '/');
	}
}
header("location:home.php"); /*return to front page*/
exit;
?>
