<!DOCTYPE html>
<?php require_once('../process/login.php'); ?>
<html>
<title>CHECKERVIET</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../SOURCE.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
<?php
if (isLoginedAdmin()) {
?>

    <body class="w3-content" action="user.php" style="max-width:1200px">

        <!-- Sidebar/menu -->
        <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
            <div class="w3-container w3-display-container w3-padding-16">
                <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
                <a href="#"><img src="../Images/ANHNEN/logocheck.jpg" alt="LOGO" width="40%"></a>
            </div>
            <div class="w3-padding-64 w3-large w3-text-gray" style="font-weight:bold">
                <a href="index.php" class="w3-bar-item w3-button w3-white">Home</a>
                <a href="admin.php" class="w3-bar-item w3-button w3-white">Order management</a>
                <a href="Productmanagement.php" class="w3-bar-item w3-button w3-white">Product management</a>
                <a href="#" class="w3-button w3-block w3-light-grey w3-left-align">User management</a>
            </div>
        </nav>

        <!-- Top menu on small screens -->
        <header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
            <div class="w3-bar-item w3-wide"><a href="demo.html" class="w3-button">CHECKERVIET</div>
            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-10 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
        </header>

        <!-- Overlay effect when opening sidebar on small screens -->
        <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

        <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin-left:250px">

            <!-- Push down content on small screens -->
            <div class="w3-hide-large" style="margin-top:83px"></div>

            <!-- Top header -->
            <header class="w3-container w3-xlarge w3-padding-24">
                <p class="w3-left">Hi admin</p>
                <p class="w3-right">

                    <!-- Log out icon -->
                    <a href="logoutadmin.php" class="w3-bar-item w3-button  w3-right">
                        <i class="fa fa-sign-out  "></i>
                    </a>

                </p>
            </header>
            <form style="padding-left: 15px;" onchange="reloadadmin()">
                <input type="radio" id="all" name="select" value="1" <?php if (isset($_REQUEST['select'])) {
                                                                            echo ($_REQUEST['select'] == 1) ? 'checked="checked"' : '';
                                                                        }
                                                                        echo 'checked="checked"'  ?>>
                <label for="All">All</label>
                <input type="radio" id="pro" name="select" value="2" <?php if (isset($_REQUEST['select'])) {
                                                                            echo ($_REQUEST['select'] == 2) ? 'checked="checked"' : '';
                                                                        } ?>>
                <label for="Processed">Active</label>
                <input type="radio" id="nonepro" name="select" value="3" <?php if (isset($_REQUEST['select'])) {
                                                                                echo ($_REQUEST['select'] == 3) ? 'checked="checked"' : '';
                                                                            } ?>>
                <label for="nonepro">Block</label>
                <div>
                    <label for="searchOrder">Search order </label>
                    <input type="text" id="textOrder" name="searchText" style="width: 20%" placeholder="Type Order ID or Username" value="<?php
                                                                                                                                            echo isset($_REQUEST['searchText']) ? $_REQUEST['searchText'] : "";
                                                                                                                                            ?>">
                    <button class="button" onclick="reloadadmin()">Search</button>
                </div>
            </form>
            <script>
                function reloadadmin() {
                    if (document.getElementById('all').checked) {
                        var valuecheck = document.getElementById('all').value;

                    } else if (document.getElementById('pro').checked) {
                        var valuecheck = document.getElementById('pro').value;

                    } else var valuecheck = document.getElementById('nonepro').value;
                    var text = document.getElementById('textOrder').value
                    window.location.href = "user.php?select=" + valuecheck + "&searchText=" + text
                }
            </script>
            <!--Admin-->
            <div class="w3-container  ">
                <div class="row">
                    <div class="col-md-10 ">
                        <div class="panel panel-default panel-table">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col col-xs-6">
                                        <h3 class="panel-title">Customer list</h3>
                                    </div>

                                </div>
                            </div>
                            <div class="panel-body">
                                <?php
                                $conn = createDbConnection();
                                if (isset($_REQUEST['searchText'])) {
                                    $seachtext = $_REQUEST['searchText'];
                                    if (isset($_REQUEST['select'])) {
                                        if ($_REQUEST['select'] == 1)
                                            $sql = "SELECT * FROM khachhang  where (sdt like '%$seachtext%' or userKH like '%$seachtext%' or email like '%$seachtext%')";
                                        else if ($_REQUEST['select'] == 2)
                                            $sql = "SELECT * FROM khachhang WHERE trangthai='Active' and (sdt like '%$seachtext%' or userKH like '%$seachtext%' or email like '%$seachtext%')";
                                        else
                                            $sql = "SELECT * FROM khachhang WHERE tinhtrang='Block' and (sdt like '%$seachtext%' or userKH like '%$seachtext%' or email like '%$seachtext%')";
                                    } else {
                                        $sql = "SELECT * FROM khachhang where (sdt like '%$seachtext%' or userKH like '%$seachtext%' or email like '%$seachtext%')";
                                    }
                                } else {
                                    if (isset($_REQUEST['select'])) {
                                        if ($_REQUEST['select'] == 1)
                                            $sql = "SELECT * FROM khachhang";
                                        else if ($_REQUEST['select'] == 2)
                                            $sql = "SELECT * FROM khachhang WHERE trangthai='Active'";
                                        else
                                            $sql = "SELECT * FROM khachhang WHERE trangthai='Block'";
                                    } else {
                                        $sql = "SELECT * FROM khachhang";
                                    }
                                }

                                if ($result = mysqli_query($conn, $sql)) {

                                    if (mysqli_num_rows($result) > 0) {
                                ?>


                                        <table class="table table-striped table-bordered table-list">
                                            <thead>
                                                <tr>
                                                    <th><em class="fa fa-cog"></em>
                                                    </th>
                                                    <!-- <th class="hidden-xs" width=75px>ID User</th> -->
                                                    <th>User name</th>
                                                    <th width=80px>Password</th>
                                                    <th width=100px>Status</th>
                                                    <th width=20%>Email</th>
                                                    <th width=30%>Phone number</th>
                                                    <th width=30%>Full Name</th>
                                                    <th width=50%>Address</th>
                                                </tr>

                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                    <tr>
                                                        <td alignment="center">

                                                            <?php
                                                            if ($row['trangthai'] == "Block") { ?>
                                                                <button class="btn btn-danger fa fa-lock" onclick="changeStatus('<?= $row['userKH'] ?>','<?= $row['trangthai'] ?>')"></button>

                                                            <?php } else { ?>
                                                                <button class="btn btn-danger fa fa-unlock" style="background-color: green;" onclick="changeStatus('<?= $row['userKH'] ?>','<?= $row['trangthai'] ?>')"></button>
                                                            <?php } ?>
                                                        </td>


                                                        <td><?php echo $row['userKH'] ?></td>
                                                        <td><?php echo $row['passKH'] ?></td>
                                                        <td><?php echo $row['trangthai']
                                                            ?></td>
                                                        <td><?php echo $row['email']
                                                            ?></td>
                                                        <td><?php echo $row['sdt'] ?></td>
                                                        <td><?php echo $row['hoTen'] ?></td>
                                                        <td><?php echo $row['diachi'] ?></td>

                                                    </tr>




                            </div>
                        </div>
            <?php

                                                }
                                            }
                                        }
            ?>

            </tbody>
            </table>
                    </div>


                </div>
            </div>
        </div>
        </div>

        <script>
            // Accordion
            function myAccFunc() {
                var x = document.getElementById("demoAcc");
                if (x.className.indexOf("w3-show") == -1) {
                    x.className += " w3-show";
                } else {
                    x.className = x.className.replace(" w3-show", "");
                }
            }

            function myAccFunc1() {
                var x = document.getElementById("demoAcc1");
                if (x.className.indexOf("w3-show") == -1) {
                    x.className += " w3-show";
                } else {
                    x.className = x.className.replace(" w3-show", "");
                }
            }



            // Open and close sidebar
            function w3_open() {
                document.getElementById("mySidebar").style.display = "block";
                document.getElementById("myOverlay").style.display = "block";
            }

            function w3_close() {
                document.getElementById("mySidebar").style.display = "none";
                document.getElementById("myOverlay").style.display = "none";
            }
        </script>
        <script>
            function changeStatus(userKH, trangthai) {
                var cof = confirm("Are you sure ?");
                if (cof) {

                    var xmlhttp;
                    if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else { // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function() {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                        }
                    }
                    xmlhttp.open("GET", "userProcess.php?userKH=" + userKH + "&trangthai=" + trangthai, true);
                    xmlhttp.send();
                    window.location.href = "user.php"
                }
            }
        </script>
    </body>
<?php
} else {
    echo '<script>window.location.replace("/WEB2/admin")</script>';
}
?>



</html>