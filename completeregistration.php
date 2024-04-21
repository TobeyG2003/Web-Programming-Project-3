<?php
session_start();
echo "data added to server\n";
echo $_SESSION['fname'], $_SESSION['lname'], $_SESSION['email'], $_SESSION['user'], $_SESSION['pass'], $_SESSION['role'];
session_destroy();
?>
<a href = "signup.html">return</a>