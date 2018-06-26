-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 26. Jun 2018 um 13:52
-- Server-Version: 10.1.29-MariaDB
-- PHP-Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cart`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Aktivierung`
--

CREATE TABLE `Aktivierung` (
  `ID` int(11) NOT NULL,
  `Aktivierungscode` varchar(10) NOT NULL DEFAULT '',
  `Erstellt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `EMail` varchar(255) NOT NULL DEFAULT '',
  `Aktiviert` enum('Ja','Nein') NOT NULL DEFAULT 'Ja'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `Aktivierung`
--

INSERT INTO `Aktivierung` (`ID`, `Aktivierungscode`, `Erstellt`, `EMail`, `Aktiviert`) VALUES
(87, '15759409', '2018-05-29 19:04:00', 'peakey1@web.de', 'Ja'),
(88, '58745222', '2018-06-11 16:05:51', 'peakey1@web.de', 'Ja'),
(89, '13233818', '2018-06-12 16:12:28', 'peakey1@web.de', 'Ja'),
(90, '81650924', '2018-06-13 13:50:26', 'peakey1@web.de', 'Ja'),
(91, '79606350', '2018-06-13 14:43:43', 'peakey1@web.de', 'Ja');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `orders`
--

CREATE TABLE `orders` (
  `order_id` int(99) NOT NULL,
  `order_name` varchar(255) NOT NULL,
  `order_email` varchar(255) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `order_detail` varchar(255) NOT NULL,
  `order_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `orders`
--

INSERT INTO `orders` (`order_id`, `order_name`, `order_email`, `order_quantity`, `order_detail`, `order_total`) VALUES
(156, 'Awon', 'peakey1@web.de', 1, 'Spyro Remake Trilogy (PS4)/God of War (PS4)/', 89.98),
(157, 'Awon', 'peakey1@web.de', 0, 'Spyro Remake Trilogy (PS4)/God of War (PS4)/', 89.98),
(158, 'Mario', 'peakey1@web.de', 2, 'God of War (PS4)/', 124.98),
(159, 'Mario', 'peakey1@web.de', 1, 'God of War (PS4)/', 59.99),
(160, 'Awon', 'peakey1@web.de', 3, 'God of War (PS4)/Jurassic World (PS4)/', 239.95),
(161, 'Mario', 'peakey1@web.de', 1, 'BioMutant (PS4)/Call of Duty WW 2(Xbox One)/', 96.99),
(162, 'AdminMario', 'peakey1@web.de', 1, 'FIFA 18 (XBox One)/', 25),
(163, 'AdminMario', 'peakey1@web.de', 0, 'FIFA 18 (XBox One)/', 25),
(164, 'Test', 'peakey1@web.de', 1, 'God of War (PS4)/Call of Duty WW 2(Xbox One)/', 104.98),
(165, 'Test', 'peakey1@web.de', 0, 'God of War (PS4)/Call of Duty WW 2(Xbox One)/', 104.98);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `playstation`
--

CREATE TABLE `playstation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`) VALUES
(11, 'God of War (PS4)', 'images/ps4/god_of_war.png', 59.99),
(12, 'Jurassic World (PS4)', 'images/ps4/jurassic_world.png', 29.99),
(13, 'Mittelerde: Schatten des Krieges(PS4)', 'images/ps4/mittelerde.png', 19.99),
(14, 'Monster Hunter World (PS4)', 'images/ps4/monster_hunter.png', 44.99),
(15, 'Red Dead Redemption (PS4)', 'images/ps4/reddeadredemption.png', 34.99),
(16, 'Spiderman (PS4)', 'images/ps4/spiderman.png', 49.99),
(17, 'Spyro Remake Trilogy (PS4)', 'images/ps4/Spyro.png', 24.99),
(18, 'BioMutant (PS4)', 'images/ps4/biomutant.jpg', 52);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `steam`
--

CREATE TABLE `steam` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `steam`
--

INSERT INTO `steam` (`id`, `name`, `image`, `price`) VALUES
(1, 'Assassins Creed (STEAM)', 'images/steam/ac.png', 24.99),
(2, 'Destiny 2 (STEAM)', 'images/steam/destiny.png', 19.99),
(3, 'Fallout 4 (STEAM)', 'images/steam/fallout.png', 14.99),
(4, 'Life is Strange (STEAM)', 'images/steam/life.png', 9.99),
(5, 'Overwatch (STEAM)', 'images/steam/overwatch.png', 24.99),
(6, 'Skyrim (STEAM)', 'images/steam/skyrim.png', 14.99);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(107, 'Awon', 'peakey1@web.de', '$2y$10$v4hJ8mRXLP2lq8G6SbLY9O7TqFZ.qgUC/W6aejxu01ugZAwN6rz1W'),
(108, 'Mario', 'peakey1@web.de', '$2y$10$FceeLSn0RVnrNGipFOgUOONYVXPXEZlDwiyqOIvtYKxHDCmdS2elG'),
(109, 'SuperUser', 'peakey1@web.de', '$2y$10$kbfdSWEdDKy3d7SRgszNIeL26ub7DIuNlt.XSQOekAeDBCRuBqEg6'),
(110, 'AdminMario', 'peakey1@web.de', '$2y$10$5IXwJBiSgdSwzff7lRh0du30Vy771nQ5ng2kU7ITLbVvSvRyZ01IK'),
(111, 'Test', 'peakey1@web.de', '$2y$10$p8tXhB717beBavluH5nihOTIHL4Daa46lJQDnwutTxSAWlCXn4mRy');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `xbox`
--

CREATE TABLE `xbox` (
  `id` int(99) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `xbox`
--

INSERT INTO `xbox` (`id`, `name`, `image`, `price`) VALUES
(1, 'FIFA 18 (XBox One)', 'images/xbox/fifa.png', 20),
(2, 'Call of Duty WW 2(Xbox One)', 'images/xbox/cod.png', 39.99),
(3, 'Conan Exiles (Xbox One)', 'images/xbox/conan.png', 29.99),
(4, 'Dragonball Z Xenoverse 2 (Xbox One)', 'images/xbox/dbz.png', 19.99),
(5, 'Forza (Xbox One)', 'images/xbox/forza.png', 24),
(6, 'Grand Theft Auto V (Xbox One)', 'images/xbox/gta.png', 44.99),
(7, 'Tomb Raider (Xbox One)', 'images/xbox/tomb.png', 39.99);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `Aktivierung`
--
ALTER TABLE `Aktivierung`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indizes für die Tabelle `playstation`
--
ALTER TABLE `playstation`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `steam`
--
ALTER TABLE `steam`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indizes für die Tabelle `xbox`
--
ALTER TABLE `xbox`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `Aktivierung`
--
ALTER TABLE `Aktivierung`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT für Tabelle `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT für Tabelle `playstation`
--
ALTER TABLE `playstation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT für Tabelle `steam`
--
ALTER TABLE `steam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT für Tabelle `xbox`
--
ALTER TABLE `xbox`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
