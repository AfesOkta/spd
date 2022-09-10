-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2022 at 03:58 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spd`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_pengeluaran_ril`
--

CREATE TABLE `daftar_pengeluaran_ril` (
  `id_kwitansi` int(10) UNSIGNED NOT NULL,
  `no_spd` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rincian` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `giat` int(11) NOT NULL,
  `biaya` int(11) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_pembayaran` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daftar_pengeluaran_ril`
--

INSERT INTO `daftar_pengeluaran_ril` (`id_kwitansi`, `no_spd`, `rincian`, `giat`, `biaya`, `keterangan`, `id_pembayaran`) VALUES
(10, 'SPD/007/VIII/TUK.2.1/2022', 'Biaya Penginapan', 1, 1200000, NULL, '1'),
(11, 'SPD/007/VIII/TUK.2.1/2022', 'Denpasar - Bali -> Mataram', 1, 300000, NULL, '1'),
(12, 'SPD/007/VIII/TUK.2.1/2022', 'Mataram -> Denpasar - Bali', 1, 300000, NULL, '1'),
(13, 'SPD/007/VIII/TUK.2.1/2022', 'Taxi Denpasar - Bandara PP', 1, 50000, NULL, '1'),
(14, 'SPD/007/VIII/TUK.2.1/2022', 'Taxi Kota Tujuan - Bandara PP', 1, 50000, NULL, '1'),
(15, 'SPD/007/VIII/TUK.2.1/2022', 'Uang Harian', 1, 200000, NULL, '1'),
(16, 'SPD/007/VIII/TUK.2.1/2022', 'Uang Saku', 1, 50000, NULL, '1'),
(17, 'SPD/007/VIII/TUK.2.1/2022', 'Jajan', 2, 80000, NULL, '1'),
(18, 'SPD/006/VIII/TUK.2.1/2022', 'Biaya Penginapan', 1, 5000000, 'hotel bintang 3', '1'),
(19, 'SPD/006/VIII/TUK.2.1/2022', 'Denpasar - Bali -> Jembrana', 1, 700000, NULL, '1'),
(20, 'SPD/006/VIII/TUK.2.1/2022', 'Jembrana -> Denpasar - Bali', 1, 700000, NULL, '1'),
(21, 'SPD/006/VIII/TUK.2.1/2022', 'Taxi Denpasar - Bandara PP', 1, 100000, NULL, '1'),
(22, 'SPD/006/VIII/TUK.2.1/2022', 'Taxi Kota Tujuan - Bandara PP', 1, 100000, NULL, '1'),
(23, 'SPD/006/VIII/TUK.2.1/2022', 'Uang Harian', 1, 500000, NULL, '1'),
(24, 'SPD/006/VIII/TUK.2.1/2022', 'Uang Saku', 3, 80000, NULL, '1'),
(25, 'SPD/006/VIII/TUK.2.1/2022', 'entah', 1, 360000, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `kwitansi`
--

CREATE TABLE `kwitansi` (
  `id_kwitansi` int(10) UNSIGNED NOT NULL,
  `no_spd` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rincian` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `giat` int(11) NOT NULL,
  `biaya` int(11) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_pembayaran` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rill` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kwitansi`
--

INSERT INTO `kwitansi` (`id_kwitansi`, `no_spd`, `rincian`, `giat`, `biaya`, `keterangan`, `id_pembayaran`, `rill`) VALUES
(188, 'SPD/007/VIII/TUK.2.1/2022', 'Biaya Penginapan', 2, 200000, NULL, '1', 1),
(189, 'SPD/007/VIII/TUK.2.1/2022', 'Denpasar - Bali -> Mataram', 1, 100000, NULL, '1', 1),
(190, 'SPD/007/VIII/TUK.2.1/2022', 'Mataram -> Denpasar - Bali', 1, 100000, NULL, '1', 1),
(191, 'SPD/007/VIII/TUK.2.1/2022', 'Taxi Denpasar - Bandara PP', 0, 0, NULL, '1', 1),
(192, 'SPD/007/VIII/TUK.2.1/2022', 'Taxi Kota Tujuan - Bandara PP', 0, 0, NULL, '1', 1),
(193, 'SPD/007/VIII/TUK.2.1/2022', 'Uang Harian', 0, 0, NULL, '1', 1),
(194, 'SPD/007/VIII/TUK.2.1/2022', 'Uang Saku', 0, 0, NULL, '1', 1),
(195, 'SPD/007/VIII/TUK.2.1/2022', 'jajan', 1, 10000, NULL, '1', 1),
(225, 'SPDLN/001/IX/TUK.2.1/2022', 'Biaya Penginapan', 1, 1000000, NULL, '2', 1),
(226, 'SPDLN/001/IX/TUK.2.1/2022', 'Denpasar - Bali -> Bandung', 1, 500000, NULL, '2', 1),
(227, 'SPDLN/001/IX/TUK.2.1/2022', 'Bandung -> Denpasar - Bali', 0, 0, NULL, '2', 0),
(228, 'SPDLN/001/IX/TUK.2.1/2022', 'Taxi Denpasar - Bandara PP', 0, 0, NULL, '2', 0),
(229, 'SPDLN/001/IX/TUK.2.1/2022', 'Taxi Kota Tujuan - Bandara PP', 0, 0, NULL, '2', 0),
(230, 'SPDLN/001/IX/TUK.2.1/2022', 'Uang Harian', 0, 0, NULL, '2', 0),
(231, 'SPDLN/001/IX/TUK.2.1/2022', 'Uang Saku', 0, 0, NULL, '2', 0),
(232, 'SPDLN/001/IX/TUK.2.1/2022', 'asdasd', 2, 200000, NULL, '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `metode_pembayaran`
--

CREATE TABLE `metode_pembayaran` (
  `id_pembayaran` int(10) UNSIGNED NOT NULL,
  `pembayaran` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metode_pembayaran`
--

INSERT INTO `metode_pembayaran` (`id_pembayaran`, `pembayaran`) VALUES
(1, 'Blm Bayar'),
(2, 'GUP 1'),
(3, 'GUP 2'),
(4, 'GUP 3'),
(5, 'GUP 4'),
(6, 'GUP 5'),
(7, 'GUP 6'),
(8, 'GUP 7'),
(9, 'GUP 8'),
(10, 'GUP 9'),
(11, 'GUP 10'),
(12, 'GUP 11'),
(13, 'GUP 12'),
(14, 'GUP 13'),
(15, 'GUP 14'),
(16, 'GUP 15'),
(17, 'GUP 16'),
(18, 'GUP 17'),
(19, 'GUP 18'),
(20, 'GUP 19'),
(21, 'GUP 20'),
(22, 'LS 1'),
(23, 'LS 2'),
(24, 'LS 3'),
(25, 'LS 4'),
(26, 'LS 5'),
(27, 'LS 6'),
(28, 'LS 7'),
(29, 'LS 8'),
(30, 'LS 9'),
(31, 'LS 10'),
(32, 'LS 11'),
(33, 'LS 12'),
(34, 'LS 13'),
(35, 'LS 14'),
(36, 'LS 15'),
(37, 'LS 16'),
(38, 'LS 17'),
(39, 'LS 18'),
(40, 'LS 19'),
(41, 'LS 20'),
(42, 'LS 21'),
(43, 'LS 22'),
(44, 'LS 23'),
(45, 'LS 24'),
(46, 'LS 25'),
(47, 'LS 26'),
(48, 'LS 27'),
(49, 'LS 28'),
(50, 'LS 29'),
(51, 'LS 30');

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
(2, '2022_08_09_041823_create_tables_master', 1),
(3, '2022_08_09_042421_create_personel', 1),
(4, '2022_08_16_205946_create_pejabat', 1),
(5, '2022_08_18_030035_create_pagu', 1),
(6, '2022_08_18_051056_create_spd', 1),
(7, '2022_08_20_125141_tujuan_perjalanan', 2),
(8, '2022_08_22_071927_create_table_pengikut', 3),
(9, '2022_08_23_125558_create_kwitansi', 4),
(10, '2022_08_23_133100_create_metode_pembayaran', 5),
(11, '2022_09_04_213940_add_soft_delete_to_personel', 6);

-- --------------------------------------------------------

--
-- Table structure for table `pagu`
--

CREATE TABLE `pagu` (
  `id_pagu` int(10) UNSIGNED NOT NULL,
  `akun` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pagu` int(10) UNSIGNED NOT NULL,
  `realisasi` int(10) UNSIGNED NOT NULL,
  `sisa` int(10) UNSIGNED NOT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pagu`
--

INSERT INTO `pagu` (`id_pagu`, `akun`, `pagu`, `realisasi`, `sisa`, `ket`) VALUES
(1, '111', 1000000000, 0, 1000000000, 'Dukungan Operasional'),
(2, '22222', 1000000000, 0, 1000000000, 'Perjalanan Dinas Harian');

-- --------------------------------------------------------

--
-- Table structure for table `pangkat`
--

CREATE TABLE `pangkat` (
  `id_pangkat` int(10) UNSIGNED NOT NULL,
  `nama_pangkat` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `golongan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pangkat`
--

INSERT INTO `pangkat` (`id_pangkat`, `nama_pangkat`, `golongan`) VALUES
(1, 'INSPEKTUR JENDERAL POLISI', 'IV/e'),
(2, 'BRIGADIR JENDERAL POLISI', 'IV/d'),
(3, 'KOMBES POL', 'IV/c'),
(4, 'AKBP', 'IV/b'),
(5, 'KOMPOL', 'IV/a'),
(6, 'AKP', 'III/c'),
(7, 'IPTU', 'III/b'),
(8, 'IPDA', 'III/a'),
(9, 'AIPTU', 'II/f'),
(10, 'AIPDA', 'II/e'),
(11, 'BRIPKA', 'II/d'),
(12, 'BRIGPOL', 'II/c'),
(13, 'BRIGADIR', 'II/c'),
(14, 'BRIPTU', 'II/b'),
(15, 'BRIPDA', 'II/a'),
(16, 'ABRIP', 'I/f'),
(17, 'ABRIPTU', 'I/e'),
(18, 'ABRIPDA', 'I/d'),
(19, 'BHARAKA', 'I/c'),
(20, 'BHARATU', 'I/b'),
(21, 'BHARADA', 'I/a'),
(22, 'PEMBINA I', 'IV/c'),
(23, 'PEMBINA', 'IV/a'),
(24, 'PENATA I', 'III/d'),
(25, 'PENATA', 'III/c'),
(26, 'PENDA I', 'III/b'),
(27, 'PENDA', 'III/a'),
(28, 'PENGATUR I', 'II/d'),
(29, 'PENGATUR', 'II/c'),
(30, 'PENGDA I', 'II/b'),
(31, 'PENGDA', 'II/a'),
(32, 'CPNS', '-'),
(33, 'CAPEG', '-');

-- --------------------------------------------------------

--
-- Table structure for table `pejabat`
--

CREATE TABLE `pejabat` (
  `id_pejabat` int(10) UNSIGNED NOT NULL,
  `nrp` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `struktural` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keuangan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pejabat`
--

INSERT INTO `pejabat` (`id_pejabat`, `nrp`, `struktural`, `keuangan`) VALUES
(1, '12345678', 'asdasd', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `pengikut`
--

CREATE TABLE `pengikut` (
  `id_pengikut` int(10) UNSIGNED NOT NULL,
  `id_spd` int(10) UNSIGNED NOT NULL,
  `nrp` int(10) UNSIGNED NOT NULL,
  `lama_hari` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengikut`
--

INSERT INTO `pengikut` (`id_pengikut`, `id_spd`, `nrp`, `lama_hari`) VALUES
(1, 6, 12345677, 2),
(2, 9, 12345677, 3),
(3, 10, 12345677, 2),
(4, 14, 12345678, 2),
(5, 14, 12345677, 2);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personel`
--

CREATE TABLE `personel` (
  `nrp` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_personel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pangkat` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_satker` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personel`
--

INSERT INTO `personel` (`nrp`, `nama_personel`, `jabatan`, `id_pangkat`, `id_satker`, `id_status`, `is_deleted`) VALUES
('12345677', 'Jajang', 'Perawat Ahli Madya', '17', '15', '1', 0),
('12345678', 'DADANG', 'Ka. UPTD Pkm. Dokter Gigi Ahli Madya', '1', '16', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `satker`
--

CREATE TABLE `satker` (
  `id_satker` int(10) UNSIGNED NOT NULL,
  `nama_satker` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `satker`
--

INSERT INTO `satker` (`id_satker`, `nama_satker`) VALUES
(1, 'KAPOLDA'),
(2, 'WAKAPOLDA'),
(3, 'SPRIPIM'),
(4, 'ITWASDA'),
(5, 'BIROOPS'),
(6, 'BIRORENA'),
(7, 'BIROSDM'),
(8, 'BIROLOG'),
(9, 'DITRESKRIMUM'),
(10, 'DITRESKRIMNARKOBA'),
(11, 'DITRESKRIMSUS'),
(12, 'DITINTELKAM'),
(13, 'DITPAMOBVIT'),
(14, 'DITTAHTI'),
(15, 'DITPOLAIRUD'),
(16, 'DITSAMAPTA'),
(17, 'DITLANTAS'),
(18, 'DITBINMAS'),
(19, 'BRIMOB'),
(20, 'BIDPROPAM'),
(21, 'BIDHUMAS'),
(22, 'BIDKUM'),
(23, 'YANMA'),
(24, 'BIDKEU'),
(25, 'BIDDOKKES'),
(26, 'RUMKIT'),
(27, 'SETUM'),
(28, 'TI POLDA'),
(29, 'POLRESTA DENPASAR'),
(30, 'POLRES BADUNG'),
(31, 'POLRES TABANAN'),
(32, 'POLRES JEMBRANA'),
(33, 'POLRES BULELENG'),
(34, 'POLRES BANGLI'),
(35, 'POLRES KLUNGKUNG'),
(36, 'POLRES GIANYAR'),
(37, 'POLRES KARANGASEM'),
(38, 'POLRES BANDARA'),
(39, 'SPN POLDA BALI'),
(40, 'LABFOR');

-- --------------------------------------------------------

--
-- Table structure for table `spd`
--

CREATE TABLE `spd` (
  `id_spd` int(10) UNSIGNED NOT NULL,
  `no_spd` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_spd` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_spd` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nrp` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keperluan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_spd` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan_spd` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_berangkat` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_kembali` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_sprin` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_sprin` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mata_anggaran` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_pengeluaran` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spd`
--

INSERT INTO `spd` (`id_spd`, `no_spd`, `tanggal_spd`, `jenis_spd`, `nrp`, `keperluan`, `asal_spd`, `tujuan_spd`, `tanggal_berangkat`, `tanggal_kembali`, `no_sprin`, `tanggal_sprin`, `mata_anggaran`, `jenis_pengeluaran`) VALUES
(4, 'SPD/002/VIII/TUK.2.1/2022', '21 Agustus 2022', 'Rutin', '12345678', 'dsfdsdfsdfsdf', 'Denpasar - Bali', '14', '24 August 2022', '31 August 2022', 'Sprin/43/VIII/DIK.2.3./2022', '21 Agustus 2022', '2', 'Perjalanan Dinas'),
(6, 'SPD/003/VIII/TUK.2.1/2022', '22 Agustus 2022', 'PNBP', '12345677', 'asdwsdaasd', 'Denpasar - Bali', '16', '22 August 2022', '23 August 2022', 'Sprin/021/VIII/DIK.2.3./2022', '22 Agustus 2022', '2', 'Perjalanan Dinas'),
(10, 'SPD/005/VIII/TUK.2.1/2022', '22 Agustus 2022', 'Dukops', '12345677', 'adwdawd', 'Denpasar - Bali', '15', '22 August 2022', '25 August 2022', 'Sprin/111/VIII/DIK.2.3./2022', '26 Agustus 2022', '2', 'Perjalanan Dinas'),
(14, 'SPD/006/VIII/TUK.2.1/2022', '22 Agustus 2022', 'PNBP', '12345678', 'ASDASD ADS', 'Denpasar - Bali', '4', '22 August 2022', '25 August 2022', 'Sprin/221/VIII/DIK.2.3./2022', '22 Agustus 2022', '2', 'Perjalanan Dinas'),
(15, 'SPD/007/VIII/TUK.2.1/2022', '23 Agustus 2022', 'Rutin', '12345677', 'asdasdsad', 'Denpasar - Bali', '16', '23 August 2022', '25 August 2022', 'Sprin/11223/VIII/DIK.2.3./2022', '23 Agustus 2022', '2', 'Perjalanan Dinas'),
(16, 'SPDLN/001/IX/TUK.2.1/2022', '08 September 2022', 'Luar Negeri', '12345677', 'test', 'Denpasar - Bali', '21', '08 September 2022', '30 September 2022', 'Sprin/025/IX/DIK.2.3./2022', '08 September 2022', '2', 'Perjalanan Dinas');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(10) UNSIGNED NOT NULL,
  `nama_status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `nama_status`) VALUES
(1, 'POLRI'),
(2, 'PNS');

-- --------------------------------------------------------

--
-- Table structure for table `tujuan_perjalanan`
--

CREATE TABLE `tujuan_perjalanan` (
  `id_tujuan` int(10) UNSIGNED NOT NULL,
  `nama_tujuan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uang_harian` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tujuan_perjalanan`
--

INSERT INTO `tujuan_perjalanan` (`id_tujuan`, `nama_tujuan`, `uang_harian`) VALUES
(1, 'Denpasar', 180000),
(2, 'Badung', 180000),
(3, 'Tabanan', 360000),
(4, 'Jembrana', 360000),
(5, 'Gianyar', 360000),
(6, 'Singaraja', 360000),
(7, 'Bangli', 360000),
(8, 'Karangasem', 360000),
(9, 'Klungkung', 360000),
(10, 'Jakarta', 0),
(11, 'Bogor', 0),
(12, 'Sukabumi', 0),
(13, 'Batam', 0),
(14, 'Semarang', 0),
(15, 'Surabaya', 150000),
(16, 'Mataram', 0),
(17, 'Depok', 0),
(18, 'Jakarta', 0),
(19, 'Jawa Tengah', 0),
(20, 'Tanggerang', 0),
(21, 'Bandung', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_pengeluaran_ril`
--
ALTER TABLE `daftar_pengeluaran_ril`
  ADD PRIMARY KEY (`id_kwitansi`);

--
-- Indexes for table `kwitansi`
--
ALTER TABLE `kwitansi`
  ADD PRIMARY KEY (`id_kwitansi`);

--
-- Indexes for table `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagu`
--
ALTER TABLE `pagu`
  ADD PRIMARY KEY (`id_pagu`),
  ADD UNIQUE KEY `kode_akun` (`akun`);

--
-- Indexes for table `pangkat`
--
ALTER TABLE `pangkat`
  ADD PRIMARY KEY (`id_pangkat`);

--
-- Indexes for table `pejabat`
--
ALTER TABLE `pejabat`
  ADD PRIMARY KEY (`id_pejabat`);

--
-- Indexes for table `pengikut`
--
ALTER TABLE `pengikut`
  ADD PRIMARY KEY (`id_pengikut`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `personel`
--
ALTER TABLE `personel`
  ADD PRIMARY KEY (`nrp`);

--
-- Indexes for table `satker`
--
ALTER TABLE `satker`
  ADD PRIMARY KEY (`id_satker`);

--
-- Indexes for table `spd`
--
ALTER TABLE `spd`
  ADD PRIMARY KEY (`id_spd`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tujuan_perjalanan`
--
ALTER TABLE `tujuan_perjalanan`
  ADD PRIMARY KEY (`id_tujuan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_pengeluaran_ril`
--
ALTER TABLE `daftar_pengeluaran_ril`
  MODIFY `id_kwitansi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `kwitansi`
--
ALTER TABLE `kwitansi`
  MODIFY `id_kwitansi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  MODIFY `id_pembayaran` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pagu`
--
ALTER TABLE `pagu`
  MODIFY `id_pagu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pangkat`
--
ALTER TABLE `pangkat`
  MODIFY `id_pangkat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pejabat`
--
ALTER TABLE `pejabat`
  MODIFY `id_pejabat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengikut`
--
ALTER TABLE `pengikut`
  MODIFY `id_pengikut` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `satker`
--
ALTER TABLE `satker`
  MODIFY `id_satker` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `spd`
--
ALTER TABLE `spd`
  MODIFY `id_spd` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tujuan_perjalanan`
--
ALTER TABLE `tujuan_perjalanan`
  MODIFY `id_tujuan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
