<?php
require_once 'admin/core/init.php';

if (isset($_POST) && isset($_POST["submit"])) {
  echo $_POST['firstname'];
  echo $_POST['lastname'];
  echo $_POST['email'];
  echo $_POST['phone'];
  echo $_POST['reason'];
  echo $_POST['messages'];
  header("location: index.php");
  // echo $user->addContact($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['phone'], $_POST['reason'], $_POST['messages']);
}
?>
