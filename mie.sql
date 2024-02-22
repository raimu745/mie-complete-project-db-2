-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2024 at 02:35 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mie`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s2_title` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `s2_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `description`, `image`, `s2_title`, `created_at`, `updated_at`, `s2_description`) VALUES
(1, 'Life Begins At The End Of Your Comfort Zone .13', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like2).</p>', '1661183153.jpg', 'Life Begins At The End Of Your Comfort Zone', '2022-08-15 19:57:25', '2022-08-23 22:01:21', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Harum labore sed, veniam nisi sunt laboriosam ducimus, odio aspernatur fugiat minima blanditiis dignissimos.</p>\r\n\r\n<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Harum labore sed, veniam nisi sunt laboriosam ducimus, odio aspernatur fugiat minima blanditiis dignissimos welll.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `api_keys`
--

CREATE TABLE `api_keys` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `api_keys`
--

INSERT INTO `api_keys` (`id`, `name`, `key`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'app1', 'aL99oJGpYH89qPbji6b9lzhKUnRHxiFsxbPasxhALNzkqVeXZS4jIpxGVu0s5cpX', 1, '2022-08-26 13:31:47', '2022-08-26 13:31:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `api_key_access_events`
--

CREATE TABLE `api_key_access_events` (
  `id` int(10) UNSIGNED NOT NULL,
  `api_key_id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `api_key_access_events`
--

