<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon"
        href="https://w7.pngwing.com/pngs/93/456/png-transparent-gadget-devices-technology-smartphone-tablet-smart-phone-android-iphone-ipad-mobile-thumbnail.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
    <?php include 'partials/_header.php';
    include 'partials/_dbconnect.php';
    if(isset($_GET['orderPlaced'])){
        if($_GET['orderPlaced']=='true'){
         echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your order has been placed successfully.
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
    ?>
    <div class="container">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut repellendus,
            alias quos atque excepturi magni quo et adipisci,
            quisquam optio harum cum ex tenetur laborum ! Nemo expedita culpa atque. Sunt dolore dignissimos odio
            recusandae,
            sed cum tenetur odit voluptate aliquam modi harum,
            magni vel expedita facilis ! Natus doloribus dolore facere. </p>
    </div>
    <div class="container">
        <div class="row">
            <h3 class="text-center">New Products</h3>
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
        echo'
        
           <div class="col-md-4 mt-2">
                <div class="card">
                                    <div class="card-body">
                                        <div class="card-img-actions">
                                                <img src="'.$img.'" class="card-img img-fluid" alt="">
                                        </div>
                                    </div>
                                    <div class="card-body bg-light text-center">
                                        <div class="mb-2">
                                            <h6 class="font-weight-semibold mb-2">
                                                <a href="/store/productPage.php?productId='.$id.'" data-abc="true">'.$name.'</a>
                                            </h6>
                                            <a href="/store/categoryPage.php?cat='.$category.'" class="text-muted" data-abc="true">'.strtoupper($category).'</a>
                                        </div>
                                        <h3 class="mb-0 font-weight-semibold">$'.$price.'</h3>
                                        <form action="partials/_addToCart.php" method="post">
                                            <input type="hidden" name="id" id="id" value='.$id.'>
                                            <input type="hidden" name="script" id="script" value='. $script.'>
                                            <input type="hidden" name="quan" id="quan" value=1>
                                            <button type="submit" class="bg-cart btn btn-success"><i class="fa fa-cart-plus mr-2"></i> Add to cart</button>
                                        </form>
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
                integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
                crossorigin="anonymous">
            </script>
            <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
            </script>
</body>

</html>