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
        <div class="col-10">
        <h1 style="margin: 10px;">Admin</h1>
        </div>
        <div class="col-2">
        <h5 style="margin: 10px;"><a href="destroy.php">Logout</a></h5>
        </div>
        </div>
    </div>
    <div class="container-fluid">
    <div class="row">
    <div class="col">
    <nav class="navbar navbar-expand-lg  navbar-light bg-light">
            <ul class="navbar-nav">
            <li class="nav-item active">
            <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item ">
            <a class="nav-link" href="adminorder.php">Orders</a>
            </li>
            </ul>
        </nav>
    </div>
    </div>
    </div>


    <div class="container-fluid">
        <dive class="row">
            <div class="col-8" style="padding:10px;">
                <div class="row">
                <div class="col">
                <h1>Add Product</h1>
                </div>
                </div>
                <form action="main.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                          <div style="display:<?php echo ($dis == 1)? '':'none';?>;" id="feedOuter" class="row mb-3 text-center" >
                      <div class="col">
                          <div class="alert <?php echo $at;?>"  id="feed" role="alert">
                                <?php echo $error;?>
                          </div>
                       </div>
                     </div>


                        <div class="row" style="margin-top: 10px;">
                            <div class="col-6" >
                            <input type="text" class="form-control" id="pname" name="pname" placeholder="Product Name">
                            </div>
                            <div class="col-6">
                            <input type="text" class="form-control" id="pricename" name="pricename" placeholder="Product Price">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-8">
                            <label for="description"><strong>Description:</strong></label>
                            <textarea class="form-control" name="description" id="description" style="resize:none;"  rows="5"></textarea>
                            </div>
                        </div>


                        <div class="row" style="margin-top: 10px;">
                            <div class="col-8 ">
                            <label for="category">Choose Category:</label> 
                            <select name="categorySelect" class="custom-select my-1 mr-sm-2" id="mainChoosCatgory">
                            <option value=0>Choose...</option>
                                    <?php
                                   
                                    foreach($a as $x){
                                        echo "<option value='$x'>$x</option>";
                                    }
                                    ?>
                                 </select>   
                             </div>
                        </div>

                        <div class="row" style="margin-top: 10px;">
                            <div class="col-8 ">
                            <label for="subcategory">Choose Sub Category:</label> 
                            <select class="custom-select my-1 mr-sm-2" name="subcatgoryMain" id="subcatgory" disabled>

                                 </select>   
                             </div>
                        </div>

                        <div class="row" style="margin-top: 10px;">
                            <div class="col-8 ">
                            <form>
                            <label for="image">Image: </label>
                                <div class="form-group">
                                    <input type="file" name="image" class="form-control-file" id="image">
                                </div>
                             </form>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 10px;">
                            <div class="col-8 text-center">
                            <input type="submit" id="addPro" class="btn btn-warning" name="addPro" value="Add Product">
                            </div>
                        </div>
                        
                    </div>
                </div>
                </form>
            </div>
            <div class="col-3 bord" style="padding:10px;">
                <div class="row">
                    <div class="col">
                        

                        <div class="row">
                        <div class="col">
                        <h1>Add Category</h1>
                        </div>
                        </div>
                         <div class="row mb-3 text-center"  style="display:none;">
                      <div class="col">
                          <div class="alert alert-danger" id="feedAddCategory"  role="alert">
                             Something went wrong
                          </div>
                       </div>
                     </div>
                        <div class="row" style="margin-top: 10px;">
                            <div class="col">
                            <input type="text" class="form-control" id="categoryInput" placeholder="Category Name"> 
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px;">
                            <div class="col">
                            <input type="text" class="form-control" id="subCategoryInput" placeholder="Sub Category Name"> 
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px;">
                            <div class="col text-center">
                            <button class="btn btn-warning" id="addCatrgoryBtn">Add Category</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 30px;">
                    <div class="col">
                        
                    <div class="row">
                        <div class="col">
                        <h2>Add Sub-Category</h2>
                        </div>
                        </div>
                         <div class="row mb-3 text-center" style="display:none;">
                      <div class="col">
                          <div id="feedSubAdder" class="alert alert-danger"  role="alert">
                             Something went wrong
                          </div>
                       </div>
                     </div>
                        <div class="row" style="margin-top: 10px;">
                        <div class="col-8 ">
                            <label for="categoryAdder">Choose Category:</label> 
                            <select id="subCatAddList" class="custom-select my-1 mr-sm-2" id="catgoryAdder" >
                                    <option value=0 selected>Choose...</option>
                                    <?php
                                   
                                    foreach($a as $x){
                                        echo "<option value='$x'>$x</option>";
                                    }
                                    ?>
                                 </select>   
                             </div>
                        </div>
                        <div class="row" style="margin-top: 10px;">
                            <div class="col">
                            <input  id="subCatVal" type="text" class="form-control" id="" placeholder="Sub Category Name"> 
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px;">
                            <div class="col text-center">
                            <button class="btn btn-warning" id="addSubCategorybtn">Add Sub Category</button>
                            </div>
                        </div>



                    </div>
                </div>






                <div class="row" style="margin-top: 30px;">
                    <div class="col">
                        
                    <div class="row">
                        <div class="col">
                        <h2>Delete Sub Category</h2>
                        </div>
                        </div>
                         <div class="row mb-3 text-center" style="display:none;">
                      <div class="col">
                          <div id="feedDeleteSub" class="alert alert-danger"  role="alert">
                             Something went wrong
                          </div>
                       </div>
                     </div>
                        <div class="row" style="margin-top: 10px;">
                        <div class="col-8 ">
                            <label for="catgoryDelete">Choose Category:</label> 
                            <select class="custom-select my-1 mr-sm-2" id="catgoryDelete" >
                                    <option value=0 selected>Choose...</option>
                                    <?php
                                   
                                    foreach($a as $x){
                                        echo "<option value='$x'>$x</option>";
                                    }
                                    ?>
                                 </select>   
                             </div>
                        </div>

                        <div class="row" style="margin-top: 10px;">
                        <div class="col-8 ">
                            <label for="subCategoryDelete">Choose Sub Category:</label> 
                            <select class="custom-select my-1 mr-sm-2" id="subCategoryDelete" disabled>
                                    <option value=0 selected>Choose...</option>
                                    
                                 </select>   
                             </div>
                        </div>
                       
                        <div class="row" style="margin-top: 10px;">
                            <div class="col text-center">
                            <button class="btn btn-warning" id="deleteSubButton">Delete</button>
                            </div>
                        </div>



                    </div>
                </div>








            </div>
        </div>
    </div>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
