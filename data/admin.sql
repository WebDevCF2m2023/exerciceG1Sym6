-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 26, 2024 at 07:01 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exeg1sym6`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_IDENTIFIER_USERNAME` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `roles`, `password`) VALUES
(1, 'admin', '[\"ROLE_ADMIN\", \"ROLE_MANAGER\", \"ROLE_EDITOR\", \"ROLE_VISITOR\"]', '$2y$13$mZfHDUGCUQgL8rMADn/jM.v27.uETqhJDBVA.Zchey9MktD67hSjy'),
(2, 'manager', '[\"ROLE_MANAGER\", \"ROLE_EDITOR\", \"ROLE_VISITOR\"]', '$2y$13$mkzuOtMaW0wpjoX55QhOp.1l9pvc2Odzh6bap.2JK4JyK6sBDDrka'),
(3, 'editor', '[\"ROLE_EDITOR\", \"ROLE_VISITOR\"]', '$2y$13$DEUIa1Tn9.eE9Age0SX8hO9.bswh0xFPma0PQ0JnoAs5j3.YWbfUu'),
(4, 'visitor', '[\"ROLE_VISITOR\"]', '$2y$13$G.S.Hc2GexNNJOGEfI58nO6dVgO.Agn30AYBZGJMkAb2GzFZ8pPxO');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
