-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Des 2020 pada 13.40
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_scopus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_agenda`
--

CREATE TABLE `tbl_agenda` (
  `agenda_id` int(11) NOT NULL,
  `agenda_nama` varchar(200) DEFAULT NULL,
  `agenda_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `agenda_deskripsi` text,
  `agenda_mulai` date DEFAULT NULL,
  `agenda_selesai` date DEFAULT NULL,
  `agenda_tempat` varchar(90) DEFAULT NULL,
  `agenda_waktu` varchar(30) DEFAULT NULL,
  `agenda_keterangan` varchar(200) DEFAULT NULL,
  `agenda_author` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_agenda`
--

INSERT INTO `tbl_agenda` (`agenda_id`, `agenda_nama`, `agenda_tanggal`, `agenda_deskripsi`, `agenda_mulai`, `agenda_selesai`, `agenda_tempat`, `agenda_waktu`, `agenda_keterangan`, `agenda_author`) VALUES
(1, 'Penyembelihan Hewan Kurban Idul Adha 2017', '2017-01-22 06:18:01', 'Idul Adha yang biasa disebut lebaran haji atapun lebaran kurban sangat identik dengan penyembelihan hewan kurban. M-Sekolah tahun ini juga melakukan penyembelihan hewan kurban. Yang rencananya akan dihadiri oleh guru-guru, siswa dan pengurus OSIS.', '2017-01-22', '2017-01-22', 'M-Sekolah', '08.00 - 11.00 WIB', 'Dihadiri oleh guru-guru, siswa dan pengurus OSIS', 'M Fikri Setiadi'),
(2, 'Peluncuran Website Resmi M-Sekolah', '2017-01-22 06:26:33', 'Peluncuran website resmi  M-Sekolah, sebagai media informasi dan akademik online untuk pelayanan pendidikan yang lebih baik kepada siswa, orangtua, dan masyarakat pada umumnya semakin meningkat.', '2017-01-04', '2017-01-04', 'M-Sekolah', '07.30 - 12.00 WIB', '-', 'M Fikri Setiadi'),
(3, 'Penerimaan Raport Semester Ganjil Tahun Ajaran 2017-2018', '2017-01-22 06:29:49', 'Berakhirnya semester ganjil tahun pelajaran 2016-2017, ditandai dengan pembagian laporan hasil belajar.', '2017-02-17', '2017-02-17', 'M-Sekolah', '07.30 - 12.00 WIB', 'Untuk kelas XI dan XII, pembagian raport dimulai pukul 07.30 WIB. Sedangkan untuk kelas X pada pukul 09.00 WIB. Raport diambil oleh orang tua/wali murid masing-masing.', 'M Fikri Setiadi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_album`
--

