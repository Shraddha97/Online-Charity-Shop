-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 08, 2022 at 08:23 PM
-- Server version: 10.3.37-MariaDB-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gxvxuoyc_rushabh_trading`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'pearls80');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_details`
--

CREATE TABLE `buyer_details` (
  `id` int(11) NOT NULL,
  `b_id` int(255) NOT NULL,
  `b_fname` varchar(255) NOT NULL,
  `b_lname` varchar(255) NOT NULL,
  `b_phone` varchar(255) NOT NULL,
  `b_aphone` varchar(255) NOT NULL,
  `address_line_1` varchar(255) NOT NULL,
  `address_line_2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `buyer_details`
--

INSERT INTO `buyer_details` (`id`, `b_id`, `b_fname`, `b_lname`, `b_phone`, `b_aphone`, `address_line_1`, `address_line_2`, `city`, `pincode`, `state`, `country`) VALUES
(2, 1014, 'Ravi', 'Modi', '09987730006', '', 'Balasinor SoC 8 sv road Kandivali West', '', 'Mumbai', '400067', 'Maharashtra', ''),
(20, 1066, 'asdsad', 'asdasd', '3453453453', '', '345345345', '', '345345345', '345345345', 'Gujarat', 'India'),
(21, 1092, 'shraddha', 'r', '9879898989', '9879898989', 'Maharashtra India', '', 'Mumbai', '489652', 'Maharashtra', ''),
(22, 1118, 'Shubham', 'Gupta', '7021912919', '', 'Hema Park Tower Co-operative Housing Society Friends Colony Bhandup East', 'Office No. 7/2B, Next to Rahul Motor Training School', 'Mumbai', '400042', 'Maharashtra', 'India'),
(23, 1131, 'smith', 'm', '9895465655', '', 'mumbaii', '', 'mumbai', '488895', 'Maharashtra', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_register`
--

CREATE TABLE `buyer_register` (
  `id` int(11) NOT NULL,
  `b_id` varchar(255) NOT NULL,
  `b_name` varchar(255) NOT NULL,
  `b_email` varchar(255) NOT NULL,
  `b_phone` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `buyer_register`
--

INSERT INTO `buyer_register` (`id`, `b_id`, `b_name`, `b_email`, `b_phone`, `hash`, `salt`) VALUES
(1, '1014', 'Shubham Vinod Gupta', 'shubham@stellarinfosys.com', '213213213', '', ''),
(10, '1027', 'Rushabh Shah', 'rushabhshah1.rs@gmail.com', '09323936033', '', ''),
(11, '1040', 'abc', 'abc@c.com', '1234567890', '', ''),
(12, '1053', 'ananya', 'ananya@gmail.com', '99878787', '', ''),
(13, '1066', 'fdsfdfs', 'test@gmail.com', '9876543210987', '', ''),
(14, '1079', 'sdfsdf', 'dsz@sdf.fd', '98746513200', '', ''),
(15, '1092', 'shraddha', 'shraddha@gmail.com', '9879898989', '', ''),
(16, '1105', 'john', 'john@gmail.com', '9875896589', '', ''),
(18, '1118', 'Shubham Gupta', 'test1@gmail.com', '7021912919', '478d97a4c459d56526a4d8f12ff4c52e7ec6dd8cd7017604f5e1909b0041c9f9', '71b5ba5233b6ab6d'),
(19, '1131', 'smith', 'smith@gmail.com', '8976567465', 'c0a7f0d78b60b1af5c5f8ef88ad7142ca41e662729b678e7856aeaa89dea0793', '664d34315bacda0e');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `b_id` varchar(255) NOT NULL,
  `p_id` varchar(255) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_price` varchar(255) NOT NULL,
  `p_img` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `total_amt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `b_id`, `p_id`, `p_name`, `p_price`, `p_img`, `quantity`, `size`, `total_amt`) VALUES
(156, '1027', '10006', 'Denim Jackets', '600', 'upload/product_img/thumbnail/10006_project_thumb_7.jpeg', '1', 'L', '600'),
(157, '1014', '10006', 'Denim Jackets', '600', 'upload/product_img/thumbnail/10006_project_thumb_7.jpeg', '1', 'L', '600'),
(160, '1014', '10010', 'Denim Shorts ', '400', 'upload/product_img/thumbnail/10010_project_thumb_11.jpeg', '1', '', '400'),
(164, '1053', '10009', 'T-shirts', '600', 'upload/product_img/thumbnail/10009_project_thumb_10.jpeg', '2', 'XL', '1200'),
(165, '1053', '10010', 'Denim Shorts ', '400', 'upload/product_img/thumbnail/10010_project_thumb_11.jpeg', '1', 'XL', '400'),
(166, '1053', '10003', 'Mens Jeans', '900', 'upload/product_img/thumbnail/10003_project_thumb_updated_1.jpg', '4', 'M', '3600'),
(167, '1053', '10006', 'Denim Jackets', '600', 'upload/product_img/thumbnail/10006_project_thumb_7.jpeg', '1', 'L', '600'),
(199, '1092', '10058', 'Moda Rapido', '5', 'upload/product_img/thumbnail/10058_project_thumb_80.jpg', '1', '', '5');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `thumbnail`, `image`) VALUES
(1, 'upload/gallery/thumbnail/gallery_thumb_1.jpg', 'upload/gallery/gallery_img_1.jpg'),
(2, 'upload/gallery/thumbnail/gallery_thumb_2.jpg', 'upload/gallery/gallery_img_2.jpg'),
(3, 'upload/gallery/thumbnail/gallery_thumb_3.jpg', 'upload/gallery/gallery_img_3.jpg'),
(4, 'upload/gallery/thumbnail/gallery_thumb_4.jpg', 'upload/gallery/gallery_img_4.jpg'),
(5, 'upload/gallery/thumbnail/gallery_thumb_5.jpg', 'upload/gallery/gallery_img_5.jpg'),
(6, 'upload/gallery/thumbnail/gallery_thumb_6.jpg', 'upload/gallery/gallery_img_6.jpg'),
(7, 'upload/gallery/thumbnail/gallery_thumb_7.jpg', 'upload/gallery/gallery_img_7.jpg'),
(8, 'upload/gallery/thumbnail/gallery_thumb_8.jpg', 'upload/gallery/gallery_img_8.jpg'),
(9, 'upload/gallery/thumbnail/gallery_thumb_9.jpg', 'upload/gallery/gallery_img_9.jpg'),
(10, 'upload/gallery/thumbnail/gallery_thumb_10.jpg', 'upload/gallery/gallery_img_10.jpg'),
(11, 'upload/gallery/thumbnail/gallery_thumb_11.jpg', 'upload/gallery/gallery_img_11.jpg'),
(12, 'upload/gallery/thumbnail/gallery_thumb_12.jpg', 'upload/gallery/gallery_img_12.jpg'),
(13, 'upload/gallery/thumbnail/gallery_thumb_13.jpg', 'upload/gallery/gallery_img_13.jpg'),
(14, 'upload/gallery/thumbnail/gallery_thumb_14.jpg', 'upload/gallery/gallery_img_14.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `b_id` varchar(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `p_id` varchar(255) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_price` varchar(255) NOT NULL,
  `p_img` mediumtext NOT NULL,
  `qty` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `total_amt` varchar(255) NOT NULL,
  `b_fname` varchar(255) NOT NULL,
  `b_lname` varchar(255) NOT NULL,
  `b_phone` varchar(255) NOT NULL,
  `b_aphone` varchar(255) NOT NULL,
  `b_email` varchar(500) NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `signature_hash` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `b_id`, `order_date`, `p_id`, `p_name`, `p_price`, `p_img`, `qty`, `size`, `total_amt`, `b_fname`, `b_lname`, `b_phone`, `b_aphone`, `b_email`, `address_line1`, `address_line2`, `city`, `pincode`, `state`, `country`, `order_status`, `order_id`, `payment_id`, `signature_hash`) VALUES
