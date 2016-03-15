-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 15 Mar 2016 pada 16.19
-- Versi Server: 5.5.47-0ubuntu0.14.04.1
-- Versi PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `klinik_db_060316`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detil_item`
--

CREATE TABLE IF NOT EXISTS `detil_item` (
  `ID_DETIL_ITEM` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ITEM` int(11) DEFAULT NULL,
  `ID_SUPPLIER` int(11) DEFAULT NULL,
  `STOK` int(11) DEFAULT NULL,
  `HARGA_BELI` int(11) DEFAULT NULL,
  `TANGGAL_INPUT` datetime DEFAULT NULL,
  `TANGGAL_JATUH_TEMPO` date DEFAULT NULL,
  `TANGGAL_PEMBAYARAN` date DEFAULT NULL,
  `STATUS_PEMBAYARAN` int(2) DEFAULT '0',
  PRIMARY KEY (`ID_DETIL_ITEM`),
  KEY `ID_ITEM` (`ID_ITEM`),
  KEY `ID_SUPPLIER` (`ID_SUPPLIER`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data untuk tabel `detil_item`
--

INSERT INTO `detil_item` (`ID_DETIL_ITEM`, `ID_ITEM`, `ID_SUPPLIER`, `STOK`, `HARGA_BELI`, `TANGGAL_INPUT`, `TANGGAL_JATUH_TEMPO`, `TANGGAL_PEMBAYARAN`, `STATUS_PEMBAYARAN`) VALUES
(1, 1, 1, 10, 20000, '2016-01-28 17:17:35', NULL, NULL, 0),
(2, 2, 2, 23, 25000, '2016-01-13 17:17:48', NULL, NULL, 0),
(3, 3, 2, 4, 1250, '2016-01-28 17:18:09', NULL, NULL, 0),
(4, 4, 1, 0, 1500, '2016-01-06 17:18:23', NULL, NULL, 0),
(5, 5, 2, 5, 1750, '2016-01-20 17:18:41', NULL, NULL, 0),
(6, 7, 1, 18, 1246, '2016-02-04 09:13:56', NULL, NULL, 0),
(7, 7, 2, 16, 2000, '2016-02-04 11:02:35', NULL, NULL, 0),
(8, 8, 1, 0, 20000, '2016-02-19 17:12:28', NULL, NULL, 0),
(9, 9, 1, 0, 20000, '2016-02-19 23:42:01', NULL, NULL, 0),
(10, 6, 1, 55, 1000, '2016-02-19 23:46:42', NULL, NULL, 0),
(11, 6, 2, 5, 1500, '2016-02-19 23:46:58', NULL, NULL, 0),
(12, 8, 1, 1, 2150, '2016-02-22 15:45:07', NULL, NULL, 0),
(13, 4, 2, 3, 20000, '2016-03-06 13:43:42', NULL, NULL, 1),
(14, 10, 1, 100, 12500, '2016-03-06 14:50:43', NULL, NULL, 0),
(15, 11, NULL, NULL, NULL, '2016-03-07 08:56:14', NULL, NULL, 0),
(16, 1, NULL, 90, 2500, '2016-03-07 11:25:14', NULL, NULL, 0),
(17, 1, 1, 100, 2500, '2016-03-07 11:25:22', NULL, NULL, 0),
(18, 1, 1, 100, 2500, '2016-03-07 11:25:36', NULL, NULL, 1),
(19, 12, NULL, 99, NULL, '2016-03-11 15:17:26', NULL, NULL, 0),
(20, 13, NULL, 100, NULL, '2016-03-11 15:35:52', NULL, NULL, 0),
(21, 14, 2, 85, NULL, '2016-03-11 15:46:47', NULL, NULL, 0),
(22, 15, 2, 1000, NULL, '2016-03-11 15:48:00', NULL, NULL, 0),
(23, 16, 1, 1998, NULL, '2016-03-11 16:02:57', NULL, NULL, 0),
(24, 10, 1, 200, 1000, '2016-03-15 08:37:11', NULL, NULL, 1),
(25, 4, 3, 3000, 1000, '2016-03-15 09:52:58', NULL, NULL, 1),
(26, 17, 3, 999, NULL, '2016-03-15 11:07:39', NULL, NULL, 0),
(27, 17, 3, 250, NULL, '2016-03-15 11:09:28', NULL, NULL, 0),
(28, 18, 3, 2000, NULL, '2016-03-15 11:27:56', NULL, NULL, 0),
(29, 19, 3, 100, 1250, '2016-03-15 12:56:44', '2016-04-15', NULL, 0),
(30, 20, 3, 200, 2500, '2016-03-15 12:57:53', '2016-04-20', '2016-03-15', 0),
(31, 21, 3, 100, 1100, '2016-03-15 12:59:57', '2016-04-10', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `golongan_obat`
--

CREATE TABLE IF NOT EXISTS `golongan_obat` (
  `ID_GOLONGAN_OBAT` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_GOLONGAN` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_GOLONGAN_OBAT`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data untuk tabel `golongan_obat`
--

INSERT INTO `golongan_obat` (`ID_GOLONGAN_OBAT`, `NAMA_GOLONGAN`) VALUES
(1, 'Analgesik'),
(2, 'Anastetik'),
(3, 'Antialergi dan Obat untuk Anafilaksis'),
(4, 'Antidot dan Obat lain untuk Keracunan'),
(5, 'Antiepilepsi – Antikonvulsi'),
(6, 'Anti Infeksi'),
(7, 'Antimigrain'),
(8, 'Antineoplastik'),
(9, 'Antiparkinson'),
(10, 'Obat yang mempengaruhi darah'),
(11, 'Diagnostik'),
(12, 'Disinfektan & Antiseptik'),
(13, 'Gigi & Mulut'),
(14, 'Diuretik'),
(15, 'Hormon, Obat endokrin lain dan Kontraseptik'),
(16, 'Kardiovaskuler'),
(17, 'Kulit'),
(18, 'Larutan Dialisis Peritoneal'),
(19, 'Larutan Elektrolit'),
(20, 'Obat Mata'),
(21, 'Oksitoksik dan Relaksan Uterus'),
(22, 'Psikofarmaka'),
(23, 'Relaksan Otot Perifer dan Penghambat Kolinesterase'),
(24, 'Saluran Cerna'),
(25, 'Saluran Napas'),
(26, 'Obat yang mempengaruhi sistim imun'),
(27, 'Telinga, Hidung dan Tenggorokan'),
(28, 'Vitamin dan Mineral'),
(30, 'Zabc');

-- --------------------------------------------------------

--
-- Struktur dari tabel `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `ID_ITEM` int(11) NOT NULL AUTO_INCREMENT,
  `ID_KATEGORI` int(11) NOT NULL,
  `ID_GOLONGAN_OBAT` int(11) DEFAULT NULL,
  `NAMA_ITEM` varchar(255) NOT NULL,
  `UKURAN` varchar(255) DEFAULT NULL,
  `SATUAN` varchar(50) DEFAULT NULL,
  `HARGA_JUAL` int(11) DEFAULT NULL,
  `TANGGAL_EXPIRED` date DEFAULT NULL,
  `STATUS` int(1) DEFAULT '1',
  PRIMARY KEY (`ID_ITEM`),
  KEY `ID_KATEGORI` (`ID_KATEGORI`),
  KEY `ID_GOLONGAN_OBAT` (`ID_GOLONGAN_OBAT`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data untuk tabel `item`
--

INSERT INTO `item` (`ID_ITEM`, `ID_KATEGORI`, `ID_GOLONGAN_OBAT`, `NAMA_ITEM`, `UKURAN`, `SATUAN`, `HARGA_JUAL`, `TANGGAL_EXPIRED`, `STATUS`) VALUES
(1, 1, 1, 'Decolgen', NULL, NULL, 2500, '2016-03-05', 1),
(2, 2, NULL, 'Caterpillar', NULL, NULL, 150000, NULL, 1),
(3, 3, NULL, 'Lensa Plastik', NULL, NULL, 2000000, NULL, 1),
(4, 1, 3, 'Biogesic', NULL, NULL, 2000, '2016-02-18', 1),
(5, 1, 7, 'Panadol', NULL, NULL, 1500, '2016-04-01', 2),
(6, 1, 3, 'Bodrex', NULL, NULL, 1000, '2016-02-18', 1),
(7, 1, 12, 'Panadols', NULL, NULL, 2750, '2016-06-09', 1),
(8, 1, 11, 'Pepsodent', NULL, NULL, 25000, '2016-03-18', 1),
(9, 1, 19, 'acu', NULL, NULL, 2500, '2016-02-29', 2),
(10, 1, 17, 'Obat Ucen', '0', 'Tablet', 12500, '2016-06-10', 1),
(11, 4, NULL, 'Konsultasi Mata', '', '', NULL, '0000-00-00', 2),
(12, 4, NULL, 'Terapi Energi', '', '', 100000, '0000-00-00', 1),
(13, 4, NULL, 'Tarif Terbaru', '', '', 100000, '0000-00-00', 1),
(14, 4, NULL, 'Makan Malam', '', '', 100000, '0000-00-00', 1),
(15, 4, NULL, 'Diagnosa', '', '', 75000, '0000-00-00', 1),
(16, 4, NULL, 'Foto Fundus', '', '', 250000, '0000-00-00', 1),
(17, 5, NULL, 'Kode S', '', '', 100000, '0000-00-00', 1),
(18, 8, NULL, 'Foto Fundus Terapi', '', '', 150000, '0000-00-00', 1),
(19, 1, 17, 'Obat Umar', '', 'Kapsul', 1250, '2016-12-23', 1),
(20, 1, 2, 'Obat Fira', '', 'Tablet', 2500, '2016-10-19', 1),
(21, 1, 13, 'Tolak Angin', '', 'Tablet', 1100, '2016-03-30', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `ID_KATEGORI` int(11) NOT NULL AUTO_INCREMENT,
  `KATEGORI` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_KATEGORI`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`ID_KATEGORI`, `KATEGORI`) VALUES
(1, 'Obat'),
(2, 'Gagang'),
(3, 'Lensa'),
(4, 'List Tarif'),
(5, 'Jasa Dokter'),
(6, 'Kerato'),
(7, 'Lab'),
(8, 'Foto Fundus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE IF NOT EXISTS `layanan` (
  `ID_LAYANAN` int(11) NOT NULL AUTO_INCREMENT,
  `LAYANAN` varchar(100) NOT NULL,
  `BIAYA` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_LAYANAN`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`ID_LAYANAN`, `LAYANAN`, `BIAYA`) VALUES
(1, 'Pendaftaran', 5000),
(4, 'Resep Bebas', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE IF NOT EXISTS `obat` (
  `ID_OBAT` int(11) NOT NULL AUTO_INCREMENT,
  `ID_GOLONGAN_OBAT` int(11) NOT NULL,
  `NAMA_OBAT` varchar(200) NOT NULL,
  `TANGGAL_EXPIRED` date DEFAULT NULL,
  `HARGA_BELI` int(11) DEFAULT NULL,
  `HARGA_JUAL` int(11) DEFAULT NULL,
  `JUMLAH` int(11) DEFAULT NULL,
  `STATUS` int(2) DEFAULT '1',
  PRIMARY KEY (`ID_OBAT`),
  KEY `ID_GOLONGAN_OBAT` (`ID_GOLONGAN_OBAT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `KODE_ORDER` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `ID_PASIEN` int(11) NOT NULL,
  `ID_LAYANAN` int(11) NOT NULL,
  `BIAYA_REGISTRASI` int(11) DEFAULT NULL,
  `RESEP` int(1) DEFAULT NULL,
  `TANGGAL_ORDER` datetime DEFAULT NULL,
  `USER_PEMBUAT` varchar(50) DEFAULT NULL,
  `PEMBAYARAN` int(11) DEFAULT NULL,
  `KEMBALIAN` int(11) DEFAULT NULL,
  PRIMARY KEY (`KODE_ORDER`),
  KEY `ID_PASIEN` (`ID_PASIEN`),
  KEY `ID_LAYANAN` (`ID_LAYANAN`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=117 ;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`KODE_ORDER`, `ID_PASIEN`, `ID_LAYANAN`, `BIAYA_REGISTRASI`, `RESEP`, `TANGGAL_ORDER`, `USER_PEMBUAT`, `PEMBAYARAN`, `KEMBALIAN`) VALUES
(000001, 1, 1, NULL, NULL, '2016-01-27 00:00:00', NULL, NULL, NULL),
(000006, 1, 1, NULL, NULL, '2016-01-27 00:00:00', NULL, 24000, 10500),
(000007, 2, 1, NULL, NULL, '2016-01-27 00:00:00', NULL, 4500000, 189000),
(000008, 2, 1, NULL, NULL, '2016-01-27 00:00:00', NULL, NULL, NULL),
(000009, 1, 1, NULL, 1, '2016-01-28 00:00:00', NULL, 550000, 134375),
(000010, 1, 1, NULL, NULL, '2016-01-28 00:00:00', NULL, NULL, NULL),
(000011, 1, 1, NULL, 2, '2016-01-28 00:00:00', NULL, NULL, NULL),
(000012, 2, 1, NULL, 1, '2016-01-28 00:00:00', NULL, NULL, NULL),
(000013, 1, 1, NULL, 2, '2016-01-28 00:00:00', NULL, NULL, NULL),
(000014, 2, 1, NULL, NULL, '2016-02-02 00:00:00', NULL, NULL, NULL),
(000015, 1, 1, NULL, 2, '2016-02-02 00:00:00', NULL, NULL, NULL),
(000016, 2, 1, NULL, 1, '2016-02-02 00:00:00', NULL, NULL, NULL),
(000017, 2, 1, NULL, 1, '2016-02-02 00:00:00', 'Kasir', 22552141, 20398151),
(000018, 2, 1, NULL, 2, '2016-02-02 00:00:00', 'Kasir', 4500000, 490400),
(000024, 12, 1, NULL, 1, '2016-02-14 18:18:29', 'Kasir', NULL, NULL),
(000025, 11, 1, NULL, 1, '2016-02-14 18:28:12', 'Kasir', NULL, NULL),
(000026, 12, 1, NULL, 1, '2016-02-14 21:04:42', 'Kasir', NULL, NULL),
(000027, 5, 1, NULL, 1, '2016-02-14 21:23:19', 'Kasir', NULL, NULL),
(000028, 3, 1, NULL, 1, '2016-02-14 21:23:56', 'Kasir', NULL, NULL),
(000029, 11, 1, NULL, 1, '2016-02-14 21:25:33', 'Kasir', NULL, NULL),
(000030, 11, 1, NULL, 1, '2016-02-14 21:26:33', 'Kasir', NULL, NULL),
(000031, 11, 1, NULL, 1, '2016-02-14 21:27:07', 'Kasir', NULL, NULL),
(000032, 10, 1, NULL, 1, '2016-02-14 21:27:41', 'Kasir', NULL, NULL),
(000033, 6, 1, NULL, 1, '2016-02-14 21:28:40', 'Kasir', NULL, NULL),
(000034, 1, 1, NULL, 1, '2016-02-14 21:30:24', 'Kasir', NULL, NULL),
(000035, 1, 1, NULL, 1, '2016-02-14 21:31:14', 'Kasir', NULL, NULL),
(000036, 1, 1, NULL, 1, '2016-02-14 21:31:27', 'Kasir', NULL, NULL),
(000037, 5, 1, NULL, 1, '2016-02-14 21:32:59', 'Kasir', NULL, NULL),
(000038, 5, 1, NULL, 1, '2016-02-14 21:33:17', 'Kasir', NULL, NULL),
(000039, 5, 1, NULL, 1, '2016-02-14 21:33:39', 'Kasir', NULL, NULL),
(000040, 5, 1, NULL, 1, '2016-02-14 21:34:10', 'Kasir', NULL, NULL),
(000041, 12, 1, NULL, 1, '2016-02-14 22:43:27', 'Kasir', NULL, NULL),
(000042, 11, 1, NULL, 1, '2016-02-14 23:07:12', 'Kasir', NULL, NULL),
(000043, 2, 1, NULL, 1, '2016-02-16 10:20:19', 'Kasir', NULL, NULL),
(000044, 3, 1, NULL, 1, '2016-02-16 10:21:25', 'Kasir', NULL, NULL),
(000045, 3, 1, NULL, 1, '2016-02-16 10:21:59', 'Kasir', NULL, NULL),
(000046, 11, 1, NULL, 1, '2016-02-16 10:44:31', 'Kasir', NULL, NULL),
(000047, 3, 1, NULL, 1, '2016-02-16 10:53:55', 'Kasir', NULL, NULL),
(000048, 12, 1, NULL, 1, '2016-02-16 10:54:52', 'Kasir', NULL, NULL),
(000049, 5, 1, NULL, 1, '2016-02-16 10:56:04', 'Kasir', NULL, NULL),
(000050, 5, 1, NULL, 1, '2016-02-16 10:58:06', 'Kasir', NULL, NULL),
(000051, 11, 1, NULL, 1, '2016-02-16 10:58:46', 'Kasir', NULL, NULL),
(000052, 11, 1, NULL, 1, '2016-02-16 10:59:16', 'Kasir', NULL, NULL),
(000053, 11, 1, NULL, 1, '2016-02-16 10:59:48', 'Kasir', NULL, NULL),
(000054, 12, 1, NULL, 1, '2016-02-16 11:06:13', 'Kasir', NULL, NULL),
(000055, 12, 1, NULL, 1, '2016-02-16 11:07:42', 'Kasir', NULL, NULL),
(000056, 3, 1, 5000, 1, '2016-02-16 11:08:01', 'Kasir', NULL, NULL),
(000057, 3, 1, 5000, 1, '2016-02-16 11:08:55', 'Kasir', NULL, NULL),
(000058, 5, 1, 5000, 1, '2016-02-16 11:12:16', 'Kasir', NULL, NULL),
(000059, 3, 1, NULL, 1, '2016-02-16 11:47:52', 'Kasir', NULL, NULL),
(000060, 3, 1, NULL, 1, '2016-02-16 11:50:41', 'Kasir', NULL, NULL),
(000061, 11, 1, NULL, 1, '2016-02-16 11:51:00', 'Kasir', NULL, NULL),
(000062, 5, 1, NULL, 1, '2016-02-16 11:53:13', 'Kasir', NULL, NULL),
(000063, 3, 1, NULL, 1, '2016-02-16 14:44:40', 'Kasir', NULL, NULL),
(000064, 3, 1, NULL, 1, '2016-02-16 14:45:38', 'Kasir', NULL, NULL),
(000065, 2, 1, NULL, 1, '2016-02-16 17:43:14', 'Kasir', NULL, NULL),
(000066, 12, 1, NULL, 1, '2016-02-16 17:44:56', 'Kasir', NULL, NULL),
(000067, 11, 1, NULL, 1, '2016-02-16 17:46:29', 'Kasir', NULL, NULL),
(000068, 2, 1, NULL, 1, '2016-02-17 22:24:44', 'Kasir', NULL, NULL),
(000069, 6, 1, NULL, 1, '2016-02-17 22:27:22', 'Kasir', NULL, NULL),
(000070, 3, 1, NULL, 1, '2016-02-18 09:16:37', 'Kasir', NULL, NULL),
(000071, 11, 1, NULL, 2, '2016-02-18 09:19:30', 'Kasir', 25000, 1400),
(000072, 5, 1, NULL, 1, '2016-02-19 09:21:11', 'Kasir', NULL, NULL),
(000073, 3, 1, NULL, 1, '2016-02-19 14:58:35', 'Kasir', NULL, NULL),
(000074, 12, 1, NULL, 2, '2016-02-19 14:59:33', 'Kasir', NULL, NULL),
(000075, 5, 1, NULL, 1, '2016-02-19 15:09:52', 'Kasir', NULL, NULL),
(000076, 12, 1, NULL, 1, '2016-02-19 15:21:10', 'Kasir', NULL, NULL),
(000077, 2, 1, NULL, 2, '2016-02-19 16:20:44', 'Kasir', NULL, NULL),
(000078, 3, 1, 5000, 2, '2016-02-19 16:39:50', 'Kasir', NULL, NULL),
(000079, 12, 1, 5000, 1, '2016-02-19 16:41:15', 'Kasir', NULL, NULL),
(000080, 5, 1, 5000, 2, '2016-02-19 16:46:04', 'Kasir', NULL, NULL),
(000081, 5, 1, 5000, 1, '2016-02-19 16:53:06', 'Kasir', NULL, NULL),
(000082, 5, 1, 5000, 1, '2016-02-19 16:53:15', 'Kasir', NULL, NULL),
(000083, 4, 1, 5000, 2, '2016-02-19 16:55:02', 'Kasir', NULL, NULL),
(000084, 14, 1, 5000, 2, '2016-02-27 10:51:27', 'Kasir', 16000, 900),
(000085, 13, 1, 5000, 1, '2016-02-28 10:38:36', 'Kasir', NULL, NULL),
(000086, 14, 1, 250000, 1, '2016-02-28 10:39:18', 'Kasir', NULL, NULL),
(000087, 16, 1, 50000, 1, '2016-02-28 10:40:17', 'Kasir', NULL, NULL),
(000088, 15, 1, NULL, 1, '2016-02-28 10:41:13', 'Kasir', NULL, NULL),
(000089, 14, 1, 5000, 2, '2016-02-28 10:43:53', 'Kasir', NULL, NULL),
(000090, 13, 1, 5000, 1, '2016-03-04 10:05:07', 'Kasir', NULL, NULL),
(000091, 16, 1, 5000, 2, '2016-03-06 14:47:48', 'Kasir', NULL, NULL),
(000092, 17, 1, 5000, 2, '2016-03-06 15:55:38', 'Kasir', NULL, NULL),
(000093, 17, 1, 5000, 1, '2016-03-06 16:00:20', 'Kasir', NULL, NULL),
(000094, 17, 1, 5000, 2, '2016-03-06 16:00:55', 'Kasir', NULL, NULL),
(000095, 17, 1, 5000, 2, '2016-03-06 16:04:56', 'Kasir', NULL, NULL),
(000096, 17, 1, 5000, 2, '2016-03-06 16:06:15', 'Kasir', NULL, NULL),
(000097, 17, 1, 5000, 1, '2016-03-06 16:07:41', 'Kasir', NULL, NULL),
(000098, 17, 1, 5000, 2, '2016-03-06 16:09:46', 'Kasir', NULL, NULL),
(000099, 17, 1, 5000, 2, '2016-03-06 16:16:57', 'Kasir', NULL, NULL),
(000100, 17, 1, 5000, 2, '2016-03-06 16:18:23', 'Kasir', NULL, NULL),
(000101, 17, 1, 5000, 2, '2016-03-06 16:33:33', 'Kasir', NULL, NULL),
(000102, 17, 1, 5000, 2, '2016-03-06 16:38:19', 'Kasir', NULL, NULL),
(000103, 17, 1, 5000, 2, '2016-03-06 17:16:50', 'Kasir', 12000, 800),
(000104, 17, 1, 5000, 2, '2016-03-06 17:48:45', 'Kasir', 14000, 300),
(000105, 17, 1, 5000, 2, '2016-03-06 17:50:30', 'Kasir', 25000, 1600),
(000106, 17, 1, 5000, 2, '2016-03-07 08:36:55', 'Kasir', NULL, NULL),
(000107, 17, 4, NULL, 1, '2016-03-07 09:08:06', 'Kasir', NULL, NULL),
(000108, 18, 4, NULL, 2, '2016-03-11 15:43:35', 'Kasir', NULL, NULL),
(000109, 18, 4, NULL, 1, '2016-03-11 16:00:10', 'Kasir', NULL, NULL),
(000110, 18, 1, 5000, 2, '2016-03-11 16:01:43', 'Kasir', NULL, NULL),
(000111, 18, 1, 5000, 2, '2016-03-11 16:13:41', 'Kasir', NULL, NULL),
(000112, 17, 1, 5000, 2, '2016-03-11 20:38:42', 'Kasir', 5000000, 468800),
(000113, 18, 1, 5000, 1, '2016-03-12 10:19:02', 'Kasir', NULL, NULL),
(000114, 17, 1, 5000, 2, '2016-03-15 07:01:05', 'Kasir', NULL, NULL),
(000115, 18, 4, NULL, 2, '2016-03-15 08:13:17', 'Kasir', 22000, 980),
(000116, 18, 1, 5000, 2, '2016-03-15 11:10:23', 'Kasir', 120000, 500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `KODE_ORDER_DETAIL` int(11) NOT NULL AUTO_INCREMENT,
  `KODE_ORDER` int(11) unsigned zerofill NOT NULL,
  `ID_ITEM` int(11) DEFAULT NULL,
  `HARGA` int(11) DEFAULT NULL,
  `JUMLAH` int(11) DEFAULT NULL,
  `DISKON` int(11) DEFAULT NULL,
  `RESEP` int(2) DEFAULT NULL,
  PRIMARY KEY (`KODE_ORDER_DETAIL`),
  KEY `ID_ITEM` (`ID_ITEM`),
  KEY `KODE_ORDER` (`KODE_ORDER`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;

--
-- Dumping data untuk tabel `order_detail`
--

INSERT INTO `order_detail` (`KODE_ORDER_DETAIL`, `KODE_ORDER`, `ID_ITEM`, `HARGA`, `JUMLAH`, `DISKON`, `RESEP`) VALUES
(1, 00000000006, 1, 2500, 3, NULL, NULL),
(2, 00000000006, 4, 2000, 3, NULL, NULL),
(3, 00000000007, 1, 2500, 2, NULL, NULL),
(4, 00000000007, 4, 2000, 3, NULL, NULL),
(5, 00000000007, 2, 150000, 2, NULL, NULL),
(6, 00000000007, 3, 2000000, 2, NULL, NULL),
(7, 00000000008, 1, 2500, 2, NULL, NULL),
(8, 00000000008, 4, 2000, 5, NULL, NULL),
(9, 00000000008, 5, 1500, 100, NULL, NULL),
(10, 00000000009, 1, 3325, 2, NULL, NULL),
(11, 00000000009, 4, 2660, 3, NULL, NULL),
(12, 00000000009, 5, 1995, 1, NULL, NULL),
(13, 00000000009, 2, 199500, 2, NULL, NULL),
(14, 00000000010, 1, 3700, 2, NULL, NULL),
(15, 00000000010, 4, 3200, 2, NULL, NULL),
(16, 00000000010, 5, 2700, 2, NULL, NULL),
(17, 00000000010, 2, 151200, 3, NULL, NULL),
(18, 00000000011, 1, 3700, 1, NULL, NULL),
(19, 00000000011, 4, 3200, 1, NULL, NULL),
(20, 00000000011, 5, 2700, 1, NULL, NULL),
(21, 00000000012, 4, 2660, 2, NULL, NULL),
(22, 00000000012, 5, 1995, 1, NULL, NULL),
(23, 00000000012, 2, 199500, 3, NULL, NULL),
(24, 00000000013, 5, 2700, 2, NULL, NULL),
(25, 00000000013, 2, 151200, 1, NULL, NULL),
(26, 00000000013, 3, 2001200, 1, NULL, NULL),
(27, 00000000014, 1, 2500, 1, NULL, NULL),
(28, 00000000014, 4, 2000, 1, NULL, NULL),
(29, 00000000014, 2, 150000, 2, NULL, NULL),
(30, 00000000015, 5, 2700, 2, NULL, NULL),
(31, 00000000015, 3, 2001200, 1, NULL, NULL),
(32, 00000000016, 1, 3325, 1, NULL, NULL),
(33, 00000000016, 5, 1995, 1, NULL, NULL),
(34, 00000000016, 2, 150000, 1, NULL, NULL),
(35, 00000000017, 5, 1995, 2, NULL, NULL),
(36, 00000000017, 2, 150000, 1, NULL, NULL),
(37, 00000000017, 3, 2000000, 1, NULL, NULL),
(38, 00000000018, 1, 3700, 1, NULL, NULL),
(39, 00000000018, 4, 3200, 1, NULL, NULL),
(40, 00000000018, 5, 2700, 1, NULL, NULL),
(41, 00000000018, 3, 2000000, 2, NULL, NULL),
(42, 00000000040, 5, 1995, 3, NULL, NULL),
(43, 00000000071, 1, 3700, 2, NULL, NULL),
(44, 00000000071, 4, 3200, 3, NULL, NULL),
(45, 00000000071, 6, 2200, 3, NULL, NULL),
(46, 00000000073, 1, 3325, 3, NULL, NULL),
(47, 00000000073, 5, 1995, 2, NULL, NULL),
(48, 00000000074, 1, 3700, 1, NULL, NULL),
(49, 00000000074, 4, 3200, 2, NULL, NULL),
(50, 00000000074, 5, 2700, 3, NULL, NULL),
(51, 00000000079, 1, 3325, 2, 0, NULL),
(52, 00000000079, 2, 150000, 3, NULL, NULL),
(53, 00000000082, 2, 150000, 1, NULL, NULL),
(54, 00000000082, 5, 1995, 2, NULL, NULL),
(55, 00000000083, 1, 3700, 1, NULL, NULL),
(56, 00000000083, 5, 2700, 2, NULL, NULL),
(57, 00000000083, 3, 2000000, 2, NULL, NULL),
(58, 00000000084, 5, 2700, 1, NULL, NULL),
(59, 00000000084, 1, 3700, 2, NULL, NULL),
(60, 00000000087, 1, 3325, 4, NULL, NULL),
(61, 00000000088, 1, 3325, 2, NULL, NULL),
(62, 00000000089, 1, 3700, 2, NULL, NULL),
(63, 00000000089, 5, 2700, 3, NULL, NULL),
(64, 00000000091, 5, 2700, 2, NULL, NULL),
(65, 00000000092, 4, 3200, 2, NULL, NULL),
(66, 00000000093, 4, 2660, 3, NULL, NULL),
(67, 00000000094, 4, 3200, 3, NULL, NULL),
(68, 00000000095, 4, 2000, 3, NULL, NULL),
(69, 00000000096, 4, 1200, 3, NULL, NULL),
(70, 00000000097, 4, 1200, 3, NULL, NULL),
(71, 00000000098, 4, 2000, 3, NULL, NULL),
(72, 00000000099, 4, 1200, 3, NULL, NULL),
(73, 00000000099, 5, 1200, 2, NULL, NULL),
(74, 00000000100, 4, 2000, 3, NULL, NULL),
(75, 00000000100, 1, 2500, 2, NULL, NULL),
(76, 00000000101, 4, 2000, 3, NULL, NULL),
(77, 00000000102, 4, 2000, 5, NULL, NULL),
(78, 00000000103, 6, 1000, 5, NULL, NULL),
(79, 00000000104, 5, 1500, 5, NULL, NULL),
(80, 00000000105, 1, 2500, 4, NULL, NULL),
(81, 00000000105, 4, 2000, 3, NULL, NULL),
(82, 00000000106, 4, 2000, 5, NULL, NULL),
(83, 00000000106, 6, 1000, 5, NULL, NULL),
(84, 00000000107, 4, 2660, 5, NULL, NULL),
(85, 00000000108, 12, 100000, 1, NULL, NULL),
(86, 00000000109, 14, 100000, 3, NULL, NULL),
(87, 00000000110, 14, 100000, 7, NULL, NULL),
(88, 00000000111, 3, 2000000, 2, NULL, NULL),
(89, 00000000111, 14, 100000, 5, NULL, NULL),
(90, 00000000112, 1, 2500, 10, NULL, NULL),
(91, 00000000112, 16, 250000, 2, NULL, NULL),
(92, 00000000112, 3, 2000000, 2, NULL, NULL),
(93, 00000000113, 6, 1330, 5, NULL, NULL),
(94, 00000000114, 4, 2000, 5, NULL, NULL),
(95, 00000000114, 6, 1000, 10, NULL, NULL),
(96, 00000000115, 4, 2660, 2, NULL, NULL),
(97, 00000000115, 6, 1330, 10, NULL, NULL),
(98, 00000000116, 17, 100000, 1, NULL, NULL),
(99, 00000000116, 6, 1330, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE IF NOT EXISTS `pasien` (
  `ID_PASIEN` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_PASIEN` varchar(100) NOT NULL,
  `ALAMAT` varchar(200) NOT NULL,
  `NO_TELP` varchar(15) NOT NULL,
  `JENIS_KELAMIN` varchar(5) NOT NULL,
  `KETERANGAN` varchar(255) DEFAULT NULL,
  `TANGGAL_REGISTRASI` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_PASIEN`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`ID_PASIEN`, `NAMA_PASIEN`, `ALAMAT`, `NO_TELP`, `JENIS_KELAMIN`, `KETERANGAN`, `TANGGAL_REGISTRASI`) VALUES
(1, 'Joko Susanto', 'Pondok Jati', '', 'L', NULL, '2016-01-24 22:30:08'),
(2, 'Handina', 'Jalan Simo', '085731205312', 'P', 'Nyeri di leher', '2016-02-02 22:18:35'),
(3, 'Harvian', 'prikitiww', '0857312053121', 'L', '', '2016-02-01 22:18:39'),
(4, 'Johan Suswanto', 'ssdfsdfsdf', '085731205312', 'P', NULL, '2016-01-31 22:18:42'),
(5, 'Handoko Siswoyo', 'dsfsdfsf', '343434', 'P', NULL, '2016-02-02 12:25:45'),
(6, 'Hindoko', 'sdfsdf', '239232', 'P', 'ddfdsf', '2016-02-01 22:18:46'),
(10, 'sadasd', 'asd', '23232323', '1', '', '2016-02-12 16:41:11'),
(11, 'Handayani', 'sdasdasdasd', '222222', 'P', 'sdsdsdsdsd', '2016-02-12 10:32:40'),
(12, 'Asmoro Haryo', 'Pondok Mutiara', '0818370486', 'P', '', '2016-02-12 13:17:20'),
(13, 'Husein', 'Sepanjang', '08238280823', 'L', 'Tidak ada', '2016-02-21 18:07:02'),
(14, 'Ibuku Tercinta', 'Pondok Mutiaras', '082382808231', 'P', '', '2016-02-21 18:21:08'),
(15, 'asd', 'asdasd', '239239', 'L', '', '2016-02-27 08:59:19'),
(16, 'joko', 'djisjd', '982398239', 'P', '', '2016-02-27 10:15:48'),
(17, 'Bang Umar', 'Jl. Wonocolo Sepanjang', '087752639514', 'L', '', '2016-03-06 15:54:21'),
(18, 'Muhamad Husein', 'Jl. Wonocolo Sepanjang', '087752639514', 'L', 'Keterangan', '2016-03-07 10:01:32'),
(19, 'Safira Fatimah', 'Pemogan Denpasar Bali', '081999595953', 'P', '', '2016-03-15 11:31:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_user`
--

CREATE TABLE IF NOT EXISTS `role_user` (
  `ID_ROLE` int(11) NOT NULL AUTO_INCREMENT,
  `ROLE` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_ROLE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `role_user`
--

INSERT INTO `role_user` (`ID_ROLE`, `ROLE`) VALUES
(1, 'Admin'),
(2, 'Kasir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sms`
--

CREATE TABLE IF NOT EXISTS `sms` (
  `ID_SMS` int(11) NOT NULL AUTO_INCREMENT,
  `DEPOSIT` int(11) NOT NULL,
  `TIPE` int(11) NOT NULL COMMENT '0=reguler;1=masking;3=center',
  `HARGA` int(11) NOT NULL,
  `SISA_KUOTA` int(11) NOT NULL,
  `MASA_BERLAKU` datetime NOT NULL,
  `STATUS` int(11) NOT NULL,
  PRIMARY KEY (`ID_SMS`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `sms`
--

INSERT INTO `sms` (`ID_SMS`, `DEPOSIT`, `TIPE`, `HARGA`, `SISA_KUOTA`, `MASA_BERLAKU`, `STATUS`) VALUES
(1, 100000, 0, 165, 214, '2016-02-29 21:34:42', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sms_log`
--

CREATE TABLE IF NOT EXISTS `sms_log` (
  `ID_SMS_LOG` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USER` varchar(20) NOT NULL,
  `ID_PASIEN` int(11) NOT NULL,
  `PESAN` varchar(161) NOT NULL,
  `TUJUAN` varchar(14) NOT NULL,
  `TANGGAL_KIRIM` datetime NOT NULL,
  `STATUS` int(11) NOT NULL,
  PRIMARY KEY (`ID_SMS_LOG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `ID_SUPPLIER` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_SUPPLIER` varchar(200) NOT NULL,
  `ALAMAT_SUPPLIER` varchar(200) NOT NULL,
  `NO_TELP_SUPPLIER` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_SUPPLIER`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`ID_SUPPLIER`, `NAMA_SUPPLIER`, `ALAMAT_SUPPLIER`, `NO_TELP_SUPPLIER`) VALUES
(1, 'PT. Nusantara', 'Kutisari', '088888888'),
(2, 'PT. Baskara', 'Kutilsari', '08462736726'),
(3, 'Klinik Ar-Rahmah', 'Jl. Jembatan Jerbus', '0828371929');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID_USER` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ROLE` int(11) NOT NULL,
  `NAMA` varchar(100) NOT NULL,
  `ALAMAT` varchar(200) DEFAULT NULL,
  `LOGO` varchar(255) DEFAULT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `TERAKHIR_LOGIN` datetime DEFAULT NULL,
  `STATUS` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID_USER`),
  KEY `ID_ROLE` (`ID_ROLE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`ID_USER`, `ID_ROLE`, `NAMA`, `ALAMAT`, `LOGO`, `USERNAME`, `PASSWORD`, `TERAKHIR_LOGIN`, `STATUS`) VALUES
(1, 1, 'Administrator', NULL, NULL, 'admin', 'asdasd', '2016-03-15 15:49:41', 1),
(2, 2, 'Kasir', NULL, NULL, 'kasir', 'asdasd', '2016-03-15 14:53:49', 1),
(4, 1, 'Admins', NULL, NULL, 'mimin', 'asdasd', '2016-02-03 17:31:07', 1);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detil_item`
--
ALTER TABLE `detil_item`
  ADD CONSTRAINT `detil_item_ibfk_1` FOREIGN KEY (`ID_ITEM`) REFERENCES `item` (`ID_ITEM`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detil_item_ibfk_2` FOREIGN KEY (`ID_SUPPLIER`) REFERENCES `supplier` (`ID_SUPPLIER`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`ID_KATEGORI`) REFERENCES `kategori` (`ID_KATEGORI`) ON UPDATE CASCADE,
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`ID_GOLONGAN_OBAT`) REFERENCES `golongan_obat` (`ID_GOLONGAN_OBAT`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`ID_PASIEN`) REFERENCES `pasien` (`ID_PASIEN`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`ID_LAYANAN`) REFERENCES `layanan` (`ID_LAYANAN`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`ID_ITEM`) REFERENCES `item` (`ID_ITEM`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`KODE_ORDER`) REFERENCES `order` (`KODE_ORDER`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`ID_ROLE`) REFERENCES `role_user` (`ID_ROLE`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
