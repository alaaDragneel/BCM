-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2016 at 06:55 PM
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
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `chaneels`
--

CREATE TABLE `chaneels` (
  `id` int(10) UNSIGNED NOT NULL,
  `ch_title` varchar(255) NOT NULL,
  `ch_desc` text NOT NULL,
  `BMC_id` int(10) UNSIGNED NOT NULL,
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
-- Table structure for table `cost_structure`
--

CREATE TABLE `cost_structure` (
  `id` int(10) UNSIGNED NOT NULL,
  `cst_title` varchar(255) NOT NULL,
  `cst_desc` text NOT NULL,
  `BMC_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_relation`
--

CREATE TABLE `customer_relation` (
  `id` int(10) UNSIGNED NOT NULL,
  `cr_title` varchar(255) NOT NULL,
  `cr_desc` text NOT NULL,
  `BMC_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_segments`
--

CREATE TABLE `customer_segments` (
  `id` int(10) UNSIGNED NOT NULL,
  `cs_title` varchar(255) NOT NULL,
  `cs_desc` text NOT NULL,
  `BMC_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `key_activity`
--

CREATE TABLE `key_activity` (
  `id` int(10) UNSIGNED NOT NULL,
  `ka_title` varchar(255) NOT NULL,
  `ka_memper` varchar(255) NOT NULL,
  `ka_job` varchar(255) NOT NULL,
  `ka_desc` text NOT NULL,
  `BMC_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `key_parteners`
--

CREATE TABLE `key_parteners` (
  `id` int(10) UNSIGNED NOT NULL,
  `kp_name` varchar(255) NOT NULL,
  `kp_num` varchar(255) NOT NULL,
  `kp_email` varchar(255) NOT NULL,
  `kp_job` varchar(255) NOT NULL,
  `kp_desc` text NOT NULL,
  `BMC_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `key_resources`
--

CREATE TABLE `key_resources` (
  `id` int(10) UNSIGNED NOT NULL,
  `kr_title` varchar(255) NOT NULL,
  `kr_desc` text NOT NULL,
  `BMC_id` int(10) UNSIGNED NOT NULL,
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
('2016_10_27_132821_create_messages_table', 1),
('2016_10_30_145226_create_key_partener_table', 1),
('2016_10_30_145430_create_key_activity_table', 1),
('2016_10_30_145720_create_value_porposition_table', 1),
('2016_10_30_145802_create_customer_relation_table', 1),
('2016_10_30_145847_create_customer_segments_table', 1),
('2016_10_30_145922_create_key_resources_table', 1),
('2016_10_30_145955_create_chaneels_table', 1),
('2016_10_30_150048_create_cost_structure_table', 1),
('2016_10_30_150136_create_revenue_streams_table', 1);

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
-- Table structure for table `revenue_streams`
--

CREATE TABLE `revenue_streams` (
  `id` int(10) UNSIGNED NOT NULL,
  `rs_title` varchar(255) NOT NULL,
  `rs_desc` text NOT NULL,
  `BMC_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `value_porposition`
--

CREATE TABLE `value_porposition` (
  `id` int(10) UNSIGNED NOT NULL,
  `vp_title` varchar(255) NOT NULL,
  `vp_desc` text NOT NULL,
  `BMC_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indexes for table `chaneels`
--
ALTER TABLE `chaneels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chaneels_bmc_id_foreign` (`BMC_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cost_structure`
--
ALTER TABLE `cost_structure`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cost_structure_bmc_id_foreign` (`BMC_id`);

--
-- Indexes for table `customer_relation`
--
ALTER TABLE `customer_relation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_relation_bmc_id_foreign` (`BMC_id`);

--
-- Indexes for table `customer_segments`
--
ALTER TABLE `customer_segments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_segments_bmc_id_foreign` (`BMC_id`);

--
-- Indexes for table `key_activity`
--
ALTER TABLE `key_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `key_activity_bmc_id_foreign` (`BMC_id`),
  ADD KEY `key_activity_user_id_foreign` (`user_id`);

--
-- Indexes for table `key_parteners`
--
ALTER TABLE `key_parteners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `key_parteners_bmc_id_foreign` (`BMC_id`);

--
-- Indexes for table `key_resources`
--
ALTER TABLE `key_resources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `key_resources_bmc_id_foreign` (`BMC_id`);

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
-- Indexes for table `revenue_streams`
--
ALTER TABLE `revenue_streams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `revenue_streams_bmc_id_foreign` (`BMC_id`);

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
-- Indexes for table `value_porposition`
--
ALTER TABLE `value_porposition`
  ADD PRIMARY KEY (`id`),
  ADD KEY `value_porposition_bmc_id_foreign` (`BMC_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bmcs`
--
ALTER TABLE `bmcs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `chaneels`
--
ALTER TABLE `chaneels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cost_structure`
--
ALTER TABLE `cost_structure`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_relation`
--
ALTER TABLE `customer_relation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_segments`
--
ALTER TABLE `customer_segments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `key_activity`
--
ALTER TABLE `key_activity`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `key_parteners`
--
ALTER TABLE `key_parteners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `key_resources`
--
ALTER TABLE `key_resources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `revenue_streams`
--
ALTER TABLE `revenue_streams`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `value_porposition`
--
ALTER TABLE `value_porposition`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bmcs`
--
ALTER TABLE `bmcs`
  ADD CONSTRAINT `bmcs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chaneels`
--
ALTER TABLE `chaneels`
  ADD CONSTRAINT `chaneels_bmc_id_foreign` FOREIGN KEY (`BMC_id`) REFERENCES `bmcs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cost_structure`
--
ALTER TABLE `cost_structure`
  ADD CONSTRAINT `cost_structure_bmc_id_foreign` FOREIGN KEY (`BMC_id`) REFERENCES `bmcs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_relation`
--
ALTER TABLE `customer_relation`
  ADD CONSTRAINT `customer_relation_bmc_id_foreign` FOREIGN KEY (`BMC_id`) REFERENCES `bmcs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_segments`
--
ALTER TABLE `customer_segments`
  ADD CONSTRAINT `customer_segments_bmc_id_foreign` FOREIGN KEY (`BMC_id`) REFERENCES `bmcs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `key_activity`
--
ALTER TABLE `key_activity`
  ADD CONSTRAINT `key_activity_bmc_id_foreign` FOREIGN KEY (`BMC_id`) REFERENCES `bmcs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `key_activity_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `key_parteners`
--
ALTER TABLE `key_parteners`
  ADD CONSTRAINT `key_parteners_bmc_id_foreign` FOREIGN KEY (`BMC_id`) REFERENCES `bmcs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `key_resources`
--
ALTER TABLE `key_resources`
  ADD CONSTRAINT `key_resources_bmc_id_foreign` FOREIGN KEY (`BMC_id`) REFERENCES `bmcs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `revenue_streams`
--
ALTER TABLE `revenue_streams`
  ADD CONSTRAINT `revenue_streams_bmc_id_foreign` FOREIGN KEY (`BMC_id`) REFERENCES `bmcs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Constraints for table `value_porposition`
--
ALTER TABLE `value_porposition`
  ADD CONSTRAINT `value_porposition_bmc_id_foreign` FOREIGN KEY (`BMC_id`) REFERENCES `bmcs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
