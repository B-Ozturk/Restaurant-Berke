-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 22 sep 2022 om 14:24
-- Serverversie: 10.3.34-MariaDB-0+deb10u1
-- PHP-versie: 7.3.33-4+0~20220627.98+debian10~1.gbp40b3e4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berke_phplessen`
--
CREATE DATABASE IF NOT EXISTS `berke_phplessen` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `berke_phplessen`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestelling`
--

CREATE TABLE `bestelling` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adres` varchar(255) NOT NULL,
  `bestelling` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `user_id` int(11) NOT NULL,
  `orderDate` date NOT NULL DEFAULT current_timestamp(),
  `orderTime` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `bestelling`
--

INSERT INTO `bestelling` (`id`, `name`, `email`, `adres`, `bestelling`, `user_id`, `orderDate`, `orderTime`) VALUES
(1, 'Kaan', 'Kaan@email.com', 'test straat niet covid', 'Array', 2, '2022-09-19', '14:41:35'),
(2, 'Kaan', 'Kaan@email.com', 'test straat niet covid', 'a:1:{i:0;a:4:{s:7:\"item_id\";s:1:\"1\";s:9:\"item_name\";s:10:\"Linzensoep\";s:10:\"item_price\";s:4:\"6.00\";s:13:\"item_quantity\";s:1:\"1\";}}', 2, '2022-09-19', '14:41:35'),
(3, 'Berke38', 'Berke38@email.com', 'test straat niet covid', 'a:1:{i:0;a:4:{s:7:\"item_id\";s:1:\"8\";s:9:\"item_name\";s:14:\"Döner schotel\";s:10:\"item_price\";s:5:\"12.00\";s:13:\"item_quantity\";s:1:\"1\";}}', 3, '2022-09-19', '14:41:35'),
(4, 'Kaan', 'Kaan@email.com', 'test straat niet covid', 'a:1:{i:0;a:4:{s:7:\"item_id\";s:2:\"28\";s:9:\"item_name\";s:4:\"Thee\";s:10:\"item_price\";s:4:\"1.50\";s:13:\"item_quantity\";s:1:\"1\";}}', 2, '2022-09-19', '14:41:35'),
(5, 'Kaan', 'Kaan@email.com', 'test straat niet covid', 'a:2:{i:0;a:4:{s:7:\"item_id\";s:2:\"28\";s:9:\"item_name\";s:4:\"Thee\";s:10:\"item_price\";s:4:\"1.50\";s:13:\"item_quantity\";s:1:\"1\";}i:1;a:4:{s:7:\"item_id\";s:1:\"2\";s:9:\"item_name\";s:11:\"Yoghurtsoep\";s:10:\"item_price\";s:4:\"6.00\";s:13:\"item_quantity\";s:1:\"1\";}}', 2, '2022-09-19', '14:41:35'),
(6, 'Kaan', 'Kaan@email.com', 'test straat niet covid', 'a:2:{i:0;a:4:{s:7:\"item_id\";s:2:\"28\";s:9:\"item_name\";s:4:\"Thee\";s:10:\"item_price\";s:4:\"1.50\";s:13:\"item_quantity\";s:1:\"1\";}i:1;a:4:{s:7:\"item_id\";s:1:\"2\";s:9:\"item_name\";s:11:\"Yoghurtsoep\";s:10:\"item_price\";s:4:\"6.00\";s:13:\"item_quantity\";s:1:\"1\";}}', 2, '2022-09-19', '14:41:35'),
(7, 'Kaan', 'Kaan@email.com', 'test straat niet covid', 'a:6:{i:0;a:4:{s:7:\"item_id\";s:2:\"28\";s:9:\"item_name\";s:4:\"Thee\";s:10:\"item_price\";s:4:\"1.50\";s:13:\"item_quantity\";s:1:\"1\";}i:1;a:4:{s:7:\"item_id\";s:1:\"2\";s:9:\"item_name\";s:11:\"Yoghurtsoep\";s:10:\"item_price\";s:4:\"6.00\";s:13:\"item_quantity\";s:1:\"1\";}i:2;a:4:{s:7:\"item_id\";s:2:\"11\";s:9:\"item_name\";s:7:\"Künefe\";s:10:\"item_price\";s:4:\"6.00\";s:13:\"item_quantity\";s:1:\"1\";}i:3;a:4:{s:7:\"item_id\";s:1:\"3\";s:9:\"item_name\";s:10:\"Kippensoep\";s:10:\"item_price\";s:4:\"6.00\";s:13:\"item_quantity\";s:1:\"1\";}i:4;a:4:{s:7:\"item_id\";s:1:\"1\";s:9:\"item_name\";s:10:\"Linzensoep\";s:10:\"item_price\";s:4:\"6.00\";s:13:\"item_quantity\";s:1:\"1\";}i:5;a:4:{s:7:\"item_id\";s:2:\"12\";s:9:\"item_name\";s:9:\"Sekerpare\";s:10:\"item_price\";s:4:\"5.00\";s:13:\"item_quantity\";s:2:\"12\";}}', 2, '2022-09-19', '14:41:35'),
(8, 'Kaan', 'Kaan@email.com', 'test straat niet covid', 'a:7:{i:0;a:4:{s:7:\"item_id\";s:2:\"28\";s:9:\"item_name\";s:4:\"Thee\";s:10:\"item_price\";s:4:\"1.50\";s:13:\"item_quantity\";s:1:\"4\";}i:1;a:4:{s:7:\"item_id\";s:1:\"1\";s:9:\"item_name\";s:10:\"Linzensoep\";s:10:\"item_price\";s:4:\"6.00\";s:13:\"item_quantity\";s:1:\"4\";}i:2;a:4:{s:7:\"item_id\";s:1:\"6\";s:9:\"item_name\";s:11:\"Adana kebab\";s:10:\"item_price\";s:5:\"12.00\";s:13:\"item_quantity\";s:1:\"1\";}i:3;a:4:{s:7:\"item_id\";s:1:\"8\";s:9:\"item_name\";s:14:\"Döner schotel\";s:10:\"item_price\";s:5:\"12.00\";s:13:\"item_quantity\";s:1:\"1\";}i:4;a:4:{s:7:\"item_id\";s:1:\"7\";s:9:\"item_name\";s:9:\"Mix grill\";s:10:\"item_price\";s:5:\"20.00\";s:13:\"item_quantity\";s:1:\"1\";}i:5;a:4:{s:7:\"item_id\";s:2:\"21\";s:9:\"item_name\";s:5:\"Manti\";s:10:\"item_price\";s:5:\"12.00\";s:13:\"item_quantity\";s:1:\"1\";}i:6;a:4:{s:7:\"item_id\";s:2:\"11\";s:9:\"item_name\";s:7:\"Künefe\";s:10:\"item_price\";s:4:\"6.00\";s:13:\"item_quantity\";s:1:\"4\";}}', 2, '2022-09-19', '14:41:35'),
(9, 'Kaan', 'Kaan@email.com', 'test straat niet covid', 'a:7:{i:0;a:4:{s:7:\"item_id\";s:2:\"28\";s:9:\"item_name\";s:4:\"Thee\";s:10:\"item_price\";s:4:\"1.50\";s:13:\"item_quantity\";s:1:\"4\";}i:1;a:4:{s:7:\"item_id\";s:1:\"1\";s:9:\"item_name\";s:10:\"Linzensoep\";s:10:\"item_price\";s:4:\"6.00\";s:13:\"item_quantity\";s:1:\"4\";}i:2;a:4:{s:7:\"item_id\";s:1:\"6\";s:9:\"item_name\";s:11:\"Adana kebab\";s:10:\"item_price\";s:5:\"12.00\";s:13:\"item_quantity\";s:1:\"1\";}i:3;a:4:{s:7:\"item_id\";s:1:\"8\";s:9:\"item_name\";s:14:\"Döner schotel\";s:10:\"item_price\";s:5:\"12.00\";s:13:\"item_quantity\";s:1:\"1\";}i:4;a:4:{s:7:\"item_id\";s:1:\"7\";s:9:\"item_name\";s:9:\"Mix grill\";s:10:\"item_price\";s:5:\"20.00\";s:13:\"item_quantity\";s:1:\"1\";}i:5;a:4:{s:7:\"item_id\";s:2:\"21\";s:9:\"item_name\";s:5:\"Manti\";s:10:\"item_price\";s:5:\"12.00\";s:13:\"item_quantity\";s:1:\"1\";}i:6;a:4:{s:7:\"item_id\";s:2:\"11\";s:9:\"item_name\";s:7:\"Künefe\";s:10:\"item_price\";s:4:\"6.00\";s:13:\"item_quantity\";s:1:\"4\";}}', 2, '2022-09-19', '14:41:35'),
(10, 'Berke38', 'Berke38@email.com', 'test-straat niet covid', 'a:1:{i:0;a:4:{s:7:\"item_id\";s:1:\"1\";s:9:\"item_name\";s:10:\"Linzensoep\";s:10:\"item_price\";s:4:\"6.00\";s:13:\"item_quantity\";s:1:\"4\";}}', 3, '2022-09-19', '14:41:35'),
(11, 'Berke38', 'Berke38@email.com', 'test-straat niet covid', 'a:5:{i:0;a:4:{s:7:\"item_id\";s:1:\"1\";s:9:\"item_name\";s:10:\"Linzensoep\";s:10:\"item_price\";s:4:\"6.00\";s:13:\"item_quantity\";s:1:\"4\";}i:1;a:4:{s:7:\"item_id\";s:1:\"7\";s:9:\"item_name\";s:9:\"Mix grill\";s:10:\"item_price\";s:5:\"20.00\";s:13:\"item_quantity\";s:1:\"4\";}i:2;a:4:{s:7:\"item_id\";s:2:\"11\";s:9:\"item_name\";s:7:\"Künefe\";s:10:\"item_price\";s:4:\"6.00\";s:13:\"item_quantity\";s:1:\"4\";}i:3;a:4:{s:7:\"item_id\";s:2:\"16\";s:9:\"item_name\";s:3:\"Spa\";s:10:\"item_price\";s:4:\"2.00\";s:13:\"item_quantity\";s:1:\"4\";}i:4;a:4:{s:7:\"item_id\";s:2:\"28\";s:9:\"item_name\";s:4:\"Thee\";s:10:\"item_price\";s:4:\"1.50\";s:13:\"item_quantity\";s:1:\"4\";}}', 3, '2022-09-19', '14:41:35'),
(12, 'Kirrow', 'Kirrow@email.com', 'test-straat niet covid', 'a:20:{i:0;a:4:{s:7:\"item_id\";s:2:\"28\";s:9:\"item_name\";s:4:\"Thee\";s:10:\"item_price\";s:4:\"1.50\";s:13:\"item_quantity\";s:1:\"1\";}i:1;a:4:{s:7:\"item_id\";s:1:\"2\";s:9:\"item_name\";s:11:\"Yoghurtsoep\";s:10:\"item_price\";s:4:\"6.00\";s:13:\"item_quantity\";s:1:\"1\";}i:2;a:4:{s:7:\"item_id\";s:1:\"3\";s:9:\"item_name\";s:10:\"Kippensoep\";s:10:\"item_price\";s:4:\"6.00\";s:13:\"item_quantity\";s:1:\"1\";}i:3;a:4:{s:7:\"item_id\";s:1:\"1\";s:9:\"item_name\";s:10:\"Linzensoep\";s:10:\"item_price\";s:4:\"6.00\";s:13:\"item_quantity\";s:1:\"1\";}i:4;a:4:{s:7:\"item_id\";s:1:\"4\";s:9:\"item_name\";s:15:\"Koppenvleessoep\";s:10:\"item_price\";s:4:\"7.00\";s:13:\"item_quantity\";s:1:\"1\";}i:5;a:4:{s:7:\"item_id\";s:2:\"23\";s:9:\"item_name\";s:13:\"Aardappelsoep\";s:10:\"item_price\";s:4:\"6.00\";s:13:\"item_quantity\";s:1:\"1\";}i:6;a:4:{s:7:\"item_id\";s:1:\"5\";s:9:\"item_name\";s:13:\"Lams shaslick\";s:10:\"item_price\";s:5:\"16.00\";s:13:\"item_quantity\";s:1:\"1\";}i:7;a:4:{s:7:\"item_id\";s:1:\"6\";s:9:\"item_name\";s:11:\"Adana kebab\";s:10:\"item_price\";s:5:\"12.00\";s:13:\"item_quantity\";s:1:\"1\";}i:8;a:4:{s:7:\"item_id\";s:1:\"7\";s:9:\"item_name\";s:9:\"Mix grill\";s:10:\"item_price\";s:5:\"20.00\";s:13:\"item_quantity\";s:1:\"1\";}i:9;a:4:{s:7:\"item_id\";s:1:\"8\";s:9:\"item_name\";s:14:\"Döner schotel\";s:10:\"item_price\";s:5:\"12.00\";s:13:\"item_quantity\";s:1:\"1\";}i:10;a:4:{s:7:\"item_id\";s:2:\"10\";s:9:\"item_name\";s:8:\"Rijstpap\";s:10:\"item_price\";s:4:\"5.00\";s:13:\"item_quantity\";s:1:\"1\";}i:11;a:4:{s:7:\"item_id\";s:1:\"9\";s:9:\"item_name\";s:7:\"Baklava\";s:10:\"item_price\";s:4:\"5.00\";s:13:\"item_quantity\";s:1:\"1\";}i:12;a:4:{s:7:\"item_id\";s:2:\"21\";s:9:\"item_name\";s:5:\"Manti\";s:10:\"item_price\";s:5:\"12.00\";s:13:\"item_quantity\";s:1:\"1\";}i:13;a:4:{s:7:\"item_id\";s:2:\"11\";s:9:\"item_name\";s:7:\"Künefe\";s:10:\"item_price\";s:4:\"6.00\";s:13:\"item_quantity\";s:1:\"1\";}i:14;a:4:{s:7:\"item_id\";s:2:\"12\";s:9:\"item_name\";s:9:\"Sekerpare\";s:10:\"item_price\";s:4:\"5.00\";s:13:\"item_quantity\";s:1:\"1\";}i:15;a:4:{s:7:\"item_id\";s:2:\"24\";s:9:\"item_name\";s:9:\"Volvo V40\";s:10:\"item_price\";s:5:\"50.00\";s:13:\"item_quantity\";s:1:\"1\";}i:16;a:4:{s:7:\"item_id\";s:2:\"13\";s:9:\"item_name\";s:5:\"Ayran\";s:10:\"item_price\";s:4:\"2.00\";s:13:\"item_quantity\";s:1:\"1\";}i:17;a:4:{s:7:\"item_id\";s:2:\"14\";s:9:\"item_name\";s:3:\"AA \";s:10:\"item_price\";s:4:\"2.00\";s:13:\"item_quantity\";s:1:\"1\";}i:18;a:4:{s:7:\"item_id\";s:2:\"15\";s:9:\"item_name\";s:4:\"Cola\";s:10:\"item_price\";s:4:\"2.00\";s:13:\"item_quantity\";s:1:\"1\";}i:19;a:4:{s:7:\"item_id\";s:2:\"16\";s:9:\"item_name\";s:3:\"Spa\";s:10:\"item_price\";s:4:\"2.00\";s:13:\"item_quantity\";s:1:\"1\";}}', 11, '2022-09-19', '14:41:35'),
(13, 'Kaan', 'Kaan@email.com', 'test-straat niet covid', 'a:1:{i:0;a:4:{s:7:\"item_id\";s:2:\"28\";s:9:\"item_name\";s:4:\"Thee\";s:10:\"item_price\";s:4:\"1.50\";s:13:\"item_quantity\";s:1:\"1\";}}', 2, '2022-09-20', '14:41:35'),
(14, 'Hajar', 'H@email.com', 'test-straat niet covid', 'a:2:{i:0;a:4:{s:7:\"item_id\";s:2:\"11\";s:9:\"item_name\";s:7:\"Künefe\";s:10:\"item_price\";s:4:\"6.00\";s:13:\"item_quantity\";s:1:\"2\";}i:1;a:4:{s:7:\"item_id\";s:2:\"28\";s:9:\"item_name\";s:4:\"Thee\";s:10:\"item_price\";s:4:\"1.50\";s:13:\"item_quantity\";s:1:\"2\";}}', 15, '2022-09-20', '14:41:35'),
(24, 'Hajar', 'H@email.com', 'test-straat niet covid', 'a:2:{i:0;a:4:{s:7:\"item_id\";s:2:\"28\";s:9:\"item_name\";s:4:\"Thee\";s:10:\"item_price\";s:4:\"1.50\";s:13:\"item_quantity\";s:1:\"1\";}i:1;a:4:{s:7:\"item_id\";s:2:\"15\";s:9:\"item_name\";s:4:\"Cola\";s:10:\"item_price\";s:4:\"2.00\";s:13:\"item_quantity\";s:1:\"1\";}}', 15, '2022-09-20', '14:41:35'),
(25, 'Bossser', 'Bossser@email.com', 'test-straat niet covid', 'a:1:{i:0;a:4:{s:7:\"item_id\";s:1:\"1\";s:9:\"item_name\";s:10:\"Linzensoep\";s:10:\"item_price\";s:4:\"6.00\";s:13:\"item_quantity\";s:1:\"1\";}}', 93, '2022-09-20', '14:43:24'),
(26, 'Kirrow', 'Kirrow@email.com', 'test-straat niet covid', 'a:1:{i:0;a:4:{s:7:\"item_id\";s:1:\"1\";s:9:\"item_name\";s:10:\"Linzensoep\";s:10:\"item_price\";s:4:\"6.00\";s:13:\"item_quantity\";s:1:\"4\";}}', 11, '2022-09-21', '09:35:25'),
(27, 'Kirrow', 'Kirrow@email.com', 'test-straat niet covid', 'a:1:{i:0;a:4:{s:7:\"item_id\";s:2:\"23\";s:9:\"item_name\";s:13:\"Aardappelsoep\";s:10:\"item_price\";s:4:\"6.00\";s:13:\"item_quantity\";s:1:\"1\";}}', 11, '2022-09-21', '13:37:55'),
(28, 'Kaan', 'Kaan@email.com', 'test-straat niet covid', 'a:1:{i:0;a:4:{s:7:\"item_id\";s:1:\"1\";s:9:\"item_name\";s:10:\"Linzensoep\";s:10:\"item_price\";s:4:\"6.00\";s:13:\"item_quantity\";s:1:\"1\";}}', 2, '2022-09-21', '15:48:22'),
(29, 'Kaan', 'Kaan@email.com', 'test-straat niet covid', 'a:3:{i:0;a:4:{s:7:\"item_id\";s:1:\"2\";s:9:\"item_name\";s:11:\"Yoghurtsoep\";s:10:\"item_price\";s:4:\"6.00\";s:13:\"item_quantity\";s:1:\"1\";}i:1;a:4:{s:7:\"item_id\";s:1:\"3\";s:9:\"item_name\";s:10:\"Kippensoep\";s:10:\"item_price\";s:4:\"6.00\";s:13:\"item_quantity\";s:1:\"1\";}i:2;a:4:{s:7:\"item_id\";s:1:\"1\";s:9:\"item_name\";s:10:\"Linzensoep\";s:10:\"item_price\";s:4:\"6.00\";s:13:\"item_quantity\";s:1:\"1\";}}', 2, '2022-09-21', '15:53:31'),
(30, 'test', 'test@email.com', 'test-straat niet covid', 'a:11:{i:0;a:4:{s:7:\"item_id\";s:2:\"23\";s:9:\"item_name\";s:13:\"Aardappelsoep\";s:10:\"item_price\";s:4:\"6.00\";s:13:\"item_quantity\";s:1:\"1\";}i:1;a:4:{s:7:\"item_id\";s:1:\"3\";s:9:\"item_name\";s:10:\"Kippensoep\";s:10:\"item_price\";s:4:\"6.00\";s:13:\"item_quantity\";s:1:\"1\";}i:2;a:4:{s:7:\"item_id\";s:1:\"2\";s:9:\"item_name\";s:11:\"Yoghurtsoep\";s:10:\"item_price\";s:4:\"6.00\";s:13:\"item_quantity\";s:1:\"1\";}i:3;a:4:{s:7:\"item_id\";s:1:\"1\";s:9:\"item_name\";s:10:\"Linzensoep\";s:10:\"item_price\";s:4:\"6.00\";s:13:\"item_quantity\";s:1:\"1\";}i:4;a:4:{s:7:\"item_id\";s:1:\"8\";s:9:\"item_name\";s:14:\"Döner schotel\";s:10:\"item_price\";s:5:\"12.00\";s:13:\"item_quantity\";s:1:\"1\";}i:5;a:4:{s:7:\"item_id\";s:1:\"7\";s:9:\"item_name\";s:9:\"Mix grill\";s:10:\"item_price\";s:5:\"20.00\";s:13:\"item_quantity\";s:1:\"1\";}i:6;a:4:{s:7:\"item_id\";s:1:\"5\";s:9:\"item_name\";s:13:\"Lams shaslick\";s:10:\"item_price\";s:5:\"16.00\";s:13:\"item_quantity\";s:1:\"1\";}i:7;a:4:{s:7:\"item_id\";s:2:\"10\";s:9:\"item_name\";s:8:\"Rijstpap\";s:10:\"item_price\";s:4:\"5.00\";s:13:\"item_quantity\";s:1:\"1\";}i:8;a:4:{s:7:\"item_id\";s:2:\"11\";s:9:\"item_name\";s:7:\"Künefe\";s:10:\"item_price\";s:4:\"6.00\";s:13:\"item_quantity\";s:1:\"3\";}i:9;a:4:{s:7:\"item_id\";s:2:\"16\";s:9:\"item_name\";s:3:\"Spa\";s:10:\"item_price\";s:4:\"2.00\";s:13:\"item_quantity\";s:1:\"4\";}i:10;a:4:{s:7:\"item_id\";s:2:\"28\";s:9:\"item_name\";s:4:\"Thee\";s:10:\"item_price\";s:4:\"1.50\";s:13:\"item_quantity\";s:1:\"4\";}}', 96, '2022-09-21', '16:39:23'),
(31, 'Kaan', 'Kaan@email.com', 'test-straat niet covid', 'a:1:{i:0;a:4:{s:7:\"item_id\";s:2:\"28\";s:9:\"item_name\";s:4:\"Thee\";s:10:\"item_price\";s:4:\"1.50\";s:13:\"item_quantity\";s:1:\"1\";}}', 2, '2022-09-22', '10:23:22'),
(32, 'Kaan', 'Kaan@email.com', 'test-straat niet covid', 'a:1:{i:0;a:4:{s:7:\"item_id\";s:2:\"14\";s:9:\"item_name\";s:3:\"AA \";s:10:\"item_price\";s:4:\"2.00\";s:13:\"item_quantity\";s:1:\"1\";}}', 2, '2022-09-22', '10:25:38'),
(33, 'Badr', 'Badrkhaie@Hotmail.com', 'test-straat niet covid', 'a:1:{i:0;a:4:{s:7:\"item_id\";s:1:\"8\";s:9:\"item_name\";s:14:\"Döner schotel\";s:10:\"item_price\";s:5:\"12.00\";s:13:\"item_quantity\";s:1:\"1\";}}', 97, '2022-09-22', '11:28:22'),
(34, 'Kirrow', 'Kirrow@email.com', '', 'a:1:{i:0;a:4:{s:7:\"item_id\";s:1:\"4\";s:9:\"item_name\";s:15:\"Koppenvleessoep\";s:10:\"item_price\";s:4:\"7.00\";s:13:\"item_quantity\";s:1:\"1\";}}', 11, '2022-09-22', '14:09:01');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `picture`) VALUES
(1, 'Soepen', 'soepen.png'),
(2, 'Hoofdgerechten', 'hoofdgerechten.png'),
(3, 'Nagerechten', 'nagerechten.png'),
(4, 'Drinken', 'drinken.png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(6,2) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `menu`
--

INSERT INTO `menu` (`id`, `name`, `description`, `price`, `picture`, `category_id`) VALUES
(1, 'Linzensoep', 'Meeste bekende soep van Turkije', '6.00', 's1.png', 1),
(2, 'Yoghurtsoep', 'Een soep die je een boost geeft', '6.00', 's2.png', 1),
(3, 'Kippensoep', 'Je to go soep voor in de winter', '6.00', 's3.png', 1),
(4, 'Koppenvleessoep', 'Sterke soep met sterke kruiden', '7.00', 's4.png', 1),
(5, 'Lams shaslick', 'Lekkere gegrilde lams vlees', '16.00', 'h1.png', 2),
(6, 'Adana kebab', 'Pittig gehakt aan spies', '12.00', 'h2.png', 2),
(7, 'Mix grill', 'Mix van gegrild vlees', '20.00', 'h3.png', 2),
(8, 'Döner schotel', 'Döner met patat of rijst', '12.00', 'h4.png', 2),
(9, 'Baklava', '4 stuks Baklava', '5.00', 'n1.png', 3),
(10, 'Rijstpap', 'Lekkere koude rijstpap', '5.00', 'n2.png', 3),
(11, 'Künefe', 'Ovenheerlijke zoete toetje', '6.00', 'n3.png', 3),
(12, 'Sekerpare', 'Zoete koekjes', '5.00', 'n4.png', 3),
(13, 'Ayran', '', '2.00', 'd1.png', 4),
(14, 'AA ', '', '2.00', 'd2.png', 4),
(15, 'Cola', '', '2.00', 'd3.png', 4),
(16, 'Spa', '', '2.00', 'd4.png', 4),
(21, 'Manti', 'Kayseri special', '12.00', 'manti.jpg', 2),
(23, 'Aardappelsoep', 'Aardappelsoep met een lekkere sausje erover', '6.00', 'patatescorba.jpg', 1),
(24, 'Volvo V40', 'Een zeer dikke Volvo met een stage 1 tune en gewrapped in een zeer unieke metallic kleur met mooi zwarte accenten', '50.00', 'volvo.png', 3),
(28, 'Thee', 'Turkse thee', '1.50', 'cay.jpg', 4);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `persons` int(11) NOT NULL,
  `message` date NOT NULL,
  `time` time NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `reservation`
--

INSERT INTO `reservation` (`id`, `name`, `email`, `persons`, `message`, `time`, `date`, `user_id`) VALUES
(1, 'Ekreb', 'Ekreb@email.com', 2, '2022-09-25', '17:30:00', '2022-09-05 10:12:50', 28),
(2, 'reserverentest', 'reserverentest@email.com', 2, '2022-10-10', '17:00:00', '2022-09-05 10:13:23', 27),
(15, 'Berke38', 'Berke38@email.com', 5, '2022-09-22', '17:30:00', '2022-09-05 11:15:54', 3),
(16, 'Berke38', 'Berke38@email.com', 50, '2022-09-21', '18:00:00', '2022-09-05 11:25:06', 3),
(17, 'reserverentest', 'reserverentest@email.com', 15, '2022-09-23', '17:30:00', '2022-09-05 11:25:53', 27),
(19, 'Ekreb', 'Ekreb@email.com', 2, '2022-10-06', '18:00:00', '2022-09-05 11:27:21', 28),
(22, 'Hajar', 'Hajar.mussa14@icloud.com', 2, '2022-09-25', '17:30:00', '2022-09-05 12:59:44', 15),
(23, 'Berke38', 'Berke38@email.com', 4, '2022-09-18', '18:00:00', '2022-09-05 13:17:24', 3),
(24, 'Abaysulu', 'Abaysulu@email.com', 11, '2022-10-01', '17:30:00', '2022-09-05 17:10:15', 31),
(25, 'Kees', 'Kees@email.com', 4, '2022-10-12', '17:00:00', '2022-09-06 09:31:05', 6),
(26, 'Henk', 'Henk@email.com', 5, '2022-10-06', '18:00:00', '2022-09-06 09:32:56', 8),
(27, 'Kare de grote testpop', 'Kareldetestpop@email.com', 5, '2022-11-10', '17:00:00', '2022-09-06 09:34:56', 9),
(28, 'Joe', 'Joe@email.com', 2, '2022-11-16', '17:30:00', '2022-09-06 09:36:45', 10),
(29, 'Kirrow', 'Kirrow@email.com', 2, '2022-09-10', '18:00:00', '2022-09-06 09:38:26', 11),
(30, 'Kirrow', 'Kirrow@email.com', 4, '2022-10-12', '17:00:00', '2022-09-06 09:38:33', 11),
(31, 'Cavus', 'Cavus@email.com', 10, '2022-09-30', '17:00:00', '2022-09-06 09:40:58', 12),
(33, 'Huseyin', 'Huseyin@email.com', 2, '2022-09-20', '18:00:00', '2022-09-06 10:04:57', 32),
(34, 'Balim', 'Balim@email.com', 5, '2022-09-25', '17:00:00', '2022-09-06 11:00:03', 33),
(35, 'Balim', 'Balim@email.com', 5, '2022-12-31', '17:30:00', '2022-09-06 11:27:11', 33),
(36, 'Berke38', 'Berke38@email.com', 4, '2022-09-15', '18:00:00', '2022-09-06 13:20:27', 3),
(46, 'Berke38', 'Berke38@email.com', 1, '2022-09-08', '17:30:00', '2022-09-08 13:15:57', 3),
(48, 'Cavus', 'Cavus@email.com', 1, '2022-09-08', '18:00:00', '2022-09-08 14:40:39', 12),
(49, 'Henk', 'Henk@email.com', 3, '2022-09-08', '17:00:00', '2022-09-08 15:05:32', 8),
(50, 'Burak', 'Burak@email.com', 8, '2022-09-09', '17:15:00', '2022-09-08 15:13:04', 91),
(51, 'Burak Yilmaz', 'Burak@email.com', 2, '2022-09-08', '18:30:00', '2022-09-08 15:41:09', 91),
(52, 'Karel', 'Karel@email.com', 2, '2022-09-09', '18:30:00', '2022-09-09 10:31:04', 42),
(53, 'Mert', 'Mert@email.com', 2, '2022-09-09', '19:00:00', '2022-09-09 10:48:09', 63),
(54, 'Henk', 'Henk@email.com', 4, '2022-09-09', '19:25:00', '2022-09-09 13:23:59', 8),
(55, 'Henk', 'Henk@email.com', 3, '2022-09-12', '16:30:00', '2022-09-09 13:25:39', 8),
(56, 'Hajar', 'Hajar.mussa14@icloud.com', 6, '2022-09-12', '17:30:00', '2022-09-09 14:33:37', 15),
(57, 'Berke38', 'Berke38@email.com', 1, '2022-09-13', '18:40:00', '2022-09-13 10:32:55', 3),
(58, 'Berke38', 'Berke38@email.com', 1, '2022-09-14', '18:30:00', '2022-09-13 15:07:21', 3),
(60, 'Kaan', 'Kaan@email.com', 4, '2022-09-25', '17:00:00', '2022-09-19 11:52:01', 2),
(61, 'Kaan', 'Kaan@email.com', 1, '2022-09-20', '12:45:00', '2022-09-19 11:52:17', 2),
(62, 'Kaan', 'Kaan@email.com', 1, '2022-09-19', '22:00:00', '2022-09-19 11:52:34', 2),
(63, 'TØERKŒE', 'Toerkoee@email.com', 4, '2022-09-21', '19:00:00', '2022-09-21 10:58:35', 94),
(64, 'Berke38', 'Berke38@email.com', 1, '2022-09-21', '13:00:00', '2022-09-21 11:59:02', 3),
(65, 'Kirrow', 'Kirrow@email.com', 1, '2022-09-26', '16:42:00', '2022-09-21 13:38:10', 11),
(66, 'MrBerry', 'Berry@email.com', 4, '2022-09-23', '17:04:00', '2022-09-21 14:04:17', 60),
(67, 'MrBerry', 'Berry@email.com', 4, '2022-09-22', '20:16:00', '2022-09-21 14:11:30', 60),
(68, 'MrBerry', 'Berry@email.com', 4, '2022-09-25', '18:10:00', '2022-09-21 14:13:39', 60),
(69, 'MrBerry', 'Berry@email.com', 5, '2022-09-25', '10:10:00', '2022-09-21 14:17:18', 60),
(70, 'MrBerry', 'Berry@email.com', 5, '2022-09-25', '10:10:00', '2022-09-21 14:17:33', 60),
(71, 'MrBerry', 'Berry@email.com', 5, '2022-09-25', '13:13:00', '2022-09-21 14:17:44', 60),
(72, 'MrBerry', 'Berry@email.com', 5, '2022-09-25', '10:13:00', '2022-09-21 14:17:54', 60),
(73, 'MrBerry', 'Berry@email.com', 5, '2022-09-25', '13:13:00', '2022-09-21 14:18:04', 60),
(74, 'MrBerry', 'Berry@email.com', 5, '2022-09-25', '13:13:00', '2022-09-21 14:18:14', 60),
(75, 'MrBerry', 'Berry@email.com', 5, '2022-09-25', '13:13:00', '2022-09-21 14:19:13', 60),
(76, 'Berke38', 'Berke38@email.com', 2, '2022-09-22', '17:30:00', '2022-09-21 14:19:58', 3),
(77, 'Berke38', 'Berke38@email.com', 2, '2022-09-25', '15:30:00', '2022-09-21 14:20:55', 3),
(78, 'Berke38', 'Berke38@email.com', 4, '2022-09-28', '17:25:00', '2022-09-21 14:22:25', 3),
(79, 'TØERKŒE', 'Toerkoee@email.com', 2, '2022-09-21', '16:30:00', '2022-09-21 14:34:34', 94),
(80, 'TØERKŒE', 'Toerkoee@email.com', 3, '2022-09-21', '19:40:00', '2022-09-21 14:36:36', 94),
(81, 'TØERKŒE', 'Toerkoee@email.com', 1, '2022-09-21', '14:42:00', '2022-09-21 14:38:46', 94),
(82, 'TØERKŒE', 'Toerkoee@email.com', 1, '2022-09-21', '14:42:00', '2022-09-21 14:40:35', 94),
(83, 'TØERKŒE', 'Toerkoee@email.com', 2, '2022-09-22', '17:40:00', '2022-09-21 14:40:45', 94),
(84, 'TØERKŒE', 'Toerkoee@email.com', 2, '2022-09-22', '17:40:00', '2022-09-21 14:43:50', 94),
(85, 'TØERKŒE', 'Toerkoee@email.com', 2, '2022-09-21', '14:50:00', '2022-09-21 14:44:03', 94),
(86, 'TØERKŒE', 'Toerkoee@email.com', 1, '2022-09-23', '17:48:00', '2022-09-21 14:48:19', 94),
(87, 'TØERKŒE', 'Toerkoee@email.com', 2, '2022-09-22', '20:54:00', '2022-09-21 14:49:36', 94),
(88, 'Kaan', 'Kaan@email.com', 1, '2022-09-21', '19:00:00', '2022-09-21 14:58:18', 2),
(89, 'Hajar', 'Hajar.mussa14@icloud.com', 2, '2022-09-25', '18:00:00', '2022-09-21 15:01:36', 15),
(90, 'Kirrow', 'Kirrow@email.com', 2, '2022-09-30', '20:05:00', '2022-09-21 15:05:48', 11),
(91, 'Kirrow', 'Kirrow@email.com', 1, '2022-09-22', '20:06:00', '2022-09-21 15:07:00', 11),
(92, 'Oogabooga', 'MasterOogway@email.com', 3, '2022-09-22', '19:09:00', '2022-09-21 15:09:20', 95),
(93, 'Oogabooga', 'MasterOogway@email.com', 3, '2022-09-21', '19:05:00', '2022-09-21 15:20:03', 95),
(96, 'Badr', 'Badrkhaie@Hotmail.com', 2, '2022-09-25', '14:30:00', '2022-09-22 11:20:24', 97),
(97, 'Hajar', 'Hajar.mussa14@icloud.com', 2, '2022-09-25', '19:30:00', '2022-09-22 13:19:53', 15),
(98, 'Hajar', 'Hajar.mussa14@icloud.com', 2, '2022-09-25', '19:30:00', '2022-09-22 13:21:20', 15),
(99, 'Kemal', 'Kemal.ozturk@rivm.nl', 4, '2022-09-25', '18:00:00', '2022-09-22 13:24:45', 98),
(100, 'Kemal', 'Kemal.ozturk@rivm.nl', 4, '2022-09-23', '18:15:00', '2022-09-22 13:25:38', 98);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `stars` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `review`
--

INSERT INTO `review` (`id`, `email`, `message`, `stars`, `date`, `user_id`) VALUES
(1, 'Berke38@email.com', 'Leuke restaurant, kwaliteit eten en goede service', 10, '2022-09-06 11:37:30', 3),
(3, 'Hajar.mussa14@icloud.com', 'Website kan beter', 6, '2022-09-06 11:38:42', 15),
(4, 'Huseyin@email.com', 'AANRADER!!', 10, '2022-09-06 11:39:15', 32),
(6, 'Abaysulu@email.com', 'Uitstekende gerechten!!!!!', 9, '2022-09-06 12:07:55', 31),
(7, 'Ekreb@email.com', 'Was niet echt leuk', 5, '2022-09-06 12:08:54', 28),
(14, 'Berke38@email.com', 'Service kan sneller', 9, '2022-09-06 12:13:01', 3),
(15, 'Berke38@email.com', 'Eten was super!', 10, '2022-09-06 12:13:27', 3),
(17, 'sjoerd@qabana.nl', 'goeie score', 10, '2022-09-06 12:59:01', 36),
(21, 'Berry@email.com', 'Het kan prijzig zijn maar het is het zeker wel waard', 7, '2022-09-09 08:36:02', 60);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reservations` int(11) DEFAULT 0,
  `adres` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `reservations`, `adres`, `role`) VALUES
