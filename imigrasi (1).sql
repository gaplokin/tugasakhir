-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Sep 2020 pada 18.11
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imigrasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen`
--

CREATE TABLE `dokumen` (
  `id` int(3) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `shift` tinyint(1) NOT NULL,
  `ektp` text NOT NULL,
  `kk` text NOT NULL,
  `akte` text NOT NULL,
  `pasporlama` text NOT NULL,
  `pernyataan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokumen`
--

INSERT INTO `dokumen` (`id`, `user_id`, `tanggal`, `shift`, `ektp`, `kk`, `akte`, `pasporlama`, `pernyataan`) VALUES
(1, 24, '2020-09-28', 1, '5f70b95116a97.png', '5f70b95116e43.png', '5f70b95117292.png', '5f70b951176c3.png', '5f70b95117a27.png'),
(3, 24, '2020-09-28', 1, '5f70b99d27025.png', '5f70b99d27355.png', '5f70b99d276f0.png', '5f70b99d279ca.png', '5f70b99d27c85.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(3) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nik`, `email`, `password`, `tanggal`, `gambar`) VALUES
(24, 'oka', 29910, 'oka@gmail.com', 'aaa', '2020-09-26', '5f704d7d02e9b.jpg'),
(26, 'elin', 33131, 'elin@gmail.com', 'aaa', '2020-09-21', '5f704d6c05dee.jpeg'),
(27, 'bella', 33131, 'a@gmail.com', 'daya', '0000-00-00', '5f6d43754f913.jpg'),
(28, 'zakiyah', 2147483647, 'za@gmail.com', 'aaa', '0000-00-00', '5f6d43b423e7c.jpg'),
(29, 'ARDAYA IMAM PRATAMA', 1231, 'kinan@gmail.com', 'aaa', '0000-00-00', '5f6ffeb478a2d.jpg'),
(30, 'aaaa', 121, 'ardayapratama1995@gmail.com', 'aaa', '0000-00-00', '5f6ffee9cec8b.jpg'),
(31, 'aaaa', 11111111, 'l@gmail.com', 'aaa', '0000-00-00', '5f7045498fec5.jpg'),
(32, 'aaaa', 111, 'x@gmail.com', 'aaa', '0000-00-00', '5f7045f7b5099.jpg'),
(33, 'aaaa', 33131, 'q@gmail.com', 'aaa', '2020-09-16', '5f7046ff6c4e4.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(7, 'arlindadwia', '$2y$10$1I.zQE96bw8h8C2742mhq.M1C4J22oC.TEA29AOHCg7HWsNz7cte2'),
(24, 'gaplokin', '$2y$10$jwVjEjD7rZT00yWCAflUpu9.sVhnigcJ6cHaIpf8Bb4umSgSYCHd6'),
(28, 'ardaya', '$2y$10$BrsvV8LGHuSJc3n8nIrh4.zcfld4VAQFE2u.NeCC26eylvIjN7ZVC'),
(29, 'zakiyah', '$2y$10$OJKuzunsIOhWkI8LwAsm7u7Mg53bRycpv7rSByRdiZNcAgy1PveWm'),
(30, 'daya', '$2y$10$pu/wtscXUxZSJ0obuWL1DeRWzT5ewajxFEgpAXUH2Ceryz..Gq1.i'),
(31, 'oka', '$2y$10$AwXECAwWU.QeDEw8F0Wym.EWaJXIpGKnFcjpSgjRy3CWqbtWtyjVy');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
