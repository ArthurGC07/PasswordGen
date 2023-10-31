<?php
session_start();

class Validate extends Connection{
    private $sql;

    public function redirectjs($url){
        $string = '<script type="text/javascript">';
        $string .= 'window.location = "'.$url.'"';
        $string .= '</script>';
  
        echo $string;
      }
    
    public function chkCode(){
        //open connection with DB
        $db = parent::open();

        $this->sql = "SELECT validation_code FROM tb_user WHERE validation_code='".hash("md5",strtoupper($_POST['code']))."' AND login_user='".$_SESSION['login_user']."'";
        $query = $db->query($this->sql);
        $res = $query->fetch();
        
        if($res['validation_code'] === hash("md5",strtoupper($_POST['code']))){
            $this->redirectjs('recover_pw.php?default=set_new_password');
        }
        else{
            header('location: recover_pw.php?error=code');
        }
    }
}
$obj = new Validate();
$obj->chkCode();

?>