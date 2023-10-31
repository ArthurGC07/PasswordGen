<?php

    class LoginChk extends Connection{
        private $sql;

        public function login(){
            try{
                $con = $this -> open(); //starts connection

                $this -> sql = "SELECT pw_user, login_user, nm_user, id_user FROM tb_user WHERE pw_user = '".hash("md5",@$_POST['pw_login'])."' AND login_user= '".@$_POST['login_user']."'";
                $query = $con -> query($this -> sql);
                $res = $query -> fetch(); //will return a associative array because It's defined as such in the Connection class

                if(@$res['pw_user'] === hash("md5",@$_POST['pw_login']) && @$res['login_user'] === @$_POST['login_user']){
                    //starts session if correct pw and login

                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['nm_user'] = $res['nm_user'];
                    $_SESSION['id_user'] = $res['id_user'];
        
                    header('location: '.HOME_URI.'controller/user_home.php');
                }
                else{
    
                    header('location: home.php?error=login');
                }
                

            }

            catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
            }
            
        }
    }
    
    $login = new LoginChk();
    $login -> login();
?>