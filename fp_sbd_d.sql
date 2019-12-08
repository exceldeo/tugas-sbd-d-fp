-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Des 2019 pada 18.28
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fp_sbd_d`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `satuan_barang` int(11) NOT NULL,
  `kode_kategori_barang` varchar(50) NOT NULL,
  `keterangan_barang` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `satuan_barang`, `kode_kategori_barang`, `keterangan_barang`) VALUES
('BRG00001', 'ajinomoto', 4, '000001', NULL),
('BRG00002', 'mie instan goreng (sedap) ', 1, '000001', NULL),
('BRG00003', 'pocari sweet 600ml', 1, '000002', NULL),
('BRG00004', 'kripik singkong kusuka', 1, '000001', NULL),
('BRG00005', 'kripik singkong qtela', 1, '000001', NULL),
('BRG00006', 'chitato', 1, '000001', NULL),
('BRG00007', 'hidrococo', 1, '000002', NULL),
('BRG00008', 'pensil fabelcastel 2b', 1, '000003', NULL),
('BRG00009', 'Indomie kuah rasa tomyum ala Thailand', 1, '000001', NULL),
('BRG00010', 'sedap soto', 1, '000001', ''),
('BRG00011', 'sedap goreng jumbo', 1, '000001', ''),
('BRG00012', 'edap ayam spesial', 1, '000001', ''),
('BRG00013', 'sedap bakso', 1, '000001', ''),
('BRG00014', 'sedap ayam geprek', 1, '000001', ''),
('BRG00015', 'sedap kari', 1, '000001', ''),
('BRG00016', 'sedap spice chicken', 1, '000001', ''),
('BRG00017', 'sedap sate', 1, '000001', ''),
('BRG00018', 'sedap chitato', 1, '000001', ''),
('BRG00019', 'Indomie Goreng Spesial Jumbo.', 1, '000001', ''),
('BRG00020', 'Indomie Rasa Kari Ayam.', 1, '000001', ''),
('BRG00021', 'Indomie Mi Goreng Aceh.', 1, '000001', ''),
('BRG00022', 'Indomie Mi Goreng Rasa Sambal Matah.', 1, '000001', ''),
('BRG00023', 'Indomie Mi Keriting Ayam Panggang.', 1, '000001', ''),
('BRG00024', 'Indomie Mi Goreng Rasa Rendang.', 1, '000001', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pemasokan`
--

