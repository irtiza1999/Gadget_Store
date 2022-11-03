<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="icon" type="image/x-icon"
        href="https://w7.pngwing.com/pngs/93/456/png-transparent-gadget-devices-technology-smartphone-tablet-smart-phone-android-iphone-ipad-mobile-thumbnail.png">

</head>

<body>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,800" type="text/css">
    <link rel="stylesheet" href="productPage.css">

    <?php 
    include 'partials/_header.php'; 
    include 'partials/_dbconnect.php';
    $script   = $_SERVER['SCRIPT_NAME'];
    $params   = $_SERVER['QUERY_STRING'];

     if(isset($_GET["err"])){
        $err = $_GET["err"];
        if($err=="True"){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Invalid Quantity.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }else{
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Item added to cart.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    
    $id = $_GET['productId'];
    $sql = "SELECT * FROM `products` WHERE product_id = $id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['product_id'];
        $name = $row['product_name'];
        $category = strtoupper($row['product_category']);
        $desc = $row['product_description'];
        $price = $row['product_price'];
        $img = $row['product_image'];
        $stock = $row['product_stock'];
    }
    echo'
    <div class="container" id="productPage">
        <div class="product-container main-product-container">
            <div class="product-left-container">
                <img src="'.$img.'"
                    alt="'.$name.'" height="407" width="400" />
            </div>
            <div class="product-col-container">
                <small>
                    <p class="product-info-meta">'.$category.'</p>
                </small>
                <h1 class="product-page">'.$name.'</h1>
                <p>
                    <b>Quick overview</b><br />
                    '.$desc.'
                </p>
                <p class="product-price">
                    <b>Price:</b>
                    <span class="old-price">$499</span>
                    <span class="price">$'.$price.'</span>';
                    if($stock == 0){
                        echo '<span class="product-price-meta" style="float:right;">
                        Not in stock
                    </span>';}
                    else{
                        echo '<span class="product-price-meta" style="float:right;">
                        <strong>In Stock</strong>
                    </span>
                    </p>';
                    }
                if($stock != 0){
                echo'
                <p>
                <form action="partials/_addToCart.php" method="post">';
                    echo'
                    <input type="hidden" name="id" id="id" value='.$id.'>
                    <input type="hidden" name="script" id="script" value='. $script.'>
                    <input type="hidden" name="params" id="params" value='. $params.'>
                    <input class="quantity" style="padding: 10px; type="text" name="quan" id="quan" placeholder="Type quantity" value=1>
                    <button class="btn btn-success" style="margin-left: 10px;">Add to cart</button>
                    <br clear="both" />
                </from>
                </p>';
                    }
    else{
    echo'
    <p>
        <button class="btn btn-secondary" disabled>Add to cart</button>
        <br clear="both" />
    </p>';
    }

    echo '</div>
    </div>
    <br clear="all" />
    <div class="product-container">
        <div class="product-left-container">
            <h2 class="product-page text-dark">Reviews</h2>
            <p class="product-body">
                comments
            </p>
        </div>
    </div>
    <br clear="all" />
    </div>';
    ?>
    <?php include 'partials/_footer.php' ?>
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
</body>

</html>