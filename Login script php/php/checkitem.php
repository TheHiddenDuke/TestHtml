<?php
//Open xml file
$xmlDoc = new DOMDocument();
$xmlDoc->load("../xml/itemlist.xml");

//Look for the desired item
$itemname = $xmlDoc->getElementsByTagName("itemname");


for ($i = 0; $i < $itemname->length; $i++) {

    if ($itemname[$i]->nodeValue == $_POST['item']) {
        $root = $xmlDoc->documentElement;
        $currentNode = $root->getElementsByTagName('item')->item($i);
        $deletedNode = $root->removeChild($currentNode);

        $name = $_POST['item'];
        echo $xmlDoc->save("../xml/itemlist.xml");


        $mysqli = new mysqli("localhost", "root", "heihei", "innlogging") or die("cannot connect");

        $conn = "DELETE FROM items WHERE itemname='$name'";
        $mysqli->query($conn);
        $mysqli->close();


    }
}

header("location:mainpage.php");

?>