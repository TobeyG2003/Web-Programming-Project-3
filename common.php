<?php
function encrypt($key) {
	$ciphering = "AES-128-CTR";
	$options = 0;
	$encryption_iv = '1234567891011121';
	$encryption_key = "MyEncryption";
	$encryption = openssl_encrypt($key, $ciphering,
            $encryption_key, $options, $encryption_iv);
	return $encryption;
}

function decrypt($key) {
	$ciphering = "AES-128-CTR";
	$decryption_iv = '1234567891011121';
	$decryption_key = "MyEncryption";
	$options = 0;
	$decryption = openssl_decrypt ($key, $ciphering, $decryption_key, $options, $decryption_iv);
		return $decryption;
}
function banner() {
	echo '<div class = "bannerimg">';
	if ($_SESSION['username']) {
	echo '<div class = "useroptions"><a href = "./signout.php">Sign Out</a></div>';
	} else {
	echo '<div class = "useroptions"><a href = "./signup.php">Sign Up</a> or <a href = "./login.php">Login</a></div>';
	}
	echo '</div>
<div class = "logo">R E <span class = "letter">K </span><img class = "crown" src = "./crown2.png"></div>
<div class = "goldline"></div>';
}
?>