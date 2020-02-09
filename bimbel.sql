-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2019 at 02:08 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bimbel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `kode_admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `tanggal_lahir_admin` date NOT NULL,
  `jenkel_admin` enum('Pria','Wanita') COLLATE utf8_unicode_ci NOT NULL,
  `agama_admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat_admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto_admin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `nama_berita` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_berita` date NOT NULL,
  `foto_berita` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_kelas`
--

CREATE TABLE `category_kelas` (
  `id_category_kelas` int(10) UNSIGNED NOT NULL,
  `nama_category_kelas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_kelas`
--

INSERT INTO `category_kelas` (`id_category_kelas`, `nama_category_kelas`, `created_at`, `updated_at`) VALUES
(1, 'SD', NULL, NULL),
(2, 'SMP', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id_chat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_chat` date NOT NULL,
  `kode_siswa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kode_guru` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id_chat`, `tgl_chat`, `kode_siswa`, `kode_guru`, `created_at`, `updated_at`) VALUES
('CHT-000001', '2019-12-02', 'SWS-000001', 'GR-000001', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `kode_guru` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `tanggal_lahir_guru` date NOT NULL,
  `jenkel_guru` enum('Pria','Wanita') COLLATE utf8_unicode_ci NOT NULL,
  `agama_guru` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat_guru` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_handphone_guru` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto_guru` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_guru` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_category_kelas` int(10) UNSIGNED NOT NULL,
  `id_mata_pelajaran` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`kode_guru`, `user_id`, `tanggal_lahir_guru`, `jenkel_guru`, `agama_guru`, `alamat_guru`, `no_handphone_guru`, `foto_guru`, `status_guru`, `id_category_kelas`, `id_mata_pelajaran`, `created_at`, `updated_at`) VALUES
('GR-000001', 2, '2019-03-05', 'Pria', 'Islam', 'Kalianget', '0823180151', '20191203083121.webp', '0', 2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id_history` int(10) UNSIGNED NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `status_history` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kode_guru` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kode_siswa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id_history`, `tgl_transaksi`, `status_history`, `kode_guru`, `kode_siswa`, `created_at`, `updated_at`) VALUES
(1, '2019-12-03', '3', 'GR-000001', 'SWS-000001', NULL, '2019-12-03 00:49:54'),
(2, '2019-12-03', '0', 'GR-000001', 'SWS-000001', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_mata_pelajaran` int(10) UNSIGNED NOT NULL,
  `id_category_kelas` int(10) UNSIGNED NOT NULL,
  `mata_pelajaran` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_mata_pelajaran`, `id_category_kelas`, `mata_pelajaran`, `created_at`, `updated_at`) VALUES
(1, 1, 'Matematika', NULL, NULL),
(2, 2, 'Bahasa Inggris', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `materi_guru`
--

CREATE TABLE `materi_guru` (
  `id_materi_guru` int(10) UNSIGNED NOT NULL,
  `nama_materi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_materi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kode_guru` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kode_siswa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `materi_guru`
--

INSERT INTO `materi_guru` (`id_materi_guru`, `nama_materi`, `file_materi`, `kode_guru`, `kode_siswa`, `created_at`, `updated_at`) VALUES
(1, 'Database', '20191203074823.pdf', 'GR-000001', 'SWS-000001', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(17, '2014_10_12_000000_create_user_table', 1),
(18, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(19, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(20, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(21, '2016_06_01_000004_create_oauth_clients_table', 1),
(22, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(23, '2019_10_14_121225_create_guru_table', 1),
(24, '2019_10_17_133650_create_siswa_table', 1),
(25, '2019_10_18_121626_create_category_kelas_table', 1),
(26, '2019_10_19_011317_create_mata_pelajaran_table', 1),
(27, '2019_10_31_151050_create_admin_table', 1),
(28, '2019_11_16_141551_create_berita_table', 1),
(29, '2019_11_27_080530_create_history_table', 1),
(30, '2019_11_29_163352_create_materi_guru_table', 1),
(31, '2019_12_01_121405_create_chat_table', 1),
(32, '2019_12_01_121737_create_tmp_chat_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('18f9c16b5cfbac6fdb06ce39c0d3be0783badd10d7e9b7b6c031cc78eb3c55ed591c81a42ad875b3', 2, 2, NULL, '[\"*\"]', 0, '2019-12-02 19:55:03', '2019-12-02 19:55:03', '2019-12-04 02:55:03'),
('286c982c7ab27afe6343ac971917c117bcc68515cf2f9d7dbe837ec74754a2b102b0f2186a06091e', 1, 2, NULL, '[\"*\"]', 0, '2019-12-02 19:55:57', '2019-12-02 19:55:57', '2019-12-04 02:55:57'),
('2c22b1d30b7e0cff55e8ba18340a6e8207c26f295e685ccaf168056cb09c806fdb6caf64c69bbcee', 1, 2, NULL, '[\"*\"]', 0, '2019-12-01 21:36:21', '2019-12-01 21:36:21', '2019-12-03 04:36:21'),
('32a4bfb570414d8866bbb43dcfd2c9889e1117fb72b499b8215e007d725c35f8043a45dd6a11a343', 2, 2, NULL, '[\"*\"]', 0, '2019-12-03 01:28:28', '2019-12-03 01:28:28', '2019-12-04 08:28:28'),
('42f87f3f07925175225025377b7a0fd9d430d45605db6c6cbb47f92405538836a6887341826e8451', 2, 2, NULL, '[\"*\"]', 0, '2019-12-01 21:37:55', '2019-12-01 21:37:55', '2019-12-03 04:37:55'),
('77588aefafe797be297d8aec909fd95d2c65bebaaa3604802689264fd31a7bc6deba7ec6354c0220', 2, 2, NULL, '[\"*\"]', 0, '2019-12-03 01:20:48', '2019-12-03 01:20:48', '2019-12-04 08:20:48'),
('7f205841fa6395de251d102e40cc0ee08708ffa5f5b45502cfe864d75b0acabc31415488a5f47265', 1, 2, NULL, '[\"*\"]', 0, '2019-12-01 21:39:55', '2019-12-01 21:39:55', '2019-12-03 04:39:55'),
('a59fb0a952039a352c737b0497a28617071bc723c984755f3cf8cc67124b48cec13ec79cc0d2c767', 1, 2, NULL, '[\"*\"]', 0, '2019-12-01 21:36:52', '2019-12-01 21:36:52', '2019-12-03 04:36:52'),
('b411bc7438a4c619684ad92c564463b0d287057ece371a8bb7cbf2d4b52512a10fcae8848c496253', 1, 2, NULL, '[\"*\"]', 0, '2019-12-03 00:35:32', '2019-12-03 00:35:32', '2019-12-04 07:35:32'),
('ce5c2a43494bc7c2761c06c36f54bb4872fb2bd89c86e300e545c5239076c447ea29479340ebd929', 1, 2, NULL, '[\"*\"]', 0, '2019-12-03 01:27:48', '2019-12-03 01:27:48', '2019-12-04 08:27:48'),
('d758bcb9bfe4c4f9de460514a218f5c75feac07157b0fd6f04470484984fbe6332bd03d49b9540ee', 2, 2, NULL, '[\"*\"]', 0, '2019-12-03 00:30:45', '2019-12-03 00:30:45', '2019-12-04 07:30:44'),
('e90289b2a4db010f638712a701dd9470f6822a0cfe5d5c14ae32e3ba1d02d68c22d2423f53d10990', 1, 2, NULL, '[\"*\"]', 0, '2019-12-03 00:58:15', '2019-12-03 00:58:15', '2019-12-04 07:58:15'),
('eb3233e43cd22fcc591aa3dc6705ab5a2bd5e8aceeb9cb3c47148d69a37ea53ca4692362d2ea220e', 2, 2, NULL, '[\"*\"]', 0, '2019-12-01 21:36:42', '2019-12-01 21:36:42', '2019-12-03 04:36:42'),
('fc4b8fc15a2dace969ed4289c83412025868eb49327f1579bd3236db6c16b45bf526627bf5abfca2', 1, 2, NULL, '[\"*\"]', 0, '2019-12-01 23:55:50', '2019-12-01 23:55:50', '2019-12-03 06:55:49');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'rMVawkLo8YJWLekZqw8JfiLFMtEavLcOtAKvJHU2', 'http://localhost', 1, 0, 0, '2019-12-01 21:36:04', '2019-12-01 21:36:04'),
(2, NULL, 'Laravel Password Grant Client', 'xSlrw14mWOnDCaXinBFSBD2XMKymjIKFzmt1C3LM', 'http://localhost', 0, 1, 0, '2019-12-01 21:36:04', '2019-12-01 21:36:04');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-12-01 21:36:04', '2019-12-01 21:36:04');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
('331074f56e56934f7cdfe73701275e51295ca8590357497e284ddc5d3e2d8480c4080425af986ea7', '7f205841fa6395de251d102e40cc0ee08708ffa5f5b45502cfe864d75b0acabc31415488a5f47265', 0, '2020-01-01 04:39:55'),
('3661acce73b41d0a4cbc9d1275b6c786c7d9f6e59ea96321e64dc41806a46b8f59d6773d184d7bc4', 'fc4b8fc15a2dace969ed4289c83412025868eb49327f1579bd3236db6c16b45bf526627bf5abfca2', 0, '2020-01-01 06:55:49'),
('3988952eace248309536b9c8cb09227545c82071b21975f6ab659e918124b2dfbe1119bd14104db9', '286c982c7ab27afe6343ac971917c117bcc68515cf2f9d7dbe837ec74754a2b102b0f2186a06091e', 0, '2020-01-02 02:55:57'),
('6d8f5613f091b5bba43a7bedf1995b7be8e727e3164bd5a5fd64227381520589604092f451067e9f', '77588aefafe797be297d8aec909fd95d2c65bebaaa3604802689264fd31a7bc6deba7ec6354c0220', 0, '2020-01-02 08:20:48'),
('735f6c8cb3dbc2d70d453b955c73d25fbeb75182a280db71fd2635bd0500ec63d8b0a2bbe9204f26', 'ce5c2a43494bc7c2761c06c36f54bb4872fb2bd89c86e300e545c5239076c447ea29479340ebd929', 0, '2020-01-02 08:27:48'),
('8679fed7ebad64d7d558835138397ca0379c43c8178f0ae36dc1e749a0fd8d135337af29f15703cf', 'd758bcb9bfe4c4f9de460514a218f5c75feac07157b0fd6f04470484984fbe6332bd03d49b9540ee', 0, '2020-01-02 07:30:44'),
('8a88a7e72f40432138e84a4c4727e7af8d828561705303429c61f05215427812d3921e75358b2d30', '32a4bfb570414d8866bbb43dcfd2c9889e1117fb72b499b8215e007d725c35f8043a45dd6a11a343', 0, '2020-01-02 08:28:28'),
('aaaa17e807dea5a60202cd84217fd266bb1c28744990d838db17209d6348ec2eb3a3907da621bf48', '18f9c16b5cfbac6fdb06ce39c0d3be0783badd10d7e9b7b6c031cc78eb3c55ed591c81a42ad875b3', 0, '2020-01-02 02:55:03'),
('c1f8154cd7a3076fe0cfd2b81319b9d139447f669fcc551f4f2efe745ea3d7fef82a1825d76febe2', 'b411bc7438a4c619684ad92c564463b0d287057ece371a8bb7cbf2d4b52512a10fcae8848c496253', 0, '2020-01-02 07:35:32'),
('d48db0f30408a512e813f717b6bd13714a1ac98b22e3eb3a8245c6ab8b203f29518508ce39c8109b', 'eb3233e43cd22fcc591aa3dc6705ab5a2bd5e8aceeb9cb3c47148d69a37ea53ca4692362d2ea220e', 0, '2020-01-01 04:36:42'),
('d7d3a02b1afe224e05bac8a467023d81598dba5586c38aed7502321cb88480422d8e76e357773e85', 'a59fb0a952039a352c737b0497a28617071bc723c984755f3cf8cc67124b48cec13ec79cc0d2c767', 0, '2020-01-01 04:36:52'),
('eab8e053e1660b9127b3ada54b03169c76d94fee7b0318806401760ee0d8350e83b65b3c99ea3523', '42f87f3f07925175225025377b7a0fd9d430d45605db6c6cbb47f92405538836a6887341826e8451', 0, '2020-01-01 04:37:55'),
('f05c485d593da406c6315b595e0dd3f3cbf6e952622f86f9f57b1c99c380086a67b6aae1ae14d09e', 'e90289b2a4db010f638712a701dd9470f6822a0cfe5d5c14ae32e3ba1d02d68c22d2423f53d10990', 0, '2020-01-02 07:58:15'),
('febca4b7523aec1694b73da57ce61cf4ff82d3e7e1cc8efcc333e80f71b4fc184972e228071862c2', '2c22b1d30b7e0cff55e8ba18340a6e8207c26f295e685ccaf168056cb09c806fdb6caf64c69bbcee', 0, '2020-01-01 04:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `kode_siswa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `tanggal_lahir_siswa` date NOT NULL,
  `jenkel_siswa` enum('Pria','Wanita') COLLATE utf8_unicode_ci NOT NULL,
  `agama_siswa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat_siswa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_handphone_siswa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto_siswa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`kode_siswa`, `user_id`, `tanggal_lahir_siswa`, `jenkel_siswa`, `agama_siswa`, `alamat_siswa`, `no_handphone_siswa`, `foto_siswa`, `created_at`, `updated_at`) VALUES
('SWS-000001', 1, '2000-11-23', 'Pria', 'Islam', 'Pamolokan', '082301261900', '20191203025622.webp', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_chat`
--

CREATE TABLE `tmp_chat` (
  `id` int(10) UNSIGNED NOT NULL,
  `isi_chat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_chat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tmp_chat`
--

INSERT INTO `tmp_chat` (`id`, `isi_chat`, `id_chat`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'halo', 'CHT-000001', 1, NULL, NULL),
(37, 'Rtt', 'CHT-000001', 1, NULL, NULL),
(38, 'gg', 'CHT-000001', 2, NULL, NULL),
(39, 'hshs', 'CHT-000001', 2, NULL, NULL),
(40, 'Ghs', 'CHT-000001', 1, NULL, NULL),
(41, 'fg', 'CHT-000001', 2, NULL, NULL),
(42, 'Hh', 'CHT-000001', 1, NULL, NULL),
(43, 'Hh', 'CHT-000001', 1, NULL, NULL),
(44, 'fff', 'CHT-000001', 2, NULL, NULL),
(45, 'Hguh', 'CHT-000001', 1, NULL, NULL),
(46, 'Hh', 'CHT-000001', 1, NULL, NULL),
(47, 'fff', 'CHT-000001', 2, NULL, NULL),
(48, 'Kji', 'CHT-000001', 1, NULL, NULL),
(49, 'ddd', 'CHT-000001', 2, NULL, NULL),
(50, 'Hayuu', 'CHT-000001', 1, NULL, NULL),
(51, 'mememe', 'CHT-000001', 2, NULL, NULL),
(52, 'Ke', 'CHT-000001', 1, NULL, NULL),
(53, 'jx', 'CHT-000001', 2, NULL, NULL),
(54, 'Uw', 'CHT-000001', 1, NULL, NULL),
(55, 'xjx', 'CHT-000001', 2, NULL, NULL),
(56, 'Jet jsjs', 'CHT-000001', 1, NULL, NULL),
(57, 'x', 'CHT-000001', 2, NULL, NULL),
(58, 'ddd', 'CHT-000001', 2, NULL, NULL),
(59, 'd', 'CHT-000001', 2, NULL, NULL),
(60, 'dx', 'CHT-000001', 2, NULL, NULL),
(61, 'xx', 'CHT-000001', 2, NULL, NULL),
(62, 'x', 'CHT-000001', 2, NULL, NULL),
(63, 'Y', 'CHT-000001', 1, NULL, NULL),
(64, 'Hwhwuehh', 'CHT-000001', 1, NULL, NULL),
(65, 'Hu', 'CHT-000001', 1, NULL, NULL),
(66, 'ipen kntl', 'CHT-000001', 2, NULL, NULL),
(67, 'keren', 'CHT-000001', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` enum('Admin','Guru','Siswa') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `nama`, `level`, `created_at`, `updated_at`) VALUES
(1, 'alhamdi', 'alhamdi@gmail.com', '$2y$10$xUNUC06Tj7QO2aq8u774Q.UmbIzf2TxzG6kjw6VuDc0MW77qLJRDm', 'Alhamdi', 'Siswa', '2019-12-01 21:36:21', '2019-12-01 21:36:21'),
(2, 'farel', 'farel@gmail.com', '$2y$10$iRheiag3uMJt3vaSn5Lk8uFTLLqt/Ci95OuDstd2BW.JeMOQKVbQK', 'Farel Putra Hidayat', 'Guru', '2019-12-01 21:36:42', '2019-12-01 21:36:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`kode_admin`),
  ADD KEY `admin_user_id_foreign` (`user_id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `berita_user_id_foreign` (`user_id`);

--
-- Indexes for table `category_kelas`
--
ALTER TABLE `category_kelas`
  ADD PRIMARY KEY (`id_category_kelas`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`),
  ADD KEY `chat_kode_siswa_foreign` (`kode_siswa`),
  ADD KEY `chat_kode_guru_foreign` (`kode_guru`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`kode_guru`),
  ADD KEY `guru_user_id_foreign` (`user_id`),
  ADD KEY `guru_id_category_kelas_foreign` (`id_category_kelas`),
  ADD KEY `guru_id_mata_pelajaran_foreign` (`id_mata_pelajaran`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `history_kode_guru_foreign` (`kode_guru`),
  ADD KEY `history_kode_siswa_foreign` (`kode_siswa`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_mata_pelajaran`),
  ADD KEY `mata_pelajaran_id_category_kelas_index` (`id_category_kelas`);

--
-- Indexes for table `materi_guru`
--
ALTER TABLE `materi_guru`
  ADD PRIMARY KEY (`id_materi_guru`),
  ADD KEY `materi_guru_kode_guru_foreign` (`kode_guru`),
  ADD KEY `materi_guru_kode_siswa_foreign` (`kode_siswa`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`kode_siswa`),
  ADD KEY `siswa_user_id_foreign` (`user_id`);

--
-- Indexes for table `tmp_chat`
--
ALTER TABLE `tmp_chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tmp_chat_id_chat_foreign` (`id_chat`),
  ADD KEY `tmp_chat_user_id_foreign` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_username_unique` (`username`),
  ADD UNIQUE KEY `user_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_kelas`
--
ALTER TABLE `category_kelas`
  MODIFY `id_category_kelas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id_mata_pelajaran` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `materi_guru`
--
ALTER TABLE `materi_guru`
  MODIFY `id_materi_guru` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tmp_chat`
--
ALTER TABLE `tmp_chat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_kode_guru_foreign` FOREIGN KEY (`kode_guru`) REFERENCES `guru` (`kode_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chat_kode_siswa_foreign` FOREIGN KEY (`kode_siswa`) REFERENCES `siswa` (`kode_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_id_category_kelas_foreign` FOREIGN KEY (`id_category_kelas`) REFERENCES `category_kelas` (`id_category_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `guru_id_mata_pelajaran_foreign` FOREIGN KEY (`id_mata_pelajaran`) REFERENCES `mata_pelajaran` (`id_mata_pelajaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `guru_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_kode_guru_foreign` FOREIGN KEY (`kode_guru`) REFERENCES `guru` (`kode_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `history_kode_siswa_foreign` FOREIGN KEY (`kode_siswa`) REFERENCES `siswa` (`kode_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD CONSTRAINT `mata_pelajaran_id_category_kelas_foreign` FOREIGN KEY (`id_category_kelas`) REFERENCES `category_kelas` (`id_category_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `materi_guru`
--
ALTER TABLE `materi_guru`
  ADD CONSTRAINT `materi_guru_kode_guru_foreign` FOREIGN KEY (`kode_guru`) REFERENCES `guru` (`kode_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materi_guru_kode_siswa_foreign` FOREIGN KEY (`kode_siswa`) REFERENCES `siswa` (`kode_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tmp_chat`
--
ALTER TABLE `tmp_chat`
  ADD CONSTRAINT `tmp_chat_id_chat_foreign` FOREIGN KEY (`id_chat`) REFERENCES `chat` (`id_chat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tmp_chat_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
