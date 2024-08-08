function clear_quick_contact1(){
	_("#name1").value="";
	_("#isd_code1").value="";
	_("#phone1").value="";
	_("#email1").value="";
	_("#category1").value="";
	_("#message1").value="";
  }
  function quick_contact1() {
	clearInputAleart();
	if (!_("#name1").checkValidity()) {
	  toastr["warning"]("name1 : " + _("#name1").validationmessage1, "WARNING");
	  showInputAlert("name1", "warning", _("#name1").validationmessage1);
	  _("#name1").focus();
	  return false;
	}
	if (!_("#isd_code1").checkValidity()) {
	  toastr["warning"](
		"Country Code : " + _("#isd_code1").validationmessage1,
		"WARNING"
	  );
	  showInputAlert("isd_code1", "warning", _("#isd_code1").validationmessage1);
	  _("#isd_code1").focus();
	  return false;
	}
	if (!_("#phone1").checkValidity()) {
	  toastr["warning"]("phone1 No : " + _("#phone1").validationmessage1, "WARNING");
	  showInputAlert("phone1", "warning", _("#phone1").validationmessage1);
	  _("#phone1").focus();
	  return false;
	}
	if (!_("#email1").checkValidity()) {
	  toastr["warning"]("email1 : " + _("#email1").validationmessage1, "WARNING");
	  showInputAlert("email1", "warning", _("#email1").validationmessage1);
	  _("#email1").focus();
	  return false;
	}
	if (!_("#category1").checkValidity()) {
	  toastr["warning"](
		"category1 : " + _("#category1").validationmessage1,
		"WARNING"
	  );
	  showInputAlert("category1", "warning", _("#category1").validationmessage1);
	  _("#category1").focus();
	  return false;
	}
	if (!_("#message1").checkValidity()) {
	  toastr["warning"]("message1: " + _("#message1").validationmessage1, "WARNING");
	  showInputAlert("message1", "warning", _("#message1").validationmessage1);
	  _("#message1").focus();
	  return false;
	}
  
	_(".preloader2").style.display = "block";
	let data = new FormData();
	const sendData = {
	  name1: _("#name1").value,
	  isd_code1: _("#isd_code1").value,
	  phone1: _("#phone1").value,
	  email1: _("#email1").value,
	  category1: _("#category1").value,
	  message1: _("#message1").value,
	};
	data.append("sendData", JSON.stringify(sendData));
	let xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function () {
	  if (xhr.readyState == 4) {
		// console.log(xhr.responseText);
		const response = JSON.parse(xhr.responseText);
		const status = response["status"];
		const status_text = response["status_text"];
		if(status=='save'){
		  _(".preloader2").style.display = "none";
		  toastr["success"](status_text, "Your Request Was Sent Successfully!");
		  clear_quick_contact1();
		  return false;
		}else{
		  _(".preloader2").style.display = "none";
		  toastr["error"](status_text, "ERROR");
		}
	  }
	};
	xhr.open(
	  "POST",
	  "templates/contact/save_quick_contact.php",
	  true
	);
	xhr.send(data);
  }
  