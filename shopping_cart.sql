-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2019 at 05:51 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `act_id` int(255) NOT NULL,
  `action` text NOT NULL,
  `user_details` varchar(255) NOT NULL,
  `time_added` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`act_id`, `action`, `user_details`, `time_added`) VALUES
(1, 'tadesina@jethroltd.com Successfully Registered Account on the website', 'tadesina@jethroltd.com', '2019-05-16 15:44:12'),
(2, 'admin@gmail.com Successfully Registered Account on the website', 'admin@gmail.com', '2019-05-16 15:45:52'),
(3, 'Logged Out', 'test@gmail.com', '2019-05-17 08:16:56'),
(4, 'tadesina@jethroltd.com Successfully Registered Account on the website', 'tadesina@jethroltd.com', '2019-05-17 11:50:25'),
(5, 'tadesina@jethroltd.com Successfully Registered Account on the website', 'tadesina@jethroltd.com', '2019-05-17 12:29:02'),
(6, 'tadesina@jethroltd.com Successfully Registered Account on the website', 'tadesina@jethroltd.com', '2019-05-17 12:29:06'),
(7, 'tadesina@jethroltd.com Successfully Registered Account on the website', 'tadesina@jethroltd.com', '2019-05-17 12:30:22'),
(8, 'tadesina@jethroltd.com Successfully Registered Account on the website', 'tadesina@jethroltd.com', '2019-05-17 12:38:43'),
(9, 'tadesina@jethroltd.com Successfully Registered Account on the website', 'tadesina@jethroltd.com', '2019-05-17 12:42:55'),
(10, 'tadesina@jethroltd.com Successfully Registered Account on the website', 'tadesina@jethroltd.com', '2019-05-17 13:39:18'),
(11, 'tolajide74@gmail.com Successfully Registered Account on the website', 'tolajide74@gmail.com', '2019-05-17 19:09:06'),
(12, 'doyinsolajesuseun19@gmail.com Successfully Registered Account on the website', 'doyinsolajesuseun19@gmail.com', '2019-05-17 19:11:00'),
(13, 'doyinsolajesuseun19@gmail.com Successfully Registered Account on the website', 'doyinsolajesuseun19@gmail.com', '2019-05-17 19:11:20'),
(14, 'Logged Out', 'tolajide74@gmail.com', '2019-05-20 19:46:02'),
(15, 'Logged Out', 'test@gmail.com', '2019-05-20 19:48:24'),
(16, 'tolajide74@gmail.com Successfully Registered Account on the website', 'tolajide74@gmail.com', '2019-06-14 09:29:34'),
(17, 'tolajide74@gmail.com Successfully Registered Account on the website', 'tolajide74@gmail.com', '2019-06-14 09:30:35'),
(18, 'Logged Out', 'tolajide74@gmail.com', '2019-06-14 09:35:08'),
(19, 'Logged In', 'tolajide74@gmail.com', '2019-09-12 10:30:26'),
(20, 'Logged In', 'tolajide74@gmail.com', '2019-09-12 10:30:51'),
(21, 'Logged Out', 'tolajide74@gmail.com', '2019-09-12 10:35:30'),
(22, 'Logged In', 'tolajide74@gmail.com', '2019-09-12 10:42:38'),
(23, 'Logged In', 'tolajide74@gmail.com', '2019-09-12 10:43:41'),
(24, 'Added tolajide741@gmail.com Details to the User List', 'tolajide741@gmail.com', '2019-09-12 10:43:54'),
(25, 'Added No Licence to the Category List', 'tolajide74@gmail.com', '2019-09-12 10:44:25'),
(26, 'Deleted No Licence From The Category List', 'tolajide74@gmail.com', '2019-09-12 10:44:35'),
(27, 'Added Leather  to the Type List', 'tolajide74@gmail.com', '2019-09-12 10:44:41'),
(28, 'Deleted Leather From to the Type List', 'tolajide74@gmail.com', '2019-09-12 10:44:47'),
(29, 'Added Junior Certeee to the Sub Types List', 'tolajide74@gmail.com', '2019-09-12 10:45:00'),
(30, 'Deleted Junior Certeee From the Sub Types List', 'tolajide74@gmail.com', '2019-09-12 10:45:11'),
(31, 'Added Adesina Olajumoke  to the Supplier List', 'tolajide74@gmail.com', '2019-09-12 10:45:21'),
(32, 'Updated Supplier Name From Adesina Olajumoke to Adesina Olajumoked', 'tolajide74@gmail.com', '2019-09-12 10:45:30'),
(33, 'Deleted Adesina Olajumoked From the Supplier List', 'tolajide74@gmail.com', '2019-09-12 10:45:36'),
(34, 'Added Cadlinksdd  to the Publisher List', 'tolajide74@gmail.com', '2019-09-12 10:45:57'),
(35, 'Changed The Manufacturer Name from Cadlinksdd to Cadlinksdd and Changed The Manufacturer Logo', 'tolajide74@gmail.com', '2019-09-12 10:53:32'),
(36, 'Added Logo  to the Publisher List', 'tolajide74@gmail.com', '2019-09-12 10:54:14'),
(37, 'Deleted Olatunji O.A. et al From the Manufacturer List', 'tolajide74@gmail.com', '2019-09-12 10:54:22'),
(38, 'Added 2.1 with amount 6500 to the List', 'tolajide74@gmail.com', '2019-09-12 10:54:39'),
(39, 'Updated The Weight Details From 2.1 to 2.1', 'tolajide74@gmail.com', '2019-09-12 10:54:52'),
(40, 'Deleted 2.1 From to the Weight List', 'tolajide74@gmail.com', '2019-09-12 10:54:58'),
(41, 'Change The Location Name from Abia to Abia', 'tolajide74@gmail.com', '2019-09-12 10:55:23'),
(42, 'Change The Location Name from Abia to Abia', 'tolajide74@gmail.com', '2019-09-12 10:55:47'),
(43, 'Change The Location Name from Abia to Abia', 'tolajide74@gmail.com', '2019-09-12 10:58:24'),
(44, 'Change The Location Name from Abia to Abia', 'tolajide74@gmail.com', '2019-09-12 10:58:36'),
(45, 'Deleted Abia From to the Location List', 'tolajide74@gmail.com', '2019-09-12 10:58:41'),
(46, 'Added Abia to the List', 'tolajide74@gmail.com', '2019-09-12 10:58:57'),
(47, 'Added LOGOEEEE with logoeeee-12171002 to the stock list', 'tolajide74@gmail.com', '2019-09-12 11:00:04'),
(48, 'Updated LOGOEEEE stock with 5 quantity', 'tolajide74@gmail.com', '2019-09-12 11:00:35'),
(49, 'Logged Out', 'tolajide74@gmail.com', '2019-09-12 11:06:07'),
(50, 'Logged In', 'tolajide74@gmail.com', '2019-09-12 11:06:09'),
(51, 'Added NEXUS with nexus-84001922 to the stock list', 'tolajide74@gmail.com', '2019-09-12 11:36:57'),
(52, 'Added PAPER 1 with paper-1-45631112 to the stock list', 'tolajide74@gmail.com', '2019-09-12 11:39:27'),
(53, 'Updated PAPER 1 stock with 10000 quantity', 'tolajide74@gmail.com', '2019-09-12 11:41:27'),
(54, 'Updated PAPER 1 stock with 10 quantity', 'tolajide74@gmail.com', '2019-09-12 11:41:41'),
(55, 'Updated PAPER 1 stock with 20 quantity', 'tolajide74@gmail.com', '2019-09-12 11:42:25'),
(56, 'Updated PAPER 1 stock with 20 quantity', 'tolajide74@gmail.com', '2019-09-12 11:46:49'),
(57, 'Deleted PAPER 1 From The Product List', 'tolajide74@gmail.com', '2019-09-12 12:03:56'),
(58, 'Logged Out', 'tolajide74@gmail.com', '2019-09-12 12:26:25'),
(59, 'Logged In', 'tolajide74@gmail.com', '2019-09-12 15:09:42'),
(60, 'Added IPHONE with nexus-48309211 to the stock list', 'tolajide74@gmail.com', '2019-09-12 15:10:08'),
(61, 'Added OLAY with nexus-98790019 to the stock list', 'tolajide74@gmail.com', '2019-09-12 15:11:47'),
(62, 'Added WRIST WATCH with nexus-84001922 to the stock list', 'tolajide74@gmail.com', '2019-09-12 15:19:42'),
(63, 'Added CAMERA with chamex-55579911 to the stock list', 'tolajide74@gmail.com', '2019-09-12 15:20:37'),
(64, 'Added ROUTER with chamex-12732021 to the stock list', 'tolajide74@gmail.com', '2019-09-12 15:22:09'),
(65, 'Updated CAMERA stock with 10000 quantity', 'tolajide74@gmail.com', '2019-09-12 15:25:25'),
(66, 'Updated CAMERA stock with 10000 quantity', 'tolajide74@gmail.com', '2019-09-12 15:25:35'),
(67, 'Logged Out', 'tolajide74@gmail.com', '2019-09-12 16:47:02'),
(68, 'Logged Out', 'tolajide74@gmail.com', '2019-09-18 11:29:38'),
(69, 'tolajide74@gmail.com Retrieved Account', 'tolajide74@gmail.com', '2019-09-18 11:38:35'),
(70, 'tolajide75@gmail.com Successfully Registered Account on the website', 'tolajide75@gmail.com', '2019-09-18 11:39:54'),
(71, 'Logged Out', 'tolajide74@gmail.com', '2019-09-18 11:43:54'),
(72, 'Logged Out', 'tolajide75@gmail.com', '2019-09-18 11:45:46'),
(73, 'Logged In', 'tolajide74@gmail.com', '2019-09-18 11:46:25'),
(74, 'Shipped Order Number EDABBBEBE1A4B49E for BDD7D5C27E', 'tolajide74@gmail.com', '2019-09-18 11:47:57'),
(75, 'Shipped Order Number 0C30C18FA9CC7C9E for 94696F7FD9', 'tolajide74@gmail.com', '2019-09-18 11:48:13'),
(76, 'Deivered Order Number 0C30C18FA9CC7C9E for 94696F7FD9', 'tolajide74@gmail.com', '2019-09-18 11:48:29'),
(77, 'Deivered Order Number EDABBBEBE1A4B49E for BDD7D5C27E', 'tolajide74@gmail.com', '2019-09-18 11:48:36'),
(78, 'Logged Out', 'tolajide74@gmail.com', '2019-09-18 11:48:40'),
(79, 'Logged Out', 'tolajide74@gmail.com', '2019-09-18 11:49:33'),
(80, 'Logged Out', 'tolajide74@gmail.com', '2019-09-18 11:51:07'),
(81, 'tolajide75@gmail.com Retrieved Account', 'tolajide75@gmail.com', '2019-09-18 11:51:31'),
(82, 'Logged Out', 'tolajide75@gmail.com', '2019-09-18 11:58:07');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `user_id` int(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access_level` int(1) NOT NULL,
  `time_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`user_id`, `full_name`, `user_name`, `password`, `access_level`, `time_registered`) VALUES
