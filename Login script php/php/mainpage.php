<?php
/**
 * Created by PhpStorm.
 * User: Jarand
 * Date: 17/01/2017
 * Time: 10:57
 */
?>
<link rel="stylesheet" href="../css/style.css">
<?php
session_start();
$mysqli = new mysqli("localhost", "root", "heihei", "innlogging")or die("cannot connect");
$result = $mysqli -> query("SELECT itemname FROM items");

$name = $result ->fetch_assoc();

while( $name = mysqli_fetch_assoc($result)):
?>
    <div class="checkboxlist">

        <input type="checkbox" name="itemname[]" value=" <?php echo $name['itemname']; ?> "/>
        <span id="style"> <?php echo $name['itemname']; ?></span><br>
    </div>
<?php endwhile; ?>





<html>
<header>

</header>
<body>

</body>



<footer>

</footer>
</html>