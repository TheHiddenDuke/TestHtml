<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="noreferrer" href="../xml/test.xml">
</head>
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
    <?php
    session_start();
    if($_SESSION['isloggedin']==true) {
        echo "Welcome, " . $_SESSION['username'] . ", to administrative site!";
    }
    else{header("location:mainpage.php");}
    ?>


</div>
<?php
$xmlDoc = new DOMDocument();
$xmlDoc->load("../xml/itemlist.xml");

$itemname = $xmlDoc ->getElementsByTagName("itemname");
$itemvalue = $xmlDoc ->getElementsByTagName("itemvalue");
$itemdescription = $xmlDoc ->getElementsByTagName("itemdescription");
for($i=0; $i<$itemname->length;$i++) {
    echo "<div class='shoppinglist'><img src='../images/content".$i.".png'/></div>";
    echo "<h1>" . $itemname[$i]->nodeValue . "</h1><br>";
    echo $itemdescription[$i]->nodeValue . "<br>";
    echo "<h2>" . $itemvalue[$i]->nodeValue . "</h2><br>";
}
?>
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
include'footershop.php';
$mysqli->close();

?>