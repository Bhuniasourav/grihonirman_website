<?php
function insertActivity($activity_details,$con,$session_user_code){
	$activity_code = "ACT_".uniqid().time();
	mysqli_query($con,"INSERT INTO user_activity (id, activity_code, user_code, activity_details) VALUES (null,'".$activity_code."','".$session_user_code."','".$activity_details."')");
	
}
?>