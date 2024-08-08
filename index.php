<!-- 1. Php_Top_Section -->
<!-- 2. Head_Section -->
<!-- 3. Preloader_Section -->
<!-- 4. Mobile_Menu -->
<!-- 5. Top_Area_Section_Desktop -->
<!-- 6. Main_Menu_Section -->
<!-- 7. Qucik_Contact_Modal -->

<?php
include("templates/db/db.php");
include("templates/db/router.php");
include("templates/function/text-short.php");

if ($pg_nm == "") {
    header('location: ' . $baseUrl . '/home');
}

// if (!file_exists("templates/" . $pg_nm . "/page_details/title.php")) {
//     header('location: ' . $baseUrl . '/home');
// }


$system_info_dataget = mysqli_query($con, "select system_name, logo, favicon, email, address, ph_num from system_info ");
$system_info_data = mysqli_fetch_row($system_info_dataget);

$system_name = $system_info_data[0];
$system_logo = $system_info_data[1];
$system_favicon = $system_info_data[2];
$system_email = $system_info_data[3];
$system_address = $system_info_data[4];
$system_ph_num = $system_info_data[5];
?>
<!DOCTYPE html>
<html>
<!-- Head_Section  -->

<head>
    <!-- Basic -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php
    if (file_exists("templates/" . $pg_nm . "/page_details/meta_details.php")) {
        include("templates/" . $pg_nm . "/page_details/meta_details.php");
    } else {
    ?>

        <meta name="description" content="Discover your dream home with Griho Nirman Realty Pvt Ltd, offering the best real estate properties, apartments, villas, and plots in Kolkata. Our multi-channel marketing ensures quality and transparency." />
        <meta name="keywords" content="real estate, Realtor, best realtors, Zillow, housing market, homes for sale, properties for sale, real estate developers in Kolkata, plots for sale, apartments, villas, Griho Nirman Realty, home buying" />
        <meta name="author" content="Griho Nirman Realty Pvt Ltd" />

        <link rel="canonical" href="https://grihonirmanrealty.in" />
    <?php

    }
    ?>

    <?php
    if (file_exists("templates/" . $pg_nm . "/page_details/title.php")) {
        include("templates/" . $pg_nm . "/page_details/title.php");
    } else {
    ?>

        <title>
            <?php echo $system_name; ?>

        </title>
    <?php

    }
    ?>


    <base href="<?php echo $baseHref; ?>" />
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="upload_content/upload_img/system_img/<?php echo $system_favicon; ?>" type="image/x-icon" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->

    <!-- ========================================== -->
    <!-- WEBSITE CSS START -->
    <!-- ========================================== -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="assets/css/slick.min.css">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="assets/css/modal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/common.css">
    <!-- ========================================== -->
    <!-- WEBSITE CSS END -->
    <!-- ========================================== -->

    <link href="frontend_assets/assets/global/plugins/bootstrap-sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="frontend_assets/assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css" />
    <link href="frontend_assets/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="frontend_assets/common_assets/style.css">

    <?php
    if (file_exists("templates/" . $pg_nm . "/page_details/css.php")) {
        include("templates/" . $pg_nm . "/page_details/css.php");
    }
    ?>
    <script>
        const baseUrl = "<?php echo $baseUrl; ?>";
        const login = "<?php echo $login; ?>";
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-16665448208"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'AW-16665448208');
    </script>
</head>

<!-- ============================= -->
<!-- Header Section Start  -->
<!-- ============================= -->

