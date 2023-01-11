<?php
require_once 'admin/core/init.php';

if(isset($_GET['post']))
{
    $post = $_GET['post'];
}
else
{
    $post = 1;
}


$properties = $user->getCategories();

$arrCaOver = array();

foreach ($properties as $key => $value) {
    $place =array(
        "ca_id" => trim($value['ca_id']," "),
        "ca_name" => trim($value['ca_name']," "),
        "ca_type" => trim($value['ca_type']," "),
    );

    $arrCaOver[] = $place;
}
$finalArrCaOver =  json_encode($arrCaOver);


$propAllCourses = $user->getAllCourses();
$propAllCmts = $user->getAllCmts();
$propAllEvents= $user->getAllEvents();

$arrAllCourses = array();
$arrAllCmts = array();
$arrCaOverNav = array();
$arrAllEvents = array();

foreach ($propAllCmts as $key => $value) {
  $place =array(
      "cm_id" => trim($value['cm_id']," "),
      "cm_name" => trim($value['cm_name']," "),
      "cm_desc" => trim($value['cm_desc']," "),
      "cm_info" => trim($value['cm_info']," "),
      "cm_image" => trim($value['cm_image']," "),
  );

  $arrAllCmts[] = $place;
}

foreach ($propAllCourses as $key => $value) {
  $place =array(
      "c_id" => trim($value['c_id']," "),
      "c_title" => trim($value['c_title']," "),
      "c_dur" => trim($value['c_dur']," "),
      "c_start" => trim($value['c_start']," "),
      "c_type" => trim($value['c_type']," "),
      "c_image" => trim($value['c_image']," "),
      "i_id" => trim($value['i_id']," "),
      "i_name" => trim($value['i_name']," "),
      "i_image" => trim($value['i_image']," "),
      "c_ca_id" => trim($value['c_ca_id']," "),
  );

  $arrAllCourses[] = $place;
}

foreach ($propAllEvents as $key => $value) {
  $place =array(
      "e_id" => trim($value['e_id']," "),
      "e_title" => trim($value['e_title']," "),
      "e_desc" => trim($value['e_desc']," "),
      "e_image" => trim($value['e_image']," "),
      "s_id" => trim($value['s_id']," "),
      "s_name" => trim($value['s_name']," "),
      "e_image" => trim($value['e_image']," "),
      "e_s_id" => trim($value['e_s_id']," "),
  );

  $arrAllEvents[] = $place;
}

$properties = $user->getInstructors();

$arrInstruts = array();

