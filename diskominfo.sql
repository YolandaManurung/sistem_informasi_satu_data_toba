-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Agu 2020 pada 07.01
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diskominfo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dinas_infrastruktur`
--

CREATE TABLE `dinas_infrastruktur` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `infrastruktur-aplikasiopdtoba`
--

CREATE TABLE `infrastruktur-aplikasiopdtoba` (
  `id` int(10) NOT NULL,
  `Nama_OPD` varchar(255) NOT NULL,
  `aplikasi` varchar(255) DEFAULT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) DEFAULT 'Requested',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `infrastruktur-aplikasiopdtoba`
--

INSERT INTO `infrastruktur-aplikasiopdtoba` (`id`, `Nama_OPD`, `aplikasi`, `tahun`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dinas Perhubungan', '-', 2018, 'Rejected', '2020-06-24 02:12:55', '2020-07-16 09:31:46'),
(3, 'Dinas Ketahanan Pangan', '-', 2018, 'Rejected', '2020-06-26 22:13:45', '2020-07-16 22:17:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `infrastruktur-jembatan`
--

CREATE TABLE `infrastruktur-jembatan` (
  `id` int(10) NOT NULL,
  `keadaan` varchar(255) NOT NULL,
  `jumlah_jembatan` int(20) NOT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) DEFAULT 'Requested',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `infrastruktur-jembatan`
--

INSERT INTO `infrastruktur-jembatan` (`id`, `keadaan`, `jumlah_jembatan`, `tahun`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Sedang', 53, 2018, 'Rejected', '2020-06-26 22:15:21', '2020-07-16 22:39:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `infrastruktur-panjangjalan`
--

CREATE TABLE `infrastruktur-panjangjalan` (
  `id` int(10) NOT NULL,
  `keadaan` varchar(255) DEFAULT NULL,
  `kondisi_jalan` varchar(255) DEFAULT NULL,
  `panjang_jalan_keadaan` float DEFAULT NULL,
  `panjang_jalan_kondisi_jalan` float NOT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) DEFAULT 'Requested',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `infrastruktur-panjangjalan`
--

INSERT INTO `infrastruktur-panjangjalan` (`id`, `keadaan`, `kondisi_jalan`, `panjang_jalan_keadaan`, `panjang_jalan_kondisi_jalan`, `tahun`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Aspal', 'Baik', 474.38, 235.993, 2018, 'Rejected', '2020-06-24 20:08:52', '2020-07-16 09:18:08'),
(2, 'Kerikil', 'Sedang', 127.16, 132.395, 2018, 'Requested', '2020-06-24 20:19:30', '2020-06-24 20:19:30'),
(3, 'Tanah', 'Rusak Berat', 144.56, 377.712, 2018, 'Requested', '2020-06-24 20:20:20', '2020-06-24 20:20:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `infrastruktur-panjangjalankabupaten`
--

CREATE TABLE `infrastruktur-panjangjalankabupaten` (
  `id` int(10) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `panjang_jalan` float DEFAULT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) DEFAULT 'Requested',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `infrastruktur-panjangjalankabupaten`
--

INSERT INTO `infrastruktur-panjangjalankabupaten` (`id`, `kecamatan`, `panjang_jalan`, `tahun`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Tampahan', 20.1, 2018, 'Rejected', '2020-06-24 21:16:20', '2020-07-16 22:59:40'),
(3, 'Balige', 97.9, 2018, 'Rejected', '2020-06-26 21:41:45', '2020-07-19 08:22:58'),
(8, 'Laguboti', 64.4, 2018, 'Requested', '2020-06-26 22:16:25', '2020-06-26 22:16:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `infrastruktur-pembagianpenetapanbagihasilpajak`
--

CREATE TABLE `infrastruktur-pembagianpenetapanbagihasilpajak` (
  `id` int(10) NOT NULL,
  `desa` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `alokasi_dasar` float(20,0) DEFAULT NULL,
  `realisasi_PBB` float(20,0) DEFAULT NULL,
  `bobot` float(20,0) DEFAULT NULL,
  `alokasi_formula` float(20,0) DEFAULT NULL,
  `pagu_bagi` float(20,0) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Requested',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `tahun` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `infrastruktur-pembagianpenetapanbagihasilpajak`
--

INSERT INTO `infrastruktur-pembagianpenetapanbagihasilpajak` (`id`, `desa`, `kecamatan`, `alokasi_dasar`, `realisasi_PBB`, `bobot`, `alokasi_formula`, `pagu_bagi`, `status`, `updated_at`, `created_at`, `tahun`) VALUES
(1, 'Hutanamora', 'Balige', 2000000, 30000, 2, 100000, 9000000, 'Rejected', '2020-07-16 23:50:01', '2020-06-25 00:58:33', 2018),
(3, 'HutagaolPeatalun', 'Balige', 9774368, 69084, 0, 102285, 14099532, 'Requested', '2020-06-26 22:23:01', '2020-06-26 22:23:01', 2018);

-- --------------------------------------------------------

--
-- Struktur dari tabel `infrastruktur-pembagian_penetapan_besaran_alokasi-dana_desa`
--

CREATE TABLE `infrastruktur-pembagian_penetapan_besaran_alokasi-dana_desa` (
  `id` int(10) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `desa` varchar(255) NOT NULL,
  `alokasi_dasar` float(20,0) DEFAULT NULL,
  `alokasi_formula` float(20,0) DEFAULT NULL,
  `paguDanaDesa` float(20,0) DEFAULT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) DEFAULT 'Requested',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `infrastruktur-pembagian_penetapan_besaran_alokasi-dana_desa`
--

INSERT INTO `infrastruktur-pembagian_penetapan_besaran_alokasi-dana_desa` (`id`, `kecamatan`, `desa`, `alokasi_dasar`, `alokasi_formula`, `paguDanaDesa`, `tahun`, `status`, `updated_at`, `created_at`) VALUES
(1, 'Balige', 'Hutanamora', 9, 9, NULL, 2018, 'Accepted', '2020-07-17 00:07:01', '2020-06-25 06:15:18'),
(5, 'Laguboti', 'Siantar', 3, 4, NULL, 2018, 'Accepted', '2020-06-30 10:20:54', '2020-06-30 10:20:54'),
(6, 'Balige', 'd', 4, 3, NULL, 2018, 'Accepted', '2020-06-30 10:21:18', '2020-06-30 10:21:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `infrastruktur-pembangunanbersumberdanadesa`
--

CREATE TABLE `infrastruktur-pembangunanbersumberdanadesa` (
  `id` int(10) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `desa` varchar(255) NOT NULL,
  `irigasi` varchar(255) DEFAULT NULL,
  `jalan_desa` varchar(255) DEFAULT NULL,
  `jumlah` varchar(20) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) DEFAULT 'Requested',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `infrastruktur-pembangunanbersumberdanadesa`
--

INSERT INTO `infrastruktur-pembangunanbersumberdanadesa` (`id`, `kecamatan`, `desa`, `irigasi`, `jalan_desa`, `jumlah`, `keterangan`, `tahun`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Tampahan', 'Gurgur Aek Raja', '-', 'Plat Dwiker Ds IV', '5 unit', '-', 2018, 'Accepted', '2020-06-24 23:23:30', '2020-07-16 23:38:49'),
(3, 'Tampahan', 'Gurgur Aek Raja', '-', 'Plat Dwiker Ds III', '1 unit', NULL, 2018, 'Requested', '2020-06-24 23:31:35', '2020-06-24 23:31:35'),
(4, 'Tampahan', 'Gurgur Aek Raja', 'Drainase Ds IV', '-', '112 m', '-', 2018, 'Requested', '2020-06-24 23:36:13', '2020-06-24 23:36:13'),
(6, 'Tampahan', 'Tangga Batu Timur', 'Saluran Irigasi Holbung Bagas', '-', '1', '-', 2018, 'Requested', '2020-06-26 22:20:28', '2020-06-26 22:20:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `infrastruktur-perhitungan_dana_desa`
--

CREATE TABLE `infrastruktur-perhitungan_dana_desa` (
  `id` int(10) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `desa` varchar(255) NOT NULL,
  `alokasi_dasar` float(20,0) NOT NULL,
  `alokasi_formula` float(20,0) NOT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) DEFAULT 'Requested',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `infrastruktur-perhitungan_dana_desa`
--

INSERT INTO `infrastruktur-perhitungan_dana_desa` (`id`, `kecamatan`, `desa`, `alokasi_dasar`, `alokasi_formula`, `tahun`, `status`, `updated_at`, `created_at`) VALUES
(1, 'Balige', 'Huta Namora', 616345, 1565912, 2018, 'Accepted', '2020-07-17 00:15:36', '2020-06-25 08:15:28'),
(2, 'Laguboti', 'Sibuea', 616345, 27773, 2018, 'Requested', '2020-06-25 08:18:09', '2020-06-25 08:18:09'),
(6, 'Balige', 'SS', 33333, 333333, 2018, 'Requested', '2020-07-01 01:03:02', '2020-07-01 01:03:02'),
(7, 'Habinsaran', 'k', 616345, 36586, 2018, 'Requested', '2020-07-06 00:35:13', '2020-07-06 00:35:13'),
(8, 'Nassau', 'Kaa', 78, 98, 2019, 'Requested', '2020-07-22 21:10:17', '2020-07-22 21:10:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kependudukan_jumlah_akta`
--

