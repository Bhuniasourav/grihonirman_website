<?php
include("../db/db.php");
include("../db/activity.php");
mysqli_query($con, "SET FOREIGN_KEY_CHECKS = 0");
$activity_details = "";

$sendData = json_decode($_POST['sendData'], true);
$quick_contact_code = mysqli_real_escape_string($con, $sendData['quick_contact_code']);


mysqli_query($con, "DELETE FROM tbl_quick_contact WHERE quick_contact_code='" . $quick_contact_code . "' ");

$activity_details = "You Delete A Record In tbl_quick_contact and do delete ".$session_user_code;
if ($activity_details != "") {
	insertActivity($activity_details, $con, $session_user_code);
}
