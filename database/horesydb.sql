-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19. Jun, 2023 17:23 PM
-- Tjener-versjon: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `horesydb`
--

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` int(11) NOT NULL DEFAULT 0,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `activity_roles`
--

CREATE TABLE `activity_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activity_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dataark for tabell `activity_roles`
--

INSERT INTO `activity_roles` (`id`, `role_id`, `activity_id`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '10', '1', 'Active', 1, '2023-06-07 13:38:33', '2023-06-07 13:38:33'),
(2, '11', '1', 'Active', 1, '2023-06-16 08:54:28', '2023-06-16 08:54:28'),
(3, '11', '2', 'Active', 1, '2023-06-16 08:54:28', '2023-06-16 08:54:28'),
(4, '11', '3', 'Active', 1, '2023-06-16 08:54:28', '2023-06-16 08:54:28'),
(5, '11', '4', 'Active', 1, '2023-06-16 08:54:28', '2023-06-16 08:54:28'),
(6, '11', '5', 'Active', 1, '2023-06-16 08:54:28', '2023-06-16 08:54:28'),
(7, '11', '6', 'Active', 1, '2023-06-16 08:54:28', '2023-06-16 08:54:28'),
(8, '11', '7', 'Active', 1, '2023-06-16 08:54:28', '2023-06-16 08:54:28'),
(9, '11', '8', 'Active', 1, '2023-06-16 08:54:28', '2023-06-16 08:54:28'),
(10, '11', '9', 'Active', 1, '2023-06-16 08:54:28', '2023-06-16 08:54:28'),
(11, '11', '10', 'Active', 1, '2023-06-16 08:54:28', '2023-06-16 08:54:28'),
(12, '11', '11', 'Active', 1, '2023-06-16 08:54:28', '2023-06-16 08:54:28'),
(13, '11', '12', 'Active', 1, '2023-06-16 08:54:28', '2023-06-16 08:54:28'),
(14, '11', '13', 'Active', 1, '2023-06-16 08:54:28', '2023-06-16 08:54:28');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` int(11) DEFAULT NULL,
  `metaname_id` int(11) DEFAULT NULL,
  `indicator_id` int(11) DEFAULT NULL,
  `opt_answer_id` int(11) DEFAULT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer_label` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manager_checklist` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cleared',
  `cleared_date` date DEFAULT NULL,
  `asset_id` int(11) DEFAULT NULL,
  `section` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(420) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `action` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` int(10) UNSIGNED NOT NULL,
  `datex` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dataark for tabell `answers`
--

INSERT INTO `answers` (`id`, `property_id`, `metaname_id`, `indicator_id`, `opt_answer_id`, `answer`, `answer_label`, `manager_checklist`, `cleared_date`, `asset_id`, `section`, `photo`, `description`, `status`, `action`, `user_id`, `datex`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 50, 150, 'Yes', 'no_value', 'cleared', NULL, 1, 'Bathroom', NULL, NULL, 'Active', 1, 11, '2023-06-10', '2023-06-10 07:19:23', '2023-06-10 07:19:23'),
(2, 1, 1, 51, 155, 'Maintenance', 'Low', 'Cleared', NULL, 1, 'Bathroom', 'IMG_6337_1686382740.jpg', 'cxc', 'Active', 1, 11, '2023-06-10', '2023-06-10 07:39:00', '2023-06-17 18:53:57'),
(3, 1, 1, 48, 146, 'Maintenance', 'Medium', 'Cleared', NULL, 1, 'Bathroom', NULL, NULL, 'Active', 1, 11, '2023-06-10', '2023-06-10 07:41:52', '2023-06-17 19:08:51'),
(4, 1, 1, 48, 144, 'Yes', 'no_value', 'cleared', NULL, 1, 'Bathroom', NULL, NULL, 'Active', 1, 11, '2023-06-11', '2023-06-11 04:30:08', '2023-06-11 04:30:08'),
(5, 1, 1, 50, 152, 'Maintenance', 'Medium', 'Cleared', NULL, 1, 'Bathroom', NULL, NULL, 'Active', 1, 11, '2023-06-11', '2023-06-11 04:30:08', '2023-06-17 19:10:34'),
(6, 1, 1, 48, 145, 'No', 'no_value', 'Cleared', NULL, 6, 'Bathroom', NULL, NULL, 'Active', 1, 11, '2023-06-11', '2023-06-11 05:14:12', '2023-06-16 13:24:29'),
(7, 1, 1, 50, 150, 'Yes', 'no_value', 'cleared', NULL, 6, 'Bathroom', NULL, NULL, 'Active', 1, 11, '2023-06-11', '2023-06-11 05:14:12', '2023-06-11 05:14:12'),
(8, 1, 1, 26, 78, 'Yes', 'Medium', 'cleared', NULL, 9, 'Closet', NULL, NULL, 'Active', 1, 11, '2023-06-14', '2023-06-14 14:05:40', '2023-06-14 14:05:40'),
(9, 1, 1, 27, 83, 'Maintenance', 'Medium', 'Cleared', NULL, 9, 'Closet', NULL, NULL, 'Active', 1, 11, '2023-06-14', '2023-06-14 14:05:40', '2023-06-16 13:24:46'),
(10, 1, 1, 48, 145, 'No', 'no_value', '', NULL, 1, 'Bathroom', NULL, NULL, 'Active', 1, 11, '2023-06-14', '2023-06-14 14:06:01', '2023-06-17 19:10:34'),
(11, 1, 1, 50, 152, 'Maintenance', 'Medium', 'Cleared', NULL, 1, 'Bathroom', NULL, NULL, 'Active', 1, 11, '2023-06-14', '2023-06-14 14:06:01', '2023-06-17 19:10:34'),
(12, 1, 1, 61, 184, 'No', 'no_value', '', NULL, 1, 'Bathroom', NULL, NULL, 'Active', 1, 11, '2023-06-14', '2023-06-14 14:06:01', '2023-06-17 19:10:34'),
(13, 1, 1, 62, 186, 'Yes', 'no_value', 'cleared', NULL, 1, 'Bathroom', NULL, NULL, 'Active', 1, 11, '2023-06-14', '2023-06-14 14:06:01', '2023-06-14 14:06:01'),
(14, 1, 1, 48, 144, 'Yes', 'no_value', 'cleared', NULL, 6, 'Bathroom', NULL, NULL, 'Active', 1, 2, '2023-06-15', '2023-06-15 03:35:19', '2023-06-15 03:35:19'),
(15, 1, 1, 49, 148, 'No', 'no_value', 'Cleared', NULL, 6, 'Bathroom', NULL, NULL, 'Active', 1, 2, '2023-06-15', '2023-06-15 03:35:19', '2023-06-16 13:25:00'),
(16, 1, 1, 48, 145, 'No', 'no_value', 'Cleared', NULL, 9, 'Bathroom', NULL, NULL, 'Active', 1, 11, '2023-06-15', '2023-06-15 03:35:53', '2023-06-17 19:11:30'),
(17, 1, 1, 49, 148, 'No', 'no_value', '', NULL, 9, 'Bathroom', NULL, NULL, 'Active', 1, 2, '2023-06-15', '2023-06-15 03:35:54', '2023-06-17 19:11:31'),
(18, 1, 1, 50, 150, 'Yes', 'no_value', 'cleared', NULL, 9, 'Bathroom', NULL, NULL, 'Active', 1, 11, '2023-06-15', '2023-06-15 03:37:00', '2023-06-15 03:37:00'),
(19, 1, 1, 51, 154, 'No', 'no_value', '', NULL, 9, 'Bathroom', NULL, NULL, 'Active', 1, 11, '2023-06-15', '2023-06-15 03:37:00', '2023-06-17 19:11:31'),
(20, 1, 1, 52, 156, 'Yes', 'no_value', 'cleared', NULL, 9, 'Bathroom', NULL, NULL, 'Active', 1, 11, '2023-06-15', '2023-06-15 03:37:37', '2023-06-15 03:37:37'),
(21, 1, 1, 53, 160, 'No', 'no_value', '', NULL, 9, 'Bathroom', NULL, NULL, 'Active', 1, 11, '2023-06-15', '2023-06-15 03:37:37', '2023-06-17 19:11:31'),
(22, 1, 1, 56, 169, 'No', 'no_value', '', NULL, 9, 'Bathroom', NULL, NULL, 'Active', 1, 11, '2023-06-15', '2023-06-15 03:37:37', '2023-06-17 19:11:31'),
(23, 1, 1, 57, 172, 'No', 'no_value', '', NULL, 9, 'Bathroom', NULL, NULL, 'Active', 1, 11, '2023-06-15', '2023-06-15 03:37:38', '2023-06-17 19:11:31'),
(24, 1, 1, 60, 181, 'No', 'no_value', '', NULL, 9, 'Bathroom', NULL, NULL, 'Active', 1, 11, '2023-06-15', '2023-06-15 03:37:38', '2023-06-17 19:11:31'),
(25, 1, 1, 55, 165, 'Yes', 'no_value', 'cleared', NULL, 9, 'Bathroom', NULL, NULL, 'Active', 1, 11, '2023-06-15', '2023-06-15 03:38:19', '2023-06-15 03:38:19'),
(26, 1, 1, 58, 175, 'No', 'no_value', '', NULL, 9, 'Bathroom', NULL, NULL, 'Active', 1, 11, '2023-06-15', '2023-06-15 03:38:19', '2023-06-17 19:11:31'),
(27, 1, 1, 61, 184, 'No', 'no_value', '', NULL, 9, 'Bathroom', NULL, NULL, 'Active', 1, 11, '2023-06-15', '2023-06-15 03:38:19', '2023-06-17 19:11:31'),
(28, 1, 1, 62, 186, 'Yes', 'no_value', 'cleared', NULL, 9, 'Bathroom', NULL, NULL, 'Active', 1, 11, '2023-06-15', '2023-06-15 03:38:19', '2023-06-15 03:38:19'),
(29, 1, 1, 48, 145, 'No', 'no_value', '', NULL, 1, 'Bathroom', 'MBVL LOGO (1)_1686817269.png', 'cvv', 'Active', 1, 1, '2023-06-15', '2023-06-15 03:50:25', '2023-06-17 19:10:34'),
(30, 1, 1, 50, 152, 'Maintenance', 'High', 'Cleared', NULL, 1, 'Bathroom', 'ccc_1686816957.png', 'High', 'Active', 1, 1, '2023-06-15', '2023-06-15 03:50:25', '2023-06-17 19:10:34'),
(31, 1, 1, 13, 40, 'Yes', 'no_value', 'cleared', NULL, 6, 'Bed', NULL, NULL, 'Active', 1, 11, '2023-06-15', '2023-06-15 06:56:45', '2023-06-15 06:56:45'),
(32, 1, 1, 14, 43, 'Yes', 'no_value', 'cleared', NULL, 6, 'Bed', NULL, NULL, 'Active', 1, 11, '2023-06-15', '2023-06-15 06:56:45', '2023-06-15 06:56:45'),
(33, 1, 1, 13, 41, 'No', 'no_value', 'Cleared', NULL, 1, 'Bed', NULL, NULL, 'Active', 1, 11, '2023-06-15', '2023-06-15 06:57:23', '2023-06-16 13:35:18'),
(34, 1, 1, 14, 43, 'Yes', 'no_value', 'cleared', NULL, 1, 'Bed', NULL, NULL, 'Active', 1, 11, '2023-06-15', '2023-06-15 06:57:23', '2023-06-15 06:57:23'),
(35, 1, 1, 15, 46, 'Yes', 'no_value', 'cleared', NULL, 1, 'Bed', NULL, NULL, 'Active', 1, 11, '2023-06-15', '2023-06-15 06:58:18', '2023-06-15 06:58:18'),
(36, 1, 1, 16, 50, 'No', 'no_value', 'Cleared', NULL, 1, 'Bed', NULL, NULL, 'Active', 1, 11, '2023-06-15', '2023-06-15 06:58:18', '2023-06-16 13:35:18'),
(37, 1, 1, 43, 130, 'No', 'no_value', 'Cleared', NULL, 6, 'Toilet', NULL, NULL, 'Active', 1, 11, '2023-06-15', '2023-06-15 07:04:23', '2023-06-16 12:52:02'),
(38, 1, 1, 43, 130, 'No', 'no_value', 'Cleared', NULL, 1, 'Toilet', NULL, NULL, 'Active', 1, 11, '2023-06-15', '2023-06-15 07:04:46', '2023-06-16 13:34:22'),
(39, 1, 1, 45, 137, 'Maintenance', 'Medium', 'Cleared', NULL, 1, 'Toilet', NULL, NULL, 'Active', 1, 11, '2023-06-15', '2023-06-15 07:04:46', '2023-06-16 13:36:39'),
(40, 1, 1, 17, 52, 'Yes', 'no_value', 'cleared', NULL, 1, 'Bed', NULL, NULL, 'Active', 1, 11, '2023-06-15', '2023-06-15 08:07:51', '2023-06-15 08:07:51'),
(41, 1, 1, 25, 77, 'No', 'no_value', 'Cleared', NULL, 1, 'Bed', NULL, NULL, 'Active', 1, 11, '2023-06-15', '2023-06-15 08:07:51', '2023-06-16 14:02:23'),
(42, 1, 1, 3, 11, 'Maintenance', 'no_value', 'cleared', NULL, 1, 'Room', 'DSC08051_1686816564.jpg', 'desc', 'Active', 1, 2, '2023-06-15', '2023-06-15 08:09:24', '2023-06-18 16:55:31'),
(43, 1, 1, 49, 147, 'Yes', 'no_value', 'cleared', NULL, 1, 'Bathroom', 'MBVL LOGO (1)_1686817597.png', NULL, 'Active', 1, 1, '2023-06-15', '2023-06-15 08:26:37', '2023-06-15 08:26:37'),
(44, 1, 1, 26, 78, 'Yes', 'no_value', 'cleared', NULL, 1, 'Closet', NULL, NULL, 'Active', 1, 11, '2023-06-16', '2023-06-16 08:04:21', '2023-06-16 08:04:21'),
(45, 1, 1, 27, 82, 'No', 'no_value', 'Action required', NULL, 1, 'Closet', NULL, NULL, 'Active', 1, 11, '2023-06-16', '2023-06-16 08:04:22', '2023-06-16 08:04:22'),
(46, 1, 1, 32, 98, 'Maintenance', 'Medium', 'Action required', NULL, 1, 'Closet', NULL, NULL, 'Active', 1, 11, '2023-06-16', '2023-06-16 08:04:22', '2023-06-16 08:04:22'),
(47, 1, 1, 30, 91, 'No', 'no_value', 'Action required', NULL, 1, 'Closet', NULL, NULL, 'Active', 1, 1, '2023-06-16', '2023-06-16 08:04:42', '2023-06-16 08:10:04'),
(48, 1, 1, 31, 93, 'Yes', 'no_value', 'cleared', NULL, 1, 'Closet', NULL, NULL, 'Active', 1, 11, '2023-06-16', '2023-06-16 08:04:42', '2023-06-16 08:04:42'),
(49, 1, 1, 48, 144, 'Yes', 'no_value', 'cleared', NULL, 1, 'Bathroom', NULL, NULL, 'Active', 1, 11, '2023-06-19', '2023-06-19 12:41:57', '2023-06-19 12:41:57'),
(50, 1, 1, 50, 150, 'Yes', 'no_value', 'cleared', NULL, 1, 'Bathroom', NULL, NULL, 'Active', 1, 11, '2023-06-19', '2023-06-19 12:41:57', '2023-06-19 12:41:57'),
(51, 1, 1, 51, 155, 'Maintenance', 'Medium', 'Action required', NULL, 1, 'Bathroom', NULL, NULL, 'Active', 1, 11, '2023-06-19', '2023-06-19 12:41:58', '2023-06-19 12:41:58'),
(52, 1, 1, 34, 104, 'Maintenance', 'Medium', 'Cleared', NULL, 6, 'Furniture', NULL, NULL, 'Active', 1, 11, '2023-06-19', '2023-06-19 12:44:57', '2023-06-19 12:45:52');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `assets`
--

CREATE TABLE `assets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metaname_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asset_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asset_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asset_brand` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asset_location` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asset_version` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asset_serial_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asset_barcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asset_tag_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asset_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `time_show` int(11) NOT NULL DEFAULT 0,
  `asset_show` int(11) NOT NULL DEFAULT 1,
  `extra_time` time NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dataark for tabell `assets`
--

