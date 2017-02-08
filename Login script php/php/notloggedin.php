<?php
/**
 * Created by PhpStorm.
 * User: Jarand
 * Date: 30/01/2017
 * Time: 13:33
 */

?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<header>
    <title>Hello and welcome</title>
</header>
<body>
<div class="banner"></div>
<div class="nav">
    <table>
        <tr>
            <td width="120px">
                <a href="mainpage.php">Home</a>
            </td>
            <td width="120px">
                <a href="shop.php">Shop</a>
            </td>
            <td width="170px">
                <a href="aboutus.php">About us</a>
            </td>
            <td width="150px">
                <a href="contactus.php">Contact us</a>
            </td>
        </tr>
    </table>
</div>
<div class="mainbox">
<div class="text">
<h1>Welcome to this wonderful site, please log in!</h1>
</div>
</div>
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
                        <td width="294"><input name="username" type="text" id="username"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td><input name="password" type="password" id="password"></td>
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