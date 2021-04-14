<?php
require "indexC.php";
session_start();
$q = unserialize($_SESSION["x"]);
if(isset($_POST["item"])){
    $x = $_POST["item"]."";
    $q->addItem($x,1);
    echo "item added";
}else

    if(isset($_POST["remove"])){
        $value = $_POST["remove"];
        $q->removeItem($value);
        echo "removed";
    }else

    if(isset($_POST['noitems'])){
        $value = $_POST["noitems"];
        echo sizeof($_SESSION["cart"]);
    }else
    
    if(isset($_POST['addQty'])){
    $q->addQty($_POST['addQty']);
    }
    else
    
    if(isset($_POST['removeQty'])){
    $q->removeQty($_POST['removeQty']);
    }
?>