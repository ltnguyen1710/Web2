<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dct119c2";
$con = new mysqli($servername, $username, $password, $dbname);
if (isset($_REQUEST['madon'])) {
    $sql = "UPDATE donhang SET mavandon='" . $_REQUEST['mavandon'] . "' WHERE madon='" . $_REQUEST['madon'] . "'";
    mysqli_query($con, $sql);
    sleep(1);
    echo '<script>window.location.href = "../index.php"</script>';
} else {
    $sql = sprintf(
        "INSERT INTO donhang(giaDon,soluongMua,tinhtrang,ngaydat,userKH,Hoten,sdt,thanhtoan,diachinhan) 
        VALUES ('%s','%s','Chua xu ly','%s','%s','%s','%s','%s','%s')",
        $_REQUEST['totalprice'],
        $_REQUEST['soluongSP'],
        date('Y-m-d'),
        $_REQUEST['userKH'],
        $_REQUEST['Hoten'],
        $_REQUEST['sdt'],
        $_REQUEST['thanhtoan'],
        $_REQUEST['diachi'],
    );
    $soluongSP = $_REQUEST['soluongSP'];
    $con->query($sql);
    //xu ly voucher
    if (isset($_REQUEST['magiam'])) {
        if ($_REQUEST['magiam'] !== "") {
            $sql = "UPDATE magiamgia SET soluong=soluong-1 WHERE magiam='" . $_REQUEST['magiam'] . "'";
            $con->query($sql);
        }
    }
    //khoi tao mang
    $data = [
        'ten' => array(),
        'hinhanh' => array(),
        'soluong' => array(),
        'size' => array(),
        'gia' => array()
    ];

    //them san pham vao mang
    for ($i = 0; $i < $soluongSP; $i++) {
        $ten = "ten" . $i;
        $hinhanh = "hinhanh" . $i;
        $soluong = "soluong" . $i;
        $gia = "gia" . $i;
        $size = "size" . $i;
        $data['ten'][$i] = $_REQUEST[$ten];
        $data['hinhanh'][$i] = $_REQUEST[$hinhanh];
        $data['soluong'][$i] = $_REQUEST[$soluong];
        $data['gia'][$i] = $_REQUEST[$gia];
        $data['size'][$i] = $_REQUEST[$size];
    }
    $ma = [];
    $madonhang;
    //them vao database
    for ($i = 0; $i < $soluongSP; $i++) {
        $sql = sprintf("SELECT maSP FROM sanpham WHERE tenSP='%s'", $data['ten'][$i]);
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        $masp = $row['maSP'];
        $ma[$i] = $masp;
        $sql = sprintf("SELECT maDon FROM donhang 
                        ORDER BY maDon DESC 
                         LIMIT 1;");
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        $madon = $row['maDon'];
        $madonhang = $madon;
        $sql = sprintf(
            "INSERT INTO chitiethoadon(maDon,maSP,tenSP,userKH,soluong,gia,size) VALUES ('%s','%s','%s','%s','%s','%s','%s')",
            $madon,
            $masp,
            $data['ten'][$i],
            $_REQUEST['userKH'],
            $data['soluong'][$i],
            $data['gia'][$i],
            $data['size'][$i]
        );
        $con->query($sql);
        $sql = sprintf("UPDATE sanpham set size" . $data['size'][$i] . "=size" . $data['size'][$i] . "-'%s' WHERE tenSP='%s'", $data['soluong'][$i], $data['ten'][$i]);
        $con->query($sql);
    }
    unset($_SESSION['cart']);
}
?>
<script>
    var mang = [];
    var code = [];
    var name1 = [];
    var quantity = [];
    var price = [];


    code = <?php echo json_encode($ma); ?>;
    name1 = <?php echo json_encode($data['ten']); ?>;
    quantity = <?php echo json_encode($data['soluong']); ?>;
    price = <?php echo json_encode($data['gia']); ?>;
    for (var i = 0; i < code.length; i++) {
        var obj = {
            name: name1[i],
            code: code[i],
            quantity: parseInt(quantity[i]),
            price: parseInt(price[i]),
        }
        mang = [...mang, obj];
    }
    var myHeaders = new Headers();
    myHeaders.append("Token", "8b5943c7-5cbc-11ed-889d-7acb4388671e");
    myHeaders.append("ShopId", "120554 - 0938243764");
    myHeaders.append("Content-Type", "application/json");

    var raw = JSON.stringify({
        "payment_type_id": 2,
        "note": "<?= $_REQUEST['Hoten'] ?>, <?= $_REQUEST['sdt'] ?>,<?= $_REQUEST['diachi'] ?> ",
        "required_note": "KHONGCHOXEMHANG",
        "from_name": "CheckerViet",
        "from_phone": "0909999999",
        "from_address": "273 An Dương Vương",
        "from_ward_name": "Phường 3",
        "from_district_name": "Quận 5",
        "from_province_name": "TP Hồ Chí Minh",
        "to_name": "CheckerViet ",
        "to_phone": "0909999999",
        "to_address": "273 An Dương Vương",
        "to_ward_name": "Phường 3",
        "to_district_name": "Quận 5",
        "to_province_name": "TP Hồ Chí Minh",
        "cod_amount": 200000,
        "weight": 200,
        "length": 1,
        "width": 19,
        "height": 10,
        "deliver_station_id": null,
        "service_id": 0,
        "service_type_id": 2,
        "coupon": null,
        "items": mang

    });
    var requestOptions = {
        method: 'POST',
        headers: myHeaders,
        body: raw,
        redirect: 'follow'
    };

    async function createOrder() {
        await fetch("https://dev-online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/create", requestOptions)
            .then(response => response.text())
            .then(result => {
                // console.log(result)
                const data = JSON.parse(result)
                console.log(data.data.order_code)


                window.location.href = "thanhtoan.php?madon=" + <?php echo $madonhang; ?> + `&mavandon=${data.data.order_code}`
            })
            .catch(error => console.log('error', error));
    }
    createOrder()
    // window.location.href = "../index.php";
</script>


<?php $con->close();
exit(); ?>