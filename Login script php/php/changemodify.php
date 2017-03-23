<?php
if(isset($_POST['back'])){
    header("location:modifyitem.php");
}

$xmlDoc = new DOMDocument();
$xmlDoc->load("../xml/itemlist.xml");

$oldName = $_POST['currname'];
$oldImgName = $_POST['imgname'];
$name = $_POST['name'];
$value = $_POST['price'];
$desc = htmlspecialchars($_POST['desc']);
$filename = basename($_FILES["fileToUpload"]["name"]);

$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

$itemname = $xmlDoc->getElementsByTagName("itemname");


for ($i = 0; $i < $itemname->length; $i++) {

    if ($itemname[$i]->nodeValue == $oldName) {

        $root = $xmlDoc->documentElement;
        $currentNode = $root->getElementsByTagName('item')->item($i);
        $deletedNode = $root->removeChild($currentNode);
        $xmlDoc->save("../xml/itemlist.xml");


        $xmlDoc = new DOMDocument();
        $xmlDoc->load("../xml/itemlist.xml");

        $element = $xmlDoc->createTextNode("item");

        $xml = simplexml_load_file("../xml/itemlist.xml");
        $sxe = new SimpleXMLElement($xml->asXML());
        $newItem = $sxe->addChild("item");
        $newItem->addChild("itemname", $name);
        $newItem->addChild("itemvalue", $value . " Kr");
        $newItem->addChild("itemdescription", $desc);
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $newItem->addChild("itemicon", $filename);
        }
        else{
            $newItem->addChild("itemicon", $oldImgName);
        }


        $sxe->asXML("../xml/itemlist.xml");

        $mysqli = new mysqli("localhost", "root", "heihei", "innlogging") or die("cannot connect");

        $conn = "UPDATE items SET itemname='$name', itemvalue='$value' WHERE itemname ='$oldName'";
        $mysqli->query($conn);

        $mysqli->close();
        echo "The item information has been changed.";
        ?>

        <form action="modifyitem.php" method="post">
            <input type="submit" value="Ok" name="submit">
        </form>

        <?php


    }
}


?>