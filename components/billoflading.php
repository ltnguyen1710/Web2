<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dct119c2";
$con = new mysqli($servername, $username, $password, $dbname);

$sodienthoai =
    $sql = "SELECT maDon,giaDon,ngaydat,userKH,diachinhan,mavandon FROM donhang WHERE sdt ='" . $_REQUEST['sodienthoai'] . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output dữ liệu trên trang
    while ($row = $result->fetch_assoc()) {
        echo "maDon: " . $row["maDon"] . " - giaDon: " . $row["firstname"] . " "
            . $row["lastname"] . "<br>";
    }
}

if ($result = mysqli_query($con, $sql)) {

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