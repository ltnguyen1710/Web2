<?php include 'components/header.php'; ?>
<?php include 'process/product.php';?>
<?php
if (isLoginedAdmin()) {
?>

    <body class="w3-content" style="max-width:1200px">

       <?php include 'components/nav.php'; ?>
            <div class="w3-container ">

                <form class=" " onchange="reloadadmin()">
                    <div class="w3-row">
                        <!--Add button-->
                        <div class="w3-col s6">
                            <button type="button" class=" w3-button w3-border " style="background-color: DodgerBlue;" id="nutthemsanpham" onclick="document.getElementById('themsp').style.display='block',themsp()">&#43; Add
                                product</a></button>
                        </div>
                        <input class="w3-input w3-col w3-border " type="text" id="textOrder" name="searchText" style="width:35%" placeholder="Type Product ID or Productname" value="<?php
                                                                                                                                                                                        echo isset($_REQUEST['searchText']) ? $_REQUEST['searchText'] : "";
                                                                                                                                                                                        ?>">
                        <button class="button w3-button w3-col w3-right" style="width:15%" onclick="reloadadmin()">Search</button>
                    </div>
                </form>
                <script>
                    function reloadadmin() {
                        var text = document.getElementById('textOrder').value
                        window.location.href = "admin.php?select=" + valuecheck + "&searchText=" + text
                    }
                </script>


            </div>
            <br>

            <!--insert product-->
            <div id="themsp" class="w3-modal">
                <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

                    <div class="w3-center"><br>
                        <span onclick="document.getElementById('themsp').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>

                    </div>

                    <form class="w3-container" id="f7" action="Productmanagement.php" method="post" onsubmit="" enctype="multipart/form-data">
                        <ul>
                            <li>
                                <b><label for="name">Enter name of product</label></b>
                                <input class="w3-input w3-input w3-border w3-margin-bottom " type="text" id="tenSP" name="name" maxlength="100" required>
                            </li>
                            <li>
                                <b><label for="email">Enter price of product</label></b>
                                <input class="w3-input w3-input w3-border w3-margin-bottom " type="number" id="giaSP" min="1" name="gia" maxlength="100" required>
                            </li>
                            <li>
                                <b><label for="url">New image</label></b><br>
                                <input class="w3-margin-bottom " type="file" name="myFile" id="myFile" onchange="return fileValidation()" required>
                                <img src="" alt="" style="width:100px" id="imagehere">
                            </li>
                            <li>
                                <b><label for="bio">Description</label></b>
                                <textarea class="w3-input w3-input w3-border w3-margin-bottom " id="bioo" name="bio" onkeyup="adjust_textarea(this)"></textarea>
                            </li>
                            <li>
                                <b><label for="bio">Type of product</label></b>
                                <select name="typeSP" style="width: 120px;height: 30px;" required>
                                    <?php $conn = createDBConnection();
                                    $result = mysqli_query($conn, "Select * from loaisanpham");
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <option value="<?php echo $row['loaiSP'] ?>"><?php echo $row['loaiSP'] ?></option>

                                    <?php } ?>
                                </select>
                                </select>
                            </li>
                            <li>
                                <b><label for="bio">Quantity of product</label></b>
                                <br>
                                <label for="bio">Size L</label>
                                <input class="w3-input w3-input w3-border w3-margin-bottom " type="number" maxlength="100" min="1" name="sizeL" required>
                                <label for="bio">Size XL</label>
                                <input class="w3-input w3-input w3-border w3-margin-bottom " type="number" maxlength="100" min="1" name="sizeXL" required>
                            </li>
                            <li>
                                <input class="w3-button w3-gray" type="submit" value="Insert" name="Insert" onclick="them()">
                            </li>
                        </ul>
                    </form>

                </div>
            </div>
            <!--Fix product-->
            <div id="suasp" class="w3-modal">
                <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

                    <div class="w3-center"><br>
                        <span onclick="document.getElementById('suasp').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>

                    </div>

                    <form class="w3-container " id="f77" action="Productmanagement.php" method="post" enctype="multipart/form-data">
                        <ul>
                            <input type="hidden" id="oldname" name="oldname" required>
                            <li>

                                <b><label>Name:</label></b>

                                <input class="w3-input w3-input w3-border w3-margin-bottom " id="ten" name="ten" type="text" maxlength="100" required>
                            </li>
                            <li>
                                <b><label>Price:</label></b>

                                <input class="w3-input w3-input w3-border w3-margin-bottom " id="gia1" name="gia1" min="1" type="number" maxlength="100" required>

                            </li>
                            <li>
                                <b><span>Image:</span></b> <br>
                                <input class="w3-margin-bottom " id="hinh" name="hinh" type="file" onchange="return fileValidation1()">
                                <img src="" alt="" style="width:100px" id="imagehere1">
                            </li>


                            <li>
                                <b><label>Description</label></b>

                                <textarea class="w3-input w3-input w3-border w3-margin-bottom " id="mota" name="mota" onkeyup="adjust_textarea(this)"></textarea>

                            </li>
                            <li>
                                <b><label for="bio">Type of product</label></b>
                                <select name="loaiSP" id="loaiSP" style="width: 120px;height: 30px;" required>
                                    <?php $conn = createDBConnection();
                                    $result = mysqli_query($conn, "Select * from loaisanpham");
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <option value="<?php echo $row['loaiSP'] ?>"><?php echo $row['loaiSP'] ?></option>

                                    <?php } ?>
                                </select>
                            </li>
                            <li>
                                <b><label for="bio">Quantity of product</label></b>
                                <br>
                                <label for="bio">Size L</label>
                                <input class="w3-input w3-input w3-border w3-margin-bottom " id="sizeL" type="number" maxlength="100" min="1" name="sizeL" required>
                                <label for="bio">Size XL</label>
                                <input class="w3-input w3-input w3-border w3-margin-bottom " id="sizeXL" type="number" maxlength="100" min="1" name="sizeXL" required>
                            </li>
                            <li>
                                <input class="w3-button w3-gray" type="submit" value="Update" name="Update">
                                <input class="w3-button w3-gray" type="submit" name="Delete" onclick="return xoasp()" value="Delete">
                            </li>
                    </form>

                </div>
            </div>
            <!-------------- Phan trang--------------->
            <?php
            $conn = createDbConnection();
            // BƯỚC 2: TÌM TỔNG SỐ RECORDS
            if (isset($_REQUEST['searchText'])) {
                $searchText =  $_REQUEST['searchText'];
                $sql = 'select count(*) as total from sanpham where tenSP like "%' . $searchText . '%"';
            } else {
                $sql = 'select count(*) as total from sanpham';
            }

            $result = mysqli_query($conn, $sql);
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
            $result = mysqli_query($conn, "SELECT * FROM sanpham LIMIT $start, $limit");
            ?>

            <div class="w3-row w3-whitescale">
                <?php
                $conn = createDBConnection();
                if (isset($_REQUEST['searchText'])) {
                    $sql = "SELECT * FROM sanpham WHERE tenSP LIKE '%$searchText%' LIMIT $start, $limit";
                } else {
                    $sql = "SELECT * FROM sanpham LIMIT $start, $limit";
                }
                if ($result = mysqli_query($conn, $sql)) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $sql1 = "SELECT loaiSP FROM loaisanpham WHERE maloaiSP='" . $row['maloaiSP'] . "'";
                        $result1 = $conn->query($sql1);
                        $row1 = $result1->fetch_assoc();
                ?>

                        <div class="w3-col l3 s6">
                            <div class="w3-container">
                                <div class="w3-display-container">
                                    <img src="../Images/T-shirt/<?= $row['hinhanhSP'] ?>" style="width:200px">
                                    <span class="w3-tag w3-display-topleft">New</span>
                                </div>
                                <p><?= $row['tenSP'] ?><br><b>$ <?= $row['giaSP'] ?></b></p>
                                <a href="javascript:void(0)" class="w3-bar-item w3-left  " onclick="w3_open()">
                                    <p><button class="w3-button w3-border" style="background-color: black; color: white" onclick="document.getElementById('suasp').style.display='block',suasp('<?= $row['tenSP'] ?>','<?= $row['giaSP'] ?>','../Images/T-shirt/<?= $row['hinhanhSP'] ?>','<?= $row['thongtinSP'] ?>','<?= $row1['loaiSP'] ?>','<?= $row['sizeL'] ?>','<?= $row['sizeXL'] ?>')">Update and Delete
                                        </button>
                                    </p>
                                </a>

                            </div>
                        </div>

                <?php
                    }
                }
                ?>
            </div>
            <div class="w3-bar w3-center ">
                <?php
                // PHẦN HIỂN THỊ PHÂN TRANG
                // BƯỚC 7: HIỂN THỊ PHÂN TRANG
                $text = isset($_REQUEST['searchText']) ? $_REQUEST['searchText'] : "";
                // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                if ($current_page > 1 && $total_page > 1) {
                    echo '<button style=" color: #fff;border:none;background-color: black"><a href="Productmanagement.php?page=' . ($current_page - 1) . '&searchText=' . $text . '">Prev</a></button>  ';
                }

                // Lặp khoảng giữa
                for ($i = 1; $i <= $total_page; $i++) {
                    // Nếu là trang hiện tại thì hiển thị thẻ span
                    // ngược lại hiển thị thẻ a
                    if ($i == $current_page) {
                        echo '<button style=" color: #fff;border:none;background-color: gray"><span>' . $i . '</span></button>  ';
                    } else {
                        echo '<button style=" color: #fff;border:none;background-color: black"><a href="Productmanagement.php?page=' . $i . '&searchText=' . $text . '">' . $i . '</a></button> ';
                    }
                }

                // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                if ($current_page < $total_page && $total_page > 1) {
                    echo '<button style=" color: #fff;border:none;background-color: black"><a href="Productmanagement.php?page=' . ($current_page + 1) . '&searchText=' . $text . '">Next</a></button>   ';
                }
                ?>
            </div>
            <br>
            <!-------------- Phan trang--------------->
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

    </body>
<?php } else {
    echo '<script>window.location.replace("/WEB2/admin")</script>';
} ?>

</html>