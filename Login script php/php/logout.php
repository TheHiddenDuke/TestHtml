
<!-- If user logs out, all session variables are null -->
<?php
session_start();
$_SESSION["isloggedin"] = null;
$_SESSION["isadmin"] = null;
header("location:mainpage.php");
?>