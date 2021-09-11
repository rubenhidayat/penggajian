-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2021 at 02:40 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penggajian`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_honor`
--

CREATE TABLE `admin_honor` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_honor`
--

INSERT INTO `admin_honor` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'Ruben Hidayat', 'rubenhidayat', '$2y$10$hCDQeVgFWPVwhDikVZjG1Oj4GwySyHsHPlAoiZF.vT/S.AiIJnNbu'),
(2, 'Admin', 'admin', '$2y$10$1Y2jY2T1oJsyd4mZ3bH81OpUpWI.sRf1sMnhrHEwW1GEdNL1moWxi');

-- --------------------------------------------------------

--
-- Table structure for table `admin_pns`
--

CREATE TABLE `admin_pns` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_pns`
--

INSERT INTO `admin_pns` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'Edho Dwi', 'edodwi', 'Edo12345'),
(3, 'Yusron Hartoyo', 'yusron', '$2y$10$OH.kNHWbPgCCE'),
(4, 'Ruben Hidayat', 'rubenhidayat', '$2y$10$GgOL43OqzoAxcsvlT/qGP.fmUCQoKmQIeDlZ3K/loHKXzrxfOP60a'),
(5, 'Yusron Hartoyo', 'yusron1', '$2y$10$CkzTJ6/TigpuFHm/4Vave.RfnCFjsi38vr61Y8HTpxqmnwJnsvUbm'),
(6, 'Admin', 'admin', '$2y$10$9XiW.uL3nQwiFcsGz2f/aO94ylZfnnRa8JZb3N5Y/xyhBWapEkrYu'),
(7, 'admin', 'admin12345', '$2y$10$GPqd7pcmUQIbXzJOfIbkjeyMZRhKl0qgt/O/CwpGYgclhmpe.eEmK');

-- --------------------------------------------------------

--
-- Table structure for table `bulan_honor`
--

