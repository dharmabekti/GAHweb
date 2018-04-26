-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2018 at 08:28 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gahdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkin_checkout`
--

CREATE TABLE `checkin_checkout` (
  `ID_RESERVASI` int(11) NOT NULL,
  `TGL_CHECKIN` datetime DEFAULT NULL,
  `TGL_CHECKOUT` datetime DEFAULT NULL,
  `DEPOSIT` float DEFAULT NULL,
  `CASH` float DEFAULT NULL,
  `ID_BOOKING` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkin_checkout`
--

INSERT INTO `checkin_checkout` (`ID_RESERVASI`, `TGL_CHECKIN`, `TGL_CHECKOUT`, `DEPOSIT`, `CASH`, `ID_BOOKING`) VALUES
(1, '2016-04-20 00:00:00', '2016-04-22 00:00:00', 300000, 0, 'G040416-006'),
(2, '2016-07-16 00:00:00', '2016-07-18 00:00:00', 300000, 0, 'G070716-008'),
(3, '2016-08-16 00:00:00', '2016-08-20 00:00:00', 300000, 0, 'G080816-007'),
(4, '2012-12-24 00:00:00', NULL, 300000, 0, 'G121212-003'),
(5, '2017-12-31 00:00:00', NULL, 300000, 0, 'G241217-009'),
(6, '2017-06-01 00:00:00', '2017-06-02 00:00:00', 300000, 0, 'G250517-010'),
(7, '2018-02-09 00:00:00', NULL, 300000, 0, 'P020218-004'),
(8, '2018-08-20 00:00:00', '2018-08-23 00:00:00', 300000, 100000, 'P080818-002'),
(9, '2018-12-30 00:00:00', NULL, 300000, NULL, 'P231218-001'),
(10, '2018-11-08 00:00:00', '2018-11-10 00:00:00', 300000, 25000, 'P301018-005');

-- --------------------------------------------------------

--
-- Table structure for table `data_diri`
--

