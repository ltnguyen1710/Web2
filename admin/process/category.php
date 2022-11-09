<?php
$con = createDBConnection();
if (isset($_REQUEST['nameCategory'])) {
    $catergoryName = $_REQUEST['nameCategory'];
    $sql = "SELECT * FROM loaisanpham WHERE loaiSP='" . $catergoryName . "'";
    $result = mysqli_query($con, $sql);
    if (mysqli_fetch_assoc($result) == 0) {
        $sql = "INSERT INTO loaisanpham (loaiSP) VALUES ('" . $catergoryName . "')";
        if (mysqli_query($con, $sql) > 0) {
            echo "<script>alert('Add Successfully')</script>";
        } else {
            echo "<script>alert('Add Fail')</script>";
        }
    } else {
        echo "<script>alert('This cateory is already exist')</script>";
    }
}
if (isset($_REQUEST['categoryDelete'])) {
    $categoryDelete = $_REQUEST['categoryDelete'];
    $sql = "DELETE FROM loaisanpham WHERE loaiSP='" . $categoryDelete . "'";
    if (mysqli_query($con, $sql) > 0) {
        echo "<script>alert('Delete successfully')</script>";
    } else {
        echo "<script>alert('Delete Fail')</script>";
    }
}
