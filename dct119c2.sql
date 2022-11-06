-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 05, 2022 lúc 03:08 PM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dct119c2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `userAD` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `passAD` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`userAD`, `passAD`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `maDon` int(30) NOT NULL,
  `maSP` int(30) NOT NULL,
  `tenSP` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `userKH` varchar(64) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `size` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`maDon`, `maSP`, `tenSP`, `userKH`, `soluong`, `gia`, `size`) VALUES
(21, 1, 'tee1 summers', 'ha', 1, 390, 'Array'),
(22, 1, 'tee1 summers', 'ha', 1, 390, 'Array'),
(23, 1, 'tee1 summers', 'ha', 1, 390, '[object HT'),
(24, 1, 'tee1 summers', 'ha', 1, 390, 'L'),
(24, 3, 'tee101 summers', 'ha', 2, 390, 'XL'),
(24, 4, 'tee102 summers', 'ha', 1, 390, 'L'),
(25, 6, 'tee104 summers', 'ha', 1, 150, 'L'),
(26, 7, 'tee105 summers', 'ha', 1, 150, 'L');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `maDon` int(30) NOT NULL,
  `giaDon` int(30) NOT NULL,
  `soluongMua` int(30) NOT NULL,
  `tinhtrang` varchar(64) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ngaydat` date NOT NULL,
  `userKH` varchar(64) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Hoten` varchar(20) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `sdt` varchar(15) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `thanhtoan` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `diachinhan` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `mavandon` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`maDon`, `giaDon`, `soluongMua`, `tinhtrang`, `ngaydat`, `userKH`, `Hoten`, `sdt`, `thanhtoan`, `diachinhan`, `mavandon`) VALUES
(127, 1, 1, 'Da xu ly', '2022-11-05', 'ha', 'le nguyen', '0939635455', 'paypal', '273 An Duong Vuong', ''),
(128, 1, 1, 'Chua xu ly', '2022-11-05', 'ha', 'le nguyen', '0939635455', 'paypal', '273 An Duong Vuong', 'LLGANK'),
(129, 1, 1, 'Chua xu ly', '2022-11-05', 'ha', 'le nguyen', '0939635455', 'paypal', '273 An Duong Vuong', 'LLGANW');

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `userKH` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `passKH` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `sdt` varchar(15) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `hoTen` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`userKH`, `passKH`, `sdt`, `hoTen`) VALUES
('ha', '123', '0939635455', 'le nguyen'),
('ha45', '123456', '0923456789', 'le trung nguyen'),
('nghiameow', 'nghiameow', '0339941057', 'nguyen huu nghia'),
('nhilele', '123456', '0797911332', 'nhi le '),
('nhokvlkkk', '123456', '0765038968', 'Đặng Ngọc Khang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `maloaiSP` int(30) NOT NULL,
  `loaiSP` varchar(64) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`maloaiSP`, `loaiSP`) VALUES
(1, 'Tee'),
(2, 'Jacket');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `magiamgia`
--

CREATE TABLE `magiamgia` (
  `magiam` varchar(20) NOT NULL,
  `soluong` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `value` int(10) NOT NULL,
  `dieukienapdung` int(11) NOT NULL,
  `ngaybatdau` date NOT NULL,
  `ngayketthuc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `magiamgia`
--

INSERT INTO `magiamgia` (`magiam`, `soluong`, `type`, `value`, `dieukienapdung`, `ngaybatdau`, `ngayketthuc`) VALUES
('freeship10', 100, 'percent', 10, 200, '2022-10-05', '2022-11-04'),
('freeship100', 2, 'cash', 100, 500, '2022-10-05', '2022-11-05'),
('freeship30', 100, 'cash', 30, 300, '2022-10-05', '2022-12-05'),
('freeship55', 2, 'percent', 55, 200, '2022-11-06', '2022-12-06'),
('voucher100', 100, 'cash', 100, 500, '2022-10-05', '2022-12-05'),
('voucher50', 100, 'percent', 50, 500, '2022-10-05', '2022-12-05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `maSP` int(30) NOT NULL,
  `maloaiSP` int(11) NOT NULL,
  `thongtinSP` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `tenSP` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `giaSP` int(11) NOT NULL,
  `hinhanhSP` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `sizeL` int(11) DEFAULT NULL,
  `sizeXL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`maSP`, `maloaiSP`, `thongtinSP`, `tenSP`, `giaSP`, `hinhanhSP`, `sizeL`, `sizeXL`) VALUES
