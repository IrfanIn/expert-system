-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2024 at 11:07 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-pakar`
--

-- --------------------------------------------------------

--
-- Table structure for table `analisas`
--

CREATE TABLE `analisas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `analisas`
--

INSERT INTO `analisas` (`id`, `username`, `created_at`, `updated_at`) VALUES
(30, 'Irfan', '2024-02-25 01:38:57', '2024-02-25 01:38:57'),
(31, 'Joestar', '2024-02-25 02:09:07', '2024-02-25 02:09:07'),
(32, 'jean', '2024-02-25 03:02:21', '2024-02-25 03:02:21');

-- --------------------------------------------------------

--
-- Table structure for table `analisa_details`
--

CREATE TABLE `analisa_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `analisa_id` bigint(20) UNSIGNED NOT NULL,
  `penyakit_id` bigint(20) UNSIGNED NOT NULL,
  `accuracy` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `analisa_details`
--

INSERT INTO `analisa_details` (`id`, `analisa_id`, `penyakit_id`, `accuracy`, `created_at`, `updated_at`) VALUES
(39, 30, 2, 66.67, '2024-02-25 01:38:57', '2024-02-25 01:38:57'),
(40, 30, 3, 33.33, '2024-02-25 01:38:57', '2024-02-25 01:38:57'),
(41, 31, 2, 100.00, '2024-02-25 02:09:07', '2024-02-25 02:09:07'),
(42, 32, 2, 100.00, '2024-02-25 03:02:21', '2024-02-25 03:02:21');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosas`
--

CREATE TABLE `diagnosas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rule_id` bigint(20) UNSIGNED NOT NULL,
  `penyakit_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diagnosas`
--

INSERT INTO `diagnosas` (`id`, `rule_id`, `penyakit_id`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '2024-02-25 00:24:31', '2024-02-25 00:24:31'),
(2, 3, 2, '2024-02-25 00:24:31', '2024-02-25 00:24:31'),
(3, 4, 3, '2024-02-25 00:39:19', '2024-02-25 00:39:19');

-- --------------------------------------------------------

--
-- Table structure for table `gejalas`
--

CREATE TABLE `gejalas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gejala` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gejalas`
--

INSERT INTO `gejalas` (`id`, `gejala`, `created_at`, `updated_at`) VALUES
(4, 'Diare dengan tinja berlemak', '2024-02-25 00:24:31', '2024-02-25 00:24:31'),
(5, 'Mual dan muntah', '2024-02-25 00:24:31', '2024-02-25 00:24:31'),
(6, 'Perut buncit', '2024-02-25 00:24:31', '2024-02-25 00:24:31'),
(7, 's', '2024-02-25 00:39:19', '2024-02-25 00:39:19');

-- --------------------------------------------------------

--
-- Table structure for table `gejala_details`
--

CREATE TABLE `gejala_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gejala_id` bigint(20) UNSIGNED NOT NULL,
  `penyakit_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gejala_details`
--

INSERT INTO `gejala_details` (`id`, `gejala_id`, `penyakit_id`, `created_at`, `updated_at`) VALUES
(4, 4, 2, '2024-02-25 00:24:31', '2024-02-25 00:24:31'),
(5, 5, 2, '2024-02-25 00:24:31', '2024-02-25 00:24:31'),
(6, 6, 2, '2024-02-25 00:24:31', '2024-02-25 00:24:31'),
(7, 7, 3, '2024-02-25 00:39:19', '2024-02-25 00:39:19');

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_02_03_120606_create_users_table', 1),
(3, '2024_02_21_123026_create_diagnosas_table', 1),
(4, '2024_02_21_123225_create_gejalas_table', 1),
(5, '2024_02_21_123327_create_penyakits_table', 1),
(6, '2024_02_21_123543_create_solusis_table', 1),
(7, '2024_02_21_133918_create_rules_table', 1),
(8, '2024_02_25_033909_create_gejala_details_table', 1),
(9, '2024_02_25_074520_create_analisas_table', 2),
(10, '2024_02_25_074811_create_analisa_details_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `penyakits`
--

CREATE TABLE `penyakits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penyakit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penyakits`
--

INSERT INTO `penyakits` (`id`, `penyakit`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 'Abetalipoproteinemia', 'Abetalipoproteinemia adalah kelainan bawaan langka yang menyebabkan tubuh tidak dapat menyerap dan mencerna lemak dengan baik. Akibatnya, penderita abetalipoproteinemia sering kali mengalami kekurangan vitamin A, D, E, dan K yang parah.', '2024-02-25 00:24:31', '2024-02-25 00:24:31'),
(3, 's', 's', '2024-02-25 00:39:19', '2024-02-25 00:39:19');

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
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penyakit_id` bigint(20) UNSIGNED NOT NULL,
  `rule` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `penyakit_id`, `rule`, `created_at`, `updated_at`) VALUES
