<!DOCTYPE html>
<?php
require('login.php');

$loginResult = '';
if (isset($_POST['username'])) {
    $loginResult = "Hi, " . login($_POST['username'], $_POST['psw']);
}
?>
<?php
require('register_submit.php');
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
        font-size: 1.1em;
    }
</style>

<body class="w3-content" style="max-width:1200px">

    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
        <div class="w3-container w3-display-container w3-padding-16">
            <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
            <a href="index.php"><img src="Images/ANHNEN/logocheck.jpg" alt="LOGO" width="40%"></a>
        </div>
        <div class="w3-padding-64 w3-large w3-text-gray" style="font-weight:bold">

            <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align">
                Shirt <i class="fa fa-caret-down"></i>
            </a>
            <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
                <a href="T-shirt.php" class="w3-bar-item w3-button">T-Shirt</a>
                <a href="Hoodie.html" class="w3-bar-item w3-button">Hoodie</a>
                <a href="Sweater.html" class="w3-bar-item w3-button">Sweater</a>
                <a href="Jackets.php" class="w3-bar-item w3-button">Jackets</a>
            </div>

            <a onclick="myAccFunc1()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align">
                Item <i class="fa fa-caret-down"></i>
            </a>
            <div id="demoAcc1" class="w3-bar-block w3-hide w3-padding-large w3-medium">
                <a href="#" class="w3-bar-item w3-button">Chain</a>
                <a href="#" class="w3-bar-item w3-button">Socks</a>
                <a href="#" class="w3-bar-item w3-button">Wallet</a>
            </div>

            <a href="#" class="w3-bar-item w3-white w3-button ">Pants</a>

        </div>
        <a href="#footer" class="w3-bar-item w3-button w3-padding">Contact</a>
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('newsletter').style.display='block'">Newsletter</a>
        <a href="#footer" class="w3-bar-item w3-button w3-padding">Subscribe</a>
    </nav>

    <!-- Top menu on small screens -->
    <header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
        <div class="w3-bar-item w3-wide"><a href="index.php" class="w3-button">CHECKERVIET</div>
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-10 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
    </header>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:250px">

        <!-- Push down content on small screens -->
        <div class="w3-hide-large" style="margin-top:83px"></div>

        <!-- Top header -->

        <header class="w3-container w3-xlarge">
            <p class="w3-topleft"><?= isLogined() ? $loginResult : 'Welcome' ?>


            <p class="w3-right">

                <!-- Account icon -->
                <?php
                if (!isLogined()) {
                ?>
                    <a href="javascript:void(0)" class="w3-bar-item w3-button  w3-right" onclick="w3_open()">
                        <i onclick="document.getElementById('id01').style.display='block'" class="fa fa-user "></i>
                    </a>
                <?php } else { ?>
                    <a href="logout.php" class="w3-bar-item w3-button  w3-right" onclick="w3_open()">
                        <i class="fa fa-sign-out "></i>
                    </a>
                <?php
                }
                ?>

                <!-- Shopping icon -->
                <a href="javascript:void(0)" class="w3-bar-item w3-button  w3-right" onclick="w3_open()">
                    <i onclick="document.getElementById('shoppingcart').style.display='block'" class="fa fa-shopping-cart "></i>
                </a>
            <div class=" w3-modal-find w3-padding-32 w3-left">

                Price
                <select name="price" id="price" style="width: 125px;height: 40px;">
                    <option id="pr1" value="***-"></option>
                    <option id="pr2" value="000-099">0-99 </option>
                    <option id="pr3" value="100-199">100-199</option>
                    <option id="pr4" value="200-299">200-299</option>
                    <option id="pr5" value="300-">>300 </option>
                </select>
                Type
                <select name="loaisp" id="loaisp" style="width: 125px;height: 40px;">
                    <option value=""></option>
                    <option value="1">T-shirt</option>
                    <option value="2">Jacket</option>
                    <option value="3">Hoodie</option>
                    <option value="4">Sweater</option>

                </select>
                <button class="w3-bar-item w3-button  w3-right fa fa-filter" type="submit" name="timkiemnangcao" onclick="reload1()"></button>
            </div>
            <script>
                <?php if (isset($_REQUEST['from'])) {
                ?>
                    var price = "<?= $_REQUEST['from'] ?>" + '-' + "<?= $_REQUEST['to'] ?>";
                    let element = document.getElementById("price");
                    console.log(price);
                    element.value = price;
                <?php
                }
                ?>

                function reload1() {
                    var pri = document.getElementById("price");
                    var loai = document.getElementById("loaisp");
                    var valueprice = pri.value;
                    var from = valueprice.substr(0, 3)
                    var to1 = valueprice.substr(4, 3)
                    var valueloai = loai.value;
                    var tukhoa = document.getElementById("find").value;
                    window.location.href = "Search.php?from=" + from + "&to=" + to1 + "&loaisp=" + valueloai + "&tukhoa=" + tukhoa
                }
            </script>
            <!-- Find icon -->
            <form name="fromTim" method="GET" action="Search.php">
                <!-- Bottom Bar Start -->
                <div class="w3-bar-item  bottom-bar">
                    <div class="w3-modal-find w3-padding-32 w3-right">
                        <div class="search" class="w3-container  ">
                            <button class="w3-bar-item w3-button  w3-right fa fa-search" type="submit" name="timkiem"></button>
                            <input type="text" name="tukhoa" placeholder="Search for names.." title="Type in a name" id="find" value="<?= $_REQUEST['tukhoa'] ?>">
                        </div>
                    </div>
                </div>
            </form>

            <!-- Bottom Bar End -->
            <!-- Shopping -->
            <div id="shoppingcart" class="w3-modal">
                <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width: 900px">

                    <div class="w3-container w3-padding-16 w3-light-grey">
                        <span class=" cart-header ">Cart</span>
                        <span onclick="document.getElementById('shoppingcart').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
                    </div>

                    <div class="cart-row w3-container">
                        <span class="cart-item cart-header cart-column">Items</span>
                        <span class="cart-price cart-header cart-column">Price</span>
                        <span class="cart-quantity cart-header cart-column">Quantity</span>
                    </div>

                    <div class="cart-items w3-container">

                        <div class="cart-row">
                            <div class="cart-item cart-column">
                                <img class="cart-item-image" src="Images/T-SHIRT/2.1.jpg" width="100" height="100">
                                <span class="cart-item-title">BXD - CHECKERBOARD GREEN SHIRT</span>
                            </div>
                            <span class="cart-price cart-column">34.99$</span>
                            <div class="cart-quantity cart-column">
                                <input class="cart-quantity-input" type="number" min='0' value="1">
                                <button class="btn btn-danger" type="button" onclick="alert('Deleted')">Delete</button>
                            </div>
                        </div>

                        <div class="cart-row">

                            <div class="cart-item cart-column">
                                <img class="cart-item-image" src="Images/T-SHIRT/3.1.jpg" width="100" height="100">
                                <span class="cart-item-title">BXD - LOGO TEES/BLACK</span>
                            </div>
                            <span class="cart-price cart-column">21.99$</span>
                            <div class="cart-quantity cart-column">
                                <input class="cart-quantity-input" type="number" min='0' value="2">
                                <button class="btn btn-danger" type="button" onclick="alert('Deleted')">Delete</button>
                            </div>

                        </div>

                        <div class="cart-total">
                            <strong class="cart-total-title">Total Price:</strong>
                            <span class="cart-total-price">78.79$</span>
                        </div>

                    </div>

                    <div class="w3-container w3-border-top w3-padding-24 ">
                        <button onclick="document.getElementById('checkout').style.display='block'" type="button" class="w3-button w3-red w3-transparent w3-right">Buy</button>
                    </div>

                </div>
            </div>

            <!-- Account -->
            <!--login-->

            <div id="id01" class="w3-modal">
                <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

                    <div class="w3-center"><br>
                        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
                        <h1>Log in</h1>
                    </div>

                    <form action='index.php' method="post" class="w3-container">
                        <div class="w3-section">
                            <label><b>User name</b></label>
                            <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter User name" name="username" required value="checker">
                            <label><b>Password</b></label>
                            <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="psw" required value="12345">
                            <input class="w3-button w3-block w3-black w3-section w3-padding" type="submit" value="Log in">
                            <a class="w3-button w3-block w3-gray w3-section w3-padding" onclick="document.getElementById('id02').style.display='block'">Sign up</a>
                            <input class="w3-check w3-margin-top " type="checkbox" checked="checked"> Remember me
                        </div>
                    </form>

                    <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-grey">Cancel</button>
                        <span class="w3-right w3-padding w3-hide-small">Forgot <a href="#">password?</a></span>
                    </div>

                </div>
            </div>

            <!--Sign up-->
            <div id="id02" class="w3-modal w3-padding-24">
                <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

                    <div class="w3-center"><br>
                        <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
                        <h1>Create account</h1>
                    </div>

                    <form class="w3-container" action="index.php" method="POST">
                        <div class="w3-section">

                            <label><b>Full name</b></label>
                            <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Full name" name="fullname" required>
                            <label><b>Phone number</b></label>
                            <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Phone number" name="phone" required>

                            <label><b>Sex: </b></label>
                            Male <input class="" type="radio" name="radsex" required>
                            Female <input class="" type="radio" name="radsex" required>

                            <br>

                            <label><b>Birthday:</b></label>
                            <input type="date" name="bday">

                            <br>
                            <label><b>Email:</b></label>
                            <br>
                            <input class="w3-input w3-border w3-margin-bottom" type="email" name="useremail" placeholder="Enter email">
                            <label><b>User name</b></label>
                            <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter User name" name="username1" required>
                            <label><b>Password</b></label>
                            <input class="w3-input w3-border w3-margin-bottom" type="password" placeholder="Enter Password" name="psw1" required>
                            <label><b>Confirm password</b></label>
                            <input class="w3-input w3-border w3-margin-bottom" type="password" placeholder="Confirm Password" name="repsw" required>

                        </div>


                        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                            <button onclick="document.getElementById('id02').style.display='none'" type="button" class="w3-button w3-grey">Cancel</button>
                            <input class="w3-button  w3-black w3-right" name="submit" value="Submit" href="#" type="Submit" onclick="alert('Sign up successful !')">
                        </div>

                </div>
                </form>
            </div>

            <!--check out-->
            <div id="checkout" class="w3-modal">
                <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

                    <div class="w3-center"><br>
                        <span onclick="document.getElementById('checkout').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
                        <h1>Checkout</h1>
                    </div>

                    <form class="w3-container">
                        <div class="w3-section">
                            <label><b>Adress</b></label>
                            <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter adress" name="adress" required>
                            <label><b>Phone number</b></label>
                            <input class="w3-input w3-border w3-margin-bottom" type="tel" placeholder="Enter phone number" name="tel" required>
                            <label><b>Email:</b></label>
                            <input class="w3-input w3-border w3-margin-bottom" type="email" name="useremail" placeholder="Enter email">
                            <label><b>Nation</b></label>
                            <select name="nation">
                                <option value="">Vietnam</option>
                                <option value="">USA</option>
                                <option value="">UK</option>
                                <option value="">Spain</option>
                            </select>
                            <br>
                            <label><b>Payments</b></label>
                            <select name="nation">
                                <option value="">Credit card</option>
                                <option value="">Cash</option>
                            </select>
                        </div>
                    </form>
                    <div class="cart-total">
                        <strong class="cart-total-title">Total Price:</strong>
                        <span class="cart-total-price">78.79$</span>
                    </div>

                    <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                        <button onclick="document.getElementById('checkout').style.display='none'" type="button" class="w3-button w3-grey">Cancel</button>
                        <button class="w3-button w3-red w3-right" onclick="alert('Buy successfully !'),document.getElementById('checkout').style.display='none',document.getElementById('shoppingcart').style.display='none'">Confirm</button>
                    </div>

                </div>
            </div>
        </header>


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

        ?>
        <!-- Product grid -->
        <div class="w3-row w3-whitescale" id="myTable">

            <?php
            if ($_REQUEST['tukhoa'] != "") {
                $search = $_SESSION['tukhoa'] = $_REQUEST['tukhoa'];

                $conn = createDbConnection();
                if (isset($_REQUEST['from'])) {
                    $_SESSION['loaisp'] = $_REQUEST['loaisp'];
                    $_SESSION['from'] = $_REQUEST['from'];
                    $_SESSION['to'] = $_REQUEST['to'];
                    if ($_SESSION['from'] == "***") {
                        // BƯỚC 2: TÌM TỔNG SỐ RECORDS
                        if ($_SESSION['loaisp'] == "")
                            $result = mysqli_query($conn, "select count(*) as total from sanpham where tenSP like '%$search%' ");
                        else
                            $result = mysqli_query($conn, "select count(*) as total from sanpham where tenSP like '%$search%'&&  MALOAISP=" . $_SESSION['loaisp']);
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
                        if ($_SESSION['loaisp'] == '')
                            $result = mysqli_query($conn, "SELECT * FROM sanpham  where tenSP like '%$search%' LIMIT $start, $limit");
                        else
                            $result = mysqli_query($conn, "SELECT * FROM sanpham  where tenSP like '%$search%' && MALOAISP=" . $_SESSION['loaisp'] . " LIMIT " . $start . "," . $limit);
                    } else if ($_SESSION['from'] == 300) {
                        // BƯỚC 2: TÌM TỔNG SỐ RECORDS
                        if ($_SESSION['loaisp'] == '')
                            $result = mysqli_query($conn, "select count(*) as total from sanpham where giasp>=300 && tenSP like '%$search%' ");
                        else
                            $result = mysqli_query($conn, "select count(*) as total from sanpham where tenSP like '%$search%' && giasp>=300 &&  MALOAISP=" . $_SESSION['loaisp']);

                        $row = mysqli_fetch_assoc($result);
                        $total_records = $row['total'];
                        // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $limit = 2;
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
                        if ($_SESSION['loaisp'] == '')
                            $result = mysqli_query($conn, "SELECT * FROM sanpham  where tenSP like '%$search%' && GIASP>=" .  $_SESSION['from'] . " LIMIT " . $start . "," . $limit);
                        else
                            $result = mysqli_query($conn, "SELECT * FROM sanpham  where tenSP like '%$search%' && GIASP>=" .  $_SESSION['from'] . ' && MALOAISP= ' . $_SESSION['loaisp'] . " LIMIT " . $start . "," . $limit);
                    } else {
                        // BƯỚC 2: TÌM TỔNG SỐ RECORDS
                        if ($_SESSION['loaisp'] == '')
                            $result = mysqli_query($conn, "select count(*) as total from sanpham where tenSP like '%$search%' && giasp>=" .  $_SESSION['from'] . ' && GIASP<= ' . $_SESSION['to']);
                        else
                            $result = mysqli_query($conn, "select count(*) as total from sanpham where tenSP like '%$search%' && giasp>=" .  $_SESSION['from'] . ' && GIASP<= ' . $_SESSION['to'] . ' && MALOAISP= ' . $_SESSION['loaisp']);

                        $row = mysqli_fetch_assoc($result);
                        $total_records = $row['total'];
                        // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $limit = 2;
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
                        if ($_SESSION['loaisp'] == '')
                            $result = mysqli_query($conn, "SELECT * FROM sanpham  where tenSP like '%$search%' && GIASP>=" .  $_SESSION['from'] . " && GIASP<= " . $_SESSION['to'] . " LIMIT " . $start . "," . $limit);
                        else
                            $result = mysqli_query($conn, "SELECT * FROM sanpham  where tenSP like '%$search%' && GIASP>=" .  $_SESSION['from'] . " && GIASP<= " . $_SESSION['to'] . ' && MALOAISP= ' . $_SESSION['loaisp'] . " LIMIT " . $start . "," . $limit);
                    }
                } else {
                    // BƯỚC 2: TÌM TỔNG SỐ RECORDS
                    $result = mysqli_query($conn, "select count(*) as total from sanpham where tenSP like '%$search%' ");
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
                    $result = mysqli_query($conn, "SELECT * FROM sanpham  where tenSP like '%$search%' LIMIT $start, $limit");
                }
                if ($result !== false && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
            ?>

                        <div class="w3-col l3 s6">
                            <div class="w3-container">
                                <div class="w3-display-container">
                                    <img src="<?= $row['hinhanhSP'] ?>" style="width:100%">
                                    <span class="w3-tag w3-display-topleft">Sale</span>
                                    <div class="w3-display-middle w3-display-hover">
                                        <a href="javascript:void(0)" class="w3-bar-item  w3-right w3-white" onclick="showdetail('<?= $row['tenSP'] ?>','<?= $row['giaSP'] ?>','<?= $row['hinhanhSP'] ?>','<?= $row['thongtinSP'] ?>')">
                                            <button class="w3-button w3-black"> Detail <i class=" fa fa-info-circle"></i></button>
                                        </a>
                                    </div>
                                </div>
                                <p><?= $row['tenSP'] ?> <br><b>$<?= $row['giaSP'] ?></b></p>
                            </div>
                        </div>
                        <!--BXD - ALEX OVERPRINT TEES/BLACK detail-->
                        <div id="detail5" class="w3-modal  ">
                            <div class="w3-modal-content  w3-card-4 w3-animate-zoom" style="max-width: 900px">

                                <div class="w3-container w3-padding-16 w3-light-grey">
                                    <span class=" cart-header " id='ten'></span>
                                    <span onclick="document.getElementById('detail5').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
                                </div>

                                <div class="cart-row w3-container">
                                    <span class="cart-item cart-header cart-column">Items</span>
                                    <span class="cart-quantity cart-header cart-column">Infor</span>
                                </div>

                                <div class="cart-items w3-container">

                                    <div class="cart-row">

                                        <div class="cart-item cart-column">
                                            <img class="cart-item-image1" id='hinh' width="400" height="400">
                                        </div>
                                        <div class="cart-quantity cart-column">
                                            <p id='mota'></p>

                                        </div>

                                    </div>


                                    <div class="cart-total">
                                        <strong class="cart-total-title">Total Price:</strong>
                                        <span class="cart-total-price" id='gia1'></span>

                                        <div class="w3-left">
                                            <strong class="cart-total-title">Size</strong>
                                            <select name="size" id="" style="width: 80px;height: 50px;">
                                                <option value="">S</option>
                                                <option value="">M</option>
                                                <option value="">L</option>
                                                <option value="">XL</option>
                                                <option value="">XXL</option>
                                            </select>
                                        </div>

                                    </div>


                                </div>

                                <div class="w3-container w3-border-top w3-padding-24 ">
                                    <button class="w3-button w3-red w3-transparent w3-right" onclick="alert('Added')">Add to cart <i class="fa fa-shopping-cart"></i></button>
                                </div>

                            </div>
                        </div>
            <?php
                    }
                } else {
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
        <div class="w3-bar w3-center ">
            <?php
            if (isset($_REQUEST['from'])) {
                // PHẦN HIỂN THỊ PHÂN TRANG
                // BƯỚC 7: HIỂN THỊ PHÂN TRANG
                // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                if ($current_page > 1 && $total_page > 1) {
                    echo '<a href="Search.php?page=' . ($current_page - 1) . '&from=' . $_SESSION['from'] . '&to=' . $_SESSION['to']. '&loaisp=' . $_SESSION['loaisp']  . '&tukhoa=' . $_SESSION['tukhoa'] . '">Prev</a> | ';
                }

                // Lặp khoảng giữa
                for ($i = 1; $i <= $total_page; $i++) {
                    // Nếu là trang hiện tại thì hiển thị thẻ span
                    // ngược lại hiển thị thẻ a
                    if ($i == $current_page) {
                        echo '<span>' . $i . '</span> | ';
                    } else {
                        echo '<a href="Search.php?page=' . $i . '&from=' . $_SESSION['from'] . '&to=' . $_SESSION['to']. '&loaisp=' . $_SESSION['loaisp']  . '&tukhoa=' . $_SESSION['tukhoa'] . '">' . $i . '</a> | ';
                    }
                }

                // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                if ($current_page < $total_page && $total_page > 1) {
                    echo '<a href="Search.php?page=' . ($current_page + 1) . '&from=' . $_SESSION['from'] . '&to=' . $_SESSION['to']. '&loaisp=' . $_SESSION['loaisp']  . '&tukhoa=' . $_SESSION['tukhoa'] . '">Next</a> | ';
                }
            } else {
                // PHẦN HIỂN THỊ PHÂN TRANG
                // BƯỚC 7: HIỂN THỊ PHÂN TRANG
                // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                if ($current_page > 1 && $total_page > 1) {
                    echo '<a href="Search.php?page=' . ($current_page - 1) . '&tukhoa=' . $_SESSION['tukhoa'] . '">Prev</a> | ';
                }

                // Lặp khoảng giữa
                for ($i = 1; $i <= $total_page; $i++) {
                    // Nếu là trang hiện tại thì hiển thị thẻ span
                    // ngược lại hiển thị thẻ a
                    if ($i == $current_page) {
                        echo '<span>' . $i . '</span> | ';
                    } else {
                        echo '<a href="Search.php?page=' . $i . '&tukhoa=' . $_SESSION['tukhoa'] . '">' . $i . '</a> | ';
                    }
                }

                // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                if ($current_page < $total_page && $total_page > 1) {
                    echo '<a href="Search.php?page=' . ($current_page + 1) . '&tukhoa=' . $_SESSION['tukhoa'] . '">Next</a> | ';
                }
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

    <script src="IMGDEMO/jquery-2.1.4.min.js"></script>
</body>

</html>