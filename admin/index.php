<?php
include "../php/db.php";
require "../php/indexC.php";
session_start();


if(isset($_SESSION["admin"])){
  header("Location:main.php");
  }



?>

<html>
  <head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    
    <title>Admin Login</title>
  </head>
  
  <body>
<div class="container-fluid"> 
        <!-- content -->
        <div class="row ">
          <div class='col-2'>
          </div>
          <div class='col' style="padding:10px;margin:10px;">
              <div class="card">
                <div class="card-header text-center">
                  <h2>Admin Login</h2>
                </div>
                <div class="card-body">
                <div class="row mb-3 text-center" style="display: none;">
                      <div class="col">
                          <div class="alert alert-danger" id="feed" role="alert">
                              A simple danger alert—check it out!
                          </div>
                       </div>
                     </div>
                  
                    <div class="row mb-3 text-center">
                    
                    <div class="col">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>

                    </div>
                    <div class="row mb-3 text-center">
                    
                    <div class="col">
                        <input type="password" class="form-control" id="password"  placeholder="passsword">
                    </div>

                    </div>
                    <div class="row mb-3 text-center">
                    
                    <div class="col">
                        <button class="btn btn-warning bxt loginButton">Login</button>
                        
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
<script>
  var a = $("#feed").parent().parent();
    $(document).ready(function(){
     $(".registerButton").click(function(){
      window.location.href='register.php';
     });
     $(".loginButton").click(function(){
       
       var email = $("#inputEmail").val();
       var password = $("#password").val();
       if(email.length == 0){
         $("#feed").html("Please enter your email");
         a.css("display","");
         return;
       }
       if(password.length == 0){
         $("#feed").html("Please enter your password");
         a.css("display","");
         return;
       }
       $.post("admin.php",{email:email,password:password},function(data){
          if(data == 1){
            window.location.href="main.php";
          }else{
            $("#feed").html(data);
         a.show();
          }
       
       });
     });

      
    });
  </script>    

  </html>