-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2021 at 01:59 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fast_food`
--

-- --------------------------------------------------------

--
-- Table structure for table `addones`
--

CREATE TABLE `addones` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` int(10) NOT NULL,
  `image` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `addones`
--

INSERT INTO `addones` (`id`, `name`, `price`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"\\u064a\\u0628\\u0644\\u064a\\u0628\\u0644ll\",\"en\":\"dfgdfgll\"}', 55, 'files/addone_images/936184_1626553538.jpg', 1, '2021-07-17 18:25:21', '2021-07-17 20:11:32'),
(26, '{\"ar\":\"\\u0627\\u0636\\u0627\\u0641\\u0629\",\"en\":\"addon\"}', 55, NULL, 1, '2021-07-18 05:42:11', '2021-07-18 05:42:11');

-- --------------------------------------------------------

--
-- Table structure for table `addones_order`
--

CREATE TABLE `addones_order` (
  `id` int(20) NOT NULL,
  `order_id` int(20) NOT NULL,
  `addon_id` int(20) NOT NULL,
  `quantity` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `addones_order`
--

INSERT INTO `addones_order` (`id`, `order_id`, `addon_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, '2021-04-14 14:06:34', '0000-00-00 00:00:00'),
(2, 52, 1, 5, '2021-04-14 18:07:51', '2021-04-14 18:07:51'),
(3, 52, 1, 5, '2021-04-14 18:07:51', '2021-04-14 18:07:51'),
(4, 52, 1, 5, '2021-04-14 18:07:51', '2021-04-14 18:07:51'),
(5, 53, 3, 2, '2021-04-15 17:52:05', '2021-04-15 17:52:05'),
(6, 53, 4, 2, '2021-04-15 17:52:05', '2021-04-15 17:52:05'),
(7, 55, 3, 2, '2021-04-15 18:01:26', '2021-04-15 18:01:26'),
(8, 55, 4, 2, '2021-04-15 18:01:26', '2021-04-15 18:01:26'),
(9, 56, 3, 2, '2021-04-15 18:06:55', '2021-04-15 18:06:55'),
(10, 56, 4, 2, '2021-04-15 18:06:56', '2021-04-15 18:06:56'),
(14, 101, 23, 1000, '2021-07-15 10:28:46', '2021-07-15 10:28:46'),
(15, 101, 23, 500, '2021-07-15 10:28:46', '2021-07-15 10:28:46'),
(16, 101, 12, 100, '2021-07-15 10:28:46', '2021-07-15 10:28:46');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(5) NOT NULL,
  `user_id` int(20) NOT NULL,
  `new_address` text NOT NULL,
  `area_id` int(10) NOT NULL,
  `lat` double NOT NULL,
  `long` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `user_id`, `new_address`, `area_id`, `lat`, `long`, `created_at`, `updated_at`) VALUES
(1, 1, 'باستخدام الحدود السياسية عموما، وأسماء الشوارع والإشارات، جنبا إلى جنب مع معرفات أخرى مثل رقم المنزل أو الشقة\r\n222222222222', 1, 30.0117, 30.0117, '2021-04-14 09:26:41', '2021-04-14 11:10:54'),
(2, 1, 'cvbnm,.باستخدام الحدود السياسية عموما، وأسماء الشوارع والإشارات، جنبا إلى جنب مع معرفات أخرى مثل رقم المنزل أو الشقة85225852025200252', 1, 30.0117, 30.0117, '2021-04-14 09:26:37', '2021-04-14 11:11:28'),
(3, 1, '10 تمكن هذه الخدمة المواطنين والمقيمين المسجلين في العنوان', 1, 30.0117, 30.0117, '2021-04-14 15:35:03', '2021-04-14 11:35:03'),
(4, 2, 'Giza El Metro', 1, 30.010781705372, 31.206810884178, '2021-04-14 16:29:20', '2021-04-14 12:29:20'),
(5, 2, 'Giza El Metro New York', 2, 30.011484872676, 31.205361150205, '2021-04-14 16:33:50', '2021-04-14 12:33:50'),
(6, 2, 'Giza El Metro New York Is A great Place', 1, 30.010431861813, 31.20200201869, '2021-04-14 16:54:24', '2021-04-14 12:54:24'),
(7, 2, 'Giza El Metro New York Is A', 2, 30.01130225869, 31.205092258751, '2021-04-17 14:34:14', '2021-04-17 10:34:14'),
(8, 9, 'Here', 1, 55, 66, '2021-07-11 16:30:52', '2021-07-11 18:30:52'),
(9, 2, 'Helwan Egypt', 1, 0, 0, '2021-07-14 12:42:36', '2021-07-14 14:42:36');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `name_en` varchar(250) NOT NULL,
  `stauts` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `name`, `name_en`, `stauts`) VALUES
(1, 'ميامى', 'miami', 1),
(2, 'المعمورة', 'maamoura', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `products_size` int(10) NOT NULL,
  `price` int(20) NOT NULL,
  `name` varchar(250) NOT NULL,
  `quantity` int(4) NOT NULL,
  `image` text DEFAULT NULL,
  `isAddon` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `products_size`, `price`, `name`, `quantity`, `image`, `isAddon`, `created_at`, `updated_at`) VALUES
(26, 9, 1, 5, 5, 'test', 33, NULL, 1, '2021-07-11 17:03:36', '2021-07-11 17:19:28');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` int(11) NOT NULL DEFAULT 0,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `best` int(11) NOT NULL DEFAULT 0,
  `main_category` int(11) NOT NULL DEFAULT 0,
  `image` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `sort` int(11) DEFAULT 0,
  `type` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `code`, `name`, `best`, `main_category`, `image`, `sort`, `type`, `status`, `created_at`, `updated_at`) VALUES
(25, 0, '{\"en\":\"Cupping tools\",\"ar\":\"\\u0627\\u062f\\u0648\\u0627\\u062a \\u0627\\u0644\\u062d\\u062c\\u0627\\u0645\\u0629\"}', 0, 25, '1617634237.jpg', 1, 0, 1, '2021-04-05 20:50:37', '2021-04-05 20:50:37'),
(26, 0, '{\"en\":\"medical accs\",\"ar\":\"\\u0627\\u0644\\u0639\\u0646\\u0627\\u064a\\u0629 \\u0628\\u0627\\u0644\\u0628\\u0634\\u0631\\u0629\"}', 0, 26, NULL, 2, 0, 1, '2021-04-05 21:01:53', '2021-04-05 21:01:53'),
(28, 1556, '{\"ar\":\"\\u062a\\u064a\\u0633\\u062a\",\"en\":\"test\"}', 0, 0, NULL, 0, 0, 1, '2021-07-13 09:32:41', '2021-07-13 09:32:41'),
(43, 88888, '{\"ar\":\"\\u062a\\u064a\\u0633\\u062a\",\"en\":\"\\u062a\\u062a\\u0633\\u062a\\u0646\\u0646\"}', 0, 0, NULL, 0, 0, 1, '2021-07-13 12:29:11', '2021-07-13 12:29:11'),
(49, 12314, '{\"ar\":\"\\u0645\\u0639\\u062c\\u0646\\u0627\\u062a\",\"en\":\"moagnat\"}', 0, 48, NULL, 0, 0, 1, '2021-07-13 16:55:51', '2021-07-13 16:55:51'),
(51, 124569, '{\"ar\":\"sdfs\",\"en\":\"sds\"}', 0, 50, NULL, 0, 0, 1, '2021-07-13 18:26:50', '2021-07-13 18:26:50'),
(53, 121564, '{\"ar\":\"sdfwefsd\",\"en\":\"sdfsdfs\"}', 0, 52, NULL, 0, 0, 1, '2021-07-13 18:30:56', '2021-07-13 18:30:56'),
(55, 3151, '{\"ar\":\"first\",\"en\":\"sdfsdf\"}', 0, 54, NULL, 0, 0, 1, '2021-07-13 18:38:00', '2021-07-13 18:38:00'),
(56, 2315, '{\"ar\":\"sdfsd\",\"en\":\"sdfsd\"}', 0, 0, NULL, 0, 0, 1, '2021-07-13 18:52:20', '2021-07-13 18:52:20'),
(66, 21654, '{\"ar\":\"\\u062a\\u064a\\u0633\\u062a\",\"en\":\"test\"}', 0, 0, NULL, 0, 0, 1, '2021-07-13 21:11:08', '2021-07-13 21:11:08'),
(67, 2315, '{\"ar\":\"\\u0633\\u06281\",\"en\":\"sub1\"}', 0, 66, NULL, 0, 0, 1, '2021-07-13 21:11:08', '2021-07-13 21:11:08'),
(68, 23156, '{\"ar\":\"\\u0633\\u06282\",\"en\":\"sub2\"}', 0, 66, NULL, 0, 0, 1, '2021-07-13 21:11:08', '2021-07-13 21:11:08'),
(74, 135648, '{\"ar\":\"\\u0643\\u0627\\u062a\\u062c\\u0648\\u06311\",\"en\":\"caregory1\"}', 0, 0, 'files/categories_images/471491_1626250962.jpg', 0, 0, 1, '2021-07-14 06:22:42', '2021-07-14 06:22:42'),
(75, 13256, '{\"ar\":\"\\u0633\\u06281\",\"en\":\"sub2\"}', 0, 74, NULL, 0, 0, 1, '2021-07-14 06:22:42', '2021-07-14 06:41:16'),
(76, 786451, '{\"ar\":\"\\u0633\\u06282\",\"en\":\"sub3\"}', 0, 74, NULL, 0, 0, 1, '2021-07-14 06:22:42', '2021-07-14 06:41:16'),
(91, 13256, '{\"ar\":\"\\u0633\\u06281\",\"en\":\"sub2\"}', 0, 74, NULL, 0, 0, 1, '2021-07-14 06:51:51', '2021-07-14 06:51:51'),
(92, 326566, '{\"ar\":\"\\u0633\\u064a\\u06282\",\"en\":\"sub123\"}', 0, 74, NULL, 0, 0, 1, '2021-07-14 06:51:51', '2021-07-14 06:51:51');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) NOT NULL,
  `coupon_code` varchar(20) NOT NULL,
  `coupon_disc` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `coupon_disc`, `status`, `startDate`, `endDate`, `created_at`, `updated_at`) VALUES
