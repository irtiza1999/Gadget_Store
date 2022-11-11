<?php
    include '_dbconnect.php';
    $orderId = $_POST['orderId'];
    $sql = "UPDATE `orders` SET `payment_status` = 'Paid' WHERE `orders`.`order_id` = $orderId";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: /store/manageOrder.php");
    }else{
        header("Location: /store/manageOrder.php?error=true");
    }
?>