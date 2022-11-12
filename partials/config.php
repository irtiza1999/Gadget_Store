<?php
    require_once "../stripe-php-master/init.php";

    $stripeDetails = array(
        "secretKey" => "sk_test_51HubhJHonQARCwke5cz63EUvujll52lLSguvPnc7YHumC1qj32c58WRfOtpROnIGvkxatoclqdzKwu3K08C3ZeXi00xg0Pntiw",
        "publishableKey" => "pk_test_51HubhJHonQARCwkeqhDsoRgvql1fz9wDOl3tY2LwQ67mYp06UBDvNAJ45pS3Zffa2rIJMt22ATNLieFUq8OzDDfS00IB1GOyfL"
    );
    \Stripe\Stripe::setApiKey($stripeDetails["secretKey"]);
?>