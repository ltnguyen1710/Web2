<?php include 'components/header.php'; ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="js/jquery-1.11.1.min.js"></script>

<?php
if (isLoginedAdmin()) {
?>

  <body class="w3-content" action="admin.php" style="max-width:1200px">

    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
      <div class="w3-container w3-display-container w3-padding-16">
        <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
        <a href="#"><img src="../Images/ANHNEN/logocheck.jpg" alt="LOGO" width="40%"></a>
      </div>
      <div class="w3-padding-64 w3-large w3-text-gray" style="font-weight:bold">

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
        <p class="w3-left"><?php echo "Order Detail: " . $_REQUEST['madon']; ?></p>
        <p class="w3-right">



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
                    <h1 class="panel-title"><?php
                                            $conn = createDBConnection();
                                            $sql = "SELECT hoTen FROM khachhang where userKH='" . $_REQUEST['userKH'] . "'";
                                            $result = $conn->query($sql);
                                            $row = $result->fetch_assoc();
                                            echo $row['hoTen']; ?></h1>
                  </div>

                </div>
              </div>
              <div class="panel-body">
                <?php
                $sql = "SELECT * FROM chitiethoadon where maDon=" . $_REQUEST['madon'];
                if ($result = mysqli_query($conn, $sql)) {

                  if (mysqli_num_rows($result) > 0) {
                ?>
                    <table class="table table-striped table-bordered table-list">
                      <thead>
                        <tr>
                          <th>ID PRODUCT</th>
                          <th>NAME OF PRODUCT</th>
                          <th>QUANTITY</th>
                          <th>SIZE</th>
                          <th>PRICE</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                          <tr>
                            <td class="hidden-xs"><?php echo $row['maSP'] ?></td>
                            <td><?php echo $row['tenSP'] ?></td>
                            <td><?php echo $row['soluong'] ?></td>
                            <td><?php echo $row['size'] ?></td>
                            <td><?php echo $row['gia'] ?></td>
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
        <img src="../Images/ANHNEN/logocheck.jpg" alt="" width="20%">
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