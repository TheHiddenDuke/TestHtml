<?php
//if user pressed the back button, they get redirected to previous page.
if(isset($_POST['back'])){
    header("location:modifyitem.php");
}

//Open the xml document, setting up variables with values from the previous form.

$xmlDoc = new DOMDocument();
$xmlDoc->load("../xml/itemlist.xml");

$oldName = $_POST['currname'];
$oldImgName = $_POST['imgname'];
$name = $_POST['name'];
$value = $_POST['price'];
$desc = htmlspecialchars($_POST['desc']);
$filename = basename($_FILES["fileToUpload"]["name"]);

//taking note of the directory for where images are to be saved.
//Target the file to upload. Check the filetype.

$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

//fetching all itemnames from xml document.
$itemname = $xmlDoc->getElementsByTagName("itemname");

//goes through the list of itemname
for ($i = 0; $i < $itemname->length; $i++) {

    //if there is a match between the itemlist and the item that is modified.
    if ($itemname[$i]->nodeValue == $oldName) {
    //removes the old information
        $root = $xmlDoc->documentElement;
        $currentNode = $root->getElementsByTagName('item')->item($i);
        $deletedNode = $root->removeChild($currentNode);
        $xmlDoc->save("../xml/itemlist.xml");

    //open xml file and add the new information.
        $xmlDoc = new DOMDocument();
        $xmlDoc->load("../xml/itemlist.xml");

        $element = $xmlDoc->createTextNode("item");

        $xml = simplexml_load_file("../xml/itemlist.xml");
        $sxe = new SimpleXMLElement($xml->asXML());
        $newItem = $sxe->addChild("item");
        $newItem->addChild("itemname", $name);
        $newItem->addChild("itemvalue", $value . " Kr");
        $newItem->addChild("itemdescription", $desc);
        //if a new images was added, upload the new one, else keep the old.
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $newItem->addChild("itemicon", $filename);
        }
        else{
            $newItem->addChild("itemicon", $oldImgName);
        }


        $sxe->asXML("../xml/itemlist.xml");

        //Connect to database, update the information
        $mysqli = new mysqli("localhost", "root", "heihei", "innlogging") or die("cannot connect");

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $conn = "UPDATE items SET itemname='$name', itemvalue='$value', itemdesc='$desc', imgname='$filename' WHERE itemname ='$oldName'";
        }
        else{
            $conn = "UPDATE items SET itemname='$name', itemvalue='$value', itemdesc='$desc', imgname='$oldImgName' WHERE itemname ='$oldName'";
        }


        $mysqli->query($conn);

        $mysqli->close();
        echo "The item information has been changed.";
        ?>

        <!-- Button to get back -->
        <form action="modifyitem.php" method="post">
            <input type="submit" value="Ok" name="submit">
        </form>

        <?php


    }
}


?>