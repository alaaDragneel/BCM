-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2016 at 12:58 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bmc`
--
CREATE DATABASE IF NOT EXISTS `bmc` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bmc`;

-- --------------------------------------------------------

--
-- Table structure for table `bmcs`
--

CREATE TABLE `bmcs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `KP` varchar(255) NOT NULL,
  `KA` varchar(255) NOT NULL,
  `VP` varchar(255) NOT NULL,
  `CR` varchar(255) NOT NULL,
  `CS` varchar(255) NOT NULL,
  `KR` varchar(255) NOT NULL,
  `Ch` varchar(255) NOT NULL,
  `CST` varchar(255) NOT NULL,
  `RS` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `from` varchar(255) NOT NULL,
  `to` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_10_27_131311_create_teamWorks_table', 1),
('2016_10_27_132052_create_BMCS_table', 1),
('2016_10_27_132509_create_tasks_table', 1),
('2016_10_27_132735_create_companies_table', 1),
('2016_10_27_132821_create_messages_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `task` varchar(255) NOT NULL,
  `task_description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `BMC_id` int(10) UNSIGNED NOT NULL,
  `teamWork_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `teamworks`
--

CREATE TABLE `teamworks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phoneNo` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teamworks`
--

INSERT INTO `teamworks` (`id`, `name`, `email`, `password`, `phoneNo`, `image`, `job`, `user_id`, `created_at`, `updated_at`) VALUES
(10, 'slss', 'alaa_dragneel@yahoo.com', '$2y$10$6k0PHD9J1SzC4Zn.B9ZkCeZFDGAxPuWxNXl3qZOcOCBv3TMNHegp6', '030303', 'src/frontend/global/img/avatar5.png', '', 2, '2016-10-28 20:28:32', '2016-10-28 20:28:32'),
(11, 'MobileApplication', 'aaa@xxx.com', '$2y$10$2bbffmNAYEryZfOtUJHL6.Vf8V5/8hKlJaNy.rbt32AEOK8aIktxi', '02020', 'src/frontend/global/img/avatar5.png', 'super', 2, '2016-10-28 20:35:04', '2016-10-28 20:35:04'),
(12, 'mohamed', 'aa@yahoo.com', '$2y$10$eQgVi4cJzqydqlVgaWbEd.UXNI22fWvGdTvJnrfNvTtfmW1Cledo6', '0202120', 'src/frontend/global/img/avatar5.png', 'sexy', 2, '2016-10-28 20:40:21', '2016-10-28 20:40:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNo` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `companyStartFrom` varchar(255) NOT NULL,
  `userType` tinyint(1) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phoneNo`, `image`, `job`, `description`, `address`, `companyStartFrom`, `userType`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'alaaDragneel', 'alaa_dragneel@yahoo.com', '01096901954', 'src/backend/dist/img/avatar5.png', 'web develpment', '', '', '', 1, '$2y$10$GVaH3AsgVpIY3nVLwvswEOiCVA9l7bwnEw2tCtwbt6oDmiBApG/Mu', 'ban7KfMbA1YieEerprchUvHrC0FH4ukLCiafQ7K7YsaLIBdY9MD7o5SECMdV', '2016-10-28 17:14:19', '2016-10-28 17:25:38'),
(2, 'sasuke_alaa', 'sasuke_alaa@yahoo.com', '01196901954', 'src/backend/dist/img/avatar5.png', 'Web Design', '', '', '', 2, '$2y$10$KaEUUOdm8FcI8Z.FTG8HfewAOLAIaanqIpZbJydP/.j7GwXZHD5tG', 'bgR1RQRXANDoGzz45S2p7VVPhlOoVdfgzXvJNVxAIzMTc7HN9AU7sNiVLKys', '2016-10-28 17:14:19', '2016-10-28 17:29:44'),
(3, 'moaalaa', 'moaalaa@yahoo.com', '01296901954', 'src/backend/dist/img/avatar5.png', 'SEO', '', '', '', 3, '$2y$10$w9o2zB1t7Ti8ITXDZnB2DusdcJXCC9VTXh4T61O3oyvwFp1de5y1a', NULL, '2016-10-28 17:14:20', '2016-10-28 17:14:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bmcs`
--
ALTER TABLE `bmcs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bmcs_user_id_foreign` (`user_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_bmc_id_foreign` (`BMC_id`),
  ADD KEY `tasks_teamwork_id_foreign` (`teamWork_id`);

--
-- Indexes for table `teamworks`
--
ALTER TABLE `teamworks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teamworks_email_unique` (`email`),
  ADD KEY `teamworks_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `bmcs`
--
ALTER TABLE `bmcs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teamworks`
--
ALTER TABLE `teamworks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bmcs`
--
ALTER TABLE `bmcs`
  ADD CONSTRAINT `bmcs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_bmc_id_foreign` FOREIGN KEY (`BMC_id`) REFERENCES `bmcs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tasks_teamwork_id_foreign` FOREIGN KEY (`teamWork_id`) REFERENCES `teamworks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teamworks`
--
ALTER TABLE `teamworks`
  ADD CONSTRAINT `teamworks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
