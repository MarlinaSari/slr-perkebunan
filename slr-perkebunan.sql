-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 20 Okt 2024 pada 06.56
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slr-perkebunan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_produksi`
--

CREATE TABLE `data_produksi` (
  `id` bigint UNSIGNED NOT NULL,
  `tahun` int NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periode` int NOT NULL,
  `jenis_tanaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produksi` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kakaos`
--

CREATE TABLE `kakaos` (
  `id` bigint UNSIGNED NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` year NOT NULL,
  `periode` int NOT NULL,
  `produksi` double NOT NULL,
  `alpha` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kakaos`
--

INSERT INTO `kakaos` (`id`, `lokasi`, `tahun`, `periode`, `produksi`, `alpha`) VALUES
(1, 'Johan Pahlawan', '2018', 1, 1.67, NULL),
(2, 'Johan Pahlawan', '2019', 2, 5.2, NULL),
(3, 'Johan Pahlawan', '2020', 3, 1.67, NULL),
(4, 'Johan Pahlawan', '2021', 4, 1.67, NULL),
(5, 'Johan Pahlawan', '2022', 5, 1.67, NULL),
(6, 'Johan Pahlawan', '2023', 6, 1.2, NULL),
(7, 'Samatiga', '2018', 1, 10.88, NULL),
(8, 'Samatiga', '2019', 2, 28.6, NULL),
(9, 'Samatiga', '2020', 3, 11.44, NULL),
(10, 'Samatiga', '2021', 4, 11.44, NULL),
(11, 'Samatiga', '2022', 5, 9.3, NULL),
(12, 'Samatiga', '2023', 6, 6.3, NULL),
(13, 'Bubon', '2018', 1, 11.112, NULL),
(14, 'Bubon', '2019', 2, 19.71, NULL),
(15, 'Bubon', '2020', 3, 15.11, NULL),
(16, 'Bubon', '2021', 4, 15.11, NULL),
(17, 'Bubon', '2022', 5, 14.14, NULL),
(18, 'Bubon', '2023', 6, 12.2, NULL),
(19, 'Arongan Lambalek', '2018', 1, 29.776, NULL),
(20, 'Arongan Lambalek', '2019', 2, 66.8, NULL),
(21, 'Arongan Lambalek', '2020', 3, 48.18, NULL),
(22, 'Arongan Lambalek', '2021', 4, 48.18, NULL),
(23, 'Arongan Lambalek', '2022', 5, 46.9, NULL),
(24, 'Arongan Lambalek', '2023', 6, 32.3, NULL),
(25, 'Woyla', '2018', 1, 32.18, NULL),
(26, 'Woyla', '2019', 2, 39.84, NULL),
(27, 'Woyla', '2020', 3, 32.18, NULL),
(28, 'Woyla', '2021', 4, 32.18, NULL),
(29, 'Woyla', '2022', 5, 31.4, NULL),
(30, 'Woyla', '2023', 6, 24.7, NULL),
(31, 'Woyla Barat', '2018', 1, 3.6, NULL),
(32, 'Woyla Barat', '2019', 2, 34.96, NULL),
(33, 'Woyla Barat', '2020', 3, 30.39, NULL),
(34, 'Woyla Barat', '2021', 4, 30.39, NULL),
(35, 'Woyla Barat', '2022', 5, 28.56, NULL),
(36, 'Woyla Barat', '2023', 6, 19.5, NULL),
(37, 'Woyla Timur', '2018', 1, 28.4, NULL),
(38, 'Woyla Timur', '2019', 2, 8.88, NULL),
(39, 'Woyla Timur', '2020', 3, 3.89, NULL),
(40, 'Woyla Timur', '2021', 4, 3.89, NULL),
(41, 'Woyla Timur', '2022', 5, 4.21, NULL),
(42, 'Woyla Timur', '2023', 6, 2.2, NULL),
(43, 'Kaway XVI', '2018', 1, 24.516, NULL),
(44, 'Kaway XVI', '2019', 2, 40.6, NULL),
(45, 'Kaway XVI', '2020', 3, 28.21, NULL),
(46, 'Kaway XVI', '2021', 4, 28.21, NULL),
(47, 'Kaway XVI', '2022', 5, 31, NULL),
(48, 'Kaway XVI', '2023', 6, 22, NULL),
(49, 'Meureubo', '2018', 1, 28.2018, NULL),
(50, 'Meureubo', '2019', 2, 34.8, NULL),
(51, 'Meureubo', '2020', 3, 32.21, NULL),
(52, 'Meureubo', '2021', 4, 31.21, NULL),
(53, 'Meureubo', '2022', 5, 33.9, NULL),
(54, 'Meureubo', '2023', 6, 26.7, NULL),
(55, 'Pante Ceureumen', '2018', 1, 9.988, NULL),
(56, 'Pante Ceureumen', '2019', 2, 24.88, NULL),
(57, 'Pante Ceureumen', '2020', 3, 13.99, NULL),
(58, 'Pante Ceureumen', '2021', 4, 13.99, NULL),
(59, 'Pante Ceureumen', '2022', 5, 12.35, NULL),
(60, 'Pante Ceureumen', '2023', 6, 8.7, NULL),
(61, 'Panton Reu', '2018', 1, 19.4, NULL),
(62, 'Panton Reu', '2019', 2, 24.24, NULL),
(63, 'Panton Reu', '2020', 3, 20.6, NULL),
(64, 'Panton Reu', '2021', 4, 20.6, NULL),
(65, 'Panton Reu', '2022', 5, 22.9, NULL),
(66, 'Panton Reu', '2023', 6, 12.2, NULL),
(67, 'Sungai Mas', '2018', 1, 11.99, NULL),
(68, 'Sungai Mas', '2019', 2, 19, NULL),
(69, 'Sungai Mas', '2020', 3, 15.99, NULL),
(70, 'Sungai Mas', '2021', 4, 15.99, NULL),
(71, 'Sungai Mas', '2022', 5, 18.54, NULL),
(72, 'Sungai Mas', '2023', 6, 11.2, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karets`
--

