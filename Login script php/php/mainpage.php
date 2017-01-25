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
    <!-- Login box-->
    <html>
    <body>
    <table width="300" align="right" border="1" cellpadding="0" cellspacing="1" bgcolor="red">
        <tr>
            <td>
                <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
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
    </table>
    </body>
    </html>
    <?php
} else {
    echo "Please log in first to see this page.";
    ?>
    <html>
    <body>
    <table width="300" border="1" align="right" cellpadding="0" cellspacing="1" bgcolor="red">
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
                            <td><input type="submit" name="Submit" value="Login">
                                <input type="submit" name="Register" value="Register">
                            </td>
            </form>
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


$mysqli = new mysqli("localhost", "root", "heihei", "innlogging") or die("cannot connect");
$result = $mysqli->query("SELECT itemname FROM items");

?>

    <!--Checkbox list-->
    <form method="post" id="shoppinglist" action="buypage.php">
        <table id="rightWrapper" width="300" cellpadding="0" cellspacing="1" border="1">
            <div id="rightBottom">
                <tr>
                    <td>
                        <strong>Shopping:</strong><br>
                        <?php
                        while ($name = mysqli_fetch_assoc($result)):
                            $truename = $name['itemname'];
                            ?>

                            <input type="checkbox" name="<?php echo htmlspecialchars($truename, ENT_QUOTES, 'UTF-8')?>" value="true"/>
                            <?php echo $truename; ?><br>

                        <?php endwhile; ?>
                        <input type="submit" name="submit" value="checkout">
                    </td>
                </tr>
            </div>
        </table>
    </form>

<?php
//$_SESSION['isloggedin'] = false;
?>