<script>
    $(document).ready(function(){
        $("#addCatrgoryBtn").click(function(){
            var cate = $("#categoryInput").val();
            var feed = $("#feedAddCategory").parent().parent();
            if(cate.length == 0){
                $("#feedAddCategory").html("Please enter category");
                feed.css("display","");
                return;
            }
            var subcate = $("#subCategoryInput").val();
            if(subcate.length == 0 ){
                $("#feedAddCategory").html("Please enter sub category");
                feed.css("display","");
                return;
            }
            $.post("handleadmin.php",{cat:cate,sub:subcate},function(data){
                if(data == 1){
                    $("#feedAddCategory").removeClass("alert-danger")
                    .addClass("alert-success")
                    .html("<strong>"+cate+"</strong> has been added to the list please refresh the page to add products");
                    feed.show();
                }else{
                    $("#feedAddCategory").html(data);
                feed.css("display","");
                }
               
            });
            $("#feedAddCategory").addClass("alert-danger")
                    .removeClass("alert-success");
        });
        $("#addSubCategorybtn").click(function(){
            var sub = $("#subCatAddList").val();
            var feed = $("#feedSubAdder").parent().parent();
            if(sub ==0){
                $("#feedSubAdder").html("Please choose a subcategory")
                feed.show();
                return;
            }
            var subvalue = $("#subCatVal").val(); 
            if(subvalue.length == 0){
                $("#feedSubAdder").html("Please enter subcategory value")
                feed.show();
                return;
            }
            alert(subvalue);
            $.post("handleadmin.php",{addSub:sub,addName:subvalue},function(data){
                if(data == 1){
                    $("#feedSubAdder").removeClass("alert-danger")
                    .addClass("alert-success")
                    .html("<strong>"+subvalue+"</strong> has been added to the list please refresh the page to add products");
                    feed.show();
                }else{
                    $("#feedSubAdder").html(data);
                feed.show();
                }
                
                
            });
            $("#feedSubAdder").addClass("alert-danger")
                    .removeClass("alert-success");
        });
       

        $("#catgoryDelete").on('change',function(){
           var v = $(this).val();
           if(v == 0){
               $("#subCategoryDelete").attr("disabled","disabled");
               return;
           } 
           $.post("handleadmin.php",{getsubcat:v},function(data){
            $("#subCategoryDelete").html(data);    
           });
           $("#subCategoryDelete").removeAttr("disabled");
        });

        $("#deleteSubButton").click(function(){
            var v = $("#catgoryDelete").val();
            if(v == 0){
               $("#subCategoryDelete").attr("disabled","disabled");
               $("#feedDeleteSub").html("Please choose category").parent().parent().show();
               return;
            }
            var subCat = $("#subCategoryDelete").val();
            $.post("handleadmin.php",{deleteCat:v,deleteSubCat:subCat},function(data){
                if(data == 1){
                    $("#feedDeleteSub").removeClass("alert-danger").addClass("alert-success");
                    $("#feedDeleteSub").html("<strong>"+subCat+"</strong> has been removed").parent().parent().show();
                }else{
                    $("#feedDeleteSub").html(data).parent().parent().show();
                    return;
                }
            });
            $.post("handleadmin.php",{getsubcat:v},function(data){
            $("#subCategoryDelete").html(data);    
           });
            $("#feedDeleteSub").addClass("alert-danger").removeClass("alert-success");
        });

        
        $("#mainChoosCatgory").on("change",function(){
            var v = $(this).val();
            if(v == 0){
                $("#subcatgory").attr("disabled","disabled");
                $("#feed").html("Please choose a category").parent().parent().show();
                return;
            }else{
                $.post("handleadmin.php",{getsubcat:v},function(data){
                    $("#subcatgory").html(data);    
                });
                $("#subcatgory").removeAttr("disabled");
                $("#feed").html("Please choose a category").parent().parent().hide();
                return;
            }
        });
        
    });
</script>
</html>