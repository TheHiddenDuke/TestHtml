<?php
/**
 * Created by PhpStorm.
 * User: Jarand
 * Date: 11/01/2017
 * Time: 11:00
 */
session_start();
if(!$mysqli-> session_is_registered(myusername)){
    header("location:main_login.php");
}
?>

<html>
<body>
Login Successful
</body>
</html>