<?php
    require_once "../stripe-php-master/init.php";

    $stripeDetails = array(
        "secretKey" => "SECRETKEY",
        "publishableKey" => "PublishableKey"
    );
    \Stripe\Stripe::setApiKey($stripeDetails["secretKey"]);
?>
