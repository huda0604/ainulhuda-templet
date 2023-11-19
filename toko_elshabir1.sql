-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Nov 2023 pada 12.14
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_elshabir1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_foto`
--

CREATE TABLE `produk_foto` (
  `id_produk_foto` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk_foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk_foto`
--

INSERT INTO `produk_foto` (`id_produk_foto`, `id_produk`, `nama_produk_foto`) VALUES
(98, 42, 'naga.jpg'),
(99, 43, 'alpukat.webp'),
(100, 41, '20231107152919alpukat.webp'),
(106, 45, 'semangka.jpg'),
(107, 46, 'salak.webp'),
(108, 47, 'salak.webp');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(16, 'Original'),
(17, 'super'),
(18, 'Biasa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`id_pembelian`, `id_user`, `tanggal_pembelian`, `total_pembelian`, `status`) VALUES
(21, 18, '2023-11-01', 23, 'Pending'),
(22, 18, '2023-10-02', 12, 'Pending'),
(23, 19, '2023-10-03', 52, 'Pending'),
(24, 20, '2023-10-04', 42, 'Pending'),
(25, 21, '2023-10-05', 78, 'Pending'),
(26, 22, '2023-10-06', 42, 'Pending'),
(27, 23, '2023-10-07', 120, 'Pending'),
(28, 23, '2023-11-09', 23, 'Pending'),
(29, 29, '2023-10-04', 64, 'Pending'),
(30, 30, '2023-10-05', 42, 'Pending'),
(31, 31, '2023-10-06', 134, 'Pending'),
(32, 32, '2023-10-07', 122, 'Pending'),
(33, 33, '2023-10-08', 91, 'Pending'),
(34, 34, '2023-10-09', 74, 'Pending'),
(35, 35, '2023-10-10', 65, 'Pending'),
(36, 36, '2023-10-11', 211, 'Pending'),
(37, 37, '2023-10-12', 111, 'Pending'),
(38, 38, '2023-10-13', 92, 'Pending'),
(39, 29, '2023-10-14', 142, 'Pending'),
(40, 30, '2023-10-15', 76, 'Pending'),
(41, 39, '2023-10-14', 122, 'Pending'),
(42, 40, '2023-10-15', 115, 'Pending'),
(43, 41, '2023-10-16', 97, 'Pending'),
(44, 42, '2023-10-17', 76, 'Pending'),
(45, 43, '2023-10-10', 53, 'Pending'),
(46, 44, '2023-10-19', 42, 'Pending'),
(47, 45, '2023-10-20', 27, 'Pending'),
(48, 46, '2023-11-21', 34, 'Pending'),
(49, 47, '2023-10-22', 76, 'Pending'),
(50, 48, '2023-10-23', 143, 'Pending'),
(51, 49, '2023-10-24', 65, 'Pending'),
(52, 50, '2023-10-25', 54, 'Pending'),
(53, 51, '2023-10-26', 34, 'Pending'),
(54, 52, '2023-10-27', 90, 'Pending'),
(55, 53, '2023-10-28', 65, 'Pending'),
(56, 54, '2023-10-29', 78, 'Pending'),
(57, 55, '2023-10-30', 45, 'Pending'),
(58, 56, '2023-10-31', 89, 'Pending'),
(59, 57, '2023-11-01', 34, 'Pending'),
(60, 58, '2023-11-02', 24, 'Pending'),
(61, 59, '2023-11-03', 67, 'Pending'),
(62, 60, '2023-11-04', 78, 'Pending'),
(63, 61, '2023-11-05', 23, 'Pending'),
(64, 62, '2023-11-06', 52, 'Pending'),
(65, 63, '2023-11-06', 12, 'Pending'),
(66, 64, '2023-11-07', 76, 'Pending'),
(67, 65, '2023-11-08', 23, 'Pending'),
(68, 66, '2023-11-09', 42, 'Pending'),
(69, 67, '2023-11-09', 12, 'Pending'),
(70, 68, '2023-11-10', 76, 'Pending'),
(71, 69, '2023-11-10', 12, 'Pending'),
(72, 70, '2023-11-11', 76, 'Pending'),
(73, 71, '2023-11-12', 97, 'Pending'),
(74, 72, '2023-11-13', 23, 'Pending'),
(75, 73, '2023-11-14', 52, 'Pending'),
(76, 74, '2023-11-15', 20, 'Pending'),
(77, 75, '2023-11-16', 35, 'Pending'),
(78, 76, '2023-11-16', 20, 'Pending'),
(79, 77, '2023-11-17', 35, 'Pending'),
(80, 78, '2023-11-18', 56, 'Pending'),
(81, 79, '2023-11-19', 78, 'Pending'),
(82, 80, '2023-11-20', 12, 'Pending'),
(83, 81, '2023-11-21', 35, 'Pending'),
(84, 82, '2023-11-22', 54, 'Pending'),
(85, 83, '2023-11-23', 34, 'Pending'),
(86, 84, '2023-11-24', 123, 'Pending'),
(87, 18, '2023-12-01', 23, 'Pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembelian_produk`
--

CREATE TABLE `tb_pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `sub_berat` int(11) NOT NULL,
  `sub_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pembelian_produk`
--

INSERT INTO `tb_pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `sub_berat`, `sub_harga`) VALUES
(27, 21, 40, 30, '', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `foto_produk` varchar(255) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `stok_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `id_user`, `id_kategori`, `nama_produk`, `harga_produk`, `foto_produk`, `deskripsi_produk`, `berat_produk`, `stok_produk`) VALUES
(41, 0, 2, 'semangka salah', 100000000, 'salak.webp', 'buah mengandung vitamin A', 8, 6),
(42, 0, 13, 'buah naga', 23, 'naga.jpg', 'buah mengadung daya tahan banting', 2, 12),
(43, 0, 8, 'nangka', 2, 'alpukat.webp', 'buah langkah', 12, 23),
(45, 0, 18, 'semangka', 12, 'semangka.jpg', 'semangka merah yang mengandung banyak vitamin', 1, 12),
(46, 0, 14, 'salak', 7000, 'salak.webp', 'buah manis ', 2, 34),
(47, 0, 16, 'salak', 12, 'salak.webp', 'buah manis ', 2, 60);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `alamat_user` varchar(100) NOT NULL,
  `no_telephone` varchar(15) DEFAULT NULL,
  `foto_user` varchar(255) NOT NULL,
  `role` enum('admin','pelanggan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama_user`, `alamat_user`, `no_telephone`, `foto_user`, `role`) VALUES
(17, 'admin', 'admin', 'ainul huda', 'kolo-kolo', '087749521862', '', 'admin'),
(18, 'user1', 'user1', 'huda', 'angon-angon', '09877462364', '', 'pelanggan'),
(19, 'user2', 'user2', 'well', 'banyu anyar', '0827482634', '', 'pelanggan'),
(20, 'admin2', 'admin2', 'ainul huda binti muhammad', 'batuan', '8786275625', '', 'admin'),
(29, 'ainul@gmail.com', '123456', 'ainul huda', 'kangean desa kolokolo', '0047826347216', 'Screenshot 2023-06-28 194944.png', 'pelanggan'),
(30, 'huda@gmail.com', 'kolokolo', 'ainulhuda', 'kolokolo', '9875946376583', 'logo.jpeg', 'pelanggan'),
(31, 'huda@gmail.com', 'kolokolo', 'ainulhuda', 'kolokolo', '9875946376583', 'logo.jpeg', 'pelanggan'),
(32, 'huda@gmail.com', 'kolokolo', 'ainulhuda', 'kolokolo', '9875946376583', 'logo.jpeg', 'pelanggan'),
(33, 'ainu@gmail.com', 'ainulhuda', 'AINUL HUDA', 'lenteng', '088347327', 'use case sangat baru.png', 'pelanggan'),
(34, 'ainul', 'huda', 'ainul huda', 'kolo-kolo', '084732492332', 'WhatsApp Image 2023-11-10 at 18.44.49.jpeg', 'pelanggan'),
(35, 'keta@gmail.com', 'bismillah', 'huda', 'kolo-kolo', '098765656655', 'icob buah - Copy - Copy.png', 'pelanggan'),
(36, 'huda@gmail.com', 'abcdsesdburhan', 'burhan', 'tapra', '08447364732', 'UAS_User Experience Design_(kelas A_ainul huda.png', 'pelanggan'),
(37, 'huda@gmail.com', 'sdfdsfsa', 'burhan', 'tapra', '08447364732', 'UAS_User Experience Design_(kelas A_ainul huda.png', 'pelanggan'),
(38, 'huda@gmail.com', 'jskafjlsa', 'sukarna', 'tapra', '04092758325834', 'Screenshot 2023-10-04 191345.png', 'pelanggan'),
(39, 'arif@gmail.com', 'tapra', 'arif rahman', 'arjasa', '087772322342', 'alpukat.webp', 'pelanggan'),
(40, 'rahman@gmail.com', '12345678', 'rahman wahid', 'kampong sokon', '085213242535', 'semangka.jpg', 'pelanggan'),
(41, 'gasali', 'gasali', 'faisal gasali', 'kangean parse', '085228345364', 'teamwork.PNG', 'pelanggan'),
(42, 'hilman@gmail.com', 'hilman', 'ahmad hilman', 'kampong tengah', '087764536232', 'Screenshot 2023-10-04 191345.png', 'pelanggan'),
(43, 'sauki@gmail.com', 'sauki', 'moh.sauqi', 'kampong sokon', '077854548383', 'flowcart tahapan penelitian.png', 'pelanggan'),
(44, 'robet@gmail.com', 'robet', 'robert aljaksi', 'dasuk sumenep', '098797354622', 'logo1.png', 'pelanggan'),
(45, 'kamil@gmail.com', 'kamis', 'moh.kamil', 'batang batang', '087453273541', 'instagram-clipart-translucent-10.png', 'pelanggan'),
(46, 'iqbal@gamil.com', 'ikbal', 'moh.ikbal', 'kangean jelekbi', '085632433331', 'flowcart tahapan penelitian.png', 'pelanggan'),
(47, 'maulana@gmail.com', 'maulana', 'maulana khotimul azam', 'kangan kolo-kolo', '077435333454', 'download.jpg', 'pelanggan'),
(48, 'asfin@gmail.com', 'fifin', 'robiyasfin ilyas', 'kolo kolo parse', '087232445311', 'fruits_ovo3io.jpg', 'pelanggan'),
(49, 'rahmanwahid@gmail.com', 'rahman', 'rahman wahid', 'kolo kolo sokon', '0876466432222', 'screen-1.jpg', 'pelanggan'),
(50, 'fifi@gmail.com', 'fifin', 'nur revina', 'kangean katapang', '087710928871', 'Emoji-Bunga-Layu-Facebook-150x150.png', 'pelanggan'),
(51, 'nurma@gmail.com', 'nurma', 'nurmalia', 'rabhe', '087768577723', 'avatar.png', 'pelanggan'),
(52, 'rini@gmail.com', 'sarini', 'sarini', 'angkatan', '084123253432', 'WhatsApp Image 2023-01-30 at 14.18.50.jpeg', 'pelanggan'),
(53, 'sisil@gmail.com', 'sisil', 'nur sisila', 'marengan', '077923145321', 'actifity diagram.drawio.png', 'pelanggan'),
(54, 'elfa@gmail.com', 'elfa123', 'elfa', 'kolo kolo parse', '082311324355', 'Rundeck Texture.png', 'pelanggan'),
(55, 'nurul@gmail.com', 'nurul123', 'nurul iman', 'lenteng timur', '087764448399', 'menueditor_item_0ebb5df7967e4702852b0fe361868709_1566024273698443929.jpg', 'pelanggan'),
(56, 'alung@gmail.com', 'aling123', 'alung', 'parse', '08732674273432', 'Untitled.png', 'pelanggan'),
(57, 'mila@gmail.com', 'mila123', 'nur amila', 'parse', '07832632746233', '2.png', 'pelanggan'),
(58, 'azel@gmail.com', 'azel123', 'azela putri', 'kolo kolo parse', '08776532636262', 'tangan.jpg', 'pelanggan'),
(59, 'nufal@gmail.com', 'nufal123', 'naufalul abror', 'angkatan', '087712109985', '03. Planning Doc - Scope Statement.png', 'pelanggan'),
(60, 'abel', 'abel', 'salsabella', 'kalianget', '087573573237', 'flowcart admin baru.png', 'pelanggan'),
(61, 'fika', 'fika123', 'nur rafika', 'parse', '087435743263', 'WhatsApp Image 2023-11-10 at 18.44.49 (1).jpeg', 'pelanggan'),
(62, 'hotima', 'hotima123', 'lkhusnul khotima', 'tangse', '088687326573', 'flowcart admin baru.png', 'pelanggan'),
(63, 'akmal', 'akmal123', 'dinol akmal', 'ketep', '0876462536422', 'flowcart tahapan penelitian.png', 'pelanggan'),
(64, 'fikrul', 'fikrul123', 'fikrul rizal', 'parse', '0723265423434', '7faec63c8adf14e729fdf9fd9974cdf1.jpg', 'pelanggan'),
(65, 'fikrul', 'fikrul123', 'fikrul rizal', 'kolokolo', '074832237482', 'fruits_ovo3io.jpg', 'pelanggan'),
(66, 'subhan', 'subhan123', 'moh.subhan', 'pangarangan', '0878572435736', 'Emoji-Bunga-Layu-Facebook-150x150.png', 'pelanggan'),
(67, 'titis@gmail.com', 'titis123', 'titis ayu', 'kolo kolo', '087664362432', 'icob buah - Copy.png', 'pelanggan'),
(68, 'nur@gmail.com', 'nur123', 'nur hasanah', 'paseraman', '0852333423232', 'fruits_ovo3io.jpg', 'pelanggan'),
(69, 'sela@gmail.com', 'sela123', 'sela', 'batuan', '087763625622', '1_eDS0S6p0eEuB2BztDmx7Sw.jpg', 'pelanggan'),
(70, 'indah@gmail.com', 'indah123', 'nur haslindah', 'kolokolo', '0872346245234', 'icob buah - Copy - Copy.png', 'pelanggan'),
(71, 'lina@gmail.com', 'lina123', 'nur haslina', 'arjasa', '085234252173', 'Screenshot 2023-10-23 122020.png', 'pelanggan'),
(72, 'filza@gmail.com', 'filza123', 'filza', 'kmp.tengah', '0879746574433', 'Screenshot 2023-10-16 095857.png', 'pelanggan'),
(73, 'ika@gmail.com', 'kolokolo', 'fika', 'sokon', '087565342564', 'usecase diagram baru.png', 'pelanggan'),
(74, 'ellis@gmail.com', 'ellis123', 'herlisa', 'angkatan', '07732543247832', 'usecase diagram baru.png', 'pelanggan'),
(75, 'asman', 'asman123', 'asman', 'kolokolo', '0886573472325', 'desain menu login.png', 'pelanggan'),
(76, 'fitri', 'fitri', 'fitri', 'kolokolo', '08727462354632', 'UAS_User Experience Design_(kelas A_ainul huda.png', 'pelanggan'),
(77, 'summi', 'sumii123', 'summi', 'katapang', '087745632542', 'usecase diagram baru.png', 'pelanggan'),
(78, 'asdan', 'asdan123', 'asdan', 'tengah', '087762653243', 'UAS_User Experience Design_(kelas A_ainul huda.png', 'pelanggan'),
(79, 'novi', 'novi', 'novia', 'lenteng', '0876632462461', 'WhatsApp Image 2023-11-10 at 18.44.49.jpeg', 'pelanggan'),
(80, 'lely@gmail.com', 'lely123', 'lely', 'sokon', '08767456235642', 'th.jpg', 'pelanggan'),
(81, 'dina', 'dina123', 'faradina', 'kolokolo', '08524326532778', '2.png', 'pelanggan'),
(82, 'andi', 'andi123', 'andi', 'parse', '0875635462322', 'download.jpg', 'pelanggan'),
(83, 'sahrul', 'kolokolo', 'sahrul ibad', 'kmp.tengah', '-77125378146832', 'WhatsApp Image 2023-01-28 at 11.40.21.jpeg', 'pelanggan'),
(84, 'yuni', 'yuni123', 'a yuni', 'sokon', '082342343242', 'WhatsApp Image 2022-11-27 at 16.57.15.jpeg', 'pelanggan'),
(85, 'keta', 'keta123', 'huda', 'kolokolo', '087626523723', 'use case sangat baru.png', 'pelanggan'),
(86, 'huda', 'huda123', 'ainul huda', 'parse', '0887536213721', 'keta.jpg', 'pelanggan'),
(87, 'iman', 'iman', 'imaniah', 'lenteng', '0987654321', 'login.png', 'pelanggan'),
(88, 'huda', 'huda', 'hudahuda', 'palestina', '82974724728', 'cdm baru kea.png', 'pelanggan'),
(90, 'hudaaaaaa', 'hudaaaaa', 'huda 40M', 'pakistan', '9798786', 'activity diagram login.drawio.png', 'pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `produk_foto`
--
ALTER TABLE `produk_foto`
  ADD PRIMARY KEY (`id_produk_foto`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `tb_pembelian_produk`
--
ALTER TABLE `tb_pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `produk_foto`
--
ALTER TABLE `produk_foto`
  MODIFY `id_produk_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT untuk tabel `tb_pembelian_produk`
--
ALTER TABLE `tb_pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
