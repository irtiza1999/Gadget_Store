<?php 
    $login = false;
    $showErr = false;
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        include 'partials/_dbconnect.php';
        
        // $params = $_POST["params"];
        $userMail = $_POST["loginEmail"];
        $password = $_POST["loginPass"];
        $exists = false;
        $sql = "Select * from `users` where user_email='$userMail'";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        if($num==1){
            while($row = mysqli_fetch_assoc($result)){
                if($password == $row['user_pass']){
                    $login = true;
                    session_start();
                    $_SESSION['loggedIn'] = true;
                    $_SESSION['user_name'] = $row['user_name'];
                    $_SESSION['user_id'] = $row['user_id'];
                    header("location: index.php");
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

    <title>Login</title>
</head>

<body>
    <?php include 'partials/_header.php' ?>
    <div class="container">
        <h1 class="text-center">Login</h1>
        <form action="login.php" method="post">
            <div class="mb-3">
                <label for="loginEmail" class="form-label">Email address</label>
                <input type="email" class="form-control" id="loginEmail" name="loginEmail" aria-describedby="emailHelp"
                    required>
            </div>
            <div class="mb-3">
                <label for="loginPass" class="form-label">Password</label>
                <input type="password" class="form-control" id="loginPass" name="loginPass" required>
            </div>
            <button type="submit" class="btn btn-success">Login</button>
        </form>
    </div>
</body>

</html>