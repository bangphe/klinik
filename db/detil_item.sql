-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2016 at 06:20 AM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `klinik_db_kosong`
--

-- --------------------------------------------------------

--
-- Table structure for table `detil_item`
--

CREATE TABLE IF NOT EXISTS `detil_item` (
`ID_DETIL_ITEM` int(11) NOT NULL,
  `ID_ITEM` int(11) DEFAULT NULL,
  `ID_SUPPLIER` int(11) DEFAULT NULL,
  `STOK` int(11) DEFAULT NULL,
  `HARGA_BELI` int(11) DEFAULT NULL,
  `TANGGAL_INPUT` datetime DEFAULT NULL,
  `TANGGAL_JATUH_TEMPO` date DEFAULT NULL,
  `TANGGAL_PEMBAYARAN` date DEFAULT NULL,
  `STATUS_PEMBAYARAN` int(2) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detil_item`
--
ALTER TABLE `detil_item`
 ADD PRIMARY KEY (`ID_DETIL_ITEM`), ADD KEY `ID_ITEM` (`ID_ITEM`), ADD KEY `ID_SUPPLIER` (`ID_SUPPLIER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detil_item`
--
ALTER TABLE `detil_item`
MODIFY `ID_DETIL_ITEM` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detil_item`
--
ALTER TABLE `detil_item`
ADD CONSTRAINT `detil_item_ibfk_1` FOREIGN KEY (`ID_ITEM`) REFERENCES `item` (`ID_ITEM`) ON UPDATE CASCADE,
ADD CONSTRAINT `detil_item_ibfk_2` FOREIGN KEY (`ID_SUPPLIER`) REFERENCES `supplier` (`ID_SUPPLIER`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