CREATE TABLE `bulan_honor` (
  `id` int(11) NOT NULL,
  `bulan` varchar(3) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bulan_pns`
--

CREATE TABLE `bulan_pns` (
  `bulan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulan_pns`
--

INSERT INTO `bulan_pns` (`bulan`) VALUES
(12019),
(22019),
(32019),
(42019);

-- --------------------------------------------------------

--
-- Table structure for table `gaji_honor`
--

CREATE TABLE `gaji_honor` (
  `id_guru` int(10) NOT NULL,
  `gaji` int(11) NOT NULL,
  `id_bulan` int(11) NOT NULL,
  `nuptik` varchar(40) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `nama_jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaji_honor`
--

INSERT INTO `gaji_honor` (`id_guru`, `gaji`, `id_bulan`, `nuptik`, `nama`, `nama_jabatan`) VALUES
(3, 500000, 5, '2360759661200043', 'Evi Ningsih', 'Guru Kelas'),
(3, 500000, 7, '2360759661200043', 'Evi Ningsih', 'Guru Kelas'),
(3, 500000, 8, '2360759661200043', 'Evi Ningsih', 'Guru Kelas'),
(3, 500000, 9, '2360759661200043', 'Evi Ningsih', 'Guru Kelas'),
(6, 750000, 5, '', 'Mareta Silaturi', 'Guru Kelas I'),
(6, 750000, 7, '', 'Mareta Silaturi', 'Guru Kelas I'),
(6, 750000, 8, '', 'Mareta Silaturi', 'Guru Kelas I'),
(6, 750000, 9, '', 'Mareta Silaturi', 'Guru Kelas I'),
(7, 500000, 5, 'Beni Anggraini', '1440763661300003', 'Guru Kelas'),
(7, 500000, 7, 'Beni Anggraini', '1440763661300003', 'Guru Kelas'),
(7, 500000, 8, 'Beni Anggraini', '1440763661300003', 'Guru Kelas'),
(7, 500000, 9, 'Beni Anggraini', '1440763661300003', 'Guru Kelas'),
(8, 500000, 5, '4133748652200013', 'Agus Ibrahim', 'Guru Kelas'),
(8, 500000, 7, '4133748652200013', 'Agus Ibrahim', 'Guru Kelas'),
(8, 500000, 8, '4133748652200013', 'Agus Ibrahim', 'Guru Kelas'),
(8, 500000, 9, '4133748652200013', 'Agus Ibrahim', 'Guru Kelas'),
(9, 500000, 5, '3042764665300113', 'Yuli Anggraini', 'Guru Kelas'),
(9, 500000, 7, '3042764665300113', 'Yuli Anggraini', 'Guru Kelas'),
(9, 500000, 8, '3042764665300113', 'Yuli Anggraini', 'Guru Kelas'),
(9, 500000, 9, '3042764665300113', 'Yuli Anggraini', 'Guru Kelas');

-- --------------------------------------------------------

--
-- Table structure for table `gaji_pns`
--

CREATE TABLE `gaji_pns` (
  `nip` varchar(40) NOT NULL,
  `gaji_kotor` int(40) NOT NULL,
  `total_tj_beras` int(40) NOT NULL,
  `total_tj_fungsional` int(40) NOT NULL,
  `gaji_bersih` int(40) NOT NULL,
  `total_tj_anak` int(40) NOT NULL,
  `total_tj_suami_istri` int(40) NOT NULL,
  `iwp2` int(40) NOT NULL,
  `iwp8` int(40) NOT NULL,
  `total_potongan` int(40) NOT NULL,
  `total_gaji` int(40) NOT NULL,
  `id_bulan` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `kode_golongan` varchar(20) NOT NULL,
  `kode_jabatan` varchar(20) NOT NULL,
  `status_kawin` varchar(20) NOT NULL,
  `jumlah_anak` int(2) NOT NULL,
  `jumlah_anggota_keluarga` int(2) NOT NULL,
  `gapok` int(10) NOT NULL,
  `pot_tp` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaji_pns`
--

INSERT INTO `gaji_pns` (`nip`, `gaji_kotor`, `total_tj_beras`, `total_tj_fungsional`, `gaji_bersih`, `total_tj_anak`, `total_tj_suami_istri`, `iwp2`, `iwp8`, `total_potongan`, `total_gaji`, `id_bulan`, `nama`, `kode_golongan`, `kode_jabatan`, `status_kawin`, `jumlah_anak`, `jumlah_anggota_keluarga`, `gapok`, `pot_tp`) VALUES
('166905222014072001', 5474090, 289680, 389000, 4795410, 168260, 420650, 95908, 383633, 489541, 4984549, 63, 'Juminarti', '4A/24', 'GR1', 'Menikah', 2, 4, 4206500, 10000),
('166905222014072001', 5474090, 289680, 389000, 4795410, 168260, 420650, 95908, 383633, 489541, 4984549, 65, 'Juminarti', '4A/24', 'GR1', 'Menikah', 2, 4, 4206500, 10000),
('166905222014072001', 5474090, 289680, 389000, 4795410, 168260, 420650, 95908, 383633, 489541, 4984549, 66, 'Juminarti', '4A/24', 'GR1', 'Menikah', 2, 4, 4206500, 10000),
('166905222014072001', 4396806, 289680, 327000, 3780126, 132636, 331590, 75603, 302410, 385013, 4011793, 67, 'Juminarti', '3C/14', 'GR1', 'Menikah', 2, 4, 3315900, 7000),
('166905222014072001', 4396806, 289680, 327000, 3780126, 132636, 331590, 75603, 302410, 385013, 4011793, 68, 'Juminarti', '3C/14', 'GR1', 'Menikah', 2, 4, 3315900, 7000),
('166905222014072001', 4396806, 289680, 327000, 3780126, 132636, 331590, 75603, 302410, 385013, 4011793, 69, 'Juminarti', '3C/14', 'GR1', 'Menikah', 2, 4, 3315900, 7000),
('196608062007011010', 4396806, 289680, 327000, 3780126, 132636, 331590, 75603, 302410, 385013, 4011793, 63, 'Muhammad Yusuf', '3C/14', 'GR1', 'Menikah', 2, 4, 3315900, 7000),
('196608062007011010', 4396806, 289680, 327000, 3780126, 132636, 331590, 75603, 302410, 385013, 4011793, 65, 'Muhammad Yusuf', '3C/14', 'GR1', 'Menikah', 2, 4, 3315900, 7000),
('196608062007011010', 4396806, 289680, 327000, 3780126, 132636, 331590, 75603, 302410, 385013, 4011793, 66, 'Muhammad Yusuf', '3C/14', 'GR1', 'Menikah', 2, 4, 3315900, 7000),
('196608062007011010', 4396806, 289680, 327000, 3780126, 132636, 331590, 75603, 302410, 385013, 4011793, 67, 'Muhammad Yusuf', '3C/14', 'GR1', 'Menikah', 2, 4, 3315900, 7000),
('196608062007011010', 4396806, 289680, 327000, 3780126, 132636, 331590, 75603, 302410, 385013, 4011793, 68, 'Muhammad Yusuf', '3C/14', 'GR1', 'Menikah', 2, 4, 3315900, 7000),
('196608062007011010', 4396806, 289680, 327000, 3780126, 132636, 331590, 75603, 302410, 385013, 4011793, 69, 'Muhammad Yusuf', '3C/14', 'GR1', 'Menikah', 2, 4, 3315900, 7000),
('196803272008011002', 4085080, 289680, 327000, 3468400, 179400, 299000, 69368, 277472, 353840, 3731240, 63, 'Latif', '3B/10', 'GR1', 'Menikah', 3, 4, 2990000, 7000),
('196803272008011002', 4085080, 289680, 327000, 3468400, 179400, 299000, 69368, 277472, 353840, 3731240, 65, 'Latif', '3B/10', 'GR1', 'Menikah', 3, 4, 2990000, 7000),
('196803272008011002', 4085080, 289680, 327000, 3468400, 179400, 299000, 69368, 277472, 353840, 3731240, 66, 'Latif', '3B/10', 'GR1', 'Menikah', 3, 4, 2990000, 7000),
('196803272008011002', 4085080, 289680, 327000, 3468400, 179400, 299000, 69368, 277472, 353840, 3731240, 67, 'Latif', '3B/10', 'GR1', 'Menikah', 3, 4, 2990000, 7000),
('196803272008011002', 4085080, 289680, 327000, 3468400, 179400, 299000, 69368, 277472, 353840, 3731240, 68, 'Latif', '3B/10', 'GR1', 'Menikah', 3, 4, 2990000, 7000),
('196803272008011002', 4085080, 289680, 327000, 3468400, 179400, 299000, 69368, 277472, 353840, 3731240, 69, 'Latif', '3B/10', 'GR1', 'Menikah', 3, 4, 2990000, 7000),
('196906022008011007', 3389420, 72420, 327000, 2990000, 0, 0, 59800, 239200, 306000, 3083420, 63, 'Isbani', '3B/10', 'GR1', 'Belum Menikah', 0, 1, 2990000, 7000),
('196906022008011007', 3389420, 72420, 327000, 2990000, 0, 0, 59800, 239200, 306000, 3083420, 65, 'Isbani', '3B/10', 'GR1', 'Belum Menikah', 0, 1, 2990000, 7000),
('196906022008011007', 3389420, 72420, 327000, 2990000, 0, 0, 59800, 239200, 306000, 3083420, 66, 'Isbani', '3B/10', 'GR1', 'Belum Menikah', 0, 1, 2990000, 7000),
('196906022008011007', 3389420, 72420, 327000, 2990000, 0, 0, 59800, 239200, 306000, 3083420, 67, 'Isbani', '3B/10', 'GR1', 'Belum Menikah', 0, 1, 2990000, 7000),
('196906022008011007', 3389420, 72420, 327000, 2990000, 0, 0, 59800, 239200, 306000, 3083420, 68, 'Isbani', '3B/10', 'GR1', 'Belum Menikah', 0, 1, 2990000, 7000),
('196906022008011007', 3389420, 72420, 327000, 2990000, 0, 0, 59800, 239200, 306000, 3083420, 69, 'Isbani', '3B/10', 'GR1', 'Belum Menikah', 0, 1, 2990000, 7000),
('196911032014072001', 3424640, 289680, 286000, 2848960, 147360, 245600, 56979, 227917, 289896, 3134744, 63, 'Hayati', '2B/13', 'GR1', 'Menikah', 3, 4, 2456000, 5000),
('196911032014072001', 3424640, 289680, 286000, 2848960, 147360, 245600, 56979, 227917, 289896, 3134744, 65, 'Hayati', '2B/13', 'GR1', 'Menikah', 3, 4, 2456000, 5000),
('196911032014072001', 3424640, 289680, 286000, 2848960, 147360, 245600, 56979, 227917, 289896, 3134744, 66, 'Hayati', '2B/13', 'GR1', 'Menikah', 3, 4, 2456000, 5000),
('196911032014072001', 3424640, 289680, 286000, 2848960, 147360, 245600, 56979, 227917, 289896, 3134744, 67, 'Hayati', '2B/13', 'GR1', 'Menikah', 3, 4, 2456000, 5000),
('196911032014072001', 3424640, 289680, 286000, 2848960, 147360, 245600, 56979, 227917, 289896, 3134744, 68, 'Hayati', '2B/13', 'GR1', 'Menikah', 3, 4, 2456000, 5000),
('196911032014072001', 3424640, 289680, 286000, 2848960, 147360, 245600, 56979, 227917, 289896, 3134744, 69, 'Hayati', '2B/13', 'GR1', 'Menikah', 3, 4, 2456000, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `golongan_pns`
--

CREATE TABLE `golongan_pns` (
  `kode_golongan` varchar(20) NOT NULL,
  `nama_golongan` varchar(20) NOT NULL,
  `mkg` int(11) NOT NULL,
  `gapok` int(10) NOT NULL,
  `tj_suami_istri` int(10) NOT NULL,
  `tj_anak` int(10) NOT NULL,
  `tj_fungsional` int(10) NOT NULL,
  `pot_tp` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `golongan_pns`
--

INSERT INTO `golongan_pns` (`kode_golongan`, `nama_golongan`, `mkg`, `gapok`, `tj_suami_istri`, `tj_anak`, `tj_fungsional`, `pot_tp`) VALUES
('2B/13', '2B', 13, 2456000, 245600, 49120, 286000, 5000),
('3B/10', '3B', 10, 2990000, 299000, 59800, 327000, 7000),
('3C/14', '3C', 14, 3315900, 331590, 66318, 327000, 7000),
('4A/24', '4A', 24, 4206500, 420650, 84130, 389000, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `guru_honor`
--

CREATE TABLE `guru_honor` (
  `id_guru` int(10) NOT NULL,
  `nuptik` varchar(40) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `kode_jabatan` varchar(20) NOT NULL,
  `tunjangan` int(20) NOT NULL,
  `potongan` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru_honor`
--

INSERT INTO `guru_honor` (`id_guru`, `nuptik`, `nama`, `kode_jabatan`, `tunjangan`, `potongan`) VALUES
(3, '2360759661200043', 'Evi Ningsih', 'GRK', 0, 0),
(6, '', 'Mareta Silaturi', 'GRK1', 250000, 0),
(7, 'Beni Anggraini', '1440763661300003', 'GRK', 0, 0),
(8, '4133748652200013', 'Agus Ibrahim', 'GRK', 0, 0),
(9, '3042764665300113', 'Yuli Anggraini', 'GRK', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `guru_pns`
--

CREATE TABLE `guru_pns` (
  `nip` varchar(40) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `kode_golongan` varchar(20) NOT NULL,
  `kode_jabatan` varchar(20) NOT NULL,
  `status_kawin` varchar(20) NOT NULL,
  `jumlah_anak` int(2) NOT NULL,
  `jumlah_anggota_keluarga` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru_pns`
--

INSERT INTO `guru_pns` (`nip`, `nama`, `kode_golongan`, `kode_jabatan`, `status_kawin`, `jumlah_anak`, `jumlah_anggota_keluarga`) VALUES
('166905222014072001', 'Juminarti', '3C/14', 'GR1', 'Menikah', 2, 4),
('196608062007011010', 'Muhammad Yusuf', '3C/14', 'GR1', 'Menikah', 2, 4),
('196803272008011002', 'Latif', '3B/10', 'GR1', 'Menikah', 3, 4),
('196906022008011007', 'Isbani', '3B/10', 'GR1', 'Belum Menikah', 0, 1),
('196911032014072001', 'Hayati', '2B/13', 'GR1', 'Menikah', 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan_honor`
--

CREATE TABLE `jabatan_honor` (
  `kode_jabatan` varchar(20) NOT NULL,
  `nama_jabatan` varchar(20) NOT NULL,
  `gapok` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan_honor`
--

INSERT INTO `jabatan_honor` (`kode_jabatan`, `nama_jabatan`, `gapok`) VALUES
('GRK', 'Guru Kelas', 500000),
('GRK1', 'Guru Kelas I', 500000);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan_pns`
--

CREATE TABLE `jabatan_pns` (
  `kode_jabatan` varchar(20) NOT NULL,
  `nama_jabatan` varchar(20) NOT NULL,
  `tj_jabatan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan_pns`
--

INSERT INTO `jabatan_pns` (`kode_jabatan`, `nama_jabatan`, `tj_jabatan`) VALUES
('GR1', 'Guru', 0),
('KS1', 'Kepala Sekolah', 121000);

-- --------------------------------------------------------

--
-- Table structure for table `periode_gaji`
--

CREATE TABLE `periode_gaji` (
  `id` int(11) NOT NULL,
  `bulan` varchar(3) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periode_gaji`
--

INSERT INTO `periode_gaji` (`id`, `bulan`, `tahun`) VALUES
(63, '5', 2019),
(64, '5', 2019),
(65, '3', 2019),
(66, '6', 2019),
(67, '7', 2019),
(68, '11', 2019),
(69, '12', 2019);

-- --------------------------------------------------------

--
-- Table structure for table `periode_gaji_honor`
--

CREATE TABLE `periode_gaji_honor` (
  `id` int(11) NOT NULL,
  `bulan` varchar(3) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periode_gaji_honor`
--

INSERT INTO `periode_gaji_honor` (`id`, `bulan`, `tahun`) VALUES
(5, '1', 2019),
(6, '1', 2019),
(7, '2', 2019),
(8, '4', 2019),
(9, '5', 2019);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_honor`
--
ALTER TABLE `admin_honor`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `admin_pns`
--
ALTER TABLE `admin_pns`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `bulan_pns`
--
ALTER TABLE `bulan_pns`
  ADD PRIMARY KEY (`bulan`);

--
-- Indexes for table `gaji_honor`
--
ALTER TABLE `gaji_honor`
  ADD PRIMARY KEY (`id_guru`,`id_bulan`),
  ADD KEY `id_bulan` (`id_bulan`);

--
-- Indexes for table `gaji_pns`
--
ALTER TABLE `gaji_pns`
  ADD PRIMARY KEY (`nip`,`id_bulan`),
  ADD KEY `id_bulan` (`id_bulan`);

--
-- Indexes for table `golongan_pns`
--
ALTER TABLE `golongan_pns`
  ADD PRIMARY KEY (`kode_golongan`);

--
-- Indexes for table `guru_honor`
--
ALTER TABLE `guru_honor`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `kode_jabatan` (`kode_jabatan`);

--
-- Indexes for table `guru_pns`
--
ALTER TABLE `guru_pns`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `jabatan_honor`
--
ALTER TABLE `jabatan_honor`
  ADD PRIMARY KEY (`kode_jabatan`);

--
-- Indexes for table `jabatan_pns`
--
ALTER TABLE `jabatan_pns`
  ADD PRIMARY KEY (`kode_jabatan`);

--
-- Indexes for table `periode_gaji`
--
ALTER TABLE `periode_gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periode_gaji_honor`
--
ALTER TABLE `periode_gaji_honor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_honor`
--
ALTER TABLE `admin_honor`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_pns`
--
ALTER TABLE `admin_pns`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `guru_honor`
--
ALTER TABLE `guru_honor`
  MODIFY `id_guru` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `periode_gaji`
--
ALTER TABLE `periode_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `periode_gaji_honor`
--
ALTER TABLE `periode_gaji_honor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gaji_honor`
--
ALTER TABLE `gaji_honor`
  ADD CONSTRAINT `gaji_honor_ibfk_1` FOREIGN KEY (`id_bulan`) REFERENCES `periode_gaji_honor` (`id`),
  ADD CONSTRAINT `gaji_honor_ibfk_2` FOREIGN KEY (`id_guru`) REFERENCES `guru_honor` (`id_guru`);

--
-- Constraints for table `gaji_pns`
--
ALTER TABLE `gaji_pns`
  ADD CONSTRAINT `gaji_pns_ibfk_1` FOREIGN KEY (`id_bulan`) REFERENCES `periode_gaji` (`id`),
  ADD CONSTRAINT `gaji_pns_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `guru_pns` (`nip`);

--
-- Constraints for table `guru_honor`
--
ALTER TABLE `guru_honor`
  ADD CONSTRAINT `guru_honor_ibfk_1` FOREIGN KEY (`kode_jabatan`) REFERENCES `jabatan_honor` (`kode_jabatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
