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
    include 'footer.php';

} else if ($_SESSION['isloggedin'] == true && $_SESSION['isadmin'] == 0) {

    include 'membersite.php';
    include 'footer.php';

    //If user is not logged in
} else{


    include 'notloggedin.php';
    include 'footernot.php';

}




?>