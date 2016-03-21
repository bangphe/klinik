/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50539
Source Host           : localhost:3306
Source Database       : klinik_db

Target Server Type    : MYSQL
Target Server Version : 50539
File Encoding         : 65001

Date: 2016-02-21 15:38:15
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detil_item
-- ----------------------------
INSERT INTO `detil_item` VALUES ('1', '1', '1', '20', '20000', '2016-01-28 17:17:35');
INSERT INTO `detil_item` VALUES ('2', '2', '2', '23', '25000', '2016-01-13 17:17:48');
INSERT INTO `detil_item` VALUES ('3', '3', '2', '8', '1250', '2016-01-28 17:18:09');
INSERT INTO `detil_item` VALUES ('4', '4', '1', '15', '1500', '2016-01-06 17:18:23');
INSERT INTO `detil_item` VALUES ('5', '5', '2', '18', '1750', '2016-01-20 17:18:41');
INSERT INTO `detil_item` VALUES ('6', '7', '1', '22', '1246', '2016-02-04 09:13:56');
INSERT INTO `detil_item` VALUES ('7', '7', '2', '16', '2000', '2016-02-04 11:02:35');
INSERT INTO `detil_item` VALUES ('8', '8', '1', null, '20000', '2016-02-19 17:12:28');
INSERT INTO `detil_item` VALUES ('9', '9', '1', '0', '20000', '2016-02-19 23:42:01');
INSERT INTO `detil_item` VALUES ('10', '6', '1', '100', '1000', '2016-02-19 23:46:42');
INSERT INTO `detil_item` VALUES ('11', '6', '2', '5', '1500', '2016-02-19 23:46:58');

