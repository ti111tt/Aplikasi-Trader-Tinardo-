-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Agu 2024 pada 14.38
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transaksy`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_brg` int(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nama_brg` varchar(225) NOT NULL,
  `kode_brg` varchar(255) NOT NULL,
  `harga` varchar(80) NOT NULL,
  `stok` int(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_brg`, `foto`, `nama_brg`, `kode_brg`, `harga`, `stok`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'mochi.png', 'Mochichicinta', '24FF', '40000', 4, '2024-08-10 15:15:20', '2024-08-10 15:15:20', '2024-08-10 15:15:20'),
(3, 'singkong.jfif', 'maichi singkong', '2SND', '20000', 6, '2024-08-10 11:47:15', '2024-08-10 11:47:15', '2024-08-10 11:47:15'),
(4, 'pocky.png', 'Pocky Cyntah', '4RFV', '39000', 2, '2024-08-10 15:16:06', '2024-08-10 15:16:06', '2024-08-10 15:16:06'),
(5, 'mineral.jpg', 'mineral pegunungan', '6H5Q2', '9000', 0, '2024-08-11 14:03:28', '2024-08-11 14:03:28', '2024-08-11 14:03:28'),
(6, 'snacks.jfif', 'cemilan orkay', '52v4ew', '80000', 10, '2024-08-11 14:04:44', '2024-08-11 14:04:44', '2024-08-11 14:04:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_bk` int(255) NOT NULL,
  `id_brg` int(225) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `tgl_klr` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_bk`, `id_brg`, `nama_brg`, `jumlah`, `tgl_klr`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 8, 'beras 1kg', 140, '2024-07-18', '2024-07-30 07:31:02', '2024-07-30 07:31:02', '2024-07-30 07:31:02'),
(2, 22, 'bambu miring', 8, '2024-08-01', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 9, 'bambu belah dua', 87, '2024-08-08', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 766, 'bambu terbalik', 87, '2024-08-01', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 776, 'bambu terbang', 87, '2024-09-02', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 656, 'bambu hitam', 87, '2024-08-01', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_bm` int(11) NOT NULL,
  `id_brg` int(255) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tglmsk` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_bm`, `id_brg`, `nama_brg`, `jumlah`, `tglmsk`, `created_at`, `updated_at`) VALUES
