-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2021 at 08:03 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cozastore`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `Id` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Datecreate` int(11) DEFAULT NULL,
  `imagesurl` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`Id`, `Title`, `Type`, `Datecreate`, `imagesurl`) VALUES
(1, 'Women Collection 2021', 'NEW SEASON', 1632991370, 'banner-01.jpg'),
(2, 'Men Collection 2021', 'Jackets & Coats', 1632991370, 'banner-02.jpg'),
(3, 'Men Collection 2021', 'New arrivals', 1632991370, 'banner-03.jpg'),
(4, 'NEW TREND', 'Play better than', 1632991765, 'banner-04.jpg'),
(5, 'NEW SEASON FASHION WEEK 2021', 'NEW TREND', 1632991765, 'banner-05.jpg'),
(6, 'VIET NAM FASHION WEEK 20/2021', 'COLLECTION', 1632991765, 'banner-06.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `categoryname` varchar(20) NOT NULL,
  `category_parentid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID`, `categoryname`, `category_parentid`) VALUES
(1, 'Women', 0),
(2, 'Men', 0),
(3, 'Bag', 0),
(4, 'Watches', 0),
(5, 'Shoes', 0),
(6, 'children', 2),
(7, 'oldman', 2),
(8, 'matureman', 2);

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` int(11) NOT NULL,
  `Code` varchar(255) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Money` varchar(50) DEFAULT NULL,
  `Percent` int(11) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `imgproductdetail`
--

