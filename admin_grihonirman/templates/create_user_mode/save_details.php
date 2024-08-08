<?php
include("../db/db.php");
include("../db/activity.php");
$activity_details = "";

if($login=="No"){
	$status = "SessionDestroy";
	$status_text = "";
	$activity_details = "Your Session Was Destroy In Manage User Mode Details";
}
else{
	
	if($entry_permission=='Yes'){

		$sendData = json_decode($_POST['sendData'],true);

		$user_mode_code = mysqli_real_escape_string($con,$sendData['user_mode_code']);
		$user_mode = mysqli_real_escape_string($con,$sendData['user_mode']);
		$active = mysqli_real_escape_string($con,$sendData['active']);
		
		//==============================IF CODE BLANK THEN INSERT==================================
		if($user_mode_code==""){
			
			//========================= CHECK SAME DATA EXIST OR NOT =======================
			$dataget = mysqli_query($con,"select * from user_mode where user_mode='".$user_mode."' ");
			$data_num_row = mysqli_num_rows($dataget);
			
			if($data_num_row==0){
				$user_mode_code = "UMC_".uniqid().time();
				//========================= INSERT IN TABLE =======================
				mysqli_query($con,"insert into user_mode (
					id, 
					user_mode_code, 
					user_mode, 
					active,
					entry_user_code) values(null,
					'".$user_mode_code."',
					'".$user_mode."',
					'".$active."',
					'".$session_user_code."')");
				
				$status = "Save";
				$status_text = "Data Saved Successfully";
				$activity_details = "You Insert A Record In Manage User Mode Details";
			}
			else{
				$status = "Exist";
				$status_text = "Already Exist Same Data !!";
			}
		}
		//============================== IF CODE DOES NOT BLANK THEN UPDATE ==================================
		else{
			//========================= CHECK SAME DATA EXIST OR NOT =======================
			$dataget = mysqli_query($con,"select * from user_mode where user_mode_code<>'".$user_mode_code."' and user_mode='".$user_mode."' ");
			$data_num_row = mysqli_num_rows($dataget);
			
			if($data_num_row==0){				
				mysqli_query($con,"update user_mode 
						set user_mode='".$user_mode."', 
						active='".$active."',
						entry_user_code='".$session_user_code."', 
						update_timestamp='".$timestamp."' 
						where 
						company_code='".$company_code."' ");

				$status = "Save";
				$status_text = "Data Updated Successfully";
				$activity_details = "You Update A Record In Manage User Mode Details";
			}
			else{
				$status = "Exist";
				$status_text = "Already Exist Same Data !!";
			}
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