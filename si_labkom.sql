-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 20, 2023 at 08:53 AM
-- Server version: 8.0.30
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_labkom`
--

-- --------------------------------------------------------

--
-- Table structure for table `alat_praktik`
--

CREATE TABLE `alat_praktik` (
  `id` int NOT NULL,
  `nama_alat` varchar(300) NOT NULL,
  `jenis_alat` varchar(300) NOT NULL,
  `foto_alat` varchar(300) NOT NULL,
  `jumlah` int NOT NULL,
  `jumlah_terpakai` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `alat_praktik`
--

INSERT INTO `alat_praktik` (`id`, `nama_alat`, `jenis_alat`, `foto_alat`, `jumlah`, `jumlah_terpakai`) VALUES
(8, 'Tang Crimping Oren', 'Alat Jaringan', '1556315456_16470811746451561004707.jpg', 2, 0),
(9, 'Router Mikrotik', 'Alat Jaringan', '268849394_1647081306852615127677.jpg', 5, 0),
(10, 'Switch D-Link DES-1005A', 'Alat Jaringan', '204185721_16470814199361497548338.jpg', 2, 0),
(11, 'Switch D-Link DES-1008A', 'Alat Jaringan', '68952639_1647081647568-1458105849.jpg', 2, 0),
(12, 'Tenda S105', 'Alat Jaringan', '209062849_1647081720368-728188252.jpg', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `identitas_siswa`
--

CREATE TABLE `identitas_siswa` (
  `id` int NOT NULL,
  `nama` varchar(300) NOT NULL,
  `jenis_kelamin` varchar(300) NOT NULL,
  `nisn` varchar(200) NOT NULL,
  `jurusan` varchar(300) NOT NULL,
  `tingkat` varchar(300) NOT NULL,
  `kon_update` enum('Y','N') NOT NULL,
  `username` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `identitas_siswa`
--

INSERT INTO `identitas_siswa` (`id`, `nama`, `jenis_kelamin`, `nisn`, `jurusan`, `tingkat`, `kon_update`, `username`) VALUES
(1, 'Fajar Saputra', 'Laki-Laki', '2020013', 'Teknik Komputer Dan Jaringan', 'Kelas 12 TKJ', 'Y', '2020013'),
(2, 'AKMAL AMARULLAH YADHYNA SAPUTRA', 'Laki-Laki', '0058544951', 'Otomatisasi Tata Kelola Dan Perkantoran', 'Kelas 10 OTKP', 'Y', '0058544951');

-- --------------------------------------------------------

--
-- Table structure for table `komponen_komputer`
--

CREATE TABLE `komponen_komputer` (
  `id` int NOT NULL,
  `nama_alat` varchar(300) NOT NULL,
  `jenis_alat` varchar(300) NOT NULL,
  `foto_alat` varchar(300) NOT NULL,
  `jumlah` int NOT NULL,
  `jumlah_terpakai` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `komponen_komputer`
--

INSERT INTO `komponen_komputer` (`id`, `nama_alat`, `jenis_alat`, `foto_alat`, `jumlah`, `jumlah_terpakai`) VALUES
(7, 'Fan Komputer Rusak', 'Alat Komputer', '2024142705_1647081557679-1579829106.jpg', 16, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pc`
--