<body>
    <!--==============================
     Preloader_Section
    ==============================-->
    <div class="preloader">
        <div class="preloader-inner">
            <img src="upload_content/upload_img/system_img/<?php echo $system_favicon; ?>" alt="Grihonirman">
            <span class="loader"></span>
        </div>
    </div>
    <div class="preloader2">
        <div class="preloader-inner">
            <img src="upload_content/upload_img/system_img/<?php echo $system_favicon; ?>" alt="Grihonirman">
            <span class="loader"></span>
        </div>
    </div>

    <!-- <div class="sidemenu-wrapper">
        <div class="sidemenu-content">
            <button class="closeButton sideMenuCls"><i class="fas fa-times"></i></button>
            <div class="widget footer-widget">
                <div class="widget-about">
                    <div class="footer-logo">
                        <a href="<?php echo $baseUrl; ?>/home""><img src=" upload_content/upload_img/system_img/<?php echo $system_logo == "" ? "no_image.png" : $system_logo ?>" alt="Grihonirman"></a>
                    </div>
                    <p class="about-text">Lorem ipsum dolor sit amet consectetur adipiscing elit sociosqu integer, suscipit nascetur aliquet posuere aptent vehicula ligula pulvinar praesent.</p>
                    <div class="social-btn style2">
                        <a href="https://www.facebook.com/profile.php?id=61562931081728" target="_blank"><i class="fab fa-facebook"></i></a>
                        <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                        <a href="https://pinterest.com/"><i class="fab fa-pinterest-p"></i></a>
                        <a href="https://instagram.com/"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="widget widget_nav_menu footer-widget">
                <h3 class="widget_title">Quick Links</h3>
                <ul class="menu">
                    <li><a href="<?php echo $baseUrl; ?>/home" </a></li>
                    <li><a href="<?php echo $baseUrl; ?>/about">About Us</a></li>
                    <li><a href="<?php echo $baseUrl; ?>/testimonial">Client Testimonial</a></li>
                    <li><a href="<?php echo $baseUrl; ?>/team">Our Team</a></li>
                    <li><a href="<?php echo $baseUrl; ?>/contact">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div> -->


    <!--==============================
    Mobile_Menu
    ============================== -->
    <div class="mobile-menu-wrapper">
        <div class="mobile-menu-area text-center">
            <button class="menu-toggle"><i class="fas fa-times"></i></button>
            <div class="mobile-logo">
                <a href="<?php echo $baseUrl; ?>/home"><img src="upload_content/upload_img/system_img/<?php echo $system_logo == "" ? "no_image.png" : $system_logo ?>" alt="Grihonirman"></a>
            </div>
            <div class="mobile-menu">
                <ul>
                    <li>
                        <a href="<?php echo $baseUrl; ?>/home">Home</a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">About Us</a>
                        <ul class="sub-menu">
                            <li><a href="<?php echo $baseUrl; ?>/about">Griho Nirman</a></li>
                            <li><a href="<?php echo $baseUrl; ?>/services">Services</a></li>
                            <li><a href="<?php echo $baseUrl; ?>/faq">FAQ</a></li>


                            <!-- <li><a href="<?php echo $baseUrl; ?>/team">Our Team</a></li> -->
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo $baseUrl; ?>/testimonial">Client Testimonial</a>
                    </li>

                    <li>
                        <a href="<?php echo $baseUrl; ?>/portfolio">Portfolio</a>
                    </li>
                    <li>
                        <a href="<?php echo $baseUrl; ?>/career">Career</a>
                    </li>
                    <li>
                        <a href="<?php echo $baseUrl; ?>/contact">Contact</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <!--==============================
	Top_Area_Section_Desktop
    ==============================-->
    <header class="nav-header header-layout1">
        <div class="header-top">
            <div class="container">
                <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                    <div class="col-auto d-none d-lg-block">
                        <div class="header-links">
                            <ul>
                                <li><img src="assets/icon/email.png" alt="Call" style="width: 30px;"><a href="mailto:<?php echo $system_email ?>"><?php echo $system_email; ?></a></li>
                                <li><img src="assets/icon/call-i.png" alt="Call" style="width: 30px;"><a href="tel: <?php echo $system_ph_num; ?>"><?php echo $system_ph_num; ?></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="header-links">
                            <ul>
                                <li>
                                    <div class="social-links">
                                        <!-- <span class="social-title">Follow On :</span> -->
                                        <a href="https://www.facebook.com/profile.php?id=61562931081728" target="_blank" style="background-color: #0288d1;"><i class="fab fa-facebook"></i></a>
                                        <a href="https://twitter.com/" style="background-color: #000000;"><i class="fab fa-twitter"></i></a>
                                        <a href="https://pinterest.com/" style="background-color: #58b5e8;"><i class="fab fa-linkedin"></i></a>
                                        <a href="https://instagram.com/" style="background-color: #fc104a;"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main_Menu_Section -->
        <div class="sticky-wrapper">
            <!-- Main Menu Area -->
            <div class="menu-area">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto">
                            <div class="header-logo top-section">
                                <a href="<?php echo $baseUrl; ?>/home"><img src="upload_content/upload_img/system_img/<?php echo $system_logo == "" ? "no_image.png" : $system_logo ?>" alt="logo"></a>
                                <p><?php echo $system_name; ?></p>
                            </div>
                        </div>
                        <div class="col-auto">
                            <nav class="main-menu d-none d-lg-inline-block">
                                <ul>
                                    <li>
                                        <a href="<?php echo $baseUrl; ?>/home">Home</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">About Us</a>
                                        <ul class="sub-menu">
                                            <li><a href="<?php echo $baseUrl; ?>/about">Griho Nirman</a></li>
                                            <li><a href="<?php echo $baseUrl; ?>/services">Services</a></li>
                                            <li><a href="<?php echo $baseUrl; ?>/faq">FAQ</a></li>


                                            <!-- <li><a href="<?php echo $baseUrl; ?>/team">Our Team</a></li> -->
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="<?php echo $baseUrl; ?>/testimonial">Testimonial</a>
                                    </li>

                                    <li>
                                        <a href="<?php echo $baseUrl; ?>/portfolio">Our Portfolio</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $baseUrl; ?>/career">Career</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $baseUrl; ?>/contact">Contact</a>
                                    </li>

                                </ul>
                            </nav>
                            <div class="navbar-right d-inline-flex d-lg-none">
                                <button type="button" class="menu-toggle icon-btn"><i class="fas fa-bars"></i></button>
                            </div>
                        </div>
                        <div class="col-auto d-none d-xl-block">
                            <div class="header-button">
                                <button id="openModalBtn" class="open-modal-btn btn">
                                    Enquiry Now
                                    <i class="fas fa-angle-double-right"></i>
                                    </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Qucik_Contact_Modal -->
    <div id="modal" class="modal">
        <div class="contact-form-wrap ms-xl-4 mt-40 mt-lg-0">
            <div class="title-area">
                <h2 class="sec-title">Want to Know More? Our Advisors Are Ready to Assist!</h2>
                <button id="closeModalBtn" class="close-modal-btn">&times;</button>
            </div>
            <form id="modalForm">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="text" class="form-control style-border" name="name" id="name" placeholder="Your Name" required>
                            <label data-default-mssg="" class="input_alert name-inp-alert"></label>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <select name="isd_code" id="isd_code" class="form-select style-border" style="margin: 0; padding: 0; padding-left: 5px;" required>
                                <option value="" disabled selected hidden>Select Country</option>
                                <option value="+1">USA (+1)</option>
                                <option value="+93">Afghanistan (+93)</option>
                                <option value="+355">Albania (+355)</option>
                                <option value="+213">Algeria (+213)</option>
                                <option value="+376">Andorra (+376)</option>
                                <option value="+244">Angola (+244)</option>
                                <option value="+54">Argentina (+54)</option>
                                <option value="+374">Armenia (+374)</option>
                                <option value="+61">Australia (+61)</option>
                                <option value="+43">Austria (+43)</option>
                                <option value="+994">Azerbaijan (+994)</option>
                                <option value="+973">Bahrain (+973)</option>
                                <option value="+880">Bangladesh (+880)</option>
                                <option value="+375">Belarus (+375)</option>
                                <option value="+32">Belgium (+32)</option>
                                <option value="+501">Belize (+501)</option>
                                <option value="+229">Benin (+229)</option>
                                <option value="+975">Bhutan (+975)</option>
                                <option value="+591">Bolivia (+591)</option>
                                <option value="+387">Bosnia and Herzegovina (+387)</option>
                                <option value="+267">Botswana (+267)</option>
                                <option value="+55">Brazil (+55)</option>
                                <option value="+673">Brunei (+673)</option>
                                <option value="+359">Bulgaria (+359)</option>
                                <option value="+226">Burkina Faso (+226)</option>
                                <option value="+257">Burundi (+257)</option>
                                <option value="+855">Cambodia (+855)</option>
                                <option value="+237">Cameroon (+237)</option>
                                <option value="+1">Canada (+1)</option>
                                <option value="+238">Cape Verde (+238)</option>
                                <option value="+236">Central African Republic (+236)</option>
                                <option value="+235">Chad (+235)</option>
                                <option value="+56">Chile (+56)</option>
                                <option value="+86">China (+86)</option>
                                <option value="+57">Colombia (+57)</option>
                                <option value="+269">Comoros (+269)</option>
                                <option value="+243">Congo, Democratic Republic of the (+243)</option>
                                <option value="+242">Congo, Republic of the (+242)</option>
                                <option value="+506">Costa Rica (+506)</option>
                                <option value="+225">Côte d'Ivoire (+225)</option>
                                <option value="+385">Croatia (+385)</option>
                                <option value="+53">Cuba (+53)</option>
                                <option value="+357">Cyprus (+357)</option>
                                <option value="+420">Czech Republic (+420)</option>
                                <option value="+45">Denmark (+45)</option>
                                <option value="+253">Djibouti (+253)</option>
                                <option value="+1-767">Dominica (+1-767)</option>
                                <option value="+1-809">Dominican Republic (+1-809)</option>
                                <option value="+1-829">Dominican Republic (+1-829)</option>
                                <option value="+1-849">Dominican Republic (+1-849)</option>
                                <option value="+670">East Timor (+670)</option>
                                <option value="+593">Ecuador (+593)</option>
                                <option value="+20">Egypt (+20)</option>
                                <option value="+503">El Salvador (+503)</option>
                                <option value="+240">Equatorial Guinea (+240)</option>
                                <option value="+291">Eritrea (+291)</option>
                                <option value="+372">Estonia (+372)</option>
                                <option value="+251">Ethiopia (+251)</option>
                                <option value="+500">Falkland Islands (+500)</option>
                                <option value="+298">Faroe Islands (+298)</option>
                                <option value="+679">Fiji (+679)</option>
                                <option value="+358">Finland (+358)</option>
                                <option value="+33">France (+33)</option>
                                <option value="+689">French Polynesia (+689)</option>
                                <option value="+241">Gabon (+241)</option>
                                <option value="+220">Gambia (+220)</option>
                                <option value="+995">Georgia (+995)</option>
                                <option value="+49">Germany (+49)</option>
                                <option value="+233">Ghana (+233)</option>
                                <option value="+350">Gibraltar (+350)</option>
                                <option value="+30">Greece (+30)</option>
                                <option value="+299">Greenland (+299)</option>
                                <option value="+1-473">Grenada (+1-473)</option>
                                <option value="+502">Guatemala (+502)</option>
                                <option value="+224">Guinea (+224)</option>
                                <option value="+245">Guinea-Bissau (+245)</option>
                                <option value="+592">Guyana (+592)</option>
                                <option value="+509">Haiti (+509)</option>
                                <option value="+504">Honduras (+504)</option>
                                <option value="+852">Hong Kong (+852)</option>
                                <option value="+36">Hungary (+36)</option>
                                <option value="+354">Iceland (+354)</option>
                                <option value="+91">India (+91)</option>
                                <option value="+62">Indonesia (+62)</option>
                                <option value="+98">Iran (+98)</option>
                                <option value="+964">Iraq (+964)</option>
                                <option value="+353">Ireland (+353)</option>
                                <option value="+972">Israel (+972)</option>
                                <option value="+39">Italy (+39)</option>
                                <option value="+1-876">Jamaica (+1-876)</option>
                                <option value="+81">Japan (+81)</option>
                                <option value="+962">Jordan (+962)</option>
                                <option value="+7">Kazakhstan (+7)</option>
                                <option value="+254">Kenya (+254)</option>
                                <option value="+686">Kiribati (+686)</option>
                                <option value="+850">Korea, North (+850)</option>
                                <option value="+82">Korea, South (+82)</option>
                                <option value="+965">Kuwait (+965)</option>
                                <option value="+996">Kyrgyzstan (+996)</option>
                                <option value="+856">Laos (+856)</option>
                                <option value="+371">Latvia (+371)</option>
                                <option value="+961">Lebanon (+961)</option>
                                <option value="+266">Lesotho (+266)</option>
                                <option value="+231">Liberia (+231)</option>
                                <option value="+218">Libya (+218)</option>
                                <option value="+423">Liechtenstein (+423)</option>
                                <option value="+370">Lithuania (+370)</option>
                                <option value="+352">Luxembourg (+352)</option>
                                <option value="+853">Macau (+853)</option>
                                <option value="+389">Macedonia (+389)</option>
                                <option value="+261">Madagascar (+261)</option>
                                <option value="+265">Malawi (+265)</option>
                                <option value="+60">Malaysia (+60)</option>
                                <option value="+960">Maldives (+960)</option>
                                <option value="+223">Mali (+223)</option>
                                <option value="+356">Malta (+356)</option>
                                <option value="+692">Marshall Islands (+692)</option>
                                <option value="+222">Mauritania (+222)</option>
                                <option value="+230">Mauritius (+230)</option>
                                <option value="+262">Mayotte (+262)</option>
                                <option value="+52">Mexico (+52)</option>
                                <option value="+691">Micronesia (+691)</option>
                                <option value="+373">Moldova (+373)</option>
                                <option value="+377">Monaco (+377)</option>
                                <option value="+976">Mongolia (+976)</option>
                                <option value="+382">Montenegro (+382)</option>
                                <option value="+212">Morocco (+212)</option>
                                <option value="+258">Mozambique (+258)</option>
                                <option value="+95">Myanmar (+95)</option>
                                <option value="+264">Namibia (+264)</option>
                                <option value="+674">Nauru (+674)</option>
                                <option value="+977">Nepal (+977)</option>
                                <option value="+31">Netherlands (+31)</option>
                                <option value="+599">Netherlands Antilles (+599)</option>
                                <option value="+687">New Caledonia (+687)</option>
                                <option value="+64">New Zealand (+64)</option>
                                <option value="+505">Nicaragua (+505)</option>
                                <option value="+227">Niger (+227)</option>
                                <option value="+234">Nigeria (+234)</option>
                                <option value="+683">Niue (+683)</option>
                                <option value="+672">Norfolk Island (+672)</option>
                                <option value="+47">Norway (+47)</option>
                                <option value="+968">Oman (+968)</option>
                                <option value="+92">Pakistan (+92)</option>
                                <option value="+680">Palau (+680)</option>
                                <option value="+970">Palestine (+970)</option>
                                <option value="+507">Panama (+507)</option>
                                <option value="+675">Papua New Guinea (+675)</option>
                                <option value="+595">Paraguay (+595)</option>
                                <option value="+51">Peru (+51)</option>
                                <option value="+63">Philippines (+63)</option>
                                <option value="+48">Poland (+48)</option>
                                <option value="+351">Portugal (+351)</option>
                                <option value="+1-787">Puerto Rico (+1-787)</option>
                                <option value="+1-939">Puerto Rico (+1-939)</option>
                                <option value="+974">Qatar (+974)</option>
                                <option value="+40">Romania (+40)</option>
                                <option value="+7">Russia (+7)</option>
                                <option value="+250">Rwanda (+250)</option>
                                <option value="+685">Samoa (+685)</option>
                                <option value="+378">San Marino (+378)</option>
                                <option value="+239">Sao Tome and Principe (+239)</option>
                                <option value="+966">Saudi Arabia (+966)</option>
                                <option value="+221">Senegal (+221)</option>
                                <option value="+381">Serbia (+381)</option>
                                <option value="+248">Seychelles (+248)</option>
                                <option value="+232">Sierra Leone (+232)</option>
                                <option value="+65">Singapore (+65)</option>
                                <option value="+421">Slovakia (+421)</option>
                                <option value="+386">Slovenia (+386)</option>
                                <option value="+677">Solomon Islands (+677)</option>
                                <option value="+252">Somalia (+252)</option>
                                <option value="+27">South Africa (+27)</option>
                                <option value="+82">South Korea (+82)</option>
                                <option value="+34">Spain (+34)</option>
                                <option value="+94">Sri Lanka (+94)</option>
                                <option value="+249">Sudan (+249)</option>
                                <option value="+597">Suriname (+597)</option>
                                <option value="+268">Swaziland (+268)</option>
                                <option value="+46">Sweden (+46)</option>
                                <option value="+41">Switzerland (+41)</option>
                                <option value="+963">Syria (+963)</option>
                                <option value="+886">Taiwan (+886)</option>
                                <option value="+992">Tajikistan (+992)</option>
                                <option value="+255">Tanzania (+255)</option>
                                <option value="+66">Thailand (+66)</option>
                                <option value="+670">Timor-Leste (+670)</option>
                                <option value="+228">Togo (+228)</option>
                                <option value="+690">Tokelau (+690)</option>
                                <option value="+676">Tonga (+676)</option>
                                <option value="+1-868">Trinidad and Tobago (+1-868)</option>
                                <option value="+216">Tunisia (+216)</option>
                                <option value="+90">Turkey (+90)</option>
                                <option value="+993">Turkmenistan (+993)</option>
                                <option value="+688">Tuvalu (+688)</option>
                                <option value="+256">Uganda (+256)</option>
                                <option value="+380">Ukraine (+380)</option>
                                <option value="+971">United Arab Emirates (+971)</option>
                                <option value="+44">United Kingdom (+44)</option>
                                <option value="+1">United States (+1)</option>
                                <option value="+598">Uruguay (+598)</option>
                                <option value="+998">Uzbekistan (+998)</option>
                                <option value="+678">Vanuatu (+678)</option>
                                <option value="+58">Venezuela (+58)</option>
                                <option value="+84">Vietnam (+84)</option>
                                <option value="+681">Wallis and Futuna (+681)</option>
                                <option value="+967">Yemen (+967)</option>
                                <option value="+260">Zambia (+260)</option>
                                <option value="+263">Zimbabwe (+263)</option>
                            </select>
                            <label data-default-mssg="" class="input_alert isd_code-inp-alert"></label>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <input type="number" class="form-control style-border" name="phone" id="phone" placeholder="Phone Number" required>
                            <label data-default-mssg="" class="input_alert phone-inp-alert"></label>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="email" class="form-control style-border" name="email" id="email" placeholder="Email Address" required>
                            <label data-default-mssg="" class="input_alert email-inp-alert"></label>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <select name="category" id="category" class="form-select style-border" required>
                                <option value="" disabled selected hidden>Category</option>
                                <option value="General Inquiry">General Inquiry</option>
                                <option value="Job Opportunity">Job Opportunity</option>
                                <option value="Feedback">Feedback</option>
                                <option value="Flat">Flat</option>
                                <option value="Plots">Plots</option>
                                <option value="Villa">Villa</option>
                            </select>
                            <label data-default-mssg="" class="input_alert category-inp-alert"></label>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <textarea class="form-control style-border" name="message" id="message" cols="30" rows="4" placeholder="Your Message" required></textarea>
                            <label data-default-mssg="" class="input_alert message-inp-alert"></label>
                        </div>
                    </div>
                </div>
                <div class="form-btn col-12 text-center">
                    <button type="submit" class="btn w-100 style4" onclick="quick_contact()">Submit Now</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ============================= -->
    <!-- Header Section End  -->
    <!-- ============================= -->

    <!-- ============================= -->
    <!-- Body Section Start  -->
    <!-- ============================= -->
    <?php
    if (file_exists("templates/" . $pg_nm . "/" . $pg_nm . ".php")) {
        include("templates/" . $pg_nm . "/" . $pg_nm . ".php");
    }
    ?>
    <!-- ============================= -->
    <!-- Body Section End  -->
    <!-- ============================= -->
    <!-- ============================= -->
    <!-- Footer Section Start  -->
    <!-- ============================= -->

    <footer class="footer-wrapper footer-layout1 overflow-hidden" data-bg-src="url(assets/img/bg/footer-bg-1.svg)">
        <div class="container">
            <div class="footer-top">
                <div class="row gy-2 align-items-center justify-content-center">
                    <div class="col-lg-12 col-md-12">
                        <a href="https://maps.app.goo.gl/QoypPM8x3Q282Pu97" target="_blank">
                            <div class="info-card" style="background-color: linear-gradient(75.7deg, rgb(34, 126, 34) 3.8%, rgb(99, 162, 17) 87.1%);">
                                <div class="info-card_icon">
                                    <i class="fas fa-map-marker-alt" style="color: #fc104a;"></i>
                                </div>
                                <div class="info-card_content">
                                    <h4 class="info-card_title">Our Corporate Location</h4>
                                    <p class="info-card_text"><?php echo $system_address ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <a href="tel:<?php echo $system_ph_num ?>">
                            <div class="info-card" style="background-color: linear-gradient(75.7deg, rgb(34, 126, 34) 3.8%, rgb(99, 162, 17) 87.1%);">
                                <div class="info-card_icon">
                                    <i class="fas fa-phone-alt" style="color: #0288d1;"></i>
                                </div>
                                <div class="info-card_content">
                                    <h4 class="info-card_title">Call us</h4>
                                    <p class="info-card_text"><?php echo $system_ph_num; ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <a href="mailto:<?php echo $system_email ?>">
                            <div class="info-card" style="background-color: linear-gradient(75.7deg, rgb(34, 126, 34) 3.8%, rgb(99, 162, 17) 87.1%);">
                                <div class="info-card_icon">
                                    <i class="fas fa-envelope" style="color: black"></i>
                                </div>

                                <div class="info-card_content">
                                    <h4 class="info-card_title">Our Email</h4>
                                    <p class="info-card_text"><?php echo $system_email; ?></p>
                                </div>

                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="widget-area">
                <div class="row justify-content-between">
                    <div class="col-md-6 col-xl-3 col-lg-4">
                        <div class="widget footer-widget">
                            <div class="widget-about">
                                <div class="footer-logo">
                                    <a href="<?php echo $baseUrl; ?>/home"><img src="upload_content/upload_img/system_img/<?php echo $system_logo == "" ? "no_image.png" : $system_logo ?>" alt="Grihonirman"></a>
                                </div>
                                <p class="about-text">Griho Nirman is committed to showcasing properties that meet
                                    high standards of quality and providing clear, honest information about each
                                    project, ensuring transparency throughout the buying process.</p>
                                <div class="social-btn style2">
                                    <a href="https://www.facebook.com/profile.php?id=61562931081728profile.php?id=61562931081728" tabindex="0"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://twitter.com/" tabindex="0"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.instagram.com/" tabindex="0"><i class="fab fa-instagram"></i></a>
                                    <a href="https://linkedin.com/" tabindex="0"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto col-lg-4">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Quick Link</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <li><a href="<?php echo $baseUrl ?>/home">Home</a></li>
                                    <li><a href="<?php echo $baseUrl ?>/about">About Us</a></li>
                                    <li><a href="<?php echo $baseUrl ?>/testimonial">Testimonial</a></li>
                                    <li><a href="<?php echo $baseUrl ?>/portfolio">Our Project</a></li>
                                    <li><a href="<?php echo $baseUrl ?>/contact">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 col-lg-4">
                        <div class="widget footer-widget">
                            <h3 class="widget_title">Our Project</h3>
                            <div class="recent-post-wrap">
                                <div class="recent-post">
                                    <div class="media-img">
                                        <a href="./basbhumi"><img src="assets/img/widget/recent-post1-1.jpg" alt="Blog Image"></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="post-title"><a class="text-inherit" href="./basbhumi">Green View</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="widget footer-widget">
                            <h3 class="widget_title">Newsletter</h3>
                            <p class="footer-text">Your opinion is important to us. So contact us for any service.</p>
                            <form class="newsletter-form">
                                <div class="form-group">
                                    <input class="form-control" type="email" placeholder="Your Email Address" required="">
                                </div>
                                <button type="submit" class="btn"><i class="fas fa-paper-plane"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-wrap">
            <div class="container">
                <div class="row gy-3 justify-content-lg-between justify-content-center">
                    <div class="col-auto align-self-center">
                        <p class="copyright-text">© Copyright 2024 <a href="#"><?php echo $system_name; ?></a> All Rights Reserved</p>
                    </div>
                    <div class="col-auto align-self-center">
                        <div class="footer-links">
                            <ul>
                                <li><a href="./maintenance">Privacy Policy</a></li>
                                <li><a href="./maintenance">Terms & Condition</a></li>
                                <li><a href="./career">Join Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll To Top -->
    <div class="scroll-top">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
        </svg>
    </div>
    <div class="whatsapp-sticky-main">
        <a href="https://wa.me/9147390718?text=" target="_blank" class="whatsapp-sticky">
            <span>Need Help?Let's Chat</span>
            <img src="assets/icon/whatsapp.png" alt="whatsapp">
        </a>
    </div>


    <!-- ============================= -->
    <!-- Footer Section End  -->
    <!-- ============================= -->
    <script src="frontend_assets/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="frontend_assets/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- WEB SITE JS START  -->
    <!-- Jquery -->
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <!-- Slick Slider -->
    <script src="assets/js/slick.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Magnific Popup -->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Counter Up -->
    <script src="assets/js/jquery.counterup.min.js"></script>
    <!-- Range Slider -->
    <script src="assets/js/jquery-ui.min.js"></script>
    <!-- Isotope Filter -->
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <!-- Main Js File -->
    <script src="assets/js/modal.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- WEB SITE JS End -->

    <script src="frontend_assets/assets/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
    <script src="frontend_assets/assets/global/plugins/bootstrap-sweetalert/sweetalert.js" type="text/javascript"></script>
    <script src="frontend_assets/common_assets/main_controller.js" type="text/javascript"></script>
    <script>
        window.embeddedChatbotConfig = {
            chatbotId: "a9OqzUxQZ1E5DEnTOInm-",
            domain: "www.chatbase.co"
        }
    </script>
    <script src="https://www.chatbase.co/embed.min.js" chatbotId="a9OqzUxQZ1E5DEnTOInm-" domain="www.chatbase.co" defer>
    </script>
    <?php
    if (file_exists("templates/" . $pg_nm . "/page_details/js.php")) {
        include("templates/" . $pg_nm . "/page_details/js.php");
    }
    ?>
</body>

</html>