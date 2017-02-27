<?php

session_start();
$_SESSION['isloggedin']= null;
header("location:mainpage.php");
?>