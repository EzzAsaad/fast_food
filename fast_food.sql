-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2021 at 11:08 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

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
(3, 'لتر بيبسى', 9, NULL, 0, '2021-04-14 09:56:44', '0000-00-00 00:00:00'),
(4, 'بطاطس سناكس', 6, NULL, 0, '2021-04-14 09:56:44', '0000-00-00 00:00:00'),
(5, 'عصير برتقال', 6, NULL, 1, '2021-04-14 15:05:32', '2021-04-14 15:05:32'),
(6, 'عصير برتقال', 6, '/tmp/phpJytYlr', 1, '2021-04-14 15:06:48', '2021-04-14 15:06:48'),
(7, 'عصير برتقال', 6, 'ms1618398629.JPG', 1, '2021-04-14 15:10:29', '2021-04-14 15:10:29');

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
(11, 57, 3, 2, '2021-04-15 18:29:18', '2021-04-15 18:29:18'),
(12, 57, 4, 2, '2021-04-15 18:29:18', '2021-04-15 18:29:18');

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
(7, 2, 'Giza El Metro New York Is A', 2, 30.01130225869, 31.205092258751, '2021-04-17 14:34:14', '2021-04-17 10:34:14');

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
(17, 2, 1, 1, 0, 'جامبو', 2, NULL, 0, '2021-04-15 17:51:16', '2021-04-15 17:51:42'),
(18, 2, 3, 0, 9, 'لتر بيبسى', 2, NULL, 1, '2021-04-15 17:51:17', '2021-04-15 17:51:43'),
(19, 2, 4, 0, 6, 'بطاطس سناكس', 2, NULL, 1, '2021-04-15 17:51:17', '2021-04-15 17:51:44'),
(21, 2, 4, 0, 6, 'بطاطس سناكس', 1, NULL, 1, '2021-04-17 15:12:19', '2021-04-17 15:12:19'),
(22, 2, 6, 0, 6, 'عصير برتقال', 1, NULL, 1, '2021-04-17 15:12:19', '2021-04-17 15:12:19'),
(23, 2, 5, 0, 6, 'عصير برتقال', 1, NULL, 1, '2021-04-17 15:12:19', '2021-04-17 15:12:19');

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
(25, 0, '{\"en\":\"Cupping tools\",\"ar\":\"\\u0627\\u062f\\u0648\\u0627\\u062a \\u0627\\u0644\\u062d\\u062c\\u0627\\u0645\\u0629\"}', 0, 0, '1617634237.jpg', 1, 0, 1, '2021-04-05 20:50:37', '2021-04-05 20:50:37'),
(26, 0, '{\"en\":\"medical accs\",\"ar\":\"\\u0627\\u0644\\u0639\\u0646\\u0627\\u064a\\u0629 \\u0628\\u0627\\u0644\\u0628\\u0634\\u0631\\u0629\"}', 0, 25, NULL, 2, 0, 1, '2021-04-05 21:01:53', '2021-04-05 21:01:53'),
(27, 0, '{\"en\":\"Cupping tools\",\"ar\":\"\\u0634\\u0633\\u064a\\u0628\\u0644\\u0627\\u062a\\u0629\\u0646\"}', 0, 25, NULL, 10, 0, 1, '2021-04-05 21:06:41', '2021-04-05 21:06:41');

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
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `password`, `address`, `phone`, `email_verified_at`, `area_id`, `group_id`, `image`, `lat`, `long`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'omartarek', 'omartarek12@gmail.com', '$2y$10$Ppxw/X.jY1Nn/JiDTDOs4eNZr6Lw9myR3kVjOq6VdY3ucCxlkilCS', 'Gize, Cairo, Egypt', '+20116546321646', '0000-00-00', 1, 1, '64966_1625487823.jpg', 123, 12, '', '2021-07-06', '2021-07-01'),
(2, 'عمر طارق', 'admin@gmail.com', '123456', 'القاهرة مصر', '+201215421', NULL, 1, 1, NULL, NULL, NULL, NULL, '2021-07-08', '2021-07-08'),
(4, 'Omar Tarek', 'omartarek1212@gmail.com', '$2y$10$5QVi3pkKV0Jw.3WNvg.yWOGInrpchMJ3zI0Ectvo4ez.6N7VdXrP6', 'Cairo, Egypt', '+2011111111111', NULL, 1, 1, NULL, NULL, NULL, NULL, '2021-07-08', '2021-07-08'),
(5, 'M', 'm@g.com', '$2y$10$1dySERbo1qIivkhjk9YLHO44JbLGM2hgcuPPRE08x3xfRXyQHmH1i', 'القاهرة مصر', '+2054514214', NULL, 1, 2, NULL, NULL, NULL, NULL, '2021-07-08', '2021-07-08'),
(6, 'OmarTArek', 'admin@g.com', '$2y$10$cHQV.md6qiBZG/ZgyBwJe.o0Ph784dCT9hkuz7vR/92e0Q9rbZI6W', 'cairo, egypt', '+20545121545', NULL, 1, 4, NULL, NULL, NULL, NULL, '2021-07-08', '2021-07-08');

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
(4, 'المبيعات', 'جروب المبيعات', 1, '2021-07-08 11:41:07', '2021-07-08 11:41:07');

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
(58, 2, 'Shady Samir', '1207090513', 30, 5, '1', 'Cash and Deliver', 50, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-04-17 14:36:24', '2021-04-17 14:36:24'),
(57, 2, 'Shady Samir', '1207090513', 30, 4, '1', 'Cash and Deliver', 50, 0, NULL, 0, 'Add Notes To Test Add Order', NULL, NULL, NULL, '2021-04-15 18:29:18', '2021-04-15 18:29:18'),
(54, 2, 'Shady Samir', '1207090513', 0, 6, '1', '1', 50, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-04-15 17:56:35', '2021-04-15 17:56:35'),
(55, 2, 'Shady Samir', '1207090513', 30, 0, '1', '1', 50, 0, NULL, 0, NULL, NULL, NULL, NULL, '2021-04-15 18:01:26', '2021-04-15 18:01:26'),
(56, 2, 'Shady Samir', '1207090513', 30, 0, '1', '1', 50, 0, NULL, 0, 'Address', NULL, NULL, NULL, '2021-04-15 18:06:55', '2021-04-15 18:06:55');

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
(3, 'إعدادات المستخدمين', 'التحكم في المستخدمين', 'UserController', 'listUsers', 'user', 1, '2021-07-08 06:59:51', '2021-07-08 06:59:51'),
(4, 'حذف عضو', 'حذف', 'UserController', 'destroyUser', 'user', 1, '2021-07-08 10:05:49', '2021-07-08 10:05:49'),
(5, 'اضافة مستخدم', 'إضافة مستخدم', 'UserController', 'AddUser', 'user', 1, '2021-07-08 10:35:31', '2021-07-08 10:35:31'),
(6, 'عرض المستخدمين', 'عرض جميع المستخدمين', 'UserController', 'listUsers', 'user', 1, '2021-07-08 10:51:33', '2021-07-08 10:51:33'),
(7, 'السوشيال', 'التعالم مع السوشيال ميديا', 'SettingsController', 'addSocial', 'user', 1, '2021-07-08 11:01:26', '2021-07-08 11:01:26'),
(8, 'تعديل بيانات الموقع', 'تعديل بيانات الموقع', 'SettingsController', 'edit', 'user', 1, '2021-07-08 11:20:42', '2021-07-08 11:20:42'),
(9, 'عرض الأعضاء', 'عرض جميع الأعضاء', 'UserController', 'listEmployees', 'user', 1, '2021-07-08 11:28:48', '2021-07-08 11:28:48'),
(10, 'حذف عضو', 'حذف عضو', 'UserController', 'destroyEmployee', 'user', 1, '2021-07-08 11:31:03', '2021-07-08 11:31:03'),
(11, 'تعديل بيانات المستخدمين', 'تعديل بيانات المستخدمين', 'UserController', 'ViewEditForm', 'user', 1, '2021-07-08 12:00:21', '2021-07-08 12:00:21');

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
(1, 1, 3, NULL, NULL),
(2, 1, 4, '2021-07-30 12:06:09', '2021-07-09 12:06:09'),
(3, 2, 3, '2021-07-08 10:34:47', '2021-07-08 10:34:47'),
(4, 1, 5, '2021-07-08 10:35:46', '2021-07-08 10:35:46'),
(5, 2, 5, '2021-07-08 10:46:45', '2021-07-08 10:46:45'),
(6, 1, 6, '2021-07-08 10:51:55', '2021-07-08 10:51:55'),
(7, 1, 5, '2021-07-08 10:52:40', '2021-07-08 10:52:40'),
(9, 1, 7, '2021-07-08 11:01:57', '2021-07-08 11:01:57'),
(10, 1, 3, '2021-07-08 11:16:15', '2021-07-08 11:16:15'),
(11, 1, 7, '2021-07-08 11:19:38', '2021-07-08 11:19:38'),
(12, 1, 8, '2021-07-08 11:21:02', '2021-07-08 11:21:02'),
(13, 1, 9, '2021-07-08 11:29:04', '2021-07-08 11:29:04'),
(14, 1, 4, '2021-07-08 11:31:24', '2021-07-08 11:31:24'),
(15, 1, 10, '2021-07-08 11:31:37', '2021-07-08 11:31:37'),
(16, 4, 9, '2021-07-08 11:43:15', '2021-07-08 11:43:15'),
(17, 4, 10, '2021-07-08 11:44:09', '2021-07-08 11:44:09'),
(18, 4, 11, '2021-07-08 12:00:37', '2021-07-08 12:00:37');

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
(1, '1356', 'جامبو', 'كريم-ترطيب-الوجة', '1', 1, 0, NULL, 399, 230, 1, '1616420999.png', 0, 0, '<p><span style=\"font-family: \"Open Sans\", Arial, sans-serif; text-align: justify;\">لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</span><br></p>', 1, 1, 10, 1, 1, '2021-03-22 14:45:06', 0, 0, 0, 0, '2021-04-05 15:28:12', NULL, NULL, NULL, '00:00', 1, 1, NULL, NULL, NULL, 0, '[\"25\",\"30\",\".25\",\"red,green,\"]'),
(2, '1213', 'name', 'shampo20', '2', 1, 1, NULL, 150, 100, 1, '1616930199.jpg', 0, 0, 'test\ntest\ntest\ntest', 1, 1, 100, 1, 1, '2021-03-28 15:16:39', 0, 0, 0, 0, '2021-04-03 17:09:43', NULL, NULL, NULL, '12:12', 1, 1, NULL, NULL, NULL, 0, '[\"100\",null,null,null]');

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
(14, 57, 1, 2, 1, '2021-04-15 18:29:18', '2021-04-15 18:29:18');

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
(1, 1, 'صغير', 0),
(2, 1, 'متوسط', 0);

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
(2, 2, 1, 5, '2021-04-14 16:37:04', '2021-04-14 16:37:04');

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
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `nameAr`, `nameEn`, `email`, `phone`, `phone2`, `ArDescription`, `EnDescription`, `ArMetaDescription`, `EnMetaDescription`, `ArMetaKeywords`, `EnMetaKeywords`, `logo`, `status`, `created_at`, `updated_at`) VALUES
(1, '123321', 'fastfood123321', 'mail@mail.com123', '+201111111111123321', '+2012222222222123321', 'وصف الموقع 123312', 'Simple site description123321', 'وصف ال metadescription123321', 'Description for meta123321', 'ar meta keywords123321', 'En Meta Keywords123321', 'files/site_images/754518_1625664542.jpg', 1, '2021-07-15 08:37:57', '2021-07-07 11:31:37');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `phone`, `email`, `email_verified_at`, `password`, `area_id`, `image`, `lat`, `long`, `group_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'عمر طارق', 'مصر القديمة القاهرة مصر', '78797978', 'logapps2021@gmail.com', NULL, '123456', 1, '64966_1625487823.jpg', 30, 30, 1, 'P9WwnEDFBfDNabu', '2021-04-11 18:59:09', '2021-07-05 10:25:19'),
(5, 'OmarTarek', NULL, NULL, 'omartarek@gmail.com', NULL, '$2y$10$jhK54MYXaVujpEcB0TFmC.A5NrnI9CCGCTZZtHUppvyj3N1W8l4ze', 1, NULL, NULL, NULL, 1, NULL, '2021-07-07 12:01:21', '2021-07-07 12:01:21');

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
(5, 2, 1, 1, '2021-04-15 16:37:44', '2021-04-15 16:37:44');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `addones_order`
--
ALTER TABLE `addones_order`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `permission__groups`
--
ALTER TABLE `permission__groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products_orders`
--
ALTER TABLE `products_orders`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products_size`
--
ALTER TABLE `products_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `userscoupons`
--
ALTER TABLE `userscoupons`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
