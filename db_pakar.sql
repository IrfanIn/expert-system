-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 03:46 PM
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
-- Database: `db_pakar`
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

-- --------------------------------------------------------

--
-- Table structure for table `diagnosas`
--

CREATE TABLE `diagnosas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gejala_id` bigint(20) UNSIGNED NOT NULL,
  `penyakit_id` bigint(20) UNSIGNED NOT NULL,
  `hipotesa` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diagnosas`
--

INSERT INTO `diagnosas` (`id`, `gejala_id`, `penyakit_id`, `hipotesa`, `created_at`, `updated_at`) VALUES
(10, 1, 2, 0.8, '2024-05-02 03:00:55', '2024-05-02 03:00:55'),
(11, 2, 2, 0.7, '2024-05-02 03:00:55', '2024-05-02 03:00:55'),
(12, 3, 2, 0.8, '2024-05-02 03:00:55', '2024-05-02 03:00:55'),
(13, 4, 2, 0.6, '2024-05-02 03:00:55', '2024-05-02 03:00:55'),
(14, 5, 2, 0.7, '2024-05-02 03:00:55', '2024-05-02 03:00:55'),
(15, 6, 2, 0.8, '2024-05-02 03:00:55', '2024-05-02 03:00:55'),
(16, 7, 2, 0.8, '2024-05-02 03:00:55', '2024-05-02 03:00:55'),
(17, 8, 2, 0.7, '2024-05-02 03:00:55', '2024-05-02 03:00:55'),
(18, 2, 3, 0.7, '2024-05-02 03:04:53', '2024-05-02 03:04:53'),
(19, 3, 3, 0.8, '2024-05-02 03:04:53', '2024-05-02 03:04:53'),
(20, 6, 3, 0.6, '2024-05-02 03:04:53', '2024-05-02 03:04:53'),
(21, 9, 3, 0.8, '2024-05-02 03:04:53', '2024-05-02 03:04:53'),
(22, 10, 3, 0.7, '2024-05-02 03:04:53', '2024-05-02 03:04:53'),
(23, 11, 3, 0.6, '2024-05-02 03:04:53', '2024-05-02 03:04:53'),
(24, 12, 3, 0.7, '2024-05-02 03:04:53', '2024-05-02 03:04:53'),
(25, 13, 3, 0.8, '2024-05-02 03:04:53', '2024-05-02 03:04:53'),
(26, 14, 3, 0.7, '2024-05-02 03:04:53', '2024-05-02 03:04:53'),
(27, 15, 3, 0, '2024-05-02 03:04:53', '2024-05-02 03:04:53'),
(28, 1, 4, 0.9, '2024-05-02 03:05:57', '2024-05-02 03:05:57'),
(29, 4, 4, 0.7, '2024-05-02 03:05:57', '2024-05-02 03:05:57'),
(30, 5, 4, 0.8, '2024-05-02 03:05:57', '2024-05-02 03:05:57'),
(31, 16, 4, 0.7, '2024-05-02 03:05:57', '2024-05-02 03:05:57'),
(32, 17, 4, 0.8, '2024-05-02 03:05:57', '2024-05-02 03:05:57'),
(33, 18, 4, 0.7, '2024-05-02 03:05:57', '2024-05-02 03:05:57'),
(34, 21, 4, 0.6, '2024-05-02 03:05:57', '2024-05-02 03:05:57'),
(35, 2, 5, 0.7, '2024-05-02 03:06:43', '2024-05-02 03:06:43'),
(36, 3, 5, 0.7, '2024-05-02 03:06:43', '2024-05-02 03:06:43'),
(37, 18, 5, 0.8, '2024-05-02 03:06:43', '2024-05-02 03:06:43'),
(38, 19, 5, 0.6, '2024-05-02 03:06:43', '2024-05-02 03:06:43'),
(39, 20, 5, 0.7, '2024-05-02 03:06:43', '2024-05-02 03:06:43');

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
(1, 'Nyeri dada', '2024-05-02 02:50:59', '2024-05-02 02:50:59'),
(2, 'Sesak nafas', '2024-05-02 02:53:36', '2024-05-02 02:53:36'),
(3, 'Kelelahan berlebih', '2024-05-02 02:53:36', '2024-05-02 02:53:36'),
(4, 'Detak jantung lebih cepat', '2024-05-02 02:53:36', '2024-05-02 02:53:36'),
(5, 'Berkeringat dingin', '2024-05-02 02:53:36', '2024-05-02 02:53:36'),
(6, 'Pusing', '2024-05-02 02:53:36', '2024-05-02 02:53:36'),
(7, 'Mual hingga muntah', '2024-05-02 02:53:36', '2024-05-02 02:53:36'),
(8, 'Nyeri perut bagian atas', '2024-05-02 02:53:36', '2024-05-02 02:53:36'),
(9, 'Pembengkakan pada kaki', '2024-05-02 02:53:36', '2024-05-02 02:53:36'),
(10, 'Pembengkakan pada perut', '2024-05-02 02:53:36', '2024-05-02 02:53:36'),
(11, 'Kenaikan berat badan', '2024-05-02 02:53:36', '2024-05-02 02:53:36'),
(12, 'Sering buang air kecil malam hari', '2024-05-02 02:53:36', '2024-05-02 02:53:36'),
(13, 'Hilang nafsu makan', '2024-05-02 02:53:36', '2024-05-02 02:53:36'),
(14, 'Suara nafas berbunyi ( mungi )', '2024-05-02 02:53:36', '2024-05-02 02:53:36'),
(15, 'Batuk disertai lendir berwarna merah muda', '2024-05-02 02:53:36', '2024-05-02 02:53:36'),
(16, 'Rasa debar yang kencang di dada', '2024-05-02 02:53:36', '2024-05-02 02:53:36'),
(17, 'Terasa denyutan di leher', '2024-05-02 02:53:36', '2024-05-02 02:53:36'),
(18, 'Sakit kepala', '2024-05-02 02:53:36', '2024-05-02 02:53:36'),
(19, 'Detak jantung yang lambat', '2024-05-02 02:53:36', '2024-05-02 02:53:36'),
(20, 'Sulit berkonsentrasi', '2024-05-02 02:53:36', '2024-05-02 02:53:36'),
(21, 'Merasa lelah', '2024-05-02 02:53:36', '2024-05-02 02:53:36');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penyakits`
--

INSERT INTO `penyakits` (`id`, `penyakit`, `created_at`, `updated_at`) VALUES
(2, 'Serangan jantung', '2024-05-02 03:00:55', '2024-05-02 03:00:55'),
(3, 'Gagal Jantung', '2024-05-02 03:04:53', '2024-05-02 03:04:53'),
(4, 'Aritmia Takikardia', '2024-05-02 03:05:57', '2024-05-02 03:05:57'),
(5, 'Aritmia Bradikardia', '2024-05-02 03:06:43', '2024-05-02 03:06:43');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `analisa_details`
--
ALTER TABLE `analisa_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diagnosas`
--
ALTER TABLE `diagnosas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `gejalas`
--
ALTER TABLE `gejalas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `penyakits`
--
ALTER TABLE `penyakits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
