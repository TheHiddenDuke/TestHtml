<?php
/**
 * Created by PhpStorm.
 * User: Jarand
 * Date: 30/01/2017
 * Time: 13:31
 */
?>
<!-- Login box-->
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<header>
    <title>Hello and welcome</title>
</header>
    <body>
    <div class="banner"></div>


    <ul>
        <li class="active"><a href="mainpage.php">Home</a></li>
        <li><a href="shop.php">Shop</a></li>
        <li><a href="contactus.php">Contact</a></li>
        <li><a href="aboutus.php">About</a></li>
    </ul>

<div class="mainbox">
    <div class="text">
    <?php
    echo "Welcome, " . $_SESSION['username'] . ", to administrative site!";
    ?>
    </div>


    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>

</div>
<div class="rightWrapper">
    <div class="loginbox">
        <tr>
            <td>
                <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#f2f2f2">
                    <tr>
                        <td colspan="3" align="center"><font size="6"> You are logged in </font></td>
                    </tr>
                    <form name="form1" method="post" action="logout.php">
                        <tr>
                            <td width="78">Logout?</td>
                            <td width="6">:</td>
                            <td width="294"><input type="submit" name="Logout" value="Logout"></td>
                        </tr>
                    </form>
                </table>
            </td>
        </tr>
    </div>
</div>
    </body>
    </html>


<?php
//Query after item name and values

$mysqli = new mysqli("localhost", "root", "heihei", "innlogging") or die("cannot connect");
$result = $mysqli->query("SELECT itemname FROM items");
//Checkbox list

include 'checkboxlist.php';

$mysqli->close();
?>