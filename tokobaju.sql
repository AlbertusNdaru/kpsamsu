-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2019 at 03:50 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokobaju`
--

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `Id` int(11) NOT NULL,
  `Title` varchar(20) DEFAULT NULL,
  `Subtitle` varchar(20) DEFAULT NULL,
  `Image` varchar(400) DEFAULT NULL,
  `Line1` varchar(20) DEFAULT NULL,
  `Line2` varchar(20) DEFAULT NULL,
  `Line3` varchar(60) DEFAULT NULL,
  `Line4` varchar(50) DEFAULT NULL,
  `Line5` varchar(50) DEFAULT NULL,
  `Create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`Id`, `Title`, `Subtitle`, `Image`, `Line1`, `Line2`, `Line3`, `Line4`, `Line5`, `Create_at`, `Update_at`) VALUES
(2, 'Aku', 'dfgdfgfdg', 'tupperware.jpg', 'fdgfdgfdg', 'dfgdfgdfg', 'dfgdfgdfgdfg', 'dfgdfgfdgfdgfdgdfgfdg', 'dfgfdg', '2019-02-28 04:42:50', NULL),
(3, 'Aku', 'sdwqerad', 'ss.jpg', 'xczxcxzc', 'asde3', 'rasdr4twe', 'frasd3e', 'r45twer4', '2019-02-28 07:02:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Id` int(10) NOT NULL,
  `Category_name` varchar(20) NOT NULL,
  `Create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Update_at` datetime DEFAULT NULL,
  `Description` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Id`, `Category_name`, `Create_at`, `Update_at`, `Description`) VALUES
(1, 'Men Colection', '2019-02-28 03:00:52', NULL, 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `Id` int(10) NOT NULL,
  `Transaction_id` int(10) DEFAULT NULL,
  `Product_id` int(10) NOT NULL,
  `Price` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Qty` int(11) NOT NULL,
  `Member_id` int(10) NOT NULL,
  `Stats` int(11) NOT NULL,
  `Create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `imageproduct`
--

CREATE TABLE `imageproduct` (
  `Id` int(10) NOT NULL,
  `Product_id` int(10) NOT NULL,
  `Photo_name` varchar(200) NOT NULL,
  `Create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imageproduct`
--

INSERT INTO `imageproduct` (`Id`, `Product_id`, `Photo_name`, `Create_at`, `Update_at`) VALUES
(1, 1, 'Bayu.jpg', '2019-03-05 02:16:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `Id` int(10) NOT NULL,
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
  `Update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Id` int(11) NOT NULL,
  `Product_name` varchar(20) NOT NULL,
  `Category_id` int(10) NOT NULL,
  `Merk` varchar(20) NOT NULL,
  `Price` int(11) DEFAULT NULL,
  `Photo_name` varchar(200) DEFAULT NULL,
  `Status_item` varchar(20) DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `Product_type_id` int(11) DEFAULT NULL,
  `Create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Id`, `Product_name`, `Category_id`, `Merk`, `Price`, `Photo_name`, `Status_item`, `Description`, `Product_type_id`, `Create_at`, `Update_at`) VALUES
(1, 'Erigo Start', 1, 'Antik', 80000, 'Bayu.jpg', 'Sale', 'Erigo', 1, '2019-02-28 03:01:33', '2019-03-05 02:16:54');

-- --------------------------------------------------------

--
-- Table structure for table `product_stok`
--

CREATE TABLE `product_stok` (
  `Id` int(11) NOT NULL,
  `Product_id` int(11) DEFAULT NULL,
  `Size` varchar(10) DEFAULT NULL,
  `Stok` int(11) DEFAULT NULL,
  `Create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_stok`
--

INSERT INTO `product_stok` (`Id`, `Product_id`, `Size`, `Stok`, `Create_at`, `Update_at`) VALUES
(1, 1, 'XL', 0, '2019-02-28 03:01:33', NULL),
(2, 1, 'L', 0, '2019-02-28 03:01:33', NULL),
(3, 1, 'M', 0, '2019-02-28 03:01:33', NULL),
(4, 1, 'S', 0, '2019-02-28 03:01:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `Id` int(11) NOT NULL,
  `Type_name` varchar(40) DEFAULT NULL,
  `Size_type` varchar(10) DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`Id`, `Type_name`, `Size_type`, `Description`, `Create_at`, `Update_at`) VALUES
(1, 'Shirt', 'Atasan', 'Erigo', '2019-02-28 03:00:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `Id` int(10) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Payment` int(11) NOT NULL,
  `Stats` int(11) NOT NULL,
  `Transaction_bill` varchar(500) DEFAULT NULL,
  `Create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `Usergrup_id` int(11) NOT NULL,
  `Username` varchar(10) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `IsLogin` int(11) NOT NULL DEFAULT '0',
  `LastLogin` varchar(40) DEFAULT '0',
  `Create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Usergrup_id`, `Username`, `Password`, `IsLogin`, `LastLogin`, `Create_at`, `Update_at`) VALUES
(1, 1, 'admin', 'pass@word5', 1, '1551752193', '2019-02-28 02:55:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usergrup`
--

CREATE TABLE `usergrup` (
  `Id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Description` varchar(40) NOT NULL,
  `Create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usergrup`
--

INSERT INTO `usergrup` (`Id`, `Name`, `Description`, `Create_at`, `Update_at`) VALUES
(1, 'Superadmin', 'Admin', '2019-02-28 02:55:24', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Nama_kategori` (`Category_name`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_barang1` (`Product_id`),
  ADD KEY `fk_transaksi1` (`Transaction_id`),
  ADD KEY `id_member` (`Member_id`);

--
-- Indexes for table `imageproduct`
--
ALTER TABLE `imageproduct`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `id_barang` (`Product_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_barang3` (`Category_id`),
  ADD KEY `product_ibfk_2` (`Product_type_id`);

--
-- Indexes for table `product_stok`
--
ALTER TABLE `product_stok`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`),
  ADD KEY `product_stok_ibfk_1` (`Product_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Usergrup_id` (`Usergrup_id`);

--
-- Indexes for table `usergrup`
--
ALTER TABLE `usergrup`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imageproduct`
--
ALTER TABLE `imageproduct`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_stok`
--
ALTER TABLE `product_stok`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usergrup`
--
ALTER TABLE `usergrup`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `details_ibfk_1` FOREIGN KEY (`Transaction_id`) REFERENCES `transaction` (`Id`),
  ADD CONSTRAINT `details_ibfk_2` FOREIGN KEY (`Product_id`) REFERENCES `product` (`Id`),
  ADD CONSTRAINT `details_ibfk_3` FOREIGN KEY (`Member_id`) REFERENCES `member` (`Id`);

--
-- Constraints for table `imageproduct`
--
ALTER TABLE `imageproduct`
  ADD CONSTRAINT `imageproduct_ibfk_1` FOREIGN KEY (`Product_id`) REFERENCES `product` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Category_id`) REFERENCES `category` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`Product_type_id`) REFERENCES `product_type` (`Id`) ON UPDATE CASCADE;

--
-- Constraints for table `product_stok`
--
ALTER TABLE `product_stok`
  ADD CONSTRAINT `product_stok_ibfk_1` FOREIGN KEY (`Product_id`) REFERENCES `product` (`Id`) ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`Usergrup_id`) REFERENCES `usergrup` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
