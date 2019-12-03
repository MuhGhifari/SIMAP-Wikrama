-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2019 at 02:42 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simap_wikrama_2019`
--

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kaprog_id` int(11) NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `kaprog_id`, `nama`, `kode`, `created_at`, `updated_at`) VALUES
(1, 1, 'Rekayasa Perangkat Lunak', 'RPL', '2019-11-17 06:36:31', '2019-11-17 06:36:31'),
(2, 1, 'Teknik Komputer Jaringan', 'TKJ', '2019-11-17 06:36:31', '2019-11-17 06:36:31'),
(3, 1, 'Otomatisasi dan Tata Kelola Perkantoran', 'OTKP', '2019-11-17 06:36:31', '2019-11-17 06:36:31'),
(4, 1, 'Bisnis Daring dan Pemasaran', 'BDP', '2019-11-17 06:36:32', '2019-11-17 06:36:32'),
(5, 1, 'Multimedia', 'MMD', '2019-11-17 06:36:32', '2019-11-17 06:36:32'),
(6, 1, 'Perhotelan', 'HTL', '2019-11-17 06:36:32', '2019-11-17 06:36:32'),
(7, 1, 'Tata Boga', 'TBG', '2019-11-17 06:36:32', '2019-11-17 06:36:32');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_11_16_100227_create_siswa_table', 1),
(4, '2019_11_17_043852_create_rayon_table', 1),
(5, '2019_11_17_043936_create_rombel_table', 1),
(6, '2019_11_17_045216_create_jurusan_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rayon`
--

CREATE TABLE `rayon` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pembimbing_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rayon`
--

INSERT INTO `rayon` (`id`, `nama`, `ruangan`, `pembimbing_id`, `created_at`, `updated_at`) VALUES
(1, 'Cia 1', NULL, NULL, '2019-11-17 06:36:30', '2019-11-17 06:36:30'),
(2, 'Cia 2', NULL, NULL, '2019-11-17 06:36:30', '2019-11-17 06:36:30'),
(3, 'Cia 3', NULL, NULL, '2019-11-17 06:36:30', '2019-11-17 06:36:30'),
(4, 'Cia 4', NULL, NULL, '2019-11-17 06:36:30', '2019-11-17 06:36:30'),
(5, 'Cia 5', NULL, NULL, '2019-11-17 06:36:30', '2019-11-17 06:36:30'),
(6, 'Cis 1', NULL, NULL, '2019-11-17 06:36:30', '2019-11-17 06:36:30'),
(7, 'Cis 2', NULL, NULL, '2019-11-17 06:36:30', '2019-11-17 06:36:30'),
(8, 'Cis 3', NULL, NULL, '2019-11-17 06:36:30', '2019-11-17 06:36:30'),
(9, 'Cis 4', NULL, NULL, '2019-11-17 06:36:30', '2019-11-17 06:36:30'),
(10, 'Cis 5', NULL, NULL, '2019-11-17 06:36:30', '2019-11-17 06:36:30'),
(11, 'Cis 6', NULL, NULL, '2019-11-17 06:36:30', '2019-11-17 06:36:30'),
(12, 'Cib 1', NULL, NULL, '2019-11-17 06:36:31', '2019-11-17 06:36:31'),
(13, 'Cib 2', NULL, NULL, '2019-11-17 06:36:31', '2019-11-17 06:36:31'),
(14, 'Cib 3', NULL, NULL, '2019-11-17 06:36:31', '2019-11-17 06:36:31'),
(15, 'Cic 1', NULL, NULL, '2019-11-17 06:36:31', '2019-11-17 06:36:31'),
(16, 'Cic 2', NULL, NULL, '2019-11-17 06:36:31', '2019-11-17 06:36:31'),
(17, 'Cic 3', NULL, NULL, '2019-11-17 06:36:31', '2019-11-17 06:36:31'),
(18, 'Cic 4', NULL, NULL, '2019-11-17 06:36:31', '2019-11-17 06:36:31'),
(19, 'Cic 5', NULL, NULL, '2019-11-17 06:36:31', '2019-11-17 06:36:31'),
(20, 'Cic 6', NULL, NULL, '2019-11-17 06:36:31', '2019-11-17 06:36:31'),
(21, 'Cic 7', NULL, NULL, '2019-11-17 06:36:31', '2019-11-17 06:36:31'),
(22, 'Suk 1', NULL, NULL, '2019-11-17 06:36:31', '2019-11-17 06:36:31'),
(23, 'Suk 2', NULL, NULL, '2019-11-17 06:36:31', '2019-11-17 06:36:31'),
(24, 'Taj 1', NULL, NULL, '2019-11-17 06:36:31', '2019-11-17 06:36:31'),
(25, 'Taj 2', NULL, NULL, '2019-11-17 06:36:31', '2019-11-17 06:36:31'),
(26, 'Taj 3', NULL, NULL, '2019-11-17 06:36:31', '2019-11-17 06:36:31'),
(27, 'Taj 4', NULL, NULL, '2019-11-17 06:36:31', '2019-11-17 06:36:31'),
(28, 'Taj 5', NULL, NULL, '2019-11-17 06:36:31', '2019-11-17 06:36:31'),
(29, 'Wik 1', NULL, NULL, '2019-11-17 06:36:31', '2019-11-17 06:36:31'),
(30, 'Wik 2', NULL, NULL, '2019-11-17 06:36:31', '2019-11-17 06:36:31'),
(31, 'Wik 3', NULL, NULL, '2019-11-17 06:36:31', '2019-11-17 06:36:31'),
(32, 'Wik 4', NULL, NULL, '2019-11-17 06:36:31', '2019-11-17 06:36:31');

-- --------------------------------------------------------

--
-- Table structure for table `rombel`
--

CREATE TABLE `rombel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jurusan_id` int(11) NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkatan` enum('10','11','12') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_ajaran` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rombel`
--

INSERT INTO `rombel` (`id`, `jurusan_id`, `nama`, `tingkatan`, `tahun_ajaran`, `created_at`, `updated_at`) VALUES
(1, 1, 'RPL XI-1', '11', '2019/2020', '2019-11-17 06:36:29', '2019-11-17 06:36:29'),
(2, 1, 'RPL XII-1', '12', '2019/2020', '2019-11-17 06:36:29', '2019-11-17 06:36:29'),
(3, 2, 'TKJ XI-1', '11', '2019/2020', '2019-11-17 06:36:29', '2019-11-17 06:36:29'),
(4, 2, 'TKL XII-1', '12', '2019/2020', '2019-11-17 06:36:30', '2019-11-17 06:36:30'),
(5, 5, 'MMD XI-1', '11', '2019/2020', '2019-11-17 06:36:30', '2019-11-17 06:36:30'),
(6, 5, 'MMD XII-1', '12', '2019/2020', '2019-11-17 06:36:30', '2019-11-17 06:36:30'),
(7, 3, 'OTKP XI-1', '11', '2019/2020', '2019-11-17 06:36:30', '2019-11-17 06:36:30'),
(8, 3, 'OTKP XII-1', '12', '2019/2020', '2019-11-17 06:36:30', '2019-11-17 06:36:30'),
(9, 7, 'TBG XI-1', '11', '2019/2020', '2019-11-17 06:36:30', '2019-11-17 06:36:30'),
(10, 7, 'TBG XII-1', '12', '2019/2020', '2019-11-17 06:36:30', '2019-11-17 06:36:30'),
(11, 6, 'HTL XI-1', '11', '2019/2020', '2019-11-17 06:36:30', '2019-11-17 06:36:30'),
(12, 6, 'HTL XII-1', '12', '2019/2020', '2019-11-17 06:36:30', '2019-11-17 06:36:30'),
(13, 4, 'BDP XI-1', '11', '2019/2020', '2019-11-17 06:36:30', '2019-11-17 06:36:30'),
(14, 4, 'BDP XII-1', '12', '2019/2020', '2019-11-17 06:36:30', '2019-11-17 06:36:30');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nisn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rayon_id` int(11) DEFAULT NULL,
  `rombel_id` int(11) DEFAULT NULL,
  `telp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nisn`, `nis`, `nama`, `jk`, `agama`, `rayon_id`, `rombel_id`, `telp`, `alamat`, `tanggal_lahir`, `tempat_lahir`, `created_at`, `updated_at`) VALUES
(1, '9997401', '11903849', 'Elvina Lestari', 'L', 'Hindu', 11, 12, '(+62) 832 9759 798', 'Psr. Cokroaminoto No. 230, Tangerang Selatan 34046, SulUt', '2002-10-16', 'Jambi', '2019-11-17 06:36:21', '2019-11-17 06:36:21'),
(2, '54496547', '11905620', 'Aswani Prasetya', 'P', 'Kristen', 19, 6, '0845 4520 6570', 'Jln. Juanda No. 508, Bekasi 66898, Lampung', '2004-10-04', 'Samarinda', '2019-11-17 06:36:21', '2019-11-17 06:36:21'),
(3, '56115411', '11906788', 'Luis Irawan S.Psi', 'P', 'Islam', 15, 1, '0822 3250 486', 'Kpg. Sumpah Pemuda No. 488, Palembang 67628, Aceh', '2001-12-02', 'Pekanbaru', '2019-11-17 06:36:21', '2019-11-17 06:36:21'),
(4, '20967733', '11907418', 'Jaeman Suryono', 'L', 'Islam', 20, 7, '(+62) 409 0279 2279', 'Jr. Salatiga No. 348, Padangsidempuan 43672, NTT', '2004-08-26', 'Tanjung Pinang', '2019-11-17 06:36:21', '2019-11-17 06:36:21'),
(5, '40032256', '11902718', 'Yuliana Siska Usada M.TI.', 'P', 'Buddha', 1, 14, '0939 0576 742', 'Dk. Bak Mandi No. 855, Kediri 89403, BaBel', '2000-11-05', 'Dumai', '2019-11-17 06:36:22', '2019-11-17 06:36:22'),
(6, '9906414', '11705074', 'Sarah Hamima Puspasari M.Ak', 'P', 'Kristen', 24, 1, '0380 9212 440', 'Ds. Samanhudi No. 756, Depok 79115, PapBar', '2000-04-20', 'Bau-Bau', '2019-11-17 06:36:22', '2019-11-17 06:36:22'),
(7, '59954019', '11909760', 'Ganda Aris Waskita', 'L', 'Buddha', 2, 4, '0652 9112 237', 'Dk. Bagas Pati No. 898, Banjarbaru 48833, SulUt', '2004-04-05', 'Samarinda', '2019-11-17 06:36:22', '2019-11-17 06:36:22'),
(8, '40732554', '11809491', 'Calista Yuniar S.Pt', 'L', 'Islam', 7, 8, '(+62) 522 2950 9561', 'Gg. Baranang Siang Indah No. 42, Medan 44030, SumUt', '2002-11-22', 'Bandar Lampung', '2019-11-17 06:36:22', '2019-11-17 06:36:22'),
(9, '29128246', '11702645', 'Iriana Wastuti M.Pd', 'L', 'Islam', 21, 2, '(+62) 333 5887 707', 'Kpg. Wora Wari No. 680, Bengkulu 80681, Aceh', '2004-10-28', 'Palembang', '2019-11-17 06:36:22', '2019-11-17 06:36:22'),
(10, '63335287', '11902473', 'Asmianto Siregar', 'L', 'Hindu', 24, 5, '026 6728 8165', 'Psr. Sentot Alibasa No. 35, Padang 16045, DIY', '2000-06-16', 'Jayapura', '2019-11-17 06:36:22', '2019-11-17 06:36:22'),
(11, '16254516', '11702363', 'Cindy Yulianti', 'L', 'Kristen', 5, 12, '024 4722 420', 'Kpg. Antapani Lama No. 615, Probolinggo 25937, SulTra', '2002-03-06', 'Cimahi', '2019-11-17 06:36:22', '2019-11-17 06:36:22'),
(12, '84377851', '11807001', 'Akarsana Mahendra M.Kom.', 'P', 'Hindu', 25, 11, '0367 0880 335', 'Psr. Bahagia  No. 746, Jayapura 75427, KalBar', '2000-05-18', 'Ternate', '2019-11-17 06:36:22', '2019-11-17 06:36:22'),
(13, '26293592', '11908455', 'Rangga Prabu Hutapea S.Psi', 'L', 'Hindu', 11, 9, '0946 4235 1963', 'Jln. Bakau No. 191, Manado 37771, Jambi', '2001-06-08', 'Cilegon', '2019-11-17 06:36:22', '2019-11-17 06:36:22'),
(14, '33077854', '11907088', 'Iriana Fujiati', 'P', 'Hindu', 18, 6, '0326 6992 0335', 'Ds. Cihampelas No. 374, Salatiga 48679, NTT', '2003-07-11', 'Mataram', '2019-11-17 06:36:22', '2019-11-17 06:36:22'),
(15, '12014722', '11704866', 'Gadang Napitupulu', 'P', 'Buddha', 22, 9, '0789 6988 6846', 'Ki. Bakau Griya Utama No. 67, Administrasi Jakarta Pusat 58882, SumUt', '2002-09-18', 'Bandung', '2019-11-17 06:36:22', '2019-11-17 06:36:22'),
(16, '95115248', '11704024', 'Cakrabirawa Siregar', 'L', 'Kristen', 24, 8, '0678 7811 2380', 'Dk. Yap Tjwan Bing No. 725, Tangerang Selatan 21143, NTB', '2004-04-10', 'Samarinda', '2019-11-17 06:36:22', '2019-11-17 06:36:22'),
(17, '44972121', '11901902', 'Lintang Handayani S.H.', 'L', 'Kristen', 7, 11, '0328 0125 2761', 'Jln. Reksoninten No. 788, Tegal 70116, JaBar', '2004-06-06', 'Kotamobagu', '2019-11-17 06:36:22', '2019-11-17 06:36:22'),
(18, '85019570', '11803495', 'Galuh Olga Adriansyah', 'P', 'Kristen', 14, 4, '(+62) 436 1282 126', 'Psr. Yos Sudarso No. 751, Jambi 22165, Lampung', '2002-05-12', 'Depok', '2019-11-17 06:36:22', '2019-11-17 06:36:22'),
(19, '58954464', '11704785', 'Rahayu Hariyah', 'P', 'Buddha', 3, 13, '0317 8133 9452', 'Ki. Kartini No. 329, Madiun 10982, KalTeng', '2001-11-26', 'Batu', '2019-11-17 06:36:22', '2019-11-17 06:36:22'),
(20, '20019961', '11804008', 'Lalita Hassanah', 'L', 'Hindu', 14, 3, '0832 9908 174', 'Kpg. Padang No. 932, Padangsidempuan 27842, SulTeng', '2002-05-05', 'Padangsidempuan', '2019-11-17 06:36:22', '2019-11-17 06:36:22'),
(21, '58287560', '11805283', 'Martana Mansur', 'L', 'Kristen', 25, 14, '(+62) 24 6555 754', 'Psr. Dewi Sartika No. 720, Samarinda 20808, SulTeng', '2002-10-02', 'Tual', '2019-11-17 06:36:22', '2019-11-17 06:36:22'),
(22, '8956452', '11705197', 'Ajiman Dongoran', 'L', 'Islam', 15, 14, '0715 7315 6744', 'Ds. Raya Ujungberung No. 494, Malang 95916, KepR', '2004-07-10', 'Blitar', '2019-11-17 06:36:22', '2019-11-17 06:36:22'),
(23, '12837207', '11903029', 'Julia Laksita', 'L', 'Kristen', 3, 1, '020 9820 681', 'Jln. Teuku Umar No. 147, Balikpapan 53776, PapBar', '2004-08-20', 'Jambi', '2019-11-17 06:36:22', '2019-11-17 06:36:22'),
(24, '11774671', '11706237', 'Bajragin Nainggolan', 'P', 'Islam', 3, 14, '0667 0889 7592', 'Psr. Sugiyopranoto No. 400, Batu 68597, Lampung', '2002-05-29', 'Pagar Alam', '2019-11-17 06:36:22', '2019-11-17 06:36:22'),
(25, '43695284', '11906581', 'Rachel Lailasari', 'L', 'Kristen', 11, 12, '0250 8136 832', 'Ki. K.H. Maskur No. 104, Bekasi 56971, SulTra', '2003-02-17', 'Prabumulih', '2019-11-17 06:36:22', '2019-11-17 06:36:22'),
(26, '33582867', '11904292', 'Harjo Halim M.Farm', 'P', 'Islam', 2, 3, '(+62) 421 4200 283', 'Ki. Laksamana No. 571, Denpasar 21070, Bali', '2002-08-25', 'Blitar', '2019-11-17 06:36:23', '2019-11-17 06:36:23'),
(27, '56365346', '11708726', 'Syahrini Kamaria Uyainah S.I.Kom', 'P', 'Hindu', 2, 14, '(+62) 867 3142 3329', 'Ds. Veteran No. 680, Tidore Kepulauan 39957, KalSel', '2004-10-08', 'Binjai', '2019-11-17 06:36:23', '2019-11-17 06:36:23'),
(28, '19061918', '11903677', 'Tri Samosir', 'L', 'Kristen', 13, 5, '0886 4327 4052', 'Jr. M.T. Haryono No. 243, Salatiga 88984, KalBar', '2002-11-19', 'Mataram', '2019-11-17 06:36:23', '2019-11-17 06:36:23'),
(29, '85568752', '11902837', 'Latif Pradana', 'L', 'Hindu', 14, 1, '(+62) 498 8916 0280', 'Jln. Antapani Lama No. 26, Banjarmasin 34193, SumSel', '2001-04-21', 'Kupang', '2019-11-17 06:36:23', '2019-11-17 06:36:23'),
(30, '28304366', '11906475', 'Betania Wastuti', 'P', 'Buddha', 24, 13, '(+62) 204 8723 2790', 'Psr. Baja No. 722, Kupang 83885, Papua', '2001-07-14', 'Administrasi Jakarta Barat', '2019-11-17 06:36:23', '2019-11-17 06:36:23'),
(31, '17154039', '11902448', 'Nasim Yono Anggriawan', 'L', 'Islam', 3, 6, '(+62) 511 9585 7343', 'Psr. Kebonjati No. 718, Jambi 87093, Jambi', '2004-07-01', 'Kupang', '2019-11-17 06:36:23', '2019-11-17 06:36:23'),
(32, '59846613', '11706750', 'Yance Rahimah M.TI.', 'L', 'Hindu', 8, 5, '(+62) 843 0416 397', 'Jln. K.H. Wahid Hasyim (Kopo) No. 564, Padangsidempuan 47998, SulBar', '2002-10-28', 'Mojokerto', '2019-11-17 06:36:23', '2019-11-17 06:36:23'),
(33, '85594612', '11909152', 'Harjo Ajimin Mahendra', 'P', 'Hindu', 15, 4, '(+62) 259 0546 737', 'Dk. Adisumarmo No. 229, Batu 29516, SulBar', '2000-05-12', 'Bitung', '2019-11-17 06:36:23', '2019-11-17 06:36:23'),
(34, '87608785', '11806841', 'Leo Halim M.Farm', 'L', 'Islam', 22, 2, '(+62) 818 7147 9386', 'Jln. Jagakarsa No. 47, Padang 64153, KalUt', '2002-03-20', 'Mataram', '2019-11-17 06:36:23', '2019-11-17 06:36:23'),
(35, '33683715', '11706215', 'Sabrina Yolanda S.Farm', 'P', 'Buddha', 24, 14, '0893 6580 4142', 'Ki. Sutami No. 874, Mojokerto 66446, PapBar', '2004-11-13', 'Bandung', '2019-11-17 06:36:23', '2019-11-17 06:36:23'),
(36, '89898303', '11703750', 'Irfan Mandala', 'P', 'Kristen', 5, 2, '(+62) 339 1504 465', 'Psr. Ir. H. Juanda No. 652, Semarang 24563, NTT', '2001-10-21', 'Bekasi', '2019-11-17 06:36:23', '2019-11-17 06:36:23'),
(37, '40913180', '11706532', 'Tirtayasa Tamba', 'L', 'Buddha', 20, 3, '(+62) 328 2207 7239', 'Ds. Nanas No. 573, Samarinda 18230, Aceh', '2001-11-15', 'Tanjungbalai', '2019-11-17 06:36:23', '2019-11-17 06:36:23'),
(38, '40135908', '11807633', 'Eko Tamba S.Farm', 'L', 'Hindu', 24, 11, '(+62) 22 7101 576', 'Kpg. Kalimantan No. 231, Batu 96537, KalTeng', '2000-12-13', 'Balikpapan', '2019-11-17 06:36:23', '2019-11-17 06:36:23'),
(39, '77851266', '11707791', 'Hasta Firgantoro', 'L', 'Buddha', 9, 14, '0278 5123 0526', 'Ki. Jamika No. 238, Pematangsiantar 27970, SulSel', '2000-07-22', 'Kotamobagu', '2019-11-17 06:36:23', '2019-11-17 06:36:23'),
(40, '27210077', '11709826', 'Puspa Uyainah', 'L', 'Buddha', 10, 4, '(+62) 760 1327 011', 'Ds. Veteran No. 199, Malang 88038, Aceh', '2001-01-01', 'Padang', '2019-11-17 06:36:23', '2019-11-17 06:36:23'),
(41, '84356481', '11808203', 'Purwadi Saragih', 'P', 'Buddha', 17, 2, '(+62) 967 1241 4937', 'Psr. Mahakam No. 880, Lhokseumawe 17184, Aceh', '2004-09-12', 'Bekasi', '2019-11-17 06:36:23', '2019-11-17 06:36:23'),
(42, '71184536', '11805686', 'Hana Suryatmi', 'L', 'Islam', 22, 7, '0454 2409 6024', 'Dk. Bagas Pati No. 981, Pasuruan 56508, DKI', '2002-02-12', 'Probolinggo', '2019-11-17 06:36:23', '2019-11-17 06:36:23'),
(43, '13523526', '11702107', 'Kamal Martaka Firgantoro', 'P', 'Kristen', 9, 9, '0207 4698 705', 'Jln. Supono No. 122, Palu 80261, Gorontalo', '2000-09-09', 'Padangsidempuan', '2019-11-17 06:36:23', '2019-11-17 06:36:23'),
(44, '99250527', '11705327', 'Carla Pratiwi', 'L', 'Hindu', 5, 3, '0421 7817 6358', 'Jr. Bawal No. 40, Bogor 20899, KalBar', '2004-03-20', 'Dumai', '2019-11-17 06:36:23', '2019-11-17 06:36:23'),
(45, '13052019', '11704123', 'Eka Violet Oktaviani', 'P', 'Islam', 7, 13, '(+62) 632 8076 241', 'Jr. Gegerkalong Hilir No. 370, Tidore Kepulauan 91142, KalBar', '2003-09-15', 'Bitung', '2019-11-17 06:36:23', '2019-11-17 06:36:23'),
(46, '81455938', '11807073', 'Bagus Simbolon', 'P', 'Kristen', 7, 1, '0995 5661 7857', 'Ki. Lembong No. 500, Kupang 55932, SulTra', '2000-10-21', 'Bitung', '2019-11-17 06:36:23', '2019-11-17 06:36:23'),
(47, '96573081', '11906413', 'Daryani Gunawan', 'P', 'Kristen', 8, 2, '0473 7212 6928', 'Ds. Basoka No. 456, Bandar Lampung 32769, KalTim', '2000-07-06', 'Banjarbaru', '2019-11-17 06:36:23', '2019-11-17 06:36:23'),
(48, '59947800', '11904345', 'Carub Wijaya', 'L', 'Hindu', 7, 8, '(+62) 306 6071 5013', 'Ki. Cut Nyak Dien No. 546, Singkawang 37419, BaBel', '2004-02-28', 'Sungai Penuh', '2019-11-17 06:36:23', '2019-11-17 06:36:23'),
(49, '88712403', '11803641', 'Martana Sitorus', 'P', 'Kristen', 20, 3, '0891 0564 5958', 'Dk. Bak Air No. 898, Solok 63418, KalTeng', '2000-01-10', 'Kendari', '2019-11-17 06:36:23', '2019-11-17 06:36:23'),
(50, '34833370', '11705156', 'Opung Mahmud Uwais', 'L', 'Kristen', 7, 2, '(+62) 25 1769 7462', 'Psr. Bakau Griya Utama No. 464, Dumai 10301, KalTeng', '2004-06-16', 'Metro', '2019-11-17 06:36:24', '2019-11-17 06:36:24'),
(51, '39408891', '11804232', 'Agnes Rahayu M.Farm', 'P', 'Hindu', 7, 9, '(+62) 561 7521 267', 'Kpg. Laswi No. 910, Tarakan 47781, SulTra', '2000-03-28', 'Palopo', '2019-11-17 06:36:24', '2019-11-17 06:36:24'),
(52, '89737260', '11706669', 'Oman Bakijan Mangunsong', 'L', 'Hindu', 14, 1, '0928 1492 2023', 'Jr. Kali No. 550, Kediri 16271, SulTeng', '2004-05-23', 'Palu', '2019-11-17 06:36:24', '2019-11-17 06:36:24'),
(53, '28844290', '11909731', 'Febi Tantri Palastri', 'L', 'Kristen', 13, 11, '0826 8816 1402', 'Ki. Warga No. 49, Tangerang 39740, KalSel', '2002-12-17', 'Jayapura', '2019-11-17 06:36:24', '2019-11-17 06:36:24'),
(54, '80222779', '11803045', 'Aurora Wastuti S.T.', 'P', 'Islam', 20, 9, '0258 6149 6911', 'Dk. Panjaitan No. 246, Blitar 86866, MalUt', '2003-05-30', 'Pangkal Pinang', '2019-11-17 06:36:24', '2019-11-17 06:36:24'),
(55, '11300064', '11705082', 'Faizah Oktaviani S.I.Kom', 'L', 'Buddha', 25, 5, '(+62) 698 7944 1120', 'Jln. Babadan No. 905, Subulussalam 38654, JaTim', '2003-11-10', 'Tangerang', '2019-11-17 06:36:24', '2019-11-17 06:36:24'),
(56, '29766481', '11907845', 'Paris Mayasari', 'L', 'Buddha', 17, 12, '(+62) 506 9239 3908', 'Ds. Raden Saleh No. 953, Bandung 35898, KalBar', '2001-05-13', 'Surakarta', '2019-11-17 06:36:24', '2019-11-17 06:36:24'),
(57, '14279698', '11809366', 'Gawati Sarah Susanti S.Ked', 'L', 'Buddha', 20, 7, '(+62) 27 5359 2618', 'Dk. Gotong Royong No. 982, Palopo 50216, Bengkulu', '2001-12-02', 'Binjai', '2019-11-17 06:36:24', '2019-11-17 06:36:24'),
(58, '61224502', '11906254', 'Karimah Suryatmi', 'P', 'Buddha', 22, 9, '0280 3670 711', 'Gg. B.Agam 1 No. 952, Pekalongan 82027, Bali', '2001-05-12', 'Madiun', '2019-11-17 06:36:24', '2019-11-17 06:36:24'),
(59, '9084663', '11807240', 'Elma Prastuti S.Pd', 'P', 'Kristen', 12, 9, '(+62) 686 6883 102', 'Ki. Achmad No. 45, Medan 70667, Maluku', '2004-02-02', 'Bengkulu', '2019-11-17 06:36:24', '2019-11-17 06:36:24'),
(60, '70761566', '11804891', 'Bancar Prakasa S.Gz', 'P', 'Islam', 6, 7, '(+62) 222 0087 007', 'Psr. K.H. Wahid Hasyim (Kopo) No. 508, Cilegon 30118, SumSel', '2000-10-13', 'Administrasi Jakarta Pusat', '2019-11-17 06:36:24', '2019-11-17 06:36:24'),
(61, '14788958', '11709514', 'Galih Nainggolan S.H.', 'L', 'Islam', 8, 2, '0377 4077 357', 'Kpg. Gremet No. 618, Padangpanjang 71457, PapBar', '2000-01-08', 'Pekanbaru', '2019-11-17 06:36:24', '2019-11-17 06:36:24'),
(62, '49261155', '11907296', 'Ira Maida Handayani', 'P', 'Buddha', 3, 6, '0577 4139 685', 'Jln. Sutoyo No. 927, Surabaya 61494, KalSel', '2004-08-22', 'Palembang', '2019-11-17 06:36:24', '2019-11-17 06:36:24'),
(63, '80230315', '11704571', 'Gatra Narji Maulana', 'P', 'Buddha', 25, 12, '0680 6116 866', 'Ki. Flora No. 304, Depok 99281, PapBar', '2004-08-17', 'Pontianak', '2019-11-17 06:36:24', '2019-11-17 06:36:24'),
(64, '75136160', '11803917', 'Safina Mulyani S.IP', 'L', 'Kristen', 9, 10, '0506 9973 875', 'Ki. Tangkuban Perahu No. 222, Mataram 27422, SulTeng', '2001-06-10', 'Bukittinggi', '2019-11-17 06:36:24', '2019-11-17 06:36:24'),
(65, '64505195', '11707153', 'Baktianto Budiyanto', 'P', 'Hindu', 5, 1, '(+62) 406 7680 926', 'Ds. Gading No. 126, Tanjungbalai 48500, Bengkulu', '2003-10-31', 'Administrasi Jakarta Barat', '2019-11-17 06:36:24', '2019-11-17 06:36:24'),
(66, '48173451', '11908164', 'Rama Ramadan', 'L', 'Buddha', 9, 11, '(+62) 974 7389 3404', 'Ds. Yoga No. 943, Prabumulih 32720, NTB', '2002-02-11', 'Medan', '2019-11-17 06:36:24', '2019-11-17 06:36:24'),
(67, '68121836', '11702649', 'Icha Padmasari', 'P', 'Hindu', 11, 10, '0809 4058 857', 'Dk. Bak Mandi No. 718, Pekanbaru 25256, DKI', '2004-07-02', 'Solok', '2019-11-17 06:36:24', '2019-11-17 06:36:24'),
(68, '72600103', '11704519', 'Daryani Thamrin', 'L', 'Hindu', 8, 5, '0970 4110 2713', 'Ds. Kiaracondong No. 480, Bengkulu 69669, KepR', '2001-11-10', 'Dumai', '2019-11-17 06:36:24', '2019-11-17 06:36:24'),
(69, '38254825', '11908565', 'Kawaya Nyoman Nainggolan', 'P', 'Islam', 12, 11, '0700 8533 617', 'Psr. Ters. Pasir Koja No. 711, Pariaman 96851, Aceh', '2001-12-07', 'Medan', '2019-11-17 06:36:24', '2019-11-17 06:36:24'),
(70, '4077844', '11707706', 'Cagak Maheswara', 'L', 'Buddha', 6, 5, '0359 0470 8104', 'Jr. Bakti No. 421, Palu 53945, MalUt', '2000-10-26', 'Denpasar', '2019-11-17 06:36:24', '2019-11-17 06:36:24'),
(71, '35495507', '11805478', 'Prayitna Rajasa S.Farm', 'P', 'Hindu', 17, 13, '0764 1630 6272', 'Kpg. Bambu No. 497, Parepare 29476, SulSel', '2003-10-22', 'Administrasi Jakarta Pusat', '2019-11-17 06:36:24', '2019-11-17 06:36:24'),
(72, '76552333', '11904262', 'Nurul Maimunah Mayasari', 'P', 'Buddha', 18, 14, '(+62) 746 5679 474', 'Ds. Diponegoro No. 696, Palangka Raya 85690, SumSel', '2004-10-26', 'Palopo', '2019-11-17 06:36:24', '2019-11-17 06:36:24'),
(73, '12815932', '11709377', 'Olivia Padmasari', 'P', 'Kristen', 22, 10, '(+62) 255 1365 541', 'Ds. Adisumarmo No. 242, Kotamobagu 98342, SulTra', '2002-01-17', 'Surakarta', '2019-11-17 06:36:24', '2019-11-17 06:36:24'),
(74, '6852939', '11704080', 'Ghani Damanik', 'L', 'Islam', 23, 4, '(+62) 24 8946 129', 'Kpg. Baing No. 425, Surabaya 11367, NTT', '2003-08-01', 'Administrasi Jakarta Utara', '2019-11-17 06:36:25', '2019-11-17 06:36:25'),
(75, '19189711', '11808168', 'Azalea Cinthia Yuniar S.Pd', 'L', 'Kristen', 9, 2, '(+62) 216 1594 4067', 'Psr. Ciumbuleuit No. 128, Sabang 96661, SumSel', '2000-09-04', 'Tebing Tinggi', '2019-11-17 06:36:25', '2019-11-17 06:36:25'),
(76, '30722856', '11801582', 'Panji Opung Tamba', 'L', 'Kristen', 9, 12, '(+62) 713 8834 321', 'Dk. Banceng Pondok No. 502, Blitar 22386, SulSel', '2002-11-07', 'Semarang', '2019-11-17 06:36:25', '2019-11-17 06:36:25'),
(77, '46795177', '11706495', 'Dimaz Mustofa', 'P', 'Buddha', 5, 12, '(+62) 649 0170 673', 'Jr. Dipatiukur No. 436, Banjarbaru 65127, JaBar', '2002-10-20', 'Palopo', '2019-11-17 06:36:25', '2019-11-17 06:36:25'),
(78, '60527104', '11701211', 'Bajragin Kala Rajata S.H.', 'L', 'Islam', 1, 2, '(+62) 445 9843 2120', 'Ds. Gotong Royong No. 246, Administrasi Jakarta Pusat 98767, MalUt', '2001-02-19', 'Cirebon', '2019-11-17 06:36:25', '2019-11-17 06:36:25'),
(79, '33965502', '11702399', 'Siti Mayasari', 'L', 'Kristen', 19, 4, '0871 427 558', 'Jln. Otto No. 285, Administrasi Jakarta Timur 51971, SulUt', '2003-06-08', 'Administrasi Jakarta Pusat', '2019-11-17 06:36:25', '2019-11-17 06:36:25'),
(80, '53087454', '11807872', 'Jelita Septi Mandasari S.Kom', 'L', 'Buddha', 13, 4, '0622 4593 253', 'Jln. Bayam No. 856, Prabumulih 45113, KepR', '2004-05-09', 'Pagar Alam', '2019-11-17 06:36:25', '2019-11-17 06:36:25'),
(81, '93378731', '11802425', 'Maya Riyanti', 'L', 'Hindu', 5, 12, '(+62) 658 7783 6325', 'Psr. Lada No. 996, Solok 82194, BaBel', '2000-04-19', 'Sabang', '2019-11-17 06:36:25', '2019-11-17 06:36:25'),
(82, '42540176', '11806332', 'Banawi Mursita Suwarno S.Kom', 'P', 'Islam', 18, 5, '(+62) 20 0005 3179', 'Dk. Kusmanto No. 110, Ternate 22307, MalUt', '2002-01-22', 'Pekanbaru', '2019-11-17 06:36:25', '2019-11-17 06:36:25'),
(83, '67530045', '11805958', 'Martaka Hutasoit S.T.', 'L', 'Hindu', 22, 3, '(+62) 27 8369 6472', 'Psr. Gajah No. 530, Bima 20056, SumSel', '2004-04-30', 'Tangerang', '2019-11-17 06:36:25', '2019-11-17 06:36:25'),
(84, '30089658', '11709852', 'Harjasa Setiawan', 'P', 'Kristen', 8, 13, '(+62) 834 207 633', 'Gg. Gading No. 525, Medan 12055, Riau', '2001-08-23', 'Bontang', '2019-11-17 06:36:25', '2019-11-17 06:36:25'),
(85, '64813047', '11808659', 'Viman Waluyo', 'P', 'Islam', 4, 6, '(+62) 607 5018 2316', 'Dk. Lembong No. 155, Tangerang Selatan 55007, KalTeng', '2004-06-02', 'Cilegon', '2019-11-17 06:36:25', '2019-11-17 06:36:25'),
(86, '6036951', '11706698', 'Okta Mariadi Siregar S.Pt', 'P', 'Hindu', 22, 7, '023 5308 2139', 'Jr. Merdeka No. 688, Banjarmasin 39581, JaTim', '2004-03-06', 'Lubuklinggau', '2019-11-17 06:36:25', '2019-11-17 06:36:25'),
(87, '89420774', '11704548', 'Zaenab Shakila Widiastuti S.Gz', 'L', 'Islam', 22, 14, '(+62) 596 2194 032', 'Ds. Baan No. 618, Banda Aceh 90106, SulTeng', '2002-09-08', 'Prabumulih', '2019-11-17 06:36:25', '2019-11-17 06:36:25'),
(88, '11507640', '11806867', 'Nova Andriani', 'L', 'Hindu', 11, 1, '(+62) 440 7985 9500', 'Psr. Agus Salim No. 927, Tasikmalaya 87027, Bengkulu', '2003-03-11', 'Bengkulu', '2019-11-17 06:36:25', '2019-11-17 06:36:25'),
(89, '97645095', '11702007', 'Akarsana Ramadan', 'P', 'Buddha', 15, 11, '(+62) 887 8398 6027', 'Jln. Jaksa No. 846, Padangsidempuan 44509, JaTeng', '1999-12-23', 'Lhokseumawe', '2019-11-17 06:36:25', '2019-11-17 06:36:25'),
(90, '25771383', '11907081', 'Ella Dinda Nurdiyanti', 'P', 'Kristen', 12, 6, '(+62) 517 8253 795', 'Ds. Pasirkoja No. 527, Sukabumi 35889, DIY', '2002-10-28', 'Batam', '2019-11-17 06:36:25', '2019-11-17 06:36:25'),
(91, '90017411', '11708532', 'Halim Eman Samosir S.H.', 'L', 'Hindu', 12, 7, '(+62) 536 9006 229', 'Ki. Jaksa No. 422, Dumai 14025, BaBel', '2003-10-13', 'Tegal', '2019-11-17 06:36:25', '2019-11-17 06:36:25'),
(92, '60232201', '11803078', 'Irma Ophelia Mandasari S.Farm', 'P', 'Kristen', 21, 8, '(+62) 878 3499 029', 'Psr. Adisucipto No. 495, Bekasi 75351, SumUt', '2002-10-31', 'Palembang', '2019-11-17 06:36:25', '2019-11-17 06:36:25'),
(93, '11964437', '11903546', 'Sabri Arsipatra Siregar M.Kom.', 'P', 'Kristen', 5, 5, '(+62) 258 3263 098', 'Ki. Radio No. 105, Bau-Bau 76984, Bengkulu', '2001-05-17', 'Padangsidempuan', '2019-11-17 06:36:25', '2019-11-17 06:36:25'),
(94, '20442544', '11904170', 'Cornelia Wahyuni S.Psi', 'P', 'Buddha', 12, 14, '(+62) 849 3273 369', 'Kpg. Gading No. 371, Batu 13630, SulSel', '2000-11-10', 'Kendari', '2019-11-17 06:36:25', '2019-11-17 06:36:25'),
(95, '87771612', '11805778', 'Raisa Kuswandari', 'L', 'Kristen', 19, 4, '(+62) 651 8005 5738', 'Dk. Madiun No. 706, Malang 64617, Gorontalo', '2001-07-11', 'Kotamobagu', '2019-11-17 06:36:25', '2019-11-17 06:36:25'),
(96, '74837875', '11703644', 'Intan Lailasari', 'P', 'Hindu', 8, 3, '(+62) 947 2618 5014', 'Psr. Kartini No. 759, Parepare 54125, NTT', '2003-06-25', 'Administrasi Jakarta Barat', '2019-11-17 06:36:25', '2019-11-17 06:36:25'),
(97, '26513822', '11809284', 'Rachel Laksmiwati', 'P', 'Islam', 23, 11, '0738 6038 3049', 'Kpg. Kebangkitan Nasional No. 364, Batu 63182, SulUt', '2002-07-18', 'Singkawang', '2019-11-17 06:36:26', '2019-11-17 06:36:26'),
(98, '36564394', '11806625', 'Cawisono Wijaya', 'P', 'Islam', 1, 13, '0316 0270 8398', 'Jln. Moch. Toha No. 614, Magelang 34094, JaTeng', '2000-12-04', 'Kotamobagu', '2019-11-17 06:36:26', '2019-11-17 06:36:26'),
(99, '8652452', '11905640', 'Ganda Gunarto', 'P', 'Kristen', 17, 9, '0388 4630 8593', 'Psr. Pasir Koja No. 891, Solok 35693, Banten', '2000-12-06', 'Tegal', '2019-11-17 06:36:26', '2019-11-17 06:36:26'),
(100, '69317529', '11906161', 'Gabriella Hilda Sudiati M.M.', 'P', 'Hindu', 6, 5, '0327 1196 325', 'Ki. Aceh No. 490, Palangka Raya 91589, JaTeng', '2002-05-10', 'Bandar Lampung', '2019-11-17 06:36:26', '2019-11-17 06:36:26'),
(101, '69481007', '11807965', 'Nadine Maria Kuswandari', 'L', 'Islam', 23, 9, '0917 2632 5634', 'Dk. Bakti No. 109, Tanjung Pinang 89650, KalTim', '2004-11-13', 'Mataram', '2019-11-17 06:36:26', '2019-11-17 06:36:26'),
(102, '41919398', '11908503', 'Marsito Tamba', 'P', 'Buddha', 25, 10, '0565 8778 426', 'Psr. Dago No. 441, Banjarbaru 41679, SumBar', '2001-05-13', 'Kendari', '2019-11-17 06:36:26', '2019-11-17 06:36:26'),
(103, '29602395', '11701353', 'Kamal Lazuardi', 'L', 'Buddha', 5, 13, '0899 459 196', 'Ds. Barat No. 835, Tarakan 27497, KalUt', '2001-02-11', 'Madiun', '2019-11-17 06:36:26', '2019-11-17 06:36:26'),
(104, '98798298', '11705448', 'Fitriani Yuliarti', 'L', 'Buddha', 2, 4, '0455 8564 012', 'Gg. Rajawali No. 537, Solok 67307, DKI', '2004-08-19', 'Yogyakarta', '2019-11-17 06:36:26', '2019-11-17 06:36:26'),
(105, '90446265', '11802664', 'Silvia Jelita Hastuti S.Ked', 'L', 'Hindu', 16, 8, '(+62) 840 2886 429', 'Kpg. Bakti No. 526, Bontang 49216, JaTeng', '2004-08-18', 'Tangerang Selatan', '2019-11-17 06:36:26', '2019-11-17 06:36:26'),
(106, '70043842', '11805919', 'Bajragin Ramadan', 'P', 'Islam', 3, 11, '(+62) 723 6679 4767', 'Dk. Dipatiukur No. 344, Bontang 25341, Bengkulu', '2004-07-08', 'Madiun', '2019-11-17 06:36:26', '2019-11-17 06:36:26'),
(107, '8964033', '11907411', 'Jatmiko Pangestu Saptono', 'P', 'Islam', 14, 8, '(+62) 236 7785 984', 'Psr. Badak No. 571, Pekanbaru 97847, Lampung', '2000-12-13', 'Bukittinggi', '2019-11-17 06:36:26', '2019-11-17 06:36:26'),
(108, '72331790', '11708106', 'Nurul Cici Usada', 'L', 'Hindu', 10, 10, '0653 5478 0485', 'Dk. Pasteur No. 317, Kediri 71159, Aceh', '2004-03-21', 'Singkawang', '2019-11-17 06:36:26', '2019-11-17 06:36:26'),
(109, '6007104', '11702800', 'Jamil Prasetyo', 'P', 'Islam', 19, 14, '(+62) 464 0042 369', 'Jr. Bagas Pati No. 919, Samarinda 24480, SulSel', '2002-01-09', 'Palembang', '2019-11-17 06:36:26', '2019-11-17 06:36:26'),
(110, '95580175', '11902114', 'Juli Hariyah', 'P', 'Kristen', 11, 8, '(+62) 581 6571 082', 'Jln. Teuku Umar No. 446, Cilegon 70257, KalUt', '2001-09-28', 'Magelang', '2019-11-17 06:36:26', '2019-11-17 06:36:26'),
(111, '72659730', '11901448', 'Amelia Riyanti', 'P', 'Buddha', 22, 1, '0911 8512 9462', 'Ki. Gambang No. 318, Sorong 93600, SumSel', '2002-05-14', 'Sibolga', '2019-11-17 06:36:26', '2019-11-17 06:36:26'),
(112, '3771165', '11804628', 'Nilam Yance Hassanah M.Kom.', 'P', 'Islam', 19, 4, '0995 0201 7816', 'Jln. Sumpah Pemuda No. 121, Binjai 56433, SulBar', '2002-11-14', 'Metro', '2019-11-17 06:36:26', '2019-11-17 06:36:26'),
(113, '88467467', '11909568', 'Natalia Riyanti', 'L', 'Islam', 7, 10, '(+62) 368 2893 8766', 'Gg. Lada No. 296, Tidore Kepulauan 55831, DKI', '2000-11-29', 'Padangsidempuan', '2019-11-17 06:36:26', '2019-11-17 06:36:26'),
(114, '17095180', '11908099', 'Yuni Nadia Nasyiah S.Pd', 'L', 'Hindu', 6, 14, '(+62) 20 7929 0916', 'Ki. Krakatau No. 280, Administrasi Jakarta Timur 22483, KalBar', '2003-06-27', 'Bengkulu', '2019-11-17 06:36:26', '2019-11-17 06:36:26'),
(115, '67521212', '11902212', 'Violet Yuliarti', 'P', 'Buddha', 24, 6, '0899 956 290', 'Ds. Bank Dagang Negara No. 290, Pasuruan 58498, SulSel', '1999-12-24', 'Madiun', '2019-11-17 06:36:26', '2019-11-17 06:36:26'),
(116, '79645602', '11808033', 'Zizi Yolanda', 'P', 'Hindu', 24, 6, '(+62) 260 9007 0058', 'Kpg. Kiaracondong No. 319, Administrasi Jakarta Selatan 38279, Lampung', '2000-01-22', 'Medan', '2019-11-17 06:36:26', '2019-11-17 06:36:26'),
(117, '38761458', '11702014', 'Cakrajiya Samosir', 'L', 'Hindu', 12, 4, '(+62) 294 0873 4991', 'Dk. Surapati No. 749, Blitar 70404, MalUt', '2004-06-07', 'Kendari', '2019-11-17 06:36:26', '2019-11-17 06:36:26'),
(118, '24639654', '11704918', 'Michelle Prastuti', 'P', 'Buddha', 22, 10, '0904 7275 981', 'Jln. Cikutra Barat No. 959, Salatiga 75510, SumSel', '2003-05-31', 'Sibolga', '2019-11-17 06:36:27', '2019-11-17 06:36:27'),
(119, '7295544', '11901104', 'Yuni Mayasari', 'P', 'Hindu', 20, 11, '(+62) 864 008 151', 'Ki. Katamso No. 368, Bandar Lampung 27643, JaTeng', '2004-05-03', 'Sawahlunto', '2019-11-17 06:36:27', '2019-11-17 06:36:27'),
(120, '12808823', '11705255', 'Anastasia Kusmawati', 'L', 'Kristen', 6, 4, '(+62) 517 7117 5205', 'Jln. Basudewo No. 852, Banjar 78921, KalBar', '2000-12-16', 'Depok', '2019-11-17 06:36:27', '2019-11-17 06:36:27'),
(121, '17615296', '11802360', 'Ida Lailasari', 'P', 'Buddha', 12, 7, '(+62) 292 4972 9704', 'Ds. Uluwatu No. 418, Sungai Penuh 48476, DIY', '2001-12-14', 'Cirebon', '2019-11-17 06:36:27', '2019-11-17 06:36:27'),
(122, '81596724', '11901251', 'Dewi Laila Kusmawati', 'P', 'Kristen', 7, 12, '0279 0372 5137', 'Ki. Peta No. 549, Banda Aceh 96733, SulTeng', '2004-03-29', 'Banjar', '2019-11-17 06:36:27', '2019-11-17 06:36:27'),
(123, '78710477', '11702484', 'Dasa Tarihoran M.Kom.', 'P', 'Hindu', 10, 13, '0704 8588 3744', 'Jln. Flores No. 68, Gunungsitoli 58727, SulSel', '2002-12-26', 'Malang', '2019-11-17 06:36:27', '2019-11-17 06:36:27'),
(124, '39440809', '11707468', 'Eja Dongoran', 'L', 'Kristen', 1, 10, '(+62) 360 1535 0974', 'Dk. Bank Dagang Negara No. 810, Batu 60767, PapBar', '2002-02-23', 'Pagar Alam', '2019-11-17 06:36:27', '2019-11-17 06:36:27'),
(125, '12566430', '11706300', 'Daru Ardianto S.Sos', 'L', 'Buddha', 17, 3, '(+62) 21 0363 159', 'Ki. Raden No. 38, Kupang 24235, Riau', '2003-08-23', 'Surakarta', '2019-11-17 06:36:27', '2019-11-17 06:36:27'),
(126, '17956039', '11807145', 'Argono Ismail Hutapea', 'L', 'Kristen', 10, 11, '(+62) 357 5956 711', 'Ki. Honggowongso No. 394, Samarinda 68871, KalTim', '2000-11-16', 'Tangerang Selatan', '2019-11-17 06:36:27', '2019-11-17 06:36:27'),
(127, '99098702', '11807947', 'Intan Nasyidah', 'P', 'Kristen', 20, 5, '0863 650 176', 'Jr. Baya Kali Bungur No. 198, Bandar Lampung 89913, SulTra', '2004-03-06', 'Tomohon', '2019-11-17 06:36:27', '2019-11-17 06:36:27'),
(128, '5964094', '11701481', 'Surya Prayoga S.E.', 'L', 'Islam', 1, 6, '(+62) 201 8821 536', 'Ki. Lumban Tobing No. 140, Ambon 95088, DIY', '2002-06-16', 'Kotamobagu', '2019-11-17 06:36:27', '2019-11-17 06:36:27'),
(129, '18467973', '11905302', 'Wulan Aryani', 'P', 'Buddha', 20, 4, '0201 0686 8224', 'Psr. Basoka No. 744, Tanjung Pinang 33037, SumBar', '2003-06-07', 'Batu', '2019-11-17 06:36:27', '2019-11-17 06:36:27'),
(130, '95075741', '11905968', 'Jati Galuh Hutasoit S.Pd', 'P', 'Hindu', 7, 14, '(+62) 437 8375 5884', 'Ds. Pahlawan No. 574, Surabaya 64286, JaBar', '2004-06-07', 'Administrasi Jakarta Selatan', '2019-11-17 06:36:27', '2019-11-17 06:36:27'),
(131, '35990265', '11805286', 'Suci Yolanda', 'L', 'Buddha', 6, 4, '0343 4945 393', 'Jln. Rajawali Barat No. 441, Malang 59698, NTT', '2001-02-05', 'Administrasi Jakarta Barat', '2019-11-17 06:36:27', '2019-11-17 06:36:27'),
(132, '83884628', '11702157', 'Queen Melani M.TI.', 'L', 'Buddha', 19, 11, '026 0785 8328', 'Jln. Sutoyo No. 738, Banjarmasin 88519, JaTeng', '2002-10-06', 'Prabumulih', '2019-11-17 06:36:27', '2019-11-17 06:36:27'),
(133, '93416761', '11709569', 'Niyaga Suryono', 'P', 'Hindu', 2, 9, '0206 2489 8773', 'Ds. Kartini No. 859, Jayapura 79743, JaTeng', '2001-03-14', 'Padangsidempuan', '2019-11-17 06:36:27', '2019-11-17 06:36:27'),
(134, '74560461', '11908561', 'Amelia Widiastuti', 'P', 'Islam', 11, 9, '0552 1499 148', 'Kpg. Badak No. 671, Ambon 74729, Papua', '2003-04-22', 'Pasuruan', '2019-11-17 06:36:27', '2019-11-17 06:36:27'),
(135, '49736151', '11701285', 'Faizah Handayani', 'L', 'Buddha', 3, 5, '026 8247 5591', 'Gg. Baan No. 483, Mataram 74890, Banten', '2002-08-26', 'Jayapura', '2019-11-17 06:36:27', '2019-11-17 06:36:27'),
(136, '93137194', '11809918', 'Jamalia Dewi Farida M.M.', 'L', 'Hindu', 9, 10, '(+62) 25 2922 387', 'Gg. Tambak No. 103, Batam 49312, KalSel', '2002-08-17', 'Cilegon', '2019-11-17 06:36:27', '2019-11-17 06:36:27'),
(137, '11824592', '11802600', 'Parman Ramadan', 'L', 'Hindu', 13, 14, '0878 3088 3259', 'Kpg. Flora No. 521, Sibolga 17541, PapBar', '2004-02-14', 'Pematangsiantar', '2019-11-17 06:36:27', '2019-11-17 06:36:27'),
(138, '87394696', '11804675', 'Mahdi Slamet Tampubolon', 'P', 'Islam', 4, 5, '(+62) 278 2295 9553', 'Psr. Bambon No. 798, Banjarmasin 20793, MalUt', '2003-06-01', 'Mojokerto', '2019-11-17 06:36:27', '2019-11-17 06:36:27'),
(139, '81351264', '11804538', 'Mitra Ajimat Januar S.Sos', 'L', 'Kristen', 11, 7, '0661 9072 138', 'Jln. Ters. Buah Batu No. 154, Administrasi Jakarta Barat 31035, SulTeng', '2000-02-17', 'Bandung', '2019-11-17 06:36:27', '2019-11-17 06:36:27'),
(140, '95506265', '11709121', 'Candra Ardianto', 'L', 'Buddha', 10, 3, '0838 1931 8910', 'Kpg. Sutarjo No. 311, Pagar Alam 54809, KepR', '2002-08-06', 'Pasuruan', '2019-11-17 06:36:27', '2019-11-17 06:36:27'),
(141, '50338137', '11904760', 'Perkasa Lamar Sirait', 'L', 'Kristen', 20, 11, '0419 8092 743', 'Dk. Banceng Pondok No. 159, Jambi 53528, KepR', '2002-05-15', 'Tangerang Selatan', '2019-11-17 06:36:28', '2019-11-17 06:36:28'),
(142, '46206391', '11901073', 'Alika Wijayanti', 'P', 'Islam', 16, 14, '(+62) 991 9830 781', 'Jr. Acordion No. 581, Palangka Raya 82978, Papua', '2002-09-02', 'Mataram', '2019-11-17 06:36:28', '2019-11-17 06:36:28'),
(143, '78605480', '11702697', 'Reza Rajata', 'L', 'Kristen', 16, 5, '(+62) 835 1912 684', 'Psr. Reksoninten No. 451, Gunungsitoli 23722, Aceh', '2001-04-20', 'Ambon', '2019-11-17 06:36:28', '2019-11-17 06:36:28'),
(144, '295358', '11702288', 'Siti Kamaria Hasanah', 'L', 'Islam', 19, 11, '022 7891 204', 'Psr. Antapani Lama No. 377, Palangka Raya 12543, DKI', '2003-06-14', 'Magelang', '2019-11-17 06:36:28', '2019-11-17 06:36:28'),
(145, '57050924', '11901737', 'Cahyadi Manullang', 'L', 'Hindu', 11, 11, '0768 8193 7266', 'Dk. Bah Jaya No. 931, Bandar Lampung 36387, Banten', '2002-03-12', 'Palopo', '2019-11-17 06:36:28', '2019-11-17 06:36:28'),
(146, '40442991', '11806105', 'Cengkal Mahendra', 'P', 'Buddha', 4, 8, '(+62) 615 3783 4739', 'Kpg. Baiduri No. 771, Lubuklinggau 47244, DIY', '2001-06-09', 'Sawahlunto', '2019-11-17 06:36:28', '2019-11-17 06:36:28'),
(147, '26118824', '11905084', 'Ciaobella Novitasari', 'P', 'Hindu', 12, 1, '(+62) 628 4067 2091', 'Jr. S. Parman No. 824, Mojokerto 61235, SulUt', '2000-03-03', 'Pagar Alam', '2019-11-17 06:36:28', '2019-11-17 06:36:28'),
(148, '11192882', '11909814', 'Endah Sarah Uyainah', 'P', 'Kristen', 22, 9, '028 5629 888', 'Jr. Labu No. 69, Tanjungbalai 77431, SumUt', '2003-10-11', 'Kendari', '2019-11-17 06:36:28', '2019-11-17 06:36:28'),
(149, '81174885', '11907091', 'Lili Ayu Laksita', 'L', 'Kristen', 17, 9, '(+62) 324 4598 304', 'Psr. Baja Raya No. 475, Manado 66275, Maluku', '2002-04-24', 'Padang', '2019-11-17 06:36:28', '2019-11-17 06:36:28'),
(150, '83463118', '11805340', 'Gawati Zulaika', 'L', 'Buddha', 24, 11, '(+62) 327 3112 5767', 'Kpg. Rajiman No. 812, Banjarbaru 83035, MalUt', '2003-10-27', 'Jambi', '2019-11-17 06:36:28', '2019-11-17 06:36:28'),
(151, '27950279', '11905077', 'Titi Siska Hassanah S.Farm', 'P', 'Hindu', 20, 1, '(+62) 305 8357 627', 'Kpg. Sugiyopranoto No. 539, Gunungsitoli 90061, MalUt', '2004-01-05', 'Singkawang', '2019-11-17 06:36:28', '2019-11-17 06:36:28'),
(152, '93331296', '11705443', 'Balangga Mahendra S.IP', 'P', 'Buddha', 17, 7, '0957 0565 737', 'Gg. Pasirkoja No. 926, Cimahi 79649, SumBar', '2001-12-02', 'Yogyakarta', '2019-11-17 06:36:28', '2019-11-17 06:36:28'),
(153, '33697361', '11702618', 'Elvina Yulianti', 'P', 'Kristen', 13, 6, '021 9936 7092', 'Ki. Wahidin Sudirohusodo No. 707, Administrasi Jakarta Selatan 45721, Papua', '2002-06-01', 'Tarakan', '2019-11-17 06:36:28', '2019-11-17 06:36:28'),
(154, '68036290', '11807428', 'Fathonah Tania Rahayu S.Pd', 'P', 'Kristen', 4, 6, '(+62) 769 4858 397', 'Jln. Jagakarsa No. 758, Gorontalo 80098, Lampung', '2000-06-22', 'Administrasi Jakarta Pusat', '2019-11-17 06:36:28', '2019-11-17 06:36:28'),
(155, '30203062', '11702977', 'Respati Warta Zulkarnain S.H.', 'L', 'Kristen', 14, 7, '0440 8876 263', 'Gg. Padang No. 477, Gorontalo 58025, DIY', '2002-09-29', 'Bontang', '2019-11-17 06:36:28', '2019-11-17 06:36:28'),
(156, '29414205', '11803288', 'Jati Maryadi S.H.', 'P', 'Buddha', 14, 7, '0835 5935 5038', 'Gg. Agus Salim No. 642, Administrasi Jakarta Selatan 72826, NTT', '2001-02-22', 'Administrasi Jakarta Barat', '2019-11-17 06:36:28', '2019-11-17 06:36:28'),
(157, '88323704', '11803636', 'Empluk Sihotang', 'P', 'Hindu', 12, 7, '(+62) 724 5865 8654', 'Psr. Ir. H. Juanda No. 213, Sawahlunto 22953, SulBar', '2004-03-27', 'Lhokseumawe', '2019-11-17 06:36:28', '2019-11-17 06:36:28'),
(158, '71450011', '11809856', 'Asmadi Setiawan S.IP', 'L', 'Islam', 4, 3, '0848 7667 744', 'Ds. Monginsidi No. 419, Sawahlunto 51169, DKI', '2004-05-22', 'Blitar', '2019-11-17 06:36:28', '2019-11-17 06:36:28'),
(159, '48708436', '11909802', 'Cahyono Dongoran', 'L', 'Islam', 20, 8, '025 0017 119', 'Kpg. Kiaracondong No. 89, Banjarmasin 61663, PapBar', '2001-10-10', 'Padangsidempuan', '2019-11-17 06:36:28', '2019-11-17 06:36:28'),
(160, '18704434', '11904998', 'Hafshah Maryati', 'P', 'Kristen', 2, 6, '(+62) 654 2834 254', 'Jr. Bhayangkara No. 849, Parepare 27059, SumBar', '2003-11-12', 'Bitung', '2019-11-17 06:36:28', '2019-11-17 06:36:28'),
(161, '90132889', '11702622', 'Maya Suryatmi S.E.', 'L', 'Kristen', 22, 7, '0424 0544 308', 'Ds. Cokroaminoto No. 278, Singkawang 26988, SulTra', '2002-02-03', 'Bukittinggi', '2019-11-17 06:36:28', '2019-11-17 06:36:28'),
(162, '50987436', '11905392', 'Bambang Hartana Saputra M.M.', 'L', 'Kristen', 21, 13, '0740 4218 5572', 'Kpg. Suryo Pranoto No. 469, Gunungsitoli 77481, SulUt', '2000-02-24', 'Bogor', '2019-11-17 06:36:28', '2019-11-17 06:36:28'),
(163, '48586199', '11808742', 'Cakrajiya Habibi', 'L', 'Buddha', 13, 11, '0737 0545 245', 'Ds. Baya Kali Bungur No. 444, Bogor 79409, SumUt', '2003-01-06', 'Bitung', '2019-11-17 06:36:28', '2019-11-17 06:36:28'),
(164, '34114516', '11802705', 'Gilda Melani', 'P', 'Kristen', 19, 9, '0786 9808 840', 'Gg. Barasak No. 655, Lhokseumawe 44874, DIY', '2003-03-15', 'Bukittinggi', '2019-11-17 06:36:28', '2019-11-17 06:36:28'),
(165, '28757976', '11904804', 'Widya Ellis Wijayanti M.TI.', 'P', 'Islam', 22, 3, '0995 3587 7042', 'Ki. Bahagia  No. 869, Cimahi 66327, Aceh', '2001-08-13', 'Serang', '2019-11-17 06:36:28', '2019-11-17 06:36:28'),
(166, '73563030', '11809846', 'Sakura Gina Safitri', 'P', 'Islam', 9, 14, '(+62) 727 2173 078', 'Gg. Salam No. 789, Sukabumi 59721, SulTeng', '2000-12-15', 'Makassar', '2019-11-17 06:36:28', '2019-11-17 06:36:28'),
(167, '1540389', '11702428', 'Raharja Budi Prabowo S.T.', 'P', 'Kristen', 12, 9, '021 6545 958', 'Jln. Bagonwoto  No. 178, Tasikmalaya 53893, Aceh', '2001-04-18', 'Blitar', '2019-11-17 06:36:28', '2019-11-17 06:36:28'),
(168, '16890146', '11809570', 'Galuh Marbun S.IP', 'P', 'Kristen', 21, 3, '(+62) 560 2779 6276', 'Jr. Baung No. 795, Tanjungbalai 71483, DIY', '2001-05-24', 'Binjai', '2019-11-17 06:36:28', '2019-11-17 06:36:28'),
(169, '23334936', '11909037', 'Irma Utami', 'L', 'Kristen', 21, 14, '0901 5090 712', 'Dk. Bak Mandi No. 476, Padangpanjang 92226, JaTim', '2003-07-07', 'Tegal', '2019-11-17 06:36:28', '2019-11-17 06:36:28'),
(170, '83007212', '11804970', 'Salwa Suryatmi', 'P', 'Islam', 24, 12, '(+62) 997 9002 9629', 'Ki. Fajar No. 311, Kediri 45330, Aceh', '2004-04-24', 'Balikpapan', '2019-11-17 06:36:28', '2019-11-17 06:36:28'),
(171, '71827993', '11906316', 'Gambira Habibi', 'L', 'Islam', 2, 8, '022 4285 487', 'Kpg. Cikutra Timur No. 250, Parepare 50176, Bengkulu', '2004-05-14', 'Bogor', '2019-11-17 06:36:28', '2019-11-17 06:36:28'),
(172, '24466104', '11804936', 'Jayadi Dongoran', 'L', 'Islam', 20, 4, '(+62) 548 2959 488', 'Dk. Otto No. 726, Sukabumi 78501, SulTeng', '2000-06-15', 'Tual', '2019-11-17 06:36:28', '2019-11-17 06:36:28'),
(173, '16449901', '11802418', 'Caturangga Ardianto', 'L', 'Islam', 24, 2, '0637 1852 8446', 'Psr. Bambon No. 267, Parepare 81605, Banten', '2002-07-16', 'Lubuklinggau', '2019-11-17 06:36:28', '2019-11-17 06:36:28'),
(174, '79322986', '11904299', 'Lurhur Suwarno', 'L', 'Islam', 7, 12, '0894 791 410', 'Psr. Sukabumi No. 682, Tual 69022, BaBel', '2004-07-13', 'Sungai Penuh', '2019-11-17 06:36:29', '2019-11-17 06:36:29'),
(175, '62957247', '11809577', 'Icha Widya Wastuti', 'P', 'Buddha', 22, 6, '(+62) 662 6874 837', 'Kpg. Flora No. 898, Pasuruan 38434, Lampung', '2004-08-12', 'Padang', '2019-11-17 06:36:29', '2019-11-17 06:36:29'),
(176, '57688025', '11805042', 'Prabu Halim S.IP', 'L', 'Buddha', 5, 7, '(+62) 720 6536 647', 'Psr. BKR No. 957, Padangsidempuan 72035, KalSel', '2000-09-15', 'Jayapura', '2019-11-17 06:36:29', '2019-11-17 06:36:29'),
(177, '27543166', '11709929', 'Vivi Fathonah Lestari', 'P', 'Islam', 8, 14, '0745 4159 241', 'Ki. Bhayangkara No. 173, Denpasar 64494, SumSel', '2002-12-21', 'Banda Aceh', '2019-11-17 06:36:29', '2019-11-17 06:36:29'),
(178, '33518650', '11904226', 'Vera Zulaikha Agustina', 'P', 'Islam', 10, 10, '0768 1560 229', 'Gg. Dipenogoro No. 217, Sukabumi 21200, Gorontalo', '2003-04-19', 'Ambon', '2019-11-17 06:36:29', '2019-11-17 06:36:29'),
(179, '33769291', '11801725', 'Maria Zelaya Padmasari', 'P', 'Islam', 20, 9, '0513 3234 488', 'Jln. Jagakarsa No. 399, Pekanbaru 63021, KepR', '2004-09-22', 'Blitar', '2019-11-17 06:36:29', '2019-11-17 06:36:29'),
(180, '47752250', '11904352', 'Luhung Kurniawan S.Psi', 'L', 'Buddha', 22, 9, '0464 5074 510', 'Ki. Gedebage Selatan No. 299, Pematangsiantar 36095, SulSel', '2003-08-08', 'Administrasi Jakarta Utara', '2019-11-17 06:36:29', '2019-11-17 06:36:29'),
(181, '23888569', '11808663', 'Tirtayasa Eluh Utama', 'P', 'Kristen', 24, 4, '(+62) 751 7609 1666', 'Psr. Sukajadi No. 200, Prabumulih 36731, JaTim', '2003-03-08', 'Sibolga', '2019-11-17 06:36:29', '2019-11-17 06:36:29'),
(182, '83357352', '11907493', 'Gangsa Prasasta', 'P', 'Hindu', 13, 10, '(+62) 436 2926 291', 'Jr. Urip Sumoharjo No. 186, Administrasi Jakarta Barat 51546, KalBar', '2002-02-19', 'Tebing Tinggi', '2019-11-17 06:36:29', '2019-11-17 06:36:29'),
(183, '23563655', '11703235', 'Indah Zulaikha Pudjiastuti', 'L', 'Kristen', 21, 14, '0619 9639 5964', 'Ki. Kebangkitan Nasional No. 142, Pagar Alam 13634, NTT', '2000-01-22', 'Singkawang', '2019-11-17 06:36:29', '2019-11-17 06:36:29'),
(184, '93996931', '11704411', 'Najib Sihombing M.TI.', 'P', 'Hindu', 7, 6, '(+62) 201 6712 8077', 'Ds. Dewi Sartika No. 281, Pekanbaru 67749, KepR', '2001-07-26', 'Surakarta', '2019-11-17 06:36:29', '2019-11-17 06:36:29'),
(185, '75691342', '11701412', 'Jaya Yoga Zulkarnain', 'P', 'Islam', 24, 7, '(+62) 481 6067 4834', 'Gg. Jambu No. 37, Bukittinggi 32175, KalTim', '2001-09-25', 'Medan', '2019-11-17 06:36:29', '2019-11-17 06:36:29'),
(186, '27507298', '11704317', 'Satya Halim', 'P', 'Hindu', 21, 12, '(+62) 793 6405 3966', 'Dk. Surapati No. 324, Samarinda 29593, DKI', '2002-10-03', 'Balikpapan', '2019-11-17 06:36:29', '2019-11-17 06:36:29'),
(187, '63311315', '11905631', 'Lega Permadi M.Farm', 'P', 'Buddha', 12, 6, '0457 6218 6452', 'Gg. Ikan No. 575, Sukabumi 63696, Bengkulu', '2002-07-25', 'Solok', '2019-11-17 06:36:29', '2019-11-17 06:36:29'),
(188, '15703545', '11802561', 'Kamal Nainggolan', 'L', 'Kristen', 18, 12, '0201 7514 972', 'Jln. Sentot Alibasa No. 332, Dumai 26650, Maluku', '2004-02-29', 'Cilegon', '2019-11-17 06:36:29', '2019-11-17 06:36:29'),
(189, '27666777', '11808880', 'Aris Sihotang', 'L', 'Hindu', 10, 7, '020 5840 2249', 'Psr. Babadan No. 18, Surabaya 24046, KalUt', '1999-12-05', 'Tual', '2019-11-17 06:36:29', '2019-11-17 06:36:29'),
(190, '66974322', '11906029', 'Elvina Nurdiyanti M.Kom.', 'P', 'Buddha', 2, 3, '0493 3821 4968', 'Psr. Wahidin No. 520, Manado 73814, SulBar', '1999-12-21', 'Bitung', '2019-11-17 06:36:29', '2019-11-17 06:36:29'),
(191, '81440343', '11708261', 'Darmanto Maheswara M.Farm', 'L', 'Islam', 21, 13, '(+62) 21 8587 1794', 'Ki. Ters. Pasir Koja No. 383, Surabaya 32178, Banten', '2001-01-27', 'Manado', '2019-11-17 06:36:29', '2019-11-17 06:36:29'),
(192, '16462737', '11809202', 'Endah Novitasari', 'L', 'Kristen', 24, 4, '(+62) 268 4063 0068', 'Psr. R.M. Said No. 600, Bogor 66868, MalUt', '2004-08-09', 'Batam', '2019-11-17 06:36:29', '2019-11-17 06:36:29'),
(193, '21798888', '11805382', 'Elma Kusmawati M.Ak', 'P', 'Hindu', 10, 12, '(+62) 663 9630 130', 'Jln. Achmad Yani No. 778, Jayapura 37083, SulBar', '2004-11-03', 'Sawahlunto', '2019-11-17 06:36:29', '2019-11-17 06:36:29'),
(194, '82506177', '11701508', 'Kardi Mansur', 'L', 'Hindu', 9, 14, '(+62) 475 9104 6930', 'Jln. Jakarta No. 196, Solok 88695, NTT', '2003-02-23', 'Magelang', '2019-11-17 06:36:29', '2019-11-17 06:36:29'),
(195, '52750034', '11804704', 'Syahrini Usada', 'L', 'Islam', 16, 7, '(+62) 856 285 056', 'Jr. Bak Mandi No. 501, Surakarta 12821, KalUt', '2003-02-27', 'Pontianak', '2019-11-17 06:36:29', '2019-11-17 06:36:29'),
(196, '57487544', '11808360', 'Wira Pradipta', 'L', 'Buddha', 24, 4, '(+62) 712 0587 2087', 'Ds. Ciwastra No. 442, Solok 28803, SumSel', '2002-09-10', 'Denpasar', '2019-11-17 06:36:29', '2019-11-17 06:36:29'),
(197, '91034651', '11806371', 'Darmaji Mandala', 'P', 'Buddha', 8, 8, '0458 5608 5777', 'Dk. Babadak No. 888, Sibolga 58285, Banten', '2004-02-05', 'Administrasi Jakarta Selatan', '2019-11-17 06:36:29', '2019-11-17 06:36:29'),
(198, '70588694', '11707568', 'Tugiman Ardianto', 'L', 'Islam', 24, 14, '0361 7245 3652', 'Psr. Bakaru No. 854, Tegal 43652, BaBel', '2003-09-03', 'Pagar Alam', '2019-11-17 06:36:29', '2019-11-17 06:36:29'),
(199, '95131777', '11701052', 'Titin Palastri S.I.Kom', 'P', 'Hindu', 17, 11, '(+62) 322 3570 949', 'Kpg. Ujung No. 609, Sukabumi 69583, KalBar', '2003-02-24', 'Pekalongan', '2019-11-17 06:36:29', '2019-11-17 06:36:29'),
(200, '80035102', '11904777', 'Kiandra Uyainah M.Farm', 'P', 'Islam', 14, 12, '024 3428 752', 'Gg. Baan No. 644, Cilegon 74373, NTB', '2001-06-11', 'Binjai', '2019-11-17 06:36:29', '2019-11-17 06:36:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('guru','admin','superadmin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.jpg',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Ghifari', 'MuhGhifari', 'muhammadghifari37@gmail.com', NULL, '$2y$10$9Xl7732c0bmrjShnxZI8U.qgaKoIp1FLhEBZI52yeOkaCYMENxAqO', 'admin', 'gue.jpg', NULL, '2019-11-17 06:36:21', '2019-11-17 06:36:21'),
(2, 'Sanjaya', 'Sanjay', 'restu@gmail.com', NULL, '$2y$10$UrhGhgylbax9RA/vc9FlbeSvndjS7t9car6zAKi.dQudqJxgSvNWy', 'guru', 'guru.jpg', NULL, '2019-11-17 06:36:21', '2019-11-17 06:36:21'),
(3, 'Salman Faris', 'KingSalman', 'asdfasdf@asdf.com', NULL, '$2y$10$L0xiJJqY7hsmauhx.Naowe6s7/5tvvfhl3QSC1ClsMzNCImIOa1s2', 'superadmin', 'superadmin.jpg', NULL, '2019-11-17 06:36:21', '2019-11-17 06:36:21');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_siswa`
-- (See below for the actual view)
--
CREATE TABLE `view_siswa` (
`nis` varchar(191)
,`nama` varchar(191)
,`tempat_lahir` varchar(191)
,`tanggal_lahir` date
,`rayon` varchar(191)
,`rombel` varchar(191)
,`tingkatan` enum('10','11','12')
,`tahun_ajaran` varchar(191)
);

-- --------------------------------------------------------

--
-- Structure for view `view_siswa`
--
DROP TABLE IF EXISTS `view_siswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_siswa`  AS  select `siswa`.`nis` AS `nis`,`siswa`.`nama` AS `nama`,`siswa`.`tempat_lahir` AS `tempat_lahir`,`siswa`.`tanggal_lahir` AS `tanggal_lahir`,`rayon`.`nama` AS `rayon`,`rombel`.`nama` AS `rombel`,`rombel`.`tingkatan` AS `tingkatan`,`rombel`.`tahun_ajaran` AS `tahun_ajaran` from ((`siswa` join `rombel`) join `rayon`) where ((`siswa`.`rayon_id` = `rayon`.`id`) and (`siswa`.`rombel_id` = `rombel`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `rayon`
--
ALTER TABLE `rayon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rombel`
--
ALTER TABLE `rombel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswa_nisn_unique` (`nisn`),
  ADD UNIQUE KEY `siswa_nis_unique` (`nis`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rayon`
--
ALTER TABLE `rayon`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `rombel`
--
ALTER TABLE `rombel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
