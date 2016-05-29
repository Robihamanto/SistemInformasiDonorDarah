-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2016 at 10:20 AM
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
-- Table structure for table `informasi`
--

CREATE TABLE IF NOT EXISTS `informasi` (
  `id_informasi` int(5) NOT NULL AUTO_INCREMENT,
  `id_admin` int(5) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id_informasi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `id_admin`, `judul`, `isi`, `tanggal`) VALUES
(1, 1, 'Aksi Donor Darah KSR UB', 'Menjalankan program rutinnya, Korps Sukarela (KSR) Universitas Brawijaya menyelenggarakan aksi donor darah. Acara ini digelar di lapangan Rektorat UB, Selasa (13/1).\r\nSalah seorang panitia, Usman Nur Fathoni mengatakan, kali ini Palang Merah Indonesia (PMI) menyediakan 40 kantong darah. Sebanyak 40 kantong ini, menurutnya, telah habis sebelum siang hari karena banyak mahasiswa yang berminat menjadi pendonor. "Kami terpaksa menolak karena kantong darah yang disediakan terbatas. Selain itu, dari screening yang dilakukan PMI, beberapa ditolak karena tidak memenuhi kriteria yang ditetapkan, yaitu berat badan, tekanan darah, dan kesehatan", ujarnya. Lebih lanjut ia memaparkan, selama ini pihaknya memfasilitasi kegiatan donor darah tiap tiga bulan sekali. "Selain donor darah, kegiatan lain yang diadakannya adalah bakti sosial, pengiriman personel dan bantuan saat bencana alam serta sebagai tim kesehatan pada saat PK2", ujarnya. "Donor darah merupakan sebuah kegiatan kemanusiaan. Setiap terjadi kecelakaan, kami selalu berupaya menghubungi para pendonor tetap", tambah mahasiswa Fakultas Peternakan angkatan 2006 ini. [nok]\r\n\r\nSumber : prasetya.ub.ac.id', '2016-05-29 09:29:59'),
(2, 1, 'Sosma BEM FP UB Adakan Donor Darah', '<img src="gambar/fpdonor.jpg" width="50%" style="float:left; margin-right:10px">Pada tanggal 24 Maret 2016, SOSMA BEM FP UB telah melakukan Share Your Blood (donor darah) yg bekerja sama dengan PMI kota Malang.\r\n\r\nTerhitung 79 peserta pendonor dengan hasil 49 kantong darah yang dapat di terima oleh PMI. Terima kasih atas yg partisipasi dalam acara SHARE YOUR BLOOD FAPERTA hearttwo hearts\r\n\r\n#DonoDarahItuSehat\r\n#YukDonorDarah\r\n\r\nKementerian Sosial Masyarakat BEM FP UB 2016 \r\n\r\nSumber bemfp.ub.ac.id', '2016-05-29 09:31:22');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
