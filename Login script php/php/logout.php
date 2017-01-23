<?php
/**
 * Created by PhpStorm.
 * User: Jarand
 * Date: 23/01/2017
 * Time: 13:17
 */
session_start();
$_SESSION['isloggedin']=false;
header("location:mainpage.php");