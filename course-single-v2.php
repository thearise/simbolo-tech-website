<?php
require_once 'admin/core/init.php';

if(isset($_GET['id']))
{
    $post = $_GET['id'];
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

$arrAllCourses = array();

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



$singlePost = $user->getSinglePost($post);

$singlePostAry = array();

foreach ($singlePost as $key => $value) {
    $place =array(
        "c_id" => trim($value['c_id']," "),
        "c_title" => trim($value['c_title']," "),
        "c_dur" => trim($value['c_dur']," "),
        "c_date" => trim($value['c_date']," "),
        "c_type" => trim($value['c_type']," "),
        "c_desc" => trim($value['c_desc']," "),
        "i_id" => trim($value['i_id']," "),
        "i_name" => trim($value['i_name']," "),
        "i_type" => trim($value['i_type']," "),
        "i_desc" => trim($value['i_desc']," "),
        "i_image" => trim($value['i_image']," "),
        "c_ca_id" => trim($value['c_ca_id']," "),
    );

    $singlePostAry[] = $place;
}
$finalAry =  json_encode($singlePostAry);


$properties = $user->getCoursesOverviewByCourseId($singlePostAry[0]["c_id"]);

$arrCoOver = array();

foreach ($properties as $key => $value) {
    $place =array(
        "co_id" => trim($value['co_id']," "),
        "co_title" => trim($value['co_title']," "),
        "co_desc" => trim($value['co_desc']," "),
        "co_info" => trim($value['co_info']," "),
    );

    $arrCoOver[] = $place;
}
$finalArrCoOver =  json_encode($arrCoOver);



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
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
        animation-duration: 5s;
        animation-iteration-count: infinite;
        background-color: #F44336;
        height: 200px;
        margin: 0 auto 0 auto;
        transform-origin: bottom;
        width: 200px;
    }
