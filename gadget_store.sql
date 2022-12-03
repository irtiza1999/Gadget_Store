-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2022 at 05:39 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gadget_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_content` varchar(255) NOT NULL,
  `commented_by` int(11) NOT NULL,
  `commented_for` int(11) NOT NULL,
  `rating` decimal(11,0) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `commented_by`, `commented_for`, `rating`, `timestamp`) VALUES
(20, 'Good', 16, 1, '4', '2022-11-12 00:48:10'),
(28, 'he', 16, 2, '4', '2022-11-12 01:05:22'),
(29, 'yo', 21, 1, '1', '2022-11-12 13:37:58'),
(30, 'dasdasd', 21, 2, '2', '2022-11-12 13:54:36'),
(31, 'Hey', 21, 3, '2', '2022-11-12 14:06:03'),
(33, 'Good', 21, 12, '3', '2022-11-12 21:58:04'),
(34, 'Very Good', 21, 11, '5', '2022-11-12 21:59:20'),
(36, 'd', 21, 10, '3', '2022-11-12 22:02:43'),
(37, 'ff', 16, 3, '4', '2022-11-18 21:29:39'),
(38, 'OK', 16, 12, '3', '2022-11-27 23:15:53'),
(39, 'dasdasd', 16, 11, '4', '2022-12-01 21:57:11');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_user_id` int(11) DEFAULT NULL,
  `cart` text NOT NULL,
  `bill` int(11) NOT NULL,
  `order_status` varchar(255) NOT NULL DEFAULT 'Not Delivered',
  `payment_status` varchar(25) NOT NULL DEFAULT 'Not Paid',
  `payment_method` varchar(25) NOT NULL,
  `order_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_user_id`, `cart`, `bill`, `order_status`, `payment_status`, `payment_method`, `order_time`) VALUES
(33, 21, '{\"2\":\"2\",\"11\":\"1\"}', 860, 'Complete', 'Paid', 'cod', '2022-11-07 20:13:56'),
(42, 16, '{\"3\":\"1\"}', 599, 'Not Delivered', 'Paid', 'cod', '2022-11-13 03:56:10'),
(50, 21, '{\"12\":\"1\"}', 501, 'Not Delivered', 'Not Paid', 'stripe', '2022-11-13 17:24:40'),
(51, 21, '{\"12\":\"1\"}', 501, 'Not Delivered', 'Not Paid', 'stripe', '2022-11-13 17:26:07'),
(52, 21, '{\"12\":\"1\"}', 501, 'Not Delivered', 'Not Paid', 'stripe', '2022-11-13 17:28:02'),
(53, 21, '{\"12\":\"1\"}', 501, 'Not Delivered', 'Not Paid', 'stripe', '2022-11-13 17:32:16'),
(54, 21, '{\"2\":\"1\"}', 275, 'Not Delivered', 'Paid', 'stripe', '2022-11-13 17:42:31'),
(55, 21, '{\"2\":\"1\",\"10\":\"1\"}', 422, 'Not Delivered', 'Not Paid', 'cod', '2022-11-13 17:43:00'),
(57, 16, '{\"2\":\"1\"}', 275, 'Not Delivered', 'Not Paid', 'cod', '2022-11-13 18:20:21'),
(58, 16, '{\"1\":\"1\"}', 1300, 'Not Delivered', 'Paid', 'stripe', '2022-11-13 18:21:44'),
(59, 16, '{\"10\":\"13\"}', 1729, 'Not Delivered', 'Paid', 'stripe', '2022-11-13 18:30:24'),
(60, 16, '{\"3\":\"1\"}', 599, 'Not Delivered', 'Paid', 'cod', '2022-11-13 18:40:06'),
(61, 21, '{\"1\":\"1\"}', 1300, 'Not Delivered', 'Paid', 'stripe', '2022-11-13 18:55:25'),
(62, 21, '{\"3\":\"1\",\"11\":\"1\"}', 959, 'on the way', 'Paid', 'stripe', '2022-11-14 00:10:10'),
(63, 16, '{\"2\":\"1\",\"12\":\"3\"}', 1615, 'Not Delivered', 'Paid', 'stripe', '2022-11-14 22:30:35'),
(64, 21, '{\"3\":\"1\"}', 599, 'Not Delivered', 'Paid', 'stripe', '2022-11-15 21:18:14'),
(65, 16, '{\"10\":\"1\"}', 147, 'Not Delivered', 'Paid', 'stripe', '2022-11-15 22:16:49'),
(66, 16, '{\"12\":\"1\",\"10\":\"1\",\"1\":\"1\",\"2\":\"1\",\"3\":\"1\",\"11\":\"2\"}', 3457, 'Complete', 'Paid', 'cod', '2022-11-18 20:51:43'),
(67, 16, '{\"3\":\"1\"}', 599, 'Not Delivered', 'Paid', 'stripe', '2022-11-18 21:30:14'),
(68, 16, '{\"3\":\"1\",\"12\":\"1\"}', 1599, 'on the way', 'Paid', 'stripe', '2022-11-19 20:39:08'),
(69, 29, '{\"12\":\"3\",\"2\":\"2\"}', 3500, 'on the way', 'Paid', 'stripe', '2022-11-20 15:42:23'),
(70, 16, '{\"11\":\"2\",\"2\":\"1\"}', 970, 'Complete', 'Paid', 'stripe', '2022-12-01 21:57:59');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_stock` int(11) NOT NULL,
  `product_image` text NOT NULL,
  `product_timestamp` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_category`, `product_price`, `product_stock`, `product_image`, `product_timestamp`) VALUES
