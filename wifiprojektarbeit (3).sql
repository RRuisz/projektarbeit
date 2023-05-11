-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 11. Mai 2023 um 15:09
-- Server-Version: 10.4.27-MariaDB
-- PHP-Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `wifiprojektarbeit`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(1, 'Service'),
(2, 'Rezeption'),
(3, 'Küche'),
(4, 'Technik');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `engineeringtasks`
--

CREATE TABLE `engineeringtasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `complete_date` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `engineeringtasks`
--

INSERT INTO `engineeringtasks` (`id`, `name`, `description`, `status`, `created_at`, `complete_date`, `user_id`) VALUES
(8, 'aaa', 'aaaa', 0, '2023-05-11 12:28:49', NULL, 1),
(9, 'wadawdawda', 'wdawdwdawdwdawd', 0, '2023-05-11 12:50:12', NULL, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `engineeringtask_taskcomment`
--

CREATE TABLE `engineeringtask_taskcomment` (
  `engineeringtask_id` bigint(20) UNSIGNED NOT NULL,
  `taskcomment_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `engineeringtask_taskcomment`
--

INSERT INTO `engineeringtask_taskcomment` (`engineeringtask_id`, `taskcomment_id`) VALUES
(8, 15);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `handovers`
--

CREATE TABLE `handovers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `headline` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `handovers`
--

INSERT INTO `handovers` (`id`, `headline`, `content`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'aiowdioawjdapwjd', 'ojwadpodjpaowdjopawjdpawdjpoa', 1, '2023-05-10 18:31:18', '2023-05-10 18:31:18');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `handover_department`
--

CREATE TABLE `handover_department` (
  `handover_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `handover_department`
--