(1, 'Adesina Taiwo Olajumoke', 'tolajide74@gmail.com', 'b63e58a251cbdb2678919dbcd79fdc519c927304', 1, '2019-09-12 10:43:35'),
(5, 'Adesina Taiwo Olajide', 'tolajide75@gmail.com', 'b63e58a251cbdb2678919dbcd79fdc519c927304', 1, '2019-04-05 14:23:19');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `author_id` int(255) UNSIGNED NOT NULL,
  `author_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `author_name`, `created`) VALUES
(5, 'Vista', '2019-04-30 20:13:23'),
(6, 'FAD Enterprises', '2019-04-30 20:13:32'),
(7, 'Akinben Ventures', '2019-04-30 20:14:22'),
(8, 'Extension Publications Limited', '2019-04-30 20:14:45'),
(9, 'Tonad Publishers Limited', '2019-04-30 20:15:12');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(20) DEFAULT NULL,
  `order_id` varchar(100) DEFAULT NULL,
  `paystack_reference` varchar(100) DEFAULT NULL,
  `paid_status` int(1) DEFAULT NULL,
  `order_status` int(1) DEFAULT NULL,
  `subtotal` varchar(10) DEFAULT NULL,
  `shipping_charge` varchar(20) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `weight_amount` varchar(255) NOT NULL,
  `shipping` int(2) NOT NULL,
  `delivery` int(2) NOT NULL,
  `time_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`id`, `customer_id`, `order_id`, `paystack_reference`, `paid_status`, `order_status`, `subtotal`, `shipping_charge`, `amount`, `weight_amount`, `shipping`, `delivery`, `time_created`) VALUES
