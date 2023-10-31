<?php 
require_once '../config.php';

if(@$_POST['login_user'] && @$_POST['nm_user'] && @$_POST['pw_user'] && @$_POST['confirm_pw_user']){
    require_once ABSPATH.'/models/create_account_model.php';
}

//header
require_once ABSPATH.'/views/header.php';

//body
require_once ABSPATH.'/views/create_account_view.php';

 
 
?>