-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 19 Jun 2020 pada 23.47
-- Versi server: 8.0.20-0ubuntu0.20.04.1
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wagimansupply`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about`
--

CREATE TABLE `about` (
  `id` int NOT NULL,
  `web_name` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `ceo` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `province` int NOT NULL,
  `city` int NOT NULL,
  `created_date` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `about`
--

INSERT INTO `about` (`id`, `web_name`, `image`, `ceo`, `description`, `address`, `phone`, `email`, `province`, `city`, `created_date`) VALUES
(1, 'Wagiman Supply', 'wagiman_supply.jpeg', 'Andi Setiawan', '<h1>Sejarah Wagiman Supply</h1>\r\n\r\n<blockquote>\r\n<pre>\r\n<em>Hello, Ini adalah Awal ceritaku</em></pre>\r\n</blockquote>\r\n', 'KP.PANUNGGANGAN BARAT KEL.PANUNGGANGAN BARAT KEC.CIBODAS KOTA TANGERANG', '62895337813520', 'hello@wagimansupply.com', 3, 456, 1592192557);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth`
--

CREATE TABLE `auth` (
  `id` int NOT NULL,
  `role_id` tinyint(1) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `password` varchar(250) NOT NULL,
  `is_actived` tinyint(1) NOT NULL,
  `last_login` int NOT NULL,
  `address` text NOT NULL,
  `created_date` int NOT NULL,
  `updated_date` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `auth`
--

INSERT INTO `auth` (`id`, `role_id`, `fullname`, `image`, `email`, `phone`, `password`, `is_actived`, `last_login`, `address`, `created_date`, `updated_date`) VALUES
(1, 1, 'Andi Setiawan', 'pp.jpeg', 'hello@wagimansupply.com', '6283893504806', '$2y$10$We70GSpdaArwL1ZmtU6GcelrdGI0MqcGtx653GrLD4cAYcNDW3gY6', 1, 1592584188, ' KP.PANUNGGANGAN BARAT KEL.PANUNGGANGAN BARAT KEC.CIBODAS KOTA TANGERANG', 1590213690, 1592274653),
(2, 2, 'Abi Amarulloh', 'ig.png', 'abiamarulloh06@gmail.com', '62895337813520', '$2y$10$Y1Vd1F/Whbf8YQAtgTMZ7OVUaevsCR/Orx.G/XalIQYUfckeuxVZS', 1, 1592455665, 'Jl. Kh. Maulana Hasanudin Kel.Porisgaga Kec. batu ceper, Gg.pintu air No 50, kodepos. 15122', 1590373922, 1592293700);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_token`
--

CREATE TABLE `auth_token` (
  `id` int NOT NULL,
  `email` varchar(250) NOT NULL,
  `token` varchar(128) NOT NULL,
  `created_date` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank_payment`
--

CREATE TABLE `bank_payment` (
  `id` int NOT NULL,
  `bank_name` varchar(250) NOT NULL,
  `on_behalf_of_the` varchar(250) NOT NULL,
  `account_number` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bank_payment`
--

INSERT INTO `bank_payment` (`id`, `bank_name`, `on_behalf_of_the`, `account_number`) VALUES
(1, 'BCA', 'Andi Setiawan', '8102910291201'),
(2, 'BRI', 'Andi Setiawan', '0210291289192');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `id` int NOT NULL,
  `title` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `body` text NOT NULL,
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  `created_date` int NOT NULL,
  `updated_date` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog_category`
--

CREATE TABLE `blog_category` (
  `id` int NOT NULL,
  `name` varchar(250) NOT NULL,
  `created_date` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `brand`
--

CREATE TABLE `brand` (
  `id` int NOT NULL,
  `image` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `user_id` int NOT NULL,
  `created_date` int NOT NULL,
  `updated_date` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `carausel`
--

CREATE TABLE `carausel` (
  `id` int NOT NULL,
  `image` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `menu_url` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `choose_id` int NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `city`
--

CREATE TABLE `city` (
  `id` int NOT NULL,
  `city_id` int NOT NULL,
  `province_id` int NOT NULL,
  `province` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `city_name` varchar(250) NOT NULL,
  `postal_code` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `city`
--

INSERT INTO `city` (`id`, `city_id`, `province_id`, `province`, `type`, `city_name`, `postal_code`) VALUES
(1, 1, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Aceh Barat', '23681'),
(2, 2, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Aceh Barat Daya', '23764'),
(3, 3, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Aceh Besar', '23951'),
(4, 4, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Aceh Jaya', '23654'),
(5, 5, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Aceh Selatan', '23719'),
(6, 6, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Aceh Singkil', '24785'),
(7, 7, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Aceh Tamiang', '24476'),
(8, 8, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Aceh Tengah', '24511'),
(9, 9, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Aceh Tenggara', '24611'),
(10, 10, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Aceh Timur', '24454'),
(11, 11, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Aceh Utara', '24382'),
(12, 12, 32, 'Sumatera Barat', 'Kabupaten', 'Agam', '26411'),
(13, 13, 23, 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Alor', '85811'),
(14, 14, 19, 'Maluku', 'Kota', 'Ambon', '97222'),
(15, 15, 34, 'Sumatera Utara', 'Kabupaten', 'Asahan', '21214'),
(16, 16, 24, 'Papua', 'Kabupaten', 'Asmat', '99777'),
(17, 17, 1, 'Bali', 'Kabupaten', 'Badung', '80351'),
(18, 18, 13, 'Kalimantan Selatan', 'Kabupaten', 'Balangan', '71611'),
(19, 19, 15, 'Kalimantan Timur', 'Kota', 'Balikpapan', '76111'),
(20, 20, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Kota', 'Banda Aceh', '23238'),
(21, 21, 18, 'Lampung', 'Kota', 'Bandar Lampung', '35139'),
(22, 22, 9, 'Jawa Barat', 'Kabupaten', 'Bandung', '40311'),
(23, 23, 9, 'Jawa Barat', 'Kota', 'Bandung', '40111'),
(24, 24, 9, 'Jawa Barat', 'Kabupaten', 'Bandung Barat', '40721'),
(25, 25, 29, 'Sulawesi Tengah', 'Kabupaten', 'Banggai', '94711'),
(26, 26, 29, 'Sulawesi Tengah', 'Kabupaten', 'Banggai Kepulauan', '94881'),
(27, 27, 2, 'Bangka Belitung', 'Kabupaten', 'Bangka', '33212'),
(28, 28, 2, 'Bangka Belitung', 'Kabupaten', 'Bangka Barat', '33315'),
(29, 29, 2, 'Bangka Belitung', 'Kabupaten', 'Bangka Selatan', '33719'),
(30, 30, 2, 'Bangka Belitung', 'Kabupaten', 'Bangka Tengah', '33613'),
(31, 31, 11, 'Jawa Timur', 'Kabupaten', 'Bangkalan', '69118'),
(32, 32, 1, 'Bali', 'Kabupaten', 'Bangli', '80619'),
(33, 33, 13, 'Kalimantan Selatan', 'Kabupaten', 'Banjar', '70619'),
(34, 34, 9, 'Jawa Barat', 'Kota', 'Banjar', '46311'),
(35, 35, 13, 'Kalimantan Selatan', 'Kota', 'Banjarbaru', '70712'),
(36, 36, 13, 'Kalimantan Selatan', 'Kota', 'Banjarmasin', '70117'),
(37, 37, 10, 'Jawa Tengah', 'Kabupaten', 'Banjarnegara', '53419'),
(38, 38, 28, 'Sulawesi Selatan', 'Kabupaten', 'Bantaeng', '92411'),
(39, 39, 5, 'DI Yogyakarta', 'Kabupaten', 'Bantul', '55715'),
(40, 40, 33, 'Sumatera Selatan', 'Kabupaten', 'Banyuasin', '30911'),
(41, 41, 10, 'Jawa Tengah', 'Kabupaten', 'Banyumas', '53114'),
(42, 42, 11, 'Jawa Timur', 'Kabupaten', 'Banyuwangi', '68416'),
(43, 43, 13, 'Kalimantan Selatan', 'Kabupaten', 'Barito Kuala', '70511'),
(44, 44, 14, 'Kalimantan Tengah', 'Kabupaten', 'Barito Selatan', '73711'),
(45, 45, 14, 'Kalimantan Tengah', 'Kabupaten', 'Barito Timur', '73671'),
(46, 46, 14, 'Kalimantan Tengah', 'Kabupaten', 'Barito Utara', '73881'),
(47, 47, 28, 'Sulawesi Selatan', 'Kabupaten', 'Barru', '90719'),
(48, 48, 17, 'Kepulauan Riau', 'Kota', 'Batam', '29413'),
(49, 49, 10, 'Jawa Tengah', 'Kabupaten', 'Batang', '51211'),
(50, 50, 8, 'Jambi', 'Kabupaten', 'Batang Hari', '36613'),
(51, 51, 11, 'Jawa Timur', 'Kota', 'Batu', '65311'),
(52, 52, 34, 'Sumatera Utara', 'Kabupaten', 'Batu Bara', '21655'),
(53, 53, 30, 'Sulawesi Tenggara', 'Kota', 'Bau-Bau', '93719'),
(54, 54, 9, 'Jawa Barat', 'Kabupaten', 'Bekasi', '17837'),
(55, 55, 9, 'Jawa Barat', 'Kota', 'Bekasi', '17121'),
(56, 56, 2, 'Bangka Belitung', 'Kabupaten', 'Belitung', '33419'),
(57, 57, 2, 'Bangka Belitung', 'Kabupaten', 'Belitung Timur', '33519'),
(58, 58, 23, 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Belu', '85711'),
(59, 59, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Bener Meriah', '24581'),
(60, 60, 26, 'Riau', 'Kabupaten', 'Bengkalis', '28719'),
(61, 61, 12, 'Kalimantan Barat', 'Kabupaten', 'Bengkayang', '79213'),
(62, 62, 4, 'Bengkulu', 'Kota', 'Bengkulu', '38229'),
(63, 63, 4, 'Bengkulu', 'Kabupaten', 'Bengkulu Selatan', '38519'),
(64, 64, 4, 'Bengkulu', 'Kabupaten', 'Bengkulu Tengah', '38319'),
(65, 65, 4, 'Bengkulu', 'Kabupaten', 'Bengkulu Utara', '38619'),
(66, 66, 15, 'Kalimantan Timur', 'Kabupaten', 'Berau', '77311'),
(67, 67, 24, 'Papua', 'Kabupaten', 'Biak Numfor', '98119'),
(68, 68, 22, 'Nusa Tenggara Barat (NTB)', 'Kabupaten', 'Bima', '84171'),
(69, 69, 22, 'Nusa Tenggara Barat (NTB)', 'Kota', 'Bima', '84139'),
(70, 70, 34, 'Sumatera Utara', 'Kota', 'Binjai', '20712'),
(71, 71, 17, 'Kepulauan Riau', 'Kabupaten', 'Bintan', '29135'),
(72, 72, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Bireuen', '24219'),
(73, 73, 31, 'Sulawesi Utara', 'Kota', 'Bitung', '95512'),
(74, 74, 11, 'Jawa Timur', 'Kabupaten', 'Blitar', '66171'),
(75, 75, 11, 'Jawa Timur', 'Kota', 'Blitar', '66124'),
(76, 76, 10, 'Jawa Tengah', 'Kabupaten', 'Blora', '58219'),
(77, 77, 7, 'Gorontalo', 'Kabupaten', 'Boalemo', '96319'),
(78, 78, 9, 'Jawa Barat', 'Kabupaten', 'Bogor', '16911'),
(79, 79, 9, 'Jawa Barat', 'Kota', 'Bogor', '16119'),
(80, 80, 11, 'Jawa Timur', 'Kabupaten', 'Bojonegoro', '62119'),
(81, 81, 31, 'Sulawesi Utara', 'Kabupaten', 'Bolaang Mongondow (Bolmong)', '95755'),
(82, 82, 31, 'Sulawesi Utara', 'Kabupaten', 'Bolaang Mongondow Selatan', '95774'),
(83, 83, 31, 'Sulawesi Utara', 'Kabupaten', 'Bolaang Mongondow Timur', '95783'),
(84, 84, 31, 'Sulawesi Utara', 'Kabupaten', 'Bolaang Mongondow Utara', '95765'),
(85, 85, 30, 'Sulawesi Tenggara', 'Kabupaten', 'Bombana', '93771'),
(86, 86, 11, 'Jawa Timur', 'Kabupaten', 'Bondowoso', '68219'),
(87, 87, 28, 'Sulawesi Selatan', 'Kabupaten', 'Bone', '92713'),
(88, 88, 7, 'Gorontalo', 'Kabupaten', 'Bone Bolango', '96511'),
(89, 89, 15, 'Kalimantan Timur', 'Kota', 'Bontang', '75313'),
(90, 90, 24, 'Papua', 'Kabupaten', 'Boven Digoel', '99662'),
(91, 91, 10, 'Jawa Tengah', 'Kabupaten', 'Boyolali', '57312'),
(92, 92, 10, 'Jawa Tengah', 'Kabupaten', 'Brebes', '52212'),
(93, 93, 32, 'Sumatera Barat', 'Kota', 'Bukittinggi', '26115'),
(94, 94, 1, 'Bali', 'Kabupaten', 'Buleleng', '81111'),
(95, 95, 28, 'Sulawesi Selatan', 'Kabupaten', 'Bulukumba', '92511'),
(96, 96, 16, 'Kalimantan Utara', 'Kabupaten', 'Bulungan (Bulongan)', '77211'),
(97, 97, 8, 'Jambi', 'Kabupaten', 'Bungo', '37216'),
(98, 98, 29, 'Sulawesi Tengah', 'Kabupaten', 'Buol', '94564'),
(99, 99, 19, 'Maluku', 'Kabupaten', 'Buru', '97371'),
(100, 100, 19, 'Maluku', 'Kabupaten', 'Buru Selatan', '97351'),
(101, 101, 30, 'Sulawesi Tenggara', 'Kabupaten', 'Buton', '93754'),
(102, 102, 30, 'Sulawesi Tenggara', 'Kabupaten', 'Buton Utara', '93745'),
(103, 103, 9, 'Jawa Barat', 'Kabupaten', 'Ciamis', '46211'),
(104, 104, 9, 'Jawa Barat', 'Kabupaten', 'Cianjur', '43217'),
(105, 105, 10, 'Jawa Tengah', 'Kabupaten', 'Cilacap', '53211'),
(106, 106, 3, 'Banten', 'Kota', 'Cilegon', '42417'),
(107, 107, 9, 'Jawa Barat', 'Kota', 'Cimahi', '40512'),
(108, 108, 9, 'Jawa Barat', 'Kabupaten', 'Cirebon', '45611'),
(109, 109, 9, 'Jawa Barat', 'Kota', 'Cirebon', '45116'),
(110, 110, 34, 'Sumatera Utara', 'Kabupaten', 'Dairi', '22211'),
(111, 111, 24, 'Papua', 'Kabupaten', 'Deiyai (Deliyai)', '98784'),
(112, 112, 34, 'Sumatera Utara', 'Kabupaten', 'Deli Serdang', '20511'),
(113, 113, 10, 'Jawa Tengah', 'Kabupaten', 'Demak', '59519'),
(114, 114, 1, 'Bali', 'Kota', 'Denpasar', '80227'),
(115, 115, 9, 'Jawa Barat', 'Kota', 'Depok', '16416'),
(116, 116, 32, 'Sumatera Barat', 'Kabupaten', 'Dharmasraya', '27612'),
(117, 117, 24, 'Papua', 'Kabupaten', 'Dogiyai', '98866'),
(118, 118, 22, 'Nusa Tenggara Barat (NTB)', 'Kabupaten', 'Dompu', '84217'),
(119, 119, 29, 'Sulawesi Tengah', 'Kabupaten', 'Donggala', '94341'),
(120, 120, 26, 'Riau', 'Kota', 'Dumai', '28811'),
(121, 121, 33, 'Sumatera Selatan', 'Kabupaten', 'Empat Lawang', '31811'),
(122, 122, 23, 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Ende', '86351'),
(123, 123, 28, 'Sulawesi Selatan', 'Kabupaten', 'Enrekang', '91719'),
(124, 124, 25, 'Papua Barat', 'Kabupaten', 'Fakfak', '98651'),
(125, 125, 23, 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Flores Timur', '86213'),
(126, 126, 9, 'Jawa Barat', 'Kabupaten', 'Garut', '44126'),
(127, 127, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Gayo Lues', '24653'),
(128, 128, 1, 'Bali', 'Kabupaten', 'Gianyar', '80519'),
(129, 129, 7, 'Gorontalo', 'Kabupaten', 'Gorontalo', '96218'),
(130, 130, 7, 'Gorontalo', 'Kota', 'Gorontalo', '96115'),
(131, 131, 7, 'Gorontalo', 'Kabupaten', 'Gorontalo Utara', '96611'),
(132, 132, 28, 'Sulawesi Selatan', 'Kabupaten', 'Gowa', '92111'),
(133, 133, 11, 'Jawa Timur', 'Kabupaten', 'Gresik', '61115'),
(134, 134, 10, 'Jawa Tengah', 'Kabupaten', 'Grobogan', '58111'),
(135, 135, 5, 'DI Yogyakarta', 'Kabupaten', 'Gunung Kidul', '55812'),
(136, 136, 14, 'Kalimantan Tengah', 'Kabupaten', 'Gunung Mas', '74511'),
(137, 137, 34, 'Sumatera Utara', 'Kota', 'Gunungsitoli', '22813'),
(138, 138, 20, 'Maluku Utara', 'Kabupaten', 'Halmahera Barat', '97757'),
(139, 139, 20, 'Maluku Utara', 'Kabupaten', 'Halmahera Selatan', '97911'),
(140, 140, 20, 'Maluku Utara', 'Kabupaten', 'Halmahera Tengah', '97853'),
(141, 141, 20, 'Maluku Utara', 'Kabupaten', 'Halmahera Timur', '97862'),
(142, 142, 20, 'Maluku Utara', 'Kabupaten', 'Halmahera Utara', '97762'),
(143, 143, 13, 'Kalimantan Selatan', 'Kabupaten', 'Hulu Sungai Selatan', '71212'),
(144, 144, 13, 'Kalimantan Selatan', 'Kabupaten', 'Hulu Sungai Tengah', '71313'),
(145, 145, 13, 'Kalimantan Selatan', 'Kabupaten', 'Hulu Sungai Utara', '71419'),
(146, 146, 34, 'Sumatera Utara', 'Kabupaten', 'Humbang Hasundutan', '22457'),
(147, 147, 26, 'Riau', 'Kabupaten', 'Indragiri Hilir', '29212'),
(148, 148, 26, 'Riau', 'Kabupaten', 'Indragiri Hulu', '29319'),
(149, 149, 9, 'Jawa Barat', 'Kabupaten', 'Indramayu', '45214'),
(150, 150, 24, 'Papua', 'Kabupaten', 'Intan Jaya', '98771'),
(151, 151, 6, 'DKI Jakarta', 'Kota', 'Jakarta Barat', '11220'),
(152, 152, 6, 'DKI Jakarta', 'Kota', 'Jakarta Pusat', '10540'),
(153, 153, 6, 'DKI Jakarta', 'Kota', 'Jakarta Selatan', '12230'),
(154, 154, 6, 'DKI Jakarta', 'Kota', 'Jakarta Timur', '13330'),
(155, 155, 6, 'DKI Jakarta', 'Kota', 'Jakarta Utara', '14140'),
(156, 156, 8, 'Jambi', 'Kota', 'Jambi', '36111'),
(157, 157, 24, 'Papua', 'Kabupaten', 'Jayapura', '99352'),
(158, 158, 24, 'Papua', 'Kota', 'Jayapura', '99114'),
(159, 159, 24, 'Papua', 'Kabupaten', 'Jayawijaya', '99511'),
(160, 160, 11, 'Jawa Timur', 'Kabupaten', 'Jember', '68113'),
(161, 161, 1, 'Bali', 'Kabupaten', 'Jembrana', '82251'),
(162, 162, 28, 'Sulawesi Selatan', 'Kabupaten', 'Jeneponto', '92319'),
(163, 163, 10, 'Jawa Tengah', 'Kabupaten', 'Jepara', '59419'),
(164, 164, 11, 'Jawa Timur', 'Kabupaten', 'Jombang', '61415'),
(165, 165, 25, 'Papua Barat', 'Kabupaten', 'Kaimana', '98671'),
(166, 166, 26, 'Riau', 'Kabupaten', 'Kampar', '28411'),
(167, 167, 14, 'Kalimantan Tengah', 'Kabupaten', 'Kapuas', '73583'),
(168, 168, 12, 'Kalimantan Barat', 'Kabupaten', 'Kapuas Hulu', '78719'),
(169, 169, 10, 'Jawa Tengah', 'Kabupaten', 'Karanganyar', '57718'),
(170, 170, 1, 'Bali', 'Kabupaten', 'Karangasem', '80819'),
(171, 171, 9, 'Jawa Barat', 'Kabupaten', 'Karawang', '41311'),
(172, 172, 17, 'Kepulauan Riau', 'Kabupaten', 'Karimun', '29611'),
(173, 173, 34, 'Sumatera Utara', 'Kabupaten', 'Karo', '22119'),
(174, 174, 14, 'Kalimantan Tengah', 'Kabupaten', 'Katingan', '74411'),
(175, 175, 4, 'Bengkulu', 'Kabupaten', 'Kaur', '38911'),
(176, 176, 12, 'Kalimantan Barat', 'Kabupaten', 'Kayong Utara', '78852'),
(177, 177, 10, 'Jawa Tengah', 'Kabupaten', 'Kebumen', '54319'),
(178, 178, 11, 'Jawa Timur', 'Kabupaten', 'Kediri', '64184'),
(179, 179, 11, 'Jawa Timur', 'Kota', 'Kediri', '64125'),
(180, 180, 24, 'Papua', 'Kabupaten', 'Keerom', '99461'),
(181, 181, 10, 'Jawa Tengah', 'Kabupaten', 'Kendal', '51314'),
(182, 182, 30, 'Sulawesi Tenggara', 'Kota', 'Kendari', '93126'),
(183, 183, 4, 'Bengkulu', 'Kabupaten', 'Kepahiang', '39319'),
(184, 184, 17, 'Kepulauan Riau', 'Kabupaten', 'Kepulauan Anambas', '29991'),
(185, 185, 19, 'Maluku', 'Kabupaten', 'Kepulauan Aru', '97681'),
(186, 186, 32, 'Sumatera Barat', 'Kabupaten', 'Kepulauan Mentawai', '25771'),
(187, 187, 26, 'Riau', 'Kabupaten', 'Kepulauan Meranti', '28791'),
(188, 188, 31, 'Sulawesi Utara', 'Kabupaten', 'Kepulauan Sangihe', '95819'),
(189, 189, 6, 'DKI Jakarta', 'Kabupaten', 'Kepulauan Seribu', '14550'),
(190, 190, 31, 'Sulawesi Utara', 'Kabupaten', 'Kepulauan Siau Tagulandang Biaro (Sitaro)', '95862'),
(191, 191, 20, 'Maluku Utara', 'Kabupaten', 'Kepulauan Sula', '97995'),
(192, 192, 31, 'Sulawesi Utara', 'Kabupaten', 'Kepulauan Talaud', '95885'),
(193, 193, 24, 'Papua', 'Kabupaten', 'Kepulauan Yapen (Yapen Waropen)', '98211'),
(194, 194, 8, 'Jambi', 'Kabupaten', 'Kerinci', '37167'),
(195, 195, 12, 'Kalimantan Barat', 'Kabupaten', 'Ketapang', '78874'),
(196, 196, 10, 'Jawa Tengah', 'Kabupaten', 'Klaten', '57411'),
(197, 197, 1, 'Bali', 'Kabupaten', 'Klungkung', '80719'),
(198, 198, 30, 'Sulawesi Tenggara', 'Kabupaten', 'Kolaka', '93511'),
(199, 199, 30, 'Sulawesi Tenggara', 'Kabupaten', 'Kolaka Utara', '93911'),
(200, 200, 30, 'Sulawesi Tenggara', 'Kabupaten', 'Konawe', '93411'),
(201, 201, 30, 'Sulawesi Tenggara', 'Kabupaten', 'Konawe Selatan', '93811'),
(202, 202, 30, 'Sulawesi Tenggara', 'Kabupaten', 'Konawe Utara', '93311'),
(203, 203, 13, 'Kalimantan Selatan', 'Kabupaten', 'Kotabaru', '72119'),
(204, 204, 31, 'Sulawesi Utara', 'Kota', 'Kotamobagu', '95711'),
(205, 205, 14, 'Kalimantan Tengah', 'Kabupaten', 'Kotawaringin Barat', '74119'),
(206, 206, 14, 'Kalimantan Tengah', 'Kabupaten', 'Kotawaringin Timur', '74364'),
(207, 207, 26, 'Riau', 'Kabupaten', 'Kuantan Singingi', '29519'),
(208, 208, 12, 'Kalimantan Barat', 'Kabupaten', 'Kubu Raya', '78311'),
(209, 209, 10, 'Jawa Tengah', 'Kabupaten', 'Kudus', '59311'),
(210, 210, 5, 'DI Yogyakarta', 'Kabupaten', 'Kulon Progo', '55611'),
(211, 211, 9, 'Jawa Barat', 'Kabupaten', 'Kuningan', '45511'),
(212, 212, 23, 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Kupang', '85362'),
(213, 213, 23, 'Nusa Tenggara Timur (NTT)', 'Kota', 'Kupang', '85119'),
(214, 214, 15, 'Kalimantan Timur', 'Kabupaten', 'Kutai Barat', '75711'),
(215, 215, 15, 'Kalimantan Timur', 'Kabupaten', 'Kutai Kartanegara', '75511'),
(216, 216, 15, 'Kalimantan Timur', 'Kabupaten', 'Kutai Timur', '75611'),
(217, 217, 34, 'Sumatera Utara', 'Kabupaten', 'Labuhan Batu', '21412'),
(218, 218, 34, 'Sumatera Utara', 'Kabupaten', 'Labuhan Batu Selatan', '21511'),
(219, 219, 34, 'Sumatera Utara', 'Kabupaten', 'Labuhan Batu Utara', '21711'),
(220, 220, 33, 'Sumatera Selatan', 'Kabupaten', 'Lahat', '31419'),
(221, 221, 14, 'Kalimantan Tengah', 'Kabupaten', 'Lamandau', '74611'),
(222, 222, 11, 'Jawa Timur', 'Kabupaten', 'Lamongan', '64125'),
(223, 223, 18, 'Lampung', 'Kabupaten', 'Lampung Barat', '34814'),
(224, 224, 18, 'Lampung', 'Kabupaten', 'Lampung Selatan', '35511'),
(225, 225, 18, 'Lampung', 'Kabupaten', 'Lampung Tengah', '34212'),
(226, 226, 18, 'Lampung', 'Kabupaten', 'Lampung Timur', '34319'),
(227, 227, 18, 'Lampung', 'Kabupaten', 'Lampung Utara', '34516'),
(228, 228, 12, 'Kalimantan Barat', 'Kabupaten', 'Landak', '78319'),
(229, 229, 34, 'Sumatera Utara', 'Kabupaten', 'Langkat', '20811'),
(230, 230, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Kota', 'Langsa', '24412'),
(231, 231, 24, 'Papua', 'Kabupaten', 'Lanny Jaya', '99531'),
(232, 232, 3, 'Banten', 'Kabupaten', 'Lebak', '42319'),
(233, 233, 4, 'Bengkulu', 'Kabupaten', 'Lebong', '39264'),
(234, 234, 23, 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Lembata', '86611'),
(235, 235, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Kota', 'Lhokseumawe', '24352'),
(236, 236, 32, 'Sumatera Barat', 'Kabupaten', 'Lima Puluh Koto/Kota', '26671'),
(237, 237, 17, 'Kepulauan Riau', 'Kabupaten', 'Lingga', '29811'),
(238, 238, 22, 'Nusa Tenggara Barat (NTB)', 'Kabupaten', 'Lombok Barat', '83311'),
(239, 239, 22, 'Nusa Tenggara Barat (NTB)', 'Kabupaten', 'Lombok Tengah', '83511'),
(240, 240, 22, 'Nusa Tenggara Barat (NTB)', 'Kabupaten', 'Lombok Timur', '83612'),
(241, 241, 22, 'Nusa Tenggara Barat (NTB)', 'Kabupaten', 'Lombok Utara', '83711'),
(242, 242, 33, 'Sumatera Selatan', 'Kota', 'Lubuk Linggau', '31614'),
(243, 243, 11, 'Jawa Timur', 'Kabupaten', 'Lumajang', '67319'),
(244, 244, 28, 'Sulawesi Selatan', 'Kabupaten', 'Luwu', '91994'),
(245, 245, 28, 'Sulawesi Selatan', 'Kabupaten', 'Luwu Timur', '92981'),
(246, 246, 28, 'Sulawesi Selatan', 'Kabupaten', 'Luwu Utara', '92911'),
(247, 247, 11, 'Jawa Timur', 'Kabupaten', 'Madiun', '63153'),
(248, 248, 11, 'Jawa Timur', 'Kota', 'Madiun', '63122'),
(249, 249, 10, 'Jawa Tengah', 'Kabupaten', 'Magelang', '56519'),
(250, 250, 10, 'Jawa Tengah', 'Kota', 'Magelang', '56133'),
(251, 251, 11, 'Jawa Timur', 'Kabupaten', 'Magetan', '63314'),
(252, 252, 9, 'Jawa Barat', 'Kabupaten', 'Majalengka', '45412'),
(253, 253, 27, 'Sulawesi Barat', 'Kabupaten', 'Majene', '91411'),
(254, 254, 28, 'Sulawesi Selatan', 'Kota', 'Makassar', '90111'),
(255, 255, 11, 'Jawa Timur', 'Kabupaten', 'Malang', '65163'),
(256, 256, 11, 'Jawa Timur', 'Kota', 'Malang', '65112'),
(257, 257, 16, 'Kalimantan Utara', 'Kabupaten', 'Malinau', '77511'),
(258, 258, 19, 'Maluku', 'Kabupaten', 'Maluku Barat Daya', '97451'),
(259, 259, 19, 'Maluku', 'Kabupaten', 'Maluku Tengah', '97513'),
(260, 260, 19, 'Maluku', 'Kabupaten', 'Maluku Tenggara', '97651'),
(261, 261, 19, 'Maluku', 'Kabupaten', 'Maluku Tenggara Barat', '97465'),
(262, 262, 27, 'Sulawesi Barat', 'Kabupaten', 'Mamasa', '91362'),
(263, 263, 24, 'Papua', 'Kabupaten', 'Mamberamo Raya', '99381'),
(264, 264, 24, 'Papua', 'Kabupaten', 'Mamberamo Tengah', '99553'),
(265, 265, 27, 'Sulawesi Barat', 'Kabupaten', 'Mamuju', '91519'),
(266, 266, 27, 'Sulawesi Barat', 'Kabupaten', 'Mamuju Utara', '91571'),
(267, 267, 31, 'Sulawesi Utara', 'Kota', 'Manado', '95247'),
(268, 268, 34, 'Sumatera Utara', 'Kabupaten', 'Mandailing Natal', '22916'),
(269, 269, 23, 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Manggarai', '86551'),
(270, 270, 23, 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Manggarai Barat', '86711'),
(271, 271, 23, 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Manggarai Timur', '86811'),
(272, 272, 25, 'Papua Barat', 'Kabupaten', 'Manokwari', '98311'),
(273, 273, 25, 'Papua Barat', 'Kabupaten', 'Manokwari Selatan', '98355'),
(274, 274, 24, 'Papua', 'Kabupaten', 'Mappi', '99853'),
(275, 275, 28, 'Sulawesi Selatan', 'Kabupaten', 'Maros', '90511'),
(276, 276, 22, 'Nusa Tenggara Barat (NTB)', 'Kota', 'Mataram', '83131'),
(277, 277, 25, 'Papua Barat', 'Kabupaten', 'Maybrat', '98051'),
(278, 278, 34, 'Sumatera Utara', 'Kota', 'Medan', '20228'),
(279, 279, 12, 'Kalimantan Barat', 'Kabupaten', 'Melawi', '78619'),
(280, 280, 8, 'Jambi', 'Kabupaten', 'Merangin', '37319'),
(281, 281, 24, 'Papua', 'Kabupaten', 'Merauke', '99613'),
(282, 282, 18, 'Lampung', 'Kabupaten', 'Mesuji', '34911'),
(283, 283, 18, 'Lampung', 'Kota', 'Metro', '34111'),
(284, 284, 24, 'Papua', 'Kabupaten', 'Mimika', '99962'),
(285, 285, 31, 'Sulawesi Utara', 'Kabupaten', 'Minahasa', '95614'),
(286, 286, 31, 'Sulawesi Utara', 'Kabupaten', 'Minahasa Selatan', '95914'),
(287, 287, 31, 'Sulawesi Utara', 'Kabupaten', 'Minahasa Tenggara', '95995'),
(288, 288, 31, 'Sulawesi Utara', 'Kabupaten', 'Minahasa Utara', '95316'),
(289, 289, 11, 'Jawa Timur', 'Kabupaten', 'Mojokerto', '61382'),
(290, 290, 11, 'Jawa Timur', 'Kota', 'Mojokerto', '61316'),
(291, 291, 29, 'Sulawesi Tengah', 'Kabupaten', 'Morowali', '94911'),
(292, 292, 33, 'Sumatera Selatan', 'Kabupaten', 'Muara Enim', '31315'),
(293, 293, 8, 'Jambi', 'Kabupaten', 'Muaro Jambi', '36311'),
(294, 294, 4, 'Bengkulu', 'Kabupaten', 'Muko Muko', '38715'),
(295, 295, 30, 'Sulawesi Tenggara', 'Kabupaten', 'Muna', '93611'),
(296, 296, 14, 'Kalimantan Tengah', 'Kabupaten', 'Murung Raya', '73911'),
(297, 297, 33, 'Sumatera Selatan', 'Kabupaten', 'Musi Banyuasin', '30719'),
(298, 298, 33, 'Sumatera Selatan', 'Kabupaten', 'Musi Rawas', '31661'),
(299, 299, 24, 'Papua', 'Kabupaten', 'Nabire', '98816'),
(300, 300, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Nagan Raya', '23674'),
(301, 301, 23, 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Nagekeo', '86911'),
(302, 302, 17, 'Kepulauan Riau', 'Kabupaten', 'Natuna', '29711'),
(303, 303, 24, 'Papua', 'Kabupaten', 'Nduga', '99541'),
(304, 304, 23, 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Ngada', '86413'),
(305, 305, 11, 'Jawa Timur', 'Kabupaten', 'Nganjuk', '64414'),
(306, 306, 11, 'Jawa Timur', 'Kabupaten', 'Ngawi', '63219'),
(307, 307, 34, 'Sumatera Utara', 'Kabupaten', 'Nias', '22876'),
(308, 308, 34, 'Sumatera Utara', 'Kabupaten', 'Nias Barat', '22895'),
(309, 309, 34, 'Sumatera Utara', 'Kabupaten', 'Nias Selatan', '22865'),
(310, 310, 34, 'Sumatera Utara', 'Kabupaten', 'Nias Utara', '22856'),
(311, 311, 16, 'Kalimantan Utara', 'Kabupaten', 'Nunukan', '77421'),
(312, 312, 33, 'Sumatera Selatan', 'Kabupaten', 'Ogan Ilir', '30811'),
(313, 313, 33, 'Sumatera Selatan', 'Kabupaten', 'Ogan Komering Ilir', '30618'),
(314, 314, 33, 'Sumatera Selatan', 'Kabupaten', 'Ogan Komering Ulu', '32112'),
(315, 315, 33, 'Sumatera Selatan', 'Kabupaten', 'Ogan Komering Ulu Selatan', '32211'),
(316, 316, 33, 'Sumatera Selatan', 'Kabupaten', 'Ogan Komering Ulu Timur', '32312'),
(317, 317, 11, 'Jawa Timur', 'Kabupaten', 'Pacitan', '63512'),
(318, 318, 32, 'Sumatera Barat', 'Kota', 'Padang', '25112'),
(319, 319, 34, 'Sumatera Utara', 'Kabupaten', 'Padang Lawas', '22763'),
(320, 320, 34, 'Sumatera Utara', 'Kabupaten', 'Padang Lawas Utara', '22753'),
(321, 321, 32, 'Sumatera Barat', 'Kota', 'Padang Panjang', '27122'),
(322, 322, 32, 'Sumatera Barat', 'Kabupaten', 'Padang Pariaman', '25583'),
(323, 323, 34, 'Sumatera Utara', 'Kota', 'Padang Sidempuan', '22727'),
(324, 324, 33, 'Sumatera Selatan', 'Kota', 'Pagar Alam', '31512'),
(325, 325, 34, 'Sumatera Utara', 'Kabupaten', 'Pakpak Bharat', '22272'),
(326, 326, 14, 'Kalimantan Tengah', 'Kota', 'Palangka Raya', '73112'),
(327, 327, 33, 'Sumatera Selatan', 'Kota', 'Palembang', '30111'),
(328, 328, 28, 'Sulawesi Selatan', 'Kota', 'Palopo', '91911'),
(329, 329, 29, 'Sulawesi Tengah', 'Kota', 'Palu', '94111'),
(330, 330, 11, 'Jawa Timur', 'Kabupaten', 'Pamekasan', '69319'),
(331, 331, 3, 'Banten', 'Kabupaten', 'Pandeglang', '42212'),
(332, 332, 9, 'Jawa Barat', 'Kabupaten', 'Pangandaran', '46511'),
(333, 333, 28, 'Sulawesi Selatan', 'Kabupaten', 'Pangkajene Kepulauan', '90611'),
(334, 334, 2, 'Bangka Belitung', 'Kota', 'Pangkal Pinang', '33115'),
(335, 335, 24, 'Papua', 'Kabupaten', 'Paniai', '98765'),
(336, 336, 28, 'Sulawesi Selatan', 'Kota', 'Parepare', '91123'),
(337, 337, 32, 'Sumatera Barat', 'Kota', 'Pariaman', '25511'),
(338, 338, 29, 'Sulawesi Tengah', 'Kabupaten', 'Parigi Moutong', '94411'),
(339, 339, 32, 'Sumatera Barat', 'Kabupaten', 'Pasaman', '26318'),
(340, 340, 32, 'Sumatera Barat', 'Kabupaten', 'Pasaman Barat', '26511'),
(341, 341, 15, 'Kalimantan Timur', 'Kabupaten', 'Paser', '76211'),
(342, 342, 11, 'Jawa Timur', 'Kabupaten', 'Pasuruan', '67153'),
(343, 343, 11, 'Jawa Timur', 'Kota', 'Pasuruan', '67118'),
(344, 344, 10, 'Jawa Tengah', 'Kabupaten', 'Pati', '59114'),
(345, 345, 32, 'Sumatera Barat', 'Kota', 'Payakumbuh', '26213'),
(346, 346, 25, 'Papua Barat', 'Kabupaten', 'Pegunungan Arfak', '98354'),
(347, 347, 24, 'Papua', 'Kabupaten', 'Pegunungan Bintang', '99573'),
(348, 348, 10, 'Jawa Tengah', 'Kabupaten', 'Pekalongan', '51161'),
(349, 349, 10, 'Jawa Tengah', 'Kota', 'Pekalongan', '51122'),
(350, 350, 26, 'Riau', 'Kota', 'Pekanbaru', '28112'),
(351, 351, 26, 'Riau', 'Kabupaten', 'Pelalawan', '28311'),
(352, 352, 10, 'Jawa Tengah', 'Kabupaten', 'Pemalang', '52319'),
(353, 353, 34, 'Sumatera Utara', 'Kota', 'Pematang Siantar', '21126'),
(354, 354, 15, 'Kalimantan Timur', 'Kabupaten', 'Penajam Paser Utara', '76311'),
(355, 355, 18, 'Lampung', 'Kabupaten', 'Pesawaran', '35312'),
(356, 356, 18, 'Lampung', 'Kabupaten', 'Pesisir Barat', '35974'),
(357, 357, 32, 'Sumatera Barat', 'Kabupaten', 'Pesisir Selatan', '25611'),
(358, 358, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Pidie', '24116'),
(359, 359, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Pidie Jaya', '24186'),
(360, 360, 28, 'Sulawesi Selatan', 'Kabupaten', 'Pinrang', '91251'),
(361, 361, 7, 'Gorontalo', 'Kabupaten', 'Pohuwato', '96419'),
(362, 362, 27, 'Sulawesi Barat', 'Kabupaten', 'Polewali Mandar', '91311'),
(363, 363, 11, 'Jawa Timur', 'Kabupaten', 'Ponorogo', '63411'),
(364, 364, 12, 'Kalimantan Barat', 'Kabupaten', 'Pontianak', '78971'),
(365, 365, 12, 'Kalimantan Barat', 'Kota', 'Pontianak', '78112'),
(366, 366, 29, 'Sulawesi Tengah', 'Kabupaten', 'Poso', '94615'),
(367, 367, 33, 'Sumatera Selatan', 'Kota', 'Prabumulih', '31121'),
(368, 368, 18, 'Lampung', 'Kabupaten', 'Pringsewu', '35719'),
(369, 369, 11, 'Jawa Timur', 'Kabupaten', 'Probolinggo', '67282'),
(370, 370, 11, 'Jawa Timur', 'Kota', 'Probolinggo', '67215'),
(371, 371, 14, 'Kalimantan Tengah', 'Kabupaten', 'Pulang Pisau', '74811'),
(372, 372, 20, 'Maluku Utara', 'Kabupaten', 'Pulau Morotai', '97771'),
(373, 373, 24, 'Papua', 'Kabupaten', 'Puncak', '98981'),
(374, 374, 24, 'Papua', 'Kabupaten', 'Puncak Jaya', '98979'),
(375, 375, 10, 'Jawa Tengah', 'Kabupaten', 'Purbalingga', '53312'),
(376, 376, 9, 'Jawa Barat', 'Kabupaten', 'Purwakarta', '41119'),
(377, 377, 10, 'Jawa Tengah', 'Kabupaten', 'Purworejo', '54111'),
(378, 378, 25, 'Papua Barat', 'Kabupaten', 'Raja Ampat', '98489'),
(379, 379, 4, 'Bengkulu', 'Kabupaten', 'Rejang Lebong', '39112'),
(380, 380, 10, 'Jawa Tengah', 'Kabupaten', 'Rembang', '59219'),
(381, 381, 26, 'Riau', 'Kabupaten', 'Rokan Hilir', '28992'),
(382, 382, 26, 'Riau', 'Kabupaten', 'Rokan Hulu', '28511'),
(383, 383, 23, 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Rote Ndao', '85982'),
(384, 384, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Kota', 'Sabang', '23512'),
(385, 385, 23, 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Sabu Raijua', '85391'),
(386, 386, 10, 'Jawa Tengah', 'Kota', 'Salatiga', '50711'),
(387, 387, 15, 'Kalimantan Timur', 'Kota', 'Samarinda', '75133'),
(388, 388, 12, 'Kalimantan Barat', 'Kabupaten', 'Sambas', '79453'),
(389, 389, 34, 'Sumatera Utara', 'Kabupaten', 'Samosir', '22392'),
(390, 390, 11, 'Jawa Timur', 'Kabupaten', 'Sampang', '69219'),
(391, 391, 12, 'Kalimantan Barat', 'Kabupaten', 'Sanggau', '78557'),
(392, 392, 24, 'Papua', 'Kabupaten', 'Sarmi', '99373'),
(393, 393, 8, 'Jambi', 'Kabupaten', 'Sarolangun', '37419'),
(394, 394, 32, 'Sumatera Barat', 'Kota', 'Sawah Lunto', '27416'),
(395, 395, 12, 'Kalimantan Barat', 'Kabupaten', 'Sekadau', '79583'),
(396, 396, 28, 'Sulawesi Selatan', 'Kabupaten', 'Selayar (Kepulauan Selayar)', '92812'),
(397, 397, 4, 'Bengkulu', 'Kabupaten', 'Seluma', '38811'),
(398, 398, 10, 'Jawa Tengah', 'Kabupaten', 'Semarang', '50511'),
(399, 399, 10, 'Jawa Tengah', 'Kota', 'Semarang', '50135'),
(400, 400, 19, 'Maluku', 'Kabupaten', 'Seram Bagian Barat', '97561'),
(401, 401, 19, 'Maluku', 'Kabupaten', 'Seram Bagian Timur', '97581'),
(402, 402, 3, 'Banten', 'Kabupaten', 'Serang', '42182'),
(403, 403, 3, 'Banten', 'Kota', 'Serang', '42111'),
(404, 404, 34, 'Sumatera Utara', 'Kabupaten', 'Serdang Bedagai', '20915'),
(405, 405, 14, 'Kalimantan Tengah', 'Kabupaten', 'Seruyan', '74211'),
(406, 406, 26, 'Riau', 'Kabupaten', 'Siak', '28623'),
(407, 407, 34, 'Sumatera Utara', 'Kota', 'Sibolga', '22522'),
(408, 408, 28, 'Sulawesi Selatan', 'Kabupaten', 'Sidenreng Rappang/Rapang', '91613'),
(409, 409, 11, 'Jawa Timur', 'Kabupaten', 'Sidoarjo', '61219'),
(410, 410, 29, 'Sulawesi Tengah', 'Kabupaten', 'Sigi', '94364'),
(411, 411, 32, 'Sumatera Barat', 'Kabupaten', 'Sijunjung (Sawah Lunto Sijunjung)', '27511'),
(412, 412, 23, 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Sikka', '86121'),
(413, 413, 34, 'Sumatera Utara', 'Kabupaten', 'Simalungun', '21162'),
(414, 414, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Simeulue', '23891'),
(415, 415, 12, 'Kalimantan Barat', 'Kota', 'Singkawang', '79117'),
(416, 416, 28, 'Sulawesi Selatan', 'Kabupaten', 'Sinjai', '92615'),
(417, 417, 12, 'Kalimantan Barat', 'Kabupaten', 'Sintang', '78619'),
(418, 418, 11, 'Jawa Timur', 'Kabupaten', 'Situbondo', '68316'),
(419, 419, 5, 'DI Yogyakarta', 'Kabupaten', 'Sleman', '55513'),
(420, 420, 32, 'Sumatera Barat', 'Kabupaten', 'Solok', '27365'),
(421, 421, 32, 'Sumatera Barat', 'Kota', 'Solok', '27315'),
(422, 422, 32, 'Sumatera Barat', 'Kabupaten', 'Solok Selatan', '27779'),
(423, 423, 28, 'Sulawesi Selatan', 'Kabupaten', 'Soppeng', '90812'),
(424, 424, 25, 'Papua Barat', 'Kabupaten', 'Sorong', '98431'),
(425, 425, 25, 'Papua Barat', 'Kota', 'Sorong', '98411'),
(426, 426, 25, 'Papua Barat', 'Kabupaten', 'Sorong Selatan', '98454'),
(427, 427, 10, 'Jawa Tengah', 'Kabupaten', 'Sragen', '57211'),
(428, 428, 9, 'Jawa Barat', 'Kabupaten', 'Subang', '41215'),
(429, 429, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Kota', 'Subulussalam', '24882'),
(430, 430, 9, 'Jawa Barat', 'Kabupaten', 'Sukabumi', '43311'),
(431, 431, 9, 'Jawa Barat', 'Kota', 'Sukabumi', '43114'),
(432, 432, 14, 'Kalimantan Tengah', 'Kabupaten', 'Sukamara', '74712'),
(433, 433, 10, 'Jawa Tengah', 'Kabupaten', 'Sukoharjo', '57514'),
(434, 434, 23, 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Sumba Barat', '87219'),
(435, 435, 23, 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Sumba Barat Daya', '87453'),
(436, 436, 23, 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Sumba Tengah', '87358'),
(437, 437, 23, 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Sumba Timur', '87112'),
(438, 438, 22, 'Nusa Tenggara Barat (NTB)', 'Kabupaten', 'Sumbawa', '84315'),
(439, 439, 22, 'Nusa Tenggara Barat (NTB)', 'Kabupaten', 'Sumbawa Barat', '84419'),
(440, 440, 9, 'Jawa Barat', 'Kabupaten', 'Sumedang', '45326'),
(441, 441, 11, 'Jawa Timur', 'Kabupaten', 'Sumenep', '69413'),
(442, 442, 8, 'Jambi', 'Kota', 'Sungaipenuh', '37113'),
(443, 443, 24, 'Papua', 'Kabupaten', 'Supiori', '98164'),
(444, 444, 11, 'Jawa Timur', 'Kota', 'Surabaya', '60119'),
(445, 445, 10, 'Jawa Tengah', 'Kota', 'Surakarta (Solo)', '57113'),
(446, 446, 13, 'Kalimantan Selatan', 'Kabupaten', 'Tabalong', '71513'),
(447, 447, 1, 'Bali', 'Kabupaten', 'Tabanan', '82119'),
(448, 448, 28, 'Sulawesi Selatan', 'Kabupaten', 'Takalar', '92212'),
(449, 449, 25, 'Papua Barat', 'Kabupaten', 'Tambrauw', '98475'),
(450, 450, 16, 'Kalimantan Utara', 'Kabupaten', 'Tana Tidung', '77611'),
(451, 451, 28, 'Sulawesi Selatan', 'Kabupaten', 'Tana Toraja', '91819'),
(452, 452, 13, 'Kalimantan Selatan', 'Kabupaten', 'Tanah Bumbu', '72211'),
(453, 453, 32, 'Sumatera Barat', 'Kabupaten', 'Tanah Datar', '27211'),
(454, 454, 13, 'Kalimantan Selatan', 'Kabupaten', 'Tanah Laut', '70811'),
(455, 455, 3, 'Banten', 'Kabupaten', 'Tangerang', '15914'),
(456, 456, 3, 'Banten', 'Kota', 'Tangerang', '15111'),
(457, 457, 3, 'Banten', 'Kota', 'Tangerang Selatan', '15332'),
(458, 458, 18, 'Lampung', 'Kabupaten', 'Tanggamus', '35619'),
(459, 459, 34, 'Sumatera Utara', 'Kota', 'Tanjung Balai', '21321'),
(460, 460, 8, 'Jambi', 'Kabupaten', 'Tanjung Jabung Barat', '36513'),
(461, 461, 8, 'Jambi', 'Kabupaten', 'Tanjung Jabung Timur', '36719'),
(462, 462, 17, 'Kepulauan Riau', 'Kota', 'Tanjung Pinang', '29111'),
(463, 463, 34, 'Sumatera Utara', 'Kabupaten', 'Tapanuli Selatan', '22742'),
(464, 464, 34, 'Sumatera Utara', 'Kabupaten', 'Tapanuli Tengah', '22611'),
(465, 465, 34, 'Sumatera Utara', 'Kabupaten', 'Tapanuli Utara', '22414'),
(466, 466, 13, 'Kalimantan Selatan', 'Kabupaten', 'Tapin', '71119'),
(467, 467, 16, 'Kalimantan Utara', 'Kota', 'Tarakan', '77114'),
(468, 468, 9, 'Jawa Barat', 'Kabupaten', 'Tasikmalaya', '46411'),
(469, 469, 9, 'Jawa Barat', 'Kota', 'Tasikmalaya', '46116'),
(470, 470, 34, 'Sumatera Utara', 'Kota', 'Tebing Tinggi', '20632'),
(471, 471, 8, 'Jambi', 'Kabupaten', 'Tebo', '37519'),
(472, 472, 10, 'Jawa Tengah', 'Kabupaten', 'Tegal', '52419'),
(473, 473, 10, 'Jawa Tengah', 'Kota', 'Tegal', '52114'),
(474, 474, 25, 'Papua Barat', 'Kabupaten', 'Teluk Bintuni', '98551'),
(475, 475, 25, 'Papua Barat', 'Kabupaten', 'Teluk Wondama', '98591'),
(476, 476, 10, 'Jawa Tengah', 'Kabupaten', 'Temanggung', '56212'),
(477, 477, 20, 'Maluku Utara', 'Kota', 'Ternate', '97714'),
(478, 478, 20, 'Maluku Utara', 'Kota', 'Tidore Kepulauan', '97815'),
(479, 479, 23, 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Timor Tengah Selatan', '85562'),
(480, 480, 23, 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Timor Tengah Utara', '85612'),
(481, 481, 34, 'Sumatera Utara', 'Kabupaten', 'Toba Samosir', '22316'),
(482, 482, 29, 'Sulawesi Tengah', 'Kabupaten', 'Tojo Una-Una', '94683'),
(483, 483, 29, 'Sulawesi Tengah', 'Kabupaten', 'Toli-Toli', '94542'),
(484, 484, 24, 'Papua', 'Kabupaten', 'Tolikara', '99411'),
(485, 485, 31, 'Sulawesi Utara', 'Kota', 'Tomohon', '95416'),
(486, 486, 28, 'Sulawesi Selatan', 'Kabupaten', 'Toraja Utara', '91831'),
(487, 487, 11, 'Jawa Timur', 'Kabupaten', 'Trenggalek', '66312'),
(488, 488, 19, 'Maluku', 'Kota', 'Tual', '97612'),
(489, 489, 11, 'Jawa Timur', 'Kabupaten', 'Tuban', '62319'),
(490, 490, 18, 'Lampung', 'Kabupaten', 'Tulang Bawang', '34613'),
(491, 491, 18, 'Lampung', 'Kabupaten', 'Tulang Bawang Barat', '34419'),
(492, 492, 11, 'Jawa Timur', 'Kabupaten', 'Tulungagung', '66212'),
(493, 493, 28, 'Sulawesi Selatan', 'Kabupaten', 'Wajo', '90911'),
(494, 494, 30, 'Sulawesi Tenggara', 'Kabupaten', 'Wakatobi', '93791'),
(495, 495, 24, 'Papua', 'Kabupaten', 'Waropen', '98269'),
(496, 496, 18, 'Lampung', 'Kabupaten', 'Way Kanan', '34711'),
(497, 497, 10, 'Jawa Tengah', 'Kabupaten', 'Wonogiri', '57619'),
(498, 498, 10, 'Jawa Tengah', 'Kabupaten', 'Wonosobo', '56311'),
(499, 499, 24, 'Papua', 'Kabupaten', 'Yahukimo', '99041'),
(500, 500, 24, 'Papua', 'Kabupaten', 'Yalimo', '99481'),
(501, 501, 5, 'DI Yogyakarta', 'Kota', 'Yogyakarta', '55111');

-- --------------------------------------------------------

--
-- Struktur dari tabel `image_product`
--

CREATE TABLE `image_product` (
  `id` int NOT NULL,
  `image_name` varchar(250) NOT NULL,
  `product_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `image_restorasi`
--

CREATE TABLE `image_restorasi` (
  `id` int NOT NULL,
  `image_name` varchar(250) NOT NULL,
  `restorasi_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE `invoice` (
  `id` int NOT NULL,
  `auth_id` int NOT NULL,
  `status` int NOT NULL COMMENT '0 = belum bayar , 1 = proses, 2 = dikirim, 3= selesai',
  `resi` varchar(250) NOT NULL,
  `image_payment` varchar(250) NOT NULL,
  `province_sender` int NOT NULL,
  `city_sender` int NOT NULL,
  `province_receiver` int NOT NULL,
  `city_receiver` int NOT NULL,
  `weight` int NOT NULL,
  `ekspedisi` varchar(250) NOT NULL,
  `sub_ekspedisi` varchar(250) NOT NULL,
  `date_buyying` int NOT NULL,
  `dateline_buyying` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_member`
--

CREATE TABLE `menu_member` (
  `id` int NOT NULL,
  `title` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL,
  `icon` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `menu_member`
--

INSERT INTO `menu_member` (`id`, `title`, `url`, `icon`) VALUES
(1, 'Home', 'home', 'fas fa-fw fa-home'),
(2, 'Online Shop', 'ecommerce', 'fa fa-fw fa-store'),
(3, 'Restorasi', 'restorasi.vespa', 'vespa.png'),
(4, 'Blog', 'blog', 'fab fa-fw fa-blogger'),
(5, 'Brands', 'brand', 'fas fa-fw fa-random'),
(6, 'About', 'about', 'fas fa-fw fa-address-card');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `invoice_id` int NOT NULL,
  `auth_id` int NOT NULL,
  `name` varchar(250) NOT NULL,
  `grand_qty` int NOT NULL,
  `grand_price` int NOT NULL,
  `created_date` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `image` varchar(250) NOT NULL,
  `name` varchar(120) NOT NULL,
  `description` text NOT NULL,
  `category_id` int NOT NULL,
  `price` int NOT NULL,
  `qty` int NOT NULL,
  `weight` int NOT NULL,
  `user_id` int NOT NULL,
  `brand_id` int NOT NULL,
  `created_date` int NOT NULL,
  `updated_date` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_category`
--

CREATE TABLE `product_category` (
  `id` int NOT NULL,
  `name` varchar(250) NOT NULL,
  `created_date` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `province`
--

CREATE TABLE `province` (
  `id` int NOT NULL,
  `province_id` int NOT NULL,
  `province` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `province`
--

INSERT INTO `province` (`id`, `province_id`, `province`) VALUES
(1, 1, 'Bali'),
(2, 2, 'Bangka Belitung'),
(3, 3, 'Banten'),
(4, 4, 'Bengkulu'),
(5, 5, 'DI Yogyakarta'),
(6, 6, 'DKI Jakarta'),
(7, 7, 'Gorontalo'),
(8, 8, 'Jambi'),
(9, 9, 'Jawa Barat'),
(10, 10, 'Jawa Tengah'),
(11, 11, 'Jawa Timur'),
(12, 12, 'Kalimantan Barat'),
(13, 13, 'Kalimantan Selatan'),
(14, 14, 'Kalimantan Tengah'),
(15, 15, 'Kalimantan Timur'),
(16, 16, 'Kalimantan Utara'),
(17, 17, 'Kepulauan Riau'),
(18, 18, 'Lampung'),
(19, 19, 'Maluku'),
(20, 20, 'Maluku Utara'),
(21, 21, 'Nanggroe Aceh Darussalam (NAD)'),
(22, 22, 'Nusa Tenggara Barat (NTB)'),
(23, 23, 'Nusa Tenggara Timur (NTT)'),
(24, 24, 'Papua'),
(25, 25, 'Papua Barat'),
(26, 26, 'Riau'),
(27, 27, 'Sulawesi Barat'),
(28, 28, 'Sulawesi Selatan'),
(29, 29, 'Sulawesi Tengah'),
(30, 30, 'Sulawesi Tenggara'),
(31, 31, 'Sulawesi Utara'),
(32, 32, 'Sumatera Barat'),
(33, 33, 'Sumatera Selatan'),
(34, 34, 'Sumatera Utara');

-- --------------------------------------------------------

--
-- Struktur dari tabel `restorasi`
--

CREATE TABLE `restorasi` (
  `id` int NOT NULL,
  `image` varchar(250) NOT NULL,
  `name_restorasi` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `created_date` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `social_media`
--

CREATE TABLE `social_media` (
  `id` int NOT NULL,
  `title` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL,
  `icon` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_token`
--
ALTER TABLE `auth_token`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bank_payment`
--
ALTER TABLE `bank_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `carausel`
--
ALTER TABLE `carausel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `image_product`
--
ALTER TABLE `image_product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `image_restorasi`
--
ALTER TABLE `image_restorasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu_member`
--
ALTER TABLE `menu_member`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `restorasi`
--
ALTER TABLE `restorasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `about`
--
ALTER TABLE `about`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `auth_token`
--
ALTER TABLE `auth_token`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `bank_payment`
--
ALTER TABLE `bank_payment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `carausel`
--
ALTER TABLE `carausel`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `city`
--
ALTER TABLE `city`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;

--
-- AUTO_INCREMENT untuk tabel `image_product`
--
ALTER TABLE `image_product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `image_restorasi`
--
ALTER TABLE `image_restorasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menu_member`
--
ALTER TABLE `menu_member`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `order`
--
ALTER TABLE `order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `province`
--
ALTER TABLE `province`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `restorasi`
--
ALTER TABLE `restorasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
