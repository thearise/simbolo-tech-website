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


$properties = $user->getInstructors();

$arrInstruts = array();

foreach ($properties as $key => $value) {
    $place =array(
        "i_id" => trim($value['i_id']," "),
        "i_name" => trim($value['i_name']," "),
        "i_type" => trim($value['i_type']," "),
        "i_image" => trim($value['i_image']," "),
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







<!-- Theme CSS -->
<link rel="stylesheet" href="assets/css/theme.min.css">
  <title>Add Course | Geeks - Bootstrap 5 Template</title>
</head>

<body>
  <!-- Navbar -->


  <!-- Page header-->
  <div class="py-4 py-lg-6 bg-primary">
    <div class="container">
      <div class="row">
        <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
          <div class="d-lg-flex align-items-center justify-content-between">
            <!-- Content -->
            <div class="mb-4 mb-lg-0">
              <h1 class="text-white mb-1">Add New Course</h1>
              <p class="mb-0 text-white lead">
                Just fill the form and create your courses.
              </p>
            </div>
            <div>
              <a href="instructor-courses.html" class="btn btn-white">Back to Course</a>
              <button type="submit" form="add-course-form" name="save-course" class="btn btn-success">Save</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Content -->
  <div class="pb-12">
    <div class="container">
      <div id="courseForm" class="bs-stepper">
        <div class="row">
          <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
            <!-- Stepper Button -->
            <div class="bs-stepper-header shadow-sm" role="tablist">
              <div class="step" data-target="#test-l-1">
                <button type="button" class="step-trigger" style="pointer-events: none;" onclick="return clearForm()" role="tab" id="courseFormtrigger1" aria-controls="test-l-1">
                  <span class="bs-stepper-circle">1</span>
                  <span class="bs-stepper-label">Basic Information</span>
                </button>
              </div>
              <!-- <div class="bs-stepper-line"></div> -->
              <div class="bs-stepper-line"></div>
              <div class="step" data-target="#test-l-3" onclick="return clearForm()">
                <button type="button" class="step-trigger" style="pointer-events: all;" onclick="return clearForm()" role="tab" id="courseFormtrigger3" aria-controls="test-l-3">
                  <span class="bs-stepper-circle">2</span>
                  <span class="bs-stepper-label">Curriculum</span>
                </button>
              </div>
              <div class="bs-stepper-line"></div>
              <div class="step" data-target="#test-l-2" onclick="clearForm()">
                <button type="button" class="step-trigger" style="pointer-events: none;" onclick="clearForm()" role="tab" id="courseFormtrigger2" aria-controls="test-l-2">
                  <span class="bs-stepper-circle">3</span>
                  <span class="bs-stepper-label">Instructor & Media</span>
                </button>
              </div>


              <!-- <div class="bs-stepper-line"></div>
              <div class="step" data-target="#test-l-4">
                <button type="button" class="step-trigger" role="tab" id="courseFormtrigger4" aria-controls="test-l-4">
                  <span class="bs-stepper-circle">4</span>
                  <span class="bs-stepper-label">Settings</span>
                </button>
              </div> -->
            </div>
            <!-- Stepper content -->
            <div class="bs-stepper-content mt-5">
              <form id="add-course-form" action="adding-course.php" method="post" enctype="multipart/form-data">
                <!-- Content one -->
                <div id="test-l-1" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="courseFormtrigger1">
                  <!-- Card -->
                  <div class="card mb-3 ">
                    <div class="card-header border-bottom px-4 py-3">
                      <h4 class="mb-0">Basic Information</h4>
                    </div>
                    <!-- Card body -->
                    <div class="card-body row">
                      <div class="mb-3">
                        <label for="courseTitle" class="form-label">Course Title</label>
                        <input name="course-title" id="course-title" class="form-control" type="text" placeholder="Course Title"/>
                        <small>Write a 60 character course title.</small>
                      </div>
                      <div class="mb-3 col-12 col-md-6">
    										<label class="form-label" for="birth">Start date</label>
    										<input class="form-control flatpickr" type="text" placeholder="Start Date" id="course-start" name="start-date" readonly="readonly">
                        <small>Write a 60 character course title.</small>
                      </div>
                      <div class="mb-3 col-12 col-md-6">
    										<label class="form-label" for="birth">Duration</label>
    										<input name="course-dur" id="course-dur" class="form-control" type="text" placeholder="Course Title"/>
                        <small>Write a 60 character course title.</small>
    									</div>
                      <div class="mb-3 col-12 col-md-6">
                        <label class="form-label">Courses category</label>
                        <select class="selectpicker" name="course-cate" id="course-cate" data-width="100%">
                          <option value="">Select category</option>
                          <?php foreach ($arrCaOver as $singleTitle): ?>
                            <option value="<?php echo $singleTitle['ca_id'] ?>"><?php echo $singleTitle['ca_name'] ?></option>
                          <?php endforeach; ?>
                        </select>
                        <small>Help people find your courses by choosing
                          categories that represent your course.</small>
                      </div>
                      <div class="mb-3 col-12 col-md-6">
                        <label class="form-label">Courses level</label>
                        <select class="selectpicker" name="course-type" id="course-level" data-width="100%">
                          <option value="">Select level</option>
                          <option value="intermediate">Beignners</option>
                          <option value="beignners">Intermediate</option>
                          <option value="advance">Advance</option>
                        </select>
                        <small>Help people find your.</small>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Course Description</label>
                        <div id="editor-desc" style="height: 200px;">
                          <!-- <p>Insert course description</p>
                          <p>Some initial <strong>bold</strong> text</p>
                          <p><br /></p> -->
                        </div>
                        <textarea style="display: none" id="course-desc" name="course-desc"></textarea>
                        <small>A brief summary of your courses.</small>
                      </div>
                    </div>
                  </div>
                  <!-- example -->
                  <!-- <button type="button" class="btn  btn-primary" data-bs-toggle="popover"
                  title="Popover title" data-bs-content="And here's some amazing content. It's very engaging. Right?">
                    Click to toggle popover
                  </button> -->
                  <!-- Button -->

                  <!-- Danger alert -->
                  <!-- <div class="d-flex justify-content-between">
                    <div class="alert alert-danger" style="" role="alert">
                      This is a danger alert—check it out!
                    </div>
                    <button class="btn btn-primary" onclick="firstNextBtn()">
                      Next
                    </button>
                  </div> -->

                  <div class="d-flex justify-content-between">
                    <div>

                    </div>
                    <div>
                      <div id="editor-alert" style="display: none; margin-right: 10px; margin-top: 10px !important;">
                        <div class="alert alert-danger" style="display: inline;" role="alert">
                         Please fill in all of above required fields
                        </div>
                      </div>
                      <button class="btn btn-primary" type="button" onclick="firstNextBtn()">
                        Next
                      </button>
                    </div>

                  </div>
                </div>
                <!-- Content two -->
                <div id="test-l-2" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="courseFormtrigger2">
                  <!-- Card -->
                  <div class="card mb-3  border-0">
                    <div class="card-header border-bottom px-4 py-3">
                      <h4 class="mb-0">Courses Media & Instructor</h4>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                      <div class="mb-3">
                        <label class="form-label">Select instructor</label>
                        <select name="course-instructor" class="selectpicker" data-width="100%">
                          <option value="">Select instructor</option>
                          <?php foreach ($arrInstruts as $singleTitle): ?>
                            <option value="<?php echo $singleTitle['i_id'] ?>"><?php echo $singleTitle['i_name'] ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="custom-file-container" data-upload-id="courseCoverImg" id="courseCoverImg">
                        <label class="form-label">Course cover image
                          <a href="javascript:void(0)" class="custom-file-container__image-clear"
                            title="Clear Image"></a></label>
                        <label class="custom-file-container__custom-file">
                          <input name="fileToUpload" id="fileToUpload" type="file" class="custom-file-container__custom-file__custom-file-input"
                            accept="image/*" />
                          <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                          <span class="custom-file-container__custom-file__custom-file-control"></span>
                        </label>
                        <small class="mt-3 d-block">Upload your course image here. It must meet
                          our
                          course image quality standards to be accepted.
                          Important guidelines: 750x440 pixels; .jpg, .jpeg,.
                          gif, or .png. no text on the image.</small>
                        <div class="custom-file-container__image-preview"></div>
                      </div>
                    </div>
                  </div>
                  <!-- Button -->
                  <div class="d-flex justify-content-between">
                    <button class="btn btn-secondary" type="button" onclick="courseForm.previous()">
                      Previous
                    </button>
                    <!-- <button class="btn btn-primary" type="button" onclick="courseForm.next()">
                      Next
                    </button> -->
                  </div>
                </div>
                <!-- Content three -->
                <div id="test-l-3" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="courseFormtrigger3">
                  <!-- Card -->
                  <div class="card mb-3  border-0">
                    <div class="card-header border-bottom px-4 py-3">
                      <h4 class="mb-0">Curriculum</h4>
                    </div>
                    <!-- Card body -->
                    <div class="card-body ">
                      <div class="bg-light rounded p-2 mb-4">
                        <h4></h4>
                        <!-- List group -->
                        <div class="list-group list-group-flush border-top-0" id="courseList">
                          <div id="courseOne">
                            <div class="list-group-item rounded px-3 mb-1" id="introduction">
                              <div class="curri-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">
                                  <a href="#" class="text-inherit">
                                    <i class="fe fe-menu me-1 text-muted align-middle"></i>
                                    <span class="align-middle">Chapter Title</span>
                                  </a>
                                </h5>
                                <div>
                                  <a id="currIdDel" class="me-1 text-inherit" data-bs-toggle="tooltip" data-placement="top"
                                    title="Delete"><i class="fe fe-trash-2 fs-6"></i></a>
                                  <a href="#" class="text-inherit" aria-expanded="true" data-bs-toggle="collapse"
                                    data-bs-target="#collapselistOne" aria-controls="collapselistOne">
                                    <span class="chevron-arrow"><i class="fe fe-chevron-down"></i></span>
                                  </a>
                                </div>
                              </div>
                              <div id="collapselistOne" class="collapse show" aria-labelledby="introduction"
                                data-bs-parent="#courseList">
                                <div class="card-body">
                                  <input id="courseTitle" class="form-control mb-3" name="curriTitle[]" type="text" placeholder="Course Title" value="Chapter Title"/>

                                  <textarea id="courseDesc" class="form-control" name="curriDesc[]" type="text" placeholder="Course Title"></textarea>
                                  <!-- <a href="#" class="btn btn-secondary btn-sm">Add
                                    Article +</a>
                                  <a href="#" class="btn btn-secondary btn-sm">Add
                                    Description +</a> -->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <a href="#" class="btn btn-outline-primary btn-sm mt-3" data-bs-toggle="modal"
                          data-bs-target="#addLectureModal">Add Lecture +</a>
                      </div>

                    </div>
                  </div>
                  <!-- Button -->
                  <div class="d-flex justify-content-between">
                    <button class="btn btn-secondary" type="button" onclick="courseForm.previous()">
                      Previous
                    </button>
                    <button class="btn btn-primary" type="button" onclick="courseForm.next()">
                      Next
                    </button>
                  </div>
                </div>
                <!-- Content four -->
                <div id="test-l-4" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="courseFormtrigger4">
                  <!-- Card -->
                  <div class="card mb-3  border-0">
                    <div class="card-header border-bottom px-4 py-3">
                      <h4 class="mb-0">Requirements</h4>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                      <input name='tags' value='jquery, bootstrap' autofocus>
                    </div>
                  </div>
                  <div class="d-flex justify-content-between mb-22">
                    <!-- Button -->
                    <button class="btn btn-secondary mt-5" onclick="courseForm.previous()">
                      Previous
                    </button>
                    <button type="submit" class="btn btn-danger mt-5">
                      Submit For Review
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal -->
  <!-- Payment Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center d-flex">
                <h4 class="modal-title" id="paymentModalLabel">
                    Add New Payment Method
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

					</button>
            </div>
            <!-- Modal body -->

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addSectionModal" tabindex="-1" role="dialog" aria-labelledby="addSectionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addSectionModalLabel">
                    Add New Section
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

        </button>
            </div>
            <div class="modal-body">
                <input class="form-control mb-3" type="text" placeholder="Add new section" />
                <button class="btn btn-primary" type="Button">
            Add New Section
          </button>
                <button class="btn btn-outline-white" data-bs-dismiss="modal" aria-label="Close">
            Close
          </button>
            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addLectureModal" tabindex="-1" role="dialog" aria-labelledby="addLectureModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addLectureModalLabel">
                    Add New Lecture
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

        </button>
            </div>
            <div class="modal-body">
                <input class="form-control mb-3" id="add-new-lecture-title" type="text" placeholder="Add new lecture" />
                <button class="btn btn-primary" id="add-new-lecture" type="Button">
                  Add New Lecture
                </button>
                <button class="btn btn-outline-white" data-bs-dismiss="modal" aria-label="Close">
            Close
          </button>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="newCatgory" tabindex="-1" role="dialog" aria-labelledby="newCatgoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0" id="newCatgoryLabel">
                    Create New Category
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

        </button>
            </div>

        </div>
    </div>
</div>



<!-- Modal -->


<!-- Course Modal -->
<div class="modal fade" id="courseModal" tabindex="-1" aria-labelledby="courseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header py-4 align-items-lg-center">
                <div class="d-lg-flex">
                    <div class="mb-3 mb-lg-0">
                        <img src="assets/images/svg/feature-icon-1.svg" alt="" class=" bg-primary icon-shape icon-xxl rounded-circle">
                    </div>
                    <div class="ms-lg-4">
                        <h2 class="fw-bold mb-md-1 mb-3">Introduction to JavaScript <span class="badge bg-warning ms-2">Free</span></h2>
                        <p class="text-uppercase fs-6 fw-semi-bold mb-0"><span class="text-dark">Courses -
                  1</span> <span class="ms-3">6 Lessons</span> <span class="ms-3">1 Hour 12 Min</span></p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

          </button>
            </div>
            <div class="modal-body">
                <h3>In this course you will learn:</h3>
                <p class="fs-4">Vanilla JS is a fast, lightweight, cross-platform framework for building incredible, powerful JavaScript applications.</p>
                <ul class="list-group list-group-flush">
                    <!-- List group item -->
                    <li class="list-group-item ps-0">
                        <a href="#" class="d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                            <div class="text-truncate">
                                <span class="icon-shape bg-light text-primary icon-sm rounded-circle me-2"><i
                      class="mdi mdi-play fs-4"></i></span>
                                <span>Introduction</span>
                            </div>
                            <div class="text-truncate">
                                <span>1m 7s</span>
                            </div>
                        </a>
                    </li>
                    <!-- List group item -->
                    <li class="list-group-item ps-0">
                        <a href="#" class="d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                            <div class="text-truncate">
                                <span class="icon-shape bg-light text-primary icon-sm rounded-circle me-2"><i
                      class="mdi mdi-play fs-4"></i></span>
                                <span>Installing Development Software</span>
                            </div>
                            <div class="text-truncate">
                                <span>3m 11s</span>
                            </div>
                        </a>
                    </li>
                    <!-- List group item -->
                    <li class="list-group-item ps-0">
                        <a href="#" class="d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                            <div class="text-truncate">
                                <span class="icon-shape bg-light text-primary icon-sm rounded-circle me-2"><i
                      class="mdi mdi-play fs-4"></i></span>
                                <span>Hello World Project from GitHub</span>
                            </div>
                            <div class="text-truncate">
                                <span>2m 33s</span>
                            </div>
                        </a>
                    </li>
                    <!-- List group item -->
                    <li class="list-group-item ps-0">
                        <a href="#" class="d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                            <div class="text-truncate">
                                <span class="icon-shape bg-light text-primary icon-sm rounded-circle me-2"><i
                      class="mdi mdi-play fs-4"></i></span>
                                <span>Our Sample Javascript Files</span>
                            </div>
                            <div class="text-truncate">
                                <span>22m 30s</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<!-- new chat modal-->


<!-- Modal -->
<div class="modal fade" id="newchatModal" tabindex="-1" role="dialog" aria-labelledby="newchatModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered " role="document">
        <div class="modal-content ">
            <div class="modal-header align-items-center">
                <h4 class="mb-0" id="newchatModalLabel">Create New Chat</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                 </button>
            </div>
            <div class="modal-body px-0">
                <!-- contact list -->
                <ul class="list-unstyled contacts-list mb-0">
                    <!-- chat item -->
                    <li class="py-3 px-4 chat-item contacts-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="#" class="text-link contacts-link">
                                <!-- media -->
                                <div class="d-flex">
                                    <div class="avatar avatar-md avatar-indicators avatar-away">
                                        <img src="assets/images/avatar/avatar-5.jpg" alt="" class="rounded-circle">
                                    </div>
                                    <!-- media body -->
                                    <div class=" ms-2">
                                        <h5 class="mb-0">Pete Martin</h5>
                                        <p class="mb-0 text-muted">On going description of group...
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <div>
                                <small class="text-muted">2/10/2021</small>
                            </div>
                        </div>


                    </li>
                    <!-- chat item -->
                    <li class="py-3 px-4 chat-item contacts-item">

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="#" class="text-link contacts-link">
                                <!-- media -->
                                <div class="d-flex">
                                    <div class="avatar avatar-md avatar-indicators avatar-offline">
                                        <img src="assets/images/avatar/avatar-9.jpg" alt="" class="rounded-circle">
                                    </div>
                                    <!-- media body -->
                                    <div class=" ms-2">
                                        <h5 class="mb-0">Olivia Cooper</h5>
                                        <p class="mb-0 text-muted">On going description of group...
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <div>
                                <small class="text-muted">2/3/2021</small>
                            </div>
                        </div>


                    </li>
                    <!-- chat item -->
                    <li class="py-3 px-4 chat-item contacts-item">

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="#" class="text-link contacts-link">
                                <!-- media -->
                                <div class="d-flex">
                                    <div class="avatar avatar-md avatar-indicators avatar-busy">
                                        <img src="assets/images/avatar/avatar-19.jpg" alt="" class="rounded-circle">
                                    </div>
                                    <!-- media body -->
                                    <div class=" ms-2">
                                        <h5 class="mb-0">Jamarcus Streich</h5>
                                        <p class="mb-0 text-muted">Start design system for UI.
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <div>
                                <small class="text-muted">1/24/2021</small>
                            </div>
                        </div>


                    </li>
                    <!-- chat item -->
                    <li class="py-3 px-4 chat-item contacts-item">

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="#" class="text-link contacts-link">
                                <!-- media -->
                                <div class="d-flex">
                                    <div class="avatar avatar-md avatar-indicators avatar-busy">
                                        <img src="assets/images/avatar/avatar-12.jpg" alt="" class="rounded-circle">
                                    </div>
                                    <!-- media body -->
                                    <div class=" ms-2">
                                        <h5 class="mb-0">Lauren Wilson</h5>
                                        <p class="mb-0 text-muted">Start design system for UI...
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <div>
                                <small class="text-muted">3/3/2021</small>
                            </div>
                        </div>


                    </li>
                    <!-- chat item -->
                    <li class="py-3 px-4 chat-item contacts-item">

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="#" class="text-link contacts-link">
                                <!-- media -->
                                <div class="d-flex">
                                    <div class="avatar avatar-md avatar-indicators avatar-online">
                                        <img src="assets/images/avatar/avatar-14.jpg" alt="" class="rounded-circle">
                                    </div>
                                    <!-- media body -->
                                    <div class=" ms-2">
                                        <h5 class="mb-0">User Name</h5>
                                        <p class="mb-0 text-muted">On going description of group..
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <div>
                                <small class="text-muted">1/5/2021</small>
                            </div>
                        </div>


                    </li>
                    <!-- chat item -->
                    <li class="py-3 px-4 chat-item contacts-item">

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="#" class="text-link contacts-link">
                                <!-- media -->
                                <div class="d-flex">
                                    <div class="avatar avatar-md avatar-indicators avatar-online">
                                        <img src="assets/images/avatar/avatar-15.jpg" alt="" class="rounded-circle">
                                    </div>
                                    <!-- media body -->
                                    <div class=" ms-2">
                                        <h5 class="mb-0">Rosalee Roberts</h5>
                                        <p class="mb-0 text-muted">On going description of group..
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <div>
                                <small class="text-muted">1/14/2021</small>
                            </div>
                        </div>


                    </li>



                </ul>
            </div>

        </div>
    </div>
</div>



<!-- add task -->


<!-- Modal -->
<div class="modal fade" id="taskModal" tabindex="-1" role="dialog"
    aria-labelledby="taskModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taskModalLabel">Create New Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close">

                </button>
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
<script>
  var curriculum = 1;
  $("#add-new-lecture").on('click', function() {
    curriculum += 1;
    var title = getNewLectureTitle();
    var titleInput = '';
    if(title == 'Undefined') {
      titleInput = '';
    } else {
      titleInput = title;
    }
    $('#courseOne').append(
      '<div class="list-group-item rounded px-3 mb-1" id="currId' + curriculum + '">' +
        '<div class="curri-header d-flex align-items-center justify-content-between">' +
          '<h5 class="mb-0">' +
            '<a href="#" class="text-inherit">' +
              '<i class="fe fe-menu me-1 text-muted align-middle"></i>' +
              '<span class="align-middle" style="margin-left: 3px;">' + title +
                '</span>' +
            '</a>' +
          '</h5>' +
          '<div>' +
            '<a id="currIdDel" class="me-2 text-inherit" data-bs-toggle="tooltip" data-placement="top"' +
              'title="Delete"><i class="fe fe-trash-2 fs-6"></i></a>' +
            '<a href="#" class="text-inherit" data-bs-toggle="collapse"' +
              'data-bs-target="#currId' + curriculum + '-2" aria-expanded="false"' +
              'aria-controls="currId' + curriculum + '-2">' +
              '<span class="chevron-arrow"><i class="fe fe-chevron-down"></i></span>' +
            '</a>' +
          '</div>' +
        '</div>' +
        '<div id="currId' + curriculum + '-2" class="collapse" aria-labelledby="currId' + curriculum + '"' +
          'data-bs-parent="#courseList">' +
          '<div class="card-body">' +
            '<input id="courseTitle" name="curriTitle[]" class="form-control mb-3" type="text" placeholder="Course Title" value="' + titleInput + '" />' +
            '<textarea id="courseDesc" name="curriDesc[]" class="form-control" type="text" placeholder="Course Title"></textarea>' +
            // '<a href="#" class="btn btn-secondary btn-sm">Add' +
            //   'Article +</a>' +
            // '<a href="#" class="btn btn-secondary btn-sm">Add' +
            //   'Description +</a>' +
          '</div>' +
        '</div>' +
      '</div>'
    );

    $('#addLectureModal').modal('hide');
    $('#add-new-lecture-title').val('');
  });

  function clearForm(event) {
     event.preventDefault();
  }

  function getNewLectureTitle() {
    if($('#add-new-lecture-title').val() == '') {
      return 'Undefined';
    } else {
      return $('#add-new-lecture-title').val();
    }
  }

  // function delCurri() {
  //   // alert(JSON.stringify(rows));
  //   $(this.element).addClass('card-fadeIn');
  // }

  $(document).on('click', '#currIdDel', function(){
    $(this).parent().parent().parent().remove();
  });

  // $(document.getElementById("courseTitle")).keypress(function(){
  //   alert('shit');
  // });

  // $("#courseTitle").live("keypress", function (e) {
  //   alert(e.keyChar);
  // });

  // $("input").live("keypress", function (e) {
  //     alert(e.keyChar);
  // });

  $('#courseTitle').on('keyup', function() {
    if($(this).val() != '') {
      $(this).parent().parent().siblings('.curri-header').children('h5').children('a').children('span').html($(this).val());
    } else {
      $(this).parent().parent().siblings('.curri-header').children('h5').children('a').children('span').html('Undefined');
    }
  });

  $('body').on('keyup', '#courseTitle', function(e) {
    // $(this).parent().parent().siblings('.curri-header').children('span').html(
    //   $(this).val()
    // );
    if($(this).val() != '') {
      $(this).parent().parent().siblings('.curri-header').children('h5').children('a').children('span').html($(this).val());
    } else {
      $(this).parent().parent().siblings('.curri-header').children('h5').children('a').children('span').html('Undefined');
    }

    // $(this).val();
  });


  function firstNextBtn() {
    // e.preventDefault();
    // <for
    // $('#add-course-form').checkValidity();
    // alert();
    // alert($("#editor-desc .ql-editor").html());

    // return false;
    if($('#course-title').val() == '') {
      $('#course-title').siblings('small').html('Required this field');
      $('#course-title').siblings('small').attr('style', 'color: #e53f3c;');
    } else {
      $('#course-title').siblings('small').html('Write a 150 character course title.');
      $('#course-title').siblings('small').attr('style', 'color: #79758f;');
    }

    if($('#course-dur').val() == '') {
      $('#course-dur').siblings('small').html('Required this field');
      $('#course-dur').siblings('small').attr('style', 'color: #e53f3c;');
    } else {
      $('#course-dur').siblings('small').html('Write a 150 character course title.');
      $('#course-dur').siblings('small').attr('style', 'color: #79758f;');
    }

    if($('#course-start').val() == '') {
      $('#course-start').siblings('small').html('Required this field');
      $('#course-start').siblings('small').attr('style', 'color: #e53f3c;');
    } else {
      $('#course-start').siblings('small').html('Write a 150 character course title.');
      $('#course-start').siblings('small').attr('style', 'color: #79758f;');
    }

    // console.log('whating ' + $('#course-cate').val());


    if($('#course-cate').val() == "") {
      $('#course-cate').parent().siblings('small').html('Required this field');
      $('#course-cate').parent().siblings('small').attr('style', 'color: #e53f3c;');
    } else {
      $('#course-cate').parent().siblings('small').html('Required this field');
      $('#course-cate').parent().siblings('small').attr('style', 'color: #79758f;');
    }

    if($('#course-level').val() == '') {
      $('#course-level').parent().siblings('small').html('Required this field');
      $('#course-level').parent().siblings('small').attr('style', 'color: #e53f3c;');
    } else {
      $('#course-level').parent().siblings('small').html('Write a 150 character course title.');
      $('#course-level').parent().siblings('small').attr('style', 'color: #79758f;');
    }


    if($("#editor-desc .ql-editor").html() == '<p><br></p>') {
      // alert('dick');

      $('#editor-desc').siblings('small').html('Required this field');
      $('#editor-desc').siblings('small').attr('style', 'color: #e53f3c;');
    } else {

      $('#editor-desc').siblings('small').html('Write a 150 character course title.');
      $('#editor-desc').siblings('small').attr('style', 'color: #79758f;');
      // courseForm.next();
    }

    if($('#course-title').val() != '' && $('#course-dur').val() != '' && $('#course-start').val() != '' && $('#course-cate').val() != '' && $('#course-level').val() != ''
    && $("#editor-desc .ql-editor").html() != '<p><br></p>') {
      $('#editor-alert').attr('style', 'display: none; margin-right: 10px; margin-top: 10px !important;');
      courseForm.next();
    } else {
      $('#editor-alert').attr('style', 'display: inline; margin-right: 10px; margin-top: 10px !important;');
    }

  }

  flatpickr("#startDate", {
    allowInput: true,
  });

  var quill = new Quill("#editor-desc",{modules:{toolbar:[[{header:[1,2,!1]}],[{font:[]}],["bold","italic","underline","strike"],[{size:["small",!1,"large","huge"]}],
  [{list:"ordered"},{list:"bullet"}],[{color:[]},{background:[]},{align:[]}],["link","code-block",]]},theme:"snow"});

  quill.on('text-change', function(delta, oldDelta, source) {
      console.log(quill.container.firstChild.innerHTML)
      $('#course-desc').val(quill.container.firstChild.innerHTML);
  });
</script>
</body>

</html>
