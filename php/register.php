<?php
include "db.php";
require "indexC.php";

    if( isset($_POST['email']) &&
    isset($_POST['password']) &&
    isset($_POST['firstname']) &&
    isset($_POST['lastname']) &&
    isset($_POST['phone']) 
    ){
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $phone = $_POST['phone'];
        
        $newUser = new Register($email,$pass,$phone,$fname,$lname);
        $res = $newUser->checkCustomer($conn);
        //$res = 1;
        if($res == 1){
            echo 1;
        }else{
            echo $res;
        }

    }else{
        echo "Server not responding";
    }


?>