-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2019 at 02:31 PM
-- Server version: 5.7.12
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `activated` tinyint(4) NOT NULL COMMENT '0 is deactivated, 1 activated',
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `description`, `parent_id`, `activated`, `date_created`, `date_updated`) VALUES
(1, 'Sách', '', 'Sách', 0, 1, '2018-12-26 00:00:00', '2018-12-27 00:00:00'),
(2, 'Test', '', 'Test            ', 0, 0, '2019-01-07 13:15:15', '2019-01-07 13:15:15'),
(3, 'Test ', '', 'Test            ', 0, 0, '2019-01-07 13:22:06', '2019-01-07 13:22:06'),
(4, 'test', '', '       kjhjkh     ', 0, 0, '2019-01-07 13:26:03', '2019-01-07 13:26:03'),
(5, 'hhjk', '', '         hjk   ', 0, 0, '2019-01-07 13:26:26', '2019-01-07 13:26:26'),
(6, 'hkj', '', '    hkjhk        ', 0, 0, '2019-01-07 13:26:37', '2019-01-07 13:26:37'),
(7, 'fgf', '', '         gfg   ', 0, 0, '2019-01-07 13:27:02', '2019-01-07 13:27:02');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `path` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `date_created` datetime NOT NULL,
  `dated_updated` datetime NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) NOT NULL,
  `title` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `short_desc` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `keyword` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tags` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `post_categories_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `activated` tinyint(4) NOT NULL COMMENT '0 is deactivated, 1 activated',
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `sku` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1 is sold out, 0 is available',
  `categories_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `activated` tinyint(4) NOT NULL,
  `tag` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `keyword` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `discount` float NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_desc` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sku`, `name`, `description`, `status`, `categories_id`, `price`, `activated`, `tag`, `keyword`, `discount`, `image`, `short_desc`, `date_created`, `date_updated`) VALUES
(1, 'ghj', 'jhghj', '            678687', 0, ',6,5', 76, 0, '678', '8768', 76, NULL, '6786', '2019-01-07 14:01:05', '2019-01-07 14:01:05'),
(2, '67868', 'yt687687', '        687687    ', 0, ',6,5', 678, 0, '678', '687', 678, NULL, '678687', '2019-01-07 14:01:20', '2019-01-07 14:01:20'),
(3, '67868', 'yt687687', ' 687687 ', 0, ',6,5', 678, 0, '678', '687', 678, NULL, '678687', '2019-01-07 14:01:20', '2019-01-07 14:01:20'),
(4, '203', 'Test lại', '            JKLSDJFKSDLFJSKLDFJLK', 0, ',4,3', 20, 0, 'HI', 'HI', 20, 'uploads/icon7.png', 'HI', '2019-01-07 14:02:18', '2019-01-07 14:02:18'),
(5, 'Lemon', 'Lemon', 'Hi hi            ', 0, ',7,6', 20, 0, 'jkhkjh,hjkhk,jkh', 'jkh', 79, 'uploads/80x80.png', 'hkjhkjhkjhkjhjk', '2019-01-07 14:36:46', '2019-01-07 14:36:46');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `rate` tinyint(4) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '2' COMMENT '0 is admin, 1 is staff, 2 is normal user',
  `pwd` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `activated` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 is deactivated, 1 is activated',
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `date_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `full_name`, `address`, `phone`, `email`, `level`, `pwd`, `activated`, `date_created`, `date_updated`, `date_login`) VALUES
(1, 'sdjkfhk', 'sdkjhfkjs', 'skjdfhk', 'sdfhjk', 'kljsd@d.vom', 0, '3393bcb59ada4e48e2c9c0e03a76bcf3', 1, '2018-12-28 13:16:19', '2018-12-28 14:49:32', NULL),
(2, 'sjkdfhkj', 'jksdhfk', 'sdjkfhk', 'sdfhk', 'jkashd@d.vom', 1, 'c18e4af09303a622b77d7237c718fe0f', 1, '2018-12-28 13:40:54', '2018-12-28 13:40:54', NULL),
(3, 'jskdhfjskfh', 'sjdkfhsjkf', 'kjsdhfsjkf', 'sdhkfjshdf', 'skdlfjslkdf@sdf.com', 1, '18dfad9f1cf689916649a1e7baf864c2', 1, '2018-12-28 13:46:26', '2018-12-28 13:46:26', NULL),
(4, 'sjkdfhskjf', 'jkshkjdhfk', 'jksdhfjksfh', 'sjkdhfskjf', 'jkshdfk@sdf.com', 1, '35cf8493e2e43d6fab15bb0b80f0fa9a', 1, '2018-12-28 13:52:43', '2018-12-28 14:50:39', NULL),
(5, 'sjkdhfk', 'ạksdhfk', 'sjdfkhk', 'sdjfkhsdk', 'jkshdfk@Ad.com', 1, '8fbbe1863aaae382387726fcdbc89db3', 1, '2018-12-28 13:53:44', '2018-12-28 14:50:39', NULL),
(6, 'ạkdhak', 'ạkdha@Adj', 'ạkshdjkadh', 'jksdhfsjdk', 'luann4@g.com', 1, '2df2ded51cb33bb44453a7af0b4f0160', 1, '2018-12-28 13:57:35', '2018-12-28 14:50:38', NULL),
(7, 'sjdkfhk', 'sjkfh', 'sjdkfh', 'sdjkfhk', 'kuah@d.com', 1, '497fd05bbe794349ffe2f1db4a406d99', 1, '2018-12-28 14:12:43', '2018-12-28 14:50:37', NULL),
(8, '123456', 'Nguyen Thanh Luan', 'Ha Long', '0868120192', 'luann4099@gmail.com', 2, '77e2edcc9b40441200e31dc57dbb8829', 1, '2019-01-11 13:56:56', '2019-01-11 13:56:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `verified_account`
--

CREATE TABLE `verified_account` (
  `id` int(11) NOT NULL,
  `user_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `pwd` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`path`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verified_account`
--
ALTER TABLE `verified_account`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `verified_account`
--
ALTER TABLE `verified_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
