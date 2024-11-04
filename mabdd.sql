-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 18, 2020 at 08:49 AM
-- Server version: 5.6.47-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Lalande`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_msg`
--

CREATE TABLE `admin_msg` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `title` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_msg`
--

INSERT INTO `admin_msg` (`id`, `image`, `description`, `title`, `timestamp`) VALUES
(1, '260px-thumbnail.jpg', '   Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsumm.  ', 'Mr LALANDE', '2021-05-10 11:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `ip_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `qty`, `ip_address`) VALUES
(38, 22, 1, '::1'),
(39, 25, 3, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Men'),
(2, 'Women');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_no` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` double NOT NULL,
  `status` varchar(50) NOT NULL,
  `txn_id` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pay_way` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

CREATE TABLE `preferences` (
  `id` int(11) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(50) NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `footer` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `address` text NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `work_time` varchar(255) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `free_delivery` int(11) NOT NULL DEFAULT '1500',
  `per_kg_charges` int(11) NOT NULL DEFAULT '150',
  `upperBannerImg` int(11) NOT NULL DEFAULT '1',
  `lowerBannerImg` int(11) NOT NULL DEFAULT '1',
  `pur_point_val` int(11) NOT NULL DEFAULT '0',
  `pur_point` int(11) NOT NULL DEFAULT '0',
  `pur_min_points` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preferences`
--

INSERT INTO `preferences` (`id`, `admin_email`, `admin_pass`, `admin_contact`, `title`, `footer`, `description`, `keywords`, `address`, `contact`, `email`, `work_time`, `datetime`, `free_delivery`, `per_kg_charges`, `upperBannerImg`, `lowerBannerImg`, `pur_point_val`, `pur_point`, `pur_min_points`) VALUES
(1, 'admin@admin.com', 'admin', '083 807 2224', 'Be SunShine', 'All Rights Reserved', 'Kivapour is the most trusted source for Electronic Cigarettes and E-Liquids in Ireland. All Leading Brands Stocked.', 'Kivapour, ECigarettes, Balbriggan, Drogheda, Ireland, buy ecigarettes, mods, advanced starter kits, e liquid, ecigarettes, best eliquid shop Ireland, best electronic cigarette, best electronic cigarettes, best e-cigarette, e-cigarettes, stop smoking, quit smoking, healthy cigarette, smokeless cigarette, new cigarette, eGo cigarette, electronic vaporizer, eGo-C, eGo-T, eGo-W, eleaf, innokin, joyetech, kamrytech, kanger, sigeliei, smok, wakeandvape, wismec, aspire, battery, batteries, coil, coils, clearomizer, clearomizers, accessories', 'Kivapour\r\nNorth Quay, Drogheda\r\nCo. Louth \r\n\r\nKivapour\r\n15B Dublin Street, Balbriggan\r\nCo. Dublin', '083 807 2224', 'info@besunshine.co.uk', '24/7', '2020-05-17 23:40:08', 1500, 150, 3, 1, 0, 1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `cat` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(50) NOT NULL,
  `description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `type`, `cat`, `image`, `price`, `description`) VALUES
(26, 'FENTY', 'other', '2', 'fenty.png', '150', ' Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsumm. '),
(27, 'CONVERSE', 'other', '2', 'converse.jpg', '350', ' Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsumm. '),
(28, 'ADDIDAS-L', 'other', '2', 'addidas.jpg', '250', ' Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsumm. '),
(29, 'STAN-SMITH ', 'other', '2', 'stansmith.png', '230', ' Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsumm. '),
(30, 'Airforce-1', 'other', '1', 'airforce.png', '200', ' \r\n\r\n    Italian Fabrics\r\n    Spring / Summer 2020,\r\n    Semi Fitted,\r\n    Imported,\r\n    Ship from Montreal, USA,\r\n    Machine Washable, Dry Cleaned preferred,\r\n    Lay Flat to Dry, Don t Tumble Dry.\r\n\r\n'),
(31, 'Nike-AF1', 'other', '1', 'NIKE-AF1.png', '300', ' \r\n\r\n    Italian Fabrics\r\n    Spring / Summer 2020,\r\n    Semi Fitted,\r\n    Imported,\r\n    Ship from Montreal, USA,\r\n    Machine Washable, Dry Cleaned preferred,\r\n    Lay Flat to Dry, Don t Tumble Dry.\r\n\r\n'),
(32, 'NIKE-TN', 'other', '1', 'Nike-TN.png', '250', ' \r\n\r\n    Italian Fabrics\r\n    Spring / Summer 2020,\r\n    Semi Fitted,\r\n    Imported,\r\n    Ship from Montreal, USA,\r\n    Machine Washable, Dry Cleaned preferred,\r\n    Lay Flat to Dry, Don t Tumble Dry.\r\n\r\n'),
(33, 'Puma-RS', 'other', '1', 'Puma-RS.png', '150', '    Italian Fabrics\r\n    Spring / Summer 2020,\r\n    Semi Fitted,\r\n    Imported,\r\n    Ship from Montreal, USA,\r\n    Machine Washable, Dry Cleaned preferred,\r\n    Lay Flat to Dry, Don t Tumble Dry.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `contact`, `address`) VALUES
(1, 'Zaki', 'zaki@gmail.com', '121212', '+971 55 1234567', 'Egypt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_msg`
--
ALTER TABLE `admin_msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_msg`
--
ALTER TABLE `admin_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
