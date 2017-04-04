<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<header>
    <title>Hello and welcome</title>
</header>
<body>
<div class="banner"></div>

<!-- Nav bar -->
<ul>
    <li class="active"><a href="mainpage.php">Home</a></li>
    <li><a href="shop.php">Shop</a></li>
    <li><a href="contactus.php">Contact</a></li>
    <li><a href="aboutus.php">About</a></li>
</ul>

<!-- Headline -->
<div class="mainbox">
<div class="text">
<?php
echo "Welcome, " . $_SESSION['username'] . ", to the membership site!";
?>
</div>
</div>
<!-- Login box-->

    <?php include 'logoutbox.php'; ?>
    </body>
    </html>

<?php
//Query after item name and values

$mysqli = new mysqli("localhost", "root", "heihei", "innlogging") or die("cannot connect");
$result = $mysqli->query("SELECT itemname FROM items");
//Checkbox list, 'quick shop'

include 'checkboxlist.php';

$mysqli->close();
?>