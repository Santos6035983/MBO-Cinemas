-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 30 jan 2025 om 10:58
-- Serverversie: 8.0.30
-- PHP-versie: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mbo_cinemas`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `feedback`
--

CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `movie` varchar(255) NOT NULL,
  `rating` int NOT NULL,
  `comments` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `movie`, `rating`, `comments`, `created_at`) VALUES
(1, 2, 'Plop en de Kabouterschat', 4, 'mooi film', '2025-01-24 22:15:28'),
(2, 2, 'Plop en de Kabouterschat', 4, 'mooi film', '2025-01-24 22:16:39'),
(3, 2, 'Terrifier 3', 1, 'Het was niet eng', '2025-01-24 22:17:53');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `birthday`, `created_at`) VALUES
(1, 'testuser', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFUpy8kzj3oKq6aBzZ8TKV4x1x7dJfOe', 'testuser@example.com', '1990-01-01', '2025-01-22 13:51:03'),
(2, 'admin', '$2y$10$Z03zEl65dCIUwq33jKKzduHvHjxvfAdGg8PtkY4tS.7oZtfM/OZsW', 'admin@gmail.com', '2000-01-01', '2025-01-24 16:17:18'),
(4, 'Santos', '$2y$10$klbLJWZ2.pXYtX8D91YxA.ibt1M4llPUVUGYqsvgwyt4EtwQeK4by', 'Santos@gmail.com', '2006-07-22', '2025-01-24 22:31:24');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `wenslijst`
--

CREATE TABLE `wenslijst` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `film` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `wenslijst`
--

INSERT INTO `wenslijst` (`id`, `user_id`, `film`) VALUES
(1, 2, 'Indiana Jones and the Dial of Destiny'),
(4, 2, 'No Time To Die'),
(8, 2, 'Oppenheimer'),
(5, 2, 'Terrifier 3'),
(10, 4, 'Indiana Jones and the Dial of Destiny');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexen voor tabel `wenslijst`
--
ALTER TABLE `wenslijst`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_film` (`user_id`,`film`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `wenslijst`
--
ALTER TABLE `wenslijst`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Beperkingen voor tabel `wenslijst`
--
ALTER TABLE `wenslijst`
  ADD CONSTRAINT `wenslijst_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
