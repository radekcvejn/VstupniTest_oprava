-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Čtv 02. úno 2023, 16:59
-- Verze serveru: 10.4.27-MariaDB
-- Verze PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `yetiapp`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vypisuji data pro tabulku `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230131134030', '2023-01-31 14:41:11', 802);

-- --------------------------------------------------------

--
-- Struktura tabulky `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `yeti`
--

CREATE TABLE `yeti` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `height` double NOT NULL,
  `weight` double NOT NULL,
  `age` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `average_rating` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `yeti`
--

INSERT INTO `yeti` (`id`, `name`, `height`, `weight`, `age`, `location`, `average_rating`) VALUES
(1, 'Bigfoot', 200, 150, 45, 'Mount Everest', NULL),
(2, 'Kelkeko', 180, 130, 30, 'Mount Hyjal', NULL),
(3, 'Arila', 130, 70, 15, 'Snezka', NULL),
(4, 'Kalkaka', 130, 90, 27, 'Černá hora', NULL),
(5, 'Ayor', 175, 145, 35, 'Mount Everest', NULL),
(6, 'Pantoran', 190, 170, 55, 'Sněžka', NULL),
(7, 'Mot', 185, 75, 19, 'Himaláje', NULL),
(8, 'Radek', 250, 130, 49, 'Ještěd', NULL),
(9, 'Uklaich', 290, 150, 70, 'Šerlich', NULL),
(10, 'Uklaich', 290, 150, 70, 'Šerlich', NULL);

-- --------------------------------------------------------

--
-- Struktura tabulky `yeti_rating`
--

CREATE TABLE `yeti_rating` (
  `id` int(11) NOT NULL,
  `yeti_id` int(11) NOT NULL,
  `value` smallint(6) NOT NULL,
  `rated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `yeti_rating`
--

INSERT INTO `yeti_rating` (`id`, `yeti_id`, `value`, `rated_at`) VALUES
(1, 3, 1, '2023-02-01 00:21:46'),
(2, 5, 1, '2023-02-02 00:26:24'),
(3, 6, 1, '2023-02-02 00:26:30'),
(4, 5, 1, '2023-02-02 00:26:35'),
(5, 1, 1, '2023-02-02 00:27:36'),
(6, 3, 1, '2023-02-02 00:27:43'),
(7, 4, -1, '2023-02-02 00:27:48'),
(8, 6, 1, '2023-02-02 00:33:05'),
(9, 6, 1, '2023-02-02 00:33:09'),
(10, 3, 5, '2023-02-02 09:59:43'),
(11, 3, 3, '2023-02-02 09:59:51'),
(12, 2, 5, '2023-02-02 10:00:35'),
(13, 3, 2, '2023-02-02 10:00:40'),
(14, 3, -1, '2023-02-02 10:00:44'),
(15, 5, 1, '2023-02-02 10:01:25'),
(16, 4, 5, '2023-02-02 10:01:30'),
(17, 7, 5, '2023-02-02 10:45:29'),
(18, 6, 3, '2023-02-02 10:45:34'),
(19, 6, 4, '2023-02-02 10:45:38'),
(20, 7, 3, '2023-02-02 10:49:18'),
(21, 8, 5, '2023-02-02 10:49:23'),
(22, 7, 5, '2023-02-02 12:31:26');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexy pro tabulku `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indexy pro tabulku `yeti`
--
ALTER TABLE `yeti`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `yeti_rating`
--
ALTER TABLE `yeti_rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_71B25386FD936CB` (`yeti_id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `yeti`
--
ALTER TABLE `yeti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pro tabulku `yeti_rating`
--
ALTER TABLE `yeti_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `yeti_rating`
--
ALTER TABLE `yeti_rating`
  ADD CONSTRAINT `FK_71B25386FD936CB` FOREIGN KEY (`yeti_id`) REFERENCES `yeti` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
