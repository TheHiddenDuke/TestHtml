<?php
/**
 * Created by PhpStorm.
 * User: Jarand
 * Date: 13/01/2017
 * Time: 10:45
 */
session_start();
$fields_error = "";
$fields_error1 = "";
$error = "";
$mysqli = new mysqli("localhost", "root", "heihei", "innlogging") or die("cannot connect");

if(isset($_POST['Register'])){
    header("location:register.php");
}
if (isset($_POST['Submit'])) {
    if (empty($_POST['username']) || trim($_POST['username']) == "") {
        $fields_error = "Username is required";
        header("location:mainpage.php");
    } else {
        $username = $mysqli ->real_escape_string(htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8'));
    }

    if (empty($_POST['password']) || trim($_POST['password']) == '') {
        $fields_error1 = "Password is required";
        header("location:mainpage.php");

    } else {
        $password = $mysqli->real_escape_string(sha1(md5($_POST['password'])));
    }

    if (empty($fields_error) && empty($fields_error1)) {



        $result = $mysqli->query("SELECT * FROM users WHERE username='$username' AND pass='$password'");


        $data = $result->num_rows;


        if ($data) {
            $_SESSION["username"] = $username;
            $_SESSION["isloggedin"] = true;
            $_SESSION[$mysqli];
            $result2 = $mysqli ->query("SELECT * FROM users WHERE username='$username' AND pass='$password' AND isadmin='1'");
            $data2 = $result2 -> num_rows;
            if($data2){
                $_SESSION["isadmin"] = 1;
            }
            else{
                $_SESSION["isadmin"] = 0;
            }

            echo htmlspecialchars(strip_tags($_POST['username']), ENT_QUOTES, 'UTF-8');

            header("location:mainpage.php");

        } else {

            header("location:mainpage.php");
            $error = "OOOPS..Username or Password is wrong!!!";
        }

        $mysqli->close();
    }

}


?>