CREATE TABLE `kependudukan_jumlah_akta` (
  `id` int(10) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `akta_kelahiran` int(20) DEFAULT NULL,
  `akta_perkawinan` int(20) DEFAULT NULL,
  `akta_perceraian` int(20) DEFAULT NULL,
  `yang_memiliki_ektp` int(20) NOT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Requested',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kependudukan_jumlah_akta`
--

INSERT INTO `kependudukan_jumlah_akta` (`id`, `kecamatan`, `akta_kelahiran`, `akta_perkawinan`, `akta_perceraian`, `yang_memiliki_ektp`, `tahun`, `status`, `updated_at`, `created_at`) VALUES
(6, 'Balige', 14014, 7433, 21, 25356, 2018, 'Accepted', '2020-07-26 20:45:44', '2020-06-28 21:53:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kependudukan_jumlah_penduduk`
--

CREATE TABLE `kependudukan_jumlah_penduduk` (
  `id` int(10) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `laki_laki` float DEFAULT NULL,
  `perempuan` float DEFAULT NULL,
  `total` int(20) DEFAULT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Requested',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kependudukan_jumlah_penduduk`
--

INSERT INTO `kependudukan_jumlah_penduduk` (`id`, `kecamatan`, `laki_laki`, `perempuan`, `total`, `tahun`, `status`, `updated_at`, `created_at`) VALUES
(5, 'Balige', 21950, 22313, NULL, 2018, 'Accepted', '2020-07-26 20:00:50', '2020-06-28 21:58:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kependudukan_tenaga_kerja`
--

CREATE TABLE `kependudukan_tenaga_kerja` (
  `id` int(10) NOT NULL,
  `kelompok_umur` varchar(255) NOT NULL,
  `bekerja` int(20) DEFAULT NULL,
  `pencari_kerja` int(20) DEFAULT NULL,
  `angkatan_kerja` int(20) DEFAULT NULL,
  `bukan_angkatan_kerja` int(20) DEFAULT NULL,
  `tenaga_kerja` int(20) DEFAULT NULL,
  `APAK` float DEFAULT NULL,
  `pengangguran_terbuka` int(20) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) DEFAULT 'Requested',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kependudukan_tenaga_kerja`
--

INSERT INTO `kependudukan_tenaga_kerja` (`id`, `kelompok_umur`, `bekerja`, `pencari_kerja`, `angkatan_kerja`, `bukan_angkatan_kerja`, `tenaga_kerja`, `APAK`, `pengangguran_terbuka`, `kecamatan`, `tahun`, `status`, `updated_at`, `created_at`) VALUES
(5, '2', 2, 1, 2, 2, 2, 2, 2, NULL, 2018, 'Accepted', '2020-07-26 20:42:27', '2020-07-05 05:41:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kesehatan_daftar_panti_asuhan`
--

CREATE TABLE `kesehatan_daftar_panti_asuhan` (
  `id` int(10) NOT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Requested',
  `nama_panti` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `pimpinan` varchar(255) DEFAULT NULL,
  `terdaftar` varchar(255) DEFAULT NULL,
  `jumlah_penghuni` int(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kesehatan_daftar_panti_asuhan`
--

INSERT INTO `kesehatan_daftar_panti_asuhan` (`id`, `tahun`, `status`, `nama_panti`, `alamat`, `pimpinan`, `terdaftar`, `jumlah_penghuni`, `updated_at`, `created_at`) VALUES
(1, 2018, 'Accepted', 'Panti Karya Hephata HKBP', 'Jl. Hephata Desa Sintong Marnipi Kec. Laguboti, Kab. Toba Samosir, Provsu-22381', 'Pdt. Osten Jhon H. Matondang, S.Th', 'Terdaftar', 198, '2020-07-26 19:51:33', '2020-06-26 22:22:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kesehatan_jumlah_akseptor_aktif_dan_alat_kontrasepsi`
--

CREATE TABLE `kesehatan_jumlah_akseptor_aktif_dan_alat_kontrasepsi` (
  `id` int(10) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Requested',
  `iud` int(20) DEFAULT NULL,
  `mow` int(20) DEFAULT NULL,
  `mop` int(20) DEFAULT NULL,
  `implant` int(20) DEFAULT NULL,
  `suntik` int(20) DEFAULT NULL,
  `pil` int(20) DEFAULT NULL,
  `kondom` int(20) DEFAULT NULL,
  `jumlah` int(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kesehatan_jumlah_bayi_bblr`
--

CREATE TABLE `kesehatan_jumlah_bayi_bblr` (
  `id` int(10) NOT NULL,
  `status` varchar(255) DEFAULT 'Requested',
  `kecamatan` varchar(255) NOT NULL,
  `tahun` int(20) NOT NULL,
  `bayi_lahir` int(20) DEFAULT NULL,
  `BBLR_jumlah` int(20) DEFAULT NULL,
  `BBLR_dirujuk` int(20) DEFAULT NULL,
  `BBLR_giji_buruk` int(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kesehatan_jumlah_dokter`
--

CREATE TABLE `kesehatan_jumlah_dokter` (
  `id` int(10) NOT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Requested',
  `unit_kerja` varchar(255) NOT NULL,
  `dokter_umum` int(20) DEFAULT NULL,
  `dokter_gigi` int(20) DEFAULT NULL,
  `dokter_spesialis` int(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kesehatan_jumlah_dokter`
--

INSERT INTO `kesehatan_jumlah_dokter` (`id`, `tahun`, `status`, `unit_kerja`, `dokter_umum`, `dokter_gigi`, `dokter_spesialis`, `updated_at`, `created_at`) VALUES
(1, 2018, 'Rejected', 'Puskesmas', 34, 10, 0, '2020-07-26 19:06:07', '2020-06-24 07:20:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kesehatan_jumlah_fasilitas_kesehatan`
--

CREATE TABLE `kesehatan_jumlah_fasilitas_kesehatan` (
  `id` int(10) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) DEFAULT 'Requested',
  `rumah_sakit` int(20) DEFAULT NULL,
  `rumah_bersalin` int(20) DEFAULT NULL,
  `puskesmas` int(20) DEFAULT NULL,
  `puskesmas_pembantu` int(20) DEFAULT NULL,
  `poskesdes` int(20) DEFAULT NULL,
  `balai_kesehatan` int(20) DEFAULT NULL,
  `polindes` int(20) DEFAULT NULL,
  `apotek` int(20) DEFAULT NULL,
  `toko_obat` int(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kesehatan_jumlah_fasilitas_kesehatan`
--

INSERT INTO `kesehatan_jumlah_fasilitas_kesehatan` (`id`, `kecamatan`, `tahun`, `status`, `rumah_sakit`, `rumah_bersalin`, `puskesmas`, `puskesmas_pembantu`, `poskesdes`, `balai_kesehatan`, `polindes`, `apotek`, `toko_obat`, `updated_at`, `created_at`) VALUES
(1, 'Balige', 2018, 'Accepted', NULL, 0, 2, 6, 24, 4, 0, 4, 10, '2020-07-26 19:22:41', '2020-06-26 00:05:47'),
(2, 'Laguboti', 2018, 'Requested', NULL, 0, 4, 21, 4, 0, 4, 10, 4, '2020-07-27 01:58:55', '2020-06-26 00:06:52'),
(3, 'rom', 2018, 'Requested', NULL, 2, 2, 2, 2, 2, 2, 43, 2, '2020-07-27 01:59:01', '2020-06-26 00:14:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kesehatan_jumlah_kasus_penyakit_terbanyak`
--

CREATE TABLE `kesehatan_jumlah_kasus_penyakit_terbanyak` (
  `id` int(10) NOT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) DEFAULT 'Requested',
  `jenis_penyakit` varchar(255) DEFAULT NULL,
  `jumlah_kunjungan` int(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kesehatan_jumlah_kasus_penyakit_terbanyak`
--

INSERT INTO `kesehatan_jumlah_kasus_penyakit_terbanyak` (`id`, `tahun`, `status`, `jenis_penyakit`, `jumlah_kunjungan`, `updated_at`, `created_at`) VALUES
(2, 2018, 'Accepted', 'cacar', 122, '2020-07-26 19:35:30', '2020-06-28 21:15:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kesehatan_jumlah_tenaga_kesehatan`
--

CREATE TABLE `kesehatan_jumlah_tenaga_kesehatan` (
  `id` int(10) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `tenaga_medis` int(20) DEFAULT NULL,
  `tenaga_keperawatan` int(20) DEFAULT NULL,
  `tenaga_kebidanan` int(20) DEFAULT NULL,
  `tenaga_kefarmasian` int(20) DEFAULT NULL,
  `tenaga_kesehatan_lainnya` int(20) DEFAULT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Requested',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kesehatan_jumlah_tenaga_kesehatan`
--

INSERT INTO `kesehatan_jumlah_tenaga_kesehatan` (`id`, `kecamatan`, `tenaga_medis`, `tenaga_keperawatan`, `tenaga_kebidanan`, `tenaga_kefarmasian`, `tenaga_kesehatan_lainnya`, `tahun`, `status`, `updated_at`, `created_at`) VALUES
(1, 'Balige', 22, 151, 88, 18, 7, 2018, 'Requested', '2020-07-26 22:01:25', '2020-06-24 08:14:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kesehatan_penyandang_masalah_kesejahteraan_sosial`
--

CREATE TABLE `kesehatan_penyandang_masalah_kesejahteraan_sosial` (
  `id` int(10) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) DEFAULT 'Requested',
  `rastra_non_PKH` int(20) DEFAULT NULL,
  `RLTH` int(20) DEFAULT NULL,
  `KUBE` int(20) DEFAULT NULL,
  `pendamping_anak_berhadapan_dengan_hukum` int(20) DEFAULT NULL,
  `KAT` int(20) DEFAULT NULL,
  `PKH` int(20) DEFAULT NULL,
  `ASLUT` int(20) DEFAULT NULL,
  `ASPD` int(20) DEFAULT NULL,
  `ODHA` int(20) DEFAULT NULL,
  `UEP_lansia` int(20) DEFAULT NULL,
  `jumlah` int(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kesehatan_penyandang_masalah_kesejahteraan_sosial`
--

INSERT INTO `kesehatan_penyandang_masalah_kesejahteraan_sosial` (`id`, `kecamatan`, `tahun`, `status`, `rastra_non_PKH`, `RLTH`, `KUBE`, `pendamping_anak_berhadapan_dengan_hukum`, `KAT`, `PKH`, `ASLUT`, `ASPD`, `ODHA`, `UEP_lansia`, `jumlah`, `updated_at`, `created_at`) VALUES
(1, 'Ajibata', 2018, 'Rejected', 324, NULL, 0, 0, 0, 217, 0, 0, 0, 0, NULL, '2020-07-26 18:59:45', '2020-06-24 06:56:00'),
(2, 'Balige', 2018, 'Accepted', 1202, NULL, 20, 0, 0, 515, 0, 5, 0, 0, NULL, '2020-07-27 02:03:33', '2020-06-25 20:44:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ketapang`
--

CREATE TABLE `ketapang` (
  `id` int(10) NOT NULL,
  `jenis_bantuan` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `desa` varchar(255) DEFAULT NULL,
  `jumlah` int(20) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Requested',
  `tahun` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lindup_jenis_daur_ulang_sampah`
--

CREATE TABLE `lindup_jenis_daur_ulang_sampah` (
  `id` int(10) NOT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `daur_ulang` varchar(255) DEFAULT NULL,
  `ton` int(20) DEFAULT NULL,
  `produksi` int(20) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Requested',
  `tahun` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lindup_jenis_daur_ulang_sampah`
--

INSERT INTO `lindup_jenis_daur_ulang_sampah` (`id`, `kecamatan`, `daur_ulang`, `ton`, `produksi`, `status`, `tahun`, `created_at`, `updated_at`) VALUES
(1, 'Balige', 'Sampah', 5, 3, 'Accepted', 2018, '2020-07-20 23:30:49', '2020-07-21 01:40:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lindup_jenis_perusahaan`
--

CREATE TABLE `lindup_jenis_perusahaan` (
  `id` int(10) NOT NULL,
  `nama_perusahaan` varchar(255) DEFAULT NULL,
  `amdal` int(20) DEFAULT NULL,
  `ukl_upl` int(20) DEFAULT NULL,
  `sppl` int(20) DEFAULT NULL,
  `jumlah` int(20) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Requested',
  `tahun` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lindup_jenis_perusahaan`
--

INSERT INTO `lindup_jenis_perusahaan` (`id`, `nama_perusahaan`, `amdal`, `ukl_upl`, `sppl`, `jumlah`, `status`, `tahun`, `created_at`, `updated_at`) VALUES
(1, 'Balige', 3, 3, 33, 3, 'Accepted', 3, '2020-07-21 01:54:24', '2020-07-21 01:54:24'),
(2, 'Laguboti', 4, 3, 3, 4, 'Accepted', 2018, '2020-07-21 01:55:02', '2020-07-21 01:55:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lindup_produksi_sampah`
--

CREATE TABLE `lindup_produksi_sampah` (
  `id` int(10) NOT NULL,
  `kecamatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(255) NOT NULL,
  `produksi_m3` int(20) NOT NULL,
  `terangkat` int(20) NOT NULL,
  `status` varchar(255) DEFAULT 'Requested',
  `tahun` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lindup_produksi_sampah`
--

INSERT INTO `lindup_produksi_sampah` (`id`, `kecamatan`, `bulan`, `produksi_m3`, `terangkat`, `status`, `tahun`, `created_at`, `updated_at`) VALUES
(1, 'Balige', 'Januari', 3, 3, 'Rejected', 2018, '2020-07-20 22:03:58', '2020-07-21 01:38:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `locations`
--

CREATE TABLE `locations` (
  `id` int(10) NOT NULL,
  `location_title` varchar(255) NOT NULL,
  `coords_lat` varchar(255) NOT NULL,
  `coords_lng` varchar(255) NOT NULL,
  `number` varchar(255) DEFAULT NULL,
  `location_email` varchar(255) DEFAULT NULL,
  `addressline1` varchar(255) DEFAULT NULL,
  `addressline2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `locations`
--

INSERT INTO `locations` (`id`, `location_title`, `coords_lat`, `coords_lng`, `number`, `location_email`, `addressline1`, `addressline2`, `city`, `country`, `created_at`, `updated_at`) VALUES
(1, 'aaa', '6.999', '79.88', '987', 'hepp', 'addressline1', 'addressline2', 'porsea', 'indonesia', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_07_07_014523_create_dinas_infrastruktur_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pariwisata_hotel`
--

CREATE TABLE `pariwisata_hotel` (
  `id` int(10) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `hotel` varchar(255) DEFAULT NULL,
  `jumlah_kamar` int(20) DEFAULT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) DEFAULT 'Requested',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pariwisata_hotel`
--

INSERT INTO `pariwisata_hotel` (`id`, `kecamatan`, `hotel`, `jumlah_kamar`, `tahun`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Balige', 'Toba Rose Hotel', 9, 2018, 'Requested', '2020-06-24 21:51:54', '2020-06-28 03:18:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pariwisata_jenis_kapal`
--

CREATE TABLE `pariwisata_jenis_kapal` (
  `id` int(10) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `perahu_tanpa_motor` int(20) DEFAULT NULL,
  `perahu_motor_tempel` int(20) DEFAULT NULL,
  `kapal_motor` int(20) DEFAULT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) DEFAULT 'Requested',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pariwisata_jenis_kapal`
--

INSERT INTO `pariwisata_jenis_kapal` (`id`, `kecamatan`, `perahu_tanpa_motor`, `perahu_motor_tempel`, `kapal_motor`, `tahun`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Balige', 29, 43, 8, 2018, 'Requested', '2020-06-24 22:11:56', '2020-06-28 03:04:35'),
(3, 'Uluan', 46, 4, 2, 2018, 'Requested', '2020-06-28 21:30:25', '2020-06-28 21:30:25'),
(4, 'Lumban Julu', 32, 8, 8, 2018, 'Requested', '2020-06-28 21:30:48', '2020-06-28 21:30:48'),
(5, 'Ajibata', 18, 23, 23, 2018, 'Requested', '2020-06-28 21:31:02', '2020-06-28 21:31:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pariwisata_jumlah_wisata`
--

CREATE TABLE `pariwisata_jumlah_wisata` (
  `id` int(10) NOT NULL,
  `bulan` varchar(255) NOT NULL,
  `wisata_asing` int(20) DEFAULT NULL,
  `wisata_nusantara` int(20) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) DEFAULT 'Requested',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pariwisata_jumlah_wisata`
--

INSERT INTO `pariwisata_jumlah_wisata` (`id`, `bulan`, `wisata_asing`, `wisata_nusantara`, `kecamatan`, `tahun`, `status`, `updated_at`, `created_at`) VALUES
(9, 'Januari', 165, 68638, NULL, 2018, 'Accepted', '2020-07-19 19:52:30', '2020-06-24 21:34:38'),
(10, 'Februari', 110, 41341, NULL, 2018, 'Accepted', '2020-07-19 19:53:28', '2020-06-28 18:51:37'),
(11, 'Maret', 39, 57323, NULL, 2018, 'Requested', '2020-06-28 18:54:28', '2020-06-28 18:54:28'),
(13, 'April', 49, 47994, NULL, 2018, 'Requested', '2020-06-28 21:07:05', '2020-06-28 19:12:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pariwisata_kunjungan_kapal`
--

CREATE TABLE `pariwisata_kunjungan_kapal` (
  `id` int(10) NOT NULL,
  `jumlah_kapal` int(20) DEFAULT NULL,
  `jumlah_penumpang` int(20) DEFAULT NULL,
  `jumlah_barang` int(20) DEFAULT NULL,
  `tahun` int(20) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Requested',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pariwisata_kunjungan_kapal`
--

INSERT INTO `pariwisata_kunjungan_kapal` (`id`, `jumlah_kapal`, `jumlah_penumpang`, `jumlah_barang`, `tahun`, `kecamatan`, `status`, `created_at`, `updated_at`) VALUES
(2, 4224, 97994, 667815, 2018, 'Balige', 'Accepted', '2020-06-24 21:57:48', '2020-07-19 20:13:57'),
(3, 104, 5989, 46995, 2018, 'Ajibata', 'Requested', '2020-06-28 21:18:51', '2020-06-28 21:18:51'),
(4, 15484, 536077, 3305020, 2018, 'Porsea', 'Requested', '2020-06-28 21:19:27', '2020-06-28 21:19:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pariwisata_objek_wisata`
--

CREATE TABLE `pariwisata_objek_wisata` (
  `id` int(10) NOT NULL,
  `jenis_objek_wisata` varchar(255) NOT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `daerah` varchar(255) NOT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) DEFAULT 'Requested',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pariwisata_objek_wisata`
--

INSERT INTO `pariwisata_objek_wisata` (`id`, `jenis_objek_wisata`, `lokasi`, `daerah`, `tahun`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Wisata Alam', 'Aek Siruar', 'Siantar Narumonda', 2018, 'Requested', '2020-06-24 21:40:45', '2020-06-28 02:37:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pariwisata_restoran`
--

CREATE TABLE `pariwisata_restoran` (
  `id` int(10) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `jumlah` int(20) DEFAULT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) DEFAULT 'Requested',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pariwisata_restoran`
--

INSERT INTO `pariwisata_restoran` (`id`, `kecamatan`, `jumlah`, `tahun`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Tampahan', 3, 2018, 'Requested', '2020-06-24 22:59:13', '2020-06-28 03:20:36'),
(3, 'Balige', 71, 2018, 'Requested', '2020-06-28 21:55:29', '2020-06-28 21:55:29'),
(4, 'Laguboti', 14, 2018, 'Requested', '2020-06-28 21:55:43', '2020-06-28 21:55:43'),
(5, 'Sigumpar', 5, 2018, 'Requested', '2020-06-28 21:55:54', '2020-06-28 21:55:54'),
(6, 'Silaen', 4, 2018, 'Requested', '2020-06-28 21:56:05', '2020-06-28 21:56:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pdam_jumlah_pemakaian_air_bersih`
--

CREATE TABLE `pdam_jumlah_pemakaian_air_bersih` (
  `id` int(10) NOT NULL,
  `pemakaian_air_bersih` varchar(255) NOT NULL,
  `jumlah` int(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Requested',
  `tahun` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pdam_jumlah_pemakaian_air_bersih`
--

INSERT INTO `pdam_jumlah_pemakaian_air_bersih` (`id`, `pemakaian_air_bersih`, `jumlah`, `status`, `tahun`, `created_at`, `updated_at`) VALUES
(1, 'sssa', 10, 'Rejected', 2018, '2020-07-20 23:52:06', '2020-07-21 01:48:57'),
(2, 'ss', 2, 'Accepted', 2018, '2020-07-21 00:03:20', '2020-07-21 01:49:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai_menurut_golongan`
--

CREATE TABLE `pegawai_menurut_golongan` (
  `id` int(10) NOT NULL,
  `tahun` int(20) DEFAULT NULL,
  `pendidikan1` int(20) DEFAULT NULL,
  `pendidikan2` int(20) DEFAULT NULL,
  `pendidikan3` int(20) DEFAULT NULL,
  `pendidikan4` int(20) DEFAULT NULL,
  `jumlah_total` int(20) DEFAULT NULL,
  `jumlah_total_1` int(20) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Requested',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai_menurut_jenis_kelamin`
--

CREATE TABLE `pegawai_menurut_jenis_kelamin` (
  `id` int(10) NOT NULL,
  `tahun` int(20) DEFAULT NULL,
  `laki_laki` int(20) DEFAULT NULL,
  `perempuan` int(20) DEFAULT NULL,
  `jumlah_total` int(20) DEFAULT NULL,
  `jumlah_total_1` int(20) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Requested',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai_menurut_pendidikan`
--

CREATE TABLE `pegawai_menurut_pendidikan` (
  `id` int(10) NOT NULL,
  `tahun` int(20) DEFAULT NULL,
  `sd` int(20) DEFAULT NULL,
  `smp` int(20) DEFAULT NULL,
  `sma` int(20) DEFAULT NULL,
  `s1` int(20) DEFAULT NULL,
  `s2` int(20) DEFAULT NULL,
  `s3` int(20) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Requested',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai_yang_pindah_pensiun`
--

CREATE TABLE `pegawai_yang_pindah_pensiun` (
  `id` int(10) NOT NULL,
  `tahun` int(20) DEFAULT NULL,
  `pindah_keluar_tobasa` int(20) DEFAULT NULL,
  `pindah_masuk_tobasa` int(20) DEFAULT NULL,
  `pensiun` int(20) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Requested',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemerintahan-jlhpendudukwilayahkepadatan`
--

CREATE TABLE `pemerintahan-jlhpendudukwilayahkepadatan` (
  `id` int(10) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `Jlh_Penduduk` int(20) DEFAULT NULL,
  `Luas_Wilayah` float(20,0) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Requested',
  `tahun` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemerintahan-jlhpendudukwilayahkepadatan`
--

INSERT INTO `pemerintahan-jlhpendudukwilayahkepadatan` (`id`, `kecamatan`, `Jlh_Penduduk`, `Luas_Wilayah`, `status`, `tahun`, `created_at`, `updated_at`) VALUES
(8, 'Laguboti', 22581, 74, 'Rejected', 2018, '2020-06-26 20:09:05', '2020-07-15 20:54:01'),
(9, 'Silaen', 15008, 173, 'Requested', 2018, '2020-06-26 22:06:28', '2020-06-26 22:06:28'),
(10, 'Balige', 44081, 91, 'Requested', 2018, '2020-06-28 03:41:31', '2020-06-28 03:41:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemerintahan-jumlahdesakel`
--

CREATE TABLE `pemerintahan-jumlahdesakel` (
  `id` int(10) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `Jumlah_Desa` int(11) NOT NULL,
  `Jumlah_Kelurahan` int(11) DEFAULT NULL,
  `tahun` int(20) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Requested',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemerintahan-jumlahdesakel`
--

INSERT INTO `pemerintahan-jumlahdesakel` (`id`, `kecamatan`, `Jumlah_Desa`, `Jumlah_Kelurahan`, `tahun`, `status`, `updated_at`, `created_at`) VALUES
(17, 'Balige', 26, 6, 2018, 'Requested', '2020-07-27 18:46:10', '2020-06-26 22:02:52'),
(18, 'Laguboti', 22, 1, 2018, 'Rejected', '2020-07-15 19:05:56', '2020-06-28 03:02:38'),
(21, 'Porsea', 23, 22, 2019, 'Request', '2020-07-27 18:46:49', '2020-07-27 18:46:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan_paud`
--

CREATE TABLE `pendidikan_paud` (
  `id` int(10) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `tahun` int(20) NOT NULL,
  `jumlah_paud` int(20) DEFAULT NULL,
  `jumlah_guru` int(20) DEFAULT NULL,
  `jumlah_murid` int(20) DEFAULT NULL,
  `negeri` int(20) DEFAULT NULL,
  `swasta` int(20) DEFAULT NULL,
  `Madrasah_Ibtidaiyah_Tsanawiyah` int(20) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Requested',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendidikan_paud`
--

INSERT INTO `pendidikan_paud` (`id`, `kecamatan`, `tahun`, `jumlah_paud`, `jumlah_guru`, `jumlah_murid`, `negeri`, `swasta`, `Madrasah_Ibtidaiyah_Tsanawiyah`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Balige', 2018, 36, 92, 1166, 1, 35, 0, 'Accepted', '2020-06-24 23:13:44', '2020-07-19 20:22:42'),
(4, 'Tampahan', 2018, 10, 10, 131, 0, 8, 0, 'Requested', '2020-06-28 22:09:58', '2020-06-28 22:09:58'),
(5, 'Laguboti', 2018, 54, 54, 772, 0, 23, 0, 'Requested', '2020-06-28 22:49:54', '2020-06-28 22:49:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan_sd`
--

CREATE TABLE `pendidikan_sd` (
  `id` int(10) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `tahun` int(20) NOT NULL,
  `jumlah_sd` int(20) DEFAULT NULL,
  `jumlah_guru` int(20) DEFAULT NULL,
  `jumlah_murid` int(20) DEFAULT NULL,
  `negeri` int(20) DEFAULT NULL,
  `swasta` int(20) DEFAULT NULL,
  `Madrasah_Ibtidaiyah_Tsanawiyah` int(20) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Requested',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendidikan_sd`
--

INSERT INTO `pendidikan_sd` (`id`, `kecamatan`, `tahun`, `jumlah_sd`, `jumlah_guru`, `jumlah_murid`, `negeri`, `swasta`, `Madrasah_Ibtidaiyah_Tsanawiyah`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Balige', 2018, 31, 527, 3196, 26, 5, 0, 'Requested', '2020-06-24 23:18:12', '2020-06-28 05:08:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan_sltp`
--

CREATE TABLE `pendidikan_sltp` (
  `id` int(10) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `tahun` int(20) NOT NULL,
  `jumlah_sltp` int(20) DEFAULT NULL,
  `jumlah_guru` int(20) DEFAULT NULL,
  `jumlah_murid` int(20) DEFAULT NULL,
  `negeri` int(20) DEFAULT NULL,
  `swasta` int(20) DEFAULT NULL,
  `Madrasah_Ibtidaiyah_Tsanawiyah` int(20) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Requested',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendidikan_sltp`
--

INSERT INTO `pendidikan_sltp` (`id`, `kecamatan`, `tahun`, `jumlah_sltp`, `jumlah_guru`, `jumlah_murid`, `negeri`, `swasta`, `Madrasah_Ibtidaiyah_Tsanawiyah`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Balige', 2018, 83, 217, 3196, 0, 0, 0, 'Requested', '2020-06-24 23:29:41', '2020-08-12 22:33:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerima_kelompok_bantuan_ternak`
--

CREATE TABLE `penerima_kelompok_bantuan_ternak` (
  `id` int(10) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `desa_kelurahan` varchar(255) NOT NULL,
  `jumlah_kelompok` int(20) NOT NULL,
  `jumlah_ternak` int(20) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Requested',
  `tahun` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penerima_kelompok_bantuan_ternak`
--

INSERT INTO `penerima_kelompok_bantuan_ternak` (`id`, `kategori`, `kecamatan`, `desa_kelurahan`, `jumlah_kelompok`, `jumlah_ternak`, `status`, `tahun`, `created_at`, `updated_at`) VALUES
(1, 'Penerima Ternak Babi', 'Balige', 'Desa Aek Bolon Julu', 1, 20, 'Requested', 2018, '2020-06-24 11:37:49', '2020-06-24 11:37:49'),
(2, 'Penerima Ternak Babi', 'Balige', 'Desa Hutagaol Peatalun', 1, 20, 'Request', 2018, '2020-06-24 11:38:52', '2020-06-24 11:38:52'),
(3, 'Penerima Ternak Kerbau', 'Borbor', 'Desa Parar Borbor', 1, 13, 'Request', 2018, '2020-06-28 19:38:08', '2020-06-28 19:38:08'),
(4, 'Penerima Ternak Sapi', 'Parmaksian', 'Desa Tangga Batu II', 1, 10, 'Request', 2018, '2020-06-28 19:54:35', '2020-06-28 19:54:35'),
(5, 'Penerima Ternak Ayam', 'Balige', 'Desa Longat', 1, 1000, 'Request', 2018, '2020-06-28 20:07:03', '2020-06-28 20:07:03'),
(6, 'Penerima Ternak Itik', 'Balige', 'Desa Parsuratan', 1, 1000, 'Request', 2018, '2020-06-28 20:12:26', '2020-06-28 20:12:26'),
(7, 'Penerima Ternak Kambing', 'Uluan', 'Desa Sampuara', 1, 20, 'Request', 2018, '2020-06-28 20:15:30', '2020-06-28 20:15:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perindustrian_industri_kecil_dan_menengah`
--

CREATE TABLE `perindustrian_industri_kecil_dan_menengah` (
  `id` int(10) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `pangan_unit` int(20) DEFAULT NULL,
  `pangan_tenaga_kerja` int(20) DEFAULT NULL,
  `sandang_dan_kulit_unit` int(20) DEFAULT NULL,
  `sandang_dan_kulit_tenaga_kerja` int(20) DEFAULT NULL,
  `kimia_dan_bahan_bangunan_unit` int(20) DEFAULT NULL,
  `kimia_dan_bahan_bangunan_tenaga_kerja` int(20) DEFAULT NULL,
  `kerajinan_umum_unit` int(20) DEFAULT NULL,
  `kerajinan_umum_tenaga_kerja` int(20) DEFAULT NULL,
  `logam_metal_unit` int(20) DEFAULT NULL,
  `logam_metal_tenaga_kerja` int(20) DEFAULT NULL,
  `jumlah_unit` int(20) DEFAULT NULL,
  `jumlah_tenaga_kerja` int(20) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Requested',
  `tahun` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perindustrian_industri_kecil_dan_menengah`
--

INSERT INTO `perindustrian_industri_kecil_dan_menengah` (`id`, `kecamatan`, `pangan_unit`, `pangan_tenaga_kerja`, `sandang_dan_kulit_unit`, `sandang_dan_kulit_tenaga_kerja`, `kimia_dan_bahan_bangunan_unit`, `kimia_dan_bahan_bangunan_tenaga_kerja`, `kerajinan_umum_unit`, `kerajinan_umum_tenaga_kerja`, `logam_metal_unit`, `logam_metal_tenaga_kerja`, `jumlah_unit`, `jumlah_tenaga_kerja`, `status`, `tahun`, `created_at`, `updated_at`) VALUES
(1, 'Balige', 27, 69, 31, 211, 23, 123, 5, 9, 37, 94, NULL, NULL, 'Accepted', 2018, '2020-06-25 00:54:08', '2020-07-21 20:16:39'),
(2, 'Tampahan', 5, 12, 75, 75, 1, 35, 1, 1, 1, 3, NULL, NULL, 'Request', 2018, '2020-06-28 18:54:06', '2020-06-28 18:54:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perindustrian_jumlah_dan_tenaga_kerja_industri_kecil_menengah`
--

CREATE TABLE `perindustrian_jumlah_dan_tenaga_kerja_industri_kecil_menengah` (
  `id` int(20) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `industri_kecil_dan_menengah` int(20) DEFAULT NULL,
  `tenaga_kerja` int(20) DEFAULT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Requested',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perindustrian_jumlah_dan_tenaga_kerja_industri_kecil_menengah`
--

INSERT INTO `perindustrian_jumlah_dan_tenaga_kerja_industri_kecil_menengah` (`id`, `kecamatan`, `industri_kecil_dan_menengah`, `tenaga_kerja`, `tahun`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Balige', 123, 506, 2018, 'Accepted', '2020-06-27 05:59:31', '2020-07-21 20:18:54'),
(6, 'Tampahan', 83, 126, 2018, 'Request', '2020-06-27 05:59:43', '2020-06-27 05:59:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perkebunan_luas_dan_produksi_andaliman_dan_nilam`
--

CREATE TABLE `perkebunan_luas_dan_produksi_andaliman_dan_nilam` (
  `id` int(20) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `luas_areal_andaliman` float DEFAULT NULL,
  `produksi_andaliman` float DEFAULT NULL,
  `produktivitas_andaliman` float DEFAULT NULL,
  `luas_areal_nilam` float DEFAULT NULL,
  `produksi_nilam` float DEFAULT NULL,
  `produktivitas_nilam` float DEFAULT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Requested',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perkebunan_luas_dan_produksi_andaliman_dan_nilam`
--

INSERT INTO `perkebunan_luas_dan_produksi_andaliman_dan_nilam` (`id`, `kecamatan`, `luas_areal_andaliman`, `produksi_andaliman`, `produktivitas_andaliman`, `luas_areal_nilam`, `produksi_nilam`, `produktivitas_nilam`, `tahun`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Balige', 0, 0, 0, 0, 0, 0, 2018, 'Accepted', '2020-06-24 23:37:11', '2020-07-21 21:37:38'),
(2, 'Tampahan', 0, 0, 0, 0, 0, 0, 2018, 'Request', '2020-06-28 18:48:10', '2020-06-28 18:48:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perkebunan_luas_dan_produksi_aren_dan_kemiri`
--

CREATE TABLE `perkebunan_luas_dan_produksi_aren_dan_kemiri` (
  `id` int(10) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `luas_areal_aren` float DEFAULT NULL,
  `produksi_aren` float DEFAULT NULL,
  `produktivitas_aren` float DEFAULT NULL,
  `luas_areal_kemiri` float DEFAULT NULL,
  `produksi_kemiri` float DEFAULT NULL,
  `produktivitas_kemiri` float DEFAULT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Requested',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perkebunan_luas_dan_produksi_aren_dan_kemiri`
--

INSERT INTO `perkebunan_luas_dan_produksi_aren_dan_kemiri` (`id`, `kecamatan`, `luas_areal_aren`, `produksi_aren`, `produktivitas_aren`, `luas_areal_kemiri`, `produksi_kemiri`, `produktivitas_kemiri`, `tahun`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Balige', 23.5, 4.99, 39.9, 39.5, 39.7, 1.918, 2018, 'Requested', '2020-06-28 18:30:57', '2020-06-28 18:30:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perkebunan_luas_dan_produksi_karet_dan_kelapa_sawit`
--

CREATE TABLE `perkebunan_luas_dan_produksi_karet_dan_kelapa_sawit` (
  `id` int(10) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `luas_areal_karet` float DEFAULT NULL,
  `produksi_karet` float DEFAULT NULL,
  `produktivitas_karet` float DEFAULT NULL,
  `luas_areal_kelapa_sawit` float DEFAULT NULL,
  `produksi_kelapa_sawit` float DEFAULT NULL,
  `produktivitas_kelapa_sawit` float DEFAULT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Requested',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perkebunan_luas_dan_produksi_karet_dan_kelapa_sawit`
--

INSERT INTO `perkebunan_luas_dan_produksi_karet_dan_kelapa_sawit` (`id`, `kecamatan`, `luas_areal_karet`, `produksi_karet`, `produktivitas_karet`, `luas_areal_kelapa_sawit`, `produksi_kelapa_sawit`, `produktivitas_kelapa_sawit`, `tahun`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Balige', 0, 1, 0, 0, 0, 0, 2018, 'Accepted', '2020-06-24 20:35:54', '2020-07-21 20:45:02'),
(2, 'Tampahan', 0, 0, 0, 0, 0, 0, 2018, 'Request', '2020-06-24 20:36:09', '2020-06-24 20:36:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perkebunan_luas_dan_produksi_kelapa_dan_pinang`
--

CREATE TABLE `perkebunan_luas_dan_produksi_kelapa_dan_pinang` (
  `id` int(10) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `luas_areal_kelapa` float DEFAULT NULL,
  `produksi_kelapa` float DEFAULT NULL,
  `produktivitas_kelapa` float DEFAULT NULL,
  `luas_areal_pinang` float DEFAULT NULL,
  `produksi_pinang` float DEFAULT NULL,
  `produktivitas_pinang` float DEFAULT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Requested',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perkebunan_luas_dan_produksi_kelapa_dan_pinang`
--

INSERT INTO `perkebunan_luas_dan_produksi_kelapa_dan_pinang` (`id`, `kecamatan`, `luas_areal_kelapa`, `produksi_kelapa`, `produktivitas_kelapa`, `luas_areal_pinang`, `produksi_pinang`, `produktivitas_pinang`, `tahun`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Balige', 8.22, 2.785, 687.79, 7.5, 1.995, 665, 2018, 'Accepted', '2020-06-24 23:21:42', '2020-07-21 21:35:12'),
(2, 'Tampahan', 0, 0, 0, 0, 0, 0, 2018, 'Requested', '2020-06-28 18:32:19', '2020-06-28 18:32:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perkebunan_luas_dan_produksi_kopi_dan_kakao`
--

CREATE TABLE `perkebunan_luas_dan_produksi_kopi_dan_kakao` (
  `id` int(10) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `luas_areal_kopi` float DEFAULT NULL,
  `produksi_kopi` float DEFAULT NULL,
  `produktivitas_kopi` float DEFAULT NULL,
  `luas_areal_kakao` float DEFAULT NULL,
  `produksi_kakao` float DEFAULT NULL,
  `produktivitas_kakao` float DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Requested',
  `tahun` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perkebunan_luas_dan_produksi_kopi_dan_kakao`
--

INSERT INTO `perkebunan_luas_dan_produksi_kopi_dan_kakao` (`id`, `kecamatan`, `luas_areal_kopi`, `produksi_kopi`, `produktivitas_kopi`, `luas_areal_kakao`, `produksi_kakao`, `produktivitas_kakao`, `status`, `tahun`, `created_at`, `updated_at`) VALUES
(1, 'Balige', 187, 69, 875, 21, 3, 266, 'Request', 2018, '2020-06-24 19:22:35', '2020-06-24 19:22:35'),
(2, 'Tampahan', 333.12, 257.932, 1275, 6.1, 0.38, 225, 'Request', 2018, '2020-06-24 19:45:34', '2020-06-24 19:45:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peternakan_jumlah_populasi_ternak_unggas`
--

CREATE TABLE `peternakan_jumlah_populasi_ternak_unggas` (
  `id` int(10) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `ayam_buras` int(20) DEFAULT NULL,
  `itik` int(20) DEFAULT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Requested',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peternakan_jumlah_populasi_ternak_unggas`
--

INSERT INTO `peternakan_jumlah_populasi_ternak_unggas` (`id`, `kecamatan`, `ayam_buras`, `itik`, `tahun`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Balige', 218880, 419340, 2018, 'Accepted', '2020-06-24 11:09:26', '2020-07-21 20:07:56'),
(2, 'Tampahan', 34812, 52005, 2018, 'Request', '2020-06-24 11:10:58', '2020-06-24 11:10:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peternakan_jumlah_produksi_ternak_unggas`
--

CREATE TABLE `peternakan_jumlah_produksi_ternak_unggas` (
  `id` int(10) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `ayam_buras` int(20) DEFAULT NULL,
  `itik` int(20) DEFAULT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Requested',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peternakan_jumlah_produksi_ternak_unggas`
--

INSERT INTO `peternakan_jumlah_produksi_ternak_unggas` (`id`, `kecamatan`, `ayam_buras`, `itik`, `tahun`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Balige', 12160, 27956, 2018, 'Accepted', '2020-06-24 10:07:00', '2020-07-21 20:03:34'),
(2, 'Tampahan', 1934, 3167, 2018, 'Requested', '2020-06-24 10:11:41', '2020-06-24 10:11:41'),
(3, 'Laguboti', 6176, 5194, 2018, 'Requested', '2020-06-24 10:18:24', '2020-06-24 10:18:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peternakan_jumlah_ternak_dipotong`
--

CREATE TABLE `peternakan_jumlah_ternak_dipotong` (
  `id` int(10) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `sapi_perah` int(20) DEFAULT NULL,
  `sapi_potong` int(20) DEFAULT NULL,
  `kerbau` int(20) DEFAULT NULL,
  `kuda` int(20) DEFAULT NULL,
  `kambing` int(20) DEFAULT NULL,
  `domba` int(20) DEFAULT NULL,
  `babi` int(20) DEFAULT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Requested',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peternakan_jumlah_ternak_dipotong`
--

INSERT INTO `peternakan_jumlah_ternak_dipotong` (`id`, `kecamatan`, `sapi_perah`, `sapi_potong`, `kerbau`, `kuda`, `kambing`, `domba`, `babi`, `tahun`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Balige', 0, 80, 96, 0, 479, 0, 3190, 2018, 'Accepted', '2020-06-24 08:53:57', '2020-07-21 19:45:17'),
(2, 'Tampahan', 0, 2, 21, 0, 47, 0, 780, 2018, 'Requested', '2020-06-24 09:39:25', '2020-06-24 09:39:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peternakan_jumlah_ternak_unggas_dipotong`
--

CREATE TABLE `peternakan_jumlah_ternak_unggas_dipotong` (
  `id` int(10) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `ayam_kampung` int(20) DEFAULT NULL,
  `itik_itik_manila` int(20) DEFAULT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Requested',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peternakan_jumlah_ternak_unggas_dipotong`
--

INSERT INTO `peternakan_jumlah_ternak_unggas_dipotong` (`id`, `kecamatan`, `ayam_kampung`, `itik_itik_manila`, `tahun`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Balige', 406, 16609, 2018, 'Accepted', '2020-06-24 09:47:24', '2020-07-21 20:00:14'),
(2, 'Tampahan', 46, 1636, 2018, 'Requested', '2020-06-27 23:33:58', '2020-06-27 23:33:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peternakan_populasi_ternak_besar`
--

CREATE TABLE `peternakan_populasi_ternak_besar` (
  `id` int(10) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `sapi_perah` int(20) DEFAULT NULL,
  `sapi_potong` int(20) DEFAULT NULL,
  `kerbau` int(20) DEFAULT NULL,
  `kuda` int(20) DEFAULT NULL,
  `kambing` int(20) DEFAULT NULL,
  `domba` int(20) DEFAULT NULL,
  `babi` int(20) DEFAULT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Requested',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peternakan_populasi_ternak_besar`
--

INSERT INTO `peternakan_populasi_ternak_besar` (`id`, `kecamatan`, `sapi_perah`, `sapi_potong`, `kerbau`, `kuda`, `kambing`, `domba`, `babi`, `tahun`, `status`, `updated_at`, `created_at`) VALUES
(1, 'Balige', 0, 326, 793, 0, 0, 0, 2385, 2018, 'Accepted', '2020-07-21 19:33:16', NULL),
(2, 'Tampahan', 0, 14, 415, 0, 11, 0, 1250, 2018, 'Requested', NULL, NULL),
(3, 'Laguboti', 0, 301, 1090, 0, 225, 0, 5617, 2018, 'Requested', '2020-06-24 23:08:39', '2020-06-24 23:08:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peternakan_populasi_ternak_unggas`
--

CREATE TABLE `peternakan_populasi_ternak_unggas` (
  `id` int(10) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `ayam_kampung` int(20) DEFAULT NULL,
  `ayam_pedaging` int(20) DEFAULT NULL,
  `ayam_petelor` int(20) DEFAULT NULL,
  `itik_itik_manila` int(20) DEFAULT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Requested',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peternakan_populasi_ternak_unggas`
--

INSERT INTO `peternakan_populasi_ternak_unggas` (`id`, `kecamatan`, `ayam_kampung`, `ayam_pedaging`, `ayam_petelor`, `itik_itik_manila`, `tahun`, `status`, `updated_at`, `created_at`) VALUES
(2, 'Balige', 131929, 0, 0, 109419, 2018, 'Accepted', '2020-07-21 19:40:46', '2020-06-24 10:22:06'),
(3, 'Tampahan', 21415, 0, 0, 14501, 2018, 'Requested', '2020-06-24 23:12:54', '2020-06-24 23:12:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rsud_jumlah_kamar_rawat_inap`
--

CREATE TABLE `rsud_jumlah_kamar_rawat_inap` (
  `id` int(10) NOT NULL,
  `VIP` int(10) DEFAULT NULL,
  `kelas1` int(10) DEFAULT NULL,
  `kelas2` int(10) DEFAULT NULL,
  `kelas3` int(10) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Requested'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rsud_peralatan_rumah_sakit`
--

CREATE TABLE `rsud_peralatan_rumah_sakit` (
  `id` int(10) NOT NULL,
  `jenis_peralatan_rumah_sakit` varchar(255) DEFAULT NULL,
  `jumlah` int(20) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Requested',
  `tahun` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rsud_perawat_jenis_perawat`
--

CREATE TABLE `rsud_perawat_jenis_perawat` (
  `id` int(10) NOT NULL,
  `perawat` varchar(255) DEFAULT NULL,
  `jumlah` int(20) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Requested',
  `tahun` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rsud_tenaga_medis`
--

CREATE TABLE `rsud_tenaga_medis` (
  `id` int(10) NOT NULL,
  `dokter` varchar(255) DEFAULT NULL,
  `jumlah` int(20) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Requested',
  `tahun` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `teknologi_daftar_internet_game_monitoring`
--

CREATE TABLE `teknologi_daftar_internet_game_monitoring` (
  `id` int(10) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `nama_internet` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `nama_pemilik` varchar(255) DEFAULT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Request',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `teknologi_daftar_internet_game_monitoring`
--

INSERT INTO `teknologi_daftar_internet_game_monitoring` (`id`, `kecamatan`, `nama_internet`, `alamat`, `nama_pemilik`, `tahun`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kecamatan Porsea', 'Dot Net', 'Jln. DI Panjaitan No. 9 Porsea', 'Efendi Suparman', 2018, 'Requested', '2020-06-27 08:21:43', '2020-06-30 23:47:53'),
(2, 'Kecamatan Porsea', 'Cakra Komputer', 'Jln. Sisingamangaraja No. 59 Porsea', 'Mahadi Sitorus', 2018, 'Request', '2020-06-27 08:22:14', '2020-06-27 08:22:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `teknologi_jumlah_desa_blank_spot`
--

CREATE TABLE `teknologi_jumlah_desa_blank_spot` (
  `id` int(10) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `data_blank_spot` int(20) DEFAULT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Request',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `teknologi_jumlah_desa_blank_spot`
--

INSERT INTO `teknologi_jumlah_desa_blank_spot` (`id`, `kecamatan`, `data_blank_spot`, `tahun`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Balige', 7, 2018, 'Requested', '2020-06-27 08:47:46', '2020-07-01 00:12:18'),
(2, 'Tampahan', 0, 2018, 'Request', '2020-06-27 08:47:55', '2020-06-27 08:47:55'),
(3, 'Laguboti', 2, 2018, 'Request', '2020-06-27 08:48:20', '2020-06-27 08:48:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `teknologi_jumlah_menara`
--

CREATE TABLE `teknologi_jumlah_menara` (
  `id` int(10) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `jumlah_menara` int(20) DEFAULT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Request',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `teknologi_jumlah_menara`
--

INSERT INTO `teknologi_jumlah_menara` (`id`, `kecamatan`, `jumlah_menara`, `tahun`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Balige', 15, 2018, 'Accepted', '2020-06-27 06:25:05', '2020-07-21 20:34:04'),
(2, 'Tampahan', 3, 2018, 'Request', '2020-06-27 06:25:18', '2020-06-27 06:25:18'),
(3, 'Laguboti', 10, 2018, 'Request', '2020-06-27 06:25:26', '2020-06-27 06:25:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara`
--

CREATE TABLE `teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara` (
  `id` int(11) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kategori_kecamatan` varchar(255) NOT NULL,
  `imb` varchar(255) DEFAULT NULL,
  `tinggi_menara` int(20) DEFAULT NULL,
  `pemilik` varchar(255) DEFAULT NULL,
  `pengguna` varchar(255) DEFAULT NULL,
  `tahun` int(20) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Request',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara`
--

INSERT INTO `teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara` (`id`, `kecamatan`, `kategori_kecamatan`, `imb`, `tinggi_menara`, `pemilik`, `pengguna`, `tahun`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Siti Dolok Tolong', 'Kec. Tampahan', 'Proses Pengurusan', 33, 'PT. Telkom', 'PT. TELKOM', 2018, 'Requested', '2020-06-27 07:00:30', '2020-06-27 07:00:30'),
(2, 'JL. Balige Siborong-borong DS Gurgur Aek Raja', 'Kec. Tampahan', '-', 72, 'Tower Bersama', 'Exel, Telkomsel', 2018, 'Requested', '2020-06-27 07:01:16', '2020-06-27 07:01:16'),
(3, 'Desa Tangga Batu Timur', 'Kec. Tampahan', '-', 60, 'Era Tower', 'Exel', 2018, 'Requested', '2020-06-27 07:01:58', '2020-06-27 07:01:58'),
(4, 'JL. Parluasan Siahaan', 'Kec. Balige', '648/6/IMB/PUK/2003', 71, 'PT. EXEL AXIATA', 'EXEL', 2018, 'Requested', '2020-06-28 21:47:39', '2020-06-28 21:47:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_dinas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint(1) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alamat_kantor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_telepon` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_profil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'user.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama_dinas`, `role`, `email`, `username`, `password`, `remember_token`, `created_at`, `updated_at`, `alamat_kantor`, `nomor_telepon`, `foto_profil`) VALUES
(17, 'Pemerintahan', 1, 'pemerintahan@gmail.com', 'pemerintahan', '$2y$10$1GD/.Y1zyRuQ/t3Uae9EMe6V1Q/jGnLOpQfZcM8sqIfQBjvoEl.o.', NULL, '2020-07-09 01:28:54', '2020-07-09 01:28:54', 'Jl.Kartini', '123456789', 'user.jpg'),
(18, 'Peternakan', 6, 'peternakan@gmail.com', 'fghjk', '$2y$10$W9WEW5nh.67oyCNB9J5EEea6cyJOLM6TQpjchyvcuGVdqaWgwoYa2', NULL, '2020-07-09 19:54:17', '2020-07-21 22:12:06', 'dfghjk', '456789', '18_foto_profil1595394726.jpg'),
(19, 'Infrastruktur', 8, 'infrastruktur@gmail.com', 'infrastruktur', '$2y$10$rfi0Gv4CNbjg9P1cl3s5/O2vuNIU4SuGxTmaWz/qke9PK5LFgE5ie', NULL, '2020-07-10 00:53:28', '2020-07-10 00:53:28', 'Jl.Kartini', '567', ''),
(20, 'pendidikan', 5, 'pendidikan@gmail.com', 'pendidikan', '$2y$10$i.jNDchE8vIa3tC.sipHc.5p6LiA0qRR1nBEFEm5Wc9mdrgWq785m', NULL, '2020-07-12 22:05:09', '2020-07-12 22:05:09', 'wd', '78', ''),
(21, 'Pariwisata', 4, 'pariwisata@gmail', 'pariwisata', '$2y$10$jBrPqz6ZBC0g5M/YSlysjePhZWSiYtyi7vmQOOVzojC.ohQHA8pLS', NULL, '2020-07-12 23:11:09', '2020-07-12 23:11:09', 'sdf', '6789', ''),
(22, 'Kesehatan', 3, 'kesehatan@gmail', 'kesehatan', '$2y$10$DZZzgR4GTruYMqQfqBbmOeGLdZZffBlwWNeQ4P0l6cpOQVb1JpLx.', NULL, '2020-07-14 00:17:22', '2020-07-14 00:17:22', 'df', '89', ''),
(23, 'Kependudukan', 2, 'kependudukan@gmail.com', 'kependudukan', '$2y$10$EZmIbVEqYXUl0Ghv/qUDVuv/OJEyFyi6JYXC4QhfhniGsyX6YzBpa', NULL, '2020-07-14 00:28:20', '2020-07-14 00:28:20', 'nm', '789', ''),
(24, 'Perindustrian', 7, 'perindustrian@gmail.com', 'perindustrian', '$2y$10$eoDpoGyPbusI3/hwVbm7UuFoRDqoJO9UIyG2.idXIAg0lWB9uJXSa', NULL, '2020-07-14 00:45:45', '2020-07-14 00:45:45', 'jk', '6789', ''),
(25, 'admin', 0, 'admin@gmail.com', 'admins', '$2y$10$nEmlVoO8l9Ke6lNALf7VP.4KZtHjVhT.7Bz7Rznk6xHDgvlBOCEsm', NULL, '2020-07-14 19:55:06', '2020-07-19 22:17:15', 'jk', '89', '25_foto_profil1595222235.jpg'),
(26, 'Lindup', 11, 'lindup@gmail.com', 'lindup', '$2y$10$2rPibDpiQ.NM.RiTMCdpduLoUXo3cOZAvcGnbYDP3XPzAv0nThje2', NULL, '2020-07-20 19:51:55', '2020-07-22 21:28:56', '123456789', '456789', '26_foto_profil1595478536.jpg'),
(29, 'rsud', 12, 'rsud@gmail.com', 'rsud', '$2y$10$RabM0wHwclDKBQW68YGzJOrxpb6ZIlqFywTePHTpkAMM6aQpAGd8S', NULL, '2020-07-22 23:50:02', '2020-07-22 23:50:02', 'fghjk', '56789', 'user.jpg'),
(30, 'bkd', 9, 'bkd@gmail.com', 'bkd', '$2y$10$gNw9MfB/Qxx6DvGksUcJ5OJDZ.3tnEbVH8t.TgufVK4aHe2vwN12a', NULL, '2020-07-26 21:16:49', '2020-07-26 21:16:49', 'klasd', '5678', 'user.jpg'),
(31, 'Ketahanan Pangan', 13, 'ketapang@gmail.com', 'ketapang', '$2y$10$Cqab518D7.fJSzSX.pQZx.RzDiN8tSYjYHZj.QoawDS1ijB2IVLNy', NULL, '2020-07-28 21:50:37', '2020-07-28 21:50:37', 'fghjk', '678', 'user.jpg'),
(32, 'pdam', 10, 'pdam@gmail.com', '123456789', '$2y$10$.lrUdRCTQRGdFNXynyoR5.IGBooKbUxddvT5.5TXatwrCiKnLjlHu', NULL, '2020-07-28 22:16:22', '2020-07-28 22:16:22', 'ghj', '5678', 'user.jpg'),
(34, 'admins', 0, 'admins@gmail.com', 'admins', '$2y$10$26M3IgrkmQmnC.48EDmTae92UimXORegrJxHEY.soUQZyqIVplPTG', NULL, '2020-08-02 21:12:01', '2020-08-02 21:12:01', 'vbnjm', '6789', 'user.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indeks untuk tabel `dinas_infrastruktur`
--
ALTER TABLE `dinas_infrastruktur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dinas_infrastruktur_username_unique` (`username`),
  ADD UNIQUE KEY `dinas_infrastruktur_email_unique` (`email`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `infrastruktur-aplikasiopdtoba`
--
ALTER TABLE `infrastruktur-aplikasiopdtoba`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `infrastruktur-jembatan`
--
ALTER TABLE `infrastruktur-jembatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `infrastruktur-panjangjalan`
--
ALTER TABLE `infrastruktur-panjangjalan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `infrastruktur-panjangjalankabupaten`
--
ALTER TABLE `infrastruktur-panjangjalankabupaten`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kecamatan` (`kecamatan`);

--
-- Indeks untuk tabel `infrastruktur-pembagianpenetapanbagihasilpajak`
--
ALTER TABLE `infrastruktur-pembagianpenetapanbagihasilpajak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `infrastruktur-pembagian_penetapan_besaran_alokasi-dana_desa`
--
ALTER TABLE `infrastruktur-pembagian_penetapan_besaran_alokasi-dana_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `infrastruktur-pembangunanbersumberdanadesa`
--
ALTER TABLE `infrastruktur-pembangunanbersumberdanadesa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `infrastruktur-perhitungan_dana_desa`
--
ALTER TABLE `infrastruktur-perhitungan_dana_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kependudukan_jumlah_akta`
--
ALTER TABLE `kependudukan_jumlah_akta`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kependudukan_jumlah_penduduk`
--
ALTER TABLE `kependudukan_jumlah_penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kependudukan_tenaga_kerja`
--
ALTER TABLE `kependudukan_tenaga_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kesehatan_daftar_panti_asuhan`
--
ALTER TABLE `kesehatan_daftar_panti_asuhan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kesehatan_jumlah_akseptor_aktif_dan_alat_kontrasepsi`
--
ALTER TABLE `kesehatan_jumlah_akseptor_aktif_dan_alat_kontrasepsi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kesehatan_jumlah_bayi_bblr`
--
ALTER TABLE `kesehatan_jumlah_bayi_bblr`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kesehatan_jumlah_dokter`
--
ALTER TABLE `kesehatan_jumlah_dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kesehatan_jumlah_fasilitas_kesehatan`
--
ALTER TABLE `kesehatan_jumlah_fasilitas_kesehatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kesehatan_jumlah_kasus_penyakit_terbanyak`
--
ALTER TABLE `kesehatan_jumlah_kasus_penyakit_terbanyak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kesehatan_jumlah_tenaga_kesehatan`
--
ALTER TABLE `kesehatan_jumlah_tenaga_kesehatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kesehatan_penyandang_masalah_kesejahteraan_sosial`
--
ALTER TABLE `kesehatan_penyandang_masalah_kesejahteraan_sosial`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ketapang`
--
ALTER TABLE `ketapang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lindup_jenis_daur_ulang_sampah`
--
ALTER TABLE `lindup_jenis_daur_ulang_sampah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lindup_jenis_perusahaan`
--
ALTER TABLE `lindup_jenis_perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lindup_produksi_sampah`
--
ALTER TABLE `lindup_produksi_sampah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pariwisata_hotel`
--
ALTER TABLE `pariwisata_hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pariwisata_jenis_kapal`
--
ALTER TABLE `pariwisata_jenis_kapal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pariwisata_jumlah_wisata`
--
ALTER TABLE `pariwisata_jumlah_wisata`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pariwisata_kunjungan_kapal`
--
ALTER TABLE `pariwisata_kunjungan_kapal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pariwisata_objek_wisata`
--
ALTER TABLE `pariwisata_objek_wisata`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pariwisata_restoran`
--
ALTER TABLE `pariwisata_restoran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pdam_jumlah_pemakaian_air_bersih`
--
ALTER TABLE `pdam_jumlah_pemakaian_air_bersih`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawai_menurut_golongan`
--
ALTER TABLE `pegawai_menurut_golongan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawai_menurut_jenis_kelamin`
--
ALTER TABLE `pegawai_menurut_jenis_kelamin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawai_menurut_pendidikan`
--
ALTER TABLE `pegawai_menurut_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawai_yang_pindah_pensiun`
--
ALTER TABLE `pegawai_yang_pindah_pensiun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemerintahan-jlhpendudukwilayahkepadatan`
--
ALTER TABLE `pemerintahan-jlhpendudukwilayahkepadatan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kecamatan` (`kecamatan`);

--
-- Indeks untuk tabel `pemerintahan-jumlahdesakel`
--
ALTER TABLE `pemerintahan-jumlahdesakel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kecamatan` (`kecamatan`);

--
-- Indeks untuk tabel `pendidikan_paud`
--
ALTER TABLE `pendidikan_paud`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendidikan_sd`
--
ALTER TABLE `pendidikan_sd`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendidikan_sltp`
--
ALTER TABLE `pendidikan_sltp`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penerima_kelompok_bantuan_ternak`
--
ALTER TABLE `penerima_kelompok_bantuan_ternak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perindustrian_industri_kecil_dan_menengah`
--
ALTER TABLE `perindustrian_industri_kecil_dan_menengah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perindustrian_jumlah_dan_tenaga_kerja_industri_kecil_menengah`
--
ALTER TABLE `perindustrian_jumlah_dan_tenaga_kerja_industri_kecil_menengah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perkebunan_luas_dan_produksi_andaliman_dan_nilam`
--
ALTER TABLE `perkebunan_luas_dan_produksi_andaliman_dan_nilam`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perkebunan_luas_dan_produksi_aren_dan_kemiri`
--
ALTER TABLE `perkebunan_luas_dan_produksi_aren_dan_kemiri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perkebunan_luas_dan_produksi_karet_dan_kelapa_sawit`
--
ALTER TABLE `perkebunan_luas_dan_produksi_karet_dan_kelapa_sawit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perkebunan_luas_dan_produksi_kelapa_dan_pinang`
--
ALTER TABLE `perkebunan_luas_dan_produksi_kelapa_dan_pinang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perkebunan_luas_dan_produksi_kopi_dan_kakao`
--
ALTER TABLE `perkebunan_luas_dan_produksi_kopi_dan_kakao`
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `peternakan_jumlah_populasi_ternak_unggas`
--
ALTER TABLE `peternakan_jumlah_populasi_ternak_unggas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peternakan_jumlah_produksi_ternak_unggas`
--
ALTER TABLE `peternakan_jumlah_produksi_ternak_unggas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peternakan_jumlah_ternak_dipotong`
--
ALTER TABLE `peternakan_jumlah_ternak_dipotong`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peternakan_jumlah_ternak_unggas_dipotong`
--
ALTER TABLE `peternakan_jumlah_ternak_unggas_dipotong`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peternakan_populasi_ternak_besar`
--
ALTER TABLE `peternakan_populasi_ternak_besar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peternakan_populasi_ternak_unggas`
--
ALTER TABLE `peternakan_populasi_ternak_unggas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rsud_jumlah_kamar_rawat_inap`
--
ALTER TABLE `rsud_jumlah_kamar_rawat_inap`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rsud_peralatan_rumah_sakit`
--
ALTER TABLE `rsud_peralatan_rumah_sakit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rsud_perawat_jenis_perawat`
--
ALTER TABLE `rsud_perawat_jenis_perawat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rsud_tenaga_medis`
--
ALTER TABLE `rsud_tenaga_medis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `teknologi_daftar_internet_game_monitoring`
--
ALTER TABLE `teknologi_daftar_internet_game_monitoring`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `teknologi_jumlah_desa_blank_spot`
--
ALTER TABLE `teknologi_jumlah_desa_blank_spot`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `teknologi_jumlah_menara`
--
ALTER TABLE `teknologi_jumlah_menara`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara`
--
ALTER TABLE `teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dinas_infrastruktur`
--
ALTER TABLE `dinas_infrastruktur`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `infrastruktur-aplikasiopdtoba`
--
ALTER TABLE `infrastruktur-aplikasiopdtoba`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `infrastruktur-jembatan`
--
ALTER TABLE `infrastruktur-jembatan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `infrastruktur-panjangjalan`
--
ALTER TABLE `infrastruktur-panjangjalan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `infrastruktur-panjangjalankabupaten`
--
ALTER TABLE `infrastruktur-panjangjalankabupaten`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `infrastruktur-pembagianpenetapanbagihasilpajak`
--
ALTER TABLE `infrastruktur-pembagianpenetapanbagihasilpajak`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `infrastruktur-pembagian_penetapan_besaran_alokasi-dana_desa`
--
ALTER TABLE `infrastruktur-pembagian_penetapan_besaran_alokasi-dana_desa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `infrastruktur-pembangunanbersumberdanadesa`
--
ALTER TABLE `infrastruktur-pembangunanbersumberdanadesa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `infrastruktur-perhitungan_dana_desa`
--
ALTER TABLE `infrastruktur-perhitungan_dana_desa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kependudukan_jumlah_akta`
--
ALTER TABLE `kependudukan_jumlah_akta`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kependudukan_jumlah_penduduk`
--
ALTER TABLE `kependudukan_jumlah_penduduk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kependudukan_tenaga_kerja`
--
ALTER TABLE `kependudukan_tenaga_kerja`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kesehatan_daftar_panti_asuhan`
--
ALTER TABLE `kesehatan_daftar_panti_asuhan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kesehatan_jumlah_akseptor_aktif_dan_alat_kontrasepsi`
--
ALTER TABLE `kesehatan_jumlah_akseptor_aktif_dan_alat_kontrasepsi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kesehatan_jumlah_bayi_bblr`
--
ALTER TABLE `kesehatan_jumlah_bayi_bblr`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kesehatan_jumlah_dokter`
--
ALTER TABLE `kesehatan_jumlah_dokter`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kesehatan_jumlah_fasilitas_kesehatan`
--
ALTER TABLE `kesehatan_jumlah_fasilitas_kesehatan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kesehatan_jumlah_kasus_penyakit_terbanyak`
--
ALTER TABLE `kesehatan_jumlah_kasus_penyakit_terbanyak`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kesehatan_jumlah_tenaga_kesehatan`
--
ALTER TABLE `kesehatan_jumlah_tenaga_kesehatan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kesehatan_penyandang_masalah_kesejahteraan_sosial`
--
ALTER TABLE `kesehatan_penyandang_masalah_kesejahteraan_sosial`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `lindup_jenis_daur_ulang_sampah`
--
ALTER TABLE `lindup_jenis_daur_ulang_sampah`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `lindup_jenis_perusahaan`
--
ALTER TABLE `lindup_jenis_perusahaan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `lindup_produksi_sampah`
--
ALTER TABLE `lindup_produksi_sampah`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pariwisata_hotel`
--
ALTER TABLE `pariwisata_hotel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pariwisata_jenis_kapal`
--
ALTER TABLE `pariwisata_jenis_kapal`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pariwisata_jumlah_wisata`
--
ALTER TABLE `pariwisata_jumlah_wisata`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pariwisata_kunjungan_kapal`
--
ALTER TABLE `pariwisata_kunjungan_kapal`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pariwisata_objek_wisata`
--
ALTER TABLE `pariwisata_objek_wisata`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pariwisata_restoran`
--
ALTER TABLE `pariwisata_restoran`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pdam_jumlah_pemakaian_air_bersih`
--
ALTER TABLE `pdam_jumlah_pemakaian_air_bersih`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pegawai_menurut_golongan`
--
ALTER TABLE `pegawai_menurut_golongan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pegawai_menurut_jenis_kelamin`
--
ALTER TABLE `pegawai_menurut_jenis_kelamin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pegawai_menurut_pendidikan`
--
ALTER TABLE `pegawai_menurut_pendidikan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pegawai_yang_pindah_pensiun`
--
ALTER TABLE `pegawai_yang_pindah_pensiun`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pemerintahan-jlhpendudukwilayahkepadatan`
--
ALTER TABLE `pemerintahan-jlhpendudukwilayahkepadatan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pemerintahan-jumlahdesakel`
--
ALTER TABLE `pemerintahan-jumlahdesakel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `pendidikan_paud`
--
ALTER TABLE `pendidikan_paud`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pendidikan_sd`
--
ALTER TABLE `pendidikan_sd`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pendidikan_sltp`
--
ALTER TABLE `pendidikan_sltp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penerima_kelompok_bantuan_ternak`
--
ALTER TABLE `penerima_kelompok_bantuan_ternak`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `perindustrian_industri_kecil_dan_menengah`
--
ALTER TABLE `perindustrian_industri_kecil_dan_menengah`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `perindustrian_jumlah_dan_tenaga_kerja_industri_kecil_menengah`
--
ALTER TABLE `perindustrian_jumlah_dan_tenaga_kerja_industri_kecil_menengah`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `perkebunan_luas_dan_produksi_andaliman_dan_nilam`
--
ALTER TABLE `perkebunan_luas_dan_produksi_andaliman_dan_nilam`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `perkebunan_luas_dan_produksi_aren_dan_kemiri`
--
ALTER TABLE `perkebunan_luas_dan_produksi_aren_dan_kemiri`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `perkebunan_luas_dan_produksi_karet_dan_kelapa_sawit`
--
ALTER TABLE `perkebunan_luas_dan_produksi_karet_dan_kelapa_sawit`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `perkebunan_luas_dan_produksi_kelapa_dan_pinang`
--
ALTER TABLE `perkebunan_luas_dan_produksi_kelapa_dan_pinang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `perkebunan_luas_dan_produksi_kopi_dan_kakao`
--
ALTER TABLE `perkebunan_luas_dan_produksi_kopi_dan_kakao`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `peternakan_jumlah_populasi_ternak_unggas`
--
ALTER TABLE `peternakan_jumlah_populasi_ternak_unggas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `peternakan_jumlah_produksi_ternak_unggas`
--
ALTER TABLE `peternakan_jumlah_produksi_ternak_unggas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `peternakan_jumlah_ternak_dipotong`
--
ALTER TABLE `peternakan_jumlah_ternak_dipotong`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `peternakan_jumlah_ternak_unggas_dipotong`
--
ALTER TABLE `peternakan_jumlah_ternak_unggas_dipotong`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `peternakan_populasi_ternak_besar`
--
ALTER TABLE `peternakan_populasi_ternak_besar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `peternakan_populasi_ternak_unggas`
--
ALTER TABLE `peternakan_populasi_ternak_unggas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `teknologi_daftar_internet_game_monitoring`
--
ALTER TABLE `teknologi_daftar_internet_game_monitoring`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `teknologi_jumlah_desa_blank_spot`
--
ALTER TABLE `teknologi_jumlah_desa_blank_spot`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `teknologi_jumlah_menara`
--
ALTER TABLE `teknologi_jumlah_menara`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara`
--
ALTER TABLE `teknologi_rekapitulasi_data_menara_pengguna_tinggi_menara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
