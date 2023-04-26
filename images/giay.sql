-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2023 at 06:40 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dienthoaishopdb4`
--

-- --------------------------------------------------------

--
-- Table structure for table `shoes`
--

CREATE TABLE `shoes` (
  `quantity` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `hot` int(11) NOT NULL,
  `sale` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shoes`
--

INSERT INTO `shoes` (`quantity`, `id`, `hot`, `sale`, `name`, `price`, `img`) VALUES
(1, 1, 1, 24, 'CHIKKU LOAFERS', 800, 'images/s2.jpg'),
(1, 0, 0, 50, 'BELLA TOES', 675, 'images/s1.jpg'),
(1, 2, 1, 50, '(SRV) SNEAKERS', 655, 'images/s3.jpg'),
(1, 3, 0, 50, 'CHACHACHIUSA', 845, 'images/s4.jpg'),
(1, 4, 0, 50, 'FATRECSI', 645, 'images/s5.jpg'),
(1, 5, 0, 50, 'HUNNUC VOOCKA', 325, 'images/s6.jpg'),
(1, 6, 0, 50, 'BUA TOECHE', 985, 'images/s7.jpg'),
(1, 7, 0, 50, 'TOY RACK', 465, 'images/s8.jpg'),
(1, 8, 0, 50, 'KIKKUCHIN', 765, 'images/s9.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
