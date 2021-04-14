<?php
include "db.php";
require "indexC.php";

if(isset($_POST['id']) && isset($_POST['c'])){
    $id = $_POST['id'];
    $c = $_POST['c'];
$a = new ListProduct($id);
$x = $a->getProducts($conn);


foreach($x as $y){
  if(strlen($y->pname)>100){
  $des = substr( $y->pname,0,100)."...";
  }else{
    $des = $y->pname;
  }
    echo "
    
    <div class='card w-65 rounded' style='margin: 5px;'>
            <div class='card-header '>
                <!--<input type='range' class='slider' />-->
            </div>
            <img class='card-img-top' src='$y->image' alt='Card image cap'>
          
          <div class='card-body text-center'>
            <a href='order.php?c=$c&&pid=$y->pid' class='card-text card-link desc'>$des</a>
          </div>
          
          <div class='card-footer text-center'>
            <small class='text-muted'>$$y->price</small>
          </div>
        </div>
    
    ";
}

}   
?>