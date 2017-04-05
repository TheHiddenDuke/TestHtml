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

    //If user is logged in as admin
if(isset($_SESSION['isloggedin'])){


if ($_SESSION['isloggedin'] == true && $_SESSION['isadmin'] == 1) {

    include 'adminsite.php';
    include 'footer.php';

    //If user is logged in as member

} else if ($_SESSION['isloggedin'] == true && $_SESSION['isadmin'] == 0) {

    include 'membersite.php';
    include 'footer.php';

    //If user is not logged in
}
} else {


    include 'notloggedin.php';
    include 'footer.php';

}
?>