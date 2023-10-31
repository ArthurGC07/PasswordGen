<?PHP
session_start();

//verify if session started
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  
} 
else {
  echo header("location: home.php");
}

//essential files
require_once '../config.php';
require_once '../database.php';

//model
require_once ABSPATH.'/models/form_model.php';

//header
require_once ABSPATH.'/views/header_logged_in.php';

//body
switch(@$_GET['par']){
    case "error":
        echo '<center><p style="color: red; margin-top: 2%;">Cannot save two passwords at the same time, generate a password OR type a existing one!';
        break;

    case "error_update":
      echo '<center><p style="color: red; margin-top: 2%;">Cannot update the password with two different methods, set an existing password OR randomize it!';
      break;
    }

require_once ABSPATH.'/views/form_register.php';

?>