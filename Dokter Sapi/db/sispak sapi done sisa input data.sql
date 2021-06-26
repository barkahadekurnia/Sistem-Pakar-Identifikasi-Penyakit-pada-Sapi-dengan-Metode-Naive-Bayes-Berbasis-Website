-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2021 at 07:49 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sispaksapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `kode_artikel` varchar(100) NOT NULL,
  `judul_artikel` varchar(100) NOT NULL,
  `isi_artikel` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `nama_penulis` varchar(100) NOT NULL,
  `waktu_tambah` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `kode_artikel`, `judul_artikel`, `isi_artikel`, `gambar`, `nama_penulis`, `waktu_tambah`) VALUES
(2, 'ARTIKEL002', 'tes12s', '                                             tes1                                            ', 'ARTIKEL002-02-01-2021-10-40-14.png', '', '2021-01-02 10:40:14'),
(3, 'ARTIKEL003', 'ce', '                                            Isi Artikel...\r\n\r\n                                            ', 'ARTIKEL003-05-01-2021-05-23-31.png', '', '2021-01-05 17:23:31'),
(4, 'ARTIKEL004', 'sab', '\r\n                                            sadas', 'ARTIKEL004-07-01-2021-03-09-33.jpg', '', '2021-01-07 03:09:33'),
(5, 'ARTIKEL005', 'asdas', '<p>asdasd</p>', 'ARTIKEL005-09-01-2021-07-24-51.', 'Barkah Ade Kurnia', '2021-01-09 19:24:51');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id` int(11) NOT NULL,
  `kode_gejala` varchar(100) NOT NULL,
  `nama_gejala` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id`, `kode_gejala`, `nama_gejala`, `keterangan`, `gambar`) VALUES
(1, 'G001', 'Nafsu makan menurun', 'as', 'G001-06-01-2021-05-01-49.'),
(2, 'G002', 'Keluar darah dari lubang tubuh', 'ssssss', 'G002-07-01-2021-08-10-51.jpg'),
(3, 'G003', 'Limpa membesar.', '3s', 'G003-07-01-2021-08-18-36.jpg'),
(4, 'G004', 'Tubuh nampak lesu dan lemah', '4sss', 'G004-07-01-2021-08-18-43.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `kode_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `nama`, `alamat`, `email`, `no_hp`, `foto`, `kode_level`) VALUES
(33, 'admin', '$2y$10$PIcmhHUB4p0Y9u4OJdird.f/ukf9UPP85AZ6sD41RP/fCU2jujKzS', 'Barkah Ade Kurnia', 'Perumahan Taman Gading Blok C nomor 157 Cilacap', 'barkahadekurnia@gmail.com', '0895392220676', '07-01-2021-05-18-38.png', 'Administrator'),
(34, 'pakar', '$2y$10$2dDMvgQD.UH2GoELhqreUunl986iUrS1pFWVMhgv.qozBEs8dp5.i', 'Drh. Sufiriyanto, M.P.', 'Fakultas Peternakan Universitas Jenderal Soedirman', 'sufiriyanto@gmail.com', '081229982626', '07-01-2021-05-19-13.jpg', 'Pakar');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id` int(11) NOT NULL,
  `kode_penyakit` varchar(100) NOT NULL,
  `nama_penyakit` varchar(100) NOT NULL,
  `nama_latin` varchar(100) NOT NULL,
  `penjelasan` text NOT NULL,
  `solusi` text NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id`, `kode_penyakit`, `nama_penyakit`, `nama_latin`, `penjelasan`, `solusi`, `gambar`) VALUES
