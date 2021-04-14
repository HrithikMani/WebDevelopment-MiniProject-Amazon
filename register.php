<?php
include "php/db.php";
require "php/indexC.php";
session_start();



if(!isset($_SESSION["cart"])){
  $_SESSION["x"] = serialize(new Kart());
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
    <form class="form-inline" style="margin-top: 20px">
    <input class="form-control" style="width: 60%;margin:0 auto" type="search" placeholder="Search" aria-label="Search">
   </form>
  
  </div>
    <div class="col-sm">
      <div class="text-center">
      <a href="kart.php"><img src="img/home/cart.png" id="cart" class="bxt"></a>
      <span class="badge badge-danger" style="position:relative; top:30px;right:40px;"><?php echo count($_SESSION['cart'])?></span>
      <button type="button" class="btn btn-warning bxt loginButton" style="margin-top: 25px; margin-left:10px">Login</button>
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
        <a class="nav-link" href="#">Home</a>
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
        <div class="row ">
          <div class='col-2'>
          </div>
          <div class='col' style="padding:10px;margin:10px;">
              <div class="card">
                <div class="card-header text-center">
                  <h2>Register</h2>
                </div>
                <div class="card-body">
                     <div class="row mb-3 " >
                        <div class="col text-center">
                            <div class="alert alert-danger" id="registerFeed" role="alert">
                                  A simple danger alert—check it out!
                            </div>
                       </div>
                     </div>
                    <div class="row">
                        <div class="col-6">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                        <div class="col-6 ">
                        <input type="password" class="form-control" id="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="row" style="margin-top:10px;">
                        <div class="col-6">
                        <input type="text" class="form-control" id="firstname" placeholder="First Name">
                        </div>
                        <div class="col-6 ">
                        <input type="text" class="form-control" id="lastname" placeholder="Last Name">
                        </div>
                    </div> 
                    <div class="row" style="margin-top:10px;">
                        <div class="col-12">
                            <input type="text" class="form-control" id="phone" placeholder="Phone Number">
                        </div>
                    
                    </div>         
                    <div class="row" style="margin-top:10px;">
                        <div class="col-3">
                        </div>
                        <div class="col-6 ">
                        <div class="d-felx  text-center">
                        <button class="btn btn-warning bxt registerButton">Register</button>
                        </div>
                        </div>
                        <div class="col-3">
                        </div>
                    </div>         
                    
                </div>
                

              </div>
          </div>
          <div class='col-2'>
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
var feed = $("#registerFeed").parent().parent();
    feed.css("display","none");
    function feedChange(a){
        $("#registerFeed").html(a);
        feed.css("display","");       
    }
    $(document).ready(function(){
        $(".registerButton").click(function(){
            var email = $("#inputEmail").val();
            if(email.length == 0){
                $("#registerFeed").html("Please Enter email");
                feed.css("display","");
                return;
            }
        var pass = $("#password").val();
            if(pass.length == 0){
                feedChange("Please Enter password");
                return;
            }
        var fname = $("#firstname").val();
            if(fname.length == 0){
                feedChange("Please Enter First Name");
                return;
            }
        var lname = $("#lastname").val();
            if(lname.length == 0){
                feedChange("Please Enter Last Name");
                return;
            }    
            var phone = $("#phone").val();
            if(phone.length == 0){
                feedChange("Please Enter Phone number");
                return;
            }
            $.post("php/register.php",{email:email,password:pass,firstname:fname,lastname:lname,phone:phone},function (data) { 
                if(data == 1){
                  $("#registerFeed").addClass("alert-success");
                  $("#registerFeed").removeClass("alert-danger");         
                  feedChange("User successfully registered");
                }else{
                  feedChange(data);
                }  
              

             });
        
             $("#registerFeed").removeClass("alert-success");
                  $("#registerFeed").addClass("alert-danger");
        });
      
        
    });
  </script>    

  </html>