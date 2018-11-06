-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 04. Nov 2018 um 16:06
-- Server-Version: 10.1.30-MariaDB
-- PHP-Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `roccatg_guestbook`
--
CREATE DATABASE IF NOT EXISTS `roccatg_guestbook` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `roccatg_guestbook`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `guestbook`
--

CREATE TABLE `guestbook` (
  `id` int(4) NOT NULL,
  `surname` varchar(65) NOT NULL DEFAULT '',
  `email` varchar(65) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `text` longtext NOT NULL,
  `title` varchar(65) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `guestbook`
--

INSERT INTO `guestbook` (`id`, `surname`, `email`, `password`, `text`, `title`) VALUES
(1, 'Tom', 'Tol@m.de', '123', 'Test', 'hallo'),
(2, 'Tom', 'Tol@m.de', '123', 'Test', 'hallo'),
(3, 'Tom', 'Tol@m.de', '123', 'Test', 'hallo'),
(4, 'klaus', 'Tol@m.de', '123', 'hallo Test Mann!', 'Testern popesten'),
(5, 'klaus', 'Tol@m.de', '123', 'GOGOGOG', 'Bla Blu');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `guestbook`
--
ALTER TABLE `guestbook`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `guestbook`
--
ALTER TABLE `guestbook`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