CREATE TABLE `detail_pemasokan` (
  `id_detail_pemasokan` int(11) NOT NULL,
  `id_pemasok` int(11) NOT NULL,
  `kode_barang_masuk` varchar(50) NOT NULL,
  `jumlah_barang_masuk` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pemasokan`
--

INSERT INTO `detail_pemasokan` (`id_detail_pemasokan`, `id_pemasok`, `kode_barang_masuk`, `jumlah_barang_masuk`, `subtotal`) VALUES
(1, 1, 'BRG00001', 20, 14000),
(2, 2, 'BRG00002', 10, 17000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `id_transaksi`, `kode_barang`, `jumlah_transaksi`, `harga_jual`, `harga_beli`) VALUES
(1, 19, 'BRG00002', 3, 1700, 1500),
(2, 20, 'BRG00003', 2, 2500, 1500),
(4, 21, 'BRG00019', 1, 3600, 700),
(5, 22, 'BRG00011', 2, 1000, 400),
(6, 22, 'BRG00013', 1, 5800, 800),
(7, 23, 'BRG00022', 1, 8200, 200),
(8, 24, 'BRG00023', 1, 1600, 100),
(9, 25, 'BRG00023', 2, 1600, 100),
(10, 26, 'BRG00023', 3, 1600, 100),
(11, 27, 'BRG00023', 4, 1600, 100),
(12, 28, 'BRG00023', 5, 1600, 100),
(13, 29, 'BRG00020', 1, 400, 100),
(14, 30, 'BRG00020', 2, 400, 100),
(15, 31, 'BRG00020', 3, 400, 100),
(16, 32, 'BRG00020', 4, 400, 100),
(17, 33, 'BRG00020', 5, 400, 100),
(18, 34, 'BRG00020', 6, 400, 100),
(19, 35, 'BRG00020', 7, 400, 100),
(20, 36, 'BRG00011', 2, 1000, 400),
(21, 37, 'BRG00011', 1, 1000, 400),
(22, 37, 'BRG00010', 1, 6700, 100),
(23, 38, 'BRG00024', 1, 9500, 800),
(24, 38, 'BRG00020', 3, 400, 100),
(25, 40, 'BRG00021', 1, 5300, 200),
(26, 39, 'BRG00016', 1, 2700, 100),
(27, 41, 'BRG00021', 2, 5300, 200);

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_barang`
--

CREATE TABLE `harga_barang` (
  `kode_barang` varchar(50) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `periode_awal` date NOT NULL,
  `periode_akhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `harga_barang`
--

INSERT INTO `harga_barang` (`kode_barang`, `harga_jual`, `harga_beli`, `periode_awal`, `periode_akhir`) VALUES
('BRG00001', 1000, 800, '2019-12-04', '2019-12-06'),
('BRG00001', 8000, 3400, '2019-12-07', '2019-12-10'),
('BRG00002', 1700, 1500, '2019-12-06', '2019-12-31'),
('BRG00003', 2500, 1500, '2019-12-02', '2019-12-31'),
('BRG00004', 5000, 3000, '2019-12-01', '2019-12-31'),
('BRG00005', 9000, 8000, '2019-12-01', '2019-12-31'),
('BRG00006', 8900, 8000, '2019-12-01', '2019-12-10'),
('BRG00007', 1200, 900, '2019-12-01', '2019-12-10'),
('BRG00008', 2300, 900, '2019-12-01', '2019-12-09'),
('BRG00010', 6700, 100, '2019-12-01', '2019-12-30'),
('BRG00011', 1000, 400, '2019-12-01', '2019-12-30'),
('BRG00012', 2400, 900, '2019-12-01', '2019-12-30'),
('BRG00013', 5800, 800, '2019-12-01', '2019-12-30'),
('BRG00014', 6400, 200, '2019-12-01', '2019-12-30'),
('BRG00015', 4500, 500, '2019-12-01', '2019-12-30'),
('BRG00016', 2700, 100, '2019-12-01', '2019-12-30'),
('BRG00017', 9100, 100, '2019-12-01', '2019-12-30'),
('BRG00018', 4200, 500, '2019-12-01', '2019-12-30'),
('BRG00019', 3600, 700, '2019-12-01', '2019-12-30'),
('BRG00020', 400, 100, '2019-12-01', '2019-12-30'),
('BRG00021', 5300, 200, '2019-12-01', '2019-12-30'),
('BRG00022', 8200, 200, '2019-12-01', '2019-12-30'),
('BRG00023', 1600, 100, '2019-12-01', '2019-12-30'),
('BRG00024', 9500, 800, '2019-12-01', '2019-12-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kode_kategori` varchar(50) NOT NULL,
  `nama_kategorti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kode_kategori`, `nama_kategorti`) VALUES
('000001', 'makanan'),
('000002', 'minuman'),
('000003', 'alat tulis'),
('000004', 'mainan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `alamat_pelanggan` varchar(100) NOT NULL,
  `tlpn_pelanggan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `tlpn_pelanggan`) VALUES
(1, 'rapuy', 'BME 40', '-'),
(2, 'zaenal', 'edocity', ''),
(3, 'edo', 'perumdos blok j no 30', ''),
(4, 'yaboi', 'jalan a yani', '0812345678'),
(5, 'excel', 'jalan a yani 17', '08987654'),
(6, 'deo', 'jalan a yani 18', '084567832'),
(7, 'Azura', 'Jalan Nagrek', '089877898567'),
(8, 'Abinaya', 'Jalan Nager', '089877899269'),
(9, 'Elvano', 'Jalan ', '089877899458'),
(10, 'Azada', 'Jalan Hiroshima', '089877895805'),
(11, 'Dylan', 'Jalan Nagrek', '089877896927'),
(12, 'Abrisam', 'Jalan Bibil', '089877893095'),
(13, 'Ersya', 'Jalan Ngagel', '089877895536'),
(14, 'Aydin', 'Jalan Hiroshima', '089877894002'),
(15, 'Azada', 'Jalan LA', '089877892482'),
(16, 'Achazia', 'Jalan ', '089877899818'),
(17, 'Achazia', 'Jalan Ngagel', '089877891826'),
(18, 'Axelle', 'Jalan ', '089877891969'),
(19, 'Arrayan', 'Jalan Ngagel', '089877896399'),
(20, 'Arrayan', 'Jalan Bismar', '089877898803'),
(21, 'Azada', 'Jalan Balang', '08987789433'),
(22, 'Arrayan', 'Jalan Hiroshima', '089877895241'),
(23, 'Arrayan', 'Jalan Byson', '089877896968'),
(24, 'Ephraim', 'Jalan Hiroshima', '089877892762'),
(25, 'Achazia', 'Jalan ', '089877892959'),
(26, 'Evano', 'Jalan Nagrek', '089877897629'),
(27, 'Abrisam', 'Jalan ', '089877893135'),
(28, 'Azura', 'Jalan Balang', '08987789388'),
(29, 'Aksa', 'Jalan Nager', '089877899042'),
(30, 'Azada', 'Jalan Nangro', '089877897546'),
(31, 'Arkana', 'Jalan Darussalam', '089877896829'),
(32, 'Dylan', 'Jalan Darussalam', '089877895106'),
(33, 'Arion', 'Jalan Byson', '089877893648'),
(34, 'Delvin', 'Jalan Bangkalan', '089877894184');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasok`
--

CREATE TABLE `pemasok` (
  `id_pemasok` int(11) NOT NULL,
  `nama_pemasok` varchar(100) NOT NULL,
  `alamat_pemasok` varchar(100) NOT NULL,
  `telp_pemasok` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemasok`
--

INSERT INTO `pemasok` (`id_pemasok`, `nama_pemasok`, `alamat_pemasok`, `telp_pemasok`) VALUES
(1, 'nodas', 'pattimura 32', '1234567'),
(2, 'dimas', 'diponegoro 41', '789456663');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyimpanan`
--

CREATE TABLE `penyimpanan` (
  `kode_barang` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyimpanan`
--

INSERT INTO `penyimpanan` (`kode_barang`, `stok`) VALUES
('BRG00001', 20),
('BRG00002', 10),
('BRG00003', 0),
('BRG00004', 12),
('BRG00005', 14),
('BRG00006', 10),
('BRG00007', 13),
('BRG00008', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`) VALUES
(1, 'pcs'),
(2, 'lusin'),
(3, 'box'),
(4, 'bungkus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(50) NOT NULL,
  `keterangan` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_pelanggan`, `total`, `bayar`, `tanggal`, `waktu`, `keterangan`) VALUES
(19, 1, 8, 1700, 1700, '2019-12-04', '11:41', NULL),
(20, 1, 1, 2500, 2500, '2019-12-04', '17:40', ''),
(21, 1, 1, 3600, 3600, '2019-12-22', '6:18', ''),
(22, 1, 1, 7800, 7800, '2019-12-05', '17:44', ''),
(23, 1, 1, 8200, 8200, '2019-12-01', '3:1', ''),
(24, 1, 1, 1600, 1600, '2019-12-02', '19:11', ''),
(25, 1, 1, 3200, 3200, '2019-12-21', '12:27', ''),
(26, 1, 1, 4800, 4800, '2019-12-03', '14:24', ''),
(27, 1, 1, 6400, 6400, '2019-12-21', '22:52', ''),
(28, 1, 1, 8000, 8000, '2019-12-05', '14:56', ''),
(29, 1, 1, 400, 400, '2019-12-11', '6:47', ''),
(30, 1, 1, 800, 800, '2019-12-22', '21:18', ''),
(31, 1, 1, 1200, 1200, '2019-12-25', '19:47', ''),
(32, 1, 1, 1600, 1600, '2019-12-21', '23:54', ''),
(33, 1, 1, 2000, 2000, '2019-12-03', '21:2', ''),
(34, 1, 1, 2400, 2400, '2019-12-01', '21:44', ''),
(35, 1, 1, 2800, 2800, '2019-12-17', '4:53', ''),
(36, 1, 1, 2000, 2000, '2019-12-27', '22:44', ''),
(37, 1, 1, 7700, 7700, '2019-12-23', '19:57', ''),
(38, 1, 1, 10700, 10700, '2019-12-28', '1:21', ''),
(39, 1, 1, 2700, 2700, '2019-12-20', '11:16', ''),
(40, 1, 1, 5300, 5300, '2019-12-16', '0:42', ''),
(41, 1, 1, 0, 0, '2019-12-08', '05:45:01', ''),
(43, 1, 1, 0, 0, '2019-12-08', '06:12:45', ''),
(44, 1, 1, 0, 0, '2019-12-08', '06:27:04', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `level_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `level_user`) VALUES
(1, 'admin', 'admin', 'excel', 1),
(2, 'kasir', 'kasir', 'rohman', 2),
(3, 'imam', 'admin', 'admin', 1),
(4, 'ardy', 'kasir', 'kasir', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`),
  ADD KEY `satuan_barang` (`satuan_barang`),
  ADD KEY `kode_kategori_barang` (`kode_kategori_barang`);

--
-- Indeks untuk tabel `detail_pemasokan`
--
ALTER TABLE `detail_pemasokan`
  ADD PRIMARY KEY (`id_detail_pemasokan`),
  ADD KEY `id_pemasok` (`id_pemasok`),
  ADD KEY `kode_barang_masuk` (`kode_barang_masuk`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indeks untuk tabel `harga_barang`
--
ALTER TABLE `harga_barang`
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`id_pemasok`);

--
-- Indeks untuk tabel `penyimpanan`
--
ALTER TABLE `penyimpanan`
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_pemasokan`
--
ALTER TABLE `detail_pemasokan`
  MODIFY `id_detail_pemasokan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `pemasok`
--
ALTER TABLE `pemasok`
  MODIFY `id_pemasok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`satuan_barang`) REFERENCES `satuan` (`id_satuan`),
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`kode_kategori_barang`) REFERENCES `kategori` (`kode_kategori`);

--
-- Ketidakleluasaan untuk tabel `detail_pemasokan`
--
ALTER TABLE `detail_pemasokan`
  ADD CONSTRAINT `detail_pemasokan_ibfk_1` FOREIGN KEY (`kode_barang_masuk`) REFERENCES `barang` (`kode_barang`),
  ADD CONSTRAINT `detail_pemasokan_ibfk_2` FOREIGN KEY (`id_pemasok`) REFERENCES `pemasok` (`id_pemasok`);

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`),
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`);

--
-- Ketidakleluasaan untuk tabel `harga_barang`
--
ALTER TABLE `harga_barang`
  ADD CONSTRAINT `harga_barang_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`);

--
-- Ketidakleluasaan untuk tabel `penyimpanan`
--
ALTER TABLE `penyimpanan`
  ADD CONSTRAINT `penyimpanan_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
