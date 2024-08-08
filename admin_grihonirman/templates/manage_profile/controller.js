
function clear_input(){
	window.location.reload();
}

function save_details(){
	let save_no =1;
	clearInputAleart();
	if(insert_per=="No"){
		toastr['error']("You Don't Have Permission To Entry Any Data !!", "ERROR");
		save_no =0;
		return false;
	}
	if(!_("#user_id").checkValidity()){
		toastr['warning']("User Id : "+_("#user_id").validationMessage, "WARNING");
		showInputAlert('user_id','warning',_("#user_id").validationMessage);
		_("#user_id").focus();
		save_no = 0;
		return false;
	}
	if(!_("#name").checkValidity()){
		toastr['warning']("Name : "+_("#name").validationMessage, "WARNING");
		showInputAlert('name','warning',_("#name").validationMessage);
		_("#name").focus();
		save_no = 0;
		return false;
	}
		
	if(save_no==1 && insert_per=="Yes"){
		_(".background_overlay").style.display = "block";

		//============================= FOR PROFILE IMAGE =====================================
		let d = new Date();
		let profile_img_file_name = "profile_img_"+d.getDate()+"-"+d.getMonth()+"-"+d.getFullYear()+"-"+d.getTime();
		let profile_img_fl= _("#profile_img").files[0];
		
		var original_file_name=_("#profile_img").value;
		var ext = original_file_name.split('.').pop();
		let profile_img = "";
		if(_("#profile_img").value!=""){
			profile_img = profile_img_file_name+"."+ext;
		}

		let data = new FormData();
		const sendData = {
			user_id: _("#user_id").value,
			name: _("#name").value,
			email: _("#email").value,
			profile_img: profile_img
		};
		data.append("sendData",JSON.stringify(sendData));
		
		save_data = new XMLHttpRequest();
		save_data.onreadystatechange = function() {if(save_data.readyState == 4) {
			const response = JSON.parse(save_data.responseText);
			const status = response[0]['status'];
			const status_text = response[0]['status_text'];
			_(".background_overlay").style.display = "none";
			if(status=="SessionDestroy"){
				session_destroy();
				setTimeout(function(){ 
					window.location.reload();
				}, 5000);
				return false;
			}
			else if(status=="NoPermission"){
				toastr['error'](status_text, "ERROR!!");
				return false;
			}
			else if(status=="Exist"){
				toastr['error'](status_text, "ERROR!!");
				showInputAlert('user_id','error',status_text);
				_("#user_id").focus();
				return false;
			}
			else{
				// When Data Save successfully
				if(profile_img!=""){
					upload_image_file(profile_img_fl,profile_img_file_name,'Profile Iamge');
				}
				toastr['success'](status_text, "SUCCESS!!");
				return false;
			}
		
		}}
		save_data.open('POST','templates/manage_profile/save_details.php',true);	
		save_data.send(data);
	}
}

function upload_image_file(file,file_name,type){
	_(".background_overlay_preloader").style.display = "block";
	let url = "templates/manage_profile/img_save.php?file_name="+file_name+"&type="+type;
	let img_save = new XMLHttpRequest();
	let img = new FormData();
		
	img_save.open("POST", url, true);
		
	//================== RUN PRELOADER ================//
	img_save.upload.addEventListener("progress", function(evt) {
		if (evt.lengthComputable) {
			var percentComplete = parseInt(((evt.loaded / evt.total) * 100));
			
			if(parseFloat(percentComplete) > parseFloat(_(".preloader_inner_number").innerHTML)){
				_(".preloader_inner_number").innerHTML = percentComplete;
			}
		}
	}, false);
	
	img_save.onreadystatechange = function() {
		if (img_save.readyState == 4 && img_save.status == 200) {
			// alert(img_save.responseText);
			_(".background_overlay_preloader").style.display = "none";
			_(".preloader_inner_number").innerHTML = 0;
			if(img_save.responseText=="session destroy"){
				_(".session_des_box_background_overlay").style.display = "block";
			}
			else if(img_save.responseText=="error"){
				toastr['error']("File Error !!", "ERROR!!");
				return false;
			}
			else{
				toastr['success'](type+" Saved Successfully.", "SUCCESS!!");
			}
			
		}
	};
	img.append('uploaded_file', file);
	img_save.send(img);	
}