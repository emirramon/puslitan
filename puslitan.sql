-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2019 at 12:11 PM
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
-- Database: `puslitan`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `nip` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `level` int(1) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`nip`, `password`, `level`, `is_active`) VALUES
('197106061997031005', '$2y$10$dIzOMc14rTriW8u8dUsUYu9SclmVogA1FVSOy.jJmeRS0TaQPRUkG', 1, 1),
('Administrator', '$2y$10$MAwYviztg0kU1X3DlnHWje1qhkdW3Odi1dzFEWfILOck2ABOY0ZVW', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tempatlahir` varchar(30) NOT NULL,
  `tanggallahir` date NOT NULL,
  `fakultas` varchar(30) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `pangkat` varchar(20) NOT NULL,
  `golongan` varchar(20) NOT NULL,
  `npwp` varchar(20) NOT NULL,
  `norekening` varchar(20) NOT NULL,
  `namabank` varchar(20) NOT NULL,
  `namapemilik` varchar(20) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nomorhp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nama`, `tempatlahir`, `tanggallahir`, `fakultas`, `jurusan`, `pangkat`, `golongan`, `npwp`, `norekening`, `namabank`, `namapemilik`, `jabatan`, `email`, `nomorhp`) VALUES
('197106061997031005', 'Emir Ramon', 'Pekanbaru', '1998-01-24', '7', '35', '4', '17', 'ABCDEFG', '', '', '', 'gurubesar', 'emirramoon@gmail.com', '082377532442');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `idfakultas` int(11) NOT NULL,
  `namafakultas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`idfakultas`, `namafakultas`) VALUES
(1, 'Tarbiyah dan Keguruan'),
(2, 'Ushuluddin'),
(3, 'Psikologi'),
(4, 'Ekonomi dan Ilmu Sosial'),
(5, 'Syariah dan Ilmu Hukum'),
(6, 'Dakwah dan Ilmu Komunikasi'),
(7, 'Sains dan Teknologi'),
(8, 'Pertanian dan Peternakan');

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `idgolongan` int(11) NOT NULL,
  `idpangkat` int(11) NOT NULL,
  `namagolongan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`idgolongan`, `idpangkat`, `namagolongan`) VALUES
