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
<!-- Nav bar -->
<ul>
    <li class="active"><a href="mainpage.php">Home</a></li>
    <li><a href="contactus.php">Contact</a></li>
    <li><a href="aboutus.php">About</a></li>
</ul>

<!-- Headline -->
<div class="mainbox">
<div class="text">
<h1>Welcome to this wonderful site, please log in!</h1>
</div>
</div>
<!-- Login box -->
<?php include'loginbox.php'; ?>


</body>
</html>