(2, 2, 'Apakah mengalami pembengkakan pada mata?', '2024-02-25 00:24:31', '2024-02-25 00:24:31'),
(3, 2, 'Apakah anda mengalami gangguan darah sepert anemia?', '2024-02-25 00:24:31', '2024-02-25 00:24:31'),
(4, 3, 's', '2024-02-25 00:39:19', '2024-02-25 00:39:19');

-- --------------------------------------------------------

--
-- Table structure for table `solusis`
--

CREATE TABLE `solusis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penyakit_id` bigint(20) UNSIGNED NOT NULL,
  `solusi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `solusis`
--

INSERT INTO `solusis` (`id`, `penyakit_id`, `solusi`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pemberian suplemen vitamin A, D, E, dan K bertujuan untuk meredakan gejala dan mencegah komplikasi. Suplemen vitamin E dan A dapat diberikan untuk mengatasi gangguan pada saraf dan mata.', '2024-02-25 00:23:02', '2024-02-25 00:23:02'),
(2, 2, 'Pemberian suplemen vitamin A, D, E, dan K bertujuan untuk meredakan gejala dan mencegah komplikasi. Suplemen vitamin E dan A dapat diberikan untuk mengatasi gangguan pada saraf dan mata.', '2024-02-25 00:24:31', '2024-02-25 00:24:31'),
(3, 3, 's', '2024-02-25 00:39:19', '2024-02-25 00:39:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `created_at`, `updated_at`) VALUES
(10, 'Irfan', 'fan@gmail.com', NULL, '$2y$10$MH3GeWJ8oPrSwD34rrUDQ.XSdWXbQdEQJODgaSrnbnd9aEiwv.4CO', '2024-02-25 02:48:52', '2024-02-25 02:48:52'),
(11, 'asdf', 'saf@gmail.com', NULL, '$2y$10$yylYyimCuSNWGgNeOLDUqOp3xKXyhnrHAti.aCeXcV8GYQcciArhO', '2024-02-25 02:49:58', '2024-02-25 02:49:58'),
(12, 'asdfsadf', 'sadfas@gmail.com', NULL, '$2y$10$gDZeGATa46dlPyu0hjm81.D78eJlAhorGxHRFK2WoATZ3e3GTbdfy', '2024-02-25 02:50:28', '2024-02-25 02:50:28'),
(14, 'jean', 'jean@gmail.com', NULL, '$2y$10$g6w02Ne.SLLD0t7Lqnpn0./9tPEdNDCsgT5Lm0om1EKMYjb9/ESRm', '2024-02-25 03:00:34', '2024-02-25 03:00:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analisas`
--
ALTER TABLE `analisas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `analisa_details`
--
ALTER TABLE `analisa_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosas`
--
ALTER TABLE `diagnosas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gejalas`
--
ALTER TABLE `gejalas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gejala_details`
--
ALTER TABLE `gejala_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyakits`
--
ALTER TABLE `penyakits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solusis`
--
ALTER TABLE `solusis`
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
-- AUTO_INCREMENT for table `analisas`
--
ALTER TABLE `analisas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `analisa_details`
--
ALTER TABLE `analisa_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `diagnosas`
--
ALTER TABLE `diagnosas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gejalas`
--
ALTER TABLE `gejalas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gejala_details`
--
ALTER TABLE `gejala_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `penyakits`
--
ALTER TABLE `penyakits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `solusis`
--
ALTER TABLE `solusis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
