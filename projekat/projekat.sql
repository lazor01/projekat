-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 27, 2023 at 11:03 PM
-- Server version: 5.7.40
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekat`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
CREATE TABLE IF NOT EXISTS `administrator` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` varchar(20) DEFAULT 'Admin',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'Lazar', 'markovic@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `notifikacije`
--

DROP TABLE IF EXISTS `notifikacije`;
CREATE TABLE IF NOT EXISTS `notifikacije` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `od_email` varchar(40) NOT NULL,
  `za_email` varchar(40) NOT NULL,
  `opis` varchar(100) NOT NULL,
  `prijava_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `poslovi`
--

DROP TABLE IF EXISTS `poslovi`;
CREATE TABLE IF NOT EXISTS `poslovi` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `ime_posla` varchar(40) NOT NULL,
  `oblast_rada` varchar(40) NOT NULL,
  `poslodavac` varchar(40) NOT NULL,
  `email_poslodavca` varchar(40) NOT NULL,
  `grad` varchar(40) NOT NULL,
  `vreme_objave` date NOT NULL,
  `opis` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poslovi`
--

INSERT INTO `poslovi` (`id`, `ime_posla`, `oblast_rada`, `poslodavac`, `email_poslodavca`, `grad`, `vreme_objave`, `opis`) VALUES
(3, 'Pevac', 'Zabava', 'Jugoslavija', 'marko@gmail.com', 'Kragujevac', '2023-01-26', 'Pevac u kragujevcu lmao'),
(5, 'Rostiljdzija', 'Kuvar', 'Mljacko', 'goran@gmail.com', 'Kragujevac', '2023-01-26', 'Rostilj majstor u kragujevcu lmao');

-- --------------------------------------------------------

--
-- Table structure for table `radnici`
--

DROP TABLE IF EXISTS `radnici`;
CREATE TABLE IF NOT EXISTS `radnici` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `ime_radnika` varchar(40) NOT NULL,
  `prezime_radnika` varchar(40) NOT NULL,
  `email_radnika` varchar(40) NOT NULL,
  `datum_rodjenja` date NOT NULL,
  `mesto_rodjenja` varchar(40) NOT NULL,
  `struka` varchar(80) NOT NULL,
  `cv` mediumblob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `radnici`
--

INSERT INTO `radnici` (`id`, `ime_radnika`, `prezime_radnika`, `email_radnika`, `datum_rodjenja`, `mesto_rodjenja`, `struka`, `cv`) VALUES
(1, 'Jovan', 'Duric', 'jovan24@gmail.com', '1985-05-21', 'Kragujevac', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', ''),
(2, 'Marko', 'Kostic', 'markobg@gmail.com', '1974-08-15', 'Beograd', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', ''),
(4, 'Zivorad', 'Radakovic', 'zilerad23@gmail.com', '1955-07-17', 'Nis', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', ''),
(5, 'Milena', 'Lepomirovic', 'mileena2020@gmail.com', '1965-02-01', 'Novi sad', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ime` varchar(25) NOT NULL,
  `prezime` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'Korisnik',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