(2, 889, 'beras 1kg', 234, '2024-07-02', '2024-07-30 07:14:31', '2024-07-30 07:14:31'),
(3, 2, 'tes', 3, '2024-07-20', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 2, 'bbbkbjk', 51, '2024-07-09', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_hapus`
--

CREATE TABLE `history_hapus` (
  `id_hps` int(50) NOT NULL,
  `id_users` int(50) NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `record_id` int(50) NOT NULL,
  `deleted_data` text NOT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hs_login`
--

CREATE TABLE `hs_login` (
  `id_hs` int(255) NOT NULL,
  `id_users` int(255) NOT NULL,
  `nama_users` varchar(255) NOT NULL,
  `login_time` datetime NOT NULL,
  `logout_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hs_login`
--

INSERT INTO `hs_login` (`id_hs`, `id_users`, `nama_users`, `login_time`, `logout_time`) VALUES
(1, 1, 'admin', '2024-08-12 22:08:06', '2024-08-13 00:41:03'),
(2, 1, 'admin', '2024-08-12 22:20:56', '2024-08-13 00:41:03'),
(3, 18, 'aria', '2024-08-12 22:37:53', '2024-08-13 00:46:51'),
(4, 1, 'admin', '2024-08-12 22:40:44', '2024-08-13 00:41:03'),
(5, 1, 'admin', '2024-08-12 23:24:44', '2024-08-13 00:41:03'),
(6, 1, 'admin', '2024-08-12 23:39:29', '2024-08-13 00:41:03'),
(7, 1, 'admin', '2024-08-12 23:55:49', '2024-08-13 00:41:03'),
(8, 18, 'aria', '2024-08-12 23:56:04', '2024-08-13 00:46:51'),
(9, 1, 'admin', '2024-08-12 23:57:37', '2024-08-13 00:41:03'),
(10, 14, 'yoga', '2024-08-12 23:58:55', '2024-08-13 00:43:38'),
(11, 18, 'aria', '2024-08-12 23:59:53', '2024-08-13 00:46:51'),
(12, 14, 'yoga', '2024-08-13 00:00:13', '2024-08-13 00:43:38'),
(13, 14, 'yoga', '2024-08-13 00:02:17', '2024-08-13 00:43:38'),
(14, 14, 'yoga', '2024-08-13 00:11:51', '2024-08-13 00:43:38'),
(15, 1, 'admin', '2024-08-13 00:39:30', '2024-08-13 00:41:03'),
(16, 14, 'yoga', '2024-08-13 00:41:46', '2024-08-13 00:43:38'),
(17, 18, 'aria', '2024-08-13 00:43:59', '2024-08-13 00:46:51'),
(18, 18, 'aria', '2024-08-13 00:45:07', '2024-08-13 00:46:51'),
(19, 1, 'admin', '2024-08-13 00:47:22', '0000-00-00 00:00:00'),
(20, 18, 'aria', '2024-08-13 00:56:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hs_pesan`
--

CREATE TABLE `hs_pesan` (
  `id_hs_psn` int(11) NOT NULL,
  `kode_hs_pesan` int(255) NOT NULL,
  `id_makanan` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `total_harga` varchar(11) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `metode_pembayaran` varchar(255) NOT NULL,
  `alamat_pengiriman` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status_admin` enum('dikonfirmasi','gagal dikonfirmasi') NOT NULL,
  `status_transit` enum('berhasil','gagal dikirim') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hs_pesan`
--

INSERT INTO `hs_pesan` (`id_hs_psn`, `kode_hs_pesan`, `id_makanan`, `jumlah`, `id_users`, `total_harga`, `catatan`, `metode_pembayaran`, `alamat_pengiriman`, `created_at`, `updated_at`, `status_admin`, `status_transit`) VALUES
(15, 2147483647, '2', 2, 18, '80', 'ukuran 4kg', 'QRIS', 'jlan suram blok D2', '2024-08-11 21:02:48', '2024-08-11 21:02:48', 'dikonfirmasi', 'berhasil'),
(16, 2147483647, '4', 8, 18, '312', '250ml', 'GoPay', 'jlan suram blok D2', '2024-08-11 23:11:34', '2024-08-11 23:11:34', 'dikonfirmasi', 'berhasil'),
(17, 2147483647, '2', 1, 18, '40', '', 'GoPay', 'jlan suram blok D2', '2024-08-11 23:16:48', '2024-08-11 23:16:48', 'dikonfirmasi', 'berhasil'),
(19, 2147483647, '2', 1, 18, '40', 'ukuran 4kg', 'GoPay', 'jlan suram blok D2', '2024-08-11 23:16:48', '2024-08-11 23:16:48', 'dikonfirmasi', 'berhasil'),
(20, 2147483647, '3', 5, 18, '100', 'bbb', 'Dana', 'baloi indah no.9', '2024-08-11 23:17:32', '2024-08-11 23:17:32', 'dikonfirmasi', 'berhasil'),
(21, 2147483647, '2', 5, 18, '200000', 'bbb', 'ShopeePay', 'jlan suram blok D2', '2024-08-11 23:22:33', '2024-08-11 23:22:33', 'dikonfirmasi', 'berhasil'),
(22, 2147483647, '3', 7, 18, '140000', '250ml', 'ShopeePay', 'jlan suram blok D2', '2024-08-11 23:22:33', '2024-08-11 23:22:33', 'dikonfirmasi', 'berhasil'),
(27, 2147483647, '3', 3, 18, '60000', 'kirim cepat', 'GoPay', 'eb fvc ', '2024-08-12 14:09:02', '2024-08-12 14:09:02', 'dikonfirmasi', 'berhasil'),
(28, 2147483647, '2', 12, 18, '480000', '', 'GoPay', 'baloi sesat', '2024-08-12 23:56:33', '2024-08-12 23:56:33', 'dikonfirmasi', 'berhasil'),
(29, 2147483647, '3', 2, 18, '40000', '', 'GoPay', 'baloi sesat', '2024-08-12 23:56:33', '2024-08-12 23:56:33', 'dikonfirmasi', 'berhasil'),
(30, 2147483647, '3', 1, 18, '20000', '', 'GoPay', 'baloi sesat', '2024-08-12 23:56:33', '2024-08-12 23:56:33', 'dikonfirmasi', 'berhasil'),
(31, 2147483647, '2', 1, 18, '40000', 'hi', 'GoPay', 'baloi sesat', '2024-08-12 23:56:33', '2024-08-12 23:56:33', 'dikonfirmasi', 'berhasil'),
(32, 2147483647, '3', 12, 18, '240000', '', 'GoPay', 'cc', '2024-08-13 00:57:07', '2024-08-13 00:57:07', 'dikonfirmasi', 'berhasil'),
(33, 2147483647, '4', 1, 18, '39000', 'ikan pucuk', 'GoPay', 'baloi ngokngok', '2024-08-13 00:58:24', '2024-08-13 00:58:24', 'dikonfirmasi', 'berhasil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hs_tran`
--

CREATE TABLE `hs_tran` (
  `id_hstran` int(255) NOT NULL,
  `id_pesanan` int(255) NOT NULL,
  `no_surat` int(255) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `total_harga` int(255) NOT NULL,
  `transaksi_time` datetime NOT NULL,
  `nama_pengirim` varchar(255) NOT NULL,
  `alamat_pengirim` varchar(255) NOT NULL,
  `nama_penerima` varchar(255) NOT NULL,
  `alamat_penerima` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hs_tran`
--

INSERT INTO `hs_tran` (`id_hstran`, `id_pesanan`, `no_surat`, `nama_brg`, `tgl_surat`, `tgl_pembelian`, `total_harga`, `transaksi_time`, `nama_pengirim`, `alamat_pengirim`, `nama_penerima`, `alamat_penerima`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 222, 'beras 1kg', '2024-07-10', '2024-07-09', 200, '2024-07-31 04:02:01', 'Budi ', 'jalan neraka 09', 'riri', 'jalan surga 09', 'credit', '2024-08-05 08:01:57', '2024-08-05 08:01:57', '2024-08-05 08:01:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_kry` int(255) NOT NULL,
  `NIK` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` int(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_kry`, `NIK`, `nama`, `alamat`, `email`, `no_hp`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 45432, 'upin', 'baloi no 8', 'adjnakufb@gmail.com', 98098, '2024-07-30 06:51:24', '2024-07-30 06:51:24', '2024-07-30 06:51:24'),
(2, 2341421, 'buku', 'baloi indah no.9', 'h@gmail.com', 2147483647, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 2341421, 'buku pencerahan batin', 'baloi indah no.9', 'h@gmail.com', 2147483647, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 2341421, 'terserahlah', 'baloi indah no.9', 'terserah@gmail.com', 2147483647, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(255) NOT NULL,
  `id_makanan` int(255) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `id_users` int(255) NOT NULL,
  `total_harga` int(255) NOT NULL,
  `catatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_makanan`, `jumlah`, `id_users`, `total_harga`, `catatan`) VALUES
(1, 0, 5000, 1, 250000, 'hi'),
(2, 1, 75, 1, 3750, 'pol'),
(3, 1, 2147483647, 1, 2147483647, 'mati');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(255) NOT NULL,
  `nama_level` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2024-07-24 14:32:06', '2024-07-24 14:32:06'),
(2, 'Kepala gudang\r\n', '2024-07-24 14:32:18', '2024-07-24 14:32:18'),
(5, 'trader', '2024-07-24 14:33:40', '2024-07-24 14:33:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_trader`
--

CREATE TABLE `pembelian_trader` (
  `id_pembelian` int(255) NOT NULL,
  `id_pt` int(225) NOT NULL,
  `id_users` int(255) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `total_harga` int(255) NOT NULL,
  `status_pembelian` varchar(225) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(255) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `Berat` varchar(255) NOT NULL,
  `Qty` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `tgl_kirim` date NOT NULL,
  `status_pesanan` enum('lunas','belum_lunas') NOT NULL,
  `total_harga` varchar(225) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `nama_brg`, `Berat`, `Qty`, `alamat`, `tgl_pesan`, `tgl_kirim`, `status_pesanan`, `total_harga`, `created_at`, `updated_at`, `deleted_at`) VALUES
(15, 'bambu miring', '250gr', '50/100', 'baloi indah no.9', '2024-08-29', '2024-08-10', 'lunas', '356.000', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'bambu runcing', '850gr', '80/100', 'baloi indah no.999', '2024-08-14', '2024-08-22', 'belum_lunas', '879.000', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'bambu tiduer ', '850gr', '80/100', 'jalan surga blok A nomor 9', '2024-08-07', '2024-08-08', 'lunas', '578.000', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'bambu bengkok ', '850gr', '50/100', 'jalan surga blok C2 nomor 4', '2024-08-22', '2024-08-15', 'lunas', '868.000', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pt`
--

CREATE TABLE `pt` (
  `id_pt` int(255) NOT NULL,
  `nama_pt` varchar(225) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `nama_pemimpin` varchar(255) NOT NULL,
  `alamat_pt` varchar(255) NOT NULL,
  `no_telp` int(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pt`
--

INSERT INTO `pt` (`id_pt`, `nama_pt`, `logo`, `nama_pemimpin`, `alamat_pt`, `no_telp`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'mitra dagang utama', 'logo_perusahaan3', 'rara', 'jalan bangsaku idnoesniaa nomor 6 ', 75836584, '2024-07-29 04:40:34', '2024-07-29 04:40:34', '2024-07-29 04:40:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id_sett` int(11) NOT NULL,
  `setting_name` varchar(255) NOT NULL,
  `setting_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id_sett`, `setting_name`, `setting_value`) VALUES
(1, 'website_name', 'Nama Website Saya'),
(2, 'manager_name', 'Nama Manajer'),
(3, 'address', 'Alamat PT Saya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_pernyataan_jalan`
--

CREATE TABLE `surat_pernyataan_jalan` (
  `id_surat` int(255) NOT NULL,
  `id_pesanan` varchar(255) NOT NULL,
  `no_surat` int(255) NOT NULL,
  `tgl_surat` date NOT NULL,
  `nama_pengirim` varchar(255) NOT NULL,
  `alamat_pengirim` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `logo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'mitra dagang utama', 'pt.jpg', '2024-08-06 04:26:18', '2024-08-06 04:26:18', '2024-08-06 04:26:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(255) NOT NULL,
  `id_pesanan` int(225) NOT NULL,
  `no_surat` int(255) NOT NULL,
  `kode_transaksi` int(255) NOT NULL,
  `nama_brg` varchar(200) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `total_harga` int(255) NOT NULL,
  `transaksi_time` datetime NOT NULL,
  `nama_pengirim` varchar(50) NOT NULL,
  `alamat_pengirim` varchar(225) NOT NULL,
  `nama_penerima` varchar(255) NOT NULL,
  `alamat_penerima` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pesanan`, `no_surat`, `kode_transaksi`, `nama_brg`, `tgl_surat`, `tgl_pembelian`, `total_harga`, `transaksi_time`, `nama_pengirim`, `alamat_pengirim`, `nama_penerima`, `alamat_penerima`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 1, 222, 2147483647, 'Mineral', '2024-07-10', '2024-07-09', 200000, '2024-07-31 04:02:01', 'Budi', 'jalan neraka 09', 'riri', 'jalan surga 09', 'credit', '2024-07-31 04:02:01', '2024-07-31 04:02:01', '2024-07-31 04:02:01'),
(3, 5, 632, 2147483647, 'cheetos', '2024-07-16', '2024-07-09', 800000, '2024-07-31 04:19:02', 'jess', 'baloi tengahh no 8 ', 'rara', 'bali ', 'debit', '2024-07-31 04:19:02', '2024-07-31 04:19:02', '2024-07-31 04:19:02'),
(4, 6, 242, 2147483647, 'cemilamn orkay', '2024-07-08', '2024-07-10', 100000, '2024-07-31 04:20:03', 'gojo', 'seolaahadkn no 9', 'aria', 'baloi 9', 'credit', '2024-07-31 04:20:03', '2024-07-31 04:20:03', '2024-07-31 04:20:03'),
(5, 9, 865, 2147483647, 'mochicinta', '2024-07-02', '2024-07-11', 90000, '2024-07-31 04:21:42', 'sherli', 'bdbajbfjas ', 'minion', 'vhavscjkabej', 'debit', '2024-07-31 04:21:42', '2024-07-31 04:21:42', '2024-07-31 04:21:42'),
(6, 9, 232, 2147483647, 'maichi singkong', '2024-07-10', '2024-07-09', 230000, '2024-07-31 04:22:52', 'gojo', 'aefcvcd', 'ngok', 'afcafdc', 'debit', '2024-07-31 04:22:52', '2024-07-31 04:22:52', '2024-07-31 04:22:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(255) NOT NULL,
  `nama_users` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(225) NOT NULL,
  `no_telp` int(50) NOT NULL,
  `id_level` int(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `nama_users`, `email`, `password`, `no_telp`, `id_level`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 675645, 1, '2024-07-30 07:51:46', '2024-07-30 07:51:46', '2024-07-30 07:51:46'),
(3, 'ipin', 'ipin@gmail.com', '202cb962ac59075b964b07152d234b70', 934843, 2, '2024-07-30 07:55:14', '2024-07-30 07:55:14', '2024-07-30 07:55:14'),
(4, 'tinardo', 'fdjbjcsb@gmail.com', 'cfcd208495d565ef66e7dff9f98764da', 2147483647, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'vin', 'loraexv@gmail.com', '', 2147483647, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'ege', 'loraexv@gmail.com', '', 2147483647, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'van daren', 'fdjbjcsb@gmail.com', '', 888888, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'felix', 'terserah@gmail.com', '', 79797987, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'felix', 'terserah@gmail.com', '', 2147483647, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'yoga', 'yoga@gmail.com', '450005768597c06e0a146a1cd0e2428a', 888888, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'gataulah', 'yoga@gmail.com', '000', 888888, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'p', 'yoga@gmail.com', 'c6f057b86584942e415435ffb1fa93d4', 888888, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'javid', 'yoga@gmail.com', '123', 888888, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'aria', 'fdjbjcsb@gmail.com', '4fac9ba115140ac4f1c22da82aa0bc7f', 888888, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_bk`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_bm`);

--
-- Indeks untuk tabel `history_hapus`
--
ALTER TABLE `history_hapus`
  ADD PRIMARY KEY (`id_hps`);

--
-- Indeks untuk tabel `hs_login`
--
ALTER TABLE `hs_login`
  ADD PRIMARY KEY (`id_hs`);

--
-- Indeks untuk tabel `hs_pesan`
--
ALTER TABLE `hs_pesan`
  ADD PRIMARY KEY (`id_hs_psn`);

--
-- Indeks untuk tabel `hs_tran`
--
ALTER TABLE `hs_tran`
  ADD PRIMARY KEY (`id_hstran`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_kry`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `pembelian_trader`
--
ALTER TABLE `pembelian_trader`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `pt`
--
ALTER TABLE `pt`
  ADD PRIMARY KEY (`id_pt`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id_sett`);

--
-- Indeks untuk tabel `surat_pernyataan_jalan`
--
ALTER TABLE `surat_pernyataan_jalan`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indeks untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_brg` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `history_hapus`
--
ALTER TABLE `history_hapus`
  MODIFY `id_hps` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hs_login`
--
ALTER TABLE `hs_login`
  MODIFY `id_hs` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `hs_pesan`
--
ALTER TABLE `hs_pesan`
  MODIFY `id_hs_psn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
