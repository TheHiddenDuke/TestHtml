<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

</body>
</html>
<?php
session_start();
//If user is logged in
if ($_SESSION['isloggedin'] == true && $_SESSION['isadmin'] == 1) {

    include 'adminsite.php';

} else if ($_SESSION['isloggedin'] == true && $_SESSION['isadmin'] == 0) {

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

$mysqli->close();

include 'footer.php';
?>