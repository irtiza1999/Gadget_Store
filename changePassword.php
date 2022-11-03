<?php 
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
}
    $login = false;
    $showErr = false;
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        include 'partials/_dbconnect.php';
        $oldPassword = $_POST["oldPassword"];
        $user_id = $_SESSION['user_id'];
        $sql = "Select * from `users` where user_id='$user_id'";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        if($num==1){
            while($row = mysqli_fetch_assoc($result)){
                if($oldPassword == $row['user_pass']){
                    $newPassword = $_POST['newPassword'];
                    $cNewPassword = $_POST['CnewPassword'];
                    if($newPassword == $cNewPassword){
                        $sql = "UPDATE `users` SET `user_pass` = '$newPassword' WHERE `users`.`user_id` = $user_id";
                        $result = mysqli_query($conn,$sql);
                        if($result){
                            session_destroy();
                            header("location: index.php");
                        }
                    }else{
                        $showErr = "Passwords do not match";
                    }
                }else{
                    $showErr = "Invalid Credentials";
                }
            }
        }else{
            $showErr = true;
        }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <link rel="icon" type="image/x-icon"
        href="https://w7.pngwing.com/pngs/93/456/png-transparent-gadget-devices-technology-smartphone-tablet-smart-phone-android-iphone-ipad-mobile-thumbnail.png">

    <title>Login</title>
</head>

<body>
    <?php include 'partials/_header.php' ?>
    <div class="container">
        <h1 class="text-center">Change Password</h1>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="mb-3">
                <label for="loginEmail" class="form-label">Old Password</label>
                <input type="password" class="form-control" id="oldPassword" name="oldPassword"
                    aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="loginPass" class="form-label">New Password</label>
                <input type="password" class="form-control" id="newPassword" name="newPassword" required>
            </div>
            <div class="mb-3">
                <label for="loginPass" class="form-label">Confirm New Password</label>
                <input type="password" class="form-control" id="CnewPassword" name="CnewPassword" required>
            </div>
            <button type="submit" class="btn btn-success">Change Password</button>
        </form>
    </div>
</body>

</html>