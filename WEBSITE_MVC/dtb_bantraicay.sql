-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th6 27, 2022 lúc 08:16 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `website_mvc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminid` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(150) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminid`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(1, 'Dat', 'Dat@gmail.com', 'Datadmin', 'e10adc3949ba59abbe56e057f20f883e', 0),
(2, 'Văn Đạt', 'dat@gmail.com', 'phamvandat', 'a001ae9bc9f273d6e155168fabf69c42', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandid` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandid`, `brandName`) VALUES
(23, 'Mứt Sấy Khô ( Loại I )'),
(24, 'Mứt Sấy Khô ( Loại II )'),
(25, 'Mứt Sấy Dẻo ( Loại I )'),
(26, 'Mứt Sấy Dẻo ( Loại II )'),
(27, 'Mứt Tươi ( Loại I )'),
(28, 'Mứt Tươi ( Loại II )'),
(29, 'Trái Cây ( Loại I )'),
(30, 'Trái Cây ( Loại II )'),
(31, 'Mứt Ngâm ( Loại I )'),
(32, 'Mứt Ngâm ( Loại II )'),
(33, 'Mật ( Loại I )'),
(34, 'Mật ( Loại II )'),
(35, 'Nước Ép ( Loại I )'),
(36, 'Nước Ép ( Loại II )');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `sid` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartid`, `productid`, `sid`, `productName`, `price`, `quantity`, `image`) VALUES
(44, 15, 'msmpr6594ummstie77ovcroe2v', 'Cam', '55000', 1, 'bc3bf62fce.png'),
(45, 11, 'mk37bsoh694d7kce8dnjm4rc1s', 'Dâu', '100000', 4, '0038c09f71.png'),
(47, 15, 'k7j9n2jm4ko5923g99re72vcfo', 'Cam', '55000', 4, 'bc3bf62fce.png'),
(48, 11, 'k7j9n2jm4ko5923g99re72vcfo', 'Dâu', '100000', 1, '0038c09f71.png'),
(49, 15, 'k7j9n2jm4ko5923g99re72vcfo', 'Cam', '55000', 1, 'bc3bf62fce.png'),
(56, 32, 'ndpcpaaudrpn3ld8i7j7mn7neb', 'Cam Sành', '105000', 6, '0a263623ec.png'),
(57, 28, 'ndpcpaaudrpn3ld8i7j7mn7neb', 'Dâu Tây', '100000', 5, 'c2ca4b1d58.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catid` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`catid`, `catName`) VALUES
(47, 'Dâu'),
(48, 'Xoài'),
(49, 'Bưởi'),
(50, 'Dứa'),
(51, 'Cam'),
(52, 'Dừa'),
(53, 'Bơ'),
(54, 'Ổi'),
(55, 'Thanh Long'),
(56, 'Vải'),
(57, 'Nho'),
(58, 'Táo'),
(59, 'Chanh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `zipcode` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zipcode`, `phone`, `email`, `password`) VALUES
(5, 'Đạt', '423/76 quận 12', 'Hồ Chí Minh', 'HCM', '700000', '0765544760', 'dat@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(6, 'Phạm Văn Đạt', '423/76 quận 10', 'TP HCM', 'HCM', '700000', '0765544760', 'vandat@gmail.com', '123456'),
(7, 'Phạm Văn Đạt', '423/76 quận 9', 'Hà Nội', 'AF', '700000', '0765544760', 'pvd@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productid` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catid` int(11) NOT NULL,
  `brandid` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`productid`, `productName`, `catid`, `brandid`, `product_desc`, `price`, `type`, `image`) VALUES
(28, 'Dâu Tây', 47, 23, '<p><em><strong>Mứt D&acirc;u Sấy Kh&ocirc;</strong></em></p>', '100000', 1, 'c2ca4b1d58.png'),
(29, 'Xoài Cát', 48, 24, '<p><em><strong>Mứt Xo&agrave;i Sấy Kh&ocirc;</strong></em></p>', '100000', 0, 'f0cc635b23.png'),
(30, 'Bưởi Ruột Đỏ', 49, 25, '<p><em><strong>Mứt Bưởi Sấy Dẻo</strong></em></p>', '90000', 0, 'c531ac9173.png'),
(31, 'Dứa Tươi', 50, 26, '<p><em><strong>Mứt Dứa Sấy Dẻo</strong></em></p>', '90000', 1, '303ab7ca97.png'),
(32, 'Cam Sành', 51, 27, '<p><em><strong>Mứt Cam Tươi</strong></em></p>', '105000', 1, '0a263623ec.png'),
(33, 'Dừa Sáp', 52, 28, '<p><em><strong>Mứt Dừa Tươi</strong></em></p>', '105000', 0, '82d2478395.png'),
(34, 'Bơ Sáp', 53, 29, '<p><em><strong>Tr&aacute;i C&acirc;y Bơ S&aacute;p</strong></em></p>', '70000', 0, 'ec1fc12b07.png'),
(35, 'Ổi Thái', 54, 30, '<p><em><strong>Tr&aacute;i C&acirc;y Ổi Th&aacute;i</strong></em></p>', '70000', 1, 'a5d2e14bc8.png'),
(36, 'Thanh Long', 55, 31, '<p><em><strong>Mứt Thanh Long Ng&acirc;m</strong></em></p>', '80000', 0, '6b1b425225.png'),
(37, 'Vải Thiều', 56, 32, '<p><strong><em>Mứt Vải Thiều Ng&acirc;m</em></strong></p>', '60000', 1, '002437cab1.png'),
(38, 'Nho Đỏ', 57, 33, '<p><em><strong>Mật Nho Đỏ Ng&acirc;m</strong></em></p>', '60000', 1, '11c0b678f9.png'),
(39, 'Táo Đỏ', 58, 34, '<p><strong><em>Mật T&aacute;o Đỏ Ng&acirc;m</em></strong></p>', '65000', 0, 'd729ae83e1.png'),
(40, 'Chanh Tươi', 59, 35, '<p><strong><em>Nước Chanh Tươi &Eacute;p</em></strong></p>', '50000', 0, '162bfd81f7.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userid` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userCode` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userAdress` varchar(255) NOT NULL,
  `userPhone` int(12) NOT NULL,
  `userPass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandid`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catid`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productid`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
