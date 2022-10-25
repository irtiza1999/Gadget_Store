<?php
    include '_dbconnect.php';
    $user_id = $_POST['user_id'];
    $sql = "DELETE FROM `users` WHERE `user_id` = $user_id";
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