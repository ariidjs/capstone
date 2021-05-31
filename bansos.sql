-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2021 at 04:19 PM
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
  `id` int(11) NOT NULL,
  `id_track` varchar(6) NOT NULL,
  `jam` time NOT NULL,
  `tanggal` date NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, '2021_05_30_091218_create_penerima_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penerima`
--

CREATE TABLE `penerima` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gaji` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggungan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penerima`
--

INSERT INTO `penerima` (`id`, `nama`, `alamat`, `gaji`, `pekerjaan`, `tanggungan`, `umur`, `status`, `updated_at`, `created_at`) VALUES
('CF1YH9', 'anjel', 'padang', '6.0', 'mahasiswa', '10', '22', '1', '2021-05-31', '2021-05-30'),
('3VC4SP', 'anjel', 'padang', '6.0', 'mahasiswa', '10', '22', '0', '2021-05-30', '2021-05-30'),
('028N4T', 'anjel', 'padang', '6.0', 'mahasiswa', '10', '22', '1', '2021-05-31', '2021-05-30'),
('62X19I', 'anjel', 'padang', '6.0', 'mahasiswa', '10', '22', '0', '2021-05-30', '2021-05-30'),
('LTO495', 'anjel', 'padang', '6.0', 'mahasiswa', '10', '22', '0', '2021-05-30', '2021-05-30'),
('WVMJ98', 'anjel', 'padang', '6.0', 'mahasiswa', '10', '22', '0', '2021-05-30', '2021-05-30'),
('ZTK5N3', 'anjel', 'padang', '6.0', 'mahasiswa', '10', '22', '0', '2021-05-30', '2021-05-30'),
('M2Y0BV', 'anjel', 'padang', '6.0', 'mahasiswa', '10', '22', '0', '2021-05-30', '2021-05-30'),
('6HU3EQ', 'anjel', 'padang', '6.0', 'mahasiswa', '10', '22', '0', '2021-05-31', '2021-05-31');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `id` varchar(6) NOT NULL,
  `alamat` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_tracking`
--
ALTER TABLE `detail_tracking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_track` (`id_track`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_tracking`
--
ALTER TABLE `detail_tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_tracking`
--
ALTER TABLE `detail_tracking`
  ADD CONSTRAINT `detail_tracking_ibfk_1` FOREIGN KEY (`id_track`) REFERENCES `tracking` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
