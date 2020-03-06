-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 06, 2020 at 04:49 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafeteria`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'drinks', '2020-02-21 22:00:00', '2020-02-21 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `product_id` int(255) DEFAULT NULL,
  `user_id` int(255) DEFAULT NULL,
  `total_price` int(255) DEFAULT NULL,
  `notes` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `status`, `product_id`, `user_id`, `total_price`, `notes`, `created_at`, `updated_at`) VALUES
(15, '0', NULL, NULL, 50, 'sddsd', '2020-02-22 18:40:51', '2020-02-22 18:40:51'),
(16, '0', NULL, NULL, 91, '', '2020-02-22 19:03:38', '2020-02-22 19:03:38'),
(17, '0', NULL, NULL, 24, 'saas', '2020-02-22 19:12:32', '2020-02-22 19:12:32'),
(18, '0', NULL, NULL, 7, 'ds', '2020-02-22 19:12:40', '2020-02-22 19:12:40'),
(20, '0', NULL, NULL, 200, 'note', '2020-02-22 18:39:54', '2020-02-22 18:39:54'),
(21, '0', NULL, NULL, 200, 'note', '2020-02-22 18:39:54', '2020-02-22 18:39:54'),
(22, NULL, NULL, NULL, 5, 'note', '2020-02-27 04:50:58', '2020-02-27 04:50:58'),
(23, NULL, NULL, NULL, 5, 'note', '2020-02-27 04:51:07', '2020-02-27 04:51:07'),
(24, NULL, NULL, NULL, 5, 'note', '2020-02-27 06:28:45', '2020-02-27 06:28:45'),
(25, NULL, NULL, NULL, 5, 'note', '2020-02-27 06:30:00', '2020-02-27 06:30:00'),
(26, NULL, NULL, NULL, 5, 'note', '2020-02-27 06:34:00', '2020-02-27 06:34:00'),
(27, NULL, NULL, NULL, 5, 'note', '2020-02-27 06:50:47', '2020-02-27 06:50:47'),
(28, NULL, NULL, NULL, 5, 'note', '2020-02-27 06:52:17', '2020-02-27 06:52:17'),
(29, NULL, NULL, NULL, 5, 'note', '2020-02-27 06:53:08', '2020-02-27 06:53:08'),
(30, NULL, NULL, NULL, 5, 'note', '2020-02-27 06:54:04', '2020-02-27 06:54:04'),
(31, NULL, NULL, NULL, 5, 'note', '2020-02-27 06:56:30', '2020-02-27 06:56:30'),
(32, NULL, NULL, NULL, 5, 'note', '2020-02-27 06:57:49', '2020-02-27 06:57:49'),
(33, NULL, NULL, NULL, 5, 'note', '2020-02-27 06:58:34', '2020-02-27 06:58:34'),
(34, NULL, NULL, NULL, 5, 'note', '2020-02-27 07:08:39', '2020-02-27 07:08:39'),
(35, NULL, NULL, NULL, 5, 'note', '2020-02-27 07:10:25', '2020-02-27 07:10:25'),
(36, NULL, NULL, NULL, 25, 'test', '2020-02-27 07:11:37', '2020-02-27 07:11:37'),
(37, NULL, NULL, NULL, 25, 'test', '2020-02-27 07:23:24', '2020-02-27 07:23:24'),
(38, NULL, NULL, NULL, 25, 'test', '2020-02-27 07:25:49', '2020-02-27 07:25:49'),
(39, NULL, NULL, NULL, 25, 'test', '2020-02-27 07:28:16', '2020-02-27 07:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `price` int(255) NOT NULL,
  `picture` varchar(255) COLLATE utf8_bin NOT NULL,
  `category_id` int(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `picture`, `category_id`, `created_at`, `updated_at`) VALUES
(2, 'Coffee', 7, 'upload/coffee.png', 1, '2020-02-21 22:00:00', '2020-02-21 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `roomNo` int(255) NOT NULL,
  `ext` int(255) NOT NULL,
  `picture` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `privilege` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `roomNo`, `ext`, `picture`, `privilege`, `created_at`, `updated_at`) VALUES
(1, 'Ahmed', 'ahmed123@gmail.com', '$2y$10$ZF.UKlfIdeWSaaftzYawoOkoKaf6Y5qHsUcnFegJsL4ETcKy4a1Pq', 2, 1234, 'upload/', 'user', '2020-02-21 22:00:00', '2020-02-21 22:00:00'),
(2, 'Kareem', 'kareemmorsy30@gmail.com', '$2y$10$ZF.UKlfIdeWSaaftzYawoOkoKaf6Y5qHsUcnFegJsL4ETcKy4a1Pq', 1, 1, NULL, 'admin', '2020-02-25 17:13:15', NULL),
(3, 'Atef', 'ahmed321@email.com', '$2y$12$RY5z2pAIA0aWMR.5MYk8ueUPgwVkGa2qZ2W3WDcoAjVlGYrEF3V6W', 2, 1234, 'upload/24F165C500000578-3563204-image-a-11_1461840173083.jpg', 'user', '2020-02-29 19:14:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

CREATE TABLE `users_orders` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `order_id` int(255) NOT NULL,
  `total_price` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users_orders`
--

INSERT INTO `users_orders` (`id`, `user_id`, `product_id`, `order_id`, `total_price`, `amount`) VALUES
(9, 1, 1, 15, 50, 10),
(10, 1, 2, 16, 56, 8),
(11, 1, 1, 16, 35, 7),
(12, 1, 2, 17, 14, 2),
(13, 1, 1, 17, 10, 2),
(14, 1, 2, 18, 7, 1),
(15, 2, 1, 31, 5, 1),
(16, 2, 1, 32, 0, 1),
(17, 2, 1, 33, 5, 1),
(18, 2, 1, 35, 5, 1),
(19, 2, 1, 36, 25, 5),
(20, 2, 1, 37, 25, 5),
(21, 2, 1, 38, 25, 5),
(22, 2, 1, 39, 25, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user-id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category-id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `users_orders`
--
ALTER TABLE `users_orders`
  ADD CONSTRAINT `users_orders_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_orders_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
