-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 20, 2013 at 06:59 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quixotik_magnshoes`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `daftar_harga`
--

INSERT INTO `daftar_harga` (`id`, `detail_produk_id`, `harga`, `date_created`, `date_updated`) VALUES
(1, '3', 30000, '2012-05-01 00:00:00', NULL),
(4, '1', 30000, '2012-05-01 00:00:00', NULL),
(5, '5', 25000, '2012-04-28 06:02:54', NULL),
(6, '2', 70000, '2012-05-01 00:00:00', '2012-05-03 15:41:52'),
(7, '6', 80000, '2012-05-05 16:08:55', NULL),
(8, '7', 70000, '2012-06-03 12:31:02', NULL),
(9, '8', 40000, '2012-06-03 12:32:05', NULL),
(10, '9', 90000, '2013-01-28 17:20:59', NULL),
(11, '10', 120000, '2013-01-28 17:23:12', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=155 ;

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id`, `pembelian_id`, `detail_produk_id`, `diskon_id`, `daftar_harga_id`, `quantity`) VALUES
(2, 1, '4', NULL, 3, 10),
(3, 5, '6', 0, 7, 1),
(4, 5, '2', 0, 6, 1),
(5, 5, '3', 0, 1, 1),
(7, 6, '2', 0, 6, 1),
(8, 6, '3', 0, 1, 1),
(9, 7, '1', 6, 4, 4),
(10, 7, '5', 6, 5, 6),
(11, 8, '1', 6, 4, 1),
(12, 8, '5', 6, 5, 1),
(13, 9, '1', 7, 4, 1),
(14, 9, '2', 0, 6, 2),
(15, 9, '3', 0, 1, 1),
(19, 12, '3', 0, 1, 1),
(21, 13, '3', 0, 1, 1),
(23, 14, '5', 7, 5, 2),
(25, 15, '8', 0, 9, 2),
(27, 16, '5', 7, 5, 1),
(31, 19, '6', 0, 7, 1),
(33, 21, '5', 7, 5, 1),
(34, 22, '6', 0, 7, 1),
(35, 23, '6', 0, 7, 1),
(36, 24, '8', 0, 9, 4),
(38, 25, '8', 0, 9, 1),
(55, NULL, '6', 0, 7, 1),
(56, NULL, '8', 0, 9, 1),
(57, NULL, '6', 0, 7, 1),
(62, 46, '6', 0, 7, 1),
(64, 48, '8', 0, 9, 1),
(65, 49, '8', 0, 9, 1),
(66, 50, '6', 0, 7, 1),
(67, 50, '3', 0, 1, 1),
(68, 51, '6', 0, 7, 1),
(69, 52, '6', 0, 7, 2),
(70, 53, '5', 0, 5, -1),
(71, 54, '5', 0, 5, -1),
(73, 55, '2', 0, 6, 3),
(78, 59, '8', 9, 9, 5),
(80, 60, '3', 0, 1, 2),
(84, 64, '5', 0, 5, 1),
(85, 65, '8', 9, 9, 1),
(86, 66, '5', 0, 5, 1),
(87, 67, '5', 0, 5, 1),
(88, 68, '3', 0, 1, 1),
(94, 74, '6', 0, 7, 1),
(96, 76, '5', 0, 5, 1),
(97, 77, '5', 0, 5, 1),
(98, 78, '3', 0, 1, 1),
(99, 79, '3', 0, 1, 1),
(100, 80, '3', 0, 1, 1),
(101, 81, '6', 0, 7, 1),
(113, 93, '5', 0, 5, 1),
(118, 98, '6', 0, 7, 1),
(120, 100, '3', 0, 1, -1),
(122, 102, '6', 0, 7, 1),
(123, 103, '2', 0, 6, -1),
(126, 104, '7', 0, 8, 1),
(129, 107, '6', 0, 7, 1),
(130, 107, '1', 0, 4, 2),
(131, 107, '5', 0, 5, 4),
(133, 109, '1', 0, 4, -1),
(134, 110, NULL, NULL, NULL, -1),
(135, 111, '6', 0, 7, 1),
(136, 111, '1', 0, 4, 1),
(137, 111, '3', 0, 1, 1),
(138, 112, '6', 0, 7, -1),
(139, 113, NULL, NULL, NULL, -1),
(140, 114, '1', 0, 4, 1),
(141, 115, '1', 0, 4, -1),
(142, 116, '6', 0, 7, 1),
(143, 116, '7', 0, 8, 1),
(144, 116, '1', 0, 4, 1),
(145, 117, '7', 0, 8, -1),
(148, 117, NULL, NULL, NULL, -1),
(149, 118, '1', 0, 4, 1),
(150, 119, '1', 0, 4, 3),
(151, 120, '7', 0, 8, 2),
(152, 121, '7', 0, 8, 2),
(153, 122, '7', 0, 8, -1),
(154, 123, '7', 0, 8, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `detail_produk`
--

INSERT INTO `detail_produk` (`id`, `nama`, `warna`, `stok`, `gambar`, `bentuk`, `produk_kode`, `ukuran`, `status_produk`, `deskripsi`, `berat`, `date_created`, `date_updated`) VALUES
(1, 'extrme l', 'red', 16, 'IMG_2570.jpg', NULL, 'k01', 'xl', 'stok', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ', 1, NULL, NULL),
(2, 'sss', 'sss', 1, 'IMG_2577.jpg', NULL, 'k02', 'xl', 'stok', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ', 1, NULL, NULL),
(3, 'sss', 'sss', 1, 'IMG_2475.jpg', NULL, 'k02', 'S', 'stok', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ', 1, NULL, NULL),
(5, 'extreme - s', 'blue', 45, 'IMG_2581.jpg', NULL, 'k01', 's', 'stok', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ', 1, NULL, NULL),
(6, 'xxtre', 'asdasd', 0, '1144953-3-2x.jpg', NULL, 'Z076', 'xl', 'stok', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ', 1, NULL, NULL),
(7, 'xxxx', 'merah', 11, 'IMG_2565.jpg', NULL, 'Tbs', 'xl', 'stok', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ', 1, NULL, NULL),
(8, 'derma', 'biru', 6, 'IMG_2555.jpg', NULL, 'Tbs', 'l', 'stok', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ', 1, NULL, NULL),
(9, 'xxxx', 'merah', 23, '6.png', NULL, 'k01', 'XL', 'stok', '', 2, NULL, NULL),
(10, 'musashi', 'xl', 20, 'musashi.jpg', NULL, 'k01', 'xl', 'stok', '', 2, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `detail_retur`
--

INSERT INTO `detail_retur` (`id`, `retur_pembelian_id`, `detail_pembelian_id`, `jumlah`, `keterangan_retur`, `status`, `gambar`, `keterangan_verifikasi`, `retur_detail_produk_id`, `jumlah_pengganti`) VALUES
(3, 8, 12, '1', ' test ', 'ditolak', '', ' ', '', ''),
(4, 8, 11, '1', ' robek ', 'cofirm', '10146974_1.jpg', 'barang tidak tersedia silakan anda ganti dengan barang lain.', '', ''),
(6, 21, 33, '1', 'lagi butuh inet malam mati ', 'disetujui', '10146974_1.jpg', ' dapat diganti dengan barang yang lain , karena stok barang ini sudah habis ', '5', '1'),
(7, 0, 13, '1', ' test  dani ', 'accept_confirm', '10146974_1.jpg', '', '3', '1'),
(8, 9, 15, '1', 'test dani ', 'disetujui', '10146974_1.jpg', '     barang habis silakan pilih barang lain dengan harga sama atau lebih kecil    ', '5', '1'),
(9, 9, 13, '1', ' robek', 'cofirm', '10146974_1.jpg', '  barang tidak tersedia', '', ''),
(10, 65, 85, '1', ' test', '', '10146974_1.jpg', '   tolong ganti dengan barang yang lain   ', '3', '1'),
(11, 102, 122, '1', ' sobek ', '', '10146974_1.jpg', '   tlong ganti denga barang lain karena barang tersebut tidak tersedia ', '2', '1'),
(15, 107, 129, '1', ' asss', 'ditolak', '_MG_8234.jpg', '    sss  ', '6', ''),
(16, 107, 130, '1', ' ssss', '', '482206_4570658944925_591811883_n.jpg', '    sss  ', '1', ''),
(17, 107, 131, '1', ' ssss', '', '_MG_8234.jpg', '    ddd  ', '5;5', '1'),
(18, 111, 135, '1', 'hkjkhjk', '', 'Transportasi-di-Gili.jpg', '   kkk ', '6', ''),
(19, 111, 136, '1', 'feer', 'ditolak', '10146974_1.jpg', '   kkk ', '1', ''),
(20, 111, 137, '1', 'fererfsdd', '', '482206_4570658944925_591811883_n.jpg', '   kkk ', '3;5', '1'),
(24, 114, 140, '1', ' xxx cc ', '', 'DSCN0314.jpg', ' thftfhgcdhchgfh ', '1;5', '1;1'),
(25, 116, 142, '1', ' sssss', 'ditolak', 'minahasa.jpg', '     dd   ', '6', ''),
(26, 116, 143, '1', ' sssssssss', '', 'papua.jpg', '     d   ', '7', ''),
(27, 116, 144, '1', ' sasas', '', 'rumah-adat minang.jpg', '     d   ', '1;5', '1'),
(28, 7, 9, '1', ' asdasdasdasdasd', 'cofirm', 'landscape_photography_04.jpg', 'Tolong diganti dengan barang lain', '1', ''),
(29, 120, 151, '2', 'barang rusak', 'baru', '6.png', '', '7', ''),
(30, 120, 151, '2', 'barang salah warna', 'baru', 'cloud-saas.png', '', '7', ''),
(31, 121, 152, '1', 'barang rusak', 'ditolak', 'Screenshot from 2013-07-11 23:10:42.png', '  failkd', '7', ''),
(32, 121, 152, '1', 'barang salah warna', '', 'Screenshot from 2012-11-02 11:22:28.png', '  ssss', '7', '');

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
  `min_quantity` int(11) DEFAULT NULL,
  `status` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif',
  PRIMARY KEY (`id`),
  KEY `FK_produk_diskon` (`produk_kode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='daftar produk yang sedang memiliki diskon' AUTO_INCREMENT=20 ;

--
-- Dumping data for table `diskon`
--

INSERT INTO `diskon` (`id`, `produk_kode`, `diskon`, `berawal`, `berakhir`, `min_quantity`, `status`) VALUES
(2, 'k01', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 20, 'nonaktif'),
(3, 'k02', 12, '2012-02-02 00:00:00', '2012-02-02 00:00:00', 10, 'nonaktif'),
(4, 'k02', 13, '2012-02-02 00:00:00', '2012-02-02 00:00:00', 10, 'nonaktif'),
(5, 'k02', 13, '2012-03-01 00:00:00', '2012-05-01 00:00:00', 1, 'nonaktif'),
(6, 'k01', 10, '2012-03-01 00:00:00', '2012-05-31 00:00:00', 1, 'nonaktif'),
(7, 'k01', 10, '2012-05-31 00:00:00', '2012-06-30 00:00:00', 1, 'nonaktif'),
(8, 'Tbs', 12, '2012-02-02 00:00:00', '2012-02-02 00:00:00', 2, 'nonaktif'),
(9, 'Tbs', 12, '2012-02-02 00:00:00', '2013-02-06 00:00:00', 2, 'nonaktif'),
(10, 'Tbs', 10, '2013-03-01 00:00:00', '2013-03-11 00:00:00', 5, 'nonaktif'),
(11, 'Tbs', 10, '2013-03-01 00:00:00', '2013-03-23 00:00:00', 5, 'nonaktif'),
(12, 'k01', 0, '2012-02-02 00:00:00', '2012-02-02 00:00:00', 0, 'nonaktif'),
(13, 'k01', 0, '2012-02-02 00:00:00', '2012-02-02 00:00:00', 0, 'nonaktif'),
(14, 'k01', 0, '2012-02-02 00:00:00', '2012-02-02 00:00:00', 0, 'nonaktif'),
(15, 'k01', 13, '2013-07-30 00:00:00', '2013-07-31 00:00:00', 5, 'nonaktif'),
(17, 'k01', 20, '2013-08-01 00:00:00', '2013-08-10 00:00:00', 0, 'nonaktif'),
(18, 'k01', 17, '2013-07-31 00:00:00', '2013-08-06 00:00:00', 1, 'nonaktif'),
(19, 'k01', 17, '2013-07-31 00:00:00', '2013-08-06 00:00:00', 5, 'aktif');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `nama`, `status`, `deskripsi`, `date_created`, `date_updated`) VALUES
(1, 'input', 'aktif', 'akses untuk operator atau input data ', NULL, NULL),
(99, 'superadmin', 'aktif', 'super admin == super man == super herp but that not god', '2012-04-28 01:04:21', '2012-04-28 01:04:21'),
(100, 'operator', 'aktif', 'operator ', NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `deskripsi`, `date_created`, `date_updated`) VALUES
(3, 'extreme', 'extrem band rock \n ', NULL, NULL),
(4, 'heavy metal', 'heavy metal to girly girl ', NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `nama`, `kota_id`) VALUES
(1, 'sukamenak', 1),
(2, 'sukasenang', 1),
(3, 'jelekong', 2),
(4, 'mojokmojok', 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id`, `nama`, `kecamatan_id`) VALUES
(1, 'nyengseret', 1),
(2, 'inhobbtang', 2),
(3, 'jelekong timur', 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id`, `nama`, `propinsi_id`) VALUES
(1, 'bandung', 1),
(2, 'soreang', 1),
(3, 'majalaya', 1),
(4, 'surabaya', 2),
(5, 'cigonewa', 1),
(6, 'luragung', 1),
(7, 'cicendo', 1),
(8, 'cibintinu', 1),
(9, 'krusuk', 1),
(10, 'super', 1),
(11, 'teing', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`no_ktp`, `nama`, `agama_id`, `jenis_kelamin`, `alamat`, `kelurahan_id`, `telp`, `email`, `password`, `aktivasi_key`, `status`, `status_sso`) VALUES
('100004364885606', 'Devi Sri', NULL, NULL, NULL, NULL, NULL, 'developer.skripsi@gmail.com', '', '', 'aktif', 'unregister'),
('1234787679', 'doni', 1, NULL, 'jln dipatiukur', 2, '907234', 'haydjay@gmail.com', 'e3ac76b1900741e1246d9c30cb1333e1', 'aGF5ZGpheUBnbWFpbC5jb218cGlzYWh8ZXppbmUxMjM0NTY3ODk=', 'new', 'register'),
('12348792', 'member', 1, NULL, 'member', 1, '97637866', 'member@localhost.com', 'e3ac76b1900741e1246d9c30cb1333e1', 'bWVtYmVyQGxvY2FsaG9zdC5jb218cGlzYWh8ZXppbmUxMjM0NTY3ODk=', 'aktif', 'register'),
('1685626505', 'Danzz Takezo', NULL, NULL, NULL, NULL, NULL, 'dani_oracle@yahoo.co.id', '', '', 'aktif', 'unregister'),
('19238719823', 'dani', 1, NULL, 'jln dipatiukur', 1, '098776', 'danzztakezo@gmail.com', 'e669256cdc0e3aeea11e4bf20ba7971f', 'ZGFuenp0YWtlem9AZ21haWwuY29tfHBpc2FofGV6aW5lMTIzNDU2Nzg5', 'aktif', 'register'),
('234234', 'maya', 2, NULL, 'jln maya ', 2, '2234', 'maya@localhost.com', 'e3ac76b1900741e1246d9c30cb1333e1', 'bWF5YUBsb2NhbGhvc3QuY29tfHBpc2FofGV6aW5lMTIzNDU2Nzg5', 'new', 'register'),
('23456', 'budi', 1, NULL, 'gkjhkl', 1, '0987', 'budisantoso750@yahoo.com', 'e3ac76b1900741e1246d9c30cb1333e1', 'YnVkaXNhbnRvc283NTBAeWFob28uY29tfHBpc2FofGV6aW5lMTIzNDU2Nzg5', 'new', 'register'),
('37952534', 'mag shoes', NULL, NULL, 'Jakarta', NULL, NULL, 'magnshoes@gmail.com', '', '', 'aktif', 'unregister'),
('45789', 'dani', 1, NULL, 'ertgh', 3, '234567', 'dani_oracle@yahoo.co', 'member', 'ZGFuaV9vcmFjbGVAeWFob28uY28uaWR8cGlzYWh8ZXppbmUxMjM0NTY3ODk=', 'new', 'register'),
('568', 'dani', 1, NULL, 'asdas', 1, '9999', 'danzztakezo@gmail.com', 'e3ac76b1900741e1246d9c30cb1333e1', 'ZGFuenp0YWtlem9AZ21haWwuY29tfHBpc2FofGV6aW5lMTIzNDU2Nzg5', 'aktif', 'register'),
('97', 'dani', 1, NULL, 'asdad', 1, '978', 'danzztakez3o@gmail.com', 'e3ac76b1900741e1246d9c30cb1333e1', 'ZGFuenp0YWtlem9AZ21haWwuY29tfHBpc2FofGV6aW5lMTIzNDU2Nzg5', 'aktif', 'register'),
('98765', 'dani g', 2, NULL, 'sdfsd', 1, '1234567', 'danzztakez2o@gmail.com', 'e3ac76b1900741e1246d9c30cb1333e1', 'ZGFuenp0YWtlem9AZ21haWwuY29tfHBpc2FofGV6aW5lMTIzNDU2Nzg5', 'aktif', 'register'),
('987768', 'dani', 1, NULL, NULL, 3, '23445', 'dani@localhost.com', 'e3ac76b1900741e1246d9c30cb1333e1', 'ZGFuaUBsb2NhbGhvc3QuY29tfHBpc2FofGV6aW5lMTIzNDU2Nzg5', 'new', 'register');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `intitle`, `category`, `incontent`, `entitle`, `encontent`, `date_created`, `date_updated`) VALUES
(1, 'aboutus', 'about us', 'static', '<div class="aboutus_content_top" style="text-align: justify;">\n<p class="left" style="text-align: right;">&nbsp;</p>\n</div>\n<div class="aboutus_content_top" style="text-align: justify;"><img style="vertical-align: baseline; float: right;" src="/pekerjaan/AGUS/kartikasari/images/aboutus.jpg" alt="" width="200" height="125" /></div>\n<div class="aboutus_content_top" style="text-align: justify;"><strong>APEY</strong></div>\n<div class="aboutus_content_top" style="text-align: justify;">Sejak tahun 1970 an, seseorang Ibu sangat berantusias membuat beragam macam kue dari rumahnya. Semula, ia hanya berangkat dari kue-kue sederhana seperti bolu kukus, kue lapis dan beberapa kue rumahan lainnya. Banyak pelanggan yang menyukai aneka rasa kue-kue tersebut. Pada tahun 1984, tercetuslah ide untuk menamai bisnis ini "Kartika Sari". Sejak saat itulah,bisnis ini mulai berkembang dan mulai dikenal sebagai "trademark" kota Bandung.</div>\n<p style="text-align: justify;">Simbol "trademark" kota bandung sebenarnya lahir dari mulut para pelanggan setia Kartika Sari. Kata mereka, "Rasanya belum ke Bandung kalau belum ke Kartika Sari..." Jika ke Bandung, ya pasti mampir ke Kartika Sari. Para wisatawan dari pelosok Nusantara maupun mancanegara pasti tidak akan lupa untuk mengunjungi Kartika Sari untuk oleh-oleh spesialnya.</p>\n<p style="text-align: justify;">Resep turun menurun, kualitas serta rasa membuat Kartika sari semakin lengket dengan para pelanggannya. Seperti diketahui, produk terfavorit Kartika Sari adalah "Pisang Bollen". Pisang Bollen adalah produk legendaris Kartika Sari dimana pisang dan keju dibalut didalam adonan kulit pastry, sehingga perpaduan tersebut melahirkan perpaduan rasa yang tiada duanya. Selain Pisang Bollen, Kartika Sari juga menyediakan beberapa varian Bollen lainnya:Pisang Bollen Coklat, Peuyeum(Tape) Bollen, Durian Bollen, Kacang Hijau Bollen dan Apel Bollen.</p>\n<p style="text-align: justify;">Kartika Sari juga menyediakan produk legendaris lainnya seperti:Brownies Panggang, Brownies Kukus, Cheese Stick, Cheese Roll, Lapis Legit, Lapis Malang, Banana Roll dan Bagelen Oval. Kue-kue basah tradisional juga tersedia seperti :lemper ayam, bika ambon, kroket, risoles dan masih banyak lagi lainnya.Kripik-kripik tradisional banyak juga tersedia seperti:kentang putih, tempe gurih, oncom dan lain sebagainya. Kualitas dan rasa tidak perlu diragukan lagi di Kartika Sari sebab kepuasan dan kesetiaan pelanggan selalu menjadi aspek prioritas kami, Kartika Sari.</p>\n<p style="text-align: justify;">Hadirnya Kartika Sari.com hanyalah semata untuk k<img src="/pekerjaan/skripsi/dzone_doni/assets/images/tinymce//header-wgs.png" alt="" width="376" height="98" />epuasaan para pelanggan Kartika Sari dimanapun mereka berada. Harapan kami, Kartika Sari dapat senantiasa hadir untuk menghibur dan memuaskan Anda, para pelanggan setia kami,dimanapun Anda berada. Terima Kasih...</p>\n<p style="text-align: justify;">&nbsp;</p>\n<p style="text-align: justify;">xxxxxxxxxxxxxxxxx</p>', '', '', '2012-03-15 00:57:43', '2012-03-14 10:57:51'),
(2, 'delivery', 'delivery', 'static', '<div class="child_paragraph">\r\n<p>MADAME SARI Restaurant telah berdiri sejak tahun 2003. Restaurant ini lahir dari antusiasme sang pemilik Kartika Sari untuk menghadirkan masakan khas indonesia yang otentik dan PAS dengan selera para penggemar Kartika Sari. Konsep MADAME SARI Restaurant sendiri adalah untuk menyajikan "masakan sehari-hari" sehingga para penggemar KARTIKA SARI tidak akan bosan untuk selalu singgah ke MADAME SARI Restaurant ketika mereka berbelanja oleh-oleh di Kartika Sari Bandung...</p>\r\n<p>Menu Unggulan dari MADAME SARI adalah Sop Buntut dan Sop Garang Asam. Wah... ini patut dicoba oleh para penggemar Kartika Sari. Selain itu, ada Nasi Goreng Seafood, Nasi Goreng Kampung, Yamien Manis, dan Pho Bo yang Mak Nyuss banget...</p>\r\n</div>\r\n<p>&nbsp;</p>', 'Madame nice ', '<p><span id="result_box" lang="en"><span class="hps">MADAME</span> <span class="hps">SARI</span> <span class="hps">Restaurant</span> <span class="hps">has stood</span> <span class="hps">since 2003</span><span>.</span> <span class="hps">Restaurant</span> <span class="hps">was</span> <span class="hps">born</span> <span class="hps">from the</span> <span class="hps">enthusiasm of</span> <span class="hps">the</span> <span class="hps">owners of</span> <span class="hps">Kartika</span> <span class="hps">Sari</span> <span class="hps">to</span> <span class="hps">deliver</span> <span class="hps">an authentic</span> <span class="hps">Indonesian</span> <span class="hps">cuisine</span> <span class="hps">and</span> <span class="hps">tastes of</span> <span class="hps">the fans of</span> <span class="hps">PAS</span> <span class="hps">with</span> <span class="hps">Kartika</span> <span class="hps">Sari</span><span>.</span> <span class="hps">MADAME</span> <span class="hps">SARI</span> <span class="hps">Restaurant</span> <span class="hps">concept</span> <span class="hps">itself</span> <span class="hps">is to present</span> <span class="hps atn">"</span><span>everyday</span> <span class="hps">dishes</span><span>"</span> <span class="hps">so that</span> <span class="hps">fans</span> <span class="hps">will not get bored</span> <span class="hps">KARTIKA</span> <span class="hps">SARI</span> <span class="hps">to always</span> <span class="hps">stop by to</span> <span class="hps">MADAME</span> <span class="hps">SARI</span> <span class="hps">Restaurant</span> <span class="hps">when</span> <span class="hps">they</span> <span class="hps">shopped</span> <span class="hps">for souvenirs</span> <span class="hps">at the</span> <span class="hps">Kartika</span> <span class="hps">Sari</span> <span class="hps">London</span> <span class="hps">...</span><br /><br /> <span class="hps">Main</span> <span class="hps">menu</span> <span class="hps">of</span> <span class="hps">MADAME</span> <span class="hps">SARI</span> <span class="hps">is</span> <span class="hps">Sop</span> <span class="hps">Sop</span> <span class="hps">Garang</span> <span class="hps">Tail</span> <span class="hps">and</span> <span class="hps">acid</span><span>.</span> <span class="hps">Well ...</span> <span class="hps">This</span> <span class="hps">should be tested</span> <span class="hps">by</span> <span class="hps">the fans of</span> <span class="hps">Kartika</span> <span class="hps">Sari</span><span>.</span> <span class="hps">In addition, there</span> <span class="hps">Seafood</span> <span class="hps">Fried Rice</span><span>,</span> <span class="hps">Nasi</span> <span class="hps">Goreng</span> <span class="hps">Kampung</span><span>,</span> <span class="hps">Yamien</span> <span class="hps">Manis</span><span>,</span> <span class="hps">and</span> <span class="hps">Pho</span> <span class="hps">Bo</span> <span class="hps">is</span> <span class="hps">really</span> <span class="hps">Nyuss</span> <span class="hps">Mak</span> <span class="hps">...</span></span></p>', '0000-00-00 00:00:00', '2012-03-16 21:04:30'),
(3, 'payment', 'Jajanan Kebon Jukut', 'static', 'Bagi pecinta jajanan khas BANDUNG, harus segera tancap gas ke JAKEJU, pusat jajanan kuliner Bandung terbaru...\r\n\r\nJAKEJU terletak di KARTIKA SARI KEBON JUKUT no.3c-e (Telp 022-422-1975). Setelah berbelanja oleh-oleh khas KARTIKA SARI, pelanggan bisa langsung mencicipi anekamacam jajanan khas BANDUNG seperti mie kocok, baso malang,nasi rames, lotek, dim sum dll...\r\n\r\nAda apa aja ya di JAKEJU? Kedai Kopi Torabika, Es Campur Oyen, Lotek Katineung, Soto Pasar Baru, Bubur Akiong, Gepuk Ny.Yong, NAMBU, Otak-Otak Ny.Bong, Warung Pempek Dempo, Pisang Simanalagi, Madame Sari Pantry, Baso Tahu Tulen, Mie Kocok, Batagor Fang-Fang, Baso Malang Abun, Nasi Goreng Bogarasa, Susu Kacang Kedelai, Nasi Bakar Ibu Iing, Pojok Nasi, Dimsum, Sate Sineureut, Iga Mehonk\r\n\r\nSELAMAT MENCOBA... KAMI TUNGGU KEHADIRAN ANDA dan KELUARGA', '', '', '0000-00-00 00:00:00', '2012-03-16 21:04:30'),
(4, 'pemesanan_online', 'Pemesanan Online', 'static', 'Cara Order / Pemesanan Online\r\nPemesanan berlaku setiap Senin s/d Jumat dari mulai pukul 08.00 sd 15.00 Order Minimal per transaksi adalah Rp 150.000 (Seratus Limapuluh Ribu Rupiah)\r\nOrder Melalui Website\r\n\r\n    1. Pilihlah produk yang di inginkan lalu klik tombol "Beli Disini".\r\n    2. Apabila Anda sudah selesai berbelanja, klik tombol "Menuju Kasir". Jika Anda ingin kembali memesan, klik ke tombol "Teruskan Belanja"\r\n    3. Jika Anda pelanggan pertama, masukan data-data Anda pada kolom yang telah tersedia. Setelah selesai, nama login dan password akan dikirimkan ke email Anda.\r\n    Jika anda telah menjadi member Kartikasari.com, silahkan masukan username dan password Anda. Setelah itu klik "Berikutnya"\r\n    4. Kami hanya menerima pembayaran melalui Transfer BCA. No rekening bisa dilihat disini »\r\n    5. Anda dapat memasukan komentar-komentar ke kami mengenai order dengan mengetikkan komentar pada bagian "Komentar/Pesanan Order Anda"\r\n    6. Setelah itu klik tombol "Konfirmasi Pesanan" untuk melakukan konfirmasi produk yang telah Anda pilih. Dan, pesanan pembelian anda akan dikirim ke email anda.\r\n    7. Customer Service kami akan menghubungi Anda untuk konfirmasi pesanan pembelian + biaya pengirimannya melalui hp/no tel yang telah Anda cantumkan.Untuk mengetahui kisaran biaya pengiriman pesanan anda,bisa dilihat disini »\r\n    8. Setelah itu Anda dapat melakukan transfer pembayaran pesanan + biaya pengirimannya.\r\n\r\nOrder Melalui Mesin Fax 022-6033793 / Email ke order@kartikasari.com\r\n\r\n    1. Download File Excel yang berisi list produk dari Kartiksari Click Here.\r\n    2. Buka File Download dengan Microsoft Excel.\r\n    3. Isikan jumlah pesanan perunit produk yang dipilih.\r\n    4. Save File Excel tersebut.\r\n    5. Jika menggunakan Mesin Fax silakan File Excel yang telah diisi dengan jumlah pembelian , di Print lalu di Fax ke No 022-6033793 Attn Ibu Ayu.\r\n    6. Jika menggunakan Email silakan File Excel yang telah diisi dengan jumlah pembelian , di attachment kemudian diemail ke order@kartikasari.com.\r\n\r\nBiaya Pengiriman\r\n\r\n    1. Area Bandung daerah kotamadya.\r\n    Pengiriman dilakukan oleh kurir KARTIKA SARI dengan flat rate Rp.15.000\r\n    2. Area Bandung diluar kotamadya.\r\n    Pengiriman dilakukan oleh jasa TIKI. Untuk perkiraan biaya, klik disini »\r\n    3. Area JABODETABEK.\r\n    Pengiriman area JABODETABEK, metode pengiriman melalui jasa layanan Xtrans.\r\n\r\n        Perhitungan biaya pengiriman adalah 1 kg pertama Rp 15.000 dan kg berikutnya Rp 3000,-\r\n\r\n        Hari pengiriman pemesanan adalah 1 hari setelah hari pemesanan\r\n\r\n        Pemesanan di hari Sabtu atau Minggu akan diproses di hari Senin dan dikirimkan pada hari Selasa\r\n\r\n        Pemesanan dapat diambil di kantor XTRANS terdekat, klik disini »\r\n    4. Area seluruh INDONESIA.\r\n    Untuk area Indonesia lainnya, metode pengiriman melalui jasa layanan TIKI\r\n\r\n        Tarif pengiriman yang digunakan adalah tarif ONS dan disesuaikan dengan kota pengiriman.\r\n\r\n        Customer Service kami akan mengkonfirmasikan waktu pengiriman ke no HP / no telp Anda.\r\n\r\n        Untuk Biaya Pengiriman TIKI bisa dilihat disini »\r\n    5. Untuk area Malaysia dan Singapura.\r\n    Pengiriman ke Malaysia dan Singapura menggunakan jasa dari Nays Cargo ( http://naysimport.com ).\r\n    Perhitungan biaya pengiriman Bandung - Singapura adalah 0.5 kg pertama US$ 5 dan setiap 0.5 kg berikutnya US$ 4.\r\n    Perhitungan biaya pengiriman Bandung - Kualalumpur adalah 0.5 kg pertama US$ 18.5 dan setiao 0.5 kg berikutnya US$ 10\r\n    Jika anda memiliki pertanyaan, silahkan hubungi kami lebih lanjut melalui email ke order@kartikasari.com atau kontak kami ke 022 739 39 555\r\n\r\nSyarat dan Ketentuan\r\n\r\n    1. Harga bisa berubah sewaktu waktu tanpa pemberitahuan terlebih dahulu.\r\n    2. Harga belum termasuk ongkos kirim .\r\n    3. Kami tidak bertanggung jawab terhadap kerusakan produk selama pengiriman.\r\n    4. Kami tidak bisa memberikan jam kepastian kedatangan pesanan di tempat tujuan.\r\n    5. Produk yang dikirimkan adalah produk yang diproduksi di hari pemesanan.\r\n\r\n', '', '', '2012-03-18 16:13:09', '2012-03-18 02:13:17'),
(5, 'TransferPage', 'Transfer Page', 'static', '<p>&nbsp;<span>Anda dapat melakukan pembayaran dengan transfer BCA ke rekening BCA sebagai berikut:</span> <span class="aboutus_list payment_method"> <span class="icon_bank"><img src="/pekerjaan/AGUS/kartikasari/images/bca.jpg" alt="" align="top" /></span> <span class="account_number"> <span class="label">No Rekening:</span> <span class="label_info">784.009.8171 </span> </span> <span class="account_number"> <span class="label">Atas Nama:</span> <span class="label_info"> PT Kartika Inti Sejati</span> </span> </span> <span class="payment_info">Jika Anda melakukan pembayaran atas nama lain, silahkan melakukan konfirmasi kembali kepada kami agar tidak terjadi kesalahan.</span> <span class="payment_info">Jika anda tidak mempunyai account di bank BCA, Anda dapat melakukan setoran tunai ke rekening kami di cabang bank BCA terdekat.</span> <span class="payment_info">Setelah Anda melakukan pembayaran, silahkan konfirmasikan pembayaran Anda dengan cara:</span></p>\r\n<ul class="notify">\r\n<li><img src="/pekerjaan/AGUS/kartikasari/images/PostBullets.png" alt="" align="top" />\r\n<p>SMS ke nomor: 0852 2204 5555.<br /> (Format SMS : Nama Pengirim, Nama Pemesan, Jumlah Transfer)</p>\r\n</li>\r\n<li><img src="/pekerjaan/AGUS/kartikasari/images/PostBullets.png" alt="" align="top" />\r\n<p>Kontak kami langsung ke FLEXI di 022 739 39 555.</p>\r\n</li>\r\n</ul>\r\n<p><span>NOTE: Pembayaran dianggap sah jika ditransfer atau disetor ke rekening di atas.</span></p>', '', '', '2012-03-18 16:15:03', '2012-03-18 02:15:09'),
(6, 'home', 'home', 'static', '<p>home</p>', 'home', '<p>home</p>', '2012-03-27 20:13:11', '2012-03-27 06:13:20'),
(7, 'products', 'products', 'static', '<p>products</p>', 'products', '<p>products</p>', '2012-03-27 20:24:23', '2012-03-27 06:24:52'),
(8, 'special_hampers', 'special_hampers', 'static', '<p>special_hampers</p>', 'special_hampers', '<p>special_hampers</p>', '2012-03-27 20:24:43', '2012-03-27 06:24:52'),
(9, 'locations', 'locations', 'static', 'location', 'location', 'location', '2012-03-27 23:35:32', '2012-03-27 09:35:37'),
(10, 'faq', 'faq', 'static', '<h3>Why does this project exist?</h3>\r\n<blockquote>\r\n<p style="text-align: justify;">To take over the CVS user base. Specifically, we''re writing a new version control system that is very similar to CVS, but fixes many things that are broken. See our front page.</p>\r\n</blockquote>\r\n<p>&nbsp;</p>\r\n<h3>Is Subversion proprietary? I heard that it belongs to CollabNet. &nbsp;&nbsp;</h3>\r\n<blockquote>\r\n<p style="text-align: justify;">No, Subversion is open source / free software. CollabNet (and other companies) pay the salaries of some full-time developers, but the software carries an <a href="http://www.apache.org/licenses/LICENSE-2.0">Apache License</a> which is fully compliant with the <a href="http://www.debian.org/social_contract#guidelines">Debian Free Software Guidelines</a>. In other words, you are free to download, modify, and redistribute Subversion as you please; no permission from CollabNet or anyone else is required.</p>\r\n</blockquote>\r\n<h3>&nbsp;</h3>\r\n<h3>Is Subversion stable enough for me to use for my own projects? &nbsp;&nbsp;</h3>\r\n<blockquote>\r\n<p style="text-align: justify;">Yes, absolutely. It''s ready for prime-time production.</p>\r\n<p style="text-align: justify;">Subversion has been in development since 2000, and became self-hosting after one year. A year later when we declared "alpha", Subversion was already being used by dozens of private developers and shops for real work. After that, it was two more years of bugfixing and stabilization until we reached 1.0. Most other projects probably would have called the product "1.0" much earlier, but we deliberately decided to delay that label as long as possible. We were aware that many people were waiting for a 1.0 before using Subversion, and had very specific expectations about the meaning of that label. So we stuck to that same standard.</p>\r\n<p style="text-align: justify;">&nbsp;</p>\r\n</blockquote>\r\n<h3>What is Subversion''s client/server interoperability policy? &nbsp;&nbsp;</h3>\r\n<blockquote>\r\n<p>The client and server are designed to work as long as they aren''t more than one major release version apart. For example, any 1.X client will work with a 1.Y server. However, if the client and server versions don''t match, certain features may not be available.</p>\r\n<p>See the client/server interoperability policy is documented in the "Compatibility" section of the <a href="http://subversion.apache.org/docs/community-guide/">Subversion Commuity Guide</a>.</p>\r\n</blockquote>', '', '', '2012-06-24 11:00:24', '2012-06-24 04:00:31');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `pembelian_id`, `tanggal`, `jenis_bayar`, `no_rekening`, `no_rek_tujuan`, `rekening_id`, `total`, `tanggal_bayar`) VALUES
(1, 0, '0000-00-00 00:00:00', NULL, '123123', '123123123', 0, 300000, '0000-00-00 00:00:00'),
(2, 7, '2012-05-29 00:00:00', NULL, '123123', '123123', 0, 300000, '0000-00-00 00:00:00'),
(3, 8, '2012-05-30 00:00:00', NULL, '1231242342', '234234234', 0, 60000, '0000-00-00 00:00:00'),
(4, 9, '2012-06-23 00:00:00', NULL, '9876657', '09876765', 0, 250000, '0000-00-00 00:00:00'),
(5, 23, '2012-06-24 00:00:00', NULL, '225151356', NULL, 0, 100000, '0000-00-00 00:00:00'),
(6, 22, '2012-06-24 00:00:00', NULL, '123456', NULL, 0, 100000, '0000-00-00 00:00:00'),
(7, 24, '2012-07-03 00:00:00', NULL, '9876654', NULL, 0, 100000, '0000-00-00 00:00:00'),
(8, 21, '2012-07-03 00:00:00', NULL, '77657654769', NULL, 0, 30000, '0000-00-00 00:00:00'),
(9, 49, '2012-07-11 00:00:00', NULL, '908789', NULL, 0, 50000, '0000-00-00 00:00:00'),
(10, 52, '2012-07-16 00:00:00', NULL, '', NULL, 0, 0, '0000-00-00 00:00:00'),
(11, 51, '2012-07-16 00:00:00', NULL, '', NULL, 0, 0, '0000-00-00 00:00:00'),
(12, 50, '2012-07-16 00:00:00', NULL, '', NULL, 0, 0, '0000-00-00 00:00:00'),
(13, 48, '2012-07-16 00:00:00', NULL, '', NULL, 0, 0, '0000-00-00 00:00:00'),
(14, 46, '2012-07-16 00:00:00', NULL, '112', NULL, 0, 100000, '0000-00-00 00:00:00'),
(15, 53, '2012-07-24 19:31:49', 'retur', '0', '0', 1, -25000, '0000-00-00 00:00:00'),
(16, 54, '2012-07-24 19:42:38', 'retur', '0', '0', 1, -25000, '0000-00-00 00:00:00'),
(17, 65, '2012-10-19 00:00:00', NULL, '9765433567', NULL, 0, 50000, '0000-00-00 00:00:00'),
(25, 66, '2012-11-09 01:29:02', NULL, '123123123', '897654333567', 1, 1231231, '0000-00-00 00:00:00'),
(26, 66, '2012-11-09 01:37:05', NULL, '65655555', '897654333567', 1, 12356, '0000-00-00 00:00:00'),
(27, 66, '2012-11-09 01:38:05', NULL, '7777777777777', '97656788654', 2, 123457, '0000-00-00 00:00:00'),
(28, 66, '2012-11-09 01:40:48', NULL, '22222', '897654333567', 1, 2147483647, '0000-00-00 00:00:00'),
(30, 67, '2012-11-09 15:32:49', NULL, '11111111111111', '97656788654', 2, 1231231, '0000-00-00 00:00:00'),
(31, 67, '2012-11-09 00:00:00', NULL, '', NULL, 0, 9000, '0000-00-00 00:00:00'),
(32, 67, '2012-11-09 00:00:00', NULL, '11111111111111', NULL, 0, 1231231, '0000-00-00 00:00:00'),
(33, 68, '2012-11-09 16:50:34', NULL, '1111111111111', '97656788654', 2, 10000000, '0000-00-00 00:00:00'),
(34, 64, '2012-11-09 16:52:11', NULL, '1111111', '97656788654', 2, 2147483647, '0000-00-00 00:00:00'),
(35, 59, '2012-11-09 16:53:25', NULL, '222222', '897654333567', 1, 10, '0000-00-00 00:00:00'),
(36, 80, '2012-11-22 11:17:59', NULL, '12345678', '897654333567', 1, 39500, '0000-00-00 00:00:00'),
(37, 81, '2012-11-22 11:26:42', NULL, '1111111', '897654333567', 1, 89000, '0000-00-00 00:00:00'),
(38, 74, '2012-11-22 12:13:52', NULL, '09876567', '897654333567', 1, 100000, '0000-00-00 00:00:00'),
(39, 93, '2012-11-29 07:15:25', NULL, '0987678', '897654333567', 1, 25000, '0000-00-00 00:00:00'),
(40, 100, '2012-12-20 15:35:13', 'retur', '0', '0', 1, -30000, '0000-00-00 00:00:00'),
(41, 101, '2013-01-12 12:30:57', NULL, '0987678', '897654333567', 1, 89000, '0000-00-00 00:00:00'),
(42, 102, '2013-01-12 12:39:37', NULL, '122334454', '897654333567', 1, 89000, '0000-00-00 00:00:00'),
(43, 103, '2013-01-12 12:54:21', 'retur', '0', '0', 1, -70000, '0000-00-00 00:00:00'),
(44, 108, '2013-04-26 16:29:02', 'retur', '0', '0', 1, 0, '0000-00-00 00:00:00'),
(45, 109, '2013-04-26 17:26:51', 'retur', '0', '0', 1, -30000, '0000-00-00 00:00:00'),
(46, 110, '2013-04-26 17:29:55', 'retur', '0', '0', 1, -25000, '0000-00-00 00:00:00'),
(47, 112, '2013-04-26 17:35:47', 'retur', '0', '0', 1, -80000, '0000-00-00 00:00:00'),
(48, 113, '2013-04-26 17:36:56', 'retur', '0', '0', 1, -30000, '0000-00-00 00:00:00'),
(49, 115, '2013-05-24 15:43:59', 'retur', '0', '0', 1, -30000, '0000-00-00 00:00:00'),
(50, 117, '2013-05-24 15:53:55', 'retur', '0', '0', 1, -70000, '0000-00-00 00:00:00'),
(51, 120, '2013-07-13 16:02:56', NULL, '888888888', '897654333567', 1, 160000, '2013-07-13 00:00:00'),
(52, 121, '2013-07-13 16:55:11', NULL, '3333333333333333', '897654333567', 1, 160000, '2013-07-13 00:00:00'),
(53, 122, '2013-07-13 17:06:45', 'retur', '0', '0', 1, -70000, '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=124 ;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `invoice`, `tanggal`, `member_no_ktp`, `subtotal`, `total`, `status_pembayaran`, `status_barang`, `type_pembayaran`, `rekening_id`, `currency`, `kurs`, `referesi_pembelian_id`, `type_pembelian`) VALUES
(2, '1234', '2012-05-27 00:00:00', '12348792', 0, 0, 'blom', 'stok', '', 1, NULL, NULL, 0, 'retur'),
(7, '1234', '2012-05-29 21:20:35', '12348792', 270000, 278000, 'sudah', 'stok', 'transfer', 1, NULL, NULL, 0, 'retur'),
(8, '1234', '2012-05-30 16:04:08', '12348792', 55000, 51500, 'sudah', 'stok', 'transfer', 1, NULL, NULL, 0, 'retur'),
(9, '1234', '2012-06-02 07:35:40', '12348792', 200000, 201500, 'sudah', 'stok', 'transfer', 1, NULL, NULL, 0, 'retur'),
(21, '1234', '2012-06-23 16:53:13', '12348792', 25000, 26662, 'sudah', 'stok', 'transfer', 1, NULL, NULL, 0, 'retur'),
(22, '1234', '2012-06-23 17:01:06', '98765', 80000, 84902, 'sudah', 'stok', 'transfer', 1, NULL, NULL, 0, 'retur'),
(23, '1234', '2012-06-23 17:07:22', '98765', 80000, 84902, 'sudah', 'stok', 'transfer', 1, NULL, NULL, 0, 'retur'),
(24, '1234', '2012-07-01 17:59:58', '12348792', 160000, 178579, 'sudah', 'stok', 'transfer', 2, NULL, NULL, 0, 'retur'),
(28, '1234', '2012-07-07 08:27:49', '12348792', 120000, 120745, 'blom', 'stok', 'paypall', 0, 'USD', 1.2377, 0, 'retur'),
(29, '1234', '2012-07-07 08:29:02', '12348792', 120000, 120745, 'blom', 'stok', 'paypall', 0, 'USD', 1.2377, 0, 'retur'),
(30, '1234', '2012-07-07 08:30:00', '12348792', 120000, 120745, 'blom', 'stok', 'paypall', 0, 'USD', 1.2377, 0, 'retur'),
(31, '1234', '2012-07-07 08:31:33', '12348792', 40000, 40165, 'blom', 'stok', 'paypall', 0, 'USD', 1.2377, 0, 'retur'),
(32, '1234', '2012-07-07 08:41:52', '12348792', 80000, 80353, 'blom', 'stok', 'paypall', 0, 'USD', 1.2377, 0, 'retur'),
(33, '1234', '2012-07-07 08:48:18', '12348792', 40000, 40438, 'blom', 'stok', 'paypall', 0, 'USD', 1.2377, 0, 'retur'),
(34, '1234', '2012-07-07 08:59:03', '12348792', 40000, 40859, 'blom', 'stok', 'paypall', 0, 'USD', 1.2377, 0, 'retur'),
(35, '1234', '2012-07-07 09:14:15', '12348792', 40000, 40576, 'blom', 'stok', 'paypall', 0, 'USD', 1.2377, 0, 'retur'),
(36, '1234', '2012-07-07 09:16:50', '12348792', 40000, 40124, 'blom', 'stok', 'paypall', 0, 'USD', 1.2377, 0, 'retur'),
(38, '1234', '2012-07-07 15:32:57', '12348792', 80000, 80992, 'blom', 'stok', 'paypall', 0, 'USD', 1.2377, 0, 'retur'),
(39, '1234', '2012-07-07 15:50:33', '12348792', 40000, 40613, 'blom', 'stok', 'paypall', 0, 'USD', 1.2377, 0, 'retur'),
(40, '1234', '2012-07-07 15:55:20', '12348792', 80000, 84606, 'blom', 'stok', 'transfer', 1, 'USD', 1.2377, 0, 'retur'),
(41, '1234', '2012-07-07 16:04:24', '12348792', 70000, 74571, 'blom', 'stok', 'transfer', 1, 'USD', 1.2377, 0, 'retur'),
(46, '1234', '2012-07-08 16:58:19', '12348792', 80000, 84087, 'sudah', 'stok', 'transfer', 1, 'USD', NULL, 0, 'retur'),
(48, '1234', '2012-07-08 17:16:49', '12348792', 40000, 44917, 'sudah', 'stok', 'transfer', 1, 'USD', 1, 0, 'retur'),
(49, '1234', '2012-07-08 17:27:35', '12348792', 40000, 44465, 'sudah', 'stok', 'transfer', 1, 'USD', 1, 0, 'retur'),
(50, '1234', '2012-07-16 18:40:03', '12348792', 110000, 122049, 'sudah', 'stok', 'transfer', 2, 'USD', 1, 0, 'retur'),
(51, '1234', '2012-07-16 18:42:46', '98765', 80000, 84375, 'sudah', 'stok', 'transfer', 1, 'USD', 1, 0, 'retur'),
(52, '1234', '2012-07-16 18:54:01', '98765', 160000, 164739, 'sudah', 'stok', 'transfer', 1, 'USD', 1, 0, 'retur'),
(53, '0', '2012-07-24 19:31:48', '12348792', -25000, -25000, 'sudah', 'stok', 'transfer', 1, NULL, NULL, 9, 'retur'),
(54, '0', '2012-07-24 19:42:38', '12348792', -25000, -25000, 'sudah', 'stok', 'transfer', 1, NULL, NULL, 21, 'retur'),
(64, '360', '2012-10-12 20:05:49', '12348792', 25000, 29000, 'konfirmasi', 'stok', 'paypall', 2, 'USD', 9000, 0, 'retur'),
(65, '518', '2012-10-19 15:29:18', '12348792', 40000, 44200, 'sudah', 'stok', 'transfer', 1, 'USD', 1, 0, 'retur'),
(66, '53', '2012-11-03 16:29:52', '12348792', 25000, 25000, 'sudah', 'stok', 'transfer', 0, 'USD', 1, 0, 'retur'),
(67, '628', '2012-11-09 14:56:51', '12348792', 25000, 34000, 'sudah', 'stok', 'transfer', 2, 'USD', 1, 0, 'retur'),
(68, '660', '2012-11-09 16:28:15', '12348792', 30000, 39000, 'sudah', 'stok', 'transfer', 2, 'USD', 1, 0, 'retur'),
(74, '98', '2012-11-21 11:05:42', '568', 80000, 89000, 'konfirmasi', 'stok', 'transfer', 1, 'USD', 1, 0, 'retur'),
(76, '949', '2012-11-21 11:16:04', '568', 25000, 34000, 'sudah', 'stok', 'paypall', 0, 'USD', 9000, 0, 'retur'),
(77, '57', '2012-11-21 11:26:16', '568', 25000, 34000, NULL, 'stok', 'paypall', 0, 'USD', 9000, 0, 'retur'),
(78, '342', '2012-11-21 11:28:26', '568', 30000, 39000, NULL, 'stok', 'paypall', 0, 'USD', 9000, 0, 'retur'),
(79, '251', '2012-11-21 11:29:35', '568', 30000, 39000, 'sudah', 'stok', 'paypall', 0, 'USD', 9000, 0, 'retur'),
(80, '260', '2012-11-22 11:16:29', '568', 30000, 39000, 'sudah', 'stok', 'transfer', 1, 'USD', 1, 0, 'retur'),
(81, '241', '2012-11-22 11:18:56', '568', 80000, 89000, 'sudah', 'stok', 'transfer', 1, 'USD', 1, 0, 'retur'),
(93, '761', '2012-11-26 19:02:54', '12348792', 25000, 25000, 'konfirmasi', 'stok', 'setor_tunai', 1, 'USD', 1, 0, 'retur'),
(98, '354', '2012-12-10 18:47:31', '12348792', 80000, 89000, 'sudah', 'stok', 'paypall', 0, 'USD', 9000, 0, 'retur'),
(100, 'R-518', '2012-12-20 15:35:13', '12348792', -30000, -30000, 'sudah', 'stok', 'transfer', 1, 'USD', 1, 65, 'retur'),
(102, '647', '2013-01-12 12:37:59', '19238719823', 80000, 89000, 'sudah', 'stok', 'transfer', 1, 'USD', 1, 0, 'retur'),
(103, 'R-647', '2013-01-12 12:54:21', '19238719823', -70000, -70000, 'sudah', 'stok', 'transfer', 1, 'USD', 1, 102, 'retur'),
(107, '39', '2013-04-26 15:58:20', '12348792', 240000, 303000, 'sudah', 'stok', 'transfer', 0, 'USD', 1, 0, 'retur'),
(108, 'R-39', '2013-04-26 16:29:02', '12348792', 0, 0, 'sudah', 'stok', 'transfer', 0, 'USD', 1, 107, 'retur'),
(109, 'R-39', '2013-04-26 17:26:51', '12348792', -30000, -30000, 'sudah', 'stok', 'transfer', 0, 'USD', 1, 107, 'retur'),
(110, 'R-39', '2013-04-26 17:29:55', '12348792', -25000, -25000, 'sudah', 'stok', 'transfer', 0, 'USD', 1, 107, 'retur'),
(111, '374', '2013-04-26 17:31:35', '12348792', 140000, 167000, 'sudah', 'stok', 'transfer', 0, 'USD', 1, 0, 'retur'),
(112, 'R-374', '2013-04-26 17:35:47', '12348792', -80000, -80000, 'sudah', 'stok', 'transfer', 0, 'USD', 1, 111, 'retur'),
(113, 'R-374', '2013-04-26 17:36:55', '12348792', -30000, -30000, 'sudah', 'stok', 'transfer', 0, 'USD', 1, 111, 'retur'),
(114, '584', '2013-05-24 15:07:15', '12348792', 30000, 39000, 'sudah', 'stok', 'transfer', 0, 'USD', 1, 0, 'retur'),
(115, 'R-584', '2013-05-24 15:43:58', '12348792', -30000, -30000, 'sudah', 'stok', 'transfer', 0, 'USD', 1, 114, 'retur'),
(116, '491', '2013-05-24 15:48:38', '12348792', 180000, 207000, 'sudah', 'stok', 'transfer', 0, 'USD', 1, 0, 'retur'),
(117, 'R-491', '2013-05-24 15:53:54', '12348792', -100000, -100000, 'sudah', 'stok', 'transfer', 0, 'USD', 1, 116, 'retur'),
(118, '248', '2013-06-16 11:52:59', '12348792', 30000, 50000, 'konfirmasi', 'stok', 'transfer', 1, 'USD', 1, 0, 'retur'),
(119, '875', '2013-07-13 15:59:04', '12348792', 90000, 117000, 'blom', 'stok', 'transfer', 0, 'USD', 1, 0, 'retur'),
(120, '669', '2013-07-13 16:01:06', '12348792', 140000, 158000, 'sudah', 'stok', 'transfer', 1, 'USD', 1, 0, 'retur'),
(121, '359', '2013-07-13 16:50:45', '12348792', 140000, 158000, 'sudah', 'stok', 'transfer', 1, 'USD', 1, 0, 'retur'),
(122, 'R-359', '2013-07-13 17:06:45', '12348792', -70000, -70000, 'sudah', 'stok', 'transfer', 1, 'USD', 1, 121, 'retur'),
(123, '136', '2013-07-13 18:00:47', '12348792', 70000, 79000, 'blom', 'stok', 'paypall', 0, 'USD', 1, 0, 'retur');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id`, `nama`, `pembelian_id`, `vendor_id`, `tarif_id`, `kode_pengiriman`, `total_biaya`, `tanggal`, `alamat`, `no_telp`, `kelurahan_id`, `status_pengiriman`, `tanggal_penerimaan`) VALUES
(4, '', 7, 2, 1, '87387234khkudf', 8000, '0000-00-00 00:00:00', ' xxxxxxxxx', '3234234', 1, 'terkirim', '0000-00-00 00:00:00'),
(5, '', 8, 2, 1, '121324468', 2000, '0000-00-00 00:00:00', ' a;sljalksjdlakjsldasd', '876876', 1, 'terkirim', '0000-00-00 00:00:00'),
(6, '', 9, 2, 2, '8798798', 4500, '0000-00-00 00:00:00', ' asdasdasdasdasd', '123123', 2, 'terkirim', '0000-00-00 00:00:00'),
(18, '', 21, 2, 1, '9877', 4000, '0000-00-00 00:00:00', ' hjgmhghg', '76876', 3, 'terkirim', '0000-00-00 00:00:00'),
(19, '', 22, 2, 1, '987654', 4000, '0000-00-00 00:00:00', ' asdasdasd', '3234234', 3, 'mengirim', '0000-00-00 00:00:00'),
(20, '', 23, 2, 1, NULL, 4000, '2012-06-23 17:07:22', ' asdasdasd', '3234234', 3, 'belum', '0000-00-00 00:00:00'),
(21, '', 24, 2, 2, NULL, 18000, '2012-07-01 17:59:58', ' sldjflsdfhsdf', '987654', 3, 'belum', '0000-00-00 00:00:00'),
(22, '', NULL, 2, 1, NULL, 4000, '2012-07-07 15:55:21', ' sdfsdfsdf', '8888', 1, 'belum', '0000-00-00 00:00:00'),
(24, '', 46, 2, 1, NULL, 4000, '2012-07-08 17:00:03', ' kjhgf', '8765', 1, 'belum', '0000-00-00 00:00:00'),
(26, '', 48, 2, 1, NULL, 4000, '2012-07-08 17:16:49', ' sdf', '4345', 2, 'belum', '0000-00-00 00:00:00'),
(27, '', 49, 2, 1, NULL, 4000, '2012-07-08 17:27:35', ' ,jbhj', '789', 2, 'belum', '0000-00-00 00:00:00'),
(28, 'member', 50, 2, 1, NULL, 4000, '2012-07-16 18:40:03', 'bandung', '97637866', 1, 'belum', '0000-00-00 00:00:00'),
(29, 'dani g', 51, 4, 5, '020123356614', 4000, '2012-08-08 00:00:00', 'sdfsd', '1234567', 1, 'terkirim', '0000-00-00 00:00:00'),
(30, 'test dani', 52, 2, 1, '1861842470005', 4000, '2012-08-08 00:00:00', 'sdfsd', '1234567', 1, 'mengirim', '0000-00-00 00:00:00'),
(31, '', 54, 2, 1, NULL, 4000, NULL, ' hjgmhghg', '76876', 3, 'belum', '0000-00-00 00:00:00'),
(41, 'member', 64, 4, 5, NULL, 4000, '2012-10-12 20:05:54', 'bandung', '97637866', 1, 'belum', '0000-00-00 00:00:00'),
(42, 'dani', 65, 3, 4, '12996671239', 9000, '2012-08-08 00:00:00', 'jln suka senang senang sekali ', '08562016206', 1, 'terkirim', '0000-00-00 00:00:00'),
(43, 'member', 67, 2, 2, NULL, 9000, '2012-11-09 14:56:51', 'bandung', '97637866', 1, 'belum', '0000-00-00 00:00:00'),
(44, 'member', 68, 2, 2, '99988777', 9000, '2012-08-08 00:00:00', 'bandung', '97637866', 1, 'mengirim', '0000-00-00 00:00:00'),
(50, 'dani', 74, 2, 3, NULL, 9000, '2012-11-21 11:05:42', 'asdas', '9999', 1, 'belum', '0000-00-00 00:00:00'),
(52, 'dani', 76, 2, 3, NULL, 9000, '2012-11-21 11:16:05', 'asdas', '9999', 1, 'belum', '0000-00-00 00:00:00'),
(53, 'dani', 77, 2, 3, NULL, 9000, '2012-11-21 11:26:17', 'asdas', '9999', 1, 'belum', '0000-00-00 00:00:00'),
(54, 'dani', 78, 2, 3, NULL, 9000, '2012-11-21 11:28:33', 'asdas', '9999', 1, 'belum', '0000-00-00 00:00:00'),
(55, 'dani', 79, 2, 3, '1861842470005', 9000, '2012-08-08 00:00:00', 'asdas', '9999', 1, 'terkirim', '2012-11-22 12:22:42'),
(56, 'dani', 80, 2, 3, NULL, 9000, '2012-11-22 11:16:29', 'asdas', '9999', 1, 'belum', '0000-00-00 00:00:00'),
(57, 'dani', 81, 2, 3, '1861842470005', 9000, '2012-08-08 00:00:00', 'asdas', '9999', 1, 'terkirim', '2012-12-20 15:29:07'),
(69, 'member', 93, 2, NULL, NULL, 0, '2012-11-26 19:02:54', 'bandung', '97637866', 1, 'belum', '0000-00-00 00:00:00'),
(73, 'member', 98, 2, 3, NULL, 9000, '2012-12-10 18:47:35', 'bandung', '97637866', 1, 'belum', '0000-00-00 00:00:00'),
(75, 'dani', 100, 3, 4, NULL, 9000, NULL, 'jln suka senang senang sekali ', '08562016206', 1, 'belum', '0000-00-00 00:00:00'),
(77, 'dani', 102, 2, 3, '1861842470005', 9000, '2012-08-08 00:00:00', 'jln dipatiukur', '098776', 1, 'terkirim', '2013-01-29 15:37:02'),
(78, 'dani', 103, 2, 3, NULL, 9000, NULL, 'jln dipatiukur', '098776', 1, 'belum', '0000-00-00 00:00:00'),
(81, 'member', 107, 2, 99999, '98988766', 63000, '2012-08-08 00:00:00', 'bandung', '97637866', 1, 'terkirim', '0000-00-00 00:00:00'),
(82, 'member', 108, 2, 99999, NULL, 63000, NULL, 'bandung', '97637866', 1, 'belum', '0000-00-00 00:00:00'),
(83, 'member', 109, 2, 99999, NULL, 63000, NULL, 'bandung', '97637866', 1, 'belum', '0000-00-00 00:00:00'),
(84, 'member', 110, 2, 99999, NULL, 63000, NULL, 'bandung', '97637866', 1, 'belum', '0000-00-00 00:00:00'),
(85, 'member', 111, 2, 99999, '1861842470005', 27000, '2012-08-08 00:00:00', 'bandung', '97637866', 1, 'terkirim', '2013-04-26 17:33:22'),
(86, 'member', 112, 2, 99999, NULL, 27000, NULL, 'bandung', '97637866', 1, 'belum', '0000-00-00 00:00:00'),
(87, 'member', 113, 2, 99999, NULL, 27000, NULL, 'bandung', '97637866', 1, 'belum', '0000-00-00 00:00:00'),
(88, 'member', 114, 2, 99999, '1861842470005', 9000, '2012-08-08 00:00:00', 'bandung', '97637866', 1, 'terkirim', '0000-00-00 00:00:00'),
(89, 'member', 115, 2, 99999, NULL, 9000, NULL, 'bandung', '97637866', 1, 'belum', '0000-00-00 00:00:00'),
(90, 'member', 116, 4, 99999, '020171310466', 27000, '2012-08-08 00:00:00', 'bandung', '97637866', 1, 'terkirim', '2013-06-12 12:04:00'),
(91, 'member', 117, 2, 99999, '2222222', 27000, '2012-08-08 00:00:00', 'bandung', '97637866', 1, 'mengirim', '2013-06-02 00:00:00'),
(94, 'member', 117, 4, 99999, NULL, 27000, NULL, 'bandung', '97637866', 1, 'belum', '2013-06-16 00:00:00'),
(95, 'member', 118, 3, 99999, NULL, 20000, '2013-06-16 11:52:59', 'bandung', '97637866', 1, 'belum', '0000-00-00 00:00:00'),
(96, 'member', 119, 2, 99999, NULL, 27000, '2013-07-13 15:59:04', 'bandung', '97637866', 1, 'belum', '0000-00-00 00:00:00'),
(97, 'member', 120, 2, 99999, '1861842470005', 18000, '2012-08-08 00:00:00', 'bandung', '97637866', 1, 'terkirim', '0000-00-00 00:00:00'),
(98, 'member', 121, 2, 99999, '888888888888', 18000, '2012-08-08 00:00:00', 'bandung', '97637866', 1, 'terkirim', '0000-00-00 00:00:00'),
(99, 'member', 122, 2, 99999, NULL, 18000, NULL, 'bandung', '97637866', 1, 'belum', '0000-00-00 00:00:00'),
(100, 'member', 123, 2, 99999, NULL, 9000, '2013-07-13 18:00:47', 'bandung', '97637866', 1, 'belum', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kode`, `nama`, `deskripsi`, `gambar`, `kategori_id`, `status_produk`, `date_created`, `date_updated`, `users_id`) VALUES
('k01', 'Adidas', '                    extreme metal                ', 'AdidasLogo.jpg', 4, 'stok', NULL, NULL, 1),
('k02', 'Tiger shoes', 'asldaskd ', 'floridaphanter.jpg', 3, 'stok', NULL, NULL, 1),
('Tbs', 'CONVERSE', 'test tubagus ', 'converse logo.jpg', 4, 'stok', NULL, NULL, 1),
('Z076', 'medley', ' lorem ipsum lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum', 'medley logo.jpg', 3, 'stok', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `propinsi`
--

CREATE TABLE IF NOT EXISTS `propinsi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `propinsi`
--

INSERT INTO `propinsi` (`id`, `nama`) VALUES
(1, 'jawa barat'),
(2, 'jawa timur');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `detail_produk_id` int(11) NOT NULL,
  `member_email` text NOT NULL,
  `rating` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`detail_produk_id`, `member_email`, `rating`, `tanggal`) VALUES
(2, 'danzztakezo@gmail.com', 5, '2012-06-16 14:25:18'),
(3, 'member@localhost.com', 5, '2012-06-24 03:54:04'),
(6, 'member@localhost.com', 5, '2012-06-24 03:54:07'),
(1, 'member@localhost.com', 5, '2012-09-28 15:46:20'),
(5, 'member@localhost.com', 3, '2013-01-27 04:35:10'),
(2, 'member@localhost.com', 4, '2013-02-22 13:40:40');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE IF NOT EXISTS `rekening` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank` varchar(80) NOT NULL,
  `rekening` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retur`
--

INSERT INTO `retur` (`pembelian_id`, `tanggal_retur`) VALUES
(6, '2012-06-09 00:00:00'),
(7, '0000-00-00 00:00:00'),
(8, '2012-06-08 00:00:00'),
(9, '0000-00-00 00:00:00'),
(21, '0000-00-00 00:00:00'),
(65, '0000-00-00 00:00:00'),
(102, '0000-00-00 00:00:00'),
(107, '0000-00-00 00:00:00'),
(111, '0000-00-00 00:00:00'),
(114, '0000-00-00 00:00:00'),
(116, '0000-00-00 00:00:00'),
(120, '0000-00-00 00:00:00'),
(121, '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100000 ;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`id`, `vendor_id`, `kode`, `nama`, `asal`, `tujuan`, `tarif`, `satuan`, `pola_perhitungan`, `kota_id`) VALUES
(1, 2, 'TK-00', 'bandung-jakarta', NULL, 'jakarta selatan', 4000, NULL, 'satuan', 1),
(2, 2, 'TK02', 'surakarta-surabaya', NULL, 'kota bandung', 9000, NULL, 'satuan', 1),
(3, 2, 'TK02', 'bandung-surabaya', NULL, 'bandung', 9000, NULL, 'satuan', 1),
(4, 3, 'PS-c1', 'pos ceria', NULL, 'surabaya', 20000, NULL, 'satuan', 1),
(5, 4, 'PS-c1', 'pos ceria', NULL, 'surabaya', 20000, NULL, 'satuan', 1),
(6, 5, 'srb', 'bandung-surabaya', NULL, 'surabaya', 8900, NULL, 'all', 6),
(99999, 5, 'srb', 'bandung-surabaya', NULL, 'surabaya', 0, NULL, 'all', 6);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Dumping data for table `temp_page`
--

INSERT INTO `temp_page` (`id`, `produk_kode`, `tanggal`, `ip`, `member_email`) VALUES
(1, 'k01', '2013-01-26 23:36:39', '127.0.0.1', 'member@localhost.com'),
(2, 'k02', '2013-01-26 23:36:57', '127.0.0.1', 'member@localhost.com'),
(3, 'k01', '2013-01-26 23:37:00', '127.0.0.1', 'member@localhost.com'),
(4, 'k01', '2013-01-27 00:18:48', '127.0.0.1', ''),
(5, 'k02', '2013-01-27 00:18:56', '127.0.0.1', ''),
(6, 'k02', '2013-01-27 00:19:06', '127.0.0.1', ''),
(7, 'k02', '2013-01-27 00:20:55', '127.0.0.1', ''),
(8, 'Tbs', '2013-01-27 00:21:52', '127.0.0.1', ''),
(9, 'k02', '2013-01-27 00:22:23', '127.0.0.1', ''),
(10, 'k01', '2013-01-28 10:21:19', '127.0.0.1', ''),
(11, 'k01', '2013-01-28 10:23:18', '127.0.0.1', ''),
(12, 'k01', '2013-01-28 10:25:48', '127.0.0.1', ''),
(13, 'k01', '2013-01-28 10:26:10', '127.0.0.1', ''),
(14, 'k01', '2013-01-28 10:26:49', '127.0.0.1', ''),
(15, 'k01', '2013-01-28 10:28:42', '127.0.0.1', 'danzztakezo@gmail.com'),
(16, 'k02', '2013-02-19 10:57:00', '127.0.0.1', 'member@localhost.com'),
(17, 'k01', '2013-02-21 11:31:42', '127.0.0.1', 'member@localhost.com'),
(18, 'k01', '2013-02-22 07:36:07', '127.0.0.1', ''),
(19, 'k02', '2013-02-22 07:36:22', '127.0.0.1', ''),
(20, 'k01', '2013-02-22 07:39:24', '127.0.0.1', 'member@localhost.com'),
(21, 'k02', '2013-02-22 07:39:33', '127.0.0.1', 'member@localhost.com'),
(22, 'k02', '2013-02-22 07:40:13', '127.0.0.1', 'member@localhost.com'),
(23, 'k01', '2013-02-22 07:49:31', '127.0.0.1', ''),
(24, 'k01', '2013-02-22 07:52:38', '127.0.0.1', 'danzztakezo@gmail.com'),
(25, 'Tbs', '2013-02-22 07:55:51', '127.0.0.1', 'danzztakezo@gmail.com'),
(26, 'k01', '2013-02-27 10:40:23', '127.0.0.1', 'member@localhost.com'),
(27, 'k01', '2013-02-27 10:41:01', '127.0.0.1', 'member@localhost.com'),
(28, 'k01', '2013-04-26 08:57:33', '127.0.0.1', 'member@localhost.com'),
(29, 'Z076', '2013-04-26 08:57:40', '127.0.0.1', 'member@localhost.com'),
(30, 'Z076', '2013-04-26 08:57:51', '127.0.0.1', 'member@localhost.com'),
(31, 'k01', '2013-04-26 10:31:01', '127.0.0.1', 'member@localhost.com'),
(32, 'k02', '2013-04-26 10:31:06', '127.0.0.1', 'member@localhost.com'),
(33, 'Z076', '2013-04-26 10:31:12', '127.0.0.1', 'member@localhost.com'),
(34, 'k01', '2013-05-24 08:06:39', '127.0.0.1', 'member@localhost.com'),
(35, 'k01', '2013-05-24 08:47:31', '127.0.0.1', 'member@localhost.com'),
(36, 'Tbs', '2013-05-24 08:47:40', '127.0.0.1', 'member@localhost.com'),
(37, 'Z076', '2013-05-24 08:47:47', '127.0.0.1', 'member@localhost.com'),
(38, 'k01', '2013-06-05 10:50:40', '127.0.0.1', ''),
(39, 'k01', '2013-06-05 11:08:54', '127.0.0.1', ''),
(40, 'k01', '2013-06-05 11:12:44', '127.0.0.1', ''),
(41, 'k01', '2013-06-05 11:17:45', '127.0.0.1', ''),
(42, 'k01', '2013-06-05 11:21:34', '127.0.0.1', ''),
(43, 'k01', '2013-06-05 11:23:43', '127.0.0.1', ''),
(44, 'k01', '2013-06-05 11:24:02', '127.0.0.1', ''),
(45, 'k01', '2013-06-16 04:52:13', '127.0.0.1', 'member@localhost.com'),
(46, 'k01', '2013-07-13 08:51:01', '127.0.0.1', 'member@localhost.com'),
(47, 'k01', '2013-07-13 08:58:41', '127.0.0.1', 'member@localhost.com'),
(48, 'k02', '2013-07-13 09:00:38', '127.0.0.1', 'member@localhost.com'),
(49, 'Tbs', '2013-07-13 09:00:43', '127.0.0.1', 'member@localhost.com'),
(50, 'Tbs', '2013-07-13 09:49:14', '127.0.0.1', 'member@localhost.com'),
(51, 'Tbs', '2013-07-13 11:00:27', '127.0.0.1', 'member@localhost.com'),
(52, 'k01', '2013-07-30 09:38:53', '127.0.0.1', 'member@localhost.com'),
(53, 'k01', '2013-07-30 09:48:48', '127.0.0.1', 'member@localhost.com'),
(54, 'k01', '2013-07-30 09:52:34', '127.0.0.1', 'member@localhost.com'),
(55, 'k01', '2013-07-30 09:52:48', '127.0.0.1', 'member@localhost.com'),
(56, 'k01', '2013-07-30 09:54:22', '127.0.0.1', 'member@localhost.com'),
(57, 'k01', '2013-07-30 09:54:50', '127.0.0.1', 'member@localhost.com'),
(58, 'k01', '2013-07-30 09:58:19', '127.0.0.1', 'member@localhost.com'),
(59, 'k01', '2013-07-30 09:58:26', '127.0.0.1', 'member@localhost.com'),
(60, 'k01', '2013-07-30 10:00:03', '127.0.0.1', 'member@localhost.com'),
(61, 'k01', '2013-07-30 10:03:21', '127.0.0.1', 'member@localhost.com'),
(62, 'k01', '2013-07-30 10:03:48', '127.0.0.1', 'member@localhost.com'),
(63, 'k01', '2013-07-30 10:05:20', '127.0.0.1', 'member@localhost.com'),
(64, 'k01', '2013-07-30 10:11:02', '127.0.0.1', 'member@localhost.com'),
(65, 'k01', '2013-07-30 10:14:37', '127.0.0.1', 'member@localhost.com'),
(66, 'k01', '2013-07-30 10:14:48', '127.0.0.1', 'member@localhost.com'),
(67, 'k02', '2013-07-30 10:18:59', '127.0.0.1', 'member@localhost.com'),
(68, 'Tbs', '2013-07-30 10:19:09', '127.0.0.1', 'member@localhost.com'),
(69, 'k01', '2013-07-30 10:23:55', '127.0.0.1', 'member@localhost.com'),
(70, 'k01', '2013-07-30 11:00:02', '127.0.0.1', ''),
(71, 'k02', '2013-07-30 11:00:13', '127.0.0.1', ''),
(72, 'Z076', '2013-07-30 11:00:19', '127.0.0.1', ''),
(73, 'Tbs', '2013-07-30 11:00:27', '127.0.0.1', ''),
(74, 'k01', '2013-07-30 11:48:29', '127.0.0.1', ''),
(75, 'k01', '2013-07-30 11:55:31', '127.0.0.1', ''),
(76, 'k01', '2013-07-30 11:55:51', '127.0.0.1', ''),
(77, 'k01', '2013-07-30 11:59:54', '127.0.0.1', ''),
(78, 'k01', '2013-07-30 12:19:09', '127.0.0.1', 'member@localhost.com'),
(79, 'k01', '2013-07-30 12:20:19', '127.0.0.1', 'member@localhost.com'),
(80, 'k01', '2013-07-30 12:20:27', '127.0.0.1', 'member@localhost.com'),
(81, 'k01', '2013-07-30 12:20:42', '127.0.0.1', 'member@localhost.com'),
(82, 'k01', '2013-07-30 12:21:56', '127.0.0.1', 'member@localhost.com'),
(83, 'k01', '2013-07-30 12:22:08', '127.0.0.1', 'member@localhost.com');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `group_id`, `status`) VALUES
(1, 'administrator', 'admin@localhost.com', '5a0cdef1627164252ad4f87c6b3395b0', 99, 'aktif'),
(4, 'input2', 'input@localhost.com', '23d65002bddc4ad24550a59f06cb2ea0', 1, 'aktif'),
(5, 'operator', 'operator@localhost.com', 'f34ca89b57d1273395c6ee46d147272f', 100, 'aktif');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `nama`, `deskripsi`, `kode`, `site`, `date_created`, `date_updated`, `parent_id`) VALUES
(2, 'JNE', 'vendor pengiriman JNE ', 'jne', 'http://jne.co.id/index.php?mib=tracking.detail&awb={noresi}', NULL, NULL, 0),
(3, 'PT POS', 'pt pos paket pengiriman ', 'POS', 'http://www.posindonesia.co.id/home/modules/mod_search/tmpl/libs/lacakk1121m4np05.php?jenis=0&barcode={noresi}&lacak=Lacak', NULL, NULL, 0),
(4, 'TIKI', 'tiki delivery', 'TIKI', 'http://www.tiki-online.com/?cat=Verty7788JasKJ', NULL, NULL, 0),
(5, 'regular', 'regular JNE', 'JNERE', 'http://jne.co.id/index.php?mib=tracking.detail&awb={noresi}', NULL, NULL, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `fk_pengiriman_kelurahan1` FOREIGN KEY (`kelurahan_id`) REFERENCES `kelurahan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_pengiriman_pembelian` FOREIGN KEY (`pembelian_id`) REFERENCES `pembelian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tarif_pengiriman` FOREIGN KEY (`tarif_id`) REFERENCES `tarif` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_vendor_pengiriman` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
