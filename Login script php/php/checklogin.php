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
    if(isset($_POST['Submit']))
    {
        if(empty($_POST['username']) || trim($_POST['username']) =="" )
        {
            echo "feil";
            $fields_error= "Username is required";
        }else {
            $username=htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
        }

        if(empty($_POST['password'])  || trim($_POST['password']) =='' )
        {
            echo "feil";
            $fields_error1 = "Password is required";
        }else {
            $password = sha1(md5($_POST['password']));
        }

        if(empty($fields_error) && empty($fields_error1))
        {
            $mysqli = new mysqli("localhost", "root", "heihei", "innlogging")or die("cannot connect");


            $result = $mysqli -> query ("SELECT * FROM users WHERE username='$username' AND pass='$password'");



            $data = $result -> num_rows;



            if($data){
                $_SESSION["username"] = $username;
                $_SESSION[$mysqli];

                echo htmlspecialchars(strip_tags($_POST['username']), ENT_QUOTES, 'UTF-8');

                header("location:mainpage.php");
                
            }else {

                header("location:main_php.php");
                $error = "OOOPS..Username or Password is wrong!!!";
            }

        $mysqli -> close();
        }

    }


?>