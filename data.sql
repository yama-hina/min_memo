/*
version 1.0
更新　川嶋
*/


-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-07-06 02:34:06
-- サーバのバージョン： 10.4.18-MariaDB
-- PHP のバージョン: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `memory`
--
CREATE DATABASE IF NOT EXISTS `memory` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `memory`;

-- --------------------------------------------------------

--
-- テーブルの構造 `album`
--

DROP TABLE IF EXISTS `album`;
CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `delete` int(11) NOT NULL,
  `events_id` varchar(100) NOT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `belong`
--

DROP TABLE IF EXISTS `belong`;
CREATE TABLE `belong` (
  `member_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `bookmark`
--

DROP TABLE IF EXISTS `bookmark`;
CREATE TABLE `bookmark` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `del` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `comment` varchar(1000) NOT NULL,
  `withdrawal` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `group`
--

DROP TABLE IF EXISTS `group`;
CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `invitation` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `extension` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `join`
--

DROP TABLE IF EXISTS `join`;
CREATE TABLE `join` (
  `event_id` int(11) NOT NULL,
  `member_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `list`
--

DROP TABLE IF EXISTS `list`;
CREATE TABLE `list` (
  `group_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `id` int(8) NOT NULL,
  `name` varchar(20) NOT NULL,
  `birthday` date DEFAULT NULL,
  `password` varchar(30) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `search_img` varchar(100) DEFAULT NULL,
  `withdrawal` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `watch` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`,`group_id`);

--
-- テーブルのインデックス `belong`
--
ALTER TABLE `belong`
  ADD PRIMARY KEY (`member_id`,`group_id`);

--
-- テーブルのインデックス `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `join`
--
ALTER TABLE `join`
  ADD PRIMARY KEY (`event_id`);

--
-- テーブルのインデックス `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`group_id`,`event_id`);

--
-- テーブルのインデックス `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
