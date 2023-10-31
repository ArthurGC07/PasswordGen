<?php
session_start();

class NewPassword extends Connection{
    private $sql;

    public function __construct(){
        if(@$_POST['new_password'] === @$_POST['new_password_confirm']){
            $db = parent::open();

            //change to new password
            $this->sql = "UPDATE tb_user SET pw_user='".hash("md5",@$_POST['new_password'])."' WHERE login_user='".$_SESSION['login_user']."'";
            $db->query($this->sql);

            //delete code sent by the email
            $this->sql = "UPDATE tb_user SET validation_code = NULL WHERE login_user= '".$_SESSION['login_user']."'";
            $db->query($this->sql);

            session_destroy();
            header('location: home.php');

        }
        else{
            header('location: recover_pw.php?error=confirm_password');
        }
    }
}
$obj = new NewPassword();

?>