<?php
require_once '../config.php';
require_once '../database.php';

//header
require_once ABSPATH.'/views/header.php';

if(@$_POST['login_user'] && @$_POST['pw_login']){
    require_once ABSPATH.'/models/login_model.php';
}

switch (@$_GET['error']){
    case "login":
        echo '<center><p style="color: red;">Wrong Password or Login</p></center>';
        require_once ABSPATH.'/views/login.php';
        break;
}

//body
require_once ABSPATH.'/views/login.php';

?>