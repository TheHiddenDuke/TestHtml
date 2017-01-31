<?php
/**
 * Created by PhpStorm.
 * User: Jarand
 * Date: 30/01/2017
 * Time: 13:33
 */

?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<header>
    <title>Hello and welcome</title>
</header>
<body>
<div class="banner">

</div>


<h1>Welcome to this wonderful site, please log in!</h1>

<div class="rightWrapper">
    <div class="loginbox">
    <tr>
        <form name="form1" method="post" action="checklogin.php">
            <td>
                <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                    <tr>
                        <td colspan="3"><strong>Member Login </strong></td>
                    </tr>
                    <tr>
                        <td width="78">Username</td>
                        <td width="6">:</td>
                        <td width="294"><input name="username" type="text" id="username"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td><input name="password" type="password" id="password"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="Submit" value="Login">
                            <input type="submit" name="Register" value="Register">
                        </td>
                    </tr>
                </table>
            </td>
        </form>
    </tr>
</div>
</div>


</body>
</html>
