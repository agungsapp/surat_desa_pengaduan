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
-- Database: `surat_keterangan_desa`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_request_skd`
--

CREATE TABLE `data_request_skd` (
  `id_request_skd` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tanggal_request` timestamp NOT NULL DEFAULT current_timestamp(),
  `scan_ktp` text NOT NULL,
  `scan_kk` text NOT NULL,
  `keperluan` varchar(20) NOT NULL,
  `keterangan` varchar(50) NOT NULL DEFAULT 'Data sedang diperiksa oleh Staf',
  `request` varchar(20) NOT NULL DEFAULT 'DOMISILI',
  `status` int(11) NOT NULL DEFAULT 0,
  `acc` date NOT NULL,
  `jalan` varchar(50) NOT NULL,
  `RT` varchar(5) NOT NULL,
  `RW` varchar(5) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_request_skd`
--

INSERT INTO `data_request_skd` (`id_request_skd`, `nik`, `tanggal_request`, `scan_ktp`, `scan_kk`, `keperluan`, `keterangan`, `request`, `status`, `acc`, `jalan`, `RT`, `RW`, `desa`, `kecamatan`, `kabupaten`) VALUES
(21, '1111111111111111', '2021-10-18 06:46:28', '1111111111111111 - Fachri Shofiyyuddin Ahmad_.jpg', '1111111111111111 - Fachri Shofiyyuddin Ahmad_.jpg', 'Administrasi Bank', 'Surat dicetak, bisa diambil!', 'DOMISILI', 3, '2021-10-18', '', '', '', '', '', ''),
(22, '01010', '2025-04-29 15:56:59', '01010_.jpg', '01010_.jpg', 'izin domisili', 'Data sedang diperiksa oleh Staf', 'DOMISILI', 2, '0000-00-00', '', '', '', '', '', ''),
(23, '00', '2025-06-24 09:13:56', '00_.jpg', '00_.jpg', 'jl. brawijaya, rt/rw', '', 'DOMISILI', 2, '0000-00-00', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `data_request_skp`
--

CREATE TABLE `data_request_skp` (
  `id_request_skp` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tanggal_request` timestamp NOT NULL DEFAULT current_timestamp(),
  `scan_ktp` text NOT NULL,
  `scan_kk` text NOT NULL,
  `keperluan` varchar(30) NOT NULL,
  `keterangan` varchar(50) NOT NULL DEFAULT 'Data sedang diperiksa oleh Staf',
  `request` varchar(20) NOT NULL DEFAULT 'LAINNYA',
  `status` int(11) NOT NULL DEFAULT 0,
  `acc` date NOT NULL,
  `nama_usaha` varchar(35) NOT NULL,
  `jenis_usaha` varchar(35) NOT NULL,
  `alamat_usaha` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_request_skp`
--

INSERT INTO `data_request_skp` (`id_request_skp`, `nik`, `tanggal_request`, `scan_ktp`, `scan_kk`, `keperluan`, `keterangan`, `request`, `status`, `acc`, `nama_usaha`, `jenis_usaha`, `alamat_usaha`) VALUES
(10, '1111111111111111', '2021-10-18 06:14:07', '1111111111111111_.jpg', '1111111111111111_.jpg', 'KTP Hilang', 'Surat dicetak, bisa diambil!', 'LAINNYA', 3, '2021-10-18', '', '', ''),
(11, '01010', '2025-04-29 15:56:18', '01010_.jpg', '01010_.jpg', 'izin domisili', 'Data sedang diperiksa oleh Staf', 'LAINNYA', 2, '0000-00-00', '', '', ''),
(12, '00', '2025-06-24 07:39:22', '00_.jpg', '00_.jpg', '', 'Data sedang diperiksa oleh Staf', 'LAINNYA', 0, '0000-00-00', '', '', ''),
(13, '00', '2025-06-24 08:21:23', '00_.jpg', '00_.jpg', '', 'Data sedang diperiksa oleh Staf', 'LAINNYA', 2, '0000-00-00', 'jual beli barang', 'perdagangan', 'sukaraja');

-- --------------------------------------------------------

--
-- Table structure for table `data_request_sktm`
--

CREATE TABLE `data_request_sktm` (
  `id_request_sktm` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tanggal_request` timestamp NOT NULL DEFAULT current_timestamp(),
  `scan_ktp` text NOT NULL,
  `scan_kk` text NOT NULL,
  `keperluan` varchar(30) NOT NULL,
  `request` varchar(20) NOT NULL DEFAULT 'TIDAK MAMPU',
  `keterangan` varchar(50) NOT NULL DEFAULT 'Sedang di proses',
  `status` int(11) NOT NULL DEFAULT 0,
  `acc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_request_sktm`
