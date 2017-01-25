<?php
/**
 * Created by PhpStorm.
 * User: Jarand
 * Date: 24/01/2017
 * Time: 12:34
 */
?>
<table width="325" border="1" align="center" cellpadding="0" cellspacing="1" bgcolor="red">
    <tr>
        <form name="form1" method="post" action="checkregister.php">
            <td>
                <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                    <tr>
                        <td colspan="3"><strong>Member Register </strong></td>
                    </tr>
                    <tr>
                        <td width="100">Username</td>
                        <td width="6">:</td>
                        <td width="294"><input name="username" type="text" id="username"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td><input name="password" type="password" id="password"></td>
                    </tr>
                    <tr>
                        <td width="700">Repeat password</td>
                        <td>:</td>
                        <td><input name="passrep" type="password" id="passrep"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><input name="email" type="text" id="email"</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="register" value="Register">
                            <input type="submit" name="abort" value="Abort">

                        </td>
        </form>
    </tr>
</table>
