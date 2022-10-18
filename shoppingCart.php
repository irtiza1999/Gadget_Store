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
        if(isset($_GET["err"])){
        $err = $_GET["err"];
        if($err=="True"){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Invalid Quantity.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }else{
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Item quantity updated successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }

    if(isset($_GET["remove"])){
        $err = $_GET["remove"];
        if($err=="True"){
            echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Item Removed</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }else{
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Error!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        if(isset($_GET["clear"])){
        $err = $_GET["clear"];
        if($err==="True"){
            echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Successfully cleared the cart.</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }}
    ?>
    <div class="container">
        <?php
                if(!empty($_SESSION["cart"])){
                echo '<h1 style= "padding-top: 50px; padding-bottom: 20px;">You Products</h1>
                <div class="d-flex flex-row-reverse mb-3">
                <form action="/store/partials/_clearCart.php" method="post">
                <button class="btn btn-danger" style="margin-right: 65px;" type="submit">Clear Cart</button>
                </form>
                </div>
                
                <div class="row">
                <div class="col-sm-12 col-md-12 col-md-offset-1">
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
                $ship = ($bill*0.1);
                
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
        <form action="/store/partials/_changeQuantity.php" method="post">
                        <input type="number" class="form-control" id="quan" name="quan" value="'.$j.'">
                        <input type="hidden" name="id" value="'.$i.'">
                        <button type="submit" class="btn btn-primary" style="align-items: center; height: 55px; font-size: 14px; margin-top: 10px; text-align: center">Update Quantity</button>
                      
        </form>
            </td>
        <td class="col-sm-1 col-md-1 text-center"><strong>$'.$price.'</strong></td>
        <td class="col-sm-1 col-md-1 text-center"><strong>$'.$total.'</strong></td>
        <td class="col-sm-1 col-md-1">';
        echo'
            <form action="/store/partials/_removeFromCart.php" method="post">
            <button name= "removeItem" type="submit" class="btn btn-danger">
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
            <h5">Shipping Cost</h5>
        </td>';
        
        if($bill < 500){                        
            echo'<td class="text-right">
            <h5><strong>$'.$ship.'</strong></h5>';
            $bill += $ship;
        }
        else{
            echo'<td class="text-right">
            <span class="old-price" style="text-decoration: line-through;font-weight: 400;color:#888;display:inline-block;margin: 0 5px 0;">$'.$ship.'</span>
            <h5><strong>$0.00</strong></h5>';
        }
        echo'</td>
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
        echo '<h1 style="text-align: center; padding-top: 50px; padding-bottom: 20px;">Your Cart is Empty</h1>
            <a href="/store/index.php">
            <button type="button" class="btn btn-primary">
                Continue Shopping
            </button>
            </a>
        ';
    }
    ?>
        </tbody>
        </table>
    </div>
    </div>
    </div>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

</body>

</html>