/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50539
Source Host           : localhost:3306
Source Database       : klinik_db_new

Target Server Type    : MYSQL
Target Server Version : 50539
File Encoding         : 65001

Date: 2016-01-28 19:15:21
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detil_item
-- ----------------------------
INSERT INTO `detil_item` VALUES ('1', '1', '1', '7', '20000', '2016-01-28 17:17:35');
INSERT INTO `detil_item` VALUES ('2', '2', '2', '14', '25000', '2016-01-13 17:17:48');
INSERT INTO `detil_item` VALUES ('3', '3', '2', '15', '1250', '2016-01-28 17:18:09');
INSERT INTO `detil_item` VALUES ('4', '4', '1', '7', '1500', '2016-01-06 17:18:23');
INSERT INTO `detil_item` VALUES ('5', '5', '2', '18', '1750', '2016-01-20 17:18:41');

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
INSERT INTO `item` VALUES ('4', '1', 'Biogesic', null, null, '2000', '2016-01-13', '1');
INSERT INTO `item` VALUES ('5', '1', 'Panadol', null, null, '1500', '2016-01-21', '1');
INSERT INTO `item` VALUES ('6', '1', 'Bodrex', null, null, '1000', '2016-02-18', '1');

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
  `RESEP` int(1) DEFAULT NULL,
  `TANGGAL_ORDER` date DEFAULT NULL,
  `USER_PEMBUAT` int(11) DEFAULT NULL,
  `PEMBAYARAN` int(11) DEFAULT NULL,
  `KEMBALIAN` int(11) DEFAULT NULL,
  PRIMARY KEY (`KODE_ORDER`),
  KEY `ID_PASIEN` (`ID_PASIEN`),
  CONSTRAINT `order_ibfk_1` FOREIGN KEY (`ID_PASIEN`) REFERENCES `pasien` (`ID_PASIEN`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES ('00000000001', '1', null, '2016-01-27', null, null, null);
INSERT INTO `order` VALUES ('00000000006', '1', null, '2016-01-27', null, '24000', '10500');
INSERT INTO `order` VALUES ('00000000007', '2', null, '2016-01-27', null, '4500000', '189000');
INSERT INTO `order` VALUES ('00000000008', '2', null, '2016-01-27', null, null, null);
INSERT INTO `order` VALUES ('00000000009', '1', '1', '2016-01-28', null, null, null);
INSERT INTO `order` VALUES ('00000000010', '1', null, '2016-01-28', null, null, null);
INSERT INTO `order` VALUES ('00000000011', '1', '2', '2016-01-28', null, null, null);
INSERT INTO `order` VALUES ('00000000012', '2', '1', '2016-01-28', null, null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of order_detail
-- ----------------------------
INSERT INTO `order_detail` VALUES ('1', '00000000006', '1', '2500', '3', null);
INSERT INTO `order_detail` VALUES ('2', '00000000006', '4', '2000', '3', null);
INSERT INTO `order_detail` VALUES ('3', '00000000007', '1', '2500', '2', null);
INSERT INTO `order_detail` VALUES ('4', '00000000007', '4', '2000', '3', null);
INSERT INTO `order_detail` VALUES ('5', '00000000007', '2', '150000', '2', null);
INSERT INTO `order_detail` VALUES ('6', '00000000007', '3', '2000000', '2', null);
INSERT INTO `order_detail` VALUES ('7', '00000000008', '1', '2500', '2', null);
INSERT INTO `order_detail` VALUES ('8', '00000000008', '4', '2000', '5', null);
INSERT INTO `order_detail` VALUES ('9', '00000000008', '5', '1500', '100', null);
INSERT INTO `order_detail` VALUES ('10', '00000000009', '1', '3325', '2', null);
INSERT INTO `order_detail` VALUES ('11', '00000000009', '4', '2660', '3', null);
INSERT INTO `order_detail` VALUES ('12', '00000000009', '5', '1995', '1', null);
INSERT INTO `order_detail` VALUES ('13', '00000000009', '2', '199500', '2', null);
INSERT INTO `order_detail` VALUES ('14', '00000000010', '1', '3700', '2', null);
INSERT INTO `order_detail` VALUES ('15', '00000000010', '4', '3200', '2', null);
INSERT INTO `order_detail` VALUES ('16', '00000000010', '5', '2700', '2', null);
INSERT INTO `order_detail` VALUES ('17', '00000000010', '2', '151200', '3', null);
INSERT INTO `order_detail` VALUES ('18', '00000000011', '1', '3700', '1', null);
INSERT INTO `order_detail` VALUES ('19', '00000000011', '4', '3200', '1', null);
INSERT INTO `order_detail` VALUES ('20', '00000000011', '5', '2700', '1', null);
INSERT INTO `order_detail` VALUES ('21', '00000000012', '4', '2660', '2', null);
INSERT INTO `order_detail` VALUES ('22', '00000000012', '5', '1995', '1', null);
INSERT INTO `order_detail` VALUES ('23', '00000000012', '2', '199500', '3', null);

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
INSERT INTO `pasien` VALUES ('1', '1', 'Joko Susanto', 'Pondok Jati', '', '0', null, '5000', '2016-01-24 22:30:08');
INSERT INTO `pasien` VALUES ('2', '1', 'Handina', 'Jalan Simo', '085731205312', '2', 'Nyeri di leher', '5000', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of supplier
-- ----------------------------
INSERT INTO `supplier` VALUES ('1', 'PT. Nusantara', 'Kutisari', '088888888');
INSERT INTO `supplier` VALUES ('2', 'PT. Baskara', 'Kutilsari', '08462736726');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '1', 'Administrator', 'admin', 'asdasd', '2016-01-20 20:10:19', '1');
INSERT INTO `user` VALUES ('2', '2', 'Kasir', 'kasir', 'asdasd', '2016-01-20 20:46:58', '1');
INSERT INTO `user` VALUES ('3', '1', 'Bamban', 'susu', 'ususu', null, null);
