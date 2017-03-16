<?php
session_start();

if ($_SESSION['isadmin'] == true) {

} else {
    header("location:mainpage.php");
}

$xmlDoc = new DOMDocument();
$xmlDoc->load("../xml/itemlist.xml");

$itemname = $xmlDoc->getElementsByTagName("itemname");
$itemvalue = $xmlDoc->getElementsByTagName("itemvalue");
$itemdescription = $xmlDoc->getElementsByTagName("itemdescription");
$itemicon = $xmlDoc->getElementsByTagName("itemicon");

?>
<html>
<header>
    <link rel="stylesheet" href="../css/style.css">
    <div class="banner"></div>

    <ul>
        <li><a href="mainpage.php">Home</a></li>
        <li><a href="shop.php">Shop</a></li>
        <li><a href="uploadpage.php">Upload</a></li>
        <li><a href="deleteitem.php">Remove item</a></li>
        <li class="active"><a href="modifyitem.php">Modify item</a></li>
        <li><a href="contactus.php">Contact</a></li>
        <li><a href="aboutus.php">About</a></li>
    </ul>

</header>
<body>
<div class="mainbox">


    <div class="text">
        <?php

        echo "Please select product!";

        ?>
    </div>

    <div class="text">
        <form name="form1" method="post" action="checkmodify.php">
            <select name="item">
                <?php
                for ($i = 0; $i < $itemname->length; $i++) {
                    echo "<option value='" . $itemname[$i]->nodeValue . "'>" . $itemname[$i]->nodeValue . "</option>";
                }
                ?>
            </select>
            <br>
            <input type="submit" value="Submit">
        </form>
    </div>
</div>

<?php
include 'logoutbox.php';
include 'footermodify.php';
?>

</body>
</html>