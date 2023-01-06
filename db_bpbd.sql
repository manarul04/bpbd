-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2023 at 12:42 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bpbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `bantuan`
--

CREATE TABLE `bantuan` (
  `id_bantuan` int(11) NOT NULL,
  `bantuan` varchar(255) DEFAULT NULL,
  `jenis_bantuan` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_kejadian` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bantuan`
--

INSERT INTO `bantuan` (`id_bantuan`, `bantuan`, `jenis_bantuan`, `tanggal`, `id_kejadian`) VALUES
(1, 'Bantuan Tim Rescue', '1', NULL, '1'),
(2, 'Bantuan Tim Sar', '1', '2023-01-05', '1');

-- --------------------------------------------------------

--
-- Table structure for table `jenisbantuan`
--

CREATE TABLE `jenisbantuan` (
  `id_jenisbantuan` int(11) NOT NULL,
  `jenisbantuan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenisbantuan`
--

INSERT INTO `jenisbantuan` (`id_jenisbantuan`, `jenisbantuan`) VALUES
(1, 'Pangan');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Banjir'),
(2, 'Pohon Tumbang');

-- --------------------------------------------------------

--
-- Table structure for table `kejadian`
--

CREATE TABLE `kejadian` (
  `id_kejadian` int(11) NOT NULL,
  `kejadian` varchar(255) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `sebab` varchar(255) DEFAULT NULL,
  `akibat` varchar(255) DEFAULT NULL,
  `korban` varchar(255) DEFAULT NULL,
  `upaya` varchar(255) DEFAULT NULL,
  `dokumentasi` varchar(255) DEFAULT NULL,
  `id_lokasi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kejadian`
--

INSERT INTO `kejadian` (`id_kejadian`, `kejadian`, `id_kategori`, `tanggal`, `sebab`, `akibat`, `korban`, `upaya`, `dokumentasi`, `id_lokasi`) VALUES
(1, 'Banjir Bandang jos', 1, '2023-01-03 20:17:00', 'curah hujan', 'kebanjiran', '0', 'ga ada', 'DOC-Banjir Bandang jos-2174.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `desa` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `rt` varchar(255) DEFAULT NULL,
  `rw` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `lokasi`, `desa`, `kecamatan`, `kota`, `rt`, `rw`) VALUES
(1, 'Perempatan Lapangan Sipengkok', 'Besito', 'Gebog', 'Kudus', '4', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Admin', 'admin', '12345678', 'admin'),
(2, 'Manarul', 'manarul', '12345678', 'relawan'),
(3, 'Edi', 'edi', '12345678', 'kepala');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_bantuan`
-- (See below for the actual view)
--
CREATE TABLE `v_bantuan` (
`id_bantuan` int(11)
,`bantuan` varchar(255)
,`tanggal` date
,`id_kejadian` varchar(255)
,`jenisbantuan` varchar(255)
,`id_jenisbantuan` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_kejadian`
-- (See below for the actual view)
--
CREATE TABLE `v_kejadian` (
`id_kejadian` int(11)
,`kejadian` varchar(255)
,`id_kategori` int(11)
,`kategori` varchar(255)
,`tanggal` datetime
,`sebab` varchar(255)
,`akibat` varchar(255)
,`korban` varchar(255)
,`upaya` varchar(255)
,`dokumentasi` varchar(255)
,`id_lokasi` varchar(255)
,`lokasi` varchar(255)
,`desa` varchar(255)
,`kecamatan` varchar(255)
,`kota` varchar(255)
,`rt` varchar(255)
,`rw` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `v_bantuan`
--
DROP TABLE IF EXISTS `v_bantuan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_bantuan`  AS SELECT `bantuan`.`id_bantuan` AS `id_bantuan`, `bantuan`.`bantuan` AS `bantuan`, `bantuan`.`tanggal` AS `tanggal`, `bantuan`.`id_kejadian` AS `id_kejadian`, `jenisbantuan`.`jenisbantuan` AS `jenisbantuan`, `jenisbantuan`.`id_jenisbantuan` AS `id_jenisbantuan` FROM (`bantuan` join `jenisbantuan` on(`bantuan`.`jenis_bantuan` = `jenisbantuan`.`id_jenisbantuan`))  ;

-- --------------------------------------------------------

--
-- Structure for view `v_kejadian`
--
DROP TABLE IF EXISTS `v_kejadian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_kejadian`  AS SELECT `kejadian`.`id_kejadian` AS `id_kejadian`, `kejadian`.`kejadian` AS `kejadian`, `kejadian`.`id_kategori` AS `id_kategori`, `kategori`.`kategori` AS `kategori`, `kejadian`.`tanggal` AS `tanggal`, `kejadian`.`sebab` AS `sebab`, `kejadian`.`akibat` AS `akibat`, `kejadian`.`korban` AS `korban`, `kejadian`.`upaya` AS `upaya`, `kejadian`.`dokumentasi` AS `dokumentasi`, `kejadian`.`id_lokasi` AS `id_lokasi`, `lokasi`.`lokasi` AS `lokasi`, `lokasi`.`desa` AS `desa`, `lokasi`.`kecamatan` AS `kecamatan`, `lokasi`.`kota` AS `kota`, `lokasi`.`rt` AS `rt`, `lokasi`.`rw` AS `rw` FROM ((`kejadian` join `kategori` on(`kejadian`.`id_kategori` = `kategori`.`id_kategori`)) join `lokasi` on(`kejadian`.`id_lokasi` = `lokasi`.`id_lokasi`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bantuan`
--
ALTER TABLE `bantuan`
  ADD PRIMARY KEY (`id_bantuan`);

--
-- Indexes for table `jenisbantuan`
--
ALTER TABLE `jenisbantuan`
  ADD PRIMARY KEY (`id_jenisbantuan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kejadian`
--
ALTER TABLE `kejadian`
  ADD PRIMARY KEY (`id_kejadian`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bantuan`
--
ALTER TABLE `bantuan`
  MODIFY `id_bantuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenisbantuan`
--
ALTER TABLE `jenisbantuan`
  MODIFY `id_jenisbantuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kejadian`
--
ALTER TABLE `kejadian`
  MODIFY `id_kejadian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
