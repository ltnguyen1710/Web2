<?php
require('../process/login.php');

if(isset($_POST['submit_password']) && $_POST['key'] && $_POST['reset'])
{
  $email=$_POST['email'];
  $pass=$_POST['passKH'];
  $con = createDBConnection();
  $sql = "update khachhang set passKH='$pass' where email='$email'";
  $result = $con->query($sql);
}
?>