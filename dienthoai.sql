-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2017 at 08:22 AM
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

--
-- Dumping data for table `dt_binhluan`
--

INSERT INTO `dt_binhluan` (`id`, `maSP`, `noiDung`, `maKH`, `ngayBinhLuan`) VALUES
(1, 178, 'MÃ u Ä‘á» trÃ´ng ráº¥t sang.', 'nga@gmail.com', '2017-04-26 09:01:23'),
(2, 183, 'iPad Pro 9.7 inch chÆ¡i Game ráº¥t mÆ°á»£t.\r\n', 'nhung@gmail.com', '2017-04-26 11:38:08'),
(3, 192, 'Cáº¥u hÃ¬nh mÃ¡y cao! thÃ­ch!', 'nhung@gmail.com', '2017-04-26 11:38:51');

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
(1, 2, 194, 38000000, 2),
(4, 5, 175, 11400000, 4),
(5, 6, 174, 14900000, 7),
(6, 7, 195, 45000000, 4),
(7, 8, 178, 26000000, 3),
(8, 8, 180, 10400000, 3),
(9, 9, 195, 45000000, 1),
(10, 10, 179, 8990000, 1),
(11, 11, 176, 19900000, 1),
(12, 12, 176, 19900000, 1),
(13, 13, 192, 48000000, 3),
(14, 14, 205, 13500000, 2),
(15, 15, 129, 3290000, 3),
(16, 16, 177, 34200000, 1),
(17, 17, 177, 34200000, 1),
(18, 18, 177, 34200000, 1),
(19, 19, 179, 8990000, 2),
(20, 20, 183, 15300000, 2),
(21, 21, 173, 10900000, 1),
(22, 22, 203, 30600000, 1),
(23, 23, 177, 34200000, 1),
(24, 24, 210, 13800000, 1),
(25, 24, 212, 8900000, 1),
(26, 24, 205, 13500000, 1),
(27, 25, 173, 10900000, 1);

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
(43, 'LG'),
(44, 'Asus'),
(46, 'Lenovo'),
(54, 'Acer');

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
(2, 'nhung@gmail.com', '2017-04-25', 0, 'Thanh toÃ¡n báº±ng tiá»n máº·t'),
(5, 'nga@gmail.com', '2017-04-26', 1, 'Chuyá»ƒn khoáº£n qua NgÃ¢n hÃ ng hoáº·c ATM'),
(6, 'nga@gmail.com', '2017-04-26', 1, 'Thanh toÃ¡n báº±ng tiá»n máº·t'),
(7, 'nga@gmail.com', '2017-04-26', 1, 'Thanh toÃ¡n báº±ng tiá»n máº·t'),
(25, 'minh@gmail.com', '2017-05-21', 0, 'Chuyá»ƒn khoáº£n qua NgÃ¢n hÃ ng hoáº·c ATM'),
(24, 'hong@gmail.com', '2017-05-21', 0, 'Thanh toÃ¡n báº±ng tiá»n máº·t'),
(23, 'trang@gmail.com', '2017-05-20', 1, 'Chuyá»ƒn khoáº£n qua NgÃ¢n hÃ ng hoáº·c ATM'),
(17, 'hong@gmail.com', '2017-05-17', 0, 'Thanh toÃ¡n báº±ng tiá»n máº·t'),
(18, 'hong@gmail.com', '2017-05-17', 0, 'Thanh toÃ¡n báº±ng tiá»n máº·t'),
(19, 'hong@gmail.com', '2017-05-17', 0, 'Thanh toÃ¡n báº±ng tiá»n máº·t'),
(20, 'hong@gmail.com', '2017-05-17', 0, 'Thanh toÃ¡n báº±ng tiá»n máº·t'),
(21, 'hong@gmail.com', '2017-05-17', 0, 'Thanh toÃ¡n báº±ng tiá»n máº·t'),
(22, 'hong@gmail.com', '2017-05-17', 0, 'Thanh toÃ¡n báº±ng tiá»n máº·t');

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
(312, 168, '149302470014837.png', b'1'),
(313, 169, '148895943112924.jpg', b'1'),
(314, 170, '14910573822110.jpg', b'1'),
(315, 171, '149155229229910.png', b'1'),
(316, 172, '14915526071421.png', b'1'),
(317, 173, '14931969453119.png', b'1'),
(318, 174, '149155325922761.png', b'1'),
(319, 175, '14915534292414.png', b'1'),
(320, 176, '149155367714351.png', b'1'),
(321, 177, '1493025107906.png', b'1'),
(322, 178, '1493196730415.png', b'1'),
(323, 179, '149155453128695.png', b'1'),
(324, 180, '149155471027652.png', b'1'),
(325, 182, '14915549199047.png', b'1'),
(326, 183, '149302522928401.png', b'1'),
(327, 184, '149188981824964.jpg', b'1'),
(328, 185, '149188999228013.jpg', b'1'),
(329, 186, '149189041012741.jpg', b'1'),
(330, 187, '14927042719572.jpg', b'1'),
(331, 188, '149270451315298.jpg', b'1'),
(332, 189, '14927049971939.jpg', b'1'),
(333, 190, '14927078838840.jpg', b'1'),
(334, 191, '149271731030496.png', b'1'),
(335, 192, '149271754928284.png', b'1'),
(336, 193, '1492718487773.png', b'1'),
(337, 194, '149271866332602.png', b'1'),
(338, 195, '149271885821899.png', b'1'),
(339, 196, '149271903630312.png', b'1'),
(340, 197, '149271924420880.png', b'1'),
(341, 198, '149271949519081.png', b'1'),
(342, 199, '149285485326339.jpg', b'1'),
(343, 201, '14929674059160.JPG', b'1'),
(344, 202, '149296745631273.jpg', b'1'),
(345, 203, '149302244027436.png', b'1'),
(346, 205, '149302284726747.png', b'1'),
(347, 206, '149304338020919.jpg', b'1'),
(348, 207, '14930471594913.jpg', b'1'),
(349, 208, '14931820808400.jpg', b'1'),
(350, 209, '14931958785030.jpg', b'1'),
(351, 210, '14931961143975.jpg', b'1'),
(352, 211, '149319633328340.jpg', b'1'),
(353, 212, '149319646510973.jpg', b'1'),
(354, 213, '149449995410466.png', b'1'),
(355, 214, '149450034329811.png', b'1'),
(356, 215, '14949988027074.png', b'1'),
(357, 216, '149499882020531.png', b'1'),
(358, 217, '149499887824560.png', b'1'),
(359, 218, '149499909611385.png', b'1'),
(360, 219, '149499930132190.png', b'1'),
(361, 0, '1495522130235.JPG', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `dt_khachhang`
--

CREATE TABLE `dt_khachhang` (
  `tenKH` varchar(255) NOT NULL,
  `gioiTinh` int(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `diaChi` text NOT NULL,
  `dienThoai` bigint(20) NOT NULL,
  `matKhau` varchar(255) NOT NULL,
  `quyenTruyCap` int(1) NOT NULL,
  `ngayTao` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dt_khachhang`
--

INSERT INTO `dt_khachhang` (`tenKH`, `gioiTinh`, `email`, `diaChi`, `dienThoai`, `matKhau`, `quyenTruyCap`, `ngayTao`) VALUES
('nhung', 1, 'nhung@gmail.com', 'HN', 123456, 'e10adc3949ba59abbe56e057f20f883e', 0, '2017-03-08'),
('nga', 1, 'nga@gmail.com', 'nd', 123456789, 'e10adc3949ba59abbe56e057f20f883e', 0, '2017-04-24'),
('hong', 1, 'hong@gmail.com', 'hn', 123456, 'e10adc3949ba59abbe56e057f20f883e', 0, '2017-04-01'),
('Hồng Nhung', 1, 'admin@gmail.com', 'Hà Nội', 949852983, 'e10adc3949ba59abbe56e057f20f883e', 1, '2017-02-27'),
('Nhung', 1, 'hongnhungnt0210@gmail.com', 'HÃ  Ná»™i', 967350216, 'e10adc3949ba59abbe56e057f20f883e', 0, '2017-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `dt_lienhe`
--

CREATE TABLE `dt_lienhe` (
  `id` int(11) NOT NULL,
  `tieuDe` text NOT NULL,
  `noiDung` text NOT NULL,
  `traLoi` text NOT NULL,
  `email` text NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dt_lienhe`
--

INSERT INTO `dt_lienhe` (`id`, `tieuDe`, `noiDung`, `traLoi`, `email`, `phone`) VALUES
(27, 'Äiá»‡n thoáº¡i', 'Samsung galaxy S7 cÃ³ mÃ u xanh ko áº¡?', 'nhung bi dien', 'nga@gmail.com', 967350217),
(30, 'MÃ¡y tÃ­nh báº£ng', 'MÃ¡y tÃ­nh báº£ng nÃ o Ä‘ang Ä‘Æ°á»£c bÃ¡n cháº¡y nháº¥t áº¡?', 'ICONIA TALK 7 B1-733\r\n cÃ³ giÃ¡ 2,500,000 VNÄ', 'hongnhungnt0210@gmail.com', 123456789),
(28, 'MÃ¡y tÃ­nh báº£ng', 'MÃ¡y tÃ­nh báº£ng A9 cÃ³ á»Ÿ Nam Äá»‹nh ko áº¡?', '', 'loan@gmail.com', 165278239),
(29, 'TIVI', 'Tivi Samsung cÃ³ máº¥y laoij mÃ n hÃ¬nh áº¡?', '', 'bich@gmail.com', 123456789);

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
(9, 'Macbook', NULL),
(10, 'Äiá»‡n tá»­', NULL);

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
  `quaTang` text NOT NULL,
  `loaiManHinh` text,
  `doPhanGiai` varchar(255) DEFAULT NULL,
  `kichThuot` varchar(255) DEFAULT NULL,
  `camUng` varchar(50) DEFAULT NULL,
  `camera` varchar(10) NOT NULL,
  `heDieuHanh` text,
  `kieuDang` varchar(255) DEFAULT NULL,
  `trongLuong` varchar(255) DEFAULT NULL,
  `baoHanh` varchar(255) DEFAULT NULL,
  `ngayTao` date NOT NULL,
  `nguoiTao` varchar(255) NOT NULL,
  `cpu` varchar(255) DEFAULT NULL,
  `ram` varchar(255) DEFAULT NULL,
  `rom` varchar(255) DEFAULT NULL,
  `moi` tinyint(4) NOT NULL,
  `giacu` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dt_sanpham`
--

INSERT INTO `dt_sanpham` (`maSP`, `tenSanPham`, `maDM`, `maLoai`, `giaNhap`, `giaBan`, `soLuong`, `ngaySX`, `quaTang`, `loaiManHinh`, `doPhanGiai`, `kichThuot`, `camUng`, `camera`, `heDieuHanh`, `kieuDang`, `trongLuong`, `baoHanh`, `ngayTao`, `nguoiTao`, `cpu`, `ram`, `rom`, `moi`, `giacu`) VALUES
(129, 'iPhone 4 8GB', 38, '4', 2910000, 3290000, 57, '2013-11-02', 'Táº·ng pin dá»± phÃ²ng 1500 mAh', 'DVGA, 3.5', '', '', 'CÃ³', '', 'iOS 7.0', 'Thanh (Tháº³ng)', '', '36', '2013-11-27', 'admin@gmail.com', 'Solo-core 1 GHz', '', '', 0, 5000000),
(141, 'Samsung Galaxy Trend Plus', 38, '4', 3000000, 3990000, 50, '2013-11-01', 'Táº·ng pin dá»± phÃ²ng 1500 mAh', 'WVGA', '4.0', '480 x 800 pixels', 'CÃ³', '', 'Android 4.2', 'Thanh (Tháº³ng)', '118', '18', '2013-12-07', 'admin@gmail.com', 'Broadcom BCM21664, 2 nhÃ¢n, 1.2 GHz', '768 MB', '4 GB', 0, 0),
(142, 'LG G2 D802 16GB', 43, '4', 10400000, 11900000, 50, '2013-11-04', 'Táº·ng pin dá»± phÃ²ng 1500 mAh', 'Full HD', '1080 x 1920 pixels', '5.2', 'CÃ³', '', 'Android 4.2.2 (Jelly Bean)', 'Thanh (Tháº³ng)', '45', '18', '2013-12-07', 'admin@gmail.com', 'Qualcomm Snapdragon 800, 4 nhÃ¢n, 2.26 GHz', '2 GB', '16 GB', 0, 0),
(139, 'HTC 8S', 41, '4', 5990000, 7990000, 10, '2013-12-01', '', 'WVGA, 4.0 inches', '', '', '', '', 'Windows Phone 8', '', '', '', '2013-12-04', 'admin@gmail.com', 'Dual-core 1GHz', '', '', 0, 0),
(140, 'Nokia Asha 501 Dual', 39, '4', 17500000, 18500000, 10, '2013-12-01', '', 'QVGA, 3.0 inches', '', '', '', '', 'Nokia Asha platform 1.0', 'Thanh (Tháº³ng)', '', '18', '2013-12-04', 'admin@gmail.com', '', '', '', 0, 0),
(143, 'Lenovo A369i', 46, '4', 1200000, 1890000, 50, '2013-12-02', 'Tháº» nhá»› ngoÃ i Ä‘áº¿n: 32 GB', 'WVGA', '480 x 800 pixels', '4.0"', 'CÃ³', '', 'Android 4.2 (Jelly Bean)', 'Thanh (Tháº³ng)', '44', '24', '2013-12-07', 'admin@gmail.com', 'MTK 6572, 2 nhÃ¢n, 1.3 GHz', '512 MB', '4 GB', 0, 0),
(144, 'Sungsung Galaxy S4 i9500', 38, '4', 12400000, 14290000, 50, '2013-12-02', 'Tháº» nhá»› tá»‘i Ä‘a: 64 GB', 'Full HD', '1080 x 1920 pixels', '5.0', 'CÃ³', '', 'Android 4.2.2 (Jelly Bean)', 'Thanh (Tháº³ng)', '118', '24', '2013-12-07', 'admin@gmail.com', 'Exynos 5410, 8 nhÃ¢n, 8 nhÃ¢n (2 lÃµi 4 nhÃ¢n: Quad-core 1.6 GHz Cortex-A15 - Quad-core 1.2 GHz Cortex-A7)', '2 GB', '16 GB', 0, 0),
(145, 'Galaxy Mega 5.8 Duos I9152', 38, '4', 7450000, 8690000, 50, '2013-12-02', 'Tháº» nhá»› ngoÃ i Ä‘áº¿n: 64 GB', 'qHD', '540 x 960 pixels', '5.8', 'CÃ³', '', 'Android 4.2.2 (Jelly Bean)', 'Thanh (Tháº³ng)', '99', '24', '2013-12-07', 'admin@gmail.com', '2 nhÃ¢n, 1.4 GHz', '1.5 GB', '8 GB', 0, 0),
(164, 'Samsung Galaxy Ace 3 S7270', 38, '4', 3490000, 4390000, 48, '2013-09-02', 'Camera: 5.0 MP, Quay phim HD 720p@30fps', 'WVGA', '480 x 800 pixels', '4.0 inches', 'CÃ³', '', 'Android 4.2 (Jelly Bean)', 'Thanh (Tháº³ng)', '99', '24', '2013-12-12', 'admin@gmail.com', 'Dual-core 1 GHz', '1 GB', '4 GB', 0, 0),
(165, 'Samsung Galaxy Round', 38, '4', 7450000, 9990000, 50, '2013-09-02', 'Camera: 13 MP, Quay phim 4K 2160p@30fps', 'Full HD, 5.7 inch', '1080 x 1920 pixels', '5.0 inches', 'CÃ³', '', 'Android 4.3 (Jelly Bean)', 'Thanh (Tháº³ng)', '99', '24', '2013-12-12', 'admin@gmail.com', 'Qualcomm Snapdragon 800, 4 nhÃ¢n, 2.3 GHz', '64GB', '32 GB', 0, 0),
(166, 'Samsung Galaxy Grand 2', 38, '4', 12700000, 14700000, 50, '2013-09-08', 'Camera: 8.0 MP, Quay phim FullHD 1080p@30fps', 'HD', '720 x 1280 pixels', '5.25 inches', 'CÃ³', '', 'Android 4.3 (Jelly Bean)', 'Thanh (Tháº³ng)', '99', '24', '2013-12-12', 'admin@gmail.com', 'Quad-core 1.2 GHz', '1.5 GB', '8 GB', 0, 0),
(167, 'Galaxy S7', 38, '4', 17000000, 19000000, 20, '2017-05-01', 'Táº·ng pin dá»± phÃ²ng 3000 mAh', '5.5 inch ', '1440 x 2560 pixels', '	150.9 x 72.6 x 7.7 mm ', 'CÃ³', '', 'Android 6.0 (Marshmallow)', 'Thanh (Tháº³ng)', '157g', '12', '2017-03-08', 'admin@gmail.com', 'Octa-core', '4 GB', '32 GB', 0, 0),
(168, 'Iphone 7 plus 128gb', 37, '4', 23000000, 25200000, 50, '2017-03-01', 'Táº·ng pin dá»± phÃ²ng 1500 mAh', '	Retina ', '1920 x 1080 pixels', '158.2 x 77.9 x 7.3 mm', '', '', 'iOS 10', 'Thanh (Tháº³ng)', '188 g', '12', '2017-03-08', 'admin@gmail.com', 'Quad-core 2.34 GHz', '3GB', '128 GB', 0, 28000000),
(173, 'SAMSUNG GALAXY A7 SM-A720F -Há»“ng', 38, '4', 9000000, 10900000, 44, '2017-03-01', '', 'Super AMOLED Touchscreen', '1080 x 1920pixels', '5.7 inch', 'CÃ³', '', 'Android OS, v6.0.1', 'Thanh (Tháº³ng)', '', '12', '2017-04-07', 'admin@gmail.com', '', '3GB', '32 GB', 0, 11100000),
(174, 'Sony Xperia XZs', 40, '4', 13000000, 14900000, 41, '0000-00-00', 'Táº·ng pin dá»± phÃ²ng 2000 mAh', 'IPS LCD, Full HD', '1080 x 1920 pixels', ' 5.2', 'CÃ³', '', '	Android 7.0', 'Thanh (Tháº³ng)', '161 g', '12', '2017-04-07', 'admin@gmail.com', '	Snapdragon 820 4 nhÃ¢n 64-bit', '4 GB', '64 GB', 0, 15200000),
(175, 'Samsung Galaxy C9 Pro', 38, '4', 10000000, 11400000, 46, '2017-04-07', '', '	Super AMOLED,  Full HD', '', '6"', 'CÃ³', '', '	Android 6.0 (Marshmallow)', 'Thanh (Tháº³ng)', '189 g', '12', '2017-04-07', 'admin@gmail.com', '	Snapdragon 653 8 nhÃ¢n 64-bit', '6 GB', '64 GB', 0, 0),
(176, ' iPhone 6s Plus 64GB', 37, '4', 18500000, 19900000, 46, '2016-12-30', 'Táº·ng á»‘p silicol mÃ u há»“ng', '	LED-backlit IPS LCD, Retina HD', '', ' 5.5', 'CÃ³', '', '	iOS 9', 'Thanh (Tháº³ng)', '192 g', '12', '2017-04-07', 'admin@gmail.com', '	Apple A9 2 nhÃ¢n 64-bit', '2 GB', '64 GB', 0, 0),
(177, ' iPhone 6s Plus 124GB', 37, '4', 3200000, 34200000, 48, '2016-12-30', '', '	LED-backlit IPS LCD, Retina HD', '', ' 5.5', 'CÃ³', '', '	iOS 9', 'Thanh (Tháº³ng)', '192 g', '12', '2017-04-07', 'admin@gmail.com', '	Apple A9 2 nhÃ¢n 64-bit', '2 GB', '64 GB', 0, 38000000),
(178, 'iPhone 7 128GB RED.', 37, '4', 23000000, 26000000, 47, '2017-04-08', '', 'LED-backlit IPS LCD, 4.7", Retina HD', '', '4,7''', 'CÃ³', '', 'iOS 10', 'Thanh (Tháº³ng)', '', '18', '2017-04-07', 'admin@gmail.com', 'GPU 6 nhÃ¢n', '2 GB', '128 GB', 0, 0),
(179, 'Samsung Galaxy Tab A6 10.1 Spen', 38, '5', 8000000, 8990000, 50, '2016-07-12', '', '	PLS LCD', '', '10.1"', 'CÃ³', '', '	Android 6.0 (Marshmallow)', 'Thanh (Tháº³ng)', '560 g', '12', '2017-04-07', 'admin@gmail.com', '	Exynos 7870 8 nhÃ¢n', '3GB', '16 GB', 0, 0),
(180, 'iPad Mini 4 Wifi 32GB', 37, '5', 9700000, 10400000, 20, '2017-02-02', '', '	LED backlit LCD', '', '7,9"', '', '', '	iOS 9', 'Thanh (Tháº³ng)', '', '12', '2017-04-07', 'admin@gmail.com', '	Apple A8, 1.5 GHz', '2GB', '32 GB', 0, 0),
(182, 'Samsung Galaxy Tab E 9.6 ', 38, '5', 4000000, 4900000, 20, '2017-02-03', '', 'WXGA TFT', '', '9,6"', 'CÃ³', '', '	Android 4.4', 'Thanh (Tháº³ng)', '', '12', '2017-04-07', 'admin@gmail.com', '	Spreadtrum 4 nhÃ¢n, 1.3 GHz', '1,5 GB', '8 GB', 0, 0),
(183, ' iPad Pro 9.7 inch Wifi 32GB', 37, '5', 13000000, 15300000, 20, '2017-04-06', '', '	LED backlit LCD', '', '9.7', 'CÃ³', '', 'iOS 9', 'Thanh (Tháº³ng)', '', '12', '2017-04-07', 'admin@gmail.com', 'Apple A9X 2 nhÃ¢n 64-bit, 2.16 GHz', '2 GB', '32 GB', 0, 17000000),
(192, 'MacBook Pro 13 Touch Bar 512GB', 37, '9', 45000000, 48000000, 50, '2017-01-02', '- Táº·ng bá»™ quÃ  trá»‹ giÃ¡ 1 triá»‡u gá»“m tÃºi + Chuá»™t khÃ´ng dÃ¢y Konig, Loa, Bá»™ vá»‡ sinh mÃ¡y tÃ­nh, á»” cáº¯m Ä‘iá»‡n Lioa\r\n(Ã¡p dá»¥ng tá»« 18/04/2017 Ä‘áº¿n 30/05/2017)', '	LED-backlit', '2560 x 1600 pixels', '	13.3 inch', 'KhÃ´ng', '', 'OS X', '', '	1.37 kg', '', '2017-04-20', 'admin@gmail.com', '	Dual - Core', '	16 GB', '8 GB', 0, 0),
(190, 'Apple Macbook Air - MMGF2 13inch/128GB', 37, '9', 19000000, 20000000, 50, '2017-01-30', '', '', '', '', '', '', '', '', '', '', '2017-04-20', 'admin@gmail.com', '', '', '', 0, 0),
(193, 'Macbook Air 13 MMGF2ZP/A', 37, '9', 23000000, 25000000, 50, '2016-01-10', '- Táº·ng bá»™ quÃ  trá»‹ giÃ¡ 1 triá»‡u gá»“m tÃºi + Chuá»™t khÃ´ng dÃ¢y Konig, Loa, Bá»™ vá»‡ sinh mÃ¡y tÃ­nh, á»” cáº¯m Ä‘iá»‡n Lioa\r\n(Ã¡p dá»¥ng tá»« 18/04/2017 Ä‘áº¿n 30/05/2017)', '	LED-backlit', '	1440 x 900 pixels', '13.3 inch', 'KhÃ´ng', '', '', '', '', '', '2017-04-20', 'admin@gmail.com', '	Dual-Core', '	8 GB', '', 0, 0),
(194, 'Macbook Retina 12 Gold MLHF2SA/A', 37, '9', 32000000, 38000000, 50, '2017-01-05', '- Táº·ng bá»™ quÃ  trá»‹ giÃ¡ 1 triá»‡u gá»“m tÃºi + Chuá»™t khÃ´ng dÃ¢y Konig, Loa, Bá»™ vá»‡ sinh mÃ¡y tÃ­nh, á»” cáº¯m Ä‘iá»‡n Lioa\r\n(Ã¡p dá»¥ng tá»« 27/03/2017 Ä‘áº¿n 30/04/2017)', '', '	2304 x 1440 Pixels', '12 inch', 'KhÃ´ng', '', '', '', '', '9', '2017-04-20', 'admin@gmail.com', '	1.2 GHz', '	8 GB', '', 0, 0),
(195, 'MacBook Pro 13 Touch Bar 256GB', 37, '9', 40000000, 45000000, 46, '2017-01-11', '- Táº·ng bá»™ quÃ  trá»‹ giÃ¡ 1 triá»‡u gá»“m tÃºi + Chuá»™t khÃ´ng dÃ¢y Konig, Loa, Bá»™ vá»‡ sinh mÃ¡y tÃ­nh, á»” cáº¯m Ä‘iá»‡n Lioa\r\n(Ã¡p dá»¥ng tá»« 27/03/2017 Ä‘áº¿n 30/04/2017)', 'LED-backlit IPS LCD, 4.7", Retina HD', '2560 x 1600 pixels', '13.3 inch', '', '', 'MAC OS', '', '	1.37 kg', '18', '2017-04-20', 'admin@gmail.com', '	2.9 Ghz', '8 GB', '', 0, 0),
(196, 'Macbook Air 13'' - MJVG2ZP/A', 37, '9', 28000000, 30000000, 50, '2016-04-02', '- Táº·ng bá»™ quÃ  trá»‹ giÃ¡ 1 triá»‡u gá»“m tÃºi + Chuá»™t khÃ´ng dÃ¢y Konig, Loa, Bá»™ vá»‡ sinh mÃ¡y tÃ­nh, á»” cáº¯m Ä‘iá»‡n Lioa\r\n(Ã¡p dá»¥ng tá»« 27/03/2017 Ä‘áº¿n 30/04/2017)', 'Macbook Air 13'' - MJVG2ZP/A', '	1440 x 900 pixels', '	13.3 inch', 'KhÃ´ng', '', 'MAC OS', '', '13kg', '12', '2017-04-20', 'admin@gmail.com', '', '8 GB', '', 0, 0),
(197, 'Macbook Retina 12 Rose Gold MMGM2SA/A', 37, '9', 37000000, 40000000, 50, '2017-02-12', '- Táº·ng bá»™ quÃ  trá»‹ giÃ¡ 1 triá»‡u gá»“m tÃºi + Chuá»™t khÃ´ng dÃ¢y Konig, Loa, Bá»™ vá»‡ sinh mÃ¡y tÃ­nh, á»” cáº¯m Ä‘iá»‡n Lioa\r\n(Ã¡p dá»¥ng tá»« 27/03/2017 Ä‘áº¿n 30/04/2017)', '	LED-backlit', '	12 inch', '	12 inch', '', '', '	Mac OS X', '', '	0.92 kg', '12', '2017-04-20', 'admin@gmail.com', '	1.2 GHz', '8 GB', '', 0, 0),
(198, 'MacBook Pro 15 Touch Bar 256GB.', 37, '9', 54000000, 58000000, 50, '2017-04-19', '- Táº·ng bá»™ quÃ  trá»‹ giÃ¡ 1 triá»‡u gá»“m tÃºi + Chuá»™t khÃ´ng dÃ¢y Konig, Loa, Bá»™ vá»‡ sinh mÃ¡y tÃ­nh, á»” cáº¯m Ä‘iá»‡n Lioa\r\n(Ã¡p dá»¥ng tá»« 27/03/2017 Ä‘áº¿n 30/04/2017)', 'LED-backlit', '2880 x 1800 pixels', '	15.4 inch', 'KhÃ´ng', '', 'MAC OS', '', '1,83 kg', '18', '2017-04-20', 'admin@gmail.com', 'Quad - core', '	16 GB', '16 GB', 0, 0),
(203, 'Apple MacBook Pro - MLL42 13"', 37, '9', 28000000, 30600000, 70, '2017-04-02', '+ CÃ¡c gÃ³i pháº§n má»m cÃ i Ä‘áº·t ( NÃ¢ng cáº¥p cÃ i Ä‘áº·t pháº§n má»m, cÃ i Ä‘áº·t á»©ng dá»¥ngâ€¦..)', '', '', '	13.3-inch', 'CÃ³', '', '', 'Báº­t náº¯p', '	1.37 Kg', '12', '2017-04-24', 'admin@gmail.com', '	dual-core 2.0GHz', '8GB 1866MHz memory Turbo Boost up to 3.1GHz', '256GB PCIe-based SSD1', 0, 34000000),
(205, 'Samsung Galaxy Note 5', 38, '4', 10000000, 13500000, 48, '2017-02-02', 'Trong há»™p cÃ³: Sáº¡c, Tai nghe, SÃ¡ch hÆ°á»›ng dáº«n, BÃºt cáº£m á»©ng (+ ngÃ²i bÃºt), CÃ¡p, CÃ¢y láº¥y sim', 'Super AMOLED,  Quad HD (2K)', '', '5.7",', 'CÃ³', '', 'Android 6.0 (Marshmallow)', 'Thanh (Tháº³ng)', '	171 g', '12', '2017-04-24', 'admin@gmail.com', '4 nhÃ¢n 1.5 GHz Cortex-A53 & 4 nhÃ¢n 2.1 GHz Cortex-A57', '	4 GB', '32 GB', 0, 15000000),
(209, 'TIVI LED SAMSUNG UA43K5500', 38, '10', 9000000, 9090000, 100, '2016-04-02', 'Táº·ng 1 bá»™ vá»‡ sinh TIVI', 'TIVI LED', 'Full HD ( 1920 x 1080)', '	43 inch', 'KhÃ´ng', '', '', 'Thanh (Tháº³ng)', '', '12', '2017-04-26', 'admin@gmail.com', '', '', '', 0, 10100000),
(210, 'TIVI LED LG 49UH610T', 43, '10', 12900000, 13800000, 60, '2016-09-04', 'Táº·ng: 1 Äiá»u khiá»ƒn cáº£m á»©ng LG dÃ²ng LH600T (Motion Remote control)', 'TIVI LED', '4K-Ultra HD', '49 inch', 'KhÃ´ng', '', '', 'Thanh (Tháº³ng)', '', '24', '2017-04-26', 'admin@gmail.com', '', '', '', 0, 14000000),
(211, 'TIVI LED 3D SONY KDL43W800C 43INCH', 40, '10', 12500000, 13900000, 50, '2016-10-02', 'Táº·ng 1 bá»™ vá»‡ sinh TIVI', '	LED 3D', 'Full HD (1920 x 1080)', '43 inch', 'KhÃ´ng', '', '', 'Thanh (Tháº³ng)', '', '24', '2017-04-26', 'admin@gmail.com', '', '', '', 0, 14500000),
(212, 'TIVI LED LG 43LH590T', 43, '10', 8000000, 8900000, 50, '2017-02-27', 'Táº·ng : 1 Ná»“i Ecook 4.8L Lock&Lock LG', 'TIVI LED', 'Full HD (1920 x 1080p)', '43 inch', 'KhÃ´ng', '', '', 'Thanh (Tháº³ng)', '', '24', '2017-04-26', 'admin@gmail.com', '', '', '', 0, 9000000),
(213, 'Macbook Air MMGF2ZP/A', 37, '9', 22000000, 24000000, 50, '2017-05-01', '', ' WXGA+', '13.3 inch', '1440 x 900', 'KhÃ´ng', '', '	Mac OS', '', '', '12', '2017-05-11', 'admin@gmail.com', 'Intel Core i5 Broadwell, 5250U, 1.60 GHz', '8 GB, DDR3L(On board), 1600 MHz', '', 0, 0),
(214, 'iPad Wifi 32GB', 37, '5', 7000000, 9000000, 50, '2017-05-02', 'Táº·ng pin dá»± phÃ²ng 2000mAh', '	LED backlit LCD', '1536 x 2048 pixels', '	9.7"', 'CÃ³', '', '	iOS 10', 'Thanh (Tháº³ng)', '	478 g', '9', '2017-05-11', 'admin@gmail.com', 'Apple A9 2 nhÃ¢n 64-bit', '2 GB', '32 GB', 0, 10000000),
(218, 'Lenovo Tab 3 Essential 16GB', 46, '5', 2000000, 2100000, 50, '2017-03-07', '', 'IPS LCD', '1024 x 600 pixels', '7"', 'CÃ³', '', '	Android 5.1', 'Thanh (Tháº³ng)', '	300 g', '6', '2017-05-17', 'admin@gmail.com', 'CPU 4 nhÃ¢n', '1 GB', '16 GB', 0, 0),
(217, 'Iconia Talk 7 B1-733', 54, '5', 2000000, 2400000, 50, '2017-04-01', '', 'IPS LCD', '', '7"', 'CÃ³', '', 'Android 6.0 (Marshmallow)', 'Thanh (Tháº³ng)', '', '18', '2017-05-17', 'admin@gmail.com', 'MediaTek MT 8321 4 nhÃ¢n', '1 GB', '16 GB', 0, 0),
(219, 'Asus Zenfone Go ZB690KG', 44, '5', 2300000, 2600000, 50, '0000-00-00', '', 'IPS LCD', '	1024 x 600 pixels', '6.9"', 'CÃ³', '', '	Android 5.1', 'Thanh (Tháº³ng)', '	265 g', '6', '2017-05-17', 'admin@gmail.com', '	Qualcomm Snapdragon 200 4 nhÃ¢n 32bit', '1GB', '128 GB', 0, 0),
(227, '', 0, '4', 0, 0, 0, '0000-00-00', '', '', '', '', '', '', '', '', '', '', '2017-05-23', 'admin@gmail.com', '', '', '', 0, 0),
(226, '', 0, '', 0, 0, 0, '0000-00-00', '', '', '', '', '', '', '', '', '', '', '2017-05-23', 'admin@gmail.com', '', '', '', 0, 0),
(228, '', 0, '', 0, 0, 0, '0000-00-00', '', '', '', '', '', '', '', '', '', '', '2017-05-23', 'admin@gmail.com', '', '', '', 0, 0),
(229, '', 0, '4', 0, 0, 0, '0000-00-00', '', '', '', '', '', '', '', '', '', '', '2017-05-23', 'admin@gmail.com', '', '', '', 0, 0),
(230, '', 0, '', 0, 0, 0, '0000-00-00', '', '', '', '', '', '', '', '', '', '', '2017-05-23', 'admin@gmail.com', '', '', '', 0, 0),
(231, '', 0, '', 0, 0, 0, '0000-00-00', '', '', '', '', '', '', '', '', '', '', '2017-05-23', 'admin@gmail.com', '', '', '', 0, 0),
(232, '', 0, '', 0, 0, 0, '0000-00-00', '', '', '', '', '', '', '', '', '', '', '2017-05-23', 'admin@gmail.com', '', '', '', 0, 0),
(233, '', 0, '', 0, 0, 0, '0000-00-00', '', '', '', '', '', '', '', '', '', '', '2017-05-23', 'admin@gmail.com', '', '', '', 0, 0),
(234, '', 0, '', 0, 0, 0, '0000-00-00', '', '', '', '', '', '', '', '', '', '', '2017-05-23', 'admin@gmail.com', '', '', '', 0, 0),
(235, '1234567', 38, '5', 1234, 2345, 12, '2017-05-02', '', '', '', '', '', '', '', '', '', '', '2017-05-23', 'admin@gmail.com', '', '', '', 0, 0);

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
(54, 'hong', 'hn', 'hong@gmail.com', '123456', 90, 1),
(55, 'nhung', 'HN', 'nhung@gmail.com', '123456', 91, 0),
(56, 'nhung', 'HN', 'nhung@gmail.com', '123456', 91, 1),
(57, 'hhhhh', 'hhhhhh', 'hong@gmail.com', '553333', 92, 0),
(58, 'hhhhh', 'hhhhhh', 'hong@gmail.com', '553333', 92, 1),
(59, 'gggg', 'hhhhh', 'hong@gmail.com', '5555', 93, 0),
(60, 'gggg', 'hhhhh', 'hong@gmail.com', '5555', 93, 1),
(61, 'honghhhhh', 'hnffdddd', 'hong@gmail.comhh', '1234565555', 94, 0),
(62, 'hong', 'hnffdddd', 'hong@gmail.com', '123456', 94, 1),
(63, 'hong', 'hn', 'hong@gmail.com', '123456', 95, 0),
(64, 'hong', 'hn', 'hong@gmail.com', '123456', 95, 1),
(65, 'hong', 'hn', 'hong@gmail.com', '123456', 96, 0),
(66, 'hong', 'hn', 'hong@gmail.com', '123456', 96, 1),
(67, 'hong', 'hn', 'hong@gmail.com', '123456', 97, 0),
(68, 'hong', 'hn', 'hong@gmail.com', '123456', 97, 1),
(69, 'hongdddddd', 'hn', 'hong@gmail.com', '123456', 98, 0),
(70, 'hong', 'hn', 'hong@gmail.com', '123456', 98, 1),
(71, 'hongdddddd', 'hn', 'hong@gmail.com', '123456', 99, 0),
(72, 'hong', 'hn', 'hong@gmail.com', '123456', 99, 1),
(73, 'hongdddddd', 'hn', 'hong@gmail.com', '123456', 100, 0),
(74, 'hong', 'hn', 'hong@gmail.com', '123456', 100, 1),
(75, 'hongdddddd', 'hn', 'hong@gmail.com', '123456', 101, 0),
(76, 'hong', 'hn', 'hong@gmail.com', '123456', 101, 1),
(77, 'hung', 'hhhhhhh', 'hong@gmail.com', '1234567', 102, 0),
(78, 'hung', 'hhhhhhh', 'hong@gmail.com', '1234567', 102, 1),
(79, 'hung', 'hhhhhhhhhh', 'hong@gmail.com', '1234567', 103, 0),
(80, 'hung', 'hhhhhhhhhh', 'hong@gmail.com', '1234567', 103, 1),
(81, 'hong', 'hn', 'hong@gmail.com', '123456', 104, 0),
(82, 'hong', 'hn', 'hong@gmail.com', '123456', 104, 1),
(83, 'hong', 'hn', 'hong@gmail.com', '123456', 105, 0),
(84, 'hong', 'hn', 'hong@gmail.com', '123456', 105, 1),
(85, 'hong', 'hn', 'hong@gmail.com', '123456', 106, 0),
(86, 'hong', 'hn', 'hong@gmail.com', '123456', 106, 1),
(87, 'hong', 'hn', 'hong@gmail.com', '123456', 107, 0),
(88, 'hong', 'hn', 'hong@gmail.com', '123456', 107, 1),
(89, 'hong', 'hn', 'hong@gmail.com', '123456', 108, 0),
(90, 'hong', 'hn', 'hong@gmail.com', '123456', 108, 1),
(91, 'hong', 'hn', 'hong@gmail.com', '123456', 109, 0),
(92, 'hong', 'hn', 'hong@gmail.com', '123456', 109, 1),
(93, 'hong', 'hn', 'hong@gmail.com', '123456', 110, 0),
(94, 'hong', 'hn', 'hong@gmail.com', '123456', 110, 1),
(95, 'hong', 'hn', 'hong@gmail.com', '123456', 112, 0),
(96, 'hong', 'hn', 'hong@gmail.com', '123456', 112, 1),
(97, 'hong', 'hn', 'hong@gmail.com', '123456', 113, 0),
(98, 'hong', 'hn', 'hong@gmail.com', '123456', 113, 1),
(99, 'hong', 'hn', 'hong@gmail.com', '123456', 114, 0),
(100, 'hong', 'hn', 'hong@gmail.com', '123456', 114, 1),
(101, 'hong', 'hn', 'hong@gmail.com', '123456', 115, 0),
(102, 'hong', 'hn', 'hong@gmail.com', '123456', 115, 1),
(103, 'hong', 'hn', 'hong@gmail.com', '123456', 117, 0),
(104, 'hong', 'hn', 'hong@gmail.com', '123456', 117, 1),
(105, 'háº¡ ha', 'MÄ', 'ha@gmail.com', '1234567890', 118, 0),
(106, 'háº¡ ha', 'MÄ', 'ha@gmail.com', '1234567890', 118, 1),
(107, 'hong', 'hn', 'hong@gmail.com', '123456', 119, 0),
(108, 'hong', 'hn', 'hong@gmail.com', '123456', 120, 0),
(109, 'mai', 'hn', 'mai@gmail.com', '123456789', 121, 0),
(110, 'hong', 'hn', 'hong@gmail.com', '123456', 122, 0),
(111, 'hong', 'hn', 'hong@gmail.com', '123456', 122, 1),
(112, 'nga', 'nd', 'nga@gmail.com', '123456789', 123, 0),
(113, 'nga', 'nd', 'nga@gmail.com', '123456789', 123, 1),
(114, 'nga', 'nd', 'nga@gmail.com', '123456789', 124, 0),
(115, 'nga', 'nd', 'nga@gmail.com', '123456789', 124, 1),
(116, 'nhung', 'HN', 'nhung@gmail.com', '123456', 125, 0),
(117, 'nhung', 'HN', 'nhung@gmail.com', '123456', 125, 1),
(118, 'nga', 'nd', 'nga@gmail.com', '123456789', 126, 0),
(119, 'nga', 'nd', 'nga@gmail.com', '123456789', 126, 1),
(120, 'nga', 'nd', 'nga@gmail.com', '123456789', 127, 0),
(121, 'nga', 'nd', 'nga@gmail.com', '123456789', 127, 1),
(122, 'nga', 'nd', 'nga@gmail.com', '123456789', 128, 0),
(123, 'nga', 'nd', 'nga@gmail.com', '123456789', 128, 1),
(124, 'nga', 'nd', 'nga@gmail.com', '123456789', 129, 0),
(125, 'nga', 'nd', 'nga@gmail.com', '123456789', 129, 1),
(126, 'hong', 'hn', 'hong@gmail.com', '123456', 130, 0),
(127, 'hong', 'hn', 'hong@gmail.com', '123456', 130, 1),
(128, 'nga', 'nd', 'nga@gmail.com', '123456789', 131, 0),
(129, 'nga', 'nd', 'nga@gmail.com', '123456789', 131, 1),
(130, 'hong', 'hn', 'hong@gmail.com', '123456', 1, 0),
(131, 'hong', 'hn', 'hong@gmail.com', '123456', 1, 1),
(132, 'nhung', 'HN', 'nhung@gmail.com', '123456', 2, 0),
(133, 'nhung', 'HN', 'nhung@gmail.com', '123456', 2, 1),
(134, 'nga', 'HN', 'nga@gmail.com', '2345678', 3, 0),
(135, 'nga', 'HN', 'nga@gmail.com', '2345678', 3, 1),
(136, 'xnasjdg', 'hn', 'nhung@gmail.com', '23567', 4, 0),
(137, 'xnasjdg', 'hn', 'nhung@gmail.com', '23567', 4, 1),
(138, 'nga', 'nd', 'nga@gmail.com', '123456789', 5, 0),
(139, 'nga', 'nd', 'nga@gmail.com', '123456789', 5, 1),
(140, 'nga', 'nd', 'nga@gmail.com', '123456789', 6, 0),
(141, 'nga', 'nd', 'nga@gmail.com', '123456789', 6, 1),
(142, 'nga', 'nd', 'nga@gmail.com', '123456789', 7, 0),
(143, 'nga', 'nd', 'nga@gmail.com', '123456789', 7, 1),
(144, 'nhung', 'HN', 'nhung@gmail.com', '123456', 8, 0),
(145, 'nhung', 'HN', 'nhung@gmail.com', '123456', 8, 1),
(146, 'mai', 'HN', 'mai@gmail.com', '12456789', 9, 0),
(147, 'mai', 'HN', 'mai@gmail.com', '12456789', 9, 1),
(148, 'linh', 'HN', 'linh@gmail.cvb', '23489', 10, 0),
(149, 'linh', 'HN', 'linh@gmail.cvb', '23489', 10, 1),
(150, 'aa', '123123123', 'hong@gmail.com', '123123123', 11, 0),
(151, 'aa', '123123123', 'hong@gmail.com', '123123123', 11, 1),
(152, 'hung', 'hn', 'hung@gmail.com', '1234', 12, 0),
(153, 'hung', 'hn', 'hung@gmail.com', '1234', 12, 1),
(154, 'khanh', 'HN', 'khanh@gmail.com', '76789', 13, 0),
(155, 'khanh', 'HN', 'khanh@gmail.com', '76789', 13, 1),
(156, 'hung', '123123123', 'hung@abc.com', '123123123', 14, 0),
(157, 'hung', '123123123', 'hung@abc.com', '123123123', 14, 1),
(158, 'haha', 'HN', 'ah@gmail.com', '4567', 15, 0),
(159, 'haha', 'HN', 'ah@gmail.com', '4567', 15, 1),
(160, 'mai', 'hÃ  ná»™i', 'mai@gmail.com', '12345678', 16, 0),
(161, 'mai', 'hÃ  ná»™i', 'mai@gmail.com', '12345678', 16, 1),
(162, 'hong', 'hn', 'hong@gmail.com', '123456', 17, 0),
(163, 'hong', 'hn', 'hong@gmail.com', '123456', 17, 1),
(164, 'hong', 'hn', 'hong@gmail.com', '123456', 18, 0),
(165, 'hong', 'hn', 'hong@gmail.com', '123456', 18, 1),
(166, 'hong', 'hn', 'hong@gmail.com', '123456', 19, 0),
(167, 'hong', 'hn', 'hong@gmail.com', '123456', 19, 1),
(168, 'hong', 'hn', 'hong@gmail.com', '123456', 20, 0),
(169, 'hong', 'hn', 'hong@gmail.com', '123456', 20, 1),
(170, 'hong', 'hn', 'hong@gmail.com', '123456', 21, 0),
(171, 'hong', 'hn', 'hong@gmail.com', '123456', 21, 1),
(172, 'hong', 'hn', 'hong@gmail.com', '123456', 22, 0),
(173, 'hong', 'hn', 'hong@gmail.com', '123456', 22, 1),
(174, 'Trang', 'HN', 'trang@gmail.com', '0987654321', 23, 0),
(175, 'Thoa', 'HN', 'thoa@gmail.com', '234567890', 23, 1),
(176, 'hong', 'hn', 'hong@gmail.com', '123456', 24, 0),
(177, 'hong', 'hn', 'hong@gmail.com', '123456', 24, 1),
(178, 'minh', 'HN', 'minh@gmail.com', '1234567890', 25, 0),
(179, 'minh', 'HN', 'minh@gmail.com', '1234567890', 25, 1),
(180, 'huá»³nh', 'HÃ  Ná»™i', 'huynh@gmail.com', '12345678', 26, 0),
(181, 'huá»³nh', 'HÃ  Ná»™i', 'huynh@gmail.com', '12345678', 26, 1);

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
  ADD PRIMARY KEY (`email`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dt_chitietdonhang`
--
ALTER TABLE `dt_chitietdonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `dt_danhmucsp`
--
ALTER TABLE `dt_danhmucsp`
  MODIFY `maDanhMuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `dt_donhang`
--
ALTER TABLE `dt_donhang`
  MODIFY `maDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `dt_hinhanhsp`
--
ALTER TABLE `dt_hinhanhsp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=362;
--
-- AUTO_INCREMENT for table `dt_lienhe`
--
ALTER TABLE `dt_lienhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `dt_loaisanpham`
--
ALTER TABLE `dt_loaisanpham`
  MODIFY `maLoaiSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `dt_sanpham`
--
ALTER TABLE `dt_sanpham`
  MODIFY `maSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;
--
-- AUTO_INCREMENT for table `dt_thanhtoan`
--
ALTER TABLE `dt_thanhtoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
