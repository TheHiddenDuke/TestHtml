<?php

$xmlDoc = new DOMDocument();
$xmlDoc->load("../xml/itemlist.xml");

$itemname = $xmlDoc ->getElementsByTagName("itemname");
$itemvalue = $xmlDoc ->getElementsByTagName("itemvalue");
$itemdescription = $xmlDoc ->getElementsByTagName("itemdescription");
$itemicon = $xmlDoc->getElementsByTagName("itemicon");

?>
<form name="form1" method="post" action="checkitem.php">
        <select name="item">
<?php



for($i=0; $i<$itemname->length;$i++) {

    echo "<option value='" . $itemname[$i]->nodeValue . "'>" . $itemname[$i]->nodeValue . "</option>";

}
    ?>
        </select>
    <br>
    <input type="submit">
    </form>
