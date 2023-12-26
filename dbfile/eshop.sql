-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2023 at 11:53 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(6) NOT NULL,
  `itemId` int(6) NOT NULL,
  `userId` int(6) NOT NULL,
  `itemName` varchar(128) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `ItemPicture` varchar(128) NOT NULL,
  `count` int(6) NOT NULL,
  `cartDate` date DEFAULT NULL,
  `cartTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemId` int(10) NOT NULL,
  `itemCatagary` enum('Mobile Phones','Laptops','Tv & Home Appliances','Women Faction','Men Faction','Sports & Outdoor') NOT NULL,
  `itemName` varchar(32) NOT NULL,
  `userId` int(6) NOT NULL,
  `itemPicture` varchar(128) DEFAULT NULL,
  `quntaty` int(6) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `itemaddDate` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemId`, `itemCatagary`, `itemName`, `userId`, `itemPicture`, `quntaty`, `price`, `itemaddDate`) VALUES
(1, 'Mobile Phones', 'Samsung Galaxy A14 LTE', 1, 'item-img/p5.jpg', 10, 58000.00, '2023-10-30'),
(2, 'Mobile Phones', 'Google Pixel 7 Pro', 1, 'item-img/p6.jpg', 20, 198000.00, '2023-10-30'),
(3, 'Mobile Phones', 'Huawei P40 Pro 5G', 1, 'item-img/p7.jpg', 9, 219000.00, '2023-10-30'),
(4, 'Mobile Phones', 'Apple iPhone 15 Pro Max 1TB', 1, 'item-img/p8.jpg', 20, 659900.00, '2023-11-04'),
(5, 'Mobile Phones', 'Tecno Pop 7 2GB RAM 64GB', 1, 'item-img/p9.jpg', 20, 27990.00, '2023-11-04'),
(6, 'Mobile Phones', 'Samsung Galaxy Z Flip 5', 1, 'item-img/p10.jpg', 20, 346900.00, '2023-11-04'),
(7, 'Laptops', 'Lenovo IdeaPad Slim 3 15IRU8 – i', 1, 'item-img/l1.jpg', 5, 155000.00, '2023-10-30'),
(8, 'Laptops', 'MSI Modern 14 C11M – i5', 1, 'item-img/l2.jpg', 6, 180000.00, '2023-10-30'),
(9, 'Laptops', 'Lenovo IdeaPad 3 15ITL6 – i7', 1, 'item-img/l3.jpg', 8, 215000.00, '2023-10-30'),
(10, 'Laptops', 'Asus TUF A17 FA707XI-NS94 Gaming', 1, 'item-img/l5.jpg', 34, 585000.00, '2023-11-04'),
(11, 'Laptops', 'HP ProBook 450 G9 – i7', 1, 'item-img/l4.jpg', 20, 299000.00, '2023-11-04'),
(12, 'Laptops', 'MSI Cyborg 15 A12UCX Gaming – i7', 1, 'item-img/l6.jpg', 20, 334000.00, '2023-11-04'),
(13, 'Women Faction', 'Vneck Short Sleeve Waist Tie Dre', 1, 'item-img/lad 3.webp', 20, 4990.00, '2023-10-30'),
(14, 'Women Faction', 'Twisted Green Printed Chiffon Ma', 1, 'item-img/lad4.webp', 30, 7990.00, '2023-10-30'),
(15, 'Women Faction', 'Mid Skirt Elegant Tied Ruffled D', 1, 'item-img/lad6.webp', 20, 5690.00, '2023-10-30'),
(16, 'Women Faction', 'Tiered Back Tie Blue Printed Dre', 1, 'item-img/lad7.jpg', 20, 6990.00, '2023-11-04'),
(17, 'Women Faction', 'Mini Vneck Overlap Half Sleeve D', 1, 'item-img/lad8.jpg', 20, 5490.00, '2023-11-04'),
(18, 'Women Faction', 'Sleeve Embroidered Red Dress', 1, 'item-img/lad9.jpg', 30, 4690.00, '2023-11-04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(6) NOT NULL,
  `firstName` varchar(32) NOT NULL,
  `lastName` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `userType` enum('user','admin') NOT NULL,
  `profilePic` varchar(128) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `mobileNumber` int(10) DEFAULT NULL,
  `bankAccount` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `firstName`, `lastName`, `email`, `password`, `userType`, `profilePic`, `address`, `mobileNumber`, `bankAccount`) VALUES
(1, 'Tharusha', 'Dileek', 'tharushadileek123@gmail.com', '12345678', 'admin', NULL, NULL, NULL, NULL),
(9, 'Milan1', ' jerad', 'Jeradmilan@gmail.com', '1234', 'user', NULL, NULL, NULL, NULL),
(10, 'Nethmi ', 'Sansala', 'nethu0332264106@gmail.com', '1234', 'admin', NULL, NULL, NULL, NULL),
(11, 'Tineesha ', 'Oshadi', 'tiniy85oshadi@gmail.com', '1234', 'user', NULL, NULL, NULL, NULL),
(12, 'Savidi ', 'vishmindi ', 'ishmindisavidi@gmail.com', '1234', 'user', NULL, NULL, NULL, NULL),
(13, 'uoc', 'uoc', 'uoc', 'uoc', 'user', NULL, NULL, NULL, NULL),
(15, 'dileek', 'dileek', 'dileek@gmail.com', '123', 'user', NULL, NULL, NULL, NULL),
(16, 'dushan', 'dushan', 'dushan@gmail.com', '1234', 'admin', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
