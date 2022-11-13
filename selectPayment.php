<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="selectPayment.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
    <style>
    body {
        background-color: lightblue;
    }
    </style>
</head>

<body>
    <?php
    if(!isset($_SESSION)) 
    { 
        error_reporting(E_ALL ^ E_NOTICE);
        session_start();
    } 
    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true){
        echo'
        <div class="container" style=" margin: auto;margin-top: 300px;
        width: 50%;
        padding: 10px;">
        <div class="card">
  <h5 class="card-header text-center">Select Your Payment Method</h5>
                <div class="card-body d-flex justify-content-center">
                <div class="col-md-3">
                </div>
                <div class="col-md-3">
                <a href="/store/checkout.php"><button class="btn btn-primary">Cash On Delivery</button></a></div>';
                    
                    session_start();
                    $tempBill = $_SESSION['totalBill']*100;
                    echo'
                    <div class="col-md-3">
                    <form autocomplete="off" action="/store/partials/_checkoutCharge.php" method="POST">
                    <input type="hidden" name="amount" value="'.$tempBill.'">
                    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="pk_test_51HubhJHonQARCwkeqhDsoRgvql1fz9wDOl3tY2LwQ67mYp06UBDvNAJ45pS3Zffa2rIJMt22ATNLieFUq8OzDDfS00IB1GOyfL"
                        data-amount="'.$tempBill.'" data-description="Payment for '.$_SESSION['user_name'].'"
                        data-currency="usd" data-locale="auto">
                    </script>
                </form>
                </div>
                <div class="col-md-3">
                </div>
                </div>';}
                        else{
                            header("Location: /store/login.php"); 
                        }
    ?>
    </div>
    </div>

    </div>
    </div>
    </div>


</body>

</html>