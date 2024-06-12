-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 05:24 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xuong_oop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_danhmuc`
--

CREATE TABLE `tb_danhmuc` (
  `id` int(11) NOT NULL,
  `ten_danh_muc` varchar(50) NOT NULL,
  `mo_ta` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_danhmuc`
--

INSERT INTO `tb_danhmuc` (`id`, `ten_danh_muc`, `mo_ta`) VALUES
(1, 'Điện thoại', 'Danh mục chứa tất cả sản phẩm điện thoại'),
(2, 'Laptop', 'Danh mục chứa tất cả sản phẩm là laptop'),
(3, 'Máy tính bảng', 'Danh mục chứa tát cả sản phẩm là máy tính bảng');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sanpham`
--

CREATE TABLE `tb_sanpham` (
  `id` int(11) NOT NULL,
  `ten_san_pham` varchar(50) NOT NULL,
  `gia` double NOT NULL,
  `gia_khuyen_mai` double NOT NULL,
  `so_luong` int(11) NOT NULL,
  `ngay_nhap` date NOT NULL,
  `id_danh_muc` int(11) NOT NULL,
  `link_anh` varchar(50) DEFAULT NULL,
  `trang_thai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_sanpham`
--

INSERT INTO `tb_sanpham` (`id`, `ten_san_pham`, `gia`, `gia_khuyen_mai`, `so_luong`, `ngay_nhap`, `id_danh_muc`, `link_anh`, `trang_thai`) VALUES
(1, 'Samsung Galaxy S23 FE 5G 128GB', 14890000, 12890000, 10, '2024-06-03', 1, './uploads/61092th (2).jpg', 'Còn hàng'),
(3, 'Xiaomi Poco Pad 8GB 256GB', 14890000, 12890000, 1, '2024-06-01', 3, './uploads/12036samsung-galaxy-s24-ultra-11.webp', 'Hết hàng'),
(4, 'Sam sung', 25000000, 23000000, 50, '2024-06-05', 1, './uploads/18052aa.jpg', 'Còn hàng'),
(5, 'iphone', 20000000, 19999999, 100, '2024-06-08', 1, './uploads/78116image 16.png', 'Còn hàng');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_danhmuc`
--
ALTER TABLE `tb_danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_sanpham`
--
ALTER TABLE `tb_sanpham`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_danhmuc`
--
ALTER TABLE `tb_danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_sanpham`
--
ALTER TABLE `tb_sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