(26, '1014', 'Sun, 14th Feb \'21', '\r\n                                        10035^10012^10011^10007^10003^10009^10010^', '\r\n                                        Branded Jeans^Jackets^Track Suit^Jackets^Mens Jeans^T-shirts^Denim Shorts ^', '\r\n                                        900^600^1200^600^900^600^400^', '\r\n                                        upload/product_img/thumbnail/10035_project_thumb_53.jpg^upload/product_img/thumbnail/10012_project_thumb_13.jpeg^upload/product_img/thumbnail/10011_project_thumb_12.jpeg^upload/product_img/thumbnail/10007_project_thumb_8.jpeg^upload/product_img/thumbnail/10003_project_thumb_updated_1.jpg^upload/product_img/thumbnail/10009_project_thumb_10.jpeg^upload/product_img/thumbnail/10010_project_thumb_11.jpeg^', '\r\n                                        1^1^1^1^1^1^1^', '\r\n                                        M^XL^XXL^XL^L^XL^XL^', ' 5200', 'Ravi', 'Modi', '09987730006', '', 'shubham@stellarinfosys.com', 'Balasinor SoC 8 sv road Kandivali West', '', 'Mumbai', '400067', 'Maharashtra', 'India', 'Pending', '', '', ''),
(27, '1014', 'Sun, 14th Feb \'21', '\r\n                                        10003^10006^10007^', '\r\n                                        Mens Jeans^Denim Jackets^Jackets^', '\r\n                                        900^600^600^', '\r\n                                        upload/product_img/thumbnail/10003_project_thumb_updated_1.jpg^upload/product_img/thumbnail/10006_project_thumb_7.jpeg^upload/product_img/thumbnail/10007_project_thumb_8.jpeg^', '\r\n                                        1^1^1^', '\r\n                                        XL^L^L^', ' 2100', 'Ravi', 'Modi', '09987730006', '', 'shubham@stellarinfosys.com', 'Balasinor SoC 8 sv road Kandivali West', '', 'Mumbai', '400067', 'Maharashtra', 'India', 'Pending', 'order_GbOBHAt4z3KIBd', 'pay_GbPzhJXsM3U8s6', '9a1c5111e7b3229804a15308d175d1d4f1d9a10e3d2a058fc30be1c876d21313'),
(28, '1014', 'Sun, 14th Feb \'21', '\r\n                                        10006^', '\r\n                                        Denim Jackets^', '\r\n                                        600^', '\r\n                                        upload/product_img/thumbnail/10006_project_thumb_7.jpeg^', '\r\n                                        1^', '\r\n                                        L^', ' 600', 'Ravi', 'Modi', '09987730006', '', 'shubham@stellarinfosys.com', 'Balasinor SoC 8 sv road Kandivali West', '', 'Mumbai', '400067', 'Maharashtra', 'India', 'Pending', '', '', ''),
(29, '1066', 'Thu, 24th Nov \'22', '\r\n                                    10006^10010^', '\r\n                                    Denim Jackets^Denim Shorts ^', '\r\n                                    600^400^', '\r\n                                    upload/product_img/thumbnail/10006_project_thumb_7.jpeg^upload/product_img/thumbnail/10010_project_thumb_11.jpeg^', '\r\n                                    1^1^', '\r\n                                    L^L^', '1000', 'asdsad', 'asdasd', '3453453453', '', '', '345345345', '', '345345345', '345345345', 'Gujarat', 'India', 'Pending', '', '', ''),
(30, '1092', 'Mon, 05th Dec \'22', '\r\n                                        10007^', '\r\n                                        Jackets^', '\r\n                                        600^', '\r\n                                        upload/product_img/thumbnail/10007_project_thumb_8.jpeg^', '\r\n                                        3^', '\r\n                                        XL^', ' 1800', 'shraddha', 'r', '9879898989', '9879898989', 'shraddha@gmail.com', 'fd', 'fs', 'fesf', '67464141', 'Karnataka', 'India', 'Pending', '', '', ''),
(31, '1092', 'Wed, 07th Dec \'22', '\r\n                                        10053^10057^', '\r\n                                        vvm^Women Lavender Printed Round Neck Pure Cotton T-shirt^', '\r\n                                        67868^3^', '\r\n                                        upload/product_img/thumbnail/10053_project_thumb_69.jpg^upload/product_img/thumbnail/10057_project_thumb_77.jpg^', '\r\n                                        1^1^', '\r\n                                        S^XS^', ' 67871', 'shraddha', 'r', '9879898989', '9879898989', 'shraddha@gmail.com', 'fd', 'fs', 'fesf', '67464141', 'Karnataka', 'India', 'Pending', 'order_Kp6rGEqaxWpccf', 'pay_Kp6tQ5mbWto1Fl', '7b99f70827e7439ca8f3246d3fb577e1c67a3a767a2ee4e945b28e03754a7029'),
(32, '1092', 'Wed, 07th Dec \'22', '\r\n                                        10078^', '\r\n                                        DressBerry^', '\r\n                                        80^', '\r\n                                        upload/product_img/thumbnail/10078_project_thumb_136.jpg^', '\r\n                                        1^', '\r\n                                        Free^', ' 80', 'shraddha', 'r', '9879898989', '9879898989', 'shraddha@gmail.com', 'fd', 'fs', 'fesf', '67464141', 'Karnataka', 'India', 'Pending', '', '', ''),
(33, '1092', 'Wed, 07th Dec \'22', '\r\n                                        10078^', '\r\n                                        DressBerry^', '\r\n                                        80^', '\r\n                                        upload/product_img/thumbnail/10078_project_thumb_136.jpg^', '\r\n                                        1^', '\r\n                                        Free^', ' 80', 'shraddha', 'r', '9879898989', '9879898989', 'shraddha@gmail.com', 'fd', 'fs', 'fesf', '67464141', 'Karnataka', 'India', 'Pending', '', '', ''),
(34, '1092', 'Wed, 07th Dec \'22', '\r\n                                        10056^', '\r\n                                        The Lifestyle Co Women Mauve Polo Collar T-shirt^', '\r\n                                        3^', '\r\n                                        upload/product_img/thumbnail/10056_project_thumb_74.jpg^', '\r\n                                        1^', '\r\n                                        S^', ' 3', 'shraddha', 'r', '9879898989', '9879898989', 'shraddha@gmail.com', 'fd', 'fs', 'fesf', '67464141', 'Karnataka', 'India', 'Pending', '', '', ''),
(35, '1092', 'Wed, 07th Dec \'22', '\r\n                                        10068^', '\r\n                                        Roadster Shoes^', '\r\n                                        50^', '\r\n                                        upload/product_img/thumbnail/10068_project_thumb_111.jpg^', '\r\n                                        1^', '\r\n                                        S^', ' 50', 'shraddha', 'r', '9879898989', '9879898989', 'shraddha@gmail.com', 'fd', 'fs', 'fesf', '67464141', 'Karnataka', 'India', 'Pending', '', '', ''),
(36, '1092', 'Wed, 07th Dec \'22', '\r\n                                        10072^', '\r\n                                        Status^', '\r\n                                        1000^', '\r\n                                        upload/product_img/thumbnail/10072_project_thumb_118.jpg^', '\r\n                                        1^', '\r\n                                        L^', ' 1000', 'shraddha', 'r', '9879898989', '9879898989', 'shraddha@gmail.com', 'fd', 'fs', 'fesf', '67464141', 'Karnataka', 'India', 'Pending', '', '', ''),
(37, '1092', 'Wed, 07th Dec \'22', '\r\n                                        10056^', '\r\n                                        The Lifestyle Co Women Mauve Polo Collar T-shirt^', '\r\n                                        3^', '\r\n                                        upload/product_img/thumbnail/10056_project_thumb_74.jpg^', '\r\n                                        1^', '\r\n                                        S^', ' 3', 'shraddha', 'r', '9879898989', '9879898989', 'shraddha@gmail.com', 'fd', 'fs', 'fesf', '67464141', 'Karnataka', 'India', 'Pending', '', '', ''),
(38, '1092', 'Wed, 07th Dec \'22', '\r\n                                        10083^', '\r\n                                        JCPL^', '\r\n                                        100^', '\r\n                                        upload/product_img/thumbnail/10083_project_thumb_145.jpg^', '\r\n                                        1^', '\r\n                                        Free^', ' 100', 'shraddha', 'r', '9879898989', '9879898989', 'shraddha@gmail.com', 'fd', 'fs', 'fesf', '67464141', 'Karnataka', 'India', 'Pending', '', '', ''),
(39, '1092', 'Wed, 07th Dec \'22', '\r\n                                        10067^', '\r\n                                        HIGHLANDER^', '\r\n                                        100^', '\r\n                                        upload/product_img/thumbnail/10067_project_thumb_108.jpg^', '\r\n                                        1^', '\r\n                                        S^', ' 100', 'shraddha', 'r', '9879898989', '9879898989', 'shraddha@gmail.com', 'fd', 'fs', 'fesf', '67464141', 'Karnataka', 'India', 'Pending', '', '', ''),
(40, '1092', 'Thu, 08th Dec \'22', '\r\n                                        10071^10072^', '\r\n                                        HABERE INDIA^Status^', '\r\n                                        1000^1000^', '\r\n                                        upload/product_img/thumbnail/10071_project_thumb_115.jpg^upload/product_img/thumbnail/10072_project_thumb_118.jpg^', '\r\n                                        1^1^', '\r\n                                        S^S^', ' 2000', 'shraddha', 'r', '9879898989', '9879898989', 'shraddha@gmail.com', 'Maharashtra India', '', 'Mumbai', '489652', 'Maharashtra', 'India', 'Pending', '', '', ''),
(41, '1092', 'Thu, 08th Dec \'22', '\r\n                                        10080^10079^', '\r\n                                        Mamaearth^Nivea Deo^', '\r\n                                        80^20^', '\r\n                                        upload/product_img/thumbnail/10080_project_thumb_140.jpg^upload/product_img/thumbnail/10079_project_thumb_138.jpg^', '\r\n                                        1^1^', '\r\n                                        Free^Free^', ' 100', 'shraddha', 'r', '9879898989', '9879898989', 'shraddha@gmail.com', 'Maharashtra India', '', 'Mumbai', '489652', 'Maharashtra', 'India', 'Pending', '', '', ''),
(42, '1066', 'Thu, 08th Dec \'22', '\r\n                                        10074^10073^', '\r\n                                        Story@home^Gulaab Jaipur^', '\r\n                                        100^60^', '\r\n                                        upload/product_img/thumbnail/10074_project_thumb_124.jpg^upload/product_img/thumbnail/10073_project_thumb_120.jpg^', '\r\n                                        1^1^', '\r\n                                        S^M^', ' 160', 'asdsad', 'asdasd', '3453453453', '', 'test@gmail.com', '345345345', '', '345345345', '345345345', 'Gujarat', 'India', 'Pending', '', '', ''),
(43, '1118', 'Thu, 08th Dec \'22', '\r\n                                    10057^', '\r\n                                    Women Lavender Printed Round Neck Pure Cotton T-shirt^', '\r\n                                    3^', '\r\n                                    upload/product_img/thumbnail/10057_project_thumb_77.jpg^', '\r\n                                    1^', '\r\n                                    XS^', '3', 'Shubham', 'Gupta', '7021912919', '', '', 'Hema Park Tower Co-operative Housing Society Friends Colony Bhandup East', 'Office No. 7/2B, Next to Rahul Motor Training School', 'Mumbai', '400042', 'Maharashtra', 'India', 'Pending', '', '', ''),
(44, '1118', 'Thu, 08th Dec \'22', '\r\n                                        10056^', '\r\n                                        The Lifestyle Co Women Mauve Polo Collar T-shirt^', '\r\n                                        3^', '\r\n                                        upload/product_img/thumbnail/10056_project_thumb_74.jpg^', '\r\n                                        1^', '\r\n                                        S^', ' 3', 'Shubham', 'Gupta', '7021912919', '', 'test1@gmail.com', 'Hema Park Tower Co-operative Housing Society Friends Colony Bhandup East', 'Office No. 7/2B, Next to Rahul Motor Training School', 'Mumbai', '400042', 'Maharashtra', 'India', 'Pending', '', '', ''),
(45, '1118', 'Thu, 08th Dec \'22', '\r\n                                        10069^', '\r\n                                        Skechers^', '\r\n                                        100^', '\r\n                                        upload/product_img/thumbnail/10069_project_thumb_112.jpg^', '\r\n                                        1^', '\r\n                                        S^', ' 100', 'Shubham', 'Gupta', '7021912919', '', 'test1@gmail.com', 'Hema Park Tower Co-operative Housing Society Friends Colony Bhandup East', 'Office No. 7/2B, Next to Rahul Motor Training School', 'Mumbai', '400042', 'Maharashtra', 'India', 'Pending', '', '', ''),
(46, '1118', 'Thu, 08th Dec \'22', '\r\n                                        ', '\r\n                                        ', '\r\n                                        ', '\r\n                                        ', '\r\n                                        ', '\r\n                                        ', ' 0', 'Shubham', 'Gupta', '7021912919', '', 'test1@gmail.com', 'Hema Park Tower Co-operative Housing Society Friends Colony Bhandup East', 'Office No. 7/2B, Next to Rahul Motor Training School', 'Mumbai', '400042', 'Maharashtra', 'India', 'Pending', '', '', ''),
(47, '1118', 'Thu, 08th Dec \'22', '\r\n                                        10057^', '\r\n                                        Women Lavender Printed Round Neck Pure Cotton T-shirt^', '\r\n                                        3^', '\r\n                                        upload/product_img/thumbnail/10057_project_thumb_77.jpg^', '\r\n                                        1^', '\r\n                                        XS^', ' 3', 'Shubham', 'Gupta', '7021912919', '', 'test1@gmail.com', 'Hema Park Tower Co-operative Housing Society Friends Colony Bhandup East', 'Office No. 7/2B, Next to Rahul Motor Training School', 'Mumbai', '400042', 'Maharashtra', 'India', 'Pending', 'order_KpReXTsNscAppB', 'pay_KpRgCmzusm4222', '1f936858cab732a820ab40a7f76d19c63a476bdeec29530e63af4a935a1ccaef'),
(48, '1131', 'Thu, 08th Dec \'22', '\r\n                                    10056^10057^', '\r\n                                    The Lifestyle Co Women Mauve Polo Collar T-shirt^Women Lavender Printed Round Neck Pure Cotton T-shirt^', '\r\n                                    3^3^', '\r\n                                    upload/product_img/thumbnail/10056_project_thumb_74.jpg^upload/product_img/thumbnail/10057_project_thumb_77.jpg^', '\r\n                                    1^1^', '\r\n                                    S^S^', '6', 'smith', 'm', '9895465655', '', '', 'mumbaii', '', 'mumbai', '488895', 'Maharashtra', 'India', 'Pending', 'order_KpRmYlEFmih3jd', 'pay_KpRqDjR5gSMtph', '7e946a2aaac081291e1987818b76b5a9fca5858290f0db956adf730df961f5b3');

