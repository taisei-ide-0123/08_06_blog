-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2020 年 12 月 24 日 12:16
-- サーバのバージョン： 10.4.17-MariaDB
-- PHP のバージョン: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsmcf_d7_06`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `fb`
--

CREATE TABLE `fb` (
  `id` int(12) NOT NULL,
  `post` varchar(128) NOT NULL,
  `deadline` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `question_table`
--

CREATE TABLE `question_table` (
  `id` int(12) NOT NULL,
  `title` varchar(128) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `deadline` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `question_table`
--

INSERT INTO `question_table` (`id`, `title`, `question`, `deadline`, `created_at`, `updated_at`) VALUES
(8, 'a', 'a', '2020-12-22', '2020-12-22 03:11:04', '2020-12-21 18:11:04'),
(9, 'b', 'b1215016@yahoo.co.jp', '2020-12-22', '2020-12-22 03:12:27', '2020-12-21 18:12:27');

-- --------------------------------------------------------

--
-- テーブルの構造 `signUp`
--

CREATE TABLE `signUp` (
  `id` int(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `todo_table`
--

CREATE TABLE `todo_table` (
  `id` int(12) NOT NULL,
  `todo` varchar(128) NOT NULL,
  `deadline` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `todo_table`
--

INSERT INTO `todo_table` (`id`, `todo`, `deadline`, `created_at`, `updated_at`) VALUES
(1, 'php', '2020-12-19', '2020-12-19 00:00:00', '2020-12-19 00:00:00'),
(2, 'a', '2020-12-19', '2020-12-19 17:32:03', '2020-12-19 17:32:03'),
(3, 'a', '2020-12-19', '2020-12-19 17:32:18', '2020-12-19 17:32:18'),
(4, 'a', '2020-12-19', '2020-12-19 17:32:32', '2020-12-19 17:32:32'),
(5, 'c', '2020-12-19', '2020-12-19 17:33:24', '2020-12-19 17:33:24'),
(6, 'd', '2020-12-19', '2020-12-19 17:35:55', '2020-12-19 17:35:55'),
(7, 'a', '2020-12-22', '2020-12-22 00:05:22', '2020-12-22 00:05:22');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `fb`
--
ALTER TABLE `fb`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `question_table`
--
ALTER TABLE `question_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `signUp`
--
ALTER TABLE `signUp`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `todo_table`
--
ALTER TABLE `todo_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `fb`
--
ALTER TABLE `fb`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `question_table`
--
ALTER TABLE `question_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- テーブルの AUTO_INCREMENT `signUp`
--
ALTER TABLE `signUp`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `todo_table`
--
ALTER TABLE `todo_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
