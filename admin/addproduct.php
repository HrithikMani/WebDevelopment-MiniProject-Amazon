<?php
include "../php/db.php";

date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'h:i:s', time () );
$error ="";
$dis =0;
$at = "alert-danger";
if(isset($_POST["addPro"])){
    if(isset($_POST["pname"]) && !empty($_POST["pname"])){
        $pname = $_POST["pname"];
        if(isset($_POST["pricename"]) && !empty($_POST["pricename"])){
            $price = $_POST["pricename"];
            if(isset($_POST["description"]) && !empty($_POST["description"])){
                $des = addslashes($_POST["description"]);
                if(isset($_POST["categorySelect"])){
                    $cat = $_POST["categorySelect"];
                    if(isset($_POST["subcatgoryMain"])){
                        $sub = $_POST["subcatgoryMain"];
                        if(isset($_FILES["image"])){
                            $filename = md5($currentTime);
                            $type =  strtolower(pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION));
                            $prev =  str_replace("\\","/",dirname( dirname(__FILE__) ));
                            $targetstore = "img/products/".$sub."/".$filename.".".$type;
                            $target = $prev."/".$targetstore;
                            
                            $mkName = $prev."/img/products/".$sub."/";
                            if(!is_dir($mkName)){
                                mkdir($mkName);
                            }
                            if(move_uploaded_file($_FILES["image"]["tmp_name"], $target)){
                                $p = new SubCategory($sub);
                                $katId = $p->getIdOfSubCategory($conn);
                                
                                $q = "INSERT INTO `product`(`id`, `name`, `description`, `price`, `category`, `stock`, `image`) VALUES (null,'$pname','$des','$price','$katId',0,'$targetstore');";     
                                $res = $conn->query($q);
                                if($res){
                                    $error =  "Product added successfully";
                                    $dis = 1;
                                    $at = "alert-success";
                                }else{
                                    echo 2;
                                }
                            }else{
                                echo "Failed to add data";
                            }
                        }                       
                        
                    }else{
                        $error = "Please Select sub category";
                        $dis = 1;  
                    }
                    
                }else{
                    $error = "Please Select category";
                    $dis = 1;    
                }
            }else{
                $error = "Please give description";
            $dis = 1;    
            }


        }else{
            $error = "Please enter product price";
            $dis = 1;
        }
    }else{
        $error = "Please enter product name";
        $dis = 1;
    }

}

?>