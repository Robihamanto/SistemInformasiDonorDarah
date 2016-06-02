-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2016 at 02:08 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_donor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `alamat_email` varchar(100) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`, `alamat_email`, `alamat_lengkap`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'administrator@gmail.com', 'Jl. Kalpataru Gang 1 No 83 C');

-- --------------------------------------------------------

--
-- Table structure for table `golongan_darah`
--

CREATE TABLE IF NOT EXISTS `golongan_darah` (
  `id_golongan_darah` int(5) NOT NULL AUTO_INCREMENT,
  `nama_golongan_darah` varchar(10) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_golongan_darah`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `golongan_darah`
--

INSERT INTO `golongan_darah` (`id_golongan_darah`, `nama_golongan_darah`, `keterangan`) VALUES
(1, 'A', 'Golongan darah A'),
(2, 'B', 'Golongan darah B'),
(3, 'O', 'Golongan Darah O'),
(4, 'AB', 'GOlongan Darah AB');

-- --------------------------------------------------------

--
-- Table structure for table `halaman`
--

CREATE TABLE IF NOT EXISTS `halaman` (
  `id_halaman` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  PRIMARY KEY (`id_halaman`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `halaman`
--

INSERT INTO `halaman` (`id_halaman`, `judul`, `isi`) VALUES
(1, 'Selamat datang di web donor darah', '<img src="gambar/donor.jpg" width="50%" style="float:left; margin-right:10px">Donor darah adalah proses pengambilan darah dari seseorang secara sukarela untuk disimpan di bank darah untuk kemudian digunakan pada transfusi darah. \r\n\r\nUntuk menekankan pentingnya persediaan darah hasil sumbangan, Palang Merah Australia menyampaikan bahwa "80% orang Australia akan membutuhkan transfusi darah suatu saat pada hidup mereka, namun hanya 3% yang menyumbang darah setiap tahun". Menurut palang merah di Amerika Serikat, 97% orang kenal orang lain yang pernah membutuhkan transfusi darah. Dan menurut survei di Kanada, 52% orang Kanada pernah mendapatkan transfusi darah atau kenal orang yang pernah.'),
(2, 'Tentang Kami Donor Darah', 'Apakah Anda tahu bahwa manfaat donor darah ternyata bukan hanya pada penerima donor darah tersebut, tetapi pendonor juga memiliki banyak manfaat. Tidak hanya orang yang membutuhkan donor darah saja, tetapi bagi orang yang mendonorkan darahnya banyak manfaat yang diperoleh.\r\n\r\nOleh sebab itu, banyak orang yang selalu rutin mendonorkan darahnya demi menolong orang dan mendapatkan manfaat yang diperoleh. Manfaat mendonorkan darah untuk kesehatan sangat banyak, terutama jika Anda mendonorkan darah secara rutin dan berkala.\r\n\r\nSeperti yang sudah dijelaskan sebelumnya, donor darah yang dilakukan secara rutin dapat menurunkan berat badan. Manfaat donor darah untuk kecantikan ini dapat membantu Anda dalam memperoleh bentuk tubuh ideal. Bagi Anda yang ingin memiliki berat tubuh ideal dan kulit kencang, maka mendonorkan darah Anda secara rutin dapat membantu Anda mewujudkan keinginan Anda.');

-- --------------------------------------------------------

--
-- Table structure for table `hubungi_kami`
--

CREATE TABLE IF NOT EXISTS `hubungi_kami` (
  `id_hubungi_kami` int(5) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(150) NOT NULL,
  `alamat_email` varchar(150) NOT NULL,
  `isi_pesan` text NOT NULL,
  `tanggal_pesan` datetime NOT NULL,
  PRIMARY KEY (`id_hubungi_kami`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hubungi_kami`
--

INSERT INTO `hubungi_kami` (`id_hubungi_kami`, `nama_lengkap`, `alamat_email`, `isi_pesan`, `tanggal_pesan`) VALUES
(1, 'Robihamanto', 'robihamanto@hotmail.com', 'Assalamualaikum, saya sudah mendaftar sebagai pendonor, mohon unutk di cek dan konfirmasi status saya secepatnya. terima kasih,..', '2015-09-17 09:24:57');

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE IF NOT EXISTS `informasi` (
  `id_informasi` int(5) NOT NULL AUTO_INCREMENT,
  `id_admin` int(5) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id_informasi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `id_admin`, `judul`, `isi`, `tanggal`) VALUES
(1, 1, 'Aksi Donor Darah KSR UB', 'Menjalankan program rutinnya, Korps Sukarela (KSR) Universitas Brawijaya menyelenggarakan aksi donor darah. Acara ini digelar di lapangan Rektorat UB, Selasa (13/1).\r\nSalah seorang panitia, Usman Nur Fathoni mengatakan, kali ini Palang Merah Indonesia (PMI) menyediakan 40 kantong darah. Sebanyak 40 kantong ini, menurutnya, telah habis sebelum siang hari karena banyak mahasiswa yang berminat menjadi pendonor. "Kami terpaksa menolak karena kantong darah yang disediakan terbatas. Selain itu, dari screening yang dilakukan PMI, beberapa ditolak karena tidak memenuhi kriteria yang ditetapkan, yaitu berat badan, tekanan darah, dan kesehatan", ujarnya. Lebih lanjut ia memaparkan, selama ini pihaknya memfasilitasi kegiatan donor darah tiap tiga bulan sekali. "Selain donor darah, kegiatan lain yang diadakannya adalah bakti sosial, pengiriman personel dan bantuan saat bencana alam serta sebagai tim kesehatan pada saat PK2", ujarnya. "Donor darah merupakan sebuah kegiatan kemanusiaan. Setiap terjadi kecelakaan, kami selalu berupaya menghubungi para pendonor tetap", tambah mahasiswa Fakultas Peternakan angkatan 2006 ini. [nok]\r\n\r\nSumber : prasetya.ub.ac.id', '2016-05-29 09:29:59'),
(2, 1, 'Sosma BEM FP UB Adakan Donor Darah', '<img src="gambar/fpdonor.jpg" width="50%" style="float:left; margin-right:10px">Pada tanggal 24 Maret 2016, SOSMA BEM FP UB telah melakukan Share Your Blood (donor darah) yg bekerja sama dengan PMI kota Malang.\r\n\r\nTerhitung 79 peserta pendonor dengan hasil 49 kantong darah yang dapat di terima oleh PMI. Terima kasih atas yg partisipasi dalam acara SHARE YOUR BLOOD FAPERTA hearttwo hearts\r\n\r\n#DonoDarahItuSehat\r\n#YukDonorDarah\r\n\r\nKementerian Sosial Masyarakat BEM FP UB 2016 \r\n\r\nSumber bemfp.ub.ac.id', '2016-05-29 09:31:22'),
(3, 1, 'BEMTIIK Teach for Caring Others by Held DONAT 2015', 'Student Executive Board of Information Technology and Computer Science (BEMTIIK) teaches the importance of caring others through blood donation activities TIIK abbreviated DONAT on Tuesday (8/11/2015). Explained by Falih Gozi Febrinanto (IF/2014), as the Head Committee DONAT 2015 that in this time BEMTIIK in cooperation with Blood Transfusion Unit Saiful Anwar Hospital (RSSA) and FK UB Malang. RSSA then in charge to do examination of prospective donors and taking a blood donor. While the personnel of the UB Medical help provide medical check up.\r\n\r\n"So this year for the first 50 donors can conduct free medical check-ups in the form of checking blood sugar by FK UB team," Falih said.\r\nLocated at gazebo Faculty of Computer Science/FILKOM (d/h PTIIK) Brawijaya University, DONAT held from 9 am to 3 pm and was be able to attract approximately 200 registrants. However, Falih said that total participants who can actually donate their blood were 119 people. This is due to become a blood donor must fulfill several requirements include; (1) The physical and spiritual health, (2) age 17-65 years, (3) systolic blood pressure 100-180, (4) diastolic blood pressure 70 â€“ 100, (5) hemoglobin level of at least 12.5%, (6) the interval donors of at least 12 weeks or 3 months from the previous donor, and a maximum of 5 times in 1 year, (7) slept at least 4 hours prior to the donor, (8) drink more on the donor day and (9) eat 3-4 hours before donor.\r\n\r\n119 number of donors increased sharply compared to DONAT previous year. To note BEMTIIK already held similar activities since 2013. In 2013 number of donors 45 people and in 2014 were 52 people. The number of donors in line with the expanded scope of donor participants. Previously held only for students FILKOM, this time donor participants open to all UB students and public. For its consistency in organizing various activities that are innovative and useful, BEMTIIK and Student Executive Information System (EMSI) also awarded as most active BEM and Student Association (HMJ) in the event Executive Award 2015.\r\n"Hopefully the purpose of our work program of this activity can be achieved. Especially to raise social awareness among students, so they will not apathetic to the social environment," Falih said. [dna]', '2016-05-30 11:59:50');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id_informasi` int(5) NOT NULL,
  `id_komentar` int(5) NOT NULL AUTO_INCREMENT,
  `id_user_donor` int(5) NOT NULL,
  `komentar` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_komentar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_informasi`, `id_komentar`, `id_user_donor`, `komentar`, `time`) VALUES
(2, 1, 1, 'Waahh keren yah...', '2016-05-29 05:16:41'),
(2, 2, 2, 'Kemaren sempat ikutan juga nih aku hehe ', '2016-05-30 01:43:28'),
(1, 3, 2, 'Wah KSR UB keren..', '2016-05-30 01:43:58');

-- --------------------------------------------------------

--
-- Table structure for table `stok_darah`
--

CREATE TABLE IF NOT EXISTS `stok_darah` (
  `id_stok_darah` int(5) NOT NULL AUTO_INCREMENT,
  `id_user_donor` int(5) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `status` enum('masuk','keluar') NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_stok_darah`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `stok_darah`
--

INSERT INTO `stok_darah` (`id_stok_darah`, `id_user_donor`, `jumlah`, `status`, `tanggal`) VALUES
(1, 1, 2, 'masuk', '2015-09-18'),
(2, 2, 1, 'masuk', '2015-09-17'),
(3, 3, 4, 'masuk', '2015-09-18'),
(4, 4, 2, 'masuk', '2015-09-18'),
(5, 5, 1, 'keluar', '2015-09-19'),
(6, 6, 1, 'masuk', '2015-09-17'),
(8, 1, 1, 'masuk', '2016-06-01'),
(9, 1, 1, 'masuk', '2016-06-01'),
(10, 1, 2, 'keluar', '2016-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `user_donor`
--

CREATE TABLE IF NOT EXISTS `user_donor` (
  `id_user_donor` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `berat_badan` varchar(5) NOT NULL,
  `id_golongan_darah` int(5) NOT NULL,
  `riwayat_penyakit` text NOT NULL,
  `status_user` enum('aktif','nonaktif') NOT NULL DEFAULT 'nonaktif',
  `waktu` date NOT NULL,
  PRIMARY KEY (`id_user_donor`),
  KEY `id_golongan_darah` (`id_golongan_darah`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user_donor`
--

INSERT INTO `user_donor` (`id_user_donor`, `username`, `password`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `no_telpon`, `alamat_lengkap`, `berat_badan`, `id_golongan_darah`, `riwayat_penyakit`, `status_user`, `waktu`) VALUES
(1, 'robihamanto', '827ccb0eea8a706c4c34a16891f84e7b', 'Robihamanto', 'Serang', '1996-05-04', '08999668252', 'Jl. Kalpataru Gang 1', '70', 1, 'Demam Berdarah', 'aktif', '2016-05-28'),
(2, 'rizky', '827ccb0eea8a706c4c34a16891f84e7b', 'Rizky Fauzi', 'Malang', '1996-03-08', '087859991849', 'Jl. Malang', '60', 2, 'Batuk, Pilek', 'aktif', '2016-05-30'),
(3, 'andre', '827ccb0eea8a706c4c34a16891f84e7b', 'Andre Rizal Sigana', 'Medan', '1996-07-29', '08183749023', 'Jl. Sumber sari Gang 3', '80', 3, 'Cacar', 'nonaktif', '2016-05-30'),
(4, 'udin', '827ccb0eea8a706c4c34a16891f84e7b', 'Udin Sedunia', 'Malang', '1997-01-03', '0812345667', 'Jl. Sukrno Hatta', '60', 4, 'Batuk', 'aktif', '2016-06-01'),
(5, 'maria', '827ccb0eea8a706c4c34a16891f84e7b', 'Maria Nakimoto', 'Jember', '1994-01-03', '0213984732', 'Jl. Sumber Sari Gang 12', '55', 3, 'Sakit Hati', 'aktif', '2016-06-01'),
(6, 'steve', '827ccb0eea8a706c4c34a16891f84e7b', 'Seteve John', 'USA', '1990-02-01', '0354766821', 'Jl. M.T Haryono', '65', 2, 'Pusing', 'aktif', '2016-06-01'),
(7, 'Lucy', '827ccb0eea8a706c4c34a16891f84e7b', 'Lucy Ana', 'London', '1997-02-05', '0212382826', 'Jl. Ijen Nirvana', '56', 1, 'Demam', 'nonaktif', '2016-06-01'),
(8, 'Hobs', '827ccb0eea8a706c4c34a16891f84e7b', 'Hobs Nation', 'Japan', '1989-07-09', '0219343932', 'Jl. Bunga Kertas', '87', 2, 'Demam', 'aktif', '2016-06-01');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
