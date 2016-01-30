-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 30 Janvier 2016 à 18:07
-- Version du serveur :  10.1.9-MariaDB
-- Version de PHP :  7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_starwars`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Lasers', 'lasers', 'Armes lasers', '2016-01-15 12:11:47', '0000-00-00 00:00:00'),
(2, 'Casques', 'casques', 'Protection', '2016-01-15 12:11:47', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `number_card` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `number_command` smallint(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `address`, `number_card`, `number_command`, `created_at`, `updated_at`) VALUES
(1, 1, '01499 Jeremy Village\nSipestown, NY 08044', '4716513120920', 186, '2016-01-30 16:41:18', '2016-01-30 16:41:18'),
(2, 2, '536 Pfeffer Haven Apt. 160\nLake Schuylerchester, WI 09500-2746', '6011458008804696', 196, '2016-01-15 12:11:54', '2016-01-15 12:11:54'),
(3, 3, '7802 Flatley Meadow\nJohathanville, AL 83284', '5271983298433721', 28, '2016-01-15 12:11:54', '2016-01-15 12:11:54'),
(4, 4, '5369 Ondricka Street Suite 257\nSouth Celinefurt, TN 40850', '4024007132243535', 175, '2016-01-15 12:11:54', '2016-01-15 12:11:54'),
(5, 9, 'rue de la pie qui chante', '12563456789123456789', 2, '2016-01-27 08:52:55', '2016-01-27 08:52:55'),
(6, 10, 'rue de tutu', '1234567891', 4, '2016-01-28 09:34:25', '2016-01-28 09:34:25'),
(7, 11, 'rue', '12456389', 1, '2016-01-28 11:40:52', '2016-01-28 11:40:52');

-- --------------------------------------------------------

--
-- Structure de la table `histories`
--

CREATE TABLE `histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `cde_id` smallint(5) UNSIGNED NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `quantity` smallint(6) NOT NULL,
  `command_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('finalized','unfinalized') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'unfinalized',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `histories`
--

INSERT INTO `histories` (`id`, `product_id`, `customer_id`, `cde_id`, `price`, `quantity`, `command_at`, `status`, `created_at`, `updated_at`) VALUES
(2, 13, 1, 1, '416.74', 1, '2016-01-21 08:39:24', 'finalized', '2016-01-20 14:08:34', '2016-01-20 14:08:34'),
(3, 6, 1, 1, '1239.54', 1, '2016-01-21 08:39:29', 'finalized', '2016-01-20 14:08:34', '2016-01-20 14:08:34'),
(4, 13, 2, 2, '416.74', 1, '2016-01-21 10:29:03', 'finalized', '2016-01-20 14:16:43', '2016-01-20 14:16:43'),
(5, 6, 2, 2, '1239.54', 1, '2016-01-21 10:29:12', 'finalized', '2016-01-20 14:16:43', '2016-01-20 14:16:43'),
(6, 8, 3, 3, '671.49', 3, '2016-01-21 10:29:19', 'finalized', '2016-01-20 14:21:24', '2016-01-20 14:21:24'),
(8, 6, 1, 0, '1239.54', 1, '2016-01-21 20:04:42', 'finalized', '2016-01-21 20:04:42', '2016-01-21 20:04:42'),
(9, 6, 1, 4, '1239.54', 1, '2016-01-21 20:41:28', 'finalized', '2016-01-21 20:41:28', '2016-01-21 20:41:28'),
(10, 15, 1, 5, '194.91', 1, '2016-01-21 20:42:14', 'finalized', '2016-01-21 20:42:14', '2016-01-21 20:42:14'),
(11, 15, 1, 6, '194.91', 1, '2016-01-22 08:29:09', 'finalized', '2016-01-22 08:29:09', '2016-01-22 08:29:09'),
(12, 14, 1, 7, '526.17', 1, '2016-01-22 08:29:09', 'finalized', '2016-01-22 08:29:09', '2016-01-22 08:29:09'),
(13, 15, 1, 8, '194.91', 1, '2016-01-22 08:32:06', 'finalized', '2016-01-22 08:32:06', '2016-01-22 08:32:06'),
(14, 14, 1, 8, '526.17', 1, '2016-01-22 08:32:06', 'finalized', '2016-01-22 08:32:06', '2016-01-22 08:32:06'),
(15, 6, 2, 9, '1239.54', 1, '2016-01-22 09:05:53', 'finalized', '2016-01-22 09:05:53', '2016-01-22 09:05:53'),
(16, 14, 1, 10, '526.17', 1, '2016-01-22 15:04:46', 'finalized', '2016-01-22 15:04:46', '2016-01-22 15:04:46'),
(17, 11, 1, 11, '665.34', 1, '2016-01-22 15:15:15', 'finalized', '2016-01-22 15:15:15', '2016-01-22 15:15:15'),
(18, 13, 1, 12, '416.74', 1, '2016-01-22 15:18:31', 'finalized', '2016-01-22 15:18:31', '2016-01-22 15:18:31'),
(19, 15, 1, 13, '194.91', 1, '2016-01-22 15:19:16', 'finalized', '2016-01-22 15:19:16', '2016-01-22 15:19:16'),
(20, 13, 2, 14, '416.74', 4, '2016-01-24 13:08:16', 'finalized', '2016-01-24 13:08:16', '2016-01-24 13:08:16'),
(21, 15, 2, 14, '194.91', 1, '2016-01-24 13:08:16', 'finalized', '2016-01-24 13:08:16', '2016-01-24 13:08:16'),
(22, 15, 2, 15, '194.91', 1, '2016-01-25 12:11:46', 'finalized', '2016-01-25 12:11:46', '2016-01-25 12:11:46'),
(25, 7, 5, 16, '815.95', 6, '2016-01-26 10:38:41', 'finalized', '2016-01-26 10:38:41', '2016-01-26 10:38:41'),
(26, 15, 6, 17, '194.91', 2, '2016-01-26 10:56:05', 'finalized', '2016-01-26 10:56:05', '2016-01-26 10:56:05'),
(27, 15, 6, 18, '194.91', 3, '2016-01-26 10:56:31', 'finalized', '2016-01-26 10:56:31', '2016-01-26 10:56:31'),
(28, 11, 1, 19, '665.34', 1, '2016-01-26 11:10:23', 'finalized', '2016-01-26 11:10:23', '2016-01-26 11:10:23'),
(29, 22, 1, 20, '25.00', 3, '2016-01-26 23:31:41', 'finalized', '2016-01-26 23:31:41', '2016-01-26 23:31:41'),
(30, 11, 5, 21, '665.34', 3, '2016-01-27 08:52:24', 'finalized', '2016-01-27 08:52:24', '2016-01-27 08:52:24'),
(31, 15, 5, 22, '194.91', 4, '2016-01-27 08:52:55', 'finalized', '2016-01-27 08:52:55', '2016-01-27 08:52:55'),
(32, 15, 6, 23, '194.91', 1, '2016-01-27 10:12:54', 'finalized', '2016-01-27 10:12:54', '2016-01-27 10:12:54'),
(33, 14, 1, 24, '526.17', 5, '2016-01-27 10:14:58', 'finalized', '2016-01-27 10:14:58', '2016-01-27 10:14:58'),
(34, 7, 1, 25, '815.95', 1, '2016-01-27 10:32:58', 'finalized', '2016-01-27 10:32:58', '2016-01-27 10:32:58'),
(35, 15, 6, 26, '194.91', 2, '2016-01-28 08:36:26', 'finalized', '2016-01-28 08:36:26', '2016-01-28 08:36:26'),
(36, 12, 6, 27, '248.90', 5, '2016-01-28 08:39:52', 'finalized', '2016-01-28 08:39:52', '2016-01-28 08:39:52'),
(37, 14, 6, 28, '526.17', 11, '2016-01-28 09:34:24', 'finalized', '2016-01-28 09:34:24', '2016-01-28 09:34:24'),
(38, 15, 6, 28, '194.91', 1, '2016-01-28 09:34:25', 'finalized', '2016-01-28 09:34:25', '2016-01-28 09:34:25'),
(39, 22, 6, 28, '25.00', 19, '2016-01-28 09:34:25', 'finalized', '2016-01-28 09:34:25', '2016-01-28 09:34:25'),
(40, 9, 7, 29, '1772.35', 3, '2016-01-28 11:40:51', 'finalized', '2016-01-28 11:40:51', '2016-01-28 11:40:51'),
(41, 13, 1, 30, '416.74', 1, '2016-01-30 14:01:41', 'finalized', '2016-01-30 14:01:41', '2016-01-30 14:01:41'),
(42, 15, 1, 30, '194.91', 2, '2016-01-30 14:01:41', 'finalized', '2016-01-30 14:01:41', '2016-01-30 14:01:41'),
(43, 6, 1, 31, '1239.54', 1, '2016-01-30 16:41:18', 'finalized', '2016-01-30 16:41:18', '2016-01-30 16:41:18');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_12_30_100024_create_table_categories_table', 1),
('2015_12_30_101238_create_table_tags_table', 1),
('2015_12_30_110653_create_products_table', 1),
('2015_12_30_113939_create_pictures_table', 1),
('2015_12_30_115349_create_table_product_tag_table', 1),
('2015_12_30_133250_create_customers_table', 1),
('2015_12_30_133927_create_histories_table', 1),
('2015_12_30_140438_alter_pictures_table', 1),
('2016_01_12_104136_alter_products_table', 1),
('2016_01_12_111639_alter_categories_table', 1),
('2016_01_21_093053_alter_histories_table', 2);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `uri` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `size` smallint(6) NOT NULL,
  `type` enum('png','jpg','gif') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `pictures`
--

INSERT INTO `pictures` (`id`, `product_id`, `title`, `uri`, `size`, `type`, `created_at`, `updated_at`) VALUES
(6, 6, 'Mrs. Addison Huels MD', 'casque6.jpg', 0, 'png', '2016-01-17 12:09:10', '2016-01-15 12:11:51'),
(7, 7, 'Aliyah McDermott', 'casque7.jpg', 0, 'png', '2016-01-17 12:09:20', '2016-01-15 12:11:51'),
(8, 8, 'Garry Stanton', 'casque8.jpg', 0, 'png', '2016-01-17 12:09:57', '2016-01-15 12:11:52'),
(9, 9, 'Janae Lowe', 'lazer1.jpg', 0, 'png', '2016-01-17 12:10:22', '2016-01-15 12:11:52'),
(10, 10, 'Miss Yasmin Streich DDS', 'lazer2.jpg', 0, 'png', '2016-01-17 12:10:36', '2016-01-15 12:11:52'),
(11, 11, 'Macie Wiza', 'lazer3.jpg', 0, 'png', '2016-01-17 12:10:47', '2016-01-15 12:11:53'),
(12, 12, 'Dr. Marisa Hodkiewicz', 'lazer4.jpg', 0, 'png', '2016-01-17 12:11:03', '2016-01-15 12:11:53'),
(13, 13, 'Prof. Reed Ebert', 'lazer5.jpg', 0, 'png', '2016-01-17 12:11:21', '2016-01-15 12:11:53'),
(14, 14, 'Alvera Klein', 'lazer6.jpg', 0, 'png', '2016-01-17 12:11:35', '2016-01-15 12:11:53'),
(15, 15, 'Mr. Frank Jenkins II', 'lazer7.jpg', 0, 'png', '2016-01-17 12:11:51', '2016-01-15 12:11:54'),
(21, 17, '', 'qU6mll8tYhaJ.jpg', 32767, 'jpg', '2016-01-22 14:11:08', '2016-01-22 14:11:08'),
(22, 18, '', 'AuaDpcSzalv9.jpg', 32767, 'jpg', '2016-01-26 23:19:53', '2016-01-26 23:19:53'),
(23, 19, '', '1PGjchFx3BHp.jpg', 32767, 'jpg', '2016-01-26 23:22:43', '2016-01-26 23:22:43'),
(24, 20, '', 'zinluMBW0tdc.jpg', 18186, 'jpg', '2016-01-26 23:24:38', '2016-01-26 23:24:38'),
(25, 21, '', 'ZMfPCpJ3nNSC.jpg', 13166, 'jpg', '2016-01-26 23:26:46', '2016-01-26 23:26:46'),
(26, 22, '', 'YM6YnpmH66CZ.jpg', 32767, 'jpg', '2016-01-26 23:28:35', '2016-01-26 23:28:35');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `abstract` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `quantity` smallint(5) UNSIGNED NOT NULL,
  `status` enum('opened','closed') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'opened',
  `published_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `abstract`, `content`, `price`, `quantity`, `status`, `published_at`, `created_at`, `updated_at`) VALUES
