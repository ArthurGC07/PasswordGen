<?php
session_start();

//verify if session started
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  
} 
else {
  echo header("location: home.php");
}
//require essential files
require_once '../config.php';
require_once '../database.php';

//dropdown menu options
switch (@$_GET['dropdown']){
  
  case "logout":
      session_destroy();
      header('location: home.php');
}

//header
require_once ABSPATH.'/views/header_logged_in.php';

//body
require ABSPATH.'/views/form_view.php';

//footer
require ABSPATH.'/views/footer.php';
?>