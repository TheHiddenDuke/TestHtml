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

if (isset($_SESSION['isloggedin']) && $_SESSION['isloggedin'] == true) {
    echo "Welcome to the member's area, " . $_SESSION['username'] . "!";
} else {
    echo "Please log in first to see this page.";
}


$mysqli = new mysqli("localhost", "root", "heihei", "innlogging")or die("cannot connect");
$result = $mysqli -> query("SELECT itemname FROM items");

while( $name = mysqli_fetch_assoc($result)):

?>
    <div class="checkboxlist">

        <input type="checkbox" name="itemname[]" value=" <?php echo $name['itemname']; ?> "/>
        <span id="style"> <?php echo $name['itemname']; ?></span><br>
    </div>
<?php endwhile; ?>
<?php
$_SESSION['isloggedin'] = false;
?>





<html>
<header>

</header>
<body>

</body>



<footer>

</footer>
</html>