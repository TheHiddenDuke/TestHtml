<?php
/**
 * Created by PhpStorm.
 * User: Jarand
 * Date: 24/01/2017
 * Time: 12:34
 */
?>
<link rel="stylesheet" href="../css/style.css">

<div class="banner">

</div>
<div class="centerdiv">
<div class="registerbox">
        <form name="form1" method="post" action="checkregister.php">

                <table width="200px" border="0" cellpadding="3" cellspacing="1" bgcolor="#f2f2f2">
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
                        <td width="700">Repeat</td>
                        <td>:</td>
                        <td><input name="passrep" type="password" id="passrep"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><input name="email" type="email" id="email"</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="register" value="Register">
                            <input type="submit" name="abort" value="Abort">

                        </td>
                    </tr>
                </table>

        </form>
</div>
</div>
