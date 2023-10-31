<?php
session_start();
class CodeGen{

  private $code;

    public function __construct(){

      for($i = 0; $i < 6; $i++){
          $num = rand(65,90);
          $char = chr($num);
          $this->code .= $char;
      }

      return $this->code;
    }

    public function __toString(){
      return $this->code;
    }
}
class Recover extends Connection{
    private $sql;
    private $login_user;

    public function redirectjs($url){
      $string = '<script type="text/javascript">';
      $string .= 'window.location = "'.$url.'"';
      $string .= '</script>';

      echo $string;
    }
    
    public function email(){
      $this->login_user = @$_POST['login_user'];

      //db connection
      $db = parent::open();

      //get the name of the user 
      $this-> sql = "SELECT nm_user,login_user FROM tb_user WHERE login_user='".$this->login_user."'";
      if($this->sql){
        $query = $db->query($this->sql);
        $res = $query->fetch();
      }
      else{
        header('location: recover_pw.php?default=recover&e=1');
      }

      //code
      $code = new CodeGen();
    
      //hash code does not accept obj input
      $this-> sql = "UPDATE tb_user SET validation_code='".hash("md5",$code->__toString())."' WHERE login_user='".$this->login_user."'";
      $db->query($this->sql);
      
      parent::close();

      if($_POST['login_user'] === $res['login_user']){
          //config of PHPMailer;
          try{
            $mail = new PHPMailer\PHPMailer\PHPMailer;
            $mail->SMTPDebug = 0; //set this value to 0 to hide logs after sending an email
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'YOUR EMAIL HERE'; //your email
            //password configured in YOUR personal email in google's case, go to 'manage your account' -> 'security' -> '2-Step Verification' -> App passwords
            $mail->Password = 'YOUR PASSWORD HERE'; 
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            
            //email recipients
            $mail->setFrom('arthur.gcsocial@gmail.com');
            $mail->addAddress($res['login_user']);

            //email content
            $mail->isHTML(true);
            $mail->Subject = 'Change your password';
            $mail->msgHTML(
              '<!doctype html>
              <html>
                <head>
                  <meta name="viewport" content="width=device-width">
                  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                  <title>Change your password</title>
                  <style>
                  /* -------------------------------------
                      INLINED WITH htmlemail.io/inline
                  ------------------------------------- */
                  /* -------------------------------------
                      RESPONSIVE AND MOBILE FRIENDLY STYLES
                  ------------------------------------- */
                  @media only screen and (max-width: 620px) {
                    table[class=body] h1 {
                      font-size: 28px !important;
                      margin-bottom: 10px !important;
                    }
                    table[class=body] p,
                          table[class=body] ul,
                          table[class=body] ol,
                          table[class=body] td,
                          table[class=body] span,
                          table[class=body] a {
                      font-size: 16px !important;
                    }
                    table[class=body] .wrapper,
                          table[class=body] .article {
                      padding: 10px !important;
                    }
                    table[class=body] .content {
                      padding: 0 !important;
                    }
                    table[class=body] .container {
                      padding: 0 !important;
                      width: 100% !important;
                    }
                    table[class=body] .main {
                      border-left-width: 0 !important;
                      border-radius: 0 !important;
                      border-right-width: 0 !important;
                    }
                    table[class=body] .btn table {
                      width: 100% !important;
                    }
                    table[class=body] .btn a {
                      width: 100% !important;
                    }
                    table[class=body] .img-responsive {
                      height: auto !important;
                      max-width: 100% !important;
                      width: auto !important;
                    }
                  }
              
                  /* -------------------------------------
                      PRESERVE THESE STYLES IN THE HEAD
                  ------------------------------------- */
                  @media all {
                    .ExternalClass {
                      width: 100%;
                    }
                    .ExternalClass,
                          .ExternalClass p,
                          .ExternalClass span,
                          .ExternalClass font,
                          .ExternalClass td,
                          .ExternalClass div {
                      line-height: 100%;
                    }
                    .apple-link a {
                      color: inherit !important;
                      font-family: inherit !important;
                      font-size: inherit !important;
                      font-weight: inherit !important;
                      line-height: inherit !important;
                      text-decoration: none !important;
                    }
                    .btn-primary table td:hover {
                      background-color: #34495e !important;
                    }
                    .btn-primary a:hover {
                      background-color: #34495e !important;
                      border-color: #34495e !important;
                    }
                  }
                  </style>
                </head>
                <body class="" style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
                  <table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;">
                    <tr>
                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
                      <td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;">
                        <div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;">
              
                          <!-- START CENTERED WHITE CONTAINER -->
                          <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">This is preheader text. Some clients will show this text as a preview.</span>
                          <table class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;">
              
                            <!-- START MAIN CONTENT AREA -->
                            <tr>
                              <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
                                <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                                  <tr>
                                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                                      <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Hi '.$res['nm_user'].',</p>
                                      <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">here is your code to change your password</p>
                                      <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; box-sizing: border-box;">
                                        <tbody>
                                          <tr>
                                            <td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;">
                                              <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
                                                <tbody>
                                                  <tr>
                                                    <td> '.$code->__toString().'</td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
              
                          <!-- END MAIN CONTENT AREA -->
                          </table>
              
                          <!-- START FOOTER -->
                          <div class="footer" style="clear: both; Margin-top: 10px; text-align: center; width: 100%;">
                            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                              <tr>
                                <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
                                  <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">if you have any trouble contact the developer</span>
                                  <br> Auto generated email, do NOT reply.
                                </td>
                              </tr>
                              <tr>
                                <td class="content-block powered-by" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
                                  Powered by me... the dev...
                                </td>
                              </tr>
                            </table>
                          </div>
                          <!-- END FOOTER -->
              
                        <!-- END CENTERED WHITE CONTAINER -->
                        </div>
                      </td>
                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
                    </tr>
                  </table>
                </body>
              </html>
              '

            );
            $mail->AltBody = 'here is your code to change your password in passwordgen: '.$code;

            if($mail->send()){
              $_SESSION['login_user'] = $res['login_user'];
              $this->redirectjs('recover_pw.php?default=email');
            }
            else{
              session_destroy();
              $this->redirectjs('recover_pw.php?error=email');
            }
          }
          catch(Exception $e){
            echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
          }
          //source used for sending this email https://www.geeksforgeeks.org/how-to-send-an-email-using-phpmailer/
        }
        else{
          $this->redirectjs('recover_pw.php?error=login');
        }
    }
}
  
$obj = new Recover();
$obj->email();
?>