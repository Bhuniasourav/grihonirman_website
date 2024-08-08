
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
	if(!_("#system_name").checkValidity()){
		toastr['warning']("System Name : "+_("#system_name").validationMessage, "WARNING");
		showInputAlert('system_name','warning',_("#system_name").validationMessage);
		_("#system_name").focus();
		save_no = 0;
		return false;
	}
	if(!_("#email").checkValidity()){
		toastr['warning']("Email : "+_("#email").validationMessage, "WARNING");
		showInputAlert('email','warning',_("#email").validationMessage);
		_("#email").focus();
		save_no = 0;
		return false;
	}
	if(!_("#address").checkValidity()){
		toastr['warning']("Address : "+_("#address").validationMessage, "WARNING");
		showInputAlert('address','warning',_("#address").validationMessage);
		_("#address").focus();
		save_no = 0;
		return false;
	}
	if(!_("#ph_num").checkValidity()){
		toastr['warning']("Phone Number : "+_("#ph_num").validationMessage, "WARNING");
		showInputAlert('menu_ph_numname','warning',_("#ph_num").validationMessage);
		_("#ph_num").focus();
		save_no = 0;
		return false;
	}
	
	if(save_no==1 && insert_per=="Yes"){
		_(".background_overlay").style.display = "block";

		//============================= FOR COMAPNY LOGO =====================================
		let d = new Date();
		let logo_file_name = "logo_"+d.getDate()+"-"+d.getMonth()+"-"+d.getFullYear()+"-"+d.getTime();
		let logo_fl= _("#logo").files[0];
		
		var original_file_name=_("#logo").value;
		var ext = original_file_name.split('.').pop();
		let logo = "";
		if(_("#logo").value!=""){
			logo = logo_file_name+"."+ext;
		}

		//============================= FOR FAVICON =====================================
		let favicon_file_name = "favicon_"+d.getDate()+"-"+d.getMonth()+"-"+d.getFullYear()+"-"+d.getTime();
		let favicon_fl= _("#favicon").files[0];
		
		var original_file_name=_("#favicon").value;
		var ext = original_file_name.split('.').pop();
		let favicon = "";
		if(_("#favicon").value!=""){
			favicon = favicon_file_name+"."+ext;
		}

		let data = new FormData();
		const sendData = {
			system_name: _("#system_name").value, 
			email: _("#email").value,
			address: _("#address").value,
			ph_num: _("#ph_num").value,
			logo: logo,
			favicon: favicon
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
				toastr['warning'](status_text, "WARNING!!");
				return false;
			}
			else{
				// When Data Save successfully
				if(logo!=""){
					upload_image_file(logo_fl,logo_file_name,'Logo');
				}
				if(favicon!=""){
					upload_image_file(favicon_fl,favicon_file_name,'Favicon');
				}
				toastr['success'](status_text, "SUCCESS!!");
				return false;
			}
		
		}}
		save_data.open('POST','templates/system_info/save_details.php',true);	
		save_data.send(data);
	}
}

function upload_image_file(file,file_name,type){
	_(".background_overlay_preloader").style.display = "block";
	let url = "templates/system_info/img_save.php?file_name="+file_name+"&type="+type;
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