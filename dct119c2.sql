-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2022 at 04:01 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
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
-- Indexes for dumped tables
--

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`maDon`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `maDon` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
