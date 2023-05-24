-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 24. Mai 2023 um 18:55
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

--
-- Daten für Tabelle `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Cocktails'),
(2, 'Küche');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `checklists`
--

CREATE TABLE `checklists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `checklists`
--

INSERT INTO `checklists` (`id`, `name`, `department_id`, `created_at`, `updated_at`) VALUES
(3, 'Service', 1, '2023-05-15 13:33:00', NULL),
(7, 'Service', 1, '2023-05-16 12:31:35', '2023-05-17 12:31:35'),
(8, 'Service', 1, '2023-05-17 13:47:25', '2023-05-17 13:47:25'),
(9, 'Service', 1, '2023-05-18 14:56:17', '2023-05-18 14:56:17'),
(11, 'Service', 1, '2023-05-19 14:39:52', '2023-05-19 14:39:52'),
(12, 'Service', 1, '2023-05-20 10:14:18', '2023-05-20 10:14:18'),
(13, 'Service', 1, '2023-05-24 14:19:43', '2023-05-24 14:19:43');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `checklisttasks`
--

CREATE TABLE `checklisttasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `taskcategory_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `checklisttasks`
--

INSERT INTO `checklisttasks` (`id`, `name`, `taskcategory_id`) VALUES
(1, 'Laden aufsperren', 1),
(2, 'Garten aufbauen, herrichten', 1),
(3, 'Fassung verräumen', 1),
(4, 'mitteldienst test', 2),
(5, 'spätdienst test', 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `checklist_checklisttask`
--

CREATE TABLE `checklist_checklisttask` (
  `checklist_id` bigint(20) UNSIGNED NOT NULL,
  `checklisttask_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `done_at` timestamp NULL DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `checklist_checklisttask`
--

INSERT INTO `checklist_checklisttask` (`checklist_id`, `checklisttask_id`, `status`, `done_at`, `user_name`) VALUES
(7, 1, 1, '2023-05-17 12:52:29', 'mitarbeiter'),
(7, 2, 0, '2023-05-17 12:52:30', 'mitarbeiter'),
(7, 3, 0, '2023-05-17 12:52:31', 'mitarbeiter'),
(8, 1, 1, '2023-05-17 15:35:41', 'mitarbeiter'),
(8, 2, 1, '2023-05-17 17:13:39', 'mitarbeiter'),
(8, 3, 1, '2023-05-17 14:23:00', 'admin'),
(9, 1, 1, '2023-05-18 14:56:18', 'Roman Ruisz'),
(9, 2, 1, '2023-05-18 14:56:19', 'Roman Ruisz'),
(9, 3, 1, '2023-05-18 14:56:20', 'Roman Ruisz'),
(11, 1, 1, '2023-05-19 18:03:49', 'admin'),
(11, 2, 1, '2023-05-19 18:36:44', 'admin'),
(11, 3, 1, '2023-05-20 12:22:58', 'admin'),
(11, 4, 1, '2023-05-19 18:03:53', 'admin'),
(11, 5, 1, '2023-05-19 18:03:08', 'admin'),
(12, 1, 1, '2023-05-20 12:57:04', 'admin'),
(12, 2, 0, '2023-05-20 14:43:31', 'admin'),
(12, 3, 1, '2023-05-20 12:52:38', 'admin'),
(12, 4, 0, '2023-05-20 14:43:34', 'admin'),
(12, 5, 0, '2023-05-20 14:43:38', 'admin'),
(13, 1, 0, NULL, NULL),
(13, 2, 1, '2023-05-24 14:19:57', 'admin'),
(13, 3, 0, NULL, NULL),
(13, 4, 0, NULL, NULL),
(13, 5, 1, '2023-05-24 14:19:49', 'admin');

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
(1, 'Kaffeemaschine in der Bar', 'Seit gestern Abend heizt die Kaffeemaschine nicht mehr\r\n\r\nbearbeiten', 0, '2023-05-17 15:45:24', NULL, 1);

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
(1, 1);

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
(1, 'awdawd', 'aawdawdawda \r\nupdate', 1, '2023-05-17 09:46:15', '2023-05-17 15:36:56'),
(2, 'Übergabe 17.05', 'Guten Morgen,\r\n\r\nalles nach der Reservierung wieder weggeräumt, bitte nochmals alles sauber machen zur Sicherheit\r\nObst muss aufgefüllt und geschnitten werden\r\n\r\nSchönen Dienst,\r\nRoman', 1, '2023-05-17 13:46:23', '2023-05-17 13:46:23'),
(3, 'testtest', 'testtesttest awdawd', 2, '2023-05-17 13:50:28', '2023-05-17 15:37:20');

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
(1, 1),
(2, 1),
(3, 1);

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
(1, 2),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ingredients`
--

CREATE TABLE `ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `amount` int(11) NOT NULL,
  `measure` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `price`, `amount`, `measure`) VALUES
(1, 'testtest', '0.20', 1, 'cl'),
(2, 'testetestttest', '1.00', 2, 'cl');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ingredient_recipe`
--

CREATE TABLE `ingredient_recipe` (
  `recipe_id` bigint(20) UNSIGNED NOT NULL,
  `ingredient_id` bigint(20) UNSIGNED NOT NULL,
  `ingredient_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `ingredient_recipe`
--

INSERT INTO `ingredient_recipe` (`recipe_id`, `ingredient_id`, `ingredient_amount`) VALUES
(4, 1, 3),
(4, 2, 4),
(5, 2, 3);

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
(15, '2023_05_10_182913_handover_user', 1),
(16, '2023_05_11_183720_create_newspost_user_table', 1),
(17, '2023_05_12_124324_create_ingredients_table', 1),
(18, '2023_05_12_124425_create_ingredient_recipe_table', 1),
(19, '2023_05_15_164033_create_checklists_table', 1),
(20, '2023_05_15_164113_create_taskcategories_table', 1),
(21, '2023_05_15_164206_create_checklisttasks_table', 1),
(28, '2023_05_15_164258_create_checklist_checklisttask_table', 2),
(29, '2023_05_21_152221_create_rosters_table', 3),
(30, '2023_05_21_152222_create_weekdays_table', 3),
(31, '2023_05_21_152230_create_workingtimes_table', 3),
(32, '2023_05_21_152738_create_roster_workingtime_table', 3);

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
(1, 'Projektpräsentation', 'Hey, das ist ein Beispiel für die Projektpräsentation\r\n\r\nLG\r\nRoman', 1, '2023-05-17 15:44:59');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `newspost_user`
--

CREATE TABLE `newspost_user` (
  `newspost_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `newspost_user`
--

INSERT INTO `newspost_user` (`newspost_id`, `user_id`) VALUES
(1, 1),
(1, 2);

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
  `cost` decimal(7,2) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `recipes`
--

INSERT INTO `recipes` (`id`, `name`, `cost`, `user_id`, `category_id`) VALUES
(4, 'testtest', '4.60', 1, 1),
(5, 'küchen testr', '3.00', 1, 2);

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
-- Tabellenstruktur für Tabelle `rosters`
--

CREATE TABLE `rosters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `calenderweek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `roster_workingtime`
--

CREATE TABLE `roster_workingtime` (
  `roster_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `workingtime_id` bigint(20) UNSIGNED NOT NULL,
  `weekday_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `taskcategories`
--

CREATE TABLE `taskcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `taskcategories`
--

INSERT INTO `taskcategories` (`id`, `name`, `department_id`) VALUES
(1, 'Frühdienst', 1),
(2, 'Mitteldienst', 1),
(3, 'Spätdienst', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `taskcomments`
--

CREATE TABLE `taskcomments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `taskcomments`
--

INSERT INTO `taskcomments` (`id`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Habs kontrolliert, muss externe Firma kommen!', 3, '2023-05-17 13:48:03', '2023-05-17 13:48:03');

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
(1, 'admin', 'admin@gmail.com', '1998-03-03', '$2y$10$GAPlCXtQpc0y4Mt8OwT6Xu7pTpMQgCitDCv5gLm/SaB7Aupj56Vey', 1, 1, NULL, NULL),
(2, 'mitarbeiter', 'mitarbeiter@gmail.com', '1998-03-03', '$2y$10$AULfQLL7hyDx3vJ0CGGU5.WgjwMXxdmzqLchYUhpaq0tn5ZzI.cWi', 3, 1, NULL, NULL),
(3, 'Roman Ruisz', 'roman@ruisz.cc', '1997-09-03', '$2y$10$N9n6EsarwghmmCckEiciTOmOenLxVWUeeI3.aqzvWeMInZwQIp6Ji', 2, 1, '2023-05-17 12:45:50', '2023-05-18 14:36:37');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `weekdays`
--

CREATE TABLE `weekdays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `workingtimes`
--

CREATE TABLE `workingtimes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `checklists`
--
ALTER TABLE `checklists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checklists_department_id_foreign` (`department_id`);

--
-- Indizes für die Tabelle `checklisttasks`
--
ALTER TABLE `checklisttasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checklisttasks_taskcategory_id_foreign` (`taskcategory_id`);

--
-- Indizes für die Tabelle `checklist_checklisttask`
--
ALTER TABLE `checklist_checklisttask`
  ADD PRIMARY KEY (`checklist_id`,`checklisttask_id`),
  ADD KEY `checklist_checklisttask_checklisttask_id_foreign` (`checklisttask_id`);

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
-- Indizes für die Tabelle `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `ingredient_recipe`
--
ALTER TABLE `ingredient_recipe`
  ADD PRIMARY KEY (`recipe_id`,`ingredient_id`),
  ADD KEY `ingredient_recipe_ingredient_id_foreign` (`ingredient_id`);

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
-- Indizes für die Tabelle `newspost_user`
--
ALTER TABLE `newspost_user`
  ADD PRIMARY KEY (`newspost_id`,`user_id`),
  ADD KEY `newspost_user_user_id_foreign` (`user_id`);

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
-- Indizes für die Tabelle `rosters`
--
ALTER TABLE `rosters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rosters_department_id_foreign` (`department_id`);

--
-- Indizes für die Tabelle `roster_workingtime`
--
ALTER TABLE `roster_workingtime`
  ADD PRIMARY KEY (`roster_id`,`user_id`,`workingtime_id`,`weekday_id`),
  ADD KEY `roster_workingtime_user_id_foreign` (`user_id`),
  ADD KEY `roster_workingtime_workingtime_id_foreign` (`workingtime_id`),
  ADD KEY `roster_workingtime_weekday_id_foreign` (`weekday_id`);

--
-- Indizes für die Tabelle `taskcategories`
--
ALTER TABLE `taskcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `taskcategories_department_id_foreign` (`department_id`);

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
-- Indizes für die Tabelle `weekdays`
--
ALTER TABLE `weekdays`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `workingtimes`
--
ALTER TABLE `workingtimes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `checklists`
--
ALTER TABLE `checklists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT für Tabelle `checklisttasks`
--
ALTER TABLE `checklisttasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `engineeringtasks`
--
ALTER TABLE `engineeringtasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `handovers`
--
ALTER TABLE `handovers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT für Tabelle `newsposts`
--
ALTER TABLE `newsposts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `rosters`
--
ALTER TABLE `rosters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `taskcategories`
--
ALTER TABLE `taskcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `taskcomments`
--
ALTER TABLE `taskcomments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `weekdays`
--
ALTER TABLE `weekdays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `workingtimes`
--
ALTER TABLE `workingtimes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `checklists`
--
ALTER TABLE `checklists`
  ADD CONSTRAINT `checklists_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);

--
-- Constraints der Tabelle `checklisttasks`
--
ALTER TABLE `checklisttasks`
  ADD CONSTRAINT `checklisttasks_taskcategory_id_foreign` FOREIGN KEY (`taskcategory_id`) REFERENCES `taskcategories` (`id`);

--
-- Constraints der Tabelle `checklist_checklisttask`
--
ALTER TABLE `checklist_checklisttask`
  ADD CONSTRAINT `checklist_checklisttask_checklist_id_foreign` FOREIGN KEY (`checklist_id`) REFERENCES `checklists` (`id`),
  ADD CONSTRAINT `checklist_checklisttask_checklisttask_id_foreign` FOREIGN KEY (`checklisttask_id`) REFERENCES `checklisttasks` (`id`);

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
-- Constraints der Tabelle `ingredient_recipe`
--
ALTER TABLE `ingredient_recipe`
  ADD CONSTRAINT `ingredient_recipe_ingredient_id_foreign` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`id`),
  ADD CONSTRAINT `ingredient_recipe_recipe_id_foreign` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`);

--
-- Constraints der Tabelle `newsposts`
--
ALTER TABLE `newsposts`
  ADD CONSTRAINT `newsposts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints der Tabelle `newspost_user`
--
ALTER TABLE `newspost_user`
  ADD CONSTRAINT `newspost_user_newspost_id_foreign` FOREIGN KEY (`newspost_id`) REFERENCES `newsposts` (`id`),
  ADD CONSTRAINT `newspost_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints der Tabelle `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `recipes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints der Tabelle `rosters`
--
ALTER TABLE `rosters`
  ADD CONSTRAINT `rosters_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);

--
-- Constraints der Tabelle `roster_workingtime`
--
ALTER TABLE `roster_workingtime`
  ADD CONSTRAINT `roster_workingtime_roster_id_foreign` FOREIGN KEY (`roster_id`) REFERENCES `rosters` (`id`),
  ADD CONSTRAINT `roster_workingtime_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `roster_workingtime_weekday_id_foreign` FOREIGN KEY (`weekday_id`) REFERENCES `weekdays` (`id`),
  ADD CONSTRAINT `roster_workingtime_workingtime_id_foreign` FOREIGN KEY (`workingtime_id`) REFERENCES `workingtimes` (`id`);

--
-- Constraints der Tabelle `taskcategories`
--
ALTER TABLE `taskcategories`
  ADD CONSTRAINT `taskcategories_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);

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