INSERT INTO `handover_department` (`handover_id`, `department_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `handover_user`
--

CREATE TABLE `handover_user` (
  `handover_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `handover_user`
--

INSERT INTO `handover_user` (`handover_id`, `user_id`) VALUES
(1, 1),
(1, 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_04_20_202332_create_roles_table', 1),
(5, '2023_04_20_202410_create_departments_table', 1),
(6, '2023_04_20_202411_create_users_table', 1),
(7, '2023_04_20_202542_create_newsposts_table', 1),
(8, '2023_04_20_202727_create_handovers_table', 1),
(9, '2023_04_20_203017_create_handover_department_table', 1),
(10, '2023_04_20_203509_create_engineeringtasks_table', 1),
(11, '2023_04_20_203934_create_taskcomments_table', 1),
(12, '2023_04_20_204048_create_engineeringtask_taskcomment_table', 1),
(13, '2023_04_20_204322_create_categorys_table', 1),
(14, '2023_04_20_204349_create_recipes_table', 1),
(15, '2023_05_10_182913_handover_user', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `newsposts`
--

CREATE TABLE `newsposts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `newsposts`
--

INSERT INTO `newsposts` (`id`, `topic`, `content`, `user_id`, `created_at`) VALUES
(4, 'awdawdaw', 'dawdawdawdawd', 1, '2023-05-11 12:10:03');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `recipes`
--

CREATE TABLE `recipes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Abteilungsleiter'),
(3, 'Mitarbeiter');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `taskcomments`
--

CREATE TABLE `taskcomments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `taskcomments`
--

INSERT INTO `taskcomments` (`id`, `description`, `user_id`) VALUES
(1, 'awdadawdawdawd', 1),
(2, 'awdawdawdawdawdawd', 3),
(3, 'bla bla', 1),
(5, 'testtest', 1),
(6, 'wadawdawdwadaw', 1),
(8, 'adwawdawdawd', 1),
(9, 'awdawd', 1),
(14, 'awedfawdawdwadawd', 1),
(15, 'awdawdawdawdawd', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `birthdate`, `password`, `role_id`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '1998-03-03', '$2y$10$TlDc611uXZKGxel6pJ87HeJWomx8MhTmuZR.lahR2e/mpIxOd/NZO', 1, 1, NULL, '2023-05-11 07:28:17'),
(2, 'Mitarbeiter', 'mitarbeiter@gmail.com', '1998-03-03', '$2y$10$WepkmDiSTJ6u8BGLZ61bwej04dF719LW1Ak88EsZesq2iCp1tp3Cm', 3, 4, NULL, '2023-05-11 07:30:29'),
(3, 'Roman Ruisz', 'roman@ruisz.cc', '1997-09-03', '$2y$10$EyUXHQaDWW9/B7nxrgOcSO4HTJdkSPB1s94PzcfJo.Cwh9QbJgnvS', 3, 1, '2023-05-10 18:53:12', '2023-05-11 07:31:18'),
(4, 'Max Mustermann', 'max@gmail.com', '1997-09-03', '$2y$10$VxAtkSTEy0TDTLpt0vjT1umy4PE/Uwm0yn5/hcsGVLop8aOerbNA.', 2, 3, '2023-05-11 07:14:20', '2023-05-11 07:14:20');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `engineeringtasks`
--
ALTER TABLE `engineeringtasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `engineeringtasks_user_id_foreign` (`user_id`);

--
-- Indizes für die Tabelle `engineeringtask_taskcomment`
--
ALTER TABLE `engineeringtask_taskcomment`
  ADD PRIMARY KEY (`engineeringtask_id`,`taskcomment_id`),
  ADD KEY `engineeringtask_taskcomment_taskcomment_id_foreign` (`taskcomment_id`);

--
-- Indizes für die Tabelle `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indizes für die Tabelle `handovers`
--
ALTER TABLE `handovers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `handovers_user_id_foreign` (`user_id`);

--
-- Indizes für die Tabelle `handover_department`
--
ALTER TABLE `handover_department`
  ADD PRIMARY KEY (`handover_id`,`department_id`),
  ADD KEY `handover_department_department_id_foreign` (`department_id`);

--
-- Indizes für die Tabelle `handover_user`
--
ALTER TABLE `handover_user`
  ADD PRIMARY KEY (`handover_id`,`user_id`),
  ADD KEY `handover_user_user_id_foreign` (`user_id`);

--
-- Indizes für die Tabelle `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `newsposts`
--
ALTER TABLE `newsposts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `newsposts_user_id_foreign` (`user_id`);

--
-- Indizes für die Tabelle `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indizes für die Tabelle `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indizes für die Tabelle `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipes_user_id_foreign` (`user_id`),
  ADD KEY `recipes_category_id_foreign` (`category_id`);

--
-- Indizes für die Tabelle `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `taskcomments`
--
ALTER TABLE `taskcomments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `taskcomments_user_id_foreign` (`user_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_department_id_foreign` (`department_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `engineeringtasks`
--
ALTER TABLE `engineeringtasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT für Tabelle `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `handovers`
--
ALTER TABLE `handovers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT für Tabelle `newsposts`
--
ALTER TABLE `newsposts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `taskcomments`
--
ALTER TABLE `taskcomments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `engineeringtasks`
--
ALTER TABLE `engineeringtasks`
  ADD CONSTRAINT `engineeringtasks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints der Tabelle `engineeringtask_taskcomment`
--
ALTER TABLE `engineeringtask_taskcomment`
  ADD CONSTRAINT `engineeringtask_taskcomment_engineeringtask_id_foreign` FOREIGN KEY (`engineeringtask_id`) REFERENCES `engineeringtasks` (`id`),
  ADD CONSTRAINT `engineeringtask_taskcomment_taskcomment_id_foreign` FOREIGN KEY (`taskcomment_id`) REFERENCES `taskcomments` (`id`);

--
-- Constraints der Tabelle `handovers`
--
ALTER TABLE `handovers`
  ADD CONSTRAINT `handovers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints der Tabelle `handover_department`
--
ALTER TABLE `handover_department`
  ADD CONSTRAINT `handover_department_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `handover_department_handover_id_foreign` FOREIGN KEY (`handover_id`) REFERENCES `handovers` (`id`);

--
-- Constraints der Tabelle `handover_user`
--
ALTER TABLE `handover_user`
  ADD CONSTRAINT `handover_user_handover_id_foreign` FOREIGN KEY (`handover_id`) REFERENCES `handovers` (`id`),
  ADD CONSTRAINT `handover_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints der Tabelle `newsposts`
--
ALTER TABLE `newsposts`
  ADD CONSTRAINT `newsposts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints der Tabelle `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `recipes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints der Tabelle `taskcomments`
--
ALTER TABLE `taskcomments`
  ADD CONSTRAINT `taskcomments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints der Tabelle `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
