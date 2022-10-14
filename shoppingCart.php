<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


    <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->

</head>

<body>
    <?php
        include 'partials/_header.php';
    ?>
    <div class="container">
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $removeId = $_POST["removeId"];
                    $item = $_POST["removeItem"];
                    if (($key = array_search($removeId, $_SESSION["cart"])) !== false) {
                        unset($_SESSION["cart"][$removeId]);
                }}
                if(!empty($_SESSION["cart"])){
                echo '<h1 style= "padding-top: 50px; padding-bottom: 20px;">You Products</h1>
                        <div class="row">
                <div class="col-sm-12 col-md-10 col-md-offset-1">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>
                                </th>
                                <th>Quantity</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Total</th>
                                <th> </th>
                            </tr>
                        </thead>
                ';
                include 'partials/_dbconnect.php';
                $total = 0;
                $arr = $_SESSION["cart"];
                $keys = array_keys($arr);
                $bill = 0;
                foreach($arr as $i => $j){
                    $sql = "SELECT * FROM `products` WHERE `product_id` = $i";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        $price = $row['product_price'];
                        $name = $row['product_name'];
                        $image = $row['product_image'];
                        $stock = $row['product_stock'];
                        $total = $row['product_price'] * $j;
                        $bill += $total;
                    }
                
                echo'
                
                <tbody>
                <tr>
                
                <td class="col-sm-8 col-md-4">
                <div class="media">
                
                <a class="thumbnail pull-lef" href="#"> <img class="media-object"
                        src="'.$image.'"
                        style="width: 72px; height: 72px;"> </a>
                <div class="media-body">
                    <h4 class="media-heading"><a href="/store/productPage.php?productId='.$i.'">'.$name.'</a></h4>
                    <span style="padding-top: 5px;">Status: </span><span
                        class="text-success"><strong>In
                            Stock</strong></span>
                </div>
            </div>
        </td>
        <td class="col-sm-1 col-md-1" style="text-align: center">
            <input type="email" class="form-control" id="exampleInputEmail1" value="'.$j.'">
        </td>
        <td class="col-sm-1 col-md-1 text-center"><strong>$'.$price.'</strong></td>
        <td class="col-sm-1 col-md-1 text-center"><strong>$'.$total.'</strong></td>
        <td class="col-sm-1 col-md-1">';
        echo'
            <form action='.$_SERVER['PHP_SELF'].' method="post">
            <button name= "removeItem" type="button" class="btn btn-danger">
            <input type="hidden" name="removeId" value="'.$i.'">
                <span class="glyphicon glyphicon-remove"></span> Remove</button>
            </form>
        </td>
    </tr>';
    }
    echo'<tr>
        <td>   </td>
        <td>   </td>
        <td>   </td>
        <td>
            <h5>Subtotal</h5>
        </td>
        <td class="text-right">
            <h5><strong>$'.$bill.'</strong></h5>
        </td>
    </tr>
    <tr>
        <td>   </td>
        <td>   </td>
        <td>   </td>
        <td>
            <h5>Estimated shipping</h5>
        </td>
        <td class="text-right">
            <h5><strong>$6.94</strong></h5>
        </td>
    </tr>
    <tr>
        <td>   </td>
        <td>   </td>
        <td>   </td>
        <td>
            <h3>Total</h3>
        </td>
        <td class="text-right">
            <h3><strong>$'.$bill.'</strong></h3>
        </td>
    </tr>
    <tr>
        <td>   </td>
        <td>   </td>
        <td>   </td>
        <td>
            <a href="/store/index.php">
            <button type="button" class="btn btn-primary">
                Continue Shopping
            </button>
            </a>
        </td>
        <td>
        <a href="/store/checkout.php">
            <button type="button" class="btn btn-success">
                Checkout <span class="glyphicon glyphicon-play"></span>
            </button>
        </a>
        </td>
    </tr>';}
    else{
        echo '<h1 style="text-align: center; padding-top: 50px; padding-bottom: 20px;">Your Cart is Empty</h1>';
    }
    ?>
        </tbody>
        </table>
    </div>
    </div>
    </div>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>