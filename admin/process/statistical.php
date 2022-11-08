<?php $con = createDbConnection();
$sql = "select count(maDon) as daxuly from donhang where tinhtrang='Da xu ly'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$processed = $row['daxuly'];
$sql = "select count(maDon) as chuaxuly from donhang where tinhtrang='Chua xu ly'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$nonprocessed = $row['chuaxuly'];
$sql = "select sum(sanpham.sizeL) as sumofsizeL, sum(sanpham.sizeXL) as sumofsizeXL, loaisanpham.loaiSP from sanpham,loaisanpham where sanpham.maloaiSP = loaisanpham.maloaiSP GROUP BY loaisanpham.maloaiSP";
$result = mysqli_query($con, $sql);
$product = [
    'category' => array(),
    'sizeL' => array(),
    'sizeXL' => array()
];
while ($row = mysqli_fetch_assoc($result)) {
    array_push($product['category'], $row['loaiSP']);
    array_push($product['sizeL'], $row['sumofsizeL']);
    array_push($product['sizeXL'], $row['sumofsizeXL']);
}
?>