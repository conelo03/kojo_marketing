-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2022 at 05:50 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kojo_cloth`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun`
--

CREATE TABLE `tb_akun` (
  `id_akun` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`id_akun`, `id_pegawai`, `username`, `password`, `role`) VALUES
(1, 1, 'admin', '$2y$10$5VifqomOAsoe39zJDc/GJefzvAwOmvdqMbDeNjocX0piQd5KDOKbS', 'Admin'),
(5, 4, 'marketing', '$2y$10$tMeHt/kAenFwvubmrCAi3uZdVd6AucOFdYjjPwzYOBufi7UFDQe8C', 'Marketing'),
(6, 8, 'keuangan', '$2y$10$N7O.Irk8kIK3OOUpklLsEOpBfWQVmNeKYTTjhsxzWpWWBWbXCL7D2', 'Keuangan'),
(7, 9, 'purchase', '$2y$10$yhqIod5blD9Pzl/bIu.x8.pRp3SSo7PKrF2qu1Y4ipqYB4bV/IK5y', 'Purchase'),
(8, 10, 'produksi', '$2y$10$CKedfoqqyLpiJ5moxl.HJe6E1RGN2/euvO6fbfdB4bTGEpBpwCVvG', 'Marketing,Kepala Produksi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bordir`
--

CREATE TABLE `tb_bordir` (
  `id_bordir` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `file_bordir` text,
  `catatan_bordir` text,
  `status_bordir` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bordir`
--

INSERT INTO `tb_bordir` (`id_bordir`, `id_order`, `id_pegawai`, `file_bordir`, `catatan_bordir`, `status_bordir`, `updated_at`) VALUES
(1, 4, 1, '5533-15688-1-PB.pdf', 'tes bordir', 2, '2022-04-21 23:25:31'),
(2, 5, 10, '', '', 1, '2022-04-22 23:55:40');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cutting`
--

CREATE TABLE `tb_cutting` (
  `id_cutting` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `file_cutting` text,
  `catatan_cutting` text,
  `status_cutting` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cutting`
--

INSERT INTO `tb_cutting` (`id_cutting`, `id_order`, `id_pegawai`, `file_cutting`, `catatan_cutting`, `status_cutting`, `updated_at`) VALUES
(1, 4, 1, '3785-12590-1-PB.pdf', 'tes cutting', 4, '2022-04-22 23:20:30'),
(2, 5, 10, '', '', 1, '2022-04-22 23:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jahit`
--

CREATE TABLE `tb_jahit` (
  `id_jahit` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `file_jahit` text,
  `catatan_jahit` text,
  `status_jahit` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jahit`
--

INSERT INTO `tb_jahit` (`id_jahit`, `id_order`, `id_pegawai`, `file_jahit`, `catatan_jahit`, `status_jahit`, `updated_at`) VALUES
(1, 4, 1, '5533-15688-1-PB.pdf', 'tes jahit', 4, '2022-04-22 23:20:38'),
(2, 5, 10, '', '', 1, '2022-04-22 23:55:52');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keuangan`
--

CREATE TABLE `tb_keuangan` (
  `id_keuangan` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `file_keuangan` text,
  `catatan_keuangan` text,
  `status_keuangan` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_keuangan`
--

INSERT INTO `tb_keuangan` (`id_keuangan`, `id_order`, `id_pegawai`, `file_keuangan`, `catatan_keuangan`, `status_keuangan`, `updated_at`) VALUES
(2, 4, 1, '5533-15688-1-PB.pdf', 'cefat', 4, '2022-04-22 23:20:16'),
(3, 5, 8, '', '', 1, '2022-04-22 23:51:55');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` int(11) NOT NULL,
  `tgl_order` date NOT NULL,
  `klien` varchar(100) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah_ukuran_s` int(11) NOT NULL,
  `jumlah_ukuran_m` int(11) NOT NULL,
  `jumlah_ukuran_l` int(11) NOT NULL,
  `jumlah_ukuran_xl` int(11) NOT NULL,
  `jumlah_ukuran_xxl` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `status_order` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `tgl_order`, `klien`, `id_produk`, `jumlah_ukuran_s`, `jumlah_ukuran_m`, `jumlah_ukuran_l`, `jumlah_ukuran_xl`, `jumlah_ukuran_xxl`, `catatan`, `status_order`, `id_pegawai`, `created_at`) VALUES
(4, '2022-04-21', 'TES', 2, 5, 5, 5, 5, 5, 'catatan', 4, 1, '2022-04-21 21:28:27'),
(5, '2022-04-21', 'xxx', 2, 5, 4, 5, 5, 6, 'xxx', 0, 4, '2022-04-22 23:49:02');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `nip`, `nama`, `jabatan`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `foto`) VALUES
(1, '12345', 'admin', 'Administrator', 'subangg', 'subang', '2022-03-01', 'Laki-laki', 'user.png'),
(4, 'tess', 'tess', 'Staff Marketing', 'tess', 'tess', '2022-12-31', 'Laki-laki', 'pemandangan-alam-matahari.jpg'),
(5, '123', 'tes cutting', 'Pegawai Cutting', 'tes', 'tes', '2022-04-21', 'Laki-laki', 'aj_(2).jpeg'),
(6, '123', 'tes pegawai jahit', 'Pegawai Jahit', 'bandun', 'bandung', '2022-04-22', 'Laki-laki', 'aj_(2)1.jpeg'),
(7, '123', 'tes pegawai qc', 'Pegawai QC', 'bandung', 'bandung', '2022-12-31', 'Laki-laki', 'aj_(2)2.jpeg'),
(8, '123', 'Pegawai Keuangan', 'Staff Keuangan', 'subang', 'subang', '2022-12-31', 'Laki-laki', 'aj_(2)3.jpeg'),
(9, '123', 'Pegawai Purchase', 'Staff Purchase', 'subang', 'subang', '2022-12-31', 'Laki-laki', 'aj_(2)4.jpeg'),
(10, '123', 'Kepala Produksi', 'Kepala Produksi', 'subang', 'subang', '2022-12-31', 'Laki-laki', 'aj_(2)5.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai_cutting`
--

CREATE TABLE `tb_pegawai_cutting` (
  `id_pegawai_cutting` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `kasbon` int(11) NOT NULL,
  `tgl_cair` date NOT NULL,
  `pola_potongan` varchar(100) NOT NULL,
  `detail_ukuran` varchar(100) NOT NULL,
  `catatan_potongan` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pegawai_cutting`
--

INSERT INTO `tb_pegawai_cutting` (`id_pegawai_cutting`, `id_order`, `id_pegawai`, `jumlah`, `harga`, `kasbon`, `tgl_cair`, `pola_potongan`, `detail_ukuran`, `catatan_potongan`, `created_at`) VALUES
(1, 4, 5, 7, 5000, 2000, '2022-04-22', 'tess', 'tess', 'tess', '2022-04-21 23:12:08');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai_jahit`
--

CREATE TABLE `tb_pegawai_jahit` (
  `id_pegawai_jahit` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `kasbon` int(11) NOT NULL,
  `tgl_cair` date NOT NULL,
  `ukuran_pendek` varchar(10) NOT NULL,
  `ukuran_panjang` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pegawai_jahit`
--

INSERT INTO `tb_pegawai_jahit` (`id_pegawai_jahit`, `id_order`, `id_pegawai`, `jumlah`, `harga`, `kasbon`, `tgl_cair`, `ukuran_pendek`, `ukuran_panjang`, `created_at`) VALUES
(1, 4, 6, 4, 1000, 0, '2022-04-30', '12', '12', '2022-04-22 23:12:40');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai_qc`
--

CREATE TABLE `tb_pegawai_qc` (
  `id_pegawai_qc` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `kasbon` int(11) NOT NULL,
  `tgl_cair` date NOT NULL,
  `ukuran_pendek` varchar(10) NOT NULL,
  `ukuran_panjang` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pegawai_qc`
--

INSERT INTO `tb_pegawai_qc` (`id_pegawai_qc`, `id_order`, `id_pegawai`, `jumlah`, `harga`, `kasbon`, `tgl_cair`, `ukuran_pendek`, `ukuran_panjang`, `created_at`) VALUES
(1, 4, 7, 2, 10000, 0, '2022-04-30', '12', '12', '2022-04-22 23:19:21');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengiriman`
--

CREATE TABLE `tb_pengiriman` (
  `id_pengiriman` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `file_pengiriman` text,
  `catatan_pengiriman` text,
  `status_pengiriman` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengiriman`
--

INSERT INTO `tb_pengiriman` (`id_pengiriman`, `id_order`, `id_pegawai`, `file_pengiriman`, `catatan_pengiriman`, `status_pengiriman`, `updated_at`) VALUES
(1, 4, 1, '5533-15688-1-PB.pdf', 'tes kirim', 4, '2022-04-22 23:20:53'),
(2, 5, 10, '', '', 1, '2022-04-22 23:56:29');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `jenis_produk` varchar(200) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `bahan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `jenis_produk`, `nama_produk`, `bahan`) VALUES
(2, 'jenis 1', 'produk 1', 'bahan 1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_purchase`
--

CREATE TABLE `tb_purchase` (
  `id_purchase` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `file_purchase` text,
  `catatan_purchase` text,
  `status_purchase` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_purchase`
--

INSERT INTO `tb_purchase` (`id_purchase`, `id_order`, `id_pegawai`, `file_purchase`, `catatan_purchase`, `status_purchase`, `updated_at`) VALUES
(2, 4, 1, '7__SOAL_UAS-STATISTIKA_SOSIAL-PRODY_NEGARA_KARYAWAN_P2K.pdf', 'tes', 4, '2022-04-22 23:20:23'),
(3, 5, 9, '', '', 2, '2022-04-22 23:53:29');

-- --------------------------------------------------------

--
-- Table structure for table `tb_qc`
--

CREATE TABLE `tb_qc` (
  `id_qc` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `file_qc` text,
  `catatan_qc` text,
  `status_qc` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_qc`
--

INSERT INTO `tb_qc` (`id_qc`, `id_order`, `id_pegawai`, `file_qc`, `catatan_qc`, `status_qc`, `updated_at`) VALUES
(1, 4, 1, '5533-15688-1-PB.pdf', 'tes qc', 4, '2022-04-22 23:20:47'),
(2, 5, 10, '', '', 1, '2022-04-22 23:56:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `tb_bordir`
--
ALTER TABLE `tb_bordir`
  ADD PRIMARY KEY (`id_bordir`);

--
-- Indexes for table `tb_cutting`
--
ALTER TABLE `tb_cutting`
  ADD PRIMARY KEY (`id_cutting`);

--
-- Indexes for table `tb_jahit`
--
ALTER TABLE `tb_jahit`
  ADD PRIMARY KEY (`id_jahit`);

--
-- Indexes for table `tb_keuangan`
--
ALTER TABLE `tb_keuangan`
  ADD PRIMARY KEY (`id_keuangan`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tb_pegawai_cutting`
--
ALTER TABLE `tb_pegawai_cutting`
  ADD PRIMARY KEY (`id_pegawai_cutting`);

--
-- Indexes for table `tb_pegawai_jahit`
--
ALTER TABLE `tb_pegawai_jahit`
  ADD PRIMARY KEY (`id_pegawai_jahit`);

--
-- Indexes for table `tb_pegawai_qc`
--
ALTER TABLE `tb_pegawai_qc`
  ADD PRIMARY KEY (`id_pegawai_qc`);

--
-- Indexes for table `tb_pengiriman`
--
ALTER TABLE `tb_pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_purchase`
--
ALTER TABLE `tb_purchase`
  ADD PRIMARY KEY (`id_purchase`);

--
-- Indexes for table `tb_qc`
--
ALTER TABLE `tb_qc`
  ADD PRIMARY KEY (`id_qc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_bordir`
--
ALTER TABLE `tb_bordir`
  MODIFY `id_bordir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_cutting`
--
ALTER TABLE `tb_cutting`
  MODIFY `id_cutting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_jahit`
--
ALTER TABLE `tb_jahit`
  MODIFY `id_jahit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_keuangan`
--
ALTER TABLE `tb_keuangan`
  MODIFY `id_keuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_pegawai_cutting`
--
ALTER TABLE `tb_pegawai_cutting`
  MODIFY `id_pegawai_cutting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pegawai_jahit`
--
ALTER TABLE `tb_pegawai_jahit`
  MODIFY `id_pegawai_jahit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pegawai_qc`
--
ALTER TABLE `tb_pegawai_qc`
  MODIFY `id_pegawai_qc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pengiriman`
--
ALTER TABLE `tb_pengiriman`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_purchase`
--
ALTER TABLE `tb_purchase`
  MODIFY `id_purchase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_qc`
--
ALTER TABLE `tb_qc`
  MODIFY `id_qc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
