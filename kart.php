<?php
include "php/db.php";
require "php/indexC.php";
session_start();

$set=0;
if(isset($_SESSION['user'])){
  $set = 1;
  $a = unserialize($_SESSION["user"]);
  $name = $a->email;
}

if(!isset($_SESSION["cart"])){
  $_SESSION["x"] = serialize(new Kart());
}
if(count($_SESSION["cart"]) ==0){
  echo "<script>alert('Please add items');</script>";
}  

$c = new Catlog();
$navs = $c->getCategories($conn);



?>

<html>
  <head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='css/index.css' type='text/css' rel='stylesheet'>
    
    <title>Welcome to amazon</title>
  </head>
  
  <body>

  <div class="container-fluid">
  <div class="row topBar">
    <div class="col-2">
        <nav class="navbar ">
        <a class="navbar-brand" href="#">
            <img src="img/home/logo.png" class="rounded float-left mainLogo" alt="">
        </a>
        </nav>
    </div>
    <div class="col-6">
    <!---
    <form class="form-inline" style="margin-top: 20px">
    <input class="form-control" style="width: 60%;margin:0 auto" type="search" placeholder="Search" aria-label="Search">
   </form>
  -->
  </div>
    <div class="col ">
      <div class="text-center">
      <a href="kart.php">
      <img src="img/home/cart.png" id="cart" class="bxt"> 
      </a>
      <span class="badge badge-danger" style="position:relative; top:30px;right:40px;"><?php echo count($_SESSION['cart'])?></span>
      <?php
      if($set == 1){
        $x = substr($name,0,15).'.....';
        echo '<button class="btn btn-secondary dropdown-toggle " type="button" id="Loggedin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        '.$x.'
      </button>
  <div class="dropdown-menu" aria-labelledby="Loggedin">
  <a class="dropdown-item" href="myorder.php">My orders</a>  
  <a class="dropdown-item" href="#">Add Amazon Balance</a>
    <a class="dropdown-item" href="php/destroy.php">Logout</a>
  </div>';
      }else{
        echo '<button type="button" class="btn btn-warning bxt loginButton" style="margin-top: 25px; margin-left:10px">Login</button>';
      }
      
      ?>
      
      
      </div>
    </div>   
  </div>
</div>


<div class="container-fluid bg-dark">
<nav class="navbar navbar-expand-lg navbar-dark">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav mr-auto">

    <li class="nav-item">
        <a class="nav-link" href="home.php">Home</a>
      </li>

        <?php
        
        foreach($navs as $x)
        {
        $active ="";
        echo "
        
      <li class='nav-item'>
        <a class='nav-link $active' href='cat.php?c=$x'>$x</a>
      </li>
      <?php
      ";
        }
      ?>

    </ul>
  </div>
  </nav>
</div>

<div class="container-fluid"> 
  <div class="row bord">
        <div class="container-fluid">
          <?php
            $obj = unserialize($_SESSION["x"]);
            $p = $obj->getNoItems();
            $sum =0;
            if($p > 0){
              $x = $obj->caluculatePrice($conn);
              foreach($x as $q){
            $sum = $sum + $q->price;
          echo "
          <div class='row bord' style='margin-top: 5px; padding:50px;'>
            <div class='col-3'>
              <img src='$q->image' class='img-thumbnail'>
            </div>
            <div class='col-6 text-center'>
              <h4 style='margin: 10px;'>$q->pname</h4>
            </div>
            <div class='col-3 text-center'>
              <h1>$$q->price</h1>
            <button type='button' class='btn btn-warning bxt removeBt' style='margin-top: 25px; margin-left:10px' value=$q->pid>Remove</button>
            <br>
            <button type='button' class='btn btn-warning bxt plusButton' style='margin-top: 25px; margin-left:10px' value=$q->pid>+</button>
              <strong style='position:relative;top:13px;'>$q->qty</strong>            
            <button type='button' class='btn btn-warning bxt minusButton' style='margin-top: 25px; margin-left:10px' value=$q->pid>-</button>
            
            </div>
          </div>
          ";
              }
            }
          ?> 

          
        </div>
  </div>
  <div class="row" style="margin-top: 20px;">
        <div class="col-8 text-center">
        <button type="button" class="btn btn-warning bxt" id="checkOutBtn" style="margin-top:10px;width:50%;">Checkout</button>
        </div>
        <div class="col-4">
          <h1 style="display:inline-block">Total : $<?php echo $sum;?></h1>
       
        </div>
  </div>
</div>

<div class="container-fluid bg-dark text-light" style="padding: 20px;margin-top:50px;">
    <div class='row text-center' >
        <span style="margin: 0 auto;">@Ngit Software Engineering Project</span>
    </div>
</div>


</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
<script src="js/index.js"></script>
<script>
 
    $(document).ready(function(){
     
      var s = <?php echo $sum?>;
      if(s == 0){
        window.location.href = "home.php";
      }

      $(".removeBt").click(function(){
        var x = $(this).val();
        $.post("php/orderhandle.php",{remove:x},function(data){
          alert(data);
          location.reload();
        });
        
      });

      $(".plusButton").click(function(){
        var value = $(this).val();
        $.post("php/orderhandle.php",{addQty:value},function(data){
          location.reload();
        });
      });
      $(".minusButton").click(function(){
        
        var value = $(this).val();
        $.post("php/orderhandle.php",{removeQty:value},function(data){
          location.reload();
        });
      });
      $("#checkOutBtn").click(function(){
        window.location.href = "checkout.php";
      });
    });
  </script>    

  </html>