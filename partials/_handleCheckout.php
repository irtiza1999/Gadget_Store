<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</head>

<body>
    <?php
    session_start();
    include '_dbconnect.php';
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST["exampleRadios"])){
            $payment = $_POST["exampleRadios"];
        if($payment=='cod'){
            $paymentMethod = "cod";
        }else if($payment=='stripe'){
            $paymentMethod = "stripe";
        }}
        
        $userId = $_POST["userId"];
        $arr = $_SESSION["cart"];
        $insert_data = implode(",", $arr);
        $insert_data = json_encode($arr);
        $bill= ceil($_SESSION['bill']);
        $sql = "";
        $paid = ceil($_COOKIE['paidBill']/1000);
        if($paymentMethod == 'stripe'){
            $sql = "INSERT INTO `orders` (`order_user_id`, `cart`,`bill`,`payment_status`, `payment_method`) VALUES ('$userId', '$insert_data','$bill', 'Paid','$paymentMethod')";
        }else{
            $sql = "INSERT INTO `orders` (`order_user_id`, `cart`,`bill`, `payment_method`) VALUES ('$userId', '$insert_data','$bill', '$paymentMethod')";
        }
        $result = mysqli_query($conn,$sql);
        if($result){
            unset($_SESSION['cart']);
            unset($_SESSION['stipePay']);
            unset($_COOKIE['paidBill']);
            header("Location: /store/index.php?orderPlaced=true");
        }
        else{
            header("Location: /store/index.php?orderPlaced=false");
        }

    }
?>
    <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js">
    </script>
    <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
</body>

</html>