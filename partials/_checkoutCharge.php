<?php
    include("config.php");

    $token = $_POST["stripeToken"];
    // $contact_name = $_POST["c_name"];
    // $token_card_type = $_POST["stripeTokenType"];
    // $phone           = $_POST["phone"];
    // $email           = $_POST["stripeEmail"];
    // $address         = $_POST["address"];
    $amount          = $_POST["amount"]; 
    // $desc            = $_POST["product_name"];
    $charge = \Stripe\Charge::create([
      "amount" => str_replace(",","",$amount) * 100,
      "currency" => 'usd',
      // "description"=>$desc,
      "source"=> $token,
    ]);

    if($charge){
      session_start();
      $_SESSION['stipePay'] = true;
      header("Location:/store/success.php?payment=success");
    }else{
      header("Location:/store/checkout.php?payment=failed");
    }
?>