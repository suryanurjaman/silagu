-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 11:28 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemguru`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_absen`
--

CREATE TABLE `tb_absen` (
  `id_absen` int(11) NOT NULL,
  `kode_pelajaran` varchar(50) NOT NULL,
  `tahun_ajaran` varchar(30) NOT NULL,
  `semester` varchar(45) NOT NULL,
  `guru_pelajaran` varchar(100) NOT NULL,
  `kelas` varchar(40) NOT NULL,
  `hari` varchar(40) NOT NULL,
  `waktu` varchar(60) NOT NULL,
  `jamke` varchar(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tgl_absen` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_absen`
--

INSERT INTO `tb_absen` (`id_absen`, `kode_pelajaran`, `tahun_ajaran`, `semester`, `guru_pelajaran`, `kelas`, `hari`, `waktu`, `jamke`, `status`, `tgl_absen`) VALUES
(4, 'MPL-1674728665', '2312312', 'Ganjil', 'Alfhan', 'V', 'Monday', '07.00-09.00', '1', 'Tidak Hadir', '11:24:28 26-01-2023'),
(5, 'MPL-1675460857', '2019/2020', 'Ganjil', 'Alfhan', 'X', 'Saturday', '12.00 - 13.00', 'asd', 'Hadir', '22:47:41 03-02-2023'),
(6, 'MPL-1675460902', '2019/2020', 'Ganjil', 'Alfhan', 'X', 'Saturday', '12.00 - 13.00', 'asd', 'Tidak Hadir', '22:48:25 03-02-2023'),
(7, 'MPL-1675461147', '2019/2020', 'Ganjil', 'Alfhan', 'X', 'Saturday', '12.00 - 13.00', 'asd', 'Hadir', '22:52:28 03-02-2023'),
(8, 'MPL-1675461152', '2019/2020', 'Ganjil', 'Alfhan', 'X', 'Saturday', '12.00 - 13.00', 'asd', 'Hadir', '22:52:33 03-02-2023'),
(9, 'MPL-1675461163', '2019/2020', 'Ganjil', 'Gufron', 'X', 'Saturday', '12.00 - 13.00', 'asd', 'Hadir', '22:52:44 03-02-2023'),
(10, 'MPL-1675462115', '2019/2020', 'Ganjil', 'Alfhan', 'X', 'Saturday', '12.00 - 13.00', 'asd', 'Tidak Hadir', '23:08:38 03-02-2023'),
(11, 'MPL-1675462224', '2019/2020', 'Ganjil', 'Alfhan', 'X', 'Saturday', '12.00 - 13.00', 'asd', 'Tidak Hadir', '23:10:27 03-02-2023'),
(12, 'MPL-1675462334', '2019/2020', 'Ganjil', 'Alfhan', 'X', 'Saturday', '12.00 - 13.00', 'asd', 'Hadir', '23:12:15 03-02-2023'),
(13, 'MPL-1675462418', '2019/2020', 'Ganjil', 'Alfhan', 'X', 'Saturday', '12.00 - 13.00', 'asd', 'Hadir', '23:13:39 03-02-2023'),
(14, 'MPL-1675463151', '2019/2020', 'Ganjil', 'Alfhan', 'X', 'Saturday', '12.00 - 13.00', 'asd', 'Hadir', '23:25:52 03-02-2023');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `aktif` varchar(5) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_lengkap`, `username`, `password`, `aktif`, `foto`) VALUES
(1, 'Surya', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Y', '11.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `status` varchar(5) NOT NULL,
  `nik` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `nip`, `nama_guru`, `email`, `password`, `foto`, `status`, `nik`) VALUES
(1, '001', 'Alfhan', 'alfhan@gmail.com', '4565888c2c5be9e9dfc170c0818bbcca', 'Screenshot_20221228_062955.png', 'Y', 2135351),
(16, '002', 'Gufron M.Pd.', 'gufron@gmail.com', 'b1af298646b96c77ff9f7b424f888735', 'guf.jpg', 'Y', 66666666),
(17, '005', 'Ujang', 'ujang@gmail.com', 'c959810f01adc10791f46e1b3ecab45a', 'guf.jpg', 'Y', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_mapel`
--

CREATE TABLE `tb_master_mapel` (
  `id_mapel` int(11) NOT NULL,
  `kode_mapel` varchar(40) NOT NULL,
  `mapel` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_master_mapel`
--

INSERT INTO `tb_master_mapel` (`id_mapel`, `kode_mapel`, `mapel`) VALUES
(2, 'MP-1674121714', 'Bahasa Indonesia'),
(3, 'MP-1674121951', 'Bahasa Inggris'),
(7, 'MP-1674778365', 'Pendidikan Agama Islam');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mengajar`
--

CREATE TABLE `tb_mengajar` (
  `id_mengajar` int(11) NOT NULL,
  `kode_pelajaran` varchar(30) NOT NULL,
  `hari` varchar(40) NOT NULL,
  `jam_mengajar` varchar(60) NOT NULL,
  `jamke` varchar(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_mkelas` int(11) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `id_thajaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_mengajar`
--

INSERT INTO `tb_mengajar` (`id_mengajar`, `kode_pelajaran`, `hari`, `jam_mengajar`, `jamke`, `id_guru`, `id_mapel`, `id_mkelas`, `id_semester`, `id_thajaran`) VALUES
(41, 'MPL-1674958699', 'Sunday', '12.00 - 13.00', '1 - 3', 1, 3, 16, 5, 1),
(42, 'MPL-1674958788', 'Friday', '07.00 - 11.00', '1 - 3', 1, 2, 16, 5, 1),
(43, 'MPL-1674959154', 'Friday', '07.00 - 11.00', '1', 16, 7, 16, 5, 1),
(44, 'MPL-1675457957', 'Friday', 'asd', 'asd', 1, 3, 16, 5, 1),
(45, 'MPL-1675458184', 'Saturday', '12.00 - 13.00', 'asd', 1, 7, 16, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mkelas`
--

CREATE TABLE `tb_mkelas` (
  `id_mkelas` int(11) NOT NULL,
  `kd_kelas` varchar(40) NOT NULL,
  `nama_kelas` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_mkelas`
--

INSERT INTO `tb_mkelas` (`id_mkelas`, `kd_kelas`, `nama_kelas`) VALUES
(16, 'KL-002', 'X');

-- --------------------------------------------------------

--
-- Table structure for table `tb_semester`
--

CREATE TABLE `tb_semester` (
  `id_semester` int(11) NOT NULL,
  `semester` varchar(45) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_semester`
--

INSERT INTO `tb_semester` (`id_semester`, `semester`, `status`) VALUES
(5, 'Ganjil', 1),
(7, 'Ganjil', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_thajaran`
--

CREATE TABLE `tb_thajaran` (
  `id_thajaran` int(11) NOT NULL,
  `tahun_ajaran` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_thajaran`
--

INSERT INTO `tb_thajaran` (`id_thajaran`, `tahun_ajaran`, `status`) VALUES
(1, '2019/2020', 1),
(3, '2312312', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_absen`
--
ALTER TABLE `tb_absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `tb_master_mapel`
--
ALTER TABLE `tb_master_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `tb_mengajar`
--
ALTER TABLE `tb_mengajar`
  ADD PRIMARY KEY (`id_mengajar`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indexes for table `tb_mkelas`
--
ALTER TABLE `tb_mkelas`
  ADD PRIMARY KEY (`id_mkelas`);

--
-- Indexes for table `tb_semester`
--
ALTER TABLE `tb_semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indexes for table `tb_thajaran`
--
ALTER TABLE `tb_thajaran`
  ADD PRIMARY KEY (`id_thajaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_absen`
--
ALTER TABLE `tb_absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_master_mapel`
--
ALTER TABLE `tb_master_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_mengajar`
--
ALTER TABLE `tb_mengajar`
  MODIFY `id_mengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tb_mkelas`
--
ALTER TABLE `tb_mkelas`
  MODIFY `id_mkelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tb_semester`
--
ALTER TABLE `tb_semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_thajaran`
--
ALTER TABLE `tb_thajaran`
  MODIFY `id_thajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
