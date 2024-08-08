<?php
include("../../templates/db/db.php");

$sendData = json_decode($_POST['sendData'], true);

$name = mysqli_real_escape_string($con, $sendData['name']);
$isd_code = mysqli_real_escape_string($con, $sendData['isd_code']);
$phone = mysqli_real_escape_string($con, $sendData['phone']);
$email = mysqli_real_escape_string($con, $sendData['email']);
$category = mysqli_real_escape_string($con, $sendData['category']);
$message = mysqli_real_escape_string($con, $sendData['message']);

$execute = 1;


if ($execute==1) {
	$quick_contact_code = "QCC_" . uniqid() . time();
	//========================= INSERT IN TABLE =======================
	mysqli_query($con, "INSERT INTO tbl_quick_contact (
			`quick_contact_code`,
			`name`, 
			`isd_code`, 
			`phone`, 
			`email`, 
			`category`, 
			`message`, 
			entry_user_code
			) values(
			'" . $quick_contact_code . "',
			'" . $name . "',
			'" . $isd_code . "',
			'" . $phone . "',
			'" . $email . "',
			'" . $category . "',
			'" . $message . "',
			'user')");

	$status = "save";
	$status_text = "We will get back to you soon. Thank you!";
}
else{
	$status = "error";
	$status_text = "Something went wrong! Please try after some times.";
}

$response = [
	'status' => $status,
	'status_text' => $status_text,
];
echo json_encode($response, true);
