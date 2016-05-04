-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2016 at 01:29 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mediasosial`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_timeline`
--

CREATE TABLE IF NOT EXISTS `tb_timeline` (
  `id_timeline` int(11) NOT NULL AUTO_INCREMENT,
  `no_user` int(11) NOT NULL,
  `status` text NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_timeline`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_timeline`
--

INSERT INTO `tb_timeline` (`id_timeline`, `no_user`, `status`, `tanggal`) VALUES
(1, 1, 'Aku pasti sukses', '2016-04-19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `no_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `sandi` varchar(40) NOT NULL,
  `jurusan` text NOT NULL,
  `hp` text NOT NULL,
  `alamat` text NOT NULL,
  `tentang` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`no_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`no_user`, `nama`, `email`, `sandi`, `jurusan`, `hp`, `alamat`, `tentang`, `foto`) VALUES
(1, 'Candra Kirana', 'kiranapedia@gmail.com', '202cb962ac59075b964b07152d234b70', 'Teknik Informatika B', '087', 'Penjalinan', 'Aku Bisa', 'S5001990.JPG'),
(11, 'MAS YUDHA ', 'yudha@gmail.com', '202cb962ac59075b964b07152d234b70', 'Teknik Informatika A', '2121212', 'zxzxzx', 'aku ydah edit 1', 'S5001989.JPG'),
(12, 'AMI', 'ami@y.com', '202cb962ac59075b964b07152d234b70', 'PLS', '', 'sasa', 'jaja', '22.jpg'),
(13, 'Esti Novi', 'esti@gmail.com', '202cb962ac59075b964b07152d234b70', 'Teknik Informatika B', '', 'Jombang', 'Esti jago organisasi', 'S5001988.JPG'),
(14, 'ANI', 'ani@gmail.com', '202cb962ac59075b964b07152d234b70', 'fti', '092', 'KAPAS', 'AYU', 'TIKET.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
