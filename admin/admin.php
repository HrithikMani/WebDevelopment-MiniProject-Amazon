<?php
include "../php/db.php";
require "adminClass.php";
if(isset($_POST["email"]) && isset($_POST["password"])){
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $obj = new Admin($email,$pass);
    echo $obj->verifYDetails($conn);
}else{
    echo 2;
}
?>