(6, 2, 'Casque gris', 'mrs-renee-terry-dds', 'Casque soldat gris', 'casque gris des soldats interieur velour avec aeration.', '1239.54', 49, 'opened', '2016-06-12 15:30:24', '2016-01-30 16:41:18', '2016-01-30 16:41:18'),
(7, 2, 'Lot casque', 'alexa-kozey', 'Lot de casque dark vador', 'Casque dark vador et d''un soldat avec double aeration', '815.95', 6, 'opened', '2016-06-06 22:15:58', '2016-01-26 21:15:58', '2016-01-26 21:15:58'),
(8, 2, 'Casque communication', 'jovanny-kub-iv', 'Casque de communication d''aviateur ', 'casque des pilote d''avion de la ligue fonctionne sur secteur', '671.49', 100, 'opened', '2015-07-07 22:17:20', '2016-01-26 21:17:20', '2016-01-26 21:17:20'),
(9, 1, 'Lot lazers', 'sylvester-connelly', 'Lot de 3 lazers', 'Lot de trois lazers de couleur différentes fonctionne sur piles', '1772.35', 11, 'opened', '2016-08-08 22:18:54', '2016-01-28 11:40:52', '2016-01-28 11:40:52'),
(10, 1, 'Triple lazer', 'dr-cassie-ebert-md', 'Lazer trois branshes', 'Lazer trois branches de couleur roses', '1450.28', 10, 'opened', '2016-09-09 22:19:54', '2016-01-26 21:19:54', '2016-01-26 21:19:54'),
(11, 1, 'Mini lazer', 'mauricio-simonis', 'Petit lazer de 15cm bleu', 'Petit lazer de couleur bleu 15cm umiere sombre fonctionne à piles', '665.34', 50, 'opened', '2016-10-10 22:21:20', '2016-01-26 21:21:20', '2016-01-26 21:21:20'),
(12, 1, 'Lazer bleu', 'luigi-daniel', 'Lazer bleu sous blister', 'Lazer bleu à interrupteur rechargeable pile non fournit manche en metal', '248.90', 0, 'opened', '2016-11-11 22:22:40', '2016-01-28 08:39:52', '2016-01-28 08:39:52'),
(13, 1, 'Double lazer rouge', 'alta-wisozk', 'Double lazer de la league', 'Double lazer rouge avec poignée en metal rechargeable 55 cm', '416.74', 2, 'opened', '2016-12-12 22:23:49', '2016-01-30 14:01:41', '2016-01-30 14:01:41'),
(14, 1, 'Lazer rouge', 'jovani-macejkovic', 'Lazer rouge 75cm', 'Lazer rouge 75cm telescopique à pile (non fournit)', '526.17', 0, 'opened', '2016-12-13 22:25:21', '2016-01-28 09:34:25', '2016-01-28 09:34:25'),
(15, 1, 'Lazer argenté bleu', 'iliana-swift', 'Lazer métal bleu avec interrupteur', 'Lazer avec interrupteur en métal de lumiere vive bleu', '194.91', 10, 'opened', '2016-12-25 22:26:44', '2016-01-30 14:01:41', '2016-01-30 14:01:41'),
(17, 2, 'Casque noir dark vador', '', 'casque noir de dark vador en plastique', 'casque en plastique noir, intérieur velour lavable en machine', '15.00', 50, 'opened', '2016-01-22 17:42:07', '2016-01-30 16:42:07', '2016-01-30 16:42:07'),
(18, 2, 'Casque android aviateur', '', 'Casque vert d''aviateur de la league android', 'Casque vert en plastique interrieur en velour noir avec aeration ', '152.00', 15, 'opened', '2000-11-25 00:20:43', '2016-01-26 23:20:43', '2016-01-26 23:20:43'),
(19, 2, 'casque pilote league', '', 'casque pilote league taille small', 'casque pilote league vert taille small  avec aeration sur les côtés et interieurs en mousse', '245.00', 15, 'opened', '2014-12-12 00:22:43', '2016-01-26 23:22:43', '2016-01-26 23:22:43'),
(20, 2, 'casque gardien rouge', '', 'casque gariden rouge en silicone', 'casque gardien rouge en silicone sans aeration ', '50.00', 145, 'closed', '2016-04-04 00:24:38', '2016-01-30 14:31:54', '2016-01-30 14:31:54'),
(21, 1, 'Stylos en forme de lazer', '', 'stylo en forme de lazer de plusieurs couleur', 'Ensemble de stylos en forme de lazer de la ligue de lumiere vive en plastique', '25.00', 50, 'opened', '2015-11-12 00:26:46', '2016-01-26 23:26:46', '2016-01-26 23:26:46'),
(22, 1, 'Stylo bille lazer', '', 'Stylos bille en forme de lazer', 'Ensemble de stylos bille 4 couleurs en plastique qui eblouise dans la nuit', '25.00', 31, 'opened', '0000-00-00 00:00:00', '2016-01-28 09:34:25', '2016-01-28 09:34:25');

