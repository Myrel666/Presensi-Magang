-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2022 at 06:50 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simagang`
--

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id` int(45) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id`, `nama_sekolah`) VALUES
(1, 'Institut Telkom Surabaya'),
(2, 'Universitas Nahdlatul Ulama Surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `tb_divisi`
--

CREATE TABLE `tb_divisi` (
  `id` int(45) NOT NULL,
  `nama_divisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_divisi`
--

INSERT INTO `tb_divisi` (`id`, `nama_divisi`) VALUES
(1, 'DIVISI TEKNOLOGI INFORMASI'),
(2, 'DIVISI TEKNIK'),
(3, 'DIVISI KEUANGAN'),
(4, 'DIVISI MANAJEMEN MUTU DAN RISIKO'),
(5, 'DIVISI PROPERTI DAN RUPA-RUPA USAHA'),
(6, 'DIVISI PELAYANAN KAPAL'),
(7, 'DIVISI KOMERSIAL'),
(8, 'DIVISI SUMBER DAYA MANUSIA DAN UMUM'),
(9, 'DIVISI TANGGUNG JAWAB SOSIAL DAN LINGKUNGAN'),
(10, 'PELABUHAN KALIMAS DAN GSN'),
(11, 'PELABUHAN GRESIK'),
(12, 'PELABUHAN TANJUNG TEMBAGA '),
(13, 'PELABUHAN KALIANGET'),
(14, 'PELABUHAN TANJUNG EMAS'),
(15, 'PELABUHAN TEGAL');

-- --------------------------------------------------------

--
-- Table structure for table `tb_laporan_harian`
--

CREATE TABLE `tb_laporan_harian` (
  `id` int(45) NOT NULL,
  `id_pemagang` int(45) NOT NULL,
  `id_pembimbing` int(45) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `deskripsi_kegiatan` varchar(100) NOT NULL,
  `bukti_file` varchar(100) NOT NULL,
  `status` enum('disetujui','proses','ditolak') NOT NULL DEFAULT 'proses',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` varchar(40) NOT NULL,
  `update_at` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_laporan_harian`
--

INSERT INTO `tb_laporan_harian` (`id`, `id_pemagang`, `id_pembimbing`, `nama_kegiatan`, `deskripsi_kegiatan`, `bukti_file`, `status`, `created_at`, `deleted_at`, `update_at`) VALUES
(1, 4, 11, 'Mengerjakan tugas', 'Mengerjakan Tugas', 'Stock Barang.pdf', 'disetujui', '2022-08-11 06:51:30', '', ''),
(2, 4, 11, 'Ngoding', 'gerheHERHE', 'Stock Barang.pdf', 'disetujui', '2022-08-16 03:09:06', '', ''),
(3, 4, 11, 'Mengerjakan tugas', 'advwevwervbws', 'Stock Barang.pdf', 'ditolak', '2022-08-16 16:28:19', '', ''),
(4, 5, 11, 'Mengerjakan Laporan', 'Menginput data pegawai', 'Ega Almira profile.pdf', 'ditolak', '2022-08-21 12:41:44', '', ''),
(5, 10, 12, 'Mengerjakan tugas', 'Mengatur data pegawai', 'image_2022-08-22_104846935.png', 'disetujui', '2022-08-22 03:48:47', '', ''),
(6, 10, 11, 'Mengerjakan install ulang', 'install ulang windows', 'image_2022-08-22_104926832.png', 'proses', '2022-08-22 03:49:27', '', ''),
(7, 10, 11, 'Mengerjakan tugas', 'mengerjakan tugas ', 'Simagang-Page-1.drawio (2).png', 'proses', '2022-08-31 08:54:55', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemagang`
--

