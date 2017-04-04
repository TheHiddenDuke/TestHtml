<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="noreferrer" href="../xml/test.xml">
</head>
<body>

<div class="banner"></div>

<!--Nav bar, Change depending if the user is an admin or not-->
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
//If user is not an admin
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
    <!-- Choose if information comes from database or xml file -->

    <form name="form1" method="post" action="shop.php">
            <select name="item">

                <option value ="data">Database</option>
                <option value ="xml">Xml file</option>

    </select>
    <br>
    <input type="submit" value="Submit">
    </form>
<!-- Headline -->
<div class="text">
    <?php
    if($_SESSION['isloggedin']==true) {
        echo "Welcome, " . $_SESSION['username'] . ", to the shop!";
    }
    else{header("location:mainpage.php");}
    ?>
</div>
<?php
//If the user chose to view from database
if (isset($_POST['item']) && $_POST['item'] == "data"){
    //Fetch all information from database
    $mysqli = new mysqli("localhost", "root", "heihei", "innlogging") or die("cannot connect");
    $conn = "SELECT * FROM items";
    $result = $mysqli->query($conn);

    while ($row = $result->fetch_assoc()) {
        $truevalue = $row['itemvalue'];
        $truename = $row['itemname'];
        $truedesc = $row['itemdesc'];
        $trueimg = $row['imgname'];

?>
        <!-- Set up the list of items on the shopping page -->
<div class="itembox">
        <table><?php

            $print =
                '<tr><td width="140px"><div class="shoppinglist"><img style="vertical-align:top" src="../images/' . $trueimg . '"></div></td>
                <td><h1>' . $truename . '</h1><br>'
                . $truedesc .
                '<h2>' . $truevalue . " Kr" .'</h2><br></td>';

            echo $print;
            ?>
    </tr></table></div>
<?php
    }
}
//if the user chose to view from the xml file
else {

//open xml file, fetch all item information
    $xmlDoc = new DOMDocument();
    $xmlDoc->load("../xml/itemlist.xml");

    $itemname = $xmlDoc->getElementsByTagName("itemname");
    $itemvalue = $xmlDoc->getElementsByTagName("itemvalue");
    $itemdescription = $xmlDoc->getElementsByTagName("itemdescription");
    $itemicon = $xmlDoc->getElementsByTagName("itemicon");

    //Set up the list of items on the shopping page
    for ($i = 0; $i < $itemname->length; $i++) {
        ?>
        <div class="itembox">
        <table><?php
            $print =
                '<tr><td width="140px"><div class="shoppinglist"><img style="vertical-align:top" src="../images/' . $itemicon[$i]->nodeValue . '"></div></td>
            <td><h1>' . $itemname[$i]->nodeValue . '</h1><br>'
                . $itemdescription[$i]->nodeValue .
                '<h2>' . $itemvalue[$i]->nodeValue . '</h2><br></td>';

            echo $print;
            ?>
            </tr></table></div>
        <?php
    }
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
//Checkbox list,'quick shop'

include 'checkboxlist.php';
include'footershop.php';
$mysqli->close();

?>