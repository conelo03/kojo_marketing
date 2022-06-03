-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2022 at 04:29 PM
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
-- Table structure for table `tb_agenda`
--

CREATE TABLE `tb_agenda` (
  `id_agenda` int(11) NOT NULL,
  `nama_agenda` varchar(100) NOT NULL,
  `tanggal_agenda` date NOT NULL,
  `tenggat_agenda` date NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `waktu` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_agenda`
--

INSERT INTO `tb_agenda` (`id_agenda`, `nama_agenda`, `tanggal_agenda`, `tenggat_agenda`, `tempat`, `waktu`, `keterangan`) VALUES
(2, 'tesss', '2022-12-31', '2022-12-31', 'tess', 'tess', 'tess'),
(3, 'a', '2022-12-31', '2022-12-31', 'a', 'a', 'aa');

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
(8, 10, 'produksi', '$2y$10$CKedfoqqyLpiJ5moxl.HJe6E1RGN2/euvO6fbfdB4bTGEpBpwCVvG', 'Marketing,Kepala Produksi'),
(9, 11, 'k_marketing', '$2y$10$CMAAJtm5CCvnalCvjruSfeCJn/PktC2MOKJb22.mJRcTXlXIPPq0.', 'Kepala Marketing');

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
(2, 5, 1, '', '', 0, '2022-04-27 17:30:53'),
(3, 6, 0, NULL, NULL, 0, '2022-05-29 21:13:32');

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
(2, 5, 1, '', '', 0, '2022-04-27 17:30:47'),
(3, 6, 0, NULL, NULL, 0, '2022-05-29 21:13:32');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_agenda`
--

CREATE TABLE `tb_detail_agenda` (
  `id_detail_agenda` int(11) NOT NULL,
  `id_agenda` int(11) NOT NULL,
  `foto_agenda` text NOT NULL,
  `tautan` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_agenda`
--

INSERT INTO `tb_detail_agenda` (`id_detail_agenda`, `id_agenda`, `foto_agenda`, `tautan`, `keterangan`) VALUES
(1, 2, 'aj_(2)3.jpeg', 'tess', 'tess');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_gaji`
--

CREATE TABLE `tb_detail_gaji` (
  `id_detail_gaji` int(11) NOT NULL,
  `id_gaji` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `jumlah` double NOT NULL,
  `kasbon` double NOT NULL,
  `total` double NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_gaji`
--

INSERT INTO `tb_detail_gaji` (`id_detail_gaji`, `id_gaji`, `id_pegawai`, `jumlah`, `kasbon`, `total`, `keterangan`) VALUES
(2, 1, 8, 3000000, 0, 3000000, '-'),
(3, 1, 4, 2700000, 100000, 2600000, '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_gaji_produksi`
--

CREATE TABLE `tb_detail_gaji_produksi` (
  `id_detail_gaji_produksi` int(11) NOT NULL,
  `id_gaji_produksi` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `jumlah` double NOT NULL,
  `kasbon` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_gaji_produksi`
--

INSERT INTO `tb_detail_gaji_produksi` (`id_detail_gaji_produksi`, `id_gaji_produksi`, `id_pegawai`, `jumlah`, `kasbon`, `total`) VALUES
(5, 2, 5, 59000, 2000, 57000),
(6, 2, 12, 78000, 50, 77950);

-- --------------------------------------------------------

--
-- Table structure for table `tb_gaji`
--

CREATE TABLE `tb_gaji` (
  `id_gaji` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL,
  `jumlah` double NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gaji`
--

INSERT INTO `tb_gaji` (`id_gaji`, `tanggal`, `keterangan`, `jumlah`, `status`) VALUES
(1, '2022-06-02', 'Gaji Karyawan', 5600000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_gaji_produksi`
--

CREATE TABLE `tb_gaji_produksi` (
  `id_gaji_produksi` int(11) NOT NULL,
  `tanggal_pencairan` date NOT NULL,
  `jumlah` double NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gaji_produksi`
--

INSERT INTO `tb_gaji_produksi` (`id_gaji_produksi`, `tanggal_pencairan`, `jumlah`, `keterangan`, `status`) VALUES
(2, '2022-04-23', 134950, 'Gaji Mingguan Produksi', 2);

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
(2, 5, 1, '', '', 0, '2022-04-27 17:30:57'),
(3, 6, 0, NULL, NULL, 0, '2022-05-29 21:13:32');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_pemasukan`
--

CREATE TABLE `tb_jenis_pemasukan` (
  `id_jenis_pemasukan` int(11) NOT NULL,
  `jenis_pemasukan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis_pemasukan`
--

INSERT INTO `tb_jenis_pemasukan` (`id_jenis_pemasukan`, `jenis_pemasukan`) VALUES
(1, 'Pendapatan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_pengeluaran`
--

CREATE TABLE `tb_jenis_pengeluaran` (
  `id_jenis_pengeluaran` int(11) NOT NULL,
  `jenis_pengeluaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis_pengeluaran`
--

INSERT INTO `tb_jenis_pengeluaran` (`id_jenis_pengeluaran`, `jenis_pengeluaran`) VALUES
(1, 'HPP'),
(2, 'Beban Gaji');

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
(3, 5, 1, '', '', 0, '2022-04-27 17:30:37'),
(4, 6, 0, NULL, NULL, 0, '2022-05-29 21:13:32');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kota`
--

CREATE TABLE `tb_kota` (
  `id_kota` int(4) NOT NULL,
  `nama_kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kota`
--

INSERT INTO `tb_kota` (`id_kota`, `nama_kota`) VALUES
(1, 'Kabupaten Aceh Barat'),
(2, 'Kabupaten Aceh Barat Daya'),
(3, 'Kabupaten Aceh Besar'),
(4, 'Kabupaten Aceh Jaya'),
(5, 'Kabupaten Aceh Selatan'),
(6, 'Kabupaten Aceh Singkil'),
(7, 'Kabupaten Aceh Tamiang'),
(8, 'Kabupaten Aceh Tengah'),
(9, 'Kabupaten Aceh Tenggara'),
(10, 'Kabupaten Aceh Timur'),
(11, 'Kabupaten Aceh Utara'),
(12, 'Kabupaten Bener Meriah'),
(13, 'Kabupaten Bireuen'),
(14, 'Kabupaten Gayo Lues'),
(15, 'Kabupaten Nagan Raya'),
(16, 'Kabupaten Pidie'),
(17, 'Kabupaten Pidie Jaya'),
(18, 'Kabupaten Simeulue'),
(19, 'Kota Banda Aceh'),
(20, 'Kota Langsa'),
(21, 'Kota Lhokseumawe'),
(22, 'Kota Sabang'),
(23, 'Kota Subulussalam'),
(24, 'Kabupaten Asahan'),
(25, 'Kabupaten Batubara'),
(26, 'Kabupaten Dairi'),
(27, 'Kabupaten Deli Serdang'),
(28, 'Kabupaten Humbang Hasundutan'),
(29, 'Kabupaten Karo'),
(30, 'Kabupaten Labuhanbatu'),
(31, 'Kabupaten Labuhanbatu Selatan'),
(32, 'Kabupaten Labuhanbatu Utara'),
(33, 'Kabupaten Langkat'),
(34, 'Kabupaten Mandailing Natal'),
(35, 'Kabupaten Nias'),
(36, 'Kabupaten Nias Barat'),
(37, 'Kabupaten Nias Selatan'),
(38, 'Kabupaten Nias Utara'),
(39, 'Kabupaten Padang Lawas'),
(40, 'Kabupaten Padang Lawas Utara'),
(41, 'Kabupaten Pakpak Bharat'),
(42, 'Kabupaten Samosir'),
(43, 'Kabupaten Serdang Bedagai'),
(44, 'Kabupaten Simalungun'),
(45, 'Kabupaten Tapanuli Selatan'),
(46, 'Kabupaten Tapanuli Tengah'),
(47, 'Kabupaten Tapanuli Utara'),
(48, 'Kabupaten Toba Samosir'),
(49, 'Kota Binjai'),
(50, 'Kota Gunungsitoli'),
(51, 'Kota Medan'),
(52, 'Kota Padangsidempuan'),
(53, 'Kota Pematangsiantar'),
(54, 'Kota Sibolga'),
(55, 'Kota Tanjungbalai'),
(56, 'Kota Tebing Tinggi'),
(57, 'Kabupaten Agam'),
(58, 'Kabupaten Dharmasraya'),
(59, 'Kabupaten Kepulauan Mentawai'),
(60, 'Kabupaten Lima Puluh Kota'),
(61, 'Kabupaten Padang Pariaman'),
(62, 'Kabupaten Pasaman'),
(63, 'Kabupaten Pasaman Barat'),
(64, 'Kabupaten Pesisir Selatan'),
(65, 'Kabupaten Sijunjung'),
(66, 'Kabupaten Solok'),
(67, 'Kabupaten Solok Selatan'),
(68, 'Kabupaten Tanah Datar'),
(69, 'Kota Bukittinggi'),
(70, 'Kota Padang'),
(71, 'Kota Padangpanjang'),
(72, 'Kota Pariaman'),
(73, 'Kota Payakumbuh'),
(74, 'Kota Sawahlunto'),
(75, 'Kota Solok'),
(76, 'Kabupaten Bengkalis'),
(77, 'Kabupaten Indragiri Hilir'),
(78, 'Kabupaten Indragiri Hulu'),
(79, 'Kabupaten Kampar'),
(80, 'Kabupaten Kuantan Singingi'),
(81, 'Kabupaten Pelalawan'),
(82, 'Kabupaten Rokan Hilir'),
(83, 'Kabupaten Rokan Hulu'),
(84, 'Kabupaten Siak'),
(85, 'Kabupaten Kepulauan Meranti'),
(86, 'Kota Dumai'),
(87, 'Kota Pekanbaru'),
(88, 'Kabupaten Bintan'),
(89, 'Kabupaten Karimun'),
(90, 'Kabupaten Kepulauan Anambas'),
(91, 'Kabupaten Lingga'),
(92, 'Kabupaten Natuna'),
(93, 'Kota Batam'),
(94, 'Kota Tanjung Pinang'),
(95, 'Kabupaten Batanghari'),
(96, 'Kabupaten Bungo'),
(97, 'Kabupaten Kerinci'),
(98, 'Kabupaten Merangin'),
(99, 'Kabupaten Muaro Jambi'),
(100, 'Kabupaten Sarolangun'),
(101, 'Kabupaten Tanjung Jabung Barat'),
(102, 'Kabupaten Tanjung Jabung Timur'),
(103, 'Kabupaten Tebo'),
(104, 'Kota Jambi'),
(105, 'Kota Sungai Penuh'),
(106, 'Kabupaten Bengkulu Selatan'),
(107, 'Kabupaten Bengkulu Tengah'),
(108, 'Kabupaten Bengkulu Utara'),
(109, 'Kabupaten Kaur'),
(110, 'Kabupaten Kepahiang'),
(111, 'Kabupaten Lebong'),
(112, 'Kabupaten Mukomuko'),
(113, 'Kabupaten Rejang Lebong'),
(114, 'Kabupaten Seluma'),
(115, 'Kota Bengkulu'),
(116, 'Kabupaten Banyuasin'),
(117, 'Kabupaten Empat Lawang'),
(118, 'Kabupaten Lahat'),
(119, 'Kabupaten Muara Enim'),
(120, 'Kabupaten Musi Banyuasin'),
(121, 'Kabupaten Musi Rawas'),
(122, 'Kabupaten Ogan Ilir'),
(123, 'Kabupaten Ogan Komering Ilir'),
(124, 'Kabupaten Ogan Komering Ulu'),
(125, 'Kabupaten Ogan Komering Ulu Selatan'),
(126, 'Kabupaten Ogan Komering Ulu Timur'),
(127, 'Kota Lubuklinggau'),
(128, 'Kota Pagar Alam'),
(129, 'Kota Palembang'),
(130, 'Kota Prabumulih'),
(131, 'Kabupaten Bangka'),
(132, 'Kabupaten Bangka Barat'),
(133, 'Kabupaten Bangka Selatan'),
(134, 'Kabupaten Bangka Tengah'),
(135, 'Kabupaten Belitung'),
(136, 'Kabupaten Belitung Timur'),
(137, 'Kota Pangkal Pinang'),
(138, 'Kabupaten Lampung Barat'),
(139, 'Kabupaten Lampung Selatan'),
(140, 'Kabupaten Lampung Tengah'),
(141, 'Kabupaten Lampung Timur'),
(142, 'Kabupaten Lampung Utara'),
(143, 'Kabupaten Mesuji'),
(144, 'Kabupaten Pesawaran'),
(145, 'Kabupaten Pringsewu'),
(146, 'Kabupaten Tanggamus'),
(147, 'Kabupaten Tulang Bawang'),
(148, 'Kabupaten Tulang Bawang Barat'),
(149, 'Kabupaten Way Kanan'),
(150, 'Kota Bandar Lampung'),
(151, 'Kota Metro'),
(152, 'Kabupaten Tangerang'),
(153, 'Kabupaten Serang'),
(154, 'Kabupaten Lebak'),
(155, 'Kabupaten Pandeglang'),
(156, 'Kota Tangerang'),
(157, 'Kota Serang'),
(158, 'Kota Cilegon'),
(159, 'Kota Tangerang Selatan'),
(160, 'Kabupaten Bandung'),
(161, 'Kabupaten Bandung Barat'),
(162, 'Kabupaten Bekasi'),
(163, 'Kabupaten Bogor'),
(164, 'Kabupaten Ciamis'),
(165, 'Kabupaten Cianjur'),
(166, 'Kabupaten Cirebon'),
(167, 'Kabupaten Garut'),
(168, 'Kabupaten Indramayu'),
(169, 'Kabupaten Karawang'),
(170, 'Kabupaten Kuningan'),
(171, 'Kabupaten Majalengka'),
(172, 'Kabupaten Purwakarta'),
(173, 'Kabupaten Subang'),
(174, 'Kabupaten Sukabumi'),
(175, 'Kabupaten Sumedang'),
(176, 'Kabupaten Tasikmalaya'),
(177, 'Kota Bandung'),
(178, 'Kota Banjar'),
(179, 'Kota Bekasi'),
(180, 'Kota Bogor'),
(181, 'Kota Cimahi'),
(182, 'Kota Cirebon'),
(183, 'Kota Depok'),
(184, 'Kota Sukabumi'),
(185, 'Kota Tasikmalaya'),
(186, 'Kabupaten Administrasi Kepulauan Seribu'),
(187, 'Kota Administrasi Jakarta Barat'),
(188, 'Kota Administrasi Jakarta Pusat'),
(189, 'Kota Administrasi Jakarta Selatan'),
(190, 'Kota Administrasi Jakarta Timur'),
(191, 'Kota Administrasi Jakarta Utara'),
(192, 'Kabupaten Banjarnegara'),
(193, 'Kabupaten Banyumas'),
(194, 'Kabupaten Batang'),
(195, 'Kabupaten Blora'),
(196, 'Kabupaten Boyolali'),
(197, 'Kabupaten Brebes'),
(198, 'Kabupaten Cilacap'),
(199, 'Kabupaten Demak'),
(200, 'Kabupaten Grobogan'),
(201, 'Kabupaten Jepara'),
(202, 'Kabupaten Karanganyar'),
(203, 'Kabupaten Kebumen'),
(204, 'Kabupaten Kendal'),
(205, 'Kabupaten Klaten'),
(206, 'Kabupaten Kudus'),
(207, 'Kabupaten Magelang'),
(208, 'Kabupaten Pati'),
(209, 'Kabupaten Pekalongan'),
(210, 'Kabupaten Pemalang'),
(211, 'Kabupaten Purbalingga'),
(212, 'Kabupaten Purworejo'),
(213, 'Kabupaten Rembang'),
(214, 'Kabupaten Semarang'),
(215, 'Kabupaten Sragen'),
(216, 'Kabupaten Sukoharjo'),
(217, 'Kabupaten Tegal'),
(218, 'Kabupaten Temanggung'),
(219, 'Kabupaten Wonogiri'),
(220, 'Kabupaten Wonosobo'),
(221, 'Kota Magelang'),
(222, 'Kota Pekalongan'),
(223, 'Kota Salatiga'),
(224, 'Kota Semarang'),
(225, 'Kota Surakarta'),
(226, 'Kota Tegal'),
(227, 'Kabupaten Bangkalan'),
(228, 'Kabupaten Banyuwangi'),
(229, 'Kabupaten Blitar'),
(230, 'Kabupaten Bojonegoro'),
(231, 'Kabupaten Bondowoso'),
(232, 'Kabupaten Gresik'),
(233, 'Kabupaten Jember'),
(234, 'Kabupaten Jombang'),
(235, 'Kabupaten Kediri'),
(236, 'Kabupaten Lamongan'),
(237, 'Kabupaten Lumajang'),
(238, 'Kabupaten Madiun'),
(239, 'Kabupaten Magetan'),
(240, 'Kabupaten Malang'),
(241, 'Kabupaten Mojokerto'),
(242, 'Kabupaten Nganjuk'),
(243, 'Kabupaten Ngawi'),
(244, 'Kabupaten Pacitan'),
(245, 'Kabupaten Pamekasan'),
(246, 'Kabupaten Pasuruan'),
(247, 'Kabupaten Ponorogo'),
(248, 'Kabupaten Probolinggo'),
(249, 'Kabupaten Sampang'),
(250, 'Kabupaten Sidoarjo'),
(251, 'Kabupaten Situbondo'),
(252, 'Kabupaten Sumenep'),
(253, 'Kabupaten Trenggalek'),
(254, 'Kabupaten Tuban'),
(255, 'Kabupaten Tulungagung'),
(256, 'Kota Batu'),
(257, 'Kota Blitar'),
(258, 'Kota Kediri'),
(259, 'Kota Madiun'),
(260, 'Kota Malang'),
(261, 'Kota Mojokerto'),
(262, 'Kota Pasuruan'),
(263, 'Kota Probolinggo'),
(264, 'Kota Surabaya'),
(265, 'Kabupaten Bantul'),
(266, 'Kabupaten Gunung Kidul'),
(267, 'Kabupaten Kulon Progo'),
(268, 'Kabupaten Sleman'),
(269, 'Kota Yogyakarta'),
(270, 'Kabupaten Badung'),
(271, 'Kabupaten Bangli'),
(272, 'Kabupaten Buleleng'),
(273, 'Kabupaten Gianyar'),
(274, 'Kabupaten Jembrana'),
(275, 'Kabupaten Karangasem'),
(276, 'Kabupaten Klungkung'),
(277, 'Kabupaten Tabanan'),
(278, 'Kota Denpasar'),
(279, 'Kabupaten Bima'),
(280, 'Kabupaten Dompu'),
(281, 'Kabupaten Lombok Barat'),
(282, 'Kabupaten Lombok Tengah'),
(283, 'Kabupaten Lombok Timur'),
(284, 'Kabupaten Lombok Utara'),
(285, 'Kabupaten Sumbawa'),
(286, 'Kabupaten Sumbawa Barat'),
(287, 'Kota Bima'),
(288, 'Kota Mataram'),
(289, 'Kabupaten Alor'),
(290, 'Kabupaten Belu'),
(291, 'Kabupaten Ende'),
(292, 'Kabupaten Flores Timur'),
(293, 'Kabupaten Kupang'),
(294, 'Kabupaten Lembata'),
(295, 'Kabupaten Manggarai'),
(296, 'Kabupaten Manggarai Barat'),
(297, 'Kabupaten Manggarai Timur'),
(298, 'Kabupaten Ngada'),
(299, 'Kabupaten Nagekeo'),
(300, 'Kabupaten Rote Ndao'),
(301, 'Kabupaten Sabu Raijua'),
(302, 'Kabupaten Sikka'),
(303, 'Kabupaten Sumba Barat'),
(304, 'Kabupaten Sumba Barat Daya'),
(305, 'Kabupaten Sumba Tengah'),
(306, 'Kabupaten Sumba Timur'),
(307, 'Kabupaten Timor Tengah Selatan'),
(308, 'Kabupaten Timor Tengah Utara'),
(309, 'Kota Kupang'),
(310, 'Kabupaten Bengkayang'),
(311, 'Kabupaten Kapuas Hulu'),
(312, 'Kabupaten Kayong Utara'),
(313, 'Kabupaten Ketapang'),
(314, 'Kabupaten Kubu Raya'),
(315, 'Kabupaten Landak'),
(316, 'Kabupaten Melawi'),
(317, 'Kabupaten Pontianak'),
(318, 'Kabupaten Sambas'),
(319, 'Kabupaten Sanggau'),
(320, 'Kabupaten Sekadau'),
(321, 'Kabupaten Sintang'),
(322, 'Kota Pontianak'),
(323, 'Kota Singkawang'),
(324, 'Kabupaten Balangan'),
(325, 'Kabupaten Banjar'),
(326, 'Kabupaten Barito Kuala'),
(327, 'Kabupaten Hulu Sungai Selatan'),
(328, 'Kabupaten Hulu Sungai Tengah'),
(329, 'Kabupaten Hulu Sungai Utara'),
(330, 'Kabupaten Kotabaru'),
(331, 'Kabupaten Tabalong'),
(332, 'Kabupaten Tanah Bumbu'),
(333, 'Kabupaten Tanah Laut'),
(334, 'Kabupaten Tapin'),
(335, 'Kota Banjarbaru'),
(336, 'Kota Banjarmasin'),
(337, 'Kabupaten Barito Selatan'),
(338, 'Kabupaten Barito Timur'),
(339, 'Kabupaten Barito Utara'),
(340, 'Kabupaten Gunung Mas'),
(341, 'Kabupaten Kapuas'),
(342, 'Kabupaten Katingan'),
(343, 'Kabupaten Kotawaringin Barat'),
(344, 'Kabupaten Kotawaringin Timur'),
(345, 'Kabupaten Lamandau'),
(346, 'Kabupaten Murung Raya'),
(347, 'Kabupaten Pulang Pisau'),
(348, 'Kabupaten Sukamara'),
(349, 'Kabupaten Seruyan'),
(350, 'Kota Palangka Raya'),
(351, 'Kabupaten Berau'),
(352, 'Kabupaten Bulungan'),
(353, 'Kabupaten Kutai Barat'),
(354, 'Kabupaten Kutai Kartanegara'),
(355, 'Kabupaten Kutai Timur'),
(356, 'Kabupaten Malinau'),
(357, 'Kabupaten Nunukan'),
(358, 'Kabupaten Paser'),
(359, 'Kabupaten Penajam Paser Utara'),
(360, 'Kabupaten Tana Tidung'),
(361, 'Kota Balikpapan'),
(362, 'Kota Bontang'),
(363, 'Kota Samarinda'),
(364, 'Kota Tarakan'),
(365, 'Kabupaten Mahakam Ulu'),
(366, 'Kabupaten Boalemo'),
(367, 'Kabupaten Bone Bolango'),
(368, 'Kabupaten Gorontalo'),
(369, 'Kabupaten Gorontalo Utara'),
(370, 'Kabupaten Pohuwato'),
(371, 'Kota Gorontalo'),
(372, 'Kabupaten Bantaeng'),
(373, 'Kabupaten Barru'),
(374, 'Kabupaten Bone'),
(375, 'Kabupaten Bulukumba'),
(376, 'Kabupaten Enrekang'),
(377, 'Kabupaten Gowa'),
(378, 'Kabupaten Jeneponto'),
(379, 'Kabupaten Kepulauan Selayar'),
(380, 'Kabupaten Luwu'),
(381, 'Kabupaten Luwu Timur'),
(382, 'Kabupaten Luwu Utara'),
(383, 'Kabupaten Maros'),
(384, 'Kabupaten Pangkajene dan Kepulauan'),
(385, 'Kabupaten Pinrang'),
(386, 'Kabupaten Sidenreng Rappang'),
(387, 'Kabupaten Sinjai'),
(388, 'Kabupaten Soppeng'),
(389, 'Kabupaten Takalar'),
(390, 'Kabupaten Tana Toraja'),
(391, 'Kabupaten Toraja Utara'),
(392, 'Kabupaten Wajo'),
(393, 'Kota Makassar'),
(394, 'Kota Palopo'),
(395, 'Kota Parepare'),
(396, 'Kabupaten Bombana'),
(397, 'Kabupaten Buton'),
(398, 'Kabupaten Buton Utara'),
(399, 'Kabupaten Kolaka'),
(400, 'Kabupaten Kolaka Utara'),
(401, 'Kabupaten Konawe'),
(402, 'Kabupaten Konawe Selatan'),
(403, 'Kabupaten Konawe Utara'),
(404, 'Kabupaten Muna'),
(405, 'Kabupaten Wakatobi'),
(406, 'Kota Bau-Bau'),
(407, 'Kota Kendari'),
(408, 'Kabupaten Banggai'),
(409, 'Kabupaten Banggai Kepulauan'),
(410, 'Kabupaten Buol'),
(411, 'Kabupaten Donggala'),
(412, 'Kabupaten Morowali'),
(413, 'Kabupaten Parigi Moutong'),
(414, 'Kabupaten Poso'),
(415, 'Kabupaten Tojo Una-Una'),
(416, 'Kabupaten Toli-Toli'),
(417, 'Kabupaten Sigi'),
(418, 'Kota Palu'),
(419, 'Kabupaten Bolaang Mongondow'),
(420, 'Kabupaten Bolaang Mongondow Selatan'),
(421, 'Kabupaten Bolaang Mongondow Timur'),
(422, 'Kabupaten Bolaang Mongondow Utara'),
(423, 'Kabupaten Kepulauan Sangihe'),
(424, 'Kabupaten Kepulauan Siau Tagulandang Biaro'),
(425, 'Kabupaten Kepulauan Talaud'),
(426, 'Kabupaten Minahasa'),
(427, 'Kabupaten Minahasa Selatan'),
(428, 'Kabupaten Minahasa Tenggara'),
(429, 'Kabupaten Minahasa Utara'),
(430, 'Kota Bitung'),
(431, 'Kota Kotamobagu'),
(432, 'Kota Manado'),
(433, 'Kota Tomohon'),
(434, 'Kabupaten Majene'),
(435, 'Kabupaten Mamasa'),
(436, 'Kabupaten Mamuju'),
(437, 'Kabupaten Mamuju Utara'),
(438, 'Kabupaten Polewali Mandar'),
(439, 'Kabupaten Buru'),
(440, 'Kabupaten Buru Selatan'),
(441, 'Kabupaten Kepulauan Aru'),
(442, 'Kabupaten Maluku Barat Daya'),
(443, 'Kabupaten Maluku Tengah'),
(444, 'Kabupaten Maluku Tenggara'),
(445, 'Kabupaten Maluku Tenggara Barat'),
(446, 'Kabupaten Seram Bagian Barat'),
(447, 'Kabupaten Seram Bagian Timur'),
(448, 'Kota Ambon'),
(449, 'Kota Tual'),
(450, 'Kabupaten Halmahera Barat'),
(451, 'Kabupaten Halmahera Tengah'),
(452, 'Kabupaten Halmahera Utara'),
(453, 'Kabupaten Halmahera Selatan'),
(454, 'Kabupaten Kepulauan Sula'),
(455, 'Kabupaten Halmahera Timur'),
(456, 'Kabupaten Pulau Morotai'),
(457, 'Kota Ternate'),
(458, 'Kota Tidore Kepulauan'),
(459, 'Kabupaten Asmat'),
(460, 'Kabupaten Biak Numfor'),
(461, 'Kabupaten Boven Digoel'),
(462, 'Kabupaten Deiyai'),
(463, 'Kabupaten Dogiyai'),
(464, 'Kabupaten Intan Jaya'),
(465, 'Kabupaten Jayapura'),
(466, 'Kabupaten Jayawijaya'),
(467, 'Kabupaten Keerom'),
(468, 'Kabupaten Kepulauan Yapen'),
(469, 'Kabupaten Lanny Jaya'),
(470, 'Kabupaten Mamberamo Raya'),
(471, 'Kabupaten Mamberamo Tengah'),
(472, 'Kabupaten Mappi'),
(473, 'Kabupaten Merauke'),
(474, 'Kabupaten Mimika'),
(475, 'Kabupaten Nabire'),
(476, 'Kabupaten Nduga'),
(477, 'Kabupaten Paniai'),
(478, 'Kabupaten Pegunungan Bintang'),
(479, 'Kabupaten Puncak'),
(480, 'Kabupaten Puncak Jaya'),
(481, 'Kabupaten Sarmi'),
(482, 'Kabupaten Supiori'),
(483, 'Kabupaten Tolikara'),
(484, 'Kabupaten Waropen'),
(485, 'Kabupaten Yahukimo'),
(486, 'Kabupaten Yalimo'),
(487, 'Kota Jayapura'),
(488, 'Kabupaten Fakfak'),
(489, 'Kabupaten Kaimana'),
(490, 'Kabupaten Manokwari'),
(491, 'Kabupaten Maybrat'),
(492, 'Kabupaten Raja Ampat'),
(493, 'Kabupaten Sorong'),
(494, 'Kabupaten Sorong Selatan'),
(495, 'Kabupaten Tambrauw'),
(496, 'Kabupaten Teluk Bintuni'),
(497, 'Kabupaten Teluk Wondama'),
(498, 'Kota Sorong');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` int(11) NOT NULL,
  `tgl_order` date NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah_ukuran_s` int(11) NOT NULL,
  `jumlah_ukuran_m` int(11) NOT NULL,
  `jumlah_ukuran_l` int(11) NOT NULL,
  `jumlah_ukuran_xl` int(11) NOT NULL,
  `jumlah_ukuran_xxl` int(11) NOT NULL,
  `design_order` text,
  `catatan` text NOT NULL,
  `status_order` int(11) DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `rate` int(1) DEFAULT NULL,
  `ulasan` text,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `tgl_order`, `id_pelanggan`, `id_produk`, `jumlah_ukuran_s`, `jumlah_ukuran_m`, `jumlah_ukuran_l`, `jumlah_ukuran_xl`, `jumlah_ukuran_xxl`, `design_order`, `catatan`, `status_order`, `id_pegawai`, `rate`, `ulasan`, `created_at`) VALUES
(4, '2022-04-21', 1, 2, 5, 5, 5, 5, 5, 'WhatsApp_Image_2022-01-12_at_18_59_35.jpeg', 'catatan', 4, 4, 3, 'ulasan tes', '2022-04-21 21:28:27'),
(5, '2022-04-21', 1, 2, 5, 4, 5, 5, 6, 'WhatsApp_Image_2022-01-12_at_18_59_35.jpeg', 'xxx', 0, 0, NULL, NULL, '2022-04-22 23:49:02'),
(6, '2022-05-29', 1, 3, 5, 6, 7, 3, 1, 'aj_(2).jpeg', 'tidak ada', 0, 10, NULL, NULL, '2022-05-29 21:13:32');

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
(4, 'tess', 'tess', 'Staff Marketing', 'tess', 'tess', '2022-12-31', 'Laki-laki', 'aj_(2)7.jpeg'),
(5, '123', 'tes cutting', 'Pegawai Cutting', 'tes', 'tes', '2022-04-21', 'Laki-laki', 'aj_(2).jpeg'),
(6, '123', 'tes pegawai jahit', 'Pegawai Jahit', 'bandun', 'bandung', '2022-04-22', 'Laki-laki', 'aj_(2)1.jpeg'),
(7, '123', 'tes pegawai qc', 'Pegawai QC', 'bandung', 'bandung', '2022-12-31', 'Laki-laki', 'aj_(2)2.jpeg'),
(8, '123', 'Pegawai Keuangan', 'Staff Keuangan', 'subang', 'subang', '2022-12-31', 'Laki-laki', 'aj_(2)3.jpeg'),
(9, '123', 'Pegawai Purchase', 'Staff Purchase', 'subang', 'subang', '2022-12-31', 'Laki-laki', 'aj_(2)4.jpeg'),
(10, '123', 'Kepala Produksi', 'Kepala Produksi', 'subang', 'subang', '2022-12-31', 'Laki-laki', 'aj_(2)5.jpeg'),
(11, '123', 'Kepala Marketing', 'Kepala Marketing', 'bandung', 'bandung', '2022-12-31', 'Laki-laki', 'aj_(2)6.jpeg'),
(12, '21413', 'Pagawai produksi', 'Produksi', 'Bandung', 'bandung', '2021-12-31', 'Laki-laki', 'aj_(2)6.jpeg');

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
(1, 4, 5, 7, 5000, 2000, '2022-04-23', 'tess', 'tess', 'tess', '2022-04-21 23:12:08'),
(2, 4, 12, 1, 2000, 50, '2022-04-23', '1', '1', '-', '2022-06-03 19:16:46'),
(3, 6, 12, 12, 5000, 0, '2022-04-23', '1', '1', '-', '2022-06-03 19:52:30');

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
(1, 4, 5, 4, 1000, 0, '2022-04-23', '12', '12', '2022-04-22 23:12:40'),
(2, 4, 12, 2, 5000, 0, '2022-04-23', '1', '1', '2022-06-03 19:17:22');

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
(1, 4, 5, 2, 10000, 0, '2022-04-23', '12', '12', '2022-04-22 23:19:21'),
(2, 4, 12, 3, 2000, 0, '2022-04-23', '1', '1', '2022-06-03 19:17:58');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(200) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `jenis_kelamin`, `no_telepon`, `alamat`, `id_kota`, `instansi`, `username`, `password`) VALUES
(1, 'Tes Pelanggan', 'Laki-laki', '089123123123', 'Bandung', 177, 'PT. XYZ', 'pelanggan', '$2y$10$5VifqomOAsoe39zJDc/GJefzvAwOmvdqMbDeNjocX0piQd5KDOKbS'),
(2, 'Tes Pelanggan 2', 'Laki-laki', '1234', 'tess', 177, 'tess', 'pelanggan2', '$2y$10$ANwufBlxYomzDffnLJvrlOJ7JJurP/7V7HRVR5iXtRtutwtWiawMy');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemasukan`
--

CREATE TABLE `tb_pemasukan` (
  `id_pemasukan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_jenis_pemasukan` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `referensi` varchar(100) NOT NULL,
  `jumlah` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemasukan`
--

INSERT INTO `tb_pemasukan` (`id_pemasukan`, `tanggal`, `id_jenis_pemasukan`, `keterangan`, `referensi`, `jumlah`) VALUES
(1, '2022-06-01', 1, 'Order 1', 'tes', 1200000),
(2, '2022-06-02', 1, 'Order 2', 'ref 2', 2500000),
(3, '2022-07-01', 1, '1', '1', 1),
(4, '2021-06-02', 1, '1', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengeluaran`
--

CREATE TABLE `tb_pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_jenis_pengeluaran` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `referensi` varchar(100) NOT NULL,
  `jumlah` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengeluaran`
--

INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `tanggal`, `id_jenis_pengeluaran`, `keterangan`, `referensi`, `jumlah`) VALUES
(1, '2022-06-02', 1, 'HPP Order 1', 'ref 1', 1000000),
(2, '2022-06-01', 1, 'HPP Order 2', 'Ref 2', 2000000),
(4, '2022-04-23', 2, 'Gaji Mingguan Produksi', '-', 134950),
(5, '2022-06-02', 2, 'Gaji Karyawan', '-', 5600000);

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
(2, 5, 1, '', '', 0, '2022-04-27 17:31:05'),
(3, 6, 0, NULL, NULL, 0, '2022-05-29 21:13:32');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `jenis_produk` varchar(200) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `bahan` varchar(200) NOT NULL,
  `foto_produk` text NOT NULL,
  `pnj_kain_s` double NOT NULL,
  `pnj_kain_m` double NOT NULL,
  `pnj_kain_l` double NOT NULL,
  `pnj_kain_xl` double NOT NULL,
  `pnj_kain_xxl` double NOT NULL,
  `harga_kain` double NOT NULL,
  `jml_kancing_s` double NOT NULL,
  `jml_kancing_m` double NOT NULL,
  `jml_kancing_l` double NOT NULL,
  `jml_kancing_xl` double NOT NULL,
  `jml_kancing_xxl` double NOT NULL,
  `harga_kancing` double NOT NULL,
  `pnj_resleting_s` double NOT NULL,
  `pnj_resleting_m` double NOT NULL,
  `pnj_resleting_l` double NOT NULL,
  `pnj_resleting_xl` double NOT NULL,
  `pnj_resleting_xxl` double NOT NULL,
  `harga_resleting` double NOT NULL,
  `jml_prepet_s` double NOT NULL,
  `jml_prepet_m` double NOT NULL,
  `jml_prepet_l` double NOT NULL,
  `jml_prepet_xl` double NOT NULL,
  `jml_prepet_xxl` double NOT NULL,
  `harga_prepet` double NOT NULL,
  `pnj_rib_s` double NOT NULL,
  `pnj_rib_m` double NOT NULL,
  `pnj_rib_l` double NOT NULL,
  `pnj_rib_xl` double NOT NULL,
  `pnj_rib_xxl` double NOT NULL,
  `harga_rib` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `jenis_produk`, `nama_produk`, `bahan`, `foto_produk`, `pnj_kain_s`, `pnj_kain_m`, `pnj_kain_l`, `pnj_kain_xl`, `pnj_kain_xxl`, `harga_kain`, `jml_kancing_s`, `jml_kancing_m`, `jml_kancing_l`, `jml_kancing_xl`, `jml_kancing_xxl`, `harga_kancing`, `pnj_resleting_s`, `pnj_resleting_m`, `pnj_resleting_l`, `pnj_resleting_xl`, `pnj_resleting_xxl`, `harga_resleting`, `jml_prepet_s`, `jml_prepet_m`, `jml_prepet_l`, `jml_prepet_xl`, `jml_prepet_xxl`, `harga_prepet`, `pnj_rib_s`, `pnj_rib_m`, `pnj_rib_l`, `pnj_rib_xl`, `pnj_rib_xxl`, `harga_rib`) VALUES
(2, 'jenis 1', 'produk 1', 'bahan 1', 'aj_(2).jpeg', 0.9, 0.93, 0, 0, 0, 20000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 'Kaos Combed 305', 'Kaos Combed 305', 'Combed 305', 'aj_(2)1.jpeg', 0.9, 0.93, 0.97, 1, 1.05, 20000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.5, 0.53, 0.56, 0.6, 0.63, 10000);

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
(3, 5, 1, '', '', 0, '2022-04-27 17:30:42'),
(4, 6, 0, NULL, NULL, 0, '2022-05-29 21:13:32');

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
(2, 5, 1, '', '', 0, '2022-04-27 17:31:01'),
(3, 6, 0, NULL, NULL, 0, '2022-05-29 21:13:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_agenda`
--
ALTER TABLE `tb_agenda`
  ADD PRIMARY KEY (`id_agenda`);

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
-- Indexes for table `tb_detail_agenda`
--
ALTER TABLE `tb_detail_agenda`
  ADD PRIMARY KEY (`id_detail_agenda`);

--
-- Indexes for table `tb_detail_gaji`
--
ALTER TABLE `tb_detail_gaji`
  ADD PRIMARY KEY (`id_detail_gaji`);

--
-- Indexes for table `tb_detail_gaji_produksi`
--
ALTER TABLE `tb_detail_gaji_produksi`
  ADD PRIMARY KEY (`id_detail_gaji_produksi`);

--
-- Indexes for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `tb_gaji_produksi`
--
ALTER TABLE `tb_gaji_produksi`
  ADD PRIMARY KEY (`id_gaji_produksi`);

--
-- Indexes for table `tb_jahit`
--
ALTER TABLE `tb_jahit`
  ADD PRIMARY KEY (`id_jahit`);

--
-- Indexes for table `tb_jenis_pemasukan`
--
ALTER TABLE `tb_jenis_pemasukan`
  ADD PRIMARY KEY (`id_jenis_pemasukan`);

--
-- Indexes for table `tb_jenis_pengeluaran`
--
ALTER TABLE `tb_jenis_pengeluaran`
  ADD PRIMARY KEY (`id_jenis_pengeluaran`);

--
-- Indexes for table `tb_keuangan`
--
ALTER TABLE `tb_keuangan`
  ADD PRIMARY KEY (`id_keuangan`);

--
-- Indexes for table `tb_kota`
--
ALTER TABLE `tb_kota`
  ADD PRIMARY KEY (`id_kota`);

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
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tb_pemasukan`
--
ALTER TABLE `tb_pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`);

--
-- Indexes for table `tb_pengeluaran`
--
ALTER TABLE `tb_pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

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
-- AUTO_INCREMENT for table `tb_agenda`
--
ALTER TABLE `tb_agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_bordir`
--
ALTER TABLE `tb_bordir`
  MODIFY `id_bordir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_cutting`
--
ALTER TABLE `tb_cutting`
  MODIFY `id_cutting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_detail_agenda`
--
ALTER TABLE `tb_detail_agenda`
  MODIFY `id_detail_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_detail_gaji`
--
ALTER TABLE `tb_detail_gaji`
  MODIFY `id_detail_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_detail_gaji_produksi`
--
ALTER TABLE `tb_detail_gaji_produksi`
  MODIFY `id_detail_gaji_produksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_gaji_produksi`
--
ALTER TABLE `tb_gaji_produksi`
  MODIFY `id_gaji_produksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_jahit`
--
ALTER TABLE `tb_jahit`
  MODIFY `id_jahit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_jenis_pemasukan`
--
ALTER TABLE `tb_jenis_pemasukan`
  MODIFY `id_jenis_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_jenis_pengeluaran`
--
ALTER TABLE `tb_jenis_pengeluaran`
  MODIFY `id_jenis_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_keuangan`
--
ALTER TABLE `tb_keuangan`
  MODIFY `id_keuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_kota`
--
ALTER TABLE `tb_kota`
  MODIFY `id_kota` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=499;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_pegawai_cutting`
--
ALTER TABLE `tb_pegawai_cutting`
  MODIFY `id_pegawai_cutting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pegawai_jahit`
--
ALTER TABLE `tb_pegawai_jahit`
  MODIFY `id_pegawai_jahit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pegawai_qc`
--
ALTER TABLE `tb_pegawai_qc`
  MODIFY `id_pegawai_qc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pemasukan`
--
ALTER TABLE `tb_pemasukan`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pengeluaran`
--
ALTER TABLE `tb_pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pengiriman`
--
ALTER TABLE `tb_pengiriman`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_purchase`
--
ALTER TABLE `tb_purchase`
  MODIFY `id_purchase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_qc`
--
ALTER TABLE `tb_qc`
  MODIFY `id_qc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
