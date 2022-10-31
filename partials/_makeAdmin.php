<?php
include '_dbconnect.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $user_id=$_POST['user_id'];
    $script=$_POST['script'];
    $params=$_POST['params'];
    $sql="UPDATE `users` SET `user_type`='admin' WHERE `user_id`='$user_id'";
    $result=mysqli_query($conn,$sql);
    if($result){
        header("Location: $script?$params");
    }else{
        echo'Error';
    }    
}?>
?>