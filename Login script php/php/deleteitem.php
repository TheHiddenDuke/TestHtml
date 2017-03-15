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
        <li class="active"><a href="deleteitem.php">Remove item</a></li>
        <li><a href="modifyitem.php">Modify item</a></li>
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
        <form name="form1" method="post" action="checkitem.php">
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

<?php include 'footerremove.php'; ?>

</body>
</html>