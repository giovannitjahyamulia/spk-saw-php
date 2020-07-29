-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 23, 2016 at 07:41 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_raskin`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_matrik`
--

CREATE TABLE IF NOT EXISTS `tbl_matrik` (
  `id_matrik` int(11) NOT NULL AUTO_INCREMENT,
  `nik` int(11) NOT NULL,
  `kriteria1_pekerjaan` int(11) NOT NULL,
  `kriteria2_penghasilan` int(11) NOT NULL,
  `kriteria3_jenis_rumah` int(11) NOT NULL,
  PRIMARY KEY (`id_matrik`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `tbl_matrik`
--

INSERT INTO `tbl_matrik` (`id_matrik`, `nik`, `kriteria1_pekerjaan`, `kriteria2_penghasilan`, `kriteria3_jenis_rumah`) VALUES
(51, 7899332, 40, 50, 80),
(50, 5678, 50, 80, 40),
(49, 1234, 80, 80, 90),
(53, 34234, 10, 10, 40);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_warga`
--

CREATE TABLE IF NOT EXISTS `tbl_warga` (
  `nik` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(5) NOT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_warga`
--

INSERT INTO `tbl_warga` (`nik`, `nama`, `alamat`) VALUES
(7899332, 'erwin', 'mojok'),
(5678, 'gilang', 'gresi'),
(1234, 'Dwi', 'Sumen'),
(34234, 'Ibnul Jazari', 'Pamek');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('admin', 'admin123');
