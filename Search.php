<!DOCTYPE html>
<?php
require('process/login.php');
?>
<?php
require('process/register_submit.php');
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
        font-size: 1.1em;
    }
</style>

<body class="w3-content" style="max-width:1200px" onload="reloadgiohang()">

    <!-- Sidebar/menu -->
    <?php include 'components/nav.php'; ?>

    <!-- Head menu -->
    <?php include 'components/headmenu.php' ?>

    <!-- Filter -->
    <?php include 'components/filter.php' ?>

    <!-------------- Phan trang--------------->
    <?php

    ?>
    <!-- Product grid -->
    <div class="w3-row w3-whitescale" id="myTable">

        <?php
        $start = 0;
        $limit = 8;
        $current_page = 0;
        $total_page = 0;
        $total_records = 0;
        function phantrang($result)
        {
            $row = mysqli_fetch_assoc($result);
            $GLOBALS['total_records'] = $row['total'];
            // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
            $GLOBALS['current_page'] = isset($_GET['page']) ? $_GET['page'] : 1;

            // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
            // tổng số trang
            $GLOBALS['total_page'] = ceil($GLOBALS['total_records'] / $GLOBALS['limit']);
            // Giới hạn current_page trong khoảng 1 đến total_page
            if ($GLOBALS['current_page'] > $GLOBALS['total_page']) {
                $GLOBALS['current_page'] = $GLOBALS['total_page'];
            } else if ($GLOBALS['current_page'] < 1) {
                $GLOBALS['current_page'] = 1;
            }

            // Tìm Start
            $GLOBALS['start'] = ($GLOBALS['current_page'] - 1) * $GLOBALS['limit'];
        }
        if ($_REQUEST['tukhoa'] != "") {
            $search = $_SESSION['tukhoa'] = $_REQUEST['tukhoa'];

            $conn = createDbConnection();
            if (isset($_REQUEST['from'])) {
                $_SESSION['loaisp'] = $_REQUEST['loaisp'];
                $_SESSION['from'] = $_REQUEST['from'];
                $_SESSION['to'] = $_REQUEST['to'];
                if ($_SESSION['from'] == "***") {

                    if ($_SESSION['loaisp'] == 0)
                        $result = mysqli_query($conn, "select count(*) as total from sanpham where tenSP like '%$search%' ");
                    else
                        $result = mysqli_query($conn, "select count(*) as total from sanpham where tenSP like '%$search%'&&  maloaiSP=" . $_SESSION['loaisp']);
                    phantrang($result);


                    if ($_SESSION['loaisp'] == 0)
                        $result = mysqli_query($conn, "SELECT * FROM sanpham  where tenSP like '%$search%' LIMIT $start, $limit");
                    else
                        $result = mysqli_query($conn, "SELECT * FROM sanpham  where tenSP like '%$search%' && MALOAISP=" . $_SESSION['loaisp'] . " LIMIT " . $start . "," . $limit);
                } else if ($_SESSION['from'] == 300) {

                    if ($_SESSION['loaisp'] == 0)
                        $result = mysqli_query($conn, "select count(*) as total from sanpham where giasp>=300 && tenSP like '%$search%' ");
                    else
                        $result = mysqli_query($conn, "select count(*) as total from sanpham where tenSP like '%$search%' && giasp>=300 &&  MALOAISP=" . $_SESSION['loaisp']);

                    phantrang($result);


                    if ($_SESSION['loaisp'] == 0)
                        $result = mysqli_query($conn, "SELECT * FROM sanpham  where tenSP like '%$search%' && GIASP>=" .  $_SESSION['from'] . " LIMIT " . $start . "," . $limit);
                    else
                        $result = mysqli_query($conn, "SELECT * FROM sanpham  where tenSP like '%$search%' && GIASP>=" .  $_SESSION['from'] . ' && MALOAISP= ' . $_SESSION['loaisp'] . " LIMIT " . $start . "," . $limit);
                } else {

                    if ($_SESSION['loaisp'] == 0)
                        $result = mysqli_query($conn, "select count(*) as total from sanpham where tenSP like '%$search%' && giasp>=" .  $_SESSION['from'] . ' && GIASP<= ' . $_SESSION['to']);
                    else
                        $result = mysqli_query($conn, "select count(*) as total from sanpham where tenSP like '%$search%' && giasp>=" .  $_SESSION['from'] . ' && GIASP<= ' . $_SESSION['to'] . ' && MALOAISP= ' . $_SESSION['loaisp']);

                    phantrang($result);


                    if ($_SESSION['loaisp'] == 0)
                        $result = mysqli_query($conn, "SELECT * FROM sanpham  where tenSP like '%$search%' && GIASP>=" .  $_SESSION['from'] . " && GIASP<= " . $_SESSION['to'] . " LIMIT " . $start . "," . $limit);
                    else
                        $result = mysqli_query($conn, "SELECT * FROM sanpham  where tenSP like '%$search%' && GIASP>=" .  $_SESSION['from'] . " && GIASP<= " . $_SESSION['to'] . ' && MALOAISP= ' . $_SESSION['loaisp'] . " LIMIT " . $start . "," . $limit);
                }
            } else {
                // BƯỚC 2: TÌM TỔNG SỐ RECORDS
                $result = mysqli_query($conn, "select count(*) as total from sanpham where tenSP like '%$search%' ");
                phantrang($result);

                // Có limit và start rồi thì truy vấn CSDL lấy danh sách sản phẩm
                $result = mysqli_query($conn, "SELECT * FROM sanpham  where tenSP like '%$search%' LIMIT $start, $limit");
            }
            if ($result !== false && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
        ?>
                    <!-- Product and Detail of Product -->
                    <?php include 'components/Product.php' ?>
                <?php
                }
                ?>
                <div class="w3-bar w3-center ">
                    <?php
                    if (isset($_REQUEST['from'])) {
                        // PHẦN HIỂN THỊ PHÂN TRANG
                        // BƯỚC 7: HIỂN THỊ PHÂN TRANG
                        // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                        if ($current_page > 1 && $total_page > 1) {
                            echo '<button style=" color: #fff;border:none;background-color: black"><a href="Search.php?page=' . ($current_page - 1) . '&from=' . $_SESSION['from'] . '&to=' . $_SESSION['to'] . '&loaisp=' . $_SESSION['loaisp']  . '&tukhoa=' . $_SESSION['tukhoa'] . '">Prev</a></button> ';
                        }

                        // Lặp khoảng giữa
                        for ($i = 1; $i <= $total_page; $i++) {
                            // Nếu là trang hiện tại thì hiển thị thẻ span
                            // ngược lại hiển thị thẻ a
                            if ($i == $current_page) {
                                echo '<button style=" color: #fff;border:none;background-color: gray"><span>' . $i . '</span> | ';
                            } else {
                                echo '<button style=" color: #fff;border:none;background-color: black"><a href="Search.php?page=' . $i . '&from=' . $_SESSION['from'] . '&to=' . $_SESSION['to'] . '&loaisp=' . $_SESSION['loaisp']  . '&tukhoa=' . $_SESSION['tukhoa'] . '">' . $i . '</a> </button> ';
                            }
                        }

                        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                        if ($current_page < $total_page && $total_page > 1) {
                            echo '<button style=" color: #fff;border:none;background-color: black"><a href="Search.php?page=' . ($current_page + 1) . '&from=' . $_SESSION['from'] . '&to=' . $_SESSION['to'] . '&loaisp=' . $_SESSION['loaisp']  . '&tukhoa=' . $_SESSION['tukhoa'] . '">Next</a> </button> ';
                        }
                    } else {
                        // PHẦN HIỂN THỊ PHÂN TRANG
                        // BƯỚC 7: HIỂN THỊ PHÂN TRANG
                        // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                        if ($current_page > 1 && $total_page > 1) {
                            echo '<button style=" color: #fff;border:none;background-color: black"><a href="Search.php?page=' . ($current_page - 1) . '&tukhoa=' . $_SESSION['tukhoa'] . '">Prev</a> </button> ';
                        }

                        // Lặp khoảng giữa
                        for ($i = 1; $i <= $total_page; $i++) {
                            // Nếu là trang hiện tại thì hiển thị thẻ span
                            // ngược lại hiển thị thẻ a
                            if ($i == $current_page) {
                                echo '<button style=" color: #fff;border:none;background-color: gray"><span>' . $i . '</span> | ';
                            } else {
                                echo '<button style=" color: #fff;border:none;background-color: black"><a href="Search.php?page=' . $i . '&tukhoa=' . $_SESSION['tukhoa'] . '">' . $i . '</a> </button> ';
                            }
                        }

                        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                        if ($current_page < $total_page && $total_page > 1) {
                            echo '<button style=" color: #fff;border:none;background-color: black"><a href="Search.php?page=' . ($current_page + 1) . '&tukhoa=' . $_SESSION['tukhoa'] . '">Next</a> </button> ';
                        }
                    }
                    ?>
                </div>
                <?php } else {
                echo "
          <p>Product was not found</p>";
            }
        } else if ($_REQUEST['tukhoa'] == "") {
            $search = $_SESSION['tukhoa'] = $_REQUEST['tukhoa'];

            $conn = createDbConnection();
            if (isset($_REQUEST['from'])) {
                $_SESSION['loaisp'] = $_REQUEST['loaisp'];
                $_SESSION['from'] = $_REQUEST['from'];
                $_SESSION['to'] = $_REQUEST['to'];
                if ($_SESSION['from'] == "***") {

                    if ($_SESSION['loaisp'] == 0)
                        $result = mysqli_query($conn, "select count(*) as total from sanpham ");
                    else
                        $result = mysqli_query($conn, "select count(*) as total from sanpham where  maloaiSP=" . $_SESSION['loaisp']);
                    phantrang($result);


                    if ($_SESSION['loaisp'] == 0)
                        $result = mysqli_query($conn, "SELECT * FROM sanpham   LIMIT $start, $limit");
                    else
                        $result = mysqli_query($conn, "SELECT * FROM sanpham  where  MALOAISP=" . $_SESSION['loaisp'] . " LIMIT " . $start . "," . $limit);
                } else if ($_SESSION['from'] == 300) {

                    if ($_SESSION['loaisp'] == 0)
                        $result = mysqli_query($conn, "select count(*) as total from sanpham where giasp>=300   ");
                    else
                        $result = mysqli_query($conn, "select count(*) as total from sanpham where  giasp>=300 &&  MALOAISP=" . $_SESSION['loaisp']);

                    phantrang($result);


                    if ($_SESSION['loaisp'] == 0)
                        $result = mysqli_query($conn, "SELECT * FROM sanpham  where   GIASP>=" .  $_SESSION['from'] . " LIMIT " . $start . "," . $limit);
                    else
                        $result = mysqli_query($conn, "SELECT * FROM sanpham  where  GIASP>=" .  $_SESSION['from'] . ' && MALOAISP= ' . $_SESSION['loaisp'] . " LIMIT " . $start . "," . $limit);
                } else {

                    if ($_SESSION['loaisp'] == 0)
                        $result = mysqli_query($conn, "select count(*) as total from sanpham where  giasp>=" .  $_SESSION['from'] . ' && GIASP<= ' . $_SESSION['to']);
                    else
                        $result = mysqli_query($conn, "select count(*) as total from sanpham where giasp>=" .  $_SESSION['from'] . ' && GIASP<= ' . $_SESSION['to'] . ' && MALOAISP= ' . $_SESSION['loaisp']);

                    phantrang($result);


                    if ($_SESSION['loaisp'] == 0)
                        $result = mysqli_query($conn, "SELECT * FROM sanpham  where GIASP>=" .  $_SESSION['from'] . " && GIASP<= " . $_SESSION['to'] . " LIMIT " . $start . "," . $limit);
                    else
                        $result = mysqli_query($conn, "SELECT * FROM sanpham  where GIASP>=" .  $_SESSION['from'] . " && GIASP<= " . $_SESSION['to'] . ' && MALOAISP= ' . $_SESSION['loaisp'] . " LIMIT " . $start . "," . $limit);
                }
            } else {
                // BƯỚC 2: TÌM TỔNG SỐ RECORDS
                $result = mysqli_query($conn, "select count(*) as total from sanpham  ");
                phantrang($result);

                // Có limit và start rồi thì truy vấn CSDL lấy danh sách sản phẩm
                $result = mysqli_query($conn, "SELECT * FROM sanpham   LIMIT $start, $limit");
            }
            if ($result !== false && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                ?>
                    <!-- Product and Detail of Product -->
                    <?php include 'components/Product.php' ?>
                <?php
                }
                ?>
                <div class="w3-bar w3-center ">
                    <?php
                    if (isset($_REQUEST['from'])) {
                        // PHẦN HIỂN THỊ PHÂN TRANG
                        // BƯỚC 7: HIỂN THỊ PHÂN TRANG
                        // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                        if ($current_page > 1 && $total_page > 1) {
                            echo '<button style=" color: #fff;border:none;background-color: black"><a href="Search.php?page=' . ($current_page - 1) . '&from=' . $_SESSION['from'] . '&to=' . $_SESSION['to'] . '&loaisp=' . $_SESSION['loaisp']  . '&tukhoa=' . $_SESSION['tukhoa'] . '">Prev</a></button> ';
                        }

                        // Lặp khoảng giữa
                        for ($i = 1; $i <= $total_page; $i++) {
                            // Nếu là trang hiện tại thì hiển thị thẻ span
                            // ngược lại hiển thị thẻ a
                            if ($i == $current_page) {
                                echo '<button style=" color: #fff;border:none;background-color: gray"><span>' . $i . '</span> | ';
                            } else {
                                echo '<button style=" color: #fff;border:none;background-color: black"><a href="Search.php?page=' . $i . '&from=' . $_SESSION['from'] . '&to=' . $_SESSION['to'] . '&loaisp=' . $_SESSION['loaisp']  . '&tukhoa=' . $_SESSION['tukhoa'] . '">' . $i . '</a> </button> ';
                            }
                        }

                        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                        if ($current_page < $total_page && $total_page > 1) {
                            echo '<button style=" color: #fff;border:none;background-color: black"><a href="Search.php?page=' . ($current_page + 1) . '&from=' . $_SESSION['from'] . '&to=' . $_SESSION['to'] . '&loaisp=' . $_SESSION['loaisp']  . '&tukhoa=' . $_SESSION['tukhoa'] . '">Next</a> </button> ';
                        }
                    } else {
                        // PHẦN HIỂN THỊ PHÂN TRANG
                        // BƯỚC 7: HIỂN THỊ PHÂN TRANG
                        // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                        if ($current_page > 1 && $total_page > 1) {
                            echo '<button style=" color: #fff;border:none;background-color: black"><a href="Search.php?page=' . ($current_page - 1) . '&tukhoa=' . $_SESSION['tukhoa'] . '">Prev</a> </button> ';
                        }

                        // Lặp khoảng giữa
                        for ($i = 1; $i <= $total_page; $i++) {
                            // Nếu là trang hiện tại thì hiển thị thẻ span
                            // ngược lại hiển thị thẻ a
                            if ($i == $current_page) {
                                echo '<button style=" color: #fff;border:none;background-color: gray"><span>' . $i . '</span> | ';
                            } else {
                                echo '<button style=" color: #fff;border:none;background-color: black"><a href="Search.php?page=' . $i . '&tukhoa=' . $_SESSION['tukhoa'] . '">' . $i . '</a> </button> ';
                            }
                        }

                        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                        if ($current_page < $total_page && $total_page > 1) {
                            echo '<button style=" color: #fff;border:none;background-color: black"><a href="Search.php?page=' . ($current_page + 1) . '&tukhoa=' . $_SESSION['tukhoa'] . '">Next</a> </button> ';
                        }
                    }
                    ?>
                </div>
        <?php } else {
                echo "
          <p>Product was not found</p>";
            }
        } else {
            echo "
        <p>Product was not found</p>
        ";
        }

        ?>


    </div>

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
                    <p><input class="w3-input w3-border" type="text" placeholder="Subject" name="Subject" required>
                    </p>
                    <p><input class="w3-input w3-border" type="text" placeholder="Message" name="Message" required>
                    </p>
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
        // alert(window.location.pathname)
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
</body>

</html>