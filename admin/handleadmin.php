<?php
require "adminClass.php";
require "../php/indexC.php";
include "../php/db.php";

if(isset($_POST["cat"]) && isset($_POST["sub"])){
    $category = $_POST["cat"];
    $subcategory = $_POST["sub"];

    $a = new AddCategory($category,$subcategory);
    if($a->categoryExist($conn)){
        echo "Category Already exist, cannot add <strong>$category</strong>";
    }else{
        $prev =  str_replace("\\","/",dirname( dirname(__FILE__) ))."/img/products/".$subcategory."/";
        
        if($a->insertCategory($conn)){
            if(!is_dir($prev)){
                mkdir($prev);
            }
            echo 1;
        }else{
            echo "server not responding";
        }
    }
}else 

    if(isset($_POST["addName"]) && isset($_POST["addSub"])){
        $cat = $_POST["addSub"];
        $sub = $_POST["addName"];
        $a = new AddCategory($cat,$sub);
        if($a->subCategoryExist($conn)){
            echo "<strong>$sub</strong> already exist cannot add this into <strong>$cat</strong>, please change the name";
        }else{
            $prev =  str_replace("\\","/",dirname( dirname(__FILE__) ))."/img/products/".$sub."/";
            if($a->insertCategory($conn)){
                if(!is_dir($prev)){
                    mkdir($prev);
                }
                
                echo 1;
            }else{
                echo "server not responding";
            }
        }
    }else 
    if(isset($_POST["getsubcat"])){
        $value= $_POST["getsubcat"];
        $x = new Category($value);
        $ans = $x->getSubCategories($conn);
        foreach($ans as $q){
            echo "<option value='$q'>"."$q"."</option>";
        }
    }
    else 
    if(isset($_POST["deleteCat"]) && isset($_POST["deleteSubCat"])){
       $cat = $_POST["deleteCat"];
       $sub = $_POST["deleteSubCat"];
       $a = new AddCategory($cat,$sub);
       if($a->deleteCategory($conn)){
        $prev =  str_replace("\\","/",dirname( dirname(__FILE__) ))."/img/products/".$sub."/";
        rmdir($prev);
           echo 1;
       }else{
           echo "Could not delete";
       }
    }


?>