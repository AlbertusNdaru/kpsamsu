-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2019 at 06:41 PM
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
(1, 1, 1, 80000, '2019-06-15 04:47:09', 1, 6, 1, '2019-06-15 04:47:09', NULL),
(2, 2, 1, 80000, '2019-06-17 08:46:35', 1, 6, 1, '2019-06-17 08:46:35', NULL),
(3, 2, 2, 40000, '2019-06-17 08:46:38', 1, 6, 1, '2019-06-17 08:46:38', NULL),
(4, 3, 1, 80000, '2019-06-26 04:23:35', 1, 6, 1, '2019-06-26 04:23:35', NULL),
(5, 3, 6, 40000, '2019-06-26 04:23:35', 1, 6, 1, '2019-06-26 04:23:35', NULL);

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
  `Photo_name` text NOT NULL,
  `Create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imageproduct`
--

INSERT INTO `imageproduct` (`Id`, `Product_id`, `Photo_name`, `Create_at`, `Update_at`) VALUES
(24, 1, 'IMG_20190608091134_Product.jpg', '2019-06-08 02:11:34', NULL),
(26, 6, 'IMG_20190608091320_Product.jpg', '2019-06-08 02:13:20', NULL),
(28, 5, 'IMG_20190609223249_Product.jpg', '2019-06-09 15:32:49', NULL),
(29, 7, 'IMG_20190609223650_Product.jpg', '2019-06-09 15:36:50', NULL),
(30, 2, 'IMG_20190626095533_Product.jpg', '2019-06-26 02:55:33', NULL),
(31, 3, 'IMG_20190626095722_Product.jpg', '2019-06-26 02:57:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `Id` int(11) NOT NULL,
  `NIK` varchar(14) DEFAULT NULL,
  `Nama` varchar(30) DEFAULT NULL,
  `Alamat` varchar(50) DEFAULT NULL,
  `No_hp` varchar(15) DEFAULT NULL,
  `Email` varchar(40) DEFAULT NULL,
  `Create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Update_at` datetime DEFAULT NULL,
  `Jenis_kel` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`Id`, `NIK`, `Nama`, `Alamat`, `No_hp`, `Email`, `Create_at`, `Update_at`, `Jenis_kel`) VALUES
(1, '123456789', 'Samsu', 'Yogyakarta', '081568767567', 'samsu@gmail.com', '2019-06-25 15:38:02', '2019-06-26 09:34:22', 'L'),
(5, '210892210892', 'ss', 'dsadasdad', '1212121212', 'ndarualbert21@gmail.com', '2019-06-26 08:19:21', NULL, 'L');

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
(6, 'Albertus Ndaru', 'ndarualbert21@gmail.com', '212121212121212', 'aku', 'ndaru', 'N', 3, '0', 'Ngentak RT13', 1, 0, '2019-05-29 18:07:22', '2019-06-26 23:17:11'),
(7, 'Albertus Ndaru', 'kasurmabur@gmail.com', '210892', 'apa', 'iya', 'N', 0, '0', 'Ngentak RT13', 155, 6, '2019-06-09 05:55:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `jumlah_beli` int(11) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Supliyer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `id_product`, `price`, `jumlah_beli`, `create_at`, `Supliyer_id`) VALUES
(1, 1, 500000, 4, NULL, 1),
(2, 3, 35000, 3, NULL, 1),
(3, 3, 35000, 20, '2019-06-07 09:46:22', 1),
(4, 5, 35000, 4, '2019-06-07 09:46:27', 1),
(5, 2, 35000, 1, '2019-06-07 10:51:50', 1),
(6, 6, 35000, 10, '2019-06-09 15:33:10', 1),
(7, 7, 40000, 40, '2019-06-26 02:53:35', 1);

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
(1, 'Erigo Start', 1, 'Antik', 80000, 'IMG_20190608091134_Product.jpg', 'Sale', 'Erigo', 1, 550, 500000, '2019-02-28 03:01:33', '2019-06-08 02:11:34'),
(2, 'Test', 1, '123', 40000, 'IMG_20190626095533_Product.jpg', 'New', '12221', 1, 35, 35000, '2019-05-20 04:21:28', '2019-06-26 02:55:33'),
(3, 'Test', 1, 'Nais', 40000, 'IMG_20190626095722_Product.jpg', 'New', '12221', 1, 30, 35000, '2019-05-26 04:53:33', '2019-06-26 02:57:22'),
(5, 'Test 10', 1, '1235', 60000, 'IMG_20190609223249_Product.jpg', 'New', '12221', 1, 20, 35000, '2019-05-31 09:27:42', '2019-06-09 15:32:49'),
(6, 'Test 10', 1, 'Nais', 40000, 'IMG_20190608091320_Product.jpg', 'New', '12221', 1, 6, 35000, '2019-06-08 01:32:30', '2019-06-08 02:13:20'),
(7, 'terter', 1, 'Erigo', 45000, 'IMG_20190609223650_Product.jpg', 'New', 'dfsfsfsfdsfsdf', 1, 40, 40000, '2019-06-09 15:34:14', '2019-06-09 15:36:50');

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
  `Transaction_bill` varchar(500) DEFAULT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Stats` enum('Pending','Success','Sending') NOT NULL DEFAULT 'Pending',
  `Ongkir` int(11) DEFAULT NULL,
  `Payment` int(11) NOT NULL,
  `Resi` varchar(40) DEFAULT NULL,
  `Kurir` varchar(5) DEFAULT NULL,
  `Create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`Id`, `Transaction_bill`, `Date`, `Stats`, `Ongkir`, `Payment`, `Resi`, `Kurir`, `Create_at`, `Update_at`) VALUES
(1, 'Albertus Ndaru-2019-06-15 11:47:23', '2019-06-15 11:47:23', 'Sending', 61000, 80000, 'JNCL-6605028670', 'jne', '2019-06-15 04:47:23', '2019-06-17 15:49:39'),
(2, 'Albertus Ndaru-20190617154657', '2019-06-17 15:46:57', 'Sending', 77000, 120000, 'CP014455112ID', 'pos', '2019-06-17 08:46:57', '2019-06-17 15:49:47'),
(3, 'Albertus Ndaru-20190626112406', '2019-06-26 11:24:06', 'Sending', 61000, 120000, 'JNCL-6605028670', 'jne', '2019-06-26 04:24:06', '2019-06-26 11:25:17');

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
  `pertanyaan` varchar(30) DEFAULT NULL,
  `jawaban` varchar(40) DEFAULT NULL,
  `Create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Update_at` datetime DEFAULT NULL,
  `Karyawan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Usergrup_id`, `Username`, `Password`, `IsLogin`, `LastLogin`, `pertanyaan`, `jawaban`, `Create_at`, `Update_at`, `Karyawan_id`) VALUES
(2, 1, 'Samsu', 'pass@word5', 1, '1561567030', 'Apa', 'Aja', '2019-06-25 15:38:34', NULL, 1),
(3, 1, 'Ndaru', '210892', 0, '1561542681', 'Ndaruuu', 'Alberttt', '2019-06-26 08:20:51', '2019-06-26 21:36:38', 5);

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
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `NIK` (`NIK`);

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
  ADD UNIQUE KEY `Username` (`Username`),
  ADD KEY `Usergrup_id` (`Usergrup_id`),
  ADD KEY `Karyawan_id` (`Karyawan_id`);

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
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `imageproduct`
--
ALTER TABLE `imageproduct`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`Usergrup_id`) REFERENCES `usergrup` (`Id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`Karyawan_id`) REFERENCES `karyawan` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
