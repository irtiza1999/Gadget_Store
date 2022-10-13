<?php
session_start();
include 'partials/_dbconnect.php';

if(!(isset($_SESSION["cart"]))){
    $_SESSION["cart"];
}
 if(isset($_POST["id"])){
        $id = $_POST["id"];
        $quan = $_POST["quan"];
        if($quan>0 && filter_var($quan,FILTER_VALIDATE_INT)){
            if(isset($_SESSION['cart'][$id])){
                $_SESSION['cart'][$id] += $quan;
            }else{
                $_SESSION['cart'][$id] = $quan;
            }
        }else{
            echo '<h1>Invalid quantity</h1>';
        }
    }
echo "<pre>";
print_r($_SESSION['cart']);
echo "</pre>";
?>