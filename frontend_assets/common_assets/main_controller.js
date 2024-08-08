function _(x) {
  return document.querySelector(x);
}

function __(x) {
  return document.getElementsByClassName(x);
}

toastr.options = {
  closeButton: true,
  debug: false,
  positionClass: "toast-bottom-left",
  onclick: null,
  showDuration: "1000",
  hideDuration: "1000",
  timeOut: "9000",
  extendedTimeOut: "1000",
  showEasing: "swing",
  hideEasing: "linear",
  showMethod: "fadeIn",
  hideMethod: "fadeOut",
};

function show_del_data_confirm_box(
  delete_details,
  title,
  text,
  icon,
  confirmButtonText,
  cancelButtonText
) {
  let showTitle = title == null ? "Are you sure?" : title;
  let showtext = text == null ? "You won't be able to revert this!" : text;
  let showicon = icon == null ? "warning" : icon;
  let sa_allowOutsideClick = true;
  let sa_showConfirmButton = true;
  let sa_showCancelButton = true;
  let sa_confirmButtonClass = "btn btn-info border-none";
  let sa_cancelButtonClass = "btn btn-secondary border-none";
  let showconfirmButtonText =
    confirmButtonText == null ? "Yes, delete it!" : confirmButtonText;
  let showcancelButtonText =
    cancelButtonText == null ? "No, cancel!" : cancelButtonText;
  swal(
    {
      title: showTitle,
      text: showtext,
      type: showicon,
      allowOutsideClick: sa_allowOutsideClick,
      showConfirmButton: sa_showConfirmButton,
      showCancelButton: sa_showCancelButton,
      confirmButtonClass: sa_confirmButtonClass,
      cancelButtonClass: sa_cancelButtonClass,
      confirmButtonText: showconfirmButtonText,
      cancelButtonText: showcancelButtonText,
    },
    function (isConfirm) {
      if (isConfirm) {
        delete_data(delete_details);
      } else {
      }
    }
  );
}

function session_destroy(
  title,
  text,
  icon,
  confirmButtonText,
  cancelButtonText
) {
  let showTitle = title == null ? "Session Destroy!!" : title;
  let showtext =
    text == null
      ? "You won't be able to access anthing! Please Do Re-Login"
      : text;
  let showicon = icon == null ? "error" : icon;
  let sa_allowOutsideClick = false;
  let sa_showConfirmButton = true;
  let sa_showCancelButton = false;
  let sa_confirmButtonClass = "btn btn-info border-none";
  let sa_cancelButtonClass = "btn btn-secondary border-none";
  let showconfirmButtonText =
    confirmButtonText == null ? "Re-Login" : confirmButtonText;
  let showcancelButtonText =
    cancelButtonText == null ? "No, cancel!" : cancelButtonText;
  swal(
    {
      title: showTitle,
      text: showtext,
      type: showicon,
      allowOutsideClick: sa_allowOutsideClick,
      showConfirmButton: sa_showConfirmButton,
      showCancelButton: sa_showCancelButton,
      confirmButtonClass: sa_confirmButtonClass,
      cancelButtonClass: sa_cancelButtonClass,
      confirmButtonText: showconfirmButtonText,
      cancelButtonText: showcancelButtonText,
    },
    function (isConfirm) {
      if (isConfirm) {
        window.location.href = baseUrl;
      } else {
      }
    }
  );
}

clearInputAleart();

function clearInputAleart() {
  for (let index = 0; index < __("input_alert").length; index++) {
    __("input_alert")[index].innerHTML =
      __("input_alert")[index].getAttribute("data-default-mssg");
    __("input_alert")[index].classList.add("inp-alert-default");
    __("input_alert")[index].classList.remove("text-warning");
    __("input_alert")[index].classList.remove("text-danger");
  }
}

