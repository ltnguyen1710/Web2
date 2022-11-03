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
  $include_type = '1';
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
  <!-- Product grid -->
  <div class="w3-row w3-whitescale" id="myTable">
    <?php
    $conn = createDbConnection();

    if (isset($_REQUEST['from'])) {
      $_SESSION['from'] = $_REQUEST['from'];
      $_SESSION['to'] = $_REQUEST['to'];
      if ($_SESSION['from'] == "***") {
        // BƯỚC 2: TÌM TỔNG SỐ RECORDS
        $result = mysqli_query($conn, 'select count(*) as total from sanpham where maloaisp = 1');
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
        // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 8;
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
        $result = mysqli_query($conn, "SELECT * FROM sanpham  where maloaisp = 1 LIMIT $start, $limit");
      } else if ($_SESSION['from'] == 300) {
        // BƯỚC 2: TÌM TỔNG SỐ RECORDS
        $result = mysqli_query($conn, 'select count(*) as total from sanpham where maloaisp = 1 && giasp>=300');
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
        // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 8;
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
        $result = mysqli_query($conn, "SELECT * FROM sanpham  where maloaisp = 1 && GIASP>=" .  $_SESSION['from'] . " LIMIT " . $start . "," . $limit);
      } else {
        // BƯỚC 2: TÌM TỔNG SỐ RECORDS
        $result = mysqli_query($conn, 'select count(*) as total from sanpham where maloaisp = 1 && giasp>=' .  $_SESSION['from'] . ' && GIASP<= ' . $_SESSION['to']);
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
        // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 8;
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
        $result = mysqli_query($conn, "SELECT * FROM sanpham  where maloaisp = 1 && GIASP>=" .  $_SESSION['from'] . " && GIASP<= " . $_SESSION['to'] . " LIMIT " . $start . "," . $limit);
      }
    } else {
      // BƯỚC 2: TÌM TỔNG SỐ RECORDS
      $result = mysqli_query($conn, 'select count(*) as total from sanpham where maloaisp = 1');
      $row = mysqli_fetch_assoc($result);
      $total_records = $row['total'];
      // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
      $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
      $limit = 8;
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
      $result = mysqli_query($conn, "SELECT * FROM sanpham  where maloaisp = 1 LIMIT $start, $limit");
    }


    ?>


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
            echo '<button style=" color: #fff;border:none;background-color: black"><a href="T-shirt.php?page=' . ($current_page - 1) . '&from=' . $_SESSION['from'] . '&to=' . $_SESSION['to']  . '">Prev</a></button> ';
          }

          // Lặp khoảng giữa
          for ($i = 1; $i <= $total_page; $i++) {
            // Nếu là trang hiện tại thì hiển thị thẻ span
            // ngược lại hiển thị thẻ a
            if ($i == $current_page) {
              echo '<button style=" color: #fff;border:none;background-color: gray"><span>' . $i . '</span> | ';
            } else {
              echo '<button style=" color: #fff;border:none;background-color: black"><a href="T-shirt.php?page=' . $i . '&from=' . $_SESSION['from'] . '&to=' . $_SESSION['to'] . '">' . $i . '</a> </button> ';
            }
          }

          // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
          if ($current_page < $total_page && $total_page > 1) {
            echo '<button style=" color: #fff;border:none;background-color: black"><a href="T-shirt.php?page=' . ($current_page + 1) . '&from=' . $_SESSION['from'] . '&to=' . $_SESSION['to'] . '">Next</a> </button> ';
          }
        } else {
          if ($current_page > 1 && $total_page > 1) {
            echo '<button style=" color: #fff;border:none;background-color: black"><a href="T-shirt.php?page=' . ($current_page - 1) . '">Prev</a> </button> ';
          }

          // Lặp khoảng giữa
          for ($i = 1; $i <= $total_page; $i++) {
            // Nếu là trang hiện tại thì hiển thị thẻ span
            // ngược lại hiển thị thẻ a
            if ($i == $current_page) {
              echo '<button style=" color: #fff;border:none;background-color: gray"><span>' . $i . '</span> </button> ';
            } else {
              echo '<button style=" color: #fff;border:none;background-color: black"><a href="T-shirt.php?page=' . $i . '">' . $i . '</a> </button> ';
            }
          }

          // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
          if ($current_page < $total_page && $total_page > 1) {
            echo '<button style=" color: #fff;border:none;background-color: black"><a href="T-shirt.php?page=' . ($current_page + 1) . '">Next</a> </button> ';
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
  <?php include 'components/footer.php' ?>
</body>

</html>