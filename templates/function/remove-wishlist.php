<?php
include("../db/db.php");

$sendData = json_decode($_POST['sendData'], true);

$product_code = mysqli_real_escape_string($con, $sendData['product_code']);
$customer_code = $session_user_code;

mysqli_query($con, "delete from customer_wishlist where product_code='" . $product_code . "' and customer_code='" . $customer_code . "' ");
