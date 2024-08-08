$(document).ready(function () {
	show_list();
	document.getElementById("delete_date_id").disabled = true;
	
});



function show_list() {
	if (view_per == "Yes") {
		$('#data_table').DataTable({
			'processing': true,
			'serverSide': true,
			'serverMethod': 'post',
			'ajax': {
				'url': 'templates/quick_contact/list.php'
			},
			'drawCallback': function (data) {
				// Here the response
				// var response = data.json;
				// console.log(response);
			},
			'columns': [
				{ data: 'action' },
				{ data: 'name' },
				{ data: 'email' },
				{ data: 'phone' },
				{ data: 'category' },
				{ data: 'message' },
				{ data: 'entry_timestamp' }
			],
			dom: 'lBfrtip',
			buttons: [
				{ extend: 'print', className: 'btn dark btn-outline' },
				{ extend: 'copy', className: 'btn red btn-outline' },
				{ extend: 'pdf', className: 'btn green btn-outline' },
				{ extend: 'excel', className: 'btn yellow btn-outline ' },
				{ extend: 'csv', className: 'btn purple btn-outline ' },
				{ extend: 'colvis', className: 'btn dark btn-outline', text: 'Columns' },
				{ extend: 'pageLength', className: 'btn dark btn-outline', text: 'Show Entries' }
			],
			'order': [[6, "desc"]],
			'aoColumnDefs': [{
				'bSortable': false,
				'aTargets': ['nosort']
			}],
			pageLength: 100,
		});
	}
}

function reload_table() {
	$('#data_table').DataTable().ajax.reload();
	_("#allChackbox").checked = false;
	
}

function delete_data(rw_num) {
	if (del_per == "Yes") {
		_(".background_overlay").style.display = "block";
		let data = new FormData();
		const sendData = {
			quick_contact_code: _("#quick_contact_code_" + rw_num).value
		};
		
		data.append("sendData", JSON.stringify(sendData));

		xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function () {
			if (xhr.readyState == 4) {
				reload_table();
				_(".background_overlay").style.display = "none";
				toastr['info']("Data Deleted Successfully.", "SUCCESS!!");
				return false;
			}
		}
		xhr.open('POST', 'templates/quick_contact/delete_data.php', true);
		xhr.send(data);

	}
	else {
		toastr['error']("You Don't Have Permission To Delete Any Data !!", "ERROR!!");
		return false;
	}
}


function delete_chack_box_data() {
	if (del_per == "Yes") {
		let x = document.querySelectorAll(".chackbox_cla");
		for (let i = 0; i < x.length; i++) {
			if (x[i].checked == true) {
				let data = new FormData();
				const sendData = {
					quick_contact_code: x[i].value,
				};
				data.append("sendData", JSON.stringify(sendData));

				xhr = new XMLHttpRequest();
				xhr.onreadystatechange = function () {
					if (xhr.readyState == 4) {
						// console.log(xhr.responseText);
						reload_table();
						_(".background_overlay").style.display = "none";
						toastr['info']("Data Deleted Successfully.", "SUCCESS!!");
						return false;
					}
				}
				xhr.open('POST', 'templates/quick_contact/delete_data.php', true);
				xhr.send(data);
				document.getElementById("delete_date_id").disabled = true;

			}
		}
		
	}
	else {
		toastr['error']("You Don't Have Permission To Delete Any Data !!", "ERROR!!");
		return false;
	}
}

function allchack() {
	if (_("#allChackbox").checked == true) {
		let x = document.querySelectorAll(".chackbox_cla");
		for (let i = 0; i < x.length; i++) {
			x[i].checked = true;
			document.getElementById("delete_date_id").disabled = false;
		}
	}
	else {
		let x = document.querySelectorAll(".chackbox_cla");
		for (let i = 0; i < x.length; i++) {
			x[i].checked = false;
			document.getElementById("delete_date_id").disabled = true;
			
		}
	}
}

function showButton(){
	let x = document.querySelectorAll(".chackbox_cla");
		for (let i = 0; i < x.length; i++) {
			if(x[i].checked == true){
				document.getElementById("delete_date_id").disabled = false;
				break;
			}
			document.getElementById("delete_date_id").disabled = true;
		}
}