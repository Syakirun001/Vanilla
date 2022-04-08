-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2019 at 11:00 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vanilla`
--
CREATE DATABASE IF NOT EXISTS `vanilla` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `vanilla`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'admin', 'admin', 'Isal');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `email_pelanggan` varchar(50) NOT NULL,
  `password_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(6, 'hehe@email.com', 'hehe', 'hehe', '08123456789', 'hehe'),
(7, 'isal007@gmail.com', '1234', 'isal', '809098980809098', 'jalan villa jati rasa'),
(8, 'dahlia@gmail.com', '1234', 'dahlia', '081234567890', 'jalan surabaya rt02/07');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bank` varchar(200) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(200) NOT NULL,
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(16, 43, 'akbar', 'Bank_DKI', 22000, '2019-08-22', '20190822112122slide1.jpg'),
(17, 43, 'akbar', 'Bank_DKI', 22000, '2019-08-22', '20190822112123slide1.jpg'),
(18, 46, 'isal', 'Bank_DKI', 15000, '2019-08-24', '2019082411353750234431_125800775138515_3857115923304445098_n.jpg'),
(19, 51, 'isal', 'Bank_Mandiri', 28000, '2019-08-25', '20190825110704download.jpg'),
(20, 52, 'dahlia', 'Bank_Mandiri', 35000, '2019-08-25', '20190825202658download.jpg'),
(21, 53, 'isal', 'Bank_BNI', 35000, '2019-08-26', '2019082607035550234431_125800775138515_3857115923304445098_n.jpg'),
(22, 54, 'Isal', 'Bank_BRI', 15000, '2019-08-26', '20190826144952download.jpg'),
(23, 55, 'isal', 'Bank_BNI', 15000, '2019-08-28', '2019082805035320110520000957_0.jpg'),
(24, 56, '12', 'Bank_DKI', 12, '2019-08-28', '20190828193735');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
  `id_pembelian` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'Menunggu Pembayaran',
  PRIMARY KEY (`id_pembelian`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `tanggal_pembelian`, `total_pembelian`, `alamat_pengiriman`, `status_pembelian`) VALUES
(48, 6, '2019-08-24', 10000, '', 'Menunggu Pembayaran'),
(49, 6, '2019-08-24', 10000, '', 'Menunggu Pembayaran'),
(50, 6, '2019-08-24', 5000, '', 'Menunggu Pembayaran'),
(51, 7, '2019-08-25', 28000, 'jalan swadaya 2, depok', 'Barang Segera di kirim mohon menunggu'),
(52, 8, '2019-08-25', 35000, 'jalan surabaya 02/07', 'Barang Segera di kirim mohon menunggu'),
(53, 7, '2019-08-26', 35000, 'jalan villa jatirasa', 'Barang Segera di kirim mohon menunggu'),
(54, 7, '2019-08-26', 15000, 'jalan villa jatirasa', 'Barang Telah Dikirim'),
(55, 7, '2019-08-28', 15000, '', 'Barang Telah Dikirim'),
(56, 7, '2019-08-28', 13000, '', 'sudah kirim pembayaran');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE IF NOT EXISTS `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `subharga` int(11) NOT NULL,
  PRIMARY KEY (`id_pembelian_produk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=92 ;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `subharga`) VALUES
(62, 34, 18, 1, '', 0, 0),
(63, 34, 18, 1, 'Grilled Beef', 70000, 70000),
(64, 35, 18, 1, '', 0, 0),
(65, 35, 18, 1, 'Grilled Beef', 70000, 70000),
(66, 36, 18, 4, '', 0, 0),
(67, 36, 18, 4, 'Grilled Beef', 70000, 280000),
(68, 37, 18, 1, 'Grilled Beef', 70000, 70000),
(69, 38, 18, 1, 'Grilled Beef', 70000, 70000),
(70, 39, 19, 1, 'Grilled Beef', 40000, 40000),
(71, 40, 19, 1, 'Grilled Beef', 40000, 40000),
(72, 41, 20, 1, 'Grilled Beef', 35000, 35000),
(73, 42, 19, 1, 'Grilled Beef', 40000, 40000),
(74, 43, 23, 1, 'Lemonade Juice', 22000, 22000),
(75, 44, 27, 1, 'Grilled Beef', 28000, 28000),
(76, 45, 18, 2, 'Grilled Beef', 70000, 140000),
(77, 46, 18, 1, '', 0, 0),
(78, 46, 28, 1, 'Pisang Keju', 15000, 15000),
(79, 47, 28, 1, 'Pisang Keju', 15000, 15000),
(80, 48, 32, 1, 'Soda Susu', 10000, 10000),
(81, 49, 32, 1, 'Soda Susu', 10000, 10000),
(82, 50, 33, 1, 'Es Teh Manis', 5000, 5000),
(83, 51, 22, 1, 'Indomie Rebus', 13000, 13000),
(84, 51, 19, 1, 'Pisang Keju', 15000, 15000),
(85, 52, 20, 1, 'Kentang Goreng', 20000, 20000),
(86, 52, 19, 1, 'Pisang Keju', 15000, 15000),
(87, 53, 20, 1, 'Kentang Goreng', 20000, 20000),
(88, 53, 23, 1, 'Dimsum', 15000, 15000),
(89, 54, 23, 1, 'Dimsum', 15000, 15000),
(90, 55, 25, 1, 'Sosis Bakar', 15000, 15000),
(91, 56, 21, 1, 'Indomie Goreng', 13000, 13000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(5) NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
(19, 'Pisang Keju', 15000, 'pisang-goreng-keju.jpg', '	', 88),
(20, 'Kentang Goreng', 20000, 'kentang-goreng_20180706_104827.jpg', '', 97),
(21, 'Indomie Goreng', 13000, 'innn.jpg', '', 89),
(22, 'Indomie Rebus', 13000, 'mie_20180331_140834.jpg', '', 11),
(23, 'Dimsum', 15000, 'picture-1488185585.jpg', '', 96),
(24, 'Roti Bakar', 10000, 'roti.jpg', '', 77),
(25, 'Sosis Bakar', 15000, 'produk57601-664678225.jpg', '', 59),
(26, 'Kopi Robusta', 13000, 'kopi-robusta-punya-citarasa.jpg', '', 90),
(27, 'Kopi Hitam', 5000, 'americano.jpg', '', 27),
(28, 'Kopi Latte', 15000, 'Latte-Coffee.jpg', '					', 98),
(29, 'Milkshake Coklat', 15000, 'peluang-bisnis-milkshake-coklat-pengusahasukses-314x314.jpg', '', 12),
(30, 'Milkshake Strawberry', 15000, 'photo.jpg', '', 22),
(31, 'Milkshake Vanilla', 15000, '20110520000957_0.jpg', '										', 33),
(32, 'Soda Susu', 10000, '50234431_125800775138515_3857115923304445098_n.jpg', '', 54),
(33, 'Es Teh Manis', 5000, 'esteh.jpg', '', 11);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