(1, 'Berke', 'BK@email.com', '$2y$10$elh3K6IJX3wARfeoallCv.pe4tZ/CaYsID2ZS64nL5sX3fGhEWqHe', NULL, '', 'admin'),
(2, 'Kaan', 'Kaan@email.com', '$2y$10$VoHUr1tO97n8P/2L0qPN5epaNsnXaucqQ6H9Ya7GFDmlgFB/oLfPq', 4, '', 'member'),
(3, 'Berke38', 'Berke38@email.com', '$2y$10$2U957u6e8tCJ7px0Zaub4u4mpcg0rFhRI2DbloQs.L2Eu2vx7lD2O', 11, '', 'member'),
(6, 'Kees', 'Kees@email.com', '$2y$10$JiW6ENfVOI/GHSrWwsdTBOgDRbFJLqealXx14El0Mdnn/jc7CDlEa', 1, '', 'member'),
(8, 'Henk', 'Henk@email.com', '$2y$10$PmDGQn0pbR0rRspYdVADyOLg8CG7tfuiNEwsbKds2zN76apNeIa5q', 4, '', 'member'),
(9, 'Karel de grote testpop', 'Kareldetestpop@email.com', '$2y$10$VEp/ziXK3HcMjSM4C6IO7O3HOu9MiWF81B1piSG12IRdbhXK69i1u', 1, '', 'member'),
(10, 'Joe', 'Joe@email.com', '$2y$10$ksziNtHtIWVK5/tRwyqc.evYPigA8XTnYjf71VJJux2WGQk4uVz.u', 1, '', 'member'),
(11, 'Kirrow', 'Kirrow@email.com', '$2y$10$gb1w2p.BZjspckoXWQ8PneKIzofoZ.XT5rFx5tpzsmgqe6dcwm1de', 5, '', 'member'),
(12, 'Cavus', 'Cavus@email.com', '$2y$10$0VPOosB6Yqw4mrFCEm2GI.Pybo3TYGEe.5ZP37P8p00pCEW2W0D26', 2, '', 'member'),
(15, 'Hajar', 'Hajar.mussa14@icloud.com', '$2y$10$XpPF8meuRUqQ5sx4clV33uzjM8nyjNtLRPNZpYqAE/a/zSEZa5Nmi', 5, 'Die ene straat 1234', 'member'),
(16, '\"\' ', 'fiets@dnl.nl', '$2y$10$Nofbll1hhDllgqNv1HKoIuiXNqy.qQ9tw6kOw6YSb5oLi5anOMkL6', 0, '', 'member'),
(27, 'reserverentest', 'reserverentest@email.com', '$2y$10$2jdojLhkRnyhB/YsY40fC.sKwIFVpf5lmt41qobSZn5z3Qhov8Vr2', 2, '', 'member'),
(28, 'Ekreb', 'Ekreb@email.com', '$2y$10$3AWvFNXZEW.zF2P1L/ankem2hnvn2y9jrnLALEVVHEASjiZ2JyqqK', 2, '', 'member'),
(31, 'Abaysulu', 'Abaysulu@email.com', '$2y$10$iJR52ZWEuC6iiMNj9biFueAbNcQnZOdZXNRXTIQRFhvHrlsCfJEFi', 1, '', 'member'),
(32, 'Huseyin', 'Huseyin@email.com', '$2y$10$zRhxmZA.o8Jb29i2slOjseRJaDbXXYWjJbiDH/P3SL2.18OBUhNPW', 1, '', 'member'),
(33, 'Balim', 'Balim@email.com', '$2y$10$S.zzvZpegnd8xFx5.NI0QO4dpntnKM.i3T5gS4xCQz5zEXKtIoS3W', 2, '', 'member'),
(36, 'Sjoerd', 'sjoerd@qabana.nl', '$2y$10$YXeqkgPqPZezS.PTmbyfj.amio5S2LPmt6Ljb8HvLKojWNlAEGhxW', 0, '', 'member'),
(42, 'Karel', 'Karel@email.com', '$2y$10$OYeBOqWx5O/HEtHPCmy0ZOpNeqBaM1mu5hjVGA1Q5wj7uHNF5/8SO', 1, '', 'member'),
(60, 'MrBerry', 'Berry@email.com', '$2y$10$juCSj6/08v42sPJm.RJCeO3gF0/B9eW7AnV7qeSSZaNxSKXN0OyTG', 10, '', 'member'),
(63, 'Mert', 'Mert@email.com', '$2y$10$YXY0BPtvi7ZgYxGfx62IbuhUdsivT.f3PuALQfyGCTg3EW9gOquQC', 1, '', 'member'),
(91, 'Burak Yilmaz', 'Burak@email.com', '$2y$10$e0OlGCiRSfF5aHXhhaxMX.9fLeW3NRaJ.1hhxmuRgM5FVBWlkyabW', 2, '', 'member'),
(94, 'TØERKŒE', 'Toerkoee@email.com', '$2y$10$juCSj6/08v42sPJm.RJCeO3gF0/B9eW7AnV7qeSSZaNxSKXN0OyTG', 10, '', 'member'),
(95, 'Oogabooga', 'MasterOogway@email.com', '$2y$10$K3Smhg/kdjBRbPxjyYiHN.1dexhqVTJlZWmCE0KD0L1Om3iCv6V6i', 2, '', 'member'),
(97, 'Badr', 'Badrkhaie@Hotmail.com', '$2y$10$GDAwdwlngKJDT2cZRAoge.m2AJoVzgbuLwNV9nqcDoZBzmIn7rJK.', 1, '1234 AB', 'member'),
(98, 'Kemal', 'Kemal.ozturk@rivm.nl', '$2y$10$xJA8zVoI.Hd9v9uwNk9/Ee.SHzepQm5m4Aw3UvOqAPGTjkqWzx7zO', 2, 'Koningstraat 162', 'member');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bestelling`
--
ALTER TABLE `bestelling`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `category_id_2` (`category_id`),
  ADD KEY `price` (`price`);

--
-- Indexen voor tabel `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `email` (`email`);

--
-- Indexen voor tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `email` (`email`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bestelling`
--
ALTER TABLE `bestelling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT voor een tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT voor een tabel `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT voor een tabel `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