CREATE TABLE `tbl_album` (
  `album_id` int(11) NOT NULL,
  `album_nama` varchar(50) DEFAULT NULL,
  `album_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `album_pengguna_id` int(11) DEFAULT NULL,
  `album_author` varchar(60) DEFAULT NULL,
  `album_count` int(11) DEFAULT '0',
  `album_cover` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_album`
--

INSERT INTO `tbl_album` (`album_id`, `album_nama`, `album_tanggal`, `album_pengguna_id`, `album_author`, `album_count`, `album_cover`) VALUES
(5, 'Flyer', '2020-12-23 08:11:51', 5, 'Dickyfli Perdana Putra', 8, 'a6a532b5d1f8cb40d2711160e5a8fdca.jpg'),
(6, 'webinar', '2020-12-23 08:30:46', 5, 'Dickyfli Perdana Putra', 20, 'bf090974776d9637664bad5a3cc4c2d1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bukti_pembayaran`
--

CREATE TABLE `tbl_bukti_pembayaran` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `id_order` varchar(128) NOT NULL,
  `bukti_pembayaran` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_bukti_pembayaran`
--

INSERT INTO `tbl_bukti_pembayaran` (`id`, `email`, `id_order`, `bukti_pembayaran`) VALUES
(2, 'Muaralembu11@gmail.com', '90tYs', 'appl12.PNG'),
(4, 'bertojunikrisnanto@gmail.com', 'TJ150', 'Capture21.PNG'),
(5, 'bertojunikrisnanto@gmail.com', 'BUQGk', 'logo-footer.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bulan`
--

CREATE TABLE `tbl_bulan` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_bulan`
--

INSERT INTO `tbl_bulan` (`id`, `nama`, `status`) VALUES
(1, 'January', 1),
(2, 'February', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_files`
--

CREATE TABLE `tbl_files` (
  `file_id` int(11) NOT NULL,
  `file_judul` varchar(120) DEFAULT NULL,
  `file_deskripsi` text,
  `file_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `file_oleh` varchar(60) DEFAULT NULL,
  `file_download` int(11) DEFAULT '0',
  `file_data` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_files`
--

INSERT INTO `tbl_files` (`file_id`, `file_judul`, `file_deskripsi`, `file_tanggal`, `file_oleh`, `file_download`, `file_data`) VALUES
(2, 'Dasar-dasar CSS', 'Modul dasar-dasar CSS 3. Modul ini membantu anda untuk memahami struktur dasar CSS', '2017-01-23 04:30:01', 'Drs. Joko', 0, 'ab9a183ff240deadbedaff78e639af2f.pdf'),
(3, '14 Teknik Komunikasi Yang Paling Efektif', 'Ebook 14 teknik komunikasi paling efektif membantu anda untuk berkomunikasi dengan baik dan benar', '2017-01-23 15:26:06', 'Drs. Joko', 0, 'ab2cb34682bd94f30f2347523112ffb9.pdf'),
(4, 'Bagaimana Membentuk Pola Pikir yang Baru', 'Ebook ini membantu anda membentuk pola pikir baru.', '2017-01-23 15:27:07', 'Drs. Joko', 0, '30f588eb5c55324f8d18213f11651855.pdf'),
(5, '7 Tips Penting mengatasi Kritik', '7 Tips Penting mengatasi Kritik', '2017-01-23 15:27:44', 'Drs. Joko', 0, '329a62b25ad475a148e1546aa3db41de.docx'),
(6, '8 Racun dalam kehidupan kita', '8 Racun dalam kehidupan kita', '2017-01-23 15:28:17', 'Drs. Joko', 0, '8e38ad4948ba13758683dea443fbe6be.docx'),
(7, 'Jurnal Teknolgi Informasi', 'Jurnal Teknolgi Informasi', '2017-01-25 03:18:53', 'Gunawan, S.Pd', 0, '87ae0f009714ddfdd79e2977b2a64632.pdf'),
(8, 'Jurnal Teknolgi Informasi 2', 'Jurnal Teknolgi Informasi', '2017-01-25 03:19:22', 'Gunawan, S.Pd', 0, 'c4e966ba2c6e142155082854dc5b3602.pdf'),
(9, 'Naskah Publikasi IT', 'Naskah Teknolgi Informasi', '2017-01-25 03:21:04', 'Gunawan, S.Pd', 0, '71380b3cf16a17a02382098c028ece9c.pdf'),
(10, 'Modul Teknologi Informasi', 'Modul Teknologi Informasi', '2017-01-25 03:22:08', 'Gunawan, S.Pd', 0, '029143a3980232ab2900d94df36dbb0c.pdf'),
(11, 'Modul Teknologi Informasi Part II', 'Modul Teknologi Informasi', '2017-01-25 03:22:54', 'Gunawan, S.Pd', 0, 'ea8f3f732576083156e509657614f551.pdf'),
(12, 'Modul Teknologi Informasi Part III', 'Modul Teknologi Informasi', '2017-01-25 03:23:21', 'Gunawan, S.Pd', 0, 'c5e5e7d16e4cd6c3d22c11f64b0db2af.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_galeri`
--

CREATE TABLE `tbl_galeri` (
  `galeri_id` int(11) NOT NULL,
  `galeri_judul` varchar(60) DEFAULT NULL,
  `galeri_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `galeri_gambar` varchar(40) DEFAULT NULL,
  `galeri_album_id` int(11) DEFAULT NULL,
  `galeri_pengguna_id` int(11) DEFAULT NULL,
  `galeri_author` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_galeri`
--

INSERT INTO `tbl_galeri` (`galeri_id`, `galeri_judul`, `galeri_tanggal`, `galeri_gambar`, `galeri_album_id`, `galeri_pengguna_id`, `galeri_author`) VALUES
(38, 'Flyer', '2020-12-23 08:49:52', '767237dcafc4b725d01e9f1073d427a0.jpg', 5, 5, 'Dickyfli Perdana Putra'),
(39, 'Flyer 2', '2020-12-23 08:50:26', '2e765497138659f9475716527b51a6d0.jpg', 5, 5, 'Dickyfli Perdana Putra'),
(40, 'flyer 3', '2020-12-23 08:51:10', '61e59a4e0990198931afdd4c8fa6cb09.jpg', 5, 5, 'Dickyfli Perdana Putra'),
(41, 'flyer 4', '2020-12-23 08:51:44', '1f66c9ad52f20ec56ed2a99bb0c7e6e3.jpg', 5, 5, 'Dickyfli Perdana Putra'),
(42, 'flyer 5', '2020-12-23 08:52:32', '3110a28d98b86d8b9e28f3ad481c7863.jpg', 5, 5, 'Dickyfli Perdana Putra'),
(43, 'flyer 6', '2020-12-23 08:53:12', 'd20f822003d6d231450e099d42a9edb6.jpg', 5, 5, 'Dickyfli Perdana Putra'),
(44, 'flyer 7', '2020-12-23 08:54:17', 'a145ef7737944508dbcd4b3647242268.jpg', 5, 5, 'Dickyfli Perdana Putra'),
(45, 'flyer 8', '2020-12-23 08:54:59', '8413ba2fc5b830b958dc477d4e1b1fc9.jpg', 5, 5, 'Dickyfli Perdana Putra'),
(47, 'webinar', '2020-12-23 08:56:23', '08ae84b88d56dfbdfba1e2a08d6f678d.jpg', 6, 5, 'Dickyfli Perdana Putra'),
(48, 'webinar 2', '2020-12-23 08:56:44', '53fa304fc91807015bdac935a760070b.jpg', 6, 5, 'Dickyfli Perdana Putra'),
(49, 'Webinar 3', '2020-12-23 08:57:23', '06acd55ab1a31d4bea96f44e3b9e62d4.jpg', 6, 5, 'Dickyfli Perdana Putra'),
(50, 'Webinar 4', '2020-12-23 08:57:40', '5830d55a010c3a13ec4227dba991fae8.jpg', 6, 5, 'Dickyfli Perdana Putra'),
(51, 'webinar 5', '2020-12-23 08:57:59', '4cefcbb23550d44a79099827fbd85507.jpg', 6, 5, 'Dickyfli Perdana Putra'),
(52, 'webinar 6', '2020-12-23 08:58:17', 'fe133a1c78718225fd2aeed62d4345bb.jpg', 6, 5, 'Dickyfli Perdana Putra'),
(53, 'webinar 7', '2020-12-23 08:59:13', 'e87c5edcc4cd44db58b6d7570e262678.jpg', 6, 5, 'Dickyfli Perdana Putra'),
(54, 'webinar 8', '2020-12-23 08:59:36', '9d9f5322f6db1da1956a1b978cf5d2d3.jpg', 6, 5, 'Dickyfli Perdana Putra'),
(55, 'webinar 9', '2020-12-23 08:59:57', '25c0d336f9b83bd4f738550ad814815e.jpg', 6, 5, 'Dickyfli Perdana Putra'),
(56, 'webinar 10', '2020-12-23 09:00:16', 'c73dd9188ad08bdb2c7280e2d071f652.jpg', 6, 5, 'Dickyfli Perdana Putra'),
(57, 'webinar 11', '2020-12-23 09:22:33', 'dfbca5e96800d56e2c9846dadba72b78.jpg', 6, 5, 'Dickyfli Perdana Putra'),
(58, 'webinar 12', '2020-12-23 09:22:50', '4fc727d96e37ef3c3b2f7a30d6c5bb30.jpg', 6, 5, 'Dickyfli Perdana Putra'),
(60, 'webinar 13', '2020-12-23 09:24:02', '0568fd2f4bc93a322d27c5777514985f.jpg', 6, 5, 'Dickyfli Perdana Putra'),
(61, 'webinar 14', '2020-12-23 09:24:21', '8714ea8db9a29149c176799f66eae103.jpg', 6, 5, 'Dickyfli Perdana Putra'),
(62, 'webinar 15', '2020-12-23 09:24:43', 'da5a20aabf2615a5715b6d695fa96811.jpg', 6, 5, 'Dickyfli Perdana Putra'),
(63, 'webinar 16', '2020-12-23 09:27:03', '33c0ac014ba3044eef6fa13c723528bb.jpg', 6, 5, 'Dickyfli Perdana Putra'),
(64, 'webinar 17', '2020-12-23 09:27:21', 'ce0eb78071eb556adf01d7562ee90bd8.jpg', 6, 5, 'Dickyfli Perdana Putra'),
(65, 'webinar 18', '2020-12-23 09:27:46', '4181e970d37444caaef46912fab0d9c0.jpg', 6, 5, 'Dickyfli Perdana Putra'),
(66, 'webinar 19', '2020-12-23 09:28:03', 'b14b4a885466d99d2e9c2a4a056718d8.jpg', 6, 5, 'Dickyfli Perdana Putra'),
(67, 'webinar kemenkes', '2020-12-23 09:28:40', '84df7199d3d57c40726f860d3ab7e25f.jpg', 6, 5, 'Dickyfli Perdana Putra');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `guru_id` int(11) NOT NULL,
  `guru_nip` varchar(30) DEFAULT NULL,
  `guru_nama` varchar(70) DEFAULT NULL,
  `guru_jenkel` varchar(2) DEFAULT NULL,
  `guru_tmp_lahir` varchar(80) DEFAULT NULL,
  `guru_tgl_lahir` varchar(80) DEFAULT NULL,
  `guru_mapel` varchar(120) DEFAULT NULL,
  `guru_photo` varchar(40) DEFAULT NULL,
  `guru_tgl_input` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_guru`
--

INSERT INTO `tbl_guru` (`guru_id`, `guru_nip`, `guru_nama`, `guru_jenkel`, `guru_tmp_lahir`, `guru_tgl_lahir`, `guru_mapel`, `guru_photo`, `guru_tgl_input`) VALUES
(1, '-', 'Dr. Eka Siskawati, SE., M.Sc.Ak', 'P', '-', '-', 'Trainer', '39939428067ef74e4d3d413462d1f634.jpg', '2017-01-26 07:49:43'),
(2, '-', 'Dr. Fadilah Umar, S.Pd., M.Or', 'L', '-', '-', 'Trainer ', '1c6b0b69a03a0ee0ea673aeabae01e9c.jpg', '2017-01-26 13:38:54'),
(3, '-', 'Dr. Jamaluddin Hos., M.Si', 'L', '-', '-', 'Trainer ', '64003eaa81462ed816560c1e18fc7fcf.JPG', '2017-01-26 13:41:20'),
(9, '--', 'Dr. (Cand) Ir. Bambang Heri Isnawan, MP', 'L', '-', '-', 'Trainer', '13248435512e10f30127a222e9b0c131.jpg', '2020-12-25 10:21:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_inbox`
--

CREATE TABLE `tbl_inbox` (
  `inbox_id` int(11) NOT NULL,
  `inbox_nama` varchar(40) DEFAULT NULL,
  `inbox_email` varchar(60) DEFAULT NULL,
  `inbox_kontak` varchar(20) DEFAULT NULL,
  `inbox_pesan` text,
  `inbox_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `inbox_status` int(11) DEFAULT '1' COMMENT '1=Belum dilihat, 0=Telah dilihat'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_inbox`
--

INSERT INTO `tbl_inbox` (`inbox_id`, `inbox_nama`, `inbox_email`, `inbox_kontak`, `inbox_pesan`, `inbox_tanggal`, `inbox_status`) VALUES
(2, 'M Fikri Setiadi', 'fikrifiver97@gmail.com', '-', 'Ping !', '2017-06-21 03:44:12', 0),
(3, 'M Fikri Setiadi', 'fikrifiver97@gmail.com', '-', 'Ini adalah pesan ', '2017-06-21 03:45:57', 0),
(5, 'M Fikri Setiadi', 'fikrifiver97@gmail.com', '-', 'Ping !', '2017-06-21 03:53:19', 0),
(7, 'M Fikri Setiadi', 'fikrifiver97@gmail.com', '-', 'Hi, there!', '2017-07-01 07:28:08', 0),
(8, 'M Fikri', 'fikrifiver97@gmail.com', '084375684364', 'Hi There, Would you please help me about register?', '2018-08-06 13:51:07', 0),
(9, 'berto', 'bertojunikrisnanto@gmail.com', '0895421735441', 'WQEDWQED', '2020-12-13 03:46:51', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(30) DEFAULT NULL,
  `kategori_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`kategori_id`, `kategori_nama`, `kategori_tanggal`) VALUES
(1, 'Pendidikan', '2016-09-06 05:49:04'),
(2, 'Politik', '2016-09-06 05:50:01'),
(3, 'Sains', '2016-09-06 05:59:39'),
(5, 'Penelitian', '2016-09-06 06:19:26'),
(6, 'Prestasi', '2016-09-07 02:51:09'),
(13, 'Olah Raga', '2017-01-13 13:20:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `kelas_id` int(11) NOT NULL,
  `kelas_nama` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`kelas_id`, `kelas_nama`) VALUES
(1, 'Kelas X.1'),
(2, 'Kelas X.2'),
(3, 'Kelas X.3'),
(4, 'Kelas X.4'),
(5, 'Kelas X.5'),
(6, 'Kelas X.6'),
(7, 'Kelas X.7'),
(8, 'Kelas XI IPA.1'),
(9, 'Kelas XI IPA.2'),
(10, 'Kelas XI IPA.3'),
(11, 'Kelas XI IPA.4'),
(12, 'Kelas XI IPA.5'),
(13, 'Kelas XI IPA.6'),
(14, 'Kelas XI IPA.7'),
(15, 'Kelas XI IPS.1'),
(16, 'Kelas XI IPS.2'),
(17, 'Kelas XI IPS.3'),
(18, 'Kelas XI IPS.4'),
(19, 'Kelas XI IPS.5'),
(20, 'Kelas XI IPS.6'),
(21, 'Kelas XI IPS.7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_komentar`
--

CREATE TABLE `tbl_komentar` (
  `komentar_id` int(11) NOT NULL,
  `komentar_nama` varchar(30) DEFAULT NULL,
  `komentar_email` varchar(50) DEFAULT NULL,
  `komentar_isi` varchar(120) DEFAULT NULL,
  `komentar_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `komentar_status` varchar(2) DEFAULT NULL,
  `komentar_tulisan_id` int(11) DEFAULT NULL,
  `komentar_parent` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_komentar`
--

INSERT INTO `tbl_komentar` (`komentar_id`, `komentar_nama`, `komentar_email`, `komentar_isi`, `komentar_tanggal`, `komentar_status`, `komentar_tulisan_id`, `komentar_parent`) VALUES
(1, 'M Fikri', 'fikrifiver97@gmail.com', ' Nice Post.', '2018-08-07 15:09:07', '1', 24, 0),
(2, 'M Fikri Setiadi', 'fikrifiver97@gmail.com', ' Awesome Post', '2018-08-07 15:14:26', '1', 24, 0),
(3, 'Joko', 'joko@gmail.com', 'Thank you.', '2018-08-08 03:54:56', '1', 24, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_log_aktivitas`
--

CREATE TABLE `tbl_log_aktivitas` (
  `log_id` int(11) NOT NULL,
  `log_nama` text,
  `log_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `log_ip` varchar(20) DEFAULT NULL,
  `log_pengguna_id` int(11) DEFAULT NULL,
  `log_icon` blob,
  `log_jenis_icon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id` varchar(64) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `gender` varchar(128) NOT NULL,
  `no_hp` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `status` varchar(200) NOT NULL,
  `role_id` int(5) NOT NULL,
  `user_active` int(5) NOT NULL,
  `date_created` varchar(128) NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_member`
--

INSERT INTO `tbl_member` (`id`, `nama`, `alamat`, `gender`, `no_hp`, `email`, `password`, `status`, `role_id`, `user_active`, `date_created`, `foto`) VALUES
('F6Vsh', 'berto juni', 'tegal catak no.638 warungboto, umbulharjo, yogyakarta', 'Laki-laki', '0895421735441', 'bertojunikrisnanto@gmail.com', '$2y$10$ufZw8Mx38d/HBoKA/doz7.55KyTcpGLKcCfDbtC3wINMAG0KwQVK2', 'Mahasiswa', 2, 1, '1605713450', 'berto.jpg'),
('RtPAV', 'Minatozaki Sana', 'Bantul', 'Perempuan', '082386572800', 'Muaralembu11@gmail.com', '$2y$10$QfkJV.QVfYNYpIF5DZaWU.7j.bgqhqm.Gv5lG5SMJW0C9zNXH8mNW', '', 2, 1, '1605034629', 'AG35HI261.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu_member`
--

CREATE TABLE `tbl_menu_member` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_menu_member`
--

INSERT INTO `tbl_menu_member` (`id`, `title`, `url`, `icon`) VALUES
(1, 'Dashboard', 'member/dasboard', 'nav-icon fas fa-fw fa-tachometer-alt'),
(2, 'Profile', 'member/profile', 'nav-icon fas fa-fw fa-users-cog'),
(3, 'Referal', 'member/profile', 'nav-icon fas fa-fw fa-users'),
(4, 'Order', 'member/order', 'nav-icon fas fa-fw fa-shopping-cart'),
(7, 'Invoice', 'member/tagihan', 'nav-icon fas fa-fw fa-dollar-sign'),
(8, 'Download', 'member/ambil', 'nav-icon fas fa-fw fa-cloud-download-alt'),
(9, 'E-Certificate', 'member/sertif', 'nav-icon fas fa-fw fa-file-alt'),
(10, 'Story Pemesanan', 'member/Story', 'nav-icon fas fa-fw fa-history'),
(11, 'Logout', 'member/login/logout', 'nav-icon fas fa-fw fa-sign-out-alt');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `nama_webinar` varchar(128) NOT NULL,
  `tanggal` varchar(128) NOT NULL,
  `tanggal_pelaksanaan` varchar(128) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `nama`, `email`, `nama_webinar`, `tanggal`, `tanggal_pelaksanaan`, `harga`, `status`) VALUES
('90tYs', 'Minatozaki Sana', 'Muaralembu11@gmail.com', 'Value Investing', '10 December 2020', '2020-11-23', 500000, 0),
('BUQGk', 'berto juni', 'bertojunikrisnanto@gmail.com', 'h-index', '13 December 2020', '2020-12-19', 50000, 0),
('GzmYr', 'berto juni', 'bertojunikrisnanto@gmail.com', 'h-index', '13 December 2020', '2020-12-19', 50000, 0),
('l5Jzn', 'berto juni', 'bertojunikrisnanto@gmail.com', 'Batch 16', '25 December 2020', '2021-01-05', 500000, 0),
('nSwAV', 'Minatozaki Sana', 'Muaralembu11@gmail.com', 'Ngoding Skuy', '05 December 2020', '2020-11-25', 10000000, 1),
('TJ150', 'berto juni', 'bertojunikrisnanto@gmail.com', 'Technical analysis Saham', '11 December 2020', '2020-11-26', 600000, 1),
('Tn7zx', 'Minatozaki Sana', 'Muaralembu11@gmail.com', 'Technical analysis Saham', '11 December 2020', '2020-11-26', 600000, 0),
('z52ko', 'berto juni', 'bertojunikrisnanto@gmail.com', 'Batch 16', '25 December 2020', '2021-01-05', 500000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `pengguna_nama` varchar(50) DEFAULT NULL,
  `pengguna_moto` varchar(100) DEFAULT NULL,
  `pengguna_jenkel` varchar(2) DEFAULT NULL,
  `pengguna_username` varchar(30) DEFAULT NULL,
  `pengguna_password` varchar(35) DEFAULT NULL,
  `pengguna_tentang` text,
  `pengguna_email` varchar(50) DEFAULT NULL,
  `pengguna_nohp` varchar(20) DEFAULT NULL,
  `pengguna_facebook` varchar(35) DEFAULT NULL,
  `pengguna_twitter` varchar(35) DEFAULT NULL,
  `pengguna_linkdin` varchar(35) DEFAULT NULL,
  `pengguna_google_plus` varchar(35) DEFAULT NULL,
  `pengguna_status` int(2) DEFAULT '1',
  `pengguna_level` varchar(3) DEFAULT NULL,
  `pengguna_register` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pengguna_photo` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`pengguna_id`, `pengguna_nama`, `pengguna_moto`, `pengguna_jenkel`, `pengguna_username`, `pengguna_password`, `pengguna_tentang`, `pengguna_email`, `pengguna_nohp`, `pengguna_facebook`, `pengguna_twitter`, `pengguna_linkdin`, `pengguna_google_plus`, `pengguna_status`, `pengguna_level`, `pengguna_register`, `pengguna_photo`) VALUES
(5, 'Dickyfli Perdana Putra', NULL, 'L', 'dickyfli', 'bf017bbfaf9063551acc6d82a9f54e40', NULL, 'Muaralembu11@gmail.com', '082386572800', NULL, NULL, NULL, NULL, 1, '1', '2020-11-10 17:17:41', 'b4a3e95f8237cbed3de04745478b9d3a.jpg'),
(6, 'Berto juni k', NULL, 'L', 'bertojuni', '23af1b6a152bce78695265cc959265ab', NULL, 'bertojuni98@gmail.com', '0895421735441', NULL, NULL, NULL, NULL, 1, '1', '2020-12-13 08:35:31', '90f5beadac0dae2e3b0ab68e7225ee40.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengumuman`
--

CREATE TABLE `tbl_pengumuman` (
  `pengumuman_id` int(11) NOT NULL,
  `pengumuman_judul` varchar(150) DEFAULT NULL,
  `pengumuman_deskripsi` text,
  `pengumuman_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pengumuman_author` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengumuman`
--

INSERT INTO `tbl_pengumuman` (`pengumuman_id`, `pengumuman_judul`, `pengumuman_deskripsi`, `pengumuman_tanggal`, `pengumuman_author`) VALUES
(1, 'Pengumuman Libur Semester Ganjil Tahun Ajaran 2016-2017', 'Libur semester ganjil tahun ajaran 2016-2017 dimulai dari tanggal 3 Maret 2017 sampai dengan tanggal 7 Maret 207.', '2017-01-21 01:17:30', 'M Fikri Setiadi'),
(2, 'Pengumuman Pembagian Raport Semester Ganjil Tahun Ajaran 2016-2017', 'Menjelang berakhirnya proses belajar-mengajar di semester ganjil tahun ajaran 2016-2017, maka akan diadakan pembagian hasil belajar/raport pada tanggal 4 Maret 2017 pukul 07.30 WIB.\r\nYang bertempat di M-Sekolah. Raport diambil oleh orang tua/wali kelas murid masing-masing', '2017-01-21 01:16:20', 'M Fikri Setiadi'),
(3, 'Pengumuman Peresmian dan Launching Website Perdana M-Sekolah', 'Peresmian dan launching website resmi M-Sekolah akan diadakan pada hari 23 Desember 2016 pukul 10.00, bertepatan dengan pembagian raport semester ganjil tahun ajaran 2016-2017', '2017-01-22 07:16:16', 'M Fikri Setiadi'),
(4, 'Pengumuman Proses Belajar Mengajar di Semester Genap Tahun Ajaran 2016-2017', 'Setelah libur semester ganjil tahun ajaran 2016-2017, proses belajar mengajar di semester genap tahun ajaran 2016-2017 mulai aktif kembali tanggal 2 Maret 2017.', '2017-01-22 07:15:28', 'M Fikri Setiadi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengunjung`
--

CREATE TABLE `tbl_pengunjung` (
  `pengunjung_id` int(11) NOT NULL,
  `pengunjung_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pengunjung_ip` varchar(40) DEFAULT NULL,
  `pengunjung_perangkat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengunjung`
--

INSERT INTO `tbl_pengunjung` (`pengunjung_id`, `pengunjung_tanggal`, `pengunjung_ip`, `pengunjung_perangkat`) VALUES
(930, '2018-08-09 08:04:59', '::1', 'Chrome'),
(931, '2020-11-10 17:03:29', '::1', 'Chrome'),
(932, '2020-11-12 17:04:26', '::1', 'Chrome'),
(933, '2020-11-13 17:55:18', '::1', 'Chrome'),
(934, '2020-11-18 07:54:43', '::1', 'Chrome'),
(935, '2020-11-19 06:03:36', '::1', 'Chrome'),
(936, '2020-11-21 03:41:21', '::1', 'Chrome'),
(937, '2020-11-23 03:54:36', '::1', 'Chrome'),
(938, '2020-11-25 03:30:04', '::1', 'Chrome'),
(939, '2020-11-26 02:35:46', '::1', 'Chrome'),
(940, '2020-11-27 07:25:29', '::1', 'Chrome'),
(941, '2020-11-29 13:01:46', '::1', 'Chrome'),
(942, '2020-11-30 11:31:39', '::1', 'Chrome'),
(943, '2020-12-01 04:57:19', '::1', 'Chrome'),
(944, '2020-12-02 03:40:57', '::1', 'Chrome'),
(945, '2020-12-03 05:58:52', '::1', 'Chrome'),
(946, '2020-12-05 17:44:40', '::1', 'Chrome'),
(947, '2020-12-09 13:33:55', '::1', 'Chrome'),
(948, '2020-12-10 02:08:52', '::1', 'Chrome'),
(949, '2020-12-11 05:29:21', '::1', 'Chrome'),
(950, '2020-12-12 12:07:26', '::1', 'Chrome'),
(951, '2020-12-13 02:48:49', '::1', 'Chrome'),
(952, '2020-12-21 12:40:49', '::1', 'Chrome'),
(953, '2020-12-24 04:34:00', '::1', 'Chrome'),
(954, '2020-12-25 03:52:19', '::1', 'Chrome'),
(955, '2020-12-26 14:38:20', '::1', 'Chrome'),
(956, '2020-12-26 18:03:01', '::1', 'Chrome');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sertif`
--

CREATE TABLE `tbl_sertif` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `materi` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `siswa_id` int(11) NOT NULL,
  `siswa_nis` varchar(20) DEFAULT NULL,
  `siswa_nama` varchar(70) DEFAULT NULL,
  `siswa_jenkel` varchar(2) DEFAULT NULL,
  `siswa_kelas_id` int(11) DEFAULT NULL,
  `siswa_photo` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`siswa_id`, `siswa_nis`, `siswa_nama`, `siswa_jenkel`, `siswa_kelas_id`, `siswa_photo`) VALUES
(1, '9287482', 'Alvaro Sanchez', 'L', 8, '083d547659a2d4bb15c0322d15955da5.png'),
(2, '9287483', 'Ririn Cantika', 'P', 8, '74eec6ad37550cc12fe8fa83d46878af.jpg'),
(4, '123083', 'Ari Hidayat', 'L', 1, 'e371e67618ad53c99de380782c373023.png'),
(5, '123084', 'Irma Chaiyo', 'P', 1, '1e148b42c71562841ba3018fc97b748a.png'),
(6, '123085', 'Nadila Ginting', 'P', 1, '8125da21f903803b6992214967239ab3.png'),
(7, '123086', 'Anna Marina', 'P', 1, '33eaf3e3faf28a0fe31670c022f641f1.png'),
(8, '123086', 'Dhea Lubis', 'P', 1, '03e651410e969c3c26e8e0d35380470d.png'),
(9, '123087', 'Nadia Ginting', 'P', 1, 'd7823f8d98d376c085aa284a54d63264.png'),
(10, '123088', 'Mita Febrina', 'P', 1, 'eca0280a4a57c911ee68b8318d1e517f.png'),
(11, '123089', 'Elizabeth ', 'P', 1, 'ec1232a08d650bc8c3197c9db95a7fc8.png'),
(12, '123090', 'Della Guswono', 'P', 1, '6c82fce13bb3eff1fd2e897b2c3cfeeb.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_testimoni`
--

CREATE TABLE `tbl_testimoni` (
  `testimoni_id` int(11) NOT NULL,
  `testimoni_nama` varchar(30) DEFAULT NULL,
  `testimoni_isi` varchar(120) DEFAULT NULL,
  `testimoni_email` varchar(35) DEFAULT NULL,
  `testimoni_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tulisan`
--

CREATE TABLE `tbl_tulisan` (
  `tulisan_id` int(11) NOT NULL,
  `tulisan_judul` varchar(100) DEFAULT NULL,
  `tulisan_isi` text,
  `tulisan_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `tulisan_kategori_id` int(11) DEFAULT NULL,
  `tulisan_kategori_nama` varchar(30) DEFAULT NULL,
  `tulisan_views` int(11) DEFAULT '0',
  `tulisan_gambar` varchar(40) DEFAULT NULL,
  `tulisan_pengguna_id` int(11) DEFAULT NULL,
  `tulisan_author` varchar(40) DEFAULT NULL,
  `tulisan_img_slider` int(2) NOT NULL DEFAULT '0',
  `tulisan_slug` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tulisan`
--

INSERT INTO `tbl_tulisan` (`tulisan_id`, `tulisan_judul`, `tulisan_isi`, `tulisan_tanggal`, `tulisan_kategori_id`, `tulisan_kategori_nama`, `tulisan_views`, `tulisan_gambar`, `tulisan_pengguna_id`, `tulisan_author`, `tulisan_img_slider`, `tulisan_slug`) VALUES
(28, 'Strategy of Values Education in the Indonesian Education System', '<p>Abstract</p>\r\n\r\n<p>&nbsp;The primary question of this research was how educators implement values education at Junior High Schools in Bangka Belitung Province, Indonesia. This research is a qualitative research with phenomenology type. Data analyzing technique used in this research was in-depth interviews, observation, and document analysis. Data analysis was done through data display, data reduction, and conclusion. The result showed that values education at Junior High School in Bangka Belitung started with the preparation of school vision based on values, and then the achievement of vision through the preparation of values education strategy. Habituation of values and values role model became the most dominant strategies used by principals and teachers to cultivate values. The results also showed that the values derived from religious teachings, namely the values of iman-taqwa (faith-piety) and good akhlaq (morals) were the most important values serve as a foundation in developing values education in schools. The big role of iman-taqwa (faith-piety) and good akhlaq (morals) values constitutes the effort done by the school to contribute in achieving the purposes of national education and curriculum of 2013. The final purpose of K-13 implementation and the national education system achievement is the formation of Indonesian whose strong faith and good morals.&nbsp;</p>\r\n\r\n<p>Link :&nbsp;<a href=\"https://doi.org/10.29333/iji.2019.12139a \">https://doi.org/10.29333/iji.2019.12139a&nbsp;</a></p>\r\n', '2020-12-27 11:39:45', 1, 'Pendidikan', 0, '0687b763ba483c0a246bb7d153964436.png', 6, 'Berto juni k', 0, 'strategy-of-values-education-in-the-indonesian-education-system'),
(29, 'Character Education Development Model based on Regional Culture ', '<p>Abstract</p>\r\n\r\n<p>The aim of the study was to find a culture-based character education model region in three major cities in Indonesia. The research method used is through qualitative descriptive supported by relevant literature studies and data from interviews, observation, and documentation in Surakarta City, Central Java, Denpasar, Bali, and West Jakarta. The results of this study are identification of city infrastructure that is suitable for child-based culture as; (1) the existence of artifacts containing art in accordance with the development of age children, in the city of Surakarta reaching 63%, in the city of Denpasar reaching 93%, and in the city of Jakarta West 60%; (2) The creation of a culture of being polite, friendly and ethical to each people in Surakarta city reach 77%, in Denpasar city it reaches 80%, in the city of West Jakarta reaching 73%; (3) Standard culture-based Child Friendly City, Denpasar, Bali 85%; in West Jakarta it reaches 66%; and in Surakarta city it reaches 90%. &nbsp;</p>\r\n\r\n<p>Link :&nbsp;<a href=\"https://www.jardcs.org/abstract.php?id=1193#\">https://www.jardcs.org/abstract.php?id=1193#</a></p>\r\n', '2020-12-27 11:43:06', 1, 'Pendidikan', 2, 'd1fbae2c272364782c22f843bf391814.png', 6, 'Berto juni k', 0, 'character-education-development-model-based-on-regional-culture'),
(30, 'Becoming a principal in Indonesia possibility pitfalls and potential', '<p>ABSTRACT</p>\r\n\r\n<p>The preparation and development of school leaders is now considered to be fundamental to school and system improvement. In the pursuit of educational change and reform, the leadership of the principal is deemed to be of critical importance. This qualitative study is part of a large scale research project that is exploring principal preparation and development in seven different countries. In particular, this article focuses on how public secondary school principals in Indonesia are prepared, developed and selected for their role. Disappointingly little is known from the empirical literature about being a principal in Indonesia or about principal preparation and development. Therefore this contemporary, descriptive, non-experimental qualitative study focused on a purposive sample of 18 public secondary school principals in four different provinces in Indonesia. The initial ?ndings reveal that even though principal training has been standardized in Indonesia and is now a compulsory part of a principal certi?cation process, micro-political in?uences still currently govern the appointment of school principals.</p>\r\n\r\n<p>Link :&nbsp;<a href=\"http://dx.doi.org/10.1080/02188791.2015.1056595\">http://dx.doi.org/10.1080/02188791.2015.1056595</a></p>\r\n', '2020-12-27 11:49:46', 1, 'Pendidikan', 1, '578642dc8a14c99c81e8c36b3cc5661f.png', 6, 'Berto juni k', 0, 'becoming-a-principal-in-indonesia-possibility-pitfalls-and-potential'),
(31, 'INVESTIGATING FACTORS OF DELAY IN IBS  CONSTRUCTION PROJECT: MANUFACTURER PERSPECTIVES ', '<p>Abstract</p>\r\n\r\n<p>Government of Malaysia has enthusiastically supported the implementation of Industrialized Building System (IBS) that was early introduced in 1960&rsquo;s. IBS is seen capable to ease the problem of delay that has been long haunting Malaysian construction industry. However, the issue of delay still exists even though IBS has been implemented in construction project and it is believed that there are other factors causing delay in IBS project. Thus, this paper aims to identify the factors of delay in IBS construction project through semi-structured interviews. Data on the study variables has been collected through interviews were conducted to explore the real-life construction situation in Malaysia. Factors of delay in IBS construction project are application of casting in-site by client, usage of dry mix cement, not fully implementation IBS method by clients in construction works, changes in design by client, delay in conforming the building design by client, delay in payment from client and delay of materials delivery from supplier. As an overall, results indicated that client-related factors are the most significant contributors in the delay of IBS project. The phenomena of delay in IBS construction project may require serious attention in overcoming the potential of<br />\r\ndelay factors and enhance the sustainability of IBS implementation in Malaysian construction industry.</p>\r\n\r\n<table cellpadding=\"3\">\r\n	<tbody>\r\n		<tr>\r\n			<td><a href=\"http://repo.uum.edu.my/id/eprint/26099\">http://repo.uum.edu.my/id/eprint/26099</a></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '2020-12-27 11:54:43', 1, 'Pendidikan', 2, 'a915dd092883e7554773e1841a79973c.png', 6, 'Berto juni k', 0, 'investigating-factors-of-delay-in-ibs--construction-project:-manufacturer-perspectives');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_webinar`
--

CREATE TABLE `tbl_webinar` (
  `id` varchar(10) NOT NULL,
  `nama_webinar` varchar(128) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `kuota` int(11) NOT NULL,
  `tgl_pelaksanaan` date NOT NULL,
  `tanggal2` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_webinar`
--

INSERT INTO `tbl_webinar` (`id`, `nama_webinar`, `deskripsi`, `harga`, `kuota`, `tgl_pelaksanaan`, `tanggal2`) VALUES
('cAaSI', 'Batch 16', 'asdfasd', 500000, 1000, '2021-01-05', '2021-01-23'),
('GLwoH', 'Batch 17', 'membeplajari tentang ilmu technical analysis di saham', 500000, 10, '2021-01-06', '2021-01-24'),
('ojzfG', 'Batch 18', 'belajar tentang value investing di saham', 500000, 50, '2021-01-07', '2021-01-25'),
('xWpcr', 'Batch 19', 'belajar ngoding dari 0 sampai bisa', 500000, 100, '2021-02-08', '2021-02-26');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_agenda`
--
ALTER TABLE `tbl_agenda`
  ADD PRIMARY KEY (`agenda_id`);

--
-- Indeks untuk tabel `tbl_album`
--
ALTER TABLE `tbl_album`
  ADD PRIMARY KEY (`album_id`),
  ADD KEY `album_pengguna_id` (`album_pengguna_id`);

--
-- Indeks untuk tabel `tbl_bukti_pembayaran`
--
ALTER TABLE `tbl_bukti_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_bulan`
--
ALTER TABLE `tbl_bulan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_files`
--
ALTER TABLE `tbl_files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indeks untuk tabel `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  ADD PRIMARY KEY (`galeri_id`),
  ADD KEY `galeri_album_id` (`galeri_album_id`),
  ADD KEY `galeri_pengguna_id` (`galeri_pengguna_id`);

--
-- Indeks untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`guru_id`);

--
-- Indeks untuk tabel `tbl_inbox`
--
ALTER TABLE `tbl_inbox`
  ADD PRIMARY KEY (`inbox_id`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`kelas_id`);

--
-- Indeks untuk tabel `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  ADD PRIMARY KEY (`komentar_id`),
  ADD KEY `komentar_tulisan_id` (`komentar_tulisan_id`);

--
-- Indeks untuk tabel `tbl_log_aktivitas`
--
ALTER TABLE `tbl_log_aktivitas`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `log_pengguna_id` (`log_pengguna_id`);

--
-- Indeks untuk tabel `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_menu_member`
--
ALTER TABLE `tbl_menu_member`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- Indeks untuk tabel `tbl_pengumuman`
--
ALTER TABLE `tbl_pengumuman`
  ADD PRIMARY KEY (`pengumuman_id`);

--
-- Indeks untuk tabel `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
  ADD PRIMARY KEY (`pengunjung_id`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`siswa_id`);

--
-- Indeks untuk tabel `tbl_testimoni`
--
ALTER TABLE `tbl_testimoni`
  ADD PRIMARY KEY (`testimoni_id`);

--
-- Indeks untuk tabel `tbl_tulisan`
--
ALTER TABLE `tbl_tulisan`
  ADD PRIMARY KEY (`tulisan_id`),
  ADD KEY `tulisan_kategori_id` (`tulisan_kategori_id`),
  ADD KEY `tulisan_pengguna_id` (`tulisan_pengguna_id`);

--
-- Indeks untuk tabel `tbl_webinar`
--
ALTER TABLE `tbl_webinar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_agenda`
--
ALTER TABLE `tbl_agenda`
  MODIFY `agenda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_album`
--
ALTER TABLE `tbl_album`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_bukti_pembayaran`
--
ALTER TABLE `tbl_bukti_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_bulan`
--
ALTER TABLE `tbl_bulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_files`
--
ALTER TABLE `tbl_files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  MODIFY `galeri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  MODIFY `guru_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_inbox`
--
ALTER TABLE `tbl_inbox`
  MODIFY `inbox_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `kelas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  MODIFY `komentar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_log_aktivitas`
--
ALTER TABLE `tbl_log_aktivitas`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_menu_member`
--
ALTER TABLE `tbl_menu_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengumuman`
--
ALTER TABLE `tbl_pengumuman`
  MODIFY `pengumuman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
  MODIFY `pengunjung_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=957;

--
-- AUTO_INCREMENT untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `siswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_testimoni`
--
ALTER TABLE `tbl_testimoni`
  MODIFY `testimoni_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_tulisan`
--
ALTER TABLE `tbl_tulisan`
  MODIFY `tulisan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
