-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2021 at 03:15 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdbcandy`
--

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `id_bayar` varchar(20) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_daftar` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `keterangan` int(10) DEFAULT NULL,
  `bukti` varchar(50) DEFAULT NULL,
  `verifikasi` int(1) NOT NULL DEFAULT 0,
  `hapus` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bayar`
--

INSERT INTO `bayar` (`id_bayar`, `id_user`, `id_daftar`, `jumlah`, `tgl_bayar`, `keterangan`, `bukti`, `verifikasi`, `hapus`) VALUES
('202101250001', 0, 1, 1000000, '2021-01-25', NULL, 'bukti_transaksi/bukti_202101250001.jpg', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `biaya`
--

CREATE TABLE `biaya` (
  `id_biaya` varchar(50) NOT NULL,
  `jenkel` varchar(2) NOT NULL,
  `nama_biaya` varchar(200) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biaya`
--

INSERT INTO `biaya` (`id_biaya`, `jenkel`, `nama_biaya`, `jumlah`, `status`) VALUES
('SRGM LK', 'L', 'Seragam Laki Laki', 500000, '1');

-- --------------------------------------------------------

--
-- Table structure for table `daftar`
--

CREATE TABLE `daftar` (
  `id_daftar` int(11) NOT NULL,
  `no_daftar` varchar(30) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `jenis` varchar(30) DEFAULT NULL,
  `nis` varchar(30) DEFAULT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `no_kk` varchar(30) DEFAULT NULL,
  `nisn` varchar(30) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `jenkel` varchar(1) DEFAULT NULL,
  `tempat_lahir` varchar(128) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `asal_sekolah` varchar(128) DEFAULT NULL,
  `npsn_sekolah` varchar(20) DEFAULT NULL,
  `kab_sekolah` varchar(30) DEFAULT NULL,
  `status_sekolah` varchar(15) DEFAULT NULL,
  `kelas` varchar(11) DEFAULT NULL,
  `jurusan1` varchar(15) DEFAULT NULL,
  `jurusan2` varchar(15) DEFAULT NULL,
  `jenjang_sekolah` varchar(11) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `desa` varchar(128) DEFAULT NULL,
  `kecamatan` varchar(128) DEFAULT NULL,
  `kota` varchar(128) DEFAULT NULL,
  `provinsi` varchar(128) DEFAULT NULL,
  `kode_pos` varchar(6) DEFAULT NULL,
  `transportasi` varchar(128) DEFAULT NULL,
  `no_hp` varchar(16) DEFAULT NULL,
  `anak_ke` int(2) DEFAULT NULL,
  `saudara` int(11) DEFAULT NULL,
  `tinggi` int(3) DEFAULT NULL,
  `berat` int(3) DEFAULT NULL,
  `status_keluarga` varchar(50) DEFAULT NULL,
  `tinggal` varchar(128) DEFAULT NULL,
  `jarak` varchar(128) DEFAULT NULL,
  `waktu` varchar(128) DEFAULT NULL,
  `nik_ayah` varchar(16) DEFAULT NULL,
  `nama_ayah` varchar(128) DEFAULT NULL,
  `tempat_ayah` varchar(128) DEFAULT NULL,
  `tahun_lahir_ayah` int(11) DEFAULT NULL,
  `status_ayah` varchar(128) DEFAULT NULL,
  `pendidikan_ayah` varchar(128) DEFAULT NULL,
  `pekerjaan_ayah` varchar(128) DEFAULT NULL,
  `penghasilan_ayah` varchar(128) DEFAULT NULL,
  `no_hp_ayah` varchar(16) DEFAULT NULL,
  `nik_ibu` varchar(16) DEFAULT NULL,
  `nama_ibu` varchar(128) DEFAULT NULL,
  `tempat_ibu` varchar(128) DEFAULT NULL,
  `tahun_lahir_ibu` int(11) DEFAULT NULL,
  `status_ibu` varchar(128) DEFAULT NULL,
  `pendidikan_ibu` varchar(128) DEFAULT NULL,
  `pekerjaan_ibu` varchar(128) DEFAULT NULL,
  `penghasilan_ibu` varchar(128) DEFAULT NULL,
  `no_hp_ibu` varchar(16) DEFAULT NULL,
  `nik_wali` varchar(16) DEFAULT NULL,
  `nama_wali` varchar(128) DEFAULT NULL,
  `tempat_wali` varchar(128) DEFAULT NULL,
  `tahun_lahir_wali` int(11) DEFAULT NULL,
  `pendidikan_wali` varchar(50) DEFAULT NULL,
  `pekerjaan_wali` varchar(50) DEFAULT NULL,
  `penghasilan_wali` varchar(50) DEFAULT NULL,
  `no_hp_wali` varchar(16) DEFAULT NULL,
  `no_ijazah` varchar(128) DEFAULT NULL,
  `no_shun` varchar(128) DEFAULT NULL,
  `no_ujian` varchar(128) DEFAULT NULL,
  `no_kip` varchar(30) DEFAULT NULL,
  `file_kip` varchar(256) DEFAULT NULL,
  `file_kk` varchar(256) DEFAULT NULL,
  `file_ijazah` varchar(256) DEFAULT NULL,
  `file_akte` varchar(256) DEFAULT NULL,
  `file_shun` varchar(256) DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `alasan_keluar` varchar(100) DEFAULT NULL,
  `surat_keluar` varchar(255) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `aktif` int(1) DEFAULT 0,
  `status` int(1) DEFAULT 0,
  `petugas_daftar` varchar(10) DEFAULT NULL,
  `petugas_konfirmasi` varchar(10) DEFAULT NULL,
  `tgl_daftar` date DEFAULT NULL,
  `tgl_konfirmasi` date DEFAULT NULL,
  `baju` varchar(10) DEFAULT NULL,
  `bayar` varchar(100) DEFAULT NULL,
  `online` int(1) DEFAULT 0,
  `password` text DEFAULT NULL,
  `status_kartu` varchar(30) DEFAULT NULL,
  `jenis_kartu` varchar(15) DEFAULT NULL,
  `no_kartu` varchar(50) DEFAULT NULL,
  `file_kartu` varchar(50) DEFAULT NULL,
  `tingkat_prestasi` varchar(30) DEFAULT NULL,
  `peringkat_kelas` varchar(30) DEFAULT NULL,
  `file_prestasi` varchar(75) DEFAULT NULL,
  `keterampilan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar`
--

INSERT INTO `daftar` (`id_daftar`, `no_daftar`, `email`, `jenis`, `nis`, `nik`, `no_kk`, `nisn`, `nama`, `foto`, `jenkel`, `tempat_lahir`, `tgl_lahir`, `asal_sekolah`, `npsn_sekolah`, `kab_sekolah`, `status_sekolah`, `kelas`, `jurusan1`, `jurusan2`, `jenjang_sekolah`, `agama`, `alamat`, `rt`, `rw`, `desa`, `kecamatan`, `kota`, `provinsi`, `kode_pos`, `transportasi`, `no_hp`, `anak_ke`, `saudara`, `tinggi`, `berat`, `status_keluarga`, `tinggal`, `jarak`, `waktu`, `nik_ayah`, `nama_ayah`, `tempat_ayah`, `tahun_lahir_ayah`, `status_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `no_hp_ayah`, `nik_ibu`, `nama_ibu`, `tempat_ibu`, `tahun_lahir_ibu`, `status_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `no_hp_ibu`, `nik_wali`, `nama_wali`, `tempat_wali`, `tahun_lahir_wali`, `pendidikan_wali`, `pekerjaan_wali`, `penghasilan_wali`, `no_hp_wali`, `no_ijazah`, `no_shun`, `no_ujian`, `no_kip`, `file_kip`, `file_kk`, `file_ijazah`, `file_akte`, `file_shun`, `tgl_keluar`, `alasan_keluar`, `surat_keluar`, `level`, `aktif`, `status`, `petugas_daftar`, `petugas_konfirmasi`, `tgl_daftar`, `tgl_konfirmasi`, `baju`, `bayar`, `online`, `password`, `status_kartu`, `jenis_kartu`, `no_kartu`, `file_kartu`, `tingkat_prestasi`, `peringkat_kelas`, `file_prestasi`, `keterampilan`) VALUES
(28, 'PPDBM1NGK2021001', NULL, 'SB', NULL, '21323', ' 6456456456456', '0021612348', 'MOH EKA BAYU AINUL HAKIM', 'foto_siswa/foto_0021612348.jpg', 'L', 'EWERQ', '2021-01-28', 'ASDASHBDHKLH', '090-9-0', 'OPIJOJ', 'Swasta', NULL, 'BHS', 'AGM', 'SMP', 'Islam', 'MAN 1 NGANJUK', '34', '2345', 'DFGDFG', 'DFGDFG', 'DFGDFG', 'DFGDFG', '345', 'Angkutan Umum', '085733506491', 23, 31, 31, 31, 'SADADA', 'Bersama Orang Tua', '435', '345', '3123123', 'ASDASD', NULL, 45645, NULL, 'SMP Sederajat', 'Buruh', 'Rp. 1 jt s/d Rp 2jt', '45645645645', '456456456', 'SRTSFSDFSDFSDFSF', NULL, 43634, NULL, 'D3', 'Tenaga Kerja Indonesia', 'Rp. 500.000 s/d Rp. 999.000', '456456456456', '3518081105023000', 'ASDASDASD', NULL, 456, 'Tidak Sekolah', 'Wirausaha', 'Rp. 5 jt s/d Rp. 20 jt', '456456456456', NULL, NULL, '5235234242432424', NULL, NULL, 'berkas_kk/kk_0021612348.png', 'ijazah_akta/ia_0021612348.png', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1234', NULL, NULL, NULL, NULL, 'Provinsi', '2', 'berkas_prestasi/pr_0021612348.pdf', 'ADS'),
(29, 'PPDBM1NGK2021002', NULL, 'SB', NULL, NULL, NULL, '0021649875', 'Amirudin', 'foto_siswa/default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '085733506491', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'PPDBM1NGK2021003', NULL, 'PR', NULL, '5345345345345', '24324', '0021612345', 'Eka Paksi', 'foto_siswa/foto_0021612345.jpg', 'P', 'NGANJUK', '2021-02-10', 'SFAFASDFSDFSF', '3234223', 'OPIJOJ', 'Negeri', NULL, 'AGM', 'AGM', 'MTs', 'Islam', 'AASDASDSSSS', '23', '12', 'NGLAWAK', 'KERTOSONO', 'ASDASDA', 'SDFSDFSDFSDF', '1212', 'Angkutan Umum', '085733506491', 1, 1, 123, 32, 'SESFFAS', 'Bersama Orang Tua', '12', '12', '234234', 'WFWEF', NULL, 3213, NULL, 'Tidak Sekolah', 'Tidak Bekerja', 'Rp. 500.000 s/d Rp. 999.000', '4234`', '324', '`FWEF', NULL, 324, NULL, 'SD Sederajat', 'Buruh', 'Rp. 500.000 s/d Rp. 999.000', '2312131', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5235234242432424', NULL, NULL, 'berkas_kk/kk_0021612345.png', 'ijazah_akta/ia_0021612345.png', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, '123456', 'Penerima', 'KKS', '2131234124142342342', 'berkas_kartu/kartu_0021612345.png', NULL, NULL, NULL, 'ADS'),
(31, 'PPDBM1NGK2021004', NULL, 'PR', NULL, NULL, NULL, '324234', 'Asdfasfa', 'foto_siswa/default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '324234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'PPDBM1NGK2021005', NULL, 'PR', NULL, NULL, NULL, '3423', 'Daweqwe', 'foto_siswa/default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '34234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'PPDBM1NGK2021006', NULL, 'PR', NULL, NULL, NULL, '2131231', 'Asdasdasd', 'foto_siswa/default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1234123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'PPDBM1NGK2021019', NULL, 'PR', NULL, NULL, NULL, '12323', 'Asdad', 'foto_siswa/default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '123123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1231', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'PPDBM1NGK2021020', NULL, 'PR', NULL, NULL, NULL, '1321345', 'Sdasds', 'foto_siswa/default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12313', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'PPDBM1NGK2021021', NULL, 'PR', NULL, NULL, NULL, '23123646', 'Dsads', 'foto_siswa/default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '123123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'PPDBM1NGK2021022', NULL, 'PR', NULL, NULL, NULL, '1231234', 'Weqweq', 'foto_siswa/default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '21412', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'PPDBM1NGK2021023', NULL, 'PR', NULL, NULL, NULL, '1231237657', 'Asdasd', 'foto_siswa/default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '31231', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'PPDBM1NGK2021024', NULL, 'PR', NULL, NULL, NULL, '325235', 'Aada', 'foto_siswa/default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '23424', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2345', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'PPDBM1NGK2021025', NULL, 'PR', NULL, NULL, NULL, '32', 'Dwdaqd', 'foto_siswa/foto_32.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1231', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 2, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1234', NULL, NULL, NULL, NULL, '', '', 'berkas_prestasi/pr_32.png', NULL),
(53, 'PPDBM1NGK2021026', NULL, 'PR', NULL, '234234', NULL, '0021612548', 'Kelengkeng', 'foto_siswa/foto_0021612548.png', 'L', 'ASD', '2021-02-24', 'MAN 1 NGANJUK', '0021654', 'NGANJUK', 'Negeri', NULL, 'IPA', 'BHS', 'SMP', 'Islam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '085733506491', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5235234242432424', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MAN'),
(54, 'PPDBM1NGK2021027', NULL, 'SB', NULL, '1231313123', NULL, '0026898798', 'Rambutan', 'foto_siswa/foto_0026898798.jpg', 'P', 'NGANJUK', '2021-02-24', 'ASDASHBDHKLH', '3234223', 'NGANJUK', 'Swasta', NULL, 'AGM', 'BHS', 'SMP', 'Kristen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '085748889878', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5235234242432424', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MAN');

-- --------------------------------------------------------

--
-- Table structure for table `histori`
--

CREATE TABLE `histori` (
  `id` int(11) NOT NULL,
  `id_permohonan` varchar(30) NOT NULL,
  `nik` int(30) NOT NULL,
  `status` int(1) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `histori`
--

INSERT INTO `histori` (`id`, `id_permohonan`, `nik`, `status`, `tanggal`, `keterangan`) VALUES
(1, '201907070001', 123, 1, '2019-07-07 15:57:31', 'Silahkan datang ke desa/kelurahan setempat untuk pengumpulan berkas persyaratan permohonan  dan konfirmasi'),
(2, '201907070001', 0, 2, '2019-07-07 22:26:33', 'pemberkasan sedang kami proses silahkan untuk menunggu'),
(4, '202004040001', 12, 1, '2020-04-04 18:25:29', 'Silahkan datang ke desa/kelurahan setempat untuk pengumpulan berkas persyaratan permohonan  dan konfirmasi'),
(5, '202004040002', 12, 1, '2020-04-04 18:25:55', 'Permohonan sudah berhasil masuk, mohon untuk menunggu proses pengecekan data');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` varchar(50) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `status`) VALUES
('PR', 'PRESTASI', 1),
('SB', 'REGULER', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenjang`
--

CREATE TABLE `jenjang` (
  `id_jenjang` varchar(5) NOT NULL,
  `nama_jenjang` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenjang`
--

INSERT INTO `jenjang` (`id_jenjang`, `nama_jenjang`, `status`) VALUES
('SMK', 'SMK', 1),
('SMP', 'SMP', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` varchar(50) NOT NULL,
  `nama_jurusan` varchar(100) DEFAULT NULL,
  `kuota` int(10) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `kuota`, `status`) VALUES
('AGM', 'Keagamaan', 100, 1),
('BHS', 'Bahasa dan Budaya', 100, 1),
('IPA', 'MIPA', 500, 1),
('IPS', 'IPS', 200, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kartu_ujian`
--

CREATE TABLE `kartu_ujian` (
  `id_kartu` int(11) NOT NULL,
  `nomor_kartu` varchar(10) DEFAULT NULL,
  `nama` varchar(250) DEFAULT NULL,
  `asal` varchar(250) DEFAULT NULL,
  `nisn` varchar(30) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kartu_ujian`
--

INSERT INTO `kartu_ujian` (`id_kartu`, `nomor_kartu`, `nama`, `asal`, `nisn`, `password`) VALUES
(1, '21001', 'Rambutan', 'ASDASHBDHKLH', '0026898798', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `keterampilan`
--

CREATE TABLE `keterampilan` (
  `id_keterampilan` varchar(50) NOT NULL,
  `nama_keterampilan` varchar(100) DEFAULT NULL,
  `kuota` int(10) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keterampilan`
--

INSERT INTO `keterampilan` (`id_keterampilan`, `nama_keterampilan`, `kuota`, `status`) VALUES
('ADS', 'sada', 12312, 1),
('MAN', 'MAN 1 NGANJUK', 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `nama_kontak` varchar(50) DEFAULT NULL,
  `no_kontak` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `nama_kontak`, `no_kontak`, `status`) VALUES
(3, 'PRASOJO', '085733506491', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `pengumuman` text DEFAULT NULL,
  `tgl` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jenis` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `id_user`, `judul`, `pengumuman`, `tgl`, `jenis`) VALUES
(2, 5, 'INFORMASI DAFTAR ULANG', '<p>Kepada Calon Siswa Siswi SMK HS AGUNG yang sudah mendaftar silahkan untuk melakukan <b>DAFTAR ULANG</b> Ke Sekolah dengan membawa persyaratan Formulir Pendaftaran dan membayar <b>Biaya Pendaftaran</b>.Â </p>', '2021-01-28 09:45:32', 2);

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id_prestasi` int(11) NOT NULL,
  `id_daftar` int(11) NOT NULL,
  `mat3` decimal(10,0) DEFAULT NULL,
  `bin3` decimal(10,0) DEFAULT NULL,
  `bing3` decimal(10,0) DEFAULT NULL,
  `ipa3` decimal(10,0) DEFAULT NULL,
  `ips3` decimal(10,0) DEFAULT NULL,
  `mat4` decimal(10,0) DEFAULT NULL,
  `bin4` decimal(10,0) DEFAULT NULL,
  `bing4` decimal(10,0) DEFAULT NULL,
  `ipa4` decimal(10,0) DEFAULT NULL,
  `ips4` decimal(10,0) DEFAULT NULL,
  `mat5` decimal(10,0) DEFAULT NULL,
  `bin5` decimal(10,0) DEFAULT NULL,
  `bing5` decimal(10,0) DEFAULT NULL,
  `ipa5` decimal(10,0) DEFAULT NULL,
  `ips5` decimal(10,0) DEFAULT NULL,
  `tipe_prestasi` varchar(100) DEFAULT NULL,
  `jenis_prestasi` varchar(100) DEFAULT NULL,
  `nama_prestasi` varchar(100) DEFAULT NULL,
  `peringkat_prestasi` int(11) DEFAULT NULL,
  `tingkat_prestasi` varchar(100) DEFAULT NULL,
  `file_prestasi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id_prestasi`, `id_daftar`, `mat3`, `bin3`, `bing3`, `ipa3`, `ips3`, `mat4`, `bin4`, `bing4`, `ipa4`, `ips4`, `mat5`, `bin5`, `bing5`, `ipa5`, `ips5`, `tipe_prestasi`, `jenis_prestasi`, `nama_prestasi`, `peringkat_prestasi`, `tingkat_prestasi`, `file_prestasi`) VALUES
(1, 51, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 52, '7', '7', '7', '7', '7', '7', '7', '7', '7', '7', '7', '7', '7', '7', '7', 'NON AKADEMIK', 'KIR', 'fasdasd', 3, 'Kecamatan', 'berkas_prestasi/pr_32.png'),
(3, 53, '78', '80', '85', '84', '87', '79', '86', '87', '79', '95', '89', '75', '87', '84', '87', 'NON AKADEMIK', NULL, 'Lomba Fotografi', 3, 'Internasional', 'berkas_prestasi/pr_0021612548.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `npsn` varchar(16) NOT NULL,
  `nama_sekolah` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(1) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `npsn` varchar(30) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kota` varchar(30) DEFAULT NULL,
  `provinsi` varchar(30) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `favicon` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_telp` varchar(50) DEFAULT NULL,
  `klikchat` text DEFAULT NULL,
  `livechat` text DEFAULT NULL,
  `nolivechat` varchar(50) DEFAULT NULL,
  `infobayar` text DEFAULT NULL,
  `syarat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `nama_sekolah`, `npsn`, `alamat`, `kota`, `provinsi`, `logo`, `favicon`, `email`, `no_telp`, `klikchat`, `livechat`, `nolivechat`, `infobayar`, `syarat`) VALUES
(1, 'MAN 1 NGANJUK', '69787351', 'Jl K.H Abdul Fattah', 'Nganjuk', 'Jawa Barat', 'assets/img/logo/logo437.png', NULL, NULL, NULL, 'Assalamualaikum%25252Bselamat%25252Bsiang', 'Assalamualaikum%2525252C%25252Bmohon%25252Binfo%25252Bpendaftaran', '082136298388', '<p>Silahkan melakukan proses pembayaran melalui No Rekening dibawah ini :</p><p>0000000000000</p><p>A/N SMK HS AGUNG</p><p>BANK NASIONAL INDONESIA</p><p>Setelah melakukan proses pembayaran harap konfirmasikan pembayaran di menu tambah pembayaran.</p><p>setelah itu akan dilakukan pengechekan oleh Panitia PPDB SMK HS AGUNG.</p>', '<p>SYARAT PENDAFTARAN</p>');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(128) NOT NULL,
  `level` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `level`, `username`, `password`, `status`) VALUES
(5, 'Administrator', 'admin', 'admin', '$2y$10$j5STRMVkhno25h93TJGDUupdr4L7CDEQQZCOwyFyqFO5QfCteP3H.', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `biaya`
--
ALTER TABLE `biaya`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indexes for table `daftar`
--
ALTER TABLE `daftar`
  ADD PRIMARY KEY (`id_daftar`),
  ADD UNIQUE KEY `no_daftar` (`no_daftar`);

--
-- Indexes for table `histori`
--
ALTER TABLE `histori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `jenjang`
--
ALTER TABLE `jenjang`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kartu_ujian`
--
ALTER TABLE `kartu_ujian`
  ADD PRIMARY KEY (`id_kartu`);

--
-- Indexes for table `keterampilan`
--
ALTER TABLE `keterampilan`
  ADD PRIMARY KEY (`id_keterampilan`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id_prestasi`),
  ADD UNIQUE KEY `id_daftar` (`id_daftar`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`npsn`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar`
--
ALTER TABLE `daftar`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `histori`
--
ALTER TABLE `histori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kartu_ujian`
--
ALTER TABLE `kartu_ujian`
  MODIFY `id_kartu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id_prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
