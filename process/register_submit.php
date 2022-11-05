<?php

function Register($username, $password, $repassword, $sdt, $hoten,$diachi,$email)
{
   $con = createDBConnection();

   $sql = sprintf("INSERT INTO khachhang
                    VALUES ('%s', '%s', '%s', '%s','%s', '%s', '%s')", $username, $password, $sdt, $hoten, $diachi, "Active", $email);
   if (!$con->query($sql)) {
      echo '<script type="text/javascript">alert("Username has existed")</script>';
   } else {
      echo '<script type="text/javascript">alert("Sign up successfully")</script>';
   }
}
if (isset($_POST["username1"])) {
   Register($_POST["username1"], $_POST["psw1"], $_POST["repsw"], $_POST["phone"], $_POST["fullname"],$_POST['useradress'] ,$_POST["useremail"]);
}
