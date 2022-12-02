<?php
    include("config.php");

    $token = $_POST["stripeToken"];
    $amount = $_POST["amount"]; 
    $charge = \Stripe\Charge::create([
      "amount" => str_replace(",","",$amount) * 100,
      "currency" => 'usd',
      "source"=> $token,
    ]);

    if($charge){
      session_start();
      $_SESSION['stipePay'] = true;
      setcookie('paidBill', $amount *100, time() + (86400 * 30), "/");
      header("Location:/store/success.php?payment=success&tId='.$charge->id.'");
    }else{
      header("Location:/store/checkout.php?payment=failed");
    }
?>