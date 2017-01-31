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

    include 'adminsite.php';

} else if (isset($_SESSION['isloggedin']) && $_SESSION['isloggedin'] == true && $_SESSION['isadmin'] == 0) {

    include 'membersite.php';

    //If user is not logged in
} else{


    include 'notloggedin.php';

}

//Query after item name and values
$mysqli = new mysqli("localhost", "root", "heihei", "innlogging") or die("cannot connect");
$result = $mysqli->query("SELECT itemname FROM items");


//Checkbox list

include 'checkboxlist.php';

?>