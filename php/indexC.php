<?php
class Catlog{
    function getCategories(mysqli $con){
        $query = "Select DISTINCT category from category";
        $result = $con->query($query);
        
        $res = array();
        $i=0;
        while($row = $result->fetch_array()){
            $res[$i] = $row[0];
            $i = $i+1;
        }   
        return $res;
    }
}

class Category extends Catlog{
    public $catName;
    public $catId;
    function __construct($name)
    {
        $this->catName = $name;
    }
    function getSubCategories(mysqli $con){
        $query = "Select subcategory From category where category = '".$this->catName."';";
        $result = $con->query($query);
        
        $res = array();
        $i=0;
        while($row = $result->fetch_array()){
            $res[$i] = $row[0];
            $i = $i+1;
        }   
        return $res;
    }

}

class SubCategory extends Category{
    public $subName;
    function __construct($x)
    {
        $this->subName = $x;
    }
    function getIdOfSubCategory(mysqli $con){
        $q = "SELECT id FROM category WHERE subcategory = '".$this->subName."';";
        $res = $con->query($q);
        $ans = $res->fetch_array();
        return $ans[0];
    }
   
}

class Product extends SubCategory{
    public $pname;
    public $price;
    public $pid;
    public $image;
    public $des;
    function __construct($id,$name,$price,$cat,$img)
    {
        $this->pid = $id;
        $this->pname = $name;
        $this->price = $price;
        $this->catId = $cat;
        $this->image = $img;
    }
    function setDescription($x){
        $this->des = $x;
    }
 
    
}

class ListProduct{
    public $id;
    function __construct($x){
        $this->id = $x;
    }
    function getProducts(mysqli $con){
        $query = "SELECT id,name,price,category,image FROM product WHERE category=".$this->id;
        $res= $con->query($query);
        $ans = array();
        $i = 0;
        while($row = $res->fetch_assoc()){
            $ans[$i] = new Product($row['id'],$row['name'],$row['price'],$row['category'],$row['image']);
            $i=$i+1;
        }
        return $ans;
    }

    function getProductDetails($id,$con){
        $query = "SELECT id,name,price,category,image,description FROM product WHERE id=".$this->id;
        $res= $con->query($query);
        $x = $res->fetch_assoc();
        $a = new Product($x['id'],$x['name'],$x['price'],$x['category'],$x['image']);
        $a->setDescription($x['description']);
        return $a;
    }
}


class Kart{
    public $tot=0;
    function  __construct(){
        $_SESSION["cart"] = array();
    }

    function addItem($pid,$qty){
        if(isset($_SESSION["cart"][$pid])){
        $_SESSION["cart"][$pid] = $_SESSION["cart"][$pid] + $qty;
        }else{
            $_SESSION["cart"][$pid] = $qty;
        } 
    }
    function displayCart(){
        print_r($_SESSION["cart"]);
    }
    function removeItem($pid){
        
        unset($_SESSION["cart"][$pid]);
    }
    function caluculatePrice(mysqli $con){
        $cart = $_SESSION["cart"];
        $y = array_keys($cart);
        $ans = array(); 
        foreach($y as $key){
            $k = new ListProduct($key);
            $v = $k->getProductDetails($key,$con);
            $price = $v->price * $cart[$key];
            $v->price = $price;
            $this->tot = $this->tot + $price;
            $detail = new OrderDis($v->pname,$v->price,$cart[$key],$key,$v->image); 

            array_push($ans,$detail);
        }
        return $ans;
    }
    function getNoitems(){
        return sizeof($_SESSION["cart"]);
    }
    function addQty($pid){
        $_SESSION["cart"][$pid] = $_SESSION["cart"][$pid] +1;
        return 1;
    }
    
    function removeQty($pid){
        $_SESSION["cart"][$pid] = $_SESSION["cart"][$pid] -1;
        if($_SESSION["cart"][$pid] <=0){
            $this->removeItem($pid);
        }
        return 1;
    }
    


}
class OrderDis{
    public $pname;
    public $price;
    public $qty;
    public $image;
    public $pid;
    function __construct($n,$p,$q,$id,$img)
    {
        $this->image = $img;
        $this->pname = $n;
        $this->price = $p;
        $this->qty = $q;
        $this->pid = $id;
    }
}

