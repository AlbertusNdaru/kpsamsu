/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.37-MariaDB : Database - tokobaju
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tokobaju` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `tokobaju`;

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Category_name` varchar(20) NOT NULL,
  `Create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Update_at` datetime DEFAULT NULL,
  `Description` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Nama_kategori` (`Category_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `details` */

DROP TABLE IF EXISTS `details`;

CREATE TABLE `details` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Transaction_id` int(10) DEFAULT NULL,
  `Product_id` int(10) NOT NULL,
  `Price` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Qty` int(11) NOT NULL,
  `Member_id` int(10) NOT NULL,
  `Stats` int(11) NOT NULL,
  `Create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_barang1` (`Product_id`),
  KEY `fk_transaksi1` (`Transaction_id`),
  KEY `id_member` (`Member_id`),
  CONSTRAINT `details_ibfk_1` FOREIGN KEY (`Transaction_id`) REFERENCES `transaction` (`Id`),
  CONSTRAINT `details_ibfk_2` FOREIGN KEY (`Product_id`) REFERENCES `product` (`Id`),
  CONSTRAINT `details_ibfk_3` FOREIGN KEY (`Member_id`) REFERENCES `member` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `imageproduct` */

DROP TABLE IF EXISTS `imageproduct`;

CREATE TABLE `imageproduct` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Product_id` int(10) NOT NULL,
  `Photo_name` varchar(200) NOT NULL,
  `Create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `id_barang` (`Product_id`),
  CONSTRAINT `imageproduct_ibfk_1` FOREIGN KEY (`Product_id`) REFERENCES `product` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Table structure for table `member` */

DROP TABLE IF EXISTS `member`;

CREATE TABLE `member` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Member_name` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Question` varchar(40) NOT NULL,
  `Answer` varchar(20) NOT NULL,
  `isLogin` varchar(1) NOT NULL DEFAULT 'N',
  `FailedLogin` int(11) NOT NULL DEFAULT '0',
  `lastlogin` varchar(30) DEFAULT NULL,
  `Address` text,
  `City` int(11) DEFAULT NULL,
  `Province` int(11) DEFAULT NULL,
  `Create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Product_name` varchar(20) NOT NULL,
  `Category_id` int(10) NOT NULL,
  `Merk` varchar(20) NOT NULL,
  `Price` int(11) DEFAULT NULL,
  `Photo_name` varchar(200) DEFAULT NULL,
  `Status_item` varchar(20) DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `Product_type_id` int(11) DEFAULT NULL,
  `Create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Update_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_barang3` (`Category_id`),
  KEY `product_ibfk_2` (`Product_type_id`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Category_id`) REFERENCES `category` (`Id`) ON UPDATE CASCADE,
  CONSTRAINT `product_ibfk_2` FOREIGN KEY (`Product_type_id`) REFERENCES `product_type` (`Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Table structure for table `product_stok` */

DROP TABLE IF EXISTS `product_stok`;

CREATE TABLE `product_stok` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Product_id` int(11) DEFAULT NULL,
  `Size` varchar(10) DEFAULT NULL,
  `Stok` int(11) DEFAULT NULL,
  `Create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `Id` (`Id`),
  KEY `product_stok_ibfk_1` (`Product_id`),
  CONSTRAINT `product_stok_ibfk_1` FOREIGN KEY (`Product_id`) REFERENCES `product` (`Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Table structure for table `product_type` */

DROP TABLE IF EXISTS `product_type`;

CREATE TABLE `product_type` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Type_name` varchar(40) DEFAULT NULL,
  `Size_type` varchar(10) DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `transaction` */

DROP TABLE IF EXISTS `transaction`;

CREATE TABLE `transaction` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Payment` int(11) NOT NULL,
  `Stats` int(11) NOT NULL,
  `Transaction_bill` varchar(500) DEFAULT NULL,
  `Create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Usergrup_id` int(11) NOT NULL,
  `Username` varchar(10) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `IsLogin` int(11) NOT NULL DEFAULT '0',
  `LastLogin` varchar(40) DEFAULT '0',
  `Create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `Usergrup_id` (`Usergrup_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`Usergrup_id`) REFERENCES `usergrup` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `usergrup` */

DROP TABLE IF EXISTS `usergrup`;

CREATE TABLE `usergrup` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  `Description` varchar(40) NOT NULL,
  `Create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
