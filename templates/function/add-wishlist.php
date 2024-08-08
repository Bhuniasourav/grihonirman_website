<?php
include("../db/db.php");

$sendData = json_decode($_POST['sendData'], true);

$product_code = mysqli_real_escape_string($con, $sendData['product_code']);


if ($login == "Yes") {

    $whishlist_code = "WC_" . uniqid() . time();
    //========================= INSERT IN TABLE =======================
    mysqli_query($con, "INSERT INTO customer_wishlist (
		whishlist_code,
		customer_code, 
		product_code,
		entry_user_code
		) values('" . $whishlist_code . "',
		'" . $session_user_code . "',
		'" . $product_code . "',
		'" . $session_user_code . "')");
}
