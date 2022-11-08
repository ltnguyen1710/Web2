<!DOCTYPE html>
<?php
require_once('../process/login.php');
if (isset($_POST['admin'])) {
    if (adminlogin($_POST['admin'], $_POST['psw']) == "") {
        echo '<script>alert("Wrong password")</script>';
    } else {
        echo '<script>alert("Login successfully")</script>';
    }
}
?>
<html>
<head>
<title>CHECKERVIET</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../SOURCE.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="admin.js"></script>
<style>
  .w3-sidebar a,
  form {
    font-family: "Roboto", sans-serif
  }

  body,
  h1,
  h2,
  h3,
  h4,
  h5,
  h6,
  .w3-wide {
    font-family: "Montserrat", sans-serif;
  }

  .button {
    background-color: #555555;
    /* Green */
    border: none;
    color: white;
    /* padding: 15px 32px; */
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
  }
</style>
</head>