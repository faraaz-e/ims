-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2021 at 08:19 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `my_firstname` varchar(255) DEFAULT NULL,
  `my_lastname` varchar(255) DEFAULT NULL,
  `my_shop_street` varchar(255) DEFAULT NULL,
  `my_town_city` varchar(255) DEFAULT NULL,
  `my_pincode` varchar(255) DEFAULT NULL,
  `my_contact1` varchar(255) DEFAULT NULL,
  `my_contact2` varchar(255) DEFAULT NULL,
  `my_email` varchar(255) DEFAULT NULL,
  `my_gst` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `created_by` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`my_firstname`, `my_lastname`, `my_shop_street`, `my_town_city`, `my_pincode`, `my_contact1`, `my_contact2`, `my_email`, `my_gst`, `id`, `created_by`) VALUES
('Tom', 'profile', 'TRADE STREET, Royal Market', 'california', '123456', '1234567890', '1234567', 'admin@gmail.com', '123456789012300', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_shop_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_city_town` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_pincode` int(11) DEFAULT NULL,
  `client_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_contact1` int(11) DEFAULT NULL,
  `client_contact2` int(11) DEFAULT NULL,
  `client_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_total_amt` double(8,2) DEFAULT NULL,
  `client_paid_amt` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `client_name`, `client_shop_street`, `client_city_town`, `client_pincode`, `client_desc`, `client_contact1`, `client_contact2`, `client_email`, `client_total_amt`, `client_paid_amt`, `created_at`, `updated_at`, `created_by`) VALUES
