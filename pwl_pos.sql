-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 23, 2024 at 11:22 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwl_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_09_11_072358_create_m_level_table', 1),
(6, '2024_09_11_104157_create_m_kategori_table', 1),
(7, '2024_09_11_104540_create_m_supplier_table', 1),
(8, '2024_09_11_105954_create_m_user_table', 1),
(9, '2024_09_11_235257_create_m_barang_table', 1),
(10, '2024_09_11_235401_create_t_penjualan_table', 1),
(11, '2024_09_11_235456_create_t_stok_table', 1),
(12, '2024_09_11_235558_create_t_penjualan_detail_table', 1),
(13, '2024_10_20_090257_add_avatar_to_m_user_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `m_barang`
--

CREATE TABLE `m_barang` (
  `barang_id` bigint UNSIGNED NOT NULL,
  `kategori_id` bigint UNSIGNED NOT NULL,
  `barang_kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` int NOT NULL,
  `harga_jual` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_barang`
--

INSERT INTO `m_barang` (`barang_id`, `kategori_id`, `barang_kode`, `barang_nama`, `harga_beli`, `harga_jual`, `created_at`, `updated_at`) VALUES
(1, 1, '001', 'Laptop', 5000000, 6000000, NULL, NULL),
(2, 1, '002', 'Smartphone', 2000000, 2500000, NULL, NULL),
(3, 2, '003', 'Kaos Polos', 50000, 75000, NULL, '2024-09-26 03:35:56'),
(4, 2, '004', 'Jaket Denim', 150000, 200000, NULL, NULL),
(5, 3, '005', 'Kopi Bubuk', 30000, 50000, NULL, '2024-09-26 03:36:12'),
(6, 3, '006', 'Susu Cair', 10000, 15000, NULL, '2024-09-26 03:36:24'),
(7, 4, '007', 'Vitamin C', 50000, 80000, NULL, '2024-09-26 03:36:34'),
(8, 4, '008', 'Masker Wajah', 2000, 5000, NULL, '2024-09-26 03:36:53'),
(9, 5, '009', 'Kursi Lipat', 100000, 150000, NULL, '2024-09-26 03:37:03'),
(10, 5, '010', 'Meja Tulis', 250000, 300000, NULL, '2024-09-26 03:37:15'),
(11, 5, '011', 'Papan Tulis', 25000, 30000, NULL, '2024-09-26 03:39:59'),
(12, 1, '012', 'Tablet', 2000000, 2500000, NULL, '2024-09-26 03:40:49'),
(13, 2, '013', 'Celana Pendek', 15000, 20000, NULL, '2024-09-26 03:42:25'),
(14, 3, '014', 'Burger', 5000, 7000, NULL, '2024-09-26 03:43:11'),
(15, 4, '015', 'Suntik', 50000, 60000, NULL, '2024-09-26 03:44:05'),
(18, 1, 'SBK-003', 'Telor Omega(10 butir)', 22000, 25000, '2024-10-16 06:03:41', NULL),
(19, 2, 'SNK-003', 'Sari Roti', 11500, 12500, '2024-10-16 06:03:41', NULL),
(20, 3, 'MND-003', 'Shampo Pantene', 17500, 18500, '2024-10-16 06:03:41', NULL),
(21, 4, 'BAY-003', 'Baju Bayi 2th', 89000, 92500, '2024-10-16 06:03:41', NULL),
(22, 5, 'MNM-003', 'Cleo 600ml', 3750, 4300, '2024-10-16 06:03:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_kategori`
--

CREATE TABLE `m_kategori` (
  `kategori_id` bigint UNSIGNED NOT NULL,
  `kategori_kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_kategori`
--

INSERT INTO `m_kategori` (`kategori_id`, `kategori_kode`, `kategori_nama`, `created_at`, `updated_at`) VALUES
(1, 'ELEK', 'Elektronik', NULL, NULL),
(2, 'PAKA', 'Pakaian', NULL, NULL),
(3, 'MAKA', 'Makanan', NULL, NULL),
(4, 'KESE', 'Kesehatan', NULL, NULL),
(5, 'PERA', 'Perabot', NULL, NULL),
(13, 'MINU', 'Minuman', '2024-10-22 06:01:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_level`
--

CREATE TABLE `m_level` (
  `level_id` bigint UNSIGNED NOT NULL,
  `level_kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_level`
--

INSERT INTO `m_level` (`level_id`, `level_kode`, `level_nama`, `created_at`, `updated_at`) VALUES
(1, 'ADM', 'Administrator', NULL, '2024-09-26 01:40:23'),
(2, 'MNG', 'Manager', NULL, NULL),
(3, 'STF', 'Staff/Kasir', NULL, NULL),
(4, 'CUS', 'Pelanggan', '2024-09-12 05:48:23', NULL),
(13, 'DIR', 'Direktur', '2024-10-22 06:00:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_supplier`
--

CREATE TABLE `m_supplier` (
  `supplier_id` bigint UNSIGNED NOT NULL,
  `supplier_kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_supplier`
--

INSERT INTO `m_supplier` (`supplier_id`, `supplier_kode`, `supplier_nama`, `supplier_alamat`, `created_at`, `updated_at`) VALUES
(1, 'SUP001', 'PT. Elektronik Jaya', 'Jl. Elektronik No. 1, Mojokerto', NULL, NULL),
(2, 'SUP002', 'CV. Pakaian Sejahtera', 'Jl. Pakaian No. 2, Mojokerto', NULL, NULL),
(3, 'SUP003', 'UD. Makanan Makmur', 'Jl. Makanan No. 3, Mojokerto', NULL, NULL),
(9, 'SUP004', 'PT topek', 'Mojokerto', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `user_id` bigint UNSIGNED NOT NULL,
  `level_id` bigint UNSIGNED NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`user_id`, `level_id`, `username`, `nama`, `password`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'Administrator', '$2y$12$rQ0VuHyrYHFcr7r05SkAv.JsQgPt.Fhxx0GqSbXmd4oZ5P1woj8AG', NULL, NULL, NULL),
(2, 2, 'manager', 'Manager', '$2y$12$ugG6L6Rf2DwCmsIgLUqFgOBD7DXgZ37Td.B0vMoV.a7gIuC3VyzYS', NULL, NULL, NULL),
(3, 3, 'staff', 'Staff/Kasir', '$2y$12$IqEwqXNeM9jcvXV5ZtCH9OqoCFV3WNt6IaAyhhafpqvS9E6se1WDa', NULL, NULL, NULL),
(4, 4, 'customer-1', 'Pelanggan pertama', '$2y$12$OWE/zB9lT48hyG/9R7JL1.ee0gB.Ji10/3ksOo45XWOI2FWYROBYG', NULL, NULL, '2024-09-12 06:09:22'),
(8, 2, 'Manager_dua', 'Manager 2', '$2y$12$kQYK345Wnvul9EDiGnakn.PWR/8nFAttMHDyAmjIQMqyHuKWbeeWm', NULL, '2024-09-18 02:43:47', '2024-09-18 02:43:47'),
(9, 2, 'manager22', 'Manager Dua dua', '$2y$12$DspBC018ROB89qy0Wk31f.bw7Na5r/sCQcoHuj6gBqsyBi/B0ZIQq', NULL, '2024-09-19 06:34:16', '2024-09-19 06:34:16'),
(10, 2, 'manager33', 'Manager Tiga Tiga', '$2y$12$bjfWmTVlQipVdQXbOykmQeWgVZecYKr9PLUqns3Ex2b.gZcwoDjEe', NULL, '2024-09-19 06:36:53', '2024-09-19 06:36:53'),
(13, 2, 'manager56', 'Manager55', '$2y$12$5y4d4cAlYiFo8O4zv3hLUOYJGKDYax0uu2y7IMLW.HtZ/deDIUSAK', NULL, '2024-09-19 07:06:53', '2024-09-19 07:06:53'),
(14, 2, 'manager12', 'Manager11', '$2y$12$cMrZDfgMgJi2.gbnyHQ0o.xnVDh3Qizd5xlf556eSzzC.6QOsDO7q', NULL, '2024-09-19 07:11:46', '2024-09-19 07:11:46'),
(19, 4, 'taufiq', 'ufik', '123456', NULL, '2024-10-02 03:55:18', '2024-10-02 03:55:18'),
(20, 4, 'taufiqqq', 'salam', '123456', NULL, '2024-10-03 22:12:29', '2024-10-03 22:12:29'),
(21, 1, 'admin topek', 'topek', '$2y$12$FsrzNnfw4bUwON.qmStwoelxnRzcrpLpcG622w1TeGOuEuQHJYcBy', 'avatars/UzikYR7z5b8rLWxvvlCWpycPSZ7A2TDdBMq2ARJc.png', '2024-10-09 04:04:29', '2024-10-22 05:50:54'),
(22, 2, 'manager pekkk', 'salammm', '$2y$12$Bx4Hv4mrscAGfxp5OWVaeuo6nNmcIspsHOW5GcLFdw/EwqUmoC6Zy', 'avatars/IWsP9s4Xh9ECZn4VzdaajD1IfaWSycjuzcxP2dfw.jpg', '2024-10-10 02:12:55', '2024-10-21 02:04:53'),
(23, 3, 'Staf Kepin', 'kepin', '$2y$12$bRHMpTakXjs8y6uXZon0SuMDpZslwp7En4kWQTkSH9XZaKT/lvqJi', NULL, '2024-10-15 23:08:46', '2024-10-15 23:08:46'),
(29, 1, 'admin salam', 'Salam', '$2y$12$PMliGcN683gqXEir4t.i7O9M4uN0BxzeqTDNMbpTqRipZHSnVr/Wq', NULL, '2024-10-22 05:55:41', '2024-10-22 05:55:41'),
(30, 1, 'fiq', 'administrator', '$2y$12$LMTiDEDNcehzBKbdlCJqYOPJQlY2pKRadwyV9JP64UyBIe4eQbpeW', NULL, '2024-10-22 06:00:31', NULL),
(37, 1, 'admin abdusss', 'abdusss', '$2y$12$qfl3yBIYr296JTdZxir9SeKyrIoqzAKwysjmvu9lJv.wZn/Yd2eYC', 'avatars/MS9Zp1T2slhD5pp4BvfK9h2GJ8eYDRTbgK2NtwYe.png', '2024-10-23 01:48:23', '2024-10-23 01:58:42');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `t_penjualan`
--

CREATE TABLE `t_penjualan` (
  `penjualan_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `pembeli` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penjualan_kode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penjualan_tanggal` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_penjualan`
--

INSERT INTO `t_penjualan` (`penjualan_id`, `user_id`, `pembeli`, `penjualan_kode`, `penjualan_tanggal`, `created_at`, `updated_at`) VALUES
(1, 1, 'Solikin', '001', '2024-09-12 10:20:24', NULL, NULL),
(2, 2, 'Diki', '002', '2024-09-12 10:20:24', NULL, NULL),
(3, 3, 'Yuda', '003', '2024-09-12 10:20:24', NULL, NULL),
(4, 1, 'Gelby', '004', '2024-09-12 10:20:24', NULL, NULL),
(5, 2, 'Taufiq', '005', '2024-09-12 10:20:24', NULL, NULL),
(6, 3, 'Ivan', '006', '2024-09-12 10:20:24', NULL, NULL),
(7, 1, 'Sifa', '007', '2024-09-12 10:20:24', NULL, NULL),
(8, 2, 'Rio', '008', '2024-09-12 10:20:24', NULL, NULL),
(9, 3, 'Rafif', '009', '2024-09-12 10:20:24', NULL, NULL),
(14, 3, 'kinboy', '020', '2024-10-21 10:00:00', '2024-10-22 06:03:21', '2024-10-22 06:03:21');

-- --------------------------------------------------------

--
-- Table structure for table `t_penjualan_detail`
--

CREATE TABLE `t_penjualan_detail` (
  `detail_id` bigint UNSIGNED NOT NULL,
  `penjualan_id` bigint UNSIGNED NOT NULL,
  `barang_id` bigint UNSIGNED NOT NULL,
  `harga` int NOT NULL,
  `jumlah` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_penjualan_detail`
--

INSERT INTO `t_penjualan_detail` (`detail_id`, `penjualan_id`, `barang_id`, `harga`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 100000, 2, NULL, NULL),
(2, 1, 2, 200000, 1, NULL, NULL),
(3, 1, 3, 150000, 3, NULL, NULL),
(4, 2, 4, 300000, 1, NULL, NULL),
(5, 2, 5, 400000, 2, NULL, NULL),
(6, 2, 6, 250000, 3, NULL, NULL),
(7, 3, 7, 350000, 1, NULL, NULL),
(8, 3, 8, 450000, 2, NULL, NULL),
(9, 3, 9, 500000, 1, NULL, NULL),
(10, 4, 10, 550000, 2, NULL, NULL),
(11, 4, 11, 600000, 1, NULL, NULL),
(12, 4, 12, 650000, 3, NULL, NULL),
(13, 5, 13, 700000, 2, NULL, NULL),
(14, 5, 14, 750000, 1, NULL, NULL),
(15, 5, 15, 800000, 3, NULL, NULL),
(16, 6, 1, 850000, 1, NULL, NULL),
(17, 6, 2, 900000, 2, NULL, NULL),
(18, 6, 3, 950000, 3, NULL, NULL),
(19, 7, 4, 1000000, 2, NULL, NULL),
(20, 7, 5, 1050000, 1, NULL, NULL),
(21, 7, 6, 1100000, 3, NULL, NULL),
(22, 8, 7, 1150000, 1, NULL, NULL),
(23, 8, 8, 1200000, 2, NULL, NULL),
(24, 8, 9, 1250000, 3, NULL, NULL),
(25, 9, 10, 1300000, 2, NULL, NULL),
(26, 9, 11, 1350000, 1, NULL, NULL),
(27, 9, 12, 1400000, 3, NULL, NULL),
(35, 14, 1, 1, 6000000, '2024-10-22 06:03:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_stok`
--

CREATE TABLE `t_stok` (
  `stok_id` bigint UNSIGNED NOT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL,
  `barang_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `stok_tanggal` datetime NOT NULL,
  `stok_jumlah` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_stok`
--

INSERT INTO `t_stok` (`stok_id`, `supplier_id`, `barang_id`, `user_id`, `stok_tanggal`, `stok_jumlah`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2024-10-08 00:00:00', 60, NULL, '2024-10-20 22:45:47'),
(2, 1, 2, 2, '2024-09-12 10:13:16', 30, NULL, NULL),
(3, 1, 3, 3, '2024-09-12 10:13:16', 20, NULL, NULL),
(4, 2, 4, 1, '2024-09-12 10:13:16', 40, NULL, NULL),
(5, 2, 5, 2, '2024-09-12 10:13:16', 60, NULL, NULL),
(6, 2, 6, 3, '2024-09-12 10:13:16', 35, NULL, NULL),
(7, 3, 7, 1, '2024-09-12 10:13:16', 25, NULL, NULL),
(8, 3, 8, 2, '2024-09-12 10:13:16', 45, NULL, NULL),
(9, 3, 9, 3, '2024-09-12 10:13:16', 55, NULL, NULL),
(10, 1, 10, 1, '2024-09-12 10:13:16', 65, NULL, NULL),
(11, 1, 11, 2, '2024-09-12 10:13:16', 75, NULL, NULL),
(12, 2, 12, 3, '2024-09-12 10:13:16', 85, NULL, NULL),
(13, 2, 13, 1, '2024-09-12 10:13:16', 95, NULL, NULL),
(14, 3, 14, 2, '2024-09-12 10:13:16', 40, NULL, NULL),
(15, 3, 15, 3, '2024-09-12 10:13:16', 50, NULL, NULL),
(20, 1, 1, 3, '2024-10-19 13:45:00', 1, '2024-10-23 01:51:46', NULL),
(21, 1, 1, 3, '2024-10-19 13:45:00', 1, '2024-10-23 01:51:46', NULL),
(22, 1, 1, 3, '2024-10-19 13:45:00', 1, '2024-10-23 01:51:46', NULL),
(23, 1, 1, 3, '2024-10-23 13:45:00', 2, '2024-10-23 01:51:46', '2024-10-23 01:52:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `m_barang`
--
ALTER TABLE `m_barang`
  ADD PRIMARY KEY (`barang_id`),
  ADD UNIQUE KEY `m_barang_barang_kode_unique` (`barang_kode`),
  ADD KEY `m_barang_kategori_id_index` (`kategori_id`);

--
-- Indexes for table `m_kategori`
--
ALTER TABLE `m_kategori`
  ADD PRIMARY KEY (`kategori_id`),
  ADD UNIQUE KEY `m_kategori_kategori_kode_unique` (`kategori_kode`);

--
-- Indexes for table `m_level`
--
ALTER TABLE `m_level`
  ADD PRIMARY KEY (`level_id`),
  ADD UNIQUE KEY `m_level_level_kode_unique` (`level_kode`);

--
-- Indexes for table `m_supplier`
--
ALTER TABLE `m_supplier`
  ADD PRIMARY KEY (`supplier_id`),
  ADD UNIQUE KEY `m_supplier_supplier_kode_unique` (`supplier_kode`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `m_user_username_unique` (`username`),
  ADD KEY `m_user_level_id_index` (`level_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `t_penjualan`
--
ALTER TABLE `t_penjualan`
  ADD PRIMARY KEY (`penjualan_id`),
  ADD KEY `t_penjualan_user_id_index` (`user_id`);

--
-- Indexes for table `t_penjualan_detail`
--
ALTER TABLE `t_penjualan_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `t_penjualan_detail_penjualan_id_index` (`penjualan_id`),
  ADD KEY `t_penjualan_detail_barang_id_index` (`barang_id`);

--
-- Indexes for table `t_stok`
--
ALTER TABLE `t_stok`
  ADD PRIMARY KEY (`stok_id`),
  ADD KEY `t_stok_supplier_id_index` (`supplier_id`),
  ADD KEY `t_stok_barang_id_index` (`barang_id`),
  ADD KEY `t_stok_user_id_index` (`user_id`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `m_barang`
--
ALTER TABLE `m_barang`
  MODIFY `barang_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `m_kategori`
--
ALTER TABLE `m_kategori`
  MODIFY `kategori_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `m_level`
--
ALTER TABLE `m_level`
  MODIFY `level_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `m_supplier`
--
ALTER TABLE `m_supplier`
  MODIFY `supplier_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `user_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_penjualan`
--
ALTER TABLE `t_penjualan`
  MODIFY `penjualan_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `t_penjualan_detail`
--
ALTER TABLE `t_penjualan_detail`
  MODIFY `detail_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `t_stok`
--
ALTER TABLE `t_stok`
  MODIFY `stok_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_barang`
--
ALTER TABLE `m_barang`
  ADD CONSTRAINT `m_barang_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `m_kategori` (`kategori_id`);

--
-- Constraints for table `m_user`
--
ALTER TABLE `m_user`
  ADD CONSTRAINT `m_user_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `m_level` (`level_id`);

--
-- Constraints for table `t_penjualan`
--
ALTER TABLE `t_penjualan`
  ADD CONSTRAINT `t_penjualan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `m_user` (`user_id`);

--
-- Constraints for table `t_penjualan_detail`
--
ALTER TABLE `t_penjualan_detail`
  ADD CONSTRAINT `t_penjualan_detail_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `m_barang` (`barang_id`),
  ADD CONSTRAINT `t_penjualan_detail_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `t_penjualan` (`penjualan_id`);

--
-- Constraints for table `t_stok`
--
ALTER TABLE `t_stok`
  ADD CONSTRAINT `t_stok_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `m_barang` (`barang_id`),
  ADD CONSTRAINT `t_stok_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `m_supplier` (`supplier_id`),
  ADD CONSTRAINT `t_stok_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `m_user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