(1, 'iPhone 13', 'iPhone 13 has a reachability feature that helps users with small fingers to easily use the smartphone. Using the feature, one can even use the Apple iPhone 13 Pro Max with a massive 6.7-inch display with ease. Apples drag-and-drop feature is way better than the ones in Android', 'PHONE', 1300, 11, 'IMG-63779b6eb90c47.88234885.jpg', '2022-10-12'),
(2, 'AirPods (3rd generation)', 'Engrave a mix of emoji, names, initials, and numbers to make AirPods unmistakably yours. Only at Apple.To purchase with monthly pricing, add this item to your bag and choose to check out with Apple Card Monthly Installments.', 'headphone', 250, 11, 'IMG-63779b7907ee59.15722486.jpg', '2022-10-12'),
(3, 'Galaxy S22 Ultra (5G)', 'AMEX, EBL, Standard Chartered, Dhaka Bank, DBBL, Bank Asia, Southeast Bank, NRB, MTB, Trust Bank, Jamuna Bank, Standard Bank, UCB, Dhaka Bank.', 'phone', 599, 13, 'IMG-63779b80d17966.40755048.jpg', '2022-10-12'),
(10, 'Apple Watch SE (2nd Gen)', 'Take calls and reply to texts, right from your wrist Up to 20% faster than the previous Apple Watch SE Advanced safety features, including Fall Detection, Emergency SOS, and Crash Detection Track your daily activity on Apple Watch.', 'SMARTWATCH', 133, 34, 'IMG-63779b8914c6f6.94006241.jpg', '2022-11-02'),
(11, 'Redmi 10 (6GB/64GB)', 'NO RETURN applicable if the seal is broken Prices are subject to change upon direction on 5% VAT from Government Display:6.5', 'Phone', 360, 40, 'IMG-63779b926b7af0.14921083.jpg', '2022-11-04'),
(12, 'Hp Laptop', 'Good Laptop', 'Laptop', 1000, 23, 'IMG-6377a34344f041.01807443.jpg', '2022-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_phone_no` text NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user',
  `user_created_timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_address`, `user_phone_no`, `user_type`, `user_created_timestamp`) VALUES
(16, 'admin', 'admin@admin.com', '$2y$10$PL4T6qMtdhzh510TOUT5De3VTeKh2gYupfOmbMCoCyY5SXSFM2n6i', 'admin', '1234', 'admin', '2022-10-25 23:17:33'),
(21, 'irtiza3', 'irtiza@irti.com', '$2y$10$.JOZdZrhpiAULZ6YzvTUQuIBjESbbeRuECf.bdIOUyaqY5XBBjAzK', 'khilgoan mor', '1234', 'user', '2022-11-03 15:55:27'),
(29, 'temp', 'temp@temp.com', '$2y$10$vDyQT2XTtoJ22uL36uVjVuNfEmI8h79U.JqyWK1XdpE4mORuIYX42', 'malibag', '014444444', 'user', '2022-11-20 15:41:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `id` (`commented_by`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_user_id` (`order_user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);
ALTER TABLE `products` ADD FULLTEXT KEY `product_name` (`product_name`);
ALTER TABLE `products` ADD FULLTEXT KEY `product_description` (`product_description`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `id` FOREIGN KEY (`commented_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `order_user_id` FOREIGN KEY (`order_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
