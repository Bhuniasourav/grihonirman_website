<?php
include("../db/db.php");
include("../db/activity.php");
$activity_details = "";

if($login=="No"){
	$status = "SessionDestroy";
	$status_text = "";
	$activity_details = "Your Session Was Destroy In Manage Profile Details";
}
else{
	
	if($entry_permission=='Yes'){

		$sendData = json_decode($_POST['sendData'],true);

		$user_id = mysqli_real_escape_string($con,$sendData['user_id']);
		$name = mysqli_real_escape_string($con,$sendData['name']);
		$email = mysqli_real_escape_string($con,$sendData['email']);

		$profile_img = mysqli_real_escape_string($con,$sendData['profile_img']);

		$profile_img_FileType = pathinfo($profile_img,PATHINFO_EXTENSION);
		if (!in_array($profile_img_FileType, $allowedImgExt)) {
			$profile_img = "";
		}

		//========================= CHECK SAME DATA EXIST OR NOT =======================
		$dataget = mysqli_query($con,"select * from user_master where user_code<>'".$session_user_code."' and user_id='".$user_id."' ");
		$data_num_row = mysqli_num_rows($dataget);

		if($data_num_row==0){				
			mysqli_query($con,"update user_master 
					set user_id='".$user_id."', 
					name='".$name."', 
					email='".$email."', 
					entry_user_code='".$session_user_code."', 
					update_timestamp='".$timestamp."' 
					where 
					user_code='".$session_user_code."' ");

			$dataget = mysqli_query($con,"select profile_img from user_master where user_code='".$session_user_code."' ");
			$data = mysqli_fetch_row($dataget);
			$previous_profile_img = $data[0];

			if ($profile_img!="") {
				mysqli_query($con,"update user_master set profile_img='".$profile_img."' where user_code='".$session_user_code."' ");
				if ($previous_profile_img!="") {
					unlink("../../../upload_content/upload_img/profile_img/".$previous_profile_img);
				}
			}

			$status = "Save";
			$status_text = "Data Updated Successfully";
			$activity_details = "You Update A Record In Manage Profile Details";
		}
		else{
			$status = "Exist";
			$status_text = "Already Exist Same User Id !!";
		}

	}
	else{
		$status = "NoPermission";
		$status_text = "You Don't Have Permission To Entry Any Data !!";
	}
}

$response[] = [
	'status' => $status,
	'status_text' => $status_text,
];
echo json_encode($response,true);

if ($activity_details!="") {
	insertActivity($activity_details,$con,$session_user_code);
}
?>