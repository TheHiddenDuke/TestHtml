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
?>
    <html>
<body>
<table width="300" border="0" align="right" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
            <td>
                <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                    <tr>
                        <td colspan="3" align="center"><font size="8"> You are logged in </font></td>
                    </tr>
                </table>
            </td>
    </tr>
</table>
</body>
</html>
<?php
} else {
    echo "Please log in first to see this page.";
    ?>
    <html>
    <body>
    <table width="300" border="0" align="right" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
        <tr>
            <form name="form1" method="post" action="checklogin.php">
                <td>
                    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                        <tr>
                            <td colspan="3"><strong>Member Login </strong></td>
                        </tr>
                        <tr>
                            <td width="78">Username</td>
                            <td width="6">:</td>
                            <td width="294"><input name="username" type="text" id="username"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td><input name="password" type="password" id="password"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><input type="submit" name="Submit" value="Login"></td>
                        </tr>
                    </table>
                </td>
            </form>
        </tr>
    </table>
    </body>
    </html>
<?php

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