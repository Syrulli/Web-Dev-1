-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2023 at 06:16 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_lloyd`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_carts`
--

CREATE TABLE `tbl_carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `created_at`) VALUES
(24, 'Featured Drinks', 'Drink', 'Menu/At Home Coffee', 0, 1, '1674564042.png', '2022-11-04 13:54:55'),
(33, 'Foods', 'Foods', 'Food', 0, 1, '1674566134.png', '2023-01-23 04:33:50'),
(34, 'Cold Coffees', 'Cold Coffees', 'Cold Coffees', 0, 1, '1674567711.png', '2023-01-24 13:39:12'),
(35, 'At Home Coffee', 'sachet', 'At Home Coffee', 0, 0, '1674568326.png', '2023-01-24 13:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(191) NOT NULL,
  `user_id` int(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `address` mediumtext NOT NULL,
  `pincode` int(191) NOT NULL,
  `total_price` int(191) NOT NULL,
  `payment_mode` varchar(191) NOT NULL,
  `payment_id` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `comments` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `tracking_no`, `user_id`, `name`, `email`, `phone`, `address`, `pincode`, `total_price`, `payment_mode`, `payment_id`, `status`, `comments`, `created_at`) VALUES
(40, 'Kōhī1753', 10, 'Francis Ace Dolosa', 'admin@gmail.com', '123', 'tstw2qe12312', 21312, 1050, 'Paid by PayPal', '7AA39209E2007752K', 1, NULL, '2023-01-25 07:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_items`
--

CREATE TABLE `tbl_order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(191) NOT NULL,
  `prod_id` int(191) NOT NULL,
  `qty` int(191) NOT NULL,
  `price` int(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order_items`
--

INSERT INTO `tbl_order_items` (`id`, `order_id`, `prod_id`, `qty`, `price`, `created_at`) VALUES
(13, 26, 24, 2, 22, '2023-01-14 03:40:22'),
(14, 27, 24, 1, 22, '2023-01-20 13:41:02'),
(15, 28, 24, 1, 22, '2023-01-20 13:41:37'),
(16, 29, 24, 1, 22, '2023-01-20 13:43:26'),
(17, 30, 24, 3, 22, '2023-01-20 13:51:41'),
(18, 31, 24, 3, 22, '2023-01-20 13:54:53'),
(19, 32, 24, 4, 22, '2023-01-20 14:07:11'),
(20, 33, 24, 1, 22, '2023-01-23 04:19:29'),
(21, 34, 24, 3, 22, '2023-01-23 04:29:57'),
(22, 35, 24, 2, 22, '2023-01-24 11:50:24'),
(23, 36, 24, 3, 75, '2023-01-25 04:16:22'),
(24, 37, 24, 1, 75, '2023-01-25 05:55:20'),
(25, 38, 34, 1, 350, '2023-01-25 07:02:13'),
(26, 39, 33, 3, 40, '2023-01-25 07:02:56'),
(27, 40, 34, 3, 350, '2023-01-25 07:08:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` mediumtext NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(191) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `category_id`, `name`, `slug`, `description`, `price`, `image`, `qty`, `status`, `trending`) VALUES
(24, 24, 'Caffè Americano', 'Drinks', 'Espresso shots topped with hot water create a light layer of crema culminating in this wonderfully rich cup with depth and nuance. 15 calories, 0g sugar, 0g fat.', 75, '1674572676.png', 177, 0, 1),
(31, 33, 'Plain Bagel', 'Food', 'Enriched Unbleached Wheat Flour (Wheat Flour, Malted Barley Flour, Niacin, Reduced Iron, Thiamine Mononitrate, Riboflavin, Folic Acid), Water, Sugar, Salt, Yeast, Molasses Powder (Molasses, Wheat Starch), Malted Barley Flour, Soybean Oil, Hydrolyzed Wheat Gluten, Ascorbic Acid, Enzymes, Cornmeal. 280\r\ncalories', 40, '1674623430.png', 200, 0, 1),
(32, 24, 'Caffè Misto', 'Featured Drinks', 'The classic Caffè Misto, which the French call café au lait, is simply half brewed coffee and half steamed milk. 110 calories', 75, '1674623863.png', 200, 0, 1),
(33, 33, 'Puday Bagel', 'Foods', 'standard combination of toppings on an everything bagel is as follows: sesame seeds, poppy seeds, dried onion, garlic, and salt. Some may add in black sesame and cracked pepper. 290 calories\r\n\r\n', 40, '1674625080.png', 197, 0, 1),
(34, 35, 'Gustamela Hitler Jordan', 'At Home Coffee', 'This Fair Trade coffee is cultivated near Lake Atitlan in the region of Sierra Madre. This variety of coffee is wet-processed, encompassing a heavy brightness with sweetened undertones in its flavor profile. 8.8oz', 350, '1674625384.png', 196, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` int(15) NOT NULL,
  `password` varchar(191) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `phone`, `password`, `role_as`, `created_at`) VALUES
(9, 'Raisen', 'admin@gmail.com', 222, '123', 1, '2022-10-25 16:29:32'),
(10, 'Lloyd', 'user@gmail.com', 2222, '1', 0, '2022-10-28 03:01:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_carts`
--
ALTER TABLE `tbl_carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order_items`
--
ALTER TABLE `tbl_order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_carts`
--
ALTER TABLE `tbl_carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_order_items`
--
ALTER TABLE `tbl_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
