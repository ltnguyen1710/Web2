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
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->
<script src="index.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script> -->
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
        width: 20%;
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
        width: 100px;
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
    <!-- Image header -->
    <div class="w3-display-container w3-container">
        <div class="slideshow-container">

            <div class="mySlides fade">

                <img src="Images/ANHNEN/1.jpg" style="width:100%">

            </div>

            <div class="mySlides fade">

                <img src="Images/ANHNEN/2.jpg" style="width:100%">

            </div>

            <div class="mySlides fade">

                <img src="Images/ANHNEN/3.jpg" style="width:100%">

            </div>
            <div class="mySlides fade">

                <img src="Images/ANHNEN/4.jpg" style="width:100%">

            </div>
            <div class="mySlides fade">

                <img src="Images/ANHNEN/5.jpg" style="width:100%">

            </div>
            <div class="mySlides fade">

                <img src="Images/ANHNEN/6.jpg" style="width:100%">

            </div>
            <div class="mySlides fade">

                <img src="Images/ANHNEN/7.jpg" style="width:100%">

            </div>

        </div>

        <br>

        <div style="text-align:center">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
        <div class="w3-display-topleft w3-text-white" style="padding:24px 48px">
            <h1 class="w3-jumbo w3-hide-small">New arrivals</h1>
            <h1 class="w3-hide-large w3-hide-medium">New arrivals</h1>
            <h1 class="w3-hide-small">COLLECTION 2016</h1>
            <p><a href="#jeans" class="w3-button w3-white w3-padding-large w3-large">SHOP NOW</a></p>
        </div>
    </div>

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
    // BƯỚC 2: TÌM TỔNG SỐ RECORDS
    $result = mysqli_query($conn, 'select count(*) as total from sanpham');
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

    ?>
    <!-- Product grid -->
    <div class="w3-row w3-whitescale" id="myTable">
        <?php
        $con = createDBConnection();

        $sql = "SELECT * FROM sanpham LIMIT $start, $limit";

        $result = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <!-- Product and Detail of Product -->
            <?php include 'components/Product.php' ?>

        <?php } ?>

    </div>
    <div class="w3-bar w3-center ">
        <?php
        // PHẦN HIỂN THỊ PHÂN TRANG
        // BƯỚC 7: HIỂN THỊ PHÂN TRANG

        // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
        if ($current_page > 1 && $total_page > 1) {
            echo '<button style=" color: #fff;border:none;background-color: black"><a href="index.php?page=' . ($current_page - 1) . '">Prev</a></button>  ';
        }

        // Lặp khoảng giữa
        for ($i = 1; $i <= $total_page; $i++) {
            // Nếu là trang hiện tại thì hiển thị thẻ span
            // ngược lại hiển thị thẻ a
            if ($i == $current_page) {
                echo '<button style=" color: #fff;border:none;background-color: gray"><span>' . $i . '</span></button>  ';
            } else {
                echo '<button style=" color: #fff;border:none;background-color: black"><a href="index.php?page=' . $i . '">' . $i . '</a></button>  ';
            }
        }

        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
        if ($current_page < $total_page && $total_page > 1) {
            echo '<button style=" color: #fff;border:none;background-color: black"><a href="index.php?page=' . ($current_page + 1) . '">Next</a></button>  ';
        }
        ?>
    </div>
    <?php include 'components/footer.php' ?>

</body>

</html>