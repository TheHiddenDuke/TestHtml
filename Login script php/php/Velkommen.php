<?php
/**
 * Created by PhpStorm.
 * User: Jarand
 * Date: 13/01/2017
 * Time: 12:42
 */
session_start();
if(!$mysqli-> session_is_registered($myusername)){
    header("location:main_login.php");
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/css.css">
    <title>Super fun time</title>
    <link rel="icon" href="data/pic2.jpg">
</head>


<BODY link="#8b0000" vlink="#8b0000" alink="#8b0000">
<CENTER><IMG SRC="data/pic2.jpg" title="Why are you looking here?" ALIGN="BOTTOM" height="256" width="256"> </CENTER>
<HR>
<a href="http://www.lemonparty.com"><font color="#8b0000"><B>Don't you dare!</B></font></a>
<font color="#cd5c5c">Death awaits you</font>
<H1><font color="#8b0000">Cthulhu seeks <B>BLOOD</B></font></H1>
<H2><font color="white">For you salvation send cash to:
    </font></H2>
<font color="#a52a2a">Send me mail at </font><a href="mailto:support@yourcompany.com">
    CthulhuAwaits@LongLiveTheDarkKing.BloodyHell</a>.
<P> This is a new paragraph!
<P> <B>This is a new paragraph!</B>
    <BR> <B><I>This is a new sentence without a paragraph break, in bold italics.</I></B>
<HR>
</body>
</html>