<?php
    include '_dbconnect.php';
    $script = $_POST['script'];
    $params = $_POST['params'];
    $productId = $_POST['productId'];
    $comment = $_POST['comment'];
    $userId = $_POST['userId'];
    $rating = 0;
    if(isset($_POST['rating']) && $_POST['rating'] > 0){
        $rating = floor($_POST['rating']);
    }
    if(strlen($comment)>0 && $rating>0){
    $sql = "INSERT INTO `comments` (`comment_content`, `commented_by`, `commented_for`,`rating`) VALUES ('$comment', '$userId', '$productId','$rating')";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: $script?$params&comment=success");
    }
    else{
        header("Location: $script?$params&comment=failed");
    }
}else{
        header("Location: $script?$params&comment=failed");
    }

?>