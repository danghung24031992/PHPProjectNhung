-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2017 at 08:29 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dienthoai`
--

-- --------------------------------------------------------

--
-- Table structure for table `dt_binhluan`
--

CREATE TABLE `dt_binhluan` (
  `id` int(11) NOT NULL,
  `maSP` int(11) NOT NULL,
  `noiDung` text NOT NULL,
  `maKH` varchar(255) NOT NULL,
  `ngayBinhLuan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dt_chitietdonhang`
--

CREATE TABLE `dt_chitietdonhang` (
  `id` int(11) NOT NULL,
  `maDonHang` int(11) NOT NULL,
  `maSP` int(11) NOT NULL,
  `donGia` double NOT NULL,
  `soLuong` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dt_chitietdonhang`
--

INSERT INTO `dt_chitietdonhang` (`id`, `maDonHang`, `maSP`, `donGia`, `soLuong`) VALUES
(80, 65, 148, 9900000, 7),
(79, 65, 165, 9990000, 1),
(78, 64, 164, 4390000, 1),
(77, 64, 167, 19000000, 2),
(81, 65, 151, 18900000, 21),
(82, 66, 167, 19000000, 181),
(83, 67, 168, 26000000, 14),
(84, 68, 168, 26000000, 1),
(85, 69, 129, 18900000, 1),
(86, 70, 167, 19000000, 1),
(87, 71, 150, 19700000, 1),
(88, 72, 146, 18200000, 1),
(89, 73, 163, 4690000, 1),
(90, 74, 170, 123230000, 12),
(91, 75, 170, 123230000, 1),
(92, 76, 167, 19000000, 1),
(93, 77, 167, 19000000, 1),
(94, 78, 167, 19000000, 1),
(95, 79, 167, 19000000, 1),
(96, 80, 167, 19000000, 2),
(97, 81, 167, 19000000, 1),
(98, 82, 164, 4390000, 2),
(99, 83, 167, 19000000, 2),
(100, 84, 177, 19900000, 10),
(101, 85, 177, 19900000, 10),
(102, 86, 173, 10900000, 1),
(103, 87, 177, 19900000, 1),
(104, 88, 164, 4390000, 3),
(105, 88, 177, 19900000, 10),
(106, 89, 177, 19900000, 9),
(107, 90, 158, 4399000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dt_danhmucsp`
--

CREATE TABLE `dt_danhmucsp` (
  `maDanhMuc` int(11) NOT NULL,
  `tenDanhMuc` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dt_danhmucsp`
--

INSERT INTO `dt_danhmucsp` (`maDanhMuc`, `tenDanhMuc`) VALUES
(37, 'Apple'),
(38, 'Samsung'),
(39, 'Nokia'),
(40, 'Sony'),
(41, 'HTC'),
(42, 'Google'),
(43, 'LG'),
(44, 'Asus'),
(45, 'Acer'),
(46, 'Lenovo'),
(47, 'Canon'),
(48, 'Fujifilm'),
(49, 'Nikon'),
(50, 'Genius'),
(52, 'HP'),
(53, 'DELL');

-- --------------------------------------------------------

--
-- Table structure for table `dt_donhang`
--

CREATE TABLE `dt_donhang` (
  `maDH` int(11) NOT NULL,
  `maKH` varchar(255) NOT NULL,
  `ngayDatHang` date NOT NULL,
  `trangThai` int(1) NOT NULL,
  `hinhThucTT` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dt_donhang`
--

INSERT INTO `dt_donhang` (`maDH`, `maKH`, `ngayDatHang`, `trangThai`, `hinhThucTT`) VALUES
(67, 'nhung@gmail.com', '2017-03-08', 1, 'Thanh toÃ¡n báº±ng tiá»n máº·t'),
(66, 'nhung@gmail.com', '2017-03-08', 1, 'Thanh toÃ¡n báº±ng tiá»n máº·t'),
(65, 'nhung@gmail.com', '2017-03-08', 1, 'Thanh toÃ¡n trá»±c tuyáº¿n'),
(64, 'nhung@gmail.com', '2017-03-08', 1, 'Chuyá»ƒn khoáº£n qua NgÃ¢n hÃ ng hoáº·c ATM'),
(68, 'hong@gmail.com', '2017-04-01', 0, 'Thanh toÃ¡n báº±ng tiá»n máº·t'),
(69, 'hong@gmail.com', '2017-04-01', 0, 'Thanh toÃ¡n báº±ng tiá»n máº·t'),
(70, 'hong@gmail.com', '2017-04-01', 0, 'Thanh toÃ¡n báº±ng tiá»n máº·t'),
(71, 'hong@gmail.com', '2017-04-01', 0, 'Thanh toÃ¡n báº±ng tiá»n máº·t'),
(72, 'hong@gmail.com', '2017-04-01', 1, 'Thanh toÃ¡n báº±ng tiá»n máº·t'),
(73, 'hong@gmail.com', '2017-04-01', 0, 'Thanh toÃ¡n báº±ng tiá»n máº·t'),
(74, 'hong@gmail.com', '2017-04-01', 1, 'Thanh toÃ¡n báº±ng tiá»n máº·t'),
(75, 'nhung@gmail.com', '2017-04-02', 0, 'Thanh toÃ¡n báº±ng tiá»n máº·t'),
(76, 'nhung@gmail.com', '2017-04-02', 0, 'Thanh toÃ¡n báº±ng tiá»n máº·t'),
(77, 'nhung@gmail.com', '2017-04-02', 0, 'Thanh toÃ¡n báº±ng tiá»n máº·t'),
(78, 'nhung@gmail.com', '2017-04-02', 0, 'Thanh toÃ¡n báº±ng tiá»n máº·t'),
(79, 'nhung@gmail.com', '2017-04-02', 0, 'Thanh toÃ¡n báº±ng tiá»n máº·t'),
(80, 'nhung@gmail.com', '2017-04-02', 0, 'Thanh toÃ¡n báº±ng tiá»n máº·t'),
(81, 'nhung@gmail.com', '2017-04-02', 0, 'Thanh toÃ¡n báº±ng tiá»n máº·t'),
(82, 'hong@gmail.com', '2017-04-04', 0, 'Thanh toÃ¡n báº±ng tiá»n máº·t'),
(83, 'hong@gmail.com', '2017-04-05', 0, 'Thanh toÃ¡n báº±ng tiá»n máº·t'),
(84, 'hong@gmail.com', '2017-04-07', 1, 'Thanh toÃ¡n báº±ng tiá»n máº·t'),
(85, 'hong@gmail.com', '2017-04-07', 1, 'Thanh toÃ¡n báº±ng tiá»n máº·t'),
(86, 'hong@gmail.com', '2017-04-08', 0, 'Thanh toÃ¡n báº±ng tiá»n máº·t'),
(87, 'hong@gmail.com', '2017-04-11', 0, 'Chuyá»ƒn khoáº£n qua NgÃ¢n hÃ ng hoáº·c ATM'),
(88, 'hong@gmail.com', '2017-04-11', 1, 'Thanh toÃ¡n báº±ng tiá»n máº·t'),
(89, 'hong@gmail.com', '2017-04-11', 1, 'Thanh toÃ¡n báº±ng tiá»n máº·t'),
(90, 'hong@gmail.com', '2017-04-11', 0, 'Thanh toÃ¡n báº±ng tiá»n máº·t');

-- --------------------------------------------------------

--
-- Table structure for table `dt_hinhanhsp`
--

CREATE TABLE `dt_hinhanhsp` (
  `id` int(11) NOT NULL,
  `maSP` int(11) NOT NULL,
  `anh` varchar(255) NOT NULL,
  `kieuanh` bit(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dt_hinhanhsp`
--

INSERT INTO `dt_hinhanhsp` (`id`, `maSP`, `anh`, `kieuanh`) VALUES
(220, 128, '1385545457166.png', b'1'),
(221, 128, '13855454572791.png', b'0'),
(222, 128, '138554545713972.png', b'0'),
(223, 129, '13855468421341.png', b'1'),
(224, 129, '1385546842306.png', b'0'),
(225, 129, '138554684228291.png', b'0'),
(226, 137, '138577656912729.png', b'1'),
(227, 137, '138577656914846.png', b'0'),
(228, 137, '138577656917759.png', b'0'),
(229, 138, '138577713725333.png', b'1'),
(230, 138, '138577713730858.png', b'0'),
(231, 139, '13861202665933.png', b'1'),
(232, 139, '138612026617506.png', b'0'),
(233, 140, '13861210467884.PNG', b'1'),
(234, 140, '138612104629973.PNG', b'0'),
(235, 141, '138642316929903.png', b'1'),
(236, 141, '138642316932348.png', b'0'),
(237, 141, '13864231691381.png', b'0'),
(238, 142, '13864236927282.png', b'1'),
(239, 142, '13864236922243.png', b'0'),
(240, 142, '138642369221824.png', b'0'),
(241, 143, '138642397923934.png', b'1'),
(242, 143, '138642397925311.jpg', b'0'),
(243, 143, '138642397915148.jpg', b'0'),
(244, 144, '138642444918933.png', b'1'),
(245, 144, '138642444921386.PNG', b'0'),
(246, 144, '138642444919963.PNG', b'0'),
(247, 145, '138642481820153.png', b'1'),
(248, 145, '13864248184862.jpg', b'0'),
(249, 145, '138642481810847.jpg', b'0'),
(250, 146, '13864251765273.png', b'1'),
(251, 146, '13864251764958.jpg', b'0'),
(252, 146, '13864251764927.jpg', b'0'),
(253, 147, '13864255275132.png', b'1'),
(254, 147, '138642552724917.jpg', b'0'),
(255, 147, '13864255271898.jpg', b'0'),
(256, 148, '138642592311436.png', b'1'),
(257, 148, '13864259237541.jpg', b'0'),
(258, 148, '138642592324842.jpg', b'0'),
(259, 149, '138642645416954.png', b'1'),
(260, 149, '13864264543819.png', b'0'),
(261, 149, '13864264549288.png', b'0'),
(262, 150, '13864270022368.PNG', b'1'),
(263, 150, '13864270028313.PNG', b'0'),
(264, 150, '138642700225022.PNG', b'0'),
(265, 151, '13864276703451.PNG', b'1'),
(266, 151, '138642767026520.PNG', b'0'),
(267, 151, '13864276707153.PNG', b'0'),
(268, 152, '138642792015984.PNG', b'1'),
(269, 152, '138642792026089.PNG', b'0'),
(270, 153, '1386428204982.PNG', b'1'),
(271, 153, '13864282041623.PNG', b'0'),
(272, 154, '138642852024088.PNG', b'1'),
(273, 154, '13864285204209.PNG', b'0'),
(274, 154, '13864285207766.PNG', b'0'),
(275, 155, '13864287624718.PNG', b'1'),
(276, 155, '13864287623343.PNG', b'0'),
(277, 155, '138642876220892.PNG', b'0'),
(278, 156, '138642901625924.PNG', b'1'),
(279, 156, '13864290161581.PNG', b'0'),
(280, 156, '13864290161890.PNG', b'0'),
(281, 157, '13864292824833.PNG', b'1'),
(282, 157, '138642928218438.PNG', b'0'),
(283, 157, '138642928211975.PNG', b'0'),
(284, 158, '138642990315604.PNG', b'1'),
(285, 158, '138642990331773.PNG', b'0'),
(286, 158, '138642990424210.PNG', b'0'),
(287, 159, '138643021012531.PNG', b'1'),
(288, 159, '13864302104528.PNG', b'0'),
(289, 159, '138643021022569.PNG', b'0'),
(290, 160, '138643069420183.PNG', b'1'),
(291, 160, '138643069417348.PNG', b'0'),
(292, 160, '138643069417069.PNG', b'0'),
(293, 161, '138643112812831.PNG', b'1'),
(294, 161, '138643112831084.PNG', b'0'),
(295, 161, '138643112819253.PNG', b'0'),
(296, 162, '138643132430629.PNG', b'1'),
(297, 162, '138643132426490.PNG', b'0'),
(298, 163, '138643160318914.PNG', b'1'),
(299, 163, '1386431603371.PNG', b'0'),
(300, 163, '138643160322576.PNG', b'0'),
(301, 164, '13868403622317.PNG', b'1'),
(302, 164, '1386840362194.PNG', b'0'),
(303, 165, '138684222427080.PNG', b'1'),
(304, 165, '13868418316672.PNG', b'0'),
(305, 165, '138684183110505.PNG', b'0'),
(308, 166, '138684387626382.PNG', b'1'),
(309, 166, '138684387621807.PNG', b'0'),
(310, 166, '138684387618236.PNG', b'0'),
(311, 167, '149157476220976.png', b'1'),
(312, 168, '148895877828673.jpg', b'1'),
(313, 169, '148895943112924.jpg', b'1'),
(314, 170, '14910573822110.jpg', b'1'),
(315, 171, '149155229229910.png', b'1'),
(316, 172, '14915526071421.png', b'1'),
(317, 173, '1491552938834.jpg', b'1'),
(318, 174, '149155325922761.png', b'1'),
(319, 175, '14915534292414.png', b'1'),
(320, 176, '149155367714351.png', b'1'),
(321, 177, '149155367712115.png', b'1'),
(322, 178, '149155410931894.png', b'1'),
(323, 179, '149155453128695.png', b'1'),
(324, 180, '149155471027652.png', b'1'),
(325, 182, '14915549199047.png', b'1'),
(326, 183, '149156559110125.jpg', b'1'),
(327, 184, '149188981824964.jpg', b'1'),
(328, 185, '149188999228013.jpg', b'1'),
(329, 186, '149189041012741.jpg', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `dt_khachhang`
--

CREATE TABLE `dt_khachhang` (
  `tenKH` varchar(255) NOT NULL,
  `gioiTinh` int(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cmnd` int(11) NOT NULL,
  `diaChi` text NOT NULL,
  `dienThoai` bigint(20) NOT NULL,
  `matKhau` varchar(255) NOT NULL,
  `quyenTruyCap` int(1) NOT NULL,
  `ngayTao` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dt_khachhang`
--

INSERT INTO `dt_khachhang` (`tenKH`, `gioiTinh`, `email`, `cmnd`, `diaChi`, `dienThoai`, `matKhau`, `quyenTruyCap`, `ngayTao`) VALUES
('nhung', 1, 'nhung@gmail.com', 12345556, 'HN', 123456, 'e10adc3949ba59abbe56e057f20f883e', 0, '2017-03-08'),
('nhung', 1, '123456a@gmaill.com', 2147483647, 'hn', 1234567, 'e10adc3949ba59abbe56e057f20f883e', 0, '2017-03-31'),
('hong', 1, 'hong@gmail.com', 123456, 'hn', 123456, 'e10adc3949ba59abbe56e057f20f883e', 0, '2017-04-01'),
('Hồng Nhung', 1, 'admin@gmail.com', 163367136, 'Hà Nội', 949852983, 'e10adc3949ba59abbe56e057f20f883e', 1, '2017-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `dt_lienhe`
--

CREATE TABLE `dt_lienhe` (
  `id` int(11) NOT NULL,
  `tieuDe` text NOT NULL,
  `noiDung` text NOT NULL,
  `traLoi` text NOT NULL,
  `email` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dt_lienhe`
--

INSERT INTO `dt_lienhe` (`id`, `tieuDe`, `noiDung`, `traLoi`, `email`) VALUES
(15, 'dd', 'adasdas', 'hahaahaaa', 'hong@gmail.com'),
(11, 'Ä‘iá»‡n thoáº¡i', 'S8 cÃ³ chÆ°a ak', '', 'hong@gmail.com'),
(16, 'haaaaaa', 'nskndask', '', 'hong@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `dt_loaisanpham`
--

CREATE TABLE `dt_loaisanpham` (
  `maLoaiSP` int(11) NOT NULL,
  `tenLoaiSP` varchar(255) NOT NULL,
  `ghiChu` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dt_loaisanpham`
--

INSERT INTO `dt_loaisanpham` (`maLoaiSP`, `tenLoaiSP`, `ghiChu`) VALUES
(4, 'Äiá»‡n thoáº¡i', NULL),
(5, 'MÃ¡y tÃ­nh báº£ng', NULL),
(6, 'Laptop', NULL),
(7, 'MÃ¡y áº£nh', NULL),
(8, 'MÃ¡y quay phim', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dt_sanpham`
--

CREATE TABLE `dt_sanpham` (
  `maSP` int(11) NOT NULL,
  `tenSanPham` varchar(255) NOT NULL,
  `maDM` int(11) NOT NULL,
  `maLoai` varchar(255) NOT NULL,
  `giaNhap` double NOT NULL,
  `giaBan` double NOT NULL,
  `soLuong` int(11) NOT NULL,
  `ngaySX` date DEFAULT NULL,
  `tinhNang` text NOT NULL,
  `loaiManHinh` text,
  `doPhanGiai` varchar(255) DEFAULT NULL,
  `kichThuot` varchar(255) DEFAULT NULL,
  `camUng` varchar(50) DEFAULT NULL,
  `heDieuHanh` text,
  `kieuDang` varchar(255) DEFAULT NULL,
  `trongLuong` varchar(255) DEFAULT NULL,
  `baoHanh` varchar(255) DEFAULT NULL,
  `ngayTao` date NOT NULL,
  `nguoiTao` varchar(255) NOT NULL,
  `loaimay` varchar(255) DEFAULT NULL,
  `zoom` varchar(255) DEFAULT NULL,
  `phangiaicamera` varchar(255) DEFAULT NULL,
  `cambien` varchar(255) DEFAULT NULL,
  `donhaysang` varchar(255) DEFAULT NULL,
  `tieucu` varchar(255) DEFAULT NULL,
  `khaudo` varchar(255) DEFAULT NULL,
  `dinhdang` varchar(255) DEFAULT NULL,
  `cpu` varchar(255) DEFAULT NULL,
  `ram` varchar(255) DEFAULT NULL,
  `rom` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dt_sanpham`
--

INSERT INTO `dt_sanpham` (`maSP`, `tenSanPham`, `maDM`, `maLoai`, `giaNhap`, `giaBan`, `soLuong`, `ngaySX`, `tinhNang`, `loaiManHinh`, `doPhanGiai`, `kichThuot`, `camUng`, `heDieuHanh`, `kieuDang`, `trongLuong`, `baoHanh`, `ngayTao`, `nguoiTao`, `loaimay`, `zoom`, `phangiaicamera`, `cambien`, `donhaysang`, `tieucu`, `khaudo`, `dinhdang`, `cpu`, `ram`, `rom`) VALUES
(151, 'Sony Vaio Fit SVF1421DSG', 40, '6', 16700000, 18900000, 50, '2013-12-02', 'PIN/Battery: VGP-BPS35A', 'HD', '1366 x 768 pixels', '14 inch, HD', 'KhÃ´ng', 'Windows 8 Single Language,64-bit', 'Thanh (Tháº³ng)', '2200', '24', '2013-12-07', 'admin@gmail.com', '', '', '', '', '', '', '', '', 'Intel, Core i3, 3217U, 1.80 GHz', 'DDR3 (2 khe RAM), 2 GB', 'HDD, 500 GB'),
(129, 'iPhone 4 8GB', 37, '4', 16900000, 18900000, 50, '2013-11-02', 'Dung lÆ°á»£ng pin: 1420 mAh', 'DVGA, 3.5', '', '', 'CÃ³', 'iOS 7.0', 'Thanh (Tháº³ng)', '', '36', '2013-11-27', 'admin@gmail.com', '', '', '', '', '', '', '', '', 'Solo-core 1 GHz', '', ''),
(150, 'Sony Vaio Fit SVF1421ESG', 40, '6', 16700000, 19700000, 50, '2013-12-01', 'PIN/Battery: VGP-BPS35A', 'LED', '', '14.0"', 'KhÃ´ng', 'Window 8 SL, 64Bit', 'Thanh (Tháº³ng)', '2.20', '24', '2013-12-07', 'admin@gmail.com', '', '', '', '', '', '', '', '', 'Intel, Pentium, 987, 1.50 GHz', '2GB', '500GB'),
(141, 'Samsung Galaxy Trend Plus', 38, '4', 3000000, 3990000, 50, '2013-11-01', 'Dung lÆ°á»£ng pin: 1500 mAh', 'WVGA', '4.0', '480 x 800 pixels', 'CÃ³', 'Android 4.2', 'Thanh (Tháº³ng)', '118', '18', '2013-12-07', 'admin@gmail.com', '', '', '', '', '', '', '', '', 'Broadcom BCM21664, 2 nhÃ¢n, 1.2 GHz', '768 MB', '4 GB'),
(142, 'LG G2 D802 16GB', 43, '4', 10400000, 11900000, 50, '2013-11-04', 'Dung lÆ°á»£ng pin: 3000 mAh', 'Full HD', '1080 x 1920 pixels', '5.2"', 'CÃ³', 'Android 4.2.2 (Jelly Bean)', 'Thanh (Tháº³ng)', '45', '18', '2013-12-07', 'admin@gmail.com', '', '', '', '', '', '', '', '', 'Qualcomm Snapdragon 800, 4 nhÃ¢n, 2.26 GHz', '2 GB', '16 GB'),
(137, 'Canon PowerShot A2500', 47, '7', 3000000, 4000000, 10, '2013-11-01', '', 'TFT LCD, 2.7 inch', '16 MP', '', 'KhÃ´ng', '', 'Thanh (Tháº³ng)', '', '', '2013-11-30', 'admin@gmail.com', '', '5x', '', '', '', '', '', '', '', '', ''),
(138, 'Nikon Coolpix S3500', 47, '7', 3000000, 4000000, 10, '2013-11-01', '', 'TFT LCD, 2.7 inch', '16 MP', '', 'KhÃ´ng', '', 'Thanh (Tháº³ng)', '', '18', '2013-11-30', 'admin@gmail.com', '', '5x', '', '', '', '3', '4', '', '', '', ''),
(139, 'HTC 8S', 41, '4', 5990000, 7990000, 10, '2013-12-01', '', 'WVGA, 4.0 inches', '', '', '', 'Windows Phone 8', '', '', '', '2013-12-04', 'admin@gmail.com', '', '', '', '', '', '', '', '', 'Dual-core 1GHz', '', ''),
(140, 'Nokia Asha 501 Dual', 39, '4', 17500000, 18500000, 10, '2013-12-01', '', 'QVGA, 3.0 inches', '', '', '', 'Nokia Asha platform 1.0', 'Thanh (Tháº³ng)', '', '18', '2013-12-04', 'admin@gmail.com', '', '', '', '', '', '', '', '', '', '', ''),
(143, 'Lenovo A369i', 46, '4', 1200000, 1890000, 50, '2013-12-02', 'Tháº» nhá»› ngoÃ i Ä‘áº¿n: 32 GB', 'WVGA', '480 x 800 pixels', '4.0"', 'CÃ³', 'Android 4.2 (Jelly Bean)', 'Thanh (Tháº³ng)', '44', '24', '2013-12-07', 'admin@gmail.com', '', '', '', '', '', '', '', '', 'MTK 6572, 2 nhÃ¢n, 1.3 GHz', '512 MB', '4 GB'),
(144, 'Sungsung Galaxy S4 i9500', 38, '4', 12400000, 14290000, 50, '2013-12-02', 'Tháº» nhá»› tá»‘i Ä‘a: 64 GB', 'Full HD', '1080 x 1920 pixels', '5.0', 'CÃ³', 'Android 4.2.2 (Jelly Bean)', 'Thanh (Tháº³ng)', '118', '24', '2013-12-07', 'admin@gmail.com', '', '', '', '', '', '', '', '', 'Exynos 5410, 8 nhÃ¢n, 8 nhÃ¢n (2 lÃµi 4 nhÃ¢n: Quad-core 1.6 GHz Cortex-A15 - Quad-core 1.2 GHz Cortex-A7)', '2 GB', '16 GB'),
(145, 'Galaxy Mega 5.8 Duos I9152', 38, '4', 7450000, 8690000, 50, '2013-12-02', 'Tháº» nhá»› ngoÃ i Ä‘áº¿n: 64 GB', 'qHD', '540 x 960 pixels', '5.8', 'CÃ³', 'Android 4.2.2 (Jelly Bean)', 'Thanh (Tháº³ng)', '99', '24', '2013-12-07', 'admin@gmail.com', '', '', '', '', '', '', '', '', '2 nhÃ¢n, 1.4 GHz', '1.5 GB', '8 GB'),
(146, 'Sony Xperia Tablet Z', 40, '5', 16700000, 18200000, 50, '2013-12-04', 'Káº¿t ná»‘i: CÃ³ 3G ( tá»‘c Ä‘á»™ Download 21 Mbps, Upload 5.76 Mbps), Wifi chuáº©n 802.11 a/b/g/n', 'LED-backlit IPS LCD', '', '10.1 inch', '', 'Android 4.2', 'Thanh (Tháº³ng)', '220', '24', '2013-12-07', 'admin@gmail.com', '', '', '', '', '', '', '', '', 'Qualcomm Snapdragon S4 Pro, 1.5 GHz', '2 GB', '16 GB'),
(147, 'Lenovo ThinkPad Tablet 2', 46, '5', 12400000, 14290000, 50, '2013-12-02', 'Káº¿t Ná»‘i: LTE, CÃ³ 3G ( tá»‘c Ä‘á»™ Download 21 Mbps), Wifi chuáº©n 802.11 a/b/g/n', 'LED-backlit IPS LCD', '', '10.1', 'CÃ³', 'Windows 8 Pro', 'Thanh (Tháº³ng)', '58', '24', '2013-12-07', 'admin@gmail.com', '', '', '', '', '', '', '', '', 'Dual core 1.8 GHz', '2GB', '64GB'),
(148, 'Asus MemoPad FHD', 44, '5', 7700000, 9900000, 50, '2013-12-04', 'Káº¿t ná»‘i: CÃ³ 3G ( tá»‘c Ä‘á»™ Download 21 Mbps, Upload 5.76 Mbps), Wifi chuáº©n 802.11 a/b/g/n', 'IPS LCD Full HD', '', '10.1 inch', 'CÃ³', 'Android 4.2', 'Thanh (Tháº³ng)', '118', '24', '2013-12-07', 'admin@gmail.com', '', '', '', '', '', '', '', '', 'Quad-core, 1.5 GHz', '2 GB', '16 GB'),
(149, 'Galaxy Note 10.1 (16GB)', 38, '5', 10000000, 13900000, 50, '2013-12-04', 'Káº¿t ná»‘i: CÃ³ 3G ( tá»‘c Ä‘á»™ Download 21 Mbps), Wifi chuáº©n 802.11 a/b/g/n', 'PLS LCD,16 triá»‡u mÃ u', '', '10.1 inch', 'CÃ³', 'Android 4.0', 'Thanh (Tháº³ng)', '583', '24', '2013-12-07', 'admin@gmail.com', '', '', '', '', '', '', '', '', 'Quad-core Cortex-A9, 1.4 GHz', '2 GB', '16 GB'),
(152, 'Samsung 270E4V', 38, '6', 8000000, 9900000, 50, '2013-12-05', 'PIN/Battery Lithium-ion 6 cell', '', '', '14 inch', 'KhÃ´ng', 'Linux', 'Thanh (Tháº³ng)', '2200', '24', '2013-12-07', 'admin@gmail.com', '', '', '', '', '', '', '', '', 'Core i3, 3120M, 2.50 GHz', 'DDR3 (2 khe RAM), 4 GB', 'HDD, 500 GB'),
(153, 'Apple MacBook Air MD760', 37, '6', 22600000, 29900000, 50, '2013-12-02', 'Card MH: Intel HD 5000', 'Full HD', '1440 x 900 pixels', '13.3 inch', 'KhÃ´ng', 'Mac OS X', 'Thanh (Tháº³ng)', '2200', '24', '2013-12-07', 'admin@gmail.com', '', '', '', '', '', '', '', '', 'Intel, Core i5 Haswell, 4250U, 1.30 GHz', 'DDR3L(On board), 4 GB', 'SSD, 128 GB'),
(154, 'Samsung 470R4E', 38, '6', 12400000, 14290000, 50, '2013-12-02', '', 'Full HD', '1366 x 768 pixels', '14 inch', 'KhÃ´ng', 'Windows 8 Single Language,64-bit', 'Thanh (Tháº³ng)', '1900', '18', '2013-12-07', 'admin@gmail.com', '', '', '', '', '', '', '', '', 'Intel Core i5, 2.60GHz', 'DDR3 (2 khe RAM), 4 GB', 'HDD, 500 GB'),
(155, 'Sony Vaio Fit SVF15A1', 40, '6', 16700000, 18900000, 50, '2013-12-01', 'Äá»“ há»a NVIDIAÂ® GeForceÂ® GT 735M, 2 GB', 'Full HD', '1366 x 768 pixels', '15.5 inch', 'CÃ³', 'Windows 8 Single Language,64-bit', 'Thanh (Tháº³ng)', '2200', '18', '2013-12-07', 'admin@gmail.com', '', '', '', '', '', '', '', '', 'Intel, Core i5 Ivy Bridge, 3337U, 1.80 GHz', 'DDR3 (on board), 4 GB', 'HDD + SSD, HDD: 750GB + SSD: 8GB'),
(156, 'Acer Aspire V5', 45, '6', 12400000, 14290000, 50, '2013-12-02', '', 'LED', '1366 x 768 pixels', '14 inch', 'KhÃ´ng', 'Linux', 'Thanh (Tháº³ng)', '2200', '24', '2013-12-07', 'admin@gmail.com', '', '', '', '', '', '', '', '', 'Intel Core i3, 1.7GHz', 'DDR3L(On board), 4 GB', 'HDD, 500 GB'),
(157, 'Asus X450CC 33214G50G', 44, '6', 10000000, 14290000, 50, '2013-12-02', 'PIN/Battery Lithium-ion 4 cell', 'Full HD', '1366 x 768 pixels', '14 inch', 'KhÃ´ng', 'Linux', 'Thanh (Tháº³ng)', '2200', '24', '2013-12-07', 'admin@gmail.com', '', '', '', '', '', '', '', '', 'Intel, Core i3, 3217U, 1.80 GHz', 'DDR3 (1 Khe + Onboard), 4 GB', 'HDD, 500 GB'),
(158, 'Nikon Coolpix L820', 49, '7', 3399000, 4399000, 50, '2013-12-01', '', 'LCD', '', '3 inch', 'CÃ³', '', 'Thanh (Tháº³ng)', '', '24', '2013-12-07', 'admin@gmail.com', 'MÃ¡y áº£nh ká»¹ thuáº­t sá»‘', '30x', '16.0', 'CMOS', 'Auto, 125-3200', '4.0-120.0mm', 'F3.0-F5.8', 'JPEG', '', '', ''),
(159, 'Nikon D5100', 49, '7', 3000000, 4700000, 50, '2013-12-02', 'KÃ­ch thÆ°á»›c sáº£n pháº©m (D x R x C cm) 9.6 x 12.4 x 7.45 cm', 'TFT LCD', '', '3 inch', 'CÃ³', '', 'Thanh (Tháº³ng)', '', '12', '2013-12-07', 'admin@gmail.com', 'MÃ¡y áº£nh ká»¹ thuáº­t sá»‘', '30x', '16.2', 'CMOS', 'Auto, 125-3200', '4.0-120.0mm', 'F3.0-F5.8', 'RAW|JPEG', '', '', ''),
(160, 'Fujifilm FinePix XP150', 48, '7', 3200000, 4200000, 50, '2013-11-12', '', 'LCD', '', '2.7 inch', '', '', 'Thanh (Tháº³ng)', '118', '12', '2013-12-07', 'admin@gmail.com', 'MÃ¡y áº£nh kÄ© thuáº­t sá»‘', '5.0', '14.4', 'CMOS', 'Auto, 100-3200', '5.0-25.0mm', 'F3.9-F4.9', 'JPEG', '', '', ''),
(161, 'Nikon Coolpix S01', 49, '7', 3000000, 3339000, 50, '2013-10-01', 'KÃ­ch thÆ°á»›c sáº£n pháº©m (D x R x C cm) 7.7 x 1.72 x 5.12 cm', 'LCD', '', '2.5 inch', 'CÃ³', '', 'Thanh (Tháº³ng)', '', '12', '2013-12-07', 'admin@gmail.com', 'MÃ¡y áº£nh ká»¹ thuáº­t sá»‘', '3.0', '10.1', 'CCD', 'Auto, 80 â€“ 1600', '4.1-12.3mm', 'F3.0-F5.8', 'RAW|JPEG', '', '', '7.3GB'),
(162, 'Nikon Laser 550A S', 49, '7', 3000000, 4799000, 50, '2013-09-02', 'KÃ­ch thÆ°á»›c sáº£n pháº©m (D x R x C cm) 6.9 x 4.5 x 0.21 cm', 'LCD', '', '3 inch', 'CÃ³', '', 'Thanh (Tháº³ng)', '45', '12', '2013-12-07', 'admin@gmail.com', 'MÃ¡y áº£nh ká»¹ thuáº­t sá»‘', '30x', '10.1', 'CMOS', 'Auto, 125-3200', '4.0-120.0mm', 'F3.0-F5.8', 'RAW|JPEG', '', '', '16 GB'),
(163, 'Sony Cybershot DSC-W730', 40, '7', 2700000, 4690000, 50, '2013-09-04', 'KÃ­ch cá»¡ mÃ¡y (Dimensions) 93.1mm x 52.3mm x 22.5mm ', 'LCD', '', '3 inch', 'CÃ³', '', 'Thanh (Tháº³ng)', '118', '12', '2013-12-07', 'admin@gmail.com', 'MÃ¡y áº£nh ká»¹ thuáº­t sá»‘', '30x', '10.1', 'CMOS', 'Auto, 80 â€“ 1600', '4.1-12.3mm', 'F3.0-F5.8', 'RAW|JPEG', '', '', '16 GB'),
(164, 'Samsung Galaxy Ace 3 S7270', 38, '4', 3490000, 4390000, 50, '2013-09-02', 'Camera: 5.0 MP, Quay phim HD 720p@30fps', 'WVGA', '480 x 800 pixels', '4.0 inches', 'CÃ³', 'Android 4.2 (Jelly Bean)', 'Thanh (Tháº³ng)', '99', '24', '2013-12-12', 'admin@gmail.com', '', '', '', '', '', '', '', '', 'Dual-core 1 GHz', '1 GB', '4 GB'),
(165, 'Samsung Galaxy Round', 38, '4', 7450000, 9990000, 50, '2013-09-02', 'Camera: 13 MP, Quay phim 4K 2160p@30fps', 'Full HD, 5.7 inch', '1080 x 1920 pixels', '5.0 inches', 'CÃ³', 'Android 4.3 (Jelly Bean)', 'Thanh (Tháº³ng)', '99', '24', '2013-12-12', 'admin@gmail.com', '', '', '', '', '', '', '', '', 'Qualcomm Snapdragon 800, 4 nhÃ¢n, 2.3 GHz', '64GB', '32 GB'),
(166, 'Samsung Galaxy Grand 2', 38, '4', 12700000, 14700000, 50, '2013-09-08', 'Camera: 8.0 MP, Quay phim FullHD 1080p@30fps', 'HD', '720 x 1280 pixels', '5.25 inches', 'CÃ³', 'Android 4.3 (Jelly Bean)', 'Thanh (Tháº³ng)', '99', '24', '2013-12-12', 'admin@gmail.com', '', '', '', '', '', '', '', '', 'Quad-core 1.2 GHz', '1.5 GB', '8 GB'),
(167, 'Galaxy S7', 38, '4', 17000000, 19000000, 20, '2017-05-01', '', '5.5 inch ', '1440 x 2560 pixels', '	150.9 x 72.6 x 7.7 mm ', 'CÃ³', 'Android 6.0 (Marshmallow)', 'Thanh (Tháº³ng)', '157g', '12', '2017-03-08', 'admin@gmail.com', '', '', '', '', '', '', '', '', 'Octa-core', '4 GB', '32 GB'),
(168, 'Iphone 7 plus 128gb', 37, '4', 23000000, 26000000, 2, '2017-03-01', '', '	Retina ', '1920 x 1080 pixels', '158.2 x 77.9 x 7.3 mm', '', 'iOS 10', 'Thanh (Tháº³ng)', '188 g', '12', '2017-03-08', 'admin@gmail.com', '', '', '', '', '', '', '', '', 'Quad-core 2.34 GHz', '3GB', '128 GB'),
(169, 'MÃY QUAY PHIM SONY HDR-CX405', 40, '8', 4000000, 5500000, 15, '2017-03-01', '', 'Cáº£m biáº¿n Exmor RÂ® CMOS', '9.2 megapixel', '123', 'CÃ³', '', 'Xoay', '388 g', '12', '2017-03-08', 'admin@gmail.com', 'Sony HDR-CX405', ' 30x, Zoom sá»‘ 350x', '9.2 megapixel ', 'Exmor RÂ® CMOS', '123', '26,8mm', '', '', '', '', ''),
(171, 'LAPTOP HP 15-AY538TU', 52, '6', 7000000, 8900000, 50, '2017-01-14', '', 'HD', '1366 x 768 pixels', '15.6 inch', 'KhÃ´ng', 'Dos', 'Thanh (Tháº³ng)', '2,19 kg', '12', '2017-04-07', 'admin@gmail.com', '', '', '', '', '', '', '', '', 'Intel, Coreâ„¢ i3 Skylake, 6006U, 2.0 Ghz', '4 GB', ''),
(172, 'DELL INSPIRON N7566A P65F001', 53, '6', 23000000, 25000000, 50, '2016-12-02', '', 'FullHD', '1920 x 1080', '15.6 inch IPS, ', 'KhÃ´ng', 'Windows 10', '', '2,6 kg', '12', '2017-04-07', 'admin@gmail.com', '', '', '', '', '', '', '', '', 'Intel, Coreâ„¢ i7 Skylake (4 cores -8 Threads), 6700HQ, 2.6 GHz', 'DDR4L, 8GB', ''),
(173, 'SAMSUNG GALAXY A7 SM-A720F - VÃ€NG', 38, '4', 9000000, 10900000, 50, '2017-03-01', '', 'Super AMOLED Touchscreen', '1080 x 1920pixels', '5.7 inch', 'CÃ³', 'Android OS, v6.0.1', 'Thanh (Tháº³ng)', '', '12', '2017-04-07', 'admin@gmail.com', '', '', '', '', '', '', '', '', '', '3GB', '32 GB'),
(174, 'Sony Xperia XZs', 40, '4', 13000000, 14900000, 50, '0000-00-00', '', 'IPS LCD, Full HD', '1080 x 1920 pixels', ' 5.2"', 'CÃ³', '	Android 7.0', 'Thanh (Tháº³ng)', '161 g', '12', '2017-04-07', 'admin@gmail.com', '', '', '', '', '', '', '', '', '	Snapdragon 820 4 nhÃ¢n 64-bit', '4 GB', '64 GB'),
(175, 'Samsung Galaxy C9 Pro', 38, '4', 10000000, 11400000, 50, '2017-04-07', '', '	Super AMOLED,  Full HD', '', '6"', 'CÃ³', '	Android 6.0 (Marshmallow)', 'Thanh (Tháº³ng)', '189 g', '12', '2017-04-07', 'admin@gmail.com', '', '', '', '', '', '', '', '', '	Snapdragon 653 8 nhÃ¢n 64-bit', '6 GB', '64 GB'),
(176, ' iPhone 6s Plus 64GB', 37, '4', 18500000, 19900000, 50, '2016-12-30', '', '	LED-backlit IPS LCD, Retina HD', '', ' 5.5"', 'CÃ³', '	iOS 9', 'Thanh (Tháº³ng)', '192 g', '12', '2017-04-07', 'admin@gmail.com', '', '', '', '', '', '', '', '', '	Apple A9 2 nhÃ¢n 64-bit', '2 GB', '64 GB'),
(177, ' iPhone 6s Plus 64GB', 37, '4', 18500000, 19900000, 50, '2016-12-30', '', '	LED-backlit IPS LCD, Retina HD', '', ' 5.5"', 'CÃ³', '	iOS 9', 'Thanh (Tháº³ng)', '192 g', '12', '2017-04-07', 'admin@gmail.com', '', '', '', '', '', '', '', '', '	Apple A9 2 nhÃ¢n 64-bit', '2 GB', '64 GB'),
(178, 'iPhone 7 128GB RED.', 37, '4', 23000000, 26000000, 50, '2017-04-08', '', 'LED-backlit IPS LCD, 4.7", Retina HD', '', '4,7''', 'CÃ³', 'iOS 10', 'Thanh (Tháº³ng)', '', '18', '2017-04-07', 'admin@gmail.com', '', '', '', '', '', '', '', '', 'GPU 6 nhÃ¢n', '2 GB', '128 GB'),
(179, 'Samsung Galaxy Tab A6 10.1 Spen', 38, '5', 8000000, 8990000, 50, '2016-07-12', '', '	PLS LCD', '', '10.1"', 'CÃ³', '	Android 6.0 (Marshmallow)', 'Thanh (Tháº³ng)', '560 g', '12', '2017-04-07', 'admin@gmail.com', '', '', '', '', '', '', '', '', '	Exynos 7870 8 nhÃ¢n', '3GB', '16 GB'),
(180, 'iPad Mini 4 Wifi 32GB', 37, '5', 9700000, 10400000, 20, '2017-02-02', '', '	LED backlit LCD', '', '7,9"', '', '	iOS 9', 'Thanh (Tháº³ng)', '', '12', '2017-04-07', 'admin@gmail.com', '', '', '', '', '', '', '', '', '	Apple A8, 1.5 GHz', '2GB', '32 GB'),
(184, 'SONY AXP35 4K', 40, '8', 21000000, 23000000, 50, '2016-04-03', '', '7.5cm (3.0 type) Xtra Fine LCDâ„¢ (921 600dots) Wide(16:9)', 'XAVC S 4K : 3840x2160/25p, 24p', '7.5cm (3.0 type) Xtra Fine LCDâ„¢ (921 600dots) Wide(16:9)', 'KhÃ´ng', '', 'Báº­t náº¯p', '625g', '12', '2017-04-11', 'admin@gmail.com', 'FDR-AXP35 ', '10x, Zoom KTS: 120x, Clear Image Zoom: 4K - 15x, HD - 20x', 'L: 20.6 Megapixels 16:9 (6048x3400),15.4 Megapixels 4:3 (4528x3400)', '', '', '', '', '', '', '', ''),
(182, 'Samsung Galaxy Tab E 9.6 ', 38, '5', 4000000, 4900000, 20, '2017-02-03', '', 'WXGA TFT', '', '9,6"', 'CÃ³', '	Android 4.4', 'Thanh (Tháº³ng)', '', '12', '2017-04-07', 'admin@gmail.com', '', '', '', '', '', '', '', '', '	Spreadtrum 4 nhÃ¢n, 1.3 GHz', '1,5 GB', '8 GB'),
(183, ' iPad Pro 9.7 inch Wifi 32GB', 37, '5', 13000000, 14900000, 20, '2017-04-06', '', '	LED backlit LCD', '', '9.7', 'CÃ³', 'iOS 9', 'Thanh (Tháº³ng)', '', '12', '2017-04-07', 'admin@gmail.com', '', '', '', '', '', '', '', '', 'Apple A9X 2 nhÃ¢n 64-bit, 2.16 GHz', '2 GB', '32 GB'),
(185, 'SONY PXW-X200 - CHÃNH HÃƒNG', 40, '8', 156000000, 165000000, 20, '2016-04-09', '', 'Cáº£m biáº¿n: 3x1/2" CMOS Exmor', '', '', 'KhÃ´ng', '', '', '2,19 kg', '12', '2017-04-11', 'admin@gmail.com', '', '', '', '', '', '', '', '', '', '', ''),
(186, 'MÃ¡y quay tháº» nhá»›', 40, '8', 500000, 800000, 20, '2016-04-10', '', 'TFT LCD 2.7"', ' 8MP', '2,7"', '', '', '', '300 g', '6', '2017-04-11', 'admin@gmail.com', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `dt_thanhtoan`
--

CREATE TABLE `dt_thanhtoan` (
  `id` int(11) NOT NULL,
  `tenKH` varchar(255) NOT NULL,
  `diaChi` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `dienThoai` varchar(255) NOT NULL,
  `maHoaDon` int(11) NOT NULL,
  `kieuKH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dt_thanhtoan`
--

INSERT INTO `dt_thanhtoan` (`id`, `tenKH`, `diaChi`, `email`, `dienThoai`, `maHoaDon`, `kieuKH`) VALUES
(1, 'nhung', 'HN', 'nhung@gmail.com', '123456', 64, 0),
(2, 'nhung', 'HN', 'nhung@gmail.com', '123456', 64, 1),
(3, 'nhung', 'HN', 'nhung@gmail.com', '123456', 65, 0),
(4, 'nhung', 'HN', 'nhung@gmail.com', '123456', 65, 1),
(5, 'nhung', 'HN', 'nhung@gmail.com', '123456', 66, 0),
(6, 'nhung', 'HN', 'nhung@gmail.com', '123456', 66, 1),
(7, 'nhung', 'HN', 'nhung@gmail.com', '123456', 67, 0),
(8, 'nhung', 'HN', 'nhung@gmail.com', '123456', 67, 1),
(9, 'hong', 'hn', 'hong@gmail.com', '123456', 68, 0),
(10, 'hong', 'hn', 'hong@gmail.com', '123456', 68, 1),
(11, 'hong', 'hn', 'hong@gmail.com', '123456', 69, 0),
(12, 'hong', 'hn', 'hong@gmail.com', '123456', 69, 1),
(13, 'hong', 'hn', 'hong@gmail.com', '123456', 70, 0),
(14, 'hong', 'hn', 'hong@gmail.com', '123456', 70, 1),
(15, 'hong', 'hn', 'hong@gmail.com', '123456', 71, 0),
(16, 'hong', 'hn', 'hong@gmail.com', '123456', 71, 1),
(17, 'hong', 'hn', 'hong@gmail.com', '123456', 72, 0),
(18, 'hong', 'hn', 'hong@gmail.com', '123456', 72, 1),
(19, 'hong', 'hn', 'hong@gmail.com', '123456', 73, 0),
(20, 'hong', 'hn', 'hong@gmail.com', '123456', 73, 1),
(21, 'hong', 'hn', 'hong@gmail.com', '123456', 74, 0),
(22, 'hong', 'hn', 'hong@gmail.com', '123456', 74, 1),
(23, 'nhung', 'HN', 'nhung@gmail.com', '123456', 75, 0),
(24, 'nhung', 'HN', 'nhung@gmail.com', '123456', 75, 1),
(25, 'nhung', 'HN', 'nhung@gmail.com', '123456', 76, 0),
(26, 'nhung', 'HN', 'nhung@gmail.com', '123456', 76, 1),
(27, 'nhung', 'HN', 'nhung@gmail.com', '123456', 77, 0),
(28, 'nhung', 'HN', 'nhung@gmail.com', '123456', 77, 1),
(29, 'nhung', 'HN', 'nhung@gmail.com', '123456', 78, 0),
(30, 'nhung', 'HN', 'nhung@gmail.com', '123456', 78, 1),
(31, 'nhung', 'HN', 'nhung@gmail.com', '123456', 79, 0),
(32, 'nhung', 'HN', 'nhung@gmail.com', '123456', 79, 1),
(33, 'nhung', 'HN', 'nhung@gmail.com', '123456', 80, 0),
(34, 'nhung', 'HN', 'nhung@gmail.com', '123456', 80, 1),
(35, 'nhung', 'HN', 'nhung@gmail.com', '123456', 81, 0),
(36, 'nhung', 'HN', 'nhung@gmail.com', '123456', 81, 1),
(37, 'hong', 'hn', 'hong@gmail.com', '123456', 82, 0),
(38, 'hong', 'hn', 'hong@gmail.com', '123456', 82, 1),
(39, 'hong', 'hn', 'hong@gmail.com', '123456', 83, 0),
(40, 'hong', 'hn', 'hong@gmail.com', '123456', 83, 1),
(41, 'hong', 'hn', 'hong@gmail.com', '123456', 84, 0),
(42, 'hong', 'hn', 'hong@gmail.com', '123456', 84, 1),
(43, 'hong', 'hn', 'hong@gmail.com', '123456', 85, 0),
(44, 'hong', 'hn', 'hong@gmail.com', '123456', 85, 1),
(45, 'hong', 'hn\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'hong@gmail.com', '123456', 86, 0),
(46, 'MAI', 'kdks', '', '009800', 86, 1),
(47, 'hong', 'hn', 'hong@gmail.com', '123456', 87, 0),
(48, 'hong', 'hn', 'hong@gmail.com', '123456', 87, 1),
(49, 'hong', 'hn', 'hong@gmail.com', '123456', 88, 0),
(50, 'hong', 'hn', 'hong@gmail.com', '123456', 88, 1),
(51, 'hong', 'hn', 'hong@gmail.com', '123456', 89, 0),
(52, 'hong', 'hn', 'hong@gmail.com', '123456', 89, 1),
(53, 'hong', 'hn', 'hong@gmail.com', '123456', 90, 0),
(54, 'hong', 'hn', 'hong@gmail.com', '123456', 90, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dt_binhluan`
--
ALTER TABLE `dt_binhluan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dt_chitietdonhang`
--
ALTER TABLE `dt_chitietdonhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dt_danhmucsp`
--
ALTER TABLE `dt_danhmucsp`
  ADD PRIMARY KEY (`maDanhMuc`);

--
-- Indexes for table `dt_donhang`
--
ALTER TABLE `dt_donhang`
  ADD PRIMARY KEY (`maDH`);

--
-- Indexes for table `dt_hinhanhsp`
--
ALTER TABLE `dt_hinhanhsp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dt_khachhang`
--
ALTER TABLE `dt_khachhang`
  ADD PRIMARY KEY (`email`,`cmnd`);

--
-- Indexes for table `dt_lienhe`
--
ALTER TABLE `dt_lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dt_loaisanpham`
--
ALTER TABLE `dt_loaisanpham`
  ADD PRIMARY KEY (`maLoaiSP`);

--
-- Indexes for table `dt_sanpham`
--
ALTER TABLE `dt_sanpham`
  ADD PRIMARY KEY (`maSP`);

--
-- Indexes for table `dt_thanhtoan`
--
ALTER TABLE `dt_thanhtoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dt_binhluan`
--
ALTER TABLE `dt_binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dt_chitietdonhang`
--
ALTER TABLE `dt_chitietdonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `dt_danhmucsp`
--
ALTER TABLE `dt_danhmucsp`
  MODIFY `maDanhMuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `dt_donhang`
--
ALTER TABLE `dt_donhang`
  MODIFY `maDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `dt_hinhanhsp`
--
ALTER TABLE `dt_hinhanhsp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=330;
--
-- AUTO_INCREMENT for table `dt_lienhe`
--
ALTER TABLE `dt_lienhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `dt_loaisanpham`
--
ALTER TABLE `dt_loaisanpham`
  MODIFY `maLoaiSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `dt_sanpham`
--
ALTER TABLE `dt_sanpham`
  MODIFY `maSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;
--
-- AUTO_INCREMENT for table `dt_thanhtoan`
--
ALTER TABLE `dt_thanhtoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
