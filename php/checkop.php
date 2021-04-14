<?php
include "db.php";
require "indexC.php";
session_start();
if(isset($_POST['val'])){
    $p = $_POST['val'];
    if($p == 0){
        echo "<strong>Please choose payment option</strong>";
    }else if($p == 1){
        echo "<input type='text' class='form-control' placeholder='Enter Upi Id'> ";
    }else if($p == 2){
        $user = unserialize($_SESSION['user']);
        $bal =  $user->getAmazonBal($conn);
        echo "Available Balnce : <strong>$$bal</strong>"; 
    }else if($p == 3){
        echo " ";
    }

}else
if(isset($_POST['address']) && isset($_POST['mode']) &&isset($_POST['total']) ){
    $add = $_POST['address'];
    $mode = $_POST['mode'];
    $tot =  $_POST['total'];
    $user = unserialize($_SESSION['user']);
    
    if(isset($_SESSION['user'])){
        if($mode == 2){
            $bal =  $user->getAmazonBal($conn);
        
            if($bal >= $tot){
                $pay  = new Payment();
                $res =  $pay->makePayment(2,$add,$user->id,$conn);
                $newBal = $bal - $tot;
                if($res == 1){
                    new Kart();
                    $user->setAmazonBal($conn,$newBal);
                    echo "<script>
                    alert('order placed');
                        window.location.href='home.php';
                    </script>";
                }else{
                    echo $res;
                }
            }else{
                echo "Insufficient Balance";
            }
    }else if($mode == 3){
        $pay  = new Payment();
        $res =  $pay->makePayment(3,$add,$user->id,$conn);
        if($res == 1){
            new Kart();
            echo "<script>
                    alert('order placed');
                        window.location.href='home.php';
                    </script>";
            echo 1;
        }else{
        echo 0;
        }
    }
}
}
?>