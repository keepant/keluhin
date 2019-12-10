-- phpMyAdmin SQL Dump
-- version 4.0.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2019 at 03:37 PM
-- Server version: 5.5.56-MariaDB
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zadmin_m3117063`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `nama`, `email`, `password`) VALUES
('keepant', 'Irfan Dwi Prasetyo', 'keepant@gmail.com', 'orazonme');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nidn` varchar(30) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nidn`, `nip`, `nama_dosen`) VALUES
(1, '13048101', '198104132005011000', 'ABDUL AZIZ S.Kom., M.Cs.'),
(2, '629088001', '1980082920130200', 'AGUS PURBAYU S.Si.,M.Kom'),
(3, '9900009675', '1985030720160600', 'AGUS PURNOMO S.Si., M.Eng'),
(4, '621038101', '1981032120130200', 'BERLIANA KUSUMA RIASTI S.T.,M.Eng.'),
(5, '26098406', '1984092620160900', 'FENDI AJI PURNOMO S.SI., M.ENG'),
(6, '601028502', '1985020120130200', 'FIRMA SAHRUL BAHTIAR S.Kom, M.Eng.'),
(7, '703057802', '1978050320130200', 'HARTATIK. S.Si., M.Si.'),
(8, '-', '1981110320180600', 'Muhammad Asri Safi''ie S.Si., M.Kom.'),
(9, '8876040017', '1981071420160600', 'NANANG MAULANA YOESEPH S.Si., M.Cs'),
(10, '603058601', '1986050320130200', 'OVIDE DECROLY WISNU ARDHI S.T., M.Eng'),
(11, '15028704', '1987021520170100', 'Sahirul Alim Tri Bawono S.Kom., M.Eng.'),
(12, '9906008058', '1984122620160600', 'RUDI HARTONO S.Si., M.Eng'),
(13, '-', '1982052220180600', 'Taufiqurrakhman Nur Hidayat S.Kom., M.Cs.'),
(14, '-', '1979060520180600', 'Yudho Yudhanto S.Kom.,M.Kom.');

-- --------------------------------------------------------

--
-- Table structure for table `keluhan`
--

CREATE TABLE IF NOT EXISTS `keluhan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(15) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `sasaran` varchar(30) NOT NULL,
  `keluhan` text NOT NULL,
  `saran` text NOT NULL,
  `tanggal` varchar(12) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `keluhan`
--

INSERT INTO `keluhan` (`id`, `nim`, `kategori`, `sasaran`, `keluhan`, `saran`, `tanggal`, `status`) VALUES
(1, 'M3117052', 'Lab. Komputasi', 'Lab. Multimedia', 'PC dibuat maen gim', 'gunakan kembali deepfreez', '09 Jan 2019', 'Selesai'),
(2, 'M3117069', 'Lab. Komputasi', 'Lab. Multimedia', 'komputernya cepat panas kalau dipake main pubg adi nge lag', 'di perbaiki dong', '11 Jan 2019', 'Ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `angkatan` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `kelas`, `angkatan`, `email`, `password`) VALUES
(1, 'M3117052', 'Irfan Dwi Prasetyo', 'TI C', 2017, 'keepant@gmail.com', 'orazonme'),
(2, 'M3117069', 'Nadia', 'TIC', 2018, 'Namali912@uns.ac.id', 'nadia');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