(1, 1, 'The quality of the product is guaranteed', 'tee1 summers', 390, '1.1.jpg', 1, 3),
(2, 1, 'The quality of the product is guaranteed', 'tee100 summers', 390, '10.1.jpg', 10, 30),
(3, 1, 'The quality of the product is guaranteed', 'tee101 summers', 390, '11.1.jpg', 10, 28),
(4, 1, 'The quality of the product is guaranteed', 'tee102 summers', 390, '12.1.jpg', 9, 30),
(5, 1, 'The quality of the product is guaranteed', 'tee103 summers', 150, '13.1.jpg', 10, 30),
(6, 1, 'The quality of the product is guaranteed', 'tee104 summers', 150, '14.1.jpg', 9, 30),
(7, 1, 'The quality of the product is guaranteed', 'tee105 summers', 150, '15.1.jpg', 9, 30),
(8, 1, 'The quality of the product is guaranteed', 'tee106 summers', 150, '16.1.jpg', 10, 30),
(9, 1, 'The quality of the product is guaranteed', 'tee107 summers', 150, '17.1.jpg', 10, 30),
(10, 1, 'The quality of the product is guaranteed', 'tee108 summers', 150, '18.1.jpg', 10, 30),
(11, 1, 'The quality of the product is guaranteed', 'tee109 sping', 150, '19.1.jpg', 10, 30),
(12, 1, 'The quality of the product is guaranteed', 'tee110 sping', 150, '20.1.jpg', 10, 30),
(13, 1, 'The quality of the product is guaranteed', 'tee111 sping', 390, '21.1.jpg', 10, 30),
(14, 1, 'The quality of the product is guaranteed', 'tee112 sping', 390, '22.1.jpg', 10, 30),
(15, 1, 'The quality of the product is guaranteed', 'tee113 sping', 275, '23.1.jpg', 10, 30),
(16, 1, 'The quality of the product is guaranteed', 'tee114 sping', 275, '10.1.jpg', 10, 30),
(17, 1, 'The quality of the product is guaranteed', 'tee115 sping', 275, '11.1.jpg', 10, 30),
(18, 1, 'The quality of the product is guaranteed', 'tee116 sping', 275, '12.1.jpg', 10, 30),
(19, 1, 'The quality of the product is guaranteed', 'tee117 winter', 275, '13.1.jpg', 10, 30),
(20, 1, 'The quality of the product is guaranteed', 'tee118 winter', 275, '14.1.jpg', 10, 30),
(21, 1, 'The quality of the product is guaranteed', 'tee119 winter', 275, '15.1.jpg', 10, 30),
(22, 1, 'The quality of the product is guaranteed', 'tee120 winter', 275, '16.1.jpg', 10, 30),
(23, 1, 'The quality of the product is guaranteed', 'tee121 winter', 275, '17.1.jpg', 10, 30),
(24, 1, 'The quality of the product is guaranteed', 'tee122 winter', 275, '18.1.jpg', 10, 30),
(25, 1, 'The quality of the product is guaranteed', 'tee123 winter', 155, '19.1.jpg', 10, 30),
(26, 1, 'The quality of the product is guaranteed', 'tee124 winter', 155, '21.1.jpg', 10, 30),
(27, 1, 'The quality of the product is guaranteed', 'tee125 winter', 155, '7.1.jpg', 10, 30),
(28, 1, 'The quality of the product is guaranteed', 'tee126 winter', 155, '8.1.jpg', 10, 30),
(29, 1, 'The quality of the product is guaranteed', 'jacket100 summers', 155, 'jk1.jpg', 10, 30),
(30, 1, 'The quality of the product is guaranteed', 'jacket101 summers', 155, 'jk1.jpg', 10, 30),
(31, 1, 'The quality of the product is guaranteed', 'jacket102 summers', 155, 'jk1.jpg', 10, 30),
(32, 1, 'The quality of the product is guaranteed', 'jacket103 summers', 155, 'jk10.jpg', 10, 30),
(33, 1, 'The quality of the product is guaranteed', 'jacket104 summers', 155, 'jk10.jpg', 10, 30),
(34, 1, 'The quality of the product is guaranteed', 'jacket105 summers', 155, 'jk10.jpg', 10, 30),
(35, 1, 'The quality of the product is guaranteed', 'jacket106 summers', 155, 'jk10.jpg', 10, 30),
(36, 1, 'The quality of the product is guaranteed', 'jacket107 summers', 155, 'jk10.jpg', 10, 30),
(37, 1, 'The quality of the product is guaranteed', 'jacket108 summers', 155, 'jk2.jpg', 10, 30),
(38, 1, 'The quality of the product is guaranteed', 'jacket109 sping', 275, 'jk2.jpg', 10, 30),
(39, 1, 'The quality of the product is guaranteed', 'jacket110 sping', 275, 'jk9.jpg', 10, 30),
(40, 1, 'The quality of the product is guaranteed', 'jacket111 sping', 275, 'jk9.jpg', 10, 30),
(41, 1, 'The quality of the product is guaranteed', 'jacket112 sping', 275, 'jk3.jpg', 10, 30),
(42, 1, 'The quality of the product is guaranteed', 'jacket113 sping', 275, 'jk3.jpg', 10, 30),
(43, 1, 'The quality of the product is guaranteed', 'jacket114 sping', 275, 'jk8.jpg', 10, 30),
(44, 1, 'The quality of the product is guaranteed', 'jacket115 sping', 275, 'jk8.jpg', 10, 30),
(45, 1, 'The quality of the product is guaranteed', 'jacket116 sping', 275, 'jk8.jpg', 10, 30),
(46, 1, 'The quality of the product is guaranteed', 'jacket117 winter', 150, 'jk4.jpg', 10, 30),
(47, 1, 'The quality of the product is guaranteed', 'jacket118 winter', 150, 'jk4.jpg', 10, 30),
(48, 1, 'The quality of the product is guaranteed', 'jacket119 winter', 150, 'jk4.jpg', 10, 30),
(49, 1, 'The quality of the product is guaranteed', 'jacket120 winter', 150, 'jk7.jpg', 10, 30),
(50, 1, 'The quality of the product is guaranteed', 'jacket121 winter', 150, 'jk7.jpg', 10, 30),
(51, 1, 'The quality of the product is guaranteed', 'jacket122 winter', 150, 'jk5.jpg', 10, 30),
(52, 1, 'The quality of the product is guaranteed', 'jacket123 winter', 150, 'jk5.jpg', 10, 30),
(53, 1, 'The quality of the product is guaranteed', 'jacket124 winter', 150, 'jk6.jpg', 10, 30),
(54, 1, 'The quality of the product is guaranteed', 'jacket125 winter', 75, 'jk6.jpg', 10, 30),
(55, 1, 'The quality of the product is guaranteed', 'jacket126 winter', 75, 'jk6.jpg', 10, 30),
(65, 1, 'Fresh', 'tee3 autumn', 39, '20.1.jpg', 2, 3),
(66, 1, 'The quality of the product is guaranteed', 'tee4 spring', 29, '17.1.jpg', 2, 3),
(67, 2, 'Comfortable', 'jacket1 sping', 99, 'jk1.jpg', 2, 3),
(68, 2, 'The quality of the product is guaranteed', 'jacket2 autumn', 890, 'jk2.jpg', 2, 3),
(69, 2, 'The quality of the product is guaranteed', 'jacket3 winter', 129, 'jk3.jpg', 2, 3),
(70, 2, 'Adorable', 'jacket4 spring', 109, 'jk4.jpg', 2, 3),
(71, 1, 'Beatiful', 'tee5 spring', 35, '4.1.jpg', 2, 3),
(72, 2, 'The quality of the product is guaranteed', 'jacket5 winter', 119, 'jk5.jpg', 2, 3),
(73, 1, 'The quality of the product is guaranteed', 'tee6 autumn', 69, '7.1.jpg', 2, 3),
(74, 1, 'Cute', 'tee7 summer', 49, '22.1.jpg', 2, 3),
(75, 2, 'Relaxing', 'jacket6 summer', 990, 'jk6.jpg', 2, 3),
(76, 2, 'The quality of the product is guaranteed', 'jacket7 autumn', 89, 'jk7.jpg', 2, 3),
(77, 1, 'Catchy', 'tee8 spring', 79, '23.1.jpg', 2, 3),
(78, 2, 'The quality of the product is guaranteed', 'jacket8 winter', 159, 'jk8.jpg', 2, 3),
(79, 1, 'The quality of the product is guaranteed', 'tee9 summer', 59, '15.1.jpg', 2, 3),
(80, 1, 'Beatiful', 'tee10 summer', 39, '12.1.jpg', 2, 3),
(81, 2, 'Comfortable', 'jacket9 spring', 89, 'jk9.jpg', 2, 3),
(82, 1, 'The quality of the product is guaranteed', 'tee11 autumn', 59, '13.1.jpg', 2, 3),
(83, 2, 'The quality of the product is guaranteed', 'jacket10 spring', 109, 'jk10.jpg', 2, 3),
(84, 1, 'The quality of the product is guaranteed', 'tee12 spring', 79, '14.1.jpg', 2, 3),
(85, 1, 'The quality of the product is guaranteed', 'tee12 winter', 39, 'jk2.jpg', 2, 3),
(86, 1, 'Nice', 'tee13 spring', 59, '5.1.jpg', 2, 3);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`maDon`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`userKH`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`maloaiSP`);

--
-- Chỉ mục cho bảng `magiamgia`
--
ALTER TABLE `magiamgia`
  ADD PRIMARY KEY (`magiam`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`maSP`),
  ADD KEY `FK_loaisp` (`maloaiSP`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `maDon` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `maSP` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_loaisp` FOREIGN KEY (`maloaiSP`) REFERENCES `loaisanpham` (`maloaiSP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