(1, '123NFEBH333', 'B33DFE82D89A1820', '072ec1fdc0b40b5b9e02', 0, 1, '200', '1500', '200', 'rotring-drawing-kit-19980909', 0, 0, '2019-05-17 08:16:36'),
(2, '123NFEBH333', 'ECA386A489D58A9E', '7824afc9128c8e8635b4', 0, 1, '2200', '1500', '2200', 'commerce-accounts-63029901', 0, 0, '2019-05-17 08:54:10'),
(4, '94696F7FD9', '0C30C18FA9CC7C9E', '833fb81e022cbfba8144', 1, 1, '21240', '2500', '21640', 'nexus-84001922', 1, 1, '2019-09-18 11:48:29'),
(5, '94696F7FD9', 'E9A296F71CBB55DE', '5c25b4bd89aea3239c8e', 2, 1, '18000', '2500', '18200', 'chamex-39922211', 0, 0, '2019-09-18 10:22:00'),
(6, '94696F7FD9', 'BDCD2E144D695FDE', 'b977370767d53bfff1cc', 2, 1, '12240', '2500', '12440', 'higher-education-37441112', 0, 0, '2019-09-18 10:23:47'),
(7, 'BDD7D5C27E', 'EDABBBEBE1A4B49E', 'b2d9afb1ad3a33df2870', 2, 1, '25800', '1000', '26100', 'chamex-55579911', 1, 1, '2019-09-18 11:48:36');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order_details`
--

CREATE TABLE `customer_order_details` (
  `id` int(11) NOT NULL,
  `order_id` varchar(100) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `weight_pro` varchar(255) NOT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_order_details`
--

INSERT INTO `customer_order_details` (`id`, `order_id`, `product_id`, `quantity`, `weight_pro`, `amount`) VALUES
(1, 'B33DFE82D89A1820', 'rotring-drawing-kit-19980909', ' 1', '0', 200),
(2, 'ECA386A489D58A9E', 'geography-52559102', ' 10', '0', 200),
(3, 'ECA386A489D58A9E', 'commerce-accounts-63029901', ' 1', '0', 200),
(7, '0C30C18FA9CC7C9E', 'higher-education-37441112', '1', '100', 2640),
(8, '0C30C18FA9CC7C9E', 'nexus-84001922', '2', '100', 9600),
(9, '0C30C18FA9CC7C9E', 'nexus-98790019', '1', '100', 9000),
(10, 'E9A296F71CBB55DE', 'nexus-48309211', '1', '100', 8400),
(11, 'E9A296F71CBB55DE', 'chamex-39922211', '1', '100', 9600),
(12, 'BDCD2E144D695FDE', 'double-a-60821099', '1', '100', 9600),
(13, 'BDCD2E144D695FDE', 'higher-education-37441112', '1', '100', 2640),
(14, 'EDABBBEBE1A4B49E', 'nexus-48309211', '1', '100', 8400),
(15, 'EDABBBEBE1A4B49E', 'double-a-33201902', '1', '100', 9000),
(16, 'EDABBBEBE1A4B49E', 'chamex-55579911', '1', '100', 8400);

-- --------------------------------------------------------

--
-- Table structure for table `customer_registration`
--