CREATE TABLE `tb_pemagang` (
  `id` int(45) NOT NULL,
  `id_users` int(40) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status` enum('Aktif','Non-Aktif') NOT NULL DEFAULT 'Aktif',
  `username` varchar(100) NOT NULL,
  `id_divisi` int(45) NOT NULL,
  `id_pembimbing` int(45) NOT NULL,
  `nip` varchar(40) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `jeniskelamin` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` varchar(45) NOT NULL,
  `update_at` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pemagang`
--

INSERT INTO `tb_pemagang` (`id`, `id_users`, `nama`, `status`, `username`, `id_divisi`, `id_pembimbing`, `nip`, `instansi`, `jeniskelamin`, `created_at`, `deleted_at`, `update_at`) VALUES
(3, 6, 'Udin Ahmad', 'Aktif', 'udindun', 2, 11, '22', '1', '', '2022-07-20 07:32:26', '', ''),
(4, 16, 'bobo', 'Aktif', 'bobo', 1, 11, '100', '1', 'Laki-laki', '2022-07-22 01:35:01', '', ''),
(5, 18, 'Popi', 'Aktif', 'popi', 1, 11, '22', 'unusa', '', '2022-08-11 09:13:48', '', ''),
(7, 20, 'Lili', 'Non-Aktif', 'lili', 1, 11, '4', 'unusa', '', '2022-08-12 01:36:12', '', ''),
(8, 22, 'yupi', 'Aktif', 'yupi', 1, 12, '9', 'unusa', 'Laki-laki', '2022-08-12 01:45:19', '', ''),
(9, 23, 'gurru', 'Non-Aktif', 'gurru', 1, 11, '10', '1', 'Laki-laki', '2022-08-12 01:46:59', '', ''),
(10, 28, 'pemagang', 'Aktif', 'Pemagang', 1, 11, '90', 'unusa', 'Perempuan', '2022-08-22 03:44:49', '', ''),
(13, 35, 'gogo', 'Aktif', 'gogo', 3, 11, '98', '2', 'Perempuan', '2022-08-25 13:57:40', '', ''),
(14, 36, 'Tasya', 'Aktif', 'tasya', 2, 13, '22', '2', 'Perempuan', '2022-08-30 02:25:47', '', ''),
(15, 37, 'Tri', 'Aktif', 'tri', 3, 11, '10', '1', 'Perempuan', '2022-08-30 02:26:51', '', ''),
(16, 38, 'Dimas', 'Aktif', 'dimas', 1, 11, '90', '1', 'Laki-laki', '2022-09-03 08:53:26', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembimbing`
--

CREATE TABLE `tb_pembimbing` (
  `id` int(45) NOT NULL,
  `id_users` int(45) NOT NULL,
  `nama_pembimbing` varchar(100) NOT NULL,
  `id_divisi` int(45) NOT NULL,
  `username` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` varchar(40) NOT NULL,
  `update_at` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembimbing`
--

INSERT INTO `tb_pembimbing` (`id`, `id_users`, `nama_pembimbing`, `id_divisi`, `username`, `created_at`, `deleted_at`, `update_at`) VALUES
(11, 15, 'Hari', 1, 'hari', '2022-07-20 08:24:28', '', ''),
(12, 17, 'Marsha', 1, 'marsha', '2022-08-01 01:50:58', '', ''),
(13, 26, 'Nagasaki', 2, 'nagasaki', '2022-08-13 05:18:29', '', ''),
(14, 27, 'budianto', 2, 'budianto', '2022-08-13 05:19:16', '', ''),
(15, 29, 'Pembimbing', 1, 'Pembimbing', '2022-08-22 03:53:28', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajuan`
--

CREATE TABLE `tb_pengajuan` (
  `id` int(45) NOT NULL,
  `id_pemagang` int(45) NOT NULL,
  `id_pembimbing` int(45) NOT NULL,
  `subyek` varchar(100) NOT NULL,
  `deskripsi_kegiatan` varchar(100) NOT NULL,
  `bukti_file` varchar(100) NOT NULL,
  `tipe` enum('sakit','izin') NOT NULL,
  `status` enum('disetujui','proses','ditolak') NOT NULL DEFAULT 'proses',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` varchar(40) NOT NULL,
  `update_at` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengajuan`
--

INSERT INTO `tb_pengajuan` (`id`, `id_pemagang`, `id_pembimbing`, `subyek`, `deskripsi_kegiatan`, `bukti_file`, `tipe`, `status`, `created_at`, `deleted_at`, `update_at`) VALUES
(2, 4, 12, 'Usus buntu', 'masuk ruang inap', 'Stock Barang.pdf', 'sakit', 'disetujui', '2022-08-19 06:53:04', '', ''),
(3, 10, 11, 'sakit', 'sakit diare', 'image_2022-08-29_101030780.png', 'sakit', 'disetujui', '2022-08-30 03:10:32', '', ''),
(4, 4, 11, 'izin', 'izin ke kampus', 'usecase_magang.drawio (2).png', 'sakit', 'disetujui', '2022-08-30 02:21:43', '', ''),
(7, 10, 11, '', 'izin ke kampus', 'P4,81 outdoor 19m x 0,75m quotationdocx.pdf', 'izin', 'proses', '2022-09-02 11:35:56', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penguji`
--

CREATE TABLE `tb_penguji` (
  `id` int(45) NOT NULL,
  `id_users` int(45) NOT NULL,
  `nama_penguji` varchar(100) NOT NULL,
  `id_divisi` int(45) NOT NULL,
  `username` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` varchar(40) NOT NULL,
  `update_at` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penguji`
--

INSERT INTO `tb_penguji` (`id`, `id_users`, `nama_penguji`, `id_divisi`, `username`, `created_at`, `deleted_at`, `update_at`) VALUES
(1, 24, 'Kolis', 1, 'kolis', '2022-08-13 04:57:19', '', ''),
(2, 25, 'Mumuni', 2, 'mumun', '2022-08-13 05:12:54', '', ''),
(3, 30, 'Penguji', 1, 'Penguji', '2022-08-22 03:55:22', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian`
--

CREATE TABLE `tb_penilaian` (
  `id` int(45) NOT NULL,
  `id_pemagang` int(45) NOT NULL,
  `id_penguji` varchar(100) NOT NULL,
  `presentasi` varchar(100) NOT NULL,
  `penyampaian` varchar(100) NOT NULL,
  `proses_tanyajawab` varchar(100) NOT NULL,
  `kepercayaandiri` varchar(100) NOT NULL,
  `problemsolving` varchar(100) NOT NULL,
  `penguasaanmateri` varchar(100) NOT NULL,
  `mempertahankanpendapat` varchar(100) NOT NULL,
  `inovatif` varchar(100) NOT NULL,
  `komunikasi` varchar(100) NOT NULL,
  `feedback` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` varchar(40) NOT NULL,
  `update_at` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penilaian`
--

INSERT INTO `tb_penilaian` (`id`, `id_pemagang`, `id_penguji`, `presentasi`, `penyampaian`, `proses_tanyajawab`, `kepercayaandiri`, `problemsolving`, `penguasaanmateri`, `mempertahankanpendapat`, `inovatif`, `komunikasi`, `feedback`, `created_at`, `deleted_at`, `update_at`) VALUES
(3, 3, '1', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'ecewcvwvw', '2022-07-26 02:37:15', '', ''),
(4, 0, '', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'dajkcnakcnakjncka', '2022-08-16 15:24:26', '', ''),
(5, 0, '', 'Cukup', 'Cukup', 'Buruk', 'Buruk', 'Baik Sekali', 'Agak Buruk', 'Buruk', 'Baik Sekali', 'Cukup', 'hjvghvkuyyukguilyjh', '2022-08-16 15:26:00', '', ''),
(6, 13, '3', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'baik', '2022-08-31 08:58:37', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaianpembimbing`
--

CREATE TABLE `tb_penilaianpembimbing` (
  `id` int(45) NOT NULL,
  `id_pemagang` int(45) NOT NULL,
  `id_pembimbing` int(45) NOT NULL,
  `integritas` varchar(100) NOT NULL,
  `ketepatanwaktu` varchar(100) NOT NULL,
  `keahlian` varchar(100) NOT NULL,
  `kerjasama` varchar(100) NOT NULL,
  `pengembangandiri` varchar(100) NOT NULL,
  `feedback` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` varchar(100) NOT NULL,
  `update_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penilaianpembimbing`
--

INSERT INTO `tb_penilaianpembimbing` (`id`, `id_pemagang`, `id_pembimbing`, `integritas`, `ketepatanwaktu`, `keahlian`, `kerjasama`, `pengembangandiri`, `feedback`, `created_at`, `deleted_at`, `update_at`) VALUES
(5, 2, 1, 'Baik Sekali', 'Baik Sekali', 'Baik Sekali', 'Baik Sekali', 'Baik Sekali', 'agrgagrWG', '2022-07-20 06:25:06', '', ''),
(10, 3, 11, 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'cacavcqev', '2022-08-16 09:16:23', '', ''),
(11, 5, 11, 'Cukup', 'Cukup', 'Cukup', 'Cukup', 'Cukup', 'cukup', '2022-08-31 08:57:38', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_presensi`
--

CREATE TABLE `tb_presensi` (
  `id` int(45) NOT NULL,
  `id_pemagang` int(45) NOT NULL,
  `tgl` date DEFAULT NULL,
  `bukti_masuk` varchar(100) NOT NULL,
  `bukti_pulang` varchar(100) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_pulang` time NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` varchar(100) NOT NULL,
  `deleted_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_presensi`
--

INSERT INTO `tb_presensi` (`id`, `id_pemagang`, `tgl`, `bukti_masuk`, `bukti_pulang`, `jam_masuk`, `jam_pulang`, `created_at`, `update_at`, `deleted_at`) VALUES
(2, 4, '2022-08-21', '2022-04-07_112026.png', '2022-04-07_112026.png', '16:10:22', '16:10:28', '2022-08-21 16:10:22', '', ''),
(3, 10, '2022-08-29', 'usecase_magang.drawio (2).png', '', '00:00:00', '16:00:00', '2022-08-29 10:11:29', '', ''),
(4, 10, '2022-08-26', 'usecase_magang.drawio (2).png', '', '07:49:29', '17:10:00', '2022-08-29 10:11:29', '', ''),
(5, 10, '2022-08-31', 'logo_pmmb-removebg-preview.png', 'usecase_magang.drawio (2).png', '15:54:00', '15:54:11', '2022-08-31 15:54:00', '', ''),
(6, 10, '2022-09-02', 'Simagang-Page-1.drawio (2).png', '', '18:10:43', '00:00:00', '2022-09-02 18:10:43', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id` int(45) NOT NULL,
  `role_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id`, `role_id`) VALUES
(1, 'admin'),
(2, 'pembimbing'),
(3, 'user'),
(4, 'penguji');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `id` int(40) NOT NULL,
  `nilai_status` int(1) NOT NULL,
  `keterangan_status` varchar(255) NOT NULL,
  `id_pemagang` int(11) NOT NULL,
  `tanggal_status` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`id`, `nilai_status`, `keterangan_status`, `id_pemagang`, `tanggal_status`) VALUES
(1, 0, 'Sakit', 3, '2022-08-26');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` varchar(40) NOT NULL,
  `level` enum('admin','pembimbing','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `nama`, `username`, `password`, `role_id`, `level`) VALUES
(1, 'admin', 'admin', 'c93ccd78b2076528346216b3b2f701e6', '1', 'admin'),
(5, 'ANNISA', 'anisa', 'fde51d07468d8f5f9f6d79328a800dc9', '3', 'user'),
(6, 'Udin Ahmad', 'udindun', 'c6c5e21f3fd69a53f96ff6e0b4d8ae6f', '3', 'user'),
(15, 'Hari', 'hari', 'bd1839a2fcfcb41ccc4942ca617cc2a5', '2', 'pembimbing'),
(16, 'bobo', 'bobo', '87aaf965dafcba176aa84975a5cb297a', '3', 'user'),
(17, 'Marsha', 'marsha', 'e9e67e7dc13e79d22a4494d77e61b595', '2', 'pembimbing'),
(18, 'Popi', 'popi', 'b37fbc8fb52f6f33c52b03f0f3b3d973', '3', 'user'),
(19, 'Pavita', 'pavita', 'f3df037187aec698ae78b192200b65ff', '3', 'user'),
(20, 'Lili', 'lili', '956c63e336b1d07c9ae2e723c7cd5650', '3', 'user'),
(21, 'Yupi', 'yupi', 'fed63ea6b39df48c361f4eecac3e5ddf', '3', 'user'),
(22, 'yupi', 'yupi', 'fed63ea6b39df48c361f4eecac3e5ddf', '3', 'user'),
(23, 'gurru', 'gurru', '0af184a4f49fe9dea358479bef4e34af', '3', 'user'),
(24, 'Kolis', 'kolis', '5fb4cd850f99de23aa590895c1de591a', '4', ''),
(25, 'Mumuni', 'mumun', '4321ccb8562e8a8f5f69063ea3c98763', '4', ''),
(26, 'Nagasaki', 'nagasaki', 'ea445dccd70fb9a8ff079d8a11e98e90', '2', ''),
(27, 'budianto', 'budianto', '520d205655cfc97b79a0acfe90c4db45', '2', 'pembimbing'),
(28, 'pemagang', 'Pemagang', 'cdc9df14e13fa83d7d7a6a7fd0f4bd68', '3', 'user'),
(29, 'Pembimbing', 'Pembimbing', 'a2fb3a6217f784d399cf453928a8127e', '2', 'pembimbing'),
(30, 'Penguji', 'Penguji', '25d34ca24074d0a232d82433a70fca66', '4', ''),
(31, 'Caterine', 'caterine', '00cf971ab59e112debbd7dca75cbb471', '3', 'user'),
(32, 'c', 'c', '4a8a08f09d37b73795649038408b5f33', '3', 'user'),
(33, 'nifrnikwccw', 'c', '4a8a08f09d37b73795649038408b5f33', '3', 'user'),
(34, 'fwqfewf', 'c', '4a8a08f09d37b73795649038408b5f33', '3', 'user'),
(35, 'gogo', 'gogo', '87aaf965dafcba176aa84975a5cb297a', '3', 'user'),
(36, 'Tasya', 'tasya', '90f3927e19d9a4d0e012681550dfa6d7', '3', 'user'),
(37, 'Tri', 'tri', '5f639b369c2c14f31b98669739497c0b', '3', 'user'),
(38, 'Dimas', 'dimas', '88f13362f06546beb6951706cb769cf1', '3', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_divisi`
--
ALTER TABLE `tb_divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_laporan_harian`
--
ALTER TABLE `tb_laporan_harian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pemagang`
--
ALTER TABLE `tb_pemagang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `tb_pembimbing`
--
ALTER TABLE `tb_pembimbing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penguji`
--
ALTER TABLE `tb_penguji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penilaianpembimbing`
--
ALTER TABLE `tb_penilaianpembimbing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_presensi`
--
ALTER TABLE `tb_presensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_divisi`
--
ALTER TABLE `tb_divisi`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_laporan_harian`
--
ALTER TABLE `tb_laporan_harian`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pemagang`
--
ALTER TABLE `tb_pemagang`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_pembimbing`
--
ALTER TABLE `tb_pembimbing`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_penguji`
--
ALTER TABLE `tb_penguji`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_penilaianpembimbing`
--
ALTER TABLE `tb_penilaianpembimbing`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_presensi`
--
ALTER TABLE `tb_presensi`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_pemagang`
--
ALTER TABLE `tb_pemagang`
  ADD CONSTRAINT `tb_pemagang_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `tb_users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
