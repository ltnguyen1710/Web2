<!DOCTYPE html>
<?php
require_once('login.php');
if (isset($_POST['admin'])) {
   adminlogin($_POST['admin'], $_POST['psw']);
}
?>
<html>
<title>CHECKERVIET</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="SOURCE.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="js/jquery-1.11.1.min.js"></script>
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

  .panel-table .panel-body {
    padding: 0;
  }

  .panel-table .panel-body .table-bordered {
    border-style: none;
    margin: 0;
  }

  .panel-table .panel-body .table-bordered>thead>tr>th:first-of-type {
    text-align: center;
    width: 100px;
  }

  .panel-table .panel-body .table-bordered>thead>tr>th:last-of-type,
  .panel-table .panel-body .table-bordered>tbody>tr>td:last-of-type {
    border-right: 0px;
  }

  .panel-table .panel-body .table-bordered>thead>tr>th:first-of-type,
  .panel-table .panel-body .table-bordered>tbody>tr>td:first-of-type {
    border-left: 0px;
  }

  .panel-table .panel-body .table-bordered>tbody>tr:first-of-type>td {
    border-bottom: 0px;
  }

  .panel-table .panel-body .table-bordered>thead>tr:first-of-type>th {
    border-top: 0px;
  }

  .panel-table .panel-footer .pagination {
    margin: 0;
  }

  .panel-table .panel-footer .col {
    line-height: 34px;
    height: 34px;
  }

  .panel-table .panel-heading .col h3 {
    line-height: 30px;
    height: 30px;
  }

  .panel-table .panel-body .table-bordered>tbody>tr>td {
    line-height: 34px;
  }
</style>
<?php
require_once('login.php');
if (isLoginedAdmin()) {
?>

  <body class="w3-content" action="admin.php" style="max-width:1200px">

    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
      <div class="w3-container w3-display-container w3-padding-16">
        <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
        <a href="#"><img src="Images/ANHNEN/logocheck.jpg" alt="LOGO" width="40%"></a>
      </div>
      <div class="w3-padding-64 w3-large w3-text-gray" style="font-weight:bold">
        <a href="admin.html" class="w3-button w3-block w3-light-grey w3-left-align"><i class="fa fa-caret-right w3-margin-right"></i>Customer management</a>
        <a href="Productmanagement.php" class="w3-bar-item w3-button w3-white">Product management</a>
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
          <a href="logout.php" class="w3-bar-item w3-button  w3-right">
            <i class="fa fa-sign-out  "></i>
          </a>

        </p>
      </header>
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
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>
                      <th><em class="fa fa-cog"></em>
                      </th>
                      <th class="hidden-xs">ID</th>
                      <th>Full name</th>
                      <th>Password</th>
                      <th>Email</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td align="center"><a class="btn btn-default"><em class="fa fa-pencil"></em></a>
                        <a class="btn btn-danger">
                          <em onclick="myFunction(this)" class="fa fa-lock"></em>
                        </a>
                      </td>
                      <td class="hidden-xs">1</td>
                      <td>Nguyen Nam Dan</td>
                      <td>**********</td>
                      <td>nguyennamdan@gmail.com</td>
                    </tr>
                    <tr>
                      <td align="center"><a class="btn btn-default"><em class="fa fa-pencil"></em></a>
                        <a class="btn btn-danger">
                          <em onclick="myFunction(this)" class="fa fa-lock"></em>
                        </a>
                      </td>
                      <td class="hidden-xs">2</td>
                      <td>Le Trung Nguyen</td>
                      <td>**********</td>
                      <td>letrungnguyen@gmail.com</td>
                    </tr>
                    <tr>
                      <td align="center"><a class="btn btn-default"><em class="fa fa-pencil"></em></a>
                        <a class="btn btn-danger">
                          <em onclick="myFunction(this)" class="fa fa-lock"></em>
                        </a>
                      </td>
                      <td class="hidden-xs">3</td>
                      <td>Dang Ngoc Khang</td>
                      <td>**********</td>
                      <td>dangngockhang@gmail.com</td>
                    </tr>
                    <tr>
                      <td align="center"><a class="btn btn-default"><em class="fa fa-pencil"></em></a>
                        <a class="btn btn-danger">
                          <em onclick="myFunction(this)" class="fa fa-lock"></em>
                        </a>
                      </td>
                      <td class="hidden-xs">4</td>
                      <td>Dan Nguyen Khang</td>
                      <td>**********</td>
                      <td>DanNguyenKhang@gmail.com</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="panel-footer">
                <div class="row">
                  <div class="col col-xs-4">Page 1 to 5 </div>
                  <div class="col col-xs-8">
                    <ul class="pagination hidden-xs pull-right">
                      <li><a href="#">1</a>
                      </li>
                      <li><a href="#">2</a>
                      </li>
                      <li><a href="#">3</a>
                      </li>
                      <li><a href="#">4</a>
                      </li>
                      <li><a href="#">5</a>
                      </li>
                    </ul>
                    <ul class="pagination visible-xs pull-right">
                      <li><a href="#">«</a>
                      </li>
                      <li><a href="#">»</a>
                      </li>
                    </ul>
                  </div>
                </div>
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

        // Click on the "Jeans" link on page load to open the accordion for demo purposes
        document.getElementById("myBtn").click();


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
        function myFunction(x) {
          x.classList.toggle("fa-unlock");
        }
      </script>
      <script src="IMGDEMO/jquery-2.1.4.min.js"></script>
  </body>
<?php
} else {
?>

  <body>
    
      <div class="w3-modal-content" style="max-width:600px">

        <div class="w3-center  "><br>
          <img src="Images/ANHNEN/logocheck.jpg" alt="" width="20%">
        </div>

        <form action='admin.php' method="post" class="w3-container">
          <div class="w3-section">
            <label><b>User name</b></label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter User name" name="admin" required value="checker">
            <label><b>Password</b></label>
            <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="psw" required value="12345">
            <input class="w3-button w3-block w3-black w3-section w3-padding" type="submit" value="Log in">
            <input class="w3-check w3-margin-top " type="checkbox" checked="checked"> Remember me
          </div>
        </form>



      </div>
    
  </body>
<?php
}
?>


</html>