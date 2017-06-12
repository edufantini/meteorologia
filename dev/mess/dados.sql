
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 12, 2017 at 06:08 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u329776021_meteo`
--

-- --------------------------------------------------------

--
-- Table structure for table `dados`
--

CREATE TABLE IF NOT EXISTS `dados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `local` varchar(255) CHARACTER SET utf8 NOT NULL,
  `temperatura` int(11) NOT NULL,
  `umidade` int(11) NOT NULL,
  `chuva` int(11) NOT NULL,
  `sol` int(11) NOT NULL,
  `data_e` varchar(255) CHARACTER SET utf8 NOT NULL,
  `hora_e` varchar(255) CHARACTER SET utf8 NOT NULL,
  `data_n` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `dados`
--

INSERT INTO `dados` (`id`, `local`, `temperatura`, `umidade`, `chuva`, `sol`, `data_e`, `hora_e`, `data_n`) VALUES
(0, 'Medianeira', 141, 51, 3, 2, 'segunda, 15 de maio de 2017', '13:08', '1494864513');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
