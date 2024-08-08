<?php
include("../db/db.php");

$search = $_POST['searchTerm'];

$fetchData = mysqli_query($con, "SELECT customer_code, sl_no, `name`, mobile_no FROM tbl_customer_details WHERE active='Yes' and (`sl_no` like '%" . $search . "%' OR `name` like '%" . $search . "%' OR mobile_no like '%" . $search . "%') limit 50");

$data = array();

while ($row = mysqli_fetch_array($fetchData)) {
    $text = $row['sl_no'] .". ". $row['name'] . " (Mobile No: " . $row['mobile_no'] . ")";
    $data[] = array(
        "id" => $row['customer_code'],
        "text" => $text,
    );
}
echo json_encode($data);
