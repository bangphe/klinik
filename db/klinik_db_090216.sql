/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50539
Source Host           : localhost:3306
Source Database       : klinik_db

Target Server Type    : MYSQL
Target Server Version : 50539
File Encoding         : 65001

Date: 2016-02-08 22:27:47
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detil_item
-- ----------------------------
INSERT INTO `detil_item` VALUES ('1', '1', '1', '4', '20000', '2016-01-28 17:17:35');
INSERT INTO `detil_item` VALUES ('2', '2', '2', '9', '25000', '2016-01-13 17:17:48');
INSERT INTO `detil_item` VALUES ('3', '3', '2', '10', '1250', '2016-01-28 17:18:09');
INSERT INTO `detil_item` VALUES ('4', '4', '1', '5', '1500', '2016-01-06 17:18:23');
INSERT INTO `detil_item` VALUES ('5', '5', '2', '10', '1750', '2016-01-20 17:18:41');
INSERT INTO `detil_item` VALUES ('6', '7', '1', '2', '1246', '2016-02-04 09:13:56');
INSERT INTO `detil_item` VALUES ('7', '7', '2', '20', '2000', '2016-02-04 11:02:35');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of item
-- ----------------------------
INSERT INTO `item` VALUES ('1', '1', 'Decolgen', null, null, '2500', '2016-03-05', '1');
INSERT INTO `item` VALUES ('2', '2', 'Caterpillar', null, null, '150000', null, '1');
INSERT INTO `item` VALUES ('3', '3', 'Lensa Plastik', null, null, '2000000', null, '1');
INSERT INTO `item` VALUES ('4', '1', 'Biogesic', null, null, '2000', '2016-02-18', '1');
INSERT INTO `item` VALUES ('5', '1', 'Panadol', null, null, '1500', '2016-04-01', '1');
INSERT INTO `item` VALUES ('6', '1', 'Bodrex', null, null, '1000', '2016-02-18', '1');
INSERT INTO `item` VALUES ('7', '1', 'Panadols', null, null, '2750', '2016-06-09', '1');

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
INSERT INTO `kategori` VALUES ('2', 'Gagangdd');
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
  `KODE_ORDER` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `ID_PASIEN` int(11) NOT NULL,
  `RESEP` int(1) DEFAULT NULL,
  `TANGGAL_ORDER` datetime DEFAULT NULL,
  `USER_PEMBUAT` varchar(50) DEFAULT NULL,
  `PEMBAYARAN` int(11) DEFAULT NULL,
  `KEMBALIAN` int(11) DEFAULT NULL,
  PRIMARY KEY (`KODE_ORDER`),
  KEY `ID_PASIEN` (`ID_PASIEN`),
  CONSTRAINT `order_ibfk_1` FOREIGN KEY (`ID_PASIEN`) REFERENCES `pasien` (`ID_PASIEN`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES ('000001', '1', null, '2016-01-27 00:00:00', null, null, null);
INSERT INTO `order` VALUES ('000006', '1', null, '2016-01-27 00:00:00', null, '24000', '10500');
INSERT INTO `order` VALUES ('000007', '2', null, '2016-01-27 00:00:00', null, '4500000', '189000');
INSERT INTO `order` VALUES ('000008', '2', null, '2016-01-27 00:00:00', null, null, null);
INSERT INTO `order` VALUES ('000009', '1', '1', '2016-01-28 00:00:00', null, '550000', '134375');
INSERT INTO `order` VALUES ('000010', '1', null, '2016-01-28 00:00:00', null, null, null);
INSERT INTO `order` VALUES ('000011', '1', '2', '2016-01-28 00:00:00', null, null, null);
INSERT INTO `order` VALUES ('000012', '2', '1', '2016-01-28 00:00:00', null, null, null);
INSERT INTO `order` VALUES ('000013', '1', '2', '2016-01-28 00:00:00', null, null, null);
INSERT INTO `order` VALUES ('000014', '2', null, '2016-02-02 00:00:00', null, null, null);
INSERT INTO `order` VALUES ('000015', '1', '2', '2016-02-02 00:00:00', null, null, null);
INSERT INTO `order` VALUES ('000016', '2', '1', '2016-02-02 00:00:00', null, null, null);
INSERT INTO `order` VALUES ('000017', '2', '1', '2016-02-02 00:00:00', 'Kasir', '22552141', '20398151');
INSERT INTO `order` VALUES ('000018', '2', '2', '2016-02-02 00:00:00', 'Kasir', '4500000', '490400');

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
  KEY `ID_ITEM` (`ID_ITEM`),
  KEY `KODE_ORDER` (`KODE_ORDER`),
  CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`ID_ITEM`) REFERENCES `item` (`ID_ITEM`) ON UPDATE CASCADE,
  CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`KODE_ORDER`) REFERENCES `order` (`KODE_ORDER`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of order_detail
-- ----------------------------
INSERT INTO `order_detail` VALUES ('1', '00000000006', '1', '2500', '3', null, null);
INSERT INTO `order_detail` VALUES ('2', '00000000006', '4', '2000', '3', null, null);
INSERT INTO `order_detail` VALUES ('3', '00000000007', '1', '2500', '2', null, null);
INSERT INTO `order_detail` VALUES ('4', '00000000007', '4', '2000', '3', null, null);
INSERT INTO `order_detail` VALUES ('5', '00000000007', '2', '150000', '2', null, null);
INSERT INTO `order_detail` VALUES ('6', '00000000007', '3', '2000000', '2', null, null);
INSERT INTO `order_detail` VALUES ('7', '00000000008', '1', '2500', '2', null, null);
INSERT INTO `order_detail` VALUES ('8', '00000000008', '4', '2000', '5', null, null);
INSERT INTO `order_detail` VALUES ('9', '00000000008', '5', '1500', '100', null, null);
INSERT INTO `order_detail` VALUES ('10', '00000000009', '1', '3325', '2', null, null);
INSERT INTO `order_detail` VALUES ('11', '00000000009', '4', '2660', '3', null, null);
INSERT INTO `order_detail` VALUES ('12', '00000000009', '5', '1995', '1', null, null);
INSERT INTO `order_detail` VALUES ('13', '00000000009', '2', '199500', '2', null, null);
INSERT INTO `order_detail` VALUES ('14', '00000000010', '1', '3700', '2', null, null);
INSERT INTO `order_detail` VALUES ('15', '00000000010', '4', '3200', '2', null, null);
INSERT INTO `order_detail` VALUES ('16', '00000000010', '5', '2700', '2', null, null);
INSERT INTO `order_detail` VALUES ('17', '00000000010', '2', '151200', '3', null, null);
INSERT INTO `order_detail` VALUES ('18', '00000000011', '1', '3700', '1', null, null);
INSERT INTO `order_detail` VALUES ('19', '00000000011', '4', '3200', '1', null, null);
INSERT INTO `order_detail` VALUES ('20', '00000000011', '5', '2700', '1', null, null);
INSERT INTO `order_detail` VALUES ('21', '00000000012', '4', '2660', '2', null, null);
INSERT INTO `order_detail` VALUES ('22', '00000000012', '5', '1995', '1', null, null);
INSERT INTO `order_detail` VALUES ('23', '00000000012', '2', '199500', '3', null, null);
INSERT INTO `order_detail` VALUES ('24', '00000000013', '5', '2700', '2', null, null);
INSERT INTO `order_detail` VALUES ('25', '00000000013', '2', '151200', '1', null, null);
INSERT INTO `order_detail` VALUES ('26', '00000000013', '3', '2001200', '1', null, null);
INSERT INTO `order_detail` VALUES ('27', '00000000014', '1', '2500', '1', null, null);
INSERT INTO `order_detail` VALUES ('28', '00000000014', '4', '2000', '1', null, null);
INSERT INTO `order_detail` VALUES ('29', '00000000014', '2', '150000', '2', null, null);
INSERT INTO `order_detail` VALUES ('30', '00000000015', '5', '2700', '2', null, null);
INSERT INTO `order_detail` VALUES ('31', '00000000015', '3', '2001200', '1', null, null);
INSERT INTO `order_detail` VALUES ('32', '00000000016', '1', '3325', '1', null, null);
INSERT INTO `order_detail` VALUES ('33', '00000000016', '5', '1995', '1', null, null);
INSERT INTO `order_detail` VALUES ('34', '00000000016', '2', '150000', '1', null, null);
INSERT INTO `order_detail` VALUES ('35', '00000000017', '5', '1995', '2', null, null);
INSERT INTO `order_detail` VALUES ('36', '00000000017', '2', '150000', '1', null, null);
INSERT INTO `order_detail` VALUES ('37', '00000000017', '3', '2000000', '1', null, null);
INSERT INTO `order_detail` VALUES ('38', '00000000018', '1', '3700', '1', null, null);
INSERT INTO `order_detail` VALUES ('39', '00000000018', '4', '3200', '1', null, null);
INSERT INTO `order_detail` VALUES ('40', '00000000018', '5', '2700', '1', null, null);
INSERT INTO `order_detail` VALUES ('41', '00000000018', '3', '2000000', '2', null, null);

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
  `JENIS_KELAMIN` varchar(5) NOT NULL,
  `KETERANGAN` varchar(255) DEFAULT NULL,
  `BIAYA_REGISTRASI` int(11) DEFAULT NULL,
  `TANGGAL_REGISTRASI` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_PASIEN`),
  KEY `ID_LAYANAN` (`ID_LAYANAN`),
  CONSTRAINT `pasien_ibfk_1` FOREIGN KEY (`ID_LAYANAN`) REFERENCES `layanan` (`ID_LAYANAN`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pasien
-- ----------------------------
INSERT INTO `pasien` VALUES ('1', '1', 'Joko Susanto', 'Pondok Jati', '', '0', null, '5000', '2016-01-24 22:30:08');
INSERT INTO `pasien` VALUES ('2', '1', 'Handina', 'Jalan Simo', '085731205312', '2', 'Nyeri di leher', '5000', '2016-02-02 22:18:35');
INSERT INTO `pasien` VALUES ('3', '1', 'Harvian', 'prikitiww', '0857312053121', 'L', null, '5000', '2016-02-01 22:18:39');
INSERT INTO `pasien` VALUES ('4', '1', 'Johan Suswanto', 'ssdfsdfsdf', '085731205312', 'P', null, '5000', '2016-01-31 22:18:42');
INSERT INTO `pasien` VALUES ('5', '1', 'Handoko Siswoyo', 'dsfsdfsf', '343434', 'P', null, '5000', '2016-02-02 12:25:45');
INSERT INTO `pasien` VALUES ('6', '1', 'Hindoko', 'sdfsdf', '239232', '', 'ddfdsf', null, '2016-02-01 22:18:46');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '1', 'Administrator', 'admin', 'asdasd', '2016-02-08 16:27:19', '1');
INSERT INTO `user` VALUES ('2', '2', 'Kasir', 'kasir', 'asdasd', '2016-02-08 14:12:05', '1');
INSERT INTO `user` VALUES ('3', '1', 'Bamban', 'susu', 'ususu', null, null);
INSERT INTO `user` VALUES ('4', '1', 'Admins', 'mimin', 'asdasd', '2016-02-03 17:31:07', '1');
INSERT INTO `user` VALUES ('5', '2', 'Husein', 'uce', 'asdasd', null, '1');
