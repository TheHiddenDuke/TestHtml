<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="noreferrer" href="../xml/test.xml">
</head>
<body>

<div class="banner"></div>

<!--Navbar top-->
<?php
session_start();
if($_SESSION['isadmin'] == true){
    ?>
    <ul>
    <li><a href="mainpage.php">Home</a></li>
    <li class="active"><a href="shop.php">Shop</a></li>
    <li><a href="uploadpage.php">Upload</a></li>
        <li><a href="deleteitem.php">Remove item</a></li>
        <li><a href="modifyitem.php">Modify item</a></li>
    <li><a href="contactus.php">Contact</a></li>
    <li><a href="aboutus.php">About</a></li>
</ul>
<?php
}
else{
    ?>
    <ul>
        <li><a href="mainpage.php">Home</a></li>
        <li class="active"><a href="shop.php">Shop</a></li>
        <li><a href="contactus.php">Contact</a></li>
        <li><a href="aboutus.php">About</a></li>
    </ul>
<?php
}
?>



<div class="mainbox">
<div class="text">
    <?php
    if($_SESSION['isloggedin']==true) {
        echo "Welcome, " . $_SESSION['username'] . ", to the shop!";
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
$itemicon = $xmlDoc->getElementsByTagName("itemicon");




for($i=0; $i<$itemname->length;$i++) {
    ?><div class="itembox">
    <table><?php
        echo "<tr><td width='140px'><div class='shoppinglist'><img style='vertical-align: top' src='../images/" . $itemicon[$i]->nodeValue . "'/></div></td>";
    echo "<td><h1>" . $itemname[$i]->nodeValue . "</h1><br>";
    echo $itemdescription[$i]->nodeValue;
    echo "<h2>" . $itemvalue[$i]->nodeValue . "</h2><br></td>";
    ?>
        </tr></table></div>
    <?php
}
?>
</div>

<?php include 'logoutbox.php'; ?>

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