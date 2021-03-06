-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2021 at 09:12 AM
-- Server version: 5.7.35-cll-lve
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thumamahvillage`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `members_reference` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trip_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `coupon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total_paid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `notes` text COLLATE utf8mb4_unicode_ci,
  `period` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `period_from` date DEFAULT NULL,
  `period_to` date DEFAULT NULL,
  `entry_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_id` text COLLATE utf8mb4_unicode_ci,
  `added_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_extras`
--

CREATE TABLE `booking_extras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `extra_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `camp_extras`
--

CREATE TABLE `camp_extras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `camp_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, '????????', '1', '2021-10-25 14:25:03', '2021-10-25 14:25:03'),
(2, '????????', '1', '2021-10-25 14:25:03', '2021-10-25 14:25:03'),
(3, '????????', '2', '2021-10-25 14:25:04', '2021-10-25 14:25:04'),
(4, '???????? ??????????', '2', '2021-10-25 14:25:04', '2021-10-25 14:25:04'),
(5, '????????', '2', '2021-10-25 14:25:04', '2021-10-25 14:25:04'),
(6, '???????? ??????????', '2', '2021-10-25 14:25:04', '2021-10-25 14:25:04'),
(7, '??????????', '3', '2021-11-04 10:13:45', '2021-11-04 10:13:45'),
(8, '??????????', '3', '2021-11-04 10:14:08', '2021-11-04 10:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `company_roles`
--

CREATE TABLE `company_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '%',
  `expire_date` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `trip_type` tinyint(1) NOT NULL,
  `added_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_15_000002_create_roles_table', 1),
(6, '2021_10_15_000003_create_company_roles_table', 1),
(7, '2021_10_15_000004_create_categories_table', 1),
(8, '2021_10_15_000005_create_trips_table', 1),
(9, '2021_10_15_000006_create_coupons_table', 1),
(10, '2021_10_15_000007_create_bookings_table', 1),
(11, '2021_10_15_000009_create_settings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('abualwleed02@gmail.com', '$2y$10$c4cYobfWynw8qD8yf68SX.EOFnzK/dOKfz1S5uReA4d1CvVfOJbMi', '2021-11-11 22:47:28');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `order`, `created_at`, `updated_at`) VALUES
(1, '?????????? ??????????', 1, '2021-10-25 14:25:02', '2021-10-25 14:25:02'),
(2, '?????????? ?????? ????????', 3, '2021-10-25 14:25:02', '2021-10-25 14:25:02'),
(3, '?????????? ????????', 4, '2021-10-25 14:25:02', '2021-10-25 14:25:02'),
(4, '?????????? ?????????? ????????', 5, '2021-10-25 14:25:02', '2021-10-25 14:25:02'),
(5, '?????????? ?????????? ??????', 6, '2021-10-25 14:25:02', '2021-10-25 14:25:02'),
(6, '?????????? ????????????', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `members_reference` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trip_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trip_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trip_category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trip_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trip_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `booking_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_discount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_paid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `notes` text COLLATE utf8mb4_unicode_ci,
  `period` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `period_from` date DEFAULT NULL,
  `period_to` date DEFAULT NULL,
  `entry` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_id` text COLLATE utf8mb4_unicode_ci,
  `added_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `terms` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `king_reserve` text COLLATE utf8mb4_unicode_ci,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `snapchat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `about`, `terms`, `king_reserve`, `facebook`, `twitter`, `instagram`, `snapchat`, `support_email`, `created_at`, `updated_at`) VALUES
(1, '<p>???????? ?????????? ????????<br />\r\n???????? ??????????</p>\r\n\r\n<p>?????? ???????? ???? ???????? ?????? ???????? ???? ???????????? ???? ?????? ???????????????? ?????? ???? ??????????</p>', '<h3 style=\"margin-bottom: 1rem\"><strong>??????????????</strong></h3>\r\n\r\n<p>- ???????????????????? ???????? ???????????? ???? ??????????:&rlm;</p>\r\n\r\n<p>- ???????????? ?????? ?????????? ???????? .</p>\r\n\r\n<p>- ?????????? ???????????? ???????????? ????????????.</p>\r\n\r\n<p>- ?????????? ?????????? .</p>\r\n\r\n<p>- ???????? ?????????? ?????????????? ???? ??????????.</p>\r\n\r\n<p>- ?????????? ?????? ?????????? ???????? ?????????????? ?????????????? ????????????.</p>\r\n\r\n<p>- ?????????? ?????????? ?????????? .</p>\r\n\r\n<p>- ???????? ?????????????? ???? ?????????? ??????????????.</p>\r\n\r\n<p>- ?????????? ???????? ?????????? ???????????? ???????????? ??????????????.</p>\r\n\r\n<p>- ?????????? ?????????? ??????????. ?????????????? ????????????:</p>\r\n\r\n<p>- ?????? ???????????? ???????????? ?????????? ?????????????? ???? ???????????? ?????????? ???????????? ?????????? ?????????????????? ?????? ???????????? ???????? ???????? ?????????? ?????????? ?????? ?????????? ?????????? ???? ??????????.</p>\r\n\r\n<p>- ???????? ?????????????? ???????????????? ???????????? ???? ?????????????? ?????????? ???????? ???????????? ????????????.</p>\r\n\r\n<p>- ?????????????????? ???????????? ???????????? ????????????. &rlm;</p>\r\n\r\n<p>&rlm;- ?????????? ?????? ???????????????? ???????? ???????? ???????????? ???? ???????????? ???? ?????????? ?????????? ???????????? ???? ???????????? (?????????? ???????????? ?????????????? ?????? ???????? ?????????? ?????????? ?????????? ??????????).<br />\r\n- ???????????????? ???????????????? ???????? ????????????.</p>\r\n\r\n<p>- ???? ???????? ?????? ?????????? ?????????????? ?????? ???????? ????????????.</p>\r\n\r\n<p>- ???????????? ???????????? ?????????? ?????????????? ???????? ???????? ?????????? ???????????? ?????????????? ?????? ???????????? (???? ?????? ???????????? ???????? ???? ?????? ??????????)<br />\r\n- ?????????? ?????????? ?????????????? (?????????? ???????????? ????????).</p>\r\n\r\n<p>- ???????? ???????? ?????????? ?????? ???????????????? ???????????? ?????? ????????????.</p>\r\n\r\n<p>- ???????? ?????????????? ????????????.</p>\r\n\r\n<p>- ?????? ?????????????? ?????????? ?????????? ???? ???????????? ?????????????? ??????????????????. ???????? ???? ???????? ???????? ?????????? ?????????????? ?????????? ???? ??????????????.<br />\r\n-?????????????? ?????????????? ???????????? ?????????????????????? ?????????? ------------???? .</p>\r\n\r\n<p>-&nbsp;???????????????? ?? ???????????? ?????????? ?????????????? ?? ?????????????? ?? ???????????????? ?????????????? ?? ???????????? ???????? ??????????????</p>\r\n\r\n<p>- ???????? ?????????? ?????????????????? ??????????????</p>\r\n\r\n<p>- ???????????????? ???????? ?????????? ?????????????? ???? ???????????? ?????????? ?????? ??????????</p>\r\n\r\n<p>-&nbsp;???????????????? ?????? ?????????????? ?? ?????????????? ???????? ???????? ??????????</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3 style=\"margin-bottom: 1rem\"><strong>????????????????</strong></h3>\r\n\r\n<p>1- ???????????????? ?????????????? ( ???????? ??? / ?????????? ??? ).</p>\r\n\r\n<p>2- ?????????? ?????????? ???????????? ?????????????? ???????????????? ???????????? ???????????? ???????????? ?????????????? ?????????????? ??????????????.</p>\r\n\r\n<p>3- ?????????? ???? ???????? ???????????? ???????????? ???? ?????????? ???????????? ???????? ?????????????? ?????????? ????????????.</p>\r\n\r\n<p>4- ?????? ???????? ???????? ???????????????? ???? ???????? ?????????? ?????? ?????? ?????????? ???????????? ???????? ???????? ??????????????.</p>\r\n\r\n<p>5- ???????? ?????????????? ???????? ???????????? ?????? ???????? ?????????? ?????????? ?????????? ?????????? ???????????? ???? ?????? ?????? ???????????? ?????? ?????????? ???????????? ?????????? ???????? ?????? ??????????.</p>\r\n\r\n<p>6- ?????????? ?????????? ?????????? ?????? ???????????? ???????????? ???????? ???????????????? ?????? ???? ???????? ???????? ???? ?????? ????????.</p>\r\n\r\n<p>7- ?????????? ?????????? ???????????? ?????????????????? ?????? ?????????? ?????????????? ???????????????? ?????????? ???????????????? ???? ?????????????? ?????????????? ?????? ?????????????????? ???????????? ?????? ???? ???????????? ?????????? ???? ???????????? ?????????? ???????? ???? ???????? ??????.</p>\r\n\r\n<p>8- ?????????? ?????????? ???????????? ???????????????? ?????????????? ?????????? ?????????????? ???????????????? ?????????????????? ???? ???????????? ?????????????? ???????? ??????????????, ?????????? ?????????? ???????????? ?????????? ???? ???????????? ??????????????.</p>\r\n\r\n<p>9- ?????????? ?????????? ???????????? ?????????????? ?????????? ???????????? ???????????? ???????? ?????????????? 40????/???????? ???? ?????? ?????????? ????????????.</p>\r\n\r\n<p>10- ???? ?????? ???????? ?????????? ???????????? ???????????? ?????????????? ???? ?????????? ???????? ???? ???????????? ???????????? ?????????? ???????????? ?????? ???????????? ???????? ???? ?????? ?????????? ?????????? ?????? ?????? ???????????? ?????? ?????? ?????????? ???????????????? ???????????? ?????????? ?????? ???? ?????????????? ???????? ?????????????? ?????????????? .</p>\r\n\r\n<p>11- ???????? ?????????? ?????????? ???????? ?????????????? ?????????????? ?????????? ?????? ?????????? ?????? ???????? ???????????? ???? ?????? ???????? ?????????????? ?????????? ?????????????? ?????????????? ?????????????????? ?????????????? ???? ???????????? ??????????.</p>\r\n\r\n<p>12- ???????????????? ?????? ?????????????? ???????? ?????????????? ???????? ???????? ??????????.</p>\r\n\r\n<p>13- ?????????? ???????????????? ???? ?????????????? ?????????????? ?????? ?????? ???????????? ???????? ???????????? ?????? ?????????????? ???????? ???????? ???????????? .</p>\r\n\r\n<p>14- ?????????? ?????????? ?????????? ???????????? ?????????? ?????? ???? ?????????? ???????????? ???????????????? ?????????????? ???? ?????? ???????? ?????????? ???? ?????????? ???? ?????????? ???????????? ?????? ???????????? ??????, ?????????????? ???? ?????????? ???????????? ???????????? ?????? ??????????????????.</p>\r\n\r\n<p>15- ?????? ???????????? ?????????????? ?????? ???????? ?????????? ?? 48 ???????? ???? ?????????? ?????????? ?????????? ???????????? ?????????? ???????????? ?????? ???? ?????????? ?????????? ???????????? ???? ?????????? ?????????? ???????????????? ???????????? ??????????????.</p>\r\n\r\n<p>16- ???????????????? ?????????????? ?????????????? ???? ???????????? 1 ???????? ???????? ???????????? 9 ?????????? ???? ???????????????? ???????????????? ???????????? ?????????? ?????????????? ???? ?????? ?????????????? .</p>\r\n\r\n<p>17- ?????? ?????????????? ?????????? ?????????????? ?????? ?????? ???? ?????????? ???????????? ???? ???? ???? ?????????????? ???? ???????????? ?????????? ?????????? ?????????????? ?????? ???? ???????????????????? ?????????????? , ?????? ?????? ?????????? ???????????? ???? ?????? ???????????? ?????????????? ???? ?????? ???? ?????????? ???????? ???????????????? ???????????? ?????????????? ???? ?????? ??????????.</p>\r\n\r\n<p>18- ???????? ?????? ?????????? ?????????? ???????????? ???????????? ?????????????? ?????????????? ????????????????.</p>\r\n\r\n<p>19- ?????? ?????? ?????????? ???? ?????? ??????????????.</p>', '<p>?????????? ?????????? ???????? ?????????????? ?????????? ???????????? ?????? ???? ?????? ?????????????? ?????????????? ???????????????? ???????????? ?????????????? ???????????? ???????? ?????????? ???????????? ???????????? ???????? ???? ???????? ???? ?????? ???? ?????????????????? ???? ?????????? ?????????? ?????????????? ???? ???????????? ???????? ????????&rdquo;?????????? ??????????????&rdquo;?? ???? ?????????? ???????? ?????????? ?????? ?????????? ?????????? ???? ???????????? 2019.</p>', 'https://facebook.com/', 'https://twitter.com/thumamahcamps1', 'https://instagram.com/thumamahcamps', 'https://snapcha2t.com/', 'info@thumamahvillage.com', '2021-10-25 14:25:04', '2021-11-15 03:06:02');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int(11) DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from` int(11) DEFAULT NULL,
  `to` int(11) DEFAULT NULL,
  `camps_num` int(11) DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trip_date` date DEFAULT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `operator_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `added_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `added_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `email_verified_at`, `password`, `remember_token`, `role`, `image`, `details`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@camping.com', '1236789', NULL, '$2y$10$XqlsCYqNPWzy2TeFJ/2nWeCq1OKp3it5mqcG2dyYjkcNJfj2Z089m', 'sqQWK3c4JBeQyd7uSlA6sAIz8tvgbyiJMcu3s72O9tStRuhFCKS9dn8KWsRv', 'admin', NULL, NULL, NULL, '2021-10-25 14:25:01', '2021-11-05 23:30:06'),
(2, '?????? ????????', 'info@yallahike.com', '324324', NULL, '$2y$10$DuL8NbH1CKBsKQIl20VxCuboHMDsl3cRgRQvnqaiPhODmt3riwQua', NULL, 'operator', '1635690874.png', '???????? ?????? ???????????? ???? ?????????????? ?????????????????? ???? ???????? ?????????????? ???????????????? ?????????????? ???????????????? ???????????????? ????????????????, ?????????? ???? ?????????????? ???????????????? ???????????????????? ???????????? ?????????????? ?????????????????? ???????????????? ???????????? ???????????????? ?????????? ???????????? ?????? ?????????? ?????????????? ?????????????? ?????????????? ???????????????? ???????????????? ???? ?????????????? ?????????????? ????????????????.', 1, '2021-10-31 21:34:34', '2021-11-22 22:46:27'),
(3, '???????? ??????????????', 'Omar@Navigationksa.com', '000003300001', NULL, '$2y$10$8PIhNIoKUmw6lxkAaOhbuuwbpFZRL303pz/fx5yRj.Kre5OL08hJ6', NULL, 'operator', '1635691187.png', '???? ???????? ???????? ?????????????? ???????? ???????????? ?????????????? ???????????????? ???????????? ?????????????????? ?????????????? ???????????? ???????? ?????????????? ???????????? ???? ???????? ???????? ???? ???????????????? ???????????????? ?????? ???????????? ???? ???????????? ?????????????? ?????????????????? ???? ?????? 2018??.', 1, '2021-10-31 21:39:47', '2021-11-05 23:27:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_trip_id_foreign` (`trip_id`),
  ADD KEY `bookings_category_id_foreign` (`category_id`),
  ADD KEY `bookings_coupon_id_foreign` (`coupon_id`),
  ADD KEY `bookings_entry_id_foreign` (`entry_id`),
  ADD KEY `bookings_added_by_foreign` (`added_by`);

--
-- Indexes for table `booking_extras`
--
ALTER TABLE `booking_extras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `camp_extras`
--
ALTER TABLE `camp_extras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_roles`
--
ALTER TABLE `company_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_roles_role_id_foreign` (`role_id`),
  ADD KEY `company_roles_user_id_foreign` (`user_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`),
  ADD KEY `coupons_added_by_foreign` (`added_by`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `trips_code_unique` (`code`),
  ADD KEY `trips_category_id_foreign` (`category_id`),
  ADD KEY `trips_operator_id_foreign` (`operator_id`),
  ADD KEY `trips_added_by_foreign` (`added_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`),
  ADD KEY `users_added_by_foreign` (`added_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_extras`
--
ALTER TABLE `booking_extras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `camp_extras`
--
ALTER TABLE `camp_extras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `company_roles`
--
ALTER TABLE `company_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_entry_id_foreign` FOREIGN KEY (`entry_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_trip_id_foreign` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `company_roles`
--
ALTER TABLE `company_roles`
  ADD CONSTRAINT `company_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `company_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `coupons`
--
ALTER TABLE `coupons`
  ADD CONSTRAINT `coupons_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `trips_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `trips_operator_id_foreign` FOREIGN KEY (`operator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
