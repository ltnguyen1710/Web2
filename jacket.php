<!DOCTYPE html>
<?php
require('process/login.php');
if (isset($_POST['username'])) {
  if (login($_POST['username'], $_POST['psw']) == "") {
    echo '<script>alert("Wrong password")</script>';
  } else {
    echo '<script>alert("Login successfully")</script>';
  }
}
?>
<?php
require('process/register_submit.php');
if (isset($_POST["username1"])) {
  Register($_POST["username1"], $_POST["psw1"], $_POST["repsw"], $_POST["phone"], $_POST["fullname"]);
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
<script src="index.js"></script>
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

  /* cart */
  .cart-header {
    font-weight: bold;
    font-size: 1.25em;
    color: #333;
  }

  .cart-column {
    display: flex;
    align-items: center;
    border-bottom: 1px solid black;
    margin-right: 1.5em;
    padding-bottom: 10px;
    margin-top: 10px;
  }

  .cart-row {
    display: flex;
  }

  .cart-item {
    width: 45%;
  }

  .cart-price {
    width: 20%;
    font-size: 1.2em;
    color: #333;
  }

  .cart-quantity {
    width: 35%;
  }

  .cart-item-title {
    color: #333;
    margin-left: .5em;
    font-size: 1.0em;
  }

  .cart-item-image {
    width: 75px;
    height: auto;
    border-radius: 10px;
  }

  .btn-danger {
    color: white;
    background-color: #EB5757;
    border: none;
    border-radius: .3em;
    font-weight: bold;
  }

  .btn-danger:hover {
    background-color: #CC4C4C;
  }

  .cart-quantity-input {
    height: 34px;
    width: 50px;
    border-radius: 5px;
    border: 1px solid #56CCF2;
    background-color: #eee;
    color: #333;
    padding: 0;
    text-align: center;
    font-size: 1.2em;
    margin-right: 25px;
  }

  .cart-row:last-child {
    border-bottom: 1px solid black;
  }

  .cart-row:last-child .cart-column {
    border: none;
  }

  .cart-total {
    text-align: end;
    margin-top: 10px;
    margin-right: 10px;
  }

  .cart-total-title {
    font-weight: bold;
    font-size: 1.5em;
    color: black;
    margin-right: 20px;
  }

  .cart-total-price {
    color: #333;
    font-size: 1.5em;
  }
</style>

<body class="w3-content" style="max-width:1200px" onload="reloadgiohang()">

  <!-- Sidebar/menu -->
  <?php include 'components/nav.php'; ?>
  <!-- Head menu -->
  <?php include 'components/headmenu.php' ?>
  <!-- Filter -->
  <?php
  $include_type = '2';
  include 'components/filter.php' 
  ?>

  <script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slideIndex++;
      if (slideIndex > slides.length) {
        slideIndex = 1
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
      setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
  </script>

  <div class="w3-container w3-text-grey" id="jeans">

  </div>


  <!-------------- Phan trang--------------->
  <?php
  $conn = createDbConnection();

  if (isset($_REQUEST['from'])) {
    $_SESSION['from'] = $_REQUEST['from'];
    $_SESSION['to'] = $_REQUEST['to'];
    if ($_SESSION['from'] == "***") {
      // BƯỚC 2: TÌM TỔNG SỐ RECORDS
      $result = mysqli_query($conn, 'select count(*) as total from sanpham where maloaisp = 2');
      $row = mysqli_fetch_assoc($result);
      $total_records = $row['total'];
      // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
      $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
      $limit = 4;
      // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
      // tổng số trang
      $total_page = ceil($total_records / $limit);
      // Giới hạn current_page trong khoảng 1 đến total_page
      if ($current_page > $total_page) {
        $current_page = $total_page;
      } else if ($current_page < 1) {
        $current_page = 1;
      }

      // Tìm Start
      $start = ($current_page - 1) * $limit;

      // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
      // Có limit và start rồi thì truy vấn CSDL lấy danh sách sản phẩm
      $result = mysqli_query($conn, "SELECT * FROM sanpham  where maloaisp = 2 LIMIT $start, $limit");
    } else if ($_SESSION['from'] == 300) {
      // BƯỚC 2: TÌM TỔNG SỐ RECORDS
      $result = mysqli_query($conn, 'select count(*) as total from sanpham where maloaisp = 2 && giasp>=300');
      $row = mysqli_fetch_assoc($result);
      $total_records = $row['total'];
      // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
      $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
      $limit = 4;
      // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
      // tổng số trang
      $total_page = ceil($total_records / $limit);
      // Giới hạn current_page trong khoảng 1 đến total_page
      if ($current_page > $total_page) {
        $current_page = $total_page;
      } else if ($current_page < 1) {
        $current_page = 1;
      }

      // Tìm Start
      $start = ($current_page - 1) * $limit;

      // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
      // Có limit và start rồi thì truy vấn CSDL lấy danh sách sản phẩm
      $result = mysqli_query($conn, "SELECT * FROM sanpham  where maloaisp = 2 && GIASP>=" .  $_SESSION['from'] . " LIMIT " . $start . "," . $limit);
    } else {
      // BƯỚC 2: TÌM TỔNG SỐ RECORDS
      $result = mysqli_query($conn, 'select count(*) as total from sanpham where maloaisp = 2 && giasp>=' .  $_SESSION['from'] . ' && GIASP<= ' . $_SESSION['to']);
      $row = mysqli_fetch_assoc($result);
      $total_records = $row['total'];
      // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
      $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
      $limit = 4;
      // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
      // tổng số trang
      $total_page = ceil($total_records / $limit);
      // Giới hạn current_page trong khoảng 1 đến total_page
      if ($current_page > $total_page) {
        $current_page = $total_page;
      } else if ($current_page < 1) {
        $current_page = 1;
      }

      // Tìm Start
      $start = ($current_page - 1) * $limit;

      // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
      // Có limit và start rồi thì truy vấn CSDL lấy danh sách sản phẩm
      $result = mysqli_query($conn, "SELECT * FROM sanpham  where maloaisp = 2 && GIASP>=" .  $_SESSION['from'] . " && GIASP<= " . $_SESSION['to'] . " LIMIT " . $start . "," . $limit);
    }
  } else {
    // BƯỚC 2: TÌM TỔNG SỐ RECORDS
    $result = mysqli_query($conn, 'select count(*) as total from sanpham where maloaisp = 2');
    $row = mysqli_fetch_assoc($result);
    $total_records = $row['total'];
    // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 4;
    // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
    // tổng số trang
    $total_page = ceil($total_records / $limit);
    // Giới hạn current_page trong khoảng 1 đến total_page
    if ($current_page > $total_page) {
      $current_page = $total_page;
    } else if ($current_page < 1) {
      $current_page = 1;
    }

    // Tìm Start
    $start = ($current_page - 1) * $limit;

    // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
    // Có limit và start rồi thì truy vấn CSDL lấy danh sách sản phẩm
    $result = mysqli_query($conn, "SELECT * FROM sanpham  where maloaisp = 2 LIMIT $start, $limit");
  }


  ?>

  <!-- Product grid -->
  <div class="w3-row w3-whitescale" id="myTable">
    <?php
    $conn = createDBConnection();
    if ($result) {
      while ($row = $result->fetch_assoc()) {

    ?>
        <!-- Product and Detail of Product -->
        <?php include 'components/Product.php' ?>
      <?php } ?>




      <div class="w3-bar w3-center ">
        <?php
        // PHẦN HIỂN THỊ PHÂN TRANG
        // BƯỚC 7: HIỂN THỊ PHÂN TRANG
        // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
        if (isset($_REQUEST['from'])) {
          if ($current_page > 1 && $total_page > 1) {
            echo '<button style=" color: #fff;border:none;background-color: black"><a href="jacket.php?page=' . ($current_page - 1) . '&from=' . $_SESSION['from'] . '&to=' . $_SESSION['to']  . '">Prev</a> </button> ';
          }

          // Lặp khoảng giữa
          for ($i = 1; $i <= $total_page; $i++) {
            // Nếu là trang hiện tại thì hiển thị thẻ span
            // ngược lại hiển thị thẻ a
            if ($i == $current_page) {
              echo '<button style=" color: #fff;border:none;background-color: gray"><span>' . $i . '</span> </button> ';
            } else {
              echo '<button style=" color: #fff;border:none;background-color: black"><a href="jacket.php?page=' . $i . '&from=' . $_SESSION['from'] . '&to=' . $_SESSION['to'] . '">' . $i . '</a> </button> ';
            }
          }

          // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
          if ($current_page < $total_page && $total_page > 1) {
            echo '<button style=" color: #fff;border:none;background-color: black"><a href="jacket.php?page=' . ($current_page + 1) . '&from=' . $_SESSION['from'] . '&to=' . $_SESSION['to'] . '">Next</a> </button>';
          }
        } else {
          if ($current_page > 1 && $total_page > 1) {
            echo '<button style=" color: #fff;border:none;background-color: black"><a href="jacket.php?page=' . ($current_page - 1) . '">Prev</a> </button> ';
          }

          // Lặp khoảng giữa
          for ($i = 1; $i <= $total_page; $i++) {
            // Nếu là trang hiện tại thì hiển thị thẻ span
            // ngược lại hiển thị thẻ a
            if ($i == $current_page) {
              echo '<button style=" color: #fff;border:none;background-color: gray"><span>' . $i . '</span> </button> ';
            } else {
              echo '<button style=" color: #fff;border:none;background-color: black"><a href="jacket.php?page=' . $i . '">' . $i . '</a> </button> ';
            }
          }

          // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
          if ($current_page < $total_page && $total_page > 1) {
            echo '<button style=" color: #fff;border:none;background-color: black"><a href="jacket.php?page=' . ($current_page + 1) . '">Next</a> </button> ';
          }
        }

        ?>
      </div>
    <?php } else {
      echo "
        <p style='padding-left: 15px'>Product was not found</p>";
    }
    ?>
  </div>
  <div class="w3-container">



    <!-- Subscribe section -->
    <div class="w3-container w3-black w3-padding-32">
      <h1>Subscribe</h1>
      <p>To get special offers and VIP treatment:</p>
      <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail" style="width:100%"></p>
      <button type="button" class="w3-button w3-red w3-margin-bottom">Subscribe</button>
    </div>

    <!-- Footer -->
    <footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
      <div class="w3-row-padding">
        <div class="w3-col s4">
          <h4>Contact</h4>
          <p>Questions? Go ahead.</p>
          <form action="/action_page.php" target="_blank">
            <p><input class="w3-input w3-border" type="text" placeholder="Name" name="Name" required></p>
            <p><input class="w3-input w3-border" type="text" placeholder="Email" name="Email" required></p>
            <p><input class="w3-input w3-border" type="text" placeholder="Subject" name="Subject" required></p>
            <p><input class="w3-input w3-border" type="text" placeholder="Message" name="Message" required></p>
            <button type="submit" class="w3-button w3-block w3-black">Send</button>
          </form>
        </div>

        <div class="w3-col s4">
          <h4>About</h4>
          <p><a href="#">About us</a></p>
          <p><a href="#">We're hiring</a></p>
          <p><a href="#">Support</a></p>
          <p><a href="#">Find store</a></p>
          <p><a href="#">Shipment</a></p>
          <p><a href="#">Payment</a></p>
          <p><a href="#">Gift card</a></p>
          <p><a href="#">Return</a></p>
          <p><a href="#">Help</a></p>
        </div>

        <div class="w3-col s4 w3-justify">
          <h4>Store</h4>
          <p><i class="fa fa-fw fa-map-marker"></i> Company Name</p>
          <p><i class="fa fa-fw fa-phone"></i> 0044123123</p>
          <p><i class="fa fa-fw fa-envelope"></i> ex@mail.com</p>
          <h4>We accept</h4>
          <p><i class="fa fa-fw fa-cc-amex"></i> Amex</p>
          <p><i class="fa fa-fw fa-credit-card"></i> Credit Card</p>
          <br>
          <i class="fa fa-facebook-official w3-hover-opacity w3-large"></i>
          <i class="fa fa-instagram w3-hover-opacity w3-large"></i>
          <i class="fa fa-snapchat w3-hover-opacity w3-large"></i>
          <i class="fa fa-pinterest-p w3-hover-opacity w3-large"></i>
          <i class="fa fa-twitter w3-hover-opacity w3-large"></i>
          <i class="fa fa-linkedin w3-hover-opacity w3-large"></i>
        </div>
      </div>
    </footer>

    <div class="w3-black w3-center w3-padding-24">Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-opacity">w3.css</a></div>

    <!-- End page content -->
  </div>

  <!-- Newsletter Modal -->
  <div id="newsletter" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
      <div class="w3-container w3-white w3-center">
        <i onclick="document.getElementById('newsletter').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
        <h2 class="w3-wide">NEWSLETTER</h2>
        <p>Join our mailing list to receive updates on new arrivals and special offers.</p>
        <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail"></p>
        <button type="button" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('newsletter').style.display='none'">Subscribe</button>
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
    function reloadgiohang() {
      var ten = [];
      var hinh = [];
      var gia = [];
      var soluong = [];
      var size = [];
      ten = <?php echo json_encode($_SESSION['cart']['ten']); ?>;
      hinh = <?php echo json_encode($_SESSION['cart']['hinhanh']); ?>;
      gia = <?php echo json_encode($_SESSION['cart']['gia']); ?>;
      soluong = <?php echo json_encode($_SESSION['cart']['soluongtonkho']); ?>;
      size = <?php echo json_encode($_SESSION['cart']['size']); ?>;
      for (var i = 0; i < ten.length; i++) {
        reload(ten[i], gia[i], hinh[i], soluong[i], size[i])
      }
    }
  </script>
  <script src="IMGDEMO/jquery-2.1.4.min.js"></script>
</body>

</html>