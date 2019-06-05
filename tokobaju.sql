-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2019 at 05:37 PM
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
  `Status` int(11) NOT NULL,
  `Create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`Id`, `Transaction_id`, `Product_id`, `Price`, `Date`, `Qty`, `Member_id`, `Status`, `Create_at`, `Update_at`) VALUES
(66, 1, 1, 80000, '2019-05-31 04:58:09', 1, 6, 1, '2019-05-31 04:58:09', NULL),
(67, 1, 2, 40000, '2019-05-31 04:58:12', 1, 6, 1, '2019-05-31 04:58:12', NULL),
(78, 2, 1, 80000, '2019-05-31 10:06:18', 1, 6, 1, '2019-05-31 10:06:18', NULL),
(79, 2, 2, 40000, '2019-05-31 10:06:18', 1, 6, 1, '2019-05-31 10:06:18', NULL),
(80, 2, 3, 40000, '2019-05-31 10:06:18', 1, 6, 1, '2019-05-31 10:06:18', NULL),
(81, 2, 5, 60000, '2019-05-31 10:06:18', 1, 6, 1, '2019-05-31 10:06:18', NULL),
(86, 3, 1, 80000, '2019-05-31 10:09:48', 1, 6, 1, '2019-05-31 10:09:48', NULL),
(87, 3, 2, 40000, '2019-05-31 10:09:50', 1, 6, 1, '2019-05-31 10:09:50', NULL),
(88, 3, 3, 40000, '2019-05-31 10:09:52', 1, 6, 1, '2019-05-31 10:09:52', NULL),
(89, 3, 5, 60000, '2019-05-31 10:09:54', 1, 6, 1, '2019-05-31 10:09:54', NULL),
(90, 4, 1, 80000, '2019-06-02 14:42:51', 4, 6, 1, '2019-06-02 14:42:51', NULL),
(91, 4, 5, 60000, '2019-06-02 14:43:00', 2, 6, 1, '2019-06-02 14:43:00', NULL),
(92, 4, 3, 40000, '2019-06-02 14:43:06', 1, 6, 1, '2019-06-02 14:43:06', NULL),
(94, 7, 1, 80000, '2019-06-02 15:10:16', 1, 6, 1, '2019-06-02 15:10:16', NULL);

--
-- Triggers `details`
--
DELIMITER $$
CREATE TRIGGER `kurangstok` AFTER UPDATE ON `details` FOR EACH ROW BEGIN
     update product SET Stok=Stok-new.Qty WHERE Id=new.Product_id and new.Status=1;
    END
$$
DELIMITER ;

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
(1, 1, '8-bit-256-x-256-Grayscale-Lena-Image.jpg', '2019-05-23 03:35:55', NULL),
(2, 2, 'KTP.JPG', '2019-05-23 03:36:06', NULL),
(3, 3, 'K3.png', '2019-05-26 04:55:27', NULL),
(5, 5, 'thatshirt-t-shirt-clip-art-safety-forklift_bw-41624.jpg', '2019-06-02 14:53:25', NULL);

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

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`Id`, `Member_name`, `Email`, `Password`, `Question`, `Answer`, `isLogin`, `FailedLogin`, `lastlogin`, `Address`, `City`, `Province`, `Create_at`, `Update_at`) VALUES
(2, 'sdadasd', 'albertusndarukrismandoko@gmail.com', 'wqwqwqwqwqwqwqwq', 'a', 'a', 'N', 0, NULL, 'aku', 0, 0, '2019-05-29 17:59:10', NULL),
(6, 'Albertus Ndaru', 'ndarualbert21@gmail.com', '210892', 'aku', 'ndaru', 'N', 0, '0', 'Ngentak RT13', 0, 0, '2019-05-29 18:07:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `jumlah_beli` int(11) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `Supliyer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `id_product`, `price`, `jumlah_beli`, `create_at`, `Supliyer_id`) VALUES
(1, 1, 500000, 4, NULL, 1);

