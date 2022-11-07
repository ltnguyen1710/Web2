<?php 
require_once('../process/login.php');
$con = createDBConnection();
$sql="UPDATE donhang set tinhtrang='Da xu ly' where maDon=".$_REQUEST['madon'];
$result=$con->query($sql);
$con->close();


?>