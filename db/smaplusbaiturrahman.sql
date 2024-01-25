-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jan 2024 pada 16.41
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smaplusbaiturrahman`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ppdb`
--

CREATE TABLE `ppdb` (
  `id` bigint(100) NOT NULL,
  `nisn` bigint(13) NOT NULL,
  `nik` bigint(16) NOT NULL,
  `program` char(15) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` char(20) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL DEFAULT current_timestamp(),
  `tinggi_badan` varchar(50) NOT NULL,
  `berat_badan` varchar(50) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `kewarganegaraan` varchar(50) NOT NULL,
  `jumlah_saudara` varchar(50) DEFAULT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `alamat_tinggal` text NOT NULL,
  `rt` int(3) NOT NULL,
  `rw` int(3) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `no_hp` bigint(12) NOT NULL,
  `jenis_tinggal` varchar(50) DEFAULT NULL,
  `jarak_tempat` varchar(50) NOT NULL,
  `alat_transportasi` varchar(50) DEFAULT NULL,
  `riwayat_beasiswa` text NOT NULL,
  `catatan_prestasi` text DEFAULT NULL,
  `nama_ayah_kandung` varchar(100) NOT NULL,
  `pendidikan_terakhir_ayah` varchar(50) DEFAULT NULL,
  `tahun_lahir_ayah` int(3) NOT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `penghasilan_bulanan_ayah` decimal(20,10) DEFAULT NULL,
  `no_hp_ayah` bigint(12) DEFAULT NULL,
  `nama_ibu_kandung` varchar(100) DEFAULT NULL,
  `pendidikan_terakhir_ibu` varchar(20) DEFAULT NULL,
  `tahun_lahir_ibu` int(3) DEFAULT NULL,
  `pekerjaan_ibu` varchar(50) DEFAULT NULL,
  `penghasilan_ibu` decimal(20,2) DEFAULT NULL,
  `no_tlp_ibu` bigint(12) DEFAULT NULL,
  `nama_wali` varchar(100) DEFAULT NULL,
  `tahun_lahir_wali` int(3) DEFAULT NULL,
  `pendidikan_terakhir_wali` varchar(50) DEFAULT NULL,
  `pekerjaan_wali` varchar(100) DEFAULT NULL,
  `penghasilan_wali` decimal(20,2) DEFAULT NULL,
  `no_tlp_wali` bigint(12) DEFAULT NULL,
  `alamat_orangtua_wali` text DEFAULT NULL,
  `rt_ortu` char(3) DEFAULT NULL,
  `rw_ortu` char(3) DEFAULT NULL,
  `desa_ortu` varchar(50) DEFAULT NULL,
  `kecamatan_ortu` varchar(50) DEFAULT NULL,
  `kota_ortu` varchar(50) DEFAULT NULL,
  `provinsi_ortu` varchar(50) DEFAULT NULL,
  `status` char(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `softdelete` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ppdb`
--

INSERT INTO `ppdb` (`id`, `nisn`, `nik`, `program`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `tinggi_badan`, `berat_badan`, `agama`, `kewarganegaraan`, `jumlah_saudara`, `asal_sekolah`, `alamat_tinggal`, `rt`, `rw`, `desa`, `kecamatan`, `kota`, `provinsi`, `no_hp`, `jenis_tinggal`, `jarak_tempat`, `alat_transportasi`, `riwayat_beasiswa`, `catatan_prestasi`, `nama_ayah_kandung`, `pendidikan_terakhir_ayah`, `tahun_lahir_ayah`, `pekerjaan`, `penghasilan_bulanan_ayah`, `no_hp_ayah`, `nama_ibu_kandung`, `pendidikan_terakhir_ibu`, `tahun_lahir_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `no_tlp_ibu`, `nama_wali`, `tahun_lahir_wali`, `pendidikan_terakhir_wali`, `pekerjaan_wali`, `penghasilan_wali`, `no_tlp_wali`, `alamat_orangtua_wali`, `rt_ortu`, `rw_ortu`, `desa_ortu`, `kecamatan_ortu`, `kota_ortu`, `provinsi_ortu`, `status`, `created_at`, `updated_at`, `softdelete`) VALUES
(1, 111111111111, 3273100901910001, NULL, 'Hendra Hermawan', 'Laki-Laki', 'cianjur', '1991-01-09', '11133', '11133', 'Islam', 'Indonesia', '3333', 'smk pi 52 bdg', 'Jl. Jupiter Tengah V No.6 Rt.06 rw.03 kel.sekejati kec. BuahBatu', 9, 9, 'ee', 'ee', 'Kota Bandung', 'ee', 83820900337, 'Bersama Orang Tua', 'Kurang Dari 1 Km', 'Jalan Kaki', 'qqq', 'qqqq', 'qqq', 'Sd', 122, 'wwwww', '20.0000000000', 83820900337, 'www', 'Sd', 122, 'qqq', '12.00', 83820900337, '11wssd', 222, 'S1/D4', '22wwww', '12.22', 83820900337, 'Jl. Jupiter Tengah V No.6 Rt.06 rw.03 kel.sekejati kec. BuahBatu edit', '333', '333', '33dd', 'ddd', 'Kota Bandung', 'dddd', '1', '2023-03-01 09:10:50', '2023-03-06 08:07:00', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `user`, `password`, `level`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Hendra Hermawan', 'admin', '$2y$10$UKHbsI9m.7H3ANxgRgHVBeYm0SxElIPk0frm3HbmqT256e0MTefAW', '1', 1, '2023-02-16 10:03:17', '2023-02-16 10:03:17'),
(7, 'user eeee', 'user', '$2y$10$YH.LdXA9eUM563qQrU3N/.z5H1SzqCKFfGvzP/ZA0FZQHnVdrKbZe', '2', 1, '2023-02-28 06:50:07', '2023-02-28 07:06:50');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ppdb`
--
ALTER TABLE `ppdb`
  ADD PRIMARY KEY (`id`,`nisn`) USING BTREE;

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`user`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ppdb`
--
ALTER TABLE `ppdb`
  MODIFY `id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
