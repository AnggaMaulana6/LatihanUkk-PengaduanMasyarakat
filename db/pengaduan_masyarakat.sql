-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Feb 2023 pada 06.58
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan_masyarakat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` char(16) NOT NULL,
  `nama` varchar(35) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `telp` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `telp`) VALUES
('1231123', 'ANGGA', 'ANGGA', '$\r\n     password', '0981237'),
('31312321312', 'aku', 'aku', 'aku', '089123432'),
('32421312', 'masyarakat', 'masyarakat', 'masyarakat', '083241234312'),
('331330234', 'Angga M E', 'anggaa', 'angga', '0812312355');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date DEFAULT NULL,
  `nik` char(16) DEFAULT NULL,
  `isi_laporan` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` enum('0','proses','selesai') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`) VALUES
(34, '2023-01-31', '32421312', 'drg', 'http://localhost/pengaduan_masyarakat/assets/img/Untitled3.png', 'selesai'),
(35, '2023-01-31', '32421312', 'ytta', 'http://localhost/pengaduan_masyarakat/assets/img/Untitled.png', 'selesai'),
(36, '2023-01-31', '32421312', 'toolonggg', 'http://localhost/pengaduan_masyarakat/assets/img/Screenshot2022-08-11123553.png', 'selesai'),
(37, '2023-01-31', '32421312', 'Yamettee', 'http://localhost/pengaduan_masyarakat/assets/img/Screenshot(15).png', '0'),
(38, '2023-01-31', '32421312', 'kudasi', 'http://localhost/pengaduan_masyarakat/assets/img/Screenshot2022-08-11123553.png', '0'),
(40, '2023-01-31', '32421312', 'Cobaa', 'http://localhost/pengaduan_masyarakat/assets/img/Untitled3.png', '0'),
(41, '2023-01-31', '32421312', 'asd', 'http://localhost/pengaduan_masyarakat/assets/img/Untitled.png', NULL),
(42, '2023-01-31', '32421312', 'TES A', 'http://localhost/pengaduan_masyarakat/assets/img/Screenshot(15).png', NULL),
(43, '2023-01-31', '31312321312', 'tes', 'http://localhost/pengaduan_masyarakat/assets/img/Screenshot(15).png', 'selesai'),
(44, '2023-02-01', '331330234', 'Last Percobaan', 'http://localhost/pengaduan_masyarakat/assets/img/Screenshot2022-08-11123553.png', 'selesai'),
(47, '2023-02-08', '32421312', 'xxxx\r\n', 'http://localhost/pengaduan_masyarakat/assets/img/AyAnO.png', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `telp` varchar(13) DEFAULT NULL,
  `level` enum('petugas','admin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`) VALUES
(6, 'admin', 'admin', 'admin', '08123123123', 'admin'),
(7, 'petugas', 'petugas', 'petugas', '08123123', 'petugas'),
(8, 'Angga', 'ame', 'ame', '08712312313', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) DEFAULT NULL,
  `tgl_tanggapan` date DEFAULT current_timestamp(),
  `tanggapan` text DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`) VALUES
(33, 40, NULL, 'YAA SIAP', 6),
(35, 40, '2023-01-31', 'YAA SIAP', 6),
(39, 38, '2023-01-31', 'OTW BOS', 6),
(40, 38, '2023-01-31', 'ya', 6),
(41, 40, '2023-01-31', 'oke bos', 6),
(42, 38, '2023-01-31', 'tes', 6),
(43, 38, '2023-01-31', 'ads', 6),
(45, 38, '2023-01-31', 'YA', 6),
(46, 38, '2023-01-31', 'Kamu nanya', 6),
(47, 36, '2023-01-31', 'yaaa', 6),
(48, 43, '2023-01-31', 'SEDANG DILAKUKAN\r\n', 6),
(49, 44, '2023-02-01', 'Sedang dalam proses', 6),
(50, 44, '2023-02-01', 'tadi valid sekarang proses\r\n', 6),
(51, 44, '2023-02-01', 'selesai', 6);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `FK_idpengaduan` (`id_pengaduan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `FK_nik` FOREIGN KEY (`nik`) REFERENCES `masyarakat` (`nik`),
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `masyarakat` (`nik`);

--
-- Ketidakleluasaan untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `FK_idpengaduan` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`),
  ADD CONSTRAINT `FK_idpetugas` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
