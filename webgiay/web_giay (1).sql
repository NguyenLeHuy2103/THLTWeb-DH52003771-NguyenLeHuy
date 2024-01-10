-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 20, 2023 at 06:28 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_giay`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `hovaten` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `diachi` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `sdt` tinyint NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `hovaten`, `email`, `diachi`, `sdt`, `username`, `password`, `role`) VALUES
(3, '', '', '', 0, 'admin', '01234', 0),
(4, '', '', '', 0, 'vantien', '01234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cartegory`
--

DROP TABLE IF EXISTS `tbl_cartegory`;
CREATE TABLE IF NOT EXISTS `tbl_cartegory` (
  `id_danhmuc` int NOT NULL AUTO_INCREMENT,
  `tendanhmuc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `thutu` int NOT NULL,
  PRIMARY KEY (`id_danhmuc`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cartegory`
--

INSERT INTO `tbl_cartegory` (`id_danhmuc`, `tendanhmuc`, `thutu`) VALUES
(22, 'Puma', 3),
(29, 'nike', 3),
(24, 'adidas', 3),
(30, 'Anadas', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

DROP TABLE IF EXISTS `tbl_contact`;
CREATE TABLE IF NOT EXISTS `tbl_contact` (
  `id_contact` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `content` varchar(200) NOT NULL,
  `creatat` date NOT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dangky`
--

DROP TABLE IF EXISTS `tbl_dangky`;
CREATE TABLE IF NOT EXISTS `tbl_dangky` (
  `id_dangky` int NOT NULL AUTO_INCREMENT,
  `tenkhachhang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `diachi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `matkhau` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sodienthoai` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_dangky`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `id_order` int NOT NULL AUTO_INCREMENT,
  `ordercode` varchar(30) NOT NULL,
  `id_user` int NOT NULL,
  `orderdate` date NOT NULL,
  `total` int NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_order`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id_order`, `ordercode`, `id_user`, `orderdate`, `total`, `status`) VALUES
(77, 'TN-4-990', 4, '2023-12-18', 15000000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderdetail`
--

DROP TABLE IF EXISTS `tbl_orderdetail`;
CREATE TABLE IF NOT EXISTS `tbl_orderdetail` (
  `id_orderdetail` int NOT NULL AUTO_INCREMENT,
  `ordercode` varchar(30) NOT NULL,
  `id_product` int NOT NULL,
  `quantityproduct` int NOT NULL,
  `priceproduct` int NOT NULL,
  PRIMARY KEY (`id_orderdetail`)
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_orderdetail`
--

INSERT INTO `tbl_orderdetail` (`id_orderdetail`, `ordercode`, `id_product`, `quantityproduct`, `priceproduct`) VALUES
(86, 'TN-4-990', 45, 1, 5000000),
(85, 'TN-4-990', 49, 1, 10000000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sanpham`
--

DROP TABLE IF EXISTS `tbl_sanpham`;
CREATE TABLE IF NOT EXISTS `tbl_sanpham` (
  `id_sanpham` int NOT NULL AUTO_INCREMENT,
  `tensanpham` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `masanpham` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `giasanpham` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `soluongsanpham` int NOT NULL,
  `hinhanh` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tomtatsanpham` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `noidungsanpham` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tinhtrangsanpham` int NOT NULL,
  `id_danhmuc` int NOT NULL,
  PRIMARY KEY (`id_sanpham`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id_sanpham`, `tensanpham`, `masanpham`, `giasanpham`, `soluongsanpham`, `hinhanh`, `tomtatsanpham`, `noidungsanpham`, `tinhtrangsanpham`, `id_danhmuc`) VALUES
(48, 'adidas 1', '0003', '45000000', 10, '1702109343_a4.jpg', 'qqqqqqqqq', 'zzzzzzzzz', 1, 24),
(49, 'nike 1', '0004', '10000000', 10, '1702109372_a2.jpg', 'ttttttt', 'yyyyyyyyyy', 1, 29),
(45, 'adidas', '0001', '5000000', 10, '1701943626_a1.jpg', 'aaaaaaaaaaa', 'wwwwwwwwww', 1, 24),
(46, 'puma', '0002', '54000000', 5, '1701943667_a5.jpg', 'ddddddd', 'zzzzzzzzz', 1, 22),
(50, 'adidas 2', '0005', '5000000', 10, '1702109400_a1.jpg', 'uuuuuuuuuu', 'iiiiiiiiiii', 1, 24),
(51, 'puma 1', '0006', '45000000', 10, '1702109422_a5.jpg', 'ssssssssssss', 'ttttttttttttt', 1, 22);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
