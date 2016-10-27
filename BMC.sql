-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2016 at 06:58 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

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
  `job` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'alaaDragneel', 'alaa_dragneel@yahoo.com', '01096901954', 'src/backend/dist/img/avatar5.png', 'Web Developer', '', '', '', 1, '$2y$10$XzNqmjTpVcAI3CFRMWqQvuKwT2H7cdZNgykSWymfIrm.cvaoPhTs6', 'ZSB38Riw5NtkNcxtBupdMRwMGZwO2uhUhQ9OiHMLhU27Y964xSVyLoM7oe71', '2016-10-27 12:03:53', '2016-10-27 14:23:20'),
(2, 'alaa', 'moaalaa16@gmail.com', '0101100101', 'src/backend/dist/img/avatar5.png', '', '', '', '', 3, '$2y$10$EMXF8UBZgBLOwL3f9Ezq4eCWSvu0A5U3aDHySJz9/W1gTaZEarA3K', 'AAZKurgHzPgag6bq4xYMLmsPHNh22kVcOXMyQqWijqGFAfhcYema3Q31rCGM', '2016-10-27 12:36:38', '2016-10-27 12:37:05'),
(3, 'sasuke', 'sasuke@yahoo.com', '0101010', 'src/backend/dist/img/avatar5.png', '', '', '', '', 2, '$2y$10$6oFH55VsuKhPoC4kFdxCf.AZn95EEP5l29ra3n0eQx6wNpZKtEOOG', '6ZELmu3aO8Bo8exvUw5LrpcdAo85PaHhN7R2vuETG1hzjV3Dvgra1yyAxLHb', '2016-10-27 13:49:10', '2016-10-27 14:26:14'),
(4, 'moaalaa', 'moaalaa16@yahoo.com', '010100101', 'src/backend/dist/img/avatar5.png', '', '', '', '', 3, '$2y$10$u3uc0Cj7ozGYxWFHIkze2.6.PNdedW62G59GoL65KaTvmbS0mw4V.', 'qvIXrb9Zf94LNiCTnCOGE1l9cVDs8Y38MWXxInJtMgPkUhYD2teF4HokzOKw', '2016-10-27 13:49:30', '2016-10-27 14:17:03');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
