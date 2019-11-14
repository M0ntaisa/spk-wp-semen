-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2019 at 08:39 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk-semen-wp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_evaluasi`
--

CREATE TABLE `tb_evaluasi` (
  `id_evaluasi` int(11) NOT NULL,
  `kd_material` varchar(15) NOT NULL,
  `kd_kriteria` varchar(15) NOT NULL,
  `kd_suplier` varchar(15) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_history`
--

CREATE TABLE `tb_history` (
  `id_history` int(11) NOT NULL,
  `kd_history` varchar(24) NOT NULL,
  `kd_material` varchar(24) NOT NULL,
  `kd_suplier` varchar(24) NOT NULL,
  `nm_suplier` varchar(124) NOT NULL,
  `vektor_v` float(11,11) NOT NULL,
  `rank` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `kd_kriteria` varchar(15) NOT NULL,
  `nm_kriteria` varchar(50) NOT NULL,
  `bobot` int(11) NOT NULL,
  `bobot_pref` float(11,11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`kd_kriteria`, `nm_kriteria`, `bobot`, `bobot_pref`) VALUES
('krt-001', 'Harga', 3, 0.42857143283),
('krt-002', 'Kualitas', 3, 0.42857143283),
('krt-003', 'Kuantitas', 1, 0.14285714924);

-- --------------------------------------------------------

--
-- Table structure for table `tb_material`
--

CREATE TABLE `tb_material` (
  `kd_material` char(11) NOT NULL,
  `nama_material` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_material`
--

INSERT INTO `tb_material` (`kd_material`, `nama_material`) VALUES
('mtr-001', 'Batu bara'),
('mtr-002', 'Silica'),
('mtr-003', 'Gypsum'),
('mtr-004', 'Clay'),
('mtr-005', 'Chipping');

-- --------------------------------------------------------

--
-- Table structure for table `tb_subkriteria`
--

CREATE TABLE `tb_subkriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `kd_kriteria` varchar(15) NOT NULL,
  `kd_material` varchar(15) NOT NULL,
  `value` varchar(100) NOT NULL,
  `ket` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_subkriteria`
--

INSERT INTO `tb_subkriteria` (`id_subkriteria`, `kd_kriteria`, `kd_material`, `value`, `ket`) VALUES
(7, 'krt-001', 'mtr-001', '> Rp. 480.000,-', 'Sedang'),
(8, 'krt-001', 'mtr-002', '> Rp. 85.000,-', 'Sedang'),
(9, 'krt-001', 'mtr-003', '> Rp. 441.000,-', 'Sedang'),
(10, 'krt-001', 'mtr-004', '> Rp. 40.000,-', 'Sedang'),
(11, 'krt-001', 'mtr-005', '> Rp. 22.000,-', 'Sedang'),
(12, 'krt-001', 'mtr-001', '> Rp. 460.000,- < Rp. 480.000,-', 'Baik'),
(13, 'krt-001', 'mtr-002', '> Rp. 80.000,- < Rp. 85.000,-', 'Baik'),
(14, 'krt-001', 'mtr-003', '> Rp. 360.000,- < Rp. 441.000,-', 'Baik'),
(15, 'krt-001', 'mtr-004', '> Rp. 38.000,- < Rp. 40.000,-', 'Baik'),
(16, 'krt-001', 'mtr-005', '> Rp. 20.000,- < Rp. 22.000,-', 'Baik'),
(17, 'krt-001', 'mtr-001', '> Rp. 430.000,- < Rp. 460.000,-', 'Sangat Baik'),
(18, 'krt-001', 'mtr-002', '> Rp. 64.000,- < Rp. 80.000,-', 'Sangat Baik'),
(19, 'krt-001', 'mtr-003', '> Rp. 240.000,- < Rp. 360.000,-', 'Sangat Baik'),
(20, 'krt-001', 'mtr-004', '> Rp. 37.000,- < Rp. 38.000,-', 'Sangat Baik'),
(21, 'krt-001', 'mtr-005', '> Rp. 18.000,- < Rp. 20.000,-', 'Sangat Baik'),
(22, 'krt-002', 'mtr-001', 'GAR 42', 'Sangat Baik'),
(23, 'krt-002', 'mtr-002', 'SiO2 90', 'Sangat Baik'),
(24, 'krt-002', 'mtr-003', 'Purity 93', 'Sangat Baik'),
(25, 'krt-002', 'mtr-004', 'FE 22', 'Sangat Baik'),
(26, 'krt-002', 'mtr-005', 'CaO 52', 'Sangat Baik'),
(27, 'krt-002', 'mtr-001', 'GAR 38', 'Baik'),
(28, 'krt-002', 'mtr-002', 'SiO2 85', 'Baik'),
(29, 'krt-002', 'mtr-003', 'Purity 90', 'Baik'),
(30, 'krt-002', 'mtr-004', 'FE 20', 'Baik'),
(32, 'krt-002', 'mtr-005', 'CaO 50', 'Baik'),
(33, 'krt-002', 'mtr-001', 'GAR 36', 'Sedang'),
(34, 'krt-002', 'mtr-002', 'SiO2 80', 'Sedang'),
(35, 'krt-002', 'mtr-003', 'Purity 88', 'Sedang'),
(36, 'krt-002', 'mtr-004', 'FE 18', 'Sedang'),
(37, 'krt-002', 'mtr-005', 'CaO 49', 'Sedang'),
(39, 'krt-003', 'mtr-001', '30.000 ton', 'Sangat Baik'),
(40, 'krt-003', 'mtr-002', '25.000 ton', 'Sangat Baik'),
(41, 'krt-003', 'mtr-003', '5.000 ton', 'Sangat Baik'),
(43, 'krt-003', 'mtr-004', '12.000 ton', 'Sangat Baik'),
(44, 'krt-003', 'mtr-005', '450.000 ton', 'Sangat Baik'),
(45, 'krt-003', 'mtr-001', '25.000 ton', 'Baik'),
(46, 'krt-003', 'mtr-002', '20.000 ton', 'Baik'),
(47, 'krt-003', 'mtr-003', '3.000 ton', 'Baik'),
(48, 'krt-003', 'mtr-004', '5.000 ton', 'Baik'),
(49, 'krt-003', 'mtr-005', '400.000 ton', 'Baik'),
(50, 'krt-003', 'mtr-001', '20.000 ton', 'Sedang'),
(51, 'krt-003', 'mtr-002', '15.000 ton', 'Sedang'),
(52, 'krt-003', 'mtr-003', '2.000 ton', 'Sedang'),
(53, 'krt-003', 'mtr-004', '3.000 ton', 'Sedang'),
(54, 'krt-003', 'mtr-005', '350.000 ton', 'Sedang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_suplier`
--

CREATE TABLE `tb_suplier` (
  `kd_suplier` varchar(15) NOT NULL,
  `nm_suplier` varchar(100) NOT NULL,
  `telepon` char(15) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `material` varchar(100) NOT NULL,
  `alamat` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transmat`
--

CREATE TABLE `tb_transmat` (
  `id_transmat` int(11) NOT NULL,
  `kd_suplier` varchar(24) NOT NULL,
  `kd_material` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `tanggal_update`) VALUES
(16, 'Muchlisani Ikhsan', 'admin@gmail.com', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin', '2019-11-06 03:54:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_evaluasi`
--
ALTER TABLE `tb_evaluasi`
  ADD PRIMARY KEY (`id_evaluasi`),
  ADD KEY `evaltosup` (`kd_suplier`),
  ADD KEY `evaltokrit` (`kd_kriteria`),
  ADD KEY `evaltomat` (`kd_material`);

--
-- Indexes for table `tb_history`
--
ALTER TABLE `tb_history`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `history_to_sup` (`kd_suplier`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`kd_kriteria`);

--
-- Indexes for table `tb_material`
--
ALTER TABLE `tb_material`
  ADD PRIMARY KEY (`kd_material`) USING BTREE;

--
-- Indexes for table `tb_subkriteria`
--
ALTER TABLE `tb_subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`),
  ADD KEY `subkrittokrit` (`kd_kriteria`),
  ADD KEY `subkrittomat` (`kd_material`);

--
-- Indexes for table `tb_suplier`
--
ALTER TABLE `tb_suplier`
  ADD PRIMARY KEY (`kd_suplier`);

--
-- Indexes for table `tb_transmat`
--
ALTER TABLE `tb_transmat`
  ADD PRIMARY KEY (`id_transmat`),
  ADD KEY `transtosup` (`kd_suplier`),
  ADD KEY `transtomat` (`kd_material`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_evaluasi`
--
ALTER TABLE `tb_evaluasi`
  MODIFY `id_evaluasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `tb_history`
--
ALTER TABLE `tb_history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `tb_subkriteria`
--
ALTER TABLE `tb_subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tb_transmat`
--
ALTER TABLE `tb_transmat`
  MODIFY `id_transmat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_evaluasi`
--
ALTER TABLE `tb_evaluasi`
  ADD CONSTRAINT `evaltokrit` FOREIGN KEY (`kd_kriteria`) REFERENCES `tb_kriteria` (`kd_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evaltomat` FOREIGN KEY (`kd_material`) REFERENCES `tb_material` (`kd_material`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evaltosup` FOREIGN KEY (`kd_suplier`) REFERENCES `tb_suplier` (`kd_suplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_history`
--
ALTER TABLE `tb_history`
  ADD CONSTRAINT `history_to_sup` FOREIGN KEY (`kd_suplier`) REFERENCES `tb_suplier` (`kd_suplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_subkriteria`
--
ALTER TABLE `tb_subkriteria`
  ADD CONSTRAINT `subkrittokrit` FOREIGN KEY (`kd_kriteria`) REFERENCES `tb_kriteria` (`kd_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subkrittomat` FOREIGN KEY (`kd_material`) REFERENCES `tb_material` (`kd_material`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_transmat`
--
ALTER TABLE `tb_transmat`
  ADD CONSTRAINT `transtomat` FOREIGN KEY (`kd_material`) REFERENCES `tb_material` (`kd_material`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transtosup` FOREIGN KEY (`kd_suplier`) REFERENCES `tb_suplier` (`kd_suplier`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