CREATE TABLE `pc` (
  `id` int NOT NULL,
  `nama_pc` varchar(300) NOT NULL,
  `motherboard` varchar(300) NOT NULL,
  `ram` varchar(300) NOT NULL,
  `processor` varchar(300) NOT NULL,
  `keyboard` varchar(300) NOT NULL,
  `mouse` varchar(300) NOT NULL,
  `status_jaringan` varchar(50) NOT NULL,
  `monitor` varchar(50) NOT NULL,
  `hdd_model` varchar(200) NOT NULL,
  `kapasitas_hdd` varchar(45) NOT NULL,
  `system_operasi` varchar(300) NOT NULL,
  `foto_pc` varchar(300) NOT NULL,
  `foto_monitor` varchar(300) NOT NULL,
  `foto_mouse` varchar(200) NOT NULL,
  `foto_keyboard` varchar(200) NOT NULL,
  `status_pc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pc`
--

INSERT INTO `pc` (`id`, `nama_pc`, `motherboard`, `ram`, `processor`, `keyboard`, `mouse`, `status_jaringan`, `monitor`, `hdd_model`, `kapasitas_hdd`, `system_operasi`, `foto_pc`, `foto_monitor`, `foto_mouse`, `foto_keyboard`, `status_pc`) VALUES
(16, 'SERVER SMK PGRI N', 'Lenovo Sharkbay', '16GB', 'Intel Xeon E3 1241 v3', 'Xtyle', 'AOC', 'Connect', 'LG', 'WDC WD10EZEX-00BN5A0', '1TB', 'Windows 11', '1198583330_1647080519195638684667.jpg', '1672037986_1647080620080-2022603713.jpg', '348171737_1647079530453-1469671995.jpg', '126385230_16470806540851564968653.jpg', 'Baik'),
(17, 'PC 1', 'ECS H61H2-MV', '4GB', 'Intel Pentium G465', 'M-Tech', 'AOC', 'Connect', 'Acer', 'ST3320413CS ATA Device', '300GB', 'Windows 10', '966261748_1647080690189-859939525.jpg', '275315083_1647080731013-295505180.jpg', '1882897822_1647080124458890822603.jpg', '153023228_1647080757734-1261454691.jpg', 'Baik'),
(18, 'PC 2', 'Intel H61 Rev B3', '4GB', 'Intel Core i3 2100', 'M-Tech', 'Logitech', 'Connect', 'Acer', 'WDC WD1600AVVS-63L2B0 ATA Device', '200GB', 'Windows 10', '147243740_1647081065550-1735777188.jpg', '368410272_1647080950714-1956129922.jpg', '1796952174_1647081089120341475015.jpg', '1393142607_16470811156131769482402.jpg', 'Baik');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_alat_praktik`
--

CREATE TABLE `peminjaman_alat_praktik` (
  `id` int NOT NULL,
  `nama_peminjam` varchar(300) NOT NULL,
  `alat_yang_dipinjam` varchar(300) NOT NULL,
  `jumlah_alat` varchar(16) NOT NULL,
  `tanggal_peminjaman` varchar(20) NOT NULL,
  `waktu_peminjaman` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `konfirmasi_selesai` varchar(20) NOT NULL,
  `username` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penggunaan_komputer`
--

CREATE TABLE `penggunaan_komputer` (
  `id` int NOT NULL,
  `nama_pengguna` varchar(300) NOT NULL,
  `komputer` varchar(30) NOT NULL,
  `tanggal_penggunan` varchar(30) NOT NULL,
  `waktu_penggunan` varchar(20) NOT NULL,
  `status` varchar(300) NOT NULL,
  `username` varchar(300) NOT NULL,
  `konfirmasi_selesai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `penggunaan_komputer`
--

INSERT INTO `penggunaan_komputer` (`id`, `nama_pengguna`, `komputer`, `tanggal_penggunan`, `waktu_penggunan`, `status`, `username`, `konfirmasi_selesai`) VALUES
(1, 'AKMAL AMARULLAH YADHYNA SAPUTRA', 'PC 1', '20-07-2022', '13:31', 'Terima', '0058544951', 'Sudah');

-- --------------------------------------------------------

--
-- Table structure for table `rencana_anggaran`
--

CREATE TABLE `rencana_anggaran` (
  `id` int NOT NULL,
  `nama_alat` varchar(300) NOT NULL,
  `foto_alat` varchar(300) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `volume` varchar(30) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga_satuan` int NOT NULL,
  `jumlah` int NOT NULL,
  `status_pengajuan` varchar(30) NOT NULL,
  `status_alat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rencana_anggaran`
--

INSERT INTO `rencana_anggaran` (`id`, `nama_alat`, `foto_alat`, `tanggal_pengajuan`, `tanggal_pembelian`, `volume`, `satuan`, `harga_satuan`, `jumlah`, `status_pengajuan`, `status_alat`) VALUES
(10, 'Procesor I3-3220', '759655663_OIP (1).jpg', '2022-08-22', '2022-08-24', '5', 'pcs', 250000, 1250000, 'Menunggu', 'Menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `selesai_peminjaman_alat`
--

CREATE TABLE `selesai_peminjaman_alat` (
  `id` int NOT NULL,
  `nama_peminjam` varchar(300) NOT NULL,
  `alat_yang_dipinjam` varchar(255) NOT NULL,
  `jumlah_alat` varchar(30) NOT NULL,
  `tanggal_peminjaman` varchar(16) NOT NULL,
  `waktu_peminjaman` varchar(20) NOT NULL,
  `kondisi_awal` varchar(50) NOT NULL,
  `kondisi_akhir` varchar(50) NOT NULL,
  `status_admin` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `username` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `selesai_penggunaan_komputer`
--

CREATE TABLE `selesai_penggunaan_komputer` (
  `id` int NOT NULL,
  `nama_pengguna` varchar(300) NOT NULL,
  `komputer` varchar(20) NOT NULL,
  `tanggal_penggunaan` varchar(30) NOT NULL,
  `waktu_penggunaan` varchar(30) NOT NULL,
  `konfirmasi_selesai` varchar(20) NOT NULL,
  `kondisi_awal` varchar(30) NOT NULL,
  `kondisi_akhir` varchar(30) NOT NULL,
  `status_admin` varchar(20) NOT NULL,
  `status` varchar(300) NOT NULL,
  `username` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selesai_penggunaan_komputer`
--

INSERT INTO `selesai_penggunaan_komputer` (`id`, `nama_pengguna`, `komputer`, `tanggal_penggunaan`, `waktu_penggunaan`, `konfirmasi_selesai`, `kondisi_awal`, `kondisi_akhir`, `status_admin`, `status`, `username`) VALUES
(1, 'AKMAL AMARULLAH YADHYNA SAPUTRA', 'PC 1', '20-07-2022', '13:31', 'Sudah', 'Baik', 'Baik', 'Terima', 'Terima', '0058544951');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `jurusan` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`jurusan`) VALUES
('Otomatisasi Tata Kelola Dan Perkantoran'),
('Teknik Komputer Dan Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `kelas` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`kelas`) VALUES
('Kelas 10 OTKP'),
('Kelas 10 TKJ'),
('Kelas 11 OTKP'),
('Kelas 11 TKJ'),
('Kelas 12 OTKP'),
('Kelas 12 TKJ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `nama` varchar(300) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `level` enum('Admin','Petugas Lab','Kepsek','Siswa') NOT NULL,
  `sts_akun` enum('Aktif','Tidak Aktif') NOT NULL,
  `on_status` varchar(50) NOT NULL,
  `registrasi_status` enum('Antrian','Terima','Tolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `jenis_kelamin`, `username`, `password`, `level`, `sts_akun`, `on_status`, `registrasi_status`) VALUES
(6, 'Fajar Saputra', 'Laki-Laki', 'fajarsaputratkj3@gmail.com', 'neglasarioke', 'Admin', 'Aktif', 'Offline', 'Terima'),
(15, 'Drs. Agus Irianto', 'Laki-Laki', 'agusirianto1952@gmail.com', 'neglasari1207', 'Kepsek', 'Aktif', 'Offline', 'Terima');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat_praktik`
--
ALTER TABLE `alat_praktik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `identitas_siswa`
--
ALTER TABLE `identitas_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komponen_komputer`
--
ALTER TABLE `komponen_komputer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pc`
--
ALTER TABLE `pc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman_alat_praktik`
--
ALTER TABLE `peminjaman_alat_praktik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penggunaan_komputer`
--
ALTER TABLE `penggunaan_komputer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rencana_anggaran`
--
ALTER TABLE `rencana_anggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selesai_peminjaman_alat`
--
ALTER TABLE `selesai_peminjaman_alat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selesai_penggunaan_komputer`
--
ALTER TABLE `selesai_penggunaan_komputer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alat_praktik`
--
ALTER TABLE `alat_praktik`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `identitas_siswa`
--
ALTER TABLE `identitas_siswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `komponen_komputer`
--
ALTER TABLE `komponen_komputer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pc`
--
ALTER TABLE `pc`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `peminjaman_alat_praktik`
--
ALTER TABLE `peminjaman_alat_praktik`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penggunaan_komputer`
--
ALTER TABLE `penggunaan_komputer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rencana_anggaran`
--
ALTER TABLE `rencana_anggaran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `selesai_peminjaman_alat`
--
ALTER TABLE `selesai_peminjaman_alat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `selesai_penggunaan_komputer`
--
ALTER TABLE `selesai_penggunaan_komputer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
