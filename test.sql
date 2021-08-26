-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 26 aug 2021 om 09:19
-- Serverversie: 10.4.17-MariaDB
-- PHP-versie: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `dashboards`
--

CREATE TABLE `dashboards` (
  `id` int(11) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `categorie_id` int(11) DEFAULT 1,
  `rank_required` int(11) DEFAULT 5,
  `titel` varchar(50) DEFAULT NULL,
  `categorie` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `mijndashboard`
--

CREATE TABLE `mijndashboard` (
  `id` int(11) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `userid` int(11) DEFAULT 1,
  `titel` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `rankid` int(11) DEFAULT 5,
  `can_access_admin` int(11) DEFAULT 1,
  `can_view_my_dashboard` int(11) DEFAULT 1,
  `can_view_all` int(11) DEFAULT 0,
  `can_view_management` int(11) DEFAULT 0,
  `can_view_support` int(11) DEFAULT 0,
  `can_view_intake` int(11) DEFAULT 0,
  `can_view_arag` int(11) DEFAULT 0,
  `naam` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_user_role`
--

CREATE TABLE `tbl_user_role` (
  `id` int(11) NOT NULL,
  `user_role` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `updates`
--

CREATE TABLE `updates` (
  `id` int(11) NOT NULL,
  `updates` varchar(5000) NOT NULL,
  `alert_type` varchar(50) NOT NULL,
  `alert` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `show_alert` int(11) DEFAULT 0,
  `titel` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `user_role_id` int(11) DEFAULT 4
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `user_role_id`) (`1`, `admin`, `$2y$10$DJmiNdvz64AZV1jdZOqgpuLM2FQuzKaXWJcE/l.K2iqH9G/SNw8k2`, `2021-08-26 09:21:43`, `5`);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `website_settings`
--

CREATE TABLE `website_settings` (
  `id` int(11) NOT NULL,
  `maintenance` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `dashboards`
--
ALTER TABLE `dashboards`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `mijndashboard`
--
ALTER TABLE `mijndashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexen voor tabel `website_settings`
--
ALTER TABLE `website_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `dashboards`
--
ALTER TABLE `dashboards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `mijndashboard`
--
ALTER TABLE `mijndashboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `updates`
--
ALTER TABLE `updates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `website_settings`
--
ALTER TABLE `website_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