foreach ($properties as $key => $value) {
    $place =array(
        "i_id" => trim($value['i_id']," "),
        "i_name" => trim($value['i_name']," "),
        "i_type" => trim($value['i_type']," "),
        "i_image" => trim($value['i_image']," "),
        "i_main_role" => trim($value['i_main_role']," "),
    );

    $arrInstruts[] = $place;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tagss -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="A Myanmar(Burma) based AI and IT training school. We provide best quality courses. Learn more about us. " />
<meta name="keywords" content="Simbolo, Simbolo Myanmar, AI Myanmar, Artificial Intelligence, Myanmar Learning, IT Learning, IT Myanmar, Myanmar AI, Myanmar Tech" />




<!-- Favicon icon-->
<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon/favicon.png">


<!-- Libs CSS -->
<link href="assets/fonts/feather/feather.css" rel="stylesheet">
<link href="assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
<link href="assets/libs/dragula/dist/dragula.min.css" rel="stylesheet" />
<link href="assets/libs/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />
<link href="assets/libs/dropzone/dist/dropzone.css" rel="stylesheet" />
<link href="assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet" />
<link href="assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
<link href="assets/libs/@yaireo/tagify/dist/tagify.css" rel="stylesheet">
<link href="assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet">
<link href="assets/libs/tippy.js/dist/tippy.css" rel="stylesheet">
<link href="assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="assets/libs/prismjs/themes/prism-okaidia.min.css" rel="stylesheet">
<link href="assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet">
<link href="assets/libs/nouislider/dist/nouislider.min.css" rel="stylesheet">
<link href="assets/libs/glightbox/dist/css/glightbox.min.css" rel="stylesheet">
<style>
@media (pointer: coarse) {
  .svg-container {
    /* background: #555; */
   /* width: 300px;
   height: 150px; */
   resize: both;
   position: absolute;
   /* overflow: scroll; */
   pointer-events: none !important;
   /* border: 1px dashed #aaa; */
  }
}

@media (pointer: none) {
  .svg-container {
    /* background: #555; */
   /* width: 300px;
   height: 150px; */
   resize: both;
   position: absolute;
   /* overflow: scroll; */
   pointer-events: none !important;
   /* border: 1px dashed #aaa; */
  }
}

@media (pointer: fine) {
  .svg-container {
    /* background: #000; */
   /* width: 300px;
   height: 150px; */
   resize: both;
   position: absolute;
   /* overflow: scroll; */
   /* pointer-events: none; */
   /* border: 1px dashed #aaa; */
  }
}

@font-face {
    font-family: made_tommy;
    src: url("assets/fonts/made_tommy/made_tommy_regular.otf") format("opentype");
}

@font-face {
    font-family: made_tommy;
    src: url("assets/fonts/made_tommy/made_tommy_black.otf") format("opentype");
    font-weight: 600;
}

@font-face {
    font-family: made_tommy;
    src: url("assets/fonts/made_tommy/made_tommy_bold.otf") format("opentype");
    font-weight: 700;
}

@font-face {
    font-family: made_tommy;
    src: url("assets/fonts/made_tommy/made_tommy_extrabold.otf") format("opentype");
    font-weight: 800;
}

@font-face {
    font-family: made_tommy;
    src: url("assets/fonts/made_tommy/made_tommy_light.otf") format("opentype");
    font-weight: 300;
}

@font-face {
    font-family: made_tommy;
    src: url("assets/fonts/made_tommy/made_tommy_medium.otf") format("opentype");
    font-weight: 500;
}

@font-face {
    font-family: made_tommy;
    src: url("assets/fonts/made_tommy/made_tommy_thin.otf") format("opentype");
    font-weight: 200;
}

.fixed-top.scrolled {
    background-color: #fff !important;
    transition: background-color 200ms linear;
    box-shadow:0 1px 3px rgba(3,0,71,.09) !important;
}
.fixed-top.mobile-click {
    background-color: #fff !important;
    transition: background-color 200ms linear;
    box-shadow:0 1px 3px rgba(3,0,71,.09) !important;
}


.btn-page {
    background-color: #000 !important;
    color: #fff !important;
    font-size: 14px !important;
    border-radius: 10px !important;
    font-weight: bold !important;
}



.box {
        align-self: flex-end;
        /* animation-duration: 5s;
        animation-iteration-count: infinite; */
        background-color: #F44336;
        height: 200px;
        margin: 0 auto 0 auto;
        transform-origin: bottom;
        width: 200px;
    }
.bounce-7 {
    animation-duration: 5s;
    /* animation-iteration-count: infinite; */
    animation-name: bounce-7;
    animation-timing-function: cubic-bezier(0.280, 0.840, 0.420, 1);
}
@keyframes bounce-7 {
  0%   { transform: scale(1,1) translateY(0); }
  10%  { transform: scale(1.1,.9) translateY(0); }
  10%  { transform: scale(.98,1.02)   translateY(-40px);}
  15%  { transform: scale(1.05,.95) translateY(0); }
  20%  { transform: scale(1,1) translateY(-7px); }
  30%  { transform: scale(1,1) translateY(0);}
  100% { transform: scale(1,1) translateY(0);}
}

/* @keyframes bounce-7 {
  0%   { transform: scale(1,1) translateY(0); }
  10%  { transform: scale(1.1,.9) translateY(0); }
  10%  { transform: scale(.98,1.008)   translateY(-40px);}
  15%  { transform: scale(1.05,.95) translateY(0); }
  20%  { transform: scale(1,1) translateY(-7px); }
  30%  { transform: scale(1,1) translateY(0);}
  100% { transform: scale(1,1) translateY(0);}
} */

@keyframes bounce {
        0%   { transform: scale(1,1) translateY(0); }
        10%  { transform: scale(1.1,.9) translateY(0); }
        30%  { transform: scale(.9,1.1)   translateY(-55px);}
        50%  { transform: scale(1.05,.95) translateY(0); }
        58%  { transform: scale(1,1) translateY(-7px); }
        65%  { transform: scale(1,1) translateY(0);}
        100% { transform: scale(1,1) translateY(0);}
    }

@-webkit-keyframes bounce {
       0%   { transform: scale(1,1) translateY(0); }
        10%  { transform: scale(1.1,.9) translateY(0); }
        30%  { transform: scale(.9,1.1)   translateY(-55px);}
        50%  { transform: scale(1.05,.95) translateY(0); }
        58%  { transform: scale(1,1) translateY(-7px);}
        65%  { transform: scale(1,1) translateY(0);}
        100% { transform: scale(1,1) translateY(0);}
}

.shadow, .shadow-two {
  position: absolute;
  top:82px;
  z-index:-1;
}

.shadow:before, .shadow:after, .shadow-two:before, .shadow-two:after {
  content:"";
  position: absolute;
  background-color: rgba(0,0,0,0.4);
  width: 50px;
  height:5px;
  border-radius:50%;
  top:0;
}

.shadow:before {
  left: 116px;
  animation: scale 1s linear infinite .2s;
  -webkit-animation: scale 1s linear infinite .2s;
}

.shadow:after {
  left:175px;
  animation: scale 1s linear infinite .3s;
  -webkit-animation: scale 1s linear infinite .3s;
}

.shadow-two:before {
  left:232px;
  animation: scale 1s linear infinite .4s;
  -webkit-animation: scale 1s linear infinite .4s;
}

.shadow-two:after {
  left: 285px;
  animation: scale 1s linear infinite .5s;
  -webkit-animation: scale 1s linear infinite .5s;
}




.svg-container svg {
 width: 100%;
 height: 100%;
}

a.dropdown-item.dropdown-list-group-item.dropdown-toggle.text-uppercase::after {
  position: absolute;
}
</style>
<!-- Theme CSS -->
<link rel="stylesheet" href="assets/css/theme.min.css">

  <title>Simbolo | AI & Tech Learning Platform</title>
</head>

<body class="bg-white">
  <!-- navbar login -->
<nav class="navbar navbar-expand-lg navbar-default fixed-top navbar-scroll" style="font-family: made_tommy !important; background:transparent; box-shadow: none;">
  <div class="container px-0" style="padding-left: 10px !important; padding-right: 10px !important;">
		<a class="navbar-brand" style="padding-bottom: 0 !important;" href="/"
			><img src="assets/images/brand/logo/logo.svg" width="160px;" alt=""
		/></a>

		<!-- Button -->
		<button
			class="navbar-toggler collapsed"
			type="button"
			data-bs-toggle="collapse"
			data-bs-target="#navbar-default"
			aria-controls="navbar-default"
			aria-expanded="false"
			aria-label="Toggle navigation"
		>
			<span class="icon-bar top-bar mt-0"></span>
			<span class="icon-bar middle-bar"></span>
			<span class="icon-bar bottom-bar"></span>
		</button>
		<!-- Collapse -->
		<div class="collapse navbar-collapse" id="navbar-default">
			<ul class="navbar-nav ms-auto">

				<li class="nav-item">
            <a class="nav-link"  href="index.php" style="font-weight: medium !important; font-size: 16px;  margin-right: 8px;">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="courses.php" style="font-weight: medium !important; font-size: 16px;  margin-right: 8px;">COURSES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php" style="font-weight: medium !important; font-size: 16px; margin-right: 8px;">ABOUT</a>
        </li>
        <li class="nav-item dropdown">
					<a
						class="nav-link dropdown-toggle"
						href="#"
						id="navbarPages"
						data-bs-toggle="dropdown"
						aria-haspopup="true"
						aria-expanded="false"
            style="font-weight: medium !important; font-size: 16px; margin-right: 8px;">
						CATEGORIES
					</a>
					<ul
						class="dropdown-menu dropdown-menu-arrow dropdown-menu-end"
						aria-labelledby="navbarPages"
					>
            <?php foreach ($arrCaOver as $singleTitle): ?>
              <li class="dropdown-submenu dropend">
								<a
									class="dropdown-item dropdown-list-group-item dropdown-toggle text-uppercase"
									href="#"
																	style="font-weight: medium !important; font-size: 15px; text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden; display: block !important; width: 200px;"
								>
                  <?php echo $singleTitle["ca_name"]; ?>
								</a>
								<ul class="dropdown-menu">
                  <?php
                    foreach ($arrAllCourses as $key => $value) {
                      if($singleTitle["ca_id"] == $value['c_ca_id']) {
                        echo
                        '<li>
      										<a
      											class="dropdown-item text-uppercase"
      											href="course-single-v2.php?id='. $value['c_id'] .'"
      																					style="font-weight: medium !important; font-size: 15px; text-overflow: ellipsis !important; white-space: nowrap !important; overflow: hidden; display: block !important;"
      										>
      											'. $value['c_title'] .'
      										</a>
      									</li>';
                      }
                    }
                  ?>

								</ul>
							</li>
            <?php endforeach; ?>
					</ul>
				</li>
			</ul>

			<div class="ms-2 mt-3 mt-lg-0">
        <a href="contact.php" class="btn btn-page">CONTACT US</a>
			</div>
		</div>
	</div>
</nav>


  <!-- Page Content -->
  <!-- <div style="height: 100px;">
  </div> -->
  <div class="py-lg-1 py-8 bg-cover " style="padding-top: 0px !important; padding-bottom: 100px !important; background-image: url('assets/images/vectors/landing-vector2b1.svg'), url('assets/images/vectors/landing-vector1.svg');">
  <!-- container -->
    <div class="container pt-17">
      <!-- row -->
      <div class="row align-items-center">
        <div class="col-lg-6 col-12" style="padding: 0 0 0 10px !important;">
          <div class="">
            <div class=" text-center text-md-start " style="font-family: made_tommy !important;">
              <!-- heading -->
              <h1 class="mb-3" style="font-family: made_tommy !important; font-size: 48px; font-weight: bold;">LET'S LEARN ARTIFICIAL INTELLIGENCE & IT WITH SIMBOLO</h1>
              <!-- lead -->
              <p class="lead mt-3 mb-6" style="font-family: made_tommy !important;">A Myanmar(Burma) based AI and IT training school. We provide best quality courses. Learn more about us.</p>
            </div>
            <div class="mt-10 mt-lg-0">
                <a href="#all-courses" class="btn btn-page" style="font-family: made_tommy;">VIEW COURSES</a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-12 text-center" style="padding-right: 10px !important;">
          <div class="shadow"></div>
          <div class="position-relative svg-container">

            <svg width="636" height="573" viewBox="0 0 636 573" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M489.68 104.646C365.679 77.1463 341.59 0.0325409 297.68 0.0325623C199.179 0.032624 202.68 131.146 82.5494 148.131C-86.6943 172.059 39.1798 330.146 172.733 482.826C313.915 644.226 396.101 550.521 410.949 491.715C430.179 377.146 478.852 367.836 585.155 280.582C691.459 193.327 613.68 132.146 489.68 104.646Z" fill="#FFAAAA" fill-opacity="0.4"/>
              <g class="box" id="happy-character">
                <path d="M245.481 191.314C246.063 194.576 244.665 197.487 243.384 200.282C232.786 222.41 221.839 244.345 210.542 266.087C210.345 266.562 210.044 266.986 209.661 267.329C209.278 267.672 208.823 267.924 208.329 268.068C207.145 268.032 205.987 267.712 204.952 267.136C195.053 262.36 185.037 257.586 175.138 252.691C173.507 251.876 171.761 251.061 170.829 249.664C169.431 247.566 170.829 245.47 172.226 243.956C184.687 230.214 197.264 216.356 209.728 202.613C213.105 198.768 242.104 171.051 245.481 191.314Z" fill="#A82626" stroke="#191515" stroke-miterlimit="10"/>
                <path d="M245.481 178.737C246.063 181.998 244.665 184.909 243.384 187.704C232.786 209.832 221.839 231.767 210.542 253.509C210.345 253.984 210.044 254.409 209.661 254.751C209.278 255.094 208.823 255.347 208.329 255.49C207.145 255.454 205.987 255.135 204.952 254.558C195.053 249.782 185.037 245.008 175.138 240.113C173.507 239.299 171.761 238.483 170.829 237.086C169.431 234.989 170.829 232.892 172.226 231.378C184.687 217.636 197.264 203.778 209.728 190.035C213.105 186.19 242.104 158.473 245.481 178.737Z" fill="#CA4343" stroke="#191515" stroke-miterlimit="10"/>
                <path d="M224.751 160.105C225.266 159.679 225.811 159.29 226.381 158.941C229.293 157.31 232.671 156.378 235.116 154.282C236.63 152.884 237.096 150.905 238.611 149.506C241.522 146.711 243.967 143.101 247.927 142.286C250.955 141.704 251.421 145.431 252.469 147.643C253.753 150.672 255.034 153.7 256.313 156.728C257.101 158.232 257.463 159.923 257.36 161.619C256.778 165.23 252.117 167.792 249.558 170.121C246.413 172.916 243.967 177.691 240.123 179.671C239.193 179.205 238.959 178.157 238.261 177.575C237.329 176.759 235.815 176.409 234.767 175.827C232.438 174.543 230.225 173.032 227.896 171.868C225.328 170.703 221.839 169.072 221.723 165.812C221.61 163.481 223.12 161.501 224.751 160.105Z" fill="#CA4343" stroke="#191515" stroke-miterlimit="10"/>
                <path d="M235.582 163.131C236.645 162.761 237.808 162.803 238.842 163.247C241.577 164.165 244.052 165.722 246.064 167.789" stroke="#191515" stroke-miterlimit="10"/>
                <path d="M245.016 159.404C245.842 162.443 247.448 165.213 249.674 167.441" stroke="#191515" stroke-miterlimit="10"/>
                <path d="M223.47 168.371C224.698 167.983 226.027 168.066 227.197 168.605C232.847 170.489 237.638 174.33 240.706 179.435" stroke="#191515" stroke-miterlimit="10"/>
                <path d="M305.226 122.369L304.993 151.485" stroke="#191515" stroke-width="6" stroke-miterlimit="10"/>
                <path d="M312.096 122.137C312.213 125.514 309.301 128.31 305.462 128.425C301.735 128.542 298.592 125.979 298.475 122.602C298.358 119.225 301.27 116.429 305.109 116.314C308.948 116.198 311.981 118.759 312.096 122.137Z" fill="white" stroke="#191515" stroke-miterlimit="10"/>
                <path d="M215.434 203.777C227.662 187.941 242.453 173.962 260.155 163.946C273.898 156.144 289.504 151.368 305.575 151.951C358.219 153.814 394.552 204.126 394.552 204.126C394.552 204.126 434.615 248.032 437.643 317.793C440.671 387.553 378.481 418.764 378.481 418.764C378.481 418.764 303.367 464.65 223.935 413.521C223.935 413.521 165.941 378.467 173.624 309.754C176.885 281.105 185.386 252.687 199.828 227.183C204.583 219.092 209.793 211.277 215.434 203.777Z" fill="white" stroke="#191515" stroke-width="3" stroke-miterlimit="10"/>
                <path d="M231.622 230.213C231.622 230.213 241.87 186.771 291.483 179.32C291.483 179.32 324.674 172.332 351.577 192.596C378.48 212.861 380.81 233.47 380.81 233.47C382.906 240.692 383.838 249.775 381.741 256.996C379.179 265.847 368.814 274.116 359.613 278.192C345.289 284.719 328.984 285.995 313.262 286.228C290.784 286.578 266.677 287.393 246.646 275.863C243.242 274.022 240.203 271.575 237.678 268.642C233.819 264.067 231.105 258.639 229.76 252.806C228.398 245.242 229.04 237.453 231.622 230.213V230.213Z" fill="#191515" stroke="white" stroke-width="0.5" stroke-miterlimit="10"/>
                <path d="M241.171 214.84C240.123 208.551 251.188 199.7 254.914 196.436C265.47 187.61 278.311 181.957 291.949 180.132C330.847 174.542 353.673 195.738 353.673 195.738C357.982 199.348 366.019 205.055 367.998 210.183C370.56 216.938 360.778 219.849 356.236 221.712C344.232 226.579 331.737 230.131 318.968 232.305C301.615 235.1 283.33 234.98 266.56 229.394C262.066 227.892 257.703 226.022 253.516 223.803C250.372 222.173 244.314 219.611 242.103 216.816C241.632 216.246 241.312 215.566 241.171 214.84Z" fill="#232222"/>
                <path d="M273.665 249.196C276.866 249.196 279.996 248.247 282.658 246.468C285.32 244.689 287.395 242.161 288.62 239.203C289.846 236.245 290.166 232.99 289.542 229.85C288.917 226.71 287.375 223.825 285.111 221.561C282.847 219.297 279.963 217.756 276.823 217.131C273.683 216.506 270.428 216.827 267.47 218.052C264.512 219.277 261.984 221.352 260.205 224.014C258.426 226.677 257.477 229.806 257.477 233.008C257.476 235.134 257.895 237.239 258.709 239.203C259.522 241.167 260.714 242.952 262.218 244.455C263.721 245.958 265.505 247.151 267.47 247.964C269.434 248.778 271.539 249.196 273.665 249.196V249.196Z" fill="white" stroke="#191515" stroke-miterlimit="10"/>
                <path d="M338.418 249.196C341.619 249.196 344.749 248.247 347.411 246.468C350.073 244.689 352.148 242.161 353.373 239.203C354.599 236.245 354.919 232.99 354.295 229.85C353.67 226.71 352.128 223.825 349.864 221.561C347.6 219.297 344.716 217.756 341.576 217.131C338.435 216.506 335.181 216.827 332.223 218.052C329.265 219.277 326.736 221.352 324.958 224.014C323.179 226.677 322.229 229.806 322.229 233.008C322.229 237.301 323.935 241.419 326.971 244.455C330.007 247.491 334.124 249.196 338.418 249.196V249.196Z" fill="white" stroke="#191515" stroke-miterlimit="10"/>
                <path d="M229.176 185.608C230.605 185.147 232.005 184.602 233.37 183.977C237.329 182.58 241.288 181.302 245.364 180.134C259.367 176.184 273.721 173.61 288.223 172.448C308.485 170.772 328.882 172.027 348.785 176.175C354.258 177.339 359.616 178.737 364.973 180.251C367.768 181.066 370.447 181.998 373.242 182.926C375.572 183.741 378.133 184.21 380.229 185.72C379.531 184.206 377.434 182.692 376.154 181.528C371.146 176.986 366.022 172.444 360.664 168.251C357.52 165.806 353.793 162.428 349.949 161.03L348.552 160.681C344.01 159.633 339.468 159.167 334.81 158.469C327.588 157.421 320.251 156.606 312.914 156.139C293.582 155.091 273.431 156.256 255.149 162.894C255.147 163.015 227.08 182.93 229.176 185.608Z" fill="#CA4343" stroke="#191515" stroke-miterlimit="10"/>
                <path d="M318.735 251.292C318.502 252.576 316.638 254.204 315.591 254.903C314.232 255.951 312.692 256.74 311.049 257.232C307.725 258.125 304.219 258.085 300.916 257.116C297.772 256.301 294.744 254.67 293.462 251.873C293.23 251.407 294.045 250.825 294.746 250.941C295.562 251.064 296.307 251.477 296.842 252.105C299.329 254.083 302.371 255.236 305.544 255.403C308.717 255.57 311.864 254.743 314.544 253.037C315.412 252.402 316.23 251.701 316.99 250.941C317.454 250.477 318.968 249.895 318.735 251.292Z" fill="white" stroke="white" stroke-width="0.75" stroke-miterlimit="10"/>
                <path d="M328.985 210.415C329.607 210.415 330.215 210.231 330.732 209.885C331.249 209.539 331.652 209.048 331.89 208.474C332.128 207.899 332.19 207.267 332.069 206.657C331.948 206.047 331.648 205.486 331.208 205.047C330.768 204.607 330.208 204.307 329.598 204.186C328.988 204.065 328.356 204.127 327.781 204.365C327.207 204.603 326.715 205.006 326.37 205.523C326.024 206.04 325.84 206.648 325.84 207.27C325.84 207.683 325.921 208.092 326.079 208.474C326.237 208.855 326.469 209.202 326.761 209.494C327.053 209.786 327.399 210.018 327.781 210.176C328.163 210.334 328.572 210.415 328.985 210.415V210.415Z" fill="white"/>
                <path d="M328.984 206.826C328.984 206.826 332.828 206.127 335.156 207.642C335.389 207.758 335.971 208.34 336.205 207.875C336.555 207.293 335.273 206.361 334.921 206.011C334.262 205.555 333.56 205.165 332.825 204.847C331.654 204.325 330.378 204.086 329.098 204.148L328.984 206.826Z" fill="white"/>
                <path d="M282.166 211.197C281.544 211.197 280.936 211.013 280.419 210.667C279.902 210.322 279.499 209.83 279.261 209.256C279.023 208.681 278.961 208.049 279.082 207.439C279.203 206.829 279.503 206.269 279.943 205.829C280.382 205.389 280.943 205.089 281.553 204.968C282.163 204.847 282.795 204.909 283.37 205.147C283.944 205.385 284.435 205.788 284.781 206.305C285.127 206.822 285.311 207.43 285.311 208.052C285.311 208.465 285.23 208.874 285.072 209.256C284.914 209.638 284.682 209.984 284.39 210.276C284.098 210.568 283.751 210.8 283.37 210.958C282.988 211.116 282.579 211.197 282.166 211.197V211.197Z" fill="white"/>
                <path d="M282.167 207.609C282.167 207.609 278.324 206.911 275.995 208.425C275.762 208.541 275.18 209.123 274.947 208.658C274.597 208.076 275.879 207.144 276.231 206.794C276.889 206.338 277.591 205.948 278.327 205.63C279.497 205.109 280.774 204.869 282.054 204.931L282.167 207.609Z" fill="white"/>
                <g class="happy-eye" id="happy-left-eye">
                  <path d="M274.757 244.279C280.974 244.279 286.013 239.292 286.013 233.139C286.013 226.987 280.974 222 274.757 222C268.541 222 263.5 226.987 263.5 233.139C263.5 239.292 268.541 244.279 274.757 244.279Z" fill="#191515" stroke="#191515" stroke-miterlimit="10"/>
                  <path d="M274.758 228.215C276.183 228.215 277.338 227.06 277.338 225.635C277.338 224.211 276.183 223.056 274.758 223.056C273.334 223.056 272.179 224.211 272.179 225.635C272.179 227.06 273.334 228.215 274.758 228.215Z" fill="white"/>
                  <path d="M275.227 243.693C275.874 243.693 276.399 243.168 276.399 242.519C276.399 241.872 275.874 241.347 275.227 241.347C274.579 241.347 274.054 241.872 274.054 242.519C274.054 243.168 274.579 243.693 275.227 243.693Z" fill="white"/>
                </g>
                <g class="happy-eye" id="happy-right-eye">
                  <path d="M337.257 244.279C343.473 244.279 348.513 239.292 348.513 233.139C348.513 226.987 343.473 222 337.257 222C331.04 222 326 226.987 326 233.139C326 239.292 331.04 244.279 337.257 244.279Z" fill="#191515" stroke="#191515" stroke-miterlimit="10"/>
                  <path d="M335.614 228.215C337.038 228.215 338.193 227.06 338.193 225.635C338.193 224.211 337.038 223.056 335.614 223.056C334.189 223.056 333.034 224.211 333.034 225.635C333.034 227.06 334.189 228.215 335.614 228.215Z" fill="white"/>
                  <path d="M335.614 243.693C336.262 243.693 336.787 243.168 336.787 242.519C336.787 241.872 336.262 241.347 335.614 241.347C334.967 241.347 334.442 241.872 334.442 242.519C334.442 243.168 334.967 243.693 335.614 243.693Z" fill="white"/>
                </g>
              </g>
            </svg>
              <!-- <img style="padding-left: 50px;" src="assets/images/vectors/landing-vector3-happy.svg" class="img-fluid "> -->
              <!-- <svg width="636" height="573" viewBox="0 0 636 573" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M489.68 104.646C365.679 77.1463 341.59 0.0325409 297.68 0.0325623C199.179 0.032624 202.68 131.146 82.5494 148.131C-86.6943 172.059 39.1798 330.146 172.733 482.826C313.915 644.226 396.101 550.521 410.949 491.715C430.179 377.146 478.852 367.836 585.155 280.582C691.459 193.327 613.68 132.146 489.68 104.646Z" fill="#FFAAAA" fill-opacity="0.4"/>
                <g class="box bounce-7">
                  <path class="" d="M245.481 191.314C246.063 194.576 244.665 197.487 243.384 200.282C232.786 222.41 221.839 244.345 210.542 266.087C210.345 266.562 210.044 266.986 209.661 267.329C209.278 267.672 208.823 267.924 208.329 268.068C207.145 268.032 205.987 267.712 204.952 267.136C195.053 262.36 185.037 257.586 175.138 252.691C173.507 251.876 171.761 251.061 170.829 249.664C169.431 247.566 170.829 245.47 172.226 243.956C184.687 230.214 197.264 216.356 209.728 202.613C213.105 198.768 242.104 171.051 245.481 191.314Z" fill="#A82626" stroke="#191515" stroke-miterlimit="10"/>
                  <path class="" d="M245.481 178.737C246.063 181.998 244.665 184.909 243.384 187.704C232.786 209.832 221.839 231.767 210.542 253.509C210.345 253.984 210.044 254.409 209.661 254.751C209.278 255.094 208.823 255.347 208.329 255.49C207.145 255.454 205.987 255.135 204.952 254.558C195.053 249.782 185.037 245.008 175.138 240.113C173.507 239.299 171.761 238.483 170.829 237.086C169.431 234.989 170.829 232.892 172.226 231.378C184.687 217.636 197.264 203.778 209.728 190.035C213.105 186.19 242.104 158.473 245.481 178.737Z" fill="#CA4343" stroke="#191515" stroke-miterlimit="10"/>
                  <path class="" d="M224.751 160.105C225.266 159.679 225.811 159.29 226.381 158.941C229.293 157.31 232.671 156.378 235.116 154.282C236.63 152.884 237.096 150.905 238.611 149.506C241.522 146.711 243.967 143.101 247.927 142.286C250.955 141.704 251.421 145.431 252.469 147.643C253.753 150.672 255.034 153.7 256.313 156.728C257.101 158.232 257.463 159.923 257.36 161.619C256.778 165.23 252.117 167.792 249.558 170.121C246.413 172.916 243.967 177.691 240.123 179.671C239.193 179.205 238.959 178.157 238.261 177.575C237.329 176.759 235.815 176.409 234.767 175.827C232.438 174.543 230.225 173.032 227.896 171.868C225.328 170.703 221.839 169.072 221.723 165.812C221.61 163.481 223.12 161.501 224.751 160.105Z" fill="#CA4343" stroke="#191515" stroke-miterlimit="10"/>
                  <path class="" d="M235.582 163.131C236.645 162.761 237.808 162.803 238.842 163.247C241.577 164.165 244.052 165.722 246.064 167.789" stroke="#191515" stroke-miterlimit="10"/>
                  <path class="" d="M245.016 159.404C245.842 162.443 247.448 165.213 249.674 167.441" stroke="#191515" stroke-miterlimit="10"/>
                  <path class="" d="M223.47 168.371C224.698 167.983 226.027 168.066 227.197 168.605C232.847 170.489 237.638 174.33 240.706 179.435" stroke="#191515" stroke-miterlimit="10"/>
                  <path class="" d="M305.226 122.369L304.993 151.485" stroke="#191515" stroke-width="6" stroke-miterlimit="10"/>
                  <path class="" d="M312.096 122.137C312.213 125.514 309.301 128.31 305.462 128.425C301.735 128.542 298.592 125.979 298.475 122.602C298.358 119.225 301.27 116.429 305.109 116.314C308.948 116.198 311.981 118.759 312.096 122.137Z" fill="white" stroke="#191515" stroke-miterlimit="10"/>
                  <path class="" d="M215.434 203.777C227.662 187.941 242.453 173.962 260.155 163.946C273.898 156.144 289.504 151.368 305.575 151.951C358.219 153.814 394.552 204.126 394.552 204.126C394.552 204.126 434.615 248.032 437.643 317.793C440.671 387.553 378.481 418.764 378.481 418.764C378.481 418.764 303.367 464.65 223.935 413.521C223.935 413.521 165.941 378.467 173.624 309.754C176.885 281.105 185.386 252.687 199.828 227.183C204.583 219.092 209.793 211.277 215.434 203.777V203.777Z" fill="white" stroke="#191515" stroke-width="3" stroke-miterlimit="10"/>
                  <path class="" d="M231.622 230.213C231.622 230.213 241.87 186.771 291.483 179.32C291.483 179.32 324.674 172.332 351.577 192.596C378.48 212.861 380.81 233.47 380.81 233.47C382.906 240.692 383.838 249.775 381.741 256.996C379.179 265.847 368.814 274.116 359.613 278.192C345.289 284.719 328.984 285.995 313.262 286.228C290.784 286.578 266.677 287.393 246.646 275.863C243.242 274.022 240.203 271.575 237.678 268.642C233.819 264.067 231.105 258.639 229.76 252.806C228.398 245.242 229.04 237.453 231.622 230.213V230.213Z" fill="#191515" stroke="white" stroke-width="0.5" stroke-miterlimit="10"/>
                  <path class="" d="M241.171 214.84C240.123 208.551 251.188 199.7 254.914 196.436C265.47 187.61 278.311 181.957 291.949 180.132C330.847 174.542 353.673 195.738 353.673 195.738C357.982 199.348 366.019 205.055 367.998 210.183C370.56 216.938 360.778 219.849 356.236 221.712C344.232 226.579 331.737 230.131 318.968 232.305C301.615 235.1 283.33 234.98 266.56 229.394C262.066 227.892 257.703 226.022 253.516 223.803C250.372 222.173 244.314 219.611 242.103 216.816C241.632 216.246 241.312 215.566 241.171 214.84Z" fill="#232222"/>
                  <path class="" d="M273.665 249.196C276.866 249.196 279.996 248.247 282.658 246.468C285.32 244.689 287.395 242.161 288.62 239.203C289.846 236.245 290.166 232.99 289.542 229.85C288.917 226.71 287.375 223.825 285.111 221.561C282.847 219.297 279.963 217.756 276.823 217.131C273.683 216.506 270.428 216.827 267.47 218.052C264.512 219.277 261.984 221.352 260.205 224.014C258.426 226.677 257.477 229.806 257.477 233.008C257.476 235.134 257.895 237.239 258.709 239.203C259.522 241.167 260.714 242.952 262.218 244.455C263.721 245.958 265.505 247.151 267.47 247.964C269.434 248.778 271.539 249.196 273.665 249.196V249.196Z" fill="white" stroke="#191515" stroke-miterlimit="10"/>
                  <path class="" d="M338.418 249.196C341.619 249.196 344.749 248.247 347.411 246.468C350.073 244.689 352.148 242.161 353.373 239.203C354.599 236.245 354.919 232.99 354.295 229.85C353.67 226.71 352.128 223.825 349.864 221.561C347.6 219.297 344.716 217.756 341.576 217.131C338.435 216.506 335.181 216.827 332.223 218.052C329.265 219.277 326.736 221.352 324.958 224.014C323.179 226.677 322.229 229.806 322.229 233.008C322.229 237.301 323.935 241.419 326.971 244.455C330.007 247.491 334.124 249.196 338.418 249.196V249.196Z" fill="white" stroke="#191515" stroke-miterlimit="10"/>
                  <path class="" d="M229.176 185.608C230.605 185.147 232.005 184.602 233.37 183.977C237.329 182.58 241.288 181.302 245.364 180.134C259.367 176.184 273.721 173.61 288.223 172.448C308.485 170.772 328.882 172.027 348.785 176.175C354.258 177.339 359.616 178.737 364.973 180.251C367.768 181.066 370.447 181.998 373.242 182.926C375.572 183.741 378.133 184.21 380.229 185.72C379.531 184.206 377.434 182.692 376.154 181.528C371.146 176.986 366.022 172.444 360.664 168.251C357.52 165.806 353.793 162.428 349.949 161.03L348.552 160.681C344.01 159.633 339.468 159.167 334.81 158.469C327.588 157.421 320.251 156.606 312.914 156.139C293.582 155.091 273.431 156.256 255.149 162.894C255.147 163.015 227.08 182.93 229.176 185.608Z" fill="#CA4343" stroke="#191515" stroke-miterlimit="10"/>
                  <path class="" d="M318.735 251.292C318.502 252.576 316.638 254.204 315.591 254.903C314.232 255.951 312.692 256.74 311.049 257.232C307.725 258.125 304.219 258.085 300.916 257.116C297.772 256.301 294.744 254.67 293.462 251.873C293.23 251.407 294.045 250.825 294.746 250.941C295.562 251.064 296.307 251.477 296.842 252.105C299.329 254.083 302.371 255.236 305.544 255.403C308.717 255.57 311.864 254.743 314.544 253.037C315.412 252.402 316.23 251.701 316.99 250.941C317.454 250.477 318.968 249.895 318.735 251.292Z" fill="white" stroke="white" stroke-width="0.75" stroke-miterlimit="10"/>
                  <path class="" d="M328.985 210.415C329.607 210.415 330.215 210.231 330.732 209.885C331.249 209.539 331.652 209.048 331.89 208.474C332.128 207.899 332.19 207.267 332.069 206.657C331.948 206.047 331.648 205.486 331.208 205.047C330.768 204.607 330.208 204.307 329.598 204.186C328.988 204.065 328.356 204.127 327.781 204.365C327.207 204.603 326.715 205.006 326.37 205.523C326.024 206.04 325.84 206.648 325.84 207.27C325.84 207.683 325.921 208.092 326.079 208.474C326.237 208.855 326.469 209.202 326.761 209.494C327.053 209.786 327.399 210.018 327.781 210.176C328.163 210.334 328.572 210.415 328.985 210.415V210.415Z" fill="white"/>
                  <path class="" d="M328.984 206.826C328.984 206.826 332.828 206.127 335.156 207.642C335.389 207.758 335.971 208.34 336.205 207.875C336.555 207.293 335.273 206.361 334.921 206.011C334.262 205.555 333.56 205.165 332.825 204.847C331.654 204.325 330.378 204.086 329.098 204.148L328.984 206.826Z" fill="white"/>
                  <path class="" d="M282.166 211.197C281.544 211.197 280.936 211.013 280.419 210.667C279.902 210.322 279.499 209.83 279.261 209.256C279.023 208.681 278.961 208.049 279.082 207.439C279.203 206.829 279.503 206.269 279.943 205.829C280.382 205.389 280.943 205.089 281.553 204.968C282.163 204.847 282.795 204.909 283.37 205.147C283.944 205.385 284.435 205.788 284.781 206.305C285.127 206.822 285.311 207.43 285.311 208.052C285.311 208.465 285.23 208.874 285.072 209.256C284.914 209.638 284.682 209.984 284.39 210.276C284.098 210.568 283.751 210.8 283.37 210.958C282.988 211.116 282.579 211.197 282.166 211.197V211.197Z" fill="white"/>
                  <path class="" d="M282.167 207.609C282.167 207.609 278.324 206.911 275.995 208.425C275.762 208.541 275.18 209.123 274.947 208.658C274.597 208.076 275.879 207.144 276.231 206.794C276.889 206.338 277.591 205.948 278.327 205.63C279.497 205.109 280.774 204.869 282.054 204.931L282.167 207.609Z" fill="white"/>
                </g>
              </svg> -->
              <!-- <svg width="636" height="573" viewBox="0 0 636 573" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M489.68 104.646C365.679 77.1463 341.59 0.0325409 297.68 0.0325623C199.179 0.032624 202.68 131.146 82.5494 148.131C-86.6943 172.059 39.1798 330.146 172.733 482.826C313.915 644.226 396.101 550.521 410.949 491.715C430.179 377.146 478.852 367.836 585.155 280.582C691.459 193.327 613.68 132.146 489.68 104.646Z" fill="#FFAAAA" fill-opacity="0.4"/>
                <path class=""  d="M231.722 154.097C232.421 158.014 230.743 161.51 229.205 164.867C216.477 191.441 203.33 217.783 189.763 243.894C189.526 244.465 189.165 244.974 188.705 245.386C188.245 245.798 187.698 246.101 187.106 246.273C185.684 246.23 184.293 245.846 183.05 245.154C171.161 239.419 159.134 233.685 147.245 227.806C145.286 226.828 143.189 225.849 142.07 224.171C140.392 221.652 142.07 219.135 143.748 217.317C158.713 200.813 173.817 184.17 188.785 167.666C192.84 163.049 227.667 129.762 231.722 154.097Z" fill="#A82626" stroke="#191515" stroke-miterlimit="10"/>
                <path class=""  d="M231.722 138.992C232.421 142.909 230.743 146.405 229.205 149.762C216.477 176.335 203.33 202.678 189.763 228.789C189.526 229.359 189.165 229.869 188.705 230.281C188.245 230.693 187.698 230.996 187.106 231.168C185.684 231.125 184.293 230.741 183.05 230.048C171.161 224.313 159.134 218.58 147.245 212.701C145.286 211.723 143.189 210.744 142.07 209.066C140.392 206.547 142.07 204.03 143.748 202.211C158.713 185.708 173.817 169.065 188.785 152.56C192.84 147.943 227.667 114.657 231.722 138.992Z" fill="#CA4343" stroke="#191515" stroke-miterlimit="10"/>
                <path class=""  d="M206.826 116.616C207.445 116.105 208.1 115.638 208.785 115.218C212.281 113.26 216.338 112.141 219.274 109.623C221.092 107.945 221.653 105.568 223.471 103.888C226.967 100.532 229.904 96.1964 234.659 95.2172C238.296 94.5182 238.855 98.9939 240.114 101.651C241.656 105.288 243.195 108.924 244.73 112.561C245.677 114.368 246.112 116.399 245.988 118.435C245.289 122.772 239.691 125.848 236.618 128.645C232.841 132.002 229.904 137.737 225.288 140.114C224.17 139.555 223.89 138.296 223.051 137.597C221.931 136.617 220.113 136.197 218.855 135.498C216.058 133.956 213.4 132.142 210.603 130.744C207.519 129.344 203.33 127.386 203.19 123.471C203.055 120.671 204.868 118.293 206.826 116.616Z" fill="#CA4343" stroke="#191515" stroke-miterlimit="10"/>
                <path class=""  d="M219.834 120.25C221.111 119.807 222.507 119.857 223.749 120.39C227.033 121.493 230.006 123.363 232.422 125.845" stroke="#191515" stroke-miterlimit="10"/>
                <path class=""  d="M231.163 115.775C232.156 119.424 234.084 122.751 236.758 125.426" stroke="#191515" stroke-miterlimit="10"/>
                <path class=""  d="M205.288 126.544C206.763 126.078 208.359 126.177 209.764 126.824C216.55 129.087 222.304 133.7 225.988 139.831" stroke="#191515" stroke-miterlimit="10"/>
                <path class=""  d="M303.473 71.2982L303.192 106.264" stroke="#191515" stroke-width="6" stroke-miterlimit="10"/>
                <path class=""  d="M311.723 71.0194C311.864 75.0749 308.367 78.4326 303.756 78.5713C299.281 78.7114 295.505 75.6338 295.365 71.5784C295.225 67.5229 298.722 64.1652 303.332 64.0264C307.943 63.8876 311.585 66.9627 311.723 71.0194Z" fill="white" stroke="#191515" stroke-miterlimit="10"/>
                <path class=""  d="M195.638 169.064C210.323 150.046 228.086 133.258 249.345 121.229C265.849 111.859 284.591 106.124 303.892 106.825C367.114 109.062 410.747 169.483 410.747 169.483C410.747 169.483 458.86 222.211 462.497 305.989C466.133 389.768 391.447 427.25 391.447 427.25C391.447 427.25 301.24 482.356 205.848 420.953C205.848 420.953 136.201 378.855 145.427 296.335C149.344 261.929 159.553 227.802 176.897 197.173C182.606 187.456 188.864 178.071 195.638 169.064V169.064Z" fill="white" stroke="#191515" stroke-width="3" stroke-miterlimit="10"/>
                <path class=""  d="M215.078 200.812C215.078 200.812 227.386 148.641 286.968 139.692C286.968 139.692 326.828 131.3 359.137 155.637C391.446 179.973 394.243 204.724 394.243 204.724C396.761 213.396 397.88 224.304 395.361 232.977C392.285 243.606 379.837 253.537 368.787 258.431C351.585 266.27 332.004 267.803 313.122 268.082C286.128 268.502 257.177 269.481 233.121 255.634C229.033 253.423 225.384 250.485 222.351 246.963C217.717 241.468 214.458 234.949 212.842 227.945C211.207 218.86 211.978 209.506 215.078 200.812V200.812Z" fill="#191515" stroke="white" stroke-width="0.5" stroke-miterlimit="10"/>
                <path class=""  d="M226.548 182.351C225.288 174.797 238.577 164.168 243.052 160.249C255.729 149.649 271.15 142.86 287.529 140.668C334.242 133.955 361.655 159.409 361.655 159.409C366.83 163.745 376.481 170.599 378.859 176.757C381.935 184.869 370.188 188.366 364.733 190.603C350.317 196.448 335.311 200.713 319.976 203.324C299.136 206.681 277.178 206.537 257.038 199.828C251.641 198.024 246.401 195.779 241.373 193.114C237.597 191.157 230.322 188.079 227.667 184.723C227.101 184.038 226.717 183.222 226.548 182.351Z" fill="#232222"/>
                <path class=""  d="M265.569 223.609C269.414 223.609 273.172 222.469 276.369 220.333C279.566 218.197 282.058 215.161 283.53 211.608C285.001 208.056 285.386 204.147 284.636 200.376C283.886 196.605 282.034 193.141 279.315 190.422C276.597 187.703 273.133 185.851 269.361 185.101C265.59 184.351 261.681 184.736 258.129 186.208C254.577 187.679 251.54 190.171 249.404 193.368C247.268 196.565 246.128 200.324 246.128 204.169C246.128 206.722 246.63 209.25 247.607 211.608C248.584 213.967 250.016 216.11 251.822 217.916C253.627 219.721 255.77 221.153 258.129 222.13C260.488 223.107 263.016 223.609 265.569 223.609V223.609Z" fill="white" stroke="#191515" stroke-miterlimit="10"/>
                <path class=""  d="M343.333 223.609C347.178 223.609 350.937 222.469 354.134 220.333C357.331 218.197 359.823 215.161 361.294 211.608C362.766 208.056 363.151 204.147 362.401 200.376C361.65 196.605 359.799 193.141 357.08 190.422C354.361 187.703 350.897 185.851 347.126 185.101C343.355 184.351 339.446 184.736 335.894 186.208C332.341 187.679 329.305 190.171 327.169 193.368C325.033 196.565 323.893 200.324 323.893 204.169C323.893 209.325 325.941 214.269 329.587 217.915C333.232 221.561 338.177 223.609 343.333 223.609V223.609Z" fill="white" stroke="#191515" stroke-miterlimit="10"/>
                <path class=""  d="M212.141 147.244C213.856 146.69 215.538 146.036 217.177 145.286C221.932 143.608 226.686 142.073 231.582 140.67C248.398 135.926 265.636 132.835 283.053 131.44C307.385 129.427 331.881 130.935 355.784 135.916C362.356 137.314 368.79 138.992 375.224 140.81C378.581 141.789 381.798 142.909 385.155 144.023C387.952 145.002 391.029 145.565 393.546 147.379C392.707 145.561 390.189 143.743 388.651 142.345C382.637 136.89 376.484 131.435 370.05 126.399C366.273 123.463 361.797 119.406 357.182 117.728L355.503 117.309C350.049 116.05 344.594 115.491 339 114.652C330.328 113.394 321.516 112.414 312.705 111.854C289.488 110.595 265.289 111.994 243.333 119.966C243.331 120.112 209.624 144.028 212.141 147.244Z" fill="#CA4343" stroke="#191515" stroke-miterlimit="10"/>
                <path class=""  d="M319.696 226.127C319.417 227.669 317.178 229.623 315.92 230.463C314.288 231.721 312.44 232.669 310.466 233.26C306.474 234.333 302.263 234.285 298.297 233.121C294.521 232.142 290.885 230.183 289.345 226.824C289.066 226.264 290.046 225.565 290.887 225.705C291.868 225.853 292.761 226.349 293.405 227.103C296.391 229.479 300.044 230.863 303.855 231.064C307.666 231.264 311.444 230.271 314.664 228.222C315.706 227.46 316.688 226.618 317.601 225.705C318.158 225.147 319.976 224.448 319.696 226.127Z" fill="white" stroke="white" stroke-width="0.75" stroke-miterlimit="10"/>
                <path class=""  d="M332.005 177.036C332.752 177.036 333.482 176.814 334.103 176.399C334.724 175.984 335.208 175.394 335.494 174.704C335.78 174.014 335.855 173.255 335.709 172.522C335.563 171.79 335.204 171.117 334.676 170.589C334.147 170.061 333.475 169.701 332.742 169.555C332.009 169.409 331.25 169.484 330.56 169.77C329.87 170.056 329.28 170.54 328.865 171.161C328.45 171.782 328.229 172.512 328.229 173.259C328.228 173.755 328.326 174.246 328.516 174.705C328.705 175.163 328.984 175.579 329.334 175.93C329.685 176.281 330.101 176.559 330.56 176.749C331.018 176.938 331.509 177.036 332.005 177.036V177.036Z" fill="white"/>
                <path class=""  d="M332.005 172.726C332.005 172.726 336.621 171.887 339.417 173.705C339.697 173.845 340.396 174.544 340.676 173.985C341.096 173.286 339.557 172.167 339.134 171.747C338.343 171.199 337.5 170.73 336.617 170.349C335.211 169.723 333.678 169.435 332.141 169.509L332.005 172.726Z" fill="white"/>
                <path class=""  d="M275.78 177.975C275.033 177.975 274.302 177.754 273.681 177.339C273.06 176.924 272.576 176.334 272.29 175.644C272.005 174.954 271.93 174.194 272.076 173.462C272.221 172.729 272.581 172.056 273.109 171.528C273.637 171 274.31 170.64 275.043 170.494C275.775 170.349 276.535 170.424 277.225 170.709C277.915 170.995 278.505 171.479 278.92 172.1C279.335 172.721 279.556 173.452 279.556 174.198C279.556 174.694 279.459 175.186 279.269 175.644C279.079 176.102 278.801 176.519 278.45 176.869C278.1 177.22 277.683 177.498 277.225 177.688C276.767 177.878 276.276 177.975 275.78 177.975V177.975Z" fill="white"/>
                <path class=""  d="M275.779 173.666C275.779 173.666 271.164 172.827 268.367 174.646C268.087 174.786 267.388 175.485 267.108 174.926C266.688 174.227 268.227 173.108 268.65 172.687C269.441 172.139 270.284 171.671 271.167 171.289C272.573 170.663 274.106 170.376 275.643 170.45L275.779 173.666Z" fill="white"/>
              </svg> -->
            <!-- <div class="position-absolute top-0 mt-7 ms-n6 ms-md-n6 ms-lg-n1 start-0">
                <img src="assets/images/job/job-hero-block-1.svg" class="img-fluid ">
            </div>
            <div class="position-absolute bottom-0 mb-12 me-n6 me-md-n4 me-lg-n12 end-0 ">
                <img src="assets/images/job/job-hero-block-2.svg" class="img-fluid ">
            </div>
            <div class="position-absolute bottom-0 mb-n4 ms-n1 ms-md-n4 ms-lg-n0 start-0">
                <img src="assets/images/job/job-hero-block-3.svg" class="img-fluid ">
            </div> -->
              <!-- <img style="position: absolute; right: 60px;" src="assets/images/vectors/happy-home.svg" class="img-fluid "> -->
          </div>
        </div>

      </div>
    </div>
  </div>


  <div class="py-lg-10 py-10">
    <!-- container -->
    <div class="container" style="">
    <div class="row">
        <div class="col-md-4 col-12">
          <!-- card -->
          <div class="card mb-4 mb-lg-0" style="background-color: #fff; box-shadow: 0px 0px !important;">
            <!-- card body -->
            <div class="card-body" style="padding: 0 0 0 0 !important;">
              <!-- icon -->
              <div class="mb-3"><i class="mdi mdi-school-outline mdi-48px lh-1 " style="color: #CA4343;"></i></div>
              <h3 class="mb-2" style="font-family:made_tommy; font-weight: bold; font-size: 24px; padding-top: 10px;">THEORY + PRACTICAL</h3>
              <p style="font-family: made_tommy; font-size: 16px; padding-top: 10px !important;">Símbolo uses learner-centric curriculum design to offer both theoretical knowledge and practical application through interactive lessons, assignments and projects.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-12">
           <!-- card -->
          <div class="card mb-4 mb-lg-0" style="background-color: #fff; box-shadow: 0px 0px !important;">
             <!-- card body -->
            <div class="card-body" style="padding: 0 0 0 0 !important;">
               <!-- icon -->
              <div class="mb-3"><i class="mdi mdi-account-group mdi-48px lh-1 " style="color: #CA4343;"></i></div>
              <h3 class="mb-2" style="font-family:made_tommy; font-weight: bold; font-size: 24px; padding-top: 10px;">LEARN AND GROW</h3>
              <p style="font-family: made_tommy; font-size: 16px; padding-top: 10px !important;">Símbolo is dedicated to supporting IT enthusiasts with a chance to learn affordable and learner-centric best-quality courses and we hope you will grow together with us.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-12">
           <!-- card -->
          <div class="card mb-4 mb-lg-0" style="background-color: #fff; box-shadow: 0px 0px !important;">
             <!-- card body -->
            <div class="card-body" style="padding: 0 0 0 0 !important;">
               <!-- icon -->
              <div class="mb-3"><i class="mdi mdi-finance mdi-48px lh-1 " style="color: #CA4343;"></i></div>
              <h3 class="mb-2" style="font-family:made_tommy; font-weight: bold; font-size: 24px; padding-top: 10px;">GET EXPERT SUPPORT</h3>
              <p style="font-family: made_tommy; font-size: 16px; padding-top: 10px !important;">Símbolo is always ready to provide you with career ready programs if you are trying to find a place in IT and AI field. Moreover, you can always get support from experts whenever you need help with your projects and lessons.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container" id="all-courses">
    <hr style="padding: 0 0 0 0 !important; margin: 0 0 0 0 !important">
  </div>

  <div class="py-4 py-lg-8 bg-light-gradient-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <span class="text-primary mb-3 d-block text-uppercase fw-medium ls-lg" style="color: #D65E5A !important; font-family: made_tommy;">
            POPULAR COURSES
          </span>
          <h1 class="display-3 fw-bold" style="font-family: made_tommy; font-size: 40px;">THE WORLD'S TOP COURSES</h1>
          <!-- <h2 class="mb-1 display-4 fw-bold" style="font-family: made_tommy">The World's Top Courses</h2> -->
          <p class="mb-8 lead" style="font-family: made_tommy">Over 10+ online courses with new additions published every month.</p>
        </div>
      </div>
      <div class="py-1">
        <div class="row mb-6">
          <div class="col-md-12">
            <!-- Nav -->
            <!-- <ul class="nav nav-lb-tab mb-6" id="tab" role="tablist">
              <li class="nav-item ms-0" role="presentation">
                <a class="nav-link active" id="most-popular-tab" data-bs-toggle="pill" href="#most-popular" role="tab"
                  aria-controls="most-popular" aria-selected="true"  style="font-family: made_tommy;">MOST POPULAR</a>
              </li>
            </ul> -->
            <!-- Tab Content -->
            <div class="tab-content" id="tabContent">
              <!-- Tab Pane -->
              <div class="tab-pane fade show active" id="most-popular" role="tabpanel" aria-labelledby="most-popular-tab">

                <div class="position-relative">
                    <ul class="controls " id="sliderFirstControls">
                        <li class="prev">
                            <i class="fe fe-chevron-left"></i>
                        </li>
                        <li class="next">
                            <i class="fe fe-chevron-right"></i>
                        </li>
                    </ul>
                    <div class="sliderFirst">
                      <?php foreach ($arrAllCourses as $singleTitle): ?>

                        <div class="col-lg-3 col-md-6 col-12">
                          <!-- Card -->
                          <div class="card  mb-4 card-hover">
                            <a href="course-single-v2.php?id=<?php echo $singleTitle["c_id"]; ?>" class="card-img-top"><img src="assets/images/course/<?php echo $singleTitle["c_image"]; ?>" alt=""
                                class="card-img-top rounded-top-md"></a>
                            <!-- Card body -->
                            <div class="card-body">
                              <h4 class="mb-2 text-truncate-line-2 "><a href="course-single-v2.php?id=<?php echo $singleTitle["c_id"]; ?>" class="text-inherit" style="font-family: made_tommy; font-weight: 500; font-size: 17px; line-height:1.5em !important; min-height:4.5em !important; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                <?php echo $singleTitle["c_title"]; ?>
                              </a></h4>

                              <ul class="mb-3  list-inline">
                                <li class="list-inline-item"><i class="mdi mdi-clock-time-four-outline text-muted me-1"></i><?php echo $singleTitle["c_dur"]; ?>
                                </li>
                                <li class="list-inline-item"><svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE">
                                    </rect>
                                    <rect x="7" y="5" width="2" height="9" rx="1" fill="#<?php echo $singleTitle["c_type"] != 'Beginner'? '754FFE': 'DBD8E9';?>">
                                    </rect>
                                    <rect x="11" y="2" width="2" height="12" rx="1" fill="#<?php echo $singleTitle["c_type"] == 'Advanced'? '754FFE': 'DBD8E9';?>">
                                    </rect>
                                  </svg><?php echo $singleTitle["c_type"]; ?> </li>
                              </ul>
                              <!-- <div class="lh-1">
                                <span>
                                  <i class="mdi mdi-star text-warning me-n1"></i>
                                  <i class="mdi mdi-star text-warning me-n1"></i>
                                  <i class="mdi mdi-star text-warning me-n1"></i>
                                  <i class="mdi mdi-star text-warning me-n1"></i>
                                  <i class="mdi mdi-star text-warning"></i>
                                </span>
                                <span class="text-warning">4.5</span>
                                <span class="fs-6 text-muted">(9,300)</span>
                              </div> -->
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer">
                              <div class="row align-items-center g-0">
                                <div class="col-auto">
                                  <img src="assets/images/instructor/<?php echo $singleTitle["i_image"]; ?>" class="rounded-circle avatar-xs" alt="">
                                </div>
                                <div class="col ms-2">
                                  <span><?php echo $singleTitle["i_name"]; ?></span>
                                </div>
                                <div class="col-auto">
                                <!-- <a href="#" class="text-muted bookmark">
                                  <i class="fe fe-bookmark  "></i>
                                </a> -->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                      <?php endforeach; ?>




                    </div>
                </div>
              </div>
              <div class="tab-pane fade" id="trending" role="tabpanel" aria-labelledby="trending-tab">
                <!-- Tab pane -->
                <div class="row">
                  <div class="col-lg-3 col-md-6 col-12">
                    <!-- Card -->
                    <div class="card  mb-4 card-hover">
                      <a href="#" class="card-img-top"><img src="assets/images/course/course-react.jpg" alt=""
                          class="card-img-top rounded-top-md"></a>
                      <!-- Card body -->
                      <div class="card-body">
                        <h3 class="h4 mb-2 text-truncate-line-2 "><a href="#" class="text-inherit">How to easily create a
                            website with React</a>
                        </h3>
                        <ul class="mb-3  list-inline">
                          <li class="list-inline-item"><i class="mdi mdi-clock-time-four-outline text-muted me-1"></i>3h 56m
                          </li>
                          <li class="list-inline-item"><svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16"
                              fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE">
                              </rect>
                              <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9">
                              </rect>
                              <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9">
                              </rect>
                            </svg>Beginner </li>
                        </ul>
                        <div class="lh-1">
                          <span>
                            <i class="mdi mdi-star text-warning me-n1"></i>
                            <i class="mdi mdi-star text-warning me-n1"></i>
                            <i class="mdi mdi-star text-warning me-n1"></i>
                            <i class="mdi mdi-star text-warning me-n1"></i>
                            <i class="mdi mdi-star text-warning"></i>
                          </span>
                          <span class="text-warning">4.5</span>
                          <span class="fs-6 text-muted">(6,300)</span>
                        </div>
                      </div>
                      <!-- Card Footer -->
                      <div class="card-footer">
                        <div class="row align-items-center g-0">
                          <div class="col-auto">
                            <img src="assets/images/avatar/avatar-6.jpg" class="rounded-circle avatar-xs" alt="">
                          </div>
                          <div class="col ms-2">
                            <span>Morris Mccoy</span>
                          </div>
                          <div class="col-auto">
                          <a href="#" class="text-muted bookmark">
                      <i class="fe fe-bookmark  "></i>
                    </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-12">
                    <!-- Card -->
                    <div class="card  mb-4 card-hover">
                      <a href="#" class="card-img-top"><img src="assets/images/course/course-graphql.jpg" alt=""
                          class="card-img-top rounded-top-md"></a>
                      <!-- Card body -->
                      <div class="card-body">
                        <h3 class="h4 mb-2 text-truncate-line-2 "><a href="#" class="text-inherit">GraphQL: introduction
                            to graphQL for
                            beginners</a></h3>
                        <ul class="mb-3 list-inline">
                          <li class="list-inline-item"><i class="mdi mdi-clock-time-four-outline text-muted me-1"></i>2h 46m
                          </li>
                          <li class="list-inline-item"><svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16"
                              fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE">
                              </rect>
                              <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE">
                              </rect>
                              <rect x="11" y="2" width="2" height="12" rx="1" fill="#754FFE">
                              </rect>
                            </svg>Advance </li>
                        </ul>
                        <div class="lh-1">
                          <span>
                            <i class="mdi mdi-star text-warning me-n1"></i>
                            <i class="mdi mdi-star text-warning me-n1"></i>
                            <i class="mdi mdi-star text-warning me-n1"></i>
                            <i class="mdi mdi-star text-warning me-n1"></i>
                            <i class="mdi mdi-star text-warning"></i>
                          </span>
                          <span class="text-warning">4.5</span>
                          <span class="fs-6 text-muted">(4,300)</span>
                        </div>
                      </div>
                      <!-- Card footer -->
                      <div class="card-footer">
                        <div class="row align-items-center g-0">
                          <div class="col-auto">
                            <img src="assets/images/avatar/avatar-7.jpg" class="rounded-circle avatar-xs" alt="">
                          </div>
                          <div class="col ms-2">
                            <span>Ted Hawkins</span>
                          </div>
                          <div class="col-auto">
                          <a href="#" class="text-muted bookmark">
                      <i class="fe fe-bookmark  "></i>
                    </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-12">
                    <!-- Card -->
                    <div class="card  mb-4 card-hover">
                      <a href="#" class="card-img-top"><img src="assets/images/course/course-angular.jpg" alt=""
                          class="card-img-top rounded-top-md"></a>
                      <!-- Card body -->
                      <div class="card-body">
                        <h3 class="h4 mb-2 text-truncate-line-2 "><a href="#" class="text-inherit">Angular - the complete
                            guide for beginner</a>
                        </h3>
                        <!-- List inline -->
                        <ul class="mb-3  list-inline">
                          <li class="list-inline-item"><i class="mdi mdi-clock-time-four-outline text-muted me-1"></i>1h 30m
                          </li>
                          <li class="list-inline-item"><svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16"
                              fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE">
                              </rect>
                              <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9">
                              </rect>
                              <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9">
                              </rect>
                            </svg>Beginner </li>
                        </ul>
                        <div class="lh-1">
                          <span>
                            <i class="mdi mdi-star text-warning me-n1"></i>
                            <i class="mdi mdi-star text-warning me-n1"></i>
                            <i class="mdi mdi-star text-warning me-n1"></i>
                            <i class="mdi mdi-star text-warning me-n1"></i>
                            <i class="mdi mdi-star text-warning"></i>
                          </span>
                          <span class="text-warning">4.5</span>
                          <span class="fs-6 text-muted">(5,410)</span>
                        </div>
                      </div>
                      <!-- Card footer -->
                      <div class="card-footer">
                        <div class="row align-items-center g-0">
                          <div class="col-auto">
                            <img src="assets/images/avatar/avatar-8.jpg" class="rounded-circle avatar-xs" alt="">
                          </div>
                          <div class="col ms-2">
                            <span>Juanita Bell</span>
                          </div>
                          <div class="col-auto">
                          <a href="#" class="text-muted bookmark">
                      <i class="fe fe-bookmark  "></i>
                    </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-12">
                    <!-- Card -->
                    <div class="card  mb-4 card-hover">
                      <a href="#" class="card-img-top"><img src="assets/images/course/course-python.jpg" alt=""
                          class="card-img-top rounded-top-md"></a>
                      <!-- Card body -->
                      <div class="card-body">
                        <h3 class="h4 mb-2 text-truncate-line-2 "><a href="#" class="text-inherit">The Python Course:
                            build web application</a>
                        </h3>
                        <!-- List inline -->
                        <ul class="mb-3  list-inline">
                          <li class="list-inline-item"><i class="mdi mdi-clock-time-four-outline text-muted me-1"></i>2h 30m
                          </li>
                          <li class="list-inline-item"><svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16"
                              fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE">
                              </rect>
                              <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE">
                              </rect>
                              <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9">
                              </rect>
                            </svg>Intermediate </li>
                        </ul>
                        <div class="lh-1">
                          <span>
                            <i class="mdi mdi-star text-warning me-n1"></i>
                            <i class="mdi mdi-star text-warning me-n1"></i>
                            <i class="mdi mdi-star text-warning me-n1"></i>
                            <i class="mdi mdi-star text-warning me-n1"></i>
                            <i class="mdi mdi-star text-warning"></i>
                          </span>
                          <span class="text-warning">4.5</span>
                          <span class="fs-6 text-muted">(9,300)</span>
                        </div>
                      </div>
                      <!-- Card footer -->
                      <div class="card-footer">
                        <div class="row align-items-center g-0">
                          <div class="col-auto">
                            <img src="assets/images/avatar/avatar-9.jpg" class="rounded-circle avatar-xs" alt="">
                          </div>
                          <div class="col ms-2">
                            <span>Claire Robertson</span>
                          </div>
                          <div class="col-auto">
                          <a href="#" class="text-muted bookmark">
                      <i class="fe fe-bookmark  "></i>
                    </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div style="background-color: #f3f3f3 !important">
    <div class="container">
      <hr style="padding: 0 0 0 0 !important; margin: 0 0 0 0 !important">
    </div>
  </div>
  <div class="py-8 py-lg-16 bg-light-gradient-top"  style="">


    <div class="container" style="">

      <div class="row mb-4 justify-content-center">
        <div class="col-lg-11 col-md-12">
          <div class="row align-items-center">
            <div class="col-md-12 col-12 mb-4">
               <!-- avatar group -->
              <div class="avatar-group me-5">
                 <!-- avatar -->
                <span class="avatar avatar-lg ">
                  <img alt="avatar" src="assets/images/instructor/<?php echo $arrInstruts[0]['i_image'] ?>" class="rounded-circle">
                </span>
                  <!-- avatar -->
                <span class="avatar avatar-lg ">
                  <img alt="avatar" src="assets/images/instructor/<?php echo $arrInstruts[1]['i_image'] ?>" class="rounded-circle">
                </span>
                  <!-- avatar -->
                <span class="avatar avatar-lg ">
                  <img alt="avatar" src="assets/images/instructor/<?php echo $arrInstruts[2]['i_image'] ?>" class="rounded-circle">
                </span>
                  <!-- avatar -->
                <span class="avatar avatar-lg ">
                  <img alt="avatar" src="assets/images/instructor/<?php echo $arrInstruts[3]['i_image'] ?>" class="rounded-circle">
                </span>
                  <!-- avatar -->
                <span class="avatar avatar-lg avatar-danger">
                  <span class="avatar-initials rounded-circle fs-5 fw-bold">10+</span>
                </span>
              </div>
            </div>
              <!-- heading -->
            <div class="col-lg-4 col-md-5 col-12 mb-6">
              <h1 class="display-3 fw-bold" style="font-family: made_tommy; font-size: 40px;">BECOME AN INSTRUCTOR</h1>
            </div>
            <div class="offset-lg-1 col-lg-6 col-md-7 col-12 mb-6">
                <!-- para -->
              <p class="lead" style="font-family: made_tommy;">Top instructors from around the countries are teaching now on Simbolo. We provide the
                tools and skills to teach what you love</p>
            </div>
          </div>
            <!-- row -->
          <div class="row">
            <div class="col-lg-4 col-md-4 col-12 mb-3">
                <!-- text -->
              <h3 class="fw-bold mb-2"  style="font-family: made_tommy; font-size: 22px;">GROW WITH US</h3>
              <p class="fs-4" style="font-family: made_tommy;">Grow together with Símbolo while supporting students to learn and grow.</p>
            </div>
            <div class="col-lg-4 col-md-4 col-12 mb-3">
                <!-- text -->
              <h3 class="fw-bold mb-2" style="font-family: made_tommy; font-size: 22px;">INSPIRE STUDENTS</h3>
              <p class="fs-4" style="font-family: made_tommy;">Help people learn new skills, advance their careers, and explore their hobbies by sharing your
                knowledge.</p>
            </div>
            <div class="col-lg-4 col-md-4 col-12 mb-3">
                <!-- text -->
              <h3 class="fw-bold mb-2" style="font-family: made_tommy; font-size: 22px;">JOIN OUR COMMUNITY</h3>
              <p class="fs-4" style="font-family: made_tommy;">Take advantage of our active community of instructors to help you through your course creation process.
              </p>
            </div>
              <!-- btn -->
            <div class="col-md-12 mt-3">
              <a class="btn btn-primary" style="font-family: made_tommy;font-size: 15px;font-weight: 500;"> START TEACHING TODAY</a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>


  <div class="container">
    <hr style="padding: 0 0 0 0 !important; margin: 0 0 0 0 !important">
  </div>
  <div class="py-4 py-lg-8 bg-light-gradient-bottom">
    <div class="container">
      <div class="row mb-8 justify-content-center">
         <!-- caption -->
        <div class="col-lg-8 col-md-12 col-12 text-center">
          <span class="text-primary mb-3 d-block text-uppercase fw-medium ls-xl"  style="color: #D65E5A !important; font-family: made_tommy;">World-class Instructors</span>
          <h2 class="mb-1 display-4 fw-bold" style="font-family: made_tommy; font-size: 40px;">CLASSES TAUGHT BY INDUSTRY EXPERT</h2>
          <p class="lead" style="font-family: made_tommy">Simbolo teachers are icons, experts, and industry rock stars excited to share their
            experience, wisdom, and trusted tools with you.</p>
        </div>
      </div>
 <!-- row -->
      <div class="row">
        <?php foreach ($arrAllEvents as $singleTitle): ?>
          <div class="col-xl-3 col-lg-4 col-md-6 col-12">
             <!-- card -->
            <div class="card mb-4 card-hover">
               <!-- img -->
              <div class="card-img-top">
                <img src="assets/images/events/<?php echo $singleTitle["e_image"]; ?>" alt="" class="rounded-top-md img-fluid">
              </div>
               <!-- card body -->
              <div class="card-body">
               <h3 class="mb-0" style="font-family: made_tommy; font-weight: 500; font-size: 20px;"> <a class="text-inherit"><?php echo $singleTitle["e_title"]; ?></a></h3>
                <p class="mb-3"><?php echo $singleTitle["s_name"]; ?></p>
                <!-- <div class="lh-1  d-flex justify-content-between">
                  <div>
                    <span class="fs-6">
                      <i class="mdi mdi-star text-warning"></i>
                      <span class="text-warning">4.5</span>
                    </span>
                  </div>
                  <div>
                    <span class="fs-6 text-muted"><span class="text-dark">9,692</span> Students</span></div>
                  <div>
                    <span class="fs-6 text-muted"><span class="text-dark">3</span> Course</span></div>
                </div> -->
              </div>
            </div>
          </div>
        <?php endforeach; ?>

         <!-- btn -->
        <!-- <div class="col-md-12 mt-3 text-center">
          <a href="#" class="btn btn-primary" style="font-family: made_tommy;font-size: 15px;font-weight: 500;"> SEE ALL EVENTS </a>
        </div> -->
      </div>
    </div>
  </div>
  <div class="py-4 py-lg-8 bg-light-gradient-top">
    <div class="container">
      <hr style="padding: 0 0 0 0 !important; margin: 0 0 0 0 !important">
    </div>
    <div class="container">
      <div class="row mt-10 mb-8 justify-content-center">
        <div class="col-lg-8 col-md-12 col-12 text-center">
            <!-- caption -->
          <span class="text-primary mb-3 d-block text-uppercase fw-medium ls-xl"  style="color: #D65E5A !important; font-family: made_tommy;">Testimonials</span>
          <h2 class="mb-1 display-4 fw-bold" style="font-family: made_tommy">DON'T JUST TAKE OUR WORDS FOR IT</h2>
          <p class="lead" style="font-family: made_tommy">500+ people are already learning on Simbolo</p>

        </div>
      </div>
        <!-- row -->
      <div class="row mb-15">
          <!-- col -->
        <div class="col-md-12">
          <div class="position-relative">
            <!-- controls -->
        <ul class=" controls pt-0 pb-0" id="sliderTestimonialControls" style="margin-bottom: -50px;">
          <li class="prev">
            <i class="fe fe-chevron-left"></i>
          </li>
          <li class="next">
            <i class="fe fe-chevron-right"></i>
          </li>
        </ul>
          <!-- slider -->
        <div class="sliderTestimonial">
          <?php foreach ($arrAllCmts as $singleTitle): ?>
            <div class="item">
              <!-- card -->
            <div class="card border shadow-none">
                <!-- card body -->
              <div class="card-body p-5">
                <div class="mb-2">
                  <span class="fs-4">
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning me-n1"></i>
                    <i class="mdi mdi-star text-warning"></i>
                  </span>
                </div>
                <!-- para -->
                <p class="lead text-dark font-italic mb-0" style="font-family: made_tommy">"<?php echo $singleTitle['cm_desc']; ?>"</p>
              </div>
                <!-- card footer -->
              <div class="card-footer px-5 py-4">
                <div class="d-flex align-items-center">
                  <img src="assets/images/student/<?php echo $singleTitle['cm_image']; ?>" alt="" class="avatar avatar-md rounded-circle">
                  <div class="ms-3">
                    <h4 class="mb-0"><?php echo $singleTitle['cm_name']; ?></h4>
                    <p class="mb-0 small"><?php echo $singleTitle['cm_info']; ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        </div>
      </div>
      </div>
      </div>
    </div>
  </div>


  <!-- footer -->
      <!-- footer -->
    <hr style="padding: 0 0 0 0 !important; margin: 0 0 0 0 !important">
    <div class="pt-lg-6 pt-3 footer" style="background-color: #F5F5FE;">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-12">
                <!-- about company -->
            <div class="mb-4">
              <img src="assets/images/brand/logo/logo.svg" alt="">
              <div class="mt-4">
                <p>A Myanmar(Burma) based AI and IT training school. We provide best quality courses.</p>
                   <!-- social media -->
                <div class="fs-4 mt-4">
                  <a href="https://www.facebook.com/Simboloit" class="mdi mdi-facebook fs-4 text-muted me-2"></a>
                  <a href="https://www.linkedin.com/company/s%C3%ADmboloitschool" class="mdi mdi-youtube text-muted me-2"></a>
                  <a href="https://www.youtube.com/channel/UCx6xQi8wlJKTSKXL5xzwXXQ" class="mdi mdi-linkedin text-muted "></a>
                </div>
              </div>
            </div>
          </div>
          <div class="offset-lg-1 col-lg-2 col-md-3 col-6">

          </div>
          <div class="col-lg-2 col-md-3 col-6">
            <div class="mb-4">
              <h3 class="fw-bold mb-3">Get in touch</h3>
              <p>Mandalay, Myanmar</p>


            </div>
          </div>
          <div class="col-lg-3 col-md-12">
                <!-- contact info -->

            <div class="mb-4">
              <h3 class="fw-bold mb-3">Contact information</h3>
              <p class="mb-1">Email: <a>simboloit@gmail.com</a></p>
              <p>Phone: <span class="text-dark fw-semi-bold">(+95) 995 171 6847</span></p>

            </div>
          </div>
        </div>
        <div class="row align-items-center g-0 border-top py-2 mt-6">
          <!-- Desc -->
          <div class="col-lg-4 col-md-5 col-12">
              <span>© 2022 Simbolo UI. All Rights Reserved</span>
              </div>

            <!-- Links -->
          <div class="col-12 col-md-7 col-lg-8 d-md-flex justify-content-end">
              <nav class="nav nav-footer">
                  <!-- <a class="nav-link ps-0" href="#">Privacy Policy</a>
                  <a class="nav-link px-2 px-md-3" href="#">Cookie Notice  </a>
                  <a class="nav-link d-none d-lg-block" href="#">Do Not Sell My Personal Information </a> -->
                  <a class="nav-link">All of course information owned by Simbolo</a>
              </nav>
          </div>
      </div>
      </div>
    </div>


  <!-- Scripts -->
  <!-- Libs JS -->
<script src="assets/libs/jquery/dist/jquery.min.js"></script>
<script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/odometer/odometer.min.js"></script>
<script src="assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
<script src="assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="assets/libs/flatpickr/dist/flatpickr.min.js"></script>
<script src="assets/libs/inputmask/dist/jquery.inputmask.min.js"></script>
<script src="assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="assets/libs/quill/dist/quill.min.js"></script>
<script src="assets/libs/file-upload-with-preview/dist/file-upload-with-preview.min.js"></script>
<script src="assets/libs/dragula/dist/dragula.min.js"></script>
<script src="assets/libs/bs-stepper/dist/js/bs-stepper.min.js"></script>
<script src="assets/libs/dropzone/dist/min/dropzone.min.js"></script>
<script src="assets/libs/jQuery.print/jQuery.print.js"></script>
<script src="assets/libs/prismjs/prism.js"></script>
<script src="assets/libs/prismjs/components/prism-scss.min.js"></script>
<script src="assets/libs/@yaireo/tagify/dist/tagify.min.js"></script>
<script src="assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
<script src="assets/libs/@popperjs/core/dist/umd/popper.min.js"></script>
<script src="assets/libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>
<script src="assets/libs/typed.js/lib/typed.min.js"></script>
<script src="assets/libs/jsvectormap/dist/js/jsvectormap.min.js"></script>
<script src="assets/libs/jsvectormap/dist/maps/world.js"></script>
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="assets/libs/prismjs/plugins/toolbar/prism-toolbar.min.js"></script>
<script src="assets/libs/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js"></script>
<script src="assets/libs/fullcalendar/main.min.js"></script>
<script src="assets/libs/@lottiefiles/lottie-player/dist/lottie-player.js"></script>
<script src="assets/libs/simplebar/dist/simplebar.min.js"></script>
<script src="assets/libs/nouislider/dist/nouislider.min.js"></script>
<script src="assets/libs/wnumb/wNumb.min.js"></script>
<script src="assets/libs/glightbox/dist/js/glightbox.min.js"></script>

<!-- CDN File for moment -->
<script src='https://cdn.jsdelivr.net/npm/moment@2.29.1/min/moment.min.js'></script>




<!-- Theme JS -->
<script src="assets/js/theme.min.js"></script>

<script>
$(function () {
  $(document).scroll(function () {
    console.log('shop');
    var $nav = $(".fixed-top");
    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
  });
});

var eye1 = document.querySelector('#happy-left-eye');
var eye2 = document.querySelector('#happy-right-eye');
var rect = $('#happy-character').get(0).getBoundingClientRect();
console.log('something ' + rect.top.toFixed());
window.addEventListener('mousemove', (evt) => {
    // var rect = getElementById.getBoundingClientRect();
    const x = -(rect.left - evt.pageX) / 140;
    const y = -(rect.top + 200 - evt.pageY) / 140;
    // console.log('sps' + y);
    if(y < 5 && y > -5 && x < 5 && x > -5) {
      eye1.style.transform = `translateY(${y}px) translateX(${x}px)`;
      eye2.style.transform = `translateY(${y}px) translateX(${x}px)`;
    }

});


$("#happy-character").bind("webkitAnimationEnd mozAnimationEnd animationend", function(){
  $(this).removeClass("bounce-7");
});

$("#happy-character").hover(function(){
  $(this).addClass("bounce-7");
});

$(".svg-container").scroll(function() {
  return false;
});

$(".navbar-toggler").on('click', function() {
  console.log('clicked');
  var $nav = $(".fixed-top");
  $nav.toggleClass('mobile-click');
});

$(window).resize(function() {
  console.log('resizing');
  rect = $('#happy-character').get(0).getBoundingClientRect();
});

</script>
</body>

</html>
