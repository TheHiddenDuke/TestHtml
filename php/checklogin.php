<?php
/**
 * Created by PhpStorm.
 * User: Jarand
 * Date: 11/01/2017
 * Time: 10:53
 */


ob_start();
$host="127.0.0.1"; // Host name
$username="root"; // Mysql username
$password="MilitaryDock1"; // Mysql password
$db_name="Login"; // Database name
$tbl_name="members"; // Table name

// Connect to server and select databse.
$mysqli = new mysqli("$host", "$username", "$password")or die("cannot connect");
mysqli::select_db("$db_name")or die("cannot select DB");

// Define $myusername and $mypassword
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysqli::real_escape_string($myusername);
$mypassword = mysqli::real_escape_string($mypassword);
$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysqli::query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
    mysqli::session_register("myusername");
    mysqli::session_register("mypassword");
    header("location:login_success.php");
}
else {
    echo "Wrong Username or Password";
}
ob_end_flush();
?>