/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50539
Source Host           : localhost:3306
Source Database       : klinik_db

Target Server Type    : MYSQL
Target Server Version : 50539
File Encoding         : 65001

Date: 2016-01-21 16:33:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `gagang`
-- ----------------------------
DROP TABLE IF EXISTS `gagang`;
CREATE TABLE `gagang` (
  `ID_GAGANG` int(11) NOT NULL AUTO_INCREMENT,
  `ID_SUPPLIER` int(11) NOT NULL,
  `NAMA_GAGANG` varchar(100) NOT NULL,
  `STOK` int(11) NOT NULL,
  `HARGA_JUAL` int(11) DEFAULT NULL,
  `HARGA_BELI` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_GAGANG`),
  KEY `ID_SUPPLIER` (`ID_SUPPLIER`),
  CONSTRAINT `gagang_ibfk_1` FOREIGN KEY (`ID_SUPPLIER`) REFERENCES `supplier` (`ID_SUPPLIER`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of gagang
-- ----------------------------

-- ----------------------------
-- Table structure for `item`
-- ----------------------------
DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `ID_ITEM` int(11) NOT NULL AUTO_INCREMENT,
  `ID_KATEGORI` int(11) NOT NULL,
  `ID_SUPPLIER` int(11) NOT NULL,
  `NAMA_ITEM` varchar(255) NOT NULL,
  `STOK` int(11) NOT NULL,
  `UKURAN` int(11) DEFAULT NULL,
  `SATUAN` int(11) DEFAULT NULL,
  `HARGA_JUAL` int(11) DEFAULT NULL,
  `HARGA_BELI` int(11) DEFAULT NULL,
  `TANGGAL_EXPIRED` date DEFAULT NULL,
  PRIMARY KEY (`ID_ITEM`),
  KEY `ID_KATEGORI` (`ID_KATEGORI`),
  CONSTRAINT `item_ibfk_1` FOREIGN KEY (`ID_KATEGORI`) REFERENCES `kategori` (`ID_KATEGORI`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of item
-- ----------------------------

-- ----------------------------
-- Table structure for `kategori`
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `ID_KATEGORI` int(11) NOT NULL AUTO_INCREMENT,
  `KATEGORI` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_KATEGORI`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES ('1', 'Obat');
INSERT INTO `kategori` VALUES ('2', 'Gagang');
INSERT INTO `kategori` VALUES ('3', 'Lensa');

-- ----------------------------
-- Table structure for `kategori_obat`
-- ----------------------------
DROP TABLE IF EXISTS `kategori_obat`;
CREATE TABLE `kategori_obat` (
  `ID_KATEGORI_OBAT` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_KATEGORI` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_KATEGORI_OBAT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kategori_obat
-- ----------------------------

-- ----------------------------
-- Table structure for `layanan`
-- ----------------------------
DROP TABLE IF EXISTS `layanan`;
CREATE TABLE `layanan` (
  `ID_LAYANAN` int(11) NOT NULL AUTO_INCREMENT,
  `LAYANAN` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_LAYANAN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of layanan
-- ----------------------------

-- ----------------------------
-- Table structure for `lensa`
-- ----------------------------
DROP TABLE IF EXISTS `lensa`;
CREATE TABLE `lensa` (
  `ID_LENSA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_SUPPLIER` int(11) NOT NULL,
  `NAMA_LENSA` varchar(100) NOT NULL,
  `UKURAN` varchar(100) NOT NULL,
  `STOK` int(11) NOT NULL,
  `HARGA_BELI` int(11) DEFAULT NULL,
  `HARGA_JUAL` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_LENSA`),
  KEY `ID_SUPPLIER` (`ID_SUPPLIER`),
  CONSTRAINT `lensa_ibfk_1` FOREIGN KEY (`ID_SUPPLIER`) REFERENCES `supplier` (`ID_SUPPLIER`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of lensa
-- ----------------------------

-- ----------------------------
-- Table structure for `obat`
-- ----------------------------
DROP TABLE IF EXISTS `obat`;
CREATE TABLE `obat` (
  `ID_OBAT` int(11) NOT NULL AUTO_INCREMENT,
  `ID_KATEGORI_OBAT` int(11) NOT NULL,
  `ID_SUPPLIER` int(11) NOT NULL,
  `NAMA_OBAT` varchar(200) NOT NULL,
  `STOK` int(11) NOT NULL,
  `ID_SATUAN` int(11) NOT NULL,
  `HARGA_BELI` int(11) NOT NULL,
  `HARGA_JUAL` int(11) NOT NULL,
  `TANGGAL_EXPIRED` date DEFAULT NULL,
  `STATUS` int(1) DEFAULT '1',
  PRIMARY KEY (`ID_OBAT`),
  KEY `ID_SUPPLIER` (`ID_SUPPLIER`),
  KEY `ID_KATEGORI_OBAT` (`ID_KATEGORI_OBAT`),
  CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`ID_SUPPLIER`) REFERENCES `supplier` (`ID_SUPPLIER`) ON UPDATE CASCADE,
  CONSTRAINT `obat_ibfk_2` FOREIGN KEY (`ID_KATEGORI_OBAT`) REFERENCES `kategori_obat` (`ID_KATEGORI_OBAT`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of obat
-- ----------------------------

-- ----------------------------
-- Table structure for `order`
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `KODE_ORDER` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `ID_PASIEN` int(11) NOT NULL,
  `TANGGAL_ORDER` date DEFAULT NULL,
  `USER_PEMBUAT` int(11) DEFAULT NULL,
  `PEMBAYARAN` int(11) DEFAULT NULL,
  `KEMBALIAN` int(11) DEFAULT NULL,
  PRIMARY KEY (`KODE_ORDER`),
  KEY `ID_PASIEN` (`ID_PASIEN`),
  CONSTRAINT `order_ibfk_1` FOREIGN KEY (`ID_PASIEN`) REFERENCES `pasien` (`ID_PASIEN`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of order
-- ----------------------------

-- ----------------------------
-- Table structure for `order_detail`
-- ----------------------------
DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE `order_detail` (
  `KODE_ORDER_DETAIL` int(11) NOT NULL AUTO_INCREMENT,
  `KODE_ORDER` int(11) unsigned zerofill NOT NULL,
  `ID_ITEM` int(11) DEFAULT NULL,
  `HARGA` int(11) DEFAULT NULL,
  `JUMLAH` int(11) DEFAULT NULL,
  `DISKON` int(11) DEFAULT NULL,
  PRIMARY KEY (`KODE_ORDER_DETAIL`),
  KEY `ID_ITEM` (`ID_ITEM`),
  KEY `KODE_ORDER` (`KODE_ORDER`),
  CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`ID_ITEM`) REFERENCES `item` (`ID_ITEM`) ON UPDATE CASCADE,
  CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`KODE_ORDER`) REFERENCES `order` (`KODE_ORDER`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of order_detail
-- ----------------------------

-- ----------------------------
-- Table structure for `pasien`
-- ----------------------------
DROP TABLE IF EXISTS `pasien`;
CREATE TABLE `pasien` (
  `ID_PASIEN` int(11) NOT NULL AUTO_INCREMENT,
  `ID_LAYANAN` int(11) NOT NULL,
  `NAMA_PASIEN` varchar(100) NOT NULL,
  `ALAMAT` varchar(200) NOT NULL,
  `NO_TELP` varchar(15) NOT NULL,
  `JENIS_KELAMIN` int(1) NOT NULL,
  `KETERANGAN` varchar(255) DEFAULT NULL,
  `BIAYA_REGISTRASI` int(11) DEFAULT NULL,
  `TANGGAL_REGISTRASI` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_PASIEN`),
  KEY `ID_LAYANAN` (`ID_LAYANAN`),
  CONSTRAINT `pasien_ibfk_1` FOREIGN KEY (`ID_LAYANAN`) REFERENCES `layanan` (`ID_LAYANAN`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pasien
-- ----------------------------

-- ----------------------------
-- Table structure for `role_user`
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `ID_ROLE` int(11) NOT NULL AUTO_INCREMENT,
  `ROLE` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_ROLE`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES ('1', 'Admin');
INSERT INTO `role_user` VALUES ('2', 'Kasir');

-- ----------------------------
-- Table structure for `supplier`
-- ----------------------------
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier` (
  `ID_SUPPLIER` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_SUPPLIER` varchar(200) NOT NULL,
  `ALAMAT_SUPPLIER` varchar(200) NOT NULL,
  `NO_TELP_SUPPLIER` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_SUPPLIER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of supplier
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `ID_USER` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ROLE` int(11) NOT NULL,
  `NAMA` varchar(100) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `TERAKHIR_LOGIN` datetime DEFAULT NULL,
  `STATUS` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID_USER`),
  KEY `ID_ROLE` (`ID_ROLE`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`ID_ROLE`) REFERENCES `role_user` (`ID_ROLE`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '1', 'Administrator', 'admin', 'asdasd', '2016-01-20 20:10:19', '1');
INSERT INTO `user` VALUES ('2', '2', 'Kasir', 'kasir', 'asdasd', '2016-01-20 20:46:58', '1');
