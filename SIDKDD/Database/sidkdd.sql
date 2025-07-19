-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2025 at 06:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sidkdd`
--

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id` int(11) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_pemohon` varchar(100) NOT NULL,
  `jenis_surat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id`, `nomor_surat`, `tanggal`, `nama_pemohon`, `jenis_surat`) VALUES
(1, '001/Ket.Domisili/05/25', '2025-05-01', 'L', 'Ket.Domisili'),
(2, '002/Ket.Domisili/05/25', '2025-05-01', 'L', 'Ket.Domisili'),
(3, '003/Ket.Domisili/05/25', '2025-05-01', 'L', 'Ket.Domisili'),
(4, '004/Ket.Domisili/05/25', '2025-05-09', 'L', 'Ket.Domisili'),
(5, '005/Ket.Domisili/05/25', '2025-05-12', 'L', 'Ket.Domisili'),
(6, '006/Ket.Domisili/05/25', '2025-05-12', '', 'Ket.Domisili');

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL,
  `id_kk` int(11) NOT NULL,
  `id_pend` int(11) NOT NULL,
  `hubungan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `id_kk`, `id_pend`, `hubungan`) VALUES
(39, 20, 34, 'Anak'),
(40, 20, 35, 'Anak'),
(41, 21, 36, 'Anak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_datang`
--

CREATE TABLE `tb_datang` (
  `id_datang` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama_datang` varchar(20) NOT NULL,
  `jekel` enum('LK','PR') NOT NULL,
  `tgl_datang` date NOT NULL,
  `pelapor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_datang`
--

INSERT INTO `tb_datang` (`id_datang`, `nik`, `nama_datang`, `jekel`, `tgl_datang`, `pelapor`) VALUES
(3, '040404', 'lena', 'PR', '2004-04-04', 33),
(4, '004', 'alna', 'PR', '2003-04-04', 33);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kk`
--

CREATE TABLE `tb_kk` (
  `id_kk` int(11) NOT NULL,
  `no_kk` varchar(30) NOT NULL,
  `kepala` varchar(20) NOT NULL,
  `desa` varchar(20) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `kec` varchar(20) NOT NULL,
  `kab` varchar(20) NOT NULL,
  `prov` varchar(20) NOT NULL,
  `nm_ayah` varchar(50) NOT NULL,
  `nm_ibu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_kk`
--

INSERT INTO `tb_kk` (`id_kk`, `no_kk`, `kepala`, `desa`, `rt`, `rw`, `kec`, `kab`, `prov`, `nm_ayah`, `nm_ibu`) VALUES
(19, '21211', 'w', 'e', '2', '1', 'f', 'w', 'r', 'a', 's'),
(20, '0987', 'riyan', 'sriayu', '005', '001', 'sriajo', 'srikandi', 'Sulawesi Selatan', 'riyan', 'rima'),
(21, '2171', 'Erwan', 'Bogorejo', '001', '007', 'Gedong Tataan', 'Pesawaran', 'Lampung', 'Erwan', 'Rodiyah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lahir`
--

CREATE TABLE `tb_lahir` (
  `id_lahir` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tempat_lh` varchar(25) NOT NULL,
  `tgl_lh` date NOT NULL,
  `jekel` enum('Laki-Laki','Perempuan') NOT NULL,
  `id_kk` int(11) NOT NULL,
  `nama_ayah` varchar(25) NOT NULL,
  `nama_ibu` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_lahir`
--

INSERT INTO `tb_lahir` (`id_lahir`, `nama`, `tempat_lh`, `tgl_lh`, `jekel`, `id_kk`, `nama_ayah`, `nama_ibu`) VALUES
(2, 'kalendra', '', '2025-05-24', 'Laki-Laki', 19, '', ''),
(3, 'kaylaa sasmitha halim', '', '2004-04-04', 'Perempuan', 21, '', ''),
(6, 'Denasera Alena', 'Bandung', '2021-05-18', 'Perempuan', 20, 'riyan', 'rima');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mendu`
--

CREATE TABLE `tb_mendu` (
  `id_mendu` int(11) NOT NULL,
  `id_pdd` int(11) NOT NULL,
  `tgl_mendu` date NOT NULL,
  `sebab` varchar(20) NOT NULL,
  `jam_mendu` time DEFAULT NULL,
  `dikebumikan` varchar(100) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `nm_pelapor` varchar(25) NOT NULL,
  `tgl_pelapor` date DEFAULT NULL,
  `jk_pelapor` enum('Laki-Laki','Perempuan') NOT NULL,
  `pekerjaan_pelapor` varchar(50) NOT NULL,
  `agama_pelapor` varchar(15) NOT NULL,
  `alamat_pelapor` varchar(50) NOT NULL,
  `usia` varchar(3) NOT NULL,
  `alamat_mendu` varchar(25) NOT NULL,
  `hubungan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_mendu`
--

INSERT INTO `tb_mendu` (`id_mendu`, `id_pdd`, `tgl_mendu`, `sebab`, `jam_mendu`, `dikebumikan`, `tempat`, `nm_pelapor`, `tgl_pelapor`, `jk_pelapor`, `pekerjaan_pelapor`, `agama_pelapor`, `alamat_pelapor`, `usia`, `alamat_mendu`, `hubungan`) VALUES
(3, 34, '2048-05-24', 'sakit', NULL, '', '', '', NULL, '', '', '', '', '', '', ''),
(4, 35, '2025-06-25', '', NULL, '', '', '', NULL, '', '', '', '', '', '', ''),
(5, 37, '2025-06-25', '', '00:00:20', 'Kamis, 26 Juni 2025', 'TPU, Desa Bogorejo', 'Riri Rismayanti', '2002-12-12', 'Perempuan', 'PNS', 'Islam', 'Bogorejo 7, gedong tataan, pesawaran', '20', 'RT/RW: 001/002', 'Kakak Kandung'),
(6, 38, '2025-06-25', '', '00:00:18', 'Kamis, 26 Juni 2025', 'TPU, Desa Bogorejo', 'Riri Rismayanti', '2025-06-11', 'Perempuan', 'PNS', 'Islam', 'Bogorejo 7, gedong tataan, pesawaran', '20', 'RT/RW: 001/002', ''),
(7, 40, '2025-06-25', '', '00:00:20', 'Kamis, 26 Juni 2025', 'jakarta', 'Riri Rismayanti', '1999-02-21', 'Perempuan', 'PNS', 'Kristen', 'Bogorejo 7, gedong tataan, pesawaran', '23', 'RT/RW: 001/002', 'Kakak Kandung');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pdd`
--

CREATE TABLE `tb_pdd` (
  `id_pend` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tempat_lh` varchar(15) NOT NULL,
  `tgl_lh` date NOT NULL,
  `jekel` enum('LK','PR') NOT NULL,
  `desa` varchar(15) NOT NULL,
  `rt` varchar(4) NOT NULL,
  `rw` varchar(4) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `kawin` varchar(15) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `status` enum('Ada','Meninggal','Pindah') NOT NULL,
  `nm_ayah_pdd` varchar(50) NOT NULL,
  `nm_ibu_pdd` varchar(50) NOT NULL,
  `Alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_pdd`
--

INSERT INTO `tb_pdd` (`id_pend`, `nik`, `nama`, `tempat_lh`, `tgl_lh`, `jekel`, `desa`, `rt`, `rw`, `agama`, `kawin`, `pekerjaan`, `status`, `nm_ayah_pdd`, `nm_ibu_pdd`, `Alamat`) VALUES
(33, '123456', 'kaylas', 'jakarta', '2004-04-04', '', 'bogorejo', '001', '007', 'islam', 'Belum', 'belum bekerja', 'Pindah', 'erw', 'rod', ''),
(34, '008', 'nath', 'makassar', '2005-04-08', '', 'sriayu', '005', '001', 'kristen', 'Belum', 'belum bekerja', 'Meninggal', 'riyan', 'rima', ''),
(35, '0201', 'falvi', 'medan', '2000-03-23', '', 'sukamaju', '004', '004', 'budha', 'Belum', 'direktur', 'Meninggal', 'fatho', 'afi', ''),
(36, '2171020023', 'Kayla Sasmitha Halim', 'Jakarta', '2004-04-04', '', 'Bogorejo', '001', '007', 'Islam', '', 'Mahasiswa', 'Ada', 'Erwan', 'Rodiyah', ''),
(37, '123456789', 'Riko Pranatha', 'Bandung', '2000-02-20', '', 'Bogorejo', '002', '004', 'Kristen', 'Belum', 'PNS', 'Meninggal', 'Bani', 'Rika', ''),
(38, '1234567891', 'ayes', 'jakarta', '2002-02-21', '', 'Bogorejo', '002', '002', 'Kristen', '', 'PNS', 'Meninggal', 'riyan', 'rima', ''),
(39, '123456789345', 'kaylaa sasmitha hali', 'Jakarta', '2004-04-04', 'PR', 'Bogorejo', '001', '007', 'Islam', 'Belum', 'Mahasiswa', 'Pindah', 'Erwan', 'Rodiyah', ''),
(40, '62738474848', 'yicka', 'depok', '2002-02-23', 'PR', 'Bogorejo', '005', '001', 'Kristen', 'Sudah', 'web developer', 'Meninggal', 'rifan', 'aryani', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('Administrator','Kaur Pemerintah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(1, 'Pegawai', 'admin', 'admin', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pindah`
--

CREATE TABLE `tb_pindah` (
  `id_pindah` int(11) NOT NULL,
  `id_pdd` int(11) NOT NULL,
  `tgl_pindah` date NOT NULL,
  `alasan` varchar(50) NOT NULL,
  `KTP` int(20) DEFAULT NULL,
  `KK` int(20) DEFAULT NULL,
  `alamat_asal` varchar(25) DEFAULT NULL,
  `tujuan` varchar(32) DEFAULT NULL,
  `alasan_pindah` varchar(50) DEFAULT NULL,
  `jumlah_pengikut` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_pindah`
--

INSERT INTO `tb_pindah` (`id_pindah`, `id_pdd`, `tgl_pindah`, `alasan`, `KTP`, `KK`, `alamat_asal`, `tujuan`, `alasan_pindah`, `jumlah_pengikut`) VALUES
(3, 33, '2025-06-25', 'pindah dinas', 2147483647, 2147483647, 'bogorejo 7 brawijaya', 'jakarta selatan', 'Pindah Dinas', '1'),
(4, 39, '2025-06-25', '', 2147483647, 2147483647, 'bogorejo 7 brawijaya', 'jakarta selatan', 'Pindah Dinas', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `tb_anggota_ibfk_1` (`id_pend`),
  ADD KEY `id_kk` (`id_kk`);

--
-- Indexes for table `tb_datang`
--
ALTER TABLE `tb_datang`
  ADD PRIMARY KEY (`id_datang`),
  ADD KEY `pelapor` (`pelapor`);

--
-- Indexes for table `tb_kk`
--
ALTER TABLE `tb_kk`
  ADD PRIMARY KEY (`id_kk`);

--
-- Indexes for table `tb_lahir`
--
ALTER TABLE `tb_lahir`
  ADD PRIMARY KEY (`id_lahir`),
  ADD KEY `id_kk` (`id_kk`);

--
-- Indexes for table `tb_mendu`
--
ALTER TABLE `tb_mendu`
  ADD PRIMARY KEY (`id_mendu`),
  ADD KEY `id_pdd` (`id_pdd`);

--
-- Indexes for table `tb_pdd`
--
ALTER TABLE `tb_pdd`
  ADD PRIMARY KEY (`id_pend`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_pindah`
--
ALTER TABLE `tb_pindah`
  ADD PRIMARY KEY (`id_pindah`),
  ADD KEY `id_pdd` (`id_pdd`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tb_datang`
--
ALTER TABLE `tb_datang`
  MODIFY `id_datang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_kk`
--
ALTER TABLE `tb_kk`
  MODIFY `id_kk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_lahir`
--
ALTER TABLE `tb_lahir`
  MODIFY `id_lahir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_mendu`
--
ALTER TABLE `tb_mendu`
  MODIFY `id_mendu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pdd`
--
ALTER TABLE `tb_pdd`
  MODIFY `id_pend` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pindah`
--
ALTER TABLE `tb_pindah`
  MODIFY `id_pindah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD CONSTRAINT `tb_anggota_ibfk_1` FOREIGN KEY (`id_pend`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_2` FOREIGN KEY (`id_kk`) REFERENCES `tb_kk` (`id_kk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_datang`
--
ALTER TABLE `tb_datang`
  ADD CONSTRAINT `tb_datang_ibfk_1` FOREIGN KEY (`pelapor`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_lahir`
--
ALTER TABLE `tb_lahir`
  ADD CONSTRAINT `tb_lahir_ibfk_1` FOREIGN KEY (`id_kk`) REFERENCES `tb_kk` (`id_kk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_mendu`
--
ALTER TABLE `tb_mendu`
  ADD CONSTRAINT `tb_mendu_ibfk_1` FOREIGN KEY (`id_pdd`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pindah`
--
ALTER TABLE `tb_pindah`
  ADD CONSTRAINT `tb_pindah_ibfk_1` FOREIGN KEY (`id_pdd`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
