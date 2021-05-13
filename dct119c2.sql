-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 13, 2021 lúc 10:20 AM
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
  `userKH` varchar(64) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `hinhanh` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `diachinhan` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

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
  `userKH` varchar(64) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

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
('ha', '123', '0939635455', 'le nguyen');

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
(13, 1, 'alo', 'lê trung nguyên', 1000, 'https://rodavigo.net/datos/logos-marcas-png/ima.png', 1),
(18, 2, 'khoan!!!', 'vjp prooo', 999, 'https://static.tuoitre.vn/tto/i/s626/2010/02/03/1Q60qmko.jpg', 50),
(19, 2, 'cop map', 'vjp prooo', 200, 'https://i.pinimg.com/564x/fb/83/e0/fb83e0938348a25ab8894da420c91a63.jpg', 20),
(20, 2, 'than dieu', 'vjp prooo', 300, 'https://i.pinimg.com/564x/57/80/ea/5780ea3c102507a9ee434e58ba414c1c.jpg', 1),
(21, 1, 'hổ ốm', 'haha', 210, 'https://i.pinimg.com/564x/13/ad/a2/13ada2b38fa367428676979bbd5e7f76.jpg', 20);

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
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `maSP` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
