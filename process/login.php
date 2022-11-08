<?php
@session_start();
function createDBConnection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dct119c2";
    $con = new mysqli($servername, $username, $password, $dbname);

    return $con;
}
function login($username, $password)
{
    $con = createDBConnection();
    if ($con->connect_error) {
        die("Connection failed " . $con->connect_error);
        return;
    }
    $sql = "Select * from khachhang where userKH ='" . $username . "'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            if ($row['trangthai'] == "Block") {
                return "Block";
            }
            if ($row['passKH'] == $password) {
                $_SESSION['username'] = $username;
                return $username;
            } else {
                return "";
            }
        }
    }
    $con->close();
}
function adminlogin($admin, $pass)
{
    $con = createDBConnection();
    if ($con->connect_error) {
        die("Connection failed " . $con->connect_error);
        return;
    }
    $sql = "Select * from admin where userAD='" . $admin . "'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        if ($row = $result->fetch_assoc()) {
            if ($row['passAD'] == $pass) {
                $_SESSION['admin'] = $admin;
                return $admin;
            } else {
                return "";
            }
        }
    }
    $con->close();
}
function isLoginedAdmin()
{
    return isset($_SESSION['admin']);
}
function logoutAdmin()
{
    unset($_SESSION['admin']);
    header('Location: ../admin.php');
}
function isLogined()
{
    return isset($_SESSION['username']);
}
function logout()
{
    unset($_SESSION['username']);
    header('Location: ../index.php');
}
function LogCard()
{
    return isLogined() ?  "addItemToCart(document.getElementById('ten').innerHTML,document.getElementById('gia1').innerHTML,document.getElementById('hinh').src,document.getElementById('sl').innerHTML, document.getElementById('size').value)" : "document.getElementById('id01').style.display='block',document.getElementById('detail5').style.display='none'";
}

if (isset($_POST['username'])) {
    $login_result = login($_POST['username'], $_POST['psw']);
    if ($login_result == "") {
        echo '<script>alert("Wrong password")</script>';
    }
    if ($login_result != "" && $login_result != "Block") {
        echo '<script>alert("Login successfully")</script>';
    }
    if ($login_result == "Block") {
        echo '<script>alert("Your account has been blocked!")</script>';
    }
}
