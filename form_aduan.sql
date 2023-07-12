-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jul 2023 pada 14.42
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `form_aduan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` tinyint(4) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_telepon` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `alamat`, `no_telepon`, `email`, `username`, `password`) VALUES
(1, 'superadmin', 'Tabanan', '', '', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `instansi`
--

CREATE TABLE `instansi` (
  `id` tinyint(4) NOT NULL,
  `nama_instansi` varchar(200) NOT NULL,
  `tingkat_instansi` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `instansi`
--

INSERT INTO `instansi` (`id`, `nama_instansi`, `tingkat_instansi`, `username`, `password`) VALUES
(1, 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia Kabupaten Tabanan', 'Daerah', 'bkpsdm', '202cb962ac59075b964b07152d234b70'),
(2, 'Badan Kesbang dan Politik Kabupaten Tabanan', 'Daerah', 'bkgp', '202cb962ac59075b964b07152d234b70'),
(3, 'Badan Keuangan Daerah Kabupaten Tabanan', 'Daerah', 'bkeu', '202cb962ac59075b964b07152d234b70'),
(4, 'Badan Penanggulan Bencana Daerah Tabanan', 'Daerah', 'bpbd', '202cb962ac59075b964b07152d234b70'),
(5, 'Badan Perencana, Penelitian dan Pengembangan Kabupaten Tabanan', 'Daerah', 'bppp', '202cb962ac59075b964b07152d234b70'),
(6, 'Badan Rumah Sakit Umum Daerah Kabupaten Tabanan', 'Daerah', 'brsud', '202cb962ac59075b964b07152d234b70'),
(7, 'Dinas Kebudayaan Kabupaten Tabanan', 'Daerah', 'dk', '202cb962ac59075b964b07152d234b70'),
(8, 'Dinas Kependudukan dan Pencatatan Sipil Kabupaten Tabanan', 'Daerah', 'dkps', '202cb962ac59075b964b07152d234b70'),
(9, 'Dinas Kesehatan Kabupaten Tabanan', 'Daerah', 'dkn', '202cb962ac59075b964b07152d234b70'),
(10, 'Dinas Ketahanan Pangan Kabupaten Tabanan', 'Daerah', 'dkpn', '202cb962ac59075b964b07152d234b70'),
(11, 'Dinas Komunikasi dan Informatika Kabupaten Tabanan', 'Daerah', 'dki', '202cb962ac59075b964b07152d234b70'),
(12, 'Dinas Koperasi dan UKM Kabupaten Tabanan', 'Daerah', 'dkukm', '202cb962ac59075b964b07152d234b70'),
(13, 'Dinas Lingkungan Hidup Kabupaten Tabanan', 'Daerah', 'dlh', '202cb962ac59075b964b07152d234b70'),
(14, 'Dinas Pariwisata Kabupaten Tabanan', 'Daerah', 'dpa', '202cb962ac59075b964b07152d234b70'),
(15, 'Dinas Pekerjaan Umum, Penataan Ruang Perumahan dan Kawasan Pemukiman Kabupaten Tabanan', 'Daerah', 'dkuprpkp', '202cb962ac59075b964b07152d234b70'),
(16, 'Dinas Pemberdayaan Masyarakat dan Desa Kabupaten Tabanan', 'Daerah', 'dpmd', '202cb962ac59075b964b07152d234b70'),
(17, 'Dinas Penanaman Modal dan Pelayanan Perijinan Terpadu Satu Pintu Kabupaten Tabanan', 'Daerah', 'dpmpptsp', '202cb962ac59075b964b07152d234b70'),
(18, 'Dinas Pendidikan Kabupaten Tabanan', 'Daerah', 'dpdn', '202cb962ac59075b964b07152d234b70'),
(19, 'Dinas Pengendalian Penduduk dan Keluarga Beranca Kabupaten Tabanan', 'Daerah', 'dppkb', '202cb962ac59075b964b07152d234b70'),
(20, 'Dinas Perhubungan Kabupaten Tabanan', 'Daerah', 'dpbn', '202cb962ac59075b964b07152d234b70'),
(21, 'Dinas Perikanan Kabupaten Tabanan', 'Daerah', 'dpkn', '202cb962ac59075b964b07152d234b70'),
(22, 'Dinas Perindustrian dan Perdagangan Kabupaten Tabanan', 'Daerah', 'dppgn', '202cb962ac59075b964b07152d234b70'),
(23, 'Dinas Perpustakaan dan Arsip Kabupaten Tabanan', 'Daerah', 'dpap', '202cb962ac59075b964b07152d234b70'),
(24, 'Dinas Pertanian Kabupaten Tabanan', 'Daerah', 'dptn', '202cb962ac59075b964b07152d234b70'),
(25, 'Dinas Sosial, Pemberdayaan Perempuan dan Perlindungan Anak Kabupaten Tabanan', 'Daerah', 'dspppa', '202cb962ac59075b964b07152d234b70'),
(26, 'Dinas Tenaga Kerja Kabupaten Tabanan', 'Daerah', 'dtk', '202cb962ac59075b964b07152d234b70'),
(27, 'Inspektorat Kabupaten Tabanan', 'Daerah', 'iskt', '202cb962ac59075b964b07152d234b70'),
(28, 'Kantor Camat Baturiti Kabupaten Tabanan', 'Daerah', 'kcb', '202cb962ac59075b964b07152d234b70'),
(29, 'Kantor Camat Kediri Kabupaten Tabanan', 'Daerah', 'kck', '202cb962ac59075b964b07152d234b70'),
(30, 'Kantor Camat Kerambitan Kabupaten Tabanan', 'Daerah', 'kcktn', '202cb962ac59075b964b07152d234b70'),
(31, 'Kantor Camat Marga Kabupaten Tabanan', 'Daerah', 'kcm', '202cb962ac59075b964b07152d234b70'),
(32, 'Kantor Camat Penebel Kabupaten Tabanan', 'Daerah', 'kcp', '202cb962ac59075b964b07152d234b70'),
(33, 'Kantor Camat Pupuan Kabupaten Tabanan', 'Daerah', 'kcppn', '202cb962ac59075b964b07152d234b70'),
(34, 'Kantor Camat Selemadeg Barat Kabupaten Tabanan', 'Daerah', 'kcsb', '202cb962ac59075b964b07152d234b70'),
(35, 'Kantor Camat Selemadeg Kabupaten Tabanan', 'Daerah', 'kcs', '202cb962ac59075b964b07152d234b70'),
(36, 'Kantor Camat Selemadeg Timur Kabupaten Tabanan', 'Daerah', 'kcst', '202cb962ac59075b964b07152d234b70'),
(37, 'Kantor Camat Tabanan Kabupaten Tabanan', 'Daerah', 'kct', '202cb962ac59075b964b07152d234b70'),
(38, 'Satuan Polisi Pamong Praja Kabupaten Tabanan', 'Daerah', 'sppp', '202cb962ac59075b964b07152d234b70'),
(39, 'Sekretariat Daerah Kabupaten Tabanan', 'Daerah', 'sdh', '202cb962ac59075b964b07152d234b70'),
(40, 'Sekretariat Dewan Kabupaten Tabanan', 'Daerah', 'skdn', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` tinyint(4) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'Agama'),
(2, 'Ekonomi dan Keuangan'),
(3, 'Kesehatan'),
(4, 'Bencana Alam'),
(6, 'Kesetaraan Gender dan Sosial Inklusif'),
(7, 'Ketentraman, Ketertiban Umum dan Perlindungan Masyarakat'),
(8, 'Lingkungan Hidup dan Kehutanan'),
(9, 'Pendidikan dan Kebudayaan'),
(10, 'Pertanian dan Peternakan'),
(11, 'Politik dan Hukum'),
(12, 'Sosial dan Kesejahteraan'),
(13, 'Energi dan Sumber Daya Alam'),
(14, 'Kekerasan di Satuan Pendidikan '),
(15, 'Kekerasan di Satuan Pendidikan (Sekolah, Kampus, Lembaga Kursus)'),
(16, 'Kependudukan'),
(17, 'Ketenagakerjaan'),
(18, 'Pemulihan Ekonomi Nasional'),
(19, 'Perhubungan'),
(20, 'Perlindungan Konsumen'),
(21, 'Teknologi Informasi dan Komunikasi'),
(22, 'Lainnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` tinyint(4) NOT NULL,
  `judul` varchar(300) NOT NULL,
  `isi` varchar(500) NOT NULL,
  `gambar` int(4) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `id_users` tinyint(4) NOT NULL,
  `id_instansi` tinyint(4) NOT NULL,
  `id_kategori` tinyint(4) NOT NULL,
  `status` varchar(50) NOT NULL,
  `tanggal_dibuat` varchar(50) NOT NULL,
  `tanggal_diubah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `judul`, `isi`, `gambar`, `tanggal`, `lokasi`, `id_users`, `id_instansi`, `id_kategori`, `status`, `tanggal_dibuat`, `tanggal_diubah`) VALUES
(11, 'pellentesque consectetuer risus dignissim a curabitur odio ultrices bibendum', 'Ad aenean nec suscipit torquent ultricies mollis interdum at mus hac magnis est leo auctor facilisis conubia sagittis porta cursus curae pellentesque consectetuer risus dignissim a curabitur odio ultrices bibendum', 1, '2023-07-03', 'Sakenan Belodan', 0, 2, 4, 'selesai', '', '07-07-2023'),
(13, 'Magnis class si torquent eros neque ad dapibus diam tempor', 'Curabitur purus netus nullam iaculis nunc lorem tellus auctor cursus facilisis sit parturient platea proin blandit sodales dolor quisque augue', 1, '2023-07-05', 'Pesiapan', 3, 3, 3, 'selesai', '07-07-2023', '07-07-2023'),
(14, 'Hu', 'Hjjj', 0, '2023-07-11', 'Marga', 0, 3, 0, 'sedang_diverifikasi', '11-07-2023', ''),
(15, 'wadwad', 'awdawd', 0, '2023-07-12', 'Desa Subamia', 0, 3, 0, 'sedang_diverifikasi', '11-07-2023', ''),
(17, 'vulputate consequat platea class cursus mus etiam enim eros', 'Consectetur massa pharetra nisl nullam id justo iaculis metus gravida mollis suspendisse dui porta proin blandit himenaeos aliquam praesent penatibus libero auctor non ante habitasse eget velit habitant morbi augue primis bibendum commodo efficitur lobortis tempus tristique leo sapien tellus dictum maecenas vulputate consequat platea class cursus mus etiam enim eros erat curae nibh mi porttitor ullamcorper letius fames pulvinar natoque nec', 0, '2023-07-12', 'Jalan Kenyeri 25 Tabanan', 0, 13, 4, 'sedang_diproses', '11-07-2023', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` tinyint(4) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_telepon` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `alamat`, `no_telepon`, `email`, `username`, `password`) VALUES
(3, 'Putu Agus Darma Putra Juniarta hh', 'Pesiapan, Tabanan', '085737548643', 'myemail@gmail.com', 'agus', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
