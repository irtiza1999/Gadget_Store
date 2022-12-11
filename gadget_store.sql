-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 08:51 AM
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
(43, 'Good', 21, 2, '4', '2022-12-04 00:43:54'),
(44, 'Good', 21, 11, '5', '2022-12-04 00:45:36'),
(45, 'Nice Design', 21, 21, '5', '2022-12-04 21:07:40'),
(46, 'Good Quality!!', 31, 21, '5', '2022-12-07 02:23:21'),
(47, 'Good Product', 31, 10, '5', '2022-12-07 02:23:49'),
(48, 'Good Product', 31, 1, '3', '2022-12-07 02:23:56'),
(49, 'Good Product', 31, 3, '5', '2022-12-07 02:24:09');

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
(58, 16, '{\"1\":\"1\"}', 1300, 'on the way', 'Paid', 'stripe', '2022-11-13 18:21:44'),
(59, 16, '{\"10\":\"13\"}', 1729, 'Not Delivered', 'Paid', 'stripe', '2022-11-13 18:30:24'),
(60, 16, '{\"3\":\"1\"}', 599, 'Not Delivered', 'Paid', 'cod', '2022-11-13 18:40:06'),
(61, 21, '{\"1\":\"1\"}', 1300, 'Not Delivered', 'Paid', 'stripe', '2022-11-13 18:55:25'),
(62, 21, '{\"3\":\"1\",\"11\":\"1\"}', 959, 'on the way', 'Paid', 'stripe', '2022-11-14 00:10:10'),
(63, 16, '{\"2\":\"1\",\"12\":\"3\"}', 1615, 'Not Delivered', 'Paid', 'stripe', '2022-11-14 22:30:35'),
(64, 21, '{\"3\":\"1\"}', 599, 'Not Delivered', 'Paid', 'stripe', '2022-11-15 21:18:14'),
(65, 16, '{\"10\":\"1\"}', 147, 'on the way', 'Paid', 'stripe', '2022-11-15 22:16:49'),
(66, 16, '{\"12\":\"1\",\"10\":\"1\",\"1\":\"1\",\"2\":\"1\",\"3\":\"1\",\"11\":\"2\"}', 3457, 'Complete', 'Paid', 'cod', '2022-11-18 20:51:43'),
(67, 16, '{\"3\":\"1\"}', 599, 'Not Delivered', 'Paid', 'stripe', '2022-11-18 21:30:14'),
(68, 16, '{\"3\":\"1\",\"12\":\"1\"}', 1599, 'Complete', 'Paid', 'stripe', '2022-11-19 20:39:08'),
(69, 29, '{\"12\":\"3\",\"2\":\"2\"}', 3500, 'Complete', 'Paid', 'stripe', '2022-11-20 15:42:23'),
(70, 16, '{\"11\":\"2\",\"2\":\"1\"}', 970, 'Complete', 'Paid', 'stripe', '2022-12-01 21:57:59'),
(71, 21, '{\"21\":\"1\"}', 700, 'Not Delivered', 'Not Paid', 'cod', '2022-12-04 21:08:21'),
(72, 31, '{\"2\":\"1\"}', 275, 'Not Delivered', 'Paid', 'stripe', '2022-12-10 17:15:36'),
(73, 31, '{\"2\":\"4\"}', 1000, 'Not Delivered', 'Paid', 'stripe', '2022-12-10 17:16:11'),
(74, 31, '{\"2\":\"4\"}', 1000, 'Not Delivered', 'Not Paid', 'cod', '2022-12-10 17:26:44'),
(75, 31, '{\"2\":\"4\"}', 1000, 'Not Delivered', 'Not Paid', 'cod', '2022-12-10 17:27:35'),
(78, 31, '{\"21\":\"10\",\"10\":\"12\"}', 8596, 'Complete', 'Paid', 'cod', '2022-12-10 17:47:52'),
(79, 31, '{\"1\":\"4\"}', 5400, 'Complete', 'Paid', 'cod', '2022-12-10 21:01:37');

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
(1, 'iPhone 13', 'iPhone 13 has a reachability feature that helps users with small fingers to easily use the smartphone. Using the feature, one can even use the Apple iPhone 13 Pro Max with a massive 6.7-inch display with ease. Apples drag-and-drop feature is way better than the ones in Android', 'PHONE', 1350, 15, 'IMG-6394a71797cfc4.60604395.jpg', '2022-10-12'),
(2, 'AirPods (3rd generation)', 'Engrave a mix of emoji, names, initials, and numbers to make AirPods unmistakably yours. Only at Apple.To purchase with monthly pricing, add this item to your bag and choose to check out with Apple Card Monthly Installments.', 'headphone', 250, 0, 'IMG-6394a62da0b138.62347501.jpg', '2022-10-12'),
(3, 'Galaxy S22 Ultra (5G)', 'AMEX, EBL, Standard Chartered, Dhaka Bank, DBBL, Bank Asia, Southeast Bank, NRB, MTB, Trust Bank, Jamuna Bank, Standard Bank, UCB, Dhaka Bank.', 'phone', 599, 12, 'IMG-63779b80d17966.40755048.jpg', '2022-10-12'),
(10, 'Apple Watch SE (2nd Gen)', 'Take calls and reply to texts, right from your wrist Up to 20% faster than the previous Apple Watch SE Advanced safety features, including Fall Detection, Emergency SOS, and Crash Detection Track your daily activity on Apple Watch.', 'SMARTWATCH', 133, 20, 'IMG-6394a65d6bd1e9.70222872.jpg', '2022-11-02'),
(11, 'Redmi 10 (6GB/64GB)', 'NO RETURN applicable if the seal is broken Prices are subject to change upon direction on 5% VAT from Government Display:6.5', 'Phone', 360, 40, 'IMG-6394a2d0a6ae03.51824258.jpg', '2022-11-04'),
(21, 'Apple MacBook Air 13.3-Inch', 'Intel Core i5 10th Gen (1.1GHz up to 3.5GHz) 13.3-inch (diagonal) Retina LED-backlit display with IPS technology; 2560-by-1600 native resolution at 227 pixels per inch with support for millions of colors', 'Laptop', 700, 40, 'IMG-638ca5438aecd8.73418324.jpg', '2022-12-04'),
(22, 'BEATS Fit Pro True Wireless Noise Cancelling Earbuds', 'Beats Fit Pro is one of the best TWS in recent days. Focus on the comfortness of the users, it is built with some extremely great features.      You are surely amazed with its spectacular sound quality and long battery back up. Comes with the latest Apple H1 chips, it is fit with your android though.     Beside comfort, its mesmerizing design and easy to carry features definitely  attract you to have one.', 'Headphone', 180, 10, 'IMG-6394a7d5ec0b35.55066650.jpg', '2022-12-10'),
(23, 'Huawei MateBook D14 Core i5 11th Gen', 'Specialty The 3-sided bezel around HUAWEI MateBook D 14 is slimmed down to a super-narrow 4.8 mm. More screen, more of what you love to see.', 'Laptop', 700, 10, 'IMG-6394a84e4f35a4.24021077.jpg', '2022-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL,
  `request_user_id` int(11) NOT NULL,
  `request_product_name` text NOT NULL,
  `request_product_id` int(255) DEFAULT NULL,
  `request_catagory` varchar(255) NOT NULL,
  `request_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `request_user_id`, `request_product_name`, `request_product_id`, `request_catagory`, `request_time`) VALUES
(13, 16, 'Iphone 10', NULL, 'PHONE', '2022-12-04 22:06:48'),
(14, 16, 'Apple', 21, 'LAPTOP', '2022-12-04 22:07:01'),
(15, 31, 'Apple', 21, 'LAPTOP', '2022-12-07 02:22:59'),
(16, 16, 'AirPods', 2, 'HEADPHONE', '2022-12-10 21:44:39');

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
(29, 'temp', 'temp@temp.com', '$2y$10$vDyQT2XTtoJ22uL36uVjVuNfEmI8h79U.JqyWK1XdpE4mORuIYX42', 'malibag', '014444444', 'user', '2022-11-20 15:41:47'),
(31, 'Ishad', 'mdirtiza.hossain1999@gmail.com', '$2y$10$XwZMKkmDAij3togTVeOLIu9Onic6ca7mHo2Mw1mjR0mgv8yyJC9bS', '181, Shaplakanon', '+8801795480034', 'user', '2022-12-07 02:22:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`commented_by`),
  ADD KEY `id` (`commented_for`);

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
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `request_product_id` (`request_product_id`),
  ADD KEY `request_user_id` (`request_user_id`);

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
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `id` FOREIGN KEY (`commented_for`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`commented_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `order_user_id` FOREIGN KEY (`order_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`request_product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`request_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
