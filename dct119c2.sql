-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2021 at 07:17 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

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
CREATE DATABASE IF NOT EXISTS `dct119c2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dct119c2`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `userAD` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `passAD` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  PRIMARY KEY (`userAD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userAD`, `passAD`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE IF NOT EXISTS `chitiethoadon` (
  `maDon` int(30) NOT NULL,
  `maSP` int(30) NOT NULL,
  `userKH` varchar(64) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `hinhanh` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `diachinhan` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  PRIMARY KEY (`maDon`,`maSP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE IF NOT EXISTS `donhang` (
  `maDon` int(30) NOT NULL,
  `giaDon` int(30) NOT NULL,
  `soluongMua` int(30) NOT NULL,
  `tinhtrang` varchar(64) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ngaydat` date NOT NULL,
  `userKH` varchar(64) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  PRIMARY KEY (`maDon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE IF NOT EXISTS `khachhang` (
  `userKH` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `passKH` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `sdt` varchar(15) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `hoTen` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  PRIMARY KEY (`userKH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`userKH`, `passKH`, `sdt`, `hoTen`) VALUES
('ha', '123', '0939635455', 'le nguyen');

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

CREATE TABLE IF NOT EXISTS `loaisanpham` (
  `maloaiSP` int(30) NOT NULL,
  `loaiSP` varchar(64) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  PRIMARY KEY (`maloaiSP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`maloaiSP`, `loaiSP`) VALUES
(1, 'tee'),
(2, 'jacket');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE IF NOT EXISTS `sanpham` (
  `maSP` int(30) NOT NULL AUTO_INCREMENT,
  `maloaiSP` int(11) NOT NULL,
  `thongtinSP` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `tenSP` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `giaSP` int(11) NOT NULL,
  `hinhanhSP` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `soluongtonkho` int(11) NOT NULL,
  PRIMARY KEY (`maSP`),
  KEY `FK_loaisp` (`maloaiSP`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`maSP`, `maloaiSP`, `thongtinSP`, `tenSP`, `giaSP`, `hinhanhSP`, `soluongtonkho`) VALUES
(1, 1, '', 'tee1 summer', 39, 'Images/T-SHIRT/1.1.jpg', 20),
(64, 1, '', 'tee2 winter', 49, 'Images/T-SHIRT/21.1.jpg', 21),
(65, 1, 'Fresh', 'tee3 autumn', 39, 'Images/T-SHIRT/20.1.jpg', 100),
(66, 1, '', 'tee4 spring', 29, 'Images/T-SHIRT/17.1.jpg', 21),
(67, 2, 'Comfortable', 'jacket1 sping', 99, 'Images/JACKET/jk1.jpg', 50),
(68, 2, '', 'jacket2 autumn', 89, 'Images/JACKET/jk2.jpg', 50),
(69, 2, '', 'jacket3 winter', 129, 'Images/JACKET/jk3.jpg', 40),
(70, 2, 'Adorable', 'jacket4 spring', 109, 'Images/JACKET/jk4.jpg', 59),
(71, 1, 'Beatiful', 'tee5 spring', 35, 'Images/T-SHIRT/4.1.jpg', 50),
(72, 2, '', 'jacket5 winter', 119, 'Images/JACKET/jk5.jpg', 30),
(73, 1, '', 'tee6 autumn', 69, 'Images/T-SHIRT/7.1.jpg', 30),
(74, 1, 'Cute', 'tee7 summer', 49, 'Images/T-SHIRT/22.1.jpg', 40),
(75, 2, 'Relaxing', 'jacket6 summer', 99, 'Images/JACKET/jk6.jpg', 40),
(76, 2, '', 'jacket7 autumn', 89, 'Images/JACKET/jk7.jpg', 60),
(77, 1, 'Catchy', 'tee8 spring', 79, 'Images/T-SHIRT/23.1.jpg', 20),
(78, 2, '', 'jacket8 winter', 159, 'Images/JACKET/jk8.jpg', 40),
(79, 1, '', 'tee9 summer', 59, 'Images/T-SHIRT/15.1.jpg', 36),
(80, 1, 'Beatiful', 'tee10 summer', 39, 'Images/T-SHIRT/12.1.jpg', 45),
(81, 2, 'Comfortable', 'jacket9 spring', 89, 'Images/JACKET/jk9.jpg', 40),
(82, 1, '', 'tee11 autumn', 59, 'Images/T-SHIRT/13.1.jpg', 40),
(83, 2, '', 'jacket10 spring', 109, 'Images/JACKET/jk10.jpg', 20),
(84, 1, '', 'tee12 spring', 79, 'Images/T-SHIRT/14.1.jpg', 50),
(85, 1, '', 'tee12 winter', 39, 'Images/JACKET/jk2.jpg', 50),
(86, 1, 'Nice', 'tee13 spring', 59, 'Images/T-SHIRT/5.1.jpg', 30);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_loaisp` FOREIGN KEY (`maloaiSP`) REFERENCES `loaisanpham` (`maloaiSP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
