<?php
<<<<<<< Updated upstream

function Register($username,$password,$repassword,$sdt,$hoten){
     $con = createDBConnection();
     
       $sql = sprintf("INSERT INTO khachhang
                    VALUES ('%s', '%s', '%s', '%s')", $username , $password,$sdt,$hoten);
       if(!$con->query($sql)){
          echo '<script type="text/javascript">alert("Username has existed")</script>' ;
       }
      else{
         echo '<script type="text/javascript">alert("Sign up successfully")</script>' ;
      }
     }


?>
=======
// require ('sendmail/send_link.php');
function Register($username, $password, $repassword, $sdt, $hoten, $diachi, $email)
{
   $con = createDBConnection();

   $sql = sprintf("INSERT INTO khachhang
                    VALUES ('%s', '%s', '%s', '%s','%s', '%s', '%s')", $username, $password, $sdt, $hoten, $diachi, "Active", $email);
   if (!$con->query($sql)) {
      echo '<script type="text/javascript">alert("System error! Try it later")</script>';
   } else {
      echo '<script type="text/javascript">alert("Sign up successfully")</script>';
      unset($_SESSION['fullname']);
      unset($_SESSION['phone']);
      unset($_SESSION['useremail']);
      unset($_SESSION['useradress']);
      unset($_SESSION['username1']);
      unset($_SESSION['psw1']);
      unset($_SESSION['repsw']);

   }
}
function random_verifycode()
{
   $length = 10;
   $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $charactersLength = strlen($characters);
   $randomString = '';
   for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
   }
   return $randomString;
}
function get_verifycode($randomcode)
{
   $_SESSION['fullname'] = $_POST['fullname'];
   $_SESSION['phone'] = $_POST['phone'];
   $_SESSION['useremail'] = $_POST['useremail'];
   $_SESSION['useradress'] = $_POST['useradress'];
   $_SESSION['username1'] = $_POST['username1'];
   $_SESSION['psw1'] = $_POST['psw1'];
   $_SESSION['repsw'] = $_POST['repsw'];

   if (isset($_POST['useremail'])) {
      $email = $_POST['useremail'];
      $mail_receiver = $email;
      $name_receiver = "New user";
      $subject = "XÁC THỰC EMAIL";
      $message = "Mã xác thực của bạn là: <b> " . $randomcode . "</b>";
      createSMTPconnection($mail_receiver, $name_receiver, $subject, $message);
      unset($_SESSION['typemail']);
      echo '<script>alert("Check Your Email To Get Verify Code...")</script>';
   }
}


if (array_key_exists('submit', $_POST)) {
   if (isset($_POST["username1"])) {
      Register($_POST["username1"], $_POST["psw1"], $_POST["repsw"], $_POST["phone"], $_POST["fullname"], $_POST['useradress'], $_POST["useremail"]);
   }
}
$_SESSION['code_verify'] = $code_verify = random_verifycode();
if (array_key_exists('submitcode', $_POST)) {
   get_verifycode($code_verify);

}
>>>>>>> Stashed changes
