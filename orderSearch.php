<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gadget Store</title>
    <link rel="icon" type="image/x-icon"
        href="https://w7.pngwing.com/pngs/93/456/png-transparent-gadget-devices-technology-smartphone-tablet-smart-phone-android-iphone-ipad-mobile-thumbnail.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

    <?php include 'partials/_dbconnect.php';
    session_start();
    if(!isset($_SESSION['user_type'])||$_SESSION['user_type']!='admin'){
        header("location: /store/index.php");
    } 
    ?>
    <?php include 'partials/_header.php' ?>
    <div class="container my-4">
        <div class="container search my-3">
            <?php
                $noResult = true;
                $temp = $_GET['search'];
                $sql = "SELECT * FROM `orders` WHERE order_id LIKE '$temp' or order_user_id LIKE '$temp' or order_status LIKE '$temp' or payment_status LIKE '$temp' or payment_method LIKE '$temp' ORDER BY `orders`.`order_id` DESC";
                $result = mysqli_query($conn, $sql);
                $check = mysqli_num_rows($result);
                if($check>0 && strlen($temp)>0){
                    $noResult = false;
                }
                echo'<h1 class="my-3">Search results for <em> '.$temp.'</em></h1>
                    <form class="d-flex" role="search" action="/store/orderSearch.php" method="get">
                    <input class="form-control me-2" type="search" placeholder="Search for a Order"
                        aria-label="Search" name="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>';
                if(!$noResult){
                        echo'<div class="row">
                        <div class="col-sm-12 col-md-12 col-md-offset-1">
                        <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Order Id</th>
                                <th class="text-center">Total Bill</th>
                                <th class="text-center">Payment Method</th>
                                <th class="text-center">Payment Status</th>
                                <th class="text-center">Order Status</th>
                            </tr>
                        </thead>
                <tbody>';}
            if(strlen($temp)>0){
                while($row=mysqli_fetch_assoc($result)){
                    $orderId = $row['order_id'];
                    $paymentMethod = $row['payment_method'];
                    $amountPaid = $row['bill'];
                    $status = $row['order_status'];
                    $payStatus = $row['payment_status'];
                echo'
                   <tr>
                <td class="text-center">
                <a href="/store/orderPage.php?orderId='.$orderId.'"><span>#'.$orderId.'</span></a>
                </td>
                <td class="text-center"><strong>$'.$amountPaid.'</strong></td>
                <td class="text-center"><strong>'.$paymentMethod.'</strong></td>';
                if($payStatus == 'Not Paid'){
                    echo'
                    <td class="text-center">
                    <form action="/store/partials/_markAsPaid.php" method="post">
                    <input type="hidden" name="orderId" value="'.$orderId.'">
                    <button type="submit" class="btn btn-success">Mark as Paid</button>
                    </form>
                    </td>
                    <td class="text-center"><strong style="color: red;">'.$payStatus.'</strong></td>
                    ';
                }
                else{
                    echo'
                    <td class="text-center"><strong style="color: green;">'.$payStatus.'</strong></td>
                    ';
                if($status=="Not Delivered"){
                    echo'
                    <td class="text-center">
                    <form method="post" action="/store/partials/_handleOrderStatus.php">
                    <input type="hidden" name="orderId" value="'.$orderId.'">
                    <input type="hidden" name="status" value="'.$status.'">
                    <button type="submit" class="btn btn-warning">Mark as Delivered</button>
                    </form>
                    </td>';
                }else if($status=="on the way"){
                    echo'
                    <td class="text-center">
                    <form method="post" action="/store/partials/_handleOrderStatus.php">
                    <input type="hidden" name="orderId" value="'.$orderId.'">
                    <input type="hidden" name="status" value="'.$status.'">
                    <button type="submit" class="btn btn-success">Mark as Complete</button>
                    </form>
                    </td>';
                }
                else{
                    echo'
                    <td class="text-center"><strong style="color: green;">'.$status.'</strong></td>
                    ';
                }
                }
                
                echo
                '</tr>
        </a>
                ';}
            }
    
    echo' </div>
    </div>';
    if($noResult){
        echo '<div class="container jumbotron jumbotron-fluid">
        <div class="container">
          <p class="display-4">No results found</p>
          <p class="lead">Search for anything else.</p>
        </div>';
      }
    // include 'partials/_footer.php';
    ?>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
    </script>
</body>

</html>