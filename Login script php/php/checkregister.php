<?php
/**
 * Created by PhpStorm.
 * User: Jarand
 * Date: 25/01/2017
 * Time: 15:02
 */
session_start();
//exit out of registration
if (isset($_POST['abort'])) {
    header("location:mainpage.php");
} //If password don't match
else if ($_POST['password'] != $_POST['passrep']) {
    header("location:register.php");

    //Check to see if username, password, email, the repeated password and the register buttin has a value
} else if ($_POST['username'] != "" && $_POST['password'] != "" && $_POST['email'] != "" && $_POST['passrep'] != "" && isset($_POST['register'])) {

    //Set up a connection to the database and creates a new row in the user table.
    $mysqli_reg = new mysqli ("localhost", "root", "heihei", "innlogging") or die("cannot connect");

    $username = $mysqli_reg->real_escape_string($_POST['username']);
    $email = $mysqli_reg->real_escape_string($_POST['email']);
    $pass = $mysqli_reg->real_escape_string(sha1(md5($_POST['password'])));

    $conn = "INSERT INTO users (`username`, `email`, `pass`) VALUES ('$username', '$email', '$pass')";

    $result = $mysqli_reg->query($conn);
    //if it succeeded they will be sent to the mainpage, if not they will get to try again.
    if (isset($result)) {
        $mysqli_reg->close();
        header("location:mainpage.php");
    } else {
        header("location:register.php");
    }

}

//If all fields are empty, page is refreshed.
if (($_POST['username'] == "" || $_POST['password'] == "" || $_POST['email'] == "" || $_POST['passrep'] == "") && isset($_POST['register'])) {
    header("location:register.php");
}