INSERT INTO `assets` (`id`, `property_id`, `location_id`, `metaname_id`, `asset_name`, `asset_type`, `asset_brand`, `asset_location`, `asset_version`, `asset_serial_no`, `asset_barcode`, `asset_tag_no`, `asset_description`, `photo`, `status`, `time_show`, `asset_show`, `extra_time`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1', NULL, '1', 'Manyara room 1', '1', '2', '3', '4', '5', '6', '7', 'Room No 001', NULL, 'Active', 1, 1, '10:35:48', 1, '2022-12-15 18:51:03', '2023-06-19 13:00:26'),
(2, '1', NULL, '2', 'Dinning 001', 'Room', 'd2', '2', '312', 'a2', '332', '92', 'Dinning 0012', NULL, 'Active', 1, 1, '10:35:48', 1, '2022-12-15 19:31:46', '2023-06-19 13:00:26'),
(6, '1', NULL, '1', 'Manyara room 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'room no 3', '750milsphoto_1672855711.jpeg', 'Active', 1, 1, '10:35:48', 1, '2023-01-04 18:01:23', '2023-06-19 13:00:26'),
(7, '1', NULL, '10', 'Entree 001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Entree Main Door 1', NULL, 'Active', 1, 1, '10:35:48', 1, '2023-01-17 07:19:14', '2023-06-19 13:00:26'),
(8, '1', NULL, '1', 'Manyara room 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Manyara room 3', NULL, 'Active', 1, 1, '10:35:48', 1, '2023-02-01 08:50:52', '2023-06-19 13:00:26'),
(9, '1', NULL, '1', 'Manyara room 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Manyara room 4', NULL, 'Active', 1, 1, '00:00:00', 2, '2023-02-23 19:19:21', '2023-06-19 13:00:26'),
(10, '1', NULL, '1', 'Manyara room 5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Manyara room 5', NULL, 'Active', 1, 1, '00:00:00', 2, '2023-02-23 19:19:59', '2023-06-19 13:00:26'),
(11, '1', NULL, '1', 'Manyara room 6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Manyara room 6', NULL, 'Active', 1, 1, '00:00:00', 2, '2023-02-23 19:20:25', '2023-06-19 13:00:26'),
(12, '1', NULL, '1', 'Manyara room 7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Manyara room 7', NULL, 'Active', 1, 1, '00:00:00', 2, '2023-02-23 19:20:50', '2023-06-19 13:00:26'),
(13, '1', NULL, '1', 'Manyara room 8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Manyara room 8', NULL, 'Active', 1, 1, '00:00:00', 2, '2023-02-23 19:21:17', '2023-06-19 13:00:26'),
(14, '1', NULL, '1', 'Manyara room 9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Manyara room 9', NULL, 'Active', 1, 1, '00:00:00', 2, '2023-02-23 19:21:43', '2023-06-19 13:00:26'),
(15, '1', NULL, '1', 'Escapement 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Escapement 1', NULL, 'Active', 1, 1, '00:00:00', 2, '2023-02-23 19:23:37', '2023-06-19 13:00:26'),
(16, '1', NULL, '1', 'Escarpment 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Escarpment 2', NULL, 'Active', 1, 1, '00:00:00', 2, '2023-02-23 19:25:02', '2023-06-19 13:00:26'),
(17, '1', NULL, '1', 'Escarpment 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Escarpment 3', NULL, 'Active', 1, 1, '00:00:00', 2, '2023-02-23 19:25:27', '2023-06-19 13:00:26'),
(18, '1', NULL, '1', 'Escarpment 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Escarpment 4', NULL, 'Active', 1, 1, '00:00:00', 2, '2023-02-23 19:25:48', '2023-06-19 13:00:26'),
(19, '1', NULL, '1', 'Escarpment 5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Escarpment 5', NULL, 'Active', 1, 1, '00:00:00', 2, '2023-02-23 19:26:09', '2023-06-19 13:00:26'),
(20, '1', NULL, '1', 'Escarpment 6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Escarpment 6', NULL, 'Active', 1, 1, '00:00:00', 2, '2023-02-23 19:26:40', '2023-06-19 13:00:26'),
(21, '1', NULL, '1', 'Escarpment 7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Escarpment 7', NULL, 'Active', 1, 1, '00:00:00', 2, '2023-02-23 19:27:10', '2023-06-19 13:00:26'),
(22, '1', NULL, '1', 'Escarpment 8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Escarpment 8', NULL, 'Active', 1, 1, '00:00:00', 2, '2023-02-23 19:27:38', '2023-06-19 13:00:26'),
(23, '1', NULL, '1', 'Baobab 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Baobab 1', NULL, 'Active', 1, 1, '00:00:00', 2, '2023-02-23 19:29:07', '2023-06-19 13:00:26'),
(24, '1', NULL, '1', 'Baobab 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Baobab 2', NULL, 'Active', 1, 1, '00:00:00', 2, '2023-02-23 19:29:31', '2023-06-19 13:00:26'),
(25, '1', NULL, '1', 'Baobab 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Baobab 3', NULL, 'Active', 1, 1, '00:00:00', 2, '2023-02-23 19:29:53', '2023-06-19 13:00:26'),
(26, '1', NULL, '1', 'Baobab 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Baobab 4', NULL, 'Active', 1, 1, '00:00:00', 2, '2023-02-23 19:30:17', '2023-06-19 13:00:26'),
(27, '1', NULL, '1', 'Baobab 5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Baobab 5', NULL, 'Active', 1, 1, '00:00:00', 2, '2023-02-23 19:30:40', '2023-06-19 13:00:26'),
(28, '1', NULL, '1', 'Baobab 6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Baobab 6', NULL, 'Active', 1, 1, '00:00:00', 2, '2023-02-23 19:31:03', '2023-06-19 13:00:26'),
(29, '1', NULL, '1', 'Baobab 7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Baobab 7', NULL, 'Active', 1, 1, '00:00:00', 2, '2023-02-23 19:31:25', '2023-06-19 13:00:26'),
(30, '1', NULL, '1', 'Baobab 8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Baobab 8', NULL, 'Active', 1, 1, '00:00:00', 2, '2023-02-23 19:31:47', '2023-06-19 13:00:26'),
(31, '1', NULL, '1', 'Room cc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dsd', NULL, 'Active', 1, 1, '00:00:00', 1, '2023-06-06 12:48:35', '2023-06-19 13:00:26');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `asset_values`
--

CREATE TABLE `asset_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `cash_in_hand` bigint(20) UNSIGNED NOT NULL,
  `credit_customer` bigint(20) UNSIGNED NOT NULL,
  `advance_paid_to_supplier` bigint(20) UNSIGNED NOT NULL,
  `stock_value` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `cash_ins`
--

CREATE TABLE `cash_ins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `amount_received` int(10) UNSIGNED NOT NULL,
  `amount_to` int(10) UNSIGNED NOT NULL,
  `cash_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cash_descriptions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `checklist_statuses`
--

CREATE TABLE `checklist_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sys_user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `grade` tinyint(1) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'False',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tin` int(10) UNSIGNED NOT NULL,
  `vrn` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(10) UNSIGNED NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `customer_account_summaries`
--

CREATE TABLE `customer_account_summaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `sale_id` int(11) NOT NULL DEFAULT 0,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `customer_wallets`
--

CREATE TABLE `customer_wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `balance` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `customer_wallet_summuries`
--

CREATE TABLE `customer_wallet_summuries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `wallet_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT 0,
  `wallet_amount` int(11) NOT NULL DEFAULT 0,
  `wallet_balance` int(11) NOT NULL DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `datatypes`
--

CREATE TABLE `datatypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `datatype_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datatype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'input',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Inactive',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dataark for tabell `datatypes`
--

INSERT INTO `datatypes` (`id`, `datatype_name`, `datatype`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Input', 'input', 'Inactive', 0, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(2, 'Checklist', 'checkbox', 'Inactive', 0, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(3, 'Selection/Optional', 'radio', 'Inactive', 0, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(4, 'Number', 'number', 'Inactive', 0, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(5, 'Description', 'textarea', 'Inactive', 0, '2022-12-15 18:32:58', '2022-12-15 18:32:58');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `users` int(11) NOT NULL DEFAULT 0,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dataark for tabell `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `unit_name`, `status`, `users`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Hr and Admin', 'Hr and Admin', 'Active', 0, 1, '2022-12-15 18:32:57', '2022-12-15 18:32:57'),
(2, 'Hotelier', 'Hotelier', 'Active', 0, 1, '2022-12-15 18:32:57', '2023-02-21 17:01:30'),
(3, 'Account', 'Account', 'Active', 0, 1, '2022-12-15 18:32:57', '2022-12-15 18:32:57'),
(4, 'Store', 'Store', 'Active', 0, 1, '2022-12-15 18:32:57', '2022-12-15 18:32:57'),
(5, 'House Keeping', 'House Keeping', 'Active', 0, 1, '2022-12-15 18:32:57', '2022-12-15 18:32:57'),
(6, 'Hotelier', 'Service F & B', 'Active', 0, 1, '2023-02-21 16:39:49', '2023-02-21 16:47:20'),
(7, 'Hotelier', 'Maintenance', 'Active', 0, 1, '2023-02-21 16:41:28', '2023-06-16 08:45:48'),
(8, 'Hotelier', 'Front office', 'Active', 0, 1, '2023-02-21 16:41:53', '2023-02-21 16:46:49'),
(9, 'Hotelier', 'Kitchen', 'Active', 0, 1, '2023-02-21 16:42:23', '2023-02-21 16:46:34');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `department_roles`
--

CREATE TABLE `department_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dataark for tabell `department_roles`
--

INSERT INTO `department_roles` (`id`, `role_id`, `department_id`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1', '7', 'Active', 1, '2023-06-16 08:55:20', '2023-06-16 08:55:20'),
(2, '2', '7', 'Active', 1, '2023-06-16 08:55:20', '2023-06-16 08:55:20'),
(3, '3', '7', 'Active', 1, '2023-06-16 08:55:20', '2023-06-16 08:55:20'),
(4, '4', '7', 'Active', 1, '2023-06-16 08:55:20', '2023-06-16 08:55:20'),
(5, '5', '7', 'Active', 1, '2023-06-16 08:55:20', '2023-06-16 08:55:20'),
(6, '6', '7', 'Active', 1, '2023-06-16 08:55:20', '2023-06-16 08:55:20'),
(7, '7', '7', 'Active', 1, '2023-06-16 08:55:20', '2023-06-16 08:55:20'),
(8, '8', '7', 'Active', 1, '2023-06-16 08:55:20', '2023-06-16 08:55:20'),
(9, '9', '7', 'Active', 1, '2023-06-16 08:55:20', '2023-06-16 08:55:20'),
(10, '10', '7', 'Active', 1, '2023-06-16 08:55:20', '2023-06-16 08:55:20'),
(11, '11', '7', 'Active', 1, '2023-06-16 08:55:20', '2023-06-16 08:55:20');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `direct_expenses`
--

CREATE TABLE `direct_expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expenses_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `dynamic_ind_updates`
--

CREATE TABLE `dynamic_ind_updates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `index_id` int(11) DEFAULT NULL,
  `property_id` int(11) DEFAULT NULL,
  `asset_id` int(11) DEFAULT NULL,
  `metaname_id` int(11) DEFAULT NULL,
  `indicator_id` int(11) DEFAULT NULL,
  `answer_id` int(11) DEFAULT NULL,
  `opt_answer_id` int(11) DEFAULT NULL,
  `answer_value` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` int(11) NOT NULL DEFAULT 0,
  `user_id` int(10) UNSIGNED NOT NULL,
  `description` varchar(700) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `datex` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dataark for tabell `dynamic_ind_updates`
--

INSERT INTO `dynamic_ind_updates` (`id`, `index_id`, `property_id`, `asset_id`, `metaname_id`, `indicator_id`, `answer_id`, `opt_answer_id`, `answer_value`, `value`, `user_id`, `description`, `image`, `status`, `datex`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 1, 1, 12, 1, 37, 'Yes', 1, 1, 'washroom is dirty', NULL, 'Active', '2023-02-05', '2023-02-04 21:42:52', '2023-02-04 21:42:52'),
(2, 1, 1, 1, 1, 13, 2, 41, 'No', 1, 1, 'washroom is dirty', NULL, 'Active', '2023-02-05', '2023-02-04 21:42:52', '2023-02-04 21:42:52'),
(3, 2, 1, 1, 1, 14, 3, 43, 'Yes', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-04 21:42:53', '2023-02-04 21:42:53'),
(4, 3, 1, 1, 1, 33, 4, 99, 'Yes', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-04 21:43:16', '2023-02-04 21:43:16'),
(5, 4, 1, 1, 1, 34, 5, 103, 'No', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-04 21:43:17', '2023-02-04 21:43:17'),
(6, 5, 1, 1, 1, 35, 6, 105, 'Yes', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-04 21:43:17', '2023-02-04 21:43:17'),
(7, 6, 1, 1, 1, 36, 7, 108, 'Yes', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-04 21:43:18', '2023-02-04 21:43:18'),
(8, 7, 1, 1, 1, 37, 8, 111, 'Yes', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-04 21:43:18', '2023-02-04 21:43:18'),
(9, 0, 1, 6, 1, 26, 9, 78, 'Yes', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-04 21:49:08', '2023-02-04 21:49:08'),
(10, 1, 1, 6, 1, 27, 10, 82, 'No', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-04 21:49:08', '2023-02-04 21:49:08'),
(11, 0, 1, 2, 2, 1, 11, 1, 'Yes', 1, 1, 'Nill', NULL, 'Inactive', '2023-02-05', '2023-02-04 21:53:28', '2023-02-04 21:53:28'),
(12, 0, 1, 2, 2, 1, 12, 2, 'No', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-04 21:54:44', '2023-02-04 21:54:44'),
(13, 2, 1, 6, 1, 28, 13, 84, 'Yes', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-04 22:10:48', '2023-02-04 22:10:48'),
(14, 3, 1, 6, 1, 32, 14, 97, 'No', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-04 22:10:48', '2023-02-04 22:10:48'),
(15, 3, 1, 1, 1, 26, 15, 78, 'Yes', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:19:58', '2023-02-05 07:19:58'),
(16, 4, 1, 1, 1, 27, 16, 83, 'Maintenance', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:19:59', '2023-02-05 07:19:59'),
(17, 5, 1, 1, 1, 28, 17, 85, 'No', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:19:59', '2023-02-05 07:19:59'),
(18, 0, 1, 6, 1, 12, 18, 38, 'No', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:21:15', '2023-02-05 07:21:15'),
(19, 1, 1, 6, 1, 13, 19, 40, 'Yes', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:21:15', '2023-02-05 07:21:15'),
(20, 2, 1, 6, 1, 16, 20, 50, 'No', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:21:15', '2023-02-05 07:21:15'),
(21, 6, 1, 1, 1, 29, 21, 88, 'No', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:23:06', '2023-02-05 07:23:06'),
(22, 7, 1, 1, 1, 30, 22, 90, 'Yes', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:23:07', '2023-02-05 07:23:07'),
(23, 8, 1, 1, 1, 31, 23, 93, 'Yes', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:23:07', '2023-02-05 07:23:07'),
(24, 9, 1, 1, 1, 32, 24, 98, 'Maintenance', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:23:07', '2023-02-05 07:23:07'),
(25, 0, 1, 1, 1, 50, 25, 151, 'No', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:23:54', '2023-02-05 07:23:54'),
(26, 1, 1, 1, 1, 51, 26, 155, 'Maintenance', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:23:54', '2023-02-05 07:23:54'),
(27, 2, 1, 1, 1, 57, 27, 172, 'No', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:23:55', '2023-02-05 07:23:55'),
(28, 6, 1, 1, 1, 16, 28, 51, 'Maintenance', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:24:22', '2023-02-05 07:24:22'),
(29, 7, 1, 1, 1, 25, 29, 76, 'Yes', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:24:23', '2023-02-05 07:24:23'),
(30, 0, 1, 1, 1, 48, 30, 144, 'Yes', 1, 1, 'Nill', 'back_1675757342.jpg', 'Active', '2023-02-05', '2023-02-05 07:25:17', '2023-02-05 07:25:17'),
(31, 1, 1, 1, 1, 49, 31, 148, 'No', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:25:18', '2023-02-05 07:25:18'),
(32, 4, 1, 1, 1, 53, 32, 160, 'No', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:25:18', '2023-02-05 07:25:18'),
(33, 5, 1, 1, 1, 54, 33, 164, 'Maintenance', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:25:19', '2023-02-05 07:25:19'),
(34, 0, 1, 7, 10, 19, 34, 58, 'Yes', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:26:55', '2023-02-05 07:26:55'),
(35, 1, 1, 7, 10, 20, 35, 62, 'No', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:26:56', '2023-02-05 07:26:56'),
(36, 2, 1, 7, 10, 21, 36, 64, 'Yes', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:26:56', '2023-02-05 07:26:56'),
(37, 0, 1, 7, 10, 18, 37, 55, 'Yes', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:27:16', '2023-02-05 07:27:16'),
(38, 4, 1, 7, 10, 22, 38, 68, 'No', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:27:17', '2023-02-05 07:27:17'),
(39, 5, 1, 7, 10, 23, 39, 70, 'Yes', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:27:17', '2023-02-05 07:27:17'),
(40, 6, 1, 7, 10, 24, 40, 73, 'Yes', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:27:33', '2023-02-05 07:27:33'),
(41, 7, 1, 6, 1, 1, 41, 2, 'No', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:47:08', '2023-02-05 07:47:08'),
(42, 8, 1, 6, 1, 2, 42, 8, 'Maintenance', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:47:08', '2023-02-05 07:47:08'),
(43, 9, 1, 6, 1, 3, 43, 9, 'Yes', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:47:09', '2023-02-05 07:47:09'),
(44, 10, 1, 6, 1, 4, 44, 13, 'Yes', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:47:10', '2023-02-05 07:47:10'),
(45, 11, 1, 6, 1, 6, 45, 19, 'Yes', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:47:10', '2023-02-05 07:47:10'),
(46, 12, 1, 6, 1, 7, 46, 22, 'Yes', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:47:11', '2023-02-05 07:47:11'),
(47, 13, 1, 6, 1, 8, 47, 25, 'Yes', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:47:11', '2023-02-05 07:47:11'),
(48, 11, 1, 6, 1, 5, 48, 18, 'No sheet', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:47:48', '2023-02-05 07:47:48'),
(49, 15, 1, 6, 1, 9, 49, 30, 'Maintenance', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:47:50', '2023-02-05 07:47:50'),
(50, 16, 1, 6, 1, 10, 50, 33, 'Maintenance', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:47:50', '2023-02-05 07:47:50'),
(51, 17, 1, 6, 1, 11, 51, 36, 'Maintenance', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:47:50', '2023-02-05 07:47:50'),
(52, 0, 1, 8, 1, 33, 52, 99, 'Yes', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 07:48:35', '2023-02-05 07:48:35'),
(53, 4, 1, 1, 1, 52, 53, 157, 'No', 1, 1, 'Nill', NULL, 'Active', '2023-02-05', '2023-02-05 08:09:01', '2023-02-05 08:09:01'),
(54, 0, 1, 1, 1, 12, 54, 37, 'Yes', 1, 1, 'washroom is dirty', NULL, 'Active', '2023-02-06', '2023-02-06 07:08:42', '2023-02-06 07:08:42'),
(55, 1, 1, 1, 1, 13, 55, 41, 'No', 1, 1, 'washroom is dirty', NULL, 'Active', '2023-02-06', '2023-02-06 07:08:43', '2023-02-06 07:08:43'),
(56, 2, 1, 1, 1, 14, 56, 43, 'Yes', 1, 1, 'Nill', NULL, 'Active', '2023-02-06', '2023-02-06 07:08:43', '2023-02-06 07:08:43'),
(57, 3, 1, 1, 1, 15, 57, 47, 'No', 1, 1, 'Nill', NULL, 'Active', '2023-02-06', '2023-02-06 07:08:44', '2023-02-06 07:08:44'),
(58, 4, 1, 1, 1, 16, 58, 51, 'Maintenance', 1, 1, 'Nill', NULL, 'Active', '2023-02-06', '2023-02-06 07:08:44', '2023-02-06 07:08:44'),
(59, 0, 1, 1, 1, 48, 59, 146, 'Maintenance', 1, 1, 'Nill', 'back_1675757342.jpg', 'Inactive', '2023-02-06', '2023-02-06 07:45:22', '2023-02-06 07:45:22'),
(60, 1, 1, 1, 1, 59, 60, 179, 'Maintenance', 1, 1, 'Nill', NULL, 'Inactive', '2023-02-06', '2023-02-06 07:45:22', '2023-02-06 07:45:22'),
(61, 5, 1, 1, 1, 26, 61, 79, 'No', 1, 1, 'Nill', NULL, 'Active', '2023-02-06', '2023-02-06 07:46:14', '2023-02-06 07:46:14'),
(62, 6, 1, 1, 1, 27, 62, 83, 'Maintenance', 1, 1, 'Nill', NULL, 'Active', '2023-02-06', '2023-02-06 07:46:14', '2023-02-06 07:46:14'),
(63, 7, 1, 1, 1, 28, 63, 84, 'Yes', 1, 1, 'Nill', NULL, 'Active', '2023-02-06', '2023-02-06 07:46:15', '2023-02-06 07:46:15'),
(64, 0, 1, 8, 1, 26, 64, 78, 'Yes', 1, 1, 'Nill', NULL, 'Active', '2023-02-06', '2023-02-06 07:51:00', '2023-02-06 07:51:00'),
(65, 1, 1, 8, 1, 27, 65, 81, 'Yes', 1, 1, 'Nill', NULL, 'Active', '2023-02-06', '2023-02-06 07:51:00', '2023-02-06 07:51:00'),
(66, 2, 1, 8, 1, 28, 66, 85, 'No', 1, 1, 'Nill', NULL, 'Active', '2023-02-06', '2023-02-06 07:51:00', '2023-02-06 07:51:00'),
(67, 0, 1, 1, 1, 48, 67, 144, 'Yes', 1, 1, 'Nill', 'back_1675757342.jpg', 'Active', '2023-02-07', '2023-02-07 08:09:01', '2023-02-07 08:09:01'),
(68, 1, 1, 1, 1, 12, 68, 39, 'Maintenance', 1, 1, 'washroom is dirty', NULL, 'Active', '2023-02-07', '2023-02-07 11:06:41', '2023-02-07 11:06:41'),
(69, 2, 1, 1, 1, 13, 69, 42, 'Maintenance', 1, 1, 'washroom is dirty', NULL, 'Active', '2023-02-07', '2023-02-07 11:06:41', '2023-02-07 11:06:41'),
(70, 3, 1, 1, 1, 15, 70, 46, 'Yes', 1, 1, 'Nill', NULL, 'Active', '2023-02-07', '2023-02-07 11:06:42', '2023-02-07 11:06:42'),
(71, 0, 1, 1, 1, 48, 71, 144, 'Yes', 1, 1, 'Nill', 'back_1675757342.jpg', 'Active', '2023-02-10', '2023-02-10 03:01:29', '2023-02-10 03:01:29'),
(72, 1, 1, 1, 1, 49, 72, 148, 'No', 1, 1, 'Nill', NULL, 'Active', '2023-02-10', '2023-02-10 03:01:29', '2023-02-10 03:01:29'),
(73, 2, 1, 1, 1, 50, 73, 151, 'No', 1, 1, 'Nill', NULL, 'Active', '2023-02-10', '2023-02-10 03:01:29', '2023-02-10 03:01:29'),
(74, 0, 1, 6, 1, 12, 74, 39, 'Maintenance', 1, 1, 'Nill', NULL, 'Active', '2023-02-10', '2023-02-10 03:03:22', '2023-02-10 03:03:22'),
(75, 1, 1, 6, 1, 13, 75, 42, 'Maintenance', 1, 1, 'Nill', NULL, 'Active', '2023-02-10', '2023-02-10 03:03:23', '2023-02-10 03:03:23'),
(76, 2, 1, 6, 1, 16, 76, 50, 'No', 1, 1, 'Nill', NULL, 'Active', '2023-02-10', '2023-02-10 03:03:23', '2023-02-10 03:03:23'),
(77, 3, 1, 6, 1, 17, 77, 54, 'Maintenance', 1, 1, 'Nill', NULL, 'Active', '2023-02-10', '2023-02-10 03:03:23', '2023-02-10 03:03:23'),
(78, 0, 1, 7, 10, 18, 78, 55, 'Yes', 1, 1, 'Nill', NULL, 'Active', '2023-02-11', '2023-02-11 04:01:40', '2023-02-11 04:01:40'),
(79, 1, 1, 7, 10, 19, 79, 60, 'Maintenance', 1, 1, 'Nill', NULL, 'Active', '2023-02-11', '2023-02-11 04:01:40', '2023-02-11 04:01:40'),
(80, 2, 1, 7, 10, 23, 80, 72, 'Maintenance', 1, 1, 'Nill', NULL, 'Active', '2023-02-11', '2023-02-11 04:01:40', '2023-02-11 04:01:40'),
(81, 3, 1, 7, 10, 24, 81, 74, 'No', 1, 1, 'Nill', NULL, 'Active', '2023-02-11', '2023-02-11 04:01:40', '2023-02-11 04:01:40');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `expense_categories`
--

CREATE TABLE `expense_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expenses_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `failed_jobs`
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
-- Tabellstruktur for tabell `key_indicators`
--

CREATE TABLE `key_indicators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dataark for tabell `key_indicators`
--

INSERT INTO `key_indicators` (`id`, `key_name`, `created_at`, `updated_at`) VALUES
(1, 'Good', '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(2, 'Bad', '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(3, 'Maintenance', '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(4, 'Critical', '2022-12-15 18:32:58', '2022-12-15 18:32:58');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `liablity_values`
--

CREATE TABLE `liablity_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payable_supplier` bigint(20) UNSIGNED NOT NULL,
  `expenses` bigint(20) UNSIGNED NOT NULL,
  `advance_paid_by_customer` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `managers`
--

CREATE TABLE `managers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` int(11) DEFAULT NULL,
  `metaname_id` int(11) DEFAULT NULL,
  `indicator_id` int(11) DEFAULT NULL,
  `opt_answer_id` int(11) DEFAULT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manager_checklist` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cleared_date` date DEFAULT NULL,
  `asset_id` int(11) DEFAULT NULL,
  `section` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(420) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `action` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` int(10) UNSIGNED NOT NULL,
  `datex` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='managers';

--
-- Dataark for tabell `managers`
--

INSERT INTO `managers` (`id`, `property_id`, `metaname_id`, `indicator_id`, `opt_answer_id`, `answer`, `manager_checklist`, `cleared_date`, `asset_id`, `section`, `photo`, `description`, `status`, `action`, `user_id`, `datex`, `created_at`, `updated_at`) VALUES
(1, 1, 10, 18, 57, 'Maintenance', 'Cleared', NULL, 7, 'Entree', NULL, NULL, 'Active', 1, 1, '2023-02-23', '2023-02-23 17:49:01', '2023-02-23 17:49:01'),
(2, 1, 10, 19, 60, 'Maintenance', NULL, NULL, 7, 'Entree', NULL, NULL, 'Active', 1, 1, '2023-02-23', '2023-02-23 17:49:01', '2023-02-23 17:49:01'),
(3, 1, 1, 48, 145, 'No', 'Cleared', NULL, 6, 'Bathroom', NULL, NULL, 'Active', 1, 1, '2023-03-09', '2023-03-10 02:51:25', '2023-03-10 02:51:25'),
(4, 1, 1, 49, 148, 'No', 'Not cleared', NULL, 6, 'Bathroom', NULL, NULL, 'Active', 1, 1, '2023-03-09', '2023-03-10 02:51:25', '2023-03-10 02:51:25'),
(5, 1, 1, 50, 151, 'No', 'Cleared', NULL, 6, 'Bathroom', NULL, NULL, 'Active', 1, 1, '2023-03-09', '2023-03-10 02:51:25', '2023-03-10 02:51:25'),
(6, 1, 1, 49, 149, 'Maintenance', NULL, NULL, 1, 'Bathroom', NULL, NULL, 'Active', 1, 1, '2023-04-11', '2023-04-11 17:48:37', '2023-04-11 17:48:37'),
(7, 1, 1, 62, 188, 'Maintenance', NULL, NULL, 1, 'Bathroom', NULL, NULL, 'Active', 1, 1, '2023-04-11', '2023-04-11 17:48:37', '2023-04-11 17:48:37'),
(8, 1, 1, 48, 145, 'No', NULL, NULL, 1, 'Bathroom', NULL, NULL, 'Active', 1, 1, '2023-04-11', '2023-04-11 17:48:37', '2023-04-11 17:48:37'),
(9, 1, 1, 52, 158, 'Maintenance', NULL, NULL, 1, 'Bathroom', NULL, NULL, 'Active', 1, 1, '2023-04-11', '2023-04-11 17:48:37', '2023-04-11 17:48:37'),
(10, 1, 1, 56, 170, 'Maintenance', NULL, NULL, 1, 'Bathroom', NULL, NULL, 'Active', 1, 1, '2023-04-11', '2023-04-11 17:48:37', '2023-04-11 17:48:37'),
(11, 1, 1, 1, 3, 'NA', 'Cleared', NULL, 1, 'Room', NULL, NULL, 'Active', 1, 1, '2023-04-25', '2023-04-25 15:37:13', '2023-04-25 15:37:13'),
(12, 1, 1, 2, 6, 'No', NULL, NULL, 1, 'Room', NULL, NULL, 'Active', 1, 1, '2023-04-25', '2023-04-25 15:37:13', '2023-04-25 15:37:13'),
(13, 1, 1, 48, 145, 'No', 'Cleared', NULL, 6, 'Bathroom', NULL, NULL, 'Active', 1, 1, '2023-04-25', '2023-04-25 16:20:48', '2023-04-25 16:20:48'),
(14, 1, 1, 12, 38, 'No', 'Cleared', NULL, 8, 'Bed', NULL, NULL, 'Active', 1, 1, '2023-04-28', '2023-04-28 16:42:29', '2023-04-28 16:42:29'),
(15, 1, 1, 12, 38, 'No', 'Cleared', NULL, 1, 'Bed', NULL, NULL, 'Active', 1, 1, '2023-04-28', '2023-04-28 16:43:03', '2023-04-28 16:43:03'),
(16, 1, 1, 2, 6, 'No', 'Cleared', NULL, 1, 'Room', NULL, NULL, 'Active', 1, 1, '2023-04-28', '2023-04-28 16:43:51', '2023-04-28 16:43:51'),
(17, 1, 1, 26, 80, 'Maintenance', 'Cleared', NULL, 1, 'Closet', NULL, NULL, 'Active', 1, 1, '2023-04-28', '2023-04-28 16:44:34', '2023-04-28 16:44:34'),
(18, 1, 1, 48, 145, 'No', 'Cleared', NULL, 11, 'Bathroom', NULL, NULL, 'Active', 1, 1, '2023-04-28', '2023-04-28 16:45:39', '2023-04-28 16:45:39'),
(19, 1, 1, 62, 188, 'Maintenance', 'Cleared', NULL, 1, 'Bathroom', NULL, NULL, 'Active', 1, 1, '2023-04-28', '2023-04-28 17:24:22', '2023-04-28 17:24:22'),
(20, 1, 1, 48, 145, 'No', NULL, NULL, 1, 'Bathroom', NULL, NULL, 'Active', 1, 1, '2023-04-28', '2023-04-28 17:24:22', '2023-04-28 17:24:22'),
(21, 1, 1, 49, 149, 'Maintenance', NULL, NULL, 1, 'Bathroom', NULL, NULL, 'Active', 1, 1, '2023-04-28', '2023-04-28 17:24:22', '2023-04-28 17:24:22'),
(22, 1, 1, 52, 158, 'Maintenance', NULL, NULL, 1, 'Bathroom', NULL, NULL, 'Active', 1, 1, '2023-04-28', '2023-04-28 17:24:22', '2023-04-28 17:24:22'),
(23, 1, 1, 56, 170, 'Maintenance', NULL, NULL, 1, 'Bathroom', NULL, NULL, 'Active', 1, 1, '2023-04-28', '2023-04-28 17:24:22', '2023-04-28 17:24:22'),
(24, 1, 1, 48, 146, 'Maintenance', NULL, NULL, 1, 'Bathroom', NULL, NULL, 'Active', 1, 5, '2023-06-03', '2023-06-03 13:14:57', '2023-06-03 13:14:58'),
(25, 1, 1, 49, 149, 'Maintenance', NULL, NULL, 1, 'Bathroom', 'DSC08051_1685799531.jpg', NULL, 'Active', 1, 5, '2023-06-03', '2023-06-03 13:14:57', '2023-06-03 13:38:52'),
(26, 1, 1, 52, 158, 'Maintenance', NULL, NULL, 1, 'Bathroom', NULL, NULL, 'Active', 1, 5, '2023-06-03', '2023-06-03 13:14:58', '2023-06-03 13:14:58'),
(27, 1, 1, 56, 170, 'Maintenance', NULL, NULL, 1, 'Bathroom', NULL, NULL, 'Active', 1, 5, '2023-06-03', '2023-06-03 13:14:58', '2023-06-03 13:14:58'),
(28, 1, 1, 55, 167, 'Maintenance', NULL, NULL, 1, 'Bathroom', NULL, NULL, 'Active', 1, 5, '2023-06-03', '2023-06-03 13:14:58', '2023-06-03 13:14:58'),
(29, 1, 1, 53, 161, 'Maintenance', NULL, NULL, 1, 'Bathroom', NULL, NULL, 'Active', 1, 5, '2023-06-03', '2023-06-03 13:14:58', '2023-06-03 13:14:58'),
(30, 1, 1, 54, 164, 'Maintenance', NULL, NULL, 1, 'Bathroom', NULL, NULL, 'Active', 1, 5, '2023-06-03', '2023-06-03 13:14:59', '2023-06-03 13:14:59'),
(31, 1, 1, 14, 45, 'Maintenance', 'Cleared', NULL, 1, 'Bed', NULL, NULL, 'Active', 1, 1, '2023-06-06', '2023-06-06 09:54:45', '2023-06-06 09:54:45'),
(32, 1, 1, 26, 79, 'No', 'Cleared', NULL, 6, 'Closet', NULL, NULL, 'Active', 1, 1, '2023-06-06', '2023-06-06 09:55:03', '2023-06-06 09:55:03'),
(33, 1, 1, 27, 82, 'No', 'Cleared', NULL, 6, 'Closet', NULL, NULL, 'Active', 1, 1, '2023-06-06', '2023-06-06 09:55:03', '2023-06-06 09:55:03'),
(34, 1, 1, 32, 97, 'No', NULL, NULL, 6, 'Closet', NULL, NULL, 'Active', 1, 1, '2023-06-06', '2023-06-06 09:55:03', '2023-06-06 09:55:03'),
(35, 1, 1, 50, 151, 'No', 'Cleared', NULL, 1, 'Bathroom', NULL, NULL, 'Active', 1, 1, '2023-06-08', '2023-06-08 18:26:08', '2023-06-08 18:26:08'),
(36, 1, 1, 14, 44, 'No', 'Cleared', NULL, 1, 'Bed', NULL, NULL, 'Active', 1, 1, '2023-06-08', '2023-06-08 18:26:31', '2023-06-08 18:26:31'),
(37, 1, 1, 15, 47, 'No', 'Cleared', NULL, 1, 'Bed', NULL, NULL, 'Active', 1, 1, '2023-06-08', '2023-06-08 18:26:31', '2023-06-08 18:26:31'),
(38, 1, 1, 17, 53, 'No', NULL, NULL, 1, 'Bed', NULL, NULL, 'Active', 1, 1, '2023-06-08', '2023-06-08 18:26:31', '2023-06-08 18:26:31'),
(39, 1, 1, 32, 97, 'No', 'Cleared', NULL, 6, 'Closet', NULL, NULL, 'Active', 1, 1, '2023-06-08', '2023-06-08 18:26:50', '2023-06-08 18:26:50'),
(40, 1, 1, 3, 11, 'Maintenance', 'Cleared', NULL, 8, 'Room', NULL, NULL, 'Active', 1, 1, '2023-06-08', '2023-06-08 18:29:15', '2023-06-08 18:29:15'),
(41, 1, 1, 17, 53, 'No', 'Cleared', NULL, 1, 'Bed', NULL, NULL, 'Active', 1, 1, '2023-06-09', '2023-06-09 05:44:52', '2023-06-09 05:44:52'),
(42, 1, 1, 58, 175, 'No', 'Cleared', NULL, 1, 'Bathroom', NULL, NULL, 'Active', 1, 5, '2023-06-09', '2023-06-09 05:45:04', '2023-06-09 06:35:09'),
(43, 1, 1, 55, 166, 'No', NULL, NULL, 1, 'Bathroom', NULL, NULL, 'Active', 1, 5, '2023-06-09', '2023-06-09 05:45:04', '2023-06-09 06:35:09'),
(44, 1, 1, 43, 130, 'No', 'Cleared', NULL, 6, 'Toilet', NULL, NULL, 'Active', 1, 1, '2023-06-16', '2023-06-16 12:52:02', '2023-06-16 12:52:02'),
(45, 1, 1, 48, 145, 'No', 'Cleared', NULL, 6, 'Bathroom', NULL, NULL, 'Active', 1, 12, '2023-06-16', '2023-06-16 13:24:29', '2023-06-16 13:24:29'),
(46, 1, 1, 49, 148, 'No', 'Cleared', NULL, 6, 'Bathroom', NULL, NULL, 'Active', 1, 12, '2023-06-16', '2023-06-16 13:24:29', '2023-06-16 13:25:00'),
(47, 1, 1, 27, 83, 'Maintenance', 'Cleared', NULL, 9, 'Closet', NULL, NULL, 'Active', 1, 12, '2023-06-16', '2023-06-16 13:24:46', '2023-06-16 13:24:46'),
(48, 1, 1, 43, 130, 'No', 'Cleared', NULL, 1, 'Toilet', NULL, NULL, 'Active', 1, 1, '2023-06-16', '2023-06-16 13:34:22', '2023-06-16 13:34:22'),
(49, 1, 1, 45, 137, 'Maintenance', 'Cleared', NULL, 1, 'Toilet', NULL, NULL, 'Active', 1, 1, '2023-06-16', '2023-06-16 13:34:22', '2023-06-16 13:36:39'),
(50, 1, 1, 13, 41, 'No', 'Cleared', NULL, 1, 'Bed', NULL, NULL, 'Active', 1, 1, '2023-06-16', '2023-06-16 13:35:18', '2023-06-16 13:35:18'),
(51, 1, 1, 16, 50, 'No', 'Cleared', NULL, 1, 'Bed', NULL, NULL, 'Active', 1, 1, '2023-06-16', '2023-06-16 13:35:18', '2023-06-16 13:35:18'),
(52, 1, 1, 25, 77, 'No', 'Cleared', NULL, 1, 'Bed', NULL, NULL, 'Active', 1, 1, '2023-06-16', '2023-06-16 13:35:18', '2023-06-16 14:02:23'),
(53, 1, 1, 51, 155, 'Maintenance', 'Cleared', NULL, 1, 'Bathroom', NULL, NULL, 'Active', 1, 12, '2023-06-17', '2023-06-17 18:53:57', '2023-06-17 18:53:57'),
(54, 1, 1, 48, 145, 'No', NULL, NULL, 1, 'Bathroom', NULL, NULL, 'Active', 1, 2, '2023-06-17', '2023-06-17 18:53:57', '2023-06-17 19:10:34'),
(55, 1, 1, 50, 152, 'Maintenance', 'Cleared', NULL, 1, 'Bathroom', NULL, NULL, 'Active', 1, 2, '2023-06-17', '2023-06-17 18:53:58', '2023-06-17 19:10:34'),
(56, 1, 1, 61, 184, 'No', NULL, NULL, 1, 'Bathroom', NULL, NULL, 'Active', 1, 2, '2023-06-17', '2023-06-17 18:53:58', '2023-06-17 19:10:34'),
(57, 1, 1, 48, 145, 'No', 'Cleared', NULL, 9, 'Bathroom', NULL, NULL, 'Active', 1, 2, '2023-06-17', '2023-06-17 19:11:30', '2023-06-17 19:11:30'),
(58, 1, 1, 49, 148, 'No', NULL, NULL, 9, 'Bathroom', NULL, NULL, 'Active', 1, 2, '2023-06-17', '2023-06-17 19:11:31', '2023-06-17 19:11:31'),
(59, 1, 1, 51, 154, 'No', NULL, NULL, 9, 'Bathroom', NULL, NULL, 'Active', 1, 2, '2023-06-17', '2023-06-17 19:11:31', '2023-06-17 19:11:31'),
(60, 1, 1, 53, 160, 'No', NULL, NULL, 9, 'Bathroom', NULL, NULL, 'Active', 1, 2, '2023-06-17', '2023-06-17 19:11:31', '2023-06-17 19:11:31'),
(61, 1, 1, 56, 169, 'No', NULL, NULL, 9, 'Bathroom', NULL, NULL, 'Active', 1, 2, '2023-06-17', '2023-06-17 19:11:31', '2023-06-17 19:11:31'),
(62, 1, 1, 57, 172, 'No', NULL, NULL, 9, 'Bathroom', NULL, NULL, 'Active', 1, 2, '2023-06-17', '2023-06-17 19:11:31', '2023-06-17 19:11:31'),
(63, 1, 1, 60, 181, 'No', NULL, NULL, 9, 'Bathroom', NULL, NULL, 'Active', 1, 2, '2023-06-17', '2023-06-17 19:11:31', '2023-06-17 19:11:31'),
(64, 1, 1, 58, 175, 'No', NULL, NULL, 9, 'Bathroom', NULL, NULL, 'Active', 1, 2, '2023-06-17', '2023-06-17 19:11:31', '2023-06-17 19:11:31'),
(65, 1, 1, 61, 184, 'No', NULL, NULL, 9, 'Bathroom', NULL, NULL, 'Active', 1, 2, '2023-06-17', '2023-06-17 19:11:31', '2023-06-17 19:11:31'),
(66, 1, 1, 34, 104, 'Maintenance', 'Cleared', NULL, 6, 'Furniture', NULL, NULL, 'Active', 1, 5, '2023-06-19', '2023-06-19 12:45:52', '2023-06-19 12:45:52');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `metadata`
--

CREATE TABLE `metadata` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `metadata_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datatype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `statusx` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Inactive',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dataark for tabell `metadata`
--

INSERT INTO `metadata` (`id`, `metadata_name`, `datatype`, `status`, `statusx`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Name', 'input', 'Active', 'Inactive', 0, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(2, 'Brand Name', 'input', 'Active', 'Inactive', 0, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(3, 'Version', 'input', 'Active', 'Inactive', 0, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(4, 'Barcode', 'input', 'Active', 'Inactive', 0, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(5, 'Serial Number', 'input', 'Active', 'Inactive', 0, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(6, 'Tag Number', 'input', 'Active', 'Inactive', 0, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(7, 'Type', 'input', 'Active', 'Inactive', 0, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(8, 'Description', 'textarea', 'Active', 'Inactive', 0, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(9, 'Location', 'input', 'Active', 'Inactive', 0, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(10, 'jkl', 'input', 'Inactive', 'Inactive', 1, '2023-03-10 02:50:13', '2023-03-10 02:50:24');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `metanames`
--

CREATE TABLE `metanames` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `metaname_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metaname_description` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'stop',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dataark for tabell `metanames`
--

INSERT INTO `metanames` (`id`, `metaname_name`, `metaname_description`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Room', 'Room', 'Active', 1, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(2, 'Dinning Room', 'dinning room', 'Active', 1, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(3, 'Kitchen', 'Kitchen', 'Active', 1, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(4, 'Light', 'light', 'Active', 1, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(5, 'Swimming Pool', 'swimming pool', 'Active', 1, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(6, 'Garden', 'Garden', 'Active', 1, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(7, 'Store', 'Store', 'Active', 1, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(8, 'Garage', 'Garage', 'Active', 1, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(9, 'Fance', 'Fance', 'Active', 1, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(10, 'Entree', 'Entree', 'Active', 1, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(11, 'Bathroom', 'Bathroom', 'Active', 1, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(12, 'Toilet', 'Toilet', 'Active', 1, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(13, 'Furniture', 'Furniture', 'Active', 1, '2022-12-15 18:32:58', '2022-12-15 18:32:58');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `metaname_datatypes`
--

CREATE TABLE `metaname_datatypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `metaname_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metadata_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datatype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datatype_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dataark for tabell `metaname_datatypes`
--

INSERT INTO `metaname_datatypes` (`id`, `metaname_id`, `metadata_name`, `datatype`, `datatype_name`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1', 'Name', 'input', 'asset_name', 'Active', 1, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(2, '1', 'Description', 'textarea', 'asset_description', 'Active', 1, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(3, '2', 'Name', 'input', 'asset_name', 'Active', 1, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(4, '2', 'Description', 'textarea', 'asset_description', 'Active', 1, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(5, '3', 'Name', 'input', 'asset_name', 'Active', 1, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(6, '3', 'Description', 'textarea', 'asset_description', 'Active', 1, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(7, '4', 'Name', 'input', 'asset_name', 'Active', 1, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(8, '4', 'Description', 'textarea', 'asset_description', 'Active', 1, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(9, '5', 'Name', 'input', 'asset_name', 'Active', 1, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(10, '5', 'Description', 'textarea', 'asset_description', 'Active', 1, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(11, '6', 'Name', 'input', 'asset_name', 'Active', 1, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(12, '6', 'Description', 'textarea', 'asset_description', 'Active', 1, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(13, '7', 'Name', 'input', 'asset_name', 'Active', 1, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(14, '7', 'Description', 'textarea', 'asset_description', 'Active', 1, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(15, '8', 'Name', 'input', 'asset_name', 'Active', 1, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(16, '8', 'Description', 'textarea', 'asset_description', 'Active', 1, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(17, '9', 'Name', 'input', 'asset_name', 'Active', 1, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(18, '9', 'Description', 'textarea', 'asset_description', 'Active', 1, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(19, '10', 'Name', 'input', 'asset_name', 'Active', 1, '2023-01-17 07:15:33', '2023-01-17 07:15:33'),
(20, '10', 'Description', 'textarea', 'asset_description', 'Active', 1, '2023-01-17 07:15:33', '2023-01-17 07:15:33');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dataark for tabell `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_06_28_183926_create_permission_tables', 1),
(7, '2021_06_30_085227_create_warehouses_table', 1),
(8, '2021_06_30_085250_create_suppliers_table', 1),
(9, '2021_06_30_085300_create_stocks_table', 1),
(10, '2021_06_30_130240_create_customers_table', 1),
(11, '2021_06_30_141059_create_orders_table', 1),
(12, '2021_07_01_082350_create_order_items_table', 1),
(13, '2021_07_01_084817_create_stockings_table', 1),
(14, '2021_07_03_085912_create_sales_table', 1),
(15, '2021_07_03_140323_create_sessions_table', 1),
(16, '2021_07_05_131159_create_sub_stores_table', 1),
(17, '2021_07_09_124552_create_payments_table', 1),
(18, '2021_07_09_165459_create_purchases_table', 1),
(19, '2021_07_16_143331_create_purchase_orders_table', 1),
(20, '2021_07_16_175603_create_purchase_items_table', 1),
(21, '2021_07_20_154102_create_accounts_table', 1),
(22, '2021_07_21_163204_create_payment_categories_table', 1),
(23, '2021_07_21_165818_create_cash_ins_table', 1),
(24, '2021_07_23_172534_create_expense_categories_table', 1),
(25, '2021_07_23_183809_create_direct_expenses_table', 1),
(26, '2021_07_27_143817_create_supplier_accounts_table', 1),
(27, '2021_07_28_102946_create_customer_account_summaries_table', 1),
(28, '2021_07_28_192513_create_supplier_account_summaries_table', 1),
(29, '2021_09_05_141028_create_customer_wallets_table', 1),
(30, '2021_09_05_141041_create_supplier_wallets_table', 1),
(31, '2021_09_07_202550_create_customer_wallet_summuries_table', 1),
(32, '2021_09_07_202606_create_supplier_wallet_summuries_table', 1),
(33, '2021_11_10_220050_create_asset_values_table', 1),
(34, '2021_11_10_220151_create_liablity_values_table', 1),
(35, '2022_01_01_220945_create_rental_items_table', 1),
(36, '2022_01_01_221017_create_rentals_table', 1),
(37, '2022_01_01_221558_create_rental_orders_table', 1),
(38, '2022_01_01_221617_create_rental_order_items_table', 1),
(39, '2022_01_03_192231_create_my_companies_table', 1),
(40, '2022_01_03_193204_create_my_payments_table', 1),
(41, '2022_03_04_153123_create_pending_stocks_table', 1),
(42, '2022_04_14_132826_create_departments_table', 1),
(43, '2022_04_14_195447_create_properties_table', 1),
(44, '2022_04_16_183133_create_datatypes_table', 1),
(45, '2022_04_16_190935_create_metadata_table', 1),
(46, '2022_04_16_204544_create_metanames_table', 1),
(47, '2022_04_16_215036_create_metaname_datatypes_table', 1),
(48, '2022_04_18_174405_create_assets_table', 1),
(49, '2022_04_23_170409_create_qns_numbers_table', 1),
(50, '2022_04_23_170417_create_set_indicators_table', 1),
(51, '2022_04_23_170419_create_answer_desc_photos_table', 1),
(52, '2022_04_23_170419_create_answer_update_photos_table', 1),
(53, '2022_04_23_170419_create_answers_table', 1),
(54, '2022_04_23_170420_create_answer_check_boxes_table', 1),
(55, '2022_04_23_170420_create_optional_answers_table', 1),
(56, '2022_05_04_184641_create_activity_roles_table', 1),
(57, '2022_05_04_184641_create_department_roles_table', 1),
(58, '2022_05_04_184641_create_qns_appliedtos_table', 1),
(59, '2022_05_13_151407_create_user_registers_table', 1),
(60, '2022_05_22_115551_create_user_activities_table', 1),
(61, '2022_05_22_115552_create_user_properties_table', 1),
(62, '2022_05_22_115552_create_user_roles_table', 1),
(63, '2022_06_10_163515_create_report_tests_table', 1),
(64, '2022_06_15_125409_create_checklist_statuses_table', 1),
(65, '2022_06_21_153251_create_dynamic_ind_updates_table', 1),
(66, '2022_06_21_153252_create_key_indicators_table', 1);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dataark for tabell `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4),
(4, 'App\\Models\\User', 9),
(5, 'App\\Models\\User', 5),
(5, 'App\\Models\\User', 9),
(6, 'App\\Models\\User', 1),
(6, 'App\\Models\\User', 6),
(7, 'App\\Models\\User', 7),
(8, 'App\\Models\\User', 8),
(9, 'App\\Models\\User', 1),
(10, 'App\\Models\\User', 11),
(11, 'App\\Models\\User', 12);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `my_companies`
--

CREATE TABLE `my_companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vrn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` int(10) UNSIGNED NOT NULL,
  `email` varchar(48) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dataark for tabell `my_companies`
--

INSERT INTO `my_companies` (`id`, `company_name`, `tin`, `vrn`, `logo`, `address`, `phone_number`, `email`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Hakuna Matata', NULL, NULL, 'hakuna matata_1673590148.jpeg', NULL, 0, 'grace@hakunamatatabookings.co.tz', 'Active', '0000-00-00', '2023-01-13 06:09:09', '2023-03-28 16:36:20');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `my_payments`
--

CREATE TABLE `my_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_number` int(10) UNSIGNED NOT NULL,
  `my_id` int(10) UNSIGNED NOT NULL,
  `package_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_paid` int(10) UNSIGNED NOT NULL,
  `end_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_via` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `optional_answers`
--

CREATE TABLE `optional_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `indicator_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer_classification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datatype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dataark for tabell `optional_answers`
--

INSERT INTO `optional_answers` (`id`, `indicator_id`, `answer`, `answer_classification`, `datatype`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1', 'Yes', 'Good', 'radio', 'Active', 1, '2022-12-15 18:44:41', '2022-12-15 18:44:41'),
(2, '1', 'No', 'Bad', 'radio', 'Active', 1, '2022-12-15 18:44:41', '2022-12-15 18:44:41'),
(3, '1', 'NA', 'Good', 'radio', 'Active', 1, '2022-12-15 18:44:41', '2022-12-15 18:44:41'),
(4, '1', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2022-12-15 18:44:41', '2022-12-15 18:44:41'),
(5, '2', 'Yes', 'Good', 'radio', 'Active', 1, '2022-12-15 19:48:57', '2022-12-15 19:48:57'),
(6, '2', 'No', 'Bad', 'radio', 'Active', 1, '2022-12-15 19:48:57', '2022-12-15 19:48:57'),
(7, '2', 'NA', 'Good', 'radio', 'Active', 1, '2022-12-15 19:48:57', '2022-12-15 19:48:57'),
(8, '2', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2022-12-15 19:48:57', '2022-12-15 19:48:57'),
(9, '3', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-09 19:03:19', '2023-01-09 19:03:19'),
(10, '3', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-09 19:03:19', '2023-01-09 19:03:19'),
(11, '3', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-09 19:03:19', '2023-01-09 19:03:19'),
(12, '3', 'Nop', 'Critical', 'radio', 'Active', 1, '2023-01-09 19:03:20', '2023-01-09 19:03:20'),
(13, '4', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-16 09:51:03', '2023-01-16 09:51:03'),
(14, '4', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-16 09:51:03', '2023-01-16 09:51:03'),
(15, '4', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-16 09:51:03', '2023-01-16 09:51:03'),
(16, '5', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-16 09:57:27', '2023-01-16 09:57:27'),
(17, '5', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-16 09:57:27', '2023-01-16 09:57:27'),
(18, '5', 'No sheet', 'Critical', 'radio', 'Active', 1, '2023-01-16 09:57:27', '2023-01-16 09:57:27'),
(19, '6', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-16 10:12:34', '2023-01-16 10:12:34'),
(20, '6', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-16 10:12:34', '2023-01-16 10:12:34'),
(21, '6', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-16 10:12:34', '2023-01-16 10:12:34'),
(22, '7', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-16 13:04:34', '2023-01-16 13:04:34'),
(23, '7', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-16 13:04:34', '2023-01-16 13:04:34'),
(24, '7', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-16 13:04:34', '2023-01-16 13:04:34'),
(25, '8', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-16 13:08:38', '2023-01-16 13:08:38'),
(26, '8', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-16 13:08:38', '2023-01-16 13:08:38'),
(27, '8', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-16 13:08:38', '2023-01-16 13:08:38'),
(28, '9', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-16 13:09:41', '2023-01-16 13:09:41'),
(29, '9', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-16 13:09:41', '2023-01-16 13:09:41'),
(30, '9', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-16 13:09:41', '2023-01-16 13:09:41'),
(31, '10', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-16 13:10:56', '2023-01-16 13:10:56'),
(32, '10', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-16 13:10:57', '2023-01-16 13:10:57'),
(33, '10', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-16 13:10:57', '2023-01-16 13:10:57'),
(34, '11', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-16 13:12:09', '2023-01-16 13:12:09'),
(35, '11', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-16 13:12:09', '2023-01-16 13:12:09'),
(36, '11', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-16 13:12:09', '2023-01-16 13:12:09'),
(37, '12', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-16 13:17:20', '2023-01-16 13:17:20'),
(38, '12', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-16 13:17:20', '2023-01-16 13:17:20'),
(39, '12', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-16 13:17:20', '2023-01-16 13:17:20'),
(40, '13', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-17 06:30:46', '2023-01-17 06:30:46'),
(41, '13', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-17 06:30:46', '2023-01-17 06:30:46'),
(42, '13', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-17 06:30:46', '2023-01-17 06:30:46'),
(43, '14', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-17 06:36:59', '2023-01-17 06:36:59'),
(44, '14', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-17 06:36:59', '2023-01-17 06:36:59'),
(45, '14', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-17 06:36:59', '2023-01-17 06:36:59'),
(46, '15', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-17 06:39:04', '2023-01-17 06:39:04'),
(47, '15', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-17 06:39:04', '2023-01-17 06:39:04'),
(48, '15', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-17 06:39:04', '2023-01-17 06:39:04'),
(49, '16', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-17 06:40:17', '2023-01-17 06:40:17'),
(50, '16', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-17 06:40:17', '2023-01-17 06:40:17'),
(51, '16', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-17 06:40:17', '2023-01-17 06:40:17'),
(52, '17', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-17 06:40:55', '2023-01-17 06:40:55'),
(53, '17', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-17 06:40:55', '2023-01-17 06:40:55'),
(54, '17', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-17 06:40:55', '2023-01-17 06:40:55'),
(55, '18', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-17 06:58:42', '2023-01-17 06:58:42'),
(56, '18', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-17 06:58:42', '2023-01-17 06:58:42'),
(57, '18', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-17 06:58:42', '2023-01-17 06:58:42'),
(58, '19', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-17 07:23:04', '2023-01-17 07:23:04'),
(59, '19', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-17 07:23:04', '2023-01-17 07:23:04'),
(60, '19', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-17 07:23:04', '2023-01-17 07:23:04'),
(61, '20', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-17 07:27:50', '2023-01-17 07:27:50'),
(62, '20', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-17 07:27:50', '2023-01-17 07:27:50'),
(63, '20', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-17 07:27:50', '2023-01-17 07:27:50'),
(64, '21', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-17 07:28:47', '2023-01-17 07:28:47'),
(65, '21', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-17 07:28:47', '2023-01-17 07:28:47'),
(66, '21', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-17 07:28:47', '2023-01-17 07:28:47'),
(67, '22', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-17 07:35:23', '2023-01-17 07:35:23'),
(68, '22', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-17 07:35:23', '2023-01-17 07:35:23'),
(69, '22', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-17 07:35:23', '2023-01-17 07:35:23'),
(70, '23', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-17 07:36:14', '2023-01-17 07:36:14'),
(71, '23', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-17 07:36:14', '2023-01-17 07:36:14'),
(72, '23', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-17 07:36:14', '2023-01-17 07:36:14'),
(73, '24', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-17 07:39:21', '2023-01-17 07:39:21'),
(74, '24', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-17 07:39:21', '2023-01-17 07:39:21'),
(75, '24', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-17 07:39:21', '2023-01-17 07:39:21'),
(76, '25', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-17 08:08:49', '2023-01-17 08:08:49'),
(77, '25', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-17 08:08:49', '2023-01-17 08:08:49'),
(78, '26', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 07:30:10', '2023-01-18 07:30:10'),
(79, '26', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 07:30:11', '2023-01-18 07:30:11'),
(80, '26', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 07:30:11', '2023-01-18 07:30:11'),
(81, '27', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 07:31:08', '2023-01-18 07:31:08'),
(82, '27', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 07:31:08', '2023-01-18 07:31:08'),
(83, '27', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 07:31:08', '2023-01-18 07:31:08'),
(84, '28', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 07:32:42', '2023-01-18 07:32:42'),
(85, '28', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 07:32:42', '2023-01-18 07:32:42'),
(86, '28', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 07:32:42', '2023-01-18 07:32:42'),
(87, '29', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 07:33:31', '2023-01-18 07:33:31'),
(88, '29', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 07:33:31', '2023-01-18 07:33:31'),
(89, '29', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 07:33:31', '2023-01-18 07:33:31'),
(90, '30', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 07:34:12', '2023-01-18 07:34:12'),
(91, '30', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 07:34:12', '2023-01-18 07:34:12'),
(92, '30', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 07:34:12', '2023-01-18 07:34:12'),
(93, '31', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 07:35:09', '2023-01-18 07:35:09'),
(94, '31', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 07:35:09', '2023-01-18 07:35:09'),
(95, '31', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 07:35:09', '2023-01-18 07:35:09'),
(96, '32', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 07:36:10', '2023-01-18 07:36:10'),
(97, '32', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 07:36:10', '2023-01-18 07:36:10'),
(98, '32', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 07:36:10', '2023-01-18 07:36:10'),
(99, '33', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 07:37:31', '2023-01-18 07:37:31'),
(100, '33', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 07:37:31', '2023-01-18 07:37:31'),
(101, '33', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 07:37:31', '2023-01-18 07:37:31'),
(102, '34', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 07:38:09', '2023-01-18 07:38:09'),
(103, '34', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 07:38:09', '2023-01-18 07:38:09'),
(104, '34', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 07:38:10', '2023-01-18 07:38:10'),
(105, '35', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 07:38:58', '2023-01-18 07:38:58'),
(106, '35', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 07:38:58', '2023-01-18 07:38:58'),
(107, '35', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 07:38:58', '2023-01-18 07:38:58'),
(108, '36', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 07:40:08', '2023-01-18 07:40:08'),
(109, '36', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 07:40:08', '2023-01-18 07:40:08'),
(110, '36', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 07:40:08', '2023-01-18 07:40:08'),
(111, '37', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 07:40:43', '2023-01-18 07:40:43'),
(112, '37', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 07:40:43', '2023-01-18 07:40:43'),
(113, '37', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 07:40:43', '2023-01-18 07:40:43'),
(114, '38', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 07:41:59', '2023-01-18 07:41:59'),
(115, '38', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 07:41:59', '2023-01-18 07:41:59'),
(116, '38', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 07:41:59', '2023-01-18 07:41:59'),
(117, '39', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 07:42:31', '2023-01-18 07:42:31'),
(118, '39', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 07:42:31', '2023-01-18 07:42:31'),
(119, '39', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 07:42:31', '2023-01-18 07:42:31'),
(120, '40', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 07:43:21', '2023-01-18 07:43:21'),
(121, '40', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 07:43:21', '2023-01-18 07:43:21'),
(122, '40', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 07:43:21', '2023-01-18 07:43:21'),
(123, '41', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 07:44:22', '2023-01-18 07:44:22'),
(124, '41', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 07:44:23', '2023-01-18 07:44:23'),
(125, '41', 'NA', 'NA', 'radio', 'Active', 1, '2023-01-18 07:44:23', '2023-01-18 07:44:23'),
(126, '42', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 07:45:20', '2023-01-18 07:45:20'),
(127, '42', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 07:45:20', '2023-01-18 07:45:20'),
(128, '42', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 07:45:20', '2023-01-18 07:45:20'),
(129, '43', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 07:46:08', '2023-01-18 07:46:08'),
(130, '43', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 07:46:09', '2023-01-18 07:46:09'),
(131, '43', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 07:46:09', '2023-01-18 07:46:09'),
(132, '44', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 07:46:48', '2023-01-18 07:46:48'),
(133, '44', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 07:46:48', '2023-01-18 07:46:48'),
(134, '44', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 07:46:48', '2023-01-18 07:46:48'),
(135, '45', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 07:48:20', '2023-01-18 07:48:20'),
(136, '45', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 07:48:20', '2023-01-18 07:48:20'),
(137, '45', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 07:48:20', '2023-01-18 07:48:20'),
(138, '46', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 07:49:02', '2023-01-18 07:49:02'),
(139, '46', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 07:49:02', '2023-01-18 07:49:02'),
(140, '46', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 07:49:02', '2023-01-18 07:49:02'),
(141, '47', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 07:49:42', '2023-01-18 07:49:42'),
(142, '47', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 07:49:43', '2023-01-18 07:49:43'),
(143, '47', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 07:49:43', '2023-01-18 07:49:43'),
(144, '48', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 08:01:35', '2023-01-25 09:59:50'),
(145, '48', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 08:01:35', '2023-01-25 09:59:50'),
(146, '48', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 08:01:35', '2023-01-25 09:59:50'),
(147, '49', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 08:09:12', '2023-01-18 08:09:12'),
(148, '49', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 08:09:12', '2023-01-18 08:09:12'),
(149, '49', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 08:09:12', '2023-01-18 08:09:12'),
(150, '50', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 08:09:54', '2023-01-18 08:09:54'),
(151, '50', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 08:09:54', '2023-01-18 08:09:54'),
(152, '50', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 08:09:54', '2023-01-18 08:09:54'),
(153, '51', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 08:10:56', '2023-01-18 08:10:56'),
(154, '51', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 08:10:56', '2023-01-18 08:10:56'),
(155, '51', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 08:10:56', '2023-01-18 08:10:56'),
(156, '52', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 08:11:45', '2023-01-18 08:11:45'),
(157, '52', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 08:11:45', '2023-01-18 08:11:45'),
(158, '52', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 08:11:45', '2023-01-18 08:11:45'),
(159, '53', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 08:12:27', '2023-01-18 08:12:27'),
(160, '53', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 08:12:28', '2023-01-18 08:12:28'),
(161, '53', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 08:12:28', '2023-01-18 08:12:28'),
(162, '54', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 08:13:11', '2023-01-18 08:13:11'),
(163, '54', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 08:13:11', '2023-01-18 08:13:11'),
(164, '54', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 08:13:11', '2023-01-18 08:13:11'),
(165, '55', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 08:14:47', '2023-01-18 08:14:47'),
(166, '55', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 08:14:47', '2023-01-18 08:14:47'),
(167, '55', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 08:14:47', '2023-01-18 08:14:47'),
(168, '56', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 08:15:37', '2023-01-18 08:15:37'),
(169, '56', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 08:15:37', '2023-01-18 08:15:37'),
(170, '56', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 08:15:37', '2023-01-18 08:15:37'),
(171, '57', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 08:24:01', '2023-01-18 08:24:01'),
(172, '57', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 08:24:01', '2023-01-18 08:24:01'),
(173, '57', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 08:24:01', '2023-01-18 08:24:01'),
(174, '58', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 08:26:01', '2023-01-18 08:26:01'),
(175, '58', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 08:26:01', '2023-01-18 08:26:01'),
(176, '58', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 08:26:01', '2023-01-18 08:26:01'),
(177, '59', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 08:27:03', '2023-01-18 08:27:03'),
(178, '59', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 08:27:03', '2023-01-18 08:27:03'),
(179, '59', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 08:27:03', '2023-01-18 08:27:03'),
(180, '60', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 08:28:03', '2023-01-25 09:19:45'),
(181, '60', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 08:28:04', '2023-01-25 09:19:45'),
(182, '60', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 08:28:04', '2023-01-25 09:19:45'),
(183, '61', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 08:31:14', '2023-01-18 08:31:14'),
(184, '61', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 08:31:14', '2023-01-18 08:31:14'),
(185, '61', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 08:31:14', '2023-01-18 08:31:14'),
(186, '62', 'Yes', 'Good', 'radio', 'Active', 1, '2023-01-18 08:31:50', '2023-01-25 09:52:57'),
(187, '62', 'No', 'Bad', 'radio', 'Active', 1, '2023-01-18 08:31:50', '2023-01-25 09:52:57'),
(188, '62', 'Maintenance', 'Maintenance', 'radio', 'Active', 1, '2023-01-18 08:31:50', '2023-01-25 09:52:57'),
(189, '63', 'Constance Greer', 'Maintenance', 'checkbox', 'Active', 1, '2023-03-24 06:34:27', '2023-03-24 06:34:27'),
(190, '63', 'Morgan Davis', 'Critical', 'checkbox', 'Active', 1, '2023-03-24 06:34:27', '2023-03-24 06:34:27'),
(191, '63', 'Josiah Stephenson', 'Good', 'checkbox', 'Active', 1, '2023-03-24 06:34:27', '2023-03-24 06:34:27'),
(192, '63', 'cr', 'Critical', 'checkbox', 'Active', 1, '2023-03-24 06:34:27', '2023-03-24 06:34:27'),
(193, '64', 'here', 'Good', 'radio', 'Active', 1, '2023-03-24 06:36:11', '2023-03-24 06:36:11'),
(194, '64', 'maint', 'Maintenance', 'radio', 'Active', 1, '2023-03-24 06:36:12', '2023-03-24 06:36:12'),
(195, '64', 'dd', 'Bad', 'radio', 'Active', 1, '2023-03-24 06:36:12', '2023-03-24 06:36:12'),
(196, '64', 'ff', 'Critical', 'radio', 'Active', 1, '2023-03-24 06:36:12', '2023-03-24 06:36:12'),
(197, '65', 'yes', 'Good', 'radio', 'Active', 1, '2023-06-07 12:35:09', '2023-06-07 12:35:09'),
(198, '65', 'no', 'Maintenance-critical', 'radio', 'Active', 1, '2023-06-07 12:35:09', '2023-06-07 12:35:09');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `warehouse_id` int(10) UNSIGNED NOT NULL,
  `discount` int(11) NOT NULL DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `width` decimal(10,2) UNSIGNED NOT NULL,
  `height` decimal(10,2) UNSIGNED NOT NULL,
  `qty` decimal(10,2) UNSIGNED NOT NULL,
  `buying_price` int(10) UNSIGNED NOT NULL,
  `selling_price` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dataark for tabell `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('superadmin@hakunamatatabookings.co.tz', 'TYfWIp8Tkes4vFIjZ0GV7U573gZBH4uAyFI2DxZs62NobFOC3k6eisYTD4m2K6Fs', '2023-02-22 20:37:37'),
('superadmin@hakunamatatabookings.co.tz', '18mN44R2IJaPx2VG0EVr7mAL1ULf8rzUGMGUgROMXzX2TIJyeySJ9OvTlLYpsCHo', '2023-02-23 17:16:57');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `paid` int(10) UNSIGNED NOT NULL,
  `wallet` decimal(8,2) NOT NULL DEFAULT 0.00,
  `balance` int(10) UNSIGNED NOT NULL,
  `receipt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `payment_categories`
--

CREATE TABLE `payment_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `pending_stocks`
--

CREATE TABLE `pending_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `trans_no` int(10) UNSIGNED NOT NULL,
  `from_store` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Qty_issued` decimal(8,2) DEFAULT NULL,
  `to_store` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Qty_received` decimal(8,2) DEFAULT NULL,
  `trans_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `personal_access_tokens`
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
-- Tabellstruktur for tabell `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_rank` int(10) UNSIGNED NOT NULL,
  `room_no` int(10) UNSIGNED NOT NULL,
  `location_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dataark for tabell `properties`
--

INSERT INTO `properties` (`id`, `property_name`, `property_category`, `property_rank`, `room_no`, `location_name`, `phone`, `email`, `property_description`, `photo`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Manyara best view', 'Hotel', 4, 10, 'Manyara', '00000', 'superadmin@hakunamatatabookings.co.tz', NULL, 'Logo_BVL_Groot_CMYK-300x252_1671129291.png', 'Active', 1, '2022-12-15 18:34:51', '2022-12-15 18:34:52'),
(2, 'Zanzibar hotel', 'Hotel', 4, 14, 'Zanzibar', '0764898989', NULL, NULL, NULL, 'Active', 1, '2023-02-17 11:52:54', '2023-06-06 12:47:05');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` int(10) UNSIGNED NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `paid` int(10) UNSIGNED NOT NULL,
  `balance` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `purchase_items`
--

CREATE TABLE `purchase_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `width` decimal(10,2) UNSIGNED NOT NULL,
  `height` decimal(10,2) UNSIGNED NOT NULL,
  `qty` decimal(10,3) UNSIGNED NOT NULL,
  `buying_price` decimal(10,2) UNSIGNED NOT NULL,
  `cost` decimal(12,2) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `purchase_orders`
--

CREATE TABLE `purchase_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `warehouse_id` int(10) UNSIGNED NOT NULL,
  `discount` int(11) NOT NULL DEFAULT 0,
  `amount` int(11) NOT NULL DEFAULT 0,
  `paid` int(11) NOT NULL DEFAULT 0,
  `balance` int(11) NOT NULL DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `qns_appliedtos`
--

CREATE TABLE `qns_appliedtos` (
  `id` bigint(20) NOT NULL,
  `metaname_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indicator_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `user_id` int(10) UNSIGNED NOT NULL,
  `col12` tinyint(1) NOT NULL DEFAULT 0,
  `col5` tinyint(1) NOT NULL DEFAULT 0,
  `col11` tinyint(1) NOT NULL DEFAULT 0,
  `col3` tinyint(1) NOT NULL DEFAULT 0,
  `col10` tinyint(1) NOT NULL DEFAULT 0,
  `col` tinyint(1) NOT NULL DEFAULT 0,
  `col9` tinyint(1) NOT NULL DEFAULT 0,
  `col2` tinyint(1) NOT NULL DEFAULT 0,
  `col4` tinyint(1) NOT NULL DEFAULT 0,
  `col1` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dataark for tabell `qns_appliedtos`
--

INSERT INTO `qns_appliedtos` (`id`, `metaname_id`, `indicator_id`, `section`, `department_id`, `status`, `user_id`, `col12`, `col5`, `col11`, `col3`, `col10`, `col`, `col9`, `col2`, `col4`, `col1`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 'Room', 7, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, '2022-12-15 18:44:41', '2023-02-21 18:54:27'),
(2, '2', '1', 'Room', 7, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, '2022-12-15 19:13:15', '2023-02-21 18:54:14'),
(3, '1', '2', 'Room', 7, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, '2022-12-15 19:48:57', '2023-02-21 18:53:51'),
(4, '1', '3', 'Room', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-09 19:03:19', '2023-02-21 18:53:29'),
(5, '1', '4', 'Room', 7, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-16 09:51:03', '2023-02-21 18:53:05'),
(6, '1', '5', 'Room', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-16 09:57:27', '2023-02-21 18:52:34'),
(7, '1', '6', 'Room', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-16 10:12:34', '2023-02-21 18:52:12'),
(8, '1', '7', 'Room', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-16 13:04:34', '2023-02-21 18:51:56'),
(9, '1', '8', 'Room', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-16 13:08:38', '2023-02-21 18:51:40'),
(10, '1', '9', 'Room', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-16 13:09:41', '2023-02-21 18:51:27'),
(11, '1', '10', 'Room', 7, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-16 13:10:56', '2023-02-21 18:51:11'),
(12, '1', '11', 'Room', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-16 13:12:09', '2023-02-21 18:50:55'),
(13, '1', '12', 'Bed', 7, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-16 13:17:20', '2023-02-21 18:50:37'),
(14, '1', '13', 'Bed', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-17 06:30:46', '2023-02-21 18:49:19'),
(15, '1', '14', 'Bed', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-17 06:36:59', '2023-02-21 18:01:21'),
(16, '1', '15', 'Bed', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-17 06:39:04', '2023-02-21 18:00:51'),
(17, '1', '16', 'Bed', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-17 06:40:17', '2023-02-21 18:01:47'),
(18, '1', '17', 'Bed', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-17 06:40:55', '2023-02-21 18:08:28'),
(19, '10', '18', 'Entree', 7, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-17 06:58:42', '2023-02-21 18:00:21'),
(20, '10', '19', 'Entree', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-17 07:23:04', '2023-02-21 18:02:57'),
(21, '10', '20', 'Entree', 7, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-17 07:27:50', '2023-02-21 18:07:43'),
(22, '10', '21', 'Entree', 7, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-17 07:28:47', '2023-02-21 17:59:34'),
(23, '10', '22', 'Entree', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-17 07:35:23', '2023-02-21 18:02:25'),
(24, '10', '23', 'Entree', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-17 07:36:14', '2023-02-21 18:07:26'),
(25, '10', '24', 'Entree', 7, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-17 07:39:21', '2023-02-21 17:53:31'),
(26, '1', '25', 'Bed', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-17 08:08:49', '2023-02-21 17:53:15'),
(27, '1', '26', 'Closet', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 07:30:10', '2023-02-21 17:57:34'),
(28, '1', '27', 'Closet', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 07:31:08', '2023-02-21 17:58:24'),
(29, '1', '28', 'Closet', 7, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 07:32:42', '2023-02-21 17:52:56'),
(30, '1', '29', 'Closet', 7, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 07:33:31', '2023-02-21 17:55:40'),
(31, '1', '30', 'Closet', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 07:34:12', '2023-02-21 17:55:12'),
(32, '1', '31', 'Closet', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 07:35:09', '2023-02-21 17:58:01'),
(33, '1', '32', 'Closet', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 07:36:10', '2023-02-21 17:57:16'),
(34, '1', '33', 'Furniture', 7, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 07:37:31', '2023-02-21 17:59:00'),
(35, '1', '34', 'Furniture', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 07:38:09', '2023-02-21 17:50:43'),
(36, '1', '35', 'Furniture', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 07:38:58', '2023-02-21 17:50:27'),
(37, '1', '36', 'Furniture', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 07:40:08', '2023-02-21 17:50:07'),
(38, '1', '37', 'Furniture', 7, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 07:40:43', '2023-02-21 17:49:51'),
(39, '1', '38', 'Furniture', 7, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 07:41:59', '2023-02-21 17:49:28'),
(40, '1', '39', 'Furniture', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 07:42:31', '2023-02-21 17:49:11'),
(41, '1', '40', 'Furniture', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 07:43:21', '2023-02-21 17:47:25'),
(42, '1', '41', 'Furniture', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 07:44:23', '2023-02-21 17:48:40'),
(43, '1', '42', 'Toilet', 7, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 07:45:20', '2023-02-21 17:51:37'),
(44, '1', '43', 'Toilet', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 07:46:09', '2023-02-21 17:48:02'),
(45, '1', '44', 'Toilet', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 07:46:48', '2023-02-21 17:45:42'),
(46, '1', '45', 'Toilet', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 07:48:20', '2023-02-21 17:44:36'),
(47, '1', '46', 'Toilet', 2, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 07:49:02', '2023-02-19 19:28:31'),
(48, '1', '47', 'Toilet', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 07:49:43', '2023-02-21 17:44:15'),
(49, '1', '48', 'Bathroom', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 08:01:35', '2023-02-21 17:43:19'),
(50, '1', '49', 'Bathroom', 7, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 08:09:12', '2023-02-21 17:42:50'),
(51, '1', '50', 'Bathroom', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 08:09:54', '2023-02-21 17:42:28'),
(52, '1', '51', 'Bathroom', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 08:10:56', '2023-02-21 17:42:03'),
(53, '1', '52', 'Bathroom', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 08:11:45', '2023-02-21 17:41:05'),
(54, '1', '53', 'Bathroom', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 08:12:28', '2023-02-21 17:40:41'),
(55, '1', '54', 'Bathroom', 7, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 08:13:11', '2023-02-21 17:36:05'),
(56, '1', '55', 'Bathroom', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 08:14:47', '2023-02-21 17:36:30'),
(57, '1', '56', 'Bathroom', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 08:15:37', '2023-02-21 17:37:27'),
(58, '1', '57', 'Bathroom', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 08:24:01', '2023-02-21 17:37:56'),
(59, '1', '58', 'Bathroom', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 08:26:01', '2023-02-21 17:38:25'),
(60, '1', '59', 'Bathroom', 7, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 08:27:03', '2023-02-21 17:39:19'),
(61, '1', '60', 'Bathroom', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 08:28:04', '2023-02-21 17:34:26'),
(62, '1', '61', 'Bathroom', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 08:31:14', '2023-02-21 17:33:52'),
(63, '1', '62', 'Bathroom', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-01-18 08:31:50', '2023-02-21 17:23:46'),
(64, '1', '61', 'Bathroom', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-02-19 08:06:53', '2023-02-21 17:23:02'),
(65, '3', '63', 'Toilet', NULL, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-03-24 06:34:27', '2023-03-24 06:34:27'),
(66, '1', '64', 'Bathroom', NULL, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-03-24 06:36:11', '2023-03-24 06:36:11'),
(67, '1', '63', NULL, NULL, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-03-24 06:37:46', '2023-03-24 06:37:46'),
(68, '4', '7', NULL, NULL, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-06-07 12:18:53', '2023-06-07 12:18:53'),
(69, '4', '8', NULL, NULL, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-06-07 12:18:53', '2023-06-07 12:18:53');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `qns_appliedtosxxxx`
--

CREATE TABLE `qns_appliedtosxxxx` (
  `id` bigint(20) NOT NULL,
  `metaname_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indicator_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `user_id` int(10) UNSIGNED NOT NULL,
  `col5` tinyint(1) NOT NULL DEFAULT 0,
  `col11` tinyint(1) NOT NULL DEFAULT 0,
  `col3` tinyint(1) NOT NULL DEFAULT 0,
  `col10` tinyint(1) NOT NULL DEFAULT 0,
  `col` tinyint(1) NOT NULL DEFAULT 0,
  `col9` tinyint(1) NOT NULL DEFAULT 0,
  `col2` tinyint(1) NOT NULL DEFAULT 0,
  `col4` tinyint(1) NOT NULL DEFAULT 0,
  `col1` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dataark for tabell `qns_appliedtosxxxx`
--

INSERT INTO `qns_appliedtosxxxx` (`id`, `metaname_id`, `indicator_id`, `section`, `department_id`, `status`, `user_id`, `col5`, `col11`, `col3`, `col10`, `col`, `col9`, `col2`, `col4`, `col1`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 'Room', 5, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, '2023-06-07 13:33:10', '2023-06-07 13:33:10'),
(2, '1', '2', 'Bathroom', NULL, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-06-07 13:33:10', '2023-06-07 13:33:10'),
(3, '1', '4', 'Bathroom', NULL, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-06-07 13:33:10', '2023-06-07 13:33:10'),
(4, '1', '5', 'Bathroom', NULL, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-06-07 13:33:10', '2023-06-07 13:33:10'),
(5, '1', '14', 'Bathroom', NULL, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-06-07 13:33:10', '2023-06-07 13:33:10'),
(6, '1', '15', 'Bathroom', NULL, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-06-07 13:33:10', '2023-06-07 13:33:10'),
(7, '1', '11', 'Bathroom', NULL, 'Active', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-06-07 19:23:32', '2023-06-07 19:23:32');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `qns_numbers`
--

CREATE TABLE `qns_numbers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `qns_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datatype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metaname_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_serial_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_barcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_tag_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `rentals`
--

CREATE TABLE `rentals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `paid` int(10) UNSIGNED NOT NULL,
  `balance` int(10) UNSIGNED NOT NULL,
  `wallet` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `rental_items`
--

CREATE TABLE `rental_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `item` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fee` int(10) UNSIGNED NOT NULL,
  `descriptions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `rental_orders`
--

CREATE TABLE `rental_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `rental_order_items`
--

CREATE TABLE `rental_order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `fee` int(10) UNSIGNED NOT NULL,
  `days` int(10) UNSIGNED NOT NULL,
  `total_fee` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `report_tests`
--

CREATE TABLE `report_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dataark for tabell `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'web', 'Active', NULL, '2022-12-15 18:32:57', '2022-12-15 18:32:57'),
(2, 'GeneralAdmin', 'web', 'Active', NULL, '2022-12-15 18:32:57', '2022-12-15 18:32:57'),
(3, 'Admin', 'web', 'Active', NULL, '2022-12-15 18:32:57', '2022-12-15 18:32:57'),
(4, 'GeneralManager', 'web', 'Active', NULL, '2022-12-15 18:32:57', '2022-12-15 18:32:57'),
(5, 'Manager', 'web', 'Active', NULL, '2022-12-15 18:32:57', '2022-12-15 18:32:57'),
(6, 'Account', 'web', 'Active', NULL, '2022-12-15 18:32:57', '2022-12-15 18:32:57'),
(7, 'Store', 'web', 'Active', NULL, '2022-12-15 18:32:57', '2022-12-15 18:32:57'),
(8, 'User', 'web', 'Active', NULL, '2022-12-15 18:32:57', '2022-12-15 18:32:57'),
(9, 'No role', 'web', 'Active', NULL, NULL, NULL),
(10, 'HouseKeeper', 'web', 'Active', 1, '2023-04-30 12:04:01', '2023-04-30 12:04:01'),
(11, 'Maintenancier', 'web', 'Active', 1, '2023-06-14 05:25:50', '2023-06-14 05:25:50');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `discount` int(10) UNSIGNED NOT NULL,
  `vat` int(10) UNSIGNED NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `paid` int(10) UNSIGNED NOT NULL,
  `wallet` decimal(8,2) NOT NULL DEFAULT 0.00,
  `balance` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dataark for tabell `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1U01Ewei6CKXPOOHmAHHre4529T4UHVIRxla82fB', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiWFdTOVhUTGtaVXBWUGdpb1padjFBZkRyOWJIUWx2eml2ajJvVWE2TCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ3OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvZGFzaGJvYXJkLWNoZWNrbGlzdC9zdy5qcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCQ5MnIxYWc2eFVIdmxuajczcFZVL2ouaGZHRTFnOVdzWmJKei5yM0thVkxZQndHMkNiWFFpVyI7fQ==', 1687107473),
('6JwTCVgTsu4JLFrItOi2kwcEwZXk8X1GS3LkvsrW', 12, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36 OPR/99.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiMkRXYzZhTjhpeGxEbUpPdkZOUHViVzJxQWg2cDUxQW1sUXJNajl4cSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ3OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvbWFuYWdlcnMtaW5zcGVjdGlvbi9zdy5qcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEyO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkL25jSnlpbmR3Uy9aakxXQndFQVBKT2dxRUJzTG5BVFpEYUtCYVltYWlHbDVJTzYvTmQ0ZWEiO30=', 1687029108),
('GxWDFiJK2CkbXYX02tRYiZRSjamfJUxZJU2o6pgF', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiMkl1NXpzRU5IODdxNTZlSmt5OUQ5UlpCVWUyak00MHpmclR5c0lGayI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ3OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvbWFuYWdlcnMtaW5zcGVjdGlvbi9zdy5qcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCQ5MnIxYWc2eFVIdmxuajczcFZVL2ouaGZHRTFnOVdzWmJKei5yM0thVkxZQndHMkNiWFFpVyI7fQ==', 1687029100),
('jWfQLYzxEcNH0xoqqa49Hth8M1vt3DyYz6eardUl', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36 OPR/99.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNHhTaGFDc0JuaTFlajVvcFpaS0pRUzJFbjlhU1h3NEROTG1EdmtUQSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo1MDoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL21hbmFnZXJzLWluc3BlY3Rpb24vJTdCaWQlN0QiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNzoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1687093584),
('KxJJgeZ7dNoB1kI9scP7h79nIjUSKoaxlX759F7r', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36 OPR/99.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiNWc4ZUZkQ1JwTVZwWUE0NUc5OVFRRW1GV0FQbzZVQVpmNzZTckZobSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ3OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvbWFuYWdlcnMtaW5zcGVjdGlvbi9zdy5qcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjU7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRRZWZLSktPY0VGWW94VG9BdFRXM0d1aFoxYTBhbC5iamJlbHgxaUc3dFNXbzdhQ1VGc3dlcSI7fQ==', 1687178761),
('LcDmb1u2VdV1NAeol21HUqbXoxDa95CfHQj1AaM2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZXFHdDh2UzdxOUFLTmxCeWZFWnVVNlN4TDk2ZEl3Y3lKQ2Y0YkhTMSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMToiaHR0cDovL2xvY2FsaG9zdDo4MDAwIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fX0=', 1687107271),
('WRXqltiGGz9vMhABH3brL4g7H6yzio2ls6Nf7jDA', 12, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiRW9jc2xFZk5BejBFOEx3YUV5bWo1cXhoY2FldVpFT3BHcWRxenZpRiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ3OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvbWFuYWdlcnMtaW5zcGVjdGlvbi9zdy5qcyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEyO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkL25jSnlpbmR3Uy9aakxXQndFQVBKT2dxRUJzTG5BVFpEYUtCYVltYWlHbDVJTzYvTmQ0ZWEiO30=', 1687179627);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `set_indicators`
--

CREATE TABLE `set_indicators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `qns` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dataark for tabell `set_indicators`
--

INSERT INTO `set_indicators` (`id`, `qns`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'TV (remote) works and programmed correctly', 'Active', 1, '2022-12-15 18:44:41', '2022-12-15 18:44:41'),
(2, 'All lightning functional', 'Active', 1, '2022-12-15 19:48:57', '2022-12-15 19:48:57'),
(3, 'Mirrors clean and in good condition', 'Active', 1, '2023-01-09 19:03:19', '2023-01-09 19:03:19'),
(4, 'All electrical outlets functional', 'Active', 1, '2023-01-16 09:51:03', '2023-01-16 09:51:03'),
(5, 'All flooring/carpet clean', 'Active', 1, '2023-01-16 09:57:27', '2023-01-16 09:57:27'),
(6, 'Art/frame clean and in good condition', 'Active', 1, '2023-01-16 10:12:34', '2023-01-16 10:12:34'),
(7, 'Walls clean', 'Active', 1, '2023-01-16 13:04:34', '2023-01-16 13:04:34'),
(8, 'Windows clean and in good condition', 'Active', 1, '2023-01-16 13:08:37', '2023-01-16 13:08:37'),
(9, 'Ceiling clean and in good condition', 'Active', 1, '2023-01-16 13:09:41', '2023-01-16 13:09:41'),
(10, 'WiFi functional throughout room (optional)', 'Active', 1, '2023-01-16 13:10:56', '2023-01-16 13:10:56'),
(11, '1 laundrybag or basket', 'Active', 1, '2023-01-16 13:12:09', '2023-01-16 13:12:09'),
(12, 'Frame good condition', 'Active', 1, '2023-01-16 13:17:20', '2023-01-16 13:17:20'),
(13, 'Bedding clean and free of stains', 'Active', 1, '2023-01-17 06:30:46', '2023-01-17 06:30:46'),
(14, 'Bed made up, blankets smooth, no wrinkles', 'Active', 1, '2023-01-17 06:36:59', '2023-01-17 06:36:59'),
(15, '2 pillows on each bed', 'Active', 1, '2023-01-17 06:39:04', '2023-01-17 06:39:04'),
(16, 'Plaid on the bed', 'Active', 1, '2023-01-17 06:40:17', '2023-01-17 06:40:17'),
(17, 'Torch working and placed on side table', 'Active', 1, '2023-01-17 06:40:55', '2023-01-17 06:40:55'),
(18, 'Ventilation functional and in good condition', 'Active', 1, '2023-01-17 06:58:42', '2023-01-17 06:58:42'),
(19, 'Do Not Disturb Sign in good condition', 'Active', 1, '2023-01-17 07:23:04', '2023-01-17 07:23:04'),
(20, 'Entry door good condition', 'Active', 1, '2023-01-17 07:27:50', '2023-01-17 07:27:50'),
(21, 'Entry door (lock) functional', 'Active', 1, '2023-01-17 07:28:47', '2023-01-17 07:28:47'),
(22, 'Entry door frame clean', 'Active', 1, '2023-01-17 07:35:23', '2023-01-17 07:35:23'),
(23, '2 umbrella\'s', 'Active', 1, '2023-01-17 07:36:14', '2023-01-17 07:36:14'),
(24, 'Luggage rack(s) (fixed or foldable)', 'Active', 1, '2023-01-17 07:39:21', '2023-01-17 07:39:21'),
(25, 'Does the bed area looks like this?', 'Active', 1, '2023-01-17 08:08:49', '2023-01-17 08:08:49'),
(26, 'All accessories in closet present and in good condition', 'Active', 1, '2023-01-18 07:30:10', '2023-01-18 07:30:10'),
(27, '10 hangers in the room', 'Active', 1, '2023-01-18 07:31:08', '2023-01-18 07:31:08'),
(28, 'Doors open & close properly', 'Active', 1, '2023-01-18 07:32:42', '2023-01-18 07:32:42'),
(29, 'Door is in good condition', 'Active', 1, '2023-01-18 07:33:31', '2023-01-18 07:33:31'),
(30, 'Interior clean', 'Active', 1, '2023-01-18 07:34:12', '2023-01-18 07:34:12'),
(31, 'Safe instructions posted', 'Active', 1, '2023-01-18 07:35:09', '2023-01-18 07:35:09'),
(32, 'Does the closet looks like this?', 'Active', 1, '2023-01-18 07:36:10', '2023-01-18 07:36:10'),
(33, 'Nightstands good condition', 'Active', 1, '2023-01-18 07:37:31', '2023-01-18 07:37:31'),
(34, 'Trash bin clean', 'Active', 1, '2023-01-18 07:38:09', '2023-01-18 07:38:09'),
(35, '(Desk) chair clean and in good condition', 'Active', 1, '2023-01-18 07:38:58', '2023-01-18 07:38:58'),
(36, 'Desk clean and in good condition', 'Active', 1, '2023-01-18 07:40:08', '2023-01-18 07:40:08'),
(37, 'Desk good condition', 'Active', 1, '2023-01-18 07:40:43', '2023-01-18 07:40:43'),
(38, 'Desk drawers functional', 'Active', 1, '2023-01-18 07:41:59', '2023-01-18 07:41:59'),
(39, 'Tables clean and in good condition', 'Active', 1, '2023-01-18 07:42:31', '2023-01-18 07:42:31'),
(40, 'Facility and activities booklet on desk', 'Active', 1, '2023-01-18 07:43:21', '2023-01-18 07:43:21'),
(41, 'Does the furniture looks like this?', 'Active', 1, '2023-01-18 07:44:22', '2023-01-18 07:44:22'),
(42, 'Toilet clean and functional', 'Active', 1, '2023-01-18 07:45:19', '2023-01-18 07:45:19'),
(43, 'Toilet paper on roll holder, minimum of 2 rolls', 'Active', 1, '2023-01-18 07:46:08', '2023-01-18 07:46:08'),
(44, 'Toilet lid down', 'Active', 1, '2023-01-18 07:46:48', '2023-01-18 07:46:48'),
(45, 'Toilet brush clean and in back of toilet', 'Active', 1, '2023-01-18 07:48:20', '2023-01-18 07:48:20'),
(46, 'Pedal bin', 'Active', 1, '2023-01-18 07:49:02', '2023-01-18 07:49:02'),
(47, 'Does the toilet looks like this?', 'Active', 1, '2023-01-18 07:49:42', '2023-01-18 07:49:42'),
(48, 'All surfaces clean', 'Active', 1, '2023-01-18 08:01:34', '2023-01-25 09:59:50'),
(49, 'All tile and floor in good condition', 'Active', 1, '2023-01-18 08:09:12', '2023-01-18 08:09:12'),
(50, 'Shower glass streak free and clean', 'Active', 1, '2023-01-18 08:09:54', '2023-01-18 08:09:54'),
(51, 'All drains in room clean and non-obstructed', 'Active', 1, '2023-01-18 08:10:55', '2023-01-18 08:10:55'),
(52, 'Sink(s) clean', 'Active', 1, '2023-01-18 08:11:45', '2023-01-18 08:11:45'),
(53, 'All countertops and surfaces clean and streak free', 'Active', 1, '2023-01-18 08:12:27', '2023-01-18 08:12:27'),
(54, 'All lights clean & functional', 'Active', 1, '2023-01-18 08:13:11', '2023-01-18 08:13:11'),
(55, 'All towels clean and in good condition ( 1 big one and one small one for each person in the room Yes)', 'Active', 1, '2023-01-18 08:14:47', '2023-01-18 08:14:47'),
(56, '1 tray for storage and display of bathroom amenities', 'Active', 1, '2023-01-18 08:15:37', '2023-01-18 08:15:37'),
(57, 'All amenities refreshed, refilled and present in bathroom (1x\r\nshampoo, 1x conditioner, 1x shower gel, 1x body-lotion, 1x\r\nhand-wash)', 'Active', 1, '2023-01-18 08:24:01', '2023-01-18 08:24:01'),
(58, 'Trash bin clean and in good condition', 'Active', 1, '2023-01-18 08:26:01', '2023-01-18 08:26:01'),
(59, 'Water pressure functional', 'Active', 1, '2023-01-18 08:27:02', '2023-01-18 08:27:02'),
(60, 'All grouting and caulking lines clean', 'Active', 1, '2023-01-18 08:28:03', '2023-01-25 09:19:45'),
(61, 'Does the bathroom looks like this?', 'Active', 1, '2023-01-18 08:31:14', '2023-01-18 08:31:14'),
(62, 'Does the shower looks like this?', 'Active', 1, '2023-01-18 08:31:50', '2023-01-25 09:52:57'),
(63, 'Room testing', 'Active', 1, '2023-03-24 06:34:27', '2023-03-24 06:34:27'),
(64, 'Gate here', 'Active', 1, '2023-03-24 06:36:11', '2023-03-24 06:36:11'),
(65, 'vv', 'Active', 1, '2023-06-07 12:35:09', '2023-06-07 12:35:09');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `stockings`
--

CREATE TABLE `stockings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `qty` decimal(10,2) NOT NULL,
  `current_qty` decimal(10,2) UNSIGNED NOT NULL,
  `from` int(10) UNSIGNED NOT NULL,
  `to` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `selling_price` int(10) UNSIGNED NOT NULL,
  `stock_alert` int(11) NOT NULL DEFAULT 0,
  `vat` double(8,2) NOT NULL DEFAULT 0.00,
  `descriptions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `sub_stores`
--

CREATE TABLE `sub_stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `warehouse` int(10) UNSIGNED NOT NULL,
  `warehouse_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `current_qty` decimal(10,2) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(10) UNSIGNED NOT NULL,
  `tin` int(10) UNSIGNED NOT NULL,
  `vrn` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `supplier_accounts`
--

CREATE TABLE `supplier_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `supplier_account_summaries`
--

CREATE TABLE `supplier_account_summaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `supplier_wallets`
--

CREATE TABLE `supplier_wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `balance` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `supplier_wallet_summuries`
--

CREATE TABLE `supplier_wallet_summuries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `wallet_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT 0,
  `wallet_amount` int(11) NOT NULL DEFAULT 0,
  `wallet_balance` int(11) NOT NULL DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `user_id` int(11) NOT NULL,
  `url` varchar(450) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dataark for tabell `users`
--

INSERT INTO `users` (`id`, `name`, `property_id`, `department_id`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `status`, `user_id`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 1, 1, 'superadmin@hakunamatatabookings.co.tz', '2022-12-15 18:32:56', '$2y$10$w3n7UODEQWNpnQz/XuYOBOVayMD5Qt3PG9xnD/3HrkpvHiYJ6KoUq', NULL, NULL, 'NyfdyqC0c0uL1bc4QApJFkH76SGbMiWifTO1ImDSdxhAFXTe3NTVprPvUByb', NULL, NULL, 'Active', 0, '/report-general/0/dashboard?date=05%2F18%2F2023+-+06%2F16%2F2023&property_search=1&metaname_search=All&indicator_search=All&search=search', '2022-12-15 18:32:57', '2023-06-16 08:31:03'),
(2, 'General Admin', 1, 1, 'generaladmin@hakunamatatabookings.co.tz', '2022-12-15 18:32:57', '$2y$10$92r1ag6xUHvlnj73pVU/j.hfGE1g9WsZbJz.r3KaVLYBwG2CbXQiW', NULL, NULL, 'BHYEr7Bnv8KuaSEPVJdaItbYiHzryBngmyqCCSRWLVLDEvFfvKKw9AGtWNMc', NULL, NULL, 'Active', 0, '/monthly-report/property/1/Maintenance?date=05%2F20%2F2023+-+06%2F18%2F2023&metaname_search=All&indicator_search=Maintenance&search=search', '2022-12-15 18:32:57', '2023-06-18 16:56:35'),
(3, 'Admin', 1, 1, 'admin@hakunamatatabookings.co.tz', '2022-12-15 18:32:57', '$2y$10$si3dupk6TI9I0plCCMp5ZexqzY1Aj7QO.G98lPp5q7dkCKYQZiEHi', NULL, NULL, NULL, NULL, NULL, 'Active', 0, '/report-general/1/dashboard?date=02%2F28%2F2023+-+03%2F29%2F2023&property_search=1&metaname_search=All&indicator_search=All&search=search', '2022-12-15 18:32:57', '2023-03-29 20:36:38'),
(4, 'General Manager', 1, 2, 'generalmanager@hakunamatatabookings.co.tz', '2022-12-15 18:32:57', '$2y$10$8OmOJFUGEUULJuxiuFldHeo6gQ6iV17Quu/VCbtFz4Yi2cm5hpnJS', NULL, NULL, NULL, NULL, NULL, 'Active', 0, '', '2022-12-15 18:32:57', '2022-12-15 18:32:57'),
(5, 'Manager', 1, 1, 'manager@hakunamatatabookings.co.tz', '2022-12-15 18:32:57', '$2y$10$QefKJKOcEFYoxToAtTW3GuhZ1a0al.bjbelx1iG7tSWo7aCUFsweq', NULL, NULL, NULL, NULL, NULL, 'Active', 0, '', '2022-12-15 18:32:57', '2022-12-15 18:32:57'),
(6, 'Account', 1, 1, 'account@hakunamatatabookings.co.tz', '2022-12-15 18:32:57', '$2y$10$8Qi0OPpytBTPHhyJXHrb3efEXMUroQ8MuAeCw/NaWEcHmeaIU6aR2', NULL, NULL, NULL, NULL, NULL, 'Active', 0, '', '2022-12-15 18:32:57', '2022-12-15 18:32:57'),
(7, 'Store', 1, 1, 'store@hakunamatatabookings.co.tz', '2022-12-15 18:32:57', '$2y$10$2P3VA2/x6CMsi6T5.I.Ur.sVaQyx5czrahV/8PJ8PhayRmhZQLkuW', NULL, NULL, NULL, NULL, NULL, 'Active', 0, '', '2022-12-15 18:32:57', '2022-12-15 18:32:57'),
(8, 'User', 1, 1, 'user@hakunamatatabookings.co.tz', '2022-12-15 18:32:57', '$2y$10$FIMH7SEYsH/w2.jzHIzEou49mp7KvBsqiGX6Dq3J4UmK9bk5DJQ2O', NULL, NULL, NULL, NULL, NULL, 'Active', 0, '', '2022-12-15 18:32:57', '2022-12-15 18:32:57'),
(9, 'Christian Ayubu', 1, 5, 'christian@hakunamatatabookings.co.tz', NULL, '$2y$10$saL//UU9FsVC94dzjJiqb.FnvhK8E5M3Rt8r7gLYxkszCmB89lNMi', NULL, NULL, NULL, NULL, NULL, 'Active', 1, '', '2023-02-21 19:07:36', '2023-02-21 19:07:36'),
(10, 'Heinrich', 1, 5, 'heinrich@hakunamatatabookings.co.tz', NULL, '$2y$10$w.ckPMgigwsgkH9r6dgPJuESGvdFwDlM07NucCE47l6PTi0YGSywq', NULL, NULL, '35xNLd9WctQ4rAxK6EbWBemR8pPj81plqdr1J1eAKrrJ01q7cDA3ffgT3ZZs', NULL, NULL, 'Active', 1, '', '2023-03-07 19:49:49', '2023-03-07 19:49:49'),
(11, 'Housekeeper', 1, 5, 'housekeeper@hakunamatatabookings.co.tz', NULL, '$2y$10$3xLjqwBnrOKl30l5P63r.ekKSXCDQ6nSdJ3yaA3suUwH6uFWGo0lO', NULL, NULL, 'cTdD6K8pGXaeExAvLkIbnciwdMY9vSJcW2OqGbR0UmIGwwRqohKX1Y9SDuZ5', NULL, NULL, 'Active', 1, '', '2023-05-22 07:23:20', '2023-05-22 07:23:20'),
(12, 'Maintenance', 1, 7, 'maintenancier@hakunamatatabookings.co.tz', NULL, '$2y$10$/ncJyindwS/ZjLWBwEAPJOgqEBsLnATZDaKBaYmaiGl5IO6/Nd4ea', NULL, NULL, NULL, NULL, NULL, 'Active', 1, '', '2023-06-16 08:42:41', '2023-06-16 08:42:41');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `user_activities`
--

CREATE TABLE `user_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sys_user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activity_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dataark for tabell `user_activities`
--

INSERT INTO `user_activities` (`id`, `sys_user_id`, `activity_id`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '12', '1', 'Active', 1, '2023-06-16 08:56:08', '2023-06-16 08:56:08'),
(2, '12', '2', 'Active', 1, '2023-06-16 08:56:08', '2023-06-16 08:56:08'),
(3, '12', '3', 'Active', 1, '2023-06-16 08:56:08', '2023-06-16 08:56:08'),
(4, '12', '4', 'Active', 1, '2023-06-16 08:56:08', '2023-06-16 08:56:08'),
(5, '12', '5', 'Active', 1, '2023-06-16 08:56:09', '2023-06-16 08:56:09'),
(6, '12', '6', 'Active', 1, '2023-06-16 08:56:09', '2023-06-16 08:56:09'),
(7, '12', '7', 'Active', 1, '2023-06-16 08:56:09', '2023-06-16 08:56:09'),
(8, '12', '8', 'Active', 1, '2023-06-16 08:56:09', '2023-06-16 08:56:09'),
(9, '12', '9', 'Active', 1, '2023-06-16 08:56:09', '2023-06-16 08:56:09'),
(10, '12', '10', 'Active', 1, '2023-06-16 08:56:09', '2023-06-16 08:56:09'),
(11, '12', '11', 'Active', 1, '2023-06-16 08:56:09', '2023-06-16 08:56:09'),
(12, '12', '12', 'Active', 1, '2023-06-16 08:56:09', '2023-06-16 08:56:09'),
(13, '12', '13', 'Active', 1, '2023-06-16 08:56:09', '2023-06-16 08:56:09');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `user_properties`
--

CREATE TABLE `user_properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sys_user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dataark for tabell `user_properties`
--

INSERT INTO `user_properties` (`id`, `sys_user_id`, `property_id`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '9', '1', 'Active', 1, '2023-02-21 19:07:36', '2023-02-21 19:07:36'),
(2, '10', '1', 'Active', 1, '2023-03-07 19:49:49', '2023-03-07 19:49:49'),
(3, '11', '1', 'Active', 1, '2023-05-22 07:23:20', '2023-05-22 07:23:20'),
(4, '12', '1', 'Active', 1, '2023-06-16 08:42:41', '2023-06-16 08:42:41');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `user_registers`
--

CREATE TABLE `user_registers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sys_user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dataark for tabell `user_roles`
--

INSERT INTO `user_roles` (`id`, `sys_user_id`, `role_id`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 'Active', 1, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(2, '2', '2', 'Active', 2, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(3, '3', '3', 'Active', 3, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(4, '4', '4', 'Active', 4, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(5, '5', '5', 'Active', 1, '2022-12-15 18:32:58', '2023-03-27 06:49:50'),
(6, '6', '6', 'Active', 6, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(7, '7', '7', 'Active', 7, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(8, '8', '8', 'Active', 8, '2022-12-15 18:32:58', '2022-12-15 18:32:58'),
(9, '1', '4', 'Inactive', 1, '2022-12-15 18:52:54', '2023-01-18 22:17:54'),
(10, '1', '2', 'Inactive', 1, '2023-01-18 20:28:53', '2023-01-18 21:37:16'),
(11, '1', '3', 'Inactive', 1, '2023-01-18 20:29:29', '2023-01-18 21:41:28'),
(12, '1', '6', 'Active', 1, '2023-01-18 20:29:50', '2023-01-18 20:29:50'),
(13, '9', '4', 'Inactive', 1, '2023-02-21 19:09:25', '2023-02-21 19:14:57'),
(14, '9', '5', 'Active', 1, '2023-02-21 19:15:15', '2023-02-21 19:15:15'),
(15, '5', '1', 'Inactive', 5, '2023-03-27 06:50:27', '2023-06-03 13:11:15'),
(16, '11', '10', 'Active', 1, '2023-05-22 07:25:33', '2023-06-07 13:39:41'),
(17, '12', '11', 'Active', 1, '2023-06-16 08:43:50', '2023-06-16 08:43:50'),
(18, '12', '1', 'Inactive', 1, '2023-06-16 08:55:38', '2023-06-16 09:40:05'),
(19, '12', '2', 'Inactive', 1, '2023-06-16 08:55:38', '2023-06-16 09:40:13'),
(20, '12', '3', 'Inactive', 1, '2023-06-16 08:55:38', '2023-06-16 09:40:20'),
(21, '12', '4', 'Inactive', 1, '2023-06-16 08:55:38', '2023-06-16 09:40:27'),
(22, '12', '5', 'Inactive', 1, '2023-06-16 08:55:38', '2023-06-16 09:40:39'),
(23, '12', '6', 'Inactive', 1, '2023-06-16 08:55:38', '2023-06-16 09:41:03'),
(24, '12', '7', 'Inactive', 1, '2023-06-16 08:55:38', '2023-06-16 09:40:50'),
(25, '12', '8', 'Inactive', 1, '2023-06-16 08:55:38', '2023-06-16 09:40:57'),
(26, '12', '9', 'Inactive', 1, '2023-06-16 08:55:38', '2023-06-16 09:39:58'),
(27, '12', '10', 'Inactive', 1, '2023-06-16 08:55:38', '2023-06-16 09:40:48');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `warehouses`
--

CREATE TABLE `warehouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `warehouse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_warehouse` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_roles`
--
ALTER TABLE `activity_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset_values`
--
ALTER TABLE `asset_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash_ins`
--
ALTER TABLE `cash_ins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checklist_statuses`
--
ALTER TABLE `checklist_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_account_summaries`
--
ALTER TABLE `customer_account_summaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_wallets`
--
ALTER TABLE `customer_wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_wallet_summuries`
--
ALTER TABLE `customer_wallet_summuries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datatypes`
--
ALTER TABLE `datatypes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `datatypes_datatype_name_unique` (`datatype_name`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_unit_name_unique` (`unit_name`);

--
-- Indexes for table `department_roles`
--
ALTER TABLE `department_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `direct_expenses`
--
ALTER TABLE `direct_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dynamic_ind_updates`
--
ALTER TABLE `dynamic_ind_updates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `key_indicators`
--
ALTER TABLE `key_indicators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `liablity_values`
--
ALTER TABLE `liablity_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metadata`
--
ALTER TABLE `metadata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `metadata_metadata_name_unique` (`metadata_name`);

--
-- Indexes for table `metanames`
--
ALTER TABLE `metanames`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `metanames_metaname_name_unique` (`metaname_name`);

--
-- Indexes for table `metaname_datatypes`
--
ALTER TABLE `metaname_datatypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `my_companies`
--
ALTER TABLE `my_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_payments`
--
ALTER TABLE `my_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `optional_answers`
--
ALTER TABLE `optional_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_categories`
--
ALTER TABLE `payment_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending_stocks`
--
ALTER TABLE `pending_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `properties_property_name_unique` (`property_name`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qns_appliedtos`
--
ALTER TABLE `qns_appliedtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qns_appliedtosxxxx`
--
ALTER TABLE `qns_appliedtosxxxx`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qns_numbers`
--
ALTER TABLE `qns_numbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rental_items`
--
ALTER TABLE `rental_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rental_orders`
--
ALTER TABLE `rental_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rental_order_items`
--
ALTER TABLE `rental_order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_tests`
--
ALTER TABLE `report_tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `set_indicators`
--
ALTER TABLE `set_indicators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stockings`
--
ALTER TABLE `stockings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_stores`
--
ALTER TABLE `sub_stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliers_email_unique` (`email`);

--
-- Indexes for table `supplier_accounts`
--
ALTER TABLE `supplier_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_account_summaries`
--
ALTER TABLE `supplier_account_summaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_wallets`
--
ALTER TABLE `supplier_wallets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `supplier_wallets_supplier_id_unique` (`supplier_id`);

--
-- Indexes for table `supplier_wallet_summuries`
--
ALTER TABLE `supplier_wallet_summuries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_activities`
--
ALTER TABLE `user_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_properties`
--
ALTER TABLE `user_properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_registers`
--
ALTER TABLE `user_registers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activity_roles`
--
ALTER TABLE `activity_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `asset_values`
--
ALTER TABLE `asset_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cash_ins`
--
ALTER TABLE `cash_ins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `checklist_statuses`
--
ALTER TABLE `checklist_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_account_summaries`
--
ALTER TABLE `customer_account_summaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_wallets`
--
ALTER TABLE `customer_wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_wallet_summuries`
--
ALTER TABLE `customer_wallet_summuries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `datatypes`
--
ALTER TABLE `datatypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `department_roles`
--
ALTER TABLE `department_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `direct_expenses`
--
ALTER TABLE `direct_expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dynamic_ind_updates`
--
ALTER TABLE `dynamic_ind_updates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `key_indicators`
--
ALTER TABLE `key_indicators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `liablity_values`
--
ALTER TABLE `liablity_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `metadata`
--
ALTER TABLE `metadata`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `metanames`
--
ALTER TABLE `metanames`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `metaname_datatypes`
--
ALTER TABLE `metaname_datatypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `my_companies`
--
ALTER TABLE `my_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `my_payments`
--
ALTER TABLE `my_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `optional_answers`
--
ALTER TABLE `optional_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_categories`
--
ALTER TABLE `payment_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pending_stocks`
--
ALTER TABLE `pending_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_items`
--
ALTER TABLE `purchase_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qns_appliedtos`
--
ALTER TABLE `qns_appliedtos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `qns_appliedtosxxxx`
--
ALTER TABLE `qns_appliedtosxxxx`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `qns_numbers`
--
ALTER TABLE `qns_numbers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rental_items`
--
ALTER TABLE `rental_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rental_orders`
--
ALTER TABLE `rental_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rental_order_items`
--
ALTER TABLE `rental_order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_tests`
--
ALTER TABLE `report_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `set_indicators`
--
ALTER TABLE `set_indicators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `stockings`
--
ALTER TABLE `stockings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_stores`
--
ALTER TABLE `sub_stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier_accounts`
--
ALTER TABLE `supplier_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier_account_summaries`
--
ALTER TABLE `supplier_account_summaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier_wallets`
--
ALTER TABLE `supplier_wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier_wallet_summuries`
--
ALTER TABLE `supplier_wallet_summuries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_activities`
--
ALTER TABLE `user_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_properties`
--
ALTER TABLE `user_properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_registers`
--
ALTER TABLE `user_registers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Begrensninger for dumpede tabeller
--

--
-- Begrensninger for tabell `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Begrensninger for tabell `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Begrensninger for tabell `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