(1, 'h1250r', 50, 1, '2021-04-13 12:57:30', '2021-04-16 12:57:30', '2021-04-15 10:58:18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email_verified_at` date DEFAULT NULL,
  `area_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `lat` int(11) DEFAULT NULL,
  `long` int(11) DEFAULT NULL,
  `remember_token` text DEFAULT NULL,
  `lang` varchar(255) NOT NULL DEFAULT 'en',
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `password`, `address`, `phone`, `email_verified_at`, `area_id`, `group_id`, `image`, `lat`, `long`, `remember_token`, `lang`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'omartarek_omar', 'omartarek12@gmail.com', '$2y$10$4TZc0janM4PhaB4sLnyy9.bKj1KJd2BWe5N8Ymk6/.Of08.9y8lp.', 'Gize, Cairo, Egypt', '+20126546321646', '0000-00-00', 1, 1, '64966_1625487823.jpg', 123, 12, '', '', 0, '2021-07-06', '2021-07-17'),
(2, 'عمر طارق', 'admin@gmail.com', '123456', 'القاهرة مصر', '+201215421', NULL, 1, 1, NULL, NULL, NULL, NULL, '', 0, '2021-07-08', '2021-07-08'),
(4, 'Omar Tarek', 'omartarek1212@gmail.com', '$2y$10$yChfZFYt6EpBpmTZrHlpWeFV/ndDHDua83p77cvj1qtjzhM8LLZua', 'Cairo, Egypt', '+2011111111111', NULL, 1, 1, 'files/user_images/5ol3.PNG', NULL, NULL, NULL, 'ar', 1, '2021-07-08', '2021-07-18'),
(6, 'OmarTArek', 'admin@g.com', '$2y$10$cHQV.md6qiBZG/ZgyBwJe.o0Ph784dCT9hkuz7vR/92e0Q9rbZI6W', 'cairo, egypt', '+20545121545', NULL, 1, 4, NULL, NULL, NULL, NULL, '', 0, '2021-07-08', '2021-07-08'),
(7, 'عمر طارق', 'ot1@gmail.com', '$2y$10$CM/4PGxcISdQSUzaIFyWCet2N3Dq3yIwYkXejaT.MuP44YGkT6KZO', 'adsfadsf', '+201524154', NULL, 1, 1, NULL, NULL, NULL, NULL, 'en', 0, '2021-07-11', '2021-07-11'),
(8, 'عمر طارق', 'oott@g.com', '$2y$10$0Kxr3omErGlJOstoi0dRFuUi3lgHp5VQbH1od65/SWcftHd0JJzo.', 'asdfaf', '123', NULL, 1, 5, NULL, NULL, NULL, NULL, 'en', 0, '2021-07-11', '2021-07-11'),
(9, 'Kase', 'Kase@gmail.com', '$2y$10$vlYaWevoYQJAbJ4xqYL/ouy.6tUWGof5tFYmuv8M2fUaK2omT/KdC', 'Cairo Egypt', '01550541873', NULL, 1, 1, NULL, NULL, NULL, NULL, 'en', 0, '2021-07-17', '2021-07-17'),
(10, 'omartarek_omartarek', 'omartarek1230@gmail.com', '$2y$10$TH9kRDbQtNmB9OBoossO/.CCsze.DekeSC82zpYsNbQiPN8kkYkK6', 'Gize, Cairo, France', '+20116546321646', NULL, 2, 1, NULL, NULL, NULL, NULL, 'en', 0, '2021-07-17', '2021-07-17');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Group1', 'Description for Group 1 ', 1, '2021-06-22 13:55:19', '2021-06-18 13:55:19'),
(2, 'الإدارة', 'جروب الإدراة', 1, '2021-07-08 10:23:45', '2021-07-08 10:23:45'),
(4, 'المبيعات', 'جروب المبيعات', 1, '2021-07-08 11:41:07', '2021-07-08 11:41:07'),
(5, 'NewGroup', 'New', 1, '2021-07-11 10:34:09', '2021-07-11 10:34:09'),
(6, 'Hr', 'to help employees', 1, '2021-07-11 11:05:19', '2021-07-11 11:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2021_04_07_111251_create_groups_table', 1),
(3, '2021_04_07_111446_create_permissions_table', 1),
(4, '2021_04_07_111511_create_roles_table', 1),
(5, '2021_04_07_111620_create_permission__groups_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 2),
(7, '2019_08_19_000000_create_failed_jobs_table', 2),
(8, '2021_07_07_082556_create_settings_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(20) NOT NULL,
  `homesort` int(11) DEFAULT NULL,
  `main_categorie_id` int(11) DEFAULT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `final_price` float DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `product_id`, `homesort`, `main_categorie_id`, `categorie_id`, `price`, `final_price`, `start_date`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 200.00, 150, '2021-04-12', '2021-04-13', 1, '2021-04-12 19:14:18', '2021-04-12 19:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL,
  `address_id` int(20) NOT NULL,
  `delivery_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_fees` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `duration` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noti` int(11) NOT NULL DEFAULT 0,
  `nots` text CHARACTER SET utf8 DEFAULT NULL,
  `cancel_at` datetime DEFAULT NULL,
  `delivered_at` datetime DEFAULT NULL,
  `confirm_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `phone`, `price`, `address_id`, `delivery_method`, `payment_method`, `ship_fees`, `status`, `duration`, `noti`, `nots`, `cancel_at`, `delivered_at`, `confirm_at`, `created_at`, `updated_at`) VALUES
(58, 2, 'Shady Samir', '1207090513', 30, 5, '1', 'Cash and Deliver', 50, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-04-17 14:36:24', '2021-04-17 14:36:24'),
(76, 2, 'Omar', '01550541873', 99, 4, '1', '1', 50, 1, NULL, 0, 'test', NULL, NULL, NULL, '2021-07-15 09:36:58', '2021-07-15 09:36:58'),
(52, 2, 'Shady Samir', '1207090513', 0, 6, '1', '1', 50, 3, NULL, 0, NULL, NULL, NULL, NULL, '2021-04-15 17:56:35', '2021-04-15 17:56:35'),
(55, 2, 'Shady Samir', '1207090513', 30, 0, '1', '1', 50, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-04-15 18:01:26', '2021-04-15 18:01:26'),
(56, 2, 'Shady Samir', '1207090513', 30, 0, '1', '1', 50, 0, NULL, 0, 'Address', NULL, NULL, NULL, '2021-04-15 18:06:55', '2021-04-15 18:06:55'),
(59, 9, 'heller', '01550541873', 55, 1, '1', 'test', 55, 0, NULL, 0, 'WoooW', NULL, NULL, NULL, '2021-07-11 17:30:29', '2021-07-11 17:30:29'),
(60, 9, 'heller', '01550541873', 55, 1, '1', 'test', 55, 0, NULL, 0, 'WoooW', NULL, NULL, NULL, '2021-07-11 17:42:00', '2021-07-11 17:42:00'),
(61, 9, 'heller', '01550541873', 55, 1, '1', 'test', 55, 0, NULL, 0, 'WoooW', NULL, NULL, NULL, '2021-07-11 17:42:29', '2021-07-11 17:42:29'),
(62, 9, 'heller', '01550541873', 55, 1, '1', 'test', 55, 0, NULL, 0, 'WoooW', NULL, NULL, NULL, '2021-07-11 17:44:30', '2021-07-11 17:44:30'),
(63, 9, NULL, NULL, 55, 1, '1', NULL, 55, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-07-12 04:58:23', '2021-07-12 04:58:23'),
(64, 9, NULL, NULL, 55, 1, '1', NULL, 55, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-07-12 04:58:51', '2021-07-12 04:58:51'),
(65, 9, NULL, NULL, 55, 1, '1', NULL, 55, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-07-12 04:59:07', '2021-07-12 04:59:07'),
(66, 9, 'Kase', '01550541873', 55, 1, '1', 'cash on delivery', 55, 0, NULL, 0, 'no thing', NULL, NULL, NULL, '2021-07-12 05:02:28', '2021-07-12 05:02:28'),
(67, 9, 'Kase', '01550541873', 55, 1, '1', 'cash on delivery', 55, 0, NULL, 0, 'no thing', NULL, NULL, NULL, '2021-07-12 05:03:07', '2021-07-12 05:03:07'),
(68, 9, 'Kase', '01550541873', 55, 1, '1', 'cash on delivery', 55, 0, NULL, 0, 'no thing', NULL, NULL, NULL, '2021-07-12 05:03:33', '2021-07-12 05:03:33'),
(69, 9, 'Kase', '01550541873', 55, 1, '1', 'cash on delivery', 55, 0, NULL, 0, 'no thing', NULL, NULL, NULL, '2021-07-12 05:03:54', '2021-07-12 05:03:54'),
(70, 9, 'Kase', '01550541873', 55, 1, '1', 'cash on delivery', 55, 0, NULL, 0, 'no thing', NULL, NULL, NULL, '2021-07-12 05:04:24', '2021-07-12 05:04:24'),
(73, 2, 'omar', '01550541873', 55, 4, '1', '1', 3, 1, NULL, 0, 'dkfjgk', NULL, NULL, NULL, '2021-07-14 12:31:16', '2021-07-14 12:31:16'),
(75, 2, 'omar', '01550541873', 20, 9, '1', '1', 11, 1, NULL, 0, 'asdasd', NULL, NULL, NULL, '2021-07-14 12:42:36', '2021-07-14 12:42:36'),
(77, 2, 'Omar', '01550541873', 99, 4, '1', '1', 50, 1, NULL, 0, 'test', NULL, NULL, NULL, '2021-07-15 09:37:30', '2021-07-15 09:37:30'),
(78, 2, 'Omar', '01550541873', 99, 4, '1', '1', 50, 1, NULL, 0, 'test', NULL, NULL, NULL, '2021-07-15 09:42:10', '2021-07-15 09:42:10'),
(79, 2, 'Omar', '01550541873', 99, 4, '1', '1', 50, 1, NULL, 0, 'test', NULL, NULL, NULL, '2021-07-15 09:42:30', '2021-07-15 09:42:30'),
(80, 2, 'Omar', '01550541873', 99, 4, '1', '1', 50, 1, NULL, 0, 'testdfgdfg', NULL, NULL, NULL, '2021-07-15 09:43:58', '2021-07-15 09:43:58'),
(81, 2, 'Omar', '01550541873', 99, 4, '1', '1', 50, 1, NULL, 0, 'testdfgdfg', NULL, NULL, NULL, '2021-07-15 09:44:45', '2021-07-15 09:44:45'),
(82, 2, 'Omar', '01550541873', 99, 4, '1', '1', 20, 1, NULL, 0, 'sdfs', NULL, NULL, NULL, '2021-07-15 09:45:41', '2021-07-15 09:45:41'),
(83, 9, 'Omar', '01550541873', 99, 8, '1', '1', 20, 1, NULL, 0, 'sdfs', NULL, NULL, NULL, '2021-07-15 09:49:37', '2021-07-15 09:49:37'),
(84, 9, 'Omar', '01550541873', 99, 8, '1', '1', 20, 1, NULL, 0, 'sdfs', NULL, NULL, NULL, '2021-07-15 09:49:55', '2021-07-15 09:49:55'),
(85, 9, 'Omar', '01550541873', 99, 8, '1', '1', 20, 1, NULL, 0, 'sdfs', NULL, NULL, NULL, '2021-07-15 09:51:15', '2021-07-15 09:51:15'),
(86, 9, 'Omar', '01550541873', 99, 8, '1', '1', 20, 1, NULL, 0, 'sdfs', NULL, NULL, NULL, '2021-07-15 09:51:48', '2021-07-15 09:51:48'),
(87, 9, 'Omar', '01550541873', 99, 8, '1', '1', 20, 1, NULL, 0, 'sdfs', NULL, NULL, NULL, '2021-07-15 09:52:16', '2021-07-15 09:52:16'),
(88, 9, 'Omar', '01550541873', 99, 8, '1', '1', 20, 1, NULL, 0, 'sdfs', NULL, NULL, NULL, '2021-07-15 09:52:24', '2021-07-15 09:52:24'),
(89, 9, 'Omar', '01550541873', 99, 8, '1', '1', 20, 1, NULL, 0, 'sdfs', NULL, NULL, NULL, '2021-07-15 09:52:36', '2021-07-15 09:52:36'),
(90, 2, 'Omar', '01550541873', 99, 4, '1', '1', 20, 1, NULL, 0, 'sdfs', NULL, NULL, NULL, '2021-07-15 09:53:11', '2021-07-15 09:53:11'),
(91, 2, 'Omar', '01550541873', 99, 4, '1', '1', 20, 1, NULL, 0, 'sdfs', NULL, NULL, NULL, '2021-07-15 09:54:10', '2021-07-15 09:54:10'),
(92, 2, 'Omar', '01550541873', 99, 4, '1', '1', 20, 1, NULL, 0, 'sdfs', NULL, NULL, NULL, '2021-07-15 09:54:19', '2021-07-15 09:54:19'),
(93, 2, 'Omar', '01550541873', 99, 4, '1', '1', 20, 1, NULL, 0, 'sdfs', NULL, NULL, NULL, '2021-07-15 09:54:39', '2021-07-15 09:54:39'),
(94, 2, 'Omar', '01550541873', 99, 4, '1', '1', 20, 1, NULL, 0, 'sdfs', NULL, NULL, NULL, '2021-07-15 09:55:17', '2021-07-15 09:55:17'),
(95, 2, 'Omar', '01550541873', 99, 4, '1', '1', 20, 1, NULL, 0, 'sdfs', NULL, NULL, NULL, '2021-07-15 09:55:26', '2021-07-15 09:55:26'),
(96, 9, 'Omar', '01550541873', 99, 8, '1', '1', 20, 1, NULL, 0, 'sdfs', NULL, NULL, NULL, '2021-07-15 09:57:07', '2021-07-15 09:57:07'),
(97, 2, 'Omar', '01550541873', 99, 4, '1', '1', 20, 1, NULL, 0, 'sdfs', NULL, NULL, NULL, '2021-07-15 09:59:58', '2021-07-15 09:59:58'),
(98, 2, 'Omar', '01550541873', 99, 4, '1', '1', 20, 1, NULL, 0, 'sdfs', NULL, NULL, NULL, '2021-07-15 10:00:57', '2021-07-15 10:00:57'),
(99, 2, 'omar', '01550541873', 25555, 4, '1', '1', 1000, 1, NULL, 0, 'dfgd', NULL, NULL, NULL, '2021-07-15 10:02:53', '2021-07-15 10:02:53'),
(100, 2, 'Kase', '0155054173', 25556, 4, '1', '1', 5000, 1, NULL, 0, 'dsfsdf', NULL, NULL, NULL, '2021-07-15 10:28:10', '2021-07-15 10:28:10'),
(101, 2, 'Kase', '0155054173', 25556, 4, '1', '1', 5000, 1, NULL, 0, 'dsfsdf', NULL, NULL, NULL, '2021-07-15 10:28:46', '2021-07-15 10:28:46');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('omartarek1212@gmail.com', '$2y$10$JuNcVAtpFPlIZxKHnxY5leSyNBqUkszHN5AiLA1BDk9zNLvjuSLBm', '2021-07-08 12:32:46'),
('omartarek12@gmail.com', '$2y$10$GpzctRqjJko8l.amLYx8u.Oyqia1NwR8dDh8NJKDygeN5MfXm/xH.', '2021-07-08 12:37:04');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `breifName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ControllerName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MethodName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('admin','user','employee') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `breifName`, `ControllerName`, `MethodName`, `type`, `status`, `created_at`, `updated_at`) VALUES
(2, 'test123', 'test321', 'LoginController', 'login', 'user', 0, '2021-07-07 05:15:31', '2021-07-07 06:10:34'),
(3, 'إعدادات المستخدمين', 'التحكم في المستخدمين', 'UserController', 'listUsers', 'user', 0, '2021-07-08 06:59:51', '2021-07-11 09:04:56'),
(4, 'حذف عضو', 'حذف', 'UserController', 'destroyUser', 'user', 1, '2021-07-08 10:05:49', '2021-07-08 10:05:49'),
(5, 'اضافة مستخدم', 'إضافة مستخدم', 'UserController', 'AddUser', 'user', 1, '2021-07-08 10:35:31', '2021-07-08 10:35:31'),
(6, 'عرض المستخدمين', 'عرض جميع المستخدمين', 'UserController', 'listUsers', 'user', 1, '2021-07-08 10:51:33', '2021-07-08 10:51:33'),
(7, 'السوشيال', 'التعالم مع السوشيال ميديا', 'SettingsController', 'addSocial', 'user', 1, '2021-07-08 11:01:26', '2021-07-08 11:01:26'),
(8, 'تعديل بيانات الموقع', 'تعديل بيانات الموقع', 'SettingsController', 'edit', 'user', 1, '2021-07-08 11:20:42', '2021-07-08 11:20:42'),
(9, 'عرض الأعضاء', 'عرض جميع الأعضاء', 'UserController', 'listEmployees', 'user', 1, '2021-07-08 11:28:48', '2021-07-08 11:28:48'),
(10, 'حذف عضو', 'حذف عضو', 'UserController', 'destroyEmployee', 'user', 1, '2021-07-08 11:31:03', '2021-07-08 11:31:03'),
(11, 'تعديل بيانات المستخدمين', 'تعديل بيانات المستخدمين', 'UserController', 'ViewEditForm', 'user', 1, '2021-07-08 12:00:21', '2021-07-08 12:00:21'),
(12, 'View Group Management', 'dealing wih groups', 'PermissionController', 'viewGroups', 'user', 1, '2021-07-11 09:12:59', '2021-07-11 09:12:59');

