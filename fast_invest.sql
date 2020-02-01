-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 01, 2020 at 12:53 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fast_invest`
--

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
(3, '2020_01_31_165134_create_transfers_table', 1);

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
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`id`, `from`, `to`, `amount`, `purpose`, `created_at`, `updated_at`) VALUES
(1, 'iezCzYnkZx9ayxn', 'Sea4YF2iWPuyuZz', 85.40, 'For monitor', '2020-01-31 23:20:08', '2020-01-31 23:20:08'),
(2, 'iezCzYnkZx9ayxn', 'Ye7owbmme0ZxgZA', 14.17, 'Tickets', '2020-01-31 23:21:04', '2020-01-31 23:21:04'),
(3, 'iezCzYnkZx9ayxn', 'yCiBmYpqyVbj51B', 300.20, 'For help', '2020-01-31 23:21:59', '2020-01-31 23:21:59'),
(4, 'Sea4YF2iWPuyuZz', 'iezCzYnkZx9ayxn', 8.60, 'Haircut', '2020-01-31 23:27:39', '2020-01-31 23:27:39'),
(5, 'Sea4YF2iWPuyuZz', 'Ye7owbmme0ZxgZA', 489.74, 'FireWorks', '2020-01-31 23:28:32', '2020-01-31 23:28:32'),
(6, 'Ye7owbmme0ZxgZA', 'yCiBmYpqyVbj51B', 255.00, 'Gunpowder', '2020-01-31 23:30:58', '2020-01-31 23:30:58'),
(7, 'yCiBmYpqyVbj51B', 'Sea4YF2iWPuyuZz', 145.80, 'Money back', '2020-01-31 23:31:55', '2020-01-31 23:31:55'),
(8, 'yCiBmYpqyVbj51B', 'Sea4YF2iWPuyuZz', 45.50, 'Trip', '2020-01-31 23:32:26', '2020-01-31 23:32:26'),
(9, 'yCiBmYpqyVbj51B', 'iezCzYnkZx9ayxn', 77.40, 'Gas money', '2020-01-31 23:33:01', '2020-01-31 23:33:01'),
(10, 'yCiBmYpqyVbj51B', 'Sea4YF2iWPuyuZz', 300.00, 'Bicycle', '2020-02-01 09:20:25', '2020-02-01 09:20:25'),
(11, 'Ye7owbmme0ZxgZA', 'Sea4YF2iWPuyuZz', 12.52, 'Money back', '2020-02-01 09:21:05', '2020-02-01 09:21:05'),
(12, 'Ye7owbmme0ZxgZA', 'Sea4YF2iWPuyuZz', 85.40, 'For help', '2020-02-01 09:21:23', '2020-02-01 09:21:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` double(8,2) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `account_number`, `balance`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Laura', 'laura@mail.com', 'yCiBmYpqyVbj51B', 986.50, NULL, '$2y$10$AUbsR.iqklFdxJhWk950N.HQMxdE.FIDegENpgi/qUygPwDyQCzhG', NULL, '2020-01-31 23:11:52', '2020-02-01 09:20:26'),
(2, 'John', 'john@mail.com', 'Ye7owbmme0ZxgZA', 1150.99, NULL, '$2y$10$N8pcvQAHcgXPE/dYtQopaegRqDO3/mwS9t7G51DYtg0Ia1WNIUlUS', NULL, '2020-01-31 23:12:44', '2020-02-01 09:21:23'),
(3, 'David', 'david@mail.com', 'Sea4YF2iWPuyuZz', 1176.28, NULL, '$2y$10$Ow37NutShWAq0UMop9.7zuX8BXP58b/.gYDisENpuA2pMHxou3wNS', NULL, '2020-01-31 23:13:13', '2020-02-01 09:21:23'),
(4, 'Sandra', 'sandra@mail.com', 'iezCzYnkZx9ayxn', 686.23, NULL, '$2y$10$PPmA/kRPpyBEDgUPRHk8fuzQjcA2Trs128XNEH4H3wNww/FXbWRje', NULL, '2020-01-31 23:13:37', '2020-01-31 23:33:01');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transfers_from_foreign` (`from`),
  ADD KEY `transfers_to_foreign` (`to`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_account_number_unique` (`account_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transfers`
--
ALTER TABLE `transfers`
  ADD CONSTRAINT `transfers_from_foreign` FOREIGN KEY (`from`) REFERENCES `users` (`account_number`),
  ADD CONSTRAINT `transfers_to_foreign` FOREIGN KEY (`to`) REFERENCES `users` (`account_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
