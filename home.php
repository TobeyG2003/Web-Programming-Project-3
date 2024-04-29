<?php
include 'common.php';
session_start();
if (isset($_COOKIE['username'])) {
	$_SESSION['username'] = $_COOKIE['username'];
}
if (isset($_COOKIE['role'])) {
	$_SESSION['role'] = $_COOKIE['role'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="style.css">
    <title>Real Estate Kings</title>
	<style>
		button {
		height: 80px;
		width: 60%;
		}
	.useroptions {
		width: 250px;
		position: absolute;
		z-index: 1;
		font-size: 25pt;
		color: white;
		top: 0;
		right: 0;
	}
	.useroptions > a {
		color: white;
	}
	a:hover {
	color: gold;
	}
	</style>
</head>
<body>
<?= banner(); ?>
<div class = "images">
<img class = "image" src = "./house1.png" alt = "house">
<img class = "image" src = "./housemiddle.jpg" alt = "house">
<img class = "image" src = "./house2.webp" alt = "house">
<div class = "imagetext">
Sell Your House and <span>Get Rich</span>. Find Your <span>Dream Home</span>.<br>
Live Like a <span>King</span>.
</div>
</div>
<div class = "goldline2"></div>
<div class = "grad"></div><br>
<h1>WELCOME TO REAL ESTATE KINGS</h1>
<main>
<div class = "contain">
<?php
	if($_SESSION['username']) {
	echo "<h2 class = 'whitetext'>" . $_SESSION['username'] . "\'s  DASHBOARD
	View My Properties<br><br>";
		if ($_SESSION['role'] == 'seller') {
			echo "<a href='./SELLDASH.php'><button>GO TO MY DASHBOARD</button></a>";
		} else {
			echo "<a href='./home.php'><button>GO TO MY DASHBOARD</button></a>";//no buyer or admin dash
		}
	} else {
	echo "<h2 class = 'whitetext'>SIGN IN</h2>
	Already have an account? Sign in here!<br><br>
	<a href='./login.html'><button>SIGN IN TO AN EXISTING ACCOUNT</button></a><br><br>
	<h2 class = 'whitetext'>REGISTER</h2>
	New user? Create an account here!<br><br>
	<a href='./signup.html'><button>REGISTER AN ACCOUNT</button></a>";
	}
?>
</div>
<h2>ABOUT US</h2>
<p class = "text">We here at Real Estate Kings diligently work and strive for only one goal: to 
give you the royal lifestyle that you deserve! Our aim is to maximize the potential 
profits earned from selling your estate, or helping you in that search for the perfect
home of your wildest dreams, ultimately resulting in a new luxurious life, just for you! <br><br>
Our expert team of real estate agents are dedicated to securing 
these lofty goals and are working hard to ensure optimal pricing to create the best possible outcome
for you! Our realtors are highly specialized in order to be fully capable of dealing with the specific
requirements our users may have and are fully certified and professionally trained to be the best 
in the industry. With their valuabe expertise, your property is in infallible care, guarranteed!<br><br>
Founded recently in 2024 by Tobey Gray, John Pham, and Eric Howard-Graham, Real Estate Kings set out to 
shake up the industry in such a way that buying and selling would be easier than ever before. Thousands of
users have already signed up and have found great success in their real estate ventures, with the total value
of properties that have been bought and sold through Real Estate Kings reaching the millions of dollars. You
too can achieve this great success, sign up today!
</p>
<h2 class = "reviewstitle">Reviews</h2>
<h3>But don't just take our word for it, just listen to these stellar reviews!</h3>
<div class = "reviews">
<div class = "review">
	<img class = "stars" src = "./good.png"> - John Doe<br><br>
Excellent service! I was able to sell my house almost immediately--for a nice profit too!
</div>
<div class = "review">
	<img class = "stars" src = "./good.png"> - Bob Smith<br><br>
Very easy to use! Found the perfect house in only a few minutes and confirmation was also fast.
</div>
<div class = "review">
	<img class = "starsbad" src = "./bad.png"> - [deleted]<br><br>
This message has been deleted by an admin.
</div>
</div>
</main>
</body>
</html>