-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Des 2020 pada 14.02
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsimomil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cekkes`
--

CREATE TABLE `cekkes` (
  `id_cekkes` int(11) NOT NULL,
  `ask_first` varchar(10) NOT NULL,
  `ask_second` varchar(10) NOT NULL,
  `ask_third` varchar(10) NOT NULL,
  `ask_fourth` varchar(10) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cekkes`
--

INSERT INTO `cekkes` (`id_cekkes`, `ask_first`, `ask_second`, `ask_third`, `ask_fourth`, `id_user`) VALUES
(1, 'Tidak', 'Ya', 'Tidak', 'Ya', 15),
(2, 'Tidak', 'Tidak', 'Tidak', 'Tidak', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsultasi_siswa`
--

CREATE TABLE `konsultasi_siswa` (
  `id` int(11) NOT NULL,
  `keterangan_konsul` varchar(128) NOT NULL,
  `tanggal_konsul` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konsultasi_siswa`
--

INSERT INTO `konsultasi_siswa` (`id`, `keterangan_konsul`, `tanggal_konsul`, `id_user`) VALUES
(14, 'permisi numpang tanya', '2020-11-14', 15),
(15, 'Tanya apaan aja deh', '2020-11-14', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `foto_laporan` varchar(128) NOT NULL,
  `ask_first` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `id_user`, `foto_laporan`, `ask_first`) VALUES
(1, 15, 'clip-1378.png', 'Ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama_lokasi` varchar(128) NOT NULL,
  `alamat_lokasi` varchar(128) NOT NULL,
  `lat` varchar(128) NOT NULL,
  `lng` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `nama_lokasi`, `alamat_lokasi`, `lat`, `lng`) VALUES
(1, 'SMK Pelayaran', 'Jl. Maju Mundur No.9, RT.6/RW.9, Cakung Tim., Kec. Cakung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta', '-6.175654305583827', '106.95156097412111');

-- --------------------------------------------------------

--
-- Struktur dari tabel `modul`
--

CREATE TABLE `modul` (
  `id_modul` int(11) NOT NULL,
  `deskripsi_modul` varchar(128) NOT NULL,
  `file_modul` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `modul`
--

INSERT INTO `modul` (`id_modul`, `deskripsi_modul`, `file_modul`) VALUES
(2, 'Modul Protokol Kesehatan', 'Protokol-Kesehatan-COVID-19.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` varchar(255) DEFAULT NULL,
  `isi_berita` text DEFAULT NULL,
  `gambar_berita` varchar(30) DEFAULT NULL,
  `tgl_berita` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_berita`
--

INSERT INTO `tbl_berita` (`id_berita`, `judul_berita`, `isi_berita`, `gambar_berita`, `tgl_berita`, `id_user`) VALUES
(3, 'Ini judul kedua loh', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sodales cursus nulla. Quisque porta non arcu iaculis dapibus. Donec eu aliquet leo. Morbi nec arcu eleifend, auctor mi ut, sagittis magna. Aenean imperdiet odio et elit scelerisque luctus. Nunc quis tellus in leo consectetur varius. Vestibulum eu elit dictum, aliquam mi sed, sollicitudin tortor. Vestibulum sapien odio, rutrum quis volutpat eget, ullamcorper et dolor. Cras hendrerit metus erat, ac euismod elit vehicula eu. Maecenas sagittis nunc convallis, convallis massa sit amet, dictum purus. Suspendisse posuere euismod dolor, ac maximus est dictum vel. In vulputate nibh eu enim aliquet, sed efficitur urna efficitur.</p>\r\n\r\n<h1><strong>Class aptent taciti sociosqu</strong></h1>\r\n\r\n<p>ad litora torquent per conubia nostra, per inceptos himenaeos. Integer lobortis commodo lacinia. Nullam dignissim a purus nec sagittis. Duis varius purus vel feugiat placerat. In justo augue, egestas vitae ultricies sed, blandit a neque. Aliquam rutrum volutpat nibh ultrices molestie. Sed nec erat dui. Ut non ante vel sem scelerisque elementum. Praesent tellus massa, consectetur non placerat at, consectetur blandit magna. Suspendisse malesuada posuere lorem sed lobortis. Vivamus eget nibh quis sapien ultrices rhoncus sit amet aliquet nisi. Vivamus nec purus justo. Nam a urna ut risus iaculis pellentesque a semper velit. Suspendisse potenti. Aliquam mattis dignissim neque ut scelerisque.</p>\r\n\r\n<p>Praesent vehicula luctus turpis, sed condimentum ligula faucibus eget. Duis non commodo dui. Nullam id ante ultrices, ullamcorper magna id, efficitur ipsum. Nullam consectetur justo non nisl finibus fermentum. Sed aliquam odio a pulvinar luctus. Aenean neque odio, fermentum eu lobortis vel, iaculis id eros. Curabitur eu ex eget felis imperdiet ultrices. Suspendisse consequat augue ac sapien pulvinar, rutrum tempus lacus eleifend. Nullam lacus turpis, facilisis quis euismod in, auctor non lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec id volutpat purus. Maecenas eget magna non arcu egestas maximus. Nulla consequat nisl non rhoncus posuere. Quisque semper lacinia nunc facilisis mollis. Suspendisse ligula dui, consectetur ut condimentum in, pharetra a mi. Integer ornare euismod neque.</p>', 'soldier.png', '2020-11-05 17:00:00', 14),
(4, 'Ini judul', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sodales cursus nulla. Quisque porta non arcu iaculis dapibus. Donec eu aliquet leo. Morbi nec arcu eleifend, auctor mi ut, sagittis magna. Aenean imperdiet odio et elit scelerisque luctus. Nunc quis tellus in leo consectetur varius. Vestibulum eu elit dictum, aliquam mi sed, sollicitudin tortor. Vestibulum sapien odio, rutrum quis volutpat eget, ullamcorper et dolor. Cras hendrerit metus erat, ac euismod elit vehicula eu. Maecenas sagittis nunc convallis, convallis massa sit amet, dictum purus. Suspendisse posuere euismod dolor, ac maximus est dictum vel. In vulputate nibh eu enim aliquet, sed efficitur urna efficitur.</p>\r\n\r\n<h1><strong>Class aptent taciti sociosqu</strong></h1>\r\n\r\n<p>ad litora torquent per conubia nostra, per inceptos himenaeos. Integer lobortis commodo lacinia. Nullam dignissim a purus nec sagittis. Duis varius purus vel feugiat placerat. In justo augue, egestas vitae ultricies sed, blandit a neque. Aliquam rutrum volutpat nibh ultrices molestie. Sed nec erat dui. Ut non ante vel sem scelerisque elementum. Praesent tellus massa, consectetur non placerat at, consectetur blandit magna. Suspendisse malesuada posuere lorem sed lobortis. Vivamus eget nibh quis sapien ultrices rhoncus sit amet aliquet nisi. Vivamus nec purus justo. Nam a urna ut risus iaculis pellentesque a semper velit. Suspendisse potenti. Aliquam mattis dignissim neque ut scelerisque.</p>\r\n\r\n<p>Praesent vehicula luctus turpis, sed condimentum ligula faucibus eget. Duis non commodo dui. Nullam id ante ultrices, ullamcorper magna id, efficitur ipsum. Nullam consectetur justo non nisl finibus fermentum. Sed aliquam odio a pulvinar luctus. Aenean neque odio, fermentum eu lobortis vel, iaculis id eros. Curabitur eu ex eget felis imperdiet ultrices. Suspendisse consequat augue ac sapien pulvinar, rutrum tempus lacus eleifend. Nullam lacus turpis, facilisis quis euismod in, auctor non lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec id volutpat purus. Maecenas eget magna non arcu egestas maximus. Nulla consequat nisl non rhoncus posuere. Quisque semper lacinia nunc facilisis mollis. Suspendisse ligula dui, consectetur ut condimentum in, pharetra a mi. Integer ornare euismod neque.</p>', 'carbon_(11)1.png', '2020-11-05 17:00:00', 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `jurusan` varchar(120) NOT NULL,
  `jkel` varchar(120) NOT NULL,
  `nik` int(20) NOT NULL,
  `alamat_siswa` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `kelas`, `jurusan`, `jkel`, `nik`, `alamat_siswa`) VALUES
(14, 'adminsiprokes', 'aldo.abieza30@gmail.com', 'IMG_20200128_092831.jpg', '$2y$10$/nx53U72aymiv3gCpA4nl.iHn9PjXlxAIkmPJgTLOoKz/shxoKiVS', 1, 1, 1602734471, '0', '0', '0', 0, ''),
(15, 'Serizawa', 'aldoabz10@gmail.com', 'default.jpg', '$2y$10$.P0aQL5jNC9SiextYqM8v.oH.rrBKnQhlHZ2DwZezjzh4n.EQYyHq', 2, 1, 1603523069, 'X TPN 2', 'TPN', 'Laki-Laki', 1213234324, 'Jl. Maju Tak Mundur RT.012/008');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(10, 2, 2),
(11, 1, 3),
(18, 3, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(10, 1, 'Profile Admin', 'admin/profileadmin', 'fas fa-fw fa-user', 1),
(11, 1, 'Edit Profile Admin', 'admin/editprofile', 'fas fa-fw fa-user-edit', 1),
(12, 1, 'Change Password Admin', 'admin/changepassword', 'fas fa-fw fa-key', 1),
(15, 1, 'Laporan Data Lokasi', 'admin/lokasi', 'fas fa-fw fa-table', 1),
(18, 1, 'Laporan Data Konsultasi', 'admin/datakonsul', 'fas fa-fw fa-table', 1),
(19, 1, 'Laporan Data Kesehatan', 'admin/datacek', 'fas fa-fw fa-table', 1),
(20, 1, 'Reminder Email', 'admin/broademail', 'fas fa-fw fa-table', 1),
(22, 1, 'Data Laporan Harian', 'admin/data_laporan', 'fas fa-fw fa-table', 1),
(23, 1, 'Pengumuman Siswa', 'admin/artikel', 'fas fa-newspaper', 1),
(24, 1, 'Modul Protokol Kesehatan', 'admin/data_modul', 'fas fa-fw fa-table', 1),
(25, 2, 'Tanya Guru', 'user/konsul', 'fas fa-fw fa-user-edit', 1),
(26, 2, 'Cek Kesehatan Siswa', 'user/tambah_cekkes', 'fas fa-fw fa-user-check', 1),
(27, 2, 'Laporan Harian', 'user/laporan_harian', 'fas fa-fw fa-table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(9, 'admin@wamil.com', '5VXj68HNjCuejgmeQclcp1y0Hc0ByRyA93bNIeysJTo=', 1602733570);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cekkes`
--
ALTER TABLE `cekkes`
  ADD PRIMARY KEY (`id_cekkes`);

--
-- Indeks untuk tabel `konsultasi_siswa`
--
ALTER TABLE `konsultasi_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indeks untuk tabel `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id_modul`);

--
-- Indeks untuk tabel `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `cekkes`
--
ALTER TABLE `cekkes`
  MODIFY `id_cekkes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `konsultasi_siswa`
--
ALTER TABLE `konsultasi_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `modul`
--
ALTER TABLE `modul`
  MODIFY `id_modul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_berita`
--
ALTER TABLE `tbl_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
