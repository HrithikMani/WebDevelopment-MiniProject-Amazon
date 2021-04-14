<?php
include "php/db.php";
require "php/indexC.php";
session_start();

print_r($_SESSION['deals']);



if(!isset($_SESSION["cart"])){
  $_SESSION["x"] = serialize(new Kart());
}
if(!isset($_SESSION["user"])){
    header("Location:login.php");
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
    <div class="col-8">
    <!---
    <form class="form-inline" style="margin-top: 20px">
    <input class="form-control" style="width: 60%;margin:0 auto" type="search" placeholder="Search" aria-label="Search">
   </form>
  -->
  </div>
    <div class="col-sm">
      <div class="text-center">
      <a href="kart.php"><img src="img/home/cart.png" id="cart" class="bxt"></a>
      <span class="badge badge-danger" style="position:relative; top:30px;right:40px;"><?php echo count($_SESSION['cart'])?></span>
      
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
        <!-- content -->
        <div class="row">
            <div class="col-8">
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
              <strong style='position:relative;top:13px;'>Quantity: $q->qty </strong>
              <br>
            
            <br>
            
                          
            
            
            </div>
          </div>
          ";
              }

            }
          ?>
             <div class="row" style="margin-top: 20px;">
                <div class="col-8 text-center">
                </div>
                 <div class="col-4">
                    <h1 style="display:inline-block">Total : $<?php echo $sum;?></h1>
                 </div>
             </div>

            </div>
            <div class="col-4">
                


                <div  class="row">
                    <div class="col">
                        <h3>Payment Options</h3>
                    </div>
                </div>
                <div class='row'>
                <div class="col">
                          <div class="alert alert-danger" id="feed" role="alert">
                              A simple danger alert—check it out!
                          </div>
                       </div>
                </div>
                <div class="row">
                    
                    <div class="col-8 ">
                        <textarea id="address" class="form-control" style="resize:none;"placeholder="Enter Address" row="5"></textarea>                           
                </div>
                
                </div>
                <div class="row">
                    
                    <div class="col-8 ">
                             
                            <select name="categorySelect" class="custom-select my-1 mr-sm-2" id="optionSelect">
                            <option value=0>Choose...</option>
                            <!--<option value=1>Upi</option>-->
                            <option value=2>Pay from Amazon Balance</option>
                            <option value=3>Cash on delivery</option>
                            </select>   
                        </div>
                
                </div>

            

                <div class="row" style="margin-top:20px;">
                    <div class="col-8 " id="outForm">
                          
                    </div>
                    
                </div>
                <div class="row" style="margin-top:20px;">
                
                <div class="col-12 text-center">
                    <button class="btn btn-warning bxt payButton">Pay</button>
                    </div>
                
                </div>
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
<script>

    $(document).ready(function(){
        var s = <?php echo sizeof($_SESSION["cart"]);?>;
      if(s == 0){
        window.location.href = "home.php";
      }
      var feed = $("#feed").parent().parent().hide();
      $("#optionSelect").on("change",function(){
          var val = $(this).val();
          if(val == 0){
          $("#feed").html("<strong>Please choose payment option</strong>");
          feed.show();
         return;
          }
          $.post("php/checkop.php",{val:val},function(data){
              $("#outForm").html(data);
          });
      });
     $(".payButton").click(function(){
       var address = $("#address").val();
       if(address.length ==0){
         $("#feed").html("Please Enter address");
         feed.show();
         return;
       }
       var val = $("#optionSelect").val();
          if(val == 0){
          $("#feed").html("<strong>Please choose payment option</strong>");
          feed.show();
         return;
          }
         var tot=<?php echo $sum;?>;
       $.post("php/checkop.php",{address:address,mode:val,total:tot},function(data){
        $("#feed").html(data);
         feed.show();
          });
     });
    });
  </script>    

  </html>