--
-- Triggers `pembelian`
--
DELIMITER $$
CREATE TRIGGER `tambahstok` AFTER INSERT ON `pembelian` FOR EACH ROW BEGIN 
UPDATE product set Stok=Stok+new.jumlah_beli where Id=new.id_product;
END
$$
DELIMITER ;

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
  `Stok` int(11) DEFAULT '0',
  `Harga_supliyer` int(11) DEFAULT NULL,
  `Create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Id`, `Product_name`, `Category_id`, `Merk`, `Price`, `Photo_name`, `Status_item`, `Description`, `Product_type_id`, `Stok`, `Harga_supliyer`, `Create_at`, `Update_at`) VALUES
(1, 'Erigo Start', 1, 'Antik', 80000, '8-bit-256-x-256-Grayscale-Lena-Image.jpg', 'Sale', 'Erigo', 1, 561, 500000, '2019-02-28 03:01:33', '2019-05-23 03:35:55'),
(2, 'Test', 1, '123', 40000, 'KTP.JPG', 'New', '12221', 1, 39, 35000, '2019-05-20 04:21:28', '2019-05-23 03:36:06'),
(3, 'Test', 1, 'Nais', 40000, 'K3.png', 'New', '12221', 1, 7, 35000, '2019-05-26 04:53:33', '2019-05-26 04:55:26'),
(5, 'Test 10', 1, '1235', 60000, 'thatshirt-t-shirt-clip-art-safety-forklift_bw-41624.jpg', 'New', '12221', 1, 16, 35000, '2019-05-31 09:27:42', '2019-06-02 14:53:25');

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
(1, 'Shirt', 'Atasan', 'Erigo', '2019-02-28 03:00:19', '2019-05-20 11:13:46');

-- --------------------------------------------------------

--
-- Table structure for table `supliyer`
--

CREATE TABLE `supliyer` (
  `Id` int(11) NOT NULL,
  `Nama` varchar(30) DEFAULT NULL,
  `Alamat` text,
  `Kontak` varchar(14) DEFAULT NULL,
  `Create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supliyer`
--

INSERT INTO `supliyer` (`Id`, `Nama`, `Alamat`, `Kontak`, `Create`, `Update`) VALUES
(1, 'Erigo 21', 'Jl. Damai no 39', '08123487690', '2019-06-05 14:32:58', '2019-06-05 21:42:36'),
(3, 'Erigo 21', 'Jl. Damai no 40', '08123487690', '2019-06-05 14:35:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `Id` int(10) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Payment` int(11) NOT NULL,
  `Stats` int(11) NOT NULL DEFAULT '0',
  `Transaction_bill` varchar(500) DEFAULT NULL,
  `Create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`Id`, `Date`, `Payment`, `Stats`, `Transaction_bill`, `Create_at`, `Update_at`) VALUES
(1, '2019-05-31 12:07:13', 120000, 1, 'Albertus Ndaru-2019-05-31 12:07:13', '2019-05-31 05:07:13', '2019-06-02 16:05:30'),
(2, '2019-05-31 17:06:28', 220000, 1, 'Albertus Ndaru-2019-05-31 05:06:28', '2019-05-31 10:06:28', '2019-06-02 16:05:37'),
(3, '2019-05-31 17:09:57', 220000, 1, 'Albertus Ndaru-2019-05-31 17:09:57', '2019-05-31 10:09:57', '2019-06-02 16:05:39'),
(4, '2019-06-02 21:43:10', 480000, 1, 'Albertus Ndaru-2019-06-02 21:43:10', '2019-06-02 14:43:10', '2019-06-02 21:43:34'),
(7, '2019-06-02 22:10:20', 80000, 1, 'Albertus Ndaru-2019-06-02 22:10:20', '2019-06-02 15:10:20', '2019-06-03 10:27:53');

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
(1, 1, 'Samsu', 'pass@word5', 1, '1559744989', '2019-02-28 02:55:49', NULL);

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
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `pembelian_ibfk_1` (`Supliyer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_barang3` (`Category_id`),
  ADD KEY `product_ibfk_2` (`Product_type_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `supliyer`
--
ALTER TABLE `supliyer`
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
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `imageproduct`
--
ALTER TABLE `imageproduct`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supliyer`
--
ALTER TABLE `supliyer`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`Supliyer_id`) REFERENCES `supliyer` (`Id`) ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Category_id`) REFERENCES `category` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`Product_type_id`) REFERENCES `product_type` (`Id`) ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`Usergrup_id`) REFERENCES `usergrup` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
