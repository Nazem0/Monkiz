-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 09:44 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monkiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
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
(5, '2023_06_26_203208_create_requests_table', 1),
(6, '2023_06_26_205429_create_tasks_table', 2),
(7, '2023_06_26_224711_create_task__services_table', 3),
(8, '2023_06_26_224711_create_task_services_table', 4),
(12, '2023_06_26_230751_create_services_table', 5),
(18, '2023_06_27_174904_create_task_service_table', 6),
(19, '2023_06_27_232248_create_offer_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `maintenance_center_id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `maintenance_center_id`, `task_id`, `description`, `created_at`, `updated_at`) VALUES
(30, 12, 42, '400', '2023-07-25 20:31:08', '2023-07-25 20:31:35');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `icon`, `created_at`, `updated_at`) VALUES
(28, 'Oil Change', '5b4ec2b5e698df6f6e15205bffed754a.png', '2023-07-25 19:39:44', '2023-08-03 07:42:45'),
(29, 'Brake Pads', '4b548904f6adf9da7a74be9806d55bbc.png', '2023-07-25 19:52:59', '2023-08-03 07:42:51'),
(30, 'General Diagnosis', 'd800e6094bd6f065efe8552b06dc13b3.png', '2023-07-25 19:53:45', '2023-08-03 07:42:58'),
(31, 'Engine', '88f98e0a7cbfd09110197505fe876ad8.png', '2023-07-25 19:54:01', '2023-08-03 07:43:06'),
(32, 'Wheels', '5346580cdbef9491c0d1e72a7e4b2e75.png', '2023-07-25 19:54:14', '2023-08-03 07:43:11'),
(33, 'A/C Diagnosis', '6e11b4b8d02f59950ccd4638ef68691e.png', '2023-07-25 19:54:22', '2023-08-03 07:43:17'),
(34, 'Car Wash', '9d5ab5810b71837324e06278b7a35bc6.png', '2023-07-25 19:54:35', '2023-08-03 07:43:22'),
(35, 'Vehicle Towing', '5b5ef239900fc8938de7c0ed66ac5ea0.png', '2023-07-25 19:56:43', '2023-08-03 07:43:28');

-- --------------------------------------------------------

--
-- Table structure for table `service_task`
--

CREATE TABLE `service_task` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_task`
--

INSERT INTO `service_task` (`id`, `task_id`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 5, 2, NULL, NULL),
(2, 5, 3, NULL, NULL),
(7, 2, 9, NULL, NULL),
(8, 2, 10, NULL, NULL),
(9, 3, 3, NULL, NULL),
(10, 3, 7, NULL, NULL),
(22, 1, 7, '2023-07-03 07:03:38', '2023-07-03 07:03:38'),
(25, 37, 2, '2023-07-04 10:49:51', '2023-07-04 10:49:51'),
(26, 37, 5, '2023-07-04 10:49:51', '2023-07-04 10:49:51'),
(27, 37, 9, '2023-07-04 10:49:51', '2023-07-04 10:49:51'),
(36, 38, 4, '2023-07-06 17:56:33', '2023-07-06 17:56:33'),
(37, 38, 7, '2023-07-06 17:56:33', '2023-07-06 17:56:33'),
(41, 31, 2, '2023-07-06 18:01:54', '2023-07-06 18:01:54'),
(42, 31, 7, '2023-07-06 18:01:54', '2023-07-06 18:01:54'),
(43, 31, 9, '2023-07-06 18:01:54', '2023-07-06 18:01:54'),
(44, 31, 10, '2023-07-06 18:01:54', '2023-07-06 18:01:54'),
(47, 39, 7, '2023-07-06 19:14:26', '2023-07-06 19:14:26'),
(48, 39, 8, '2023-07-06 19:14:26', '2023-07-06 19:14:26'),
(49, 40, 4, '2023-07-09 17:31:18', '2023-07-09 17:31:18'),
(50, 40, 10, '2023-07-09 17:31:18', '2023-07-09 17:31:18'),
(51, 41, 28, '2023-07-25 20:23:41', '2023-07-25 20:23:41'),
(52, 41, 33, '2023-07-25 20:23:41', '2023-07-25 20:23:41'),
(53, 42, 28, '2023-07-25 20:29:50', '2023-07-25 20:29:50'),
(54, 42, 30, '2023-07-25 20:29:50', '2023-07-25 20:29:50');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `city` varchar(255) NOT NULL,
  `car_model` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `customer_id`, `city`, `car_model`, `description`, `status`, `created_at`, `updated_at`) VALUES
(42, 11, 'Bab al Luq Cairo Cairo', 'Car Model 2012', 'Test Description', 'approved', '2023-07-25 20:29:50', '2023-07-25 20:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `role` enum('Client','Maintenance_Center','Admin') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `email_verified_at`, `image`, `phone`, `city`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Admin', 'mohamednazem09@outlook.com', '$2y$10$zDm7NqcdEXosrBdn.3o9eeNHOuPVULGiGDPvDhfmGUroABx.gd2RO', NULL, '3cd4f17940eba353b46716026152fdd1.png', '+201064642987', 'Abtal El-Tahrir Street Aswan First Aswan Aswan', 'Admin', NULL, '2023-07-01 20:00:56', '2023-08-03 07:38:26'),
(11, 'Mohamed Nazem Mahrous', 'mohamednazem09@gmail.com', '$2y$10$4DTHvKvyaDbMRlsaxyPmzuE2DiTCZXJby3wjIHK1kYtekiWtsOHVy', NULL, 'bc959a3584a522351b366e3fb043c45f.png', '+201100233249', 'Abtal El-Tahrir Street Aswan Aswan', 'Client', NULL, '2023-07-25 20:10:43', '2023-08-03 07:39:23'),
(12, 'Dummy Maintenance Center', 'm@domain.com', '$2y$10$vSp5u.8Iwy3zu7IjUTqIO.U4fmJBIOQXoTskA9jwY8dViv1gnUdYK', NULL, 'bca8a9c7fa0091aaa004174be1dc8f30.png', '+201100233249', 'Bab al Luq Cairo Cairo', 'Maintenance_Center', NULL, '2023-07-25 20:30:28', '2023-08-03 07:39:37'),
(13, 'Dummy Maintenance Center 2', 'm2@domain.com', '$2y$10$Q1kRYVPE8DXIE16xnXQg9.KZOGQe6mgvn8qeAfXqERLQo5yXVJ2pe', NULL, '5871aa6f54f6ea73d007890d6c1b2060.png', '+201064642987', '29 Al Tahrir Street Asyut Asyut Asyut', 'Maintenance_Center', NULL, '2023-07-28 15:22:56', '2023-08-03 07:39:43');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offers_maintenance_center_id_foreign` (`maintenance_center_id`),
  ADD KEY `offers_task_id_foreign` (`task_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_task`
--
ALTER TABLE `service_task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_service_task_id_foreign` (`task_id`),
  ADD KEY `task_service_service_id_foreign` (`service_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_customer_id_foreign` (`customer_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `service_task`
--
ALTER TABLE `service_task`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_maintenance_center_id_foreign` FOREIGN KEY (`maintenance_center_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `offers_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
