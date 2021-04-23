<?php
require('login.php');
logout();
logoutAdmin();
header('Location: demo.php');
exit;
?>