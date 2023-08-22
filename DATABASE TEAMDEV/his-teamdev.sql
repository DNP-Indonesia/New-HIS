-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 04:40 AM
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
-- Database: `his-teamdev-backup-3`
--

-- --------------------------------------------------------

--
-- Table structure for table `his_departemen`
--

CREATE TABLE `his_departemen` (
  `id_dep` int(11) NOT NULL,
  `nama_dep` varchar(50) NOT NULL,
  `id_divisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `his_departemen`
--

INSERT INTO `his_departemen` (`id_dep`, `nama_dep`, `id_divisi`) VALUES
(1, 'KR-B', 1),
(2, 'KR-D', 1),
(3, 'PG-A', 3),
(4, 'ADP', 2),
(5, 'PG-B', 3),
(9, 'Departemen Baru', 6),
(10, 'Dep Offset', 2),
(11, 'Personalia', 7),
(12, 'Training', 7),
(13, 'HSE', 7),
(14, 'Generals Affairs', 7);

-- --------------------------------------------------------

--
-- Table structure for table `his_divisi`
--

CREATE TABLE `his_divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `his_divisi`
--

INSERT INTO `his_divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'KR_Gravure'),
(2, 'Offset'),
(3, 'PG_Gravure'),
(6, 'Divisi Baru Banget'),
(7, 'HRCA');

-- --------------------------------------------------------

--
-- Table structure for table `his_golongan`
--

CREATE TABLE `his_golongan` (
  `id_golongan` int(11) NOT NULL,
  `nama_golongan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `his_golongan`
--

INSERT INTO `his_golongan` (`id_golongan`, `nama_golongan`) VALUES
(1, 'Employees'),
(2, 'Junior Staff'),
(3, 'Middle Staff'),
(4, 'G-Class'),
(7, 'Golongan Baru Edit');

-- --------------------------------------------------------

--
-- Table structure for table `his_jabatan`
--

CREATE TABLE `his_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `his_jabatan`
--

INSERT INTO `his_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Ass. Division Manager'),
(2, 'Department Manager'),
(3, 'Division Manager'),
(4, 'Division Manager (Senior Staff)'),
(5, 'Group Coordinator'),
(6, 'Group Coordinator (Junior Staff)'),
(7, 'Group Leader'),
(8, 'Junior Director'),
(9, 'Managerial Staff'),
(10, 'Section Chief'),
(11, 'Tanpa Jabatan'),
(12, 'Unit Leader A'),
(13, 'Unit Leader A (Junior Staff)'),
(14, 'Unit Leader B'),
(17, 'Jabatan Baru Edit');

-- --------------------------------------------------------

--
-- Table structure for table `his_karyawan`
--

CREATE TABLE `his_karyawan` (
  `spysiid` varchar(12) NOT NULL,
  `nik` varchar(5) NOT NULL,
  `nik_training` varchar(10) DEFAULT NULL,
  `nik_kontrak` varchar(10) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `id_section` int(11) NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_shift` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `pendidikan` varchar(10) NOT NULL,
  `keterangan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `his_karyawan`
--

INSERT INTO `his_karyawan` (`spysiid`, `nik`, `nik_training`, `nik_kontrak`, `nama`, `id_section`, `id_golongan`, `id_jabatan`, `id_shift`, `tgl_masuk`, `tgl_lahir`, `gender`, `pendidikan`, `keterangan`) VALUES
('23050537', '0537', '', NULL, 'ENDANG PURWANTO', 1, 2, 11, 4, '0000-00-00', '1980-04-20', '', '', 'Aktif'),
('23050634', '0634', '', NULL, 'IMAM BASUKI BIN MAHMUDAR', 2, 2, 11, 15, '0000-00-00', '1985-06-19', '', '', 'Aktif'),
('23050661', '0661', '', NULL, 'MATALIH SONYY', 3, 2, 7, 18, '0000-00-00', '1990-02-16', 'LAKI-LAKI', 'D3', 'Aktif'),
('23050716', '0716', '', NULL, 'RENNA VIDHIYAPRANA', 4, 2, 7, 15, '0000-00-00', '1979-10-01', '', '', 'Aktif'),
('23050721', '0721', '', NULL, 'RUBADIYANTO', 5, 2, 7, 7, '0000-00-00', '1987-09-01', '', '', 'Aktif'),
('23050749', '0749', '', NULL, 'OBING SOBIR', 6, 2, 7, 6, '0000-00-00', '1979-09-07', '', '', 'Aktif'),
('23050773', '0773', '', NULL, 'SRIYADI SANI', 3, 1, 11, 18, '0000-00-00', '1995-09-09', '', '', 'Pensiun'),
('23050777', '0777', '', NULL, 'FRANS HOMBAR.M.H.', 7, 2, 12, 33, '0000-00-00', '1992-09-08', '', '', 'Aktif'),
('23050780', '0780', '', NULL, 'ANDHON MURDIEANTO', 1, 2, 5, 15, '0000-00-00', '1986-09-08', '', '', 'Aktif'),
('23050793', '0793', '', NULL, 'RUDI SUCAHYO', 8, 2, 5, 15, '0000-00-00', '1989-09-18', '', '', 'Aktif'),
('23051110', '1110', '', NULL, 'Karyawan Baru Banget', 8, 1, 11, 15, '2022-05-06', '1980-01-01', 'LAKI-LAKI', 'S1', 'Meninggal Dunia'),
('23051111', '1111', '', NULL, 'Gilang Dirga', 8, 4, 5, 15, '2022-05-06', '2022-05-01', 'LAKI-LAKI', 'S2', 'Pensiun'),
('23051210', '1210', '', NULL, 'Aurel', 1, 2, 4, 3, '2022-05-07', '2022-05-03', 'PEREMPUAN', 'S1', 'Pensiun'),
('23058001', '8001', NULL, NULL, 'Mariani', 13, 2, 13, 15, '2023-05-01', '2023-04-01', 'PEREMPUAN', 'S1', 'Aktif'),
('23058002', '8002', NULL, NULL, 'Dewi Kusuma', 14, 2, 11, 15, '2023-05-02', '2023-05-01', 'PEREMPUAN', 'S1', 'Aktif'),
('23058003', '8003', NULL, NULL, 'Yogi Sumbono', 13, 4, 2, 15, '2023-05-02', '2023-05-01', 'LAKI_LAKI', 'S1', 'Aktif'),
('23058004', '8004', NULL, NULL, 'Indra Gunawan', 14, 4, 2, 15, '2023-05-02', '2023-05-01', 'LAKI-LAKI', 'S1', 'Aktif'),
('23058005', '8005', NULL, NULL, 'Sarwinie', 16, 2, 11, 15, '2023-06-15', '2023-06-20', 'Wanita', 'S Teh', 'Aktif'),
('23058006', '8006', NULL, NULL, 'MM Ari Retnowati', 16, 4, 2, 15, '2023-06-05', '2023-06-20', 'Wanita', 'S Buah', 'Aktif'),
('23058007', '8007', NULL, NULL, 'Dmitry', 15, 4, 2, 15, '2023-06-15', '2023-06-12', 'Pria', 'S Mambo', 'Aktif'),
('23058008', '8008', NULL, NULL, 'Evie', 15, 2, 2, 15, '2023-06-29', '2023-06-05', 'Wanita', 'S Krim', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `his_section`
--

CREATE TABLE `his_section` (
  `id_section` int(11) NOT NULL,
  `nama_section` varchar(50) NOT NULL,
  `id_dep` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `his_section`
--

INSERT INTO `his_section` (`id_section`, `nama_section`, `id_dep`) VALUES
(1, 'PG-B_Bobbin Cutting', 5),
(2, 'PG-B_Preparation', 5),
(3, 'KR-B_Finishing', 1),
(4, 'PG-A_GCM', 3),
(5, 'PG-A_Printing', 3),
(6, 'KR-D_Extruder Coating', 2),
(7, 'ADP-Finishing Process', 4),
(8, 'PG-B_Lamination', 5),
(12, 'Section 01', 1),
(13, 'Personalia 1', 11),
(14, 'Training 1', 12),
(15, 'HSE ', 13),
(16, 'GA Legal', 14);

-- --------------------------------------------------------

--
-- Table structure for table `his_shift`
--

CREATE TABLE `his_shift` (
  `id_shift` int(11) NOT NULL,
  `nama_shift` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `his_shift`
--

INSERT INTO `his_shift` (`id_shift`, `nama_shift`) VALUES
(1, '33A'),
(2, '33B'),
(3, '33C'),
(4, '34A'),
(5, '34B'),
(6, '34C'),
(7, '34D'),
(8, '4SA'),
(9, '4SB'),
(10, '4SC'),
(11, '4SD'),
(12, 'AADP2'),
(13, 'BADP2'),
(14, 'NKOT'),
(15, 'NON'),
(16, 'NSA'),
(17, 'NSD'),
(18, 'NSK'),
(21, 'SHIFT New');

-- --------------------------------------------------------

--
-- Table structure for table `sdr_barang`
--

CREATE TABLE `sdr_barang` (
  `id_barang` int(11) NOT NULL,
  `barang` varchar(50) NOT NULL,
  `brand` varchar(500) NOT NULL,
  `type` varchar(500) NOT NULL,
  `ukuran` varchar(500) NOT NULL,
  `satuan` varchar(500) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `stok` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sdr_barang`
--

INSERT INTO `sdr_barang` (`id_barang`, `barang`, `brand`, `type`, `ukuran`, `satuan`, `id_jenis`, `stok`) VALUES
(47, 'Sapu', 'Tokai', '-', '-', 'Pcs', 32, 0),
(48, 'Speaker Bluethoot', 'Simbadda', 'DD32', '-', 'Pcs', 33, 0),
(49, 'Staples', 'Kenko', '-', 'Kecil', 'Pcs', 34, 0),
(50, 'Piring', 'Random', '-', 'Sedang', 'Pcs', 35, 0),
(51, 'Vakum Cleaner', 'Happy Call', '-', 'Kecil', 'Pcs', 32, 0),
(52, 'Garpu', 'Random', 'Random', 'Standard', 'Lusin', 35, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sdr_consumption`
--

CREATE TABLE `sdr_consumption` (
  `id_consumption` int(11) NOT NULL,
  `faktur` varchar(30) NOT NULL,
  `nama_peminta` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sdr_consumption_detail`
--

CREATE TABLE `sdr_consumption_detail` (
  `faktur` varchar(30) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `fakest` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `sdr_consumption_detail`
--
DELIMITER $$
CREATE TRIGGER `kurangi estimasi` AFTER INSERT ON `sdr_consumption_detail` FOR EACH ROW BEGIN
   UPDATE sdr_estimasi_detail SET jumlah = jumlah - NEW.jumlah
   WHERE id_barang = NEW.id_barang
   AND faktur = NEW.fakest;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sdr_consumption_keranjang`
--

CREATE TABLE `sdr_consumption_keranjang` (
  `id_barang` int(11) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `id_user` int(11) NOT NULL,
  `fakest` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sdr_estimasi`
--

CREATE TABLE `sdr_estimasi` (
  `id_estimasi` int(11) NOT NULL,
  `faktur` varchar(30) NOT NULL,
  `nama_pembuat` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `alasan_ditolak` varchar(500) NOT NULL,
  `penyetuju` varchar(30) NOT NULL,
  `tanggal_setuju` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sdr_estimasi_detail`
--

CREATE TABLE `sdr_estimasi_detail` (
  `id_detail_estimasi` int(11) NOT NULL,
  `faktur` varchar(30) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `keterangan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sdr_estimasi_keranjang`
--

CREATE TABLE `sdr_estimasi_keranjang` (
  `id_barang` int(11) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `id_user` int(11) NOT NULL,
  `keterangan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sdr_jenis`
--

CREATE TABLE `sdr_jenis` (
  `id_jenis` int(11) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sdr_jenis`
--

INSERT INTO `sdr_jenis` (`id_jenis`, `jenis`, `id_kategori`) VALUES
(32, 'Kebersihan', 1),
(33, 'Elektronik', 1),
(34, 'ATK', 1),
(35, 'Alat Makan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sdr_kategori`
--

CREATE TABLE `sdr_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sdr_kategori`
--

INSERT INTO `sdr_kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Sundries'),
(2, 'Consumption');

-- --------------------------------------------------------

--
-- Table structure for table `sdr_penerimaan`
--

CREATE TABLE `sdr_penerimaan` (
  `id_penerimaan` int(11) NOT NULL,
  `suratjalan` varchar(50) NOT NULL,
  `fakturpurchase` varchar(50) NOT NULL,
  `keterangan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sdr_penerimaan`
--

INSERT INTO `sdr_penerimaan` (`id_penerimaan`, `suratjalan`, `fakturpurchase`, `keterangan`) VALUES
(3, '08908', 'PCH2306.0001', 'wrcwtwt\r\n                                    ');

-- --------------------------------------------------------

--
-- Table structure for table `sdr_penerimaan_detail`
--

CREATE TABLE `sdr_penerimaan_detail` (
  `id_detail_penerimaan` int(11) NOT NULL,
  `suratjalan` varchar(50) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sdr_purchase`
--

CREATE TABLE `sdr_purchase` (
  `id_purchase` int(11) NOT NULL,
  `faktur` varchar(30) NOT NULL,
  `nama_peminta` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jamdibuat` time NOT NULL,
  `no_po` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sdr_purchase`
--

INSERT INTO `sdr_purchase` (`id_purchase`, `faktur`, `nama_peminta`, `id_user`, `tanggal`, `jamdibuat`, `no_po`) VALUES
(43, 'PCH2306.0001', 'Sarwinie', 20, '2023-06-14', '09:53:00', ''),
(44, 'PCH2306.0002', 'Sarwinie', 20, '2023-06-14', '09:53:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `sdr_purchase_detail`
--

CREATE TABLE `sdr_purchase_detail` (
  `id_purchase_detail` int(11) NOT NULL,
  `faktur` varchar(30) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` varchar(3) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `faktursundries` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sdr_purchase_detail`
--

INSERT INTO `sdr_purchase_detail` (`id_purchase_detail`, `faktur`, `id_barang`, `jumlah`, `keterangan`, `faktursundries`) VALUES
(10, 'PCH2306.0001', 48, '4', '', 'RS2306.0001'),
(11, 'PCH2306.0001', 48, '3', '', 'RS2306.0002'),
(12, 'PCH2306.0002', 49, '2', '', 'RS2306.0001'),
(13, 'PCH2306.0002', 50, '1', '', 'RS2306.0002');

-- --------------------------------------------------------

--
-- Table structure for table `sdr_purchase_keranjang`
--

CREATE TABLE `sdr_purchase_keranjang` (
  `id_keranjang_purchase` int(11) NOT NULL,
  `faktursundries` varchar(30) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` varchar(2) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sdr_request_sundries`
--

CREATE TABLE `sdr_request_sundries` (
  `id_request_sundries` int(11) NOT NULL,
  `faktur` varchar(30) NOT NULL,
  `nama_peminta` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `penyetuju1` varchar(30) NOT NULL,
  `tanggal_setuju1` date NOT NULL,
  `jamdibuat` time NOT NULL,
  `jamsetuju1` time NOT NULL,
  `tanggal_setuju2` date NOT NULL,
  `jamsetuju2` time NOT NULL,
  `penyetuju2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sdr_request_sundries`
--

INSERT INTO `sdr_request_sundries` (`id_request_sundries`, `faktur`, `nama_peminta`, `id_user`, `tanggal`, `status`, `penyetuju1`, `tanggal_setuju1`, `jamdibuat`, `jamsetuju1`, `tanggal_setuju2`, `jamsetuju2`, `penyetuju2`) VALUES
(172, 'RS2306.0001', 'Dewi Kusuma', 18, '2023-06-14', 'Diproses', 'Indra Gunawan', '2023-06-14', '09:17:00', '09:44:00', '2023-06-14', '09:44:00', 'MM Ari Retnowati'),
(173, 'RS2306.0002', 'Evie', 22, '2023-06-14', 'Diproses', 'Dmitry', '2023-06-14', '09:43:00', '09:44:00', '2023-06-14', '09:44:00', 'MM Ari Retnowati');

-- --------------------------------------------------------

--
-- Table structure for table `sdr_request_sundries_detail`
--

CREATE TABLE `sdr_request_sundries_detail` (
  `id_detail_sundries` int(11) NOT NULL,
  `faktur` varchar(30) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `statuskeranjang` varchar(10) NOT NULL,
  `barangready` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sdr_request_sundries_detail`
--

INSERT INTO `sdr_request_sundries_detail` (`id_detail_sundries`, `faktur`, `id_barang`, `jumlah`, `keterangan`, `statuskeranjang`, `barangready`) VALUES
(192, 'RS2306.0001', 48, 4, '', 'ya', 'tidak'),
(193, 'RS2306.0001', 49, 2, '', 'ya', 'tidak'),
(194, 'RS2306.0002', 48, 3, '', 'ya', 'tidak'),
(195, 'RS2306.0002', 50, 1, '', 'ya', 'tidak');

-- --------------------------------------------------------

--
-- Table structure for table `sdr_request_sundries_keranjang`
--

CREATE TABLE `sdr_request_sundries_keranjang` (
  `id_barang` int(11) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `id_user` int(11) NOT NULL,
  `keterangan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sdr_tolak_sundries`
--

CREATE TABLE `sdr_tolak_sundries` (
  `id_tolak` int(11) NOT NULL,
  `faktur` varchar(30) NOT NULL,
  `alasan_tolak` varchar(500) NOT NULL,
  `tanggal_tolak` date NOT NULL,
  `jamtolak` time NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_section` int(11) NOT NULL,
  `spysiid` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `role`, `nama`, `id_section`, `spysiid`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin_medical', 'Karya Bangun', 1, ''),
(2, 'maria', '263bce650e68ab4e23f28263760b9fa5', 'medical_1', 'Maria T', 2, ''),
(3, 'asep', 'dc855efb0dc7476760afaa1b281665f1', 'medical_2', 'Asep Chandra', 3, ''),
(4, 'uli', 'dd55cec2ce59aca4e6647dcfbc90dc27', 'medical_1', 'Uli', 4, ''),
(5, 'rosmaleni', 'e949905fa109f62a12272f6dcdd646e8', 'medical_2', 'Rosmaleni', 5, ''),
(6, 'budhi', 'ce3d5988b3ccf143422ec0982d973b6b', 'tk_1', 'Budhi', 6, ''),
(7, 'suus', 'c7b8159d76a074ca5aaea8338301f78f', 'super_user', 'Vidi', 7, ''),
(8, 'winie', '191f477e325cf6851ad7e07893260bda', 'super_user', 'Sarwini', 8, ''),
(9, 'roihan', 'd54d1702ad0f8326224b817c796763c9', 'sdr_Admin Bagian', 'Roihan Ghozy Islami', 1, ''),
(10, 'bobi', '51e4a5611b485ee7d5dcd421c092563b', 'super_user', 'Bobi Undara', 3, ''),
(11, 'wanto', 'dc987bf874d0732922dcfae173171f64', 'sdr_Kepala Bagian', 'Wanto Mujarab', 1, ''),
(12, 'wakay', '58bdf5f9c4d91bac1533c1a6f1e6727f', 'sdr_Admin Bagian', 'Wahyu Wakay', 5, ''),
(13, 'Setiawan', '01ccce480c60fcdb67b54f4509ffdb56', 'sdr_Kepala Bagian', 'Setiawan Awan', 5, ''),
(14, 'yeni', '0fc37dce7e27a505363a2586f4483b92', 'sdr_Admin Gudang', 'Yeni Safitri', 1, ''),
(15, 'neta', 'ff97833f20034f1f3f4b1c4c71d3ed24', 'sdr_Kepala Gudang', 'Arneta Mitahiya', 1, ''),
(17, 'indra', 'e24f6e3ce19ee0728ff1c443e4ff488d', 'sdr_Kepala Bagian', 'Indra Gunawan', 14, '23058004'),
(18, 'dewi', 'ed1d859c50262701d92e5cbf39652792', 'sdr_Admin Bagian', 'Dewi Kusuma', 14, '23058002'),
(19, 'yogi', '938e14c074c45c62eb15cc05a6f36d79', 'sdr_Kepala Bagian', 'Yogi Sumbono', 13, '23058003'),
(20, 'winiee', '191f477e325cf6851ad7e07893260bda', 'sdr_Admin Gudang', 'Sarwinie', 16, '23058005'),
(21, 'ari', 'fc292bd7df071858c2d0f955545673c1', 'sdr_Kepala Gudang', 'MM Ari Retnowati', 16, '23058006'),
(22, 'evie', '54c7925aad85a55aa7517905a588fef9', 'sdr_Admin Bagian', 'Evie', 15, '23058008'),
(23, 'try', '080f651e3fcca17df3a47c2cecfcb880', 'sdr_Kepala Bagian', 'Dmitry', 15, '23058007'),
(24, 'ani', '29d1e2357d7c14db51e885053a58ec67', 'sdr_Admin Bagian', 'Mariani', 13, '23058001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `his_departemen`
--
ALTER TABLE `his_departemen`
  ADD PRIMARY KEY (`id_dep`);

--
-- Indexes for table `his_divisi`
--
ALTER TABLE `his_divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `his_golongan`
--
ALTER TABLE `his_golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `his_jabatan`
--
ALTER TABLE `his_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `his_karyawan`
--
ALTER TABLE `his_karyawan`
  ADD PRIMARY KEY (`spysiid`);

--
-- Indexes for table `his_section`
--
ALTER TABLE `his_section`
  ADD PRIMARY KEY (`id_section`);

--
-- Indexes for table `his_shift`
--
ALTER TABLE `his_shift`
  ADD PRIMARY KEY (`id_shift`);

--
-- Indexes for table `sdr_barang`
--
ALTER TABLE `sdr_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `sdr_consumption`
--
ALTER TABLE `sdr_consumption`
  ADD PRIMARY KEY (`id_consumption`);

--
-- Indexes for table `sdr_estimasi`
--
ALTER TABLE `sdr_estimasi`
  ADD PRIMARY KEY (`id_estimasi`);

--
-- Indexes for table `sdr_estimasi_detail`
--
ALTER TABLE `sdr_estimasi_detail`
  ADD PRIMARY KEY (`id_detail_estimasi`);

--
-- Indexes for table `sdr_jenis`
--
ALTER TABLE `sdr_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `sdr_kategori`
--
ALTER TABLE `sdr_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `sdr_penerimaan`
--
ALTER TABLE `sdr_penerimaan`
  ADD PRIMARY KEY (`id_penerimaan`);

--
-- Indexes for table `sdr_penerimaan_detail`
--
ALTER TABLE `sdr_penerimaan_detail`
  ADD PRIMARY KEY (`id_detail_penerimaan`);

--
-- Indexes for table `sdr_purchase`
--
ALTER TABLE `sdr_purchase`
  ADD PRIMARY KEY (`id_purchase`);

--
-- Indexes for table `sdr_purchase_detail`
--
ALTER TABLE `sdr_purchase_detail`
  ADD PRIMARY KEY (`id_purchase_detail`);

--
-- Indexes for table `sdr_purchase_keranjang`
--
ALTER TABLE `sdr_purchase_keranjang`
  ADD PRIMARY KEY (`id_keranjang_purchase`);

--
-- Indexes for table `sdr_request_sundries`
--
ALTER TABLE `sdr_request_sundries`
  ADD PRIMARY KEY (`id_request_sundries`);

--
-- Indexes for table `sdr_request_sundries_detail`
--
ALTER TABLE `sdr_request_sundries_detail`
  ADD PRIMARY KEY (`id_detail_sundries`);

--
-- Indexes for table `sdr_tolak_sundries`
--
ALTER TABLE `sdr_tolak_sundries`
  ADD PRIMARY KEY (`id_tolak`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `his_departemen`
--
ALTER TABLE `his_departemen`
  MODIFY `id_dep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `his_divisi`
--
ALTER TABLE `his_divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `his_golongan`
--
ALTER TABLE `his_golongan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `his_jabatan`
--
ALTER TABLE `his_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `his_section`
--
ALTER TABLE `his_section`
  MODIFY `id_section` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `his_shift`
--
ALTER TABLE `his_shift`
  MODIFY `id_shift` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `sdr_barang`
--
ALTER TABLE `sdr_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `sdr_consumption`
--
ALTER TABLE `sdr_consumption`
  MODIFY `id_consumption` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sdr_estimasi`
--
ALTER TABLE `sdr_estimasi`
  MODIFY `id_estimasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sdr_estimasi_detail`
--
ALTER TABLE `sdr_estimasi_detail`
  MODIFY `id_detail_estimasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sdr_jenis`
--
ALTER TABLE `sdr_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `sdr_kategori`
--
ALTER TABLE `sdr_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sdr_penerimaan`
--
ALTER TABLE `sdr_penerimaan`
  MODIFY `id_penerimaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sdr_penerimaan_detail`
--
ALTER TABLE `sdr_penerimaan_detail`
  MODIFY `id_detail_penerimaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sdr_purchase`
--
ALTER TABLE `sdr_purchase`
  MODIFY `id_purchase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `sdr_purchase_detail`
--
ALTER TABLE `sdr_purchase_detail`
  MODIFY `id_purchase_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sdr_purchase_keranjang`
--
ALTER TABLE `sdr_purchase_keranjang`
  MODIFY `id_keranjang_purchase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `sdr_request_sundries`
--
ALTER TABLE `sdr_request_sundries`
  MODIFY `id_request_sundries` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `sdr_request_sundries_detail`
--
ALTER TABLE `sdr_request_sundries_detail`
  MODIFY `id_detail_sundries` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `sdr_tolak_sundries`
--
ALTER TABLE `sdr_tolak_sundries`
  MODIFY `id_tolak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
