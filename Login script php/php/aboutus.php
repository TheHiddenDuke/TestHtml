<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<header>
    <title>Hello and welcome</title>
</header>
<body>
<div class="banner"></div>

<!-- Check if user is logged in -->
<!-- Change the nav-bar dependent if the user is logged in and/or if the user is an administrator -->
<?php
session_start();

if ($_SESSION['isloggedin'] == true && $_SESSION['isadmin'] == 1) {

    ?>

    <ul>
        <li><a href="mainpage.php">Home</a></li>
        <li><a href="shop.php">Shop</a></li>
        <li><a href="uploadpage.php">Upload</a></li>
        <li><a href="deleteitem.php">Remove item</a></li>
        <li><a href="modifyitem.php">Modify item</a></li>
        <li><a href="contactus.php">Contact</a></li>
        <li class="active"><a href="aboutus.php">About</a></li>
    </ul>

    <?php

} else if ($_SESSION['isloggedin'] == true && $_SESSION['isadmin'] == 0) {

    ?>

    <ul>
        <li><a href="mainpage.php">Home</a></li>
        <li><a href="shop.php">Shop</a></li>
        <li><a href="contactus.php">Contact</a></li>
        <li class="active"><a href="aboutus.php">About</a></li>
    </ul>

    <?php
    //If user is not logged in
} else {

    ?>

    <ul>
        <li><a href="mainpage.php">Home</a></li>
        <li><a href="contactus.php">Contact</a></li>
        <li class="active"><a href="aboutus.php">About</a></li>
    </ul>

    <?php
}
?>

<!-- Headline of the page -->
<div class="mainbox">
    <div class="text">

        <h1> This is the about page. Information is to come at a later date</h1>

    </div>
</div>

<!-- Logout box -->
<?php
if($_SESSION['isloggedin'] == true){
    include 'logoutbox.php';
}
else{
?>
<!-- Login box -->

<?php include'loginbox.php';
}
?>