CREATE TABLE `data_diri` (
  `ID_DATA_DIRI` int(11) NOT NULL,
  `NAMA` varchar(30) DEFAULT NULL,
  `NAMA_INSTITUSI` varchar(30) DEFAULT NULL,
  `NO_IDENTITAS` varchar(15) DEFAULT NULL,
  `NO_TELEPON` varchar(12) DEFAULT NULL,
  `EMAIL` varchar(30) DEFAULT NULL,
  `ALAMAT` varchar(50) DEFAULT NULL,
  `JENIS_KELAMIN` varchar(15) DEFAULT NULL,
  `TGL_BUAT` datetime DEFAULT CURRENT_TIMESTAMP,
  `ID_USER` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_diri`
--

INSERT INTO `data_diri` (`ID_DATA_DIRI`, `NAMA`, `NAMA_INSTITUSI`, `NO_IDENTITAS`, `NO_TELEPON`, `EMAIL`, `ALAMAT`, `JENIS_KELAMIN`, `TGL_BUAT`, `ID_USER`) VALUES
(1, 'Viktor A.', NULL, '1234567', '1234567890', 'lala@gmail.com', 'mana aja', 'Laki-laki', '2018-02-02 00:00:00', 10),
(2, 'Dwi Cahya Sadewa', NULL, '123456789', '123344', 'dwi@gmail.com', 'yeah', 'Laki-laki', '1996-02-28 00:00:00', 6),
(3, 'Lala', 'ITB', '12121212', '08080808', 'lala@gmail.com', 'Kuku', 'Perempuan', '2012-01-02 00:00:00', NULL),
(4, 'Johan S.', NULL, '13579013', '123123123', 'johan@gmail.com', 'solo', 'Laki-laki', '2018-01-01 00:00:00', 8),
(5, 'Bella Priscilia', NULL, '1612345', '081239000123', 'bella@gmail.com', 'Mrican', 'Perempuan', '2018-10-30 00:00:00', 9),
(6, 'Desi', 'UAJY', '12345671', '123451234', 'desi@gmail.com', 'Lokasi', 'Perempuan', '2016-03-03 00:00:00', NULL),
(7, 'Joko', ' ogle', '4689213', '123457411', 'joko@gmail.com', 'Jakarta', 'Laki-laki', '2016-08-08 00:00:00', NULL),
(8, 'Kuncoro', 'Blibli', '34578321', '123567334', 'kunc@gmail.com', 'Kutilang', 'Laki-laki', '2017-07-07 00:00:00', NULL),
(9, 'Herri', 'Blibli', '32546621', '112345554', 'Henri@gmail.com', 'babarsari', 'Laki-laki', '2017-12-24 00:00:00', NULL),
(10, 'Lola', 'Tokopedia', '11111111', '234311233', 'lola@gmail.com', 'babarsari', 'Perempuan', '2017-05-25 00:00:00', NULL),
(11, 'Awan', NULL, '150708605', '081999999999', 'awan@gmail.com', 'Babarsari', 'Laki-laki', '2018-04-14 15:31:45', 11),
(17, 'Lucky Putra', NULL, '777', '08123944213', 'lucky@gmail.com', 'badak agung', 'Laki - Laki', '2018-04-18 18:02:44', 14),
(18, 'Happy Florentina Melani Utami ', NULL, '150708888', '081234567000', 'happy@gmail.com', 'Banjarmasin', 'Perempuan', '2018-04-21 23:26:45', 15);

-- --------------------------------------------------------

--
-- Table structure for table `detil_kamar`
--

CREATE TABLE `detil_kamar` (
  `ID_DETIL_KAMAR` int(11) NOT NULL,
  `NAMA_KAMAR` varchar(30) DEFAULT NULL,
  `JUMLAH_KAMAR` int(11) DEFAULT NULL,
  `FASILITAS` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_kamar`
--

INSERT INTO `detil_kamar` (`ID_DETIL_KAMAR`, `NAMA_KAMAR`, `JUMLAH_KAMAR`, `FASILITAS`) VALUES
(1, 'Junior Suite', 10, 'Layout - ruang duduk terpisah\r\nInternet - WiFi Gratis\r\nHiburan - Televisi LCD dengan channel TV premium channels\r\nMakan Minum - Pembuat kopi/teh, minibar, layanan kamar 24-jam, air minum kemasan gratis,termasuk sarapan\r\nUntuk tidur - Seprai kualitas premium dan gorden/tirai kedap cahaya\r\nKamar Mandi - Kamar mandi pribadi dengan bathtub dan shower terpisah, jubah mandi, dan sandal\r\nKemudahan - Brankas (muat laptop), Meja tulis, dan Telepon; tempat tidur lipat/tambahan tersedia berdasarkan permintaan\r\nKenyamanan - AC dan layanan pembenahan kamar harian Merokok/Dilarang Merokok'),
(2, 'Executive Deluxe', 25, 'Internet - WiFi Gratis\r\nHiburan - Televisi LCD dengan channel TV premium channels\r\nMakan Minum - Pembuat kopi/teh, minibar, layanan kamar 24-jam, air minum kemasan gratis,termasuk sarapan\r\nUntuk tidur - Seprai kualitas premium dan gorden/tirai kedap cahaya\r\nKamar Mandi - Kamar mandi pribadi dengan shower, jubah mandi, dan sandal\r\nKemudahan - Brankas (muat laptop), Meja tulis, dan Telepon; tempat tidur lipat/tambahan tersedia berdasarkan permintaan\r\nKenyamanan - AC dan layanan pembenahan kamar harian Merokok/Dilarang Merokok'),
(3, 'Double Deluxe', 25, 'Internet - WiFi Gratis\r\nHiburan - Televisi LCD dengan channel TV premium channels\r\nMakan Minum - Pembuat kopi/teh, minibar, layanan kamar 24-jam, air minum kemasan gratis,termasuk sarapan\r\nUntuk tidur - Seprai kualitas premium dan gorden/tirai kedap cahaya\r\nKamar Mandi - Kamar mandi pribadi dengan shower, jubah mandi, dan sandal\r\nKemudahan - Brankas (muat laptop), Meja tulis, dan Telepon; tempat tidur lipat/tambahan tersedia berdasarkan permintaan\r\nKenyamanan - AC dan layanan pembenahan kamar harian Merokok/Dilarang Merokok'),
(4, 'Superior', 65, 'Internet - WiFi Gratis\r\nHiburan - Televisi LCD dengan channel TV premium channels\r\nMakan Minum - Pembuat kopi/teh, minibar, layanan kamar 24-jam, air minum kemasan gratis,termasuk sarapan\r\nUntuk tidur - Seprai kualitas premium dan gorden/tirai kedap cahaya\r\nKamar Mandi - Kamar mandi pribadi dengan shower, jubah mandi, dan sandal\r\nKemudahan - Brankas (muat laptop), Meja tulis, dan Telepon; tempat tidur lipat/tambahan tersedia berdasarkan permintaan\r\nKenyamanan - AC dan layanan pembenahan kamar harian Merokok/Dilarang Merokok');

-- --------------------------------------------------------

--
-- Table structure for table `detil_reservasi`
--

CREATE TABLE `detil_reservasi` (
  `ID_DETIL_RESERVASI` int(11) NOT NULL,
  `JENIS_TAMU` varchar(10) NOT NULL,
  `JUMLAH_TAMU` int(11) DEFAULT NULL,
  `STATUS_BATAL` varchar(10) DEFAULT 'Tidak',
  `JUMLAH_KAMAR` int(11) DEFAULT NULL,
  `JUMLAH_ANAK` int(11) DEFAULT NULL,
  `JUMLAH_DEWASA` int(11) DEFAULT NULL,
  `ID_BOOKING` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_reservasi`
--

INSERT INTO `detil_reservasi` (`ID_DETIL_RESERVASI`, `JENIS_TAMU`, `JUMLAH_TAMU`, `STATUS_BATAL`, `JUMLAH_KAMAR`, `JUMLAH_ANAK`, `JUMLAH_DEWASA`, `ID_BOOKING`) VALUES
(1, 'Personal', 2, 'TIDAK', 1, 0, 2, 'P231218-001'),
(2, 'Personal', 2, 'TIDAK', 1, 0, 2, 'P080818-002'),
(3, 'Grup', 20, 'TIDAK', 10, 5, 15, 'G121212-003'),
(4, 'Personal', 4, 'TIDAK', 1, 2, 2, 'P020218-004'),
(5, 'Personal', 3, 'YA', 1, 1, 3, 'P301018-005'),
(6, 'Grup', 25, 'YA', 12, 0, 25, 'G040416-006'),
(7, 'Grup', 30, 'TIDAK', 15, 15, 15, 'G080816-007'),
(8, 'Grup', 40, 'TIDAK', 20, 10, 30, 'G070716-008'),
(9, 'Grup', 50, 'YA', 25, 0, 50, 'G241217-009'),
(10, 'Grup', 100, 'TIDAK', 50, 0, 100, 'G250517-010'),
(11, 'Grup', 20, 'TIDAK', 10, 0, 20, 'G080818-011');

-- --------------------------------------------------------

--
-- Table structure for table `detil_tarif`
--

CREATE TABLE `detil_tarif` (
  `ID_DETIL_TARIF` int(11) NOT NULL,
  `ID_ITEM` int(11) DEFAULT NULL,
  `ID_TARIF` int(11) DEFAULT NULL,
  `JUMLAH_ITEM` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_tarif`
--

INSERT INTO `detil_tarif` (`ID_DETIL_TARIF`, `ID_ITEM`, `ID_TARIF`, `JUMLAH_ITEM`) VALUES
(1, 1, 2, 2),
(2, 2, 4, 1),
(3, 3, 4, 1),
(4, 4, 4, 1),
(5, 9, 4, 1),
(6, 5, 3, 2),
(7, 6, 1, 2),
(8, 7, 1, 1),
(9, 8, 1, 1),
(10, 9, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `detil_transaksi_pembayaran`
--

CREATE TABLE `detil_transaksi_pembayaran` (
  `ID_DETIL_TRANSAKSI` int(11) NOT NULL,
  `JENIS_PEMBAYARAN` varchar(10) DEFAULT NULL,
  `NOMOR_KARTU_KREDIT` varchar(20) DEFAULT NULL,
  `NO_INVOICE` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_transaksi_pembayaran`
--

INSERT INTO `detil_transaksi_pembayaran` (`ID_DETIL_TRANSAKSI`, `JENIS_PEMBAYARAN`, `NOMOR_KARTU_KREDIT`, `NO_INVOICE`) VALUES
(1, 'Transfer', NULL, 'G040416-006'),
(2, 'Transfer', NULL, 'G070716-008'),
(3, 'Transfer', NULL, 'G080816-007'),
(7, 'Transfer', NULL, 'G250517-010'),
(9, 'Kredit', '123456789', 'P080818-002'),
(11, 'Kredit', '987654321', 'P301018-005'),
(12, 'Transfer', NULL, 'G080818-011'),
(13, 'Transfer', NULL, 'G121212-003'),
(14, 'Transfer', NULL, 'G241217-009');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `ID_ITEM` int(11) NOT NULL,
  `NAMA_ITEM` varchar(30) DEFAULT NULL,
  `HARGA_ITEM` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`ID_ITEM`, `NAMA_ITEM`, `HARGA_ITEM`) VALUES
(1, 'Extra Bed', 150000),
(2, 'Laundry Regular', 10000),
(3, 'Laundry Fast Service', 25000),
(4, 'Massage', 75000),
(5, 'Tambahan Breakfast', 50000),
(6, 'Lunch Package', 100000),
(7, 'Dinner Package', 100000),
(8, 'Meeting Room Full Day', 200000),
(9, 'Minibar', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `ID_KAMAR` varchar(10) NOT NULL,
  `TEMPAT_TIDUR` varchar(10) DEFAULT NULL,
  `STAUS_SMOKING` varchar(5) DEFAULT 'Tidak',
  `STATUS_BOOKING` varchar(20) DEFAULT 'Tersedia',
  `ID_DETIL_KAMAR` int(11) DEFAULT NULL,
  `ID_TARIF_SEASON` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`ID_KAMAR`, `TEMPAT_TIDUR`, `STAUS_SMOKING`, `STATUS_BOOKING`, `ID_DETIL_KAMAR`, `ID_TARIF_SEASON`) VALUES
('1001JS', 'King', 'TIDAK', 'TERSEDIA', 1, 5),
('1002JS', 'King', 'IYA', 'TERSEDIA', 1, 5),
('1003ED', 'King', 'TIDAK', 'TERSEDIA', 2, 6),
('1004ED', 'King', 'IYA', 'TERSEDIA', 2, 6),
('1005ED', 'King', 'TIDAK', 'TERSEDIA', 2, 6),
('1006ED', 'King', 'TIDAK', 'TERSEDIA', 2, 6),
('1007ED', 'King', 'IYA', 'TERSEDIA', 2, 6),
('1008DD', 'Double', 'TIDAK', 'TERSEDIA', 3, 7),
('1009DD', 'Double', 'IYA', 'TERSEDIA', 3, 7),
('1010DD', 'King', 'TIDAK', 'TERSEDIA', 3, 7),
('1011DD', 'King', 'IYA', 'TERSEDIA', 3, 7),
('1012DD', 'Double', 'TIDAK', 'TERSEDIA', 3, 7),
('1013S', 'Double', 'TIDAK', 'TERSEDIA', 4, 8),
('1014S', 'King', 'TIDAK', 'TERSEDIA', 4, 8),
('1015S', 'Double', 'IYA', 'TERSEDIA', 4, 8),
('1016S', 'King', 'IYA', 'TERSEDIA', 4, 8);

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `ID_KOTA` int(11) NOT NULL,
  `NAMA_KOTA` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`ID_KOTA`, `NAMA_KOTA`) VALUES
(1, 'Bandung'),
(2, 'Yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `ID_BOOKING` varchar(20) NOT NULL,
  `TGL_RESERVASI` datetime DEFAULT NULL,
  `ID_KAMAR` varchar(10) DEFAULT NULL,
  `ID_DATA_DIRI` int(11) DEFAULT NULL,
  `ID_KOTA` int(11) DEFAULT NULL,
  `ID_TARIF` int(11) DEFAULT NULL,
  `TGL_MENGINAP` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`ID_BOOKING`, `TGL_RESERVASI`, `ID_KAMAR`, `ID_DATA_DIRI`, `ID_KOTA`, `ID_TARIF`, `TGL_MENGINAP`) VALUES
('G040416-006', '2016-04-04 00:00:00', '1005ED', 6, 2, 1, '2016-04-20 00:00:00'),
('G070716-008', '2016-07-07 00:00:00', '1007ED', 8, 2, NULL, '2016-07-16 00:00:00'),
('G080816-007', '2016-08-08 00:00:00', '1006ED', 7, 1, NULL, '2016-08-16 00:00:00'),
('G080818-011', '2018-08-08 00:00:00', '1016S', 6, 2, 4, '2012-12-10 00:00:00'),
('G121212-003', '2012-12-12 00:00:00', '1002JS', 3, 1, NULL, '2012-12-24 00:00:00'),
('G241217-009', '2017-12-24 00:00:00', '1008DD', 9, 2, NULL, '2017-12-31 00:00:00'),
('G250517-010', '2017-05-24 00:00:00', '1009DD', 10, 2, NULL, '2017-06-01 00:00:00'),
('P020218-004', '2018-02-02 00:00:00', '1003ED', 4, 1, 2, '2018-02-09 00:00:00'),
('P080818-002', '2018-08-08 00:00:00', '1008DD', 2, 1, NULL, '2018-08-20 00:00:00'),
('P231218-001', '2018-12-23 00:00:00', '1001JS', 1, 1, 3, '2018-12-30 00:00:00'),
('P301018-005', '2018-10-30 00:00:00', '1004ED', 5, 2, NULL, '2018-11-08 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `ID_ROLE` int(11) NOT NULL,
  `NAMA_ROLE` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`ID_ROLE`, `NAMA_ROLE`) VALUES
(1, 'Admin'),
(2, 'Sales & Marketing'),
(3, 'General Manager'),
(4, 'Owner'),
(5, 'Front Office'),
(6, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `season`
--

CREATE TABLE `season` (
  `ID_SEASON` int(11) NOT NULL,
  `NAMA_SEASON` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `season`
--

INSERT INTO `season` (`ID_SEASON`, `NAMA_SEASON`) VALUES
(1, 'Normal'),
(2, 'High Season'),
(3, 'Promo');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `ID_TARIF` int(11) NOT NULL,
  `HARGA_TARIF` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`ID_TARIF`, `HARGA_TARIF`) VALUES
(1, 500000),
(2, 300000),
(3, 100000),
(4, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `tarif_season`
--

CREATE TABLE `tarif_season` (
  `ID_TARIF_SEASON` int(11) NOT NULL,
  `TGL_MULAI` datetime DEFAULT NULL,
  `TGL_SELESAI` datetime DEFAULT NULL,
  `ID_SEASON` int(11) DEFAULT NULL,
  `HARGA_KAMAR` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarif_season`
--

INSERT INTO `tarif_season` (`ID_TARIF_SEASON`, `TGL_MULAI`, `TGL_SELESAI`, `ID_SEASON`, `HARGA_KAMAR`) VALUES
(1, '2017-12-20 00:00:00', '2018-01-21 00:00:00', 1, 550000),
(2, '2017-12-20 00:00:00', '2018-01-21 00:00:00', 1, 500000),
(3, '2017-12-20 00:00:00', '2018-01-21 00:00:00', 1, 450000),
(4, '2017-12-20 00:00:00', '2018-01-21 00:00:00', 1, 400000),
(5, '2018-01-22 00:00:00', '2018-04-21 00:00:00', 2, 700000),
(6, '2018-01-22 00:00:00', '2018-04-21 00:00:00', 2, 650000),
(7, '2018-01-22 00:00:00', '2018-04-21 00:00:00', 2, 600000),
(8, '2018-01-22 00:00:00', '2018-04-21 00:00:00', 2, 550000),
(9, '2018-04-22 00:00:00', '2018-08-22 00:00:00', 3, 450000),
(10, '2018-04-22 00:00:00', '2018-08-22 00:00:00', 3, 400000),
(11, '2018-04-22 00:00:00', '2018-08-22 00:00:00', 3, 350000),
(12, '2018-04-22 00:00:00', '2018-08-22 00:00:00', 3, 300000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `ID_USER` int(11) NOT NULL,
  `USERNAME` varchar(20) DEFAULT NULL,
  `PASSWORD` varchar(20) DEFAULT NULL,
  `ID_ROLE` int(11) DEFAULT NULL,
  `ID_KOTA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`ID_USER`, `USERNAME`, `PASSWORD`, `ID_ROLE`, `ID_KOTA`) VALUES
(1, 'Glady', '080897', 1, 2),
(2, 'Desya', '8563', 2, 2),
(3, 'Bekti', '1234567', 3, 1),
(4, 'Mike', '8573', 4, 1),
(5, 'Cherlie', '8546', 5, 1),
(6, 'Dwi', '8549', 6, 2),
(7, 'Felix', '8564', 2, 2),
(8, 'Johan', '8558', 6, 2),
(9, 'Bella', '8888', 6, 1),
(10, 'Viktor', '7118', 6, 2),
(11, 'awan', '42x1rn', 6, 2),
(14, 'lucky', '2408', 6, 2),
(15, 'Happy', '212121', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `NO_INVOICE` varchar(20) NOT NULL,
  `JUMLAH_TARIF` float DEFAULT NULL,
  `JENIS_STATUS` varchar(20) DEFAULT 'Belum Lunas',
  `TGL_TRANSAKSI` datetime DEFAULT NULL,
  `ID_BOOKING` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`NO_INVOICE`, `JUMLAH_TARIF`, `JENIS_STATUS`, `TGL_TRANSAKSI`, `ID_BOOKING`) VALUES
('G040416-006', 10000000, 'LUNAS', '2016-04-04 00:00:00', 'G040416-006'),
('G070716-008', 12000000, 'LUNAS', '2016-07-07 00:00:00', 'G070716-008'),
('G080816-007', 4000000, 'LUNAS', '2016-08-08 00:00:00', 'G080816-007'),
('G080818-011', 5000000, 'BELUM LUNAS', '2018-08-08 00:00:00', 'G080818-011'),
('G121212-003', 6500000, 'BELUM LUNAS', '2012-12-12 00:00:00', 'G121212-003'),
('G241217-009', 3500000, 'BELUM LUNAS', '2017-12-24 00:00:00', 'G241217-009'),
('G250517-010', 2500000, 'LUNAS', '2017-05-24 00:00:00', 'G250517-010'),
('P020218-004', 500000, 'BELUM LUNAS', '2018-02-02 00:00:00', 'P020218-004'),
('P080818-002', 700000, 'LUNAS', '2018-08-08 00:00:00', 'P080818-002'),
('P231218-001', 1000000, 'BELUM LUNAS', '2018-12-23 00:00:00', 'P231218-001'),
('P301018-005', 950000, 'LUNAS', '2018-10-30 00:00:00', 'P301018-005');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkin_checkout`
--
ALTER TABLE `checkin_checkout`
  ADD PRIMARY KEY (`ID_RESERVASI`),
  ADD KEY `id_booking2_fk` (`ID_BOOKING`);

--
-- Indexes for table `data_diri`
--
ALTER TABLE `data_diri`
  ADD PRIMARY KEY (`ID_DATA_DIRI`),
  ADD KEY `id_user_fk` (`ID_USER`);

--
-- Indexes for table `detil_kamar`
--
ALTER TABLE `detil_kamar`
  ADD PRIMARY KEY (`ID_DETIL_KAMAR`);

--
-- Indexes for table `detil_reservasi`
--
ALTER TABLE `detil_reservasi`
  ADD PRIMARY KEY (`ID_DETIL_RESERVASI`),
  ADD KEY `id_booking3_fk` (`ID_BOOKING`);

--
-- Indexes for table `detil_tarif`
--
ALTER TABLE `detil_tarif`
  ADD PRIMARY KEY (`ID_DETIL_TARIF`),
  ADD KEY `id_item_fk` (`ID_ITEM`),
  ADD KEY `id_tarif_fk` (`ID_TARIF`);

--
-- Indexes for table `detil_transaksi_pembayaran`
--
ALTER TABLE `detil_transaksi_pembayaran`
  ADD PRIMARY KEY (`ID_DETIL_TRANSAKSI`),
  ADD KEY `no_invoice_fk` (`NO_INVOICE`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ID_ITEM`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`ID_KAMAR`),
  ADD KEY `id_detil_kamar_fk` (`ID_DETIL_KAMAR`),
  ADD KEY `id_tarif_season_fk` (`ID_TARIF_SEASON`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`ID_KOTA`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`ID_BOOKING`),
  ADD KEY `id_kamar_fk` (`ID_KAMAR`),
  ADD KEY `id_kota2_fk` (`ID_KOTA`),
  ADD KEY `id_data_diri_fk` (`ID_DATA_DIRI`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ID_ROLE`);

--
-- Indexes for table `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`ID_SEASON`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`ID_TARIF`);

--
-- Indexes for table `tarif_season`
--
ALTER TABLE `tarif_season`
  ADD PRIMARY KEY (`ID_TARIF_SEASON`),
  ADD KEY `id_season_fk` (`ID_SEASON`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`ID_USER`),
  ADD KEY `id_kota_fk` (`ID_KOTA`),
  ADD KEY `id_role_fk` (`ID_ROLE`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`NO_INVOICE`),
  ADD KEY `id_booking_fk` (`ID_BOOKING`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkin_checkout`
--
ALTER TABLE `checkin_checkout`
  MODIFY `ID_RESERVASI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `data_diri`
--
ALTER TABLE `data_diri`
  MODIFY `ID_DATA_DIRI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `detil_kamar`
--
ALTER TABLE `detil_kamar`
  MODIFY `ID_DETIL_KAMAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detil_reservasi`
--
ALTER TABLE `detil_reservasi`
  MODIFY `ID_DETIL_RESERVASI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `detil_tarif`
--
ALTER TABLE `detil_tarif`
  MODIFY `ID_DETIL_TARIF` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `detil_transaksi_pembayaran`
--
ALTER TABLE `detil_transaksi_pembayaran`
  MODIFY `ID_DETIL_TRANSAKSI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `ID_ITEM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `ID_KOTA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `ID_ROLE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `season`
--
ALTER TABLE `season`
  MODIFY `ID_SEASON` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `ID_TARIF` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tarif_season`
--
ALTER TABLE `tarif_season`
  MODIFY `ID_TARIF_SEASON` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checkin_checkout`
--
ALTER TABLE `checkin_checkout`
  ADD CONSTRAINT `id_booking2_fk` FOREIGN KEY (`ID_BOOKING`) REFERENCES `reservasi` (`ID_BOOKING`);

--
-- Constraints for table `data_diri`
--
ALTER TABLE `data_diri`
  ADD CONSTRAINT `id_user_fk` FOREIGN KEY (`ID_USER`) REFERENCES `tbl_user` (`ID_USER`);

--
-- Constraints for table `detil_reservasi`
--
ALTER TABLE `detil_reservasi`
  ADD CONSTRAINT `id_booking3_fk` FOREIGN KEY (`ID_BOOKING`) REFERENCES `reservasi` (`ID_BOOKING`);

--
-- Constraints for table `detil_tarif`
--
ALTER TABLE `detil_tarif`
  ADD CONSTRAINT `id_item_fk` FOREIGN KEY (`ID_ITEM`) REFERENCES `item` (`ID_ITEM`),
  ADD CONSTRAINT `id_tarif_fk` FOREIGN KEY (`ID_TARIF`) REFERENCES `tarif` (`ID_TARIF`);

--
-- Constraints for table `detil_transaksi_pembayaran`
--
ALTER TABLE `detil_transaksi_pembayaran`
  ADD CONSTRAINT `no_invoice_fk` FOREIGN KEY (`NO_INVOICE`) REFERENCES `transaksi` (`NO_INVOICE`);

--
-- Constraints for table `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `id_detil_kamar_fk` FOREIGN KEY (`ID_DETIL_KAMAR`) REFERENCES `detil_kamar` (`ID_DETIL_KAMAR`),
  ADD CONSTRAINT `id_tarif_season_fk` FOREIGN KEY (`ID_TARIF_SEASON`) REFERENCES `tarif_season` (`ID_TARIF_SEASON`);

--
-- Constraints for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `id_data_diri_fk` FOREIGN KEY (`ID_DATA_DIRI`) REFERENCES `data_diri` (`ID_DATA_DIRI`),
  ADD CONSTRAINT `id_kamar_fk` FOREIGN KEY (`ID_KAMAR`) REFERENCES `kamar` (`ID_KAMAR`),
  ADD CONSTRAINT `id_kota2_fk` FOREIGN KEY (`ID_KOTA`) REFERENCES `kota` (`ID_KOTA`);

--
-- Constraints for table `tarif_season`
--
ALTER TABLE `tarif_season`
  ADD CONSTRAINT `id_season_fk` FOREIGN KEY (`ID_SEASON`) REFERENCES `season` (`ID_SEASON`);

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `id_kota_fk` FOREIGN KEY (`ID_KOTA`) REFERENCES `kota` (`ID_KOTA`),
  ADD CONSTRAINT `id_role_fk` FOREIGN KEY (`ID_ROLE`) REFERENCES `role` (`ID_ROLE`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `id_booking_fk` FOREIGN KEY (`ID_BOOKING`) REFERENCES `reservasi` (`ID_BOOKING`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