-- --------------------------------------------------------

--
-- Table structure for table `order_tracking`
--

CREATE TABLE `order_tracking` (
  `id` int(11) NOT NULL,
  `t_id` varchar(255) NOT NULL,
  `o_id` varchar(255) NOT NULL,
  `b_id` varchar(255) NOT NULL,
  `tracking_url` varchar(255) NOT NULL,
  `awb_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `p_id` varchar(255) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `fabric` varchar(255) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `sub_category` varchar(255) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `keywords` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `p_id`, `p_name`, `fabric`, `brand_name`, `size`, `price`, `product_category`, `sub_category`, `product_type`, `keywords`) VALUES
(54, '10054', 'Roadside Tshirt', 'Cotton', 'Roadside', 'XS^S^M^L^XL^XXL', '5', 'Fashion', 'Womens Wear', 'T-shirts', 'roadside^womenstshirt^roadsidewomenstshirt^tshirt^'),
(56, '10056', 'The Lifestyle Co Women Mauve Polo Collar T-shirt', ' viscose rayon', 'Roadster', 'XS^S^M^L^XL^XXL', '3', 'Fashion', 'Womens Wear', 'T-shirts', 'roadster^roadstertshirt^womenstshirt^tshirt^polotshirt'),
(57, '10057', 'Women Lavender Printed Round Neck Pure Cotton T-shirt', 'Cotton', 'Roadside', 'XS^S^M^L', '3', 'Fashion', 'Womens Wear', 'T-shirts', 'lavendertshirt^roundnecktshirt^tshirt^cottontshirt^printedtshirt'),
(58, '10058', 'Moda Rapido', 'Women Multicoloured Candy Stripes Drop-Shoulder Sleeves T-shirt', 'Rapido', 'XS^S^M', '5', 'Fashion', 'Womens Wear', 'T-shirts', 'moda^tshirt^candytshirt^dropshouldertshirt^multicolouredtshirt^'),
(59, '10059', 'Casual Tshirt', 'Cotton tshirt', 'Barcelona', 'XS^S^M', '5', 'Fashion', 'Womens Wear', 'T-shirts', 'barcelonatshirt^tshirt^cottontshirt^lightcolourtshirt^fullsleevetshirt^'),
(60, '10060', 'DILLINGER Tshirt', 'Women Navy Blue Typography Printed Pure Cotton T-shirt', 'Dllinger', 'XS^S^M^L^XL^XXL', '7', 'Fashion', 'Womens Wear', 'T-shirts', 'dillingertshirt^tshirt^cottontshirt^navybluetshirt^'),
(61, '10061', 'DILLINGER Tshirt', 'Sage Green Graphic Printed Pure Cotton Oversized Pure Cotton T-shirt', 'Dillinger', 'XS^S^M^L^XL^XXL', '7', 'Fashion', 'Womens Wear', 'T-shirts', 'Dillingertshirt^tshirt^greencolourtshirt^cottontshirt^Tshirt^printedtshirt^'),
(62, '10062', 'DILLINGER Tshirt', 'Women Purple Typography Printed Drop-Shoulder Sleeves Oversized Pure Cotton T-shirt', 'Dillinger', 'XS^S^M^L^XL^XXL', '8', 'Fashion', 'Womens Wear', 'T-shirts', 'Dillingertshirt^tshirt^greencolourtshirt^cottontshirt^Tshirt^printedtshirt^'),
(63, '10063', 'Moda Rapido Tshirt', 'Women Grey Graphic Printed Longline Cotton Pure Cotton T-shirt', 'Moda', 'XS^S^M^L^XL^XXL', '5', 'Fashion', 'Womens Wear', 'T-shirts', 'modatshirt^tshirt^greycolourtshirt^cottontshirt^Tshirt^printedtshirt^'),
(64, '10064', 'PARIS HAMILTON', 'Women Blue Flared High-Rise Stretchable Jeans', 'Hamilton', 'XS^S^M^L^XL^XXL', '5', 'Fashion', 'Womens Wear', 'Jeans', 'hamilton^jeans^highrisejeans^highrise^blue^bluejeans^'),
(65, '10065', 'HERE&NOW Jeans', 'Women Blue Solid Bootcut Stretchable Jeans', 'HERE&NOW', 'XS^S^M^L^XL^XXL', '100', 'Fashion', 'Womens Wear', 'Jeans', 'jeans^bluecolourjeans^bluejeans^bootcutjeans^womenjeans'),
(66, '10066', 'United Colors of Benetton Jeans', 'Women Blue Skinny Fit Low Distress Light Fade Stretchable Jeans', 'United Colors of Benetton', 'XS^S^M^L^XL', '200', 'Fashion', 'Womens Wear', 'Jeans', 'bluejeans^bluecolourjeans^benettonjeans^jeans^skinnyfitjeans^'),
(67, '10067', 'HIGHLANDER', 'Men Black Slim Fit Mid-Rise Clean Look Stretchable Jeans', 'HIGHLANDER', 'XS^S^M^L^XL^XXL', '100', 'Fashion', 'Mens Wear', 'Jeans', 'blackjeans^mensjeans^jeans^stretchablejeans^highlander'),
(68, '10068', 'Roadster Shoes', 'Men Black Sneakers', 'Roadster ', 'XS^S^M^L^XL', '50', 'Fashion', 'Mens Wear', 'Shoes', 'shoes^mensshoes^roadstershoes^blackshoes^shoe^menblackshoes^'),
(69, '10069', 'Skechers', 'Men Charcoal Grey Solid Sneakers', 'Skechers', 'XS^S^M^L^XL', '100', 'Fashion', 'Mens Wear', 'Shoes', 'skechersshoes^charcoalgreyshoes^shoes^menshoes^mensshoes^mens^sneaker^'),
(70, '10070', 'Layasa shoes', 'Women Green Colourblocked Sneakers', 'Layasa', 'XS^S^M^L^XL^XXL', '100', 'Fashion', 'Womens Wear', 'Shoes', 'layasashoes^womenshoes^shoes^womenshoes^greencolourshoes^'),
(71, '10071', 'HABERE INDIA', 'Beige Solid Woven Jute Carpet', 'HABERE INDIA', 'S^M^L^XL', '1000', 'Home & Living', 'Flooring', 'Carpets', 'carpet^floorcarpet^wovencarpet^jutecarpet^'),
(72, '10072', 'Status', 'Blue & White Printed Anti-Skid Carpet', 'Status', 'S^M^L^XL', '1000', 'Home & Living', 'Flooring', 'Carpets', 'carpet^floorcarpet^printedcarpet^antiskidcarpet^'),
(73, '10073', 'Gulaab Jaipur', 'White & Green Printed 400 GSM Organic Cotton Bath Towel', 'Gulaab Jaipur', 'M^L', '60', 'Home & Living', 'Bath', 'Bath Towels', 'bathtowels^towel^bath^printedtowel^cottontowel^whitegreentowel^'),
(74, '10074', 'Story@home', 'Navy Blue & Pink 6 Pieces Solid 450 GSM Towel Set', 'Story', 'S^M^L', '100', 'Home & Living', 'Bath', 'Bath Towels', 'bathtowels^towel^bath^printedtowel^cottontowel^solidtowels^'),
(75, '10075', 'Roadster', 'Women Navy Blue Skinny Fit High-Rise Jeans', 'Roadster', 'XS^S^M^L^XL^XXL', '50', 'Fashion', 'Womens Wear', 'Jeans', 'jeans^bluejeans^navybluejeans^highrisejeans^womensjeans^womenjeans^'),
(76, '10076', 'Jack & Jones', 'Men Blue Ben Skinny Fit Clean Look Mid-Rise Stretchable Jeans', 'Jack & Jones', 'XS^S^M^L^XL', '80', 'Fashion', 'Mens Wear', 'Jeans', 'bluejeans^mensjeans^men^jeans^skinnyjeans^stretchablejeans^'),
(77, '10077', 'Zaveri Pearls', 'Gold-Toned & White Contemporary Pearls Studded Jewellery Set', 'Zaveri Pearls', 'S^M^L', '20', 'Accessories', 'Jewellery', 'Jewellery', 'accessories^accesory^goldwhitejewellery^pearlsjewellery^jewellery^jewellweries'),
(78, '10078', 'DressBerry', 'Gold-Toned Geometric Drop Earrings', 'DressBerry', 'Free', '80', 'Accessories', 'Jewellery', 'Jewellery', 'earrings^earring^dropearrings^dropearring^goldearrings^goldearring^'),
(79, '10079', 'Nivea Deo', 'Women Pearl and Beauty Deo for Beautiful Underarms & 48h Protection 150ml', 'Nivea ', 'Free', '20', 'Accessories', 'Deodrants', 'Deodrants', 'deo^deodrant^deodrants^womendeo^womensdeo^'),
(80, '10080', 'Mamaearth', 'Men Transparent ME Aqua Deodorant - 120 ml', 'Mamaearth', 'Free', '80', 'Accessories', 'Deodrants', 'Deodrants', 'deo^mensdeo^mendeo^deodrants^deodrant^aquadeo^deos^men'),
(81, '10081', 'JCPL', 'Set of 6 Orange & Blue Solid Ceramic Cups 220 ml each', 'JCPL', '', '100', 'Kitchen', 'Cups & Mugs', 'Cups & Mugs', 'cups^fancycups^solidcups^ceramiccups^cup'),
(82, '10082', 'Servewell', 'Pack Of 31 White Printed Melamine Round Dinner Set', 'Servewell', 'Free', '1000', 'Kitchen', 'Dinnerware', 'Dinnerware', 'dinnerset^dinner^set^whitedinnerset^rounddinnerset^melaminedinnerset^'),
(83, '10083', 'JCPL', 'Set of 6 Orange & Blue Solid Ceramic Cups 220 ml each', 'JCPL', 'Free', '100', 'Kitchen', 'Mugs', 'Mugs', 'cups^fancycups^solidcups^ceramiccups^cup');

-- --------------------------------------------------------

--
-- Table structure for table `product_img`
--

CREATE TABLE `product_img` (
  `id` int(11) NOT NULL,
  `p_id` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_img`
--

INSERT INTO `product_img` (`id`, `p_id`, `thumbnail`, `image`) VALUES
(72, '10054', 'upload/product_img/thumbnail/10054_project_thumb_updated_72.jpg', 'upload/product_img/10054_project_img_updated_72.jpg'),
(74, '10056', 'upload/product_img/thumbnail/10056_project_thumb_74.jpg', 'upload/product_img/10056_project_img_74.jpg'),
(75, '10056', 'upload/product_img/thumbnail/10056_project_thumb_75.jpg', 'upload/product_img/10056_project_img_75.jpg'),
(76, '10056', 'upload/product_img/thumbnail/10056_project_thumb_76.jpg', 'upload/product_img/10056_project_img_76.jpg'),
(77, '10057', 'upload/product_img/thumbnail/10057_project_thumb_77.jpg', 'upload/product_img/10057_project_img_77.jpg'),
(78, '10057', 'upload/product_img/thumbnail/10057_project_thumb_78.jpg', 'upload/product_img/10057_project_img_78.jpg'),
(79, '10057', 'upload/product_img/thumbnail/10057_project_thumb_79.jpg', 'upload/product_img/10057_project_img_79.jpg'),
(80, '10058', 'upload/product_img/thumbnail/10058_project_thumb_80.jpg', 'upload/product_img/10058_project_img_80.jpg'),
(81, '10058', 'upload/product_img/thumbnail/10058_project_thumb_81.jpg', 'upload/product_img/10058_project_img_81.jpg'),
(82, '10058', 'upload/product_img/thumbnail/10058_project_thumb_82.jpg', 'upload/product_img/10058_project_img_82.jpg'),
(83, '10059', 'upload/product_img/thumbnail/10059_project_thumb_83.jpg', 'upload/product_img/10059_project_img_83.jpg'),
(84, '10059', 'upload/product_img/thumbnail/10059_project_thumb_84.jpg', 'upload/product_img/10059_project_img_84.jpg'),
(85, '10059', 'upload/product_img/thumbnail/10059_project_thumb_85.jpg', 'upload/product_img/10059_project_img_85.jpg'),
(86, '10060', 'upload/product_img/thumbnail/10060_project_thumb_86.jpg', 'upload/product_img/10060_project_img_86.jpg'),
(87, '10060', 'upload/product_img/thumbnail/10060_project_thumb_87.jpg', 'upload/product_img/10060_project_img_87.jpg'),
(88, '10060', 'upload/product_img/thumbnail/10060_project_thumb_88.jpg', 'upload/product_img/10060_project_img_88.jpg'),
(89, '10061', 'upload/product_img/thumbnail/10061_project_thumb_89.jpg', 'upload/product_img/10061_project_img_89.jpg'),
(90, '10061', 'upload/product_img/thumbnail/10061_project_thumb_90.jpg', 'upload/product_img/10061_project_img_90.jpg'),
(91, '10062', 'upload/product_img/thumbnail/10062_project_thumb_91.jpg', 'upload/product_img/10062_project_img_91.jpg'),
(92, '10062', 'upload/product_img/thumbnail/10062_project_thumb_92.jpg', 'upload/product_img/10062_project_img_92.jpg'),
(93, '10063', 'upload/product_img/thumbnail/10063_project_thumb_93.jpg', 'upload/product_img/10063_project_img_93.jpg'),
(94, '10063', 'upload/product_img/thumbnail/10063_project_thumb_94.jpg', 'upload/product_img/10063_project_img_94.jpg'),
(95, '10063', 'upload/product_img/thumbnail/10063_project_thumb_95.jpg', 'upload/product_img/10063_project_img_95.jpg'),
(96, '10063', 'upload/product_img/thumbnail/10063_project_thumb_96.jpg', 'upload/product_img/10063_project_img_96.jpg'),
(97, '10064', 'upload/product_img/thumbnail/10064_project_thumb_97.jpg', 'upload/product_img/10064_project_img_97.jpg'),
(98, '10064', 'upload/product_img/thumbnail/10064_project_thumb_98.jpg', 'upload/product_img/10064_project_img_98.jpg'),
(99, '10064', 'upload/product_img/thumbnail/10064_project_thumb_99.jpg', 'upload/product_img/10064_project_img_99.jpg'),
(100, '10065', 'upload/product_img/thumbnail/10065_project_thumb_100.jpg', 'upload/product_img/10065_project_img_100.jpg'),
(101, '10065', 'upload/product_img/thumbnail/10065_project_thumb_101.jpg', 'upload/product_img/10065_project_img_101.jpg'),
(102, '10065', 'upload/product_img/thumbnail/10065_project_thumb_102.jpg', 'upload/product_img/10065_project_img_102.jpg'),
(103, '10065', 'upload/product_img/thumbnail/10065_project_thumb_103.jpg', 'upload/product_img/10065_project_img_103.jpg'),
(104, '10066', 'upload/product_img/thumbnail/10066_project_thumb_104.jpg', 'upload/product_img/10066_project_img_104.jpg'),
(105, '10066', 'upload/product_img/thumbnail/10066_project_thumb_105.jpg', 'upload/product_img/10066_project_img_105.jpg'),
(106, '10066', 'upload/product_img/thumbnail/10066_project_thumb_106.jpg', 'upload/product_img/10066_project_img_106.jpg'),
(107, '10066', 'upload/product_img/thumbnail/10066_project_thumb_107.jpg', 'upload/product_img/10066_project_img_107.jpg'),
(108, '10067', 'upload/product_img/thumbnail/10067_project_thumb_108.jpg', 'upload/product_img/10067_project_img_108.jpg'),
(109, '10067', 'upload/product_img/thumbnail/10067_project_thumb_109.jpg', 'upload/product_img/10067_project_img_109.jpg'),
(110, '10067', 'upload/product_img/thumbnail/10067_project_thumb_110.jpg', 'upload/product_img/10067_project_img_110.jpg'),
(111, '10068', 'upload/product_img/thumbnail/10068_project_thumb_111.jpg', 'upload/product_img/10068_project_img_111.jpg'),
(112, '10069', 'upload/product_img/thumbnail/10069_project_thumb_112.jpg', 'upload/product_img/10069_project_img_112.jpg'),
(113, '10069', 'upload/product_img/thumbnail/10069_project_thumb_113.jpg', 'upload/product_img/10069_project_img_113.jpg'),
(114, '10070', 'upload/product_img/thumbnail/10070_project_thumb_114.jpg', 'upload/product_img/10070_project_img_114.jpg'),
(115, '10071', 'upload/product_img/thumbnail/10071_project_thumb_115.jpg', 'upload/product_img/10071_project_img_115.jpg'),
(116, '10071', 'upload/product_img/thumbnail/10071_project_thumb_116.jpg', 'upload/product_img/10071_project_img_116.jpg'),
(117, '10071', 'upload/product_img/thumbnail/10071_project_thumb_117.jpg', 'upload/product_img/10071_project_img_117.jpg'),
(118, '10072', 'upload/product_img/thumbnail/10072_project_thumb_118.jpg', 'upload/product_img/10072_project_img_118.jpg'),
(119, '10072', 'upload/product_img/thumbnail/10072_project_thumb_119.jpg', 'upload/product_img/10072_project_img_119.jpg'),
(120, '10073', 'upload/product_img/thumbnail/10073_project_thumb_120.jpg', 'upload/product_img/10073_project_img_120.jpg'),
(121, '10073', 'upload/product_img/thumbnail/10073_project_thumb_121.jpg', 'upload/product_img/10073_project_img_121.jpg'),
(122, '10073', 'upload/product_img/thumbnail/10073_project_thumb_122.jpg', 'upload/product_img/10073_project_img_122.jpg'),
(123, '10073', 'upload/product_img/thumbnail/10073_project_thumb_123.jpg', 'upload/product_img/10073_project_img_123.jpg'),
(124, '10074', 'upload/product_img/thumbnail/10074_project_thumb_124.jpg', 'upload/product_img/10074_project_img_124.jpg'),
(125, '10074', 'upload/product_img/thumbnail/10074_project_thumb_125.jpg', 'upload/product_img/10074_project_img_125.jpg'),
(126, '10075', 'upload/product_img/thumbnail/10075_project_thumb_126.jpeg', 'upload/product_img/10075_project_img_126.jpeg'),
(127, '10075', 'upload/product_img/thumbnail/10075_project_thumb_127.jpg', 'upload/product_img/10075_project_img_127.jpg'),
(128, '10075', 'upload/product_img/thumbnail/10075_project_thumb_128.jpeg', 'upload/product_img/10075_project_img_128.jpeg'),
(129, '10075', 'upload/product_img/thumbnail/10075_project_thumb_129.jpeg', 'upload/product_img/10075_project_img_129.jpeg'),
(130, '10076', 'upload/product_img/thumbnail/10076_project_thumb_130.jpeg', 'upload/product_img/10076_project_img_130.jpeg'),
(131, '10076', 'upload/product_img/thumbnail/10076_project_thumb_131.jpeg', 'upload/product_img/10076_project_img_131.jpeg'),
(132, '10076', 'upload/product_img/thumbnail/10076_project_thumb_132.jpeg', 'upload/product_img/10076_project_img_132.jpeg'),
(133, '10076', 'upload/product_img/thumbnail/10076_project_thumb_133.jpeg', 'upload/product_img/10076_project_img_133.jpeg'),
(134, '10077', 'upload/product_img/thumbnail/10077_project_thumb_134.jpg', 'upload/product_img/10077_project_img_134.jpg'),
(135, '10077', 'upload/product_img/thumbnail/10077_project_thumb_135.jpg', 'upload/product_img/10077_project_img_135.jpg'),
(136, '10078', 'upload/product_img/thumbnail/10078_project_thumb_136.jpg', 'upload/product_img/10078_project_img_136.jpg'),
(137, '10078', 'upload/product_img/thumbnail/10078_project_thumb_137.jpg', 'upload/product_img/10078_project_img_137.jpg'),
(138, '10079', 'upload/product_img/thumbnail/10079_project_thumb_138.jpg', 'upload/product_img/10079_project_img_138.jpg'),
(139, '10079', 'upload/product_img/thumbnail/10079_project_thumb_139.jpg', 'upload/product_img/10079_project_img_139.jpg'),
(140, '10080', 'upload/product_img/thumbnail/10080_project_thumb_140.jpg', 'upload/product_img/10080_project_img_140.jpg'),
(141, '10080', 'upload/product_img/thumbnail/10080_project_thumb_141.jpg', 'upload/product_img/10080_project_img_141.jpg'),
(142, '10081', 'upload/product_img/thumbnail/10081_project_thumb_updated_142.jpg', 'upload/product_img/10081_project_img_updated_142.jpg'),
(143, '10081', 'upload/product_img/thumbnail/10081_project_thumb_updated_143.jpg', 'upload/product_img/10081_project_img_updated_143.jpg'),
(144, '10082', 'upload/product_img/thumbnail/10082_project_thumb_144.jpg', 'upload/product_img/10082_project_img_144.jpg'),
(145, '10083', 'upload/product_img/thumbnail/10083_project_thumb_145.jpg', 'upload/product_img/10083_project_img_145.jpg'),
(146, '10083', 'upload/product_img/thumbnail/10083_project_thumb_146.jpg', 'upload/product_img/10083_project_img_146.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyer_details`
--
ALTER TABLE `buyer_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `b_id` (`b_id`);

--
-- Indexes for table `buyer_register`
--
ALTER TABLE `buyer_register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `b_id` (`b_id`),
  ADD UNIQUE KEY `b_email` (`b_email`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_tracking`
--
ALTER TABLE `order_tracking`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `t_id` (`t_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `p_id` (`p_id`);

--
-- Indexes for table `product_img`
--
ALTER TABLE `product_img`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyer_details`
--
ALTER TABLE `buyer_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `buyer_register`
--
ALTER TABLE `buyer_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `order_tracking`
--
ALTER TABLE `order_tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `product_img`
--
ALTER TABLE `product_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
