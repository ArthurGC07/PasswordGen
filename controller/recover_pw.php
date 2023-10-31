<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../config.php';
require_once ABSPATH.'/database.php';
//required classes to send the email
require_once ABSPATH.'/vendor/phpmailer/phpmailer/src/Exception.php';
require_once ABSPATH.'/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once ABSPATH.'/vendor/phpmailer/phpmailer/src/SMTP.php';

//header
require_once ABSPATH.'/views/header.php';

switch(@$_GET['default']) {
    case "recover":
        //input email
        require_once ABSPATH.'/views/recover_pw_view.php';
        break;

    case "login_user":
        //generate a code and send to the user's email
        require_once ABSPATH.'/models/recover_pw_model.php';
        break;
    
    case "email":
        //user puts the code sent to his/her email
        require_once ABSPATH.'/views/send_email_view.php';
        break;
    
    case "code":
        //verify the code the user inserted
        require_once ABSPATH.'/models/validate_code_model.php';
        break;

    case "set_new_password":
        //set and verify new password
        require_once ABSPATH.'/views/new_password.php';
        break;
    
    case "new_password":
        //verify and confirm the users new password and update it in the database
        require_once ABSPATH.'/models/update_user_pw_model.php';
        break;
}
switch (@$_GET['error']){
    case "login":
        echo "<center><p style='color: red;'>Invalid Email, please check your spelling!</p></center>";
        require_once ABSPATH.'/views/recover_pw_view.php';
        break;
    case "email":
        echo "<center><p style='color: red;'>Email not sent! Please Verify your Internet connection</p></center>";
        require_once ABSPATH.'/views/recover_pw_view.php';
        break;

    case "code":
        echo '<center><p style="color: red;">Email Invalid code, please check your spelling!</p></center>';
        require_once ABSPATH.'/views/send_email_view.php';
        break;

    case "confirm_password":
        echo '<center><p style="color: red;">The passwords do not match, please check your spelling!</p></center>';
        require_once ABSPATH.'/views/new_password.php';
}

?>