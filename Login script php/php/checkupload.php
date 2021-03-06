<?php
//Goes to mainpage if back button was pressed
if (isset($_POST['back'])) {
    header("location:mainpage.php");
}

//Find file path and file.
$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
//Find the file type
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is an actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
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
if ($imageFileType != "jpg" && $imageFileType != "PNG" && $imageFileType != "jpeg"
    && $imageFileType != "gif" && $imageFileType != "png"
) {
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
    //if file was successfully uploaded, get item information ready
        $name = $_POST['name'];
        $cost = $_POST['price'];
        $description = htmlspecialchars($_POST['desc']);
        $filename = basename($_FILES["fileToUpload"]["name"]);

        //open xml file, add all information for the new item
        $xmlDoc = new DOMDocument();
        $xmlDoc->load("../xml/itemlist.xml");

        $element = $xmlDoc->createTextNode("item");


        $xml = simplexml_load_file("../xml/itemlist.xml");
        $sxe = new SimpleXMLElement($xml->asXML());
        $newItem = $sxe->addChild("item", $name);
        $newItem->addChild("itemname", $name);
        $newItem->addChild("itemvalue", $cost . " Kr");
        $newItem->addChild("itemdescription", $description);
        $newItem->addChild("itemicon", $filename);
        $sxe->asXML("../xml/itemlist.xml");

        //Set up connection to database and add a new row in the item table with the new items' information
        $mysqli_reg = new mysqli("localhost", "root", "heihei", "innlogging") or die("cannot connect");

        $conn = "INSERT INTO items (`itemname`, `itemvalue`, `itemdesc`, `imgname`) VALUES ('$name', '$cost', '$description', '$filename')";

        $result = $mysqli_reg->query($conn);

        //The file and information was added
        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        ?>
        <form action="mainpage.php" method="post">
            <input type="submit" value="Ok" name="submit">
        </form>

        <?php
    }
    //something went wrong somewhere
    else {
        echo "Sorry, there was an error uploading your file.";
        ?>
        <form action="mainpage.php" method="post">
            <input type="submit" value="Ok" name="submit">
        </form>

        <?php

    }
}

?>