(1, 'P001', 'a', 'a', 'a\r\n                                            ', 'a\r\n                                        ', 'P001-07-01-2021-01-14-38.jpg'),
(2, 'P002', 'Sapi Gila', 'Bovine Spongiform Encephalopathy', '                                                                                                                                       <p class=\"0-normal\" style=\"text-align: justify; text-indent: 0.5in;\">Penyakit Sapi Gila disebabkan oleh\r\nprotein abnormal (<i>prion</i>). Penyakit\r\nini tergolong dalam <i>Transmissible</i> <i>Spongiform</i> <i>Encephalopathy</i> (TSE) yaitu penyakit yg menyerang susunan syaraf\r\npusat dengan gejala histopatologik utama adanya <i>degenerasi spongiosus</i> atau terbentuknya lubang-lubang kosong di\r\ndalam sel-sel otak, Seperti yang terlihat pada gambar 27, dapat menular kepada\r\nmanusia dan menyebabkan penyakit yang dalam istilah kedokteran disebut&nbsp;<i>Subacute</i> <i>Spongiform</i> <i>Encephalopathy</i>&nbsp;(SSE).</p><p class=\"0-normal\" style=\"text-align: justify; text-indent: 0.5in;\"><span style=\"text-indent: 48px;\">Penyakit Sapi Gila disebabkan oleh protein abnormal (</span><i style=\"text-indent: 48px;\">prion</i><span style=\"text-indent: 48px;\">). Penyakit ini tergolong dalam&nbsp;</span><i style=\"text-indent: 48px;\">Transmissible</i><span style=\"text-indent: 48px;\">&nbsp;</span><i style=\"text-indent: 48px;\">Spongiform</i><span style=\"text-indent: 48px;\">&nbsp;</span><i style=\"text-indent: 48px;\">Encephalopathy</i><span style=\"text-indent: 48px;\">&nbsp;(TSE) yaitu penyakit yg menyerang susunan syaraf pusat dengan gejala histopatologik utama adanya&nbsp;</span><i style=\"text-indent: 48px;\">degenerasi spongiosus</i><span style=\"text-indent: 48px;\">&nbsp;atau terbentuknya lubang-lubang kosong di dalam sel-sel otak, Seperti yang terlihat pada gambar 27, dapat menular kepada manusia dan menyebabkan penyakit yang dalam istilah kedokteran disebut&nbsp;</span><i style=\"text-indent: 48px;\">Subacute</i><span style=\"text-indent: 48px;\">&nbsp;</span><i style=\"text-indent: 48px;\">Spongiform</i><span style=\"text-indent: 48px;\">&nbsp;</span><i style=\"text-indent: 48px;\">Encephalopathy</i><span style=\"text-indent: 48px;\">&nbsp;(SSE).</span><br></p><p class=\"0-normal\" style=\"text-align: center; text-indent: 0.5in;\"></p>', '                                                                                                                                       <p>1</p> \r\n                                         \r\n                                         \r\n                                        ', 'P002-09-01-2021-06-08-09.jpg'),
(3, 'P003', 'asdsad', 'asdsad', '                                             <p>asdsa</p> \r\n                                            ', '                                             <p>asdas</p> \r\n                                        ', 'P003-09-01-2021-08-04-14.'),
(4, 'P004', 'asdas', 'dsadsad', '<p>dasdsa</p>', '<p>sd</p>', 'P004-09-01-2021-08-05-15.');

-- --------------------------------------------------------

--
-- Table structure for table `relasi`
--

CREATE TABLE `relasi` (
  `id` int(11) NOT NULL,
  `kode_penyakit` varchar(100) NOT NULL,
  `kode_gejala` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `relasi`
--

INSERT INTO `relasi` (`id`, `kode_penyakit`, `kode_gejala`) VALUES
(35, 'P001', 'G001'),
(46, 'P002', 'G001'),
(47, 'P002', 'G002'),
(48, 'P002', 'G003'),
(50, 'P003', 'G002'),
(51, 'P003', 'G003');

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `saran` text NOT NULL,
  `waktu_tambah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_identifikasi`
--

CREATE TABLE `tmp_identifikasi` (
  `id` int(11) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `kode_penyakit` varchar(10) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tmp_identifikasi`
--

INSERT INTO `tmp_identifikasi` (`id`, `ip`, `kode_penyakit`, `nilai`) VALUES
(1001, '::1', 'P001', 0.1),
(1002, '::1', 'P002', 0.1),
(1003, '::1', 'P003', 0.05),
(1004, '::1', 'P004', 0.05);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_gejala` (`kode_gejala`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_penyakit` (`kode_penyakit`);

--
-- Indexes for table `relasi`
--
ALTER TABLE `relasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_penyakit` (`kode_penyakit`),
  ADD KEY `kode_gejala` (`kode_gejala`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_identifikasi`
--
ALTER TABLE `tmp_identifikasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `relasi`
--
ALTER TABLE `relasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `saran`
--
ALTER TABLE `saran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tmp_identifikasi`
--
ALTER TABLE `tmp_identifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `relasi`
--
ALTER TABLE `relasi`
  ADD CONSTRAINT `kode_gejala` FOREIGN KEY (`kode_gejala`) REFERENCES `gejala` (`kode_gejala`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kode_penyakit` FOREIGN KEY (`kode_penyakit`) REFERENCES `penyakit` (`kode_penyakit`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
