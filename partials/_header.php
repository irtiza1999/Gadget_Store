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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    $curUserId = $_SESSION['user_id'];
                    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true){
                    echo'
                    <li id="drop"><a href="">'.$curUserName.'</a>
                    <ul>
                        <li class="nav-item"><a class="nav-link" href="/store/userProfile.php">User Profile</a></li>
                        <li class="nav-item"><a class="nav-link" href="/store/orderHistory.php">Order History</a></li>
                    </ul>
                    </li>';
                    }
                ?>
                        </ul><?php
                            $c=0;
                            if(isset($_SESSION['cart'])){
                            $c = count($_SESSION['cart']);
                            }
                            echo'
                                <div style="float:right">
                                <div class="shopingicons mr-auto">
                                <a href="/store/shoppingCart.php">
                                    <span class="icon-shopping-bag"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                    </svg>
                                    <span class="number charity" id="number" style="text-align:center;width:26px;padding-top:3px"><strong><small>'.$c.'</small></strong></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                            ';?>
                </ul>

                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <?php
                    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true){
                    echo'<li class="nav-item"><a class="btn btn-danger mx-2" href="/store/logout.php">Logout</a></li>';
                }else{
                    echo'<li class="nav-item">
                            <a class="btn btn-primary" href="/store/signup.php">Signup</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-success" href="/store/login.php">Login</a>
                        </li>';
                }
                ?>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a33530bb41.js" crossorigin="anonymous"></script>

</body>

</html>