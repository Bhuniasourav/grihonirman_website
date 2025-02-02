<?php
include("../db/db.php");

if($view_permission=="Yes"){
		
	## Read value
	$draw = $_POST['draw'];
	$row = $_POST['start'];
	$rowperpage = $_POST['length']; // Rows display per page
	$columnIndex = $_POST['order'][0]['column']; // Column index
	$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
	$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
	$searchValue = mysqli_real_escape_string($con,$_POST['search']['value']); // Search value

	## Search 
	$searchQuery = " ";
	if($searchValue != ''){
		$searchQuery = " and (sub_menu_master.sub_menu_name like '%".$searchValue."%' or 
		sub_menu_master.file_name like '%".$searchValue."%' or 
		sub_menu_master.folder_name like'%".$searchValue."%' or
		menu_master.menu_name like'%".$searchValue."%' ) ";
	}

	$query = "select 
				menu_master.menu_name,
				menu_master.menu_icon AS master_menu_icon, 
				sub_menu_master.sub_menu_code, 
				sub_menu_master.sub_menu_name, 
				sub_menu_master.menu_icon, 
				sub_menu_master.file_name, 
				sub_menu_master.folder_name, 
				sub_menu_master.order_num, 
				sub_menu_master.active
				from sub_menu_master
				LEFT JOIN menu_master ON menu_master.menu_code = sub_menu_master.menu_code ";

	## Total number of records without filtering
	$sel = mysqli_query($con,$query);
	$records = mysqli_num_rows($sel);
	$totalRecords = $records;

	## Total number of records with filtering
	$sel = mysqli_query($con,$query." WHERE 1 ".$searchQuery);
	$records = mysqli_num_rows($sel);
	$totalRecordwithFilter =$records;

	## Fetch records
	switch ($columnName) {
		case "menu_name":
			$orderBy = "order by menu_master.".$columnName;
			break;
		default:
			$orderBy = "order by sub_menu_master.".$columnName;
	}
	
	$empQuery = $query." WHERE 1 ".$searchQuery." ".$orderBy." ".$columnSortOrder." limit ".$row.",".$rowperpage;
	$empRecords = mysqli_query($con, $empQuery);
	$data = array();
	$i=1;
	while ($row = mysqli_fetch_assoc($empRecords)) {
		
		if($row['active']=="Yes"){
			$active = '<span class="label font-weight-bold label-lg  label-light-success label-inline">Yes</span>';
		}
		else{
			$active =  '<span class="label font-weight-bold label-lg  label-light-danger label-inline">No</span>';
		}
		
		if($edit_permission=="Yes"){
			$edit = 'onclick="update_data('.$i.')"';
		}
		else{
			$edit = '';
		}
		
		if($delete_permissioin=="Yes"){
			$delete = 'onclick="show_del_data_confirm_box('.$i.')"';
		}
		else{
			$delete = '';
		}
		$action =
			'<div class="dropdown dropdown-inline">
				<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown"> <i class="la la-cog"></i> </a>
				<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
					<ul class="nav nav-hoverable flex-column">
						<li class="nav-item">
							<a '.$edit.' class="nav-link" ><i class="text-success nav-icon fas fa-pen"></i><span class="nav-text">Edit Details</span></a>
						</li>
						<li class="nav-item">
							<a '.$delete.' class="nav-link" ><i class="text-danger nav-icon fas fa-trash"></i><span class="nav-text">Delete Details</span></a>
						</li>
					</ul>
				</div>
			</div>';
		
		$data[] = array(
				"sub_menu_name"=>'<input type="hidden" class="sub_menu_code_'.$i.'" value="'.$row['sub_menu_code'].'" /><i class="'.$row['menu_icon'].' mr-2"></i>'.$row['sub_menu_name'],
				"menu_name"=>'<i class="'.$row['master_menu_icon'].' mr-2"></i>'.$row['menu_name'],
				"file_name"=>$row['file_name'],
				"folder_name"=>$row['folder_name'],
				"order_num"=>$row['order_num'],
				"active"=>$active,
				"action"=>$action,
			);
		$i++;
	}

	## Response
	$response = array(
		"draw" => intval($draw),
		"iTotalRecords" => $totalRecords,
		"iTotalDisplayRecords" => $totalRecordwithFilter,
		"aaData" => $data
	);
	echo json_encode($response);
}
?>