-- --------------------------------------------------------

--
-- Structure de la table `product_tag`
--

CREATE TABLE `product_tag` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `product_tag`
--

INSERT INTO `product_tag` (`product_id`, `tag_id`) VALUES
(6, 2),
(6, 4),
(7, 2),
(7, 4),
(7, 5),
(7, 12),
(8, 1),
(8, 3),
(8, 11),
(9, 3),
(9, 4),
(9, 6),
(9, 12),
(10, 3),
(10, 4),
(10, 7),
(10, 14),
(11, 3),
(11, 6),
(11, 10),
(11, 13),
(12, 6),
(12, 10),
(12, 13),
(13, 3),
(13, 8),
(13, 10),
(13, 13),
(14, 3),
(14, 4),
(14, 7),
(14, 15),
(15, 6),
(15, 10),
(15, 13),
(17, 2),
(17, 4),
(17, 5),
(18, 1),
(18, 3),
(18, 4),
(19, 1),
(19, 3),
(20, 4),
(21, 4),
(21, 6),
(21, 9),
(21, 12),
(22, 4),
(22, 6),
(22, 9);

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pilote', '2016-01-26 21:02:18', '2016-01-15 12:11:48'),
(2, 'Soldat', '2016-01-26 21:01:50', '2016-01-15 12:11:48'),
(3, 'League', '2016-01-26 21:02:03', '2016-01-15 12:11:48'),
(4, 'Plastique', '2016-01-26 21:03:21', '2016-01-15 12:11:48'),
(5, 'Dark vador', '2016-01-26 21:03:45', '2016-01-15 12:11:48'),
(6, 'Lumière vive', '2016-01-26 21:04:10', '2016-01-15 12:11:48'),
(7, 'Lumière sombre', '2016-01-26 21:04:28', '2016-01-15 12:11:48'),
(8, 'Double faiseau', '2016-01-26 21:04:49', '2016-01-15 12:11:48'),
(9, 'Accessoire', '2016-01-26 21:04:57', '2016-01-15 12:11:48'),
(10, 'Métal', '2016-01-26 21:05:12', '2016-01-15 12:11:48'),
(11, 'Communication', '2016-01-26 21:06:28', '2016-01-15 12:11:48'),
(12, 'Pack', '2016-01-26 21:07:44', '2016-01-15 12:11:48'),
(13, 'Interrupteur', '2016-01-26 21:08:10', '2016-01-15 12:11:48'),
(14, 'Triple faiseau', '2016-01-26 21:08:22', '2016-01-15 12:11:48'),
(15, 'Telescopique', '2016-01-26 21:09:15', '2016-01-15 12:11:48');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('administrator','editor','author','visitor') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'visitor',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'lolo', 'lolo@lolo.fr', '$2y$10$FCGsBndU5O.wAyh2QDGpyewTHzjwTp0T4D3JS5SnQiWw/clH6BhAm', 'administrator', 'lK9elHItyK3hSb3wwSrIpsXaVIPqmSsYrzHfl8DypZDBvywkwRNXrJ8CpKla', '2016-01-30 16:02:57', '2016-01-30 16:02:57'),
(2, 'tony', 'tony@tony.fr', '$2y$10$2Z2tBisjbzra7mSNO881feA4WICEUywm90cT1zxsyl7kgFYDAV6du', 'visitor', 'MHLyvhGmIOM8Gb1MgOchcSMTLZymjMWea09lmhiPgrgG6aqhqauxkBPMUdfl', '2016-01-26 09:06:03', '2016-01-26 09:06:03'),
(3, 'romain', 'romain@romain.fr', '$2y$10$.Y8fkG6qzCw7Ti1ZjnZzxOTBWGaawLtj2R1v.Qm.YKoleuItFYp1q', 'visitor', NULL, '2016-01-15 12:11:47', '0000-00-00 00:00:00'),
(4, 'yini', 'yini@yini.fr', '$2y$10$.142/JoOL.PnWyr6q0xtq./I/U3.WxIuYUSZW53BXo8LQakeg/PuC', 'visitor', NULL, '2016-01-15 12:11:47', '0000-00-00 00:00:00'),
(9, 'titi', 'titi@titi.fr', '$2y$10$4uNQcOgNOYrVVpUj7Np91Of0M4yOJyDTFBsV3L5lvXJ0zJVTsGGKm', 'visitor', 'HqVaA2Z218QqUFl39tDCdN8F2AGPr3x55WyepeNou1hnmex4PgqyQtJdx31i', '2016-01-27 10:00:31', '2016-01-27 10:00:31'),
(10, 'tutu', 'tutu@tutu.fr', '$2y$10$PNivl1OEvQ9uzEpRvfdGDuVqwjOmDhxZFcxTviBt1Tz/Z3LgNt7pa', 'visitor', 'WB5hEuu21SOgOYXC58c4ngSYbWYv9wsUw42fg9IbKUgM9Cu08mvo0vhrGjQ8', '2016-01-28 10:03:27', '2016-01-28 10:03:27'),
(11, 'tata', 'tata@tata.fr', '$2y$10$t6oPFO3VQfF0qmCDGq.dvu291H7pbl53C9.ubmFTcM0Pbe0kbXHCS', 'visitor', 'Oa02MaBCEwD7e63G0yO627VoJA2aKUIaPmjkrKwZ5lTtTmRugEf72qK3IlLH', '2016-01-28 11:42:04', '2016-01-28 11:42:04');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_user_id_unique` (`user_id`);

--
-- Index pour la table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `histories_product_id_foreign` (`product_id`),
  ADD KEY `histories_customer_id_foreign` (`customer_id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Index pour la table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pictures_product_id_foreign` (`product_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Index pour la table `product_tag`
--
ALTER TABLE `product_tag`
  ADD UNIQUE KEY `product_tag_product_id_tag_id_unique` (`product_id`,`tag_id`),
  ADD KEY `product_tag_tag_id_foreign` (`tag_id`);

--
-- Index pour la table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT pour la table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `histories`
--
ALTER TABLE `histories`
  ADD CONSTRAINT `histories_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `histories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `pictures_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `product_tag`
--
ALTER TABLE `product_tag`
  ADD CONSTRAINT `product_tag_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
