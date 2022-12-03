-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jan 2022 pada 14.27
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latihan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `lat_long` varchar(50) NOT NULL,
  `nama_tempat` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id`, `lat_long`, `nama_tempat`, `kategori`, `keterangan`) VALUES
(1, '-0.22489113977763073, 100.65475388320611', 'SMAN 1 Payakumbuh', 'Sekolah Menengah Atas', 'SMAN 1 Payakumbuh terletak di Jl. Merapi No.4, Balai Batimah, Payakumbuh Tim., Kota Payakumbuh, Sumatera Barat 26231'),
(2, '-0.240520638776234, 100.6523082810673', 'SMAN 2 Payakumbuh', 'Sekolah Menengah Atas', 'SMAN 2 Payakumbuh terletak di Padang Tangah Payobadar, Payakumbuh Tim., Kota Payakumbuh, Sumatera Barat 26234'),
(3, '-0.2067187094665363, 100.64364873873856', 'SMAN 3 Payakumbuh', 'Sekolah Menengah Atas', 'SMAN 3 Payakumbuh terletak di Jl. R.A. Kartini, Nan Kodok, Kec. Payakumbuh Utara, Kota Payakumbuh, Sumatera Barat 26215'),
(4, '-0.23253913864007303, 100.62434158291656', 'SMAN 4 Payakumbuh', 'Sekolah Menengah Atas', 'SMAN 4 Payakumbuh terletak di Jl. Kalimantan, Balai Nan Duo, Kec. Payakumbuh Bar., Kota Payakumbuh, Sumatera Barat 26224'),
(5, '-0.26795035312575954, 100.60359932524538', 'SMAN 5 Payakumbuh', 'Sekolah Menengah Atas', 'SMAN 5 Payakumbuh terletak di Tangah Padang Indah, Situjuah Banda Dalam, Situjuah Limo Nagari, Kota Payakumbuh, Sumatera Barat 26225'),
(6, '-0.23627296744762705, 100.61426745408095', 'SMKN 1 Payakumbuh', 'Sekolah Menengah Kejuruan', 'SMKN 1 Payakumbuh terletak di Jl. Bonai Indah No.6, Tj. Gadang, Kec. Payakumbuh Bar., Kota Payakumbuh, Sumatera Barat 26223'),
(7, '-0.2424394537682079, 100.60782918291656', 'SMKN 2 Payakumbuh', 'Sekolah Menengah Kejuruan', 'SMKN 2 Payakumbuh terletak di Jl. Anggrek I, Bulakan Balai Kandih, Kec. Payakumbuh Bar., Kota Payakumbuh, Sumatera Barat 26225'),
(8, '-0.22882938107822193, 100.657343754081', 'SMKN 3 Payakumbuh', 'Sekolah Menengah Kejuruan', 'SMKN 3 Payakumbuh terletak di Jl. Dt. Parpatiah Nan Sabatang, Padang Tangah Payobadar, Payakumbuh Tim., Kota Payakumbuh, Sumatera Barat 26234'),
(9, '-0.21746800963764035, 100.60028556942339', 'SMKN 4 Payakumbuh', 'Sekolah Menengah Kejuruan', 'SMKN 4 Payakumbuh terletak di Jl. Koto Kociak, Kel.Padang Sikabu, Kec. Lamposi Tigo Nagori, Padang Sikabu, Payakumbuh Lamposi Tigo Nagori, Kota Payakumbuh, Sumatera Barat 26219');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
