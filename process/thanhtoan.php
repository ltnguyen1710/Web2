<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dct119c2";
$con = new mysqli($servername, $username, $password, $dbname);
$sql = sprintf(
    "INSERT INTO donhang(giaDon,soluongMua,tinhtrang,ngaydat,userKH,thanhtoan,diachinhan) VALUES ('%s','%s','Chua xu ly','%s','%s','%s','%s')",
    $_REQUEST['totalprice'],
    $_REQUEST['soluongSP'],
    date('Y-m-d'),
    $_REQUEST['userKH'],
    $_REQUEST['thanhtoan'],
    $_REQUEST['diachi']
);
$soluongSP = $_REQUEST['soluongSP'];
$con->query($sql);
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
    $ten = "ten".$i;
    $hinhanh = "hinhanh".$i;
    $soluong = "soluong".$i;
    $gia = "gia".$i;
    $size = "size".$i;
    $data['ten'][$i]= $_REQUEST[$ten];
    $data['hinhanh'][$i]= $_REQUEST[$hinhanh];
    $data['soluong'][$i]= $_REQUEST[$soluong];
    $data['gia'][$i]= $_REQUEST[$gia];
    $data['size'][$i]= $_REQUEST[$size];
}
var_dump($data);
//them vao database
for ($i = 0; $i < $soluongSP; $i++) {
    $sql = sprintf("SELECT maSP FROM sanpham WHERE tenSP='%s'", $data['ten'][$i]);
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    $masp = $row['maSP'];
    $sql = sprintf("SELECT maDon FROM donhang 
                    ORDER BY maDon DESC 
                     LIMIT 1;");
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    $madon=$row['maDon'];
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
    $sql = sprintf("UPDATE sanpham set size".$data['size'][$i]."=size".$data['size'][$i]."-'%s' WHERE tenSP='%s'",$data['soluong'][$i], $data['ten'][$i]);
    $con->query($sql);        
}
unset($_SESSION['cart']);
$con->close();
exit();

?>
<?php
if(isset($_GET['thanhtoan']) == 'paypal'){
    $cart_payment ='paypal';
    $userKH = $_SESSION['username'];
    // lay id thong tin van chuyen
    $sql_get_vanchuyen = mysqli_query($mysqli,"SELECT * FROM tbl_shipping WHERE id_dangky = '$userKH' LIMIT 1");
    $row_get_vanchuyen =mysqli_fetch_array($sql_get_vanchuyen);
    $id_shipping = $row_get_vanchuyen['id_shipping'];
    //insert vào đơn hàng
    $insert_cart = "INSERT INTO cart(userKH,code_cart,cart_status,cart_date,cart_payment,cart_shipping) VALUE ('".$userKH."','".
        $code_order."',1,'".$now."','".$cart_payment."','".$id_shipping."')";
    
        $cart_query = mysqli_query($mysqli,$insert_cart);
        // them don hang chi tiet
        foreach($_SESSION['cart'] as $key => $value){
            $id_sanpham = $value['id'];
            $soluong = $value['soluong'];
            $insert_order_details = "INSERT INTO tbl_Cart_details(id_sanpham,code_cart,soluongmua) VALUE('".$id_sanpham."','".$code_order."','".$soluong."')";
            mysqli_query($mysqli,$insert_order_details);
        }
}
if($cart_query){
    echo '<h3> Giao dịch thành công </h3>';
}
?>
