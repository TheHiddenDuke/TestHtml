<?php
if($_SESSION['isadmin']==true){
    ?>
    <ul class="footershop">
        <li><a href="mainpage.php">Home</a></li>
        <li class="active"><a href="shop.php">Shop</a></li>
        <li><a href="uploadpage.php">Upload</a></li>
        <li><a href="deleteitem.php">Remove item</a> </li>
        <li><a href="contactus.php">Contact</a></li>
        <li><a href="aboutus.php">About</a></li>
    </ul>


<?php
}
else{
     ?>

    <ul class="footershop">
        <li><a href="mainpage.php">Home</a></li>
        <li class="active"><a href="shop.php">Shop</a></li>
        <li><a href="contactus.php">Contact</a></li>
        <li><a href="aboutus.php">About</a></li>
    </ul>


    <?php
}
?>

