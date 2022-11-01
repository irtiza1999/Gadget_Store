<?php
    include '_dbconnect.php';
    $id = $_POST['id'];
    $sql = "DELETE FROM `products` WHERE `product_id` = $id";
    $result = mysqli_query($conn, $sql);
    $script = $_POST["script"];
    $params = $_POST["params"];

    if($result){
        header("Location: $script?$params&delete=true");
    }
    else{
        header("Location: $script?$params&delete=false");
    }
?>