CREATE TABLE `imgproductdetail` (
  `id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `nameimg` varchar(255) DEFAULT NULL,
  `datecreate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imgproductdetail`
--

INSERT INTO `imgproductdetail` (`id`, `productid`, `nameimg`, `datecreate`) VALUES
(1, 1, 'product-08.jpg', 1633580212),
(2, 1, 'product-detail-02.jpg', 1633580212),
(3, 1, 'product-05.jpg', 1633580212),
(4, 2, 'product-15.jpg', 1633580212),
(5, 2, 'product-16.jpg', 1633580212),
(6, 2, 'product-11.jpg', 1633580212);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `emailAdress` varchar(255) DEFAULT NULL,
  `phonenumber` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `fullname`, `emailAdress`, `phonenumber`, `password`) VALUES
(1, 'Nguyen Duy', 'duy26395@gmail.com', '0909090909', '$2y$10$TGAyjTU8hFuZ1pite0yB9estVBuE50O7q9n6jdTsnGdoSOQ4QKMrS'),
(2, 'duynguyen', 'test@gmail.com', '', '$2y$10$w0QU7BURwPAPt8vXiyow/ueInVfUuysZbxmsYltJmN38YmlatOoNu'),
(3, 'duynguyen', 'sktt1@gmail.com', '', '$2y$10$R6Gsl8pYCmbKF/ppw39e0OYyd2fjdqh76Ql7FJ9aEpL69mhj8JimO'),
(4, 'test hjvjhvh', 'duy@gmail.com', NULL, '$2y$10$uGHXqPUMQF3J13f.8OnkiuHF0oZ75kI9az7A51lVIFr2Y2T9Wrqpe');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `membersid` int(11) DEFAULT NULL,
  `totalcost` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `Datecreate` varchar(20) DEFAULT NULL,
  `adress` varchar(255) NOT NULL,
  `phonenumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ID`, `membersid`, `totalcost`, `status`, `Datecreate`, `adress`, `phonenumber`) VALUES
(18, 4, 1463000, 'Wait', '1635742960', '-HA NOI-HA NOI-HUE', '0914200244'),
(19, 4, 1463000, 'Wait', '1635743043', '-HUE-HUE-HA NOI', '0914200244'),
(20, 4, 1463000, 'Wait', '1635748101', '-HUE-HUE-HA NOI', '0898432695'),
(21, 4, 1463000, 'Wait', '1635748125', '-HUE-HUE-HA NOI', '0898432695'),
(22, 4, 1463000, 'Wait', '1635748160', '-DA NANG-HA NOI-HUE', '0898432695');

-- --------------------------------------------------------

--
-- Table structure for table `ordersdetail`
--

CREATE TABLE `ordersdetail` (
  `ID` int(11) NOT NULL,
  `Ordersid` int(11) DEFAULT NULL,
  `productid` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `size` varchar(10) NOT NULL,
  `color` varchar(10) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordersdetail`
--

INSERT INTO `ordersdetail` (`ID`, `Ordersid`, `productid`, `quantity`, `size`, `color`, `description`) VALUES
(15, 19, 8, 1, 'L', 'White', ''),
(16, 19, 17, 1, 'M', 'White', ''),
(17, 19, 13, 1, 'S', 'Red', ''),
(18, 19, 4, 1, 'M', 'Red', ''),
(19, 19, 4, 1, 'XL', 'Red', ''),
(20, 19, 10, 1, 'M', 'White', ''),
(21, 19, 3, 1, 'XL', 'Red', ''),
(22, 20, 8, 1, 'L', 'White', ''),
(23, 20, 17, 1, 'M', 'White', ''),
(24, 20, 13, 1, 'S', 'Red', ''),
(25, 20, 4, 1, 'M', 'Red', ''),
(26, 20, 4, 1, 'XL', 'Red', ''),
(27, 20, 10, 1, 'M', 'White', ''),
(28, 20, 3, 1, 'XL', 'Red', ''),
(29, 21, 8, 1, 'L', 'White', ''),
(30, 21, 17, 1, 'M', 'White', ''),
(31, 21, 13, 1, 'S', 'Red', ''),
(32, 21, 4, 1, 'M', 'Red', ''),
(33, 21, 4, 1, 'XL', 'Red', ''),
(34, 21, 10, 1, 'M', 'White', ''),
(35, 21, 3, 1, 'XL', 'Red', ''),
(36, 22, 8, 1, 'L', 'White', ''),
(37, 22, 17, 1, 'M', 'White', ''),
(38, 22, 13, 1, 'S', 'Red', ''),
(39, 22, 4, 1, 'M', 'Red', ''),
(40, 22, 4, 1, 'XL', 'Red', ''),
(41, 22, 10, 1, 'M', 'White', ''),
(42, 22, 3, 1, 'XL', 'Red', '');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_reset_temp`
--

INSERT INTO `password_reset_temp` (`id`, `email`, `key`, `expDate`) VALUES
(41, 'duy26395@gmail.com', 'ghGybEKuQZN4', '2021-10-21 16:40:43'),
(42, 'duy26395@gmail.com', 'RnLFpSDCgeXz', '2021-10-21 17:22:55'),
(43, 'duy26395@gmail.com', 'hPC4DMf6iRgQ', '2021-10-21 17:23:54'),
(44, 'test@gmail.com', 'EC9W25a6iezD', '2021-10-22 10:46:43'),
(45, 'duy26395@gmail.com', '2icTa4juMAEp', '2021-10-22 11:11:07'),
(46, 'duy26395@gmail.com', 'CfwZMr3JEpP2', '2021-10-22 11:12:10'),
(47, 'duy26395@gmail.com', 'L2XKB68TwsqU', '2021-10-22 11:12:49'),
(48, 'duy26395@gmail.com', 'JNfZ8ESmMzpn', '2021-10-22 11:17:12'),
(49, 'duy26395@gmail.com', 'ljAaifgL36dU', '2021-10-22 11:25:07'),
(50, 'duy26395@gmail.com', 'HtyznRTpwYMk', '2021-10-22 11:26:06'),
(51, 'duy26395@gmail.com', 'Euw2gyK7LRkP', '2021-10-22 11:27:29'),
(52, 'duy26395@gmail.com', 'yzl9PA6fRnca', '2021-10-22 11:27:46'),
(53, 'duy26395@gmail.com', 'jY5F3erqNCi9', '2021-10-22 11:32:49'),
(54, 'duy26395@gmail.com', 'MmKBneb3Az95', '2021-10-22 18:23:04'),
(55, 'duy26395@gmail.com', '3AWfbj9LcwEd', '2021-10-22 19:17:59'),
(56, 'duy26395@gmail.com', '3KftTaCwJ6XY', '2021-10-22 19:36:23');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `Productcompany` varchar(50) NOT NULL,
  `Productname` varchar(255) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Price` varchar(10) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `productimg` varchar(255) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `Datecreate` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `Productcompany`, `Productname`, `Description`, `Price`, `quantity`, `productimg`, `categoryid`, `Datecreate`) VALUES