--

INSERT INTO `data_request_sktm` (`id_request_sktm`, `nik`, `tanggal_request`, `scan_ktp`, `scan_kk`, `keperluan`, `request`, `keterangan`, `status`, `acc`) VALUES
(50, '1111111111111111', '2021-10-17 10:06:35', '1111111111111111 - Fachri Shofiyyuddin Ahmad_.jpg', '1111111111111111 - Fachri Shofiyyuddin Ahmad_.jpg', 'Beasiswa Sekolah', 'TIDAK MAMPU', 'Surat dicetak, bisa diambil!', 3, '2021-10-17'),
(51, '211', '2025-01-22 13:52:53', '211_.jpg', '211_.jpg', 'beasiswa', 'TIDAK MAMPU', 'Surat sedang dalam proses cetak', 2, '2025-04-30'),
(52, '01010', '2025-04-27 12:03:56', '01010_.jpg', '01010_.jpg', 'beasiswa', 'TIDAK MAMPU', 'Surat sedang dalam proses cetak', 2, '0000-00-00'),
(53, '01010', '2025-05-01 17:08:59', '01010_.jpg', '01010_.jpg', 'daftar kuliah', 'TIDAK MAMPU', 'Surat dicetak, bisa diambil!', 3, '2025-05-01'),
(54, '0110', '2025-05-01 17:27:43', '0110_.jpg', '0110_.jpg', 'daftar kuliah', 'TIDAK MAMPU', 'Surat dicetak, bisa diambil!', 3, '2025-05-02'),
(55, '00', '2025-05-02 07:48:05', '00_.jpg', '00_.jpg', 'pendaftaran kuliah', 'TIDAK MAMPU', 'Surat sedang dalam proses cetak', 2, '0000-00-00'),
(56, '00', '2025-05-09 16:21:32', '00_.jpg', '00_.jpg', 'pendaftaran kuliah', 'TIDAK MAMPU', 'Surat dicetak, bisa diambil!', 3, '2025-05-09'),
(57, '00', '2025-05-09 20:19:16', '00_.jpg', '00_.jpg', 'beasiswa KIPK', 'TIDAK MAMPU', 'pengajuan beasiswa kipk', 1, '0000-00-00'),
(58, '00', '2025-05-12 04:43:20', '00_.jpg', '00_.jpg', 'daftar kuliah', 'TIDAK MAMPU', 'Data sedang diperiksa oleh Staf', 1, '0000-00-00'),
(59, '00', '2025-06-09 14:12:50', '00_.jpg', '00_.jpg', 'daftar kuliah', 'TIDAK MAMPU', 'Sedang di proses', 1, '0000-00-00'),
(60, '00', '2025-06-09 14:47:12', '00_.jpg', '00_.jpg', 'beasiswa KIPK 2025', 'TIDAK MAMPU', 'Sedang di proses', 2, '0000-00-00'),
(61, '00', '2025-06-10 15:02:54', '00_.jpg', '00_.jpg', 'INI PERCOBAAN', 'TIDAK MAMPU', 'Surat sedang dalam proses cetak', 2, '0000-00-00'),
(62, '00', '2025-06-17 00:54:59', '00_.jpg', '00_.jpg', 'pendaftaran kulian 2025', 'TIDAK MAMPU', 'Sedang di proses', 2, '0000-00-00'),
(63, '00', '2025-06-23 14:42:42', '00_.jpg', '00_.jpg', 'just try', 'TIDAK MAMPU', 'Sedang di proses', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `data_request_sku`
--

CREATE TABLE `data_request_sku` (
  `id_request_sku` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tanggal_request` timestamp NOT NULL DEFAULT current_timestamp(),
  `scan_ktp` text NOT NULL,
  `scan_kk` text NOT NULL,
  `usaha` varchar(30) NOT NULL,
  `keperluan` varchar(30) NOT NULL,
  `keterangan` varchar(50) NOT NULL DEFAULT 'Data sedang diperiksa oleh Staf',
  `request` varchar(20) NOT NULL DEFAULT 'USAHA',
  `status` int(11) NOT NULL DEFAULT 0,
  `acc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_request_sku`
--

INSERT INTO `data_request_sku` (`id_request_sku`, `nik`, `tanggal_request`, `scan_ktp`, `scan_kk`, `usaha`, `keperluan`, `keterangan`, `request`, `status`, `acc`) VALUES
(9, '1111111111111111', '2021-10-17 10:37:58', '1111111111111111 - Fachri Shofiyyuddin Ahmad_.jpg', '1111111111111111 - Fachri Shofiyyuddin Ahmad_.jpg', 'Warung Kopi', 'Bantuan UMKM', 'Surat dicetak, bisa diambil!', 'USAHA', 3, '2021-10-17'),
(10, '01010', '2025-04-29 15:53:31', '01010_.jpg', '01010_.jpg', 'toko', 'izin mendirikan usaha', 'Data sedang diperiksa oleh Staf', 'USAHA', 0, '0000-00-00'),
(11, '00', '2025-04-29 18:22:57', '00_.jpg', '00_.jpg', 'toko baju', 'izin mendirikan usaha', 'Data sedang diperiksa oleh Staf', 'USAHA', 0, '0000-00-00'),
(12, '00', '2025-06-23 14:43:34', '00_.jpg', '00_.jpg', 'toko emas', 'izin pembukaan usaha', 'Surat sedang dalam proses cetak', 'USAHA', 2, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `nik` varchar(16) NOT NULL,
  `password` varchar(225) NOT NULL,
  `hak_akses` varchar(225) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `jekel` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `status_warga` varchar(30) NOT NULL,
  `nm_ayah` varchar(35) NOT NULL,
  `nm_ibu` varchar(35) NOT NULL,
  `pekerjaan` varchar(35) NOT NULL,
  `pk_ayah` varchar(35) NOT NULL,
  `pk_ibu` varchar(35) NOT NULL,
  `kawin` varchar(20) NOT NULL,
  `password_hash` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`nik`, `password`, `hak_akses`, `nama`, `tanggal_lahir`, `tempat_lahir`, `jekel`, `agama`, `alamat`, `telepon`, `status_warga`, `nm_ayah`, `nm_ibu`, `pekerjaan`, `pk_ayah`, `pk_ibu`, `kawin`, `password_hash`) VALUES
('00', '1', 'Pemohon', 'kaylaaa', '2004-04-04', 'jakarta', 'Perempuan', 'Islam', 'jl. brawijaya, rt/rw: 001/007, desa bogorejo, kecamatan gedong tataan, kabupaten pesawaran', '0821', 'Sekolah', 'Erwan', 'Rodiyah', 'web developer', 'Petani', 'Baby Sitter', 'Belum Menikah', ''),
('0000', 'a', 'Pemohon', 'kaylaaa', '2004-04-04', 'jakarta', 'Perempuan', 'Islam', '  Bogorejo 7', '0821', 'Sekolah', 'Erwan', 'Rodiyah', 'web developer', 'Petani', 'Baby Sitter', 'Belum Menikah', ''),
('00001', '12345678.a', 'Pemohon', 'kayla', '2004-04-04', 'jakarta', 'Perempuan', '', '', '', '', '', '', '', '', '', '', ''),
('0001', '12345678.A', 'Pemohon', 'kayla', '2004-04-04', 'jakarta', 'Perempuan', '', '', '', '', '', '', '', '', '', '', ''),
('009908', 'kjnkjn', 'Pemohon', 'NJBKJBH', '2021-12-11', 'kjnkj', 'Laki-Laki', '', 'kjnhkjn', '', 'Kerja', '', '', '', '', '', '', ''),
('01', '12345678.A', 'Pemohon', 'kayla', '2004-04-04', 'jakarta', 'Perempuan', '', '', '', '', '', '', '', '', '', '', ''),
('01010', 'KA', 'Pemohon', 'kaylaa sasmitha halim', '2004-04-04', 'jakarta', 'Perempuan', '', '', '', '', '', '', '', '', '', '', ''),
('0110', '12', 'Pemohon', 'kaylaaa', '2004-04-04', 'jakarta', 'Perempuan', 'Islam', 'Bogorejo 7', '08218', 'Sekolah', '', '', '', '', '', '', ''),
('1', '1', 'Lurah', 'coba', '2021-10-20', 'coba', 'Laki-Laki', '', 'coba', '', 'Kerja', '', '', '', '', '', '', ''),
('11', 'k', 'Pemohon', 'kay', '2007-07-07', 'jakarta', 'Perempuan', '', '', '', '', '', '', '', '', '', '', ''),
('1111111111111111', '12345', 'Pemohon', 'Fachri Shofiyyuddin Ahmad', '2021-10-17', 'Jakarta', 'Laki-Laki', 'Islam', '        Jakarta RT 01/RW 07', '087897315639', 'Sekolah', '', '', '', '', '', '', ''),
('12345678', '$2y$10$CTPTkw6NUErKtoWV6X0C8umTjz6nk0O35cQiPjTE1.foSSFe/Mhae', 'Pemohon', 'kaylaa sasmitha halim', '2004-04-04', 'jakarta', 'Perempuan', '', '', '', '', '', '', '', '', '', '', ''),
('1234567812345678', '$2y$10$fZZSC3MS2Zxj5S56AjIH9etKz.vihJujea1m5Sxhj0GDezePU.RVO', 'Pemohon', 'kaylaa sasmitha halim', '2004-04-04', 'jakarta', 'Perempuan', '', '', '', '', '', '', '', '', '', '', ''),
('2', 'stafbogorejo2025', 'Staf', 'coba', '2021-10-20', 'coba', 'Perempuan', '', 'coba', '', 'Kerja', '', '', '', '', '', '', ''),
('211', 'k', 'Pemohon', 'kayla', '2002-02-02', 'jakarta', 'Perempuan', 'Islam', '  bogorejo\r\n', '08', 'Sekolah', '', '', '', '', '', '', ''),
('2121', '12345678.AS', 'Pemohon', 'kay', '2004-04-04', 'jakarta', 'Perempuan', '', '', '', '', '', '', '', '', '', '', ''),
('2171', '4', 'Pemohon', 'kayla', '2004-04-04', 'jakarta', 'Perempuan', '', '', '', '', '', '', '', '', '', '', ''),
('777', '12345', 'Pemohon', 'a', '2021-10-20', 'oke', 'Laki-Laki', '', 'x', '', 'Sekolah', '', '', '', '', '', '', ''),
('888', '12345', 'Pemohon', 'cobalagi', '2021-10-20', 'cobalagi', 'Perempuan', '', 'coba', '', 'Sekolah', '', '', '', '', '', '', ''),
('8923478923789489', 'tes', 'Pemohon', 'coba', '2022-05-22', 'kudus', 'Laki-Laki', '', '', '', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_request_skd`
--
ALTER TABLE `data_request_skd`
  ADD PRIMARY KEY (`id_request_skd`),
  ADD KEY `id_pemohon` (`nik`);

--
-- Indexes for table `data_request_skp`
--
ALTER TABLE `data_request_skp`
  ADD PRIMARY KEY (`id_request_skp`),
  ADD KEY `id_pemohon` (`nik`);

--
-- Indexes for table `data_request_sktm`
--
ALTER TABLE `data_request_sktm`
  ADD PRIMARY KEY (`id_request_sktm`),
  ADD KEY `id_pemohon` (`nik`);

--
-- Indexes for table `data_request_sku`
--
ALTER TABLE `data_request_sku`
  ADD PRIMARY KEY (`id_request_sku`),
  ADD KEY `id_pemohon` (`nik`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_request_skd`
--
ALTER TABLE `data_request_skd`
  MODIFY `id_request_skd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `data_request_skp`
--
ALTER TABLE `data_request_skp`
  MODIFY `id_request_skp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `data_request_sktm`
--
ALTER TABLE `data_request_sktm`
  MODIFY `id_request_sktm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `data_request_sku`
--
ALTER TABLE `data_request_sku`
  MODIFY `id_request_sku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_request_skd`
--
ALTER TABLE `data_request_skd`
  ADD CONSTRAINT `data_request_skd_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `data_user` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_request_skp`
--
ALTER TABLE `data_request_skp`
  ADD CONSTRAINT `data_request_skp_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `data_user` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_request_sktm`
--
ALTER TABLE `data_request_sktm`
  ADD CONSTRAINT `data_request_sktm_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `data_user` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_request_sku`
--
ALTER TABLE `data_request_sku`
  ADD CONSTRAINT `data_request_sku_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `data_user` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
