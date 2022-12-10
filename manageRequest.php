<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon"
        href="https://w7.pngwing.com/pngs/93/456/png-transparent-gadget-devices-technology-smartphone-tablet-smart-phone-android-iphone-ipad-mobile-thumbnail.png">
    <link rel="stylesheet" type="text/css" href="/store/partials/_header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <title>Manage Request</title>
</head>

<body>
    <?php

    function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

    session_start();
    include 'partials/_dbconnect.php';
    include 'partials/_header.php';
    if($_SESSION['user_type']=='admin'){
        echo'
        <div class="container my-4">';
        $sql = "SELECT * FROM `request` ORDER BY `request`.`request_time` DESC";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num>0){
            echo'<h4 style="padding: 10px">All Requests</h4>';
        while($row = mysqli_fetch_assoc($result)){
            $name = $row['request_product_name'];
            $cat = $row['request_catagory'];
            $user_id = $row['request_user_id'];
            $req_time = $row['request_time'];
            $pid = $row['request_product_id'];
            if($pid == NULL){
                echo'<div class="card"  style="margin: 10px">
                <div class="card-header d-flex justify-content-between">
                    <p><strong>Category Name:</strong> '.$cat.' </p>
                    <p style="font-style: italic">'.time_elapsed_string($req_time).'<p>
                </div>
                <div class="card-body">
                    <div>
                    <h5 class="card-title">'.$name.'</h5>
                    <p class="card-text">Not in our store</p>
                    </div>
                    ';
                    $sql2 = "SELECT user_name FROM `users` WHERE `user_id`='$user_id'";
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    $user_name = $row2['user_name'];
                    echo'<p class="card-text"><strong>Requested By:</strong> '.strtoupper($user_name).'</p>';
                echo'</div>
            </div>';
            }else{
                $sql3 = "SELECT product_stock, product_name FROM `products` WHERE `product_id` = '$pid'";
                $result3 = mysqli_query($conn, $sql3);
                $row3 = mysqli_fetch_assoc($result3);
                $stock = $row3['product_stock'];
                $pName = $row3['product_name'];
                if($stock == 0){
                echo'<div class="card"  style="margin: 10px">
                <div class="card-header d-flex justify-content-between">
                    <p><strong>Category Name:</strong> '.$cat.' </p>
                    <p style="font-style: italic">'.time_elapsed_string($req_time).'<p>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><a href="/store/productPage.php?productId='.$pid.'">'.$pName.'</a></h5>';
                    $sql2 = "SELECT user_name FROM `users` WHERE `user_id`='$user_id'";
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    $user_name = $row2['user_name'];
                    echo'<p class="card-text"><strong>Requested By:</strong> '.strtoupper($user_name).'</p>';
                echo'</div>
            </div>';
            }}
            
        }
            
        echo'
        </div>
        ';
    }else{
        echo'<div class="container my-4">
        <h4 style="padding: 10px">No Requests</h4>
        </div>';
    }}
    else{
        header("location: index.php");
    }
    ?>
</body>

</html>