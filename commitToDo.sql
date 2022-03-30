-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2022 年 3 月 31 日 08:23
-- サーバのバージョン： 5.7.34
-- PHP のバージョン: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `commitToDo`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `goals`
--

CREATE TABLE `goals` (
  `id` int(32) NOT NULL,
  `user_id` int(255) NOT NULL,
  `goal` varchar(255) NOT NULL,
  `reason1` varchar(255) NOT NULL,
  `reason2` varchar(255) DEFAULT NULL,
  `reason3` varchar(255) DEFAULT NULL,
  `want` varchar(255) NOT NULL,
  `del_flg` int(11) NOT NULL DEFAULT '0',
  `update_flg` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `goals`
--

INSERT INTO `goals` (`id`, `user_id`, `goal`, `reason1`, `reason2`, `reason3`, `want`, `del_flg`, `update_flg`) VALUES
(1, 1, 'あ', 'あ', NULL, NULL, 'あ', 0, 0),
(9, 9, 'test', 'テスト', '行きたーい', 'ベニスビーチ', 'マッスルビーチ', 1, 0),
(14, 13, '111', '111', '11111', '11111111', '111111111111', 1, 0),
(15, 14, 'a', 'a', NULL, NULL, 'a', 0, 0),
(16, 15, 'b', 'b', 'b', 'b', 'b', 0, 0),
(17, 44, '大きくなる', '大きくなりたい', '強くなりたい', 'テスト', 'ロス', 1, 0),
(25, 49, '-5kg痩せる', '水着を着たいから', 'プールに行くから', '太りすぎたから', 'カルバンクラインの水着を着る', 1, 0),
(27, 50, 'a', 'a', NULL, NULL, 'a', 1, 0),
(28, 53, '大きくなる', 'test', 'test', NULL, 'a', 1, 0),
(29, 54, 'tesst', 'test', 'a', NULL, 'test', 1, 0),
(31, 56, 'aaa', 'aaa', 'aaa', NULL, 'aaa', 1, 0),
(34, 55, 'e', 'e', 'e', 'e', 'e', 1, 0),
(35, 58, 'a', 'a', 'aa', 'aa', 'a', 1, 0),
(36, 57, 'a', 'a', 'a', NULL, 'a\r\na\r\na', 1, 0),
(37, 60, '-10kg痩せる', '痩せたいから', 'かっこいい水着を今年こそ着たい', '気になってる人がいる', 'カルバンクラインの水着を買う', 1, 0),
(38, 62, 'test', 'test', NULL, NULL, 'test', 1, 0),
(39, 63, '-5kg痩せる', '痩せたいから', NULL, NULL, 'カルバンクラインの水着を着る', 1, 0),
(40, 64, '-5kg痩せる', '痩せたいから', '海に行くから', 'ベニスビーチに行くから', 'カルバンクラインの水着を着る', 1, 0),
(41, 65, 'a', 'a', NULL, NULL, 'a', 1, 0),
(42, 66, '-5kg痩せる', '海に行く予定がある', 'テスト', 'テスト', 'カルバンクラインの水着を買う\r\n気になってる人と海に行きたい', 1, 0),
(43, 67, '-5kg痩せる', '海に行く予定がある', '水着を買う', NULL, '気になってる人にかっこいいと言ってもらいたい', 1, 0),
(44, 68, '-5kg痩せる', '海に行く', '水着買う', NULL, '気になってる人に見てほしい', 0, 0),
(45, 69, '-5kg痩せる', '海に行く予定がある', '気になる人がいる', '太りすぎたから', '水着を買う', 1, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `rooms`
--

CREATE TABLE `rooms` (
  `id` int(32) NOT NULL,
  `user_id` int(32) NOT NULL,
  `content_id` int(32) DEFAULT NULL,
  `submit_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `del_flg` int(11) DEFAULT '0',
  `update_flg` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `rooms`
--

INSERT INTO `rooms` (`id`, `user_id`, `content_id`, `submit_at`, `del_flg`, `update_flg`) VALUES
(1, 9, NULL, '2022-03-19 14:22:26', 0, 0),
(2, 13, NULL, '2022-03-22 09:13:14', 0, 0),
(7, 44, NULL, '2022-03-22 09:09:54', 0, 0),
(10, 49, NULL, '2022-03-24 05:52:15', 0, 0),
(11, 50, NULL, '2022-03-26 16:54:12', 0, 0),
(12, 51, NULL, '2022-03-26 18:04:36', 0, 0),
(13, 52, NULL, '2022-03-26 18:15:19', 0, 0),
(14, 53, NULL, '2022-03-26 18:17:16', 0, 0),
(15, 54, NULL, '2022-03-26 23:36:53', 0, 0),
(16, 55, NULL, '2022-03-26 23:43:37', 0, 0),
(17, 56, NULL, '2022-03-27 06:56:23', 0, 0),
(18, 57, NULL, '2022-03-28 08:15:00', 0, 0),
(19, 58, NULL, '2022-03-28 08:15:17', 0, 0),
(20, 59, NULL, '2022-03-28 08:15:32', 0, 0),
(21, 60, NULL, '2022-03-28 23:45:59', 0, 0),
(22, 61, NULL, '2022-03-29 01:10:20', 0, 0),
(23, 62, NULL, '2022-03-29 13:32:21', 0, 0),
(24, 63, NULL, '2022-03-29 14:33:38', 0, 0),
(25, 64, NULL, '2022-03-29 14:44:02', 0, 0),
(26, 65, NULL, '2022-03-29 19:12:24', 0, 0),
(27, 66, NULL, '2022-03-29 19:22:21', 0, 0),
(28, 67, NULL, '2022-03-29 19:40:05', 0, 0),
(29, 68, NULL, '2022-03-29 20:11:02', 0, 0),
(30, 69, NULL, '2022-03-29 22:21:27', 0, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `room_contents`
--

CREATE TABLE `room_contents` (
  `id` int(32) NOT NULL,
  `room_id` int(32) NOT NULL,
  `user_id` int(32) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  `del_flg` int(11) DEFAULT '0',
  `update_flg` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `room_contents`
--

INSERT INTO `room_contents` (`id`, `room_id`, `user_id`, `content`, `created_at`, `update_at`, `del_flg`, `update_flg`) VALUES
(1, 1, 9, 'テスト', '2022-03-19 14:24:40', NULL, 0, 0),
(2, 1, 0, 'adminです', '2022-03-19 14:41:54', NULL, 0, 0),
(3, 1, 9, 'test', '2022-03-19 16:12:00', NULL, 0, 0),
(4, 1, 9, 'テスト', '2022-03-19 16:23:54', NULL, 0, 0),
(5, 1, 9, 'ててててテスト', '2022-03-19 16:24:05', NULL, 0, 0),
(6, 1, 9, 'テスト', '2022-03-19 16:36:52', NULL, 0, 0),
(7, 1, 9, 'ちゅゲーよな', '2022-03-19 16:37:30', NULL, 0, 0),
(8, 1, 9, ',,', '2022-03-19 16:39:58', NULL, 0, 0),
(9, 1, 9, '春の風を待つ花のように\n君という光があるのなら\n\n巡り\n\n巡る\n\n運命を超えて', '2022-03-19 16:56:50', NULL, 0, 0),
(10, 1, 9, 'あ', '2022-03-19 17:01:38', NULL, 0, 0),
(11, 1, 9, 'あ', '2022-03-19 17:01:38', NULL, 0, 0),
(12, 1, 9, 'あ', '2022-03-19 17:01:39', NULL, 0, 0),
(13, 1, 9, 'あ', '2022-03-19 17:01:39', NULL, 0, 0),
(14, 1, 9, 'あ', '2022-03-19 17:01:39', NULL, 0, 0),
(15, 1, 9, 'あ', '2022-03-19 17:01:39', NULL, 0, 0),
(16, 1, 9, 'あ', '2022-03-19 17:01:39', NULL, 0, 0),
(17, 1, 9, 'あ', '2022-03-19 17:01:40', NULL, 0, 0),
(18, 1, 9, 'あ', '2022-03-19 17:01:40', NULL, 0, 0),
(19, 1, 9, 'あ', '2022-03-19 17:01:40', NULL, 0, 0),
(20, 1, 9, 'あ', '2022-03-19 17:01:40', NULL, 0, 0),
(21, 1, 9, 'あ', '2022-03-19 17:01:41', NULL, 0, 0),
(22, 1, 9, 'あ', '2022-03-19 17:01:41', NULL, 0, 0),
(23, 3, 14, 'test', '2022-03-21 21:22:03', NULL, 0, 0),
(24, 3, 14, 'test\ntest', '2022-03-21 21:22:17', NULL, 0, 0),
(25, 7, 44, 'ジムに行く', '2022-03-22 09:11:45', NULL, 0, 0),
(26, 2, 13, 'test', '2022-03-22 09:13:40', NULL, 0, 0),
(27, 2, 13, 'テスト', '2022-03-22 09:13:48', NULL, 0, 0),
(28, 8, 0, 'admin', '2022-03-22 10:56:10', NULL, 0, 0),
(29, 1, 9, 'テスト', '2022-03-22 11:05:42', NULL, 0, 0),
(30, 1, 0, 'admin', '2022-03-22 11:11:54', NULL, 0, 0),
(31, 1, 0, 'てててててってててて', '2022-03-22 11:18:24', NULL, 0, 0),
(32, 1, 0, 'てててててってててて', '2022-03-22 11:18:25', NULL, 0, 0),
(33, 1, 0, 'てててててってててて', '2022-03-22 11:18:26', NULL, 0, 0),
(34, 1, 0, 'てててててってててて', '2022-03-22 11:18:28', NULL, 0, 0),
(35, 1, 0, 'てててててってててて', '2022-03-22 11:18:28', NULL, 0, 0),
(36, 1, 0, 'てててててってててて', '2022-03-22 11:18:31', NULL, 0, 0),
(37, 2, 0, 'adminです', '2022-03-22 11:18:58', NULL, 0, 0),
(38, 2, 0, 'adoです', '2022-03-22 11:19:08', NULL, 0, 0),
(39, 7, 0, 'adminです', '2022-03-22 11:19:23', NULL, 0, 0),
(41, 1, 9, 'てててって！！！', '2022-03-22 11:23:09', NULL, 0, 0),
(42, 1, 9, 'tetete', '2022-03-23 06:52:17', NULL, 0, 0),
(43, 1, 9, 'tetete', '2022-03-23 06:52:17', NULL, 0, 0),
(44, 1, 9, 'おおお', '2022-03-23 08:25:13', NULL, 0, 0),
(45, 1, 9, 'fsdfs\nfsfds fsdfs\n\nfsdfsd', '2022-03-23 08:25:26', NULL, 0, 0),
(46, 10, 49, 'こんにちは', '2022-03-25 07:11:24', NULL, 0, 0),
(47, 10, 49, 'テストです', '2022-03-25 07:11:39', NULL, 0, 0),
(48, 10, 49, 'こんにちは', '2022-03-26 08:40:07', NULL, 0, 0),
(49, 10, 49, 'こんにちは', '2022-03-26 08:40:07', NULL, 0, 0),
(50, 10, 49, 'こんにちは', '2022-03-26 08:40:07', NULL, 0, 0),
(51, 10, 0, 'こんにちは、管理者です', '2022-03-26 15:20:13', NULL, 0, 0),
(54, 10, 0, '元気ですか？', '2022-03-26 16:44:49', NULL, 0, 0),
(55, 2, 0, 'こんにちは、管理人です', '2022-03-26 16:46:13', NULL, 0, 0),
(56, 7, 0, 'こんにちは', '2022-03-26 16:46:24', NULL, 0, 0),
(57, 9, 0, 'こんにちは', '2022-03-26 16:46:48', NULL, 0, 0),
(58, 11, 0, 'こんにちは', '2022-03-26 16:56:22', NULL, 0, 0),
(59, 11, 50, '<script>alert(\"アラート\")</script>', '2022-03-26 17:12:38', NULL, 0, 0),
(62, 1, 9, '<script>alert(\"アラート\")</script>', '2022-03-26 22:43:37', NULL, 0, 0),
(63, 15, 54, '<script>alert(\"アラート\")</script>', '2022-03-26 23:39:05', NULL, 0, 0),
(64, 15, 54, '<script>alert(\"アラート\")</script>', '2022-03-26 23:39:06', NULL, 0, 0),
(65, 1, 0, 'admindesu', '2022-03-27 21:18:02', NULL, 0, 0),
(66, 1, 0, 'admindesu', '2022-03-27 21:18:11', NULL, 0, 0),
(67, 1, 0, 'admindesu', '2022-03-27 21:18:11', NULL, 0, 0),
(68, 19, 0, 'adminです', '2022-03-28 08:19:55', NULL, 0, 0),
(69, 19, 58, 'ad', '2022-03-28 08:20:45', NULL, 0, 0),
(70, 1, 9, 'asda', '2022-03-28 20:52:00', NULL, 0, 0),
(71, 1, 9, 'da', '2022-03-28 20:52:04', NULL, 0, 0),
(72, 18, 0, 'adminです', '2022-03-28 20:52:48', NULL, 0, 0),
(73, 18, 0, 'テストです', '2022-03-28 20:53:18', NULL, 0, 0),
(74, 1, 0, 'fsf¥r¥n\r\nfdsaf', '2022-03-28 21:02:38', NULL, 0, 0),
(75, 1, 0, 'aa\na\na\na', '2022-03-28 21:02:58', NULL, 0, 0),
(76, 1, 0, 'a', '2022-03-28 21:19:38', NULL, 0, 0),
(77, 1, 9, 'dss', '2022-03-28 21:20:53', NULL, 0, 0),
(78, 1, 0, 'a', '2022-03-28 21:27:19', NULL, 0, 0),
(79, 21, 60, 'こんにちは、aaです。これからよろしくお願いします', '2022-03-28 23:50:53', NULL, 0, 0),
(80, 21, 0, 'おっつー\n今日胸やなくて背中やったんやな！お疲れ！', '2022-03-28 23:55:01', NULL, 0, 0),
(81, 21, 0, 'おっつーーーーーーー', '2022-03-28 23:55:15', NULL, 0, 0),
(82, 21, 0, 'おっつ\n筋肉痛きてる？', '2022-03-28 23:55:34', NULL, 0, 0),
(83, 23, 62, 'こんにちは、\nこれからよろしくお願いします。', '2022-03-29 13:42:18', NULL, 0, 0),
(84, 23, 0, 'お疲れ様です。\nよろしくお願いします。', '2022-03-29 13:42:51', NULL, 0, 0),
(85, 24, 63, 'こんにちは。\nこれからよろしくお願いします。', '2022-03-29 14:35:32', NULL, 0, 0),
(86, 24, 0, 'こちらこそ！よろしくお願いします。\n早速の背中トレナイスです！！', '2022-03-29 14:36:34', NULL, 0, 0),
(87, 25, 64, 'こんにちは', '2022-03-29 14:45:30', NULL, 0, 0),
(88, 25, 0, 'こんにちは', '2022-03-29 14:46:15', NULL, 0, 0),
(89, 27, 0, 'こんにちはadminです', '2022-03-29 19:29:29', NULL, 0, 0),
(90, 28, 67, 'こんにちは', '2022-03-29 19:44:13', NULL, 0, 0),
(91, 28, 67, 'こんにちは\nよろしくね', '2022-03-29 19:44:25', NULL, 0, 0),
(92, 28, 0, 'こんにちは\nよろしくね', '2022-03-29 19:45:46', NULL, 0, 0),
(93, 28, 0, '乙トレ様です', '2022-03-29 19:46:07', NULL, 0, 0),
(94, 29, 68, 'こんにちは\nよろしくね', '2022-03-29 20:13:29', NULL, 0, 0),
(95, 29, 0, '乙トレ様です\nナイス肩です', '2022-03-29 20:14:34', NULL, 0, 0),
(96, 29, 68, 'a', '2022-03-29 20:20:08', NULL, 0, 0),
(97, 29, 68, 'a', '2022-03-29 20:20:10', NULL, 0, 0),
(98, 29, 68, 'a', '2022-03-29 20:20:16', NULL, 0, 0),
(99, 30, 69, 'こんにちは\nヨロです', '2022-03-29 22:24:58', NULL, 0, 0),
(100, 30, 0, 'ヨロです', '2022-03-29 22:25:59', NULL, 0, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `tasks`
--

CREATE TABLE `tasks` (
  `id` int(32) NOT NULL,
  `user_id` int(32) DEFAULT NULL,
  `task` varchar(255) NOT NULL,
  `deadline` datetime DEFAULT NULL,
  `priority` int(11) DEFAULT '0',
  `commit_flg` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  `del_flg` int(11) DEFAULT '0',
  `fail_flg` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `task`, `deadline`, `priority`, `commit_flg`, `created_at`, `update_at`, `del_flg`, `fail_flg`) VALUES
(181, 49, '脚トレ', '2022-03-26 00:00:00', 0, 0, '2022-03-26 15:04:48', NULL, 1, 0),
(186, 49, '脚とれ', '2022-03-26 00:00:00', 0, 1, '2022-03-26 15:12:50', NULL, 1, 0),
(189, 49, 'いい', '2022-03-26 00:00:00', 0, 0, '2022-03-26 15:14:15', NULL, 1, 0),
(193, 9, 'test', '2022-03-26 00:00:00', 0, 1, '2022-03-26 23:26:01', NULL, 1, 0),
(215, 58, 'test', NULL, 0, 1, '2022-03-28 08:31:53', NULL, 1, 0),
(220, 58, 'test', NULL, 0, 0, '2022-03-28 08:54:34', NULL, 1, 0),
(247, 9, 'l', NULL, 0, 1, '2022-03-28 20:44:54', NULL, 1, 0),
(250, 60, '背中トレ', '2022-03-28 00:00:00', 0, 1, '2022-03-28 23:51:54', NULL, 1, 0),
(252, 63, '背中トレをする', '2022-03-29 00:00:00', 0, 0, '2022-03-29 14:34:24', NULL, 1, 0),
(253, 63, '脚トレをする', NULL, 0, 1, '2022-03-29 14:34:33', NULL, 1, 0),
(255, 64, '背中トレをしにいく', NULL, 0, 1, '2022-03-29 14:44:43', NULL, 1, 0),
(256, 64, '肩トレする', '2022-03-29 00:00:00', 0, 1, '2022-03-29 14:44:51', NULL, 1, 0),
(259, 66, '肩トレする', NULL, 0, 1, '2022-03-29 19:26:10', NULL, 1, 0),
(261, 66, '脚トレ', '2022-03-30 00:00:00', 0, 0, '2022-03-29 19:26:43', NULL, 1, 0),
(262, 67, '肩トレ', '2022-03-29 00:00:00', 0, 1, '2022-03-29 19:42:51', NULL, 1, 0),
(264, 68, '胸トレ', NULL, 0, 1, '2022-03-29 20:12:30', NULL, 0, 0),
(266, 68, 'test', NULL, 0, 0, '2022-03-29 20:18:58', NULL, 0, 0),
(268, 68, 'test', NULL, 0, 0, '2022-03-29 20:19:40', NULL, 0, 0),
(269, 69, '胸トレ', '2022-03-29 00:00:00', 0, 1, '2022-03-29 22:23:43', NULL, 1, 0),
(271, 69, 'ベンチ150kgあげる', NULL, 0, 1, '2022-03-29 22:24:08', NULL, 1, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `answer` varchar(255) NOT NULL,
  `role` int(11) DEFAULT '0',
  `visit_flg` int(11) DEFAULT '0',
  `del_flg` int(11) DEFAULT '0',
  `update_flg` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `created_at`, `update_at`, `answer`, `role`, `visit_flg`, `del_flg`, `update_flg`) VALUES
(0, 'admin', '$2y$10$u7voXYIV9OZJljppEZw.Qe1q4ZZKRXhd50CSiGoI3d8sRXz2hPcS.', NULL, NULL, 'admin', 1, 0, 0, 0),
(9, 'test', '$2y$10$bSMAuKsv/r3ARPzBWrhKXepguTO0KQNgqzeyb8dGvh70zcBRnoPq2', NULL, NULL, 'test', 0, 0, 1, 0),
(13, '111', '$2y$10$0Y1SAGSu6OgyoQ9vuUpkW.EpVd/gx7xHkI0MnSLoiBCbenYAIdhSm', NULL, NULL, '111', 0, 0, 1, 0),
(44, 'zz', '$2y$10$xIa/hEv7R7TpiBdJkXGrsuiuFZnvY.Sv51oLiJCOx/Xo3zo3ugU5u', NULL, NULL, 'zz', 0, 0, 1, 0),
(49, 'aaa', '$2y$10$.zIfz1ZycoJZbcDUICrch.GgScgx1YiorGWm2snPCZhgs2HSkEXB6', NULL, NULL, 'aaa', 0, 0, 1, 0),
(50, 'a', '$2y$10$yyaxlAmcfYeDjXgioTyYw.0W6KjByrpCG3nm7pzZrbFYMStXa4m5i', NULL, NULL, 'a', 0, 0, 1, 0),
(51, 'b', '$2y$10$rS.OF9J1Vp1tC1UDmFLjwehEpohQWnhEhSi8j9rpafyXGPXZsQg/2', NULL, NULL, 'b', 0, 0, 1, 0),
(52, 'c', '$2y$10$L5x74X5ofWsmZQ.8gHzQ9uwSNKAl5YEiOsm8fKKX8mB70s2Lua7eC', NULL, NULL, 'c', 0, 0, 1, 0),
(53, 'q', '$2y$10$f75HlRfXw9AJVcNbTC72ouBkNOu3xEl8WbhhxRfws7KeZNG.mdWTG', NULL, NULL, 'q', 0, 0, 1, 0),
(54, '<script>alert(\"アラート\")</script>', '$2y$10$qcrLfhnGojsO1RiLascJluQpSytDgINOZL5Tg4EPmD1U0NUCyEfTq', NULL, NULL, '<script>alert(\"アラート\")</script>', 0, 0, 1, 0),
(55, 'e', '$2y$10$dpijOTaKl0iIWSBePJUm6uiZRnO2KQjpiTaTOn6khuZ6bVnOoXK0a', NULL, NULL, 'e', 0, 0, 1, 0),
(56, 'aa', '$2y$10$cCKwDSARQxHpDYOj0L0HI.X6ORfy0M1FhBP0e.LcC8KvmlQ/3g4xe', NULL, NULL, 'aa', 0, 0, 1, 0),
(57, 'a', '$2y$10$TOPv/FOsSX4a1.Vg2eygEuyoEirEUNMEWbtW.AyRE7mbQPn8MYgZS', NULL, NULL, 'a', 0, 0, 1, 0),
(58, 'aa', '$2y$10$lSpbKQidE9ymoQOOghZPH.19IGGPyzdK/n0r0/1rLerADU35CkSVW', NULL, NULL, 'aa', 0, 0, 1, 0),
(59, 'aaa', '$2y$10$XKl81xO620xa8NbAqRNZk.oF61Vj0Ss1sWkbloJkeAgtVLkEH/Vn2', NULL, NULL, 'aaa', 0, 0, 1, 0),
(60, 'aa', '$2y$10$0D9nWvkBSRrqM1yHsbqPpeDV9MNZNuKBuExq8ltj7XByTN.E7XDpG', NULL, NULL, 'aa', 0, 0, 1, 0),
(61, 'e', '$2y$10$AmV310ZhgfpdaMqqbGHCa.oo8ws2biIcZPyRaGm00LO2B4yAOGX2S', NULL, NULL, 'e', 0, 0, 1, 0),
(62, 'aaa', '$2y$10$zdIkie0VmKVVWCXIUTm0P.s7NbkS7LCuIbSZ6PS1A0rlLCpzZXN1y', NULL, NULL, 'aaa', 0, 0, 1, 0),
(63, 'test', '$2y$10$b/75Sacl3eYPU7HFOE0E7uBm9xlb32L.FompyM5jhIpRzGs16qU0q', NULL, NULL, 'test', 0, 0, 1, 0),
(64, 'test', '$2y$10$D6D65woLOaWknqcl2DowoOfSR1sqqf4mjEdG6IzBEMzjBuIOKOkFG', NULL, NULL, 'test', 0, 0, 1, 0),
(65, 'a', '$2y$10$HFjZh8EivdXrJ8cERa0bHeaCiOCpksplDzGKNcCi5WwS0rax3A.ke', NULL, NULL, 'a', 0, 0, 1, 0),
(66, 'test', '$2y$10$T/tPNuAAX0uay/vyR8eWo.bhagsokqXM4m8JKhysWsDcr8bisUGI.', NULL, NULL, 'test', 0, 0, 1, 0),
(67, 'aa', '$2y$10$Wu2GArT9Rb13gMWNgiOXP.nPANO8XIuotSZVeamRPjMXDKFwOsSvy', NULL, NULL, 'aa', 0, 0, 1, 0),
(68, 'test', '$2y$10$TdvMqTUHYVzS.hgUMz/6FuoTWTcauZNXcolBUD5xh.UHoCD42f8km', NULL, NULL, 'test', 0, 0, 0, 0),
(69, 'aaa', '$2y$10$kFdComly1Y9oIno1qK564.c2ycDH43h6e4t3AuNVQRaXFKFOs8QRe', NULL, NULL, 'aaa', 0, 0, 1, 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- テーブルのインデックス `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- テーブルのインデックス `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- テーブルのインデックス `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- テーブルのインデックス `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `room_contents`
--
ALTER TABLE `room_contents`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `goals`
--
ALTER TABLE `goals`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- テーブルの AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- テーブルの AUTO_INCREMENT `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- テーブルの AUTO_INCREMENT `room_contents`
--
ALTER TABLE `room_contents`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- テーブルの AUTO_INCREMENT `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=272;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
