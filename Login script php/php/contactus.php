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

} else if ($_SESSION['isloggedin'] == true && $_SESSION['isadmin'] == 0) {

    ?>

    <ul>
        <li><a href="mainpage.php">Home</a></li>
        <li><a href="shop.php">Shop</a></li>
        <li class="active"><a href="contactus.php">Contact</a></li>
        <li><a href="aboutus.php">About</a></li>
    </ul>

<?php
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

if($_SESSION['isloggedin'] == true){
    include 'logoutbox.php';
}
else{
    ?>
    <div class="rightWrapper">
    <div class="loginbox">
    <tr>
        <form name="form1" method="post" action="checklogin.php">
            <td>
                <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#f2f2f2">
                    <tr>
                        <td colspan="3"><strong>Member Login </strong></td>
                    </tr>
                    <tr>
                        <td width="78">Username</td>
                        <td width="6">:</td>
                        <td width="294"><input name="username" placeholder="Username" type="text" id="username"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td><input name="password" placeholder="Password" type="password" id="password"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="Submit" value="Login">
                            <input type="submit" name="Register" value="Register">
                        </td>
                    </tr>
                </table>
            </td>
        </form>
    </tr>
</div>
</div>
<?php
}
?>