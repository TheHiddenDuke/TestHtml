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
//If user is logged in
if (isset($_SESSION['isloggedin']) && $_SESSION['isloggedin'] == true && $_SESSION['isadmin'] == 1) {
    echo "Welcome, " . $_SESSION['username'] . ", to administrative site!";

    include 'adminsite.php';

} else if (isset($_SESSION['isloggedin']) && $_SESSION['isloggedin'] == true && $_SESSION['isadmin'] == 0) {
    echo "Welcome to the member's area, " . $_SESSION['username'] . "!";

    include 'membersite.php';

    //If user is not logged in
} else{
    echo "Please log in first to see this page.";

    include 'notloggedin.php';

}


$mysqli = new mysqli("localhost", "root", "heihei", "innlogging") or die("cannot connect");
$result = $mysqli->query("SELECT itemname FROM items");


//Checkbox list

include 'checkboxlist.php';

?>