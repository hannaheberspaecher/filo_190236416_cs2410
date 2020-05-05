-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 05. Mai 2020 um 18:49
-- Server-Version: 5.7.30-0ubuntu0.18.04.1
-- PHP-Version: 7.3.17-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `u_190236416_db`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` enum('Pet','Phone','Jewellery') COLLATE utf8mb4_unicode_ci NOT NULL,
  `foundtime` date NOT NULL,
  `founduser` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foundplace` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `colour` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` blob NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `other` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('available','unavailable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `items`
--

INSERT INTO `items` (`id`, `category`, `foundtime`, `founduser`, `foundplace`, `colour`, `image`, `description`, `other`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Jewellery', '2020-05-13', 'Isabelle Gill', 'Stuttgart', 'silver', 0x73696c7665722d72696e675f313538383334343635322e6a7067, 'Silver ring was found at Schlossplatz.', 'Any other note', 'unavailable', '2020-05-01 13:50:52', '2020-05-01 17:09:36'),
(7, 'Pet', '2020-05-11', 'Lenny Miller', 'Birmingham', 'black', 0x426c61636b2d446f675f313538383538373032302e6a7067, 'This cute dog was found near the city center, he was no wearing any kind of collar, he seems quite young.', 'Any other note', 'unavailable', '2020-05-04 09:10:20', '2020-05-04 11:35:51'),
(8, 'Pet', '2020-04-07', 'Isabelle Gill', 'Birmingham', 'white', 0x7768697465206361745f313538383538373139342e6a7067, 'This white cat was found strolling around near the city university campus. She seems quite nice.', 'I would like to keep her if the owner is not found.', 'available', '2020-05-04 09:13:14', '2020-05-04 09:13:14'),
(9, 'Phone', '2020-04-16', 'Jochen Eberspächer', 'Birmingham', 'black', 0x6970686f6e652d382d626c61636b5f313538383538373236342e6a7067, 'IPhone 8+ found in China town. Pretty good condition.', 'Any other note', 'unavailable', '2020-05-04 09:14:24', '2020-05-04 13:59:24'),
(10, 'Jewellery', '2020-04-08', 'Hannah Eberspächer', 'London', 'silver', 0x73696c7665722d72696e675f313538383538373338392e6a7067, 'This basic silver ring was found in London Euston noon of the 8th April. It looks quite expensive.', 'Any other note', 'available', '2020-05-04 09:16:29', '2020-05-04 09:16:29'),
(11, 'Phone', '2020-04-30', 'Fabiennie Bujtas', 'Paris', 'black', 0x67616c6178792d7331302d706c75735f313538383538373532312e6a7067, 'Samsung S10 plus found behind Louvre. There are some scratches on the screen.', 'Any other note', 'available', '2020-05-04 09:18:41', '2020-05-04 09:18:41'),
(12, 'Jewellery', '2020-03-10', 'Hannah Eberspächer', 'Birmingham', 'rose gold', 0x726f7365676f6c645f6e65636b6c6163655f313538383538373735342e6a7067, 'This heart-shaped necklace was found in the SU Lounge of Aston University.', 'Any other note', 'available', '2020-05-04 09:22:34', '2020-05-04 09:22:34'),
(15, 'Pet', '2020-03-06', 'Marie Shuingh', 'Stuttgart', 'grey', 0x68616d737465725f313538383639393431352e6a7067, 'This cute hamster was found near the Marienplatz, crossing a street. I hope the owner finds him here!', 'Are you the owner? Make a call: +49 58363465836. Greetings. He is doing well!', 'available', '2020-05-05 16:23:35', '2020-05-05 16:23:35');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_04_16_082904_create_items_table', 1),
(5, '2020_04_29_091050_create_request_items_table', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `request_items`
--

CREATE TABLE `request_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `reason` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('request','approved','refused') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'request',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `request_items`
--

INSERT INTO `request_items` (`id`, `item_id`, `user_id`, `reason`, `status`, `created_at`, `updated_at`) VALUES
(3, 9, 4, 'This is mine!! I lost it on the 16th April.', 'approved', '2020-05-04 11:24:10', '2020-05-04 13:59:24'),
(4, 7, 4, 'Ahh he ran away some weeks ago. His name is Butch, I hope he is well! When can I see him?', 'approved', '2020-05-04 11:24:51', '2020-05-04 12:10:03'),
(5, 9, 2, 'I think this is the phone of my son', 'refused', '2020-05-04 11:29:43', '2020-05-04 14:26:45'),
(6, 8, 2, 'Ahh you found my car. Her name is Cleo and she ran away form home! When can I get her???', 'request', '2020-05-05 16:03:37', '2020-05-05 16:03:37'),
(7, 8, 5, 'I think this is my daughters cat! How can we make contact with the person who found her?', 'request', '2020-05-05 16:18:59', '2020-05-05 16:18:59'),
(8, 10, 5, 'This is my ring, I am so glad you found it!!', 'request', '2020-05-05 16:19:27', '2020-05-05 16:19:27'),
(9, 15, 2, 'I am so happy that my hamster John was found!! I already called them and we made an appointment.', 'request', '2020-05-05 16:42:06', '2020-05-05 16:42:06');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@mail.com', NULL, 1, '$2y$10$P9Hr2NP.thE6wqu1m/IM0uawcOqH6dv35iaTT5PAsxlN6P8iiUdKO', NULL, '2020-05-01 13:22:08', '2020-05-01 13:22:08'),
(2, 'User', 'user@mail.com', NULL, 0, '$2y$10$1LsGeaTUievbpTg17V9D8.VF.O/QbQwbvxRzfueMB2r3GO5X0WCFu', NULL, '2020-05-01 13:25:25', '2020-05-01 13:25:25'),
(4, 'Hannah Eberspächer', 'hannah@web.de', NULL, 0, '$2y$10$et28Q0/BNCpTUyUDr/4osuCaB9tR/2xfNLjTNfDoM1Rj2V6L/XVlO', NULL, '2020-05-04 09:21:17', '2020-05-04 09:21:17'),
(5, 'Marie', 'marie@mail.com', NULL, 0, '$2y$10$FtvGBb7YvjdU4Ym0LmmybOS2LjJY5Y4IlbnRLn9VL926AdzkRqiYe', NULL, '2020-05-05 16:12:53', '2020-05-05 16:12:53');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indizes für die Tabelle `request_items`
--
ALTER TABLE `request_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_items_item_id_foreign` (`item_id`),
  ADD KEY `request_items_user_id_foreign` (`user_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT für Tabelle `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT für Tabelle `request_items`
--
ALTER TABLE `request_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `request_items`
--
ALTER TABLE `request_items`
  ADD CONSTRAINT `request_items_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `request_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
