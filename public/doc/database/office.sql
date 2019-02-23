-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 23, 2019 at 10:25 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `office`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminmeta`
--

CREATE TABLE `adminmeta` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `meta_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 or 1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `email`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Suman Rajvhar', '01712179034', 'uis360.sraj@gmail.com', '$2y$10$mfdT34fz9dnurOCHa4xrJeqe.NLXFqUzQw6DYTV9LX92oXDmsVSM6', 1, 'drGhqtSK1kHOrcWe3O3gXUbJ1ZJCJz1WmdxeHRIa5anS1lrBiEClPVcwfnjq', '2019-02-16 18:00:00', '2019-02-16 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_role`
--

CREATE TABLE `admin_role` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `late_entry` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `early_leave` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'in',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `user_id`, `ip_address`, `late_entry`, `early_leave`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, '::1', '773', '299', 'out', '2019-02-19 15:53:04', '2019-02-19 16:59:36'),
(2, 2, '::1', '881', '403', 'out', '2019-02-20 17:41:26', '2019-02-20 18:43:49'),
(3, 2, '::1', '173', NULL, 'in', '2019-02-21 05:53:07', '2019-02-21 05:53:07'),
(4, 2, '::1', '341', '198', 'out', '2019-02-21 08:41:37', '2019-02-21 08:41:40'),
(5, 2, '::1', '796', '260', 'out', '2019-02-21 16:16:25', '2019-02-21 16:20:09'),
(6, 2, '::1', '344', '142', 'out', '2019-02-22 08:44:21', '2019-02-22 09:37:19'),
(7, 2, '::1', '431', '88', 'out', '2019-02-22 10:11:54', '2019-02-22 10:31:08'),
(8, 2, '::1', '451', '216', 'out', '2019-02-22 10:31:51', '2019-02-22 15:36:12'),
(9, 2, '::1', '94', NULL, 'in', '2019-02-23 04:34:24', '2019-02-23 04:34:24'),
(10, 2, '::1', '233', '306', 'out', '2019-02-23 06:53:10', '2019-02-23 06:53:18'),
(11, 2, '::1', '242', '255', 'out', '2019-02-23 07:02:00', '2019-02-23 07:44:10');

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
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2018_12_01_102758_create_admins_table', 1),
(9, '2018_12_03_124721_create_permissions_table', 1),
(10, '2018_12_04_123752_create_roles_table', 1),
(11, '2019_02_12_073945_create_sponsors_table', 1),
(12, '2019_02_12_103133_create_todos_table', 2),
(17, '2019_02_15_053733_create_attendances_table', 3),
(19, '2019_02_17_133154_create_missions_table', 4),
(21, '2019_02_22_181853_create_reports_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `missions`
--

CREATE TABLE `missions` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `priority` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'low' COMMENT 'low/medium/high/emergency',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending' COMMENT 'pending/process/done/cancel',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `missions`
--

INSERT INTO `missions` (`id`, `admin_id`, `user_id`, `title`, `note`, `priority`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Fiesta', 'Complete the project asap.', 'low', 'done', '2019-02-17 04:30:00', '2019-02-23 07:20:24'),
(2, 1, 1, 'Pizza House', 'Complete the project asap.', 'low', 'done', '2019-02-16 18:00:00', '2019-02-16 18:00:00'),
(3, 1, 2, 'HD24', 'Complete the project asap.', 'low', 'process', '2019-02-16 18:00:00', '2019-02-23 07:20:24'),
(4, 1, 2, '2nd Openion', 'Complete the project asap.', 'low', 'cancel', '2019-02-16 18:00:00', '2019-02-21 16:18:34'),
(5, 1, 2, 'Office management', 'Complete the project asap.', 'low', 'process', '2019-02-16 18:00:00', '2019-02-23 04:34:50'),
(6, 1, 1, 'Liquor store', 'Complete the project asap.', 'low', 'pending', '2019-02-16 18:00:00', '2019-02-16 18:00:00'),
(7, 1, 1, 'Fiesta', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta nostrum expedita est perspiciatis nihil dolor non provident illo, labore quo qui explicabo eaque voluptatum fuga vero amet sint quaerat autem inventore nulla? Repellendus rem corporis inventore, aut optio.', 'low', 'pending', '2019-02-18 07:48:05', '2019-02-18 07:48:05'),
(8, 1, 1, 'Git', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'medium', 'pending', '2019-02-18 07:48:28', '2019-02-18 07:48:28'),
(9, 1, 1, 'Docker', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta nostrum expedita est perspiciatis nihil dolor non provident illo.', 'high', 'pending', '2019-02-18 07:48:49', '2019-02-18 07:48:49'),
(10, 1, 1, 'DevOps', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta nostrum expedita est perspiciatis nihil dolor non provident illo, labore quo qui explicabo eaque voluptatum fuga vero amet sint quaerat autem inventore nulla? Repellendus rem corporis inventore, aut optio.', 'emergency', 'pending', '2019-02-18 07:49:11', '2019-02-18 07:49:11'),
(11, 1, 1, 'Fix the blade from admin panel', 'ASAP', 'emergency', 'pending', '2019-02-19 14:59:40', '2019-02-19 14:59:40');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('02fb6bf5cd46dfea60f2e9b2d6467f97ed8075011eae09af78af85a90fcbf75800d08bfff3b7f2f7', 1, 1, 'Test', '[]', 1, '2019-02-12 03:25:35', '2019-02-12 03:25:35', '2020-02-12 09:25:35'),
('21ffc91f5445e9967b68e2a3185e21b50b5b7e2a9a906ac63540fa1d9a17ba0adc997bb24fddb275', 2, 1, 'Hello', '[]', 0, '2019-02-19 14:18:41', '2019-02-19 14:18:41', '2020-02-19 20:18:41'),
('3d232840c45a53e788cb1d3a9a14a6648e95d85952ef3bb598eb6d9ab5b9d36f0f1c3f88eb4dc808', 1, 1, 'Hello', '[]', 1, '2019-02-13 00:44:15', '2019-02-13 00:44:15', '2020-02-13 06:44:15'),
('47ddda3f334f74b9065df43cb3c4fe1cd4a25f83db0f9d7dfcf3f9d6805e254edcca17d2b2c78517', 2, 1, 'MyApp', '[]', 1, '2019-02-13 05:48:24', '2019-02-13 05:48:24', '2020-02-13 11:48:24'),
('5230850efcc2f6c20aa8c80ab33fc52daf66ea561240ce27ec1d98442f509e15c3caea62663f0f8c', 2, 1, 'hello', '[]', 1, '2019-02-17 06:02:22', '2019-02-17 06:02:22', '2020-02-17 12:02:22'),
('6dda751923d135dc5240f2d8b0bbf9dd615f2194128223e2b2bd8e01cab6297a2a8b299b4019221b', 2, 1, 'MyApp', '[]', 1, '2019-02-19 15:41:09', '2019-02-19 15:41:09', '2020-02-19 21:41:09'),
('702b0ea54c08031f7d0d776eeba385dc277d8451e558e962b15f008bd71a1bea8f78d53d560a8024', 1, 1, 'Test', '[]', 0, '2019-02-13 02:27:08', '2019-02-13 02:27:08', '2020-02-13 08:27:08'),
('8980d7981824540501bee5c31d050ffa3368535819aaf13310d8b63178ccba638d7e1008e4f42737', 2, 1, 'MyApp', '[]', 1, '2019-02-13 05:38:06', '2019-02-13 05:38:06', '2020-02-13 11:38:06'),
('91956d5e03b52d8eaf1466292664686d56ec61ffa4197a34bbc0e41e97f3be726b8d4c5ea73d2e84', 2, 1, 'MyApp', '[]', 1, '2019-02-13 05:49:09', '2019-02-13 05:49:09', '2020-02-13 11:49:09'),
('b14946fa8f809b79a45e16e575c538b33178d826d8f947d109250b6e9f340e80d27a9aed053f3df5', 1, 1, 'Test', '[]', 1, '2019-02-12 03:33:43', '2019-02-12 03:33:43', '2020-02-12 09:33:43');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Hello', 'boodfECz5DUkh6VuOmWGKCwmnzbEMdI9olyAX9YC', 'http://localhost', 1, 0, 0, '2019-02-12 03:25:20', '2019-02-12 03:25:20');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-02-12 03:25:20', '2019-02-12 03:25:20');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `mission_id` int(11) UNSIGNED DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `report_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `user_id`, `mission_id`, `comment`, `report_at`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'done', '2019-02-23', '2019-02-23 07:20:24', '2019-02-23 07:20:24'),
(2, 2, 3, 'process', '2019-02-23', '2019-02-23 07:20:24', '2019-02-23 07:20:24'),
(3, 2, 4, 'cancel', '2019-02-23', '2019-02-23 07:20:25', '2019-02-23 07:20:25'),
(4, 2, 5, 'process', '2019-02-23', '2019-02-23 07:20:26', '2019-02-23 07:20:26'),
(5, 2, NULL, 'Hello World', '2019-02-23', '2019-02-23 07:20:46', '2019-02-23 07:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'superadmin/administrator/editor/author/contributor/subscriber',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE `todos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`id`, `user_id`, `title`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 'Android', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, eius? Error, assumenda itaque? Nam quas tenetur eaque, voluptatum obcaecati amet provident qui eveniet nisi excepturi et atque possimus magnam nemo impedit exercitationem hic reiciendis aspernatur sequi.', '2019-02-11 18:00:00', '2019-02-19 08:01:52'),
(2, 1, 'Angular 7', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, eius? Error, assumenda itaque? Nam quas tenetur eaque, voluptatum obcaecati amet provident qui eveniet nisi excepturi et atque possimus magnam nemo impedit exercitationem hic reiciendis aspernatur sequi. Est, vero earum? Minus in facilis nobis recusandae.', '2019-02-12 22:28:04', '2019-02-12 22:28:04'),
(10, 1, 'Laravel 5.7', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam ratione necessitatibus facere maxime ipsam recusandae iure, nisi non officiis exercitationem?', '2019-02-13 02:26:18', '2019-02-13 03:53:28'),
(12, 1, 'Python', 'Study with python 3.', '2019-02-13 02:26:35', '2019-02-13 03:27:39');

-- --------------------------------------------------------

--
-- Table structure for table `usermeta`
--

CREATE TABLE `usermeta` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `meta_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'general' COMMENT 'general/special/employer',
  `activation_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 or 1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `account_type`, `activation_token`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jayanta Biswas', '01775219457', 'uis360.jayanta@gmail.com', NULL, '$2y$10$bpfvfuPF4E31H0GG3U25sOP1pxLXocN5iJVSo.E1F30chLZin.1Mm', 'general', NULL, 1, 'VPINydJSPuPqe5HJ0YRN12fjFKTjeVaqiqhpnCtM3dLpZTZtCt26njbsTKxS', '2019-02-12 01:43:28', '2019-02-12 01:44:06'),
(2, 'Maruf Hasan', '01903402828', 'bjayanta.neo@gmail.com', NULL, '$2y$10$bpfvfuPF4E31H0GG3U25sOP1pxLXocN5iJVSo.E1F30chLZin.1Mm', 'general', NULL, 1, 'ytLlkEnOvozRl9pC0QgYCQljHqR5EWyBbrKmey0rebITNPWazjfB2ifNewAd', '2019-02-13 05:38:06', '2019-02-13 05:39:00'),
(3, 'Ariful Islam', '01775219458', 'bjayanta.me@gmail.com', NULL, '$2y$10$bpfvfuPF4E31H0GG3U25sOP1pxLXocN5iJVSo.E1F30chLZin.1Mm', 'general', 'VYNnv0JtNz2aRn7bxvnHq84tVhTIS8xM0rQVWFtd', 0, '4pVg03lCnJBl5rTiiEPbyIFj1DPLwOPo5zSPdkJci8mvtcvlTgCEagvpUJ3f', '2019-02-17 08:22:39', '2019-02-17 08:22:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminmeta`
--
ALTER TABLE `adminmeta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adminmeta_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_phone_unique` (`phone`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD KEY `admin_role_admin_id_foreign` (`admin_id`),
  ADD KEY `admin_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `missions`
--
ALTER TABLE `missions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

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
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD KEY `permission_role_role_id_foreign` (`role_id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usermeta`
--
ALTER TABLE `usermeta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usermeta_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminmeta`
--
ALTER TABLE `adminmeta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `missions`
--
ALTER TABLE `missions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `usermeta`
--
ALTER TABLE `usermeta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adminmeta`
--
ALTER TABLE `adminmeta`
  ADD CONSTRAINT `adminmeta_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD CONSTRAINT `admin_role_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usermeta`
--
ALTER TABLE `usermeta`
  ADD CONSTRAINT `usermeta_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
