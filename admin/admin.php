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
      <input type="radio" id="all" name="select" value="1" <?php if (isset($_REQUEST['select'])) {
                                                              echo ($_REQUEST['select'] == 1) ? 'checked="checked"' : '';
                                                            }
                                                            echo 'checked="checked"'  ?>>
      <label for="All">All</label>
      <input type="radio" id="pro" name="select" value="2" <?php if (isset($_REQUEST['select'])) {
                                                              echo ($_REQUEST['select'] == 2) ? 'checked="checked"' : '';
                                                            } ?>>
      <label for="Processed">Processed</label>
      <input type="radio" id="nonepro" value="3" name="select" <?php if (isset($_REQUEST['select'])) {
                                                                  echo ($_REQUEST['select'] == 3) ? 'checked="checked"' : '';
                                                                } ?>>
      <label for="nonepro">None process</label>
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
        window.location.href = "admin.php?select=" + valuecheck + "&searchText=" + text
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
                  <h3 class="panel-title">Order list</h3>
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
                    $sql = "SELECT * FROM donhang  where (maDon like '%$seachtext%' or userKH like '%$seachtext%')";
                  else if ($_REQUEST['select'] == 2)
                    $sql = "SELECT * FROM donhang WHERE tinhtrang='Da xu ly' and (maDon like '%$seachtext%' or userKH like '%$seachtext%')";
                  else
                    $sql = "SELECT * FROM donhang WHERE tinhtrang='Chua xu ly' and (maDon like '%$seachtext%' or userKH like '%$seachtext%')";
                } else {
                  $sql = "SELECT * FROM donhang where (maDon like '%$seachtext%' or userKH like '%$seachtext%')";
                }
              } else {
                if (isset($_REQUEST['select'])) {
                  if ($_REQUEST['select'] == 1)
                    $sql = "SELECT * FROM donhang";
                  else if ($_REQUEST['select'] == 2)
                    $sql = "SELECT * FROM donhang WHERE tinhtrang='Da xu ly'";
                  else
                    $sql = "SELECT * FROM donhang WHERE tinhtrang='Chua xu ly'";
                } else {
                  $sql = "SELECT * FROM donhang";
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
                        <th class="hidden-xs" width=75px>ID Order</th>
                        <th>Price</th>
                        <th width=80px>Number of products</th>
                        <th width=100px>Status</th>
                        <th width=20%>Date</th>
                        <th width=30%>User</th>
                        <th width=30%>Address</th>
                        <th width=30%>Payment</th>
                      </tr>

                    </thead>
                    <tbody>
                      <?php
                      while ($row = mysqli_fetch_array($result)) {
                      ?>
                        <tr>
                          <td align="center">
                            <button class="btn btn-default fa fa-newspaper-o" onclick="billdetail('<?= $row['maDon'] ?>','<?= $row['userKH'] ?>'
                                )"></button>

                            <?php
                            if ($row['tinhtrang'] == "Chua xu ly") { ?>
                              <button class="btn btn-danger fa fa-check" onclick="myFunction('<?= $row['maDon'] ?>')"></button>

                            <?php } else { ?>
                              <button class="btn btn-danger fa fa-check" style="background-color: gray;"></button>
                            <?php } ?>
                          </td>

                          <td class="hidden-xs"><?php echo $row['maDon'] ?></td>
                          <td><?php echo $row['giaDon'] ?></td>
                          <td><?php echo $row['soluongMua'] ?></td>
                          <td><?php echo $row['tinhtrang'] ?></td>
                          <td><?php echo $row['ngaydat'] ?></td>
                          <td><?php echo $row['userKH'] ?></td>
                          <td><?php echo $row['diachinhan'] ?></td>
                          <td><?php echo $row['thanhtoan'] ?></td>
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
      function myFunction(madon) {
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
          xmlhttp.open("GET", "process/xulydonhang.php?madon=" + madon, true);
          xmlhttp.send();
          window.location.href = "admin.php"
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