-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2022 at 03:52 PM
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
(16, 10, '{\"2\":\"1\"}', 142, 'Not Delivered', 'Not Paid', 'Cash On Delivery', '2022-10-20 20:45:17'),
(17, 15, '{\"1\":\"1\",\"2\":\"2\", \"3\":\"3\"}', 1687, 'Complete', 'Paid', 'Cash On Delivery', '2022-10-20 21:44:32'),
(18, 10, '{\"3\":\"1\"}', 500, 'On The Way', 'Paid', 'Cash On Delivery', '2022-10-22 01:07:04'),
(19, 10, '{\"3\":\"1\"}', 500, 'Complete', 'Not Paid', 'cod', '2022-10-23 22:22:28'),
(20, 16, '{\"3\":\"2\",\"1\":\"1\",\"2\":\"1\"}', 2429, 'Not Delivered', 'Not Paid', 'cod', '2022-10-26 22:15:12'),
(21, 16, '{\"3\":\"1\"}', 500, 'Not Delivered', 'Not Paid', 'cod', '2022-10-30 16:43:22'),
(22, 10, '{\"1\":\"2\"}', 2600, 'Not Delivered', 'Not Paid', 'cod', '2022-11-01 00:24:08');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `payment_amount` float NOT NULL,
  `currency_code` varchar(5) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `invoice_id` varchar(50) NOT NULL,
  `payment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'iPhone 13', 'iPhone 13 has a reachability feature that helps users with small fingers to easily use the smartphone. Using the feature, one can even use the Apple iPhone 13 Pro Max with a massive 6.7-inch display with ease. Apples drag-and-drop feature is way better than the ones in Android', 'phone', 1300, 8, 'https://www.apple.com/newsroom/images/product/iphone/standard/Apple_iphone13_hero_09142021_inline.jpg.large.jpg', '2022-10-12'),
(2, 'AirPods (2nd generation)', 'Engrave a mix of emoji, names, initials, and numbers to make AirPods unmistakably yours. Only at Apple.\r\nTo purchase with monthly pricing, add this item to your bag and choose to check out with Apple Card Monthly Installments.', 'headphone', 129, 10, 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/MV7N2?wid=572&hei=572&fmt=jpeg&qlt=95&.v=1551489688005', '2022-10-12'),
(3, 'Galaxy S22 Ultra', 'AMEX, EBL, Standard Chartered, Dhaka Bank, DBBL, Bank Asia, Southeast Bank, NRB, MTB, Trust Bank, Jamuna Bank, Standard Bank, UCB, Dhaka Bank.', 'phone', 500, 10, 'https://assets.hardwarezone.com/img/2022/02/IMG_7640.jpg', '2022-10-12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` int(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_phone_no` text NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user',
  `user_created_timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_address`, `user_phone_no`, `user_type`, `user_created_timestamp`) VALUES
(10, 'Ishad', 'md.irtiza.hossain@g.bracu.ac.bd', 1, '181, Shaplakanon, East-Rajarbag, Shabujbag, Basabo. (কালিবারি শ্মশান গেট)', '+8801795480034', 'admin', '2022-10-11 23:44:29'),
(14, 'u12', 'u1@u1.com', 1, 'Nilkhet', '+8801795480034', 'user', '2022-10-19 22:51:05'),
(16, 'admin', 'admin@admin.com', 1234, 'admin', '1234', 'admin', '2022-10-25 23:17:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
