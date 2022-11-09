<?php

function mangUsername()
{
    $con = createDBConnection();
    $sql = "select userKH from khachhang";
    $result = $con->query($sql);
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $_SERVER['mangUser'][$i] = $row['userKH'];
        $i++;
    }
    return json_encode($_SERVER['mangUser']);
}
function mangMail()
{
    $con = createDBConnection();
    $sql = "select email from khachhang";
    $result = $con->query($sql);
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $_SERVER['mangMail'][$i] = $row['email'];
        $i++;
    }
    return json_encode($_SERVER['mangMail']);
}