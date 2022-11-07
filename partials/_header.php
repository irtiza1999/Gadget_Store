<?php
    include 'partials/_dbconnect.php';
     if (session_status() === PHP_SESSION_NONE) {
        session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="icon" type="image/x-icon"
        href="https://w7.pngwing.com/pngs/93/456/png-transparent-gadget-devices-technology-smartphone-tablet-smart-phone-android-iphone-ipad-mobile-thumbnail.png">
    <link rel="stylesheet" type="text/css" href="/store/partials/_header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/store/index.php"><img
                    src="https://w7.pngwing.com/pngs/93/456/png-transparent-gadget-devices-technology-smartphone-tablet-smart-phone-android-iphone-ipad-mobile-thumbnail.png"
                    height="60" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link s1" aria-current="page" href="/store/index.php">Home</a>
                    </li>
                    <?php
                    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true){
                        echo'<li><a style="margin-right: 5px; padding-top: 7px" class="s1">Categories <i
                                class="fa fa-chevron-down"></i></a>';
                    }else{
                        echo'<li><a style="margin-right: 5px;padding-top: 7px ;width: 100px" class="s1">Categories <i
                                class="fa fa-chevron-down"></i></a>';
                    }
                    ?>
                    <ul>
                        <?php
                            $sql = "SELECT DISTINCT product_category FROM `products`";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)){
                                $name = $row['product_category'];
                            echo '
                                <li class="nav-item"><a class="nav-link s1" href="/store/categoryPage.php?cat='.$name.'">'.strtoupper($name).'</a></li>
                                
                            ';
                        }
                    echo'
                       </ul>
                    </li>';
                    
                    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true){
                        $curUserName = $_SESSION['user_name'];
                        $curUserId = $_SESSION['user_id'];
                    echo'
                    <li id="drop"><a style="margin-left: 5px; padding-top: 7px" class="s1">'.$curUserName.' <i class="fa fa-chevron-down"></i></a></a>
                    <ul>
                        <li class="nav-item"><a  class="nav-link s1" href="/store/userProfile.php">User Profile</a></li>
                        <li class="nav-item"><a  class="nav-link s1" href="/store/changePassword.php">Change Password</a></li>
                    </ul>
                    </li>';
                    if($_SESSION['user_type'] == 'admin'){
                        echo'
                        <li class="s1" style="margin-left: 7px; padding-top: 7px"><a href="">Admin Panel <i
                                class="fa fa-chevron-down"></i></a>
                            <ul>
                                <li class="nav-item"><a  class="nav-link s1" href="/store/manageUser.php">Manage Users</a></li>
                                <li class="nav-item"><a  class="nav-link s1" href="/store/manageProduct.php">Manage Products</a></li>
                                <li class="nav-item"><a  class="nav-link s1" href="/store/manageOrder.php">Manage Orders</a></li>
                            </ul>
                        </li>';
                    }
                    }
                ?>
                    </ul>

                    <?php
                            $c=0;
                            if(isset($_SESSION['cart'])){
                            $c = count($_SESSION['cart']);
                            }
                            echo'
                                <a href="/store/shoppingCart.php" style="padding: 10px; margin-right: 3px" class="s1 rounded-circle"><i class="fa fa-cart-plus" aria-hidden="true"><span class=" badge rounded-pill bg-secondary" style="margin-left: 3px;">'.$c.'</span></i></a>'
                            ;?>
                </ul>

                <form class="d-flex" role="search" action="/store/searchPage.php" method="post">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                        name="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <?php
                    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true){
                    echo' <ul>
                    <li class="nav-item"><a  class="btn btn-danger mx-2" href="/store/logout.php">Logout</a></li>
                    </ul>';
                }else{
                    echo'
                    <button class="btn btn-primary nav-item mx-2"><a href="/store/signup.php">Signup</a></button>
                    <button class="btn btn-success nav-item"><a href="/store/login.php">Login</a></button>
                    ';
                }
                ?>

            </div>
        </div>
    </nav>

    <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a33530bb41.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

</body>

</html>