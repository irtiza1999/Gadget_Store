<?php
session_start();
include '_dbconnect.php';

if(!(isset($_SESSION["cart"]))){
    $_SESSION["cart"];
}
 if(isset($_POST["id"])){
        $id = $_POST["id"];
        $quan = $_POST["quan"];
        $sql = "SELECT * FROM `products` WHERE `product_id` = $id";
        $result = mysqli_query($conn, $sql);
        $stock = 0;
        while($row = mysqli_fetch_assoc($result)){
            $stock = $row['product_stock'];
        }
        if($quan>0 && $quan <= $stock && filter_var($quan,FILTER_VALIDATE_INT)){
                $_SESSION['cart'][$id] = $quan;
        }else{
            $script = $_POST["script"];
            $params = $_POST["params"];
            $temp = $_POST["id"];
            header("Location: /store/shoppingCart.php?err=True");
            exit();
        }
        
    }
header("Location: /store/shoppingCart.php?err=False");
exit();

?>