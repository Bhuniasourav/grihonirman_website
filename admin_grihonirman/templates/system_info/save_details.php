<?php
include("../db/db.php");
include("../db/activity.php");
$activity_details = "";

if($login=="No"){
	$status = "SessionDestroy";
	$status_text = "";
	$activity_details = "Your Session Was Destroy In Manage System Info";
}
else{
	
	if($entry_permission=='Yes'){

		$sendData = json_decode($_POST['sendData'],true);

		$system_name = mysqli_real_escape_string($con,$sendData['system_name']);
		$email = mysqli_real_escape_string($con,$sendData['email']);
		$address = mysqli_real_escape_string($con,$sendData['address']);
		$ph_num = mysqli_real_escape_string($con,$sendData['ph_num']);

		$logo = mysqli_real_escape_string($con,$sendData['logo']);
		$favicon = mysqli_real_escape_string($con,$sendData['favicon']);

		$logo_FileType = pathinfo($logo,PATHINFO_EXTENSION);
		if (!in_array($logo_FileType, $allowedImgExt)) {
			$logo = "";
		}
		
		$favicon_FileType = pathinfo($favicon,PATHINFO_EXTENSION);
		if (!in_array($favicon_FileType, $allowedImgExt)) {
			$favicon = "";
		}

		$dataget = mysqli_query($con,"select * from system_info ");
		$data = mysqli_fetch_row($dataget);

		if (!$data) {
			//========================= INSERT IN  TABLE =======================
			mysqli_query($con,"insert into system_info (
				id, 
				system_name, 
				logo, 
				favicon, 
				email, 
				address, 
				ph_num, 
				entry_user_code) values(null,
				'".$system_name."',
				'".$logo."',
				'".$favicon."',
				'".$email."',
				'".$address."',
				'".$ph_num."',
				'".$session_user_code."')");
	
			$status = "Save";
			$status_text = "Data Saved Successfully";
			$activity_details = "You Insert A Record In Manage System Info";
		}
		else {
			mysqli_query($con,"update system_info 
						set system_name='".$system_name."', 
						email='".$email."', 
						address='".$address."', 
						ph_num='".$ph_num."', 
						entry_user_code='".$session_user_code."', 
						update_timestamp='".$timestamp."' 
						where 1 ");

			$dataget = mysqli_query($con,"select logo, favicon from system_info where 1 ");
			$data = mysqli_fetch_row($dataget);
			$previous_logo = $data[0];
			$previous_favicon = $data[1];
			
			if ($logo!="") {
				mysqli_query($con,"update system_info set logo='".$logo."' where 1 ");
				if ($previous_logo!="") {
					unlink("../../../upload_content/upload_img/system_img/".$previous_logo);
				}
			}
			if ($favicon!="") {
				mysqli_query($con,"update system_info set favicon='".$favicon."' where 1 ");
				if ($previous_favicon!="") {
					unlink("../../../upload_content/upload_img/system_img/".$previous_favicon);
				}
			}
			
			$status = "Save";
			$status_text = "Data Updated Successfully";
			$activity_details = "You Update A Record In Manage System Info";
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