<?php
session_start();
unset($_SESSION['cart']);
header("Location: /store/shoppingCart.php?clear=True");
?>