-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2022 at 10:45 AM
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
-- Database: `pos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `barcode` varchar(15) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `image` varchar(500) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `description`, `barcode`, `qty`, `amount`, `image`, `user_id`, `views`, `date`) VALUES
(12, 'Burger 1', '123124422', 1, '2.00', 'uploads/fast-food.jpg', 4, 0, '2022-02-18 10:04:33'),
(13, 'Burger 2', '34524543', 1, '3.00', 'uploads/fast-food-1559854913.jpg', 4, 0, '2022-02-18 10:04:57'),
(14, 'Burger 3', '45678345678', 1, '2.30', 'uploads/fast-food-png-most-popular-fast-food-snacks-in-your-area-and-most--3.png', 4, 0, '2022-02-18 10:05:19'),
(15, 'Burger 4', '8765487654', 1, '3.00', 'uploads/1558521918.png', 4, 0, '2022-02-18 10:05:59'),
(16, 'Bur', '3456787654', 1, '3.00', 'uploads/image.jpg', 4, 0, '2022-02-18 10:06:18'),
(17, '34', '2345678', 1, '3.00', 'uploads/sd-aspect-1450109349-12232690-10153780376824489-932156246676940945-o.jpg', 4, 0, '2022-02-18 10:06:31'),
(18, '234567', '23456789', 1, '3.00', 'uploads/7016bc927c7e484b3060b7a99ba5877cf8b06740-00==h400=w400.jpg', 4, 0, '2022-02-18 10:06:46'),
(19, '2345', '234567', 1, '3.00', 'uploads/shutterstock_172259846-740x491.jpg', 4, 0, '2022-02-18 10:06:59'),
(20, '23456', '3456789456', 1, '3.00', 'uploads/images5.jpg', 4, 0, '2022-02-18 10:07:17'),
(21, '234234', '3452345345', 1, '3.00', 'uploads/8d0eada735d7fc9d6abdb4bb800c0fdc46f2a262-00==h400=w400.jpg', 4, 0, '2022-02-18 10:07:32');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` int(11) NOT NULL,
  `barcode` varchar(15) NOT NULL,
  `recipt_no` int(11) NOT NULL,
  `description` text NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `barcode`, `recipt_no`, `description`, `qty`, `amount`, `total`, `date`, `user_id`) VALUES
(36, '1312jkjkasd', 279210875, 'PRODUCT 1', 2, '3.25', '6.50', '2022-02-18 09:13:45', 4),
(37, '1231asdasd', 851273023, 'CRISPS', 1, '0.55', '0.55', '2022-02-18 09:13:56', 4),
(38, '12312hjasd', 851273023, 'COFFEE', 1, '0.50', '0.50', '2022-02-18 09:13:56', 4),
(39, '3456787654', 86013907, 'BUR', 1, '3.00', '3.00', '2022-02-18 10:07:54', 4),
(40, '2345678', 86013907, '34', 1, '3.00', '3.00', '2022-02-18 10:07:54', 4),
(41, '3452345345', 939361337, '234234', 1, '3.00', '3.00', '2022-02-23 10:30:13', 4),
(42, '3456789456', 939361337, '23456', 1, '3.00', '3.00', '2022-02-23 10:30:13', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'cashier',
  `gender` varchar(7) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `role`, `gender`, `date`) VALUES
(4, 'mihailo994', 'mihailo@gmail.com', '$2y$10$no2fGyrg4L6OYMaGVwBv3ODcIqLzsQy5s1MkyM59zm6i1rfOCIL0a', 'admin', 'male', '2022-02-14 12:36:46'),
(7, 'Marko Markovic', 'marko@gmail.com', '$2y$10$DGKtJi5U6tdkSRlQm7M/zOoi7Z2vl4gYRVToeGA1zybMDIaCM3PLW', 'cashier', 'male', '2022-02-23 10:43:44'),
(8, 'Jovan Jovanovic', 'jovan@gmail.com', '$2y$10$D5aFOkNkEDrG401Eg98lzeoBzGDJvXkPzUgeSr0vFc1T7D7FMqpo2', 'cashier', 'male', '2022-02-23 10:44:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `date` (`date`),
  ADD KEY `views` (`views`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`),
  ADD KEY `barcode` (`barcode`),
  ADD KEY `recipt_no` (`recipt_no`),
  ADD KEY `date` (`date`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`),
  ADD KEY `role` (`role`),
  ADD KEY `role_2` (`role`),
  ADD KEY `date` (`date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
