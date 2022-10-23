-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Okt 2022 pada 16.26
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simantri`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `group_tbl`
--

CREATE TABLE `group_tbl` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `group_tbl`
--

INSERT INTO `group_tbl` (`group_id`, `group_name`) VALUES
(1, 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_tbl`
--

CREATE TABLE `setting_tbl` (
  `setting_id` int(11) NOT NULL,
  `setting_appname` varchar(100) NOT NULL,
  `setting_short_appname` varchar(20) NOT NULL,
  `setting_origin_app` varchar(100) NOT NULL,
  `setting_owner_name` varchar(100) NOT NULL,
  `setting_phone` varchar(50) NOT NULL,
  `setting_email` varchar(100) NOT NULL,
  `setting_address` text NOT NULL,
  `setting_logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `setting_tbl`
--

INSERT INTO `setting_tbl` (`setting_id`, `setting_appname`, `setting_short_appname`, `setting_origin_app`, `setting_owner_name`, `setting_phone`, `setting_email`, `setting_address`, `setting_logo`) VALUES
(1, 'Simulasi Antrian Pelayanan Kependudukan DISDUK Capil Kota Baubau', 'SIMANTRI', 'Universitas Halu Oleo', 'muhammad nursabri', '081343664074', 'abdillahsabry@gmail.com', 'BTN Wirabuana Blok H1 No. 1', 'settinglogo16.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hasil`
--

CREATE TABLE `tb_hasil` (
  `id_hasil` int(11) NOT NULL,
  `r_tunggu_antrian` double NOT NULL,
  `r_tunggu_layan` double NOT NULL,
  `r_nasabah_antrian` double NOT NULL,
  `r_nasabah_sistem` double NOT NULL,
  `probabilitas_teler` double NOT NULL,
  `r_layan_total` double NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_parameter` int(11) NOT NULL,
  `id_saran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_hasil`
--

INSERT INTO `tb_hasil` (`id_hasil`, `r_tunggu_antrian`, `r_tunggu_layan`, `r_nasabah_antrian`, `r_nasabah_sistem`, `probabilitas_teler`, `r_layan_total`, `waktu`, `id_parameter`, `id_saran`) VALUES
(1, 1.3486, 0.1171, 45, 48.3697, 3.8657, 3.8657, '2022-06-09 02:41:21', 1, 2),
(2, 0.4504, 0.1167, 15, 18.7133, 1.9258, 1.9258, '2022-06-09 02:41:29', 2, 2),
(3, 0.1097, 0.112, 4, 7.3162, 1.23233, 1.2323333333333, '2022-06-09 02:41:33', 3, 2),
(4, 0.0188, 0.116, 1, 4.449, 0.95678, 0.956775, '2022-06-09 02:41:37', 4, 1),
(5, 0.0167, 0.113, 1, 4.2814, 0.74606, 0.74606, '2022-06-09 02:41:41', 5, 3),
(6, 0.0169, 0.1126, 1, 4.2723, 0.7431, 0.7431, '2022-06-09 06:49:32', 6, 3),
(7, 0.0269, 0.1181, 1, 4.7831, 0.97395, 0.97395, '2022-06-09 06:50:47', 7, 1),
(8, 0.0276, 0.0613, 2, 5.8654, 1.01078, 1.010775, '2022-08-17 01:44:30', 1, 2),
(9, 0.0217, 0.0598, 1, 5.3754, 0.98628, 0.986275, '2022-10-23 14:16:28', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kedatangan`
--

CREATE TABLE `tb_kedatangan` (
  `id_kedatangan` int(11) NOT NULL,
  `lamda` int(11) NOT NULL,
  `durasi` int(11) NOT NULL,
  `bil_acak` double NOT NULL,
  `i_waktu_kedatangan` double NOT NULL,
  `w_kedatangan` double NOT NULL,
  `iwk_waktu` double NOT NULL,
  `wk_waktu` double NOT NULL,
  `id_pelayanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kedatangan`
--

INSERT INTO `tb_kedatangan` (`id_kedatangan`, `lamda`, `durasi`, `bil_acak`, `i_waktu_kedatangan`, `w_kedatangan`, `iwk_waktu`, `wk_waktu`, `id_pelayanan`) VALUES
(1, 66, 1, 0, 0, 0, 0, 0, 1),
(2, 66, 1, 0.0991, 0.0152, 0.0152, 54.72, 54.72, 2),
(3, 66, 1, 0.0958, 0.0154, 0.0306, 55.44, 110.16, 3),
(4, 66, 1, 0.0902, 0.0158, 0.0464, 56.88, 167.04, 4),
(5, 66, 1, 0.0967, 0.0154, 0.0618, 55.44, 222.48, 5),
(6, 66, 1, 0.0944, 0.0155, 0.0773, 55.8, 278.28, 6),
(7, 66, 1, 0.0948, 0.0155, 0.0928, 55.8, 334.08, 7),
(8, 66, 1, 0.0982, 0.0153, 0.1081, 55.08, 389.16, 8),
(9, 66, 1, 0.0914, 0.0157, 0.1238, 56.52, 445.68, 9),
(10, 66, 1, 0.0937, 0.0156, 0.1394, 56.16, 501.84, 10),
(11, 66, 1, 0.0999, 0.0152, 0.1546, 54.72, 556.56, 11),
(12, 66, 1, 0.0979, 0.0153, 0.1699, 55.08, 611.64, 12),
(13, 66, 1, 0.0942, 0.0155, 0.1854, 55.8, 667.44, 13),
(14, 66, 1, 0.0937, 0.0156, 0.201, 56.16, 723.6, 14),
(15, 66, 1, 0.0962, 0.0154, 0.2164, 55.44, 779.04, 15),
(16, 66, 1, 0.0991, 0.0152, 0.2316, 54.72, 833.76, 16),
(17, 66, 1, 0.0922, 0.0157, 0.2473, 56.52, 890.28, 17),
(18, 66, 1, 0.095, 0.0155, 0.2628, 55.8, 946.08, 18),
(19, 66, 1, 0.0988, 0.0152, 0.278, 54.72, 1000.8, 19),
(20, 66, 1, 0.0927, 0.0157, 0.2937, 56.52, 1057.32, 20),
(21, 66, 1, 0.0973, 0.0153, 0.309, 55.08, 1112.4, 21),
(22, 66, 1, 0.0968, 0.0154, 0.3244, 55.44, 1167.84, 22),
(23, 66, 1, 0.092, 0.0157, 0.3401, 56.52, 1224.36, 23),
(24, 66, 1, 0.0989, 0.0152, 0.3553, 54.72, 1279.08, 24),
(25, 66, 1, 0.098, 0.0153, 0.3706, 55.08, 1334.16, 25),
(26, 66, 1, 0.0902, 0.0158, 0.3864, 56.88, 1391.04, 26),
(27, 66, 1, 0.0974, 0.0153, 0.4017, 55.08, 1446.12, 27),
(28, 66, 1, 0.0971, 0.0153, 0.417, 55.08, 1501.2, 28),
(29, 66, 1, 0.0955, 0.0155, 0.4325, 55.8, 1557, 29),
(30, 66, 1, 0.0907, 0.0158, 0.4483, 56.88, 1613.88, 30),
(31, 66, 1, 0.0927, 0.0157, 0.464, 56.52, 1670.4, 31),
(32, 66, 1, 0.0993, 0.0152, 0.4792, 54.72, 1725.12, 32),
(33, 66, 1, 0.0936, 0.0156, 0.4948, 56.16, 1781.28, 33),
(34, 66, 1, 0.097, 0.0154, 0.5102, 55.44, 1836.72, 34),
(35, 66, 1, 0.0991, 0.0152, 0.5254, 54.72, 1891.44, 35),
(36, 66, 1, 0.0976, 0.0153, 0.5407, 55.08, 1946.52, 36),
(37, 66, 1, 0.0976, 0.0153, 0.556, 55.08, 2001.6, 37),
(38, 66, 1, 0.0965, 0.0154, 0.5714, 55.44, 2057.04, 38),
(39, 66, 1, 0.0903, 0.0158, 0.5872, 56.88, 2113.92, 39),
(40, 66, 1, 0.0939, 0.0156, 0.6028, 56.16, 2170.08, 40),
(41, 66, 1, 0.0945, 0.0155, 0.6183, 55.8, 2225.88, 41),
(42, 66, 1, 0.0965, 0.0154, 0.6337, 55.44, 2281.32, 42),
(43, 66, 1, 0.0952, 0.0155, 0.6492, 55.8, 2337.12, 43),
(44, 66, 1, 0.0992, 0.0152, 0.6644, 54.72, 2391.84, 44),
(45, 66, 1, 0.0983, 0.0153, 0.6797, 55.08, 2446.92, 45),
(46, 66, 1, 0.0967, 0.0154, 0.6951, 55.44, 2502.36, 46),
(47, 66, 1, 0.0948, 0.0155, 0.7106, 55.8, 2558.16, 47),
(48, 66, 1, 0.0931, 0.0156, 0.7262, 56.16, 2614.32, 48),
(49, 66, 1, 0.0987, 0.0152, 0.7414, 54.72, 2669.04, 49),
(50, 66, 1, 0.0936, 0.0156, 0.757, 56.16, 2725.2, 50),
(51, 66, 1, 0.0928, 0.0156, 0.7726, 56.16, 2781.36, 51),
(52, 66, 1, 0.0996, 0.0152, 0.7878, 54.72, 2836.08, 52),
(53, 66, 1, 0.0937, 0.0156, 0.8034, 56.16, 2892.24, 53),
(54, 66, 1, 0.0967, 0.0154, 0.8188, 55.44, 2947.68, 54),
(55, 66, 1, 0.0992, 0.0152, 0.834, 54.72, 3002.4, 55),
(56, 66, 1, 0.0919, 0.0157, 0.8497, 56.52, 3058.92, 56),
(57, 66, 1, 0.0946, 0.0155, 0.8652, 55.8, 3114.72, 57),
(58, 66, 1, 0.0906, 0.0158, 0.881, 56.88, 3171.6, 58),
(59, 66, 1, 0.0958, 0.0154, 0.8964, 55.44, 3227.04, 59),
(60, 66, 1, 0.095, 0.0155, 0.9119, 55.8, 3282.84, 60),
(61, 66, 1, 0.0968, 0.0154, 0.9273, 55.44, 3338.28, 61),
(62, 66, 1, 0.0917, 0.0157, 0.943, 56.52, 3394.8, 62),
(63, 66, 1, 0.0913, 0.0158, 0.9588, 56.88, 3451.68, 63),
(64, 66, 1, 0.0932, 0.0156, 0.9744, 56.16, 3507.84, 64),
(65, 66, 1, 0.0979, 0.0153, 0.9897, 55.08, 3562.92, 65),
(66, 66, 1, 0.0968, 0.0154, 1.0051, 55.44, 3618.36, 66);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_manajemen_profil`
--

CREATE TABLE `tb_manajemen_profil` (
  `id` int(11) NOT NULL,
  `nama_instansi` varchar(500) NOT NULL,
  `visi` varchar(500) NOT NULL,
  `misi` varchar(500) NOT NULL,
  `logo` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_manajemen_profil`
--

INSERT INTO `tb_manajemen_profil` (`id`, `nama_instansi`, `visi`, `misi`, `logo`) VALUES
(428770923, 'DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL', 'A', 'A', 'logo.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_parameter`
--

CREATE TABLE `tb_parameter` (
  `id` int(11) NOT NULL,
  `p_lamda` int(11) NOT NULL,
  `p_miu` int(11) NOT NULL,
  `p_loket` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_parameter`
--

INSERT INTO `tb_parameter` (`id`, `p_lamda`, `p_miu`, `p_loket`, `waktu`) VALUES
(1, 66, 12, 4, '2022-08-17 01:44:30'),
(2, 66, 12, 4, '2022-10-23 14:16:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelayanan`
--

CREATE TABLE `tb_pelayanan` (
  `id_pelayanan` int(11) NOT NULL,
  `bil_acak` double NOT NULL,
  `loket` int(11) NOT NULL,
  `w_mulai` float NOT NULL,
  `w_layanan` float NOT NULL,
  `w_selesai_layanan` float NOT NULL,
  `w_tunggu_antrian` float NOT NULL,
  `w_tunggu_sistem` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pelayanan`
--

INSERT INTO `tb_pelayanan` (`id_pelayanan`, `bil_acak`, `loket`, `w_mulai`, `w_layanan`, `w_selesai_layanan`, `w_tunggu_antrian`, `w_tunggu_sistem`) VALUES
(1, 0.218, 1, 60.12, 198.36, 258.48, 60.12, 258.48),
(2, 0.248, 2, 114.84, 181.8, 296.64, 60.12, 241.92),
(3, 0.198, 3, 170.28, 210.96, 381.24, 60.12, 271.08),
(4, 0.182, 4, 227.16, 222.12, 449.28, 60.12, 282.24),
(5, 0.29, 1, 282.6, 161.28, 443.88, 60.12, 221.4),
(6, 0.3, 2, 338.4, 156.96, 495.36, 60.12, 217.08),
(7, 0.237, 3, 394.2, 187.56, 581.76, 60.12, 247.68),
(8, 0.126, 1, 449.28, 270, 719.28, 60.12, 330.12),
(9, 0.276, 2, 505.8, 167.76, 673.56, 60.12, 227.88),
(10, 0.126, 4, 561.96, 270, 831.96, 60.12, 330.12),
(11, 0.207, 3, 616.68, 205.2, 821.88, 60.12, 265.32),
(12, 0.185, 2, 673.56, 219.96, 893.52, 61.92, 281.88),
(13, 0.202, 1, 727.56, 208.44, 936, 60.12, 268.56),
(14, 0.2, 3, 821.88, 209.52, 1031.4, 98.28, 307.8),
(15, 0.183, 4, 839.16, 221.4, 1060.56, 60.12, 281.52),
(16, 0.299, 2, 893.88, 157.32, 1051.2, 60.12, 217.44),
(17, 0.153, 1, 950.4, 244.44, 1194.84, 60.12, 304.56),
(18, 0.134, 3, 1031.4, 261.72, 1293.12, 85.32, 347.04),
(19, 0.226, 2, 1060.92, 193.68, 1254.6, 60.12, 253.8),
(20, 0.241, 4, 1117.44, 185.4, 1302.84, 60.12, 245.52),
(21, 0.159, 1, 1194.84, 239.76, 1434.6, 82.44, 322.2),
(22, 0.108, 2, 1254.6, 289.8, 1544.4, 86.76, 376.56),
(23, 0.103, 3, 1293.12, 296.28, 1589.4, 68.76, 365.04),
(24, 0.257, 4, 1339.2, 177.12, 1516.32, 60.12, 237.24),
(25, 0.208, 1, 1434.6, 204.48, 1639.08, 100.44, 304.92),
(26, 0.231, 4, 1516.32, 190.8, 1707.12, 125.28, 316.08),
(27, 0.234, 2, 1544.4, 189.36, 1733.76, 98.28, 287.64),
(28, 0.255, 3, 1589.4, 178.2, 1767.6, 88.2, 266.4),
(29, 0.177, 1, 1639.08, 225.72, 1864.8, 82.08, 307.8),
(30, 0.194, 4, 1707.12, 213.48, 1920.6, 93.24, 306.72),
(31, 0.157, 2, 1733.76, 241.2, 1974.96, 63.36, 304.56),
(32, 0.207, 3, 1785.24, 205.2, 1990.44, 60.12, 265.32),
(33, 0.105, 1, 1864.8, 293.76, 2158.56, 83.52, 377.28),
(34, 0.27, 4, 1920.6, 170.64, 2091.24, 83.88, 254.52),
(35, 0.2, 2, 1974.96, 209.52, 2184.48, 83.52, 293.04),
(36, 0.295, 3, 2006.64, 159.12, 2165.76, 60.12, 219.24),
(37, 0.114, 4, 2091.24, 282.96, 2374.2, 89.64, 372.6),
(38, 0.204, 1, 2158.56, 207, 2365.56, 101.52, 308.52),
(39, 0.142, 3, 2174.04, 254.16, 2428.2, 60.12, 314.28),
(40, 0.127, 2, 2230.2, 268.92, 2499.12, 60.12, 329.04),
(41, 0.144, 1, 2365.56, 252.36, 2617.92, 139.68, 392.04),
(42, 0.277, 4, 2374.2, 167.4, 2541.6, 92.88, 260.28),
(43, 0.21, 3, 2428.2, 203.4, 2631.6, 91.08, 294.48),
(44, 0.118, 2, 2499.12, 278.28, 2777.4, 107.28, 385.56),
(45, 0.265, 4, 2541.6, 173.16, 2714.76, 94.68, 267.84),
(46, 0.108, 1, 2617.92, 289.8, 2907.72, 115.56, 405.36),
(47, 0.219, 3, 2631.6, 198, 2829.6, 73.44, 271.44),
(48, 0.243, 4, 2714.76, 184.32, 2899.08, 100.44, 284.76),
(49, 0.187, 2, 2777.4, 218.52, 2995.92, 108.36, 326.88),
(50, 0.23, 3, 2829.6, 191.52, 3021.12, 104.4, 295.92),
(51, 0.288, 4, 2899.08, 162.36, 3061.44, 117.72, 280.08),
(52, 0.166, 1, 2907.72, 234, 3141.72, 71.64, 305.64),
(53, 0.145, 2, 2995.92, 251.64, 3247.56, 103.68, 355.32),
(54, 0.188, 3, 3021.12, 217.8, 3238.92, 73.44, 291.24),
(55, 0.252, 4, 3062.52, 179.64, 3242.16, 60.12, 239.76),
(56, 0.22, 1, 3141.72, 197.28, 3339, 82.8, 280.08),
(57, 0.231, 3, 3238.92, 190.8, 3429.72, 124.2, 315),
(58, 0.222, 4, 3242.16, 196.2, 3438.36, 70.56, 266.76),
(59, 0.213, 2, 3287.16, 201.6, 3488.76, 60.12, 261.72),
(60, 0.251, 1, 3342.96, 180, 3522.96, 60.12, 240.12),
(61, 0.19, 3, 3429.72, 216.36, 3646.08, 91.44, 307.8),
(62, 0.263, 4, 3454.92, 173.88, 3628.8, 60.12, 234),
(63, 0.196, 2, 3511.8, 212.4, 3724.2, 60.12, 272.52),
(64, 0.182, 1, 3567.96, 222.12, 3790.08, 60.12, 282.24),
(65, 0.102, 4, 3628.8, 297.36, 3926.16, 65.88, 363.24),
(66, 0.116, 3, 3678.48, 280.8, 3959.28, 60.12, 340.92);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_saran`
--

CREATE TABLE `tb_saran` (
  `id_saran` int(11) NOT NULL,
  `konten` varchar(50) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `warna` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_saran`
--

INSERT INTO `tb_saran` (`id_saran`, `konten`, `catatan`, `warna`) VALUES
(1, 'Jumlah Loket Cukup', 'Jumlah Loket yang digunakan saat ini sudah sesuai', 'green'),
(2, 'Jumlah Loket Kurang', 'Harap dilakukan penambahan jumlah loket', 'blue'),
(3, 'Jumlah Loket Berlebihan', 'Harap Jumlah loket yang di gunakan di kurangi agar sesuai', 'red');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_tbl`
--

CREATE TABLE `user_tbl` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `user_photo` text DEFAULT NULL,
  `nomor_induk` text DEFAULT NULL,
  `user_bussiness` varchar(200) DEFAULT NULL,
  `user_sector` varchar(100) DEFAULT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_tbl`
--

INSERT INTO `user_tbl` (`user_id`, `user_name`, `user_password`, `user_fullname`, `user_photo`, `nomor_induk`, `user_bussiness`, `user_sector`, `group_id`) VALUES
(3, 'administrator', '0192023a7bbd73250516f069df18b500', 'Muhammad Nursabri Abdilah', NULL, NULL, NULL, NULL, 1),
(4, 'abi', '0192023a7bbd73250516f069df18b500', 'abi', NULL, NULL, NULL, NULL, 1),
(5, 'admin123', '5f4dcc3b5aa765d61d8327deb882cf99', 'mahasiswa', NULL, NULL, NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `group_tbl`
--
ALTER TABLE `group_tbl`
  ADD PRIMARY KEY (`group_id`);

--
-- Indeks untuk tabel `setting_tbl`
--
ALTER TABLE `setting_tbl`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indeks untuk tabel `tb_hasil`
--
ALTER TABLE `tb_hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indeks untuk tabel `tb_kedatangan`
--
ALTER TABLE `tb_kedatangan`
  ADD PRIMARY KEY (`id_kedatangan`);

--
-- Indeks untuk tabel `tb_parameter`
--
ALTER TABLE `tb_parameter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pelayanan`
--
ALTER TABLE `tb_pelayanan`
  ADD PRIMARY KEY (`id_pelayanan`);

--
-- Indeks untuk tabel `tb_saran`
--
ALTER TABLE `tb_saran`
  ADD PRIMARY KEY (`id_saran`);

--
-- Indeks untuk tabel `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `group_tbl`
--
ALTER TABLE `group_tbl`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `setting_tbl`
--
ALTER TABLE `setting_tbl`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_hasil`
--
ALTER TABLE `tb_hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_kedatangan`
--
ALTER TABLE `tb_kedatangan`
  MODIFY `id_kedatangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `tb_parameter`
--
ALTER TABLE `tb_parameter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_pelayanan`
--
ALTER TABLE `tb_pelayanan`
  MODIFY `id_pelayanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
