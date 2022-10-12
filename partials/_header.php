<?php
    include 'partials/_dbconnect.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="/store/partials/_header.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/store/index.php">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/store/index.php">Home</a>
                    </li>
                    <li id="drop"><a href="">Categories</a>
                        <ul>
                            <?php
                            $sql = "SELECT DISTINCT product_category FROM `products`";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)){
                                $name = $row['product_category'];
                            echo '
                                <li class="nav-item"><a class="nav-link" href="/store/categoryPage.php?cat='.$name.'">'.strtoupper($name).'</a></li>
                            ';
                        }
                    echo'
                       </ul>
                    </li>';
                    $curUserName = $_SESSION['user_name'];
                    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true){
                    echo'
                    <li id="drop"><a href="">'.$curUserName.'</a>
                    <ul>
                        <li class="nav-item"><a class="nav-link" href="#">Resources</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Links</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Tutorials</a></li>
                    </ul>
                    </li>
                       <li class="nav-item"><a class="btn btn-danger mx-2" href="/store/logout.php">Logout</a></li>';
                    }else{
                        echo'
                        <li class="nav-item">
                            <a class="btn btn-primary mx-1" href="/store/signup.php">Signup</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-success mx-1" href="/store/login.php">Login</a>
                        </li>
                    ';
                    }
                ?>
                        </ul>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
</body>

</html>