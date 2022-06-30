-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 30 jun 2022 om 20:23
-- Serverversie: 10.4.19-MariaDB
-- PHP-versie: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hobo`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `genres`
--

CREATE TABLE `genres` (
  `genres_id` int(11) NOT NULL,
  `genres_naam` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `genres`
--

INSERT INTO `genres` (`genres_id`, `genres_naam`) VALUES
(0, 'Diversen'),
(4, 'Actie'),
(5, 'Anime'),
(6, 'Drama');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `series`
--

CREATE TABLE `series` (
  `series_id` int(11) NOT NULL,
  `series_naam` varchar(255) NOT NULL,
  `series_jaar` int(4) NOT NULL,
  `series_genre` int(11) DEFAULT 0,
  `series_imdb` varchar(255) DEFAULT NULL,
  `series_beschrijving` longtext NOT NULL,
  `series_cover` varchar(255) NOT NULL,
  `series_bron` varchar(255) NOT NULL,
  `series_editorspick` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `series`
--

INSERT INTO `series` (`series_id`, `series_naam`, `series_jaar`, `series_genre`, `series_imdb`, `series_beschrijving`, `series_cover`, `series_bron`, `series_editorspick`) VALUES
(1, 'Prison Break', 2005, 4, 'https://www.imdb.com/title/tt0455275/', 'Door een politieke samenzwering wordt een onschuldige man naar de dodencel gestuurd en zijn enige hoop is zijn broer, die het tot zijn missie maakt om zichzelf opzettelijk naar dezelfde gevangenis te laten sturen om hen beiden van binnenuit eruit te breken.', 'prisonbreak.jpg', 'prisonbreak.mp4', 1),
(2, 'White Collar', 2009, 6, 'https://www.imdb.com/title/tt1358522/', 'Een witteboordencrimineel stemt ermee in de FBI te helpen andere witteboordencriminelen te pakken met zijn expertise als kunst- en effectendief, vervalser en oplichter.', 'whitecollar.jpg', 'whitecollar.mp4', 1),
(3, 'Baki', 2018, 5, 'https://www.imdb.com/title/tt6357658/', 'De hoofdpersoon, Baki Hanma, traint met een intense focus om sterk genoeg te worden om zijn vader, Yujiro Hanma, de sterkste vechter ter wereld, te overtreffen.', 'baki.jpg', 'baki.mp4', 0),
(4, 'La casa de papel', 2017, 4, 'https://www.imdb.com/title/tt6468322/', 'Een ongebruikelijke groep overvallers probeert de meest perfecte overval in de Spaanse geschiedenis uit te voeren - het stelen van 2,4 miljard euro van de Koninklijke Munt van Spanje.', 'lacasadepapel.jpg', 'lacasadepapel.mp4', 0),
(5, 'Vikings: Valhalla', 2022, 4, 'https://www.imdb.com/title/tt11311302/', 'Vervolgserie op \"Vikings\" die 100 jaar later speelt en zich concentreert op de avonturen van Leif Erikson, Freydis, Harald Hardrada en de Normandische koning Willem de Veroveraar.', 'vikingsvalhalla.jpg', 'vikingsvalhalla.mp4', 0),
(6, 'Top Boy', 2011, 4, 'https://www.imdb.com/title/tt1830379/', 'Twee Londense drugsdealers beoefenen hun lucratieve handel in een openbare woonwijk in Oost-Londen.', 'topboy.jpg', 'topboy.mp4', 1),
(9, 'Tokyo Revengers', 2021, 5, 'https://www.imdb.com/title/tt13196080/', 'Hanagaki Takemichi leidt een onbevredigend leven tot aan zijn dood. 12 jaar in het verleden wakker geworden, houdt hij rekening met het uiteindelijke lot van zijn vrienden en probeert hij een ongelukkige toekomst te voorkomen.', 'Tokyo Revengers.jpg', 'Tokyo Revengers.mp4', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `users_voornaam` tinytext NOT NULL,
  `users_achternaam` tinytext NOT NULL,
  `users_email` tinytext NOT NULL,
  `users_wachtwoord` longtext NOT NULL,
  `users_admin` char(1) DEFAULT '0',
  `users_blocked` char(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`users_id`, `users_voornaam`, `users_achternaam`, `users_email`, `users_wachtwoord`, `users_admin`, `users_blocked`) VALUES
(1, 'tester', 'een', 'testeen@hotmail.com', '$2y$10$kL2p0s6mSYE9lVekpD6XrekIl5UUMMhnyEka22BKg7TJFyEgI4I6e', '0', '0'),
(2, 'tester', 'twee', 'testtwee@hotmail.com', '$2y$10$jvhc6/YJ8kCrxMSmp3j/huolQYBjGB4l4F/0HUTJAuGQEijwXce.m', '0', '0'),
(3, 'Amine', 'Amrani', 'easy_adam@hotmail.com', '$2y$10$/2OfMd7MpCPPILXJA1bSpesHl4JMgHCIn/H6fyW1ujJK.Y.dF.pn2', '0', '1'),
(4, 'Aziz', 'Khelanji', 'aziz06hs@hotmail.com', '$2y$10$KBRtYHkeiPb/Pa/d/jsWTe8Xqxsb6yclSuO3uh7Mi4UsKMfZZlxAK', '0', '0'),
(5, 'Hanan', 'Lanjri', 'hananlanjri@hotmail.com', '$2y$10$l/Pf2SRFs2CU/ki5PoplDOC8kq0QY6r/lM.KNEGVg.GzHkQUnIAlm', '0', '0'),
(6, 'admin', 'admin', 'admin@hobo.nl', '$2y$10$Fv9RY28U4slU8bxhz80cROTq1WR2BzmetE5MCyDJ9AGVlXZ19M/ni', '1', '0');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genres_id`);

--
-- Indexen voor tabel `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`series_id`),
  ADD KEY `series_genre` (`series_genre`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `genres`
--
ALTER TABLE `genres`
  MODIFY `genres_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `series`
--
ALTER TABLE `series`
  MODIFY `series_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `series`
--
ALTER TABLE `series`
  ADD CONSTRAINT `series_ibfk_1` FOREIGN KEY (`series_genre`) REFERENCES `genres` (`genres_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
