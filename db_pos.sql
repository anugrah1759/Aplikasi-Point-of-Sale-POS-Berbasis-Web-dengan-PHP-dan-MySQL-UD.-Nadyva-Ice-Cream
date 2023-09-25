-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 14, 2019 at 01:22 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `id_karyawan`) VALUES
(1, 'RAKHMAT', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', 2),
(2, 'DEVITHA', '37ddea46f407213ee351abce83ec0e72dd1d79bc', 3),
(3, 'ADMIN', 'e99c9f59aba831a3e5d010836f94fbf76b81a065', 4),
(4, 'KASIR', '0957521387547509254d079f36ee35a389ee80a6', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barcode` varchar(20) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `keuntungan` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `kode_barcode`, `nama_barang`, `stok`, `satuan`, `harga_jual`, `harga_beli`, `keuntungan`, `id_kategori`) VALUES
(2, '8991002103221', 'Kopi Good Day', 0, 'Dus', 7000, 6000, 1000, 3),
(18, '8996006858160', 'Fruit Tea', 121, 'Pcs', 4000, 3000, 1000, 3),
(19, '9090909090', 'Fanta Jeruk', 40, 'Pcs', 6500, 5000, 500, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Administrator'),
(2, 'Kasir');

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `status` enum('Belum Aktif','Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `nama`, `alamat`, `telepon`, `id_jabatan`, `status`) VALUES
(4, 'admin', 'admin', '08989898989', 1, 'Aktif'),
(5, 'kasir', 'kasir', '08111111111', 2, 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama`, `deskripsi`, `create_at`, `update_at`) VALUES
(1, 'Sabun', 'sabun mandi, sabun cuci', '2018-12-24 04:22:12', '2018-12-24 07:45:39'),
(2, 'Makanan', 'makanan', '2018-12-24 04:10:29', '2018-12-24 07:45:57'),
(3, 'Minuman', 'Botol, Kaleng, Dll', '2018-12-24 04:54:19', '2018-12-24 07:45:02');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_telepon`) VALUES
(1, 'Jarwo', 'Kampung Melayu', '089797969254'),
(8, 'Hayati', 'Cemara Raya No 12', '082147483647');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `kode_pembelian` varchar(20) NOT NULL,
  `kode_barcode` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `id_supplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`id_pembelian`, `kode_pembelian`, `kode_barcode`, `jumlah`, `total`, `tgl_pembelian`, `id_supplier`) VALUES
(1, 'PB-2019010958', '8991002103221', 50, 300000, '2019-01-09', 1),
(3, 'PB-2019011088', '8996006858160', 30, 90000, '2019-01-10', 1),
(4, 'PB-2019011067', '8996006858160', 20, 60000, '2019-01-10', 1),
(5, 'PB-2019011057', '8996006858160', 5, 15000, '2019-01-10', 1),
(6, 'PB-2019011008', '8996006858160', 5, 15000, '2019-01-10', 1),
(8, 'PB-2019011010', '8996006858160', 20, 60000, '2019-01-10', 1),
(9, 'PB-2019011045', '8991002103221', 100, 600000, '2019-01-10', 1),
(10, 'PB-2019011183', '9090909090', 100, 500000, '2019-01-11', 1);

--
-- Triggers `tb_pembelian`
--
DELIMITER $$
CREATE TRIGGER `beli` AFTER INSERT ON `tb_pembelian` FOR EACH ROW BEGIN
UPDATE tb_barang SET stok = stok+NEW.jumlah
WHERE kode_barcode=NEW.kode_barcode;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian_detail`
--

CREATE TABLE `tb_pembelian_detail` (
  `kode_pembelian` varchar(20) NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembelian_detail`
--

