<?php
include "db.php";
require "indexC.php";
session_start();
if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $obj = new User($email,$password);
    $res = $obj->getId($conn);
    if($res>0){
        $_SESSION["user"] = serialize($obj);
        echo 1;
    }else{
        echo "Invalid user";
    }
}


?>