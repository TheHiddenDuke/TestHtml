<?php

$xmlDoc = new DOMDocument();
$xmlDoc->load("../xml/itemlist.xml");

$itemname = $xmlDoc->getElementsByTagName("itemname");




for($i=0; $i<$itemname->length;$i++) {

    if($itemname[$i]->nodeValue == $_POST['item']){
        $root = $xmlDoc->documentElement;
        $currentNode =$root->getElementsByTagName('item')->item($i);
        $deletedNode =$root->removeChild($currentNode);

        echo $xmlDoc->save("../xml/itemlist.xml");
    }
}

header("location:mainpage.php");

?>