-- --------------------------------------------------------

--
-- Table structure for table `permission__groups`
--

CREATE TABLE `permission__groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission__groups`
--

INSERT INTO `permission__groups` (`id`, `group_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 2, 3, NULL, NULL),
(2, 2, 4, '2021-07-30 12:06:09', '2021-07-09 12:06:09'),
(3, 2, 3, '2021-07-08 10:34:47', '2021-07-08 10:34:47'),
(4, 2, 5, '2021-07-08 10:35:46', '2021-07-08 10:35:46'),
(5, 2, 5, '2021-07-08 10:46:45', '2021-07-08 10:46:45'),
(6, 2, 6, '2021-07-08 10:51:55', '2021-07-08 10:51:55'),
(7, 2, 5, '2021-07-08 10:52:40', '2021-07-08 10:52:40'),
(9, 2, 7, '2021-07-08 11:01:57', '2021-07-08 11:01:57'),
(10, 2, 3, '2021-07-08 11:16:15', '2021-07-08 11:16:15'),
(11, 1, 7, '2021-07-08 11:19:38', '2021-07-08 11:19:38'),
(12, 1, 8, '2021-07-08 11:21:02', '2021-07-08 11:21:02'),
(13, 1, 9, '2021-07-08 11:29:04', '2021-07-08 11:29:04'),
(14, 1, 4, '2021-07-08 11:31:24', '2021-07-08 11:31:24'),
(15, 1, 10, '2021-07-08 11:31:37', '2021-07-08 11:31:37'),
(16, 4, 9, '2021-07-08 11:43:15', '2021-07-08 11:43:15'),
(17, 4, 10, '2021-07-08 11:44:09', '2021-07-08 11:44:09'),
(18, 4, 11, '2021-07-08 12:00:37', '2021-07-08 12:00:37'),
(19, 1, 4, '2021-07-11 10:03:35', '2021-07-11 10:03:35'),
(20, 1, 5, '2021-07-11 10:03:35', '2021-07-11 10:03:35'),
(21, 1, 9, '2021-07-11 10:03:35', '2021-07-11 10:03:35'),
(22, 1, 4, '2021-07-11 10:04:11', '2021-07-11 10:04:11'),
(23, 1, 7, '2021-07-11 10:04:11', '2021-07-11 10:04:11'),
(24, 4, 3, '2021-07-11 10:05:07', '2021-07-11 10:05:07'),
(25, 4, 6, '2021-07-11 10:05:07', '2021-07-11 10:05:07'),
(26, 4, 5, '2021-07-11 10:11:26', '2021-07-11 10:11:26'),
(27, 4, 8, '2021-07-11 10:11:26', '2021-07-11 10:11:26'),
(28, 4, 11, '2021-07-11 10:11:26', '2021-07-11 10:11:26'),
(29, 1, 6, '2021-07-11 10:28:09', '2021-07-11 10:28:09'),
(30, 1, 8, '2021-07-11 10:28:09', '2021-07-11 10:28:09'),
(31, 1, 10, '2021-07-11 10:28:09', '2021-07-11 10:28:09'),
(32, 4, 2, '2021-07-11 10:32:05', '2021-07-11 10:32:05'),
(33, 5, 3, '2021-07-11 10:41:58', '2021-07-11 10:41:58'),
(34, 6, 4, '2021-07-11 11:06:12', '2021-07-11 11:06:12'),
(35, 6, 5, '2021-07-11 11:06:12', '2021-07-11 11:06:12'),
(36, 6, 8, '2021-07-11 11:06:12', '2021-07-11 11:06:12'),
(37, 6, 11, '2021-07-11 11:06:12', '2021-07-11 11:06:12');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_category` int(11) NOT NULL DEFAULT 0,
  `type` int(11) DEFAULT 0,
  `Calories` int(5) DEFAULT NULL,
  `price` double DEFAULT 0,
  `new_price` double DEFAULT 0,
  `currency` int(11) NOT NULL DEFAULT 1,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_count` int(11) NOT NULL DEFAULT 0,
  `video_count` int(11) NOT NULL DEFAULT 0,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `installment` int(1) NOT NULL DEFAULT 0,
  `available` int(1) NOT NULL DEFAULT 1,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `status` int(1) DEFAULT 1,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `rate` int(11) NOT NULL DEFAULT 0,
  `follow` int(11) NOT NULL DEFAULT 0,
  `favorite` int(11) NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL,
  `youtube` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_thumb` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home` int(11) NOT NULL DEFAULT 0,
  `best` int(11) NOT NULL DEFAULT 0,
  `bar_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT 0,
  `attributes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `slug`, `category`, `sub_category`, `type`, `Calories`, `price`, `new_price`, `currency`, `image`, `image_count`, `video_count`, `details`, `installment`, `available`, `quantity`, `status`, `user_id`, `created_at`, `views`, `rate`, `follow`, `favorite`, `updated_at`, `youtube`, `video`, `video_thumb`, `time`, `home`, `best`, `bar_code`, `product_code`, `delivery_type`, `flag`, `attributes`) VALUES
(1, '1356', '{\"ar\":\"جامبو\",\"en\":\"dfgdfg\"}', 'كريم-ترطيب-الوجة', '25', 1, 0, NULL, 399, 230, 1, '1616420999.png', 0, 0, '<p><span style=\"font-family: \"Open Sans\", Arial, sans-serif; text-align: justify;\">لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</span><br></p>', 1, 0, 5, 0, 1, '2021-03-22 14:45:06', 0, 0, 0, 0, '2021-07-16 20:03:37', NULL, NULL, NULL, '00:00', 1, 1, NULL, NULL, NULL, 0, '[\"25\",\"30\",\".25\",\"red,green,\"]'),
(2, '1213', '{\"ar\":\"nameجامبو\",\"en\":\"dfgdfg\"}\n', 'shampo20', '26', 1, 1, NULL, 150, 100, 1, '1616930199.jpg', 0, 0, 'test\ntest\ntest\ntest', 1, 1, 100, 1, 1, '2021-03-28 15:16:39', 0, 0, 0, 0, '2021-04-03 17:09:43', NULL, NULL, NULL, '12:12', 1, 1, NULL, NULL, NULL, 0, '[\"100\",null,null,null]'),
(3, '11546', '{\"ar\":\"asdasda\",\"en\":\"dfgdfg\"}', 'sdfsd', '25', 0, 0, NULL, 0, 0, 1, NULL, 0, 0, NULL, 0, 1, 0, 1, 0, '2021-07-12 12:30:28', 0, 0, 0, 0, '2021-07-12 12:30:28', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, NULL),
(4, '15455', '{\"ar\":\"بصل\",\"en\":\"dfgdfg\"}', 'بصل', '25', 0, 0, NULL, 0, 0, 1, NULL, 0, 0, NULL, 0, 1, 55, 1, 0, '2021-07-12 12:32:49', 0, 0, 0, 0, '2021-07-12 12:32:49', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, NULL),
(5, '5554', '{\"ar\":\"خيار\",\"en\":\"dfgdfg\"}', 'خيار', '25', 0, 0, NULL, 0, 0, 1, 'files/products_images/606436_1626100920.jpg', 0, 0, NULL, 0, 1, 55, 1, 0, '2021-07-12 12:42:00', 0, 0, 0, 0, '2021-07-12 12:42:00', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, NULL),
(6, '54112', '{\"ar\":\"خيار اورجنك\",\"en\":\"dfgdfg\"}', 'خيار_اورجنك', '25', 0, 0, NULL, 33, 100, 1, 'files/products_images/317442_1626125887.jpg', 0, 0, NULL, 0, 1, 33, 1, 0, '2021-07-12 19:38:07', 0, 0, 0, 0, '2021-07-12 19:38:07', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, NULL),
(7, '54512', '{\"ar\":\"خيار اوجكنك اوي\",\"en\":\"dfgdfg\"}', 'خيار_اورجنك_اوي', '26', 0, 0, NULL, 66, 200, 1, 'files/products_images/907260_1626129377.jpg', 0, 0, NULL, 0, 1, 22, 1, 0, '2021-07-12 20:27:46', 0, 0, 0, 0, '2021-07-12 20:37:06', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, NULL),
(11, '13654', '{\"ar\":\"\\u062e\\u064a\\u0627\\u0631 \\u0627\\u0648\\u062c\\u0643\\u0646\\u0643\",\"en\":\"dfgdfg\"}', 'test22', '25', 0, 0, NULL, 0, 0, 1, 'files/products_images/847842_1626563998.jpg', 0, 0, NULL, 0, 1, 5, 1, 0, '2021-07-17 21:19:58', 0, 0, 0, 0, '2021-07-18 00:23:59', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, NULL),
(12, '32132456', '{\"ar\":\"\\u062a\\u0627\\u0633\\u064a\\u062a\\u0646\\u0628\\u0627\\u0633\",\"en\":\"klsdjflks\"}', 'asdasd', '51', 0, 0, NULL, 0, 0, 1, NULL, 0, 0, NULL, 0, 1, 5, 1, 0, '2021-07-18 00:35:54', 0, 0, 0, 0, '2021-07-18 00:35:54', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, NULL),
(13, '2311', '{\"ar\":\"\\u0646\\u062a\\u0646\\u064a\\u0628\\u062a\\u0645\",\"en\":\"skdfjksdf\"}', 'ksdjflk', '55', 0, 0, NULL, 0, 0, 1, NULL, 0, 0, NULL, 0, 1, 5, 0, 0, '2021-07-18 00:39:21', 0, 0, 0, 0, '2021-07-18 00:39:21', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products_orders`
--

CREATE TABLE `products_orders` (
  `id` int(20) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(10) NOT NULL,
  `product_size` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_orders`
--

INSERT INTO `products_orders` (`id`, `order_id`, `product_id`, `quantity`, `product_size`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 1, '2021-04-13 18:38:03', '2021-04-13 18:38:03'),
(2, 50, 1, 5, 1, '2021-04-14 18:03:16', '2021-04-14 18:03:16'),
(3, 50, 1, 5, 1, '2021-04-14 18:03:17', '2021-04-14 18:03:17'),
(4, 50, 1, 5, 1, '2021-04-14 18:03:17', '2021-04-14 18:03:17'),
(5, 51, 1, 5, 1, '2021-04-14 18:05:04', '2021-04-14 18:05:04'),
(6, 51, 1, 5, 1, '2021-04-14 18:05:05', '2021-04-14 18:05:05'),
(7, 51, 1, 5, 1, '2021-04-14 18:05:05', '2021-04-14 18:05:05'),
(8, 52, 1, 5, 1, '2021-04-14 18:07:51', '2021-04-14 18:07:51'),
(9, 52, 1, 5, 1, '2021-04-14 18:07:51', '2021-04-14 18:07:51'),
(10, 52, 1, 5, 1, '2021-04-14 18:07:51', '2021-04-14 18:07:51'),
(11, 53, 1, 2, 1, '2021-04-15 17:52:05', '2021-04-15 17:52:05'),
(12, 55, 1, 2, 1, '2021-04-15 18:01:26', '2021-04-15 18:01:26'),
(13, 56, 1, 2, 1, '2021-04-15 18:06:55', '2021-04-15 18:06:55'),
(15, 69, 1, 5, 5, '2021-07-12 05:03:54', '2021-07-12 05:03:54'),
(16, 70, 1, 5, 5, '2021-07-12 05:04:24', '2021-07-12 05:04:24'),
(19, 81, 1, 3, 1, '2021-07-15 09:44:45', '2021-07-15 09:44:45'),
(20, 82, 1, 50, 2, '2021-07-15 09:45:41', '2021-07-15 09:45:41'),
(21, 89, 1, 2313, 1, '2021-07-15 09:52:36', '2021-07-15 09:52:36'),
(22, 90, 1, 100, 1, '2021-07-15 09:53:11', '2021-07-15 09:53:11'),
(23, 91, 1, 100, 1, '2021-07-15 09:54:10', '2021-07-15 09:54:10'),
(24, 95, 1, 100, 1, '2021-07-15 09:55:26', '2021-07-15 09:55:26'),
(25, 96, 1, 100, 1, '2021-07-15 09:57:07', '2021-07-15 09:57:07'),
(26, 97, 1, 55, 1, '2021-07-15 09:59:58', '2021-07-15 09:59:58'),
(27, 99, 1, 1000, 1, '2021-07-15 10:02:53', '2021-07-15 10:02:53'),
(28, 99, 1, 500, 2, '2021-07-15 10:02:53', '2021-07-15 10:02:53'),
(29, 99, 1, 522, 1, '2021-07-15 10:02:53', '2021-07-15 10:02:53'),
(30, 100, 1, 1000, 1, '2021-07-15 10:28:10', '2021-07-15 10:28:10'),
(31, 100, 1, 500, 2, '2021-07-15 10:28:10', '2021-07-15 10:28:10'),
(32, 100, 1, 100, 1, '2021-07-15 10:28:10', '2021-07-15 10:28:10'),
(33, 101, 1, 1000, 1, '2021-07-15 10:28:46', '2021-07-15 10:28:46'),
(34, 101, 1, 500, 2, '2021-07-15 10:28:46', '2021-07-15 10:28:46'),
(35, 101, 1, 100, 1, '2021-07-15 10:28:46', '2021-07-15 10:28:46');

-- --------------------------------------------------------

--
-- Table structure for table `products_size`
--

CREATE TABLE `products_size` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` text NOT NULL,
  `price` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_size`
--

INSERT INTO `products_size` (`id`, `product_id`, `size`, `price`) VALUES
(5, 12, '{\"ar\":\"\\u062a\\u064a\\u0633\\u062a1\",\"en\":\"111test1\"}', 5),
(6, 12, '{\"ar\":\"\\u062a\\u064a\\u0633\\u062a2\",\"en\":\"test222222\"}', 6),
(7, 13, '{\"ar\":\"\\u0646\\u064a\\u062a\\u0628\\u0644\\u0646\",\"en\":\"test\"}', 20),
(8, 13, '{\"ar\":\"\\u064a\\u0628\\u0644\\u064a\",\"en\":\"sdfs\"}', 3);

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `rate` int(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`id`, `user_id`, `product_id`, `rate`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, '2021-04-14 16:35:15', '2021-04-14 16:35:15'),
(2, 2, 1, 5, '2021-04-14 16:37:04', '2021-04-14 16:37:04'),
(3, 9, 1, 1, '2021-07-11 16:33:18', '2021-07-11 16:33:18');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nameAr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nameEn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ArDescription` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `EnDescription` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ArMetaDescription` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `EnMetaDescription` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ArMetaKeywords` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `EnMetaKeywords` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favIcon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `nameAr`, `nameEn`, `email`, `phone`, `phone2`, `ArDescription`, `EnDescription`, `ArMetaDescription`, `EnMetaDescription`, `ArMetaKeywords`, `EnMetaKeywords`, `logo`, `favIcon`, `banner`, `slider`, `status`, `created_at`, `updated_at`) VALUES
(1, '123321', 'fastfood123321', 'mail@mail.com123', '+201111111111123321', '+2012222222222123321', 'وصف الموقع 123312', 'Simple site description123321', 'وصف ال metadescription123321', 'Description for meta123321', 'ar meta keywords123321', 'En Meta Keywords123321', 'files/site_images/754518_1625664542.jpg', 'files/site_images/180538_1625998206.png', 'files/site_images/774457_1625998206.jpg', '[\"files\\/site_images\\/223661_1625999242.32364-hot-pepper-icon.png\",\"files\\/site_images\\/127651_1625999242.69886.png\"]', 1, '2021-07-15 08:37:57', '2021-07-11 08:27:22');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `name`, `link`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(2, 'twitter1', 'Twitter.com1', 'files/site_images/58709_1625907571.png', 1, '2021-07-10 08:59:31', '2021-07-10'),
(3, 'Facebook', 'facebook.com', 'files/site_images/71657_1625907026.png', 1, '2021-07-10 06:50:27', '2021-07-10'),
(4, 'asdf', 'adsf', 'files/site_images/97766_1625907662.jpg', 1, '2021-07-10 07:01:02', '2021-07-10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_id` int(3) DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` float DEFAULT NULL,
  `long` float DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'en',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `phone`, `email`, `email_verified_at`, `password`, `area_id`, `image`, `lat`, `long`, `group_id`, `remember_token`, `lang`, `created_at`, `updated_at`) VALUES
(2, 'عمر طارق', 'مصر القديمة القاهرة مصر', '78797978', 'logapps2021@gmail.com', NULL, '123456', 1, '64966_1625487823.jpg', 30, 30, 1, 'P9WwnEDFBfDNabu', NULL, '2021-04-11 18:59:09', '2021-07-05 10:25:19'),
(9, 'OmarTarek', 'Cairo Egypt', '5646456', 'omartarek@gmail.com', NULL, '$2y$10$jhK54MYXaVujpEcB0TFmC.A5NrnI9CCGCTZZtHUppvyj3N1W8l4ze', 1, NULL, NULL, NULL, 1, NULL, NULL, '2021-07-07 12:01:21', '2021-07-07 12:01:21');

-- --------------------------------------------------------

--
-- Table structure for table `userscoupons`
--

CREATE TABLE `userscoupons` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `coupon_id` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userscoupons`
--

INSERT INTO `userscoupons` (`id`, `user_id`, `coupon_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, '2021-04-15 10:59:29', '2021-04-15 10:59:29'),
(2, 1, 1, 1, '2021-04-15 10:59:58', '2021-04-15 10:59:58'),
(3, 2, 1, 1, '2021-04-15 15:59:29', '2021-04-15 15:59:29'),
(4, 1, 1, 1, '2021-04-15 16:01:50', '2021-04-15 16:01:50'),
(5, 2, 1, 1, '2021-04-15 16:37:44', '2021-04-15 16:37:44'),
(6, 9, 1, 1, '2021-07-11 17:24:33', '2021-07-11 17:24:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addones`
--
ALTER TABLE `addones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addones_order`
--
ALTER TABLE `addones_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission__groups`
--
ALTER TABLE `permission__groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission__groups_group_id_foreign` (`group_id`),
  ADD KEY `permission__groups_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `products_orders`
--
ALTER TABLE `products_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_size`
--
ALTER TABLE `products_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `userscoupons`
--
ALTER TABLE `userscoupons`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addones`
--
ALTER TABLE `addones`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `addones_order`
--
ALTER TABLE `addones_order`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `permission__groups`
--
ALTER TABLE `permission__groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products_orders`
--
ALTER TABLE `products_orders`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `products_size`
--
ALTER TABLE `products_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `userscoupons`
--
ALTER TABLE `userscoupons`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
