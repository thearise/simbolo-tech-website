<?php
require_once 'admin/core/init.php';

$propAllCourses = $user->getAllCourses();

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

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Geeks is a fully responsive and yet modern premium bootstrap 5 template & snippets. Geek is feature-rich components and beautifully designed pages that help you create the best possible website and web application projects. Bootstrap Snippet " />
<meta name="keywords" content="Geeks UI, bootstrap, bootstrap 5, Course, Sass, landing, Marketing, admin themes, bootstrap admin, bootstrap dashboard, ui kit, web app, multipurpose" />




<!-- Favicon icon-->
<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon/favicon.ico">


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
	<title>Instructor Dashboard | Geeks - Bootstrap 5 Template</title>
</head>

<body>
	<!-- Page Content -->
	<nav class="navbar navbar-expand-lg navbar-default">
	<div class="container-fluid px-0">
		<a class="navbar-brand" href="../index.html"
			><img src="assets/images/brand/logo/logo.svg" alt=""
		/></a>
		<!-- Mobile view nav wrap -->
		<ul
			class="navbar-nav navbar-right-wrap ms-auto d-lg-none d-flex nav-top-wrap"
		>
			<li class="dropdown stopevent">
				<a
					class="btn btn-light btn-icon rounded-circle text-muted indicator indicator-primary"
					href="#"
					role="button"
					data-bs-toggle="dropdown"
				>
					<i class="fe fe-bell"> </i>
				</a>
				<div class="dropdown-menu dropdown-menu-end shadow">
					<div>
						<div
							class="border-bottom px-3 pb-3 d-flex justify-content-between align-items-center"
						>
							<span class="h5 mb-0">Notifications</span>
							<a href="#" class="text-muted"
								><span class="align-middle"
									><i class="fe fe-settings me-1"></i></span
							></a>
						</div>
						<ul class="list-group list-group-flush "  style="height: 300px;" data-simplebar>
							<li class="list-group-item bg-light">
								<div class="row">
									<div class="col">
										<a href="#" class="text-body">
										<div class="d-flex">
											<img
												src="assets/images/avatar/avatar-1.jpg"
												alt=""
												class="avatar-md rounded-circle"
											/>
											<div class="ms-3">
												<h5 class="fw-bold mb-1">Kristin Watson:</h5>
												<p class="mb-3 text-body">
													Krisitn Watsan like your comment on course Javascript
													Introduction!
												</p>
												<span class="fs-6 text-muted">
													<span
														><span
															class="fe fe-thumbs-up text-success me-1"
														></span
														>2 hours ago,</span
													>
													<span class="ms-1">2:19 PM</span>
												</span>
											</div>
										</div>
										</a>
									</div>
									<div class="col-auto text-center me-2">
										<a
											href="#"
											class="badge-dot bg-info"
											data-bs-toggle="tooltip"
											data-bs-placement="top"
											title="Mark as read"
										>
										</a>
										<div>
											<a
												href="#"
												data-bs-toggle="tooltip"
												data-bs-placement="top"

												title="Remove"
											>
												<i class="fe fe-x text-muted"></i>
											</a>
										</div>
									</div>
								</div>
							</li>
							<li class="list-group-item">
								<div class="row">
									<div class="col">
										<a href="#" class="text-body">
										<div class="d-flex">
											<img
												src="assets/images/avatar/avatar-2.jpg"
												alt=""
												class="avatar-md rounded-circle"
											/>
											<div class="ms-3">
												<h5 class="fw-bold mb-1">Brooklyn Simmons</h5>
												<p class="mb-3 text-body">
													Just launched a new Courses React for Beginner.
												</p>
												<span class="fs-6 text-muted">
													<span
														><span
															class="fe fe-thumbs-up text-success me-1"
														></span
														>Oct 9,</span
													>
													<span class="ms-1">1:20 PM</span>
												</span>
											</div>
										</div>
										</a>
									</div>
									<div class="col-auto text-center me-2">
										<a
											href="#"
											class="badge-dot bg-secondary"
											data-bs-toggle="tooltip"
											data-bs-placement="top"

											title="Mark as unread"
										>
										</a>
									</div>
								</div>
							</li>
							<li class="list-group-item">
								<div class="row">
									<div class="col">
										<a href="#" class="text-body">
										<div class="d-flex">
											<img
												src="assets/images/avatar/avatar-3.jpg"
												alt=""
												class="avatar-md rounded-circle"
											/>
											<div class="ms-3">
												<h5 class="fw-bold mb-1">Jenny Wilson</h5>
												<p class="mb-3 text-body">
													Krisitn Watsan like your comment on course Javascript
													Introduction!
												</p>
												<span class="fs-6 text-muted">
													<span
														><span class="fe fe-thumbs-up text-info me-1"></span
														>Oct 9,</span
													>
													<span class="ms-1">1:56 PM</span>
												</span>
											</div>
										</div>
										</a>
									</div>
									<div class="col-auto text-center me-2">
										<a
											href="#"
											class="badge-dot bg-secondary"
											data-bs-toggle="tooltip"
											data-bs-placement="top"

											title="Mark as unread"
										>
										</a>
									</div>
								</div>
							</li>
							<li class="list-group-item">
								<div class="row">
									<div class="col">
										<a href="#" class="text-body">
										<div class="d-flex">
											<img
												src="assets/images/avatar/avatar-4.jpg"
												alt=""
												class="avatar-md rounded-circle"
											/>
											<div class="ms-3">
												<h5 class="fw-bold mb-1">Sina Ray</h5>
												<p class="mb-3 text-body">
													You earn new certificate for complete the Javascript
													Beginner course.
												</p>
												<span class="fs-6 text-muted">
													<span
														><span class="fe fe-award text-warning me-1"></span
														>Oct 9,</span
													>
													<span class="ms-1">1:56 PM</span>
												</span>
											</div>
										</div>
										</a>
									</div>
									<div class="col-auto text-center me-2">
										<a
											href="#"
											class="badge-dot bg-secondary"
											data-bs-toggle="tooltip"
											data-bs-placement="top"

											title="Mark as unread"
										>
										</a>
									</div>
								</div>
							</li>
						</ul>
						<div class="border-top px-3 pt-3 pb-0">
							<a
								href="notification-history.html"
								class="text-link fw-semi-bold"
								>See all Notifications</a
							>
						</div>
					</div>
				</div>
			</li>
			<li class="dropdown ms-2">
				<a
					class="rounded-circle"
					href="#"
					role="button"
					data-bs-toggle="dropdown"
				>
					<div class="avatar avatar-md avatar-indicators avatar-online">
						<img
							alt="avatar"
							src="assets/images/avatar/avatar-1.jpg"
							class="rounded-circle"
						/>
					</div>
				</a>
				<div class="dropdown-menu dropdown-menu-end shadow">
					<div class="dropdown-item">
						<div class="d-flex">
							<div class="avatar avatar-md avatar-indicators avatar-online">
								<img
									alt="avatar"
									src="assets/images/avatar/avatar-1.jpg"
									class="rounded-circle"
								/>
							</div>
							<div class="ms-3 lh-1">
								<h5 class="mb-1">Annette Black</h5>
								<p class="mb-0 text-muted">annette@geeksui.com</p>
							</div>
						</div>
					</div>
					<div class="dropdown-divider"></div>
					<ul class="list-unstyled">
						<li class="dropdown-submenu">
							<a
								class="dropdown-item dropdown-list-group-item dropdown-toggle"
								href="#"
							>
								<i class="fe fe-circle me-2"></i>Status
							</a>
							<ul class="dropdown-menu">
								<li>
									<a class="dropdown-item" href="#">
										<span class="badge-dot bg-success me-2"></span>Online
									</a>
								</li>
								<li>
									<a class="dropdown-item" href="#">
										<span class="badge-dot bg-secondary me-2"></span>Offline
									</a>
								</li>
								<li>
									<a class="dropdown-item" href="#">
										<span class="badge-dot bg-warning me-2"></span>Away
									</a>
								</li>
								<li>
									<a class="dropdown-item" href="#">
										<span class="badge-dot bg-danger me-2"></span>Busy
									</a>
								</li>
							</ul>
						</li>

						<li>
							<a class="dropdown-item" href="profile-edit.html">
								<i class="fe fe-user me-2"></i>Profile
							</a>
						</li>
						<li>
							<a
								class="dropdown-item"
								href="student-subscriptions.html"
							>
								<i class="fe fe-star me-2"></i>Subscription
							</a>
						</li>
						<li>
							<a class="dropdown-item" href="#">
								<i class="fe fe-settings me-2"></i>Settings
							</a>
						</li>
					</ul>
					<div class="dropdown-divider"></div>
					<ul class="list-unstyled">
						<li>
							<a class="dropdown-item" href="../index.html">
								<i class="fe fe-power me-2"></i>Sign Out
							</a>
						</li>
					</ul>
				</div>
			</li>
		</ul>
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
			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					<a
						class="nav-link dropdown-toggle"
						href="#"
						id="navbarBrowse"
						data-bs-toggle="dropdown"
						aria-haspopup="true"
						aria-expanded="false"
						data-bs-display="static"
					>
						Browse
					</a>
					<ul
						class="dropdown-menu dropdown-menu-arrow"
						aria-labelledby="navbarBrowse"
					>
						<li class="dropdown-submenu dropend">
							<a
								class="dropdown-item dropdown-list-group-item dropdown-toggle"
								href="#"
							>
								Web Development
							</a>
							<ul class="dropdown-menu">
								<li>
									<a
										class="dropdown-item"
										href="course-category.html"
									>
										Bootstrap</a
									>
								</li>
								<li>
									<a
										class="dropdown-item"
										href="course-category.html"
									>
										React
									</a>
								</li>
								<li>
									<a
										class="dropdown-item"
										href="course-category.html"
									>
										GraphQl</a
									>
								</li>
								<li>
									<a
										class="dropdown-item"
										href="course-category.html"
									>
										Gatsby</a
									>
								</li>
								<li>
									<a
										class="dropdown-item"
										href="course-category.html"
									>
										Grunt</a
									>
								</li>
								<li>
									<a
										class="dropdown-item"
										href="course-category.html"
									>
										Svelte</a
									>
								</li>
								<li>
									<a
										class="dropdown-item"
										href="course-category.html"
									>
										Meteor</a
									>
								</li>
								<li>
									<a
										class="dropdown-item"
										href="course-category.html"
									>
										HTML5</a
									>
								</li>
								<li>
									<a
										class="dropdown-item"
										href="course-category.html"
									>
										Angular</a
									>
								</li>
							</ul>
						</li>
						<li class="dropdown-submenu dropend">
							<a
								class="dropdown-item dropdown-list-group-item dropdown-toggle"
								href="#"
							>
								Design
							</a>
							<ul class="dropdown-menu">
								<li>
									<a
										class="dropdown-item"
										href="course-category.html"
									>
										Graphic Design</a
									>
								</li>
								<li>
									<a
										class="dropdown-item"
										href="course-category.html"
									>
										Illustrator
									</a>
								</li>
								<li>
									<a
										class="dropdown-item"
										href="course-category.html"
									>
										UX / UI Design</a
									>
								</li>
								<li>
									<a
										class="dropdown-item"
										href="course-category.html"
									>
										Figma Design</a
									>
								</li>
								<li>
									<a
										class="dropdown-item"
										href="course-category.html"
									>
										Adobe XD</a
									>
								</li>
								<li>
									<a
										class="dropdown-item"
										href="course-category.html"
									>
										Sketch</a
									>
								</li>
								<li>
									<a
										class="dropdown-item"
										href="course-category.html"
									>
										Icon Design</a
									>
								</li>
								<li>
									<a
										class="dropdown-item"
										href="course-category.html"
									>
										Photoshop</a
									>
								</li>
							</ul>
						</li>
						<li>
							<a
								href="course-category.html"
								class="dropdown-item"
							>
								Mobile App
							</a>
						</li>
						<li>
							<a
								href="course-category.html"
								class="dropdown-item"
							>
								IT Software
							</a>
						</li>
						<li>
							<a
								href="course-category.html"
								class="dropdown-item"
							>
								Marketing
							</a>
						</li>
						<li>
							<a
								href="course-category.html"
								class="dropdown-item"
							>
								Music
							</a>
						</li>
						<li>
							<a
								href="course-category.html"
								class="dropdown-item"
							>
								Life Style
							</a>
						</li>
						<li>
							<a
								href="course-category.html"
								class="dropdown-item"
							>
								Business
							</a>
						</li>
						<li>
							<a
								href="course-category.html"
								class="dropdown-item"
							>
								Photography
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item dropdown">
					<a
						class="nav-link dropdown-toggle"
						href="#"
						id="navbarLanding"
						data-bs-toggle="dropdown"
						aria-haspopup="true"
						aria-expanded="false"
					>
						Landings
					</a>
					<ul class="dropdown-menu" aria-labelledby="navbarLanding">
						<li>
							<h4 class="dropdown-header">Landings</h4>
						</li>
						<li>
							<a
								href="landings/landing-courses.html"
								class="dropdown-item"
							>
								Courses
							</a>
						</li>
						<li>
							<a
								href="landings/course-lead.html"
								class="dropdown-item"
							>
								Lead Course
							</a>
						</li>
						<li>
							<a
								href="landings/request-access.html"
								class="dropdown-item"
							>
								Request Access
							</a>
						</li>
						<li>
							<a href="landings/landing-sass.html" class="dropdown-item">
						  SaaS
							</a>
						 </li>


						 <li>
							<a href="landings/landing-job.html" class="dropdown-item d-flex justify-content-between">
						 Job Listing <span class="badge bg-primary ms-1"> New </span>
							</a>
						 </li>



					</ul>
				</li>
				<li class="nav-item dropdown">
					<a
						class="nav-link dropdown-toggle"
						href="#"
						id="navbarPages"
						data-bs-toggle="dropdown"
						aria-haspopup="true"
						aria-expanded="false"
					>
						Pages
					</a>
					<ul
						class="dropdown-menu dropdown-menu-arrow"
						aria-labelledby="navbarPages"
					>
					<li class="dropdown-submenu dropend">
						<a
							class="dropdown-item dropdown-list-group-item dropdown-toggle"
							href="#"
						>
							Courses
						</a>
						<ul class="dropdown-menu">
							<li>
								<a
									class="dropdown-item"
									href="course-single.html"
								>
									Course Single
								</a>
							</li>
							<li>
								<a
									class="dropdown-item"
									href="course-single-v2.html"
								>
									Course Single v2
								</a>
							</li>
							<li>
								<a
									class="dropdown-item"
									href="course-resume.html"
								>
									Course Resume
								</a>
							</li>
							<li>
								<a
									class="dropdown-item"
									href="course-category.html"
								>
									Course Category
								</a>
							</li>
							<li>
								<a
									class="dropdown-item"
									href="course-checkout.html"
								>
									Course Checkout
								</a>
							</li>
							<li>
								<a
									class="dropdown-item"
									href="course-filter-list.html"
								>
									Course List/Grid
								</a>
							</li>
							<li>
								<a class="dropdown-item" href="add-course.html">
									Add New Course
								</a>
							</li>
						</ul>
					</li>
					<li class="dropdown-submenu dropend">
						<a
							class="dropdown-item dropdown-list-group-item dropdown-toggle"
							href="#"
						>
							Paths
						</a>
						<ul class="dropdown-menu">
							<li>
								<a
									href="course-path.html"
									class="dropdown-item"
								>
									Browse Path
								</a>
							</li>
							<li>
								<a
									href="course-path-single.html"
									class="dropdown-item"
								>
									Path Single
								</a>
							</li>
						</ul>
					</li>
					<li class="dropdown-submenu dropend">
						<a
							class="dropdown-item dropdown-list-group-item dropdown-toggle"
							href="#"
						>
							Blog
						</a>
						<ul class="dropdown-menu">
							<li>
								<a class="dropdown-item" href="blog.html">
									Listing</a
								>
							</li>
							<li>
								<a
									class="dropdown-item"
									href="blog-single.html"
								>
									Article
								</a>
							</li>
							<li>
								<a
									class="dropdown-item"
									href="blog-category.html"
								>
									Category</a
								>
							</li>
							<li>
								<a
									class="dropdown-item"
									href="blog-sidebar.html"
								>
									Sidebar</a
								>
							</li>
						</ul>
					</li>

					<li class="dropdown-submenu dropend">
						<a
							class="dropdown-item dropdown-list-group-item dropdown-toggle"
							href="#"
						>
							Career
						</a>
						<ul class="dropdown-menu">
							<li>
								<a class="dropdown-item" href="career.html">
									 Overview</a
								>
							</li>
							<li>
								<a
									class="dropdown-item"
									href="career-list.html"
								>
									Listing
								</a>
							</li>
							<li>
								<a
									class="dropdown-item"
									href="career-single.html"
								>
									Opening</a
								>
							</li>

						</ul>
					</li>
					<li class="dropdown-submenu dropend">
						<a
							class="dropdown-item dropdown-list-group-item dropdown-toggle"
							href="#"
						>
							Portfolio  <span class="badge bg-primary ms-2"> New </span>
						</a>
						<ul class="dropdown-menu">
							<li>
								<a class="dropdown-item" href="portfolio.html">
									 List</a
								>
							</li>
							<li>
								<a
									class="dropdown-item"
									href="portfolio-single.html"
								>
									Single
								</a>
							</li>


						</ul>
					</li>
					<li class="dropdown-submenu dropend">
						<a
							class="dropdown-item dropdown-list-group-item dropdown-toggle"
							href="#"
						>
							Job  <span class="badge bg-primary ms-2"> New </span>
						</a>
						<ul class="dropdown-menu">
							<li>
								<a class="dropdown-item" href="landings/landing-job.html">
									 Home</a
								>
							</li>
							<li>
								<a
									class="dropdown-item"
									href="jobs/job-listing.html"
								>
									List
								</a>
							</li>
							<li>
								<a
									class="dropdown-item"
									href="jobs/job-grid.html"
								>
									Grid
								</a>
							</li>
							<li>
								<a
									class="dropdown-item"
									href="jobs/job-single.html"
								>
									Single
								</a>
							</li>
							<li>
								<a
									class="dropdown-item"
									href="jobs/company-list.html"
								>
									Company List
								</a>
							</li>
							<li>
								<a
									class="dropdown-item"
									href="jobs/company-about.html"
								>
									Company Single
								</a>
							</li>


						</ul>
					</li>
					<li class="dropdown-submenu dropend">
						<a
							class="dropdown-item dropdown-list-group-item dropdown-toggle"
							href="#"
						>
							Specialty
						</a>
						<ul class="dropdown-menu">
							<li>
								<a
									class="dropdown-item"
									href="coming-soon.html"
								>
									Coming Soon
								</a>
							</li>
							<li>
								<a
									class="dropdown-item"
									href="404-error.html"
								>
									Error 404
								</a>
							</li>
							<li>
								<a
									class="dropdown-item"
									href="maintenance-mode.html"
								>
									Maintenance Mode
								</a>
							</li>
							<li>
								<a
									class="dropdown-item"
									href="terms-condition-page.html"
								>
									Terms & Conditions
								</a>
							</li>
						</ul>
					</li>
					<li>
						<hr class="mx-3" />
					</li>


					<li>
						<a class="dropdown-item" href="about.html">
							About
						</a>
					</li>

					<li class="dropdown-submenu dropend">
						<a
							class="dropdown-item dropdown-list-group-item dropdown-toggle"
							href="#"
						>
						Help Center
						</a>
						<ul class="dropdown-menu">
							<li>
								<a
									class="dropdown-item"
									href="help-center.html"
								>
									Help Center
								</a>
							</li>
							<li>
								<a
									class="dropdown-item"
									href="help-center-faq.html"
								>
									FAQ's
								</a>
							</li>
							<li>
								<a
									class="dropdown-item"
									href="help-center-guide.html"
								>
									Guide
								</a>
							</li>
							<li>
								<a
									class="dropdown-item"
									href="help-center-guide-single.html"
								>
								Guide Single
								</a>
							</li>
							<li>
								<a
									class="dropdown-item"
									href="help-center-support.html"
								>
								Support
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a class="dropdown-item" href="pricing.html">
							Pricing
						</a>
					</li>
					<li>
						<a class="dropdown-item" href="compare-plan.html">
							Compare Plan
						</a>
					</li>

					<li>
						<a class="dropdown-item" href="contact.html">
							Contact
						</a>
					</li>
					</ul>
				</li>

				<li class="nav-item dropdown">
					<a
						class="nav-link dropdown-toggle"
						href="#"
						id="navbarAccount"
						data-bs-toggle="dropdown"
						aria-haspopup="true"
						aria-expanded="false"
					>
						Accounts
					</a>
					<ul
						class="dropdown-menu dropdown-menu-arrow"
						aria-labelledby="navbarAccount"
					>
						<li>
							<h4 class="dropdown-header">Accounts</h4>
						</li>
						<li class="dropdown-submenu dropend">
							<a
								class="dropdown-item dropdown-list-group-item dropdown-toggle"
								href="#"
							>
								Instructor
							</a>
							<ul class="dropdown-menu">
								<li class="text-wrap">
									<h5 class="dropdown-header text-dark">Instructor</h5>
									<p class="dropdown-text mb-0">
										Instructor dashboard for manage courses and earning.
									</p>
								</li>
								<li>
									<hr class="mx-3" />
								</li>
								<li>
									<a
										class="dropdown-item"
										href="dashboard-instructor.html"
									>
										Dashboard</a
									>
								</li>
								<li>
									<a
										class="dropdown-item"
										href="instructor-profile.html"
									>
										Profile</a
									>
								</li>
								<li>
									<a
										class="dropdown-item"
										href="instructor-courses.html"
									>
										My Courses
									</a>
								</li>
								<li>
									<a
										class="dropdown-item"
										href="instructor-order.html"
									>
										Orders</a
									>
								</li>
								<li>
									<a
										class="dropdown-item"
										href="instructor-reviews.html"
									>
										Reviews</a
									>
								</li>
								<li>
									<a
										class="dropdown-item"
										href="instructor-students.html"
									>
										Students</a
									>
								</li>
								<li>
									<a
										class="dropdown-item"
										href="instructor-payouts.html"
									>
										Payouts</a
									>
								</li>
								<li>
									<a
										class="dropdown-item"
										href="instructor-earning.html"
									>
										Earning</a
									>
								</li>
							</ul>
						</li>
						<li class="dropdown-submenu dropend">
							<a
								class="dropdown-item dropdown-list-group-item dropdown-toggle"
								href="#"
							>
								Students
							</a>
							<ul class="dropdown-menu">
								<li class="text-wrap">
									<h5 class="dropdown-header text-dark">Students</h5>
									<p class="dropdown-text mb-0">
										Students dashboard to manage your courses and subscriptions.
									</p>
								</li>
								<li>
									<hr class="mx-3" />
								</li>
								<li>
									<a
										class="dropdown-item"
										href="dashboard-student.html"
									>
										Dashboard</a
									>
								</li>
								<li>
									<a
										class="dropdown-item"
										href="student-subscriptions.html"
									>
										Subscriptions
									</a>
								</li>
								<li>
									<a
										class="dropdown-item"
										href="payment-method.html"
									>
										Payments</a
									>
								</li>
								<li>
									<a
										class="dropdown-item"
										href="billing-info.html"
									>
										Billing Info</a
									>
								</li>
								<li>
									<a class="dropdown-item" href="invoice.html">
										Invoice</a
									>
								</li>
								<li>
									<a
										class="dropdown-item"
										href="invoice-details.html"
									>
										Invoice Details</a
									>
								</li>
								<li>
									<a
										class="dropdown-item"
										href="dashboard-student.html"
									>
										Bookmarked</a
									>
								</li>
								<li>
									<a
										class="dropdown-item"
										href="dashboard-student.html"
									>
										My Path</a
									>
								</li>
							</ul>
						</li>
						<li class="dropdown-submenu dropend">
							<a
								class="dropdown-item dropdown-list-group-item dropdown-toggle"
								href="#"
							>
								Admin
							</a>
							<ul class="dropdown-menu">
								<li class="text-wrap">
									<h5 class="dropdown-header text-dark">Master Admin</h5>
									<p class="dropdown-text mb-0">
										Master admin dashboard to manage courses, user, site setting
										, and work with amazing apps.
									</p>
								</li>
								<li>
									<hr class="mx-3" />
								</li>
								<li class="px-3 d-grid">
									<a
										href="dashboard/admin-dashboard.html"
										class="btn btn-sm btn-primary"
										>Go to Dashboard</a
									>
								</li>
							</ul>
						</li>
						<li>
							<hr class="mx-3" />
						</li>
						<li>
							<a class="dropdown-item" href="sign-in.html">
								Sign In
							</a>
						</li>
						<li>
							<a class="dropdown-item" href="sign-up.html">
								Sign Up
							</a>
						</li>
						<li>
							<a
								class="dropdown-item"
								href="forget-password.html"
							>
								Forgot Password
							</a>
						</li>
						<li>
							<a class="dropdown-item" href="profile-edit.html">
								Edit Profile
							</a>
						</li>
						<li>
							<a class="dropdown-item" href="security.html">
								Security
							</a>
						</li>
						<li>
							<a
								class="dropdown-item"
								href="social-profile.html"
							>
								Social Profiles
							</a>
						</li>
						<li>
							<a
								class="dropdown-item"
								href="notifications.html"
							>
								Notifications
							</a>
						</li>
						<li>
							<a
								class="dropdown-item"
								href="profile-privacy.html"
							>
								Privacy Settings
							</a>
						</li>
						<li>
							<a
								class="dropdown-item"
								href="delete-profile.html"
							>
								Delete Profile
							</a>
						</li>
						<li>
							<a
								class="dropdown-item"
								href="linked-accounts.html"
							>
								Linked Accounts
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item dropdown">
					<a
						class="nav-link"
						href="#"
						id="navbarDropdown"
						role="button"
						data-bs-toggle="dropdown"
						aria-haspopup="true"
						aria-expanded="false"
					>
						<i class="fe fe-more-horizontal fs-3"></i>
					</a>
					<div
						class="dropdown-menu dropdown-menu-md"
						aria-labelledby="navbarDropdown"
					>
						<div class="list-group">
							<a
								class="list-group-item list-group-item-action border-0"
								href="../docs/index.html"
							>
								<div class="d-flex align-items-center">
									<i class="fe fe-file-text fs-3 text-primary"></i>
									<div class="ms-3">
										<h5 class="mb-0">Documentations</h5>
										<p class="mb-0 fs-6">
											Browse the all documentation
										</p>
									</div>
								</div>
							</a>
							<a
								class="list-group-item list-group-item-action border-0"
								href="../docs/changelog.html"
							>
								<div class="d-flex align-items-center">
									<i class="fe fe-layers fs-3 text-primary"></i>
									<div class="ms-3">
										<h5 class="mb-0">
											Changelog <span class="text-primary ms-1">v2.4.0</span>
										</h5>
										<p class="mb-0 fs-6">See what's new</p>
									</div>
								</div>
							</a>
						</div>
					</div>
				</li>
			</ul>
			<form class="mt-3 mt-lg-0 ms-lg-3 d-flex align-items-center">
				<span class="position-absolute ps-3 search-icon">
					<i class="fe fe-search"></i>
				</span>
				<input
					type="search"
					class="form-control ps-6"
					placeholder="Search Courses"
				/>
			</form>
			<ul class="navbar-nav navbar-right-wrap ms-auto d-none d-lg-block">
				<li class="dropdown d-inline-block stopevent">
					<a
						class="btn btn-light btn-icon rounded-circle text-muted indicator indicator-primary"
						href="#"
						role="button"
						id="dropdownNotificationSecond"
						data-bs-toggle="dropdown"
						aria-haspopup="true"
						aria-expanded="false"
					>
						<i class="fe fe-bell"> </i>
					</a>
					<div
						class="dropdown-menu dropdown-menu-end dropdown-menu-lg"
						aria-labelledby="dropdownNotificationSecond"
					>
						<div>
							<div
								class="border-bottom px-3 pb-3 d-flex justify-content-between align-items-center"
							>
								<span class="h5 mb-0">Notifications</span>
								<a href="#" class="text-muted"
									><span class="align-middle"
										><i class="fe fe-settings me-1"></i></span
								></a>
							</div>
							<ul class="list-group list-group-flush  "  style="height: 300px;" data-simplebar>
								<li class="list-group-item bg-light">
									<div class="row">
										<div class="col">
											<a class="text-body" href="#">
											<div class="d-flex">
												<img
													src="assets/images/avatar/avatar-1.jpg"
													alt=""
													class="avatar-md rounded-circle"
												/>
												<div class="ms-3">
													<h5 class="fw-bold mb-1">Kristin Watson:</h5>
													<p class="mb-3 text-body">
														Krisitn Watsan like your comment on course
														Javascript Introduction!
													</p>
													<span class="fs-6 text-muted">
														<span
															><span
																class="fe fe-thumbs-up text-success me-1"
															></span
															>2 hours ago,</span
														>
														<span class="ms-1">2:19 PM</span>
													</span>
												</div>
											</div>
											</a>
										</div>
										<div class="col-auto text-center me-2">

											<a
												href="#"
												class="badge-dot bg-info"
												data-bs-toggle="tooltip"
												data-bs-placement="top"

												title="Mark as read"
											>
											</a>
											<div>
												<a
													href="#"
													class="bg-transparent"
													data-bs-toggle="tooltip"
													data-bs-placement="top"

													title="Remove"
												>
													<i class="fe fe-x text-muted"></i>
												</a>
											</div>
										</div>
									</div>
								</li>
								<li class="list-group-item">
									<div class="row">
										<div class="col">
											<a class="text-body" href="#">
											<div class="d-flex">
												<img
													src="assets/images/avatar/avatar-2.jpg"
													alt=""
													class="avatar-md rounded-circle"
												/>
												<div class="ms-3">
													<h5 class="fw-bold mb-1">Brooklyn Simmons</h5>
													<p class="mb-3 text-body">
														Just launched a new Courses React for Beginner.
													</p>
													<span class="fs-6 text-muted">
														<span
															><span
																class="fe fe-thumbs-up text-success me-1"
															></span
															>Oct 9,</span
														>
														<span class="ms-1">1:20 PM</span>
													</span>
												</div>
											</div>
											</a>
										</div>
										<div class="col-auto text-center me-2">
											<a
												href="#"
												class="badge-dot bg-secondary"
												data-bs-toggle="tooltip"
												data-bs-placement="top"

												title="Mark as unread"
											>
											</a>
										</div>
									</div>
								</li>
								<li class="list-group-item">
									<div class="row">
										<div class="col">
											<a class="text-body" href="#">
											<div class="d-flex">
												<img
													src="assets/images/avatar/avatar-3.jpg"
													alt=""
													class="avatar-md rounded-circle"
												/>
												<div class="ms-3">
													<h5 class="fw-bold mb-1">Jenny Wilson</h5>
													<p class="mb-3 text-body">
														Krisitn Watsan like your comment on course
														Javascript Introduction!
													</p>
													<span class="fs-6 text-muted">
														<span
															><span
																class="fe fe-thumbs-up text-info me-1"
															></span
															>Oct 9,</span
														>
														<span class="ms-1">1:56 PM</span>
													</span>
												</div>
											</div>
											</a>
										</div>
										<div class="col-auto text-center me-2">
											<a
												href="#"
												class="badge-dot bg-secondary"
												data-bs-toggle="tooltip"
												data-bs-placement="top"

												title="Mark as unread"
											>
											</a>
										</div>
									</div>
								</li>
								<li class="list-group-item">
									<div class="row">
										<div class="col">
											<a class="text-body" href="#">
											<div class="d-flex">
												<img
													src="assets/images/avatar/avatar-4.jpg"
													alt=""
													class="avatar-md rounded-circle"
												/>
												<div class="ms-3">
													<h5 class="fw-bold mb-1">Sina Ray</h5>
													<p class="mb-3 text-body">
														You earn new certificate for complete the Javascript
														Beginner course.
													</p>
													<span class="fs-6 text-muted">
														<span
															><span
																class="fe fe-award text-warning me-1"
															></span
															>Oct 9,</span
														>
														<span class="ms-1">1:56 PM</span>
													</span>
												</div>
											</div>
											</a>
										</div>
										<div class="col-auto text-center me-2">
											<a
												href="#"
												class="badge-dot bg-secondary"
												data-bs-toggle="tooltip"
												data-bs-placement="top"

												title="Mark as unread"
											>
											</a>
										</div>
									</div>
								</li>
							</ul>
							<div class="border-top px-3 pt-3 pb-0">
								<a
									href="notification-history.html"
									class="text-link fw-semi-bold"
									>See all Notifications</a
								>
							</div>
						</div>
					</div>
				</li>

				<li class="dropdown ms-2 d-inline-block">
					<a
						class="rounded-circle"
						href="#"
						data-bs-toggle="dropdown"
						data-bs-display="static"
						aria-expanded="false"
					>
						<div class="avatar avatar-md avatar-indicators avatar-online">
							<img
								alt="avatar"
								src="assets/images/avatar/avatar-1.jpg"
								class="rounded-circle"
							/>
						</div>
					</a>
					<div class="dropdown-menu dropdown-menu-end">
						<div class="dropdown-item">
							<div class="d-flex">
								<div class="avatar avatar-md avatar-indicators avatar-online">
									<img
										alt="avatar"
										src="assets/images/avatar/avatar-1.jpg"
										class="rounded-circle"
									/>
								</div>
								<div class="ms-3 lh-1">
									<h5 class="mb-1">Annette Black</h5>
									<p class="mb-0 text-muted">annette@geeksui.com</p>
								</div>
							</div>
						</div>
						<div class="dropdown-divider"></div>
						<ul class="list-unstyled">
							<li class="dropdown-submenu dropstart-lg">
								<a
									class="dropdown-item dropdown-list-group-item dropdown-toggle"
									href="#"
								>
									<i class="fe fe-circle me-2"></i>Status
								</a>
								<ul class="dropdown-menu">
									<li>
										<a class="dropdown-item" href="#">
											<span class="badge-dot bg-success me-2"></span>Online
										</a>
									</li>
									<li>
										<a class="dropdown-item" href="#">
											<span class="badge-dot bg-secondary me-2"></span>Offline
										</a>
									</li>
									<li>
										<a class="dropdown-item" href="#">
											<span class="badge-dot bg-warning me-2"></span>Away
										</a>
									</li>
									<li>
										<a class="dropdown-item" href="#">
											<span class="badge-dot bg-danger me-2"></span>Busy
										</a>
									</li>
								</ul>
							</li>
							<li>
								<a
									class="dropdown-item"
									href="profile-edit.html"
								>
									<i class="fe fe-user me-2"></i>Profile
								</a>
							</li>
							<li>
								<a
									class="dropdown-item"
									href="student-subscriptions.html"
								>
									<i class="fe fe-star me-2"></i>Subscription
								</a>
							</li>
							<li>
								<a class="dropdown-item" href="#">
									<i class="fe fe-settings me-2"></i>Settings
								</a>
							</li>
						</ul>
						<div class="dropdown-divider"></div>
						<ul class="list-unstyled">
							<li>
								<a class="dropdown-item" href="../index.html">
									<i class="fe fe-power me-2"></i>Sign Out
								</a>
							</li>
						</ul>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>

	<div class="pt-5 pb-5">
		<div class="container">
			<!-- User info -->
			<div class="row align-items-center">
				<div class="col-xl-12 col-lg-12 col-md-12 col-12">
					<!-- Bg -->
					<div class="pt-16 rounded-top-md" style="
								background: url('assets/images/background/profile-bg.jpg') no-repeat;
								background-size: cover;
							"></div>
					<div
						class="d-flex align-items-end justify-content-between bg-white px-4 pt-2 pb-4 rounded-none rounded-bottom-md shadow-sm">
						<div class="d-flex align-items-center">
							<div class="me-2 position-relative d-flex justify-content-end align-items-end mt-n5">
								<img src="assets/images/avatar/avatar-1.jpg" class="avatar-xl rounded-circle border border-4 border-white position-relative"
									alt="" />
								<a href="#" class="position-absolute top-0 end-0" data-bs-toggle="tooltip" data-placement="top"
									title="Verified">
									<img src="assets/images/svg/checked-mark.svg" alt="" height="30" width="30" />
								</a>
							</div>
							<div class="lh-1">
								<h2 class="mb-0">Jenny Wilson</h2>
								<p class="mb-0 d-block">@Jennywilson</p>
							</div>
						</div>
						<div>
							<a href="add-course.html" class="btn btn-primary btn-sm d-none d-md-block">Create New Review</a>
						</div>
					</div>
				</div>
			</div>

	<!-- Content -->

			<div class="row mt-0 mt-md-4">
				<div class="col-lg-3 col-md-4 col-12">
					<!-- User profile -->
					<nav class="navbar navbar-expand-md navbar-light shadow-sm mb-4 mb-lg-0 sidenav">
						<!-- Menu -->
						<a class="d-xl-none d-lg-none d-md-none text-inherit fw-bold" href="#">Menu</a>
						<!-- Button -->
						<button class="navbar-toggler d-md-none icon-shape icon-sm rounded bg-primary text-light" type="button"
							data-bs-toggle="collapse" data-bs-target="#sidenav" aria-controls="sidenav" aria-expanded="false"
							aria-label="Toggle navigation">
							<span class="fe fe-menu"></span>
						</button>
						<!-- Collapse -->
						<div class="collapse navbar-collapse" id="sidenav">
							<div class="navbar-nav flex-column">
								<span class="navbar-header">Dashboard</span>
                <ul class="list-unstyled ms-n2 mb-4">
									<!-- Nav item -->
									<li class="nav-item">
										<a class="nav-link" href="admin-panel.php"><i class="fe fe-book nav-icon"></i>All Courses</a>
									</li>
                  <!-- Nav item -->
									<li class="nav-item">
										<a class="nav-link" href="admin-panel-cate.php"><i class="fe fe-pie-chart nav-icon"></i>Categories</a>
									</li>
                  <!-- Nav item -->
									<li class="nav-item">
										<a class="nav-link" href="admin-panel-inst.php"><i class="fe fe-users nav-icon"></i>Instructors</a>
									</li>
									<!-- Nav item -->
									<li class="nav-item active">
										<a class="nav-link" href="admin-panel-revi.php"><i class="fe fe-star nav-icon"></i>Reviews</a>
									</li>
								</ul>
							</div>
						</div>
					</nav>
				</div>
				<div class="col-lg-9 col-md-8 col-12">
					<div class="row">
            <div class="card">
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
                <span>© 2022 Geeks. All Rights Reserved.</span>
            </div>
              <!-- Links -->
            <div class="col-12 col-md-6">
                <nav class="nav nav-footer justify-content-center justify-content-md-end">
                    <a class="nav-link active ps-0" href="#">Privacy</a>
                    <a class="nav-link" href="#">Terms </a>
                    <a class="nav-link" href="#">Feedback</a>
                    <a class="nav-link" href="#">Support</a>
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
</body>

</html>
