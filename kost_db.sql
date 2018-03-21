-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12 Des 2017 pada 21.41
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.0.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kost_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kamar`
--

CREATE TABLE `tb_kamar` (
  `id_kamar` int(5) NOT NULL,
  `id_kost` int(11) NOT NULL,
  `nama_kamar` varchar(20) DEFAULT NULL,
  `ukuran_kamar` int(10) DEFAULT NULL,
  `biaya_kamar` int(20) DEFAULT NULL,
  `jenis_pembayaran` enum('Per Hari','Per Bulan','Per Tahun') DEFAULT NULL,
  `keterangan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kamar`
--

INSERT INTO `tb_kamar` (`id_kamar`, `id_kost`, `nama_kamar`, `ukuran_kamar`, `biaya_kamar`, `jenis_pembayaran`, `keterangan`) VALUES
(1, 1, 'Kaswari-1', 3, 400000, 'Per Hari', 'Tempat Tidur, Lemari'),
(12, 1, 'Kaswari-2', 3, 400000, 'Per Hari', 'Tempat Tidur, Lemari'),
(13, 1, 'Kaswari-3', 3, 400000, 'Per Hari', 'Tempat Tidur, Lemari'),
(14, 1, 'Kaswari-4', 3, 400000, 'Per Hari', 'Tempat Tidur, Lemari'),
(15, 1, 'Kaswari-5', 3, 400000, 'Per Hari', 'Tempat Tidur, Lemari'),
(16, 1, 'Kaswari-6', 3, 400000, 'Per Hari', 'Tempat Tidur, Lemari'),
(17, 2, 'Nangka-1', 123, 123981392, '', 'SADASD'),
(18, 1, 'Kaswari', 3, 100000, '', 'Full Service');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kost`
--

CREATE TABLE `tb_kost` (
  `id_kost` int(15) NOT NULL,
  `nama_kost` varchar(15) DEFAULT NULL,
  `jumlah_kamar` int(10) DEFAULT NULL,
  `alamat_kost` varchar(20) DEFAULT NULL,
  `jenis_kost` varchar(20) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kost`
--

INSERT INTO `tb_kost` (`id_kost`, `nama_kost`, `jumlah_kamar`, `alamat_kost`, `jenis_kost`, `keterangan`) VALUES
(1, 'Kaswari', 6, 'Jalan Nangka Gang Ka', 'VVIP', 'Tempat Tidur, Lemari dan Kamar Mandi Dalam'),
(2, 'Nangka', 2, 'nangka', 'VVIP', '123'),
(3, 'Batu Bulan', 15, 'Jalan Gunung Agung', 'VVIP', 'Full Service');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(15) NOT NULL,
  `tempat_lahir` varchar(15) DEFAULT NULL,
  `tanggal_lahir` varchar(20) DEFAULT NULL,
  `status` enum('Nikah','Belum Nikah') DEFAULT NULL,
  `no_identitas` varchar(20) DEFAULT NULL,
  `asal` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `tempat_lahir`, `tanggal_lahir`, `status`, `no_identitas`, `asal`) VALUES
(2, '231231', '123123', '12/13/2017', 'Nikah', '123123123asd', 'asdasdsad'),
(4, 'asd', '123123', '12/13/2017', 'Nikah', '123123123asd', 'asdasdsad');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `nama_pelanggan` varchar(20) DEFAULT NULL,
  `nama_kost` varchar(20) DEFAULT NULL,
  `nama_kamar` varchar(20) DEFAULT NULL,
  `jenis_pembayaran` enum('Per Hari','Per Bulan','Per Tahun') DEFAULT NULL,
  `biaya_kamar` int(20) DEFAULT NULL,
  `tanggal_masuk` varchar(50) DEFAULT NULL,
  `tanggal_keluar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nama_pelanggan`, `nama_kost`, `nama_kamar`, `jenis_pembayaran`, `biaya_kamar`, `tanggal_masuk`, `tanggal_keluar`) VALUES
(2, 'Eka', '2', 'Nangka-1', 'Per Bulan', 2147483647, '12/29/2017', '12/30/2017'),
(3, 'Boy', '2', 'Nangka-1', 'Per Hari', 1000000, '12/13/2017', '12/30/2017');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`) VALUES
(2, 'Eka', 'ekakrisna123@gmail.com', '$2y$10$vw1XM22xOLCOSb3JkE5nh.J1FY80oWltBY7KnphfhaJp3hkX59Q0C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kamar`
--
ALTER TABLE `tb_kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `tb_kost`
--
ALTER TABLE `tb_kost`
  ADD PRIMARY KEY (`id_kost`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kamar`
--
ALTER TABLE `tb_kamar`
  MODIFY `id_kamar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tb_kost`
--
ALTER TABLE `tb_kost`
  MODIFY `id_kost` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
