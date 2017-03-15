<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/style.css">
</head>

<?php


$xmlDoc = new DOMDocument();
$xmlDoc->load("../xml/itemlist.xml");
$name = $_POST['item'];

$element = $xmlDoc->getElementById($name);
$itemname = $element->getElementsByTagName("itemname");
$itemvalue = $element->getElementsByTagName("itemvalue");
$itemdescription = $element->getElementsByTagName("itemdescription");
$itemicon = $element->getElementsByTagName("itemicon");

$desc = $itemdescription[0]->nodeValue;
$costint = filter_var($itemvalue[0]->nodeValue, FILTER_SANITIZE_NUMBER_INT);

?>


<body>

<div class="banner"></div>

<!--Navbar top-->
<ul>
    <li><a href="mainpage.php">Home</a></li>
    <li><a href="shop.php">Shop</a></li>
    <li><a href="uploadpage.php">Upload</a></li>
    <li><a href="deleteitem.php">Remove item</a></li>
    <li class="active"><a href="modifyitem.php">Modify item</a></li>
    <li><a href="contactus.php">Contact</a></li>
    <li><a href="aboutus.php">About</a></li>
</ul>
<div class="mainbox">

    <div class="text">
        <?php
        session_start();
        if ($_SESSION['isadmin'] == true) {

        } else {
            header("location:mainpage.php");
        }

        echo "Please input the needed information!";


        ?>
    </div>

    <div class="itembox">
        <form action="changemodify.php" method="post" enctype="multipart/form-data">

            <td>
                <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#f2f2f2">
                    <tr>
                        <td colspan="3" align="center"><strong>Item information!</strong></td>
                    </tr>
                    <tr>
                        <td align="right">Current name:</td>
                        <?php echo "<td><input name='currname' value='" . $itemname[0]->nodeValue . "' type='text' id='currname'></td>"; ?>
                    </tr>
                    <tr>
                        <td align="right">Name:</td>
                        <?php echo "<td><input name='name' value='" . $itemname[0]->nodeValue . "' type='text' id='name'></td>"; ?>
                    </tr>
                    <tr>
                        <td align="right" width="50%">Price:</td>
                        <?php echo "<td><input name='price' value='" . $costint . "' type='number' id='price'></td>"; ?>
                    </tr>
                    <tr>

                        <td align="right" width="50%">Description:</td>
                        <?php echo "<td align='left'><textarea cols='50' rows='5' style='vertical-align: top' name='desc' id='desc'>$desc</textarea></td>"; ?>
                    </tr>
                    <tr>
                        <td align="right">Current image:</td>

                        <?php echo "<td width='140px'><div class='shoppinglist'><img style='vertical-align: top' src='../images/" . $itemicon[0]->nodeValue . "'/></div></td>"; ?>
                    </tr>
                    <tr>
                        <td align="right">Select image to upload:</td>
                        <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
                    </tr>
                    <tr>
                        <td align="right"><input type="submit" value="Send form" name="submit"></td>
                        <td><input type="submit" value="Back" name="back"></td>
                    </tr>

                </table>
            </td>
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
<?php
include 'footermodify.php';
?>
