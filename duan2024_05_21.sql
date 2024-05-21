-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 21, 2024 at 04:22 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan2024`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'May tinh', '2024-04-28 20:12:16', '2024-04-28 20:12:16'),
(3, 'Gia dung', '2024-04-28 20:12:23', '2024-04-28 20:12:23');

-- --------------------------------------------------------

--
-- Table structure for table `cauhinhs`
--

CREATE TABLE `cauhinhs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cauhinhs`
--

INSERT INTO `cauhinhs` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'bu', '{\"song1\": \"3\",\r\n\r\n\"song2\": \"5\",  \r\n\r\n\"song3\":\"9\"}', NULL, '2024-05-20 04:06:09');

-- --------------------------------------------------------

--
-- Table structure for table `cauhinhsxes`
--

CREATE TABLE `cauhinhsxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `congdoan_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `congdoans`
--

CREATE TABLE `congdoans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tencongdoan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `congdoans`
--

INSERT INTO `congdoans` (`id`, `tencongdoan`, `created_at`, `updated_at`) VALUES
(1, 'Market', '2024-05-10 19:28:47', '2024-05-10 19:28:47'),
(2, 'Sóng', '2024-05-10 19:28:56', '2024-05-10 19:28:56'),
(3, 'In', '2024-05-10 19:29:02', '2024-05-10 19:29:02'),
(4, 'In Phun', '2024-05-10 19:30:28', '2024-05-10 19:30:28'),
(5, 'Chạp', '2024-05-10 19:30:43', '2024-05-10 19:30:43'),
(6, 'Bế Bế', '2024-05-10 19:30:48', '2024-05-10 19:31:48'),
(7, 'Ghim dán', '2024-05-10 19:30:59', '2024-05-10 19:30:59'),
(8, 'Nhập kho', '2024-05-10 19:31:06', '2024-05-10 19:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `donhangs`
--

CREATE TABLE `donhangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `madonhang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `khachhang_id` int(11) NOT NULL,
  `soluong` int(11) DEFAULT NULL,
  `loaidonhang` enum('Đầy đủ','Không đầy đủ') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngaygiaohang` date NOT NULL,
  `trangthai` enum('Chưa sản xuất','Đang sản xuất','Đã hoàn tất','Đã hủy') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donhangs`
--

INSERT INTO `donhangs` (`id`, `madonhang`, `khachhang_id`, `soluong`, `loaidonhang`, `ngaygiaohang`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, '11111', 1, 11, 'Đầy đủ', '2024-09-09', 'Chưa sản xuất', '2024-05-08 23:58:21', '2024-05-08 23:58:21'),
(2, '2222222', 6, 222, 'Đầy đủ', '2024-05-31', 'Chưa sản xuất', '2024-05-09 00:16:25', '2024-05-19 02:28:30'),
(3, '888888', 9, 8888, 'Đầy đủ', '2024-05-31', 'Chưa sản xuất', '2024-05-18 08:46:24', '2024-05-18 08:46:24'),
(4, NULL, 11, NULL, NULL, '2024-05-24', 'Chưa sản xuất', '2024-05-19 01:42:24', '2024-05-19 01:42:24'),
(5, NULL, 2, NULL, NULL, '2024-05-24', 'Chưa sản xuất', '2024-05-19 02:23:55', '2024-05-19 02:23:55'),
(6, NULL, 6, NULL, NULL, '2024-05-31', 'Chưa sản xuất', '2024-05-19 02:28:30', '2024-05-19 02:28:30'),
(7, NULL, 4, NULL, NULL, '2024-05-23', 'Chưa sản xuất', '2024-05-19 19:30:37', '2024-05-19 19:30:37'),
(8, NULL, 4, NULL, NULL, '2024-05-23', 'Chưa sản xuất', '2024-05-19 19:31:13', '2024-05-19 19:31:13');

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
-- Table structure for table `khachhangs`
--

CREATE TABLE `khachhangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `makh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenkh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lienhe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `masothue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giaohang1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `km1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giaohang2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `km2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghichu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nguoitao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khachhangs`
--

INSERT INTO `khachhangs` (`id`, `makh`, `tenkh`, `lienhe`, `sdt`, `diachi`, `masothue`, `giaohang1`, `sdt1`, `km1`, `giaohang2`, `sdt2`, `km2`, `mang`, `ghichu`, `nguoitao`, `created_at`, `updated_at`) VALUES
(1, 'KH0001', 'Nguyen Van', '123 Trang Hung Dao', '05523234234234', '99 Tran Hung Dao', '989888324234', 'Khog', 'Khong', 'Khong', 'Khog', 'Khoang', '0', '???', 'hehehe', '', '2024-05-13 08:48:37', '2024-05-13 08:48:37'),
(2, 'KH0002', 'Sony', '543 Nam Kỳ', '0244334389', '423 Tran Hung Dao', '323423432', 'khong biet', 'ko', '0', 'Khong', '090099', '0', '???', 'Khong co chi', '', '2024-05-13 08:49:56', '2024-05-13 08:49:56'),
(3, 'KH00004', 'Cong ty ABCDEF', 'Ms Van', '0909090909', '99 Le Loi', '09232343423', '0000', '22222', '090909090', '34234', '09304234', '33', '???', 'No', '', '2024-05-17 01:51:41', '2024-05-17 01:51:41'),
(4, 'KH004', 'Cong ty Samsung', '3234', '234234', '4324', '23423', '23423', '23423', '234234', '2343243', '23432', '3423', '???', '23423', '', '2024-05-17 03:35:16', '2024-05-17 03:35:16'),
(5, 'Cong ty MNP', '234', '34234', '3423', '3234', '3223', '325242', '3252', '23233', '352353', '32325', '325rr', '???', '23523', '', '2024-05-17 03:35:43', '2024-05-17 03:35:43'),
(6, '77', '777777', '77', '77', '77', '77', '77', '77', '77', '77', '77', '77', '???', '777777777', '', '2024-05-18 08:37:08', '2024-05-18 08:37:08'),
(7, '888', '2222222', '88', '88', '88', '88', '88', '88', '88', '88', '88', '88', '???', '888888888888', '', '2024-05-18 08:39:03', '2024-05-18 08:39:03'),
(8, '888', '8888888888888', '8888888888', '88', '88', '88', '88', '88', '88', '88', '88', '88', '???', '888888888888', '', '2024-05-18 08:41:59', '2024-05-18 08:41:59'),
(9, '99', '999999999', '999', '99999999', '99999', '999999', '9', '9', '9', '9', '9', '9', '???', '99999999', '', '2024-05-18 08:43:15', '2024-05-18 08:43:15'),
(10, 'MMMM', 'Cty Nguyen Khang', '999', '008908', '99 Hung vuong', '678678', '564', '45654', '45645', '46546', '54645', '45654', '???', '45654', '', '2024-05-19 01:36:54', '2024-05-19 01:36:54'),
(11, '55', '5555555', '55', '555', '55', '55', '555', '555', '5', '5', '5', '55', '???', '55', '', '2024-05-19 01:41:46', '2024-05-19 01:41:46');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_04_29_021314_create_products_table', 1),
(6, '2024_04_29_021430_create_categories_table', 1),
(7, '2024_04_30_090340_create_orders_table', 2),
(8, '2024_05_09_060909_create_donhangs_table', 3),
(9, '2024_05_09_080259_create_sanphams_table', 4),
(10, '2024_05_10_153444_create_congdoans_table', 5),
(11, '2024_05_12_065421_create_cauhinhsxes_table', 6),
(12, '2024_05_13_142640_create_khachhangs_table', 7),
(13, '2024_05_14_085139_add-columns-to-sanpham', 8),
(14, '2024_05_20_072526_create_cauhinhs_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','processing','completed','decline') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `grand_total` double(8,2) NOT NULL,
  `item_count` int(11) NOT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `payment_method` enum('cash_on_delivery','bank_transfer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cash_on_delivery',
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `user_id`, `status`, `grand_total`, `item_count`, `is_paid`, `payment_method`, `notes`, `created_at`, `updated_at`) VALUES
(1, '1111111', 2, 'completed', 90.00, 20, 1, 'bank_transfer', 'Khong', '2024-04-30 09:16:16', '2024-04-30 09:16:16'),
(2, '2222211111', 16, 'completed', 38.00, 32, 0, 'bank_transfer', 'NO no', '2024-04-19 09:09:33', '2024-04-26 09:09:33'),
(3, 'ORD001', 1, 'pending', 100.00, 2, 0, 'cash_on_delivery', 'Order placed by user 1', '2024-04-30 09:16:16', '2024-04-30 09:16:16'),
(4, 'ORD002', 2, 'processing', 150.00, 3, 1, 'bank_transfer', 'Order placed by user 2', '2024-04-30 09:16:16', '2024-04-30 09:16:16'),
(5, 'ORD003', 3, 'completed', 200.00, 4, 1, 'cash_on_delivery', 'Order placed by user 3', '2024-04-30 09:16:16', '2024-04-30 09:16:16'),
(6, 'ORD004', 4, 'decline', 50.00, 1, 0, 'bank_transfer', 'Order placed by user 4', '2024-04-30 09:16:16', '2024-04-30 09:16:16'),
(7, 'ORD005', 5, 'pending', 120.00, 2, 1, 'cash_on_delivery', 'Order placed by user 5', '2024-04-02 09:16:16', '2024-04-30 09:16:16'),
(8, 'ORD006', 6, 'processing', 180.00, 3, 0, 'bank_transfer', 'Order placed by user 6', '2024-04-30 09:16:16', '2024-04-30 09:16:16'),
(9, 'ORD007', 7, 'completed', 220.00, 4, 1, 'cash_on_delivery', 'Order placed by user 7', '2024-04-30 09:16:16', '2024-04-30 09:16:16'),
(10, 'ORD008', 8, 'decline', 70.00, 1, 1, 'bank_transfer', 'Order placed by user 8', '2024-04-30 09:16:16', '2024-04-30 09:16:16'),
(11, 'ORD009', 9, 'pending', 130.00, 2, 0, 'cash_on_delivery', 'Order placed by user 9', '2024-04-30 09:16:16', '2024-04-30 09:16:16'),
(12, 'ORD010', 10, 'processing', 250.00, 3, 1, 'bank_transfer', 'Order placed by user 10', '2024-04-14 09:16:16', '2024-04-30 09:16:16'),
(13, 'ORD011', 11, 'completed', 180.00, 4, 0, 'cash_on_delivery', 'Order placed by user 11', '2024-04-30 09:16:16', '2024-04-30 09:16:16'),
(14, 'ORD012', 12, 'pending', 90.00, 1, 1, 'bank_transfer', 'Order placed by user 12', '2024-04-30 09:16:16', '2024-04-30 09:16:16'),
(15, 'ORD013', 13, 'processing', 130.00, 2, 0, 'cash_on_delivery', 'Order placed by user 13', '2024-04-30 09:16:16', '2024-04-30 09:16:16'),
(16, 'ORD014', 14, 'completed', 300.00, 5, 1, 'bank_transfer', 'Order placed by user 14', '2024-04-30 09:16:16', '2024-04-30 09:16:16'),
(17, 'ORD015', 15, 'decline', 70.00, 1, 1, 'cash_on_delivery', 'Order placed by user 15', '2024-04-30 09:16:16', '2024-04-30 09:16:16'),
(18, 'ORD0012', 2, 'processing', 150.00, 3, 1, 'bank_transfer', 'Order placed by user 2', '2024-04-11 09:16:16', '2024-04-30 09:16:16'),
(19, 'ORD0103', 3, 'completed', 200.00, 4, 1, 'cash_on_delivery', 'Order placed by user 3', '2024-04-30 09:16:16', '2024-04-30 09:16:16'),
(20, 'OR1D004', 4, 'decline', 50.00, 1, 0, 'bank_transfer', 'Order placed by user 4', '2024-04-30 09:16:16', '2024-04-30 09:16:16'),
(21, 'ORD1005', 5, 'pending', 120.00, 2, 1, 'cash_on_delivery', 'Order placed by user 5', '2024-04-30 09:16:16', '2024-04-30 09:16:16'),
(22, 'ORD0106', 6, 'processing', 180.00, 3, 0, 'bank_transfer', 'Order placed by user 6', '2024-04-30 09:16:16', '2024-04-30 09:16:16'),
(23, 'ORD0107', 7, 'completed', 220.00, 4, 1, 'cash_on_delivery', 'Order placed by user 7', '2024-04-30 09:16:16', '2024-04-30 09:16:16'),
(24, 'ORD0108', 8, 'decline', 70.00, 1, 1, 'bank_transfer', 'Order placed by user 8', '2024-04-01 09:16:16', '2024-04-30 09:16:16'),
(25, 'ORD0109', 9, 'pending', 130.00, 2, 0, 'cash_on_delivery', 'Order placed by user 9', '2024-02-07 09:16:16', '2024-04-30 09:16:16'),
(26, 'ORD1010', 10, 'processing', 250.00, 3, 1, 'bank_transfer', 'Order placed by user 10', '2024-04-30 09:16:16', '2024-04-30 09:16:16'),
(27, 'ORD1011', 11, 'completed', 180.00, 4, 0, 'cash_on_delivery', 'Order placed by user 11', '2024-04-30 09:16:16', '2024-04-30 09:16:16'),
(28, 'ORD1012', 12, 'pending', 90.00, 1, 1, 'bank_transfer', 'Order placed by user 12', '2024-04-30 09:16:16', '2024-04-30 09:16:16'),
(29, 'ORD1013', 13, 'processing', 130.00, 2, 0, 'cash_on_delivery', 'Order placed by user 13', '2024-04-30 09:16:16', '2024-04-30 09:16:16'),
(30, 'ORD0114', 14, 'completed', 300.00, 5, 1, 'bank_transfer', 'Order placed by user 14', '2024-04-30 09:16:16', '2024-04-30 09:16:16'),
(31, 'ORD0115', 15, 'decline', 70.00, 1, 1, 'cash_on_delivery', 'Order placed by user 15', '2024-04-30 09:16:16', '2024-04-30 09:16:16'),
(32, 'ORD2100', 10, 'pending', 300.00, 5, 1, 'cash_on_delivery', 'Order placed by user 10', '2024-04-30 09:16:16', '2024-04-30 09:16:16'),
(33, 'ORD201', 201, 'pending', 120.00, 2, 1, 'cash_on_delivery', 'Order placed by user 201', '2024-04-30 12:51:51', '2024-04-30 12:51:51'),
(34, 'ORD202', 202, 'processing', 180.00, 3, 0, 'bank_transfer', 'Order placed by user 202', '2024-04-30 12:51:51', '2024-04-30 12:51:51'),
(35, 'ORD203', 203, 'completed', 220.00, 4, 1, 'cash_on_delivery', 'Order placed by user 203', '2024-04-30 12:51:51', '2024-04-30 12:51:51'),
(36, 'ORD204', 204, 'decline', 70.00, 1, 1, 'bank_transfer', 'Order placed by user 204', '2024-04-30 12:51:51', '2024-04-30 12:51:51'),
(37, 'ORD205', 205, 'pending', 130.00, 2, 0, 'cash_on_delivery', 'Order placed by user 205', '2024-04-30 12:51:51', '2024-04-30 12:51:51'),
(38, 'ORD206', 206, 'processing', 250.00, 3, 1, 'bank_transfer', 'Order placed by user 206', '2024-04-30 12:51:51', '2024-04-30 12:51:51'),
(39, 'ORD207', 207, 'completed', 180.00, 4, 0, 'cash_on_delivery', 'Order placed by user 207', '2024-04-30 12:51:51', '2024-04-30 12:51:51'),
(40, 'ORD208', 208, 'pending', 90.00, 1, 1, 'bank_transfer', 'Order placed by user 208', '2024-04-30 12:51:51', '2024-04-30 12:51:51'),
(41, 'ORD209', 209, 'processing', 130.00, 2, 0, 'cash_on_delivery', 'Order placed by user 209', '2024-04-30 12:51:51', '2024-04-30 12:51:51'),
(42, 'ORD210', 210, 'completed', 300.00, 5, 1, 'bank_transfer', 'Order placed by user 210', '2024-04-30 12:51:51', '2024-04-30 12:51:51'),
(43, 'ORD211', 211, 'pending', 140.00, 2, 1, 'cash_on_delivery', 'Order placed by user 211', '2024-04-30 12:51:51', '2024-04-30 12:51:51'),
(44, 'ORD212', 212, 'processing', 160.00, 3, 0, 'bank_transfer', 'Order placed by user 212', '2024-04-30 12:51:51', '2024-04-30 12:51:51'),
(45, 'ORD213', 213, 'completed', 240.00, 4, 1, 'cash_on_delivery', 'Order placed by user 213', '2024-04-30 12:51:51', '2024-04-30 12:51:51'),
(46, 'ORD214', 214, 'decline', 60.00, 1, 1, 'bank_transfer', 'Order placed by user 214', '2024-04-30 12:51:51', '2024-04-30 12:51:51'),
(47, 'ORD215', 215, 'pending', 110.00, 2, 0, 'cash_on_delivery', 'Order placed by user 215', '2024-04-30 12:51:51', '2024-04-30 12:51:51');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `item_code`, `productname`, `category`, `price`, `created_at`, `updated_at`) VALUES
(2, 'SP0022332', 'Sản phẩm Máy tính bàn Dell', 'Gia dung', '4000000', '2024-04-28 20:15:16', '2024-04-28 20:15:24'),
(3, 'SP00003', 'Sản phẩm 3', 'May tinh', '34', '2024-04-29 02:51:44', '2024-04-29 02:51:44'),
(4, 'SKU200002', 'May in laser HP1001', 'Gia dung', '1000', NULL, NULL),
(5, 'SKU200002', 'May in laser HP12222', 'Gia dung', '1000', NULL, NULL),
(6, 'SKU200003', 'May in laser LG12345', 'Gia dung', '1000', NULL, NULL),
(7, 'SKU200004', 'Mays giat SamSSungHP1001', 'Gia dung', '1000', NULL, NULL),
(8, 'SKU200005', 'Dien thoai HP1001', 'Gia dung', '1000', NULL, NULL),
(9, 'SKU200006', 'May quet LM1001', 'Gia dung', '1000', NULL, NULL),
(10, 'SKU200007', 'Camera T2000', 'Gia dung', '1000', NULL, NULL),
(11, 'SKU200009', 'Nước đóng chai 500ml', 'Gia dung', '10000', NULL, NULL),
(12, 'SKU200112', 'Xe máy điện Vin', 'Gia dung', '1000000', NULL, NULL),
(13, 'P001', 'Widget A', 'Tools', '19.99', NULL, NULL),
(14, 'P002', 'Widget B', 'Tools', '24.99', NULL, NULL),
(15, 'P003', 'Gadget A', 'Gadgets', '29.99', NULL, NULL),
(16, 'P004', 'Gadget B', 'Gadgets', '34.99', NULL, NULL),
(17, 'P005', 'Device A', 'Electronics', '39.99', NULL, NULL),
(18, 'P006', 'Device B', 'Electronics', '44.99', NULL, NULL),
(19, 'P007', 'Appliance A', 'Home', '49.99', NULL, NULL),
(20, 'P008', 'Appliance B', 'Home', '54.99', NULL, NULL),
(21, 'P009', 'Tool A', 'Garden', '59.99', NULL, NULL),
(22, 'P010', 'Tool B', 'Garden', '64.99', NULL, NULL),
(23, 'P011', 'Equipment A', 'Fitness', '69.99', NULL, NULL),
(24, 'P012', 'Equipment B', 'Fitness', '74.99', NULL, NULL),
(25, 'P013', 'Accessory A', 'Fashion', '79.99', NULL, NULL),
(26, 'P014', 'Accessory B', 'Fashion', '84.99', NULL, NULL),
(27, 'P015', 'Product A', 'Miscellaneous', '89.99', NULL, NULL),
(28, 'P016', 'Product B', 'Miscellaneous', '94.99', NULL, NULL),
(29, 'P017', 'Widget C', 'Tools', '99.99', NULL, NULL),
(30, 'P018', 'Widget D', 'Tools', '104.99', NULL, NULL),
(31, 'P019', 'Gadget C', 'Gadgets', '109.99', NULL, NULL),
(32, 'P020', 'Gadget D', 'Gadgets', '114.99', NULL, NULL),
(33, 'P021', 'Device C', 'Electronics', '119.99', NULL, NULL),
(34, 'P022', 'Device D', 'Electronics', '124.99', NULL, NULL),
(35, 'P023', 'Appliance C', 'Home', '129.99', NULL, NULL),
(36, 'P024', 'Appliance D', 'Home', '134.99', NULL, NULL),
(37, 'P025', 'Tool C', 'Garden', '139.99', NULL, NULL),
(38, 'P026', 'Tool D', 'Garden', '144.99', NULL, NULL),
(39, 'P027', 'Equipment C', 'Fitness', '149.99', NULL, NULL),
(40, 'P028', 'Equipment D', 'Fitness', '154.99', NULL, NULL),
(41, 'P029', 'Accessory C', 'Fashion', '159.99', NULL, NULL),
(42, 'P030', 'Accessory D', 'Fashion', '164.99', NULL, NULL),
(43, 'P031', 'Product C', 'Miscellaneous', '169.99', NULL, NULL),
(44, 'P032', 'Product D', 'Miscellaneous', '174.99', NULL, NULL),
(45, 'P033', 'Widget E', 'Tools', '179.99', NULL, NULL),
(46, 'P034', 'Widget F', 'Tools', '184.99', NULL, NULL),
(47, 'P035', 'Gadget E', 'Gadgets', '189.99', NULL, NULL),
(48, 'P036', 'Gadget F', 'Gadgets', '194.99', NULL, NULL),
(49, 'P037', 'Device E', 'Electronics', '199.99', NULL, NULL),
(50, 'P038', 'Device F', 'Electronics', '204.99', NULL, NULL),
(51, 'P039', 'Appliance E', 'Home', '209.99', NULL, NULL),
(52, 'P040', 'Appliance F', 'Home', '214.99', NULL, NULL),
(53, 'P041', 'Tool E', 'Garden', '219.99', NULL, NULL),
(54, 'P042', 'Tool F', 'Garden', '224.99', NULL, NULL),
(55, 'P043', 'Equipment E', 'Fitness', '229.99', NULL, NULL),
(56, 'P044', 'Equipment F', 'Fitness', '234.99', NULL, NULL),
(57, 'P045', 'Accessory E', 'Fashion', '239.99', NULL, NULL),
(58, 'P046', 'Accessory F', 'Fashion', '244.99', NULL, NULL),
(59, 'P047', 'Product E', 'Miscellaneous', '249.99', NULL, NULL),
(60, 'P048', 'Product F', 'Miscellaneous', '254.99', NULL, NULL),
(61, 'P049', 'Widget G', 'Tools', '259.99', NULL, NULL),
(62, 'P050', 'Widget H', 'Tools', '264.99', NULL, NULL),
(63, NULL, NULL, NULL, NULL, '2024-05-14 02:24:22', '2024-05-14 02:24:22'),
(64, NULL, NULL, NULL, NULL, '2024-05-14 02:25:28', '2024-05-14 02:25:28'),
(65, NULL, NULL, NULL, NULL, '2024-05-14 02:26:21', '2024-05-14 02:26:21'),
(66, '434', '34534', NULL, '34534', '2024-05-17 01:05:42', '2024-05-17 01:05:42');

