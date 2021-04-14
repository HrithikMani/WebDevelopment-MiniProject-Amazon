<?php
include "../php/db.php";
include "adminClass.php";

$q = "SELECT DISTINCT cid FROM customer";
$res = $conn->query($q);
while($row = $res->fetch_array()){
    $listCustomerOrder = new Order();
    $listCustomerOrder->cid = $row[0];
    $x = $listCustomerOrder->listAllOrderId($conn);
    foreach($x as $y){
        $temp = new Order();
        $temp->oid = $y;
        $temp->getOrderDetailsById($conn);
        $temp->getOrderImage($conn);
        $temp->getOrderProductName($conn);
        $temp->getName($conn);
        
        echo "
        
 <div class='row' style='margin-top:10px;'>
 <div class='col-12'>
     <div class='row'>
         <div class='col-8'>
             <div class='row'>
                 <div class='col-6'>
                     <img class='w-100' src='../$temp->image'>
                 </div>
                 <div class='col-6'>
                     <div class='row'>
                         <div class='col'>
                             <h3>$temp->pname</h3>
                         </div>
                     </div>
                     <div class='row'>
                         <div class='col'>
                         <h5>Product id: $temp->pid</h5>
                         </div>
                     </div>
                     <div class='row'>
                         <div class='col'>
                         <h5>Customer id: $temp->cid</h5>
                         </div>
                     </div>
                     <div class='row'>
                         <div class='col'>
                         <h5>Customer Name: $temp->cname</h5>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class='col-4'>
             <div class='row'>
                 <div calss='col'>
                     <strong>Address:</strong><br>
                     <p style='margin-left:10px;'>$temp->address</p>
                  </div>
             </div>
             <div class='row'>
                 <div calss='col'>
                     <strong> Status : <span style='color:red;'>In Shipment Phase</span></strong>
                     
                     <button type='button' class='btn btn-warning bxt loginButton' style='margin-left:10px'>Increase Status</button>
                     
                 </div>
             </div>
             
         </div>
     </div>
 </div>
</div>
        
        
        ";
    
    
        }
}



?>

        


        
        