<?php
include("../db/db.php");

function calculateDueAmount($customer_code) {
    global $con;
    $query_out_amt = "SELECT 
                SUM(amount) as total_out_amt
                FROM tbl_transaction_details
                WHERE 
                transaction_type = 'Out' AND customer_code='" . $customer_code . "' ";

    $dataget_out_amt = mysqli_query($con, $query_out_amt);
    $data_out_amt = mysqli_fetch_assoc($dataget_out_amt);
    $out_amt = $data_out_amt['total_out_amt'];

    $query_in_amt = "SELECT 
                SUM(amount) as total_in_amt
                FROM tbl_transaction_details
                WHERE 
                transaction_type = 'In' AND customer_code='" . $customer_code . "' ";

    $dataget_in_amt = mysqli_query($con, $query_in_amt);
    $data_in_amt = mysqli_fetch_assoc($dataget_in_amt);
    $in_amt = $data_in_amt['total_in_amt'];

    $due_amount = $in_amt - $out_amt;
    if ($due_amount >= 0) {
        $amt_str = "<span style='color: green;'>" . number_format($due_amount, 2) . "</span>";
    } else {
        $amt_str = "<span style='color: red;'>" . number_format($due_amount, 2) . "</span>";
    }
    return $amt_str;
}
?>