INSERT INTO `api_key_access_events` (`id`, `api_key_id`, `ip_address`, `url`, `created_at`, `updated_at`) VALUES
(1, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/data', '2022-08-26 13:43:24', '2022-08-26 13:43:24'),
(2, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/data', '2022-08-26 13:45:47', '2022-08-26 13:45:47'),
(3, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/data', '2022-08-26 14:15:50', '2022-08-26 14:15:50'),
(4, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/data', '2022-08-26 14:24:23', '2022-08-26 14:24:23'),
(5, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/data', '2022-08-26 14:24:32', '2022-08-26 14:24:32'),
(6, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/data', '2022-08-26 14:38:18', '2022-08-26 14:38:18'),
(7, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/data', '2022-08-26 14:41:20', '2022-08-26 14:41:20'),
(8, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/data', '2022-08-26 15:08:27', '2022-08-26 15:08:27'),
(9, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/data', '2022-08-29 16:12:52', '2022-08-29 16:12:52'),
(10, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/data', '2022-08-29 16:19:11', '2022-08-29 16:19:11'),
(11, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/data', '2022-08-29 16:22:06', '2022-08-29 16:22:06'),
(12, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/team_add', '2022-08-29 17:02:15', '2022-08-29 17:02:15'),
(13, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/team_add', '2022-08-29 17:04:08', '2022-08-29 17:04:08'),
(14, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/team_add', '2022-08-29 17:13:01', '2022-08-29 17:13:01'),
(15, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/team_add', '2022-08-29 17:16:17', '2022-08-29 17:16:17'),
(16, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/team_add', '2022-08-29 17:16:26', '2022-08-29 17:16:26'),
(17, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/team_add', '2022-08-29 17:19:16', '2022-08-29 17:19:16'),
(18, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/team_add', '2022-08-29 17:19:48', '2022-08-29 17:19:48'),
(19, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/team_add', '2022-08-29 17:35:58', '2022-08-29 17:35:58'),
(20, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/team_add', '2022-08-29 17:37:39', '2022-08-29 17:37:39'),
(21, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/team_add', '2022-08-29 17:39:52', '2022-08-29 17:39:52'),
(22, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/team_add', '2022-08-29 17:40:19', '2022-08-29 17:40:19'),
(23, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/team_add', '2022-08-29 17:42:40', '2022-08-29 17:42:40'),
(24, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/team_add', '2022-08-29 17:44:16', '2022-08-29 17:44:16'),
(25, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/team_delete', '2022-08-29 22:40:58', '2022-08-29 22:40:58'),
(26, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/team_delete', '2022-08-29 22:48:52', '2022-08-29 22:48:52'),
(27, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/team_delete', '2022-08-29 22:49:44', '2022-08-29 22:49:44'),
(28, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/team_delete', '2022-08-29 22:49:55', '2022-08-29 22:49:55'),
(29, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/team_delete', '2022-08-29 22:51:03', '2022-08-29 22:51:03'),
(30, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/team_delete', '2022-08-29 22:58:40', '2022-08-29 22:58:40'),
(31, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/team_delete', '2022-08-29 23:09:48', '2022-08-29 23:09:48'),
(32, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/update', '2022-08-30 15:51:49', '2022-08-30 15:51:49'),
(33, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/update', '2022-08-30 15:55:44', '2022-08-30 15:55:44'),
(34, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/update', '2022-08-30 15:58:47', '2022-08-30 15:58:47'),
(35, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/update', '2022-08-30 15:59:45', '2022-08-30 15:59:45'),
(36, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/update', '2022-08-30 16:03:11', '2022-08-30 16:03:11'),
(37, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/update', '2022-08-30 16:03:20', '2022-08-30 16:03:20'),
(38, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/update', '2022-08-30 16:03:33', '2022-08-30 16:03:33'),
(39, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/update', '2022-08-30 16:04:13', '2022-08-30 16:04:13'),
(40, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/update', '2022-08-30 16:12:26', '2022-08-30 16:12:26'),
(41, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/update', '2022-08-30 16:30:34', '2022-08-30 16:30:34'),
(42, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/update', '2022-08-30 16:39:57', '2022-08-30 16:39:57'),
(43, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/update', '2022-08-30 16:42:49', '2022-08-30 16:42:49'),
(44, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/update', '2022-08-30 16:45:26', '2022-08-30 16:45:26'),
(45, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/update', '2022-08-30 16:46:59', '2022-08-30 16:46:59'),
(46, 1, '127.0.0.1', 'http://127.0.0.1:8000/api/update', '2022-08-30 16:50:04', '2022-08-30 16:50:04');

-- --------------------------------------------------------

--
-- Table structure for table `api_key_admin_events`
--

CREATE TABLE `api_key_admin_events` (
  `id` int(10) UNSIGNED NOT NULL,
  `api_key_id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `api_key_admin_events`
--

INSERT INTO `api_key_admin_events` (`id`, `api_key_id`, `ip_address`, `event`, `created_at`, `updated_at`) VALUES
(1, 1, '127.0.0.1', 'created', '2022-08-26 13:31:47', '2022-08-26 13:31:47');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0/pending,1/answer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reply` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `status`, `created_at`, `updated_at`, `reply`) VALUES
(3, 'sher ali', 'sher@gmail.com', '0123456', 'yeah,it ok to be here 222', 1, '2022-08-16 09:50:11', '2022-08-17 18:29:13', '<p>ok sher ali best of luck</p>'),
(7, 'jani ', 'jani22@gmail.com', '0777777722', 'jani is a good boy he is passionate with his work with diginity and hard-work', 1, '2022-08-16 09:50:11', '2022-08-17 18:31:21', 'nice to meet you jani'),
(10, 'Umair', 'umairuafmcs300@gmail.com', '03076961632', 'Hi team i want to  get info about uk  study visa .', 1, '2022-08-17 12:14:57', '2022-08-17 19:36:09', '<p><strong>Assalumoalikum</strong></p>\r\n\r\n<p>How are You&amp;amp;nbsp; dear we will&amp;amp;nbsp; contact back&amp;amp;nbsp; to&amp;amp;nbsp; soon busy going on</p>'),
(11, 'Muhammmad Abbas', 'ma5209895@gmail.com', '82398428794', 'Hi Team I want to get info about UK study visa', 1, '2022-08-17 12:37:03', '2022-08-17 22:50:37', '<p>ki kr rya</p>'),
(12, 'Mohsin g', 'mohsing523@gmail.com', '657142734157357', 'hello  theam ', 1, '2022-08-17 15:51:18', '2022-08-17 22:53:34', '<p>g mohin how are you</p>'),
(13, 'Umair Jani', 'umairuafmcs300@gmail.com', '03076961632', 'Hi team i want to  get info about uk  study visa .', 1, '2022-08-19 12:14:57', '2022-08-20 00:48:07', '<p>kasdkajdadasda</p>'),
(17, 'Abbas', 'ma5209895@gmail.com', '03074791848', 'Hi Team How are you  i want to  know about uk  study visa can you  tell me about', 1, '2022-08-22 22:33:26', '2022-08-23 22:36:22', '<p>yes u r coming soon dear take it easy</p>'),
(21, 'Syed sher ali shah', 'syedshairali66@gmail.com', '03481646743', 'sir kindly you can guid me about uk study visa', 0, '2022-09-06 17:55:31', '2022-09-06 17:55:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'United Kingdom', '2022-08-18 20:16:09', '2022-08-18 20:16:09'),
(2, 'Paris', '2022-08-18 20:16:49', '2022-08-18 20:16:49'),
(3, 'Australia', '2022-08-19 22:30:15', '2022-08-19 22:30:15'),
(4, 'Germany', '2022-08-19 22:32:40', '2022-08-19 22:32:40'),
(5, 'France', '2022-08-19 22:34:12', '2022-08-19 22:34:12'),
(6, 'Usa', '2022-08-19 22:37:34', '2022-08-19 22:37:34'),
(7, 'africa', '2022-08-22 20:26:25', '2022-08-22 22:26:35'),
(8, 'pakistan updat', '2022-08-22 22:41:32', '2022-08-22 23:29:51'),
(9, 'Italy', '2022-08-23 20:57:19', '2022-08-23 20:57:19');

-- --------------------------------------------------------

--
-- Table structure for table `country_des`
--

CREATE TABLE `country_des` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `intake` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country_des`
--

INSERT INTO `country_des` (`id`, `title`, `description`, `country_id`, `intake`, `created_at`, `updated_at`) VALUES
(1, 'Uk Study Info', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, '2022-09-19', '2022-08-18 20:31:51', '2022-08-18 20:31:51'),
(2, 'life is a journey', '<p>hey dear</p>', 2, '2022-08-15', '2022-08-18 22:09:56', '2022-08-18 22:09:56'),
(3, 'Its about australia', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 3, '2022-08-20', '2022-08-19 22:31:46', '2022-08-19 22:31:46'),
(4, 'its about german langauage', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 4, '2022-08-25', '2022-08-19 22:33:38', '2022-08-19 22:33:38'),
(5, 'its about france culture', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 5, '2022-08-26', '2022-08-19 22:35:21', '2022-08-19 22:35:21'),
(6, 'about usa', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 6, '2022-08-27', '2022-08-19 22:38:28', '2022-08-19 22:38:28'),
(7, 'about usa', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 6, '2022-08-27', '2022-08-22 16:30:08', '2022-08-22 16:35:05'),
(8, 'pakistan  is cultural country', '<p>hi pakistan.......</p>', 8, '2022-08-27', '2022-08-22 22:44:24', '2022-08-22 22:44:59'),
(9, 'be careful life is beautiful and gorgious', '<p>hi budddy 2</p>', 8, '2022-08-18', '2022-08-23 21:59:32', '2022-08-23 22:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `country_images`
--

CREATE TABLE `country_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country_images`
--

INSERT INTO `country_images` (`id`, `image`, `country_id`, `created_at`, `updated_at`) VALUES
(1, '1660828569-g1.jpg', 1, '2022-08-18 20:16:09', '2022-08-18 20:16:09'),
(2, '1660828569-g3.jpg', 1, '2022-08-18 20:16:09', '2022-08-18 20:16:09'),
(3, '1660828609-g2.jpg', 2, '2022-08-18 20:16:49', '2022-08-18 20:16:49'),
(4, '1660828609-g5.jpg', 2, '2022-08-18 20:16:49', '2022-08-18 20:16:49'),
(5, '1660923015-g4.jpg', 3, '2022-08-19 22:30:15', '2022-08-19 22:30:15'),
(6, '1660923015-g7.jpg', 3, '2022-08-19 22:30:15', '2022-08-19 22:30:15'),
(7, '1660923160-g6.jpg', 4, '2022-08-19 22:32:40', '2022-08-19 22:32:40'),
(8, '1660923160-g5.jpg', 4, '2022-08-19 22:32:40', '2022-08-19 22:32:40'),
(9, '1660923252-g9.jpg', 5, '2022-08-19 22:34:12', '2022-08-19 22:34:12'),
(10, '1660923252-g10.jpg', 5, '2022-08-19 22:34:12', '2022-08-19 22:34:12'),
(11, '1660923454-g2.jpg', 6, '2022-08-19 22:37:34', '2022-08-19 22:37:34'),
(12, '1660923454-g8.jpg', 6, '2022-08-19 22:37:34', '2022-08-19 22:37:34'),
(14, '1661174785-flag.jpg', 7, '2022-08-22 20:26:25', '2022-08-22 20:26:25'),
(15, '1661174804-play.png', 7, '2022-08-22 20:26:44', '2022-08-22 20:26:44'),
(16, '1661181995-g8.jpg', 7, '2022-08-22 22:26:35', '2022-08-22 22:26:35'),
(17, '1661182892-hd-wallpaper-ga2017de63_1280.jpg', 8, '2022-08-22 22:41:32', '2022-08-22 22:41:32'),
(18, '1661182892-muenster-g21244fdf5_1280.jpg', 8, '2022-08-22 22:41:32', '2022-08-22 22:41:32'),
(19, '1661182914-mandalas-ga0a6f113e_1280.jpg', 8, '2022-08-22 22:41:54', '2022-08-22 22:41:54'),
(20, '1661263039-building-g79e3e7dab_1280.jpg', 9, '2022-08-23 20:57:19', '2022-08-23 20:57:19');

-- --------------------------------------------------------

--
-- Table structure for table `country_visitors`
--

CREATE TABLE `country_visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country_visitors`
--

INSERT INTO `country_visitors` (`id`, `ip_address`, `country_name`, `country_code`, `region_code`, `region_name`, `city_name`, `zip_code`, `latitude`, `longitude`, `area_code`, `country_id`, `created_at`, `updated_at`) VALUES
(1, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 1, '2022-08-18 23:41:16', '2022-08-18 23:41:16'),
(2, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 2, '2022-08-18 23:41:21', '2022-08-18 23:41:21'),
(3, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 1, '2022-08-19 17:14:53', '2022-08-19 17:14:53'),
(4, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 1, '2022-08-19 17:14:57', '2022-08-19 17:14:57'),
(5, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 2, '2022-08-19 17:15:14', '2022-08-19 17:15:14'),
(6, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 2, '2022-08-19 17:15:17', '2022-08-19 17:15:17'),
(7, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 2, '2022-08-19 17:15:21', '2022-08-19 17:15:21'),
(8, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 2, '2022-08-19 17:15:24', '2022-08-19 17:15:24'),
(9, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 2, '2022-08-19 17:15:28', '2022-08-19 17:15:28'),
(10, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 2, '2022-08-19 17:15:35', '2022-08-19 17:15:35'),
(11, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 4, '2022-08-19 22:42:02', '2022-08-19 22:42:02'),
(12, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 1, '2022-08-19 22:42:12', '2022-08-19 22:42:12'),
(13, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 1, '2022-08-19 22:42:41', '2022-08-19 22:42:41'),
(14, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 1, '2022-08-19 22:42:44', '2022-08-19 22:42:44'),
(15, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 1, '2022-08-19 22:42:48', '2022-08-19 22:42:48'),
(16, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 1, '2022-08-19 22:42:51', '2022-08-19 22:42:51'),
(17, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 1, '2022-08-19 22:42:55', '2022-08-19 22:42:55'),
(18, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 1, '2022-08-19 22:42:58', '2022-08-19 22:42:58'),
(19, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 3, '2022-08-19 22:44:05', '2022-08-19 22:44:05'),
(20, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 3, '2022-08-19 22:44:10', '2022-08-19 22:44:10'),
(21, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 3, '2022-08-19 22:44:14', '2022-08-19 22:44:14'),
(22, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 3, '2022-08-19 22:52:18', '2022-08-19 22:52:18'),
(23, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 3, '2022-08-19 22:56:30', '2022-08-19 22:56:30'),
(24, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 4, '2022-08-19 22:56:45', '2022-08-19 22:56:45'),
(25, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 4, '2022-08-19 23:08:14', '2022-08-19 23:08:14'),
(26, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 4, '2022-08-19 23:09:19', '2022-08-19 23:09:19'),
(27, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 4, '2022-08-19 23:12:09', '2022-08-19 23:12:09'),
(28, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 4, '2022-08-19 23:15:34', '2022-08-19 23:15:34'),
(29, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 4, '2022-08-19 23:15:52', '2022-08-19 23:15:52'),
(30, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 4, '2022-08-19 23:16:32', '2022-08-19 23:16:32'),
(31, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 4, '2022-08-19 23:22:54', '2022-08-19 23:22:54'),
(32, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 4, '2022-08-19 23:23:31', '2022-08-19 23:23:31'),
(33, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 4, '2022-08-19 23:24:48', '2022-08-19 23:24:48'),
(34, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 4, '2022-08-19 23:25:02', '2022-08-19 23:25:02'),
(35, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 4, '2022-08-19 23:33:14', '2022-08-19 23:33:14'),
(36, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 4, '2022-08-19 23:33:18', '2022-08-19 23:33:18'),
(37, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 4, '2022-08-19 23:38:06', '2022-08-19 23:38:06'),
(38, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 3, '2022-08-19 23:38:14', '2022-08-19 23:38:14'),
(39, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 3, '2022-08-19 23:38:27', '2022-08-19 23:38:27'),
(40, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 3, '2022-08-19 23:46:23', '2022-08-19 23:46:23'),
(41, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 5, '2022-08-19 23:46:35', '2022-08-19 23:46:35'),
(42, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 5, '2022-08-19 23:48:23', '2022-08-19 23:48:23'),
(43, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 5, '2022-08-19 23:49:23', '2022-08-19 23:49:23'),
(44, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 5, '2022-08-19 23:49:29', '2022-08-19 23:49:29'),
(45, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 5, '2022-08-19 23:50:30', '2022-08-19 23:50:30'),
(46, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 5, '2022-08-19 23:51:12', '2022-08-19 23:51:12'),
(47, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 5, '2022-08-19 23:51:30', '2022-08-19 23:51:30'),
(48, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 5, '2022-08-19 23:53:16', '2022-08-19 23:53:16'),
(49, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 5, '2022-08-19 23:53:50', '2022-08-19 23:53:50'),
(50, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 2, '2022-08-20 00:18:17', '2022-08-20 00:18:17'),
(51, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 2, '2022-08-20 00:18:45', '2022-08-20 00:18:45'),
(52, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 1, '2022-08-20 00:48:49', '2022-08-20 00:48:49'),
(53, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 5, '2022-08-20 00:48:58', '2022-08-20 00:48:58'),
(54, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 7, '2022-08-22 22:25:42', '2022-08-22 22:25:42'),
(55, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 6, '2022-08-22 22:29:29', '2022-08-22 22:29:29'),
(56, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 1, '2022-08-23 23:29:04', '2022-08-23 23:29:04'),
(57, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 1, '2022-08-23 23:31:09', '2022-08-23 23:31:09'),
(58, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 1, '2022-08-23 23:38:00', '2022-08-23 23:38:00'),
(59, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 1, '2022-08-23 23:49:34', '2022-08-23 23:49:34'),
(60, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 1, '2022-08-23 23:51:21', '2022-08-23 23:51:21'),
(61, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 1, '2022-08-23 23:52:15', '2022-08-23 23:52:15'),
(62, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 1, '2022-08-23 23:58:49', '2022-08-23 23:58:49'),
(63, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 1, '2022-08-24 00:01:22', '2022-08-24 00:01:22'),
(64, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 4, '2022-08-24 00:05:31', '2022-08-24 00:05:31'),
(65, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 1, '2022-08-24 00:06:15', '2022-08-24 00:06:15'),
(66, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 1, '2022-08-24 17:56:21', '2022-08-24 17:56:21'),
(67, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 3, '2022-09-06 18:00:35', '2022-09-06 18:00:35'),
(68, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 3, '2022-09-06 18:01:25', '2022-09-06 18:01:25'),
(69, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 1, '2022-09-06 22:32:15', '2022-09-06 22:32:15'),
(70, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 1, '2022-09-06 22:32:29', '2022-09-06 22:32:29'),
(71, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 1, '2022-09-06 22:32:48', '2022-09-06 22:32:48'),
(72, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 2, '2022-09-06 22:33:06', '2022-09-06 22:33:06'),
(73, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', 3, '2022-09-06 22:36:14', '2022-09-06 22:36:14'),
(74, '103.7.78.173', 'Pakistan', 'PK', 'IS', 'Islamabad', 'Islamabad', '45700', '33.6035', '73.1644', 'IS', 1, '2022-09-13 22:51:29', '2022-09-13 22:51:29');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_22_132832_create_sliders_table', 1),
(6, '2022_06_23_085856_create_visitors_table', 1),
(7, '2022_06_24_102033_create_sliders_table', 2),
(8, '2022_07_13_084523_create_countries_table', 3),
(9, '2022_07_13_114951_create_country_des_table', 4),
(11, '2022_07_18_084449_create_country_images_table', 5),
(12, '2022_08_05_124844_add_colum_in_countrydes_table', 6),
(13, '2022_08_15_122544_create_abouts_table', 7),
(15, '2022_08_15_160248_create_settings_table', 8),
(16, '2022_08_16_101134_create_teams_table', 9),
(17, '2022_08_16_125700_create_contacts_table', 10),
(18, '2022_08_17_112118_add_field_reply_in_contacts', 11),
(19, '2022_08_17_152946_create_site_visitors_table', 12),
(21, '2022_08_18_150224_create_country_visitors_table', 13),
(22, '2022_08_22_094429_add_fiels_in_abouts_table', 14),
(23, '2016_12_28_111110_create_api_keys_table', 15),
(24, '2016_12_28_111111_create_api_key_access_events_table', 15),
(25, '2016_12_28_111112_create_api_key_admin_events_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_nbr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `email`, `address`, `phone_nbr`, `facebook_link`, `created_at`, `updated_at`) VALUES
(1, '1661183491.jpg', 'umairuafmcs300@gmail.com', 'makkah colonny 4', '3074791848', 'www.fb5.com', '2022-08-16 15:44:48', '2022-08-24 00:01:14');

-- --------------------------------------------------------

--
-- Table structure for table `site_visitors`
--

CREATE TABLE `site_visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_visitors`
--

INSERT INTO `site_visitors` (`id`, `ip_address`, `country_name`, `country_code`, `region_code`, `region_name`, `city_name`, `zip_code`, `latitude`, `longitude`, `area_code`, `created_at`, `updated_at`) VALUES
(1, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', '2022-09-06 22:37:58', '2022-09-06 22:37:58'),
(2, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', '2022-09-06 22:38:00', '2022-09-06 22:38:00'),
(3, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', '2022-09-06 22:38:02', '2022-09-06 22:38:02'),
(4, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', '2022-09-06 23:42:23', '2022-09-06 23:42:23'),
(5, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', '2022-09-06 23:42:25', '2022-09-06 23:42:25'),
(6, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', '2022-09-06 23:42:34', '2022-09-06 23:42:34'),
(7, '103.7.78.173', 'Pakistan', 'PK', 'IS', 'Islamabad', 'Islamabad', '45700', '33.6035', '73.1644', 'IS', '2022-09-13 18:33:21', '2022-09-13 18:33:21'),
(8, '103.7.78.173', 'Pakistan', 'PK', 'IS', 'Islamabad', 'Islamabad', '45700', '33.6035', '73.1644', 'IS', '2022-09-13 22:51:18', '2022-09-13 22:51:18'),
(9, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', '2022-09-16 18:55:59', '2022-09-16 18:55:59'),
(10, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', '2022-10-05 15:15:44', '2022-10-05 15:15:44'),
(11, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', '2022-10-05 15:17:43', '2022-10-05 15:17:43'),
(12, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', '2022-10-05 15:20:01', '2022-10-05 15:20:01'),
(13, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', '2022-10-14 19:53:44', '2022-10-14 19:53:44'),
(14, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', '2022-10-14 19:55:33', '2022-10-14 19:55:33'),
(15, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', '2023-09-04 22:35:02', '2023-09-04 22:35:02'),
(16, '103.7.78.173', 'Pakistan', 'PK', 'IS', 'Islamabad', 'Islamabad', '45700', '33.6035', '73.1644', 'IS', '2024-02-22 21:27:17', '2024-02-22 21:27:17');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'slider2', '1660825871.jpg', '1', '2022-08-18 19:31:11', '2022-08-18 19:31:11'),
(3, 'slider3', '1660825895.jpg', '1', '2022-08-18 19:31:35', '2022-08-18 19:31:35'),
(4, 'slider4', '1660825919.jpg', '1', '2022-08-18 19:31:59', '2022-08-18 19:31:59'),
(5, 'slider 12', '1661174557.jpg', '1', '2022-08-22 20:22:37', '2022-08-22 20:22:37'),
(6, 'slider 13', '1661182789.jpg', '1', '2022-08-22 22:39:49', '2022-08-22 22:39:49'),
(7, 'slider rock', '1661262949.jpg', '1', '2022-08-23 20:55:49', '2022-08-23 20:56:21'),
(8, 'golden', '1661498150.jpg', '1', '2022-08-26 14:15:50', '2022-08-26 14:15:50'),
(9, 'nature', '1661499680.jpg', '1', '2022-08-26 14:41:20', '2022-08-26 14:41:20'),
(10, 'building', '1661501307.jpg', '1', '2022-08-26 15:08:27', '2022-08-26 15:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `description`, `image`, `fb_link`, `twitter_link`, `created_at`, `updated_at`) VALUES
(6, 'new team add', 'front end and back-end developer', '1661853004.jpg', 'www.fb.com', 'www.twitter.com', '2022-08-22 18:07:16', '2022-08-30 16:50:04'),
(7, 'norma', 'php developer', '1661167079.jpg', 'www.fb.com', 'www.twitter.com', '2022-08-22 18:09:42', '2022-08-22 18:17:59'),
(8, 'team 222', 'team 2 is very dangerous', '1661267187.jpg', 'www.fb.com', 'www.twitter.com', '2022-08-23 22:06:27', '2022-08-23 22:20:21'),
(9, 'php team', 'it is raining', '1661769856.jpg', 'www.mani.com', 'www.twitter.com', '2022-08-29 17:44:16', '2022-08-29 17:44:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verify` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `verify`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@mie.pk', NULL, '$2a$12$9L91UKfG5CJfju.6kT.YXuM2FNRStxg9n./.3ORC.FPslvER8ktZq', 'default.jpg', 1, NULL, '2022-08-05 19:37:09', '2022-08-05 19:37:09'),
(2, 'jani', 'brand@gmail.com', NULL, '$2y$10$x2LVwRZsLOs6dTH95fL3QeuJ5B8yAXuJs2aYJNZIPhHK0NbY6wWeu', '1660564077.jpg', 0, NULL, '2022-08-15 18:47:57', '2022-08-15 18:47:57'),
(3, 'umair', 'umairuafmcs300@gmail.com', NULL, '$2y$10$wzNSoVTqNQKHs4DUZwJHOusFbE8Z3H3DrzyGrKljUsB5HHa/fvAmm', '1662465728.jpg', 1, NULL, '2022-08-15 18:49:18', '2022-09-06 19:02:08'),
(4, 'ahmad', 'ahmad@gmail.com', NULL, '$2y$10$IHVZRyG7mXLRe6yhKAT8gOa/7GDPETyrKgwmHg4AkDaL/hjATD03S', '1664957803.jpg', 0, NULL, '2022-10-05 15:16:43', '2022-10-05 15:16:43');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `user_id`, `ip_address`, `country_name`, `country_code`, `region_code`, `region_name`, `city_name`, `zip_code`, `latitude`, `longitude`, `area_code`, `created_at`, `updated_at`) VALUES
(2, 4, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', '2022-06-28 16:16:52', '2022-06-28 16:16:52'),
(3, 2, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', '2022-08-15 18:47:58', '2022-08-15 18:47:58'),
(4, 3, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', '2022-08-15 18:49:18', '2022-08-15 18:49:18'),
(5, 4, '103.7.78.173', 'Pakistan', 'PK', 'PB', 'Punjab', 'Lahore', '54000', '31.5826', '74.3276', 'PB', '2022-10-05 15:16:43', '2022-10-05 15:16:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_keys`
--
ALTER TABLE `api_keys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `api_keys_name_index` (`name`),
  ADD KEY `api_keys_key_index` (`key`);

--
-- Indexes for table `api_key_access_events`
--
ALTER TABLE `api_key_access_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `api_key_access_events_ip_address_index` (`ip_address`),
  ADD KEY `api_key_access_events_api_key_id_foreign` (`api_key_id`);

--
-- Indexes for table `api_key_admin_events`
--
ALTER TABLE `api_key_admin_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `api_key_admin_events_ip_address_index` (`ip_address`),
  ADD KEY `api_key_admin_events_event_index` (`event`),
  ADD KEY `api_key_admin_events_api_key_id_foreign` (`api_key_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_des`
--
ALTER TABLE `country_des`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_des_country_id_foreign` (`country_id`);

--
-- Indexes for table `country_images`
--
ALTER TABLE `country_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_images_country_id_foreign` (`country_id`);

--
-- Indexes for table `country_visitors`
--
ALTER TABLE `country_visitors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_visitors_country_id_foreign` (`country_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_visitors`
--
ALTER TABLE `site_visitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visitors_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `api_keys`
--
ALTER TABLE `api_keys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `api_key_access_events`
--
ALTER TABLE `api_key_access_events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `api_key_admin_events`
--
ALTER TABLE `api_key_admin_events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `country_des`
--
ALTER TABLE `country_des`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `country_images`
--
ALTER TABLE `country_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `country_visitors`
--
ALTER TABLE `country_visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `site_visitors`
--
ALTER TABLE `site_visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `api_key_access_events`
--
ALTER TABLE `api_key_access_events`
  ADD CONSTRAINT `api_key_access_events_api_key_id_foreign` FOREIGN KEY (`api_key_id`) REFERENCES `api_keys` (`id`);

--
-- Constraints for table `api_key_admin_events`
--
ALTER TABLE `api_key_admin_events`
  ADD CONSTRAINT `api_key_admin_events_api_key_id_foreign` FOREIGN KEY (`api_key_id`) REFERENCES `api_keys` (`id`);

--
-- Constraints for table `country_des`
--
ALTER TABLE `country_des`
  ADD CONSTRAINT `country_des_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `country_images`
--
ALTER TABLE `country_images`
  ADD CONSTRAINT `country_images_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `country_visitors`
--
ALTER TABLE `country_visitors`
  ADD CONSTRAINT `country_visitors_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