INSERT INTO `tb_pembelian_detail` (`kode_pembelian`, `total`, `bayar`, `kembalian`, `tanggal`) VALUES
('PB-2019010958', 300000, 300000, 0, '2019-01-09'),
('PB-2019010958', 300000, 300000, 0, '2019-01-09'),
('PB-2019010958', 300000, 300000, 0, '2019-01-09'),
('PB-2019011010', 60000, 100000, 40000, '2019-01-10'),
('PB-2019011045', 600000, 600000, 0, '2019-01-10'),
('PB-2019011183', 500000, 500000, 0, '2019-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `kode_penjualan` varchar(20) NOT NULL,
  `kode_barcode` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id_penjualan`, `kode_penjualan`, `kode_barcode`, `jumlah`, `total`, `tgl_penjualan`, `id_pelanggan`, `id_karyawan`) VALUES
(1, 'PJ-2019010991', '8996006858160', 0, 0, '2019-01-09', 0, 0),
(2, 'PJ-2019010991', '8996006858160', 0, 0, '2019-01-09', 0, 0),
(3, 'PJ-2019010991', '8996006858160', 1, 3000, '2019-01-09', 0, 0),
(4, 'PJ-2019010991', '8996006858160', 1, 3000, '2019-01-09', 0, 0),
(5, 'PJ-2019010991', '8996006858160', 1, 3000, '2019-01-09', 0, 0),
(6, 'PJ-2019010991', '8996006858160', 1, 3000, '2019-01-09', 0, 0),
(7, 'PJ-2019010991', '8996006858160', 0, 0, '2019-01-09', 0, 0),
(8, 'PJ-2019010991', '9090909090', 1, 6500, '2019-01-09', 1, 0),
(9, 'PJ-2019010991', '9090909090', 1, 6500, '2019-01-09', 1, 0),
(10, 'PJ-2019010991', '8991002103221', 10, 70000, '2019-01-09', 1, 0),
(11, 'PJ-2019010991', '8991002103221', 10, 70000, '2019-01-09', 1, 0),
(12, 'PJ-2019010991', '8991002103221', 10, 70000, '2019-01-09', 1, 0),
(13, 'PJ-2019010904', '9090909090', 1, 6500, '2019-01-09', 1, 0),
(14, 'PJ-2019010963', '9090909090', 1, 6500, '2019-01-09', 1, 0),
(15, 'PJ-2019011002', '8996006858160', 2, 8000, '2019-01-10', 1, 0),
(16, 'PJ-2019011084', '9090909090', 5, 32500, '2019-01-10', 1, 0),
(17, 'PJ-2019011079', '8991002103221', 5, 35000, '2019-01-10', 1, 0),
(18, 'PJ-2019011085', '8996006858160', 1, 4000, '2019-01-10', 8, 0),
(19, 'PJ-2019011012', '9090909090', 10, 65000, '2019-01-10', 1, 0),
(20, 'PJ-2019011079', '9090909090', 50, 325000, '2019-01-10', 1, 0),
(21, 'PJ-2019011039', '8991002103221', 200, 1400000, '2019-01-10', 1, 0),
(22, 'PJ-2019011127', '8996006858160', 3, 12000, '2019-01-11', 8, 2),
(23, 'PJ-2019011191', '8996006858160', 2, 8000, '2019-01-11', 1, 0),
(24, 'PJ-2019011128', '8991002103221', 2, 14000, '2019-01-11', 1, 0),
(25, 'PJ-2019011128', '8996006858160', 5, 20000, '2019-01-11', 1, 0),
(26, 'PJ-2019011180', '9090909090', 10, 65000, '2019-01-11', 8, 0),
(27, 'PJ-2019011123', '9090909090', 50, 325000, '2019-01-11', 1, 0),
(28, 'PJ-2019011170', '8991002103221', 5, 35000, '2019-01-11', 8, 0),
(29, 'PJ-2019011427', '8996006858160', 3, 12000, '2019-01-14', 1, 2),
(30, 'PJ-2019011416', '8996006858160', 5, 20000, '2019-01-14', 1, 5);

--
-- Triggers `tb_penjualan`
--
DELIMITER $$
CREATE TRIGGER `jual` AFTER INSERT ON `tb_penjualan` FOR EACH ROW BEGIN
UPDATE tb_barang SET stok = stok-NEW.jumlah
WHERE kode_barcode=NEW.kode_barcode;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan_detail`
--

CREATE TABLE `tb_penjualan_detail` (
  `kode_penjualan` varchar(20) NOT NULL,
  `total` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `potongan_diskon` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penjualan_detail`
--

INSERT INTO `tb_penjualan_detail` (`kode_penjualan`, `total`, `diskon`, `potongan_diskon`, `sub_total`, `bayar`, `kembalian`, `tanggal`) VALUES
('PJ-2019010904', 6500, 0, 0, 6500, 7000, 500, '0000-00-00'),
('PJ-2019010963', 6500, 0, 0, 6500, 7000, 500, '2019-01-09'),
('PJ-2019011002', 8000, 0, 0, 8000, 10000, 2000, '2019-01-10'),
('PJ-2019011084', 32500, 0, 0, 32500, 40000, 7500, '2019-01-10'),
('PJ-2019011079', 35000, 0, 0, 35000, 40000, 5000, '2019-01-10'),
('PJ-2019011085', 4000, 0, 0, 4000, 4000, 0, '2019-01-10'),
('PJ-2019011012', 65000, 0, 0, 65000, 70000, 5000, '2019-01-10'),
('PJ-2019011039', 1400000, 0, 0, 1400000, 1400000, 0, '2019-01-10'),
('PJ-2019011127', 12000, 0, 0, 12000, 15000, 3000, '2019-01-11'),
('PJ-2019011191', 8000, 0, 0, 8000, 10000, 2000, '2019-01-11'),
('PJ-2019011128', 34000, 0, 0, 34000, 50000, 16000, '2019-01-11'),
('PJ-2019011180', 65000, 0, 0, 65000, 100000, 35000, '2019-01-11'),
('PJ-2019011123', 325000, 0, 0, 325000, 400000, 75000, '2019-01-11'),
('PJ-2019011170', 35000, 0, 0, 35000, 50000, 15000, '2019-01-11'),
('PJ-2019011427', 12000, 0, 0, 12000, 12000, 0, '2019-01-14');

-- --------------------------------------------------------

--
-- Table structure for table `tb_satuan`
--

CREATE TABLE `tb_satuan` (
  `id_satuan` int(11) NOT NULL,
  `satuan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_satuan`
--

INSERT INTO `tb_satuan` (`id_satuan`, `satuan`) VALUES
(1, 'Pcs'),
(2, 'Dus');

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `nama`, `alamat`, `telepon`) VALUES
(1, 'Mayora', 'Jln Lingkar Selatan, No. 20 Banjarmasin', '05113232323');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
