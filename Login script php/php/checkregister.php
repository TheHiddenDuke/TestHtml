<?php
/**
 * Created by PhpStorm.
 * User: Jarand
 * Date: 25/01/2017
 * Time: 15:02
 */
session_start();
//exit out of registration
if (isset($_POST['abort'])){
    header("location:mainpage.php");
}
//If password don't match
if ($_POST['password'] != $_POST['passrep']){
    header("location:register.php");
}


if (isset($_POST['username']) && $_POST['password'] && $_POST['email'] && $_POST['passrep'] && $_POST['register']){

    $mysqli_reg = new mysqli("localhost", "root", "heihei", "innlogging") or die("cannot connect");

    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = sha1(md5($_POST['password']));

    $conn = "INSERT INTO users (`id`, `username`, `email`, `pass`,`isloggedin`) VALUES (NULL, '$username', '$email', '$pass','0')";

    $result = $mysqli_reg ->query($conn);
    if(isset($result)){
        $mysqli_reg ->close();
        header("location:mainpage.php");
    }
    else{
        header("location:register.php");
    }

}