(1, 'Jethalal Gada', 'D/420, Powder Gali', 'Goregaon', NULL, 'hello1', 1234567890, 1111111111, NULL, 45000.00, 37000.00, NULL, '2021-06-21 13:09:54', 1),
(2, 'Bhide', 'Gokuldham Society', 'Mumbai', NULL, NULL, NULL, NULL, NULL, 5000.00, 0.00, '2020-12-19 13:24:51', '2021-01-14 09:34:52', 1),
(4, 'Champaklal', 'Gada Electronics', 'Andheri', 400002, NULL, 1234567890, NULL, 'example@domain.com', 212000.00, 50000.00, '2020-12-19 13:33:05', '2021-01-30 17:06:27', 1),
(9, 'Demo name abcd', '123, Sample street', 'Sample name', 123560, NULL, 1234567890, NULL, 'client@domain.com', 20000.00, 0.00, '2021-01-14 10:24:07', '2021-01-14 10:24:07', 3),
(10, 'Client name 2', 'demo data demo data demo data', 'demo city name', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-14 10:26:03', '2021-01-14 10:26:03', 3),
(11, 'Demo name 2', 'demo', 'sample name', 4000031, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-14 10:26:53', '2021-01-14 10:26:53', 3),
(12, 'demo data 3', 'demo address', 'city name', 12345678, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-14 10:28:47', '2021-01-14 10:28:47', 3),
(13, 'sample name 4', NULL, NULL, NULL, NULL, 123, NULL, NULL, NULL, NULL, '2021-01-14 10:30:28', '2021-01-14 10:30:28', 3),
(21, 'client1', 'washington', 'california', 3333333, NULL, 1234567890, 1234567890, NULL, 23000.00, 22000.00, '2021-02-14 15:00:56', '2021-02-14 15:01:35', 2),
(22, 'new client', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-14 15:01:57', '2021-02-14 15:01:57', 2),
(23, 'abc', 'abc street', 'delhi', 111111, 'demo demo', NULL, NULL, NULL, NULL, NULL, '2021-06-21 13:10:57', '2021-06-21 13:10:57', 1),
(24, 'defg', 'def street', NULL, NULL, 'hello 2 test', NULL, NULL, NULL, NULL, NULL, '2021-06-21 13:11:45', '2021-06-21 13:11:45', 1);

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
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `invoice_date` varchar(100) DEFAULT NULL,
  `my_address` varchar(1000) DEFAULT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `client_address` varchar(1000) DEFAULT NULL,
  `shipping_address` varchar(1000) DEFAULT NULL,
  `subtotal` double(20,2) DEFAULT NULL,
  `shipping_cost` int(11) DEFAULT NULL,
  `grand_total` double(20,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `invoice_number`, `invoice_date`, `my_address`, `client_name`, `client_address`, `shipping_address`, `subtotal`, `shipping_cost`, `grand_total`, `created_at`, `created_by`) VALUES
(7, 'INV_230621203623', '23 Jun, 2021', NULL, NULL, '', NULL, NULL, 0, 970700.00, '2021-06-23 15:07:28', 2),
(174, 'INV_270621233453', '27 Jun, 2021', 'TRADE STREET, Royal Market \n california - 123456 \n 1234567890 / 1234567 \n GST : 123456789012300', 'Jethalal', 'Gokuldham society, B/420, powder gali, goregaon(e)', 'Gada electronics, andheri west', 211623.00, 30, 211653.00, '2021-06-27 18:06:32', 1),
(175, 'INV_270621234253', '27 Jun, 2021', 'TRADE STREET, Royal Market \n california - 123456 \n 1234567890 / 1234567 \n GST : 123456789012300', 'abc', 'demo demo', 'demo demo', 70000.78, NULL, 70000.78, '2021-06-27 18:13:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoiceproducts`
--

CREATE TABLE `invoiceproducts` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `invoice_number` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_sku` varchar(255) DEFAULT NULL,
  `product_name` varchar(500) DEFAULT NULL,
  `product_qnty` int(11) DEFAULT NULL,
  `product_sp` double(20,2) DEFAULT NULL,
  `gst_perc` double(10,2) DEFAULT NULL,
  `tax_perc` double(10,2) DEFAULT NULL,
  `disc_perc` double(10,2) DEFAULT NULL,
  `final_price` double(20,2) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoiceproducts`
--

INSERT INTO `invoiceproducts` (`id`, `invoice_id`, `invoice_number`, `product_id`, `product_sku`, `product_name`, `product_qnty`, `product_sp`, `gst_perc`, `tax_perc`, `disc_perc`, `final_price`, `created_at`, `created_by`) VALUES
(24, NULL, 'INV_270621182621', 36, 'ABC3444', 'Gucci sport Bag pro plus new demo - Grey', 2, NULL, 10.00, 20.00, 30.00, 32760.80, '2021-06-27 18:27:09', 1),
(25, NULL, 'INV_270621182621', 4, 'IPH-245', 'Iphone 12 Mini - Blue', 1, NULL, 20.00, 10.00, 50.00, 33800.00, '2021-06-27 18:27:09', 1),
(26, NULL, 'INV_270621182621', 8, 'IPD243', 'iPad 5 - White', 3, NULL, 10.00, 15.00, 30.00, 141750.00, '2021-06-27 18:27:09', 1),
(27, NULL, 'INV_270621183254', 36, 'ABC3444', 'Gucci sport Bag pro plus new demo - Grey', 2, NULL, 10.00, 12.00, 30.00, 30744.75, '2021-06-27 18:33:26', 1),
(28, NULL, 'INV_270621183254', 22, 'AIRP129', 'Color check - Blue', 1, NULL, 12.00, 15.00, 30.00, 444.50, '2021-06-27 18:33:26', 1),
(29, NULL, 'INV_270621183426', 8, 'IPD243', 'iPad 5 - White', 1, NULL, 10.00, 12.00, 15.00, 55998.00, '2021-06-27 18:34:52', 1),
(30, NULL, 'INV_270621183426', 4, 'IPH-245', 'Iphone 12 Mini - Blue', 1, NULL, 10.00, 13.00, 40.00, 38376.00, '2021-06-27 18:34:52', 1),
(31, NULL, 'INV_270621183426', 8, 'IPD243', 'iPad 5 - White', 1, NULL, 10.00, 12.00, 15.00, 55998.00, '2021-06-27 18:34:58', 1),
(32, NULL, 'INV_270621183426', 4, 'IPH-245', 'Iphone 12 Mini - Blue', 1, NULL, 10.00, 13.00, 40.00, 38376.00, '2021-06-27 18:34:58', 1),
(33, NULL, 'INV_270621233453', 22, 'AIRP129', 'Color check - Blue', 2, 500.00, 10.00, 20.00, 25.00, 975.00, '2021-06-27 23:36:32', 1),
(34, NULL, 'INV_270621233453', 8, 'IPD243', 'iPad 5 - White', 1, 54000.00, 5.00, 10.00, 12.00, 54648.00, '2021-06-27 23:36:32', 1),
(35, NULL, 'INV_270621233453', 3, 'IPH-215', 'Iphone 12 Pro - Green', 2, 130000.00, 10.00, 10.00, 50.00, 156000.00, '2021-06-27 23:36:32', 1),
(36, NULL, 'INV_270621234253', 1, 'APL-123', 'Apple Watch Series 6 - Black', 2, 35000.39, NULL, NULL, NULL, 70000.78, '2021-06-27 23:43:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_12_18_084316_create_stocks_table', 1),
(9, '2020_12_19_093609_create_clients_table', 2);

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
('example@domain.com', '$2y$10$r2sPKdESAzA.aKhYo/QfXeNGVoA/MZRpUzk7eJujB4krZAUW621M6', '2021-06-13 00:51:15');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_desc` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_qnty` int(11) DEFAULT NULL,
  `product_cp` double(8,2) DEFAULT NULL,
  `product_sp` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `product_sku`, `product_name`, `product_color`, `product_desc`, `product_qnty`, `product_cp`, `product_sp`, `created_at`, `updated_at`, `created_by`) VALUES
(1, 'APL-123', 'Apple Watch Series 6', 'Black', 'Apple Watch Series 6 with Heart Rate, calories and temperature monitor sensor, year 2020', 101, 3150.21, 35000.39, NULL, '2021-06-27 18:13:12', 1),
(2, 'APL-124', 'Apple Watch Series 6', 'Blue', 'Series 5 with dual sensor technology year 2019', 115, 6700.00, 30500.00, NULL, '2021-06-24 17:07:29', 2),
(3, 'IPH-215', 'Iphone 12 Pro', 'Green', '4GB RAM, 12MP+18M+8MP, 6.2 inch display  ', 181, 873.00, 130000.00, '0000-00-00 00:00:00', '2021-06-27 18:06:32', 1),
(4, 'IPH-245', 'Iphone 12 Mini', 'Blue', 'Defective Piece', 108, 4500.00, 52000.00, NULL, '2021-06-27 13:04:58', 1),
(5, 'IPH-511', 'Iphone 11 Pro', 'Green', 'Launched in 2019', 0, 8400.00, 92670.00, NULL, '2021-05-21 10:14:39', 1),
(7, 'IPH739', 'Iphone 12 Pro', '-', '256GB, Matte Color', 2, 890.00, 95000.00, '2021-01-02 09:45:18', '2021-06-27 09:58:51', 1),
(8, 'IPD243', 'iPad 5', 'White', '2021', 60, 4500.00, 54000.00, '2021-01-02 10:31:23', '2021-06-27 18:06:32', 1),
(9, 'AP1234', 'Apple Watch Series 3', 'Purple', NULL, -9, 23000.00, 26000.00, '2021-01-02 10:36:53', '2021-06-27 09:21:41', 1),
(18, 'NKS-321', 'Nike Shoes', 'Cream', 'Jogging Shoes - Size 40', 94, 3000.00, 3500.00, '2021-01-02 18:23:05', '2021-06-27 12:14:02', 1),
(19, 'NIK123456', 'Nike Sport Plus', 'Yellow', 'Size - 48, Defect piece', 196, 5500.00, 6200.00, '2021-01-02 18:24:50', '2021-06-27 12:15:24', 1),
(22, 'AIRP129', 'Color check', 'Blue', 'final check', 103, 200.00, 500.00, '2021-01-03 12:53:03', '2021-06-27 18:06:32', 1),
(35, 'PMU123', 'Puma Shoes', 'Brown', 'germany made', 0, 2000.00, 4000.00, '2021-04-25 12:01:11', '2021-06-24 16:47:48', 1),
(36, 'ABC3444', 'Gucci sport Bag pro plus new demo', 'Grey', 'made in USA', 78, 15600.12, 18000.44, '2021-05-01 12:33:13', '2021-06-27 13:03:26', 1),
(38, 'DA122', 'Smart watch', '-', 'Made in china', 94, 1500.00, 1900.00, '2021-06-19 08:32:37', '2021-06-27 09:45:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `security_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `security_key`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tom', 'example@domain.com', NULL, '$2y$10$bdGqVp8EC/w6A1aFJEeM4u2X5pX1mYb5tNzquITp/s8Z2ROM9Wmh.', 'iphone', NULL, '2021-01-11 03:08:05', '2021-01-11 03:08:05'),
(2, 'abc', 'example@example.com', NULL, '$2y$10$YC/9lntYfk8Ee4Hx0USqaudZzhGN8QYTLHPjCfuadOPhMJ/u.cANK', 'samsung', NULL, '2021-01-11 05:46:54', '2021-01-11 05:46:54'),
(3, 'User2', 'admin@admin.com', NULL, '$2y$10$E4at9JhdjF5LBKe1ws/o.udPFmNRYQ8JJytO48/Dx54KFPfVR6L0y', '', NULL, '2021-01-11 05:50:18', '2021-01-11 05:50:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoiceproducts`
--
ALTER TABLE `invoiceproducts`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `invoiceproducts`
--
ALTER TABLE `invoiceproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
