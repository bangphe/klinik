/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50539
Source Host           : localhost:3306
Source Database       : klinik_db

Target Server Type    : MYSQL
Target Server Version : 50539
File Encoding         : 65001

Date: 2016-01-26 01:04:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `detil_item`
-- ----------------------------
DROP TABLE IF EXISTS `detil_item`;
CREATE TABLE `detil_item` (
  `ID_DETIL_ITEM` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ITEM` int(11) DEFAULT NULL,
  `ID_SUPPLIER` int(11) DEFAULT NULL,
  `STOK` int(11) DEFAULT NULL,
  `HARGA_BELI` int(11) DEFAULT NULL,
  `TANGGAL_INPUT` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_DETIL_ITEM`),
  KEY `ID_ITEM` (`ID_ITEM`),
  KEY `ID_SUPPLIER` (`ID_SUPPLIER`),
  CONSTRAINT `detil_item_ibfk_1` FOREIGN KEY (`ID_ITEM`) REFERENCES `item` (`ID_ITEM`) ON UPDATE CASCADE,
  CONSTRAINT `detil_item_ibfk_2` FOREIGN KEY (`ID_SUPPLIER`) REFERENCES `supplier` (`ID_SUPPLIER`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detil_item
-- ----------------------------

-- ----------------------------
-- Table structure for `item`
-- ----------------------------
DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `ID_ITEM` int(11) NOT NULL AUTO_INCREMENT,
  `ID_KATEGORI` int(11) NOT NULL,
  `NAMA_ITEM` varchar(255) NOT NULL,
  `UKURAN` int(11) DEFAULT NULL,
  `SATUAN` int(11) DEFAULT NULL,
  `HARGA_JUAL` int(11) DEFAULT NULL,
  `TANGGAL_EXPIRED` date DEFAULT NULL,
  `STATUS` int(1) DEFAULT '1',
  PRIMARY KEY (`ID_ITEM`),
  KEY `ID_KATEGORI` (`ID_KATEGORI`),
  CONSTRAINT `item_ibfk_1` FOREIGN KEY (`ID_KATEGORI`) REFERENCES `kategori` (`ID_KATEGORI`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of item
-- ----------------------------
INSERT INTO `item` VALUES ('1', '1', 'Decolgen', null, null, '2500', '2016-01-06', '1');
INSERT INTO `item` VALUES ('2', '2', 'Caterpillar', null, null, '150000', null, '1');
INSERT INTO `item` VALUES ('3', '3', 'Lensa Plastik', null, null, '2000000', null, '1');
INSERT INTO `item` VALUES ('4', '1', 'Biogesic', null, null, '2000', null, '1');
INSERT INTO `item` VALUES ('5', '1', 'Panadol', null, null, '1500', null, '1');
INSERT INTO `item` VALUES ('6', '1', 'Bodrex', null, null, '1000', null, '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of layanan
-- ----------------------------
INSERT INTO `layanan` VALUES ('1', 'Optik');

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
  `RESEP_DOKTER` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pasien
-- ----------------------------
INSERT INTO `pasien` VALUES ('1', '1', 'Joko Susanto', 'Pondok Jati', '', '0', null, null, '2016-01-24 22:30:08');
INSERT INTO `pasien` VALUES ('2', '1', 'Handina', 'Jalan Simo', '085731205312', '2', 'Nyeri di leher', null, null);

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
