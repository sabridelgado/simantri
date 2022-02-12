-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Feb 2022 pada 04.55
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.15

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
-- Struktur dari tabel `tabel_user`
--

CREATE TABLE `tabel_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `image` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_user`
--

INSERT INTO `tabel_user` (`id`, `username`, `password`, `image`, `date_created`) VALUES
(14, 'administrator', '$2y$10$NxnH/zvwzLXfMafnBgjw2.pUi7kxZxp8JQkDrqbN2OX216TOQPhcW', 'default.png', 1633351419);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hasil`
--

CREATE TABLE `tb_hasil` (
  `id_hasil` int(11) NOT NULL,
  `r_tunggu_antrian` double NOT NULL,
  `r_tunggu_sistem` double NOT NULL,
  `r_nasabah_antrian` double NOT NULL,
  `r_nasabah_sistem` double NOT NULL,
  `probabilitas_teler` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_hasil`
--

INSERT INTO `tb_hasil` (`id_hasil`, `r_tunggu_antrian`, `r_tunggu_sistem`, `r_nasabah_antrian`, `r_nasabah_sistem`, `probabilitas_teler`) VALUES
(1, 0, 0.0459, 0, 0.5419, 0.10838);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kedatangan`
--

CREATE TABLE `tb_kedatangan` (
  `id_kedatangan` int(11) NOT NULL,
  `durasi` int(11) NOT NULL,
  `bil_acak` double NOT NULL,
  `i_waktu_kedatangan` double NOT NULL,
  `w_kedatangan` double NOT NULL,
  `iwk_waktu` double NOT NULL,
  `wk_waktu` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kedatangan`
--

INSERT INTO `tb_kedatangan` (`id_kedatangan`, `durasi`, `bil_acak`, `i_waktu_kedatangan`, `w_kedatangan`, `iwk_waktu`, `wk_waktu`) VALUES
(1, 5, 0, 0, 0, 0, 0),
(2, 5, 0.0623, 0.0183, 0.0183, 329.4, 329.4),
(3, 5, 0.0828, 0.0164, 0.0347, 295.2, 624.6),
(4, 5, 0.0781, 0.0168, 0.0515, 302.4, 927),
(5, 5, 0.088, 0.016, 0.0675, 288, 1215),
(6, 5, 0.0823, 0.0164, 0.0839, 295.2, 1510.2),
(7, 5, 0.0548, 0.0191, 0.103, 343.8, 1854),
(8, 5, 0.0666, 0.0178, 0.1208, 320.4, 2174.4),
(9, 5, 0.0827, 0.0164, 0.1372, 295.2, 2469.6),
(10, 5, 0.0605, 0.0185, 0.1557, 333, 2802.6),
(11, 5, 0.0896, 0.0159, 0.1716, 286.2, 3088.8),
(12, 5, 0.0638, 0.0181, 0.1897, 325.8, 3414.6),
(13, 5, 0.0749, 0.0171, 0.2068, 307.8, 3722.4),
(14, 5, 0.0755, 0.017, 0.2238, 306, 4028.4),
(15, 5, 0.0749, 0.0171, 0.2409, 307.8, 4336.2),
(16, 5, 0.0847, 0.0162, 0.2571, 291.6, 4627.8),
(17, 5, 0.0687, 0.0176, 0.2747, 316.8, 4944.6),
(18, 5, 0.0642, 0.0181, 0.2928, 325.8, 5270.4),
(19, 5, 0.0718, 0.0173, 0.3101, 311.4, 5581.8),
(20, 5, 0.0637, 0.0181, 0.3282, 325.8, 5907.6),
(21, 5, 0.0545, 0.0191, 0.3473, 343.8, 6251.4),
(22, 5, 0.0598, 0.0185, 0.3658, 333, 6584.4),
(23, 5, 0.0773, 0.0168, 0.3826, 302.4, 6886.8),
(24, 5, 0.0816, 0.0165, 0.3991, 297, 7183.8),
(25, 5, 0.0562, 0.0189, 0.418, 340.2, 7524),
(26, 5, 0.0527, 0.0194, 0.4374, 349.2, 7873.2),
(27, 5, 0.0833, 0.0164, 0.4538, 295.2, 8168.4),
(28, 5, 0.0777, 0.0168, 0.4706, 302.4, 8470.8),
(29, 5, 0.0527, 0.0194, 0.49, 349.2, 8820),
(30, 5, 0.0565, 0.0189, 0.5089, 340.2, 9160.2),
(31, 5, 0.061, 0.0184, 0.5273, 331.2, 9491.4),
(32, 5, 0.063, 0.0182, 0.5455, 327.6, 9819),
(33, 5, 0.0695, 0.0175, 0.563, 315, 10134),
(34, 5, 0.064, 0.0181, 0.5811, 325.8, 10459.8),
(35, 5, 0.0611, 0.0184, 0.5995, 331.2, 10791),
(36, 5, 0.0605, 0.0185, 0.618, 333, 11124),
(37, 5, 0.0615, 0.0184, 0.6364, 331.2, 11455.2),
(38, 5, 0.0718, 0.0173, 0.6537, 311.4, 11766.6),
(39, 5, 0.0734, 0.0172, 0.6709, 309.6, 12076.2),
(40, 5, 0.0776, 0.0168, 0.6877, 302.4, 12378.6),
(41, 5, 0.0795, 0.0167, 0.7044, 300.6, 12679.2),
(42, 5, 0.0898, 0.0159, 0.7203, 286.2, 12965.4),
(43, 5, 0.0621, 0.0183, 0.7386, 329.4, 13294.8),
(44, 5, 0.0783, 0.0168, 0.7554, 302.4, 13597.2),
(45, 5, 0.0894, 0.0159, 0.7713, 286.2, 13883.4),
(46, 5, 0.0723, 0.0173, 0.7886, 311.4, 14194.8),
(47, 5, 0.0604, 0.0185, 0.8071, 333, 14527.8),
(48, 5, 0.0714, 0.0174, 0.8245, 313.2, 14841),
(49, 5, 0.0622, 0.0183, 0.8428, 329.4, 15170.4),
(50, 5, 0.0757, 0.017, 0.8598, 306, 15476.4),
(51, 5, 0.0737, 0.0172, 0.877, 309.6, 15786),
(52, 5, 0.0843, 0.0163, 0.8933, 293.4, 16079.4),
(53, 5, 0.061, 0.0184, 0.9117, 331.2, 16410.6),
(54, 5, 0.0872, 0.0161, 0.9278, 289.8, 16700.4),
(55, 5, 0.0558, 0.019, 0.9468, 342, 17042.4),
(56, 5, 0.0618, 0.0183, 0.9651, 329.4, 17371.8),
(57, 5, 0.0894, 0.0159, 0.981, 286.2, 17658),
(58, 5, 0.0556, 0.019, 1, 342, 18000),
(59, 5, 0.0719, 0.0173, 1.0173, 311.4, 18311.4);

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
  `p_loket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_parameter`
