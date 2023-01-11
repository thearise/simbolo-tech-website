<?php
require_once 'admin/core/init.php';
?>
<html>
<body>

<?php

function tc_file_upload($file_info)
{

  // Get file/image name (with extension)
  $file_name_complete =  $file_info['name'];

  // Extract file extension
  $extension = pathinfo($file_name_complete, PATHINFO_EXTENSION);

  // Extract file name without extension
  $file_name = pathinfo($file_name_complete, PATHINFO_FILENAME);

  // Temp file location
  $file_temp_location =  $file_info['tmp_name'];

  // Save an original file name variable to track while renaming if file already exists
  $file_name_original = $file_name;

  // Increment file name by 1
  $num = 1;

  /**
   * Check if the same file name already exists in the upload folder,
   * append increment number to the original filename
   **/
  while (file_exists("assets/images/course/" . $file_name . "." . $extension)) {
    $file_name = (string) $file_name_original . $num;
    $file_name_complete = $file_name . "." . $extension;
    $num++;
  }

  // Upload file in upload folder
  $file_target_location = "assets/images/course/" . $file_name_complete;
  $file_upload_status = move_uploaded_file($file_temp_location, $file_target_location);

  if ($file_upload_status == true) {
    //echo "Congratulations. File has been uploaded to: $file_target_location";
    return $file_name_complete;
  } else {
    // echo "Error. File uploading failed! Check if 'upload' folder exists with proper permission and Try again.";
    // print_r(error_get_last());
    return false;
  }
}


if (isset($_POST) && isset($_POST["save-course"]) && $_FILES["fileToUpload"]["name"] != '') {
	$image = $_FILES['fileToUpload']['name'];

	$imagePath = "assets/images/course/".$image;
	$value = 0;
	//while(file_exists($imagePath . strval($value))) {
	//	$value++;
	//}

	$compImgPath = tc_file_upload($_FILES['fileToUpload']);
	//move_uploaded_file($_FILES['image']['tmp_name'],$imagePath);

	echo $compImgPath;
  echo 'catee-> ' . $_POST["course-cate"];
  $courseId = $user->addCourse($_POST["course-title"], $_POST["start-date"], $_POST["course-dur"], $_POST["course-type"], $_POST["course-instructor"], $_POST["course-cate"], $_POST['course-desc'], $compImgPath);
  if($courseId != 'error') {
    $curriArrTitle = $_POST["curriTitle"];
    $curriArrDesc = $_POST["curriDesc"];

    echo $user->addCurList($curriArrTitle, $curriArrDesc, $courseId);
    header("location: courses.php");
  }


} else if (isset($_POST) && isset($_POST["save-course"]) && $_FILES["fileToUpload"]["name"] == '') {
  echo 'no image';

  $courseId = $user->addCourse($_POST["course-title"], null);
  if($courseId != 'error') {
    $curriArrTitle = $_POST["curriTitle"];
    $curriArrDesc = $_POST["curriDesc"];

    echo $user->addCurList($curriArrTitle, $curriArrDesc, $courseId);
    // header("location: index.php");
  }
} else
{
  $user = null;
  echo "no username supplied";
  header("location: add-course.php");
}
?>

</body>
</html>
