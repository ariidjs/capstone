-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2021 at 05:40 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bansos`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_tracking`
--

CREATE TABLE `detail_tracking` (
  `id_track` bigint(20) UNSIGNED NOT NULL,
  `lokasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_tracking`
--

INSERT INTO `detail_tracking` (`id_track`, `lokasi`, `waktu`, `created_at`, `updated_at`) VALUES
(5, 'Padang', '2021-07-09 13:07:01', '2021-06-02 14:28:57', '2021-06-02 14:28:57'),
(5, 'Padang', '2021-07-09 13:07:01', '2021-06-02 14:30:51', '2021-06-02 14:30:51'),
(5, 'Padang', '2021-07-09 13:07:01', '2021-06-02 14:30:54', '2021-06-02 14:30:54'),
(6, 'Padang', '2021-07-09 13:07:01', '2021-06-02 14:53:28', '2021-06-02 14:53:28'),
(6, 'Padang', '2021-07-09 13:07:01', '2021-06-02 14:53:31', '2021-06-02 14:53:31'),
(7, 'Padang', '2021-07-09 13:07:01', '2021-06-02 15:12:30', '2021-06-02 15:12:30'),
(7, 'Padang', '2021-07-09 13:07:01', '2021-06-02 15:12:31', '2021-06-02 15:12:31'),
(7, 'Padang', '2021-07-09 13:07:01', '2021-06-02 15:12:31', '2021-06-02 15:12:31'),
(7, 'Padang', '2021-07-09 13:07:01', '2021-06-02 15:12:32', '2021-06-02 15:12:32'),
(7, 'Padang', '2021-07-09 13:07:01', '2021-06-02 15:12:33', '2021-06-02 15:12:33');

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
(1, '2021_05_30_091218_create_penerima_table', 1),
(4, '2021_06_02_130342_create_tracking_table', 2),
(5, '2021_06_02_130455_create_detail_tracking_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `penerima`
--

CREATE TABLE `penerima` (
  `id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` bigint(20) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` bigint(20) NOT NULL,
  `gaji` bigint(20) NOT NULL,
  `pekerjaan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggungan` mediumint(9) NOT NULL,
  `umur` int(4) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penerima`
--

INSERT INTO `penerima` (`id`, `nik`, `nama`, `alamat`, `no_hp`, `gaji`, `pekerjaan`, `tanggungan`, `umur`, `status`, `updated_at`, `created_at`) VALUES
('2RTGN4', 1371091102980032, 'anjel', 'gaduik', 81265411456, 6, 'mahasiswa', 10, 22, 0, '2021-06-02 12:45:58', '2021-06-02 12:45:58');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `id` int(10) UNSIGNED NOT NULL,
  `nik_penerima` bigint(20) NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`id`, `nik_penerima`, `alamat`, `status`, `updated_at`, `created_at`) VALUES
(6, 1371091102980032, 'Padang', 'Selesai', '2021-06-02 15:07:02', '2021-06-02 14:53:02'),
(7, 1371091102980032, 'Padang', '1', '2021-06-02 15:11:53', '2021-06-02 15:11:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penerima`
--
ALTER TABLE `penerima`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
