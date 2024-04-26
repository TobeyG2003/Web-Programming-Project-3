<?php

	session_start();

?>


<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>CW 07: Nonograms!</title>
  <link href="dashsell.css" type="text/css" rel="stylesheet">
</head>
<body>
    <div class="container">

        <div class="header">
            <h2><?= $_SESSION['user'] ?>'s DASHBOARD</h2>
            <p>Properties: 5</p>
            <p>Saved Listings: 11</p>
            <p>Messages: 4!</p>

        </div>

        <div class="listing-container">
            <div>
                <h2>Listings</h2>
            </div>
            <div id="listingContainer">

            </div>
        </div>

        <div  class="savedhomes">
            <div>
                <h2>Saved Homes</h2>
            </div>
            <div id="SavedHomes">

            </div>
        </div>

        <div class="analytics">
            <div>
                <h2>Analytics</h2>
            </div>

            <div>
            <p>Properties: 5</p>
            <p>Total Views: 125555</p>
            <p>Click Thru Rate: 3.27%</p>
            <p>Equity sold: 1.2 mm</p>             
            </div>

        </div>

        <div class="messages">
            <div>
                <h2>Messages</h2>
            </div>
            <div id="messages-card">

            </div>
        </div>

        <div class="footer">
            <div>
                <h2>Account Settings</h2>
            </div>
            <div class="footitems">
                <a href="#">Update Profile Information</a>
                <a href="#">Privacy Settings</a>
                <a href="#">Notifications</a>
            </div>
        </div>

    </div>



    <script src="selldash.js"></script>
</body>
</html>