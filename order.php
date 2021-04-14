<?php
include "php/db.php";
require "php/indexC.php";

session_start();
if(!isset($_SESSION["cart"])){
  $_SESSION["x"] = serialize(new Kart());
  
}

$c = new Catlog();
$navs = $c->getCategories($conn);
if(!isset($_GET['c'])){
    $current = $_GET['c'];
}
$set=0;
if(isset($_SESSION['user'])){
  $set = 1;
  $a = unserialize($_SESSION["user"]);
  $name = $a->email;
}
$current = $_GET['c'];
$sub = new Category($current);
$pid = $_GET['pid'];
$curP = new ListProduct($pid);
$ans = $curP->getProductDetails($pid,$conn);

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
    <div class="col-sm">
      <div class="text-center">
      <a href="kart.php"><img src="img/home/cart.png" id="cart" class="bxt"></a>
      <span id="cartNo"class="badge badge-danger" style="position:relative; top:30px;right:40px;"><?php echo count($_SESSION['cart'])?></span>
      <?php
      if($set == 1){
        $x = substr($name,0,15).'.....';
        echo '<button class="btn btn-secondary dropdown-toggle text-truncate" type="button" id="Loggedin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        '.$x.'
      </button>
  <div class="dropdown-menu" aria-labelledby="Loggedin">
  <a class="dropdown-item" href="#">My orders</a>  
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
            if($x == $current){
                $active = "active";
            }else{
                $active = "";
            }
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
        <div class="row">
            <div class="col-6">
                <img src="<?php echo $ans->image;?>" class='img-thumbnail' >
            </div>
            <div class="col-6">
                <div class="row" style="margin-top: 10px;">
                    
                    <h3><?php echo $ans->pname;?></h3>
                <div>
                <div class="row" style="margin: 10px;">
                    <div class="col">
                    <h5>Description</h5>
                    <p><?php echo nl2br($ans->des);?></p>
                    </div>   
                 </div>   
                 <div class="row" style="margin-left: 10px;">
                     <div class="col">
                     <h1>$<?php echo $ans->price;?></h1>
                     </div>
                 </div>
                 <div class="row">
                 <div class="col">
                 <button type="button" id="addKart" class="btn btn-warning btO" style="margin-top: 25px; margin-left:10px" value="<?php echo $ans->pid;?>">Add To Cart</button>
                 <button type="button" id="buyNow" class="btn btn-warning btO" style="margin-top: 25px; margin-left:10px" value="<?php echo $ans->pid;?>">Buy Now</button>
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
<script src="js/index.js"></script>
<script>
  $(document).ready(function(){
    var mai = "<?php echo $current;?>";
    $(".catI").click(function(){
       $(".grpCat li").removeClass("bg-dark active");
       $(this).addClass("bg-dark active");
    $.post("php/product.php",{id:$(this).val(),c:mai},function(data){
       $("#productLoad").html(data);
      
     });
   });
  
    $("#addKart").click(function(){
      $.post("php/orderhandle.php",{item:$(this).val()},function(data){
                  alert(data);
      });
      $.post("php/orderhandle.php",{noitems:1},function(data){
        $("#cartNo").html(data);
       });
    });
    $("#buyNow").click(function(){
      $.post("php/orderhandle.php",{item:$(this).val()},function(data){
                //  alert(data);
      });
      window.location.href = "kart.php";
    });
  });
 
  </script>    

  </html>