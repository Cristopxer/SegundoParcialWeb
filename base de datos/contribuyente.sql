-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2020 at 05:47 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sat`
--

-- --------------------------------------------------------

--
-- Table structure for table `contribuyente`
--

CREATE TABLE `contribuyente` (
  `NIT` int(11) NOT NULL,
  `NOMBRE` varchar(255) DEFAULT NULL,
  `DIRECCION` varchar(300) DEFAULT NULL,
  `TELEFONO` int(11) DEFAULT NULL,
  `EMAIL` varchar(250) DEFAULT NULL,
  `GENERO` char(1) DEFAULT NULL,
  `INGRESOS` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contribuyente`
--

INSERT INTO `contribuyente` (`NIT`, `NOMBRE`, `DIRECCION`, `TELEFONO`, `EMAIL`, `GENERO`, `INGRESOS`) VALUES
(9, 'KAREN', 'VENEZUELA', 345233123, 'KCAT@CATMUX.COM', 'F', '4009.32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contribuyente`
--
ALTER TABLE `contribuyente`
  ADD PRIMARY KEY (`NIT`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contribuyente`
--
ALTER TABLE `contribuyente`
  MODIFY `NIT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
