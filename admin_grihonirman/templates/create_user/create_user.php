<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div style="padding-top: 8px !important; padding-bottom: 8px !important; margin-bottom: 10px;" class="subheader py-2 py-lg-6 subheader-solid page_subheader" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Manage User Details</h5>
                    <!--end::Page Title-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Actions-->
                <a onclick="reload_table()" class="btn btn-light-warning font-weight-bolder btn-sm mr-5">
					<i class="fas fa-sync"></i> Refresh Record
				</a>
				<a onclick="clear_input()" class="btn btn-light-danger font-weight-bolder btn-sm mr-5" data-toggle="modal" data-target="#entryModal">
					<i class="fas fa-plus"></i> Add New Record
				</a>
				<a class="btn btn-light-primary font-weight-bolder btn-sm" data-toggle="modal" data-target="#entryModal">
					<i class="fas fa-folder-open"></i> Re-Open Modal
				</a>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="page_container">
            <div class="show_record_div">
                <table class="table table-bordered table-hover" id="data_table">
                    <thead>
                        <tr>
                            <th class="nosort">User Image</th>
                            <th>Name</th>
                            <th>User Id </th>
                            <th>Email</th>
                            <th>User Mode</th>
                            <th>Active</th>
                            <th>Entry</th>
                            <th>View</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th class="nosort">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>


<!-- Modal-->
<div class="modal fade" id="entryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog entry_modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title entry_modal_title" id="exampleModalLabel">Enter User Details :</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body entry_modal_body">
                <div class="input_part">
                    <input type="hidden" id="user_code" value="" />

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">User Id</label>
                                <input type="text" id="user_id" class="form-control" placeholder="Enter User Id" required maxlength="50">
                                <label data-default-mssg="( This is unique field )" class="input_alert user_id-inp-alert" ></label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">
                                    Password
                                    <button style="padding: 2px 5px; font-size: 10px;" type="button" class="btn btn-secondary" data-container="body" data-toggle="tooltip" data-placement="top" title="In Update Mode If You Want To Change Password Then Type Or Leave Blank">
                                        Note
                                    </button>
                                </label>
                                <input type="text" id="user_password" class="form-control" placeholder="Enter Password" required maxlength="50">
                                <label data-default-mssg="" class="input_alert user_password-inp-alert" ></label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Name </label>
                                <input type="text" id="name" class="form-control" placeholder="Enter Name" required maxlength="150">
                                <label data-default-mssg="" class="input_alert name-inp-alert" ></label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Email </label>
                                <input type="email" id="email" class="form-control" placeholder="Enter Email" maxlength="150">
                                <label data-default-mssg="" class="input_alert email-inp-alert" ></label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">User Mode</label>
                                <select id="user_mode_code" class="select2 form-control" data-placeholder="Choose User Mode" required></select>
                                <label data-default-mssg="" class="input_alert user_mode_code-inp-alert" ></label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Active</label>
                                <select id="active" class="form-control">
                                    <option value="Yes" selected>Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <label data-default-mssg="" class="input_alert active-inp-alert" ></label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Entry Permission</label>
                                <select id="entry_permission" class="form-control">
                                    <option value="Yes" selected>Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <label data-default-mssg="" class="input_alert entry_permission-inp-alert" ></label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">View Permission</label>
                                <select id="view_permission" class="form-control">
                                    <option value="Yes" selected>Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <label data-default-mssg="" class="input_alert view_permission-inp-alert" ></label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Edit Permission</label>
                                <select id="edit_permission" class="form-control">
                                    <option value="Yes" selected>Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <label data-default-mssg="" class="input_alert edit_permission-inp-alert" ></label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Delete Permission</label>
                                <select id="delete_permissioin" class="form-control">
                                    <option value="Yes" selected>Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <label data-default-mssg="" class="input_alert delete_permissioin-inp-alert" ></label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Profile Image</label>
                                <div class="custom-file">
                                    <input type="file" onchange="loadFile(this,'profile_img')" class="custom-file-input" id="profile_img" accept="<?php echo $inputAllowedImage; ?>">
                                    <label class="custom-file-label profile_img_label">Choose file</label>
                                </div>
                                <center>
                                    <div class="image-input image-input-outline">
                                        <div style="width: auto; height:auto; margin-top:10px;" class="image-input-wrapper">
                                            <img style="max-width: 150px;" class="profile_img" data-blank-image="../upload_content/upload_img/profile_img/user_icon.png" src="../upload_content/upload_img/profile_img/user_icon.png" />
                                        </div>
                                    </div>
                                </center>
                                <label data-default-mssg="" class="input_alert profile_img-inp-alert" ></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer entry_modal_footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="button" onclick="clear_input()" class="btn btn-light-dark font-weight-bold">Clear</button>
                <button type="button" onclick="save_details()" class="btn btn-primary font-weight-bold save_btn">Save
                    Data</button>
            </div>
        </div>
    </div>
</div>