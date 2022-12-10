<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gadget Store</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon"
        href="https://w7.pngwing.com/pngs/93/456/png-transparent-gadget-devices-technology-smartphone-tablet-smart-phone-android-iphone-ipad-mobile-thumbnail.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css"
        integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

    <style>
    body {
        font-family: "Trebuchet MS", sans-serif;
    }
    </style>
</head>

<body>
    <?php include 'partials/_header.php';
    include 'partials/_dbconnect.php';
    if(isset($_GET['orderPlaced'])){
        if($_GET['orderPlaced']=='true'){
         echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your order has been placed successfully. Track your order from <strong><a href="/store/userProfile.php">here</a>.</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }else{
        echo'
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Your order has not been placed successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
    }}
    if(isset($_GET['passwordChanged'])){
        if($_GET['passwordChanged']=='true'){
         echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your password has been changed successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }}
    echo'
    <div class="container">
    <h3 class="text-center" style="margin-top: 50px; margin-bottom: 50px">Recently Added Products</h3>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner d-flex justify-content-around" style="background: #C8D0D8;">
        ';
        $caraouselSql = "SELECT * FROM `products` ORDER BY `product_id` DESC LIMIT 3";
        $caraouselResult = mysqli_query($conn, $caraouselSql);
        $count = 0;
        while($caraouselRow = mysqli_fetch_assoc($caraouselResult)){
            $caraouselImg = $caraouselRow['product_image'];
            $caraouselName = $caraouselRow['product_name'];
            $caraouselPrice = $caraouselRow['product_price'];
            $carouselId = $caraouselRow['product_id'];
            if($count==0){
                echo'
            <div class="carousel-item active" style="padding: 20px; margin-bottom: 10px">
                <div class="row">
             <div class="col-md-6">
             <a href="/store/productPage.php?productId='.$carouselId.'">
                    <img class="rounded" src="/store/uploads/'.$caraouselImg.'" alt="" style="height: 500px; width: 398px;display: block;margin-left: auto;margin-right: auto">
                    <h5 style="color: blue; text-align: center; margin-top: 10px">'.$caraouselName.'</h5>
            </a>
             </div>
            </div>
            </div>';
            }else{
                echo'
            <div class="carousel-item" style="padding: 20px; margin-bottom: 10px">
             <div class="row">
             <div class="col-md-6">
             <a href="/store/productPage.php?productId='.$carouselId.'">
                    <img class="rounded" src="/store/uploads/'.$caraouselImg.'" alt="" style="height: 500px; width: 398px;display: block;margin-left: auto;margin-right: auto">
                    <h5 style="color: blue; text-align: center; margin-top: 10px">'.$caraouselName.'</h5>
            </a>
             </div>
            </div>
            </div>';
            }
            $count++;
            
        }
        echo'</div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>';
    ?>
    <div class="row" style="padding-top: 90px; margin-bottom: 50px">
        <h3 class="text-center" style="margin-bottom: 50px">All Products</h3>
        <div class="container d-flex justify-content-center mt-50 mb-50">
            <div class="row">
                <?php ini_set('display_errors', '1');
    $script   = $_SERVER['SCRIPT_NAME'];
    $sql="SELECT * FROM `products`";
    $result=mysqli_query($conn, $sql);

    while ($row=mysqli_fetch_assoc($result)) {
        $id=$row['product_id'];
        $name=$row['product_name'];
        $price=$row['product_price'];
        $img=$row['product_image'];
        $price = $row['product_price'];
        $category = $row['product_category'];
        $stock = $row['product_stock'];
        

        $tempSql = "SELECT rating FROM `comments` WHERE commented_for = $id";
        $tempResult = mysqli_query($conn, $tempSql);
        $totalRating = 0;
        $count = 0;
        $rating=0;
        while ($tempRow = mysqli_fetch_assoc($tempResult)) {
            $totalRating += $tempRow['rating'];
            $count++;
        }
        if($count==0){
            $rating = 0;
        }else{
            $rating = $totalRating/$count;
        }
        echo'
           <div class="col-md-3 mt-2">
                <div class="card" style="height: 500px">
                                    <div class="card-body">
                                        <div class="card">
                                                <a href="/store/productPage.php?productId='.$id.'"><img src="/store/uploads/'.$img.'" class="" style="height: 250px; width: 200px"></a>
                                        </div>
                                    </div>
                                    <div class="card-body bg-light text-center">
                                        <div class="mb-2">
                                            <h6 class="font-weight-semibold mb-2">
                                                <a href="/store/productPage.php?productId='.$id.'" data-abc="true">'.$name.'</a>
                                            </h6>
                                            <a href="/store/categoryPage.php?cat='.$category.'" class="text-muted" data-abc="true">'.strtoupper($category).'</a>
                                        </div>';
                                        $temp = floor(5-$rating);
                                        for($i=0; $i<$rating; $i++){
                                            echo '<span>⭐</span>';
                                        }
                                        for($i=0; $i<$temp; $i++){
                                            echo '<span class="fa fa-star"></span>';
                                        }
                                        echo'<h3 class="mb-0 font-weight-semibold">$'. $price.'</h3>';
                                        if($stock==0){
                                            echo'<p class="text-danger">Out of Stock</p>';}
                                        else{
                                            echo'
                                        <form action="partials/_addToCart.php" method="post">
                                            <input type="hidden" name="id" id="id" value='.$id.'>
                                            <input type="hidden" name="script" id="script" value='. $script.'>
                                            <input type="hidden" name="quan" id="quan" value=1>
                                            <button type="submit" class="bg-cart btn btn-success"><i class="fa fa-cart-plus mr-2"></i> Add to cart</button>
                                        </form>';
                                    }
                                    echo'
                                    </div>
                                </div>                    
           </div> 
           
           
';}


?>

            </div>
        </div>
        <?php include 'partials/_footer.php'?>
        <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js">
        </script>
        <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>
        <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
        </script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
        <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/a33530bb41.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>
</body>

</html>