(1, 'MC Company', 'Esprit Ruffle Shirt', 'Esprit Long Sleeve Jabot Ruffle Shirt Womens Size L Gray Mandarin Collar Blouse', '500000', 10, 'product-01.jpg', 1, '1633164210'),
(2, 'CHEL Store', 'Herschel supply', 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.', '400000', 5, 'product-02.jpg', 2, '1633164210'),
(3, 'OnlyTrouser', 'Front Pocket Jumper', 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.', '200000', 5, 'product-03.jpg', 2, '1633164210'),
(4, 'OnlyTrouser', 'Pretty Little Thing', 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.', '250000', 5, 'product-04.jpg', 3, '1633164210'),
(5, 'MC Company', 'Esprit Ruffle Shirt', 'Esprit Long Sleeve Jabot Ruffle Shirt Womens Size L Gray Mandarin Collar Blouse', '500000', 10, 'product-01.jpg', 2, '1633164210'),
(6, 'CHEL Store', 'Herschel supply', 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.', '450000', 5, 'product-02.jpg', 2, '1633164210'),
(7, 'OnlyTrouser', 'Front Pocket Jumper', 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.', '250000', 5, 'product-03.jpg', 2, '1633164210'),
(8, 'OnlyTrouser', 'Pretty Little Thing', 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.', '215000', 5, 'product-04.jpg', 3, '1633164210'),
(9, 'MC Company', 'Esprit Ruffle Shirt', 'Esprit Long Sleeve Jabot Ruffle Shirt Womens Size L Gray Mandarin Collar Blouse', '299000', 10, 'product-01.jpg', 4, '1633164210'),
(10, 'CHEL Store', 'Herschel supply', 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.', '150000', 5, 'product-02.jpg', 2, '1633164210'),
(11, 'OnlyTrouser', 'Front Pocket Jumper', 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.', '1990000', 5, 'product-03.jpg', 2, '1633164210'),
(12, 'OnlyTrouser', 'Pretty Little Thing', 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.', '115000', 5, 'product-04.jpg', 3, '1633164210'),
(13, 'MC Company', 'Esprit Ruffle Shirt', 'Esprit Long Sleeve Jabot Ruffle Shirt Womens Size L Gray Mandarin Collar Blouse', '199000', 10, 'product-01.jpg', 1, '1633164210'),
(14, 'CHEL Store', 'Herschel supply', 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.', '160000', 5, 'product-02.jpg', 2, '1633164210'),
(15, 'OnlyTrouser', 'Front Pocket Jumper', 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.', '1900000', 5, 'product-03.jpg', 2, '1633164210'),
(16, 'OnlyTrouser', 'Pretty 123 Little Thing', 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.', '215000', 5, 'product-04.jpg', 3, '1633164210'),
(17, 'MC Company', 'Esprit Ruffle Shirt', 'Esprit Long Sleeve Jabot Ruffle Shirt Womens Size L Gray Mandarin Collar Blouse', '199000', 10, 'product-01.jpg', 1, '1633164210'),
(18, 'CHEL Store', 'Herschel supply', 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.', '160000', 5, 'product-02.jpg', 2, '1633164210'),
(19, 'OnlyTrouser', 'Front 123 Pocket Jumper', 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.', '1900000', 5, 'product-03.jpg', 2, '1633164210'),
(20, 'OnlyTrouser', 'Pretty Little Thing', 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.', '215000', 5, 'product-04.jpg', 3, '1633164210');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `Id` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Datecreate` int(11) DEFAULT NULL,
  `imagesurl` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`Id`, `Title`, `Type`, `Datecreate`, `imagesurl`) VALUES
(1, 'Women Collection 2021', 'NEW SEASON', 1632991370, 'slide-01.jpg'),
(2, 'Men Collection 2021', 'Jackets & Coats', 1632991370, 'slide-02.jpg'),
(3, 'Men Collection 2021', 'New arrivals', 1632991370, 'slide-03.jpg'),
(4, 'NEW TREND', 'Play better than', 1632991765, 'slide-04.jpg'),
(5, 'NEW SEASON FASHION WEEK 2021', 'NEW TREND', 1632991765, 'slide-05.jpg'),
(6, 'VIET NAM FASHION WEEK 20/2021', 'COLLECTION', 1632991765, 'slide-06.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imgproductdetail`
--
ALTER TABLE `imgproductdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `membersid` (`membersid`);

--
-- Indexes for table `ordersdetail`
--
ALTER TABLE `ordersdetail`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Ordersid` (`Ordersid`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `password_reset_temp`
--
ALTER TABLE `password_reset_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `categoryid` (`categoryid`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imgproductdetail`
--
ALTER TABLE `imgproductdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `ordersdetail`
--
ALTER TABLE `ordersdetail`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `password_reset_temp`
--
ALTER TABLE `password_reset_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `imgproductdetail`
--
ALTER TABLE `imgproductdetail`
  ADD CONSTRAINT `imgproductdetail_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `product` (`ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`membersid`) REFERENCES `members` (`id`);

--
-- Constraints for table `ordersdetail`
--
ALTER TABLE `ordersdetail`
  ADD CONSTRAINT `ordersdetail_ibfk_1` FOREIGN KEY (`Ordersid`) REFERENCES `orders` (`ID`),
  ADD CONSTRAINT `ordersdetail_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `product` (`ID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`categoryid`) REFERENCES `category` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