function showInputAlert(inp, alertType, alertMssg) {
  _("." + inp + "-inp-alert").classList.remove("inp-alert-default");
  _("." + inp + "-inp-alert").classList.remove("text-warning");
  _("." + inp + "-inp-alert").classList.remove("text-danger");
  _("." + inp + "-inp-alert").classList.remove("text-info");

  if (alertType == "warning") {
    _("." + inp + "-inp-alert").classList.add("text-warning");
    _("." + inp + "-inp-alert").innerHTML =
      '<i class="fa fa-exclamation-triangle text-warning"></i> ' + alertMssg;
  }
  if (alertType == "error") {
    _("." + inp + "-inp-alert").classList.add("text-danger");
    _("." + inp + "-inp-alert").innerHTML =
      '<i class="fa fa-exclamation-triangle text-danger"></i> ' + alertMssg;
  }
  if (alertType == "success") {
    _("." + inp + "-inp-alert").classList.add("text-info");
    _("." + inp + "-inp-alert").innerHTML =
      '<i class="fa fa-check text-info"></i> ' + alertMssg;
  }
}

function subscribeNewsLetter() {
  if (!_("#newsletter_email").checkValidity()) {
    toastr["warning"](
      "E-mail Address : " + _("#newsletter_email").validationMessage,
      "WARNING"
    );
    showInputAlert(
      "newsletter_email",
      "warning",
      _("#newsletter_email").validationMessage
    );
    _("#newsletter_email").focus();
    return false;
  }

  _(".background_overlay").style.display = "block";
  let data = new FormData();
  const sendData = {
    newsletter_email: _("#newsletter_email").value,
  };
  data.append("sendData", JSON.stringify(sendData));
  let xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4) {
      // console.log(xhr.responseText);
      _(".background_overlay").style.display = "none";
      const response = JSON.parse(xhr.responseText);
      const status = response["status"];
      const status_text = response["status_text"];

      if (status == "Exist") {
        toastr["error"](status_text, "ERROR");
        showInputAlert("newsletter_email", "error", status_text);
        _("#newsletter_email").focus();
        return false;
      } else {
        toastr["success"](status_text, "SUCCESS");
        showInputAlert("newsletter_email", "success", status_text);
        _("#newsletter_email").value = "";
        return false;
      }
    }
  };
  xhr.open("POST", "frontend_assets/common_assets/save_newsletter.php", true);
  xhr.send(data);
}
function clear_quick_contact(){
  _("#name").value="";
  _("#isd_code").value="";
  _("#phone").value="";
  _("#email").value="";
  _("#category").value="";
  _("#message").value="";
}
function quick_contact() {
  clearInputAleart();
  if (!_("#name").checkValidity()) {
    toastr["warning"]("Name : " + _("#name").validationMessage, "WARNING");
    showInputAlert("name", "warning", _("#name").validationMessage);
    _("#name").focus();
    return false;
  }
  if (!_("#isd_code").checkValidity()) {
    toastr["warning"](
      "Country Code : " + _("#isd_code").validationMessage,
      "WARNING"
    );
    showInputAlert("isd_code", "warning", _("#isd_code").validationMessage);
    _("#isd_code").focus();
    return false;
  }
  if (!_("#phone").checkValidity()) {
    toastr["warning"]("Phone No : " + _("#phone").validationMessage, "WARNING");
    showInputAlert("phone", "warning", _("#phone").validationMessage);
    _("#phone").focus();
    return false;
  }
  if (!_("#email").checkValidity()) {
    toastr["warning"]("email : " + _("#email").validationMessage, "WARNING");
    showInputAlert("email", "warning", _("#email").validationMessage);
    _("#email").focus();
    return false;
  }
  if (!_("#category").checkValidity()) {
    toastr["warning"](
      "Category : " + _("#category").validationMessage,
      "WARNING"
    );
    showInputAlert("category", "warning", _("#category").validationMessage);
    _("#category").focus();
    return false;
  }
  if (!_("#message").checkValidity()) {
    toastr["warning"]("Message: " + _("#message").validationMessage, "WARNING");
    showInputAlert("message", "warning", _("#message").validationMessage);
    _("#message").focus();
    return false;
  }

  _(".preloader2").style.display = "block";
  let data = new FormData();
  const sendData = {
    name: _("#name").value,
    isd_code: _("#isd_code").value,
    phone: _("#phone").value,
    email: _("#email").value,
    category: _("#category").value,
    message: _("#message").value,
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
        _('#closeModalBtn').click();
        clear_quick_contact();
        return false;
      }else{
        _(".preloader2").style.display = "none";
        toastr["error"](status_text, "ERROR");
      }
    }
  };
  xhr.open(
    "POST",
    "frontend_assets/common_assets/save_quick_contact.php",
    true
  );
  xhr.send(data);
}
