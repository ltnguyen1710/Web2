<?php
session_start();
function createDBConnection(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dct119c2";
    $con = new mysqli($servername, $username, $password, $dbname);
    
    return $con;
}
function login($user, $pass)
{
    $con = createDBConnection();
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
function isLogined()
{
    return isset($_SESSION['username']);
}
function logout(){
    unset($_SESSION['username']);
}

?>
