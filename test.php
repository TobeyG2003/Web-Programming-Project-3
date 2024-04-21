<?php
include 'common.php';
$key = 'testing123';
$encrypted = encrypt($key);
echo $encrypted;
$decrypted = decrypt($encrypted);
echo $decrypted;
?>