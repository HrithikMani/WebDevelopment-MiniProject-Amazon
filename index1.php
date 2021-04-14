<?php
include "php/indexC.php";
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
      <img src="img/home/cart.png" id="cart" class="bxt">
      <span class="badge badge-danger" style="position:relative; top:30px;right:40px;">12</span>
      <button type="button" class="btn btn-warning bxt" style="margin-top: 25px; margin-left:10px">Login</button>
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
      <li class="nav-item active">
        <a class="nav-link" href="#">Electronics</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Fashion</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Books</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Grocery</a>
      </li>
    </ul>
  </div>
  </nav>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-3">
      <div class="container-fluid">
        <div class="row" style="margin-top: 10px;">
          <div class="col-12">
          <div class="card ">
            <div class="card-header"><h4>Categories</h4></div>
            <div class="card-body">
            <ul class="list-group list-group-flush ">
              <li class="list-group-item bg-dark active"><a>Laptops</a></li>
              <li class="list-group-item">Gaming Console</li>
              <li class="list-group-item">Mobiles</li>
            </ul>
            </div>
          </div>
          </div>
        
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-12">
          <div class="card ">
            <div class="card-header"><h4>Categories</h4></div>
            <div class="card-body">
            <ul class="list-group list-group-flush ">
              <li class="list-group-item bg-dark active"><a href="#" class="card-link" style="color: white;">Sort By Ratings</a></li>
              <li class="list-group-item"><a href="#" class="card-link" style="color: black;">Sort By Price</a></li>
            </ul>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>


    <div class="col bord">

          
      <div class="card-columns">

        <div class="card w-65 rounded" style="margin: 5px;">
          <img class="card-img-top" src="img/products/electronics/laptop.jpg" alt="Card image cap">
          
          <div class="card-body text-center">
            <a href="#" class="card-text card-link desc">Lenovo</a>
          </div>
          
          <div class="card-footer text-center">
            <small class="text-muted">$20.9</small>
          </div>
        </div>
        <div class="card w-65 rounded" style="margin: 5px;">
          <img class="card-img-top" src="img/products/electronics/laptop2.jpg" alt="Card image cap">
          
          <div class="card-body text-center">
            <a href="#" class="card-text card-link desc">CHUWI GemiBook Pro 14" Laptop with 16GB RAM 512GB SSD 2160 x 1440 Pixels IPS Display Intel Celeron J4125, Backlit Keyboard USB-C Wi-Fi 6 AX200, BT5.1 Thin and Lightweight Windows 10 Notebook Computer</a>
          </div>
          
          <div class="card-footer text-center">
            <small class="text-muted">$20.9</small>
          </div>
        </div>
        
        
        

        
      </div>

    </div>
  
  </div>
</div>




</body>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
<script>
  $(document).ready(function(){
     
  });
  </script>    

  </html>