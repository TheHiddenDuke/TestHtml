<?php
$xmlDoc = new DOMDocument();
$xmlDoc->load("../xml/itemlist.xml");
$oldName = $_POST['currname'];
$name = $_POST['name'];
$value = $_POST['price'];
$desc = htmlspecialchars($_POST['desc']);
$filename = basename($_FILES["fileToUpload"]["name"]);

$itemname = $xmlDoc->getElementsByTagName($oldName);




for($i=0; $i<$itemname->length;$i++) {

    if($itemname[$i]->nodeValue == $oldName){
        $root = $xmlDoc->documentElement;
        $currentNode =$root->getElementsByTagName('item')->item($i);
        $deletedNode =$root->removeChild($currentNode);
        echo $xmlDoc->save("../xml/itemlist.xml");


        $xmlDoc = new DOMDocument();
        $xmlDoc->load("../xml/itemlist.xml");

        $element = $xmlDoc->createTextNode("item");

        $xml = simplexml_load_file("../xml/itemlist.xml");
        $sxe = new SimpleXMLElement($xml->asXML());
        $newItem = $sxe->addChild("item", $name);
        $newItem->addChild("itemname", $name);
        $newItem->addChild("itemvalue",$value . " Kr");
        $newItem->addChild("itemdescription",$desc);
        $newItem->addChild("itemicon", $filename);
        $sxe->asXML("../xml/itemlist.xml");








        $mysqli = new mysqli("localhost", "root", "heihei", "innlogging") or die("cannot connect");

        $conn = "DELETE FROM items WHERE itemname='$oldName'";
        $conn = "UPDATE items SET itemname='$name', itemvalue='$value' WHERE itemname = $oldName";
        $mysqli->query($conn);
        $mysqli->close();





    }
}
header("location:mainpage.php");


?>