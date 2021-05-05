-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2021 at 09:58 PM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `payment_confirmation` varchar(64) DEFAULT NULL,
  `status` enum('cart','paid','shipped','delivered') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `profile_id`, `payment_confirmation`, `status`) VALUES
(9, 3, 'confirmed', 'delivered'),
(10, 3, 'confirmed', 'paid'),
(11, 4, 'confirmed', 'paid'),
(12, 3, 'confirmed', 'paid'),
(13, 3, 'Not confirmed', 'cart');

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `orders_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`orders_detail_id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(28, 9, 1, 1, '5.00'),
(29, 9, 3, 2, '1.00'),
(30, 11, 1, 1, '5.00'),
(31, 11, 3, 1, '1.00'),
(32, 11, 4, 1, '3.00'),
(33, 10, 1, 5, '5.00'),
(34, 12, 1, 5, '5.00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(64) NOT NULL,
  `image` varchar(64) NOT NULL,
  `qoh` int(11) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `sales` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `description`, `image`, `qoh`, `price`, `sales`) VALUES
(1, 'Milk', 'Nothing compares to a cold glass of fresh Natrel Milk.', '608f196a7c451.jpg', 0, '5.00', 12),
(3, 'Water', 'The 1.5 L bottle is a great way to make sure your family always.', '608f198416a56.jpg', 30, '1.00', 3),
(4, 'Juice', 'Minute Maid Light Lemonade. A Squeeze Above The Rest.', '608f188a3b2b2.jpg', 15, '3.00', 1),
(5, 'Apple', 'Great for snacking, sauces, salads and baking.', '608f18e177fcd.jpg', 25, '1.00', 0),
(6, 'Banana', 'Soft, sweet and delicious, the banana is a popular choice.', '608f13b49b631.jpg', 15, '1.00', 0),
(7, 'Orange', 'Sweet, juicy and seedless.', '608f13e6d9063.jpg', 15, '1.00', 0),
(8, 'Shampoo', 'Pantene Pro-V Daily Moisture Renewal Shampoo puts in more than i', '608f3a479464d.jpg', 10, '5.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profile_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `phone` char(16) NOT NULL,
  `address` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `user_id`, `first_name`, `last_name`, `phone`, `address`) VALUES
(1, 1, 'Admin', 'Admin', '514-123-4567', 'Vanier College'),
(2, 2, 'Jhann', 'Quiambao', '514-123-4567', 'Vanier College'),
(3, 3, 'Minh', 'Thien', '5145760435', '6390 Av Mountain Sights'),
(4, 4, 'Tran', 'Tran', '1234567890', 'somewhere');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `profile_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` varchar(16) NOT NULL,
  `review` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`profile_id`, `product_id`, `rating`, `review`) VALUES
(3, 1, '5', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password_hash` varchar(256) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password_hash`, `role`) VALUES
(1, 'admin', '$2y$10$l/WJ2iUgqfN7P.euKze4Z.0hLE36nfYmAmArOaR0MpgL0BQqmJwxe', 'admin'),
(2, 'jhann', '$2y$10$wG/dmGYEIv/hivdLVBk4s.PYkW3oU18d9/cm/UDpkm2H4kx0u3aqO', 'user'),
(3, 'MinhThien', '$2y$10$LHSbz4WNPHXUrTHnZ5UNZ.6BXP5jmNsNvX4uYBp3AMnQhUO2OLnxm', 'user'),
(4, 'Tran', '$2y$10$iTLHxICbj4rGOhuQLPB68O64dt5kJOsVYVLbk0KgW.YgR45gOa4ZC', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `orders_to_profile` (`profile_id`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`orders_detail_id`),
  ADD KEY `orders_detail_to_order` (`order_id`),
  ADD KEY `orders_detail_to_product` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `profile_to_user` (`user_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`profile_id`,`product_id`),
  ADD KEY `review_to_product` (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `orders_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_to_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);

--
-- Constraints for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD CONSTRAINT `orders_detail_to_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `orders_detail_to_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_to_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_to_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `review_to_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
