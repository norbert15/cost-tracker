-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Jan 20. 18:42
-- Kiszolgáló verziója: 10.4.17-MariaDB
-- PHP verzió: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `cost_tracker`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `expenditures`
--

CREATE TABLE `expenditures` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `transport` int(11) NOT NULL,
  `food` int(11) NOT NULL,
  `shopping` int(11) NOT NULL,
  `gift` int(11) NOT NULL,
  `health` int(11) NOT NULL,
  `family` int(11) NOT NULL,
  `sport` int(11) NOT NULL,
  `income` int(11) NOT NULL,
  `etc` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `expenditures`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `sum` int(11) NOT NULL,
  `comment` mediumtext COLLATE utf8_hungarian_ci NOT NULL,
  `current_date` datetime NOT NULL DEFAULT current_timestamp(),
  `month_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `users`
--

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `expenditures`
--
ALTER TABLE `expenditures`
  ADD KEY `id` (`id`);

--
-- A tábla indexei `history`
--
ALTER TABLE `history`
  ADD KEY `history` (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `expenditures`
--
ALTER TABLE `expenditures`
  ADD CONSTRAINT `id` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
