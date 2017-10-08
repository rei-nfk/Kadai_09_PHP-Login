-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017 年 10 月 08 日 16:12
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Gs_db37`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_an_table`
--

CREATE TABLE IF NOT EXISTS `gs_an_table` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `naiyou` text COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_an_table`
--

INSERT INTO `gs_an_table` (`id`, `name`, `email`, `naiyou`, `indate`) VALUES
(5, '荷福', '', '', '2017-09-23 16:20:03'),
(6, 'nifuku', 'emailaddress1', 'updated_nifuku', '2017-09-23 16:20:18'),
(7, '犬野郎', 'inu@inu.com', '野郎って呼ばないで。==>解決しました。', '2017-09-30 16:11:48'),
(8, 'test', 'test', 'test', '2017-10-01 22:25:01');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE IF NOT EXISTS `gs_bm_table` (
`id` int(12) NOT NULL,
  `bookName` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `bookUrl` text COLLATE utf8_unicode_ci NOT NULL,
  `bookComment` text COLLATE utf8_unicode_ci NOT NULL,
  `regBookDate` datetime NOT NULL,
  `regUser` int(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `bookName`, `bookUrl`, `bookComment`, `regBookDate`, `regUser`) VALUES
(1, 'test', 'test', 'test2', '2017-10-01 22:42:01', 1),
(3, 'testbook001', '001', '001', '2017-10-08 16:38:01', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE IF NOT EXISTS `gs_user_table` (
`id` int(12) NOT NULL,
  `userName` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL DEFAULT '0' COMMENT '0=管理者, 1=スーパー管理者 ',
  `life_flg` int(1) NOT NULL DEFAULT '0' COMMENT '0=使用中, 1=使用しなくなった '
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `userName`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(3, '1', '1', '$2y$10$zF.cj8WryXsc9XeXlsl9zeeIQ9G/WQ0PTqYh5TzyieH7nbB/Fxte6', 0, 0),
(5, 'test', 'test', 'test', 0, 0),
(9, 'test2', 'test2', '$2y$10$2tZ9lHjUZgLV8MYtZe8L6OSsFL5ZBHeAAYJEL8o/cUKXFYHCWwONK', 0, 0),
(10, 'test3', 'test3', '$2y$10$w/xGsqnA.LAd8TozNj3K6OlQTSAOqGqJbP3FD8ukjHdNZNoCFY.8.', 0, 0),
(11, 'test4', 'test4', '$2y$10$/8nrQIuWCgiL2RVtgnIdXOSrVJiGIShTqafeCKs0u3ldMLOulvz7S', 0, 0),
(12, 'c', 'c', '$2y$10$rntU4loPrPfDdIySij0ZuegLZ07jjqTp30ot/bBnVGyCYKhhrY2dG', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_an_table`
--
ALTER TABLE `gs_an_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_an_table`
--
ALTER TABLE `gs_an_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
