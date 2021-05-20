-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 20, 2021 lúc 04:31 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dct119c2`
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
  `gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`maDon`, `maSP`, `tenSP`, `userKH`, `soluong`, `gia`) VALUES
(6, 1, 'tee1 summer', 'ha', 1, 39),
(6, 64, 'tee2 winter', 'ha', 1, 49),
(6, 65, 'tee3 autumn', 'ha', 1, 39),
(6, 67, 'jacket1 sping', 'ha', 1, 99),
(6, 70, 'jacket4 spring', 'ha', 1, 109),
(7, 1, 'tee1 summer', 'ha', 1, 39),
(7, 64, 'tee2 winter', 'ha', 1, 49),
(7, 65, 'tee3 autumn', 'ha', 1, 39),
(7, 67, 'jacket1 sping', 'ha', 1, 99),
(7, 70, 'jacket4 spring', 'ha', 1, 109),
(8, 69, 'jacket3 winter', 'ha', 10, 129),
(9, 72, 'jacket5 winter', 'ha', 3, 119),
(9, 73, 'tee6 autumn', 'ha', 6, 69),
(10, 68, 'jacket2 autumn', 'nghiameow', 4, 89),
(10, 70, 'jacket4 spring', 'nghiameow', 57, 109),
(11, 1, 'tee1 summer', 'nghiameow', 1, 39),
(11, 68, 'jacket2 autumn', 'nghiameow', 1, 89),
(11, 70, 'jacket4 spring', 'nghiameow', 1, 109);

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
  `diachinhan` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`maDon`, `giaDon`, `soluongMua`, `tinhtrang`, `ngaydat`, `userKH`, `diachinhan`) VALUES
(6, 335, 5, 'Da xu ly', '2021-05-19', 'ha', '48 btx'),
(7, 335, 5, 'Da xu ly', '2021-05-19', 'ha', '48 btx'),
(8, 1290, 1, 'Da xu ly', '2021-05-19', 'ha', '92 Ham Tu'),
(9, 771, 2, 'Da xu ly', '2021-05-19', 'ha', '710 au co'),
(10, 6569, 2, 'Da xu ly', '2021-05-19', 'nghiameow', '92 Ham Tu'),
(11, 237, 3, 'Chua xu ly', '2021-05-19', 'nghiameow', '92 Ham Tu');

-- --------------------------------------------------------

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
('nghiameow', 'nghiameow', '0339941057', 'nguyen huu nghia');

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
(1, 'tee'),
(2, 'jacket');

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
  `soluongtonkho` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`maSP`, `maloaiSP`, `thongtinSP`, `tenSP`, `giaSP`, `hinhanhSP`, `soluongtonkho`) VALUES
(1, 1, '', 'tee1 summer', 39, '1.1.jpg', 15),
(64, 1, '', 'tee2 winter', 49, '21.1.jpg', -3),
(65, 1, 'Fresh', 'tee3 autumn', 39, '20.1.jpg', -2),
(66, 1, '', 'tee4 spring', 29, '17.1.jpg', 21),
(67, 2, 'Comfortable', 'jacket1 sping', 99, 'jk1.jpg', 48),
(68, 2, '', 'jacket2 autumn', 89, 'jk2.jpg', 45),
(69, 2, '', 'jacket3 winter', 129, 'jk3.jpg', 30),
(70, 2, 'Adorable', 'jacket4 spring', 109, 'jk4.jpg', -1),
(71, 1, 'Beatiful', 'tee5 spring', 35, '4.1.jpg', 50),
(72, 2, '', 'jacket5 winter', 119, 'jk5.jpg', 27),
(73, 1, '', 'tee6 autumn', 69, '7.1.jpg', 24),
(74, 1, 'Cute', 'tee7 summer', 49, '22.1.jpg', 40),
(75, 2, 'Relaxing', 'jacket6 summer', 99, 'jk6.jpg', 40),
(76, 2, '', 'jacket7 autumn', 89, 'jk7.jpg', 60),
(77, 1, 'Catchy', 'tee8 spring', 79, '23.1.jpg', 20),
(78, 2, '', 'jacket8 winter', 159, 'jk8.jpg', 40),
(79, 1, '', 'tee9 summer', 59, '15.1.jpg', 36),
(80, 1, 'Beatiful', 'tee10 summer', 39, '12.1.jpg', 45),
(81, 2, 'Comfortable', 'jacket9 spring', 89, 'jk9.jpg', 40),
(82, 1, '', 'tee11 autumn', 59, '13.1.jpg', 40),
(83, 2, '', 'jacket10 spring', 109, 'jk10.jpg', 20),
(84, 1, '', 'tee12 spring', 79, '14.1.jpg', 50),
(85, 1, '', 'tee12 winter', 39, 'jk2.jpg', 50),
(86, 1, 'Nice', 'tee13 spring', 59, '5.1.jpg', 30);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userAD`);

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`maDon`,`maSP`);

--
-- Chỉ mục cho bảng `donhang`
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
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`maSP`),
  ADD KEY `FK_loaisp` (`maloaiSP`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `maDon` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `maSP` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

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
