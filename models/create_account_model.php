<?php
    require '../database.php';

    class ValidateAccount extends Connection{
        private $login_user;
        private $nm_user;
        private $pw_user;
        private $confirm_pw_user;
        private $sql;

        public function __construct(){
            $this -> login_user = @$_POST['login_user'];
            $this -> nm_user = @$_POST['nm_user'];
            $this -> pw_user = hash("md5",@$_POST['pw_user']);
            $this -> confirm_pw_user = hash("md5",@$_POST['confirm_pw_user']);
        }

        public function confirm_pw(){
            $login_user = $this -> login_user;
            $nm_user = $this -> nm_user;
            $pw_user = $this -> pw_user;
            $confirm_pw_user = $this -> confirm_pw_user;

            if($pw_user === $confirm_pw_user){
                $db = parent::open();
                $this -> sql = "INSERT INTO tb_user(login_user, pw_user, nm_user) VALUES ('".$login_user."', '".$pw_user."', '".$nm_user."')";
                $db -> query($this -> sql);
                parent::close();
                header('location:'.HOME_URI.'controller/home.php');

            }
            else{
                header('location:'.HOME_URI.'controller/create_account.php?e=1');
            }
        }
    }

    $o = new ValidateAccount();
    $o -> confirm_pw();

?>