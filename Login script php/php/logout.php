<?php

session_start();
$_SESSION['isloggedin']=false;
header("location:mainpage.php");
?>