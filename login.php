<?php
session_start();
function login($user, $pass)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dct119c2";
    $con = new mysqli($servername, $username, $password, $dbname);
    if ($con->connect_error) {
        die("Connection failed " . $con->connect_error);
    }
    $sql = "Select * from users where username='" . $user . "'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        if ($row = $result->fetch_assoc()) {
            if ($row['password'] = $pass) {
                $_SESSION['username'] = $user;
                return $user;
            }
        }
    }
    $con->close();
}
function adminlogin($admin, $pass){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dct119c2";
    $con = new mysqli($servername, $username, $password, $dbname);
    if ($con->connect_error) {
        die("Connection failed " . $con->connect_error);
    }
    $sql = "Select * from admin where userAD='" . $admin . "'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        if ($row = $result->fetch_assoc()) {
            if ($row['passAD'] = $pass) {
                $_SESSION['admin'] = $admin;
                return $admin;
            }
        }
    }
    $con->close();
}
function isLoginedAdmin(){
    return isset($_SESSION['admin']);
}
function logoutAdmin(){
    unset($_SESSION['admin']);
}
function isLogined()
{
    return isset($_SESSION['username']);
}
function logout(){
    unset($_SESSION['username']);
}
?>
