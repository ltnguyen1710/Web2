<?php include 'components/header.php'; ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<?php
if (isLoginedAdmin()) {
?>

  <body class="w3-content" style="max-width:1200px">

    <?php include 'components/nav.php'; ?>
    <form style="padding-left: 15px;" onchange="reloadadmin()">
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
        var text = document.getElementById('textOrder').value
        window.location.href = "orderHistory.php?searchText=" + text
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
                  <h3 class="panel-title">History list</h3>
                </div>

              </div>
            </div>
            <div class="panel-body">
              <?php
              $conn = createDbConnection();
              if (isset($_REQUEST['searchText'])) {
                $searchtext = $_REQUEST['searchText'];
                $sql = "SELECT chitiethoadon.* FROM chitiethoadon,donhang WHERE (chitiethoadon.maDon like '%$searchtext%' or chitiethoadon.userKH like '%$searchtext%' or chitiethoadon.tenSP like '%$searchtext%') and donhang.maDon=chitiethoadon.maDon and donhang.tinhtrang='Da xu ly'";
              } else {
                $sql = "SELECT chitiethoadon.* FROM chitiethoadon,donhang WHERE donhang.maDon=chitiethoadon.maDon and donhang.tinhtrang='Da xu ly'";
              }

              if ($result = mysqli_query($conn, $sql)) {

                if (mysqli_num_rows($result) > 0) {
              ?>


                  <table class="table table-striped table-bordered table-list">
                    <thead>
                      <tr>
                        <th class="hidden-xs" width=75px>ID Order</th>
                        <th>ID Product</th>
                        <th>Product Name</th>
                        <th>User Buy</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Size</th>
                      </tr>

                    </thead>
                    <tbody>
                      <?php
                      while ($row = mysqli_fetch_array($result)) {
                      ?>
                        <tr>
                          <td class="hidden-xs"><?php echo $row['maDon'] ?></td>
                          <td><?php echo $row['maSP'] ?></td>
                          <td><?php echo $row['tenSP'] ?></td>
                          <td><?php echo $row['userKH'] ?></td>
                          <td><?php echo $row['soluong'] ?></td>
                          <td><?php echo $row['gia'] ?></td>
                          <td><?php echo $row['size'] ?></td>
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
<?php
} else {
  echo '<script>window.location.replace("/WEB2/admin")</script>';
}
?>



</html>