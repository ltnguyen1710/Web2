<?php require_once('../process/login.php'); ?>
<?php
$con = createDBConnection();
if ($_REQUEST['trangthai'] == "Active") {
    $sql = "UPDATE khachhang set trangthai='Block' where userKH='" . $_REQUEST['userKH']."'";
}
else{
    $sql = "UPDATE khachhang set trangthai='Active' where userKH='" . $_REQUEST['userKH']."'";
}
$result = $con->query($sql);
$con->close();
?>