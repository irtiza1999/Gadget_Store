<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon"
        href="https://w7.pngwing.com/pngs/93/456/png-transparent-gadget-devices-technology-smartphone-tablet-smart-phone-android-iphone-ipad-mobile-thumbnail.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <?php
    ob_start();
    session_start();
    if(isset($_SESSION['cart']) && count($_SESSION['cart']) == 0){
        header('Location:index.php');
        exit();
    }
    include 'partials/_dbconnect.php'; 
    include 'partials/_header.php';
    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']=='true'){
        $id = $_SESSION['user_id'];
        $sql= "SELECT * FROM `users` WHERE user_id = '$id'";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
            $name = $row['user_name'];
            $email = $row['user_email'];
            $phone = $row['user_phone_no'];
            $address = $row['user_address'];
        }
    
    echo'
    <main class="mt-5">
    
        <div class="container wow fadeIn">
            <h2 class="my-5 h2 text-center">Checkout form</h2>
            <div class="row">
                <div class="col-md-8 mb-4">
                    <div class="card">
                        <form class="card-body" action="/store/partials/_handleCheckout.php" method="post">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <div class="md-form ">
                                        <input type="text" class="form-control" placeholder="Username" aria-describedby="" name="userName" value="'.$name.'" required>
                                        <input type="hidden" name="userId" value="'.$id.'">
                                        <label for="firstName" class="">User name</label>
                                    </div>
                                </div>
                            </div>
                            <div class=" md-form mb-3">
                                <input type="text" id="email" class="form-control" placeholder="youremail@example.com"
                                    name="email" value="'.$email.'" required>
                            </div>
                            <div class="md-form mb-3">
                                <input type="text" id="address" class="form-control" placeholder="Enter Your Address"
                                    name="address" value="'.$address.'" required>
                            </div>
                            <div class="md-form mb-3">
                                <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter Your Phone Number" value="'.$phone.'" required>
                            </div>
                            <hr>
                            <h5>Payment method</h5>
                            <div class="d-block my-3">';
                            if(isset($_SESSION['stipePay']) && $_SESSION['stipePay'] == true){
                                echo'<input class="form" type="hidden" name="exampleRadios" id="exampleRadios1" value="stripe">';
                                echo '<div class="alert alert-success alert fade show" role="alert">
                                <strong>Success!</strong> Your payment is successfully done via Stripe.<br>
                                <strong>Transaction ID:</strong> '.$_GET['tId'].'
                              </div>';
                            }else{
                                echo'
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="cod" checked> 
                                <label class="form-check-label" for="exampleRadios1">
                                    Cash On Delivery
                                </label>
                                </div>';}
                                echo'
                            </div>
                            <hr class="mb-4">';
                                echo'<button class="btn btn-primary btn-lg btn-block" type="submit">Confirm Order</button>';                            
                            echo'</form>
                            </div>
                            </div>';
                            if(isset($_SESSION['cart'])){
                            $arr = $_SESSION["cart"];
                            $cCount = count($arr);
                            }

    echo'
    <div class="col-md-4 mb-4">
        <h4 class="d-flex justify-content-between align-items-center lh-condensed mb-3">
            <span class="text-muted">Your cart</span>
            <span class="rounded-circle text-muted">'.$cCount.'</span>
        </h4>
        <ul class="list-group mb-3 z-depth-1">';
            if(isset($_SESSION['cart'])){
            $arr = $_SESSION["cart"];
            $total = 0;
            $bill = 0;
            foreach($arr as $i => $j){
            $sql = "SELECT * FROM `products` WHERE `product_id` = $i";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
            $pid = $row['product_id'];
            $price = $row['product_price'];
            $name = $row['product_name'];
            $image = $row['product_image'];
            $stock = $row['product_stock'];
            $total = $row['product_price'] * $j;
            $bill += $total;
            echo'<li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                    <a href="/store/productPage.php?productId='.$pid.'">
                        <h6 class="my-0">'.$name.'</h6>
                    </a>
                    <strong><small class="text-muted">$'.$price.' * '.$j.'</small></strong>
                </div>
                <strong><span class="text-muted">$'.$total.'</span></strong>
            </li>';
            }
            }

            }
            $ship = ($bill*0.1);
            if($bill<500){ $bill +=$ship; } echo' <li class="list-group-item d-flex justify-content-between bg-light">
                <div class="">
                    <h6 class="my-0">Shipping Cost</h6>
                </div>';
                if($bill<500){ echo'<span class="text-muted">$'.$ship.'</span>';
                    }else{
                    echo'<span class="text-muted"
                        style="text-decoration: line-through;font-weight: 400;color:#888;">$'.$ship.'</span>
                    <span class="text-muted">$0</span>';
                    }
                    echo'</li>

                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span>';
                        $_SESSION['bill'] = $bill;
                        $tempBill = $bill * 100;
                        echo'<strong>$'.$bill.'</strong>
                    </li>
        </ul>';
    echo'</div>
    </div>
    </div>
    </main>';
    $_SESSION['uid']=$id;
    $_SESSION['bill']=$bill;}
    else{
    header('Location:login.php');
    }
    ?>
    <?php include 'partials/_footer.php'; ?>
    <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js">
    </script>
    <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
</body>

</html>