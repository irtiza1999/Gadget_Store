<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


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
    ?><div class="container" id="head">
        <h1>Welcome to our store</h1>
    </div>
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
            <h3 class="text-center">New Products</h3><?php ini_set('display_errors', '1');
    $sql="SELECT * FROM `products`";
    $result=mysqli_query($conn, $sql);

    while ($row=mysqli_fetch_assoc($result)) {
        $id=$row['product_id'];
        $name=$row['product_name'];
        $desc=$row['product_description'];
        $price=$row['product_price'];
        $img=$row['product_image'];
        echo'
<div class="col-md-4"><div class="card"style="height:570px ;width: 18rem;"><img src="'.$img.'"class="card-img-top"alt="'.$name.'"height="300"width="300"><div class="card-body"><h5 class="card-title"><a href="/store/productPage.php?productId='.$id.'">'.$name.'</a></h5><p class="card-text">'.substr($desc,0,200).'...</p><a href="/store/productPage.php?productId='.$id.'"class="btn btn-primary">View Details</a></div></div></div>';}
?>
        </div>
    </div><?php include 'partials/_footer.php'?>
    <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js">
    </script>
    <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>