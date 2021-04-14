<?php
session_start();
require "../php/indexC.php";
include "../php/db.php";
include "addproduct.php";

if(!isset($_SESSION["admin"])){
header("Location:index.php");
}
$cat = new Catlog();
$a = $cat->getCategories($conn);

?>
<html>

<head>
    <title>Admin</title>
    <style>
        .bord{
            border:2px solid grey;
        }
        #head{
            padding: 20px;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid bg-dark text-light" id="head">
        <div class="row">
        <h1 style="margin: 10px;">Admin</h1>
        </div>
    </div>
    <div class="container-fluid">
    <div class="row">
    <div class="col">
    <nav class="navbar navbar-expand-lg  navbar-light bg-light">
            <ul class="navbar-nav">
            <li class="nav-item ">
            <a class="nav-link" href="main.php">Home</a>
            </li>
            <li class="nav-item ">
            <a class="nav-link active" href="#">Orders</a>
            </li>
            </ul>
        </nav>
    </div>
    </div>
    </div>


    <div class="container-fluid" id="feed">
       
    
    </div>
   

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
<script>
    $(document).ready(function(){
      var a =  $("#feed");
      $.post("showorders.php",function(data){
        a.html(data);
      });
    });
</script>
</html>