-- --------------------------------------------------------

--
-- Table structure for table `sanphams`
--

CREATE TABLE `sanphams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `masp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `congdoan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `donhang_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthai` enum('Chưa sản xuất','Đang sản xuất','Đã hoàn tất','Đã hủy') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tensp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kieusp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rong` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `song` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kieuin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `somau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghichu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `daiphoi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rongphoi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nap1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caonap1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nap2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caonap2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nap3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nap4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lebien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `khogiay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trongluong` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dientich` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dobuc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nenect` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nenfct` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `song3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `song2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `song1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chongtham` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `canmang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `boi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `be` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bocot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quanmang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ketcau` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sanphams`
--

INSERT INTO `sanphams` (`id`, `masp`, `congdoan`, `donhang_id`, `trangthai`, `created_at`, `updated_at`, `tensp`, `kieusp`, `dai`, `rong`, `cao`, `song`, `kieuin`, `somau`, `ghichu`, `daiphoi`, `rongphoi`, `nap1`, `caonap1`, `nap2`, `caonap2`, `nap3`, `nap4`, `lang`, `bat`, `lebien`, `khogiay`, `trongluong`, `dientich`, `dobuc`, `nenect`, `nenfct`, `mat3`, `song3`, `mat2`, `song2`, `mat1`, `song1`, `matin`, `chongtham`, `canmang`, `boi`, `chap`, `be`, `dan`, `ghim`, `bocot`, `quanmang`, `ketcau`, `mota`, `gia`, `soluong`) VALUES
(12, 'SP1110', '', '9090909', '', '2024-05-14 06:02:53', '2024-05-14 06:02:53', 'Bìa carton cho KH ABC', 'Miếng', '1', '8', '8', 'BC', 'Flexo', '1', '1111', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 'A4', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 'Có', '1', '1', '1', '1', '1', '1', '11', '1', NULL, '', 0, 0),
(13, 'SP00002', '', 'DH002', '', '2024-05-14 23:43:45', '2024-05-14 23:43:45', 'Bìa in cty thuốc xổ sán', 'Hộp', '12', '12', '12', 'AC', 'Offset', '5', 'In thu xem khong biet', '12', '12', '12', '12', '12', '12', '3', '3', '4', '4', '5', 'A4', '2', '1', '3', '1', '1', '3', '3', '2', '2', '1', '1', '1', 'Có', '1', '1', '0', '1', '1', '1', '1', '2', NULL, '', 0, 0),
(14, 'SP00003', '', 'DO000003', '', '2024-05-15 02:43:48', '2024-05-15 02:43:48', 'Bà ba con ga', 'Hộp', '12', '12', '12', 'BC', 'Flexo', '3', '3333', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', 'A4', '3', '4', '4', '3', '2', '2', '2', '2', '2', '2', '1', '2', 'Có', '1', '2', '3', '3', '3', '3', '3', '3', ' Hộp-12-12-12-{ BC}-Flexo', ' Kiểu: Hộp,\n        Kích thước: 12x\n            12x\n                12,\n                    Sóng: { BC},\n                    In: Flexo', 0, 0),
(15, 'SP0004', '', 'Hihihi', '', '2024-05-15 02:49:45', '2024-05-15 02:49:45', 'san phẩm 4', 'Miếng', '9', '9', '9', 'AC', 'Flexo', '3', '44444', '3', '4', '4', '4', '4', '4', '4', '4', '4', '4', '3', 'A4', '2', '2', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', 'Có', '4', '4', '4', '4', '4', '4', '4', '4', ' Miếng-9-9-9-{ AC}-Flexo', ' Kiểu: Miếng, Kích thước: 9x9x9, Sóng: { AC}, In: Flexo', 0, 0),
(16, 'SP00005', '', 'XXX', '', '2024-05-15 02:52:50', '2024-05-15 02:52:50', 'san pham thu 5', 'Miếng', '9', '8', '7', 'AC', 'Offset', '2', '4444444', '1', '1', '0', '2', '4', '4', '4', '4', '4', '4', '4', 'A4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '44', 'Không', '4', '4', '4', '4', '4', '4', '4', '4', ' Miếng-9-8-7-AC-Offset', ' Kiểu: Miếng, Kích thước: 9x8x7, Sóng: AC, In: Offset', 0, 0),
(17, 'SP2332423', '', '2', '', '2024-05-16 23:55:09', '2024-05-16 23:55:09', 'Thùng mì tơm', 'Hộp', '12', '12', '12', 'BC', 'Flexo', '3', '44444', '3', '3', '3', '3', '3', '3', '2', '3', '3', '3', '4', 'A4', '44', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', 'Có', '4', '4', '4', '4', '4', '4', '4', '4', ' Hộp-12-12-12-BC-Flexo', ' Kiểu: Hộp, Kích thước: 12x12x12, Sóng: BC, In: Flexo', 3000, 100),
(18, 'SP333', '', '2', '', '2024-05-16 23:58:03', '2024-05-16 23:58:03', 'Thùng ABC', 'Hộp', '23', '45', '63', 'BC', 'Flexo', '52', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'A4', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'Có', '5', '5', '5', '5', '5', '5', '5', '5', ' Hộp-23-45-63-BC-Flexo', ' Kiểu: Hộp, Kích thước: 23x45x63, Sóng: BC, In: Flexo', 5000, 24),
(19, 'rư', '', '3', '', '2024-05-19 01:07:22', '2024-05-19 01:07:22', 'rử', 'Hộp', '3', '3', '3', 'BC', 'Flexo', '3', '333333', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', 'A4', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', 'Có', '3', '3', '3', '3', '3', '3', '3', '3', ' Hộp-3-3-3-BC-Flexo', ' Kiểu: Hộp, Kích thước: 3x3x3, Sóng: BC, In: Flexo', 5666, 4),
(20, '23423', '', '4', '', '2024-05-19 02:03:40', '2024-05-19 02:03:40', '23423', 'Hộp', '34', '34', '34', 'BC', 'Flexo', '34', '444', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', 'A4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', 'Có', '4', '4', '4', '4', '4', '4', '4', '4', ' Hộp-34-34-34-BC-Flexo', ' Kiểu: Hộp, Kích thước: 34x34x34, Sóng: BC, In: Flexo', 43, 34),
(21, NULL, '', '8', '', '2024-05-20 19:16:58', '2024-05-20 19:16:58', 'Thung mi tom', 'Hộp', '10', '5', '7', 'BD', 'Flexo', '2', '222222', '65', '17', '2', '2', '2', '2', '2', '2', '2', '2', '2', 'A4', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', 'Có', '2', '2', '2', '2', '2', '2', '2', '2', ' Hộp-10-5-7-BD-Flexo', ' Kiểu: Hộp, Kích thước: 10x5x7, Sóng: BD, In: Flexo', 234234, 98);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Thanh', 'admin@gmail.com', '$2y$10$RuRyc5iBCvmrKLO2VVpBcuavGhXKrOgn6tmAIjrwNR3oieRlwnWWq', 'Admin', '2024-04-28 19:55:28', '2024-04-28 19:55:28'),
(2, 'thanh2', 'thanh2@gmail.com', '$2y$10$4FW2lchEcy5BRQufYeImQ.x7l0hVYP0qHexHlzWsUZ7N9F7d/TF1u', 'NA', '2024-04-28 20:47:50', '2024-04-28 20:47:50'),
(13, 'Thurman Schumm', 'nathaniel09@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(14, 'Dr. Elinor Strosin I', 'kris.price@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(15, 'Darby Haag', 'halie.ruecker@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(16, 'Ms. Katrina Larson MD', 'elliott.purdy@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(17, 'Filiberto Legros III', 'schoen.jedediah@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(18, 'Eveline Price', 'nova.lindgren@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(19, 'Cade Wisozk', 'hilpert.oswald@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(20, 'Shanel Farrell', 'jast.rod@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(21, 'Elinore Flatley', 'kody02@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(22, 'Retha Larson', 'skiles.laurine@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(23, 'Wiley Murazik Sr.', 'vhessel@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(24, 'Dayna Boehm', 'alvis03@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(25, 'Marco Crooks', 'cronin.alessandra@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(26, 'Jaquan Price Jr.', 'estroman@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(27, 'Marvin Paucek', 'wyman01@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(28, 'Willow Maggio', 'katelin19@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(29, 'Ms. Helena Greenholt', 'emard.kasey@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(30, 'Jeff Legros', 'pedro25@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(31, 'Mollie Pacocha', 'anastasia.runolfsson@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(32, 'Jaida Padberg', 'pcrist@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(33, 'Alena Graham', 'viviane.hackett@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(34, 'Euna Gorczany', 'bashirian.maia@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(35, 'Cole Runolfsdottir', 'zhackett@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(36, 'Ms. Mariah Mayer IV', 'beau.lesch@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(37, 'Ms. Kailyn Anderson IV', 'geoffrey.white@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(38, 'Mrs. Carrie Runolfsson', 'gschmidt@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(39, 'Marina Heller IV', 'wconsidine@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(40, 'Sammy O\'Hara', 'ydaniel@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(41, 'Prof. Adele Lakin', 'lauryn.larkin@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(42, 'Mr. Olaf Hoeger', 'isaiah.klocko@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(43, 'Ryley Rodriguez', 'cmurazik@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(44, 'Prof. Nettie McDermott DVM', 'rice.alberto@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(45, 'Miss Annalise Howe', 'ntoy@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(46, 'Dr. Celestine Dooley', 'jacobi.camron@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(47, 'Paige Murphy PhD', 'schinner.otilia@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(48, 'Branson VonRueden', 'labadie.clotilde@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(49, 'Isobel Jakubowski IV', 'roman.dubuque@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(50, 'Gisselle Monahan', 'turcotte.martine@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(51, 'Fermin Cremin', 'ritchie.eduardo@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(52, 'Mr. Brycen Tremblay MD', 'mills.cade@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(53, 'Jillian Sipes', 'crawford71@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(54, 'Cornelius Marks', 'junius.green@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(55, 'Keenan Hintz', 'erling28@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(56, 'Declan Heller PhD', 'fadel.odell@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(57, 'Henderson Hoeger II', 'jwilkinson@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(58, 'Kassandra Lowe', 'qconroy@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(59, 'Chase Hagenes', 'gwisoky@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(60, 'Nikki Gaylord I', 'lauretta.ruecker@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(61, 'Audreanne Bahringer', 'ynolan@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(62, 'Nayeli Kihn Sr.', 'kmckenzie@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(63, 'Christop Bruen', 'maybelle23@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(64, 'Kiel Osinski', 'walter.myron@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(65, 'Dr. Bradford Parker DDS', 'xkoss@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(66, 'Eda Hettinger', 'hwatsica@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(67, 'Prof. Rosella Miller II', 'elva35@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(68, 'Vena Prosacco', 'brigitte24@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(69, 'Monserrate Lind', 'fritsch.karlee@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(70, 'Oma Morissette', 'ottis45@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(71, 'Alvina Kunde', 'adolfo26@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(72, 'Mr. Robb Zieme', 'cummerata.trycia@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(73, 'Hiram Zulauf', 'kohler.maverick@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(74, 'Ms. Enola Torp', 'phodkiewicz@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(75, 'Keira Stroman', 'lilyan77@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(76, 'Americo Kuhn', 'welch.melisa@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(77, 'Velda Marks', 'issac.jacobson@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(78, 'Ms. Lia Jones DVM', 'daron18@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(79, 'Dr. Adrain Weimann IV', 'rey.gorczany@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(80, 'Jamal Wiegand IV', 'torphy.markus@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(81, 'Dr. Ryder Wyman', 'rippin.eula@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(82, 'Prof. Thea Becker', 'mcclure.cheyenne@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NA', '2024-04-29 23:14:44', '2024-04-29 23:14:44'),
(83, 'Admin2', 'admin2@gmail.com', '$2y$10$JfTxu4AB0oTvQyRRMHENwuBN.aiieNNj2w5UFdb2K4Cnd61Mgnvqa', 'Admin', '2024-05-08 18:48:35', '2024-05-08 18:48:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cauhinhs`
--
ALTER TABLE `cauhinhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cauhinhsxes`
--
ALTER TABLE `cauhinhsxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `congdoans`
--
ALTER TABLE `congdoans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donhangs`
--
ALTER TABLE `donhangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `khachhangs`
--
ALTER TABLE `khachhangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanphams`
--
ALTER TABLE `sanphams`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cauhinhs`
--
ALTER TABLE `cauhinhs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cauhinhsxes`
--
ALTER TABLE `cauhinhsxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `congdoans`
--
ALTER TABLE `congdoans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `donhangs`
--
ALTER TABLE `donhangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khachhangs`
--
ALTER TABLE `khachhangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `sanphams`
--
ALTER TABLE `sanphams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
