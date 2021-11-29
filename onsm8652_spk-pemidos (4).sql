-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2021 at 05:37 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onsm8652_spk-pemidos`
--

-- --------------------------------------------------------

--
-- Table structure for table `asisten_praktikum_tbl`
--

CREATE TABLE `asisten_praktikum_tbl` (
  `asisten_praktikum_id` int(11) NOT NULL,
  `mahasiswa_nim` varchar(100) NOT NULL,
  `matakuliah_id` varchar(100) NOT NULL,
  `tahun_ajaran_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `calon_aslab_tbl`
--

CREATE TABLE `calon_aslab_tbl` (
  `calon_aslab_id` int(11) NOT NULL,
  `nim_mahasiswa` varchar(50) NOT NULL,
  `nilai_praktikum` varchar(100) NOT NULL,
  `nilai_mk` char(11) NOT NULL,
  `semester` char(11) NOT NULL,
  `asisten_berapakali` char(11) NOT NULL,
  `rekomendasi` char(11) NOT NULL,
  `ipk` char(11) NOT NULL,
  `matakuliah_id` char(11) NOT NULL,
  `tahun_ajaran_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calon_aslab_tbl`
--

INSERT INTO `calon_aslab_tbl` (`calon_aslab_id`, `nim_mahasiswa`, `nilai_praktikum`, `nilai_mk`, `semester`, `asisten_berapakali`, `rekomendasi`, `ipk`, `matakuliah_id`, `tahun_ajaran_id`, `status`) VALUES
(9, 'F1C117054', '3', '4', '11', '14', '18', '21', '001', 4, 1),
(10, 'F1C117025', '2', '4', '11', '15', '19', '23', '001', 4, 1),
(11, 'F1C117008', '2', '4', '11', '15', '19', '23', '001', 4, 1),
(13, 'F1C117058', '2', '4', '11', '17', '19', '22', '001', 4, 1),
(16, 'F1C118097', '2', '4', '9', '17', '18', '23', '001', 4, 1),
(17, 'F1C118001', '3', '4', '9', '16', '19', '23', '001', 4, 1),
(18, 'F1C118060', '3', '4', '9', '17', '18', '23', '001', 4, 1),
(19, 'F1C118071', '2', '4', '9', '17', '18', '24', '001', 4, 1),
(31, 'F1C117009', '3', '4', '11', '15', '18', '23', '004', 4, 2),
(34, 'F1C117084', '3', '4', '11', '15', '18', '22', '004', 4, 2),
(35, 'F1C117092', '3', '4', '11', '16', '19', '22', '004', 4, 2),
(37, 'F1C117004', '3', '4', '11', '13', '18', '22', '004', 4, 2),
(39, 'F1C118062', '2', '5', '9', '16', '19', '24', '004', 4, 1),
(41, 'F1C118058', '2', '5', '9', '17', '19', '24', '004', 4, 1),
(42, 'F1C118065', '2', '4', '9', '16', '18', '21', '004', 4, 1),
(43, 'F1C118063', '2', '5', '9', '16', '18', '23', '004', 4, 1),
(45, 'F1C118057', '2', '4', '9', '16', '18', '21', '004', 4, 1),
(48, 'F1C118053', '3', '4', '9', '15', '18', '21', '004', 4, 1),
(49, 'F1C118089', '2', '4', '9', '16', '18', '22', '004', 4, 1),
(50, 'F1C118056', '2', '5', '9', '16', '18', '21', '004', 4, 1),
(51, 'F1C117007', '2', '5', '11', '17', '19', '24', '010', 4, 0),
(52, 'F1C11008', '2', '4', '11', '16', '18', '22', '009', 5, 0),
(54, 'F1C118061', '2', '4', '9', '17', '19', '21', '010', 4, 0),
(56, 'F1C117023', '3', '4', '11', '14', '19', '22', '003', 4, 0),
(57, 'F1C117021', '2', '5', '11', '14', '19', '22', '003', 4, 0),
(58, 'F1C117022', '3', '5', '11', '14', '19', '23', '003', 4, 0),
(59, 'F1C118085', '3', '5', '9', '15', '19', '23', '003', 4, 0),
(60, 'F1C118006', '2', '5', '9', '16', '19', '23', '003', 4, 0),
(61, 'F1C118023', '3', '5', '9', '16', '19', '23', '003', 4, 0),
(62, 'F1C118081', '2', '4', '9', '15', '19', '22', '003', 4, 0),
(63, 'F1C118018', '2', '5', '9', '17', '19', '22', '003', 4, 0),
(64, 'F1C118019', '2', '5', '9', '16', '19', '22', '003', 4, 0),
(65, 'F1C117074', '3', '5', '11', '15', '19', '22', '002', 4, 0),
(66, 'F1C117040', '3', '5', '11', '15', '19', '23', '002', 4, 0),
(68, 'F1C118091', '3', '5', '9', '17', '19', '21', '002', 4, 0),
(69, 'F1C118002', '3', '5', '9', '17', '19', '23', '002', 4, 0),
(70, 'F1C117039', '2', '5', '11', '17', '19', '23', '002', 4, 0),
(71, 'F1C118109', '2', '5', '9', '14', '18', '23', '001', 4, 0),
(72, 'F1C118072', '2', '4', '9', '17', '18', '23', '001', 4, 0),
(73, 'F1C117003', '2', '4', '11', '13', '19', '22', '003', 4, 0),
(74, 'F1C117042', '3', '5', '11', '16', '19', '22', '002', 4, 0),
(75, 'F1C117085', '3', '4', '11', '16', '19', '23', '002', 4, 0),
(76, 'F1C117002', '3', '5', '11', '16', '19', '23', '002', 4, 0),
(77, 'F1C117056', '2', '5', '11', '16', '19', '23', '002', 4, 0),
(78, 'F1C117070', '3', '5', '11', '17', '19', '22', '002', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id_detail` int(11) NOT NULL,
  `id_sungai` int(11) NOT NULL,
  `nama_sungai` varchar(255) NOT NULL,
  `intensitas_hujan` varchar(255) NOT NULL,
  `waktu_hujan` datetime(6) NOT NULL,
  `ketinggian_sungai` int(155) NOT NULL,
  `ketinggian_sungai_sebenarnya` int(155) NOT NULL,
  `waktu_sungai` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dosen_tbl`
--

CREATE TABLE `dosen_tbl` (
  `dosen_id` int(15) NOT NULL,
  `dosen_nama` varchar(50) NOT NULL,
  `nip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen_tbl`
--

INSERT INTO `dosen_tbl` (`dosen_id`, `dosen_nama`, `nip`) VALUES
(1, 'Dr. Thamrin Azis, M.Si', '0007066208'),
(2, 'La Ode Abdul Kadir, S.Si., M.Sc', '8850110016'),
(3, 'Laily Nurliana, S.Si., M.Sc', '0027028405'),
(4, 'Fitria Dewi, S.Si., M.Sc', '0022058701'),
(10, 'Dr. M. Zakir', '0017056809'),
(11, 'Andi Laila N, S.Si., M.Si', '9990191580'),
(12, 'Dr. Prima Endang, M.Si', '0002106805'),
(13, 'Dr. Halilahtussadiyah, M.Si', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `group_tbl`
--

CREATE TABLE `group_tbl` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_tbl`
--

INSERT INTO `group_tbl` (`group_id`, `group_name`) VALUES
(1, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_tbl`
--

CREATE TABLE `kriteria_tbl` (
  `kriteria_id` char(15) NOT NULL,
  `kriteria_nama` varchar(50) NOT NULL,
  `kriteria_bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria_tbl`
--

INSERT INTO `kriteria_tbl` (`kriteria_id`, `kriteria_nama`, `kriteria_bobot`) VALUES
('C1', 'Nilai Praktikum', 0.3),
('C2', 'Nilai Matakuliah', 0.1),
('C3', 'Semester', 0.25),
('C4', 'Asisten Berapakali', 0.1),
('C5', 'Rekomendasi', 0.2),
('C6', 'IPK', 0.05);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa_tbl`
--

CREATE TABLE `mahasiswa_tbl` (
  `mahasiswa_id` int(11) NOT NULL,
  `mahasiswa_nim` char(15) NOT NULL,
  `mahasiswa_nama` varchar(200) NOT NULL,
  `mahasiswa_photo` text,
  `mahasiswa_angkatan` int(11) NOT NULL,
  `mahasiswa_jk` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa_tbl`
--

INSERT INTO `mahasiswa_tbl` (`mahasiswa_id`, `mahasiswa_nim`, `mahasiswa_nama`, `mahasiswa_photo`, `mahasiswa_angkatan`, `mahasiswa_jk`) VALUES
(78, 'F1C117054', 'Muhammad Syafri', '', 2017, 'L'),
(79, 'F1C117025', 'Risda Adriana', '', 2017, 'P'),
(80, 'F1C117008', 'Bikra Ali Akbar', '', 2017, 'L'),
(82, 'F1C118006', 'Kila Dayana Putri', '', 2018, 'P'),
(83, 'F1C117058', 'Regita Dwi Cahyani', '', 2017, 'P'),
(84, 'E1E117011', 'Iklil awalda tariza', NULL, 11, 'P'),
(85, 'F1C118023', 'Asdayanti', NULL, 2018, 'P'),
(86, 'F1C118097', 'Sinar Novalia', NULL, 2018, 'P'),
(87, 'F1C118001', 'Irna Srianti', NULL, 2018, 'P'),
(88, 'F1C118060', 'Muhammad Nurhidayat', NULL, 2018, 'L'),
(89, 'F1C118071', 'Selvia Laila Wewa', NULL, 2018, 'P'),
(90, 'E1E117043', 'MUHAMAD IQBAL', '', 2017, 'L'),
(91, 'F1C117027', 'Siti Yuliawati', NULL, 2017, 'P'),
(92, 'F1C117009', 'Dicky Syahputra', '', 2017, 'L'),
(93, 'F1C117002', 'Al Mita Sari', '', 2017, 'P'),
(95, 'F1C117056', 'Nur Indah Ayu', '', 2017, 'P'),
(96, 'F1C117092', 'Sufiati', '', 2017, 'P'),
(98, 'F1C118062', 'Lia Uswatun Khasnah', '', 2018, 'P'),
(100, 'F1C118058', 'Rosna', '', 2018, 'P'),
(101, 'F1C118057', 'Muh.  Rafiq', '', 2018, 'L'),
(103, 'F1C118036', 'Sitti Mardiana', '', 2018, 'P'),
(105, 'F1C118089', 'Muh. Arfiansyah', '', 2018, 'L'),
(106, 'F1C117004', 'Grace Suud Ramba M.', '', 2017, 'L'),
(107, 'F1C117084', 'Rahma Uditra Surya', '', 2017, 'L'),
(108, 'F1C118065', 'Adinda Nur Fadillah', '', 2018, 'P'),
(109, 'F1C118063', 'Nurul Fadillah', '', 2018, 'P'),
(111, 'F1C118069', 'Risda Ramadani', '', 2018, 'P'),
(112, 'F1C118053', 'Gusti Putu Eka Putra', '', 2018, 'L'),
(113, 'F1C118056', 'Rosdianti', '', 2018, 'P'),
(114, 'F1C117007', 'Marlina', NULL, 2017, 'P'),
(115, 'F1C11008', 'Ayu', NULL, 2017, 'P'),
(116, 'F1C118061', 'Putri Rosa Winda', NULL, 2018, 'P'),
(118, 'F1C117023', 'Nurjannah', NULL, 2017, 'P'),
(119, 'F1C117021', 'Muhammad Hikam', NULL, 2017, 'L'),
(120, 'F1C117022', 'Nur Indah Ayu', NULL, 2017, 'P'),
(121, 'F1C118085', 'Rahmin', NULL, 2018, 'L'),
(122, 'F1C118081', 'Fadil Arham', NULL, 2018, 'L'),
(123, 'F1C118018', 'Muh. Akbar Ali', NULL, 2018, 'L'),
(124, 'F1C118019', 'Suyatna', NULL, 2018, 'P'),
(125, 'F1C117074', 'Iis Afrida Hamid', NULL, 2017, 'P'),
(126, 'F1C117040', 'Dwi Ratna Karim', NULL, 2017, 'P'),
(128, 'F1C118091', 'Holita Rahma Mega Azali', NULL, 2018, 'P'),
(129, 'F1C118002', 'Uki Setiawan Labau', NULL, 2018, 'L'),
(130, 'F1C117039', 'Annisa Rizky Amalia', NULL, 2017, 'P'),
(131, 'F1C118109', 'Lina Sari', NULL, 2018, 'P'),
(132, 'F1C118072', 'Dian Ayu Lestari', NULL, 2018, 'P'),
(133, 'F1C117003', 'Andi Aprilia Indah M', NULL, 2017, 'P'),
(134, 'F1C117042', 'Ferdy Ichsan Imaduddin', NULL, 2017, 'L'),
(135, 'F1C117085', 'Rahmin', NULL, 2017, 'L');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah_tbl`
--

CREATE TABLE `matakuliah_tbl` (
  `matakuliah_id` char(15) NOT NULL,
  `matakuliah_nama` varchar(200) NOT NULL,
  `matakuliah_sks` int(11) NOT NULL,
  `matakuliah_semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matakuliah_tbl`
--

INSERT INTO `matakuliah_tbl` (`matakuliah_id`, `matakuliah_nama`, `matakuliah_sks`, `matakuliah_semester`) VALUES
('001', 'Praktikum Kimia Anorganik 2', 1, 2),
('002', 'Praktikum Kimia Fisika 2', 1, 2),
('003', 'Praktikum Kimia Organik 2', 1, 2),
('004', 'Praktikum Metode Pemisahan Kimia', 1, 2),
('005', 'Praktikum Kimia Organik 1', 1, 1),
('006', 'Praktikum Kimia Anorganik 1', 1, 1),
('007', 'Praktikum Kimia Analitik', 1, 1),
('008', 'Praktikum Instrumen Spektroskopi', 1, 1),
('009', 'Praktikum Kimia Fisika 1', 1, 1),
('010', 'Praktikum Biokimia Umum', 1, 1),
('011', 'Praktikum Mikrobiologi', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `monitoring`
--

CREATE TABLE `monitoring` (
  `id` int(11) NOT NULL,
  `id_sungai` int(11) NOT NULL,
  `intensitas_hujan` varchar(30) NOT NULL,
  `waktu_hujan` datetime(6) NOT NULL,
  `ketinggian_sungai` int(20) NOT NULL,
  `ketinggian_sungai_sebenarnya` int(20) NOT NULL,
  `waktu_sungai` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monitoring`
--

INSERT INTO `monitoring` (`id`, `id_sungai`, `intensitas_hujan`, `waktu_hujan`, `ketinggian_sungai`, `ketinggian_sungai_sebenarnya`, `waktu_sungai`) VALUES
(25, 30, 'Rintik-Rintik', '2021-08-16 00:51:00.000000', 10, 10, '2021-08-16 00:51:00'),
(26, 24, 'Hujan', '2021-08-18 11:25:41.000000', 13, 13, '2021-08-18 11:25:41'),
(27, 23, 'tidak hujan', '2021-08-16 00:50:49.000000', 16, 16, '2021-08-16 00:50:49'),
(28, 33, 'tidak hujan', '2021-08-17 01:31:42.000000', 155, 155, '2021-08-17 01:31:42'),
(29, 31, 'Rintik-Rintik', '2021-08-17 20:04:11.000000', 89, 89, '2021-08-17 20:04:11'),
(30, 30, 'rintik-rintik', '2021-11-02 17:40:44.000000', 10, 10, '2021-11-02 17:40:44'),
(31, 30, 'rintik-rintik', '2021-11-02 17:43:01.000000', 10, 10, '2021-11-02 17:43:01'),
(32, 30, 'Rintik-Rintik', '2021-11-02 20:33:33.000000', 10, 10, '2021-11-02 20:33:33'),
(33, 34, 'Hujan', '2021-11-06 23:54:48.000000', 13, 13, '2021-11-06 23:54:48');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi_tbl`
--

CREATE TABLE `notifikasi_tbl` (
  `notifikasi_id` int(11) NOT NULL,
  `notifikasi_content` text NOT NULL,
  `mahasiswa_nim` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifikasi_tbl`
--

INSERT INTO `notifikasi_tbl` (`notifikasi_id`, `notifikasi_content`, `mahasiswa_nim`) VALUES
(1, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'E1E117040'),
(2, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'E1E117040'),
(3, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'E1E117007'),
(4, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C117008'),
(5, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118006'),
(6, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118023'),
(7, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118097'),
(8, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118001'),
(9, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118060'),
(10, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118071'),
(11, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'E1E117043'),
(12, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118001'),
(13, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118062'),
(14, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118058'),
(15, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118065'),
(16, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118063'),
(17, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118069'),
(18, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118057'),
(19, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118053'),
(20, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118089'),
(21, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118056'),
(22, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118001'),
(23, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118062'),
(24, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118058'),
(25, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118065'),
(26, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118063'),
(27, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118069'),
(28, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118057'),
(29, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118053'),
(30, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118089'),
(31, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118056'),
(32, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118001'),
(33, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118062'),
(34, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118058'),
(35, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118065'),
(36, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118063'),
(37, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118069'),
(38, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118057'),
(39, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118053'),
(40, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118089'),
(41, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118056'),
(42, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118001'),
(43, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118062'),
(44, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118058'),
(45, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118065'),
(46, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118063'),
(47, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118069'),
(48, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118057'),
(49, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118053'),
(50, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118089'),
(51, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Metode Pemisahan Kimia', 'F1C118056'),
(52, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'E1E117040'),
(53, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'E1E117007'),
(54, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C117008'),
(55, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118006'),
(56, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C117058'),
(57, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118023'),
(58, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118097'),
(59, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118001'),
(60, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118060'),
(61, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118071'),
(62, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'E1E117040'),
(63, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'E1E117007'),
(64, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C117008'),
(65, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118006'),
(66, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C117058'),
(67, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118023'),
(68, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118097'),
(69, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118001'),
(70, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118060'),
(71, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118071'),
(72, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'E1E117040'),
(73, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'E1E117007'),
(74, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C117008'),
(75, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118006'),
(76, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C117058'),
(77, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118023'),
(78, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118097'),
(79, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118001'),
(80, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118060'),
(81, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118071'),
(82, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'E1E117040'),
(83, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'E1E117007'),
(84, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C117008'),
(85, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118006'),
(86, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C117058'),
(87, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118023'),
(88, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118097'),
(89, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118001'),
(90, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118060'),
(91, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118071'),
(92, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'E1E117040'),
(93, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'E1E117007'),
(94, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C117008'),
(95, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118006'),
(96, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C117058'),
(97, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118023'),
(98, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118097'),
(99, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118001'),
(100, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118060'),
(101, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118071'),
(102, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'E1E117040'),
(103, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'E1E117007'),
(104, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C117008'),
(105, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118006'),
(106, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C117058'),
(107, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118023'),
(108, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118097'),
(109, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118001'),
(110, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118060'),
(111, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118071'),
(112, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'E1E117040'),
(113, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'E1E117007'),
(114, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C117008'),
(115, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118006'),
(116, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C117058'),
(117, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118023'),
(118, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118097'),
(119, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118001'),
(120, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118060'),
(121, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118071'),
(122, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'E1E117040'),
(123, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'E1E117007'),
(124, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C117008'),
(125, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118006'),
(126, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C117058'),
(127, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118023'),
(128, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118097'),
(129, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118001'),
(130, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118060'),
(131, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118071'),
(132, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'E1E117040'),
(133, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'E1E117007'),
(134, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C117008'),
(135, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118006'),
(136, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C117058'),
(137, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118023'),
(138, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118097'),
(139, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118001'),
(140, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118060'),
(141, 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah Praktikum Kimia Anorganik 2', 'F1C118071');

-- --------------------------------------------------------

--
-- Table structure for table `rain_level`
--

CREATE TABLE `rain_level` (
  `id` int(11) NOT NULL,
  `id_sungai` int(11) NOT NULL,
  `intensintas_hujan` varchar(50) NOT NULL,
  `waktu` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rain_level`
--

INSERT INTO `rain_level` (`id`, `id_sungai`, `intensintas_hujan`, `waktu`) VALUES
(1, 23, 'Hujan', '2021-08-08 13:24:17.000000'),
(2, 8, 'Tidak Hujan ', '2021-08-02 00:00:00.000000'),
(3, 23, 'tidak hujan', '2021-08-08 15:19:49.000000'),
(4, 8, 'Hujan', '2021-08-08 15:20:06.000000');

-- --------------------------------------------------------

--
-- Table structure for table `relasi_dosen_mk_tbl`
--

CREATE TABLE `relasi_dosen_mk_tbl` (
  `relasi_dosen_mk_id` int(11) NOT NULL,
  `dosen_id` char(100) NOT NULL,
  `matakuliah_id` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `relasi_dosen_mk_tbl`
--

INSERT INTO `relasi_dosen_mk_tbl` (`relasi_dosen_mk_id`, `dosen_id`, `matakuliah_id`) VALUES
(1, '1', '001'),
(2, '2', '002'),
(3, '2', '006'),
(4, '3', '003'),
(5, '3', '005'),
(6, '4', '004'),
(11, '4', '008'),
(12, '13', '007'),
(13, '10', '009'),
(14, '12', '011'),
(15, '11', '010');

-- --------------------------------------------------------

--
-- Table structure for table `setting_tbl`
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
-- Dumping data for table `setting_tbl`
--

INSERT INTO `setting_tbl` (`setting_id`, `setting_appname`, `setting_short_appname`, `setting_origin_app`, `setting_owner_name`, `setting_phone`, `setting_email`, `setting_address`, `setting_logo`) VALUES
(1, 'Sistem Monitoring Ketinggian Air Banjir Mengguanakan Wireless Sensor network Dan (Web Gis)', 'SIMOKAB', 'Universitas Halu Oleo', '', '081384213053', 'gagascakrawala@gmail.com', 'Perdos Blok X Nomor 14', 'settinglogo1.png');

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria_tbl`
--

CREATE TABLE `subkriteria_tbl` (
  `subkriteria_id` int(11) NOT NULL,
  `subkriteria_nama` varchar(50) NOT NULL,
  `subkriteria_bobot` int(11) NOT NULL,
  `kriteria_id` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subkriteria_tbl`
--

INSERT INTO `subkriteria_tbl` (`subkriteria_id`, `subkriteria_nama`, `subkriteria_bobot`, `kriteria_id`) VALUES
(2, 'A', 3, 'C1'),
(3, 'B', 2, 'C1'),
(4, 'A', 3, 'C2'),
(5, 'B', 2, 'C2'),
(6, 'Semester 3', 6, 'C3'),
(7, 'Semester 4', 5, 'C3'),
(8, 'Semester 5', 4, 'C3'),
(9, 'Semester 6', 3, 'C3'),
(10, 'Semester 7', 2, 'C3'),
(11, 'Semester 8', 1, 'C3'),
(12, 'Lebih dari 4 kali', 6, 'C4'),
(13, '4 kali', 5, 'C4'),
(14, '3 kali', 4, 'C4'),
(15, '2 kali', 3, 'C4'),
(16, '1 kali', 2, 'C4'),
(17, 'Tidak Pernah', 1, 'C4'),
(18, 'Rekomendasi', 3, 'C5'),
(19, 'Tanpa Rekomendasi', 2, 'C5'),
(20, '3,81 - 4,00', 6, 'C6'),
(21, '3,61 - 3,80', 5, 'C6'),
(22, '3,41 - 3,60', 4, 'C6'),
(23, '3,21 - 3,40', 3, 'C6'),
(24, '3,01 - 3,20', 2, 'C6'),
(25, '3', 1, 'C6');

-- --------------------------------------------------------

--
-- Table structure for table `sungai`
--

CREATE TABLE `sungai` (
  `id_sungai` int(12) NOT NULL,
  `nama_sungai` varchar(225) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `deskripsi` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sungai`
--

INSERT INTO `sungai` (`id_sungai`, `nama_sungai`, `lokasi`, `kelurahan`, `longitude`, `latitude`, `deskripsi`) VALUES
(23, 'Sungai Wanggu', 'Wanggu', 'Bende', '122.5094489', '-4.0201318', 'Sungai Ini Adalah'),
(24, 'Sungai Perdos', 'Perumahan Dosen', 'sfhsfh', '122.5261145', '-4.0152969', 'sfhsfh'),
(30, 'Wanggu', 'Wanggu', 'Bende', '123456', '654321', 'Hulu Sungai Wanggu terletak di Kabupaten Konawe Selatan dan bermuara di Teluk Kota Kendari, membentang dari selatan ke Timur. Banjir yang terjadi hampir setiap tahun, yang terbesar terjadi bulan juli tahun 2013 telah mengakibatkan kerusakan sarana dan dan prasarana fasilitas umum, kebun, sawah, dan daerah permukiman terutama pada daerah disekitar alur dan muara Sungai Wanggu. Berangkat dari hal tersebut m'),
(31, 'Wolasi', 'Kendari, Sulawesi Tenggara', 'Pohara', '123456', '654321', 'Sungai Ini Adalah '),
(33, 'Amonggedo', 'Amonggedo', 'Amonggedo', '123456', '654321', 'Sungai Ini Adalah'),
(34, 'Ameroro', 'Ameroro', 'Ameroro', '1234567', '7654321', 'Sungai Ini Adalah');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran_tbl`
--

CREATE TABLE `tahun_ajaran_tbl` (
  `tahun_ajaran_id` int(11) NOT NULL,
  `tahun_ajaran_nama` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahun_ajaran_tbl`
--

INSERT INTO `tahun_ajaran_tbl` (`tahun_ajaran_id`, `tahun_ajaran_nama`) VALUES
(4, '20202');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(5) NOT NULL,
  `Username` varchar(40) NOT NULL,
  `Password` varchar(128) NOT NULL,
  `Nama_lengkap` varchar(40) NOT NULL,
  `Level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Username`, `Password`, `Nama_lengkap`, `Level`) VALUES
(2, 'gagas', '52e7c5c94d8a398b0381ba1affb193fd', 'Gagas Aliansi Cakrawala', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `user_photo` text,
  `nomor_induk` text,
  `user_bussiness` varchar(200) DEFAULT NULL,
  `user_sector` varchar(100) DEFAULT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`user_id`, `user_name`, `user_password`, `user_fullname`, `user_photo`, `nomor_induk`, `user_bussiness`, `user_sector`, `group_id`) VALUES
(3, 'gagas', '52e7c5c94d8a398b0381ba1affb193fd', 'Gagas Aliansi Cakrawala', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `water_level`
--

CREATE TABLE `water_level` (
  `id` int(11) NOT NULL,
  `id_sungai` int(11) NOT NULL,
  `ketinggian_sungai` int(6) NOT NULL,
  `ketinggian_sungai_sebenarnya` int(6) NOT NULL,
  `waktu` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `water_level`
--

INSERT INTO `water_level` (`id`, `id_sungai`, `ketinggian_sungai`, `ketinggian_sungai_sebenarnya`, `waktu`) VALUES
(1, 8, 13, 12, '2021-08-04 00:00:00.000000'),
(3, 23, 15, 15, '2021-08-08 13:24:17.000000'),
(4, 23, 18, 18, '2021-08-08 15:19:49.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asisten_praktikum_tbl`
--
ALTER TABLE `asisten_praktikum_tbl`
  ADD PRIMARY KEY (`asisten_praktikum_id`);

--
-- Indexes for table `calon_aslab_tbl`
--
ALTER TABLE `calon_aslab_tbl`
  ADD PRIMARY KEY (`calon_aslab_id`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `dosen_tbl`
--
ALTER TABLE `dosen_tbl`
  ADD PRIMARY KEY (`dosen_id`);

--
-- Indexes for table `group_tbl`
--
ALTER TABLE `group_tbl`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `kriteria_tbl`
--
ALTER TABLE `kriteria_tbl`
  ADD PRIMARY KEY (`kriteria_id`);

--
-- Indexes for table `mahasiswa_tbl`
--
ALTER TABLE `mahasiswa_tbl`
  ADD PRIMARY KEY (`mahasiswa_id`);

--
-- Indexes for table `matakuliah_tbl`
--
ALTER TABLE `matakuliah_tbl`
  ADD PRIMARY KEY (`matakuliah_id`);

--
-- Indexes for table `monitoring`
--
ALTER TABLE `monitoring`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi_tbl`
--
ALTER TABLE `notifikasi_tbl`
  ADD PRIMARY KEY (`notifikasi_id`);

--
-- Indexes for table `rain_level`
--
ALTER TABLE `rain_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relasi_dosen_mk_tbl`
--
ALTER TABLE `relasi_dosen_mk_tbl`
  ADD PRIMARY KEY (`relasi_dosen_mk_id`);

--
-- Indexes for table `setting_tbl`
--
ALTER TABLE `setting_tbl`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `subkriteria_tbl`
--
ALTER TABLE `subkriteria_tbl`
  ADD PRIMARY KEY (`subkriteria_id`);

--
-- Indexes for table `sungai`
--
ALTER TABLE `sungai`
  ADD PRIMARY KEY (`id_sungai`);

--
-- Indexes for table `tahun_ajaran_tbl`
--
ALTER TABLE `tahun_ajaran_tbl`
  ADD PRIMARY KEY (`tahun_ajaran_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `water_level`
--
ALTER TABLE `water_level`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asisten_praktikum_tbl`
--
ALTER TABLE `asisten_praktikum_tbl`
  MODIFY `asisten_praktikum_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `calon_aslab_tbl`
--
ALTER TABLE `calon_aslab_tbl`
  MODIFY `calon_aslab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dosen_tbl`
--
ALTER TABLE `dosen_tbl`
  MODIFY `dosen_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `group_tbl`
--
ALTER TABLE `group_tbl`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mahasiswa_tbl`
--
ALTER TABLE `mahasiswa_tbl`
  MODIFY `mahasiswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
--
-- AUTO_INCREMENT for table `monitoring`
--
ALTER TABLE `monitoring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `notifikasi_tbl`
--
ALTER TABLE `notifikasi_tbl`
  MODIFY `notifikasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
--
-- AUTO_INCREMENT for table `rain_level`
--
ALTER TABLE `rain_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `relasi_dosen_mk_tbl`
--
ALTER TABLE `relasi_dosen_mk_tbl`
  MODIFY `relasi_dosen_mk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `setting_tbl`
--
ALTER TABLE `setting_tbl`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subkriteria_tbl`
--
ALTER TABLE `subkriteria_tbl`
  MODIFY `subkriteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `sungai`
--
ALTER TABLE `sungai`
  MODIFY `id_sungai` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tahun_ajaran_tbl`
--
ALTER TABLE `tahun_ajaran_tbl`
  MODIFY `tahun_ajaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `water_level`
--
ALTER TABLE `water_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
