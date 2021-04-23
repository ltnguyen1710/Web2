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
function login($username, $passwork)
{
    $con = createDBConnection();
    $sql = "Select * from customer where usernameCU ='" . $username . "'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        if ($row = $result->fetch_assoc()) {
            if ($row['password'] = $passwork) {
                $_SESSION['username'] = $username;
                return $username;
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
