<?php
include("../db/db.php");

if ($view_permission == "Yes") {

	## Read value
	$draw = $_POST['draw'];
	$row = $_POST['start'];
	$rowperpage = $_POST['length']; // Rows display per page
	$columnIndex = $_POST['order'][0]['column']; // Column index
	$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
	$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
	$searchValue = mysqli_real_escape_string($con, $_POST['search']['value']); // Search value

	## Search 
	$searchQuery = " ";
	if ($searchValue != '') {
		$searchQuery = " and (tbl_quick_contact.name like '%" . $searchValue . "%' or 
			tbl_quick_contact.isd_code like '%" . $searchValue . "%' or 
			tbl_quick_contact.phone like '%" . $searchValue . "%' or 
			tbl_quick_contact.email like '%" . $searchValue . "%' or 
			tbl_quick_contact.category like'%" . $searchValue . "%' ) ";
	}

	$query = "SELECT 
		tbl_quick_contact.quick_contact_code,
		tbl_quick_contact.name,
		tbl_quick_contact.isd_code,
		tbl_quick_contact.phone,
		tbl_quick_contact.email,
		tbl_quick_contact.category,
		tbl_quick_contact.message,
		tbl_quick_contact.entry_timestamp
		FROM tbl_quick_contact";

	## Total number of records without filtering
	$sel = mysqli_query($con, $query);
	$records = mysqli_num_rows($sel);
	$totalRecords = $records;

	## Total number of records with filtering
	$sel = mysqli_query($con, $query . " WHERE 1 " . $searchQuery);
	$records = mysqli_num_rows($sel);
	$totalRecordwithFilter = $records;

	## Fetch records
	$empQuery = $query . " WHERE 1 " . $searchQuery . " order by " . $columnName . " " . $columnSortOrder . " limit " . $row . "," . $rowperpage;
	$empRecords = mysqli_query($con, $empQuery);
	$data = array();
	$i = 1;
	while ($row = mysqli_fetch_assoc($empRecords)) {

		$edit = '';
		if ($edit_permission == "Yes") {
			$edit = 'onclick="update_data(' . $i . ')"';
		}

		$delete = '';
		if ($delete_permissioin == "Yes") {
			$delete = 'onclick="show_del_data_confirm_box(' . $i . ')"';
		}

		$action =
			'<div class="dropdown dropdown-inline">
				<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown"> <i class="la la-cog"></i> </a>
				<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
					<ul class="nav nav-hoverable flex-column">
						<li class="nav-item">
							<a ' . $delete . ' class="nav-link" ><i class="text-danger nav-icon fas fa-trash"></i><span class="nav-text">Delete Details</span></a>
						</li>
					</ul>
				</div>
			</div>
			<input type="checkbox" class="chackbox_cla" style="display: inline-block; margin-left: 25px;" onchange="showButton()" value="' . $row['quick_contact_code'] . ' ">
			';

		$data[] = array(
			"action" => $action,
			"name" => '<input type="hidden" id="quick_contact_code_' . $i . '" value="' . $row['quick_contact_code'] . '" />' . $row['name'],
			"phone" => $row['isd_code']." ".$row['phone'],
			"email" => $row['email'],
			"category" => $row['category'],
			"message" => $row['message'],
			"entry_timestamp" => $row['entry_timestamp'],
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
