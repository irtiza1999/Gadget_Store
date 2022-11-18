<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="orderPage.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon"
        href="https://w7.pngwing.com/pngs/93/456/png-transparent-gadget-devices-technology-smartphone-tablet-smart-phone-android-iphone-ipad-mobile-thumbnail.png">
    <title>Document</title>
</head>

<body>
    <?php 
    include 'partials/_header.php';
    include 'partials/_dbconnect.php';
    $orderId = $_GET['orderId'];
    $sql = "SELECT * FROM `orders` WHERE `order_id` = $orderId";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $order_user_id = $row['order_user_id'];
        $order_cart = $row['cart'];
        $bill = $row['bill'];
        $order_status = $row['order_status'];
        $order_payment_status = $row['payment_status'];
        $order_payment_method = $row['payment_method'];
        $order_time = $row['order_time'];
    }
    $sql2="SELECT * FROM `users` WHERE `user_id` = $order_user_id";
    $result2 = mysqli_query($conn, $sql2);
    while($row = mysqli_fetch_assoc($result2)){
        $order_user_name = $row['user_name'];
        $order_user_email = $row['user_email'];
        $order_user_phone = $row['user_phone_no'];
        $order_user_address = $row['user_address'];
    }
    
    echo'
    <div class="container">
        <article class="card">
            <header class="card-header"><strong> Thanks for the order '.$order_user_name.' </strong></header>
            <div class="card-body">
                <h6>Order ID: '.$orderId.'</h6>
                <article class="card">
                    <div class="card-body row">
                        <div class="col"> <strong>Address:</strong> <br>'.$order_user_address.' </div>
                        <div class="col"> <i class="fa fa-phone"></i> <strong>Phone No:</strong> 
                            '.$order_user_phone.' </div>
                        <div class="col"> <strong>Payment Method:</strong> <br> '.strtoupper($order_payment_method).' </div>
                        <div class="col"> <strong>Payment Status:</strong> <br> '.strtoupper($order_payment_status).' </div>
                        <div class="col"> <strong>Status:</strong> <br> '.strtoupper($order_status).' </div>
                        <div class="col"> <strong>Delivery Man: </strong>name <br> <i class="fa fa-phone"></i> <strong>Phone No:</strong> 
                            Phone No delivery </div>
                    </div>
                </article>
                <div class="track">';
                if($order_payment_status == 'Not Paid'){
                     echo'
                            <div class="step"> <span class="icon"> <i class="fa fa-times"></i> </span> <span class="text">
                            Not Paid</span> </div>';
                }else{
                    if($order_status=="Not Delivered"){
                        echo'<div class="step active"> <span class="icon"> <i class="fa fa-money"></i> </span> <span class="text">
                                Paid</span> </div>
                            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span
                            class="text">Order confirmed</span> </div>
                            <div class="step"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">
                            Picked by the Delivery man</span> </div>
                            <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span
                            class="text">Delivered</span> </div>';
                    }
                    else if($order_status == "on the way"){
                        echo'
                            <div class="step active"> <span class="icon"> <i class="fa fa-money"></i> </span> <span class="text">
                                Paid</span> </div>
                            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span
                            class="text">Order confirmed</span> </div>
                            <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">
                            Picked by the Delivery man</span> </div>
                            <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span
                            class="text">Delivered</span> </div>
                        ';
                    
                    }elseif($order_status == "Complete"){
                    echo'
                    <div class="step active"> <span class="icon"> <i class="fa fa-money"></i> </span> <span class="text">
                    Paid</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span
                            class="text">Order confirmed</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">
                            Picked by the Delivery man</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-box"></i> </span> <span
                            class="text">Delivered</span> </div>';}
                    else{
                        echo'
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span
                            class="text">Order confirmed</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">
                            Picked by the Delivery man</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span
                            class="text">Delivered</span> </div>';
                    }}
                echo'
                </div>
                <hr>
                <ul class="row">';
                $cart = json_decode($order_cart, true);
                $sum = 0;
                foreach($cart as $key => $item){
                    $sql3 = "SELECT * FROM `products` WHERE `product_id` = $key";
                    $quan = $item[0];
                    $result3 = mysqli_query($conn, $sql3);
                    while($row = mysqli_fetch_assoc($result3)){
                        $product_name = $row['product_name'];
                        $product_price = $row['product_price'];
                        $product_image = $row['product_image'];
                        $sum += ($product_price * $quan)              
                        ;}
                    
                echo'
                    <li class="col-md-4">
                        <figure class="itemside mb-3">
                            <div class="aside"><img src="/store/uploads/'.$product_image.'" class="img-sm border"></div>
                            <figcaption class="info align-self-center">
                                <p class="title">'.$product_name.'</p> <span
                                    class="text-muted">$'.$product_price.' X '.$quan.' = $'.$product_price * $quan.' </span>
                            </figcaption>
                        </figure>
                    </li>
                    ';
                    
                }
                
                echo'
                </ul>
                <hr>
                <div> <strong>Order summary</strong> </div>
                <dl class="dlist-align">
                    <dt>Total price = $'.$sum.'</dt>
                    <span class="text-muted text-right">Shipping Cost = $'.$bill - $sum.' </span>
                    <h4 class="text-right"><strong>Total Bill : $'.$bill.' </strong></h4>
                </div>
            </div>
        </article>
    </div>';
    ?>
    <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js">
    </script>
    <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>