CREATE TABLE `customer_registration` (
  `registration_id` int(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `reg_number` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `time_addes` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_registration`
--

INSERT INTO `customer_registration` (`registration_id`, `full_name`, `user_name`, `password`, `reg_number`, `status`, `time_addes`) VALUES
(1, 'Test', 'test@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '123NFEBH333', 1, '2019-05-16 15:50:54'),
(2, 'Adesina Taiwo', 'tolajide74@gmail.com', 'b63e58a251cbdb2678919dbcd79fdc519c927304', '94696F7FD9', 0, '2019-06-14 09:35:01'),
(3, 'tolajide74@gmail.com', 'tolajide75@gmail.com', 'b63e58a251cbdb2678919dbcd79fdc519c927304', 'BDD7D5C27E', 0, '2019-09-18 11:39:54');

-- --------------------------------------------------------

--
-- Table structure for table `delivered_product`
--

CREATE TABLE `delivered_product` (
  `deliver_id` int(255) NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivered_product`
--

INSERT INTO `delivered_product` (`deliver_id`, `order_number`, `customer_id`, `status`, `time_added`) VALUES
(1, '0C30C18FA9CC7C9E', '94696F7FD9', 1, '2019-09-18 11:48:29'),
(2, 'EDABBBEBE1A4B49E', 'BDD7D5C27E', 1, '2019-09-18 11:48:36');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genre_id` int(255) NOT NULL,
  `genre_name` text NOT NULL,
  `type_id` int(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genre_id`, `genre_name`, `type_id`, `time_added`) VALUES
(13, 'Arts Material', 4, '2019-05-15 17:21:54'),
(18, 'Ring Binders', 4, '2019-03-25 10:50:25'),
(22, 'Technical Graphic Equipment', 4, '2019-03-25 10:51:59'),
(23, 'Pens', 4, '2019-03-25 10:52:12'),
(24, 'Refil Pads/ Spiral Pads', 4, '2019-03-25 10:52:46'),
(25, 'Junior Infants', 5, '2019-03-25 10:53:42'),
(26, 'Senior Infants', 5, '2019-03-25 10:53:56'),
(27, 'First Class', 5, '2019-03-25 10:54:10'),
(28, 'Second Type', 5, '2019-03-25 10:54:21'),
(29, 'Third Class', 5, '2019-03-25 10:54:35'),
(30, 'Forth Class', 5, '2019-03-25 10:55:02'),
(31, 'Fifth Class', 5, '2019-03-25 10:55:27'),
(32, 'General', 5, '2019-03-25 10:56:07'),
(33, 'Atlas Primary', 5, '2019-03-25 10:56:30'),
(34, 'Spellings and Grammer', 5, '2019-03-25 10:56:48'),
(36, 'Junior Cert', 6, '2019-03-25 10:59:01'),
(37, 'Leaving Cert', 6, '2019-03-25 10:59:14'),
(38, 'Transition Year', 6, '2019-03-25 10:59:32'),
(39, 'Atlases Post-Primary', 6, '2019-03-25 11:00:02'),
(40, 'English', 7, '2019-03-25 11:01:03'),
(41, 'French', 7, '2019-03-25 11:01:16'),
(42, 'German', 7, '2019-03-25 11:01:29'),
(43, 'Irish', 7, '2019-03-25 11:04:25'),
(44, 'Italian', 7, '2019-03-25 11:04:41'),
(45, 'Yoruba', 7, '2019-03-25 11:04:56'),
(46, 'Exercise Book', 4, '2019-04-30 19:52:59'),
(47, 'Sheet', 4, '2019-04-30 19:53:21'),
(48, 'A4 Paper', 4, '2019-04-30 19:53:39'),
(49, 'Roll', 4, '2019-04-30 19:54:03'),
(50, 'File', 4, '2019-04-30 19:54:14'),
(51, 'Hard Cover', 4, '2019-04-30 19:54:38'),
(52, 'SSS', 6, '2019-04-30 19:56:11'),
(53, 'JSS', 6, '2019-04-30 19:56:19'),
(54, 'Nursery', 5, '2019-04-30 19:56:31'),
(55, 'Primary', 5, '2019-04-30 19:58:44'),
(56, 'Notice Board', 4, '2019-04-30 19:59:27'),
(57, 'White Board Marker', 4, '2019-05-15 17:22:48'),
(58, 'Games', 4, '2019-04-30 20:00:19'),
(59, 'Charts', 4, '2019-04-30 20:00:43'),
(60, 'Calculators', 4, '2019-04-30 20:02:32'),
(61, 'Refil Ink', 4, '2019-04-30 20:02:45'),
(62, 'Wooden', 4, '2019-04-30 20:03:27'),
(63, 'Plastic', 4, '2019-04-30 20:03:40'),
(64, 'Mathset', 4, '2019-04-30 20:03:57'),
(65, 'Art Materials', 4, '2019-04-30 20:04:36'),
(67, 'Pencils', 4, '2019-04-30 20:30:45'),
(68, 'Junior', 6, '2019-04-30 20:06:51'),
(69, 'Senior', 6, '2019-04-30 20:07:02'),
(70, 'Children\'s Readers', 8, '2019-04-30 20:07:34'),
(71, 'Record Books', 4, '2019-05-15 17:18:47'),
(72, 'Steel', 4, '2019-05-15 17:19:12'),
(73, 'White', 4, '2019-05-15 17:19:50'),
(74, 'Stationary', 4, '2019-05-15 17:20:32'),
(75, 'File Jacket', 4, '2019-05-15 17:20:51'),
(76, 'Writing Materials', 4, '2019-05-15 17:22:18'),
(77, 'White Board Duster', 4, '2019-05-15 17:23:09'),
(78, 'White Board', 4, '2019-05-15 17:23:51'),
(79, 'Secondary', 6, '2019-05-15 17:25:03');

-- --------------------------------------------------------

--
-- Table structure for table `payment_history`
--

CREATE TABLE `payment_history` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(20) DEFAULT NULL,
  `payment_mode` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `merchant_reference` varchar(255) DEFAULT NULL,
  `response_code` varchar(5) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `date_paid` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_history`
--

INSERT INTO `payment_history` (`id`, `customer_id`, `payment_mode`, `transaction_id`, `merchant_reference`, `response_code`, `amount`, `date_paid`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-18 09:59:29'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-18 10:01:03'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-18 10:03:05'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-18 10:03:43'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-18 10:18:31'),
(6, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-18 10:23:47'),
(7, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-18 11:45:15'),
(8, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-18 12:20:27');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(255) NOT NULL,
  `product_name` text NOT NULL,
  `slug` text NOT NULL,
  `image` text NOT NULL,
  `genre_id` int(255) NOT NULL,
  `category_id` int(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL,
  `description` text NOT NULL,
  `edition` varchar(222) NOT NULL,
  `publisher_id` int(222) NOT NULL,
  `publish` int(1) NOT NULL,
  `weight_id` int(255) NOT NULL,
  `author_id` int(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `slug`, `image`, `genre_id`, `category_id`, `amount`, `quantity`, `description`, `edition`, `publisher_id`, `publish`, `weight_id`, `author_id`, `time_added`) VALUES
(1, 'HIGHER EDUCATION', 'higher-education-37441112', 'ab3.jpg', 4, 1, '2200', 10000, 'Null', 'Null', 6, 0, 1, 5, '2019-09-13 11:31:46'),
(2, '60 LEAVES', '60-leaves-98159201', 'ab3.jpg', 5, 2, '900', 10000, 'Null', 'Null', 6, 0, 1, 5, '2019-09-13 11:31:50'),
(3, '40 LEAVES', '40-leaves-51821002', 'ab3.jpg', 6, 3, '700', 10000, 'Null', 'Null', 6, 0, 1, 5, '2019-09-13 11:31:57'),
(4, '2A  ', '2a-99300211', 'ab3.jpg', 7, 4, '600', 10000, 'Null', 'Null', 6, 0, 1, 5, '2019-09-13 11:32:06'),
(5, '2B', '2b-54861002', 'ab3.jpg', 8, 5, '600', 10000, 'Null', 'Null', 6, 0, 1, 5, '2019-09-13 11:32:12'),
(6, '2B SPECIAL', '2b-special-36441192', 'ab3.jpg', 4, 1, '600', 10000, 'Null', 'Null', 6, 0, 1, 5, '2019-09-13 11:32:16'),
(7, '2D', '2d-76440019', 'ab3.jpg', 5, 2, '600', 10000, 'Null', 'Null', 6, 0, 1, 5, '2019-09-13 11:32:21'),
(8, 'CARDBOARD', 'cardboard-53602919', 'ab3.jpg', 6, 3, '1500', 10000, 'Null', 'Null', 6, 0, 1, 5, '2019-09-13 11:32:26'),
(9, 'EMBORSED CARDBOARD', 'emborsed-cardboard-45029120', 'ab3.jpg', 7, 4, '1500', 10000, 'Null', 'Null', 6, 0, 1, 5, '2019-09-13 11:32:31'),
(10, 'BROWN PAPER', 'brown-paper-26381911', 'ab3.jpg', 8, 5, '1500', 10000, 'Null', 'Null', 6, 0, 1, 5, '2019-09-13 11:32:36'),
(11, 'DOUBLE AD', 'double-a-60821099', 'ab3.jpg', 4, 1, '8000', 10000, '80 GRM', 'Null', 6, 0, 1, 5, '2019-09-13 11:32:39'),
(12, 'DOUBLE A', 'double-a-33201902', 'ab3.jpg', 5, 2, '7500', 10000, '75 GRM', 'Null', 6, 0, 1, 5, '2019-09-13 11:32:43'),
(13, 'DOUBLE A', 'double-a-74570129', 'ab3.jpg', 6, 3, '7000', 10000, '70 GRM', 'Null', 6, 0, 1, 5, '2019-09-13 11:32:52'),
(14, 'CHAMEXA', 'chamex-39922211', 'ab3.jpg', 7, 4, '8000', 10000, '80 GRM', 'Null', 6, 0, 1, 5, '2019-09-13 11:32:56'),
(15, 'ROUTER', 'chamex-12732021', 'ROUTER.png', 8, 5, '7500', 10000, '75 GRM', 'Null', 6, 0, 1, 5, '2019-09-13 11:33:02'),
(16, 'CAMERA', 'chamex-55579911', 'camera2.jpg', 4, 1, '7000', 10000, '70 GRM', 'Null', 6, 0, 1, 5, '2019-09-13 11:33:06'),
(17, 'WRIST WATCH', 'nexus-84001922', 'watch.jpg', 5, 2, '8000', 10000, '80 GRM', 'Null', 6, 0, 1, 5, '2019-09-13 11:33:09'),
(18, 'OLAY', 'nexus-98790019', 'olay.jpg', 6, 3, '7500', 10000, '75 GRM', 'Null', 6, 0, 1, 5, '2019-09-13 11:33:14'),
(19, 'IPHONE', 'nexus-48309211', 'phone.jpg', 7, 4, '7000', 10000, '70 GRM', 'Null', 6, 0, 1, 5, '2019-09-13 11:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `products_category`
--

CREATE TABLE `products_category` (
  `category_id` int(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_category`
--

INSERT INTO `products_category` (`category_id`, `category_name`, `time_added`) VALUES
(1, 'Text Book', '2019-04-30 19:47:39'),
(2, 'Drawing Material', '2019-04-30 19:49:06'),
(3, 'Paper', '2019-04-30 19:48:07'),
(4, 'Stationary', '2019-04-30 19:49:19'),
(5, 'Toys', '2019-04-30 19:49:25'),
(6, 'Work Book', '2019-04-30 19:49:58'),
(7, 'Literature', '2019-04-30 19:50:13'),
(8, 'Past Question', '2019-04-30 19:51:27');

-- --------------------------------------------------------

--
-- Table structure for table `product_stock`
--

CREATE TABLE `product_stock` (
  `stock_id` int(255) NOT NULL,
  `product_name` text NOT NULL,
  `category_id` int(255) NOT NULL,
  `genre_id` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `publisher_id` int(255) NOT NULL,
  `edition` varchar(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_stock`
--

INSERT INTO `product_stock` (`stock_id`, `product_name`, `category_id`, `genre_id`, `quantity`, `publisher_id`, `edition`, `time_added`) VALUES
(1, 'NEXUS', 3, 48, 10000, 6, 'Null', '2019-09-12 11:36:57'),
(2, 'PAPER 1', 3, 48, 0, 6, 'Null', '2019-09-12 12:03:56'),
(3, 'IPHONE', 3, 48, 10000, 6, 'Null', '2019-09-12 15:10:08'),
(4, 'OLAY', 3, 48, 10000, 6, 'Null', '2019-09-12 15:11:47'),
(5, 'WRIST WATCH', 3, 48, 10000, 6, 'Null', '2019-09-12 15:19:42'),
(6, 'CAMERA', 3, 48, 10000, 6, 'Null', '2019-09-12 15:20:37'),
(7, 'ROUTER', 3, 48, 10000, 6, 'Null', '2019-09-12 15:22:08');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `type_id` int(255) NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`type_id`, `type_name`, `time_added`) VALUES
(4, 'Stationaries and Accessories', '2019-03-25 10:47:01'),
(5, 'Primary School', '2019-03-25 10:45:23'),
(6, 'Secondary School', '2019-03-25 10:45:43'),
(7, 'Dictionaries', '2019-03-25 10:45:58'),
(8, 'Novels/Plays', '2019-03-25 10:46:20'),
(9, 'Exam Papers', '2019-03-25 10:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `product_weight`
--

CREATE TABLE `product_weight` (
  `weight_id` int(255) NOT NULL,
  `weight_name` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_weight`
--

INSERT INTO `product_weight` (`weight_id`, `weight_name`, `amount`, `time_added`) VALUES
(1, '1.2', 100, '2019-09-12 11:41:16');

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `publisher_id` int(255) UNSIGNED NOT NULL,
  `publisher_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publisher_logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`publisher_id`, `publisher_name`, `publisher_logo`, `created_at`) VALUES
(6, 'Vista', '1543068292880.jpg', '2019-04-30 20:19:05'),
(7, 'Extension Publications Limited', 'allantic.png', '2019-04-30 20:18:47'),
(8, 'Akinben Ventures', 'harpercolins.png', '2019-04-30 20:17:26'),
(9, 'FAD Enterprises', 'walker.png', '2019-04-30 20:17:00'),
(10, 'Miller Osagie et al', 'ab3.jpg', '2019-04-24 19:50:05'),
(11, 'Johnson J.E. et al', 'ab3.jpg', '2019-04-24 19:50:45'),
(12, 'Susan McKeever et al', 'ab3.jpg', '2019-04-24 19:51:18'),
(13, 'Obichere et al', 'ab3.jpg', '2019-04-24 19:51:53'),
(14, 'Francis Benedict, Sue Synnott, Tony Walsh', 'ab3.jpg', '2019-04-24 19:52:21'),
(15, 'Maria K. et al', 'ab3.jpg', '2019-04-24 19:53:00'),
(16, 'Tony Walsh et al', 'ab3.jpg', '2019-04-24 19:53:25'),
(17, 'J. Owolabi et al', 'banner2.jpg', '2019-04-24 19:54:02'),
(18, 'P.A. Olagunju et al', 'banner2.jpg', '2019-04-24 19:54:38'),
(19, 'Chigozie Matthew et al', 'banner2.jpg', '2019-04-24 19:55:09'),
(20, 'D.O. Godwin et al', 'banner2.jpg', '2019-04-24 19:55:35'),
(21, 'D.O. Olalekan et al', 'banner2.jpg', '2019-04-24 19:56:18'),
(22, 'Mohammed H.Z. et al', 'banner2.jpg', '2019-04-24 19:57:07'),
(23, 'Yemi Olawale et al', 'banner.jpg', '2019-04-24 19:58:19'),
(24, 'S.M. Raji et al', 'banner.jpg', '2019-04-24 19:58:45'),
(25, 'Ajagbe Y. et al', 'banner.jpg', '2019-04-24 19:59:06'),
(26, 'J.O. Owolabi et al', 'banner.jpg', '2019-04-24 19:59:32'),
(27, 'Omotayo Oyekan et al', 'banner.jpg', '2019-04-24 20:00:30'),
(28, 'Joshua Okpara et al', 'ab3.jpg', '2019-04-24 20:00:53'),
(29, 'Abdul Hakeem', 'ab3.jpg', '2019-04-24 20:01:22'),
(30, 'Malik Umar et al', 'ab3.jpg', '2019-04-24 20:01:50'),
(31, 'Alexander A.A. et al', 'ab3.jpg', '2019-04-24 20:02:21'),
(32, 'Tonad Publishers Limited', 'ab3.jpg', '2019-04-24 20:03:26'),
(33, 'O.A Iwena', 'ab3.jpg', '2019-04-24 20:04:03'),
(34, 'Dibie C. Chris', 'ab3.jpg', '2019-04-24 20:04:38'),
(35, 'Gbenga M. Babalola', 'ab3.jpg', '2019-04-24 20:04:59'),
(36, 'U.E. Asuquo et al', 'ab3.jpg', '2019-04-24 20:05:20'),
(37, 'O.E Farinde et al', 'ab3.jpg', '2019-04-24 20:05:46'),
(38, 'Orovwuje B.O &amp; Okoli E.U', 'ab3.jpg', '2019-04-24 20:06:05'),
(39, 'Odesina I.A', 'ab3.jpg', '2019-04-24 20:06:21'),
(40, 'Gbenga M. Babalola &amp; Igbinobu Chuks', 'ab3.jpg', '2019-04-24 20:07:05'),
(41, 'O.A Longe', 'ab3.jpg', '2019-04-24 20:07:34'),
(42, 'R.A Ibrahim &amp; R.A Kazeem', 'ab3.jpg', '2019-04-24 20:08:22'),
(43, 'Cole Esan Ande', 'ab3.jpg', '2019-04-24 20:08:47'),
(44, 'Ibitola A.O', 'ab3.jpg', '2019-04-24 20:09:07'),
(45, 'M.C Michael', 'ab3.jpg', '2019-04-24 20:09:26'),
(46, 'Wadatau Bello et al', 'ab3.jpg', '2019-04-24 20:10:14'),
(47, 'Egbuna C.K. et al', 'ab3.jpg', '2019-04-24 20:10:39'),
(48, 'Francis E.Z et al', 'ab3.jpg', '2019-04-24 20:10:57'),
(49, 'Almaroof Asudemade', 'ab3.jpg', '2019-04-24 20:11:24'),
(50, 'Ariyo M.A. et al', 'ab3.jpg', '2019-04-24 20:11:50'),
(51, 'Bello A.A. et al', 'ab3.jpg', '2019-04-24 20:12:25'),
(52, 'Alabi D.O. et al', 'ab3.jpg', '2019-04-24 20:12:47'),
(53, 'S.M. Raji', 'ab3.jpg', '2019-04-24 20:13:08'),
(54, 'Adeshina M.K. et al', 'ab3.jpg', '2019-04-24 20:13:34'),
(55, 'Moshood H. et al', 'ab3.jpg', '2019-04-24 20:14:08'),
(56, 'F. Calculus Yeboah et al', 'ab3.jpg', '2019-04-24 20:14:32'),
(57, 'Dada G.O. et al', 'ab3.jpg', '2019-04-24 20:14:54'),
(58, 'Onuora H.', 'ab3.jpg', '2019-04-24 20:15:18'),
(59, 'Muhammed S. et al', 'ab3.jpg', '2019-04-24 20:15:50'),
(60, 'Olatunji et al', 'ab3.jpg', '2019-04-24 20:16:15'),
(61, 'Moshood A.H. et al', 'ab3.jpg', '2019-04-24 20:17:47'),
(62, 'Nicholas U.E. et al', 'ab3.jpg', '2019-04-24 20:18:20'),
(63, 'Obayemi T.O. et al', 'ab3.jpg', '2019-04-24 20:18:46'),
(64, 'Ayo Adeyemi et al', 'ab3.jpg', '2019-04-24 20:19:47'),
(65, 'Samson Adebayo et al', 'ab3.jpg', '2019-04-24 20:20:19'),
(66, 'Yemi Olawale', 'ab3.jpg', '2019-04-24 20:21:15'),
(67, 'David Ogundairo', 'ab3.jpg', '2019-04-24 20:21:43'),
(68, 'G.O. Dada et al', 'ab3.jpg', '2019-04-24 20:22:39'),
(69, 'Balogun A. et al', 'ab3.jpg', '2019-04-24 20:23:02'),
(70, 'M.O. Balogun', 'ab3.jpg', '2019-04-24 20:23:42'),
(71, 'Henry Bedeley', 'ab3.jpg', '2019-04-24 20:24:15'),
(72, 'Aoife Fletcher et al', 'ab3.jpg', '2019-04-24 20:24:40'),
(73, 'Marie Westlake', 'ab3.jpg', '2019-04-24 20:25:14'),
(74, 'Lasukanmi Tella', 'ab3.jpg', '2019-04-24 20:25:39'),
(75, 'Dipo Gbenro', 'ab3.jpg', '2019-04-24 20:26:04'),
(76, 'Aderibigbe Moronmubo', 'ab3.jpg', '2019-04-24 20:26:29'),
(77, 'Adefunke Famojuro', 'ab3.jpg', '2019-04-24 20:29:03'),
(78, 'Olusesan Ajewole', 'ab3.jpg', '2019-04-24 20:29:35'),
(79, 'Theresa Brown', 'ab3.jpg', '2019-04-24 20:30:19'),
(80, 'Samson Shobayo', 'ab3.jpg', '2019-04-24 20:31:07'),
(81, 'Chinelo Ifezulike', 'ab3.jpg', '2019-04-24 20:31:32'),
(82, 'Horace Wanpole', 'ab3.jpg', '2019-04-24 20:32:29'),
(83, 'Williams Shakespare', 'ab3.jpg', '2019-04-24 20:32:59'),
(84, 'Lorraine Hansberry', 'ab3.jpg', '2019-04-24 20:33:25'),
(85, 'Oliver Goldsmith', 'ab3.jpg', '2019-04-24 20:34:02'),
(86, 'Kayode Adeyem', 'ab3.jpg', '2019-04-24 20:34:40'),
(87, 'Taiwo Oyelade', 'ab3.jpg', '2019-04-24 20:35:00'),
(88, 'Tade Adegindin', 'ab3.jpg', '2019-04-24 20:35:25'),
(89, 'Jide Oguntoye', 'ab3.jpg', '2019-04-24 20:36:10'),
(90, 'T.A.O. Olayiwola', 'ab3.jpg', '2019-04-24 20:36:33'),
(91, 'Abubakar Umar et al', 'ab3.jpg', '2019-04-24 20:36:57'),
(93, 'Cadlinksdd', 'user.jpg', '2019-09-12 10:53:32'),
(94, 'Logo', 'logo.jpg', '2019-09-12 10:54:14');

-- --------------------------------------------------------

--
-- Table structure for table `shipped_product`
--

CREATE TABLE `shipped_product` (
  `shipping_id` int(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `time_shipped` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipped_product`
--

INSERT INTO `shipped_product` (`shipping_id`, `customer_id`, `order_number`, `status`, `time_shipped`) VALUES
(1, 'BDD7D5C27E', 'EDABBBEBE1A4B49E', 1, '2019-09-18 11:47:57'),
(2, '94696F7FD9', '0C30C18FA9CC7C9E', 1, '2019-09-18 11:48:13');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_address`
--

CREATE TABLE `shipping_address` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text,
  `landmark` varchar(255) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping_address`
--

INSERT INTO `shipping_address` (`id`, `customer_id`, `phone`, `address`, `landmark`, `state`, `city`) VALUES
(1, '123NFEBH333', '09072281204', 'Our House', 'Oja Oba Ibadan', 'Ekiti', 'Ekiti'),
(2, '94696F7FD9', '09072281204', 'Offa', 'Oja Oba Ibadan Oyo State', 'Kwara', 'Kwara'),
(3, 'BDD7D5C27E', '08173536333', 'Ladoke Akintola Manatan Ibadan', 'Foodco Bodija', 'Oyo', 'Oyo');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_location_charge`
--

CREATE TABLE `shipping_location_charge` (
  `id` int(11) NOT NULL,
  `location` varchar(30) DEFAULT NULL,
  `charge` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping_location_charge`
--

INSERT INTO `shipping_location_charge` (`id`, `location`, `charge`) VALUES
(1, 'Lagos', 10000),
(2, 'Ogun', 1500),
(3, 'Osun', 1500),
(4, 'Ondo', 1500),
(5, 'Ekiti', 1500),
(6, 'Oyo', 1000),
(7, 'Edo', 2500),
(38, 'Benue', 2500),
(39, 'Kogi', 2500),
(40, 'Kwara', 2500),
(41, 'Nasarawa', 2500),
(42, 'Niger', 2500),
(43, 'Plateau', 2500),
(44, 'Abuja', 2500),
(46, 'Anambra', 2500),
(47, 'Ebonyi', 2500),
(48, 'Enugu', 2500),
(49, 'Imo', 2500),
(50, 'Adamawa', 2500),
(51, 'Bauchi', 2500),
(52, 'Borno', 2500),
(53, 'Gombe', 2500),
(54, 'Taraba', 2500),
(55, 'Yobe', 2500),
(56, 'Akwa Ibom', 2500),
(57, 'Cross River', 2500),
(58, 'Bayelsa', 2500),
(59, 'Rivers', 2500),
(60, 'Delta', 2500),
(61, 'Jigawa', 2500),
(62, 'Kaduna', 2500),
(63, 'Kano', 2500),
(64, 'Katsina', 2500),
(65, 'Kebbi', 2500),
(66, 'Sokoto', 2500),
(67, 'Zamfara', 2500),
(71, 'Abia', 2500);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `list_id` int(255) NOT NULL,
  `customer_id` text NOT NULL,
  `slug` text NOT NULL,
  `action` varchar(25) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`list_id`, `customer_id`, `slug`, `action`, `time_added`) VALUES
(1, '94696F7FD9', 'nexus-48309211', 'Wishlist', '2019-09-18 11:01:19'),
(3, '94696F7FD9', 'nexus-98790019', 'Delete Wishlist          ', '2019-09-18 11:06:37'),
(5, '94696F7FD9', 'nexus-48309211', 'Delete Compare           ', '2019-09-18 11:12:26'),
(6, '94696F7FD9', 'nexus-48309211', 'Compare', '2019-09-18 11:16:29'),
(8, '94696F7FD9', '2b-54861002', 'Compare', '2019-09-18 11:18:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`act_id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_order_details`
--
ALTER TABLE `customer_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_registration`
--
ALTER TABLE `customer_registration`
  ADD PRIMARY KEY (`registration_id`);

--
-- Indexes for table `delivered_product`
--
ALTER TABLE `delivered_product`
  ADD PRIMARY KEY (`deliver_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `payment_history`
--
ALTER TABLE `payment_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `products_category`
--
ALTER TABLE `products_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `product_stock`
--
ALTER TABLE `product_stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `product_weight`
--
ALTER TABLE `product_weight`
  ADD PRIMARY KEY (`weight_id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`publisher_id`);

--
-- Indexes for table `shipped_product`
--
ALTER TABLE `shipped_product`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_location_charge`
--
ALTER TABLE `shipping_location_charge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`list_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `act_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer_order_details`
--
ALTER TABLE `customer_order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customer_registration`
--
ALTER TABLE `customer_registration`
  MODIFY `registration_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `delivered_product`
--
ALTER TABLE `delivered_product`
  MODIFY `deliver_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `payment_history`
--
ALTER TABLE `payment_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products_category`
--
ALTER TABLE `products_category`
  MODIFY `category_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_stock`
--
ALTER TABLE `product_stock`
  MODIFY `stock_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `type_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_weight`
--
ALTER TABLE `product_weight`
  MODIFY `weight_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `publisher_id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `shipped_product`
--
ALTER TABLE `shipped_product`
  MODIFY `shipping_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping_address`
--
ALTER TABLE `shipping_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shipping_location_charge`
--
ALTER TABLE `shipping_location_charge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `list_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
