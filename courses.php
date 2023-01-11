<?php
require_once 'admin/core/init.php';

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

.fixed-top {
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
</style>




<!-- Theme CSS -->
<link rel="stylesheet" href="assets/css/theme.min.css">
  <title>Categories | Simbolo Learning Platform</title>
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

  <!-- Page header -->
  <div class="py-4 py-lg-6" style="padding-top: 100px !important; background: #CA4443;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
          <div>
            <h1 class="text-white mb-1 display-4" style="font-family: made_tommy; font-weight: 500;">Browse All of Simbolo Courses</h1>
            <p class="mb-0 text-white lead" style="font-family: made_tommy; font-weight: 400;">Over 500+ students are learning at Simbolo.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Content -->
  <div class="py-6">
    <div class="container">
      <!-- Content -->
      <div class="row ">
        <!-- <div class="col-lg-12 col-md-12 col-12">
          <div class="mb-5">
            <h2 class="mb-1">Popular Instructors</h2>
            <p class="mb-0">Best and Professional Instructors</p>
          </div>
        </div> -->
				<div class="col-md-12">
					<h1 class="display-3 fw-bold" style="font-family: made_tommy; font-size: 40px;">Popular Instructors</h1>
					<!-- <h2 class="mb-1 display-4 fw-bold" style="font-family: made_tommy">The World's Top Courses</h2> -->
					<p class="mb-8 lead" style="font-family: made_tommy">We got best and professional Instructors</p>
				</div>
      </div>
      <div class="row mb-6">
				<?php foreach ($arrInstruts as $singleTitle): ?>
					<div class="col-lg-3 col-md-6 col-12">
	          <!-- Card -->
	          <div class="card mb-4 ">
	            <!-- Card body -->
	            <div class="card-body">
	              <div class="text-center">
	                <img src="assets/images/instructor/<?php echo $singleTitle['i_image'];?>" class="rounded-circle avatar-xl mb-3" alt="">
	                <h4 class="mb-0"><?php echo $singleTitle['i_name'];?></h4>
	                <p class="mb-0 fs-6 text-muted" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><?php echo $singleTitle['i_main_role'];?></p>
	              </div>
	              <!-- <div class="d-flex justify-content-between border-bottom py-2 mt-4">
	                <span>Students</span>
	                <span class="text-dark">50,274</span>
	              </div>
	              <div class="d-flex justify-content-between border-bottom py-2">
	                <span>Instructor Rating</span>
	                <span class="text-warning">
	                  4.5 <i class="mdi mdi-star"></i>
	                </span>
	              </div>
	              <div class="d-flex justify-content-between pt-2">
	                <span>Courses</span>
	                <span class="text-dark"> 12 </span>
	              </div> -->
	            </div>
	          </div>
	        </div>
				<?php endforeach; ?>
      </div>
      <!-- Content -->
			<?php foreach ($arrCaOver as $singleTitle): ?>
				<div class="row">
					<div class="col-md-12">
	          <span class="text-primary mb-3 d-block text-uppercase fw-medium ls-lg" style="color: #D65E5A !important; font-family: made_tommy;">
	            COURSE CATEGORY
	          </span>
	          <h1 class="display-3 fw-bold" style="font-family: made_tommy; font-size: 40px;"><?php echo $singleTitle["ca_name"]; ?></h1>
	          <!-- <h2 class="mb-1 display-4 fw-bold" style="font-family: made_tommy">The World's Top Courses</h2> -->
	          <p class="mb-8 lead" style="font-family: made_tommy"><?php echo $singleTitle["ca_type"]; ?></p>
	        </div>
	      </div>
	      <div class="row mb-6">
					<?php foreach ($arrAllCourses as $key => $value): ?>
						<?php if($singleTitle["ca_id"] == $value['c_ca_id']) { ?>
							<div class="col-lg-3 col-md-6 col-12">
								<!-- Card -->
								<div class="card  mb-4 card-hover">
									<a href="course-single-v2.php?id=<?php echo $value["c_id"]; ?>" class="card-img-top"><img src="assets/images/course/<?php echo $value["c_image"]; ?>" alt=""
											class="card-img-top rounded-top-md"></a>
									<!-- Card body -->
                  <div class="card-body">
                    <h4 class="mb-2 text-truncate-line-2 "><a href="course-single-v2.php?id=<?php echo $value["c_id"]; ?>" class="text-inherit" style="font-family: made_tommy; font-weight: 500; font-size: 17px; line-height:1.5em !important; min-height:4.5em !important; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                      <?php echo $value["c_title"]; ?>
                    </a></h4>

                    <ul class="mb-3  list-inline">
                      <li class="list-inline-item"><i class="mdi mdi-clock-time-four-outline text-muted me-1"></i><?php echo $value["c_dur"]; ?>
                      </li>
                      <li class="list-inline-item"><svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16"
                          fill="none" xmlns="http://www.w3.org/2000/svg">
                          <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE">
                          </rect>
                          <rect x="7" y="5" width="2" height="9" rx="1" fill="#<?php echo $value["c_type"] != 'Beginner'? '754FFE': 'DBD8E9';?>">
                          </rect>
                          <rect x="11" y="2" width="2" height="12" rx="1" fill="#<?php echo $value["c_type"] == 'Advanced'? '754FFE': 'DBD8E9';?>">
                          </rect>
                        </svg><?php echo $value["c_type"]; ?> </li>
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
												<img src="assets/images/instructor/<?php echo $value["i_image"]; ?>" class="rounded-circle avatar-xs" alt="">
											</div>
											<div class="col ms-2">
												<span><?php echo $value["i_name"]; ?></span>
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
						<?php } ?>
					<?php endforeach; ?>
	      </div>
			<?php endforeach; ?>

      <!-- Content -->

    </div>
  </div>

  <!-- Footer -->
  <!-- Footer -->
  <div class="pt-lg-10 pt-5 footer bg-white">
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
	// $(function () {
	// 	$(document).scroll(function () {
	// 		console.log('shop');
	// 		var $nav = $(".fixed-top");
	// 		$nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
	// 	});
	// });
  $(".navbar-toggler").on('click', function() {
    console.log('clicked');
    var $nav = $(".fixed-top");
    $nav.toggleClass('mobile-click');
  });
</script>
</body>

</html>
