-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 30, 2021 at 02:50 PM
-- Server version: 8.0.27-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `binduk`
--

-- --------------------------------------------------------

--
-- Table structure for table `ayah_siswa`
--

CREATE TABLE `ayah_siswa` (
  `id_ayah_siswa` int NOT NULL,
  `id_siswa` int DEFAULT NULL,
  `nama_ayah` varchar(50) DEFAULT NULL,
  `tahun_lahir_ayah` int DEFAULT NULL,
  `jenjang_pendidikan_ayah` varchar(15) DEFAULT NULL,
  `pekerjaan_ayah` varchar(22) DEFAULT NULL,
  `penghasilan_ayah` varchar(30) DEFAULT NULL,
  `nik_ayah` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `backset`
--

CREATE TABLE `backset` (
  `url` varchar(100) DEFAULT NULL,
  `sessiontime` varchar(4) DEFAULT NULL,
  `footer` varchar(50) DEFAULT NULL,
  `themesback` varchar(2) DEFAULT NULL,
  `responsive` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `backset`
--

INSERT INTO `backset` (`url`, `sessiontime`, `footer`, `themesback`, `responsive`, `haha`) VALUES
('http://localhost/binduk', '', '', '1', '0', '2017-01-20 07:30:02');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` int NOT NULL,
  `id_siswa` int DEFAULT NULL,
  `bank` varchar(16) DEFAULT NULL,
  `norek_bank` bigint DEFAULT NULL,
  `an_bank` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `ibu_siswa`
--

CREATE TABLE `ibu_siswa` (
  `id_ibu_siswa` int NOT NULL,
  `id_siswa` int DEFAULT NULL,
  `nama_ibu` varchar(50) DEFAULT NULL,
  `tahun_lahir_ibu` int DEFAULT NULL,
  `jenjang_pendidikan_ibu` varchar(15) DEFAULT NULL,
  `pekerjaan_ibu` varchar(15) DEFAULT NULL,
  `penghasilan_ibu` varchar(29) DEFAULT NULL,
  `nik_ibu` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `nama` varchar(50) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `isi` text,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`nama`, `avatar`, `tanggal`, `isi`, `id`) VALUES
('admin', 'dist/img/avatar5.png', '2016-12-25', '<p>Berita Informasi<br></p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `kode` varchar(20) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `no` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`kode`, `nama`, `no`) VALUES
('0001', 'admin', 28),
('0002', 'guru', 29);

-- --------------------------------------------------------

--
-- Table structure for table `kps`
--

CREATE TABLE `kps` (
  `id_kps` int NOT NULL,
  `id_siswa` int DEFAULT NULL,
  `penerima_kps` varchar(5) DEFAULT NULL,
  `no_kps` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `pip`
--

CREATE TABLE `pip` (
  `id_pip` int NOT NULL,
  `id_siswa` int DEFAULT NULL,
  `layak_pip` varchar(5) DEFAULT NULL,
  `alasan_layak_pip` varchar(37) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `rombel`
--

CREATE TABLE `rombel` (
  `id_rombel` int NOT NULL,
  `rombel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int NOT NULL,
  `nama_siswa` varchar(50) DEFAULT NULL,
  `nis` int DEFAULT NULL,
  `jk` varchar(1) DEFAULT NULL,
  `nisn` varchar(10) DEFAULT NULL,
  `tempat_lahir` varchar(40) DEFAULT NULL,
  `tgl_lahir` varchar(10) DEFAULT NULL,
  `nik` bigint DEFAULT NULL,
  `agama` varchar(8) DEFAULT NULL,
  `alamat` varchar(80) DEFAULT NULL,
  `rt` int DEFAULT NULL,
  `rw` int DEFAULT NULL,
  `dusun` varchar(18) DEFAULT NULL,
  `kelurahan` varchar(30) DEFAULT NULL,
  `kecamatan` varchar(30) DEFAULT NULL,
  `kode_pos` int DEFAULT NULL,
  `jenis_tinggal` varchar(17) DEFAULT NULL,
  `alat_transportasi` varchar(27) DEFAULT NULL,
  `telepon` varchar(12) DEFAULT NULL,
  `hp` varchar(13) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `skhun` varchar(18) DEFAULT NULL,
  `id_tahun_ajaran` int DEFAULT NULL,
  `id_rombel` int DEFAULT NULL,
  `no_ujian_nasional` varchar(20) DEFAULT NULL,
  `no_seri_ijasah` varchar(24) DEFAULT NULL,
  `penerima_kip` varchar(5) DEFAULT NULL,
  `nomor_kip` varchar(6) DEFAULT NULL,
  `penerima_kip_bool` int DEFAULT NULL,
  `no_kks` varchar(6) DEFAULT NULL,
  `no_regis_akta_lahir` varchar(25) DEFAULT NULL,
  `sekolah_asal` varchar(40) DEFAULT NULL,
  `no_tabel_tdk` int DEFAULT NULL,
  `koordinat_bujur` varchar(12) DEFAULT NULL,
  `koordinat_lintang` varchar(11) DEFAULT NULL,
  `no_kk` bigint DEFAULT NULL,
  `berat_badan` int DEFAULT NULL,
  `tinggi_badan` int DEFAULT NULL,
  `lingkar_kepala` int DEFAULT NULL,
  `jml_saudara_kandung` int DEFAULT NULL,
  `jarak_ke_sekolah` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id_tahun_ajaran` int NOT NULL,
  `tahun_ajaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userna_me` varchar(20) NOT NULL,
  `pa_ssword` varchar(70) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `tglaktif` date DEFAULT NULL,
  `jabatan` varchar(20) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `no` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userna_me`, `pa_ssword`, `nama`, `alamat`, `nohp`, `tgllahir`, `tglaktif`, `jabatan`, `avatar`, `no`) VALUES
('admin', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'admin', 'jl jalan', '0875757777', '0000-00-00', '2016-10-08', 'admin', 'dist/img/avatar5.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wali_siswa`
--

CREATE TABLE `wali_siswa` (
  `id_wali_siswa` int NOT NULL,
  `id_siswa` int DEFAULT NULL,
  `nama_wali` varchar(50) DEFAULT NULL,
  `tahun_lahir_wali` int DEFAULT NULL,
  `jenjang_pendidikan_wali` varchar(15) DEFAULT NULL,
  `pekerjaan_wali` varchar(15) DEFAULT NULL,
  `penghasilan_wali` varchar(30) DEFAULT NULL,
  `nik_wali` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ayah_siswa`
--
ALTER TABLE `ayah_siswa`
  ADD PRIMARY KEY (`id_ayah_siswa`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `ibu_siswa`
--
ALTER TABLE `ibu_siswa`
  ADD PRIMARY KEY (`id_ibu_siswa`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD KEY `id` (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `no` (`no`);

--
-- Indexes for table `kps`
--
ALTER TABLE `kps`
  ADD PRIMARY KEY (`id_kps`);

--
-- Indexes for table `pip`
--
ALTER TABLE `pip`
  ADD PRIMARY KEY (`id_pip`);

--
-- Indexes for table `rombel`
--
ALTER TABLE `rombel`
  ADD PRIMARY KEY (`id_rombel`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id_tahun_ajaran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userna_me`),
  ADD KEY `no` (`no`);

--
-- Indexes for table `wali_siswa`
--
ALTER TABLE `wali_siswa`
  ADD PRIMARY KEY (`id_wali_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ayah_siswa`
--
ALTER TABLE `ayah_siswa`
  MODIFY `id_ayah_siswa` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ibu_siswa`
--
ALTER TABLE `ibu_siswa`
  MODIFY `id_ibu_siswa` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `kps`
--
ALTER TABLE `kps`
  MODIFY `id_kps` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pip`
--
ALTER TABLE `pip`
  MODIFY `id_pip` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rombel`
--
ALTER TABLE `rombel`
  MODIFY `id_rombel` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id_tahun_ajaran` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wali_siswa`
--
ALTER TABLE `wali_siswa`
  MODIFY `id_wali_siswa` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
