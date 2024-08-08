<!--begin::Card-->
<div class="card card-custom example example-compact">
    <div style="min-height: 50px;;" class="card-header">
        <h3 class="card-title">Manage System Info</h3>
        <div class="card-toolbar">
            <div class="example-tools justify-content-center">

            </div>
        </div>
    </div>
    <!--begin::Form-->
    <form class="form">
        <div class="card-body">
            <div class="input_part">
                <?php
                $system_dataget = mysqli_query($con, "select 
                                    system_name,
                                    logo,
                                    favicon,
                                    email,
                                    address,
                                    ph_num
                                    from system_info");
                $system_data = mysqli_fetch_row($system_dataget);

                $system_name = $system_data[0];
                $logo = $system_data[1];
                $favicon = $system_data[2];
                $email = $system_data[3];
                $address = $system_data[4];
                $ph_num = $system_data[5];
                ?>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">System Name </label>
                            <input type="text" id="system_name" value="<?php echo $system_name; ?>" class="form-control" placeholder="Enter System Name" required maxlength="100">
                            <label data-default-mssg="" class="input_alert system_name-inp-alert" ></label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Email </label>
                            <input type="email" id="email" value="<?php echo $email; ?>" class="form-control" placeholder="Enter Email" required maxlength="150">
                            <label data-default-mssg="" class="input_alert email-inp-alert" ></label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Address </label>
                            <input type="text" id="address" value="<?php echo $address; ?>" class="form-control" placeholder="Enter Address" required maxlength="200">
                            <label data-default-mssg="" class="input_alert address-inp-alert" ></label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Phone Number </label>
                            <input type="text" id="ph_num" value="<?php echo $ph_num; ?>" class="form-control" placeholder="Enter Phone Number" required maxlength="50" minlength="10">
                            <label data-default-mssg="" class="input_alert ph_num-inp-alert" ></label>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Company Logo</label>
                            <div class="custom-file">
                                <input type="file" onchange="loadFile(this,'logo')" class="custom-file-input" id="logo" accept="<?php echo $inputAllowedImage; ?>">
                                <label class="custom-file-label logo_label" for="logo">Choose file</label>
                            </div>
                            <center>
                                <div class="image-input image-input-outline" id="kt_image_1">
                                    <div style="width: auto; height:auto; margin-top:10px;" class="image-input-wrapper">
                                        <img style="max-width: 150px;" class="logo" data-blank-image="../upload_content/upload_img/no_image.png" src="../upload_content/upload_img/<?php echo $logo == "" ? "no_image.png" : "system_img/" . $logo; ?>" />
                                    </div>
                                </div>
                            </center>
                            <label data-default-mssg="" class="input_alert logo-inp-alert" ></label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Company Favicon</label>
                            <div class="custom-file">
                                <input type="file" onchange="loadFile(this,'favicon')" class="custom-file-input" id="favicon" accept="<?php echo $inputAllowedImage; ?>">
                                <label class="custom-file-label favicon_label" for="favicon">Choose file</label>
                            </div>
                            <center>
                                <div class="image-input image-input-outline" id="kt_image_1">
                                    <div style="width: auto; height:auto; margin-top:10px;" class="image-input-wrapper">
                                        <img style="max-width: 150px;" class="favicon" data-blank-image="../upload_content/upload_img/no_image.png" src="../upload_content/upload_img/<?php echo $favicon == "" ? "no_image.png" : "system_img/" . $favicon; ?>" />
                                    </div>
                                </div>
                            </center>
                            <label data-default-mssg="" class="input_alert favicon-inp-alert" ></label>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div style="padding: 8px 2.25rem;" class="card-footer">
            <div class="row">
                <div class="col-lg-5"></div>
                <div class="col-lg-7">
                    <button type="button" onclick="clear_input()" class="btn btn-light-dark font-weight-bold">Clear</button>
                    <button type="button" onclick="save_details()" class="btn btn-primary font-weight-bold">Save Data</button>
                </div>
            </div>
        </div>
    </form>
    <!--end::Form-->
</div>
<!--end::Card-->