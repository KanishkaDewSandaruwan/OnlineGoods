-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2021 at 08:24 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinegods`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(9000) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twiter` varchar(255) NOT NULL,
  `instragram` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`image`, `title`, `description`, `email`, `phone`, `address`, `facebook`, `twiter`, `instragram`) VALUES
('archie-fantom-lCe_aHkPxss-unsplash.jpg', 'hiuyii', '<p>kaniya</p>', 'an@gmail.com', 713664071, 'Neluwa', 'https://www.facebook.com/', 'https://www.facebook.com/kanishka.dew.sandaruwan/', 'https://www.facebook.com/');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(255) NOT NULL,
  `customer_id` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `trn_date` datetime NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_image` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_image`, `type`) VALUES
(25, '1.5 inch PVC Tube', 'gersey-vargas-ijuTwBjQZww-unsplash.jpg', 'PVC'),
(26, 'Plastick', 'hendrik-cornelissen-jpTT_SAU034-unsplash.jpg', 'Hardware'),
(27, 'Soup', 'hero_man.png', 'Hardware');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nic` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `phone`, `email`, `address`, `password`, `nic`) VALUES
(2, 'Kanishka Sandaruwan', 913664070, 'kanishkadewsandaruwan@gmail.com', 'Galle Neluwa Sri lanka', 'e10adc3949ba59abbe56e057f20f883e', '962670426C'),
(5, '', 0, 'admin', '', 'e10adc3949ba59abbe56e057f20f883e', ''),
(6, 'Kanishka Sandaruwan', 753664071, 'kanishkadewsandaruwan9@gmail.com', 'Galle Neluwa', 'e10adc3949ba59abbe56e057f20f883e', '962670496V');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `header_image` varchar(255) NOT NULL,
  `header_title` varchar(255) NOT NULL,
  `header_desc` varchar(255) NOT NULL,
  `subpage_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`header_image`, `header_title`, `header_desc`, `subpage_image`) VALUES
('watch.png', 'White Catchers Gift Wall decor', 'Order your foods', 'services_hero.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `getorder`
--

CREATE TABLE `getorder` (
  `order_id` int(11) NOT NULL,
  `products` varchar(255) NOT NULL,
  `total` int(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `trn_date` datetime NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `getorder`
--

INSERT INTO `getorder` (`order_id`, `products`, `total`, `address`, `status`, `trn_date`, `customer_id`) VALUES
(10, '11', 8350, 'Galle Neluwa Sri lanka', 'Paid', '2021-05-30 05:06:43', 2),
(11, '10', 6000, 'Galle Neluwa Sri lanka', 'Accepted', '2021-05-30 05:06:43', 2),
(12, '7,10', 6000, 'Galle Neluwa Sri lanka', 'Accepted', '2021-05-30 05:06:21', 2);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `m_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `trn_date` datetime NOT NULL,
  `msg_read` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`m_id`, `name`, `email`, `subject`, `message`, `trn_date`, `msg_read`) VALUES
(10, 'Kanishka Dew Sandaruwan', 'kanishkadewsandaruwan@gmail.com', 'ssss', 'saasas', '2021-05-29 05:18:53', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `cat_id` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` varchar(9000) NOT NULL,
  `price` int(255) NOT NULL,
  `qnt` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `trndate` datetime NOT NULL,
  `available` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `cat_id`, `product_name`, `description`, `price`, `qnt`, `image`, `trndate`, `available`) VALUES
(7, 26, 'Water Tank', '<p><b>Water Tank is bogger Than onother</b></p><p><b><br></b></p><ul><li><b>Big&nbsp;</b></li><li><b>Good</b></li><li><b>Less</b></li></ul>', 4500, 20, 'gersey-vargas-ijuTwBjQZww-unsplash.jpg', '2021-05-29 05:14:47', 'Yes'),
(8, 25, '1.5 Shocket', 'Order your foods', 20, 20, 'etienne-boulanger-C5yfbvMWxC8-unsplash.jpg', '2021-05-29 05:14:09', 'Yes'),
(9, 25, '1.5 T Shocket', 'aaa', 50, 20, 'gersey-vargas-ijuTwBjQZww-unsplash.jpg', '2021-05-29 05:14:33', 'Yes'),
(10, 26, 'Small water Tabk', 'dsds', 1500, 20, 'hero_man.png', '2021-05-29 05:15:52', 'Yes'),
(11, 27, 'Kanishka Dew Sandaruwan', 'Order your foods', 850, 20, 'hero_man.png', '2021-05-29 05:17:23', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `getorder`
--
ALTER TABLE `getorder`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `products` (`products`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `getorder`
--
ALTER TABLE `getorder`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
