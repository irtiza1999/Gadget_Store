<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon"
        href="https://w7.pngwing.com/pngs/93/456/png-transparent-gadget-devices-technology-smartphone-tablet-smart-phone-android-iphone-ipad-mobile-thumbnail.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</head>

<body>
    <?php include 'partials/_header.php';
    include 'partials/_dbconnect.php'
    ?>
    <div class="container" id="head">
    </div>
    <div class="container">
        <div class="row">
            <?php
            $getCat = $_GET["cat"];
            $sql = "SELECT * FROM `products` WHERE product_category = '$getCat'";
            $result = mysqli_query($conn, $sql);
            echo'<h3 class="text-center" style="margin-top: 30px;">'.strtoupper($getCat).'</h3>';
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['product_id'];
                $name = $row['product_name'];
                $desc = $row['product_description'];
                $price = $row['product_price'];
                $img = $row['product_image'];
            echo'
            <div class="col-md-4">
                <div class="card" style="height:570px ;width: 18rem; margin-top: 30px;">
                    <img src="/store/uploads/'.$img.'" class="card-img-top" alt="'.$name.'" height="300" width="300">
                    <div class="card-body">
                        <h5 class="card-title"><a href="/store/productPage.php?productId='.$id.'">'.$name.'</a></h5>
                        <p class="card-text">'.substr($desc,0,200).' ...</p>
                        <a href="/store/productPage.php?productId='.$id.'" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>';}
            ?>
        </div>
    </div>
    <?php include 'partials/_footer.php' ?>
    <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
</body>

</html>