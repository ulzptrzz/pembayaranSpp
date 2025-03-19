-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 19, 2025 at 12:00 AM
-- Server version: 8.0.40
-- PHP Version: 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spp_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int NOT NULL,
  `namaadmin` varchar(50) NOT NULL,
  `peranadmin` varchar(50) DEFAULT NULL,
  `notelpadm` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buktipembayaran`
--

CREATE TABLE `buktipembayaran` (
  `pembayaranid` int NOT NULL,
  `id` int NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `guruid` int NOT NULL,
  `namaguru` varchar(50) NOT NULL,
  `namasiswa` varchar(50) NOT NULL,
  `notlpguru` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_spp`
--

CREATE TABLE `pembayaran_spp` (
  `id` int NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `walas` text,
  `tahun` int NOT NULL,
  `jumlah` decimal(10,2) NOT NULL,
  `tanggal_bayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pembayaran_spp`
--

INSERT INTO `pembayaran_spp` (`id`, `nama_siswa`, `kelas`, `walas`, `tahun`, `jumlah`, `tanggal_bayar`) VALUES
(3, 'aulia', '11 tata boga 2', 'susmiati', 2025, 1000000.00, '2025-02-11'),
(5, 'venus', '11 elektronika 1', 'sumarwanto', 2025, 20000000.00, '2025-02-11'),
(6, 'darwani', '11 tata rias 1', 'suwarnanti', 2025, 30000000.00, '2025-02-11'),
(7, 'carnita', '11 kimia 2', 'sumardianti', 2025, 10000000.00, '2025-02-18'),
(8, 'pura', '11 manajemen 2', 'surarwati', 2025, 10000000.00, '2025-02-12'),
(9, 'dewista', '11 tata rias 2', 'bu erista', 2025, 20000000.00, '2025-02-11'),
(10, 'resita', '11 manajemen 1', 'romlahlita', 2025, 1000000.00, '2025-02-11'),
(11, 'prsilia', '11 perawatan 1', 'tarmianti', 2025, 10000000.00, '2025-02-11'),
(14, 'puspa', '11 kimia 2', 'sumardianti', 20251, 1000000.00, '2025-02-11'),
(16, 'resita', '11 tata rias 1', 'sutiyah', 2025, 10000000.00, '2025-02-11'),
(19, 'carnita', '10 tsm', 'suwordanyo', 2024, 20000000.00, '2025-02-12'),
(22, 'serisa', '11 kimia 2', 'suradianti', 2024, 1000000.00, '2025-02-12'),
(23, 'Dori', 'XI RPL A', 'sukiem', 2045, 30000000.00, '2025-02-23'),
(25, 'yosi', 'XI perbankan A', 'murnido', 2025, 300000.00, '2025-03-17'),
(26, 'Pipo', 'XI Tata Boga 2', 'sumawinda', 2025, 5000000.00, '2025-03-17'),
(27, 'dedi', 'XI perkantoran a', 'guniah', 2025, 200000.00, '2025-03-18'),
(28, 'piyo', '11 perbankan 1', 'sudaryono', 2025, 300000.00, '2025-03-18'),
(29, 'kiki', '11 elektronika 1', 'sukiem', 2025, 300000.00, '2025-03-18'),
(31, 'kiku', 'xi sija 2', 'sumarwanti', 2025, 3000000.00, '2025-03-18'),
(32, 'dedi', 'XI perkantoran a', 'sudaryono', 2025, 3000000.00, '2025-03-18'),
(33, 'dida', 'XI perkantoran 1', 'sudeni', 2025, 3000000.00, '2025-03-18'),
(34, 'resita', 'XI perkantoran a', 'sumarwanti', 2025, 3000000.00, '2025-03-18'),
(35, 'pio', '11 tata rias 1', 'surarwati', 2025, 20000000.00, '2025-03-19'),
(36, 'yosi', 'XI perkantoran a', 'surarwati', 2025, 3000000.00, '2025-03-19');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `siswaid` int NOT NULL,
  `namasiswa` text NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `notelepon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `verifikasi`
--

CREATE TABLE `verifikasi` (
  `verifikasiid` int NOT NULL,
  `siswaid` int NOT NULL,
  `guruid` int NOT NULL,
  `adminid` int NOT NULL,
  `tglveri` date NOT NULL,
  `statusveri` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `buktipembayaran`
--
ALTER TABLE `buktipembayaran`
  ADD PRIMARY KEY (`pembayaranid`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`guruid`);

--
-- Indexes for table `pembayaran_spp`
--
ALTER TABLE `pembayaran_spp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`siswaid`);

--
-- Indexes for table `verifikasi`
--
ALTER TABLE `verifikasi`
  ADD PRIMARY KEY (`verifikasiid`),
  ADD KEY `siswaid` (`siswaid`),
  ADD KEY `guruid` (`guruid`),
  ADD KEY `adminid` (`adminid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembayaran_spp`
--
ALTER TABLE `pembayaran_spp`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buktipembayaran`
--
ALTER TABLE `buktipembayaran`
  ADD CONSTRAINT `buktipembayaran_ibfk_1` FOREIGN KEY (`id`) REFERENCES `pembayaran_spp` (`id`);

--
-- Constraints for table `verifikasi`
--
ALTER TABLE `verifikasi`
  ADD CONSTRAINT `verifikasi_ibfk_1` FOREIGN KEY (`siswaid`) REFERENCES `siswa` (`siswaid`),
  ADD CONSTRAINT `verifikasi_ibfk_2` FOREIGN KEY (`guruid`) REFERENCES `guru` (`guruid`),
  ADD CONSTRAINT `verifikasi_ibfk_3` FOREIGN KEY (`adminid`) REFERENCES `admin` (`adminid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
