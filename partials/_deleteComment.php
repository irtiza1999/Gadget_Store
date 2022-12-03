<?php
    include '_dbconnect.php';
    $id = $_POST['commentId'];
    $sql = "DELETE FROM `comments` WHERE `comment_id` = $id";
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