.bounce-7 {
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


.svg-container {
 /* width: 300px;
 height: 150px; */
 resize: both;
 /* border: 1px dashed #aaa; */
}

.svg-container svg {
 width: 100%;
 height: 100%;
}
</style>




<!-- Theme CSS -->
<link rel="stylesheet" href="assets/css/theme.min.css">
  <title>Course Single | Geeks - Bootstrap 5 Template</title>
</head>

<body>
  <!-- Page content -->
  <nav class="navbar navbar-expand-lg navbar-default fixed-top navbar-scroll" style="font-family: made_tommy !important; background:transparent; box-shadow: none;">
    <div class="container px-0" style="padding-left: 10px !important; padding-right: 10px !important;">
      <a class="navbar-brand" style="padding-bottom: 0 !important;" href="index.php"
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

  <!-- Video section -->
  <div class="p-lg-5 py-5">
    <div class="container">
      <div style="height: 100px;">
      </div>
      <!-- <div class="row">
        <div class="col-lg-12 col-md-12 col-12 mb-5">
          <div class="rounded-3 position-relative w-100 d-block overflow-hidden p-0" style="height: 600px;">
            <iframe class="position-absolute top-0 end-0 start-0 end-0 bottom-0 h-100 w-100" src="https://www.youtube.com/embed/PkZNo7MFNFg"></iframe>
          </div>
        </div>
      </div> -->
      <!-- Content -->
      <div class="row">
        <div class="col-xl-8 col-lg-12 col-md-12 col-12 mb-4 mb-xl-0">
          <!-- Card -->
          <div class="card mb-5">
            <!-- Card body -->
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <h1 class="fw-bold mb-2" style="font-family: made_tommy">
                  <?php echo $singlePostAry[0]["c_title"]; ?>
                </h1>
                <!-- <a href="#" data-bs-toggle="tooltip" data-placement="top"  title="Add to Bookmarks">
                  <i class="fe fe-bookmark fs-3 text-inherit"></i>
                </a> -->
              </div>
              <div class="d-flex mb-5">
                <span class="d-md-block">
                  <i class="mdi mdi-clock-time-four-outline text-muted me-1"></i>
                  <span><?php echo $singlePostAry[0]["c_dur"]; ?></span>
                </span>
                <span class="ms-3 d-md-block">
                  <li class="list-inline-item"><svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16"
                      fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE">
                      </rect>
                      <rect x="7" y="5" width="2" height="9" rx="1" fill="#<?php echo $singlePostAry[0]["c_type"] != 'Beginner'? '754FFE': 'DBD8E9';?>">
                      </rect>
                      <rect x="11" y="2" width="2" height="12" rx="1" fill="#<?php echo $singlePostAry[0]["c_type"] == 'Advanced'? '754FFE': 'DBD8E9';?>">
                      </rect>
                    </svg><?php echo $singlePostAry[0]["c_type"]; ?> </li>
                </span>

              </div>
              <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center">
                  <img src="assets/images/instructor/<?php echo $singlePostAry[0]["i_image"]; ?>" class="rounded-circle avatar-lg" alt="" />
                  <div class="ms-2 lh-1">
                    <h4 class="mb-1">Instructor - <?php echo $singlePostAry[0]["i_name"]; ?></h4>
                    <!-- <p class="fs-6 mb-0">@htethtetwin</p> -->
                    <span class="badge bg-info"><?php echo $singlePostAry[0]["i_type"]; ?></span>
                  </div>
                </div>
                <div>
                  <!-- <a href="#" class="btn btn-outline-white btn-sm">Follow</a> -->
                </div>
              </div>
            </div>
            <!-- Nav tabs -->
            <ul class="nav nav-lt-tab" id="tab" role="tablist">
               <!-- Nav item -->
              <li class="nav-item">
                <a class="nav-link active" id="description-tab" data-bs-toggle="pill" href="#description" role="tab"
                  aria-controls="description" aria-selected="false">Description</a>
              </li>
              <!-- Nav item -->
              <!-- <li class="nav-item">
                <a class="nav-link" id="review-tab" data-bs-toggle="pill" href="#review" role="tab" aria-controls="review"
                  aria-selected="false">Reviews</a>
              </li> -->
              <!-- Nav item -->
              <li class="nav-item">
                <a class="nav-link" id="instructor-tab" data-bs-toggle="pill" href="#instructor" role="tab"
                  aria-controls="instructor" aria-selected="false">Instructor</a>
              </li>
              <!-- Nav item -->
              <!-- <li class="nav-item">
                <a class="nav-link" id="faq-tab" data-bs-toggle="pill" href="#faq" role="tab" aria-controls="faq"
                  aria-selected="false">FAQ</a>
              </li> -->
            </ul>
          </div>
          <!-- Card -->
          <div class="card rounded-3">
            <!-- Card body -->
            <div class="card-body">
              <div class="tab-content" id="tabContent">
                <!-- Tab pane -->
                <div class="tab-pane fade show active" id="description" role="tabpanel"
                  aria-labelledby="description-tab">
                  <?php echo $singlePostAry[0]["c_desc"]; ?>
                </div>
                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">

                  <div class="mb-3">
                    <!-- Review -->
                    <div class="d-lg-flex align-items-center justify-content-between mb-5">
                      <div class="mb-3 mb-lg-0">
                        <h3 class="mb-0">Reviews</h3>
                      </div>
                      <div>
                        <!-- Search -->
                        <!-- <form class="form-inline">
                          <div class="d-flex align-items-center me-2">
                            <span class="position-absolute ps-3">
                              <i class="fe fe-search"></i>
                            </span>
                            <input type="search" class="form-control ps-6" placeholder="Search Review" />
                          </div>
                        </form> -->
                      </div>
                    </div>
                    <div class="d-flex border-bottom pb-4 mb-4">
                      <!-- Media -->
                      <img src="assets/images/avatar/avatar-2.jpg" alt="" class="rounded-circle avatar-lg" />
                      <!-- Content -->
                      <div class=" ms-3">
                        <h4 class="mb-1">
                          Max Hawkins
                          <!-- <span class="ms-1 fs-6 text-muted">2 Days ago</span> -->
                        </h4>
                        <div class="fs-6 mb-2">
                          <i class="mdi mdi-star me-n1 text-warning"></i>
                          <i class="mdi mdi-star me-n1 text-warning"></i>
                          <i class="mdi mdi-star me-n1 text-warning"></i>
                          <i class="mdi mdi-star me-n1 text-warning"></i>
                          <i class="mdi mdi-star me-n1 text-warning"></i>
                        </div>
                        <p>Lectures were at a really good pace and I never felt lost. The instructor was well informed
                          and allowed me to learn and navigate Figma easily.</p>
                        <!-- <div class="d-lg-flex">
                          <p class="mb-0">Was this review helpful?</p>
                          <a href="#" class="btn btn-xs btn-primary ms-lg-3">Yes</a>
                          <a href="#" class="btn btn-xs btn-outline-white ms-1">No</a>
                        </div> -->
                      </div>
                    </div>
                    <div class="d-flex border-bottom pb-4 mb-4">
                      <!-- Media -->
                      <img src="assets/images/avatar/avatar-3.jpg" alt="" class="rounded-circle avatar-lg" />
                      <!-- Content -->
                      <div class=" ms-3">
                        <!-- <h4 class="mb-1">Arthur Williamson <span class="ms-1 fs-6 text-muted">3 Days ago</span> -->
                        </h4>
                        <div class="fs-6 mb-2">
                          <i class="mdi mdi-star me-n1 text-warning"></i>
                          <i class="mdi mdi-star me-n1 text-warning"></i>
                          <i class="mdi mdi-star me-n1 text-warning"></i>
                          <i class="mdi mdi-star me-n1 text-warning"></i>
                          <i class="mdi mdi-star me-n1 text-warning"></i>
                        </div>
                        <p>Its pretty good.Just a reminder that there are also students with Windows, meaning Figma its
                          a bit different of yours. Thank you!</p>
                        <!-- <div class="d-lg-flex">
                          <p class="mb-0">Was this review helpful?</p>
                          <a href="#" class="btn btn-xs btn-primary ms-lg-3">Yes</a>
                          <a href="#" class="btn btn-xs btn-outline-white ms-1">No</a>
                        </div> -->
                      </div>
                    </div>
                    <div class="d-flex border-bottom pb-4 mb-4">
                      <!-- Media -->
                      <img src="assets/images/avatar/avatar-4.jpg" alt="" class="rounded-circle avatar-lg" />
                      <!-- Content -->
                      <div class=" ms-3">
                        <!-- <h4 class="mb-1">Claire Jones <span class="ms-1 fs-6 text-muted">4 Days ago</span></h4> -->
                        <div class="fs-6 mb-2">
                          <i class="mdi mdi-star me-n1 text-warning"></i>
                          <i class="mdi mdi-star me-n1 text-warning"></i>
                          <i class="mdi mdi-star me-n1 text-warning"></i>
                          <i class="mdi mdi-star me-n1 text-warning"></i>
                          <i class="mdi mdi-star me-n1 text-warning"></i>
                        </div>
                        <p>
                          Great course for learning Figma, the only bad detail would be that some icons are not included
                          in the assets. But 90% of the icons needed are included, and the voice of the instructor
                          was very clear and easy to understood.
                        </p>
                        <!-- <div class="d-lg-flex">
                          <p class="mb-0">Was this review helpful?</p>
                          <a href="#" class="btn btn-xs btn-primary ms-lg-3">Yes</a>
                          <a href="#" class="btn btn-xs btn-outline-white ms-1">No</a>
                        </div> -->
                      </div>
                    </div>
                    <div class="d-flex">
                      <!-- Media -->
                      <img src="assets/images/avatar/avatar-5.jpg" alt="" class="rounded-circle avatar-lg" />
                      <!-- Content -->
                      <div class=" ms-3">
                        <h4 class="mb-1">
                          Bessie Pena
                          <!-- <span class="ms-1 fs-6 text-muted">5 Days ago</span> -->
                        </h4>
                        <div class="fs-6 mb-2">
                          <i class="mdi mdi-star me-n1 text-warning"></i>
                          <i class="mdi mdi-star me-n1 text-warning"></i>
                          <i class="mdi mdi-star me-n1 text-warning"></i>
                          <i class="mdi mdi-star me-n1 text-warning"></i>
                          <i class="mdi mdi-star me-n1 text-warning"></i>
                        </div>
                        <p>
                          I have really enjoyed this class and learned a lot, found it very inspiring and helpful, thank
                          you!

                        </p>
                        <!-- <div class="d-lg-flex">
                          <p class="mb-0">Was this review helpful?</p>
                          <a href="#" class="btn btn-xs btn-primary ms-lg-3">Yes</a>
                          <a href="#" class="btn btn-xs btn-outline-white ms-1">No</a>
                        </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="instructor" role="tabpanel" aria-labelledby="instructor-tab">
                  <!-- Description -->
                  <div class="d-flex align-items-center mb-4 mb-lg-0">
                    <img src="assets/images/instructor/<?php echo $singlePostAry[0]["i_image"]; ?>" id="img-uploaded" class="avatar-xl rounded-circle" alt="">
                    <div class="ms-3">
                      <h4 class="mb-0"><?php echo $singlePostAry[0]["i_name"]; ?></h4>
                      <p class="mb-0">
                        <?php echo $singlePostAry[0]["i_type"]; ?>
                      </p>
									  </div>
								  </div>
                  <div class="mb-4 mt-3">
                    <h4 class="mb-2">About instuctor</h4>
                    <?php echo $singlePostAry[0]["i_desc"]; ?>
                  </div>

                </div>
                <div class="tab-pane fade" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                  <!-- FAQ -->
                  <div>
                    <h3 class="mb-3">Course - Frequently Asked Questions</h3>
                    <div class="mb-4">
                      <h4>How this course help me to design layout?</h4>
                      <p>
                        My name is Jason Woo and I work as human duct tape at Gatsby, that means that I do a lot of
                        different things. Everything from dev roll to writing content to writing code. And I used to
                        work as an architect at IBM. I live in Portland, Oregon.
                      </p>
                    </div>
                    <div class="mb-4">
                      <h4>
                        What is important of this course?
                      </h4>
                      <p>
                        We'll dive into GraphQL, the fundamentals of GraphQL. We're only gonna use the pieces of it that
                        we need to build in Gatsby. We're not gonna be doing a deep dive into what GraphQL is or
                        the language specifics. We're also gonna get into MDX. MDX is a way to write React components in
                        your markdown.
                      </p>
                    </div>
                    <div class="mb-4">
                      <h4>Why Take This Course?</h4>
                      <p>
                        We'll dive into GraphQL, the fundamentals of GraphQL. We're only gonna use the pieces of it that
                        we need to build in Gatsby. We're not gonna be doing a deep dive into what GraphQL is or
                        the language specifics. We're also gonna get into MDX. MDX is a way to write React components in
                        your markdown.
                      </p>
                    </div>
                    <div class="mb-4">
                      <h4>
                        Is able to create application after this course?
                      </h4>
                      <p>
                        We'll dive into GraphQL, the fundamentals of GraphQL. We're only gonna use the pieces of it that
                        we need to build in Gatsby. We're not gonna be doing a deep dive into what GraphQL is or
                        the language specifics. We're also gonna get into MDX. MDX is a way to write React components in
                        your markdown.
                      </p>
                      <p>
                        We'll dive into GraphQL, the fundamentals of GraphQL. We're only gonna use the pieces of it that
                        we need to build in Gatsby. We're not gonna be doing a deep dive into what GraphQL is or
                        the language specifics. We're also gonna get into MDX. MDX is a way to write React components in
                        your markdown.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-12 col-md-12 col-12">
          <div class="card" id="courseAccordion">
            <div>
              <!-- List group -->
              <ul class="list-group list-group-flush">
                <?php $overCount = 0; ?>
                <?php foreach ($arrCoOver as $singleTitle): ?>
                  <li class="list-group-item p-0 bg-transparent">
                    <!-- Toggle -->
                    <a class="h4 mb-0 d-flex align-items-center text-inherit text-decoration-none py-3 px-4"
                      data-bs-toggle="collapse" href="#<?php echo 'overview' . $singleTitle["co_id"]; ?>" role="button" aria-expanded="<?php if ($overCount == 0) {
                      echo 'true';
                    } else {
                      echo 'false';
                    }
                    ?>"
                      aria-controls="<?php echo 'overview' . $singleTitle["co_id"]; ?>">
                      <div class="me-auto">
                        <?php echo $singleTitle["co_title"]; ?>
                        <p class="mb-0 text-muted fs-6 mt-1 fw-normal"><?php echo $singleTitle["co_info"]; ?>
                        </p>
                      </div>
                      <!-- Chevron -->
                      <span class="chevron-arrow ms-4">
                        <i class="fe fe-chevron-down fs-4"></i>
                      </span>
                    </a>
                    <!-- Row -->
                    <!-- Collapse -->
                    <div class="collapse <?php if ($overCount == 0) {
                      echo 'show';
                    }
                      $overCount++;
                    ?>" id="<?php echo 'overview' . $singleTitle["co_id"]; ?>" data-bs-parent="#courseAccordion">
                      <!-- List group item -->
                      <p style="padding-left: 24px; padding-right: 24px;">
                        <?php echo $singleTitle["co_desc"]; ?>
                      </p>
                    </div>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <!-- Footer -->
<div class="footer">
    <div class="container">
        <div class="row align-items-center g-0 border-top py-2">
            <!-- Desc -->
            <div class="col-md-6 col-12 text-center text-md-start">
                <span>© 2022 Simbolo UI. All Rights Reserved.</span>
            </div>
              <!-- Links -->
            <div class="col-12 col-md-6">
                <nav class="nav nav-footer justify-content-center justify-content-md-end">
                    <!-- <a class="nav-link active ps-0" href="#">Privacy</a>
                    <a class="nav-link" href="#">Terms </a>
                    <a class="nav-link" href="#">Feedback</a> -->
                    <a class="nav-link">Course information by Simbolo</a>
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

$(".navbar-toggler").on('click', function() {
  console.log('clicked');
  var $nav = $(".fixed-top");
  $nav.toggleClass('mobile-click');
});
</script>
</body>

</html>
