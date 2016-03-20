/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50539
Source Host           : localhost:3306
Source Database       : klinik_db

Target Server Type    : MYSQL
Target Server Version : 50539
File Encoding         : 65001

Date: 2016-03-11 22:13:47
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
  `STATUS_PEMBAYARAN` int(2) DEFAULT '0',
  PRIMARY KEY (`ID_DETIL_ITEM`),
  KEY `ID_ITEM` (`ID_ITEM`),
  KEY `ID_SUPPLIER` (`ID_SUPPLIER`),
  CONSTRAINT `detil_item_ibfk_2` FOREIGN KEY (`ID_SUPPLIER`) REFERENCES `supplier` (`ID_SUPPLIER`) ON UPDATE CASCADE,
  CONSTRAINT `detil_item_ibfk_1` FOREIGN KEY (`ID_ITEM`) REFERENCES `item` (`ID_ITEM`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detil_item
-- ----------------------------

-- ----------------------------
-- Table structure for `golongan_obat`
-- ----------------------------
DROP TABLE IF EXISTS `golongan_obat`;
CREATE TABLE `golongan_obat` (
  `ID_GOLONGAN_OBAT` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_GOLONGAN` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_GOLONGAN_OBAT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of golongan_obat
-- ----------------------------

-- ----------------------------
-- Table structure for `item`
-- ----------------------------
DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `ID_ITEM` int(11) NOT NULL AUTO_INCREMENT,
  `ID_KATEGORI` int(11) NOT NULL,
  `ID_GOLONGAN_OBAT` int(11) DEFAULT NULL,
  `NAMA_ITEM` varchar(255) NOT NULL,
  `UKURAN` decimal(10,0) DEFAULT NULL,
  `SATUAN` varchar(50) DEFAULT NULL,
  `HARGA_JUAL` int(11) DEFAULT NULL,
  `TANGGAL_EXPIRED` date DEFAULT NULL,
  `STATUS` int(1) DEFAULT '1',
  PRIMARY KEY (`ID_ITEM`),
  KEY `ID_KATEGORI` (`ID_KATEGORI`),
  KEY `ID_GOLONGAN_OBAT` (`ID_GOLONGAN_OBAT`),
  CONSTRAINT `item_ibfk_2` FOREIGN KEY (`ID_GOLONGAN_OBAT`) REFERENCES `golongan_obat` (`ID_GOLONGAN_OBAT`) ON UPDATE CASCADE,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kategori
-- ----------------------------

-- ----------------------------
-- Table structure for `layanan`
-- ----------------------------
DROP TABLE IF EXISTS `layanan`;
CREATE TABLE `layanan` (
  `ID_LAYANAN` int(11) NOT NULL AUTO_INCREMENT,
  `LAYANAN` varchar(100) NOT NULL,
  `BIAYA` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_LAYANAN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of layanan
-- ----------------------------

-- ----------------------------
-- Table structure for `order`
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
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
  KEY `ID_LAYANAN` (`ID_LAYANAN`),
  CONSTRAINT `order_ibfk_2` FOREIGN KEY (`ID_LAYANAN`) REFERENCES `layanan` (`ID_LAYANAN`) ON UPDATE CASCADE,
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
  `RESEP` int(2) DEFAULT NULL,
  PRIMARY KEY (`KODE_ORDER_DETAIL`),
  KEY `KODE_ORDER` (`KODE_ORDER`),
  KEY `ID_ITEM` (`ID_ITEM`),
  CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`ID_ITEM`) REFERENCES `item` (`ID_ITEM`) ON UPDATE CASCADE,
  CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`KODE_ORDER`) REFERENCES `order` (`KODE_ORDER`) ON UPDATE CASCADE
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
  `NAMA_PASIEN` varchar(100) NOT NULL,
  `ALAMAT` varchar(200) NOT NULL,
  `NO_TELP` varchar(15) NOT NULL,
  `JENIS_KELAMIN` varchar(5) NOT NULL,
  `KETERANGAN` varchar(255) DEFAULT NULL,
  `TANGGAL_REGISTRASI` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_PASIEN`)
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
-- Table structure for `sms`
-- ----------------------------
DROP TABLE IF EXISTS `sms`;
CREATE TABLE `sms` (
  `ID_SMS` int(11) NOT NULL AUTO_INCREMENT,
  `DEPOSIT` int(11) NOT NULL,
  `TIPE` int(11) NOT NULL COMMENT '0=reguler;1=masking;3=center',
  `HARGA` int(11) NOT NULL,
  `SISA_KUOTA` int(11) NOT NULL,
  `MASA_BERLAKU` datetime NOT NULL,
  `STATUS` int(11) NOT NULL,
  PRIMARY KEY (`ID_SMS`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sms
-- ----------------------------
INSERT INTO `sms` VALUES ('1', '100000', '0', '165', '214', '2016-02-29 21:34:42', '0');

-- ----------------------------
-- Table structure for `sms_log`
-- ----------------------------
DROP TABLE IF EXISTS `sms_log`;
CREATE TABLE `sms_log` (
  `ID_SMS_LOG` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USER` varchar(20) NOT NULL,
  `ID_PASIEN` int(11) NOT NULL,
  `PESAN` varchar(161) NOT NULL,
  `TUJUAN` varchar(14) NOT NULL,
  `TANGGAL_KIRIM` datetime NOT NULL,
  `STATUS` int(11) NOT NULL,
  PRIMARY KEY (`ID_SMS_LOG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sms_log
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
  `ALAMAT` varchar(200) DEFAULT NULL,
  `LOGO` varchar(255) DEFAULT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `TERAKHIR_LOGIN` datetime DEFAULT NULL,
  `STATUS` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID_USER`),
  KEY `ID_ROLE` (`ID_ROLE`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`ID_ROLE`) REFERENCES `role_user` (`ID_ROLE`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '1', 'Administrator', null, null, 'admin', 'asdasd', '2016-03-11 22:12:52', '1');
INSERT INTO `user` VALUES ('2', '2', 'Kasir', null, null, 'kasir', 'asdasd', '2016-03-11 22:12:04', '1');
INSERT INTO `user` VALUES ('4', '1', 'Admins', null, null, 'mimin', 'asdasd', '2016-02-03 17:31:07', '1');
