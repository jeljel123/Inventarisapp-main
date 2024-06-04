-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 15, 2024 at 09:42 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `dms` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `hp` varchar(255) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `nama`, `dms`, `alamat`, `hp`, `foto`) VALUES
(3, 'Rara', 'DMS.221', 'Kalimantan', '09090909021', '65e0330b85282.jpe'),
(4, '8', '8', '8', '8', '65e034b313d0e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int NOT NULL,
  `nm_barang` varchar(100) NOT NULL,
  `list1` int DEFAULT NULL,
  `list2` int DEFAULT NULL,
  `list3` int DEFAULT NULL,
  `baik1` int DEFAULT NULL,
  `buruk1` int DEFAULT NULL,
  `baik2` int DEFAULT NULL,
  `buruk2` int DEFAULT NULL,
  `baik3` int DEFAULT NULL,
  `buruk3` int DEFAULT NULL,
  `foto` text NOT NULL,
  `tanggal1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `tanggal2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `tanggal3` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nm_barang`, `list1`, `list2`, `list3`, `baik1`, `buruk1`, `baik2`, `buruk2`, `baik3`, `buruk3`, `foto`, `tanggal1`, `tanggal2`, `tanggal3`) VALUES
(72, 'Tera', 77, 12, 12, 10, 10, 1, 1, 4, 3, '65dfe10a31b2c.jpg', '', '', ''),
(80, 'Sendok', 12, NULL, NULL, 6, 6, NULL, NULL, NULL, NULL, '65e0bee1ac822.png', '2024-02-29', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dipinjam`
--

CREATE TABLE `tb_dipinjam` (
  `id_dipinjam` int NOT NULL,
  `nm_dipinjam` varchar(255) NOT NULL,
  `jml_dipinjam` int NOT NULL,
  `surat_dipinjam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_dipinjam`
--

INSERT INTO `tb_dipinjam` (`id_dipinjam`, `nm_dipinjam`, `jml_dipinjam`, `surat_dipinjam`) VALUES
(4, 'sd', 22, '65830cdd9fba5.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_history`
--

CREATE TABLE `tb_history` (
  `id_histori` int NOT NULL,
  `nama` text NOT NULL,
  `barang` text NOT NULL,
  `tempat` text NOT NULL,
  `perubahan` text NOT NULL,
  `aksi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_history`
--

INSERT INTO `tb_history` (`id_histori`, `nama`, `barang`, `tempat`, `perubahan`, `aksi`) VALUES
(1, 'user', 'SAMPOERNA', 'inventaris->list-1', '12', 'ADD'),
(2, 'user', 'SUSU', 'inventaris->list-2', '12', 'ADD'),
(3, 'user', 'PANCI', 'Inventaris->list-1', '12', 'EDIT'),
(4, 'user', 'qss', 'Inventaris->list-1', '2', 'EDIT'),
(5, 'user', 'PANCI', 'Inventaris->list-', '12', 'EDIT'),
(6, 'user', 'qss', 'Inventaris->list-', '2', 'EDIT'),
(7, 'user', 'qss', 'Inventaris->list-1', '2', 'EDIT'),
(8, 'user', 'SAMPOERNA', 'Inventaris->list-1', '12', 'EDIT'),
(9, 'user', 'SUSU', 'Inventaris->list-2', '12', 'EDIT'),
(10, 'user', 'k3', 'inventaris->list-3', '1', 'ADD'),
(11, 'user', 'k3', 'Inventaris->list-3', '1', 'EDIT'),
(12, 'user', 'k', 'inventaris->list-3', '9', 'ADD'),
(13, 'user', 'ka', 'Inventaris->list-3', '1', 'EDIT'),
(14, 'user', 'k', 'Inventaris->list-3', 'Nama->k Jumlah->9', 'EDIT'),
(15, '', '', 'Inventaris->list-', '', 'DEL'),
(16, 'user', '', 'Inventaris->list-', '', 'DEL'),
(17, 'user', '', 'Inventaris->list-', '', 'DEL'),
(18, 'user', '', 'Inventaris->list-1', '', 'DEL'),
(19, 'user', 'a', 'Data-Pinjam', '2', 'ADD'),
(20, 'user', 'l', 'Inventaris->list-', 'Nama->l Jumlah->2 Surat->', 'EDIT'),
(21, 'user', 'PANCIS', 'Inventaris->list-1', 'Nama->PANCIS Jumlah->12', 'EDIT'),
(22, 'user', 'PANCIS', 'Inventaris->list-1', 'Nama->PANCISCA Jumlah->12', 'EDIT'),
(23, 'user', 'lsssss', 'Inventaris->list-', 'Nama->lsssss Jumlah->2 Surat->', 'EDIT'),
(24, 'user', 'TESTs4', 'Data-Pinjam', 'Nama->TESTs4ss Jumlah->1222 Surat->', 'EDIT'),
(25, 'user', 'TESTs4ss', 'Data-Pinjam', 'Nama->TESTs4ss Jumlah->1222 Surat->', 'EDIT'),
(26, 'user', 'k', 'Data-Pinjam', '2', 'ADD');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjam`
--

CREATE TABLE `tb_pinjam` (
  `id_pinjam` int NOT NULL,
  `nm_pinjam` varchar(100) NOT NULL,
  `jml_pinjam` int NOT NULL,
  `surat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `foto` text NOT NULL,
  `tanggal_masuk` text NOT NULL,
  `tanggal_keluar` text NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_pinjam`
--

INSERT INTO `tb_pinjam` (`id_pinjam`, `nm_pinjam`, `jml_pinjam`, `surat`, `foto`, `tanggal_masuk`, `tanggal_keluar`, `jenis`, `status`) VALUES
(41, 'HT', 12, '65dd8db2684b8.docx', '', '2024-02-27', '2024-02-27', 'masuk', 'sudah'),
(42, 'Motor', 2, '65dd9158b4471.jpg', '', '2024-02-28', '2024-02-29', 'masuk', 'sudah'),
(43, 'Monitor', 1, '65dd91a245a47.jpg', '', '2024-02-28', '2024-02-29', 'keluar', 'sudah'),
(44, 'SPEAKER', 1, '65e0d20d3602d.docx', '', '2024-03-01', '2024-02-29', 'masuk', 'sudah'),
(45, 'Laptop', 12, '65e0d34caf371.png', '', '2024-02-28', '', 'masuk', 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int NOT NULL,
  `nm_user` varchar(255) NOT NULL,
  `alamat_user` varchar(255) NOT NULL,
  `DMS_user` varchar(255) NOT NULL,
  `jabatan_user` varchar(255) NOT NULL,
  `hp_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `theme` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nm_user`, `alamat_user`, `DMS_user`, `jabatan_user`, `hp_user`, `username`, `password`, `theme`) VALUES
(1, 'Joko', 'BTP', 'DMS.XIV.111.211991', 'KaDept. Keagamaan', '092340932940', 'user', 'user', 'dracula'),
(2, 'Mark', 'Sudiang', 'DMS.XVI.999.211299', 'Koord. Kerohanian', '08129040292', 'mark', '123', 'dracula');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_dipinjam`
--
ALTER TABLE `tb_dipinjam`
  ADD PRIMARY KEY (`id_dipinjam`);

--
-- Indexes for table `tb_history`
--
ALTER TABLE `tb_history`
  ADD PRIMARY KEY (`id_histori`);

--
-- Indexes for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `tb_dipinjam`
--
ALTER TABLE `tb_dipinjam`
  MODIFY `id_dipinjam` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_history`
--
ALTER TABLE `tb_history`
  MODIFY `id_histori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  MODIFY `id_pinjam` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