-- ----------------------------
-- Table structure for `golongan_obat`
-- ----------------------------
DROP TABLE IF EXISTS `golongan_obat`;
CREATE TABLE `golongan_obat` (
  `ID_GOLONGAN_OBAT` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_GOLONGAN` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_GOLONGAN_OBAT`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of golongan_obat
-- ----------------------------
INSERT INTO `golongan_obat` VALUES ('1', 'Analgesik');
INSERT INTO `golongan_obat` VALUES ('2', 'Anastetik');
INSERT INTO `golongan_obat` VALUES ('3', 'Antialergi dan Obat untuk Anafilaksis');
INSERT INTO `golongan_obat` VALUES ('4', 'Antidot dan Obat lain untuk Keracunan');
INSERT INTO `golongan_obat` VALUES ('5', 'Antiepilepsi – Antikonvulsi');
INSERT INTO `golongan_obat` VALUES ('6', 'Anti Infeksi');
INSERT INTO `golongan_obat` VALUES ('7', 'Antimigrain');
INSERT INTO `golongan_obat` VALUES ('8', 'Antineoplastik');
INSERT INTO `golongan_obat` VALUES ('9', 'Antiparkinson');
INSERT INTO `golongan_obat` VALUES ('10', 'Obat yang mempengaruhi darah');
INSERT INTO `golongan_obat` VALUES ('11', 'Diagnostik');
INSERT INTO `golongan_obat` VALUES ('12', 'Disinfektan & Antiseptik');
INSERT INTO `golongan_obat` VALUES ('13', 'Gigi & Mulut');
INSERT INTO `golongan_obat` VALUES ('14', 'Diuretik');
INSERT INTO `golongan_obat` VALUES ('15', 'Hormon, Obat endokrin lain dan Kontraseptik');
INSERT INTO `golongan_obat` VALUES ('16', 'Kardiovaskuler');
INSERT INTO `golongan_obat` VALUES ('17', 'Kulit');
INSERT INTO `golongan_obat` VALUES ('18', 'Larutan Dialisis Peritoneal');
INSERT INTO `golongan_obat` VALUES ('19', 'Larutan Elektrolit');
INSERT INTO `golongan_obat` VALUES ('20', 'Obat Mata');
INSERT INTO `golongan_obat` VALUES ('21', 'Oksitoksik dan Relaksan Uterus');
INSERT INTO `golongan_obat` VALUES ('22', 'Psikofarmaka');
INSERT INTO `golongan_obat` VALUES ('23', 'Relaksan Otot Perifer dan Penghambat Kolinesterase');
INSERT INTO `golongan_obat` VALUES ('24', 'Saluran Cerna');
INSERT INTO `golongan_obat` VALUES ('25', 'Saluran Napas');
INSERT INTO `golongan_obat` VALUES ('26', 'Obat yang mempengaruhi sistim imun');
INSERT INTO `golongan_obat` VALUES ('27', 'Telinga, Hidung dan Tenggorokan');
INSERT INTO `golongan_obat` VALUES ('28', 'Vitamin dan Mineral');
INSERT INTO `golongan_obat` VALUES ('29', 'Obat Abit');

-- ----------------------------
-- Table structure for `item`
-- ----------------------------
DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `ID_ITEM` int(11) NOT NULL AUTO_INCREMENT,
  `ID_KATEGORI` int(11) NOT NULL,
  `ID_GOLONGAN_OBAT` int(11) DEFAULT NULL,
  `NAMA_ITEM` varchar(255) NOT NULL,
  `UKURAN` int(11) DEFAULT NULL,
  `SATUAN` int(11) DEFAULT NULL,
  `HARGA_JUAL` int(11) DEFAULT NULL,
  `TANGGAL_EXPIRED` date DEFAULT NULL,
  `STATUS` int(1) DEFAULT '1',
  PRIMARY KEY (`ID_ITEM`),
  KEY `ID_KATEGORI` (`ID_KATEGORI`),
  KEY `ID_GOLONGAN_OBAT` (`ID_GOLONGAN_OBAT`),
  CONSTRAINT `item_ibfk_1` FOREIGN KEY (`ID_KATEGORI`) REFERENCES `kategori` (`ID_KATEGORI`) ON UPDATE CASCADE,
  CONSTRAINT `item_ibfk_2` FOREIGN KEY (`ID_GOLONGAN_OBAT`) REFERENCES `golongan_obat` (`ID_GOLONGAN_OBAT`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of item
-- ----------------------------
INSERT INTO `item` VALUES ('1', '1', '1', 'Decolgen', null, null, '2500', '2016-03-05', '1');
INSERT INTO `item` VALUES ('2', '2', null, 'Caterpillar', null, null, '150000', null, '1');
INSERT INTO `item` VALUES ('3', '3', null, 'Lensa Plastik', null, null, '2000000', null, '1');
INSERT INTO `item` VALUES ('4', '1', '3', 'Biogesic', null, null, '2000', '2016-02-18', '1');
INSERT INTO `item` VALUES ('5', '1', '7', 'Panadol', null, null, '1500', '2016-04-01', '1');
INSERT INTO `item` VALUES ('6', '1', '3', 'Bodrex', null, null, '1000', '2016-02-18', '1');
INSERT INTO `item` VALUES ('7', '1', '12', 'Panadols', null, null, '2750', '2016-06-09', '1');
INSERT INTO `item` VALUES ('8', '1', '11', 'Pepsodent', null, null, '25000', '2016-03-18', '1');
INSERT INTO `item` VALUES ('9', '1', '19', 'acu', null, null, '2500', '2016-02-29', '2');

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
-- Table structure for `layanan`
-- ----------------------------
DROP TABLE IF EXISTS `layanan`;
CREATE TABLE `layanan` (
  `ID_LAYANAN` int(11) NOT NULL AUTO_INCREMENT,
  `LAYANAN` varchar(100) NOT NULL,
  `BIAYA` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_LAYANAN`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of layanan
-- ----------------------------
INSERT INTO `layanan` VALUES ('1', 'Optik', '5000');
INSERT INTO `layanan` VALUES ('2', 'Check Up', '250000');
INSERT INTO `layanan` VALUES ('3', 'Perawatan', '50000');

-- ----------------------------
-- Table structure for `obat`
-- ----------------------------
DROP TABLE IF EXISTS `obat`;
CREATE TABLE `obat` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of obat
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;

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
INSERT INTO `order` VALUES ('000024', '12', '1', '2016-02-14 18:18:29', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000025', '11', '1', '2016-02-14 18:28:12', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000026', '12', '1', '2016-02-14 21:04:42', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000027', '5', '1', '2016-02-14 21:23:19', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000028', '3', '1', '2016-02-14 21:23:56', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000029', '11', '1', '2016-02-14 21:25:33', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000030', '11', '1', '2016-02-14 21:26:33', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000031', '11', '1', '2016-02-14 21:27:07', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000032', '10', '1', '2016-02-14 21:27:41', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000033', '6', '1', '2016-02-14 21:28:40', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000034', '1', '1', '2016-02-14 21:30:24', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000035', '1', '1', '2016-02-14 21:31:14', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000036', '1', '1', '2016-02-14 21:31:27', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000037', '5', '1', '2016-02-14 21:32:59', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000038', '5', '1', '2016-02-14 21:33:17', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000039', '5', '1', '2016-02-14 21:33:39', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000040', '5', '1', '2016-02-14 21:34:10', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000041', '12', '1', '2016-02-14 22:43:27', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000042', '11', '1', '2016-02-14 23:07:12', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000043', '2', '1', '2016-02-16 10:20:19', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000044', '3', '1', '2016-02-16 10:21:25', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000045', '3', '1', '2016-02-16 10:21:59', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000046', '11', '1', '2016-02-16 10:44:31', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000047', '3', '1', '2016-02-16 10:53:55', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000048', '12', '1', '2016-02-16 10:54:52', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000049', '5', '1', '2016-02-16 10:56:04', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000050', '5', '1', '2016-02-16 10:58:06', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000051', '11', '1', '2016-02-16 10:58:46', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000052', '11', '1', '2016-02-16 10:59:16', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000053', '11', '1', '2016-02-16 10:59:48', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000054', '12', '1', '2016-02-16 11:06:13', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000055', '12', '1', '2016-02-16 11:07:42', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000056', '3', '1', '2016-02-16 11:08:01', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000057', '3', '1', '2016-02-16 11:08:55', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000058', '5', '1', '2016-02-16 11:12:16', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000059', '3', '1', '2016-02-16 11:47:52', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000060', '3', '1', '2016-02-16 11:50:41', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000061', '11', '1', '2016-02-16 11:51:00', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000062', '5', '1', '2016-02-16 11:53:13', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000063', '3', '1', '2016-02-16 14:44:40', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000064', '3', '1', '2016-02-16 14:45:38', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000065', '2', '1', '2016-02-16 17:43:14', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000066', '12', '1', '2016-02-16 17:44:56', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000067', '11', '1', '2016-02-16 17:46:29', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000068', '2', '1', '2016-02-17 22:24:44', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000069', '6', '1', '2016-02-17 22:27:22', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000070', '3', '1', '2016-02-18 09:16:37', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000071', '11', '2', '2016-02-18 09:19:30', 'Kasir', '25000', '1400');
INSERT INTO `order` VALUES ('000072', '5', '1', '2016-02-19 09:21:11', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000073', '3', '1', '2016-02-19 14:58:35', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000074', '12', '2', '2016-02-19 14:59:33', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000075', '5', '1', '2016-02-19 15:09:52', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000076', '12', '1', '2016-02-19 15:21:10', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000077', '2', '2', '2016-02-19 16:20:44', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000078', '3', '2', '2016-02-19 16:39:50', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000079', '12', '1', '2016-02-19 16:41:15', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000080', '5', '2', '2016-02-19 16:46:04', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000081', '5', '1', '2016-02-19 16:53:06', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000082', '5', '1', '2016-02-19 16:53:15', 'Kasir', null, null);
INSERT INTO `order` VALUES ('000083', '4', '2', '2016-02-19 16:55:02', 'Kasir', null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

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
INSERT INTO `order_detail` VALUES ('42', '00000000040', '5', '1995', '3', null, null);
INSERT INTO `order_detail` VALUES ('43', '00000000071', '1', '3700', '2', null, null);
INSERT INTO `order_detail` VALUES ('44', '00000000071', '4', '3200', '3', null, null);
INSERT INTO `order_detail` VALUES ('45', '00000000071', '6', '2200', '3', null, null);
INSERT INTO `order_detail` VALUES ('46', '00000000073', '1', '3325', '3', null, null);
INSERT INTO `order_detail` VALUES ('47', '00000000073', '5', '1995', '2', null, null);
INSERT INTO `order_detail` VALUES ('48', '00000000074', '1', '3700', '1', null, null);
INSERT INTO `order_detail` VALUES ('49', '00000000074', '4', '3200', '2', null, null);
INSERT INTO `order_detail` VALUES ('50', '00000000074', '5', '2700', '3', null, null);
INSERT INTO `order_detail` VALUES ('51', '00000000079', '1', '3325', '2', '0', null);
INSERT INTO `order_detail` VALUES ('52', '00000000079', '2', '150000', '3', null, null);
INSERT INTO `order_detail` VALUES ('53', '00000000082', '2', '150000', '1', null, null);
INSERT INTO `order_detail` VALUES ('54', '00000000082', '5', '1995', '2', null, null);
INSERT INTO `order_detail` VALUES ('55', '00000000083', '1', '3700', '1', null, null);
INSERT INTO `order_detail` VALUES ('56', '00000000083', '5', '2700', '2', null, null);
INSERT INTO `order_detail` VALUES ('57', '00000000083', '3', '2000000', '2', null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pasien
-- ----------------------------
INSERT INTO `pasien` VALUES ('1', '1', 'Joko Susanto', 'Pondok Jati', '', 'L', null, '5000', '2016-01-24 22:30:08');
INSERT INTO `pasien` VALUES ('2', '1', 'Handina', 'Jalan Simo', '085731205312', 'P', 'Nyeri di leher', '5000', '2016-02-02 22:18:35');
INSERT INTO `pasien` VALUES ('3', '1', 'Harvian', 'prikitiww', '0857312053121', 'L', '', '5000', '2016-02-01 22:18:39');
INSERT INTO `pasien` VALUES ('4', '1', 'Johan Suswanto', 'ssdfsdfsdf', '085731205312', 'P', null, '5000', '2016-01-31 22:18:42');
INSERT INTO `pasien` VALUES ('5', '1', 'Handoko Siswoyo', 'dsfsdfsf', '343434', 'P', null, '5000', '2016-02-02 12:25:45');
INSERT INTO `pasien` VALUES ('6', '1', 'Hindoko', 'sdfsdf', '239232', 'P', 'ddfdsf', null, '2016-02-01 22:18:46');
INSERT INTO `pasien` VALUES ('10', '1', 'sadasd', 'asd', '23232323', '1', '', '5000', '2016-02-12 16:41:11');
INSERT INTO `pasien` VALUES ('11', '1', 'Handayani', 'sdasdasdasd', '222222', 'P', 'sdsdsdsdsd', '5000', '2016-02-12 10:32:40');
INSERT INTO `pasien` VALUES ('12', '1', 'Asmoro Haryo', 'Pondok Mutiara', '0818370486', 'P', '', '5000', '2016-02-12 13:17:20');

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
INSERT INTO `user` VALUES ('1', '1', 'Administrator', null, null, 'admin', 'asdasd', '2016-02-21 13:18:20', '1');
INSERT INTO `user` VALUES ('2', '2', 'Kasir', null, null, 'kasir', 'asdasd', '2016-02-21 13:11:04', '1');
INSERT INTO `user` VALUES ('4', '1', 'Admins', null, null, 'mimin', 'asdasd', '2016-02-03 17:31:07', '1');
