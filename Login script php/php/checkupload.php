<?php

if(isset($_POST['back'])){
    header("location:mainpage.php");
}


$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "PNG" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    ?>

    <form action="mainpage.php" method="post">
        <input type="submit" value="Ok" name="submit">
    </form>

    <?php

    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        $name = $_POST['name'];
        $cost = $_POST['price'];
        $description = htmlspecialchars($_POST['desc']);
        $filename = basename($_FILES["fileToUpload"]["name"]);

        $xmlDoc = new DOMDocument();
        $xmlDoc->load("../xml/itemlist.xml");

        $element = $xmlDoc->createTextNode("item");


        $xml = simplexml_load_file("../xml/itemlist.xml");
        $sxe = new SimpleXMLElement($xml->asXML());
        $newItem = $sxe->addChild("item");
        $newItem->addChild("itemname", $name);
        $newItem->addChild("itemvalue",$cost . " Kr");
        $newItem->addChild("itemdescription",$description);
        $newItem->addChild("itemicon", $filename);
        $sxe->asXML("../xml/itemlist.xml");


        $mysqli_reg = new mysqli("localhost", "root", "heihei", "innlogging") or die("cannot connect");


        $conn = "INSERT INTO items (`itemname`, `itemvalue`) VALUES ('$name', '$cost')";

        $result = $mysqli_reg ->query($conn);






        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        ?>
        <form action="mainpage.php" method="post">
            <input type="submit" value="Ok" name="submit">
        </form>

        <?php
    } else {
        echo "Sorry, there was an error uploading your file.";
        ?>
        <form action="mainpage.php" method="post">
            <input type="submit" value="Ok" name="submit">
        </form>

        <?php

    }
}

?>