CREATE TABLE `karets` (
  `id` bigint UNSIGNED NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` year NOT NULL,
  `periode` int NOT NULL,
  `produksi` double NOT NULL,
  `alpha` double(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `karets`
--

INSERT INTO `karets` (`id`, `lokasi`, `tahun`, `periode`, `produksi`, `alpha`) VALUES
(1, 'Johan Pahlawan', '2018', 1, 610, NULL),
(2, 'Johan Pahlawan', '2019', 2, 691.2, NULL),
(3, 'Johan Pahlawan', '2020', 3, 1070.28, NULL),
(4, 'Johan Pahlawan', '2021', 4, 1070.28, NULL),
(5, 'Johan Pahlawan', '2022', 5, 963, NULL),
(6, 'Johan Pahlawan', '2023', 6, 907, NULL),
(7, 'Samatiga', '2018', 1, 1665.91, NULL),
(8, 'Samatiga', '2019', 2, 3727.91, NULL),
(9, 'Samatiga', '2020', 3, 1998.91, NULL),
(10, 'Samatiga', '2021', 4, 1665.9, NULL),
(11, 'Samatiga', '2022', 5, 1667, NULL),
(12, 'Samatiga', '2023', 6, 1176, NULL),
(13, 'Bubon', '2018', 1, 1073.95, NULL),
(14, 'Bubon', '2019', 2, 3134.88, NULL),
(15, 'Bubon', '2020', 3, 1576.74, NULL),
(16, 'Bubon', '2021', 4, 1576.74, NULL),
(17, 'Bubon', '2022', 5, 1488, NULL),
(18, 'Bubon', '2023', 6, 1076, NULL),
(19, 'Arongan Lambalek', '2018', 1, 1659.78, NULL),
(20, 'Arongan Lambalek', '2019', 2, 4179.6, NULL),
(21, 'Arongan Lambalek', '2020', 3, 2395.9, NULL),
(22, 'Arongan Lambalek', '2021', 4, 2395.9, NULL),
(23, 'Arongan Lambalek', '2022', 5, 1876.7, NULL),
(24, 'Arongan Lambalek', '2023', 6, 1676, NULL),
(25, 'Woyla', '2018', 1, 1076.54, NULL),
(26, 'Woyla', '2019', 2, 4015.08, NULL),
(27, 'Woyla', '2020', 3, 2072.93, NULL),
(28, 'Woyla', '2021', 4, 2072.93, NULL),
(29, 'Woyla', '2022', 5, 1848, NULL),
(30, 'Woyla', '2023', 6, 1426, NULL),
(31, 'Woyla Barat', '2018', 1, 3692.4, NULL),
(32, 'Woyla Barat', '2019', 2, 7932.6, NULL),
(33, 'Woyla Barat', '2020', 3, 4166.79, NULL),
(34, 'Woyla Barat', '2021', 4, 4166.79, NULL),
(35, 'Woyla Barat', '2022', 5, 3616.7, NULL),
(36, 'Woyla Barat', '2023', 6, 2892, NULL),
(37, 'Woyla Timur', '2018', 1, 701.16, NULL),
(38, 'Woyla Timur', '2019', 2, 3828.44, NULL),
(39, 'Woyla Timur', '2020', 3, 1807.49, NULL),
(40, 'Woyla Timur', '2021', 4, 791.49, NULL),
(41, 'Woyla Timur', '2022', 5, 811, NULL),
(42, 'Woyla Timur', '2023', 6, 726, NULL),
(43, 'Kaway XVI', '2018', 1, 1679.28, NULL),
(44, 'Kaway XVI', '2019', 2, 4834.44, NULL),
(45, 'Kaway XVI', '2020', 3, 2467.87, NULL),
(46, 'Kaway XVI', '2021', 4, 2467.87, NULL),
(47, 'Kaway XVI', '2022', 5, 1679, NULL),
(48, 'Kaway XVI', '2023', 6, 1108, NULL),
(49, 'Meureubo', '2018', 1, 1332.97, NULL),
(50, 'Meureubo', '2019', 2, 3635.95, NULL),
(51, 'Meureubo', '2020', 3, 1353.18, NULL),
(52, 'Meureubo', '2021', 4, 1353.18, NULL),
(53, 'Meureubo', '2022', 5, 1234, NULL),
(54, 'Meureubo', '2023', 6, 933.8, NULL),
(55, 'Pante Ceureumen', '2018', 1, 1151.31, NULL),
(56, 'Pante Ceureumen', '2019', 2, 3725.55, NULL),
(57, 'Pante Ceureumen', '2020', 3, 1667.61, NULL),
(58, 'Pante Ceureumen', '2021', 4, 1667.61, NULL),
(59, 'Pante Ceureumen', '2022', 5, 1189, NULL),
(60, 'Pante Ceureumen', '2023', 6, 832, NULL),
(61, 'Panton Reu', '2018', 1, 243.5, NULL),
(62, 'Panton Reu', '2019', 2, 1836.9, NULL),
(63, 'Panton Reu', '2020', 3, 968.7, NULL),
(64, 'Panton Reu', '2021', 4, 300.48, NULL),
(65, 'Panton Reu', '2022', 5, 267.5, NULL),
(66, 'Panton Reu', '2023', 6, 167, NULL),
(67, 'Sungai Mas', '2018', 1, 869.31, NULL),
(68, 'Sungai Mas', '2019', 2, 2507.6, NULL),
(69, 'Sungai Mas', '2020', 3, 1214.08, NULL),
(70, 'Sungai Mas', '2021', 4, 1214.08, NULL),
(71, 'Sungai Mas', '2022', 5, 871.81, NULL),
(72, 'Sungai Mas', '2023', 6, 631, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelapas`
--

CREATE TABLE `kelapas` (
  `id` bigint UNSIGNED NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` year NOT NULL,
  `periode` int NOT NULL,
  `produksi` double NOT NULL,
  `alpha` double(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelapas`
--

INSERT INTO `kelapas` (`id`, `lokasi`, `tahun`, `periode`, `produksi`, `alpha`) VALUES
(1, 'Johan Pahlawan', '2018', 1, 50.77, NULL),
(2, 'Johan Pahlawan', '2019', 2, 63.1, NULL),
(3, 'Johan Pahlawan', '2020', 3, 63.1, NULL),
(4, 'Johan Pahlawan', '2021', 4, 63.1, NULL),
(5, 'Johan Pahlawan', '2022', 5, 65, NULL),
(6, 'Johan Pahlawan', '2023', 6, 65, NULL),
(7, 'Samatiga', '2018', 1, 514, NULL),
(8, 'Samatiga', '2019', 2, 283.25, NULL),
(9, 'Samatiga', '2020', 3, 283.25, NULL),
(10, 'Samatiga', '2021', 4, 283.25, NULL),
(11, 'Samatiga', '2022', 5, 292.5, NULL),
(12, 'Samatiga', '2023', 6, 296, NULL),
(13, 'Bubon', '2018', 1, 82, NULL),
(14, 'Bubon', '2019', 2, 99.6, NULL),
(15, 'Bubon', '2020', 3, 99.6, NULL),
(16, 'Bubon', '2021', 4, 99.6, NULL),
(17, 'Bubon', '2022', 5, 95, NULL),
(18, 'Bubon', '2023', 6, 68.5, NULL),
(19, 'Arongan Lambalek', '2018', 1, 569, NULL),
(20, 'Arongan Lambalek', '2019', 2, 578, NULL),
(21, 'Arongan Lambalek', '2020', 3, 578, NULL),
(22, 'Arongan Lambalek', '2021', 4, 578, NULL),
(23, 'Arongan Lambalek', '2022', 5, 519, NULL),
(24, 'Arongan Lambalek', '2023', 6, 578, NULL),
(25, 'Woyla', '2018', 1, 0, NULL),
(26, 'Woyla', '2019', 2, 56.5, NULL),
(27, 'Woyla', '2020', 3, 56.5, NULL),
(28, 'Woyla', '2021', 4, 56.5, NULL),
(29, 'Woyla', '2022', 5, 47.3, NULL),
(30, 'Woyla', '2023', 6, 37, NULL),
(31, 'Woyla Barat', '2018', 1, 20, NULL),
(32, 'Woyla Barat', '2019', 2, 37.5, NULL),
(33, 'Woyla Barat', '2020', 3, 37.5, NULL),
(34, 'Woyla Barat', '2021', 4, 27.51, NULL),
(35, 'Woyla Barat', '2022', 5, 24, NULL),
(36, 'Woyla Barat', '2023', 6, 23, NULL),
(37, 'Woyla Timur', '2018', 1, 0, NULL),
(38, 'Woyla Timur', '2019', 2, 27.5, NULL),
(39, 'Woyla Timur', '2020', 3, 27.5, NULL),
(40, 'Woyla Timur', '2021', 4, 27.51, NULL),
(41, 'Woyla Timur', '2022', 5, 24, NULL),
(42, 'Woyla Timur', '2023', 6, 20.1, NULL),
(43, 'Kaway XVI', '2018', 1, 510.4, NULL),
(44, 'Kaway XVI', '2019', 2, 176.75, NULL),
(45, 'Kaway XVI', '2020', 3, 176.75, NULL),
(46, 'Kaway XVI', '2021', 4, 146.3, NULL),
(47, 'Kaway XVI', '2022', 5, 147, NULL),
(48, 'Kaway XVI', '2023', 6, 147, NULL),
(49, 'Meureubo', '2018', 1, 534.5, NULL),
(50, 'Meureubo', '2019', 2, 200.5, NULL),
(51, 'Meureubo', '2020', 3, 200.5, NULL),
(52, 'Meureubo', '2021', 4, 200.5, NULL),
(53, 'Meureubo', '2022', 5, 246.8, NULL),
(54, 'Meureubo', '2023', 6, 289, NULL),
(55, 'Pante Ceureumen', '2018', 1, 0, NULL),
(56, 'Pante Ceureumen', '2019', 2, 138, NULL),
(57, 'Pante Ceureumen', '2020', 3, 138, NULL),
(58, 'Pante Ceureumen', '2021', 4, 302, NULL),
(59, 'Pante Ceureumen', '2022', 5, 300, NULL),
(60, 'Pante Ceureumen', '2023', 6, 282, NULL),
(61, 'Panton Reu', '2018', 1, 0, NULL),
(62, 'Panton Reu', '2019', 2, 31, NULL),
(63, 'Panton Reu', '2020', 3, 31, NULL),
(64, 'Panton Reu', '2021', 4, 61, NULL),
(65, 'Panton Reu', '2022', 5, 61, NULL),
(66, 'Panton Reu', '2023', 6, 50.6, NULL),
(67, 'Sungai Mas', '2018', 1, 0, NULL),
(68, 'Sungai Mas', '2019', 2, 34.9, NULL),
(69, 'Sungai Mas', '2020', 3, 34.9, NULL),
(70, 'Sungai Mas', '2021', 4, 26.5, NULL),
(71, 'Sungai Mas', '2022', 5, 28.7, NULL),
(72, 'Sungai Mas', '2023', 6, 26.65, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kopis`
--

CREATE TABLE `kopis` (
  `id` bigint UNSIGNED NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` year NOT NULL,
  `periode` int NOT NULL,
  `produksi` double NOT NULL,
  `alpha` double(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kopis`
--

INSERT INTO `kopis` (`id`, `lokasi`, `tahun`, `periode`, `produksi`, `alpha`) VALUES
(1, 'Johan Pahlawan', '2018', 1, 0.3, NULL),
(2, 'Johan Pahlawan', '2019', 2, 0.35, NULL),
(3, 'Johan Pahlawan', '2020', 3, 0.35, NULL),
(4, 'Johan Pahlawan', '2021', 4, 0.3, NULL),
(5, 'Johan Pahlawan', '2022', 5, 0.3, NULL),
(6, 'Johan Pahlawan', '2023', 6, 0.3, NULL),
(7, 'Samatiga', '2018', 1, 4.9, NULL),
(8, 'Samatiga', '2019', 2, 6.6, NULL),
(9, 'Samatiga', '2020', 3, 6.6, NULL),
(10, 'Samatiga', '2021', 4, 4.9, NULL),
(11, 'Samatiga', '2022', 5, 4.9, NULL),
(12, 'Samatiga', '2023', 6, 4.9, NULL),
(13, 'Bubon', '2018', 1, 3.94, NULL),
(14, 'Bubon', '2019', 2, 4.8, NULL),
(15, 'Bubon', '2020', 3, 4.8, NULL),
(16, 'Bubon', '2021', 4, 3.94, NULL),
(17, 'Bubon', '2022', 5, 3.9, NULL),
(18, 'Bubon', '2023', 6, 3.9, NULL),
(19, 'Arongan Lambalek', '2018', 1, 2.7, NULL),
(20, 'Arongan Lambalek', '2019', 2, 5.4, NULL),
(21, 'Arongan Lambalek', '2020', 3, 5.4, NULL),
(22, 'Arongan Lambalek', '2021', 4, 2.7, NULL),
(23, 'Arongan Lambalek', '2022', 5, 3, NULL),
(24, 'Arongan Lambalek', '2023', 6, 1.6, NULL),
(25, 'Woyla', '2018', 1, 11.95, NULL),
(26, 'Woyla', '2019', 2, 12.34, NULL),
(27, 'Woyla', '2020', 3, 12.34, NULL),
(28, 'Woyla', '2021', 4, 11.9, NULL),
(29, 'Woyla', '2022', 5, 11.95, NULL),
(30, 'Woyla', '2023', 6, 6.2, NULL),
(31, 'Woyla Barat', '2018', 1, 11.8, NULL),
(32, 'Woyla Barat', '2019', 2, 15.78, NULL),
(33, 'Woyla Barat', '2020', 3, 15.78, NULL),
(34, 'Woyla Barat', '2021', 4, 11.8, NULL),
(35, 'Woyla Barat', '2022', 5, 10.7, NULL),
(36, 'Woyla Barat', '2023', 6, 6, NULL),
(37, 'Woyla Timur', '2018', 1, 10.3, NULL),
(38, 'Woyla Timur', '2019', 2, 13.94, NULL),
(39, 'Woyla Timur', '2020', 3, 13.94, NULL),
(40, 'Woyla Timur', '2021', 4, 10.3, NULL),
(41, 'Woyla Timur', '2022', 5, 10.3, NULL),
(42, 'Woyla Timur', '2023', 6, 5.7, NULL),
(43, 'Kaway XVI', '2018', 1, 12.8, NULL),
(44, 'Kaway XVI', '2019', 2, 17.5, NULL),
(45, 'Kaway XVI', '2020', 3, 17.5, NULL),
(46, 'Kaway XVI', '2021', 4, 12.8, NULL),
(47, 'Kaway XVI', '2022', 5, 12.8, NULL),
(48, 'Kaway XVI', '2023', 6, 12.8, NULL),
(49, 'Meureubo', '2018', 1, 5.48, NULL),
(50, 'Meureubo', '2019', 2, 6.44, NULL),
(51, 'Meureubo', '2020', 3, 6.44, NULL),
(52, 'Meureubo', '2021', 4, 5.48, NULL),
(53, 'Meureubo', '2022', 5, 5.48, NULL),
(54, 'Meureubo', '2023', 6, 3.28, NULL),
(55, 'Pante Ceureumen', '2018', 1, 9.32, NULL),
(56, 'Pante Ceureumen', '2019', 2, 13, NULL),
(57, 'Pante Ceureumen', '2020', 3, 13, NULL),
(58, 'Pante Ceureumen', '2021', 4, 9.27, NULL),
(59, 'Pante Ceureumen', '2022', 5, 9.32, NULL),
(60, 'Pante Ceureumen', '2023', 6, 7.12, NULL),
(61, 'Panton Reu', '2018', 1, 3, NULL),
(62, 'Panton Reu', '2019', 2, 4.6, NULL),
(63, 'Panton Reu', '2020', 3, 4.6, NULL),
(64, 'Panton Reu', '2021', 4, 3, NULL),
(65, 'Panton Reu', '2022', 5, 3, NULL),
(66, 'Panton Reu', '2023', 6, 2, NULL),
(67, 'Sungai Mas', '2018', 1, 8.6, NULL),
(68, 'Sungai Mas', '2019', 2, 10.5, NULL),
(69, 'Sungai Mas', '2020', 3, 10.5, NULL),
(70, 'Sungai Mas', '2021', 4, 8.6, NULL),
(71, 'Sungai Mas', '2022', 5, 8, NULL),
(72, 'Sungai Mas', '2023', 6, 4.2, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_09_21_043020_create_jp_sawit_table', 1),
(6, '2024_09_21_071015_create_samatiga_sawit_table', 2),
(7, '2024_09_21_071317_create_bubon_sawit_table', 3),
(8, '2024_09_21_100847_create_sawit_table', 4),
(9, '2024_09_21_101813_create_kelapa_table', 5),
(10, '2024_09_21_102156_create_karet_table', 6),
(11, '2024_09_21_102221_create_kopi_table', 6),
(12, '2024_09_21_102230_create_kakao_table', 6),
(13, '2024_09_22_110213_create_sawit_johan_pahlawan_table', 7),
(14, '2024_09_22_112014_create_sawits_table', 8),
(15, '2024_09_23_134214_create_karets_table', 9),
(16, '2024_09_23_134223_create_kopis_table', 9),
(17, '2024_09_23_134233_create_kelapas_table', 9),
(18, '2024_09_23_134241_create_kakaos_table', 9),
(20, '2024_09_27_152535_create_permission_tables', 10),
(21, '2024_09_29_064427_add_alpha_to_kakaos_table', 11),
(22, '2024_09_30_062318_add_alpha_to_sawits_table', 12),
(23, '2024_09_30_094151_add_alpha_to_karets_table', 13),
(24, '2024_09_30_133203_add_alpha_to_kelapas_table', 14),
(25, '2024_10_01_060351_add_alpha_to_kopis_table', 15),
(26, '2014_10_12_100000_create_password_resets_table', 16),
(27, '2024_10_01_094246_add_role_to_users_table', 17),
(28, '2024_10_05_235008_create_data_produksi_table', 18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sawits`
--

CREATE TABLE `sawits` (
  `id` bigint UNSIGNED NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` year NOT NULL,
  `periode` int NOT NULL,
  `produksi` double NOT NULL,
  `alpha` double(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sawits`
--

INSERT INTO `sawits` (`id`, `lokasi`, `tahun`, `periode`, `produksi`, `alpha`) VALUES
(1, 'Johan Pahlawan', '2018', 1, 246.05, NULL),
(2, 'Johan Pahlawan', '2019', 2, 415.8, NULL),
(3, 'Johan Pahlawan', '2020', 3, 415.8, NULL),
(4, 'Johan Pahlawan', '2021', 4, 415.8, NULL),
(5, 'Johan Pahlawan', '2022', 5, 467, NULL),
(6, 'Johan Pahlawan', '2023', 6, 546, NULL),
(7, 'Samatiga', '2018', 1, 690, NULL),
(8, 'Samatiga', '2019', 2, 369.6, NULL),
(9, 'Samatiga', '2020', 3, 369.6, NULL),
(10, 'Samatiga', '2021', 4, 369.6, NULL),
(11, 'Samatiga', '2022', 5, 690.5, NULL),
(12, 'Samatiga', '2023', 6, 591.5, NULL),
(13, 'Bubon', '2018', 1, 1799.68, NULL),
(14, 'Bubon', '2019', 2, 642.74, NULL),
(15, 'Bubon', '2020', 3, 642.74, NULL),
(16, 'Bubon', '2021', 4, 642.74, NULL),
(17, 'Bubon', '2022', 5, 690.5, NULL),
(18, 'Bubon', '2023', 6, 878, NULL),
(19, 'Arongan Lambalek', '2018', 1, 1365.23, NULL),
(20, 'Arongan Lambalek', '2019', 2, 1734.18, NULL),
(21, 'Arongan Lambalek', '2020', 3, 1734.18, NULL),
(22, 'Arongan Lambalek', '2021', 4, 1734.18, NULL),
(23, 'Arongan Lambalek', '2022', 5, 1798, NULL),
(24, 'Arongan Lambalek', '2023', 6, 2604, NULL),
(25, 'Woyla', '2018', 1, 222.15, NULL),
(26, 'Woyla', '2019', 2, 1453.9, NULL),
(27, 'Woyla', '2020', 3, 1453.9, NULL),
(28, 'Woyla', '2021', 4, 1453.9, NULL),
(29, 'Woyla', '2022', 5, 1548.7, NULL),
(30, 'Woyla', '2023', 6, 2780, NULL),
(31, 'Woyla Barat', '2018', 1, 855.55, NULL),
(32, 'Woyla Barat', '2019', 2, 644, NULL),
(33, 'Woyla Barat', '2020', 3, 644, NULL),
(34, 'Woyla Barat', '2021', 4, 644, NULL),
(35, 'Woyla Barat', '2022', 5, 683.16, NULL),
(36, 'Woyla Barat', '2023', 6, 1036, NULL),
(37, 'Woyla Timur', '2018', 1, 1522.7, NULL),
(38, 'Woyla Timur', '2019', 2, 645.4, NULL),
(39, 'Woyla Timur', '2020', 3, 645.4, NULL),
(40, 'Woyla Timur', '2021', 4, 645.4, NULL),
(41, 'Woyla Timur', '2022', 5, 724, NULL),
(42, 'Woyla Timur', '2023', 6, 1169, NULL),
(43, 'Kaway XVI', '2018', 1, 1830.61, NULL),
(44, 'Kaway XVI', '2019', 2, 4177.6, NULL),
(45, 'Kaway XVI', '2020', 3, 4177.6, NULL),
(46, 'Kaway XVI', '2021', 4, 4436.6, NULL),
(47, 'Kaway XVI', '2022', 5, 4515, NULL),
(48, 'Kaway XVI', '2023', 6, 6489, NULL),
(49, 'Meureubo', '2018', 1, 803.53, NULL),
(50, 'Meureubo', '2019', 2, 1484, NULL),
(51, 'Meureubo', '2020', 3, 1484, NULL),
(52, 'Meureubo', '2021', 4, 1484, NULL),
(53, 'Meureubo', '2022', 5, 1856, NULL),
(54, 'Meureubo', '2023', 6, 2226, NULL),
(55, 'Pante Ceureumen', '2018', 1, 648.87, NULL),
(56, 'Pante Ceureumen', '2019', 2, 873.6, NULL),
(57, 'Pante Ceureumen', '2020', 3, 873.6, NULL),
(58, 'Pante Ceureumen', '2021', 4, 901.68, NULL),
(59, 'Pante Ceureumen', '2022', 5, 1329, NULL),
(60, 'Pante Ceureumen', '2023', 6, 1690, NULL),
(61, 'Panton Reu', '2018', 1, 672.77, NULL),
(62, 'Panton Reu', '2019', 2, 452.2, NULL),
(63, 'Panton Reu', '2020', 3, 452.2, NULL),
(64, 'Panton Reu', '2021', 4, 452.2, NULL),
(65, 'Panton Reu', '2022', 5, 502, NULL),
(66, 'Panton Reu', '2023', 6, 931, NULL),
(67, 'Sungai Mas', '2018', 1, 215.12, NULL),
(68, 'Sungai Mas', '2019', 2, 574.4, NULL),
(69, 'Sungai Mas', '2020', 3, 574.4, NULL),
(70, 'Sungai Mas', '2021', 4, 672.7, NULL),
(71, 'Sungai Mas', '2022', 5, 708.12, NULL),
(72, 'Sungai Mas', '2023', 6, 1053, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(2, 'Admin User', 'admin@example.com', NULL, '$2y$12$vaLZ7M876JitHw/HHPtq2u3EwQcjVkIznRn/LdBkJCXA1NBo9J9tC', NULL, '2024-10-01 05:18:20', '2024-10-01 05:18:20', 'admin'),
(3, 'Regular User', 'user@example.com', NULL, '$2y$12$nYjRfJ8cIqSBgSH9LxB/J.0JqGTyAa1K86b0szZUiE6smA6nIlKGO', NULL, '2024-10-01 05:18:20', '2024-10-01 05:18:20', 'user'),
(5, 'Marlina', 'user@staff.com', NULL, '$2y$12$Hl9aTL9BrdHpps5trSnh.umWLKo7NyAYV3WOEYrASWadllvdLQeDe', NULL, '2024-10-09 19:37:38', '2024-10-09 19:37:38', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_produksi`
--
ALTER TABLE `data_produksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kakaos`
--
ALTER TABLE `kakaos`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `karets`
--
ALTER TABLE `karets`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelapas`
--
ALTER TABLE `kelapas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kopis`
--
ALTER TABLE `kopis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `sawits`
--
ALTER TABLE `sawits`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_produksi`
--
ALTER TABLE `data_produksi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kakaos`
--
ALTER TABLE `kakaos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `karets`
--
ALTER TABLE `karets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `kelapas`
--
ALTER TABLE `kelapas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `kopis`
--
ALTER TABLE `kopis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sawits`
--
ALTER TABLE `sawits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
