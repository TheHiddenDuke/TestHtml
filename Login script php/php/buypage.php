<?php
/**
 * Created by PhpStorm.
 * User: Jarand
 * Date: 24/01/2017
 * Time: 11:11
 */

// The unfinished checkout page, accessed by the checkbox list from either the home page or the shop page.

//query for itemname and comparing to the itemname's checked from the checkboxlist. Add the prices together and echo out.
$mysqli = new mysqli("localhost", "root", "heihei", "innlogging") or die("cannot connect");
$result = $mysqli->query("SELECT itemname FROM items");
$sum = 0;
while ($name = mysqli_fetch_assoc($result)) {
    if (isset($_POST[$name['itemname']]) && $_POST[$name['itemname']] == 'true') {
        $truename = $name['itemname'];
        $itemcost = $mysqli->query("SELECT itemvalue FROM items WHERE itemname='$truename'");
        $value = mysqli_fetch_assoc($itemcost);
        $sum = $sum + $value['itemvalue'];
    }

}
echo "Your total price is: ", $sum;
?>
<!-- A form to get back to mainpage -->
<form name="form1" method="post" action="mainpage.php">
    <td>
        <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">

            <tr>
                <td>

                    <input type="submit" name="buy" value="Buy">
                    <input type="submit" name="return" value="Return">

                </td>
</form>
