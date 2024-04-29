<?php
include 'common.php'; //include common functions
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="style.css">
	<style>
	.error {
	color: red;
	display: table;
    margin: 0 auto;
	}
	h2 {
		text-align: center;
		margin-bottom: 1%;
	}
	h1 {
		margin-bottom: 0;
	}
	pre {
	text-align: center;
	}

	</style>
	<script>
	function validate() { //js validation 
		let errfound = false; //var for checking if there was an error found
		let err = "There are errors in the following fields: \n"; //var containing string for listing errors
		let fname = document.forms["myform"]["firstname"].value; //vars filled by form values
		let lname = document.forms["myform"]["lastname"].value;
		let email = document.forms["myform"]["email"].value;
		let user = document.forms["myform"]["username"].value;
		let pass = document.forms["myform"]["password"].value;
		if (/\s/.test(fname) || /\d/.test(fname)) { //if name contains numbers or spaces
			errfound = true; //error found
			err += "First Name \n"; //add error to list
			document.getElementById("fname_err").innerHTML = "Invalid Entry: Numbers and Blank Spaces Not Allowed.<br />";  //populate span in page with error
		} else {
			document.getElementById("fname_err").innerHTML = ""; //no error found, no error to print
		}
		if (/\s/.test(lname) || /\d/.test(lname)) { //if spaces or numbers
			errfound = true; //error found
			err += "Last Name \n"; //add error to list
			document.getElementById("lname_err").innerHTML = "Invalid Entry: Numbers and Blank Spaces Not Allowed.<br />"; //error in span 
		} else {
			document.getElementById("lname_err").innerHTML = ""; //no error
		}
		if (/\s/.test(email)) { //space in email
			errfound = true; //error found
			err += "Email \n"; //add error
			document.getElementById("email_err").innerHTML = "Invalid Entry: Blank Spaces Not Allowed.<br />";  //error in span
		} else {
			document.getElementById("email_err").innerHTML = ""; //no error
		}
		if (/\s/.test(user)) { //space in username
			errfound = true; //error found 
			err += "Username \n"; //add error
			document.getElementById("user_err").innerHTML = "Invalid Entry: Blank Spaces Not Allowed.<br />"; //error in span
		} else {
			document.getElementById("user_err").innerHTML = "";  //no error
		}
		if (/\s/.test(pass) || pass.length < 8) { //space or password length shorter than 8 chars
			errfound = true; //error found
			err += "Password \n"; //add error
			document.getElementById("pass_err").innerHTML = "Invalid Entry: Blank Spaces Not Allowed, Must be at least 8 characters long<br />";  //error in span
		} else {
			document.getElementById("pass_err").innerHTML = ""; //no error
		}
		if (errfound) { //if an error was found
			alert(err); //alert with error string (contains all errors added)
			return false; //false, don't continue
		}
	}
	</script>
    <title>Registration</title>
</head>
<?= banner(); ?><br><br>
<body>
    <h1>Register an Account</h1>
	<div class = "box">
    <form name = "myform" action="./signupvalidation.php" onsubmit = "return validate()" method="post">
		<h2>Personal Information</h2>
		<span class = "error" id = "fname_err"></span>
        <label for="firstname">First Name:</label><br>
        <input type="text" id="firstname" name="firstname" placeholder="Enter your first name" required><br>
		<span class = "error" id = "lname_err"></span>
        <label for="lastname">Last Name:</label><br>
        <input type="text" id="lastname" name="lastname" placeholder="Enter your last name" required><br>
		<span class = "error" id = "email_err"></span>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" placeholder="Enter your email address" required><br>

        <h2>Account Details</h2>
		<span class = "error" id = "user_err"></span>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" placeholder="Enter your username" required><br>
		<span class = "error" id = "pass_err"></span>
        <label for="password">Password:</label><br>
        <input type="text" id="password" name="password" placeholder="Enter your password" required><br>
		<label for="role">User Status: </label><br>
		<select name="role" id="role">
			<option value="buyer">Buyer</option>
			<option value="seller">Seller</option>
			<option value="admin">Admin</option>
		</select><br>

        <pre><input type="submit" value="Submit"> <input type="reset" value="Reset"></pre><br>
		<pre>Already have an account? <a href = './login.php'>Login</a> <a href = './home.php'>Return Home</a></pre>
    </form>
	</div>
</body>
</html>
