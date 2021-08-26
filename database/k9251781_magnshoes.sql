-- phpMyAdmin SQL Dump
-- version 3.4.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 23, 2013 at 10:07 PM
-- Server version: 5.1.63
-- PHP Version: 5.3.3-7+squeeze15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `k9251781_magnshoes`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE IF NOT EXISTS `agama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id`, `nama`, `date_created`, `date_updated`) VALUES
(1, 'islam', NULL, NULL),
(2, 'kristen', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart_temp`
--

CREATE TABLE IF NOT EXISTS `cart_temp` (
  `rowid` int(11) NOT NULL AUTO_INCREMENT,
  `session_rowid` text NOT NULL,
  `detail_produk_id` varchar(20) NOT NULL,
  `member_id` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `cart_date` datetime NOT NULL,
  `daftar_harga_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `name` varchar(100) NOT NULL,
  `diskon_id` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `min_quantity` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`rowid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=132 ;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `slogan` text NOT NULL,
  `email` text NOT NULL,
  `facebook` text NOT NULL,
  `twiter` text NOT NULL,
  `telp` int(11) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `nama`, `slogan`, `email`, `facebook`, `twiter`, `telp`, `alamat`) VALUES
(1, 'Magnshoes', ' everything about u ', 'danzztakezo@gmail.com', 'danzztakezo@gmail.com', 'danzztakezo@gmail.com', 3453453, 'jln suka senang no 21 a  ');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_harga`
--

CREATE TABLE IF NOT EXISTS `daftar_harga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `detail_produk_id` varchar(10) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_reference_20` (`detail_produk_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `daftar_harga`
--

INSERT INTO `daftar_harga` (`id`, `detail_produk_id`, `harga`, `date_created`, `date_updated`) VALUES
(18, '16', 270000, '2012-12-05 01:59:56', NULL),
(17, '15', 250000, '2012-12-05 01:59:15', NULL),
(16, '14', 250000, '2012-12-05 01:58:40', NULL),
(15, '13', 250000, '2012-12-05 01:57:59', NULL),
(14, '12', 250000, '2012-12-05 01:57:36', NULL),
(13, '9', 230000, NULL, '2012-12-05 01:56:23'),
(12, '11', 250000, '2012-12-05 01:55:46', NULL),
(11, '10', 230000, '2012-12-05 01:55:06', NULL),
(19, '17', 300000, '2012-12-05 02:00:47', NULL),
(20, '18', 250000, '2012-12-05 02:01:31', NULL),
(21, '19', 250000, '2012-12-05 02:02:01', NULL),
(22, '20', 270000, '2012-12-05 02:02:49', NULL),
(23, '21', 300000, '2012-12-05 02:04:08', NULL),
(24, '22', 300000, '2012-12-05 02:04:42', NULL),
(25, '23', 300000, '2012-12-05 02:05:09', NULL),
(26, '24', 320000, '2012-12-05 02:05:48', NULL),
(27, '25', 450000, '2012-12-05 02:07:59', NULL),
(28, '26', 450000, '2012-12-05 02:09:59', NULL),
(29, '27', 450000, '2012-12-05 02:11:04', NULL),
(30, '28', 350000, '2012-12-05 02:11:37', NULL),
(31, '29', 380000, '2012-12-05 02:12:28', NULL),
(32, '30', 250000, '2012-12-05 02:13:02', NULL),
(33, '31', 300000, '2012-12-05 02:13:58', NULL),
(34, '32', 400000, '2012-12-05 02:14:36', NULL),
(35, '33', 150000, '2012-12-05 02:15:36', NULL),
(36, '34', 150000, '2012-12-05 02:16:20', NULL),
(37, '35', 175000, '2012-12-05 02:16:54', NULL),
(38, '36', 175000, '2012-12-05 02:17:37', NULL),
(39, '37', 190000, '2012-12-05 02:18:49', NULL),
(40, '38', 185000, '2012-12-05 02:19:27', NULL),
(41, '39', 175000, '2012-12-05 02:21:58', NULL),
(42, '40', 185000, '2012-12-05 02:22:51', NULL),
(43, '41', 175000, '2012-12-05 02:23:21', NULL),
(44, '42', 150000, '2012-12-05 02:24:16', NULL),
(45, '43', 150000, '2012-12-05 02:25:03', NULL),
(46, '44', 150000, '2012-12-05 02:26:04', NULL),
(47, '45', 150000, '2012-12-05 02:26:29', NULL),
(48, '46', 300000, '2012-12-05 02:27:25', NULL),
(49, '47', 400000, '2012-12-05 02:28:05', NULL),
(50, '48', 300000, '2012-12-05 02:28:36', NULL),
(51, '49', 190000, '2012-12-05 02:29:27', NULL),
(52, '50', 190000, '2012-12-05 02:30:16', NULL),
(53, '51', 350000, '2012-12-05 02:31:04', NULL),
(54, '52', 350000, '2012-12-05 02:31:57', NULL),
(55, '53', 75000, '2012-12-05 02:33:29', NULL),
(56, '54', 75000, '2012-12-05 02:34:01', NULL),
(57, '55', 100000, '2012-12-05 02:34:42', NULL),
(58, '56', 420000, '2012-12-08 03:29:45', NULL),
(59, '11', 150, NULL, '2013-01-30 22:58:28'),
(60, '11', 1500, NULL, '2013-02-11 10:05:27'),
(61, '9', -1, NULL, '2013-02-11 11:48:53'),
(62, '9', 1500, NULL, '2013-02-11 11:49:19'),
(63, '10', 1700, NULL, '2013-02-27 08:17:41'),
(64, '11', 150, NULL, '2013-07-13 21:06:06'),
(65, '9', 160, NULL, '2013-07-17 06:08:05'),
(66, '10', 170, NULL, '2013-07-17 06:08:14');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE IF NOT EXISTS `detail_pembelian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pembelian_id` int(11) DEFAULT NULL,
  `detail_produk_id` varchar(10) DEFAULT NULL,
  `diskon_id` int(11) DEFAULT NULL,
  `daftar_harga_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_daftar_harga_detail_pembelian` (`daftar_harga_id`),
  KEY `FK_detail_pembelian_produk` (`detail_produk_id`),
  KEY `FK_diskon_detail_pembelian` (`diskon_id`),
  KEY `FK_pembelian_detail` (`pembelian_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=205 ;

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id`, `pembelian_id`, `detail_produk_id`, `diskon_id`, `daftar_harga_id`, `quantity`) VALUES
(1, 1, '1', NULL, 1, 19),
(2, 1, '4', NULL, 3, 10),
(3, 5, '6', 0, 7, 1),
(4, 5, '2', 0, 6, 1),
(5, 5, '3', 0, 1, 1),
(6, 6, '6', 0, 7, 1),
(7, 6, '2', 0, 6, 1),
(8, 6, '3', 0, 1, 1),
(9, 7, '1', 6, 4, 4),
(10, 7, '5', 6, 5, 6),
(11, 8, '1', 6, 4, 1),
(12, 8, '5', 6, 5, 1),
(13, 9, '1', 7, 4, 1),
(14, 9, '2', 0, 6, 2),
(15, 9, '3', 0, 1, 1),
(16, 10, '2', 0, 6, 1),
(17, 11, '2', 0, 6, 1),
(18, 12, '2', 0, 6, 1),
(19, 12, '3', 0, 1, 1),
(20, 13, '2', 0, 6, 1),
(21, 13, '3', 0, 1, 1),
(22, 14, '2', 0, 6, 1),
(23, 14, '5', 7, 5, 2),
(24, 15, '7', 0, 8, 1),
(25, 15, '8', 0, 9, 2),
(26, 16, '6', 0, 7, 1),
(27, 16, '5', 7, 5, 1),
(28, 17, '1', 7, 4, 1),
(29, 17, '8', 0, 9, 4),
(30, 18, '6', 0, 7, 4),
(31, 19, '6', 0, 7, 1),
(32, 20, '5', 7, 5, 1),
(33, 21, '5', 7, 5, 1),
(34, 22, '6', 0, 7, 1),
(35, 23, '6', 0, 7, 1),
(36, 24, '8', 0, 9, 4),
(37, 25, '6', 0, 7, 1),
(38, 25, '8', 0, 9, 1),
(39, 26, '6', 0, 7, 1),
(40, 27, '6', 0, 7, 1),
(55, NULL, '6', 0, 7, 1),
(56, NULL, '8', 0, 9, 1),
(57, NULL, '6', 0, 7, 1),
(58, 42, '7', 0, 8, 1),
(59, 43, '8', 0, 9, 1),
(60, 44, '8', 0, 9, 1),
(61, 45, '8', 0, 9, 1),
(62, 46, '6', 0, 7, 1),
(63, 47, '8', 0, 9, 1),
(64, 48, '8', 0, 9, 1),
(65, 49, '8', 0, 9, 1),
(66, 50, '6', 0, 7, 1),
(67, 50, '3', 0, 1, 1),
(68, 51, '6', 0, 7, 1),
(69, 52, '6', 0, 7, 2),
(70, 53, '5', 0, 5, -1),
(71, 54, '5', 0, 5, -1),
(72, 55, '6', 0, 7, 1),
(73, 55, '2', 0, 6, 3),
(74, 56, '6', 0, 7, 1),
(75, 57, '8', 0, 9, 1),
(76, 58, '8', 0, 9, 1),
(77, 59, '2', 0, 6, 7),
(78, 59, '8', 9, 9, 5),
(79, 60, '7', 9, 8, 2),
(80, 60, '3', 0, 1, 2),
(81, 61, '8', 9, 9, 1),
(82, 62, '8', 9, 9, 1),
(83, 63, '6', 0, 7, 1),
(84, 64, '5', 0, 5, 1),
(85, 65, '8', 9, 9, 1),
(86, 66, '5', 0, 5, 1),
(87, 67, '5', 0, 5, 1),
(88, 68, '3', 0, 1, 1),
(89, 69, '6', 0, 7, 1),
(90, 70, '5', 0, 5, 1),
(91, 71, '6', 0, 7, 1),
(92, 72, '6', 0, 7, 1),
(93, 73, '6', 0, 7, 1),
(94, 74, '6', 0, 7, 1),
(95, 75, '5', 0, 5, 1),
(96, 76, '5', 0, 5, 1),
(97, 77, '5', 0, 5, 1),
(98, 78, '3', 0, 1, 1),
(99, 79, '3', 0, 1, 1),
(100, 80, '3', 0, 1, 1),
(101, 81, '6', 0, 7, 1),
(102, 82, '5', 0, 5, 2),
(103, 83, '5', 0, 5, 1),
(104, 84, '5', 0, 5, 1),
(105, 85, '5', 0, 5, 1),
(106, 86, '5', 0, 5, 1),
(107, 87, '5', 0, 5, 1),
(108, 88, '5', 0, 5, 1),
(109, 89, '5', 0, 5, 1),
(110, 90, '5', 0, 5, 1),
(111, 91, '5', 0, 5, 1),
(112, 92, '5', 0, 5, 1),
(113, 93, '5', 0, 5, 1),
(114, 94, '50', 0, 52, 1),
(115, 94, '39', 0, 41, 1),
(116, 95, '21', 0, 23, 1),
(117, 96, '22', 0, 24, 1),
(118, 96, '10', 0, 11, 1),
(119, 97, '47', 0, 49, 1),
(120, 98, '17', 0, 19, 1),
(121, 98, '20', 0, 22, 1),
(122, 99, '46', 0, 48, 1),
(136, 112, '37', 0, 39, -1),
(124, 101, '36', 10, 38, 1),
(125, 102, '33', 0, 35, 1),
(137, 113, '17', 0, 19, 1),
(127, 103, '39', 0, 41, 2),
(130, 106, '9', 0, 13, 1),
(131, 107, '36', 10, 38, 1),
(132, 108, '34', 0, 36, -1),
(133, 109, '23', 0, 25, -1),
(135, 111, '37', 0, 39, 1),
(138, 114, '18', 0, 20, 1),
(140, 116, '51', 0, 53, 1),
(141, 116, '32', 0, 34, 1),
(142, 117, '42', 0, 44, -1),
(162, 137, '9', 11, 62, 1),
(158, 133, '11', 0, 60, 1),
(149, 124, '11', 0, 59, 1),
(150, 125, '11', 0, 59, -1),
(177, 151, '9', 11, 62, 1),
(176, 150, '10', 11, 63, 3),
(174, 149, '11', 11, 60, 1),
(175, 150, '11', 11, 60, 2),
(172, 147, '11', 11, 60, 2),
(186, 160, '11', 0, 64, 1),
(185, 159, '11', 0, 60, 1),
(182, 156, '11', 0, 60, 1),
(183, 157, '9', 0, 62, 2),
(184, 158, '9', 0, 62, -1),
(187, 161, '11', 0, 64, -1),
(188, 161, '11', 0, 64, -1),
(189, 161, '11', 0, 64, -1),
(190, 161, '11', 0, 64, -1),
(191, 162, '9', 0, 62, -1),
(192, 163, '11', 0, 64, 1),
(193, 164, '11', 0, 64, -1),
(194, 165, '11', 0, 64, 1),
(200, 171, '11', 20, 64, 4),
(201, 172, '11', 0, 64, 1),
(202, 173, '11', 0, 64, 1),
(203, 174, '9', 0, 65, 1),
(204, 175, '11', 24, 64, 4);

-- --------------------------------------------------------

--
-- Table structure for table `detail_produk`
--

CREATE TABLE IF NOT EXISTS `detail_produk` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `warna` varchar(50) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `bentuk` varchar(50) DEFAULT NULL,
  `produk_kode` varchar(5) DEFAULT NULL,
  `ukuran` varchar(5) DEFAULT NULL,
  `status_produk` enum('preorder','stok') DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `berat` float NOT NULL DEFAULT '1',
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_produk_detail_produk` (`produk_kode`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `detail_produk`
--

INSERT INTO `detail_produk` (`id`, `nama`, `warna`, `stok`, `gambar`, `bentuk`, `produk_kode`, `ukuran`, `status_produk`, `deskripsi`, `berat`, `date_created`, `date_updated`) VALUES
(21, 'Nike Janoski White', 'Putih', 15, 'IMG_2521.jpg', NULL, 'SHNIK', '42', 'stok', '', 1, NULL, NULL),
(22, 'Nike Janoski Blue', 'Biru', 14, 'IMG_2524.jpg', NULL, 'SHNIK', '42', 'stok', '', 1, NULL, NULL),
(19, 'Vans Authentic', 'Cokelat', 16, 'IMG_2496.jpg', NULL, 'SHVAN', '41', 'stok', '', 1, NULL, NULL),
(20, 'Vans Zapato', 'Cokelat', 13, 'IMG_2518.jpg', NULL, 'SHVAN', '42', 'stok', '', 1, NULL, NULL),
(17, 'Adidas Skate-Hi', 'Biru Hitam', 14, 'IMG_2485.jpg', NULL, 'SHADI', '42', 'stok', '', 1, NULL, NULL),
(18, 'Vans Oldskool', 'Hitam', 14, 'IMG_2493.jpg', NULL, 'SHVAN', '41', 'stok', '', 1, NULL, NULL),
(15, 'Adidas Gazelle Blue', 'Biru Hitam', 15, 'IMG_2446.jpg', NULL, 'SHADI', '42', 'stok', '', 1, NULL, NULL),
(16, 'Adidas Gonzales', 'Hitam', 31, 'IMG_2448.jpg', NULL, 'SHADI', '42', 'stok', '', 1, NULL, NULL),
(13, 'Adidas Gazelle Red', 'Merah', 15, 'IMG_2437.jpg', NULL, 'SHADI', '42', 'stok', '', 1, NULL, NULL),
(14, 'Adidas Gazelle Brown', 'Cokelat', 15, 'IMG_2439.jpg', NULL, 'SHADI', '42', 'stok', '', 1, NULL, NULL),
(11, 'New Balance 554', 'Abu', 13, 'IMG_2559.jpg', NULL, 'SHNEW', '42', 'stok', '', 1, NULL, NULL),
(12, 'Adidas Gazelle Black', 'Hitam', 15, 'IMG_2430.jpg', NULL, 'SHADI', '42', 'stok', '', 1, NULL, NULL),
(9, 'New Balance 574', 'Hitam Hijau', 21, 'IMG_2546.jpg', NULL, 'SHNEW', '41', 'stok', '', 1, NULL, NULL),
(10, 'New Balance 504', 'Abu Kuning', 12, 'IMG_2550.jpg', NULL, 'SHNEW', '42', 'stok', '', 1, NULL, NULL),
(23, 'Nike Bratha Red', 'Merah', 15, 'IMG_2526.jpg', NULL, 'SHNIK', '42', 'stok', '', 1, NULL, NULL),
(24, 'Nike Cortez', 'Ungu', 14, 'IMG_2542.jpg', NULL, 'SHNIK', '42', 'stok', '', 1, NULL, NULL),
(25, 'Vans Casual', 'Cokelat', 4, 'IMG_2617.jpg', NULL, 'SHVAN', '42', 'stok', '', 1, NULL, NULL),
(26, 'Vans Transient', 'Camo Army', 10, 'vans-transient-backpack-camo-front.jpg', NULL, 'BPVAN', 'All S', 'stok', '', 1, NULL, NULL),
(39, 'Vans Volt', 'Hitam', 2, 'xl_Vans_channel_volt_tee_black.jpg', NULL, 'TEVAN', 'M', 'stok', '', 1, NULL, NULL),
(28, 'Vans Oldskool Backpack', 'Abu', 5, 'Vans-Old-Skool-Backpack-Grey.jpg', NULL, 'BPVAN', 'All S', 'stok', '', 1, NULL, NULL),
(29, 'Emerica Bambam', 'Hitam', 5, 'emerica-bambam-backpack-black-white.jpg', NULL, 'BPEME', 'All S', 'stok', '', 1, NULL, NULL),
(30, 'Emerica Satchel', 'Hitam', 5, 'emerica-satchel-bag-black.jpg', NULL, 'BPEME', 'All S', 'stok', '', 1, NULL, NULL),
(31, 'Electric Caliber', 'Hitam', 5, 'electric-black-caliber-backpack.jpg', NULL, 'BPELE', 'All S', 'stok', '', 1, NULL, NULL),
(32, 'Electric Camo', 'Camo Army', 4, 'electric-mk1-camo-backpack.jpg', NULL, 'BPELE', 'All S', 'stok', '', 1, NULL, NULL),
(33, 'Emerica Smash Blue', 'Biru', 12, 'xl_emerica_smash4bluebelt.jpg', NULL, 'BLEME', 'All S', 'stok', '', 1, NULL, NULL),
(34, 'Emerica Smash Gold', 'Cokelat', 7, 'xl_emerica_smash20safari.jpg', NULL, 'BLEME', 'All S', 'stok', '', 1, NULL, NULL),
(35, 'Emerica War', 'Cokelat', 5, 'xl_emerica_war_effort_web_belt_camo.jpg', NULL, 'BLEME', 'All S', 'stok', '', 1, NULL, NULL),
(36, 'Enjoi Panda', 'Hitam', 11, 'enjoi-panda-web-belt-black.jpg', NULL, 'BLENJ', 'All S', 'stok', '', 1, NULL, NULL),
(37, 'Vans RedHeater', 'Merah', 11, 'xl_redheather1.jpg', NULL, 'TEVAN', 'M', 'stok', '', 1, NULL, NULL),
(38, 'Vans RockHeater', 'Abu', 13, 'xl_rockheather_3.jpg', NULL, 'TEVAN', 'M', 'stok', '', 1, NULL, NULL),
(40, 'Emerica All City', 'Biru Navy', 5, 'xl_emerica_all_city_tee_navy_red.jpg', NULL, 'TEEME', 'M', 'stok', '', 1, NULL, NULL),
(41, 'Emerica Pure', 'Abu', 5, 'xl_pure5.0tee.jpg', NULL, 'TEEME', 'M', 'stok', '', 1, NULL, NULL),
(42, 'Vans Cheetah', 'Biru', 6, 'cheetah.jpg', NULL, 'SBVAN', 'All S', 'stok', '', 1, NULL, NULL),
(43, 'Vans Vulc', 'Cokelat', 7, 'la-vulc-starter.jpg', NULL, 'SBVAN', 'All S', 'stok', '', 1, NULL, NULL),
(44, 'Adidas Skate SnapBlack', 'Hitam', 6, 'xl_adidas_skate_snapback_black.jpg', NULL, 'SBADI', 'All S', 'stok', '', 1, NULL, NULL),
(45, 'Adidas Skate SnapGrey', 'Abu', 6, 'xl_adidas_skate_snapback_heather.jpg', NULL, 'SBADI', 'All S', 'stok', '', 1, NULL, NULL),
(46, 'Vans Core', 'Biru Navy', 8, 'xl_Vans_core_basics_zip_hoodie_II_blue.jpg', NULL, 'JHVAN', 'M', 'stok', '', 1, NULL, NULL),
(47, 'Vans Capitola', 'Abu', 7, 'xl_capitola_grey.jpg', NULL, 'JHVAN', 'M', 'stok', '', 1, NULL, NULL),
(48, 'Vans Pullover', 'Abu', 6, 'xl_OTWPulloverFleece.jpg', NULL, 'JHVAN', 'M', 'stok', '', 1, NULL, NULL),
(49, 'Rebel8 Red', 'Merah', 17, 're218.jpg', NULL, 'TEREB', 'M', 'stok', '', 1, NULL, NULL),
(50, 'Rebel8 Logo Tees', 'Hitam', 4, 'rebel8-r8-logo-t-shirt-black.jpg', NULL, 'TEREB', 'M', 'stok', '', 1, NULL, NULL),
(51, 'Rebel8 Logo Hooded', 'Hitam', 7, 'rebel8-r8-logo-hoodie-black.jpg', NULL, 'JHREB', 'M', 'stok', '', 1, NULL, NULL),
(52, 'Rebel8 Undead', 'Hitam', 12, '1353420330-60683600.jpg', NULL, 'JHREB', 'M', 'stok', '', 1, NULL, NULL),
(53, 'Vans Camo Socks', 'Camo Army', 7, 'xl_classicsnow_mid-camo-orange.jpg', NULL, 'SOVAN', 'All S', 'stok', '', 1, NULL, NULL),
(54, 'Vans Classic Mid', 'Abu', 7, 'xl_classicsnow_mid-grey-checker.jpg', NULL, 'SOVAN', 'All S', 'stok', '', 1, NULL, NULL),
(55, 'Vans Sk8Hi Socks', 'Biru', 16, 'xl_classicsnow_mid-sk8hi-blue.jpg', NULL, 'SOVAN', 'All S', 'stok', '', 1, NULL, NULL),
(56, 'Vans California', 'Biru', 16, 'Vans-California-Adelanto-Backpack-mm.jpg', NULL, 'BPVAN', 'All S', 'stok', '', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_retur`
--

CREATE TABLE IF NOT EXISTS `detail_retur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `retur_pembelian_id` int(11) NOT NULL,
  `detail_pembelian_id` int(11) NOT NULL,
  `jumlah` varchar(45) DEFAULT NULL,
  `keterangan_retur` text,
  `status` enum('baru','ditolak','disetujui','cofirm','accept_confirm') DEFAULT NULL,
  `gambar` text NOT NULL,
  `keterangan_verifikasi` text NOT NULL,
  `retur_detail_produk_id` text NOT NULL,
  `jumlah_pengganti` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `detail_retur`
--

INSERT INTO `detail_retur` (`id`, `retur_pembelian_id`, `detail_pembelian_id`, `jumlah`, `keterangan_retur`, `status`, `gambar`, `keterangan_verifikasi`, `retur_detail_produk_id`, `jumlah_pengganti`) VALUES
(12, 111, 135, '1', ' kerah bagian belakang sobek', '', '', '  silakan tukar produk yang sama atau produk yang harganya lebih rendah dari produk yang diretur  ', '37;37', '1;1;1;1;1'),
(11, 96, 117, '1', 'sepatu kiri kanan tidak sesuai ukuran', '', '', '  silakan tukar produk dengan jenis dan harga yang sama  ', '23', '1'),
(10, 102, 125, '1', ' cacat bagian tali', '', '', '      silakan ganti    ', '34', '1'),
(13, 116, 140, '1', ' sobek di bagian resleting', '', 'RETUR_symbol.jpg', ' silakan diganti ', '42;44', '1;1'),
(14, 124, 149, '1', 'sobek', '', '', ' silakan retur produk anda ', '11', '1'),
(15, 133, 158, '1', 'cacat pabrik', 'baru', '', '', '', ''),
(16, 150, 176, '2', 'produk cacat pabrik dan salah ukuran', 'cofirm', 'Welcome Scan.jpg', 'silakan ganti produk', '', ''),
(17, 157, 183, '1', 'rusak pabrik', '', 'BK47MYDCYAAcK7r.jpg large.jpg', 'permintaan retur diterima', '9', ''),
(18, 147, 172, '1', 'barang salah warna', 'cofirm', '4258_86194092957_2407206_n.jpg', '    silakan kirim kembali  ', '11', ''),
(19, 147, 172, '1', 'barang rusak', 'cofirm', '999656_10151718554225266_1447083086_n.jpg', '    silakan kirim kembali  ', '11', ''),
(20, 137, 162, '1', 'barang rusak', '', '999656_10151718554225266_1447083086_n.jpg', 'qwerty', '9', ''),
(21, 163, 192, '1', 'barang salah warna', '', '421935_10151718554395266_1272431555_n.jpg', '---------------', '11', ''),
(23, 175, 204, '1', 'barang rusak', 'baru', '4258_86194092957_2407206_n.jpg', '', '11', '');

-- --------------------------------------------------------

--
-- Table structure for table `diskon`
--

CREATE TABLE IF NOT EXISTS `diskon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produk_kode` varchar(5) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `berawal` datetime DEFAULT NULL,
  `berakhir` datetime DEFAULT NULL,
  `status` enum('aktif','nonaktif') NOT NULL,
  `min_quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_produk_diskon` (`produk_kode`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='daftar produk yang sedang memiliki diskon' AUTO_INCREMENT=25 ;

--
-- Dumping data for table `diskon`
--

INSERT INTO `diskon` (`id`, `produk_kode`, `diskon`, `berawal`, `berakhir`, `status`, `min_quantity`) VALUES
(10, 'BLENJ', 10, '2012-12-01 00:00:00', '2013-02-01 00:00:00', 'nonaktif', 1),
(12, 'SHNEW', 4, '2012-01-01 00:00:00', '2013-02-01 00:00:00', 'nonaktif', 1),
(13, 'SHNEW', 70, '2013-07-17 00:00:00', '2013-09-17 00:00:00', 'nonaktif', 2),
(14, 'SHNEW', 10, '2013-07-17 00:00:00', '2013-09-17 00:00:00', 'nonaktif', 2),
(15, 'SHNEW', 5, '2013-07-17 00:00:00', '2013-09-17 00:00:00', 'nonaktif', 2),
(16, 'SHNEW', 5, '2013-07-17 00:00:00', '2013-07-31 00:00:00', 'nonaktif', 2),
(17, 'BPVAN', 20, '2013-07-30 00:00:00', '2013-09-07 00:00:00', 'nonaktif', 5),
(18, 'BPVAN', 50, '2013-07-30 00:00:00', '2013-08-17 00:00:00', 'nonaktif', 2),
(19, 'SHNEW', 50, '2013-07-31 00:00:00', '2013-08-10 00:00:00', 'nonaktif', 5),
(20, 'SHNEW', 30, '2013-07-31 00:00:00', '2013-08-01 00:00:00', 'nonaktif', 2),
(21, 'SHADI', 30, '2013-07-31 00:00:00', '2013-08-10 00:00:00', 'aktif', 3),
(22, 'SHNEW', 25, '2013-08-23 00:00:00', '2013-09-23 00:00:00', 'nonaktif', 0),
(23, 'SHNEW', 25, '2013-08-23 00:00:00', '2013-09-23 00:00:00', 'nonaktif', 2),
(24, 'SHNEW', 30, '2013-08-23 00:00:00', '2013-09-23 00:00:00', 'aktif', 2);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `status` enum('aktif','nonaktif') DEFAULT NULL,
  `deskripsi` text,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=102 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `nama`, `status`, `deskripsi`, `date_created`, `date_updated`) VALUES
(1, 'operator', 'aktif', 'pengelola data master, pengelola data produk, pengelola data konfigurasi situs ', NULL, NULL),
(99, 'superadmin', 'aktif', 'super admin ', '2012-04-28 01:04:21', '2012-04-28 01:04:21'),
(100, 'kasir', 'aktif', 'pengelola transaksi dan laporan ', NULL, NULL),
(101, 'owner', 'aktif', 'pengelola data users dan laporan ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `deskripsi`, `date_created`, `date_updated`) VALUES
(16, 'Shoes', ' #shoes', NULL, NULL),
(15, 'Backpack', ' #backpack', NULL, NULL),
(13, 'Belts', ' #belts', NULL, NULL),
(6, 'Tees', ' #tees', NULL, NULL),
(7, 'Jackets & Hoodie', ' #jackets #hoodie', NULL, NULL),
(8, 'Snapback', '#snapback', NULL, NULL),
(17, 'Socks', ' #sock', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE IF NOT EXISTS `kecamatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `kota_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_kecamatan_kota` (`kota_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `nama`, `kota_id`) VALUES
(1, 'sukamenak', 1),
(6, 'babakan ciparay\r', 31),
(5, 'bandung kulon\r', 31),
(7, 'bojongloa kaler\r', 31),
(8, 'bojongloa kidul\r', 31),
(9, 'astanaanyar\r', 31),
(10, 'regol\r', 31),
(11, 'lengkong\r', 31),
(12, 'bandung kidul\r', 31),
(13, 'buahbatu\r', 31),
(14, 'rancasari\r', 31),
(15, 'gedebage\r', 31),
(16, 'cibiru\r', 31),
(17, 'panyileukan\r', 31),
(18, 'ujung berung\r', 31),
(19, 'cinambo\r', 31),
(20, 'arcamanik\r', 31),
(21, 'antapani\r', 31),
(22, 'mandalajati\r', 31),
(23, 'kiaracondong\r', 31),
(24, 'batununggal\r', 31),
(25, 'sumur bandung\r', 31),
(26, 'andir\r', 31),
(27, 'cicendo\r', 31),
(28, 'bandung wetan\r', 31),
(29, 'cibeunying kidul\r', 31),
(30, 'cibeunying kaler\r', 31),
(31, 'coblong\r', 31),
(32, 'sukajadi\r', 31),
(33, 'sukasari\r', 31),
(34, 'cidadap\r', 31),
(35, 'gambir', 42),
(36, 'tanah abang', 42),
(37, 'taman sari', 38),
(38, 'tambora', 38),
(39, 'cilandak', 39),
(40, 'pasar minggu', 39),
(41, 'duren sawit', 40),
(42, 'jatinegara', 40),
(43, 'tanjung priok', 41),
(44, 'koja', 41),
(45, 'banyumanik', 43),
(46, 'gunungpati', 43),
(47, 'asemrowo', 44),
(48, 'bulak', 44),
(49, 'danurejan', 45),
(50, 'gedong tengen', 45),
(51, 'bogor barat', 29),
(52, 'bogor selatan', 29),
(53, 'nagroe', 46);

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE IF NOT EXISTS `kelurahan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `kecamatan_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_kelurahan_kecamatan` (`kecamatan_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=119 ;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id`, `nama`, `kecamatan_id`) VALUES
(1, 'nyengseret', 1),
(5, 'sukarasa \r', 33),
(4, 'isola\r', 33),
(98, 'tugu selatan', 44),
(7, 'sarijadi\r', 33),
(8, 'pasteur\r', 32),
(9, 'cipedes\r', 32),
(10, 'sukawarna\r', 32),
(11, 'sukagalih\r', 32),
(12, 'sukabungah\r', 32),
(13, 'husein\r', 27),
(14, 'pajajaran\r', 27),
(15, 'pasirkaliki\r', 27),
(16, 'pamoyanan\r', 27),
(17, 'arjuna\r', 27),
(18, 'sukaraja\r', 27),
(19, 'kebon jeruk\r', 26),
(20, 'garuda\r', 26),
(21, 'campaka\r', 26),
(22, 'ledeng\r', 34),
(23, 'ciumbuleuit\r', 34),
(24, 'dago\r', 31),
(25, 'sekeloa\r', 31),
(26, 'cihapit\r', 28),
(27, 'citarum\r', 28),
(28, 'braga\r', 25),
(29, 'merdeka\r', 25),
(30, 'sukaluyu\r', 30),
(31, 'cigadung\r', 30),
(32, 'cikutra\r', 29),
(33, 'cicadas\r', 29),
(34, 'sukapura\r', 23),
(35, 'cicaheum\r', 23),
(36, 'gumuruh\r', 24),
(37, 'maleer\r', 24),
(38, 'paledang\r', 11),
(39, 'turangga\r', 11),
(40, 'isola\r', 33),
(41, 'sukarasa \r', 33),
(42, 'gegerkalong \r', 33),
(43, 'sarijadi\r', 33),
(44, 'pasteur\r', 32),
(45, 'cipedes\r', 32),
(46, 'sukawarna\r', 32),
(47, 'sukagalih\r', 32),
(48, 'sukabungah\r', 32),
(49, 'husein\r', 27),
(50, 'pajajaran\r', 27),
(51, 'pasirkaliki\r', 27),
(52, 'pamoyanan\r', 27),
(53, 'arjuna\r', 27),
(54, 'sukaraja\r', 27),
(55, 'kebon jeruk\r', 26),
(56, 'garuda\r', 26),
(57, 'campaka\r', 26),
(58, 'ledeng\r', 34),
(59, 'ciumbuleuit\r', 34),
(60, 'dago\r', 31),
(61, 'sekeloa\r', 31),
(62, 'cihapit\r', 28),
(63, 'citarum\r', 28),
(64, 'braga\r', 25),
(65, 'merdeka\r', 25),
(66, 'sukaluyu\r', 30),
(67, 'cigadung\r', 30),
(68, 'cikutra\r', 29),
(69, 'cicadas\r', 29),
(70, 'sukapura\r', 23),
(71, 'cicaheum\r', 23),
(72, 'gumuruh\r', 24),
(73, 'maleer\r', 24),
(74, 'paledang\r', 11),
(75, 'turangga\r', 11),
(76, 'ancol\r', 10),
(77, 'pungkur\r', 10),
(78, 'cibadak\r', 9),
(79, 'panjunan\r', 9),
(80, 'kopo\r', 7),
(81, 'jamika\r', 7),
(82, 'sukahaji\r', 6),
(83, 'babakan\r', 6),
(84, 'cibaduyut\r', 8),
(85, 'situsaeur\r', 8),
(86, 'cijerah\r', 5),
(87, 'antapani kulon\r', 21),
(88, 'sukamiskin\r', 20),
(89, 'pasir jati\r', 18),
(90, 'cipadung\r', 16),
(91, 'derwati\r', 14),
(92, 'sekejati\r', 13),
(93, 'mengger\r', 12),
(94, 'cipadung kulon\r', 17),
(95, 'sukamulya\r', 19),
(96, 'jati handap\r', 22),
(97, 'rancabolang\r', 15),
(99, 'warakas', 44),
(100, 'kampung melayu', 42),
(101, 'pondok kelapa', 41),
(102, 'lebak bulus', 39),
(103, 'ragunan', 40),
(104, 'glodok', 37),
(105, 'angke', 38),
(106, 'gambir', 35),
(107, 'bendungan hilir', 36),
(108, 'banyumanik', 45),
(109, 'gunungpati', 46),
(110, 'bulak', 48),
(111, 'asemrowo', 47),
(112, 'suryatmajan', 49),
(113, 'pringgokusuman', 50),
(114, 'curug', 51),
(115, 'margajaya', 51),
(116, 'cipaku', 52),
(117, 'genteng', 52),
(118, 'lhokseumawe', 53);

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `propinsi_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_propinsi_kota` (`propinsi_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id`, `nama`, `propinsi_id`) VALUES
(16, 'kabupaten garut\r', 1),
(15, 'kabupaten bandung\r', 1),
(14, 'kabupaten cianjur\r', 1),
(13, 'kabupaten sukabumi\r', 1),
(12, 'kabupaten bogor\r', 1),
(17, 'kabupaten tasikmalaya\r', 1),
(18, 'kabupaten ciamis\r', 1),
(19, 'kabupaten kuningan\r', 1),
(20, 'kabupaten cirebon\r', 1),
(21, 'kabupaten majalengka\r', 1),
(22, 'kabupaten sumedang\r', 1),
(23, 'kabupaten indramayu\r', 1),
(24, 'kabupaten subang\r', 1),
(25, 'kabupaten purwakarta\r', 1),
(26, 'kabupaten karawang\r', 1),
(27, 'kabupaten bekasi\r', 1),
(28, 'kabupaten bandung barat\r', 1),
(29, 'kota bogor\r', 1),
(30, 'kota sukabumi\r', 1),
(31, 'bandung', 1),
(32, 'kota cirebon\r', 1),
(33, 'kota bekasi\r', 1),
(34, 'kota depok\r', 1),
(35, 'kota cimahi\r', 1),
(36, 'kota tasikmalaya\r', 1),
(37, 'kota banjar\r', 1),
(38, 'jakarta barat', 47),
(39, 'jakarta selatan', 47),
(40, 'jakarta timur', 47),
(41, 'jakarta utara', 47),
(42, 'jakarta pusat', 47),
(43, 'semarang', 48),
(44, 'surabaya', 50),
(45, 'yogyakarta', 49),
(46, 'bireun', 37);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `no_ktp` varchar(30) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `agama_id` int(11) DEFAULT NULL,
  `jenis_kelamin` enum('pria','wanita') DEFAULT NULL,
  `alamat` varchar(80) DEFAULT NULL,
  `kelurahan_id` int(11) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `email` text,
  `password` varchar(100) NOT NULL,
  `aktivasi_key` varchar(100) NOT NULL,
  `status` enum('aktif','nonaktif','new') NOT NULL,
  `status_sso` enum('unregister','register') NOT NULL DEFAULT 'register',
  PRIMARY KEY (`no_ktp`),
  KEY `FK_agama_member` (`agama_id`),
  KEY `FK_kelurahan_member` (`kelurahan_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`no_ktp`, `nama`, `agama_id`, `jenis_kelamin`, `alamat`, `kelurahan_id`, `telp`, `email`, `password`, `aktivasi_key`, `status`, `status_sso`) VALUES
('12348792', 'member', 1, NULL, 'bandung', 1, '97637866', 'member@localhost.com', 'e3ac76b1900741e1246d9c30cb1333e1', 'bWVtYmVyQGxvY2FsaG9zdC5jb218cGlzYWh8ZXppbmUxMjM0NTY3ODk=', 'aktif', 'register'),
('59248892', 'Doni', 1, NULL, 'Jl. Cijeruk no. 4', 24, '08996120959', 'djay10108372@gmail.com', 'e3ac76b1900741e1246d9c30cb1333e1', 'ZGpheTEwMTA4MzcyQGdtYWlsLmNvbXxwaXNhaHxlemluZTEyMzQ1Njc4OQ==', 'aktif', 'register'),
('14045', 'Djay', 1, NULL, 'Jl. Taman Sari Raya 17', 104, '08562016206', 'donidjayusman@yahoo.com', 'e3ac76b1900741e1246d9c30cb1333e1', 'ZG9uaWRqYXl1c21hbkB5YWhvby5jb218cGlzYWh8ZXppbmUxMjM0NTY3ODk=', 'aktif', 'register'),
('12345678', 'rony', 1, NULL, 'Jl. Jalan No.42', 91, '02232467328', 'rony.aprianto90@gmail.com', '8ab850d26e55e91b7c5552a5fe06cc11', 'cm9ueS5hcHJpYW50bzkwQGdtYWlsLmNvbXxwaXNhaHxlemluZTEyMzQ1Njc4OQ==', 'new', 'register'),
('45555', 'dani', 1, NULL, 'jln xx', 1, '0776555', 'danzztakezo@gmail.com', 'e3ac76b1900741e1246d9c30cb1333e1', 'ZGFuenp0YWtlem9AZ21haWwuY29tfHBpc2FofGV6aW5lMTIzNDU2Nzg5', 'aktif', 'register'),
('10108372', 'Doni Djayusman', 1, NULL, 'Jl. Babakan Ciparay no. 16', 82, '08562016206', 'haydjay@gmail.com', '8c66e31816045d5a21162fe63d21cf5c', 'aGF5ZGpheUBnbWFpbC5jb218cGlzYWh8ZXppbmUxMjM0NTY3ODk=', 'aktif', 'register'),
('6421000210004576', 'Cevina', 1, NULL, 'Komp. Banyumanik IV blok 10 no 6', 108, '08784567263', 'abah.crossingcrew@gmail.com', 'e3ac76b1900741e1246d9c30cb1333e1', 'YWJhaC5jcm9zc2luZ2NyZXdAZ21haWwuY29tfHBpc2FofGV6aW5lMTIzNDU2Nzg5', 'aktif', 'register');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `intitle` varchar(100) NOT NULL,
  `category` enum('static','dinamic') NOT NULL DEFAULT 'static',
  `incontent` text NOT NULL,
  `entitle` varchar(100) NOT NULL,
  `encontent` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `intitle`, `category`, `incontent`, `entitle`, `encontent`, `date_created`, `date_updated`) VALUES
(1, 'aboutus', 'about us', 'static', 'Mag & Shoes', '', '', '2012-03-15 00:57:43', '2012-03-15 00:57:51'),
(2, 'delivery', 'delivery', 'static', 'Mag & Shoes\r\nHow to order', 'Mag & Shoes', '', '0000-00-00 00:00:00', '2012-03-17 11:04:30'),
(3, 'payment', 'payment', 'static', 'Mag & Shoes How to Payment', '', '', '0000-00-00 00:00:00', '2012-03-17 11:04:30'),
(4, 'pemesanan_online', 'Pemesanan Online', 'static', 'Cara Order / Pemesanan Online\r\n\r\nOrder Melalui Website\r\n\r\n\r\n', '', '', '2012-03-18 16:13:09', '2012-03-18 16:13:17'),
(5, 'TransferPage', 'Transfer Page', 'static', '<p>&nbsp;<span>Anda dapat melakukan pembayaran dengan transfer BCA ke rekening BCA sebagai berikut:</span> <span class="aboutus_list payment_method"> <span class="icon_bank"><img src="/pekerjaan/AGUS/kartikasari/images/bca.jpg" alt="" align="top" /></span> <span class="account_number"> <span class="label">No Rekening:</span> <span class="label_info">784.009.8171 </span> </span> <span class="account_number"> <span class="label">Atas Nama:</span> <span class="label_info"> Alfen Hidayat</span> </span> </span> <span class="payment_info">Jika Anda melakukan pembayaran atas nama lain, silahkan melakukan konfirmasi kembali kepada kami agar tidak terjadi kesalahan.</span> <span class="payment_info">Jika anda tidak mempunyai account di bank BCA, Anda dapat melakukan setoran tunai ke rekening kami di cabang bank BCA terdekat.</span> <span class="payment_info">Setelah Anda melakukan pembayaran, silahkan konfirmasikan pembayaran Anda dengan cara:</span></p>\r\n<ul class="notify">\r\n<li><img src="/pekerjaan/AGUS/kartikasari/images/PostBullets.png" alt="" align="top" />\r\n<p>SMS ke nomor: 0856 2016 206.<br /> (Format SMS : Nama Pengirim, Nama Pemesan, Jumlah Transfer)</p>\r\n</li>\r\n<li><img src="/pekerjaan/AGUS/kartikasari/images/PostBullets.png" alt="" align="top" />\r\n<p>Kontak kami langsung ke FLEXI di 022 739 39 555.</p>\r\n</li>\r\n</ul>\r\n<p><span>NOTE: Pembayaran dianggap sah jika ditransfer atau disetor ke rekening di atas.</span></p>', '', '', '2012-03-18 16:15:03', '2012-03-18 16:15:09'),
(6, 'home', 'home', 'static', '<p>home</p>', 'home', '<p>home</p>', '2012-03-27 20:13:11', '2012-03-27 20:13:20'),
(7, 'products', 'products', 'static', '<p>products</p>', 'products', '<p>products</p>', '2012-03-27 20:24:23', '2012-03-27 20:24:52'),
(8, 'special_hampers', 'special_hampers', 'static', '<p>special_hampers</p>', 'special_hampers', '<p>special_hampers</p>', '2012-03-27 20:24:43', '2012-03-27 20:24:52'),
(9, 'locations', 'locations', 'static', 'location', 'location', 'location', '2012-03-27 23:35:32', '2012-03-27 23:35:37'),
(10, 'faq', 'faq', 'static', '<h3>Why does this project exist?</h3>\r\n<blockquote>\r\n<p style="text-align: justify;">To take over the CVS user base. Specifically, we''re writing a new version control system that is very similar to CVS, but fixes many things that are broken. See our front page.</p>\r\n</blockquote>\r\n<p>&nbsp;</p>\r\n<h3>Is Subversion proprietary? I heard that it belongs to CollabNet. &nbsp;&nbsp;</h3>\r\n<blockquote>\r\n<p style="text-align: justify;">No, Subversion is open source / free software. CollabNet (and other companies) pay the salaries of some full-time developers, but the software carries an <a href="http://www.apache.org/licenses/LICENSE-2.0">Apache License</a> which is fully compliant with the <a href="http://www.debian.org/social_contract#guidelines">Debian Free Software Guidelines</a>. In other words, you are free to download, modify, and redistribute Subversion as you please; no permission from CollabNet or anyone else is required.</p>\r\n</blockquote>\r\n<h3>&nbsp;</h3>\r\n<h3>Is Subversion stable enough for me to use for my own projects? &nbsp;&nbsp;</h3>\r\n<blockquote>\r\n<p style="text-align: justify;">Yes, absolutely. It''s ready for prime-time production.</p>\r\n<p style="text-align: justify;">Subversion has been in development since 2000, and became self-hosting after one year. A year later when we declared "alpha", Subversion was already being used by dozens of private developers and shops for real work. After that, it was two more years of bugfixing and stabilization until we reached 1.0. Most other projects probably would have called the product "1.0" much earlier, but we deliberately decided to delay that label as long as possible. We were aware that many people were waiting for a 1.0 before using Subversion, and had very specific expectations about the meaning of that label. So we stuck to that same standard.</p>\r\n<p style="text-align: justify;">&nbsp;</p>\r\n</blockquote>\r\n<h3>What is Subversion''s client/server interoperability policy? &nbsp;&nbsp;</h3>\r\n<blockquote>\r\n<p>The client and server are designed to work as long as they aren''t more than one major release version apart. For example, any 1.X client will work with a 1.Y server. However, if the client and server versions don''t match, certain features may not be available.</p>\r\n<p>See the client/server interoperability policy is documented in the "Compatibility" section of the <a href="http://subversion.apache.org/docs/community-guide/">Subversion Commuity Guide</a>.</p>\r\n</blockquote>', '', '', '2012-06-24 11:00:24', '2012-06-24 18:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pembelian_id` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `jenis_bayar` varchar(16) DEFAULT NULL,
  `no_rekening` varchar(16) DEFAULT NULL,
  `no_rek_tujuan` varchar(16) DEFAULT NULL,
  `rekening_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal_bayar` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_pembayaran_pembelian` (`pembelian_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `pembelian_id`, `tanggal`, `jenis_bayar`, `no_rekening`, `no_rek_tujuan`, `rekening_id`, `total`, `tanggal_bayar`) VALUES
(49, 113, '2013-01-12 20:51:23', NULL, '76125367', '897654333567', 1, 304000, '0000-00-00 00:00:00'),
(48, 112, '2013-01-12 19:29:06', 'retur', '0', '0', 1, -190000, '0000-00-00 00:00:00'),
(47, 111, '2013-01-12 19:13:23', NULL, '987654321', '897654333567', 1, 194000, '0000-00-00 00:00:00'),
(46, 109, '2013-01-10 01:11:11', 'retur', '0', '0', 1, -300000, '0000-00-00 00:00:00'),
(45, 108, '2013-01-06 04:32:55', 'retur', '0', '0', 1, -150000, '0000-00-00 00:00:00'),
(44, 106, '2012-12-12 00:01:20', NULL, '153457890', '897654333567', 1, 244000, '0000-00-00 00:00:00'),
(43, 99, '2012-12-10 21:32:54', NULL, '2345435332', '897654333567', 1, 300000, '0000-00-00 00:00:00'),
(41, 96, '2012-12-05 23:28:07', NULL, '12345678909', '897654333567', 1, 538000, '0000-00-00 00:00:00'),
(40, 94, '2012-12-05 02:41:20', NULL, '4567821021', '97656788654', 2, 373000, '0000-00-00 00:00:00'),
(50, 116, '2013-01-29 19:07:40', NULL, '67243534690055', '897654333567', 1, 774000, '0000-00-00 00:00:00'),
(51, 117, '2013-01-29 19:22:13', 'retur', '0', '0', 1, -150000, '0000-00-00 00:00:00'),
(52, 125, '2013-01-30 23:45:04', 'retur', '0', '0', 1, -150, '0000-00-00 00:00:00'),
(53, 137, '2013-02-21 15:36:38', NULL, '672517100', '897654333567', 1, 2440, '0000-00-00 00:00:00'),
(54, 149, '2013-02-25 06:33:56', NULL, '62719704082398', '897654333567', 1, 2440, '0000-00-00 00:00:00'),
(55, 150, '2013-02-27 08:35:37', NULL, '12346543500', '897654333567', 1, 10000, '0000-00-00 00:00:00'),
(56, 156, '2013-06-07 22:11:11', NULL, '423985743', '897654333567', 1, 2500, '0000-00-00 00:00:00'),
(57, 157, '2013-06-15 13:33:43', NULL, '44356765009', '897654333567', 1, 5000, '0000-00-00 00:00:00'),
(58, 158, '2013-06-15 14:08:25', 'retur', '0', '0', 1, -1500, '0000-00-00 00:00:00'),
(59, 159, '2013-06-28 22:26:32', NULL, '76766534478', '897654333567', 1, 2500, '2013-06-28 00:00:00'),
(60, 161, '2013-07-13 22:32:17', 'retur', '0', '0', 1, -300, '0000-00-00 00:00:00'),
(61, 161, '2013-07-13 22:33:34', 'retur', '0', '0', 1, -600, '0000-00-00 00:00:00'),
(62, 162, '2013-07-13 22:37:13', 'retur', '0', '0', 1, -1500, '0000-00-00 00:00:00'),
(63, 163, '2013-07-13 22:48:27', NULL, '04324423', '97656788654', 2, 160, '2013-07-13 00:00:00'),
(64, 164, '2013-07-13 22:54:31', 'retur', '0', '0', 1, -150, '0000-00-00 00:00:00'),
(65, 171, '2013-07-31 00:42:40', NULL, '8976765345478', '897654333567', 1, 460, '2013-07-31 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice` varchar(8) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `member_no_ktp` varchar(30) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status_pembayaran` enum('sudah','blom','konfirmasi') DEFAULT NULL,
  `status_barang` enum('stok','preorder') DEFAULT NULL,
  `type_pembayaran` enum('paypall','transfer','cod','setor_tunai') DEFAULT NULL,
  `rekening_id` int(11) NOT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `kurs` float DEFAULT NULL,
  `referesi_pembelian_id` int(11) NOT NULL,
  `type_pembelian` enum('penjualan','retur') NOT NULL DEFAULT 'retur',
  PRIMARY KEY (`id`),
  KEY `FK_pembelian_member` (`member_no_ktp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=176 ;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `invoice`, `tanggal`, `member_no_ktp`, `subtotal`, `total`, `status_pembayaran`, `status_barang`, `type_pembayaran`, `rekening_id`, `currency`, `kurs`, `referesi_pembelian_id`, `type_pembelian`) VALUES
(111, '351', '2013-01-12 19:12:11', '59248892', 190000, 194000, 'sudah', 'stok', 'transfer', 1, 'USD', 1, 0, 'retur'),
(109, 'R-106', '2013-01-10 01:11:11', '10108372', -300000, -300000, 'sudah', 'stok', 'transfer', 1, 'USD', 1, 96, 'retur'),
(108, 'R-535', '2013-01-06 04:32:55', '10108372', -150000, -150000, 'sudah', 'stok', 'paypall', 0, 'USD', 9000, 102, 'retur'),
(107, '351', '2012-12-12 00:41:17', '14045', 175000, 166500, 'sudah', 'stok', 'paypall', 0, 'USD', 9000, 0, 'retur'),
(106, '692', '2012-12-11 23:59:11', '14045', 230000, 244000, 'sudah', 'stok', 'transfer', 1, 'USD', 1, 0, 'retur'),
(113, '978', '2013-01-12 20:50:45', '59248892', 300000, 304000, 'sudah', 'stok', 'transfer', 1, 'USD', 1, 0, 'retur'),
(102, '535', '2012-12-10 22:32:24', '10108372', 150000, 154000, 'sudah', 'stok', 'paypall', 0, 'USD', 9000, 0, 'retur'),
(101, '273', '2012-12-10 22:29:20', '10108372', 175000, 161500, 'konfirmasi', 'stok', 'paypall', 0, 'USD', 9000, 0, 'retur'),
(112, 'R-351', '2013-01-12 19:29:06', '59248892', -190000, -190000, 'sudah', 'stok', 'transfer', 1, 'USD', 1, 111, 'retur'),
(137, '451', '2013-02-21 15:32:57', '10108372', 1500, 2440, 'sudah', 'stok', 'transfer', 1, 'USD', 1, 0, 'retur'),
(96, '106', '2012-12-05 23:27:27', '10108372', 530000, 538000, 'sudah', 'stok', 'transfer', 1, 'USD', 1, 0, 'retur'),
(94, '471', '2012-12-05 02:39:03', '10108372', 365000, 373000, 'sudah', 'stok', 'transfer', 2, 'USD', 1, 0, 'retur'),
(95, '523', '2012-12-05 02:46:07', '10108372', 300000, 304000, 'sudah', 'stok', 'paypall', 0, 'USD', 9000, 0, 'retur'),
(114, '180', '2013-01-28 23:02:10', '59248892', 250000, 265000, 'sudah', 'stok', 'paypall', 0, 'USD', 9000, 0, 'retur'),
(116, '472', '2013-01-29 19:06:19', '6421000210004576', 750000, 774000, 'sudah', 'stok', 'transfer', 1, 'USD', 1, 0, 'retur'),
(117, 'R-472', '2013-01-29 19:22:13', '6421000210004576', -150000, -150000, 'sudah', 'stok', 'transfer', 1, 'USD', 1, 116, 'retur'),
(133, '182', '2013-02-11 12:13:30', '10108372', 1500, 2500, 'sudah', 'stok', 'paypall', 0, 'USD', 9000, 0, 'retur'),
(151, '848', '2013-02-27 09:09:03', '10108372', 1500, 2440, 'sudah', 'stok', 'paypall', 0, 'USD', 1, 0, 'retur'),
(124, '822', '2013-01-30 23:18:35', '10108372', 150, 190, 'sudah', 'stok', 'paypall', 0, 'USD', 9000, 0, 'retur'),
(125, 'R-822', '2013-01-30 23:45:04', '10108372', -150, -150, 'sudah', 'stok', 'paypall', 0, 'USD', 9000, 124, 'retur'),
(149, '559', '2013-02-25 06:32:07', '10108372', 1500, 2440, 'sudah', 'stok', 'transfer', 1, 'USD', 1, 0, 'retur'),
(150, '361', '2013-02-27 08:27:13', '14045', 8100, 8900, 'sudah', 'stok', 'transfer', 1, 'USD', 1, 0, 'retur'),
(147, '631', '2013-02-22 15:33:30', '10108372', 3000, 5000, 'sudah', 'stok', 'paypall', 0, 'USD', 1, 0, 'retur'),
(159, '841', '2013-06-28 21:26:27', '10108372', 1500, 2500, 'konfirmasi', 'stok', 'transfer', 1, 'USD', 1, 0, 'retur'),
(156, '261', '2013-06-07 22:08:29', '10108372', 1500, 2500, 'sudah', 'stok', 'transfer', 1, 'USD', 1, 0, 'retur'),
(157, '827', '2013-06-15 13:26:44', '1706390618', 3000, 5000, 'sudah', 'stok', 'transfer', 1, 'USD', 1, 0, 'retur'),
(158, 'R-827', '2013-06-15 14:08:25', '1706390618', -1500, -1500, 'sudah', 'stok', 'transfer', 1, 'USD', 1, 157, 'retur'),
(160, '261', '2013-07-13 21:08:20', '10108372', 150, 160, 'sudah', 'stok', 'paypall', 0, 'USD', 1, 0, 'retur'),
(161, 'R-631', '2013-07-13 22:32:17', '10108372', -600, -600, 'sudah', 'stok', 'paypall', 0, 'USD', 1, 147, 'retur'),
(162, 'R-451', '2013-07-13 22:37:13', '10108372', -1500, -1500, 'sudah', 'stok', 'transfer', 1, 'USD', 1, 137, 'retur'),
(163, '927', '2013-07-13 22:44:08', '10108372', 150, 160, 'sudah', 'stok', 'transfer', 2, 'USD', 1, 0, 'retur'),
(164, 'R-927', '2013-07-13 22:54:31', '10108372', -150, -150, 'sudah', 'stok', 'transfer', 2, 'USD', 1, 163, 'retur'),
(165, '792', '2013-07-13 23:06:52', '10108372', 150, 160, 'sudah', 'stok', 'paypall', 0, 'USD', 1, 0, 'retur'),
(171, '907', '2013-07-31 00:40:47', '10108372', 600, 460, 'sudah', 'stok', 'transfer', 1, 'USD', 1, 0, 'retur');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE IF NOT EXISTS `pengiriman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `pembelian_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `tarif_id` int(11) DEFAULT NULL,
  `kode_pengiriman` text,
  `total_biaya` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `no_telp` varchar(45) DEFAULT NULL,
  `kelurahan_id` int(11) NOT NULL,
  `status_pengiriman` enum('belum','mengirim','terkirim') DEFAULT 'belum',
  `tanggal_penerimaan` datetime NOT NULL,
  PRIMARY KEY (`id`,`kelurahan_id`),
  KEY `FK_pengiriman_pembelian` (`pembelian_id`),
  KEY `FK_tarif_pengiriman` (`tarif_id`),
  KEY `FK_vendor_pengiriman` (`vendor_id`),
  KEY `fk_pengiriman_kelurahan1` (`kelurahan_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=151 ;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id`, `nama`, `pembelian_id`, `vendor_id`, `tarif_id`, `kode_pengiriman`, `total_biaya`, `tanggal`, `alamat`, `no_telp`, `kelurahan_id`, `status_pengiriman`, `tanggal_penerimaan`) VALUES
(87, 'Doni', 111, 2, 3, '1779613550002', 4000, '2013-01-12 00:00:00', 'Jl. Cijeruk no. 4', '08996120959', 24, 'terkirim', '2013-01-12 19:15:42'),
(85, 'Doni Djayusman', 109, 2, 3, '1779613550002', 8000, '2013-01-28 00:00:00', 'Jl. Babakan Ciparay no. 16', '08562016206', 82, 'terkirim', '2013-01-28 23:19:46'),
(84, 'Doni Djayusman', 108, 2, 3, '1779613550002', 4000, '2013-01-28 00:00:00', 'Jl. Babakan Ciparay no. 16', '08562016206', 82, 'terkirim', '2013-01-28 23:22:48'),
(83, 'Djay', 107, 2, 9, '1779613550002', 9000, '2012-12-12 00:00:00', 'Jl. Taman Sari Raya 17', '08562016206', 103, 'terkirim', '2012-12-12 00:44:46'),
(82, 'Bowo', 106, 2, 15, '1861842470005', 14000, '2012-12-12 00:00:00', 'Jl. Bulak Selatan no 4', '08562016206', 110, 'terkirim', '2012-12-12 00:12:35'),
(89, 'Doni', 113, 2, 3, '1861842470005', 4000, '2013-01-12 00:00:00', 'Jl. Cijeruk no. 4', '08996120959', 24, '', '2013-01-12 20:57:42'),
(78, 'Doni Djayusman', 102, 2, 3, '1861842470005', 4000, '2012-12-10 00:00:00', 'Jl. Babakan Ciparay no. 16', '08562016206', 82, 'terkirim', '2012-12-10 22:35:33'),
(77, 'Doni Djayusman', 101, 2, 3, NULL, 4000, '2012-12-10 22:29:21', 'Jl. Babakan Ciparay no. 16', '08562016206', 82, 'belum', '0000-00-00 00:00:00'),
(88, 'Doni', 112, 2, 3, '1861842470005', 4000, '2013-01-12 00:00:00', 'Jl. Cijeruk no. 4', '08996120959', 24, 'terkirim', '2013-01-12 19:30:37'),
(74, 'dani', 98, 99, 99, NULL, 0, '2012-12-10 21:10:42', 'jln xx', '0776555', 1, 'belum', '0000-00-00 00:00:00'),
(75, 'Doni Djayusman', 99, 99, 99, NULL, 0, '2012-12-10 21:31:16', 'Jl. Babakan Ciparay no. 16', '08562016206', 82, 'belum', '0000-00-00 00:00:00'),
(72, 'Doni Djayusman', 96, 2, 3, '1861842470005', 8000, '2012-12-05 00:00:00', 'Jl. Babakan Ciparay no. 16', '08562016206', 82, 'terkirim', '2012-12-10 21:30:29'),
(70, 'Doni', 94, 2, 6, '1861842470005', 8000, '2012-12-05 00:00:00', 'Jl. Babakan Ciparay no 16', '08562016206', 1, 'terkirim', '2012-12-05 02:43:45'),
(71, 'Djay', 95, 2, 6, '1861842470005', 4000, '2012-12-05 00:00:00', 'Jl. babakan ciparay 10', '08562205710', 1, 'terkirim', '2012-12-05 02:50:27'),
(90, 'Tyas', 114, 2, 19, '1861842470005', 15000, '2013-01-28 00:00:00', 'Jl. Raya no 120', '08781234567', 118, '', '2013-01-28 23:06:23'),
(92, 'Cevina', 116, 2, 14, '1779613550002', 24000, '2013-01-29 00:00:00', 'Komp. Banyumanik IV blok 10 no 6', '08784567263', 108, '', '2013-01-29 22:07:01'),
(93, 'Cevina', 117, 2, 14, '1779613550002', 24000, '2013-01-29 00:00:00', 'Komp. Banyumanik IV blok 10 no 6', '08784567263', 108, 'terkirim', '2013-01-30 23:17:31'),
(109, 'Doni Djayusman', 133, 2, 3, '1779613550002', 1000, '2013-02-19 00:00:00', 'Jl. Babakan Ciparay no. 16', '08562016206', 82, 'terkirim', '2013-02-19 12:52:34'),
(113, 'Doni Djayusman', 137, 2, 3, '1779613550002', 1000, '2013-02-21 00:00:00', 'Jl. Babakan Ciparay no. 16', '08562016206', 82, 'terkirim', '2013-02-21 15:38:58'),
(125, 'Doni Djayusman', 151, 2, 99999, '1861842470005', 1000, '2012-08-08 00:00:00', 'Jl. Babakan Ciparay no. 16', '08562016206', 82, '', '0000-00-00 00:00:00'),
(123, 'Doni Djayusman', 149, 2, 99999, 'SUBD300034008213', 1000, '2012-08-08 00:00:00', 'Jl. Babakan Ciparay no. 16', '08562016206', 82, '', '0000-00-00 00:00:00'),
(100, 'Doni Djayusman', 124, 2, 3, '1779613550002', 40, '2013-01-30 00:00:00', 'Jl. Babakan Ciparay no. 16', '08562016206', 82, 'terkirim', '2013-01-30 23:22:06'),
(101, 'Doni Djayusman', 125, 2, 3, '1779613550002', 40, '2013-01-31 00:00:00', 'Jl. Babakan Ciparay no. 16', '08562016206', 82, 'terkirim', '2013-01-31 08:40:31'),
(124, 'Djay', 150, 2, 99999, '1779613550002', 800, '2013-02-27 00:00:00', 'Jl. Taman Sari Raya 17', '08562016206', 104, 'terkirim', '2013-02-27 08:44:57'),
(121, 'Doni Djayusman', 147, 2, 99999, '1779613550002', 2000, '2013-02-22 00:00:00', 'Jl. Babakan Ciparay no. 16', '08562016206', 82, 'terkirim', '2013-02-22 15:36:21'),
(134, 'Doni Djayusman', 160, 4, 99999, '020180996465', 10, '2013-07-13 00:00:00', 'Jl. Babakan Ciparay no. 16', '08562016206', 82, 'mengirim', '0000-00-00 00:00:00'),
(133, 'Doni Djayusman', 159, 4, 99999, NULL, 1000, '2013-06-28 21:26:27', 'Jl. Babakan Ciparay no. 16', '08562016206', 82, 'belum', '0000-00-00 00:00:00'),
(130, 'Doni Djayusman', 156, 2, 99999, 'BDOM600341913913', 1000, '2012-08-08 00:00:00', 'Jl. Babakan Ciparay no. 16', '08562016206', 82, '', '0000-00-00 00:00:00'),
(131, 'Doni Djayusman', 157, 2, 99999, 'BDOM600341913913', 2000, '2013-06-15 00:00:00', 'Bandung', '08562016206', 82, 'terkirim', '2013-06-15 00:00:00'),
(132, 'Doni Djayusman', 158, 2, 99999, 'BDOM600341913913', 2000, '2013-06-18 00:00:00', 'Bandung', '08562016206', 82, 'mengirim', '0000-00-00 00:00:00'),
(135, 'Doni Djayusman', 161, 2, 99999, NULL, 2000, NULL, 'Jl. Babakan Ciparay no. 16', '08562016206', 82, 'belum', '0000-00-00 00:00:00'),
(136, 'Doni Djayusman', 161, 2, 99999, NULL, 2000, NULL, 'Jl. Babakan Ciparay no. 16', '08562016206', 82, 'belum', '0000-00-00 00:00:00'),
(137, 'Doni Djayusman', 162, 2, 3, NULL, 1000, NULL, 'Jl. Babakan Ciparay no. 16', '08562016206', 82, 'belum', '0000-00-00 00:00:00'),
(138, 'Doni Djayusman', 163, 4, 99999, '020180996465', 10, '2013-07-13 00:00:00', 'Jl. Babakan Ciparay no. 16', '08562016206', 82, 'terkirim', '0000-00-00 00:00:00'),
(139, 'Doni Djayusman', 164, 4, 99999, '020180698099', 10, '2013-07-13 00:00:00', 'Jl. Babakan Ciparay no. 16', '08562016206', 82, 'terkirim', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE IF NOT EXISTS `pictures` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `intitle` varchar(100) NOT NULL,
  `indescription` text NOT NULL,
  `entitle` varchar(100) NOT NULL,
  `endescription` text NOT NULL,
  `pages_id` int(10) NOT NULL,
  `image` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `kode` varchar(5) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `gambar` varchar(100) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `status_produk` enum('preorder','stok') DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`kode`,`users_id`),
  KEY `kategori_id` (`kategori_id`),
  KEY `fk_produk_users` (`users_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kode`, `nama`, `deskripsi`, `gambar`, `kategori_id`, `status_produk`, `date_created`, `date_updated`, `users_id`) VALUES
('SHNEW', 'New Balance Shoes', '#newbalance        ', 'NewBalance-Logo.jpeg', 16, 'stok', NULL, NULL, 1),
('SHADI', 'Adidas Shoes', ' #adidas shoes', 'adidas-logo.jpg', 16, 'stok', NULL, NULL, 1),
('SHVAN', 'Vans Shoes', ' #vans shoes', 'Vans-Logo-van-shoes-9511282-250-250.jpg', 16, 'stok', NULL, NULL, 1),
('SHNIK', 'Nike Shoes', ' #nike shoes', 'nike.jpg', 16, 'stok', NULL, NULL, 1),
('BPVAN', 'Vans Backpack', ' #vans', 'Vans-Logo-van-shoes-9511282-250-250.jpg', 15, 'stok', NULL, NULL, 1),
('BPEME', 'Emerica Backpack', ' #emerica', 'SPO-EMR-001d__26672.1315557328.400.400.jpg', 15, 'stok', NULL, NULL, 1),
('BPELE', 'Electric Visual Backpack', ' #electric', 'elect.jpg', 15, 'stok', NULL, NULL, 1),
('BLEME', 'Emerica Belts', ' #belts', 'SPO-EMR-001d__26672.1315557328.400.400.jpg', 13, 'stok', NULL, NULL, 1),
('BLENJ', 'Enjoi Belts', ' #enjoi', 'bp_enjoi_logo.jpg', 13, 'stok', NULL, NULL, 1),
('TEVAN', 'Vans Tees', ' #vans #tees', 'Vans-Logo-van-shoes-9511282-250-250.jpg', 6, 'stok', NULL, NULL, 1),
('TEEME', 'Emerica Tees', ' #emerica #tees', 'SPO-EMR-001d__26672.1315557328.400.400.jpg', 6, 'stok', NULL, NULL, 1),
('SBVAN', 'Vans Snapback', ' #vans #hat', 'Vans-Logo-van-shoes-9511282-250-250.jpg', 8, 'stok', NULL, NULL, 1),
('SBADI', 'Adidas Snapback', ' #adidas #hats', 'adidas-logo.jpg', 8, 'stok', NULL, NULL, 1),
('JHVAN', 'Vans Jackets', ' #vans #jackhoodie', 'Vans-Logo-van-shoes-9511282-250-250.jpg', 7, 'stok', NULL, NULL, 1),
('TEREB', 'Rebel8 Tees', ' #rebel8', 'rebel-8.jpg', 6, 'stok', NULL, NULL, 1),
('JHREB', 'Rebel8 Hoodie', ' #rebel8', 'rebel-8.jpg', 7, 'stok', NULL, NULL, 1),
('SOVAN', 'Vans Socks', ' #vans', 'Vans-Logo-van-shoes-9511282-250-250.jpg', 17, 'stok', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `propinsi`
--

CREATE TABLE IF NOT EXISTS `propinsi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `propinsi`
--

INSERT INTO `propinsi` (`id`, `nama`) VALUES
(1, 'jawa barat'),
(60, 'sulawesi tengah\r'),
(59, 'sulawesi utara\r'),
(58, 'kalimantan timur\r'),
(57, 'kalimantan selatan\r'),
(56, 'kalimantan tengah\r'),
(55, 'kalimantan barat\r'),
(54, 'nusa tenggara timur\r'),
(53, 'nusa tenggara barat\r'),
(52, 'bali\r'),
(51, 'banten\r'),
(50, 'jawa timur\r'),
(49, 'di yogyakarta\r'),
(48, 'jawa tengah\r'),
(47, 'dki jakarta\r'),
(46, 'kepulauan riau\r'),
(45, 'kepulauan bangka belitung\r'),
(44, 'lampung\r'),
(43, 'bengkulu\r'),
(42, 'sumatera selatan\r'),
(41, 'jambi\r'),
(40, 'riau\r'),
(39, 'sumatera barat\r'),
(38, 'sumatera utara\r'),
(37, 'aceh\r'),
(61, 'sulawesi selatan\r'),
(62, 'sulawesi tenggara\r'),
(63, 'gorontalo\r'),
(64, 'sulawesi barat\r'),
(65, 'maluku\r'),
(66, 'maluku utara\r'),
(67, 'papua barat\r'),
(68, 'papua\r');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `detail_produk_id` int(11) NOT NULL,
  `member_email` text NOT NULL,
  `rating` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`detail_produk_id`, `member_email`, `rating`, `tanggal`) VALUES
(2, 'danzztakezo@gmail.com', 5, '2012-06-17 04:25:18'),
(3, 'member@localhost.com', 5, '2012-06-24 17:54:04'),
(6, 'member@localhost.com', 5, '2012-06-24 17:54:07'),
(1, 'member@localhost.com', 5, '2012-09-29 05:46:20'),
(16, 'haydjay@gmail.com', 4, '2012-12-11 04:58:55'),
(33, 'haydjay@gmail.com', 3, '2012-12-11 04:59:23'),
(53, 'rony.aprianto90@gmail.com', 4, '2012-12-11 06:35:13'),
(55, 'rony.aprianto90@gmail.com', 3, '2012-12-11 06:35:30'),
(11, 'haydjay@gmail.com', 5, '2013-02-21 17:46:21'),
(23, 'haydjay@gmail.com', 5, '2013-02-21 17:46:56');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE IF NOT EXISTS `rekening` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank` varchar(80) NOT NULL,
  `rekening` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id`, `bank`, `rekening`) VALUES
(1, 'BNI', 897654333567),
(2, 'MANDIRI', 97656788654);

-- --------------------------------------------------------

--
-- Table structure for table `retur`
--

CREATE TABLE IF NOT EXISTS `retur` (
  `pembelian_id` int(11) NOT NULL,
  `tanggal_retur` datetime DEFAULT NULL,
  PRIMARY KEY (`pembelian_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retur`
--

INSERT INTO `retur` (`pembelian_id`, `tanggal_retur`) VALUES
(111, '0000-00-00 00:00:00'),
(96, '0000-00-00 00:00:00'),
(102, '0000-00-00 00:00:00'),
(116, '0000-00-00 00:00:00'),
(124, '0000-00-00 00:00:00'),
(133, '0000-00-00 00:00:00'),
(150, '0000-00-00 00:00:00'),
(157, '0000-00-00 00:00:00'),
(147, '0000-00-00 00:00:00'),
(137, '2013-07-13 22:36:24'),
(163, '2013-07-13 22:53:54');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE IF NOT EXISTS `tarif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) DEFAULT NULL,
  `kode` varchar(5) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `asal` varchar(40) DEFAULT NULL,
  `tujuan` varchar(50) DEFAULT NULL,
  `tarif` int(11) DEFAULT NULL,
  `satuan` varchar(5) DEFAULT NULL,
  `pola_perhitungan` enum('satuan','all') DEFAULT NULL,
  `kota_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tarif_vendor` (`vendor_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100009 ;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`id`, `vendor_id`, `kode`, `nama`, `asal`, `tujuan`, `tarif`, `satuan`, `pola_perhitungan`, `kota_id`) VALUES
(18, 2, 'JNE2', 'cimahi', NULL, 'cimahi', 4000, NULL, 'satuan', 35),
(7, 2, 'JNE3', 'jakarta timur', NULL, 'jakarta timur', 9000, NULL, 'satuan', 0),
(3, 2, 'JNE1', 'bandung', NULL, 'bandung', 20, NULL, 'satuan', 31),
(8, 2, 'JNE4', 'jakarta pusat', NULL, 'jakarta pusat', 9000, NULL, 'satuan', 0),
(9, 2, 'JNE5', 'jakarta selatan', NULL, 'jakarta selatan', 9000, NULL, 'satuan', 0),
(10, 2, 'JNE6', 'jakarta barat', NULL, 'jakarta barat', 200, NULL, 'satuan', 38),
(11, 2, 'JNE7', 'jakarta utara', NULL, 'jakarta utara', 9000, NULL, 'satuan', 0),
(99999, 2, 'JNE8', 'kota bogor', NULL, 'kota bogor', 8000, NULL, 'satuan', 0),
(13, 2, 'JNE9', 'yogyakarta', NULL, 'yogyakarta', 12000, NULL, 'satuan', 0),
(14, 2, 'JNE10', 'semarang', NULL, 'semarang', 12000, NULL, 'satuan', 0),
(15, 2, 'JNE11', 'surabaya', NULL, 'surabaya', 14000, NULL, 'satuan', 0),
(20, 9, 'jakba', 'jakarta', NULL, 'jakarta barat', 13500, NULL, 'satuan', 38),
(21, 9, 'jakti', 'jakarta', NULL, 'jakarta timur', 13500, NULL, 'satuan', 40),
(100000, 4, 'bdo1', 'bandung', NULL, 'bandung', 100, NULL, 'all', 31),
(100002, 4, 'jkt1', 'jakarta pusat', NULL, 'jakarta pusat', 1000, NULL, 'all', 42),
(100003, 4, 'jkt2', 'jakarta barat', NULL, 'jakarta barat', 50, NULL, 'all', 38),
(100004, 4, 'jkt3', 'jakarta timur', NULL, 'jakarta timur', 1000, NULL, 'all', 40),
(100005, 4, 'jkt4', 'jakarta selatan', NULL, 'jakarta selatan', 1000, NULL, 'all', 39),
(100006, 4, 'jkt5', 'jakarta utara', NULL, 'jakarta utara', 1000, NULL, 'all', 41),
(100007, 4, 'smg', 'semarang', NULL, 'semarang', 1000, NULL, 'all', 43),
(100008, 4, 'bgr', 'kota bogor', NULL, 'kota bogor', 500, NULL, 'all', 29);

-- --------------------------------------------------------

--
-- Table structure for table `temp_page`
--

CREATE TABLE IF NOT EXISTS `temp_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produk_kode` varchar(10) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(20) NOT NULL,
  `member_email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=162 ;

--
-- Dumping data for table `temp_page`
--

INSERT INTO `temp_page` (`id`, `produk_kode`, `tanggal`, `ip`, `member_email`) VALUES
(10, 'SHNEW', '2013-01-29 05:35:00', '180.214.233.34', ''),
(11, 'SHADI', '2013-01-29 05:35:24', '180.214.233.34', ''),
(12, 'TEREB', '2013-01-29 05:36:06', '180.214.233.34', ''),
(13, 'SHVAN', '2013-01-29 05:37:20', '180.214.233.34', ''),
(14, 'BPVAN', '2013-01-29 05:45:09', '180.214.233.34', ''),
(15, 'SHNIK', '2013-01-29 05:46:01', '180.214.233.34', ''),
(16, 'SHNEW', '2013-01-29 05:46:43', '180.214.233.34', ''),
(17, 'SHNEW', '2013-01-29 05:46:48', '180.214.233.34', ''),
(18, 'SHNEW', '2013-01-29 05:46:55', '180.214.233.34', ''),
(19, 'SHNEW', '2013-01-29 05:51:51', '180.214.233.34', ''),
(20, 'SHNEW', '2013-01-29 05:51:56', '180.214.233.34', ''),
(21, 'SHVAN', '2013-01-29 06:01:00', '180.214.233.34', 'djay10108372@gmail.com'),
(22, 'SHNEW', '2013-01-29 06:10:21', '180.214.233.34', ''),
(23, 'SHNEW', '2013-01-29 06:10:36', '180.214.233.34', ''),
(24, 'SHNEW', '2013-01-29 06:12:42', '180.214.233.34', 'djay10108372@gmail.com'),
(25, 'BPEME', '2013-01-30 02:03:44', '180.214.233.37', 'abah.crossingcrew@gmail.com'),
(26, 'BPELE', '2013-01-30 02:03:56', '180.214.233.37', 'abah.crossingcrew@gmail.com'),
(27, 'JHREB', '2013-01-30 02:04:34', '180.214.233.37', 'abah.crossingcrew@gmail.com'),
(28, 'BPVAN', '2013-01-30 22:59:01', '180.214.233.33', ''),
(29, 'SHNEW', '2013-01-31 02:36:03', '180.214.233.33', 'haydjay@gmail.com'),
(30, 'SHNEW', '2013-01-31 05:16:00', '180.214.233.34', ''),
(31, 'SHNEW', '2013-01-31 05:16:13', '180.214.233.34', ''),
(32, 'SHADI', '2013-01-31 05:16:26', '180.214.233.34', ''),
(33, 'SHNIK', '2013-01-31 05:17:07', '180.214.233.34', ''),
(34, 'SHNEW', '2013-01-31 06:06:26', '180.214.233.34', 'haydjay@gmail.com'),
(35, 'SHNEW', '2013-01-31 06:12:37', '180.214.233.34', 'haydjay@gmail.com'),
(36, 'SHNEW', '2013-01-31 06:15:18', '180.214.233.34', 'haydjay@gmail.com'),
(37, 'SHNEW', '2013-01-31 08:48:25', '223.255.225.70', 'doni.dj.031090@gmail.com'),
(38, 'SHNEW', '2013-02-07 03:11:01', '223.255.229.8', 'haydjay@gmail.com'),
(39, 'SHNEW', '2013-02-10 01:42:36', '103.10.66.78', 'haydjay@gmail.com'),
(40, 'SHNEW', '2013-02-11 10:04:33', '180.214.233.33', 'haydjay@gmail.com'),
(41, 'SHNEW', '2013-02-11 10:04:49', '180.214.233.33', 'haydjay@gmail.com'),
(42, 'SHNEW', '2013-02-11 14:32:08', '180.214.232.23', 'haydjay@gmail.com'),
(43, 'SHNEW', '2013-02-11 17:12:32', '223.255.229.22', 'haydjay@gmail.com'),
(44, 'SHNEW', '2013-02-11 18:45:40', '180.214.233.33', 'haydjay@gmail.com'),
(45, 'SHNEW', '2013-02-11 18:46:48', '180.214.233.33', ''),
(46, 'SHNEW', '2013-02-11 18:47:08', '180.214.233.33', ''),
(47, 'SHNEW', '2013-02-11 18:47:36', '180.214.233.33', ''),
(48, 'SHNEW', '2013-02-11 18:47:50', '180.214.233.33', 'haydjay@gmail.com'),
(49, 'SHNEW', '2013-02-11 18:50:44', '180.214.233.33', 'haydjay@gmail.com'),
(50, 'SHNEW', '2013-02-11 18:51:48', '180.214.233.33', 'haydjay@gmail.com'),
(51, 'SHNEW', '2013-02-12 05:17:03', '202.138.226.133', ''),
(52, 'SHNEW', '2013-02-12 05:17:06', '202.138.226.133', ''),
(53, 'SHADI', '2013-02-12 05:17:51', '202.138.226.133', ''),
(54, 'SHNIK', '2013-02-12 05:18:16', '202.138.226.133', ''),
(55, 'BPVAN', '2013-02-12 05:18:45', '202.138.226.133', ''),
(56, 'SHNEW', '2013-02-20 00:27:16', '202.138.226.133', 'haydjay@gmail.com'),
(57, 'SHNEW', '2013-02-20 00:27:20', '202.138.226.133', 'haydjay@gmail.com'),
(58, 'SHNEW', '2013-02-20 08:53:44', '223.255.229.78', 'haydjay@gmail.com'),
(59, 'SHNEW', '2013-02-20 08:56:06', '223.255.229.78', 'haydjay@gmail.com'),
(60, 'SHNEW', '2013-02-21 22:32:04', '180.214.233.33', 'haydjay@gmail.com'),
(61, 'SHNEW', '2013-02-22 01:06:50', '223.255.229.22', 'haydjay@gmail.com'),
(62, 'SHNEW', '2013-02-22 06:24:59', '180.214.233.37', 'haydjay@gmail.com'),
(63, 'SHNEW', '2013-02-22 06:26:56', '180.214.233.37', 'haydjay@gmail.com'),
(64, 'SHNEW', '2013-02-22 07:12:59', '180.214.233.37', 'haydjay@gmail.com'),
(65, 'SHNEW', '2013-02-22 07:29:23', '180.214.233.37', 'haydjay@gmail.com'),
(66, 'SHNEW', '2013-02-22 22:20:25', '180.214.233.92', 'haydjay@gmail.com'),
(67, 'SHNEW', '2013-02-22 22:22:07', '180.214.233.92', 'haydjay@gmail.com'),
(68, 'SHNEW', '2013-02-22 22:24:17', '180.214.233.92', 'haydjay@gmail.com'),
(69, 'SHNEW', '2013-02-22 22:26:47', '180.214.233.92', 'donidjayusman@yahoo.com'),
(70, 'SHNEW', '2013-02-23 03:11:54', '202.138.246.9', 'haydjay@gmail.com'),
(71, 'SHNEW', '2013-02-23 03:33:26', '202.138.246.9', 'haydjay@gmail.com'),
(72, 'SHNEW', '2013-02-23 03:33:45', '202.138.246.9', 'haydjay@gmail.com'),
(73, 'SHNEW', '2013-02-23 03:36:06', '202.138.246.9', 'haydjay@gmail.com'),
(74, 'SHNEW', '2013-02-22 15:21:01', '127.0.0.1', 'haydjay@gmail.com'),
(75, 'SHNEW', '2013-02-22 15:33:10', '127.0.0.1', 'haydjay@gmail.com'),
(76, 'SHNEW', '2013-02-25 05:54:40', '127.0.0.1', ''),
(77, 'SHNEW', '2013-02-25 06:31:26', '127.0.0.1', 'haydjay@gmail.com'),
(78, 'SHNEW', '2013-02-27 03:12:24', '127.0.0.1', 'haydjay@gmail.com'),
(79, 'SHNEW', '2013-02-27 03:14:13', '127.0.0.1', 'haydjay@gmail.com'),
(80, 'SHNEW', '2013-02-27 03:15:18', '127.0.0.1', 'donidjayusman@yahoo.com'),
(81, 'SHNEW', '2013-02-27 03:15:26', '127.0.0.1', 'donidjayusman@yahoo.com'),
(82, 'SHNEW', '2013-02-27 03:16:51', '127.0.0.1', 'haydjay@gmail.com'),
(83, 'SHADI', '2013-02-27 03:19:03', '127.0.0.1', 'haydjay@gmail.com'),
(84, 'SHNEW', '2013-02-27 03:19:48', '127.0.0.1', 'donidjayusman@yahoo.com'),
(85, 'SHNEW', '2013-02-27 08:14:16', '127.0.0.1', 'haydjay@gmail.com'),
(86, 'SHNEW', '2013-02-27 08:14:30', '127.0.0.1', 'haydjay@gmail.com'),
(87, 'SHNEW', '2013-02-27 08:14:52', '127.0.0.1', 'haydjay@gmail.com'),
(88, 'SHNEW', '2013-02-27 08:16:00', '127.0.0.1', 'donidjayusman@yahoo.com'),
(89, 'SHNEW', '2013-02-27 08:16:12', '127.0.0.1', 'donidjayusman@yahoo.com'),
(90, 'SHNEW', '2013-02-27 08:17:09', '127.0.0.1', 'donidjayusman@yahoo.com'),
(91, 'SHNEW', '2013-02-27 08:18:00', '127.0.0.1', 'donidjayusman@yahoo.com'),
(92, 'SHNEW', '2013-02-27 08:18:24', '127.0.0.1', 'donidjayusman@yahoo.com'),
(93, 'SHNEW', '2013-02-27 08:26:08', '127.0.0.1', 'donidjayusman@yahoo.com'),
(94, 'SHNEW', '2013-02-27 08:41:38', '127.0.0.1', 'donidjayusman@yahoo.com'),
(95, 'SHNEW', '2013-02-27 15:59:09', '127.0.0.1', 'donidjayusman@yahoo.com'),
(96, 'SHNEW', '2013-02-27 15:59:27', '127.0.0.1', 'donidjayusman@yahoo.com'),
(97, 'SHNEW', '2013-02-27 16:04:12', '127.0.0.1', 'donidjayusman@yahoo.com'),
(98, 'SHNEW', '2013-02-28 14:46:23', '127.0.0.1', 'haydjay@gmail.com'),
(99, 'SHNEW', '2013-02-28 14:51:12', '127.0.0.1', 'haydjay@gmail.com'),
(100, 'SHADI', '2013-02-28 14:51:15', '127.0.0.1', 'haydjay@gmail.com'),
(101, 'SHNEW', '2013-06-04 21:34:53', '223.255.225.78', 'haydjay@gmail.com'),
(102, 'SHNEW', '2013-06-05 22:39:08', '180.214.233.66', ''),
(103, 'SHNEW', '2013-06-05 22:39:49', '180.214.233.66', 'danzztakezo@gmail.com'),
(104, 'SHNEW', '2013-06-05 22:44:14', '180.214.233.66', ''),
(105, 'SHNEW', '2013-06-06 22:38:49', '223.255.230.12', 'haydjay@gmail.com'),
(106, 'SHNEW', '2013-06-07 21:55:02', '202.138.246.3', 'haydjay@gmail.com'),
(107, 'SHADI', '2013-06-07 22:01:31', '202.138.246.3', 'haydjay@gmail.com'),
(108, 'SHNEW', '2013-06-07 22:04:54', '202.138.246.3', 'haydjay@gmail.com'),
(109, 'SHNEW', '2013-06-07 22:07:52', '202.138.246.3', 'haydjay@gmail.com'),
(110, 'SHNEW', '2013-06-14 21:16:07', '202.138.246.3', ''),
(111, 'SHNEW', '2013-06-15 13:23:41', '223.255.225.6', 'doni.dj.031090@gmail.com'),
(112, 'SHNEW', '2013-06-15 13:25:29', '223.255.225.6', 'doni.dj.031090@gmail.com'),
(113, 'BPVAN', '2013-06-18 04:36:21', '180.214.232.89', 'haydjay@gmail.com'),
(114, 'BPVAN', '2013-06-18 04:52:28', '180.214.232.89', 'haydjay@gmail.com'),
(115, 'BPVAN', '2013-06-18 04:55:58', '180.214.232.89', ''),
(116, 'BPVAN', '2013-06-18 04:56:03', '180.214.232.89', ''),
(117, 'BPVAN', '2013-06-18 04:57:45', '180.214.232.89', 'djay10108372@gmail.com'),
(118, 'BPVAN', '2013-06-18 04:57:51', '180.214.232.89', 'djay10108372@gmail.com'),
(119, 'BPVAN', '2013-06-18 05:03:44', '180.214.232.89', 'haydjay@gmail.com'),
(120, 'SHNIK', '2013-06-18 05:06:18', '180.214.232.89', 'haydjay@gmail.com'),
(121, 'SHNEW', '2013-06-28 21:25:51', '202.138.246.3', 'haydjay@gmail.com'),
(122, 'SHNEW', '2013-07-13 21:06:22', '202.138.246.3', 'haydjay@gmail.com'),
(123, 'SHNEW', '2013-07-13 22:43:14', '202.138.246.3', 'haydjay@gmail.com'),
(124, 'SHNEW', '2013-07-13 23:06:02', '202.138.246.3', 'haydjay@gmail.com'),
(125, 'SHADI', '2013-07-17 05:28:43', '180.214.233.38', 'djay10108372@gmail.com'),
(126, 'SHADI', '2013-07-17 05:28:48', '180.214.233.38', 'djay10108372@gmail.com'),
(127, 'SHADI', '2013-07-17 05:29:07', '180.214.233.38', 'djay10108372@gmail.com'),
(128, 'SHADI', '2013-07-17 05:31:25', '180.214.233.38', 'doni.dj.031090@gmail.com'),
(129, 'SHADI', '2013-07-17 05:31:52', '180.214.233.38', 'doni.dj.031090@gmail.com'),
(130, 'SHNEW', '2013-07-17 09:00:42', '202.67.38.15', ''),
(131, 'SHNEW', '2013-07-17 09:01:58', '202.67.38.15', ''),
(132, 'SHNEW', '2013-07-17 09:05:06', '202.67.38.15', 'doni.dj.031090@gmail.com'),
(133, 'SHNEW', '2013-07-17 09:07:17', '202.67.38.15', 'haydjay@gmail.com'),
(134, 'SHNEW', '2013-07-17 09:11:36', '202.67.38.15', 'ineuineu@yahoo.com'),
(135, 'SHNEW', '2013-07-17 09:30:20', '202.67.38.15', 'ineuineu@yahoo.com'),
(136, 'SHNEW', '2013-07-29 20:40:05', '180.214.233.33', 'kopoplopok@gmail.com'),
(137, 'SHNEW', '2013-07-30 22:05:27', '180.214.232.85', ''),
(138, 'SHNEW', '2013-07-30 22:07:01', '180.214.232.85', 'doni.dj.031090@gmail.com'),
(139, 'SHNEW', '2013-07-30 22:37:19', '202.67.38.31', ''),
(140, 'SHNEW', '2013-07-30 23:03:39', '202.67.38.31', 'doni.dj.031090@gmail.com'),
(141, 'SHNEW', '2013-07-30 23:20:10', '202.67.38.31', ''),
(142, 'SHNEW', '2013-07-30 23:22:57', '202.67.38.31', 'haydjay@gmail.com'),
(143, 'BPVAN', '2013-07-30 23:25:03', '202.67.38.31', 'haydjay@gmail.com'),
(144, 'SHNEW', '2013-07-31 00:10:44', '202.67.38.31', ''),
(145, 'SHNEW', '2013-07-31 00:11:43', '202.67.38.31', ''),
(146, 'SHADI', '2013-07-31 00:15:16', '202.67.38.31', ''),
(147, 'SHNEW', '2013-07-31 00:15:33', '202.67.38.31', ''),
(148, 'SHADI', '2013-07-31 00:17:26', '202.67.38.31', 'haydjay@gmail.com'),
(149, 'SHNEW', '2013-07-31 00:25:03', '202.67.38.31', 'haydjay@gmail.com'),
(150, 'SHNEW', '2013-07-31 00:26:34', '202.67.38.31', 'haydjay@gmail.com'),
(151, 'SHNEW', '2013-07-31 00:27:08', '202.67.38.31', 'haydjay@gmail.com'),
(152, 'SHNEW', '2013-07-31 00:34:20', '202.67.38.31', 'haydjay@gmail.com'),
(153, 'SHNEW', '2013-07-31 00:39:53', '202.67.38.31', 'haydjay@gmail.com'),
(154, 'SHNEW', '2013-08-22 19:57:04', '202.67.46.5', 'doni.dj.031090@gmail.com'),
(155, 'SHNEW', '2013-08-22 20:04:30', '202.67.46.5', 'doni.dj.031090@gmail.com'),
(156, 'SHNEW', '2013-08-23 10:30:52', '180.214.232.1', ''),
(157, 'SHNEW', '2013-08-23 10:32:40', '180.214.232.1', ''),
(158, 'SHNEW', '2013-08-23 10:34:55', '180.214.232.1', 'doni.dj.031090@gmail.com'),
(159, 'SHNEW', '2013-08-23 10:39:16', '180.214.232.1', 'doni.dj.031090@gmail.com'),
(160, 'SHNEW', '2013-08-23 20:49:15', '202.138.246.3', ''),
(161, 'SHNEW', '2013-08-23 21:02:22', '202.138.246.3', 'haydjay@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_group_users` (`group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `group_id`, `status`) VALUES
(1, 'admin', 'admin@localhost.com', '5a0cdef1627164252ad4f87c6b3395b0', 99, 'aktif'),
(4, 'administrator', 'superadmin@localhost.com', '9f389ec698c58b702c2cdae3be0bf194', 99, 'aktif'),
(5, 'operator', 'operator@localhost.com', 'f34ca89b57d1273395c6ee46d147272f', 1, 'aktif'),
(6, 'kasir', 'kasir@localhost.com', '9f389ec698c58b702c2cdae3be0bf194', 100, 'aktif'),
(7, 'owner', 'owneradmin@localhost.com', '9f389ec698c58b702c2cdae3be0bf194', 101, 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE IF NOT EXISTS `vendor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `kode` varchar(5) DEFAULT NULL,
  `site` text NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `nama`, `deskripsi`, `kode`, `site`, `date_created`, `date_updated`, `parent_id`) VALUES
(2, 'JNE REG', 'vendor pengiriman JNE ', 'jne', 'http://jne.co.id/index.php?mib=tracking.detail&awb={noresi}', NULL, NULL, 0),
(3, 'PT POS', 'pt pos paket pengiriman ', 'POS', 'http://www.posindonesia.co.id/home/modules/mod_search/tmpl/libs/lacakk1121m4np05.php?jenis=0&barcode={noresi}&lacak=Lacak', NULL, NULL, 0),
(4, 'TIKI', 'tiki delivery', 'TIKI', 'http://www.tiki-online.com/tracking/track_single', NULL, NULL, 0),
(9, 'JNE YES', 'vendor pengiriman jne', 'jne', 'http://jne.co.id/index.php?mib=tracking.detail&awb={noresi}', NULL, NULL, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
