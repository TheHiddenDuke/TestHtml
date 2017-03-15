<?php
if ($_SESSION['isadmin'] == "1" && isset($_SESSION['isloggedin']) == true) {
    ?>
    <ul class="footer">
        <li class="active"><a href="mainpage.php">Home</a></li>
        <li><a href="shop.php">Shop</a></li>
        <li><a href="uploadpage.php">Upload</a></li>
        <li><a href="deleteitem.php">Remove item</a></li>
        <li><a href="modifyitem.php">Modify item</a></li>
        <li><a href="contactus.php">Contact</a></li>
        <li><a href="aboutus.php">About</a></li>
    </ul>


    <?php
} else if ($_SESSION['isadmin'] == "0" && isset($_SESSION['isloggedin']) == true) {
    ?>

    <ul class="footer">
        <li class="active"><a href="mainpage.php">Home</a></li>
        <li><a href="shop.php">Shop</a></li>
        <li><a href="contactus.php">Contact</a></li>
        <li><a href="aboutus.php">About</a></li>
    </ul>


    <?php
} else {
    ?>

    <ul class="footer">
        <li class="active"><a href="mainpage.php">Home</a></li>
        <li><a href="contactus.php">Contact</a></li>
        <li><a href="aboutus.php">About</a></li>
    </ul>
    <?php

}

?>