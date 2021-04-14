<?php
session_start();
class Admin{
    private $email;
    private $password;
    private $id;
    function __construct($e,$p)
    {   
        $this->email = $e;
        $this->password = $p;

    }

    function verifYDetails(mysqli $con){
        $q = "SELECT id FROM admin WHERE email='$this->email' AND password='$this->password'";
        $res= $con->query($q);
        if($res){
            if($res->num_rows >0){
                $x = $res->fetch_array();
                $this->id = $x[0];
                $_SESSION["admin"] = $x[0];
                return 1;
            }else{
                return "Invalid user";
            }
        }else{
            return "Server not responding";
        }
    }
}

class AddCategory{
    public $cate;
    public $sub;

    function __construct($category,$subcategory)
    {
        $this->cate = $category;
        $this->sub = $subcategory;
    }

    function categoryExist(mysqli $con){
        $q = "SELECT category FROM category WHERE category='$this->cate'";
        $res=$con->query($q);
        if($res->num_rows >0){
            return 1;
        }else{
            return 0;
        }
    }
    function subCategoryExist(mysqli $con){
        $q = "SELECT category FROM category WHERE category='$this->cate' AND subcategory='$this->sub'";
        $res=$con->query($q);
        if($res->num_rows >0){
            return 1;
        }else{
            return 0;
        }
    }
    function insertCategory(mysqli $con){
        $q ="INSERT INTO `category`(`id`, `category`, `subcategory`) VALUES (null,'$this->cate','$this->sub');";
        $res = $con->query($q);
        if($res){
            return 1;
        }else{
            return 0;
        }
    }
    
    function deleteCategory(mysqli $con){
        $q ="DELETE FROM `category` WHERE category='$this->cate' AND subcategory='$this->sub';";
        $res = $con->query($q);
        if($res){
            return 1;
        }else{
            return 0;
        }
    }
    
}

class Order{
    public $oid;
    public $pname;
    public $pid;
    public $cid;
    public $cname;
    public $address;
    public $status;
    public $image;
    public $qty;
    public $defect;
    public $trans;
    function getOrderDetailsById(mysqli $con){
        $q ="SELECT * FROM `orders` WHERE oid=$this->oid";
        $res = $con->query($q);
        if($res->num_rows > 0){
            $x = $res->fetch_assoc();
            $this->pid = $x['pid'];
            $this->cid = $x['cid'];
            $this->address = $x['address'];
            $this->pid = $x['pid'];
            $this->qty = $x['quantity'];
            $this->status = $x['orderstatus'];
            $this->defect = $x['defectstatus'];
            $this->mode = $x['mode'];
            $this->trans = $x['transactionno'];
            return $x;
        }
    }

    function getOrderDetailsByTrans(mysqli $con){
        $q ="SELECT * FROM `orders` WHERE oid=$this->trans";
        $res = $con->query($q);
        if($res->num_rows > 0){
            $x = $res->fetch_assoc();
            $this->pid = $x['pid'];
            $this->cid = $x['cid'];
            $this->address = $x['address'];
            $this->pid = $x['pid'];
            $this->qty = $x['quantity'];
            $this->status = $x['orderstatus'];
            $this->defect = $x['defectstatus'];
            $this->mode = $x['mode'];
            $this->trans = $x['transactionno'];
            return $x;
        }
    }
    function getOrderImage(mysqli $con){
        $q ="SELECT image FROM `product` WHERE id=$this->pid";
        $res = $con->query($q);
        if($res){
            $x = $res->fetch_assoc();
            $this->image = $x['image'];
            return $x['image'];
        }else{
            return 0;
        }
    
    }
    function getOrderProductName(mysqli $con){
        $q ="SELECT name FROM `product` WHERE id=$this->pid";
        $res = $con->query($q);
        if($res){
            $x = $res->fetch_assoc();
            $this->pname = $x['name'];
            return $x['name'];
        }else{
            return 0;
        }
        
    }
    function listAllOrderId(mysqli $con){
        $ans = array();
        $q = "SELECT oid FROM orders WHERE cid=$this->cid";
        $res= $con->query($q);
        while($row = $res->fetch_array()){
            array_push($ans,$row[0]);
        }
        return $ans;
    }

    function getName(mysqli $con){
        if($this->cname != null){
            return $this->fname;
        }else{
            $q = "SELECT firstname FROM customer WHERE cid=$this->cid;";
            $res=$con->query($q);
            $ans = $res->fetch_array();
            $this->cname = $ans[0];
            return $ans[0];
        }
    }
    
}
?>