(1, 1, 'Juru Muda (A)'),
(2, 1, 'Juru Muda Tingkat 1 (B)'),
(3, 1, 'Juru (C)'),
(4, 1, 'Juru Tingkat 1 (D)'),
(5, 2, 'Pengatur Muda (A)'),
(6, 2, 'Pengatur Muda Tingkat 1 (B)'),
(7, 2, 'Pengatur (C)'),
(8, 2, 'Pengatur Tingkat 1 (D)'),
(9, 3, 'Penata Muda (A)'),
(10, 3, 'Penata Muda Tingkat 1 (B)'),
(11, 3, 'Penata (C)'),
(12, 3, 'Penata Tingkat 1 (D)'),
(13, 4, 'Pembina (A)'),
(14, 4, 'Pembina Tingkat 1 (B)'),
(15, 4, 'Pembina Utama Muda (C)'),
(16, 4, 'Pembina Utama Madya (D)'),
(17, 4, 'Pembina Utama (E)');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `idjurusan` int(11) NOT NULL,
  `idfakultas` int(11) NOT NULL,
  `namajurusan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`idjurusan`, `idfakultas`, `namajurusan`) VALUES
(1, 1, 'Pendidikan Agama Islam'),
(2, 1, 'Pendidikan Bahasa Arab'),
(3, 1, 'Kependidikan Islam'),
(4, 1, 'Pendidikan Bahasa Inggris'),
(5, 1, 'Pendidikan Matematika'),
(6, 1, 'Pendidikan Guru Madrasah Ibtidaiyah'),
(7, 1, 'Pendidikan Kimia'),
(8, 1, 'Pendidikan Bahasa Indonesia'),
(9, 1, 'Tadris IPA'),
(10, 1, 'Pendidikan Geografi'),
(11, 1, 'Pendidikan IPS Ekonomi'),
(12, 2, 'Aqidah dan Filsafat'),
(13, 2, 'Tafsir Hadist'),
(14, 2, 'Ilmu Hadist'),
(15, 2, 'Perbandingan Agama'),
(16, 3, 'S1 Psikologi'),
(17, 3, 'S2 Psikologi'),
(18, 4, 'S1 Manajemen'),
(19, 4, 'S1 Administrasi Negara'),
(20, 4, 'S1 Akuntansi'),
(21, 4, 'D3 Manajemen Perusahaan'),
(22, 4, 'D3 Akuntansi'),
(23, 4, 'D3 Administrasi Perpajakan'),
(24, 5, 'Ahwal Al-Syakhshiyyah'),
(25, 5, 'Jinayah Siyasah'),
(26, 5, 'Perbandingan Mazhab dan Hukum'),
(27, 5, 'Muammalah'),
(28, 5, 'Ekonomi Islam'),
(29, 5, 'Ilmu Hukum'),
(30, 5, 'D3 Perbankan Syariah'),
(31, 6, 'Ilmu Komunikasi'),
(32, 6, 'Pengembangan Masyarakat Islam'),
(33, 6, 'Manajemen Dakwah'),
(34, 6, 'Bimbingan dan Konseling Islam'),
(35, 7, 'Teknik Informatika'),
(36, 7, 'Sistem Informasi'),
(37, 7, 'Teknik Industri'),
(38, 7, 'Teknik Elektro'),
(39, 7, 'Matematika Terapan'),
(40, 8, 'Peternakan'),
(41, 8, 'Agroteknologi'),
(42, 8, 'Gizi');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `judul_menu` varchar(20) NOT NULL,
  `icon` varchar(20) NOT NULL,
  `link` varchar(50) NOT NULL,
  `induk_menu` int(11) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `judul_menu`, `icon`, `link`, `induk_menu`, `level`) VALUES
(1, 'Beranda', 'home', 'Home/index', 0, 'dosen'),
(2, 'Tentang Kami', 'info', 'Home', 0, 'dosen'),
(3, 'Login', 'account_circle', 'Auth', 0, ''),
(4, 'Visi dan Misi', 'info', 'Home/visimisi', 2, ''),
(5, 'Struktur Organisasi', 'info', 'Home/strukturorganisasi', 2, ''),
(6, 'Deskripsi Pekerjaan', 'description', 'Home/deskripsipekerjaan', 2, ''),
(7, 'Perkenalan Anggota', 'receipt', 'Home/perkenalananggota', 2, ''),
(8, 'Download', 'assignment', 'Download', 0, 'dosen'),
(9, 'Materi', 'description', 'Home/materi', 8, ''),
(10, 'SK Penelitian', 'assignment', 'Home/skpenelitian', 8, ''),
(11, 'Profil Peneliti', 'receipt', 'Profil', 0, 'dosen'),
(12, 'Acara', 'home', 'Acara', 0, 'admin'),
(13, 'Buat Acara', 'receipt', 'Acara/buat', 12, ''),
(14, 'Buat Absen', 'receipt', 'Acara/buatabsen', 12, ''),
(15, 'Buat SK', 'receipt', 'Acara/buatsk', 12, '');

-- --------------------------------------------------------

--
-- Table structure for table `pangkat`
--

CREATE TABLE `pangkat` (
  `idpangkat` int(11) NOT NULL,
  `namapangkat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pangkat`
--

INSERT INTO `pangkat` (`idpangkat`, `namapangkat`) VALUES
(1, 'Juru'),
(2, 'Pengatur'),
(3, 'Penata'),
(4, 'Pembina');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `level` int(1) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `level`, `menu_id`) VALUES
(1, 0, 1),
(2, 0, 2),
(3, 0, 3),
(4, 0, 4),
(5, 0, 5),
(6, 1, 1),
(7, 1, 2),
(8, 1, 3),
(9, 1, 4),
(10, 2, 1),
(11, 2, 2),
(12, 2, 3),
(13, 2, 4),
(14, 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `title`, `url`, `icon`) VALUES
(1, 'Beranda', 'Home', 'home'),
(2, 'Tentang Kami', 'About', 'info'),
(3, 'Download', 'Download', 'receipt'),
(4, 'Profil Peneliti', 'Peneliti', 'assignment'),
(5, 'Acara', 'Acara', 'dashboard'),
(6, 'Manajemen Menu', 'Managemenu', 'folder');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(0, 'Administrator'),
(1, 'Dosen'),
(2, 'Public');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `sub_title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `sub_title`, `url`, `icon`, `is_active`) VALUES
(1, 3, 'Materi', 'Download/materi', 'M', 1),
(2, 3, 'SK', 'Download/sk', 'S', 1),
(3, 2, 'Visi dan Misi', 'About/visimisi', 'V', 1),
(4, 2, 'Struktur Organisasi', 'About/strukturorganisasi', 'S', 1),
(5, 2, 'Deskripsi Pekerjaan', 'About/deskripsipekerjaan', 'D', 1),
(6, 2, 'Perkenalan Anggota', 'About/perkenalananggota', 'P', 1),
(7, 5, 'Semua Acara', 'Acara/read', 'R', 1),
(8, 5, 'Buat Acara', 'Acara/buat', 'B', 1),
(9, 6, 'Main Menu', 'Managemenu', 'M', 1),
(10, 6, 'Sub Menu', 'Managemenu/submenu', 'S', 1),
(11, 6, 'Icons', 'Managemenu/icons', 'I', 1),
(12, 6, 'User Access', 'Managemenu/useraccess', 'U', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`idfakultas`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`idgolongan`),
  ADD KEY `idpangkat` (`idpangkat`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`idjurusan`),
  ADD KEY `idfakultas` (`idfakultas`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pangkat`
--
ALTER TABLE `pangkat`
  ADD PRIMARY KEY (`idpangkat`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `idfakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
  MODIFY `idgolongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `idjurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pangkat`
--
ALTER TABLE `pangkat`
  MODIFY `idpangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `golongan`
--
ALTER TABLE `golongan`
  ADD CONSTRAINT `golongan_ibfk_1` FOREIGN KEY (`idpangkat`) REFERENCES `pangkat` (`idpangkat`);

--
-- Constraints for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `jurusan_ibfk_1` FOREIGN KEY (`idfakultas`) REFERENCES `fakultas` (`idfakultas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
