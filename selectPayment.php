<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="/store/uploads/logo.png">
    <title>Select Payment Method</title>
    <style>
    body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
    }

    h1 {
        color: #88B04B;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-weight: 900;
        font-size: 40px;
        margin-bottom: 10px;
    }

    p {
        color: #404F5E;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-size: 20px;
        margin: 0;
    }

    i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left: -15px;
    }

    button {
        margin-top: 15px;
    }

    .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
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
        <div class="container">
        <div class="card">
                <h5 class="card-header text-center">Select Your Payment Method</h5>
                <div class="card-body row">
                <div class="col-md-6">
                <a href="/store/checkout.php"><button class="btn btn-success">Cash On Delivery</button></a></div>';
                    session_start();
                    $tempBill = $_SESSION['totalBill']*100;
                    echo'
                    <div class="col-md-6">
                    <form autocomplete="off" action="/store/partials/_checkoutCharge.php" method="POST">
                    <input type="hidden" name="amount" value="'.$tempBill.'">
                    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="pk_test_51HubhJHonQARCwkeqhDsoRgvql1fz9wDOl3tY2LwQ67mYp06UBDvNAJ45pS3Zffa2rIJMt22ATNLieFUq8OzDDfS00IB1GOyfL"
                        data-amount="'.$tempBill.'" data-description="Payment for '.$_SESSION['user_name'].'"
                        data-currency="usd" data-locale="auto">
                    </script>
                </form>
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