class Register{
    private $email;
    private $password;
    private $phone;
    private $firstName;
    private $lastName;
    public $cid;
    function __construct($e,$p,$ph,$fn,$ln)
    {
    $this->email= $e;
    $this->password= $p;
    $this->phone = $ph;
    $this->firstName = $fn;
    $this->lastName = $ln;    
    }
    function checkEmail(){
        $x = filter_var($this->email,FILTER_VALIDATE_EMAIL);
        if($x){
            return 1;
        }else{
            return 0;
        }
    }
    
    function checkPassword(){
        if(strlen($this->password) < 6){
            return 0;
        }else{
            return 1;
        }
    }
    function checkPhone(){
        if(is_numeric($this->phone) && strlen($this->phone) >= 10){
            return 1;
        }else{
            return 0;
        }
    }
    function checkCustomer(mysqli $con){
        if($this->checkEmail()){
            if($this->checkPassword()){
                if($this->checkPhone()){
                    if($this->userExist($con)){
                       return "User Already Exist"; 
                    }else{
                        if($this->addCustomer($con)){
                            return 1;
                        } else{
                            return "Server Failed to Register the user try after sometime.";
                        }
                    }        
                    
                }else{
                    return "Invalid Phone number";
                }
            }else{
                return "Passsword Should be more than  characters";
            }
        }else{
            return "Email Incorrect";
        }
    }
    function userExist(mysqli $con){
        $q = "SELECT email FROM customer WHERE email='$this->email';";
        $res = $con->query($q);
        if($res){
            $x = $res->num_rows;
            if($x>0){
                return 1;
            }else{
                return 0;
            }
        }else{
            return 0;
        }
    }
    function addCustomer(mysqli $con){
        $q = "INSERT INTO `customer`(`cid`, `email`, `password`, `phone`, `firstname`, `lastname`,`amazonbal`) VALUES (null,'$this->email','$this->password','$this->phone','$this->firstName','$this->lastName',10000);";
        $res= $con->query($q);
        return $res;
    }
}
class User{
    public $email; 
    private $password;
    public $id;
    public $fname;
    function __construct($e,$p)
    {
        $this->email = $e;
        $this->password = $p;
    }
    function getId(mysqli $con){
        $q = "SELECT cid FROM customer WHERE email = '$this->email' AND password='$this->password';";
        $res = $con->query($q);
        if($res->num_rows > 0){
            $ans =  $res->fetch_array();
            $this->id = $ans[0];
            return $ans[0];
        }else{
            return 0;
        }

    }
    function getAmazonBal(mysqli $con){
        $q = "SELECT amazonbal FROM customer WHERE cid = $this->id";
        $res = $con->query($q);
        if($res->num_rows > 0){
            $ans =  $res->fetch_array();
            
            return $ans[0];
        }else{
            return 0;
        }
    }

    function setAmazonBal(mysqli $con,$bal){
        $q = "UPDATE customer SET amazonbal=$bal WHERE cid=$this->id;";
        $res = $con->query($q);
        if($res){
            return 1;
        }else{
            return 0;
        }
    }
    function getName(mysqli $con){
        if($this->fname != null){
            return $this->fname;
        }else{
            $q = "SELECT firstname FROM customer WHERE cid=$this->id;";
            $res=$con->query($q);
            $ans = $res->fetch_array();
            $this->fname = $ans[0];
            return $ans[0];
        }
    }
    
}
class Payment{
    function makePayment($mode,$add,$cid,mysqli $con){
        $trans = md5(date('Y M D h:i:s', time ()));
            
        if($mode == 2){
            $res = $this->addOrderTable($con,$cid,$add,$trans,$mode);
            if($res == 1){
                return 1;
            }else{
                return 0;
            }        
        }else if($mode == 3){
            $res = $this->addOrderTable($con,$cid,$add,$trans,$mode);
            if($res == 1){
                return 1;
            }else{
                return 0;
            }        
        }
    }
    function addOrderTable(mysqli $con,$cid,$add,$trans,$mode){
        $x = $_SESSION['cart'];       
            $items = array_keys($x);
            foreach($items as $item){
                $k = new ListProduct($item);
                $v = $k->getProductDetails($item,$con);
                $amt = $x[$item]*$v->price;
                $q = "INSERT INTO
                 `orders`(`oid`, `pid`, `cid`, `address`, `quantity`, `orderstatus`, `amtpaid`, `defectstatus`, `transactionno`,mode) 
                 VALUES (null,$item,$cid,'$add',$x[$item],0,$amt,0,'$trans',$mode);";
                 $res = $con->query($q);
                 if(!$res){
                     echo "Could not place order";
                    
                     return 0;
                 }
                 
            }
            return 1;
    }
}

?>  