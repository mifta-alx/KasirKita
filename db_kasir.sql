-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Bulan Mei 2021 pada 13.34
-- Versi server: 10.4.14-MariaDB-log
-- Versi PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_access_kategori`
--

CREATE TABLE `db_access_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `db_access_kategori`
--

INSERT INTO `db_access_kategori` (`kategori_id`, `kategori`, `icon`) VALUES
(1, 'Restoran', 'feather'),
(2, 'Toko Pakaian', 'shopping-bag');

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_access_subkategori`
--

CREATE TABLE `db_access_subkategori` (
  `subkategori_id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `subkategori` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `db_access_subkategori`
--

INSERT INTO `db_access_subkategori` (`subkategori_id`, `id_kategori`, `subkategori`, `url`) VALUES
(2, 2, 'ayam', 'ayam'),
(11, 1, 'teh', 'teh'),
(12, 1, 'kopi', 'kopi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_detail_stok_keluar`
--

CREATE TABLE `db_detail_stok_keluar` (
  `detail_keluar_id` int(11) NOT NULL,
  `detail_stok_keluar_id` int(11) NOT NULL,
  `detail_produk_id` int(11) NOT NULL,
  `tgl_submit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tgl_pengeluaran` date NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `db_detail_stok_keluar`
--

INSERT INTO `db_detail_stok_keluar` (`detail_keluar_id`, `detail_stok_keluar_id`, `detail_produk_id`, `tgl_submit`, `tgl_pengeluaran`, `jumlah`, `harga`) VALUES
(1, 1, 1, '2021-05-16 01:41:56', '2021-05-14', '1', '10000'),
(2, 2, 1, '2021-05-16 01:42:56', '2021-05-07', '1', '10000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_detail_stok_masuk`
--

CREATE TABLE `db_detail_stok_masuk` (
  `detail_id` int(11) NOT NULL,
  `detail_stok_masuk_id` int(11) NOT NULL,
  `detail_produk_id` int(11) NOT NULL,
  `tgl_submit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tgl_pembelian` date NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_karyawan`
--

CREATE TABLE `db_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `tgl` varchar(255) NOT NULL,
  `bulan` varchar(255) NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `nama_bisnis` varchar(255) NOT NULL,
  `outlet_id` varchar(255) NOT NULL,
  `kota_kabupaten` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kategori` int(11) NOT NULL,
  `subkategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `db_karyawan`
--

INSERT INTO `db_karyawan` (`id_karyawan`, `nama_karyawan`, `email`, `image`, `password`, `username`, `role_id`, `is_active`, `date_created`, `tgl`, `bulan`, `tahun`, `nama_bisnis`, `outlet_id`, `kota_kabupaten`, `provinsi`, `kategori`, `subkategori`) VALUES
(1, 'supadi', 'supadigas123@gmail.com', 'admin.png', '12345', 'supadigas', 4, 1, 1621899159, '25', 'Mei', '2021', 'usaha halal', '22', 'Kota Malang', 'Jawa Timur', 2, 'teh'),
(2, 'ahmad', 'ahmad@gmail.com', 'admin.png', '12345', 'ahmad123', 5, 1, 1622174809, '28', 'Mei', '2021', 'usaha halal', '22', 'Kota Malang', 'Jawa Timur', 2, 'teh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_kategori`
--

CREATE TABLE `db_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `nama_bisnis` varchar(128) NOT NULL,
  `outlet_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `db_kategori`
--

INSERT INTO `db_kategori` (`id_kategori`, `kategori`, `nama_bisnis`, `outlet_id`) VALUES
(2, 'Minuman', 'usaha halal', '22'),
(4, 'Makanan', 'usaha halal', '22'),
(6, 'Pakaian', 'bukan usaha halal', '19'),
(8, 'Mimika', 'bukan usaha halal', '19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_kota`
--

CREATE TABLE `db_kota` (
  `kota_id` int(11) NOT NULL,
  `kota_kabupaten` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `db_kota`
--

INSERT INTO `db_kota` (`kota_id`, `kota_kabupaten`, `provinsi`) VALUES
(1, 'Kabupaten Simeulue', 'Aceh'),
(2, 'Kabupaten Aceh Singkil', 'Aceh'),
(3, 'Kabupaten Aceh Selatan', 'Aceh'),
(4, 'Kabupaten Aceh Tenggara', 'Aceh'),
(5, 'Kabupaten Aceh Timur', 'Aceh'),
(6, 'Kabupaten Aceh Tengah', 'Aceh'),
(7, 'Kabupaten Aceh Barat', 'Aceh'),
(8, 'Kabupaten Aceh Besar', 'Aceh'),
(9, 'Kabupaten Aceh Utara', 'Aceh'),
(10, 'Kabupaten Aceh Barat Daya', 'Aceh'),
(11, 'Kabupaten Aceh Tamiang', 'Aceh'),
(12, 'Kabupaten Aceh Jaya', 'Aceh'),
(13, 'Kabupaten Bener Meriah', 'Aceh'),
(14, 'Kabupaten Bireuen', 'Aceh'),
(15, 'Kabupaten Gayo Lues', 'Aceh'),
(16, 'Kabupaten Nagan Raya', 'Aceh'),
(17, 'Kabupaten Pidie', 'Aceh'),
(18, 'Kabupaten Pidie Jaya', 'Aceh'),
(19, 'Kota Banda Aceh', 'Aceh'),
(20, 'Kota Langsa', 'Aceh'),
(21, 'Kota Lhokseumawe', 'Aceh'),
(22, 'Kota Sabang', 'Aceh'),
(23, 'Kota Subulussalam', 'Aceh'),
(24, 'Kabupaten Nias', 'Sumatera Utara'),
(25, 'Kabupaten Mandailing Natal', 'Sumatera Utara'),
(26, 'Kabupaten Tapanuli Selatan', 'Sumatera Utara'),
(27, 'Kabupaten Tapanuli Tengah', 'Sumatera Utara'),
(28, 'Kabupaten Tapanuli Utara', 'Sumatera Utara'),
(29, 'Kabupaten Toba Samosir', 'Sumatera Utara'),
(30, 'Kabupaten Labuhan Batu', 'Sumatera Utara'),
(31, 'Kabupaten Asahan', 'Sumatera Utara'),
(32, 'Kabupaten Simalungun', 'Sumatera Utara'),
(33, 'Kabupaten Dairi', 'Sumatera Utara'),
(34, 'Kabupaten Karo', 'Sumatera Utara'),
(35, 'Kabupaten Deli Serdang', 'Sumatera Utara'),
(36, 'Kabupaten Langkat', 'Sumatera Utara'),
(37, 'Kabupaten Nias Selatan', 'Sumatera Utara'),
(38, 'Kabupaten Humbang Hasundutan', 'Sumatera Utara'),
(39, 'Kabupaten Pakpak Bharat', 'Sumatera Utara'),
(40, 'Kabupaten Samosir', 'Sumatera Utara'),
(41, 'Kabupaten Serdang Bedagai', 'Sumatera Utara'),
(42, 'Kabupaten Batu Bara', 'Sumatera Utara'),
(43, 'Kabupaten Padang Lawas Utara', 'Sumatera Utara'),
(44, 'Kabupaten Padang Lawas', 'Sumatera Utara'),
(45, 'Kabupaten Labuhan Batu Selatan', 'Sumatera Utara'),
(46, 'Kabupaten Labuhan Batu Utara', 'Sumatera Utara'),
(47, 'Kabupaten Labuhan Nias Utara', 'Sumatera Utara'),
(48, 'Kabupaten Labuhan Nias Barat', 'Sumatera Utara'),
(49, 'Kota Sibolga', 'Sumatera Utara'),
(50, 'Kota Tanjung Balai', 'Sumatera Utara'),
(51, 'Kota Pematang Siantar', 'Sumatera Utara'),
(52, 'Kota Tebing Tinggi', 'Sumatera Utara'),
(53, 'Kota Medan', 'Sumatera Utara'),
(54, 'Kota Binjai', 'Sumatera Utara'),
(55, 'Kota Padangsidimpuan', 'Sumatera Utara'),
(56, 'Kota GunungSitoli', 'Sumatera Utara'),
(57, 'Kabupaten Kepulauan Mentawai', 'Sumatera Barat'),
(58, 'Kabupaten Pesisir Selatan', 'Sumatera Barat'),
(59, 'Kabupaten Solok', 'Sumatera Barat'),
(60, 'Kabupaten Sijunjung', 'Sumatera Barat'),
(61, 'Kabupaten Tanah Datar', 'Sumatera Barat'),
(62, 'Kabupaten Padang Pariaman', 'Sumatera Barat'),
(63, 'Kabupaten Agam', 'Sumatera Barat'),
(64, 'Kabupaten Lima Puluh Kota', 'Sumatera Barat'),
(65, 'Kabupaten Pasaman', 'Sumatera Barat'),
(66, 'Kabupaten Solok Selatan', 'Sumatera Barat'),
(67, 'Kabupaten Dharmasraya', 'Sumatera Barat'),
(68, 'Kabupaten Pasaman Barat', 'Sumatera Barat'),
(69, 'Kota Padang', 'Sumatera Barat'),
(70, 'Kota Solok', 'Sumatera Barat'),
(71, 'Kota Sawah Lunto', 'Sumatera Barat'),
(72, 'Kota Padang Panjang', 'Sumatera Barat'),
(73, 'Kota Bukittinggi', 'Sumatera Barat'),
(74, 'Kota Payakumbuh', 'Sumatera Barat'),
(75, 'Kota Pariaman', 'Sumatera Barat'),
(76, 'Kabupaten Kuantan Singingi', 'Riau'),
(77, 'Kabupaten Indragiri Hulu', 'Riau'),
(78, 'Kabupaten Indragiri Hilir', 'Riau'),
(79, 'Kabupaten Pelalawan', 'Riau'),
(80, 'Kabupaten Siak', 'Riau'),
(81, 'Kabupaten Kampar', 'Riau'),
(82, 'Kabupaten Rokan Hulu', 'Riau'),
(83, 'Kabupaten Bengkalis', 'Riau'),
(84, 'Kabupaten Rokan Hilir', 'Riau'),
(85, 'Kabupaten Kepulauan Meranti', 'Riau'),
(86, 'Kota Pekanbaru', 'Riau'),
(87, 'Kota Dumai', 'Riau'),
(88, 'Kabupaten Kerinci', 'Jambi'),
(89, 'Kabupaten Sarolangun', 'Jambi'),
(90, 'Kabupaten Batang Hari', 'Jambi'),
(91, 'Kabupaten Muaro Jambi', 'Jambi'),
(92, 'Kabupaten Tanjung Jabung Timur', 'Jambi'),
(93, 'Kabupaten Tanjung Jabung Barat', 'Jambi'),
(94, 'Kabupaten Tebo', 'Jambi'),
(95, 'Kabupaten Bungo', 'Jambi'),
(96, 'Kota Jambi', 'Jambi'),
(97, 'Kota Sungai Penuh', 'Jambi'),
(98, 'Kabupaten Ogan Komering Ulu', 'Sumatera Selatan'),
(99, 'Kabupaten Ogan Komering Ilir', 'Sumatera Selatan'),
(100, 'Kabupaten Muara Enim', 'Sumatera Selatan'),
(101, 'Kabupaten Lahat', 'Sumatera Selatan'),
(102, 'Kabupaten Musi Rawas', 'Sumatera Selatan'),
(103, 'Kabupaten Musi Banyuasin', 'Sumatera Selatan'),
(104, 'Kabupaten Ogan Komering Ulu Selatan', 'Sumatera Selatan'),
(105, 'Kabupaten Ogan Komering Ulu Timur', 'Sumatera Selatan'),
(106, 'Kabupaten Ogan Ilir', 'Sumatera Selatan'),
(107, 'Kabupaten Empat Lawang', 'Sumatera Selatan'),
(108, 'Kabupaten Penukal Abab Lematang Ilir', 'Sumatera Selatan'),
(109, 'Kabupaten Musi Rawas Utara', 'Sumatera Selatan'),
(110, 'Kota Palembang', 'Sumatera Selatan'),
(111, 'Kota Prabumulih', 'Sumatera Selatan'),
(112, 'Kota Pagar Alam', 'Sumatera Selatan'),
(113, 'Kota Pagar Lubuklinggau', 'Sumatera Selatan'),
(114, 'Kabupaten Bengkulu Selatan', 'Bengkulu'),
(115, 'Kabupaten Rejang Lebong', 'Bengkulu'),
(116, 'Kabupaten Bengkulu Utara', 'Bengkulu'),
(117, 'Kabupaten Kaur', 'Bengkulu'),
(118, 'Kabupaten Saluma', 'Bengkulu'),
(119, 'Kabupaten Mukomuko', 'Bengkulu'),
(120, 'Kabupaten Lebong', 'Bengkulu'),
(121, 'Kabupaten Kepahiang', 'Bengkulu'),
(122, 'Kabupaten Bengkulu Tengah', 'Bengkulu'),
(123, 'Kota Bengkulu', 'Bengkulu'),
(124, 'Kabupaten Lampung Barat', 'Lampung'),
(125, 'Kabupaten Tanggamus', 'Lampung'),
(126, 'Kabupaten Lampung Selatan', 'Lampung'),
(127, 'Kabupaten Lampung Timur', 'Lampung'),
(128, 'Kabupaten Lampung Tengah', 'Lampung'),
(129, 'Kabupaten Lampung Utara', 'Lampung'),
(130, 'Kabupaten Way Kanan', 'Lampung'),
(131, 'Kabupaten Tulang Bawang', 'Lampung'),
(132, 'Kabupaten Pesaweran', 'Lampung'),
(133, 'Kabupaten Pringsewu', 'Lampung'),
(134, 'Kabupaten Mesuiji', 'Lampung'),
(135, 'Kabupaten Tulang Bawang Barat', 'Lampung'),
(136, 'Kabupaten Pesisir Barat', 'Lampung'),
(137, 'Kota Bandar Lampung', 'Lampung'),
(138, 'Kota Metro', 'Lampung'),
(139, 'Kabupaten Bangka', 'Kepulauan Bangka Belitung'),
(140, 'Kabupaten Belitung', 'Kepulauan Bangka Belitung'),
(141, 'Kabupaten Bangka Barat', 'Kepulauan Bangka Belitung'),
(142, 'Kabupaten Bangka Tengah', 'Kepulauan Bangka Belitung'),
(143, 'Kabupaten Bangka Selatan', 'Kepulauan Bangka Belitung'),
(144, 'Kabupaten Bangka Timur', 'Kepulauan Bangka Belitung'),
(145, 'Kota Pangkal Pinang', 'Kepulauan Bangka Belitung'),
(146, 'Kabupaten Karimun', 'Kepulauan Riau'),
(147, 'Kabupaten Bintan', 'Kepulauan Riau'),
(148, 'Kabupaten Natuna', 'Kepulauan Riau'),
(149, 'Kabupaten Lingga', 'Kepulauan Riau'),
(150, 'Kabupaten Kepulauan Anambas', 'Kepulauan Riau'),
(151, 'Kota Batam', 'Kepulauan Riau'),
(152, 'Kota Tanjung Batam', 'Kepulauan Riau'),
(153, 'Kabupaten Kepulauan Seribu', 'DKI Jakarta'),
(154, 'Kota Jakarta Selatan', 'DKI Jakarta'),
(155, 'Kota Jakarta Timur', 'DKI Jakarta'),
(156, 'Kota Jakarta Pusat', 'DKI Jakarta'),
(157, 'Kota Jakarta Barat', 'DKI Jakarta'),
(158, 'Kota Jakarta Utara', 'DKI Jakarta'),
(159, 'Kabupaten Bogor', 'Jawa Barat'),
(160, 'Kabupaten Sukabumi', 'Jawa Barat'),
(161, 'Kabupaten Cianjur', 'Jawa Barat'),
(162, 'Kabupaten Bandung', 'Jawa Barat'),
(163, 'Kabupaten Garut', 'Jawa Barat'),
(164, 'Kabupaten Tasikmalaya', 'Jawa Barat'),
(165, 'Kabupaten Ciamis', 'Jawa Barat'),
(166, 'Kabupaten Kuningan', 'Jawa Barat'),
(167, 'Kabupaten Cirebon', 'Jawa Barat'),
(168, 'Kabupaten Majalengka', 'Jawa Barat'),
(169, 'Kabupaten Sumedang', 'Jawa Barat'),
(170, 'Kabupaten Indramayu', 'Jawa Barat'),
(171, 'Kabupaten Subang', 'Jawa Barat'),
(172, 'Kabupaten Purwakarta', 'Jawa Barat'),
(173, 'Kabupaten Karawang', 'Jawa Barat'),
(174, 'Kabupaten Bekasi', 'Jawa Barat'),
(175, 'Kabupaten Bandung Barat', 'Jawa Barat'),
(176, 'Kabupaten Pangandaran', 'Jawa Barat'),
(177, 'Kota Bogor', 'Jawa Barat'),
(178, 'Kota Sukabumi', 'Jawa Barat'),
(179, 'Kota Bandung', 'Jawa Barat'),
(180, 'Kota Cirebon', 'Jawa Barat'),
(181, 'Kota Bekasi', 'Jawa Barat'),
(182, 'Kota Depok', 'Jawa Barat'),
(183, 'Kota Cimahi', 'Jawa Barat'),
(184, 'Kota Tasikmalaya', 'Jawa Barat'),
(185, 'Kota Banjar', 'Jawa Barat'),
(186, 'Kabupaten Cilacap', 'Jawa Tengah'),
(187, 'Kabupaten Banyumas', 'Jawa Tengah'),
(188, 'Kabupaten Purbalingga', 'Jawa Tengah'),
(189, 'Kabupaten Banjarnegara', 'Jawa Tengah'),
(190, 'Kabupaten Kebumen', 'Jawa Tengah'),
(191, 'Kabupaten Purworejo', 'Jawa Tengah'),
(192, 'Kabupaten Wonosobo', 'Jawa Tengah'),
(193, 'Kabupaten Magelang', 'Jawa Tengah'),
(194, 'Kabupaten Boyolali', 'Jawa Tengah'),
(195, 'Kabupaten Klaten', 'Jawa Tengah'),
(196, 'Kabupaten Sukoharjo', 'Jawa Tengah'),
(197, 'Kabupaten Wonogiri', 'Jawa Tengah'),
(198, 'Kabupaten Karanganyar', 'Jawa Tengah'),
(199, 'Kabupaten Sragen', 'Jawa Tengah'),
(200, 'Kabupaten Grobogan', 'Jawa Tengah'),
(201, 'Kabupaten Blora', 'Jawa Tengah'),
(202, 'Kabupaten Rembang', 'Jawa Tengah'),
(203, 'Kabupaten Pati', 'Jawa Tengah'),
(204, 'Kabupaten Kudus', 'Jawa Tengah'),
(205, 'Kabupaten Jepara', 'Jawa Tengah'),
(206, 'Kabupaten Demak', 'Jawa Tengah'),
(207, 'Kabupaten Semarang', 'Jawa Tengah'),
(208, 'Kabupaten Temanggung', 'Jawa Tengah'),
(209, 'Kabupaten Kendal', 'Jawa Tengah'),
(210, 'Kabupaten Batang', 'Jawa Tengah'),
(211, 'Kabupaten Pekalongan', 'Jawa Tengah'),
(212, 'Kabupaten Pemalang', 'Jawa Tengah'),
(213, 'Kabupaten Tegal', 'Jawa Tengah'),
(214, 'Kabupaten Brebes', 'Jawa Tengah'),
(215, 'Kota Magelang', 'Jawa Tengah'),
(216, 'Kota Surakarta', 'Jawa Tengah'),
(217, 'Kota Salatiga', 'Jawa Tengah'),
(218, 'Kota Semarang', 'Jawa Tengah'),
(219, 'Kota Pekalongan', 'Jawa Tengah'),
(220, 'Kota Tegal', 'Jawa Tengah'),
(221, 'Kabupaten Kulon Progo', 'DIY'),
(222, 'Kabupaten Bantul', 'DIY'),
(223, 'Kabupaten Gunung Kidul', 'DIY'),
(224, 'Kabupaten Sleman', 'DIY'),
(225, 'Kota Yogyakarta', 'DIY'),
(226, 'Kabupaten Pacitan', 'Jawa Timur'),
(227, 'Kabupaten Ponorogo', 'Jawa Timur'),
(228, 'Kabupaten Trenggalek', 'Jawa Timur'),
(229, 'Kabupaten Tulungagung', 'Jawa Timur'),
(230, 'Kabupaten Blitar', 'Jawa Timur'),
(231, 'Kabupaten Kediri', 'Jawa Timur'),
(232, 'Kabupaten Malang', 'Jawa Timur'),
(233, 'Kabupaten Lumajang', 'Jawa Timur'),
(234, 'Kabupaten Jember', 'Jawa Timur'),
(235, 'Kabupaten Banyuwangi', 'Jawa Timur'),
(236, 'Kabupaten Bondowoso', 'Jawa Timur'),
(237, 'Kabupaten Situbondo', 'Jawa Timur'),
(238, 'Kabupaten Probolinggo', 'Jawa Timur'),
(239, 'Kabupaten Pasuruan', 'Jawa Timur'),
(240, 'Kabupaten Sidoarjo', 'Jawa Timur'),
(241, 'Kabupaten Mojokerto', 'Jawa Timur'),
(242, 'Kabupaten Jombang', 'Jawa Timur'),
(243, 'Kabupaten Nganjuk', 'Jawa Timur'),
(244, 'Kabupaten Madiun', 'Jawa Timur'),
(245, 'Kabupaten Magetan', 'Jawa Timur'),
(246, 'Kabupaten Ngawi', 'Jawa Timur'),
(247, 'Kabupaten Bojonegoro', 'Jawa Timur'),
(248, 'Kabupaten Tuban', 'Jawa Timur'),
(249, 'Kabupaten Lamongan', 'Jawa Timur'),
(250, 'Kabupaten Gresik', 'Jawa Timur'),
(251, 'Kabupaten Bangkalan', 'Jawa Timur'),
(252, 'Kabupaten Sampang', 'Jawa Timur'),
(253, 'Kabupaten Pamekasan', 'Jawa Timur'),
(254, 'Kabupaten Sumenep', 'Jawa Timur'),
(255, 'Kota Kediri', 'Jawa Timur'),
(256, 'Kota Blitar', 'Jawa Timur'),
(257, 'Kota Probolinggo', 'Jawa Timur'),
(258, 'Kota Pasuruan', 'Jawa Timur'),
(259, 'Kota Mojokerto', 'Jawa Timur'),
(260, 'Kota Madiun', 'Jawa Timur'),
(261, 'Kota Surabaya', 'Jawa Timur'),
(262, 'Kota Batu', 'Jawa Timur'),
(263, 'Kabupaten Pandeglang', 'Banten'),
(264, 'Kabupaten Lebak', 'Banten'),
(265, 'Kabupaten Tangerang', 'Banten'),
(266, 'Kabupaten Serang', 'Banten'),
(267, 'Kota Tangerang', 'Banten'),
(268, 'Kota Cilegon', 'Banten'),
(269, 'Kota Serang', 'Banten'),
(270, 'Kota Tangerang Selatan', 'Banten'),
(271, 'Kabupaten Jembrana', 'Bali'),
(272, 'Kabupaten Tabanan', 'Bali'),
(273, 'Kabupaten Badung', 'Bali'),
(274, 'Kabupaten Gianyar', 'Bali'),
(275, 'Kabupaten Klungkung', 'Bali'),
(276, 'Kabupaten Bangli', 'Bali'),
(277, 'Kabupaten Karang Asem', 'Bali'),
(278, 'Kabupaten Buleleng', 'Bali'),
(279, 'Kota Denpasar', 'Bali'),
(280, 'Kabupaten Lombok Barat', 'Nusa Tenggara Barat'),
(281, 'Kabupaten Lombok Tengah', 'Nusa Tenggara Barat'),
(282, 'Kabupaten Lombok Timur', 'Nusa Tenggara Barat'),
(283, 'Kabupaten Sumbawa', 'Nusa Tenggara Barat'),
(284, 'Kabupaten Dompu', 'Nusa Tenggara Barat'),
(285, 'Kabupaten Bima', 'Nusa Tenggara Barat'),
(286, 'Kabupaten Sumbawa Barat', 'Nusa Tenggara Barat'),
(287, 'Kabupaten Lombok Utara', 'Nusa Tenggara Barat'),
(288, 'Kota Mataram', 'Nusa Tenggara Barat'),
(289, 'Kota Bima', 'Nusa Tenggara Barat'),
(290, 'Kabupaten Sumba Barat', 'Nusa Tenggara Timur'),
(291, 'Kabupaten Sumba Timur', 'Nusa Tenggara Timur'),
(292, 'Kabupaten Kupang', 'Nusa Tenggara Timur'),
(293, 'Kabupaten Timor Tengah Selatan', 'Nusa Tenggara Timur'),
(294, 'Kabupaten Timor Tengah Utara', 'Nusa Tenggara Timur'),
(295, 'Kabupaten Belu', 'Nusa Tenggara Timur'),
(296, 'Kabupaten Alor', 'Nusa Tenggara Timur'),
(297, 'Kabupaten Lembata', 'Nusa Tenggara Timur'),
(298, 'Kabupaten Flores Timur', 'Nusa Tenggara Timur'),
(299, 'Kabupaten Sikka', 'Nusa Tenggara Timur'),
(300, 'Kabupaten Ende', 'Nusa Tenggara Timur'),
(301, 'Kabupaten Ngada', 'Nusa Tenggara Timur'),
(302, 'Kabupaten Manggarai', 'Nusa Tenggara Timur'),
(303, 'Kabupaten Rote Ndao', 'Nusa Tenggara Timur'),
(304, 'Kabupaten Manggarai Barat', 'Nusa Tenggara Timur'),
(305, 'Kabupaten Sumba Tengah', 'Nusa Tenggara Timur'),
(306, 'Kabupaten Sumba Barat Daya', 'Nusa Tenggara Timur'),
(307, 'Kabupaten Nagekeo', 'Nusa Tenggara Timur'),
(308, 'Kabupaten Manggarai Timur', 'Nusa Tenggara Timur'),
(309, 'Kabupaten Sabu Raijua', 'Nusa Tenggara Timur'),
(310, 'Kabupaten Malaka', 'Nusa Tenggara Timur'),
(311, 'Kota Kupang', 'Nusa Tenggara Timur'),
(312, 'Kabupaten Sambas', 'Kalimantan Barat'),
(313, 'Kabupaten Bengkayang', 'Kalimantan Barat'),
(314, 'Kabupaten Landak', 'Kalimantan Barat'),
(315, 'Kabupaten Mempawah', 'Kalimantan Barat'),
(316, 'Kabupaten Sanggau', 'Kalimantan Barat'),
(317, 'Kabupaten Ketapang', 'Kalimantan Barat'),
(318, 'Kabupaten Sintang', 'Kalimantan Barat'),
(319, 'Kabupaten Kapuas Hulu', 'Kalimantan Barat'),
(320, 'Kabupaten Sekadau', 'Kalimantan Barat'),
(321, 'Kabupaten Melawi', 'Kalimantan Barat'),
(322, 'Kabupaten Kayong Utara', 'Kalimantan Barat'),
(323, 'Kabupaten Kubu Raya', 'Kalimantan Barat'),
(324, 'Kota Pontianak', 'Kalimantan Barat'),
(325, 'Kota Sengkawang', 'Kalimantan Barat'),
(326, 'Kabupaten Kotawaringin Barat', 'Kalimantan Tengah'),
(327, 'Kabupaten Kotawaringin Timur', 'Kalimantan Tengah'),
(328, 'Kabupaten Kapuas', 'Kalimantan Tengah'),
(329, 'Kabupaten Barito Selatan', 'Kalimantan Tengah'),
(330, 'Kabupaten Barito Utara', 'Kalimantan Tengah'),
(331, 'Kabupaten Sukamara', 'Kalimantan Tengah'),
(332, 'Kabupaten Lamandau', 'Kalimantan Tengah'),
(333, 'Kabupaten Seruyan', 'Kalimantan Tengah'),
(334, 'Kabupaten Katingan', 'Kalimantan Tengah'),
(335, 'Kabupaten Pulang Pisau', 'Kalimantan Tengah'),
(336, 'Kabupaten Gunung Mas', 'Kalimantan Tengah'),
(337, 'Kabupaten Barito Timur', 'Kalimantan Tengah'),
(338, 'Kabupaten Murung Raya', 'Kalimantan Tengah'),
(339, 'Kota Palangkaraya', 'Kalimantan Tengah'),
(340, 'Kabupaten Tanah Laut', 'Kalimantan Selatan'),
(341, 'Kabupaten Kota Baru', 'Kalimantan Selatan'),
(342, 'Kabupaten Banjar', 'Kalimantan Selatan'),
(343, 'Kabupaten Barito Kuala', 'Kalimantan Selatan'),
(344, 'Kabupaten Tapin', 'Kalimantan Selatan'),
(345, 'Kabupaten Hulu Sungai Selatan', 'Kalimantan Selatan'),
(346, 'Kabupaten Hulu Sungai Tengah', 'Kalimantan Selatan'),
(347, 'Kabupaten Hulu Sungai Utara', 'Kalimantan Selatan'),
(348, 'Kabupaten Tabalong', 'Kalimantan Selatan'),
(349, 'Kabupaten Tanah Bumbu', 'Kalimantan Selatan'),
(350, 'Kabupaten Balangan', 'Kalimantan Selatan'),
(351, 'Kota Banjarmasin', 'Kalimantan Selatan'),
(352, 'Kota Banjar Baru', 'Kalimantan Selatan'),
(353, 'Kabupaten Paser', 'Kalimantan Timur'),
(354, 'Kabupaten Kutai Barat', 'Kalimantan Timur'),
(355, 'Kabupaten Kutai Kartanegara', 'Kalimantan Timur'),
(356, 'Kabupaten Kutai Timur', 'Kalimantan Timur'),
(357, 'Kabupaten Berau', 'Kalimantan Timur'),
(358, 'Kabupaten Penajam Paser Utara', 'Kalimantan Timur'),
(359, 'Kabupaten Mahakam Hulu', 'Kalimantan Timur'),
(360, 'Kota Balikpapan', 'Kalimantan Timur'),
(361, 'Kota Samarinda', 'Kalimantan Timur'),
(362, 'Kota Bontang', 'Kalimantan Timur'),
(363, 'Kabupaten Malinau', 'Kalimantan Utara'),
(364, 'Kabupaten Bulungan', 'Kalimantan Utara'),
(365, 'Kabupaten Tana Tidung', 'Kalimantan Utara'),
(366, 'Kabupaten Nunukan', 'Kalimantan Utara'),
(367, 'Kota Tarakan', 'Kalimantan Utara'),
(368, 'Kabupaten Bolaang Mongondow', 'Sulawesi Utara'),
(369, 'Kabupaten Minahasa', 'Sulawesi Utara'),
(370, 'Kabupaten Kepulauan Sangihe', 'Sulawesi Utara'),
(371, 'Kabupaten Kepulauan Talaud', 'Sulawesi Utara'),
(372, 'Kabupaten Minahasa Selatan', 'Sulawesi Utara'),
(373, 'Kabupaten Minahasa Utara', 'Sulawesi Utara'),
(374, 'Kabupaten Bolaang Mongondow Utara', 'Sulawesi Utara'),
(375, 'Kabupaten Siau Tagulandang Biaro', 'Sulawesi Utara'),
(376, 'Kabupaten Minahasa Tenggara', 'Sulawesi Utara'),
(377, 'Kabupaten Bolaang Mongondow Selatan', 'Sulawesi Utara'),
(378, 'Kabupaten Bolaang Mongondow Timur', 'Sulawesi Utara'),
(379, 'Kota Manado', 'Sulawesi Utara'),
(380, 'Kota Bitung', 'Sulawesi Utara'),
(381, 'Kota Tomohon', 'Sulawesi Utara'),
(382, 'Kota Kotamobagu', 'Sulawesi Utara'),
(383, 'Kabupaten Banggai Kepulauan', 'Sulawesi Tengah'),
(384, 'Kabupaten Banggai', 'Sulawesi Tengah'),
(385, 'Kabupaten Morowali', 'Sulawesi Tengah'),
(386, 'Kabupaten Poso', 'Sulawesi Tengah'),
(387, 'Kabupaten Donggala', 'Sulawesi Tengah'),
(388, 'Kabupaten Toli-Toli', 'Sulawesi Tengah'),
(389, 'Kabupaten Buol', 'Sulawesi Tengah'),
(390, 'Kabupaten Parigi Moutong', 'Sulawesi Tengah'),
(391, 'Kabupaten Tojo Una-Una', 'Sulawesi Tengah'),
(392, 'Kabupaten Sigi', 'Sulawesi Tengah'),
(393, 'Kabupaten Banggai Laut', 'Sulawesi Tengah'),
(394, 'Kabupaten Morowali Utara', 'Sulawesi Tengah'),
(395, 'Kota Palu', 'Sulawesi Tengah'),
(396, 'Kabupaten Kepulauan Selayar', 'Sulawesi Selatan'),
(397, 'Kabupaten Bulukumba', 'Sulawesi Selatan'),
(398, 'Kabupaten Bantaeng', 'Sulawesi Selatan'),
(399, 'Kabupaten Joneponto', 'Sulawesi Selatan'),
(400, 'Kabupaten Takalar', 'Sulawesi Selatan'),
(401, 'Kabupaten Gowa', 'Sulawesi Selatan'),
(402, 'Kabupaten Sinjai', 'Sulawesi Selatan'),
(403, 'Kabupaten Maros', 'Sulawesi Selatan'),
(404, 'Kabupaten Pangkajene Dan Kepulauan', 'Sulawesi Selatan'),
(405, 'Kabupaten Barru', 'Sulawesi Selatan'),
(406, 'Kabupaten Bone', 'Sulawesi Selatan'),
(407, 'Kabupaten Soppeng', 'Sulawesi Selatan'),
(408, 'Kabupaten Wajo', 'Sulawesi Selatan'),
(409, 'Kabupaten Sidenreng Rappang', 'Sulawesi Selatan'),
(410, 'Kabupaten Pinrang', 'Sulawesi Selatan'),
(411, 'Kabupaten Enrekang', 'Sulawesi Selatan'),
(412, 'Kabupaten Luwu', 'Sulawesi Selatan'),
(413, 'Kabupaten Tana Toraja', 'Sulawesi Selatan'),
(414, 'Kabupaten Luwu Utara', 'Sulawesi Selatan'),
(415, 'Kabupaten Luwu Timur', 'Sulawesi Selatan'),
(416, 'Kabupaten Toraja Utara', 'Sulawesi Selatan'),
(417, 'Kota Makassar', 'Sulawesi Selatan'),
(418, 'Kota Parepare', 'Sulawesi Selatan'),
(419, 'Kota Palopo', 'Sulawesi Selatan'),
(420, 'Kabupaten Buton', 'Sulawesi Tenggara'),
(421, 'Kabupaten Muna', 'Sulawesi Tenggara'),
(422, 'Kabupaten Konawe', 'Sulawesi Tenggara'),
(423, 'Kabupaten Kolaka', 'Sulawesi Tenggara'),
(424, 'Kabupaten Konawe Selatan', 'Sulawesi Tenggara'),
(425, 'Kabupaten Bombana', 'Sulawesi Tenggara'),
(426, 'Kabupaten Wakatobi', 'Sulawesi Tenggara'),
(427, 'Kabupaten Kolaka Utara', 'Sulawesi Tenggara'),
(428, 'Kabupaten Buton Utara', 'Sulawesi Tenggara'),
(429, 'Kabupaten Konawe Utara', 'Sulawesi Tenggara'),
(430, 'Kabupaten Kolaka Timur', 'Sulawesi Tenggara'),
(431, 'Kabupaten Monawe Kepulauan', 'Sulawesi Tenggara'),
(432, 'Kabupaten Muna Barat', 'Sulawesi Tenggara'),
(433, 'Kabupaten Buton Tengah', 'Sulawesi Tenggara'),
(434, 'Kabupaten Buton Selatan', 'Sulawesi Tenggara'),
(435, 'Kota Kendari', 'Sulawesi Tenggara'),
(436, 'Kota Baubau', 'Sulawesi Tenggara'),
(437, 'Kabupaten Boalemo', 'Gorontalo'),
(438, 'Kabupaten Gorontalo', 'Gorontalo'),
(439, 'Kabupaten Pahuwato', 'Gorontalo'),
(440, 'Kabupaten Bone Bolango', 'Gorontalo'),
(441, 'Kabupaten Gorontalo Utara', 'Gorontalo'),
(442, 'Kota Gorontalo', 'Gorontalo'),
(443, 'Kabupaten Majene', 'Sulawesi Barat'),
(444, 'Kabupaten Polewali Mandar', 'Sulawesi Barat'),
(445, 'Kabupaten Mamasa', 'Sulawesi Barat'),
(446, 'Kabupaten Mamuju', 'Sulawesi Barat'),
(447, 'Kabupaten Mamuju Utara', 'Sulawesi Barat'),
(448, 'Kabupaten Mamuju Tengah', 'Sulawesi Barat'),
(449, 'Kabupaten Maluku Tenggara Barat', 'Maluku'),
(450, 'Kabupaten Maluku Tenggara', 'Maluku'),
(451, 'Kabupaten Maluku Tengah', 'Maluku'),
(452, 'Kabupaten Buru', 'Maluku'),
(453, 'Kabupaten Kepulauan Aru', 'Maluku'),
(454, 'Kabupaten Seram Bagian Barat', 'Maluku'),
(455, 'Kabupaten Seram Bagian Timur', 'Maluku'),
(456, 'Kabupaten Maluku Bagian Daya', 'Maluku'),
(457, 'Kabupaten Buru Selatan', 'Maluku'),
(458, 'Kota Ambon', 'Maluku'),
(459, 'Kota Tual', 'Maluku'),
(460, 'Kabupaten Halmahera Barat', 'Maluku Utara'),
(461, 'Kabupaten Halmahera Tengah', 'Maluku Utara'),
(462, 'Kabupaten Kepulauan Sula', 'Maluku Utara'),
(463, 'Kabupaten Halmahera Selatan', 'Maluku Utara'),
(464, 'Kabupaten Halmahera Utara', 'Maluku Utara'),
(465, 'Kabupaten Halmahera Timur', 'Maluku Utara'),
(466, 'Kabupaten Pulau Morotai', 'Maluku Utara'),
(467, 'Kabupaten Pulau Taliabu', 'Maluku Utara'),
(468, 'Kota Ternate', 'Maluku Utara'),
(469, 'Kota Tidore Kepulauan', 'Maluku Utara'),
(470, 'Kabupaten FakFak', 'Papua Barat'),
(471, 'Kabupaten Kaimana', 'Papua Barat'),
(472, 'Kabupaten Teluk Wondama', 'Papua Barat'),
(473, 'Kabupaten Teluk Bintuni', 'Papua Barat'),
(474, 'Kabupaten Manokwari', 'Papua Barat'),
(475, 'Kabupaten Sorong Selatan', 'Papua Barat'),
(476, 'Kabupaten Sorong', 'Papua Barat'),
(477, 'Kabupaten Raja Ampat', 'Papua Barat'),
(478, 'Kabupaten Tambrauw', 'Papua Barat'),
(479, 'Kabupaten Maybrat', 'Papua Barat'),
(480, 'Kabupaten Manokwari Selatan', 'Papua Barat'),
(481, 'Kabupaten Pegunungan Arfak', 'Papua Barat'),
(482, 'Kota Sorong', 'Papua Barat'),
(483, 'Kabupaten Merauke', 'Papua'),
(484, 'Kabupaten Jayawijaya', 'Papua'),
(485, 'Kabupaten Jayapura', 'Papua'),
(486, 'Kabupaten Nabire', 'Papua'),
(487, 'Kabupaten Kepulauan Yapen', 'Papua'),
(488, 'Kabupaten Biak Numfor', 'Papua'),
(489, 'Kabupaten Paniai', 'Papua'),
(490, 'Kabupaten Puncak Jaya', 'Papua'),
(491, 'Kabupaten Mimika', 'Papua'),
(492, 'Kabupaten Boven Digoel', 'Papua'),
(493, 'Kabupaten Mappi', 'Papua'),
(494, 'Kabupaten Asmat', 'Papua'),
(495, 'Kabupaten Yakuhimo', 'Papua'),
(496, 'Kabupaten Pegunungan Bintang', 'Papua'),
(497, 'Kabupaten Tolikara', 'Papua'),
(498, 'Kabupaten Sarmi', 'Papua'),
(499, 'Kabupaten Keerom', 'Papua'),
(500, 'Kabupaten Waropen', 'Papua'),
(501, 'Kabupaten Supiori', 'Papua'),
(502, 'Kabupaten Mamberamo Raya', 'Papua'),
(503, 'Kabupaten Nduga', 'Papua'),
(504, 'Kabupaten Lanny Jaya', 'Papua'),
(505, 'Kabupaten Mamberamo Tengah', 'Papua'),
(506, 'Kabupaten Yalimo', 'Papua'),
(507, 'Kabupaten Puncak', 'Papua'),
(508, 'Kabupaten Dogiyai', 'Papua'),
(509, 'Kabupaten Intan Jaya', 'Papua'),
(510, 'Kabupaten Deiyai', 'Papua'),
(511, 'Kota Jayapura', 'Papua');

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_login`
--

CREATE TABLE `db_login` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(128) CHARACTER SET latin1 NOT NULL,
  `email` varchar(128) CHARACTER SET latin1 NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) CHARACTER SET latin1 NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `tgl` varchar(255) NOT NULL,
  `bulan` varchar(255) NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `nama_bisnis` varchar(255) NOT NULL,
  `kota_kabupaten` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kategori` int(11) NOT NULL,
  `subkategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `db_login`
--

INSERT INTO `db_login` (`id_pengguna`, `nama_pengguna`, `email`, `image`, `password`, `username`, `role_id`, `is_active`, `date_created`, `tgl`, `bulan`, `tahun`, `nama_bisnis`, `kota_kabupaten`, `provinsi`, `kategori`, `subkategori`) VALUES
(1, 'alx', 'alx.yoi67@gmail.com', 'admin.png', 'alx123', 'alx', 1, 1, 0, '28', 'April', '2021', '', '', '', 0, ''),
(4, 'oda', 'satudua.au@gmail.com', 'admin.png', '12345', 'odading', 2, 1, 1621671323, '22', 'Mei', '2021', 'usaha halal', 'Kota Malang', 'Jawa Timur', 2, 'teh'),
(9, 'yonanda', 'yonandaharyono@gmail.com', 'admin.png', '12345', 'yonanda', 2, 1, 1622183708, '28', 'Mei', '2021', '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_outlet`
--

CREATE TABLE `db_outlet` (
  `outlet_id` int(20) NOT NULL,
  `nama_outlet` varchar(255) NOT NULL,
  `nama_bisnis` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota_id` int(11) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `telpon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `db_outlet`
--

INSERT INTO `db_outlet` (`outlet_id`, `nama_outlet`, `nama_bisnis`, `alamat`, `kota_id`, `kota`, `provinsi`, `telpon`) VALUES
(19, 'ngops2 Pusat', 'Ngops', 'BMR', 24, 'Kabupaten Nias', 'Sumatera Utara', '0823 3105 0979'),
(22, 'werwrw', 'usaha halal', 'werwrw', 4, 'Kabupaten Aceh Tenggara', 'Aceh', '0023 4234 2424');

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_pelanggan`
--

CREATE TABLE `db_pelanggan` (
  `id_pelanggan` int(30) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `kode_pos` varchar(255) NOT NULL,
  `catatan` text NOT NULL,
  `no_telp` int(12) NOT NULL,
  `email` varchar(200) NOT NULL,
  `tgl_lahir` varchar(255) NOT NULL,
  `kota_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_produk`
--

CREATE TABLE `db_produk` (
  `id_produk` int(30) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `nama_bisnis` varchar(255) NOT NULL,
  `outlet_id` varchar(255) NOT NULL,
  `harga_jual` int(30) NOT NULL,
  `id_kategori` varchar(50) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `diskon` int(11) NOT NULL,
  `diskon_persen` varchar(128) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `db_produk`
--

INSERT INTO `db_produk` (`id_produk`, `nama_produk`, `nama_bisnis`, `outlet_id`, `harga_jual`, `id_kategori`, `gambar`, `diskon`, `diskon_persen`, `total`) VALUES
(4, 'Matcha Latte', 'usaha halal', '19', 18000, '2', 'matchalatte.png', 0, '0', 18000),
(5, 'Hot Choco', 'usaha halal', '19', 14000, '2', 'hotChoco.png', 0, '0', 14000),
(6, 'Kopi Susu', 'usaha halal', '19', 10000, '2', 'kopisusu.png', 0, '0', 10000),
(8, 'Es Jahe Anget', 'usaha halal', '22', 18000, '2', 'jahe.png', 8000, '45', 10000),
(16, 'Kaos', 'usaha halal', '22', 120000, '6', 'kaos.png', 12000, '10', 108000),
(20, 'Roti', 'usaha halal', '22', 14000, '4', 'produk.png', 0, '0', 14000),
(21, 'Taro', 'usaha halal', '22', 15000, '2', 'produk.png', 0, '0', 15000),
(22, 'STMJ', 'usaha halal', '22', 18900, '2', 'produk.png', 0, '0', 18900),
(23, 'Jajan', 'usaha halal', '22', 5000, '4', 'produk.png', 0, '0', 5000),
(24, 'Mie Ayam', 'usaha halal', '22', 7000, '4', 'produk.png', 0, '0', 7000),
(25, 'Rujak', 'usaha halal', '22', 9000, '4', 'produk.png', 0, '0', 9000),
(26, 'Bakso', 'usaha halal', '22', 7000, '4', 'produk.png', 0, '0', 7000),
(27, 'Pizza', 'usaha halal', '22', 250000, '4', 'produk.png', 0, '0', 250000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_riwayat_transaksi`
--

CREATE TABLE `db_riwayat_transaksi` (
  `id_transaksi` int(30) NOT NULL,
  `id_pengguna` int(30) NOT NULL,
  `id_pelanggan` int(30) NOT NULL,
  `id_produk` int(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `waktu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_stok`
--

CREATE TABLE `db_stok` (
  `id_stok` int(11) NOT NULL,
  `id_produk` varchar(25) NOT NULL,
  `stok_awal` int(11) DEFAULT NULL,
  `stok_masuk` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `stok_keluar` int(11) DEFAULT NULL,
  `penjualan` int(11) DEFAULT NULL,
  `transfer` int(11) DEFAULT NULL,
  `harga_beli` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `db_stok`
--

INSERT INTO `db_stok` (`id_stok`, `id_produk`, `stok_awal`, `stok_masuk`, `jumlah`, `stok_keluar`, `penjualan`, `transfer`, `harga_beli`) VALUES
(1, '1', 0, 10, NULL, 5, 0, 0, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_stok_keluar`
--

CREATE TABLE `db_stok_keluar` (
  `id_stok_keluar` int(11) NOT NULL,
  `kode_stok_keluar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_stok_masuk`
--

CREATE TABLE `db_stok_masuk` (
  `id_stok_masuk` int(11) NOT NULL,
  `kode_stok_masuk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 1),
(11, 2, 9),
(12, 1, 17),
(13, 1, 11),
(14, 2, 12),
(17, 2, 13),
(18, 2, 16),
(19, 4, 1),
(20, 4, 16),
(21, 5, 1),
(22, 5, 9),
(24, 5, 13),
(25, 5, 16),
(26, 2, 10),
(27, 4, 19),
(28, 5, 19);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 'Dashboard', 'home', 'home', 1),
(2, 'Role', 'role', 'monitor', 1),
(3, 'Pengguna', 'pengguna', 'users', 1),
(4, 'Management', '-', 'grid', 1),
(9, 'Produk', 'produk', 'package', 1),
(10, 'Outlet', 'outlet', 'move', 1),
(12, 'Karyawan', 'karyawan', 'database', 1),
(13, 'Inventori', '-', 'package', 1),
(16, 'Transaksi', 'transaksi', 'shopping-cart', 1),
(17, 'Kategori', '-', 'tag', 1),
(19, 'Pelanggan', 'pelanggan', 'users', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`role_id`, `role`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Superuser'),
(4, 'Kasir'),
(5, 'Staff');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `sub_icon` varchar(255) NOT NULL,
  `sub_url` varchar(255) NOT NULL,
  `sub_is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `sub_title`, `sub_icon`, `sub_url`, `sub_is_active`) VALUES
(1, 13, 'Stok Masuk', 'download', 'stok_masuk', 1),
(2, 13, 'Stok Keluar', 'upload', 'stok_keluar', 1),
(3, 4, 'Menu Management', 'grid', 'menu', 1),
(4, 4, 'SubMenu Management', 'grid', 'submenu', 1),
(5, 17, 'Kategori', 'tag', 'kategoribisnis', 1),
(6, 17, 'Sub Kategori', 'tag', 'subkategori', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `db_access_kategori`
--
ALTER TABLE `db_access_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `db_access_subkategori`
--
ALTER TABLE `db_access_subkategori`
  ADD PRIMARY KEY (`subkategori_id`);

--
-- Indeks untuk tabel `db_detail_stok_keluar`
--
ALTER TABLE `db_detail_stok_keluar`
  ADD PRIMARY KEY (`detail_keluar_id`);

--
-- Indeks untuk tabel `db_detail_stok_masuk`
--
ALTER TABLE `db_detail_stok_masuk`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indeks untuk tabel `db_karyawan`
--
ALTER TABLE `db_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `db_kategori`
--
ALTER TABLE `db_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `db_kota`
--
ALTER TABLE `db_kota`
  ADD PRIMARY KEY (`kota_id`);

--
-- Indeks untuk tabel `db_login`
--
ALTER TABLE `db_login`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `role_id` (`role_id`);

--
-- Indeks untuk tabel `db_outlet`
--
ALTER TABLE `db_outlet`
  ADD PRIMARY KEY (`outlet_id`);

--
-- Indeks untuk tabel `db_pelanggan`
--
ALTER TABLE `db_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `db_produk`
--
ALTER TABLE `db_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `db_riwayat_transaksi`
--
ALTER TABLE `db_riwayat_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `db_stok`
--
ALTER TABLE `db_stok`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indeks untuk tabel `db_stok_keluar`
--
ALTER TABLE `db_stok_keluar`
  ADD PRIMARY KEY (`id_stok_keluar`);

--
-- Indeks untuk tabel `db_stok_masuk`
--
ALTER TABLE `db_stok_masuk`
  ADD PRIMARY KEY (`id_stok_masuk`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `db_access_kategori`
--
ALTER TABLE `db_access_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `db_access_subkategori`
--
ALTER TABLE `db_access_subkategori`
  MODIFY `subkategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `db_detail_stok_keluar`
--
ALTER TABLE `db_detail_stok_keluar`
  MODIFY `detail_keluar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `db_detail_stok_masuk`
--
ALTER TABLE `db_detail_stok_masuk`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `db_karyawan`
--
ALTER TABLE `db_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `db_kategori`
--
ALTER TABLE `db_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `db_kota`
--
ALTER TABLE `db_kota`
  MODIFY `kota_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=512;

--
-- AUTO_INCREMENT untuk tabel `db_login`
--
ALTER TABLE `db_login`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `db_outlet`
--
ALTER TABLE `db_outlet`
  MODIFY `outlet_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `db_pelanggan`
--
ALTER TABLE `db_pelanggan`
  MODIFY `id_pelanggan` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `db_produk`
--
ALTER TABLE `db_produk`
  MODIFY `id_produk` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `db_riwayat_transaksi`
--
ALTER TABLE `db_riwayat_transaksi`
  MODIFY `id_transaksi` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `db_stok`
--
ALTER TABLE `db_stok`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `db_stok_keluar`
--
ALTER TABLE `db_stok_keluar`
  MODIFY `id_stok_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `db_stok_masuk`
--
ALTER TABLE `db_stok_masuk`
  MODIFY `id_stok_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