--

INSERT INTO `tb_parameter` (`id`, `p_lamda`, `p_miu`, `p_loket`) VALUES
(1, 66, 60, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelayanan`
--

CREATE TABLE `tb_pelayanan` (
  `id_pelayanan` int(11) NOT NULL,
  `bil_acak` double NOT NULL,
  `w_mulai` float NOT NULL,
  `w_layanan` float NOT NULL,
  `w_selesai_layanan` float NOT NULL,
  `w_tunggu_antrian` float NOT NULL,
  `w_tunggu_sistem` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pelayanan`
--

INSERT INTO `tb_pelayanan` (`id_pelayanan`, `bil_acak`, `w_mulai`, `w_layanan`, `w_selesai_layanan`, `w_tunggu_antrian`, `w_tunggu_sistem`) VALUES
(1, 0.0011, 0, 887.4, 887.4, 0, 887.4),
(2, 0.0015, 329.4, 847.8, 1177.2, 0, 847.8),
(3, 0.0013, 624.6, 865.8, 1490.4, 0, 865.8),
(4, 0.0012, 927, 876.6, 1803.6, 0, 876.6),
(5, 0.0018, 1215, 822.6, 2037.6, 0, 822.6),
(6, 0.0023, 1510.2, 792, 2302.2, 0, 792),
(7, 0.0011, 1854, 887.4, 2741.4, 0, 887.4),
(8, 0.0025, 2174.4, 781.2, 2955.6, 0, 781.2),
(9, 0.0023, 2469.6, 792, 3261.6, 0, 792),
(10, 0.0022, 2802.6, 797.4, 3600, 0, 797.4),
(11, 0.0018, 3088.8, 822.6, 3911.4, 0, 822.6),
(12, 0.0012, 3414.6, 876.6, 4291.2, 0, 876.6),
(13, 0.0018, 3722.4, 822.6, 4545, 0, 822.6),
(14, 0.001, 4028.4, 900, 4928.4, 0, 900),
(15, 0.001, 4336.2, 900, 5236.2, 0, 900),
(16, 0.0015, 4627.8, 847.8, 5475.6, 0, 847.8),
(17, 0.0013, 4944.6, 865.8, 5810.4, 0, 865.8),
(18, 0.0028, 5270.4, 765, 6035.4, 0, 765),
(19, 0.0023, 5581.8, 792, 6373.8, 0, 792),
(20, 0.0029, 5907.6, 761.4, 6669, 0, 761.4),
(21, 0.0021, 6251.4, 802.8, 7054.2, 0, 802.8),
(22, 0.0026, 6584.4, 775.8, 7360.2, 0, 775.8),
(23, 0.002, 6886.8, 810, 7696.8, 0, 810),
(24, 0.0019, 7183.8, 817.2, 8001, 0, 817.2),
(25, 0.0013, 7524, 865.8, 8389.8, 0, 865.8),
(26, 0.0019, 7873.2, 817.2, 8690.4, 0, 817.2),
(27, 0.0026, 8168.4, 775.8, 8944.2, 0, 775.8),
(28, 0.002, 8470.8, 810, 9280.8, 0, 810),
(29, 0.0014, 8820, 856.8, 9676.8, 0, 856.8),
(30, 0.0016, 9160.2, 838.8, 9999, 0, 838.8),
(31, 0.0028, 9491.4, 765, 10256.4, 0, 765),
(32, 0.001, 9819, 900, 10719, 0, 900),
(33, 0.0029, 10134, 761.4, 10895.4, 0, 761.4),
(34, 0.0017, 10459.8, 831.6, 11291.4, 0, 831.6),
(35, 0.0024, 10791, 786.6, 11577.6, 0, 786.6),
(36, 0.0022, 11124, 797.4, 11921.4, 0, 797.4),
(37, 0.0023, 11455.2, 792, 12247.2, 0, 792),
(38, 0.0015, 11766.6, 847.8, 12614.4, 0, 847.8),
(39, 0.0016, 12076.2, 838.8, 12915, 0, 838.8),
(40, 0.0013, 12378.6, 865.8, 13244.4, 0, 865.8),
(41, 0.0014, 12679.2, 856.8, 13536, 0, 856.8),
(42, 0.0024, 12965.4, 786.6, 13752, 0, 786.6),
(43, 0.0019, 13294.8, 817.2, 14112, 0, 817.2),
(44, 0.002, 13597.2, 810, 14407.2, 0, 810),
(45, 0.0016, 13883.4, 838.8, 14722.2, 0, 838.8),
(46, 0.0019, 14194.8, 817.2, 15012, 0, 817.2),
(47, 0.0014, 14527.8, 856.8, 15384.6, 0, 856.8),
(48, 0.0017, 14841, 831.6, 15672.6, 0, 831.6),
(49, 0.001, 15170.4, 900, 16070.4, 0, 900),
(50, 0.0019, 15476.4, 817.2, 16293.6, 0, 817.2),
(51, 0.0019, 15786, 817.2, 16603.2, 0, 817.2),
(52, 0.0017, 16079.4, 831.6, 16911, 0, 831.6),
(53, 0.0025, 16410.6, 781.2, 17191.8, 0, 781.2),
(54, 0.002, 16700.4, 810, 17510.4, 0, 810),
(55, 0.0016, 17042.4, 838.8, 17881.2, 0, 838.8),
(56, 0.0018, 17371.8, 822.6, 18194.4, 0, 822.6),
(57, 0.003, 17658, 756, 18414, 0, 756),
(58, 0.0018, 18000, 822.6, 18822.6, 0, 822.6),
(59, 0.001, 18311.4, 900, 19211.4, 0, 900);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_simulasi`
--

CREATE TABLE `tb_simulasi` (
  `id_simulasi` int(11) NOT NULL,
  `id_kedatangan` int(11) NOT NULL,
  `id_pelayanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_simulasi`
--

INSERT INTO `tb_simulasi` (`id_simulasi`, `id_kedatangan`, `id_pelayanan`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 6),
(7, 7, 7),
(8, 8, 8),
(9, 9, 9),
(10, 10, 10),
(11, 11, 11),
(12, 12, 12),
(13, 13, 13),
(14, 14, 14),
(15, 15, 15),
(16, 16, 16),
(17, 17, 17),
(18, 18, 18),
(19, 19, 19),
(20, 20, 20),
(21, 21, 21),
(22, 22, 22),
(23, 23, 23),
(24, 24, 24),
(25, 25, 25),
(26, 26, 26),
(27, 27, 27),
(28, 28, 28),
(29, 29, 29),
(30, 30, 30),
(31, 31, 31),
(32, 32, 32),
(33, 33, 33),
(34, 34, 34),
(35, 35, 35),
(36, 36, 36),
(37, 37, 37),
(38, 38, 38),
(39, 39, 39),
(40, 40, 40),
(41, 41, 41),
(42, 42, 42),
(43, 43, 43),
(44, 44, 44),
(45, 45, 45),
(46, 46, 46),
(47, 47, 47),
(48, 48, 48),
(49, 49, 49),
(50, 50, 50),
(51, 51, 51),
(52, 52, 52),
(53, 53, 53),
(54, 54, 54),
(55, 55, 55),
(56, 56, 56),
(57, 57, 57),
(58, 58, 58),
(59, 59, 59);

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
(4, 'abi', '0192023a7bbd73250516f069df18b500', 'abi', NULL, NULL, NULL, NULL, 1);

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
-- Indeks untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `tb_simulasi`
--
ALTER TABLE `tb_simulasi`
  ADD PRIMARY KEY (`id_simulasi`);

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
-- AUTO_INCREMENT untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_hasil`
--
ALTER TABLE `tb_hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_kedatangan`
--
ALTER TABLE `tb_kedatangan`
  MODIFY `id_kedatangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `tb_parameter`
--
ALTER TABLE `tb_parameter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_pelayanan`
--
ALTER TABLE `tb_pelayanan`
  MODIFY `id_pelayanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `tb_simulasi`
--
ALTER TABLE `tb_simulasi`
  MODIFY `id_simulasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
