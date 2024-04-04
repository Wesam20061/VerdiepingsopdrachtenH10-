-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 09 feb 2024 om 13:11
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
--
-- Database: `cijfers`
--
-- --------------------------------------------------------
--
-- Tabelstructuur voor tabel `cijfers`
--
CREATE TABLE `cijfers` (
 `ID` int(11) NOT NULL,
 `leerling` varchar(255) NOT NULL,
 `cijfer` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
--
-- Gegevens worden geëxporteerd voor tabel `cijfers`
--
INSERT INTO `cijfers` (`ID`, `leerling`, `cijfer`) VALUES
(1, 'Liam Jones', 8),
(2, 'Noah Martinez', 5),
(3, 'Alexander Brown', 2.6),
(4, 'Lucas Thompson', 6.8),
(5, 'Daniel Lee', 6.9),
(6, 'James Rodriguez', 9.7),
(7, 'Ethan Harris', 7),
(8, 'William Anderson', 4);
--
-- Indexen voor geëxporteerde tabellen
--
--
-- Indexen voor tabel `cijfers`
--
ALTER TABLE `cijfers`
 ADD PRIMARY KEY (`ID`);
--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--
--
-- AUTO_INCREMENT voor een tabel `cijfers`
--
ALTER TABLE `cijfers`
 MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;