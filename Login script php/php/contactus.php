<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<header>
    <title>Hello and welcome</title>
</header>
<body>
<div class="banner"></div>

<?php
session_start();

//Nav bar changes dependent if the user is admin, just a member or not logged in
if(isset($_SESSION['isloggedin'])){
if ($_SESSION['isloggedin'] == true && $_SESSION['isadmin'] == 1) {

    ?>

    <ul>
        <li><a href="mainpage.php">Home</a></li>
        <li><a href="shop.php">Shop</a></li>
        <li><a href="uploadpage.php">Upload</a></li>
        <li><a href="deleteitem.php">Remove item</a></li>
        <li><a href="modifyitem.php">Modify item</a></li>
        <li class="active"><a href="contactus.php">Contact</a></li>
        <li><a href="aboutus.php">About</a></li>
    </ul>

<?php
//If user is logged in, but not admin
} else if ($_SESSION['isloggedin'] == true && $_SESSION['isadmin'] == 0) {

    ?>

    <ul>
        <li><a href="mainpage.php">Home</a></li>
        <li><a href="shop.php">Shop</a></li>
        <li class="active"><a href="contactus.php">Contact</a></li>
        <li><a href="aboutus.php">About</a></li>
    </ul>

<?php
}
    //If user is not logged in
} else {

    ?>

    <ul>
        <li><a href="mainpage.php">Home</a></li>
        <li class="active"><a href="contactus.php">Contact</a></li>
        <li><a href="aboutus.php">About</a></li>
    </ul>

<?php
}
?>




<div class="mainbox">
    <div class="text">

        <h1>This is the contact page. Information is to come at a later date</h1>

    </div>
</div>

<?php

// If user is logged in, the logoutbox shows
if($_SESSION['isloggedin'] == true){
    include 'logoutbox.php';
}
else{
    ?>
<!-- If user is not logged in, the Login box shows -->

<?php include'loginbox.php';
}
?>