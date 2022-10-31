<?php
include '_dbconnect.php';
$script = $_SERVER['SCRIPT_NAME'];
$params = $_SERVER['QUERY_STRING'];
if($_SERVER['REQUEST_METHOD']=='POST'){
    $user_id = $_POST['user_id'];
    $newName = $_POST['newName'];
    $newMail = $_POST['newMail'];
    $sql = "UPDATE `users` SET `user_name` = '$newName', `user_email` = '$newMail' WHERE `user_id` = $user_id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: /store/manageUser.php?edit=success");
    }else{
        header("Location: /store/manageUser.php?edit=failed");
    }    
}
?>