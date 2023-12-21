-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 12 月 22 日 00:17
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `phpkadai3`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `phpkadai3`
--

CREATE TABLE `phpkadai3` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` text NOT NULL,
  `yield` text NOT NULL,
  `pricechange` text NOT NULL,
  `file` text NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `phpkadai3`
--

INSERT INTO `phpkadai3` (`id`, `name`, `price`, `yield`, `pricechange`, `file`, `indate`) VALUES
(2, 'MAX717', '157,000,000', '9', '148,000,000', '', '2023-12-20 09:49:36'),
(3, 'MAX717', '160,000,000', '7', '148,000,000', '', '2023-12-20 16:49:36'),
(4, 'MAX818', '200,000,000', '10', '180,000,000', '', '2023-12-21 09:07:55'),
(5, 'scsdcsdc', 'sdccddsc', '0', 'sdcscd', '', '2023-12-21 14:23:55'),
(6, 'aaaa', 'aaaaa', '0', 'aaaaaaa', '', '2023-12-21 14:49:37');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `phpkadai3`
--
ALTER TABLE `phpkadai3`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `phpkadai3`
--
ALTER TABLE `phpkadai3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
