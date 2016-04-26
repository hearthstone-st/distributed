-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2016-01-15 14:17:43
-- 服务器版本: 5.6.11
-- PHP 版本: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `distributed_course`
--

-- --------------------------------------------------------

--
-- 表的结构 `materials`
--

CREATE TABLE IF NOT EXISTS `materials` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '资料的唯一标识',
  `title` text COLLATE utf8_unicode_ci NOT NULL COMMENT '资料的名称',
  `linkPDF` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'PDF唯一标识的外键',
  `materialsType` char(1) COLLATE utf8_unicode_ci NOT NULL COMMENT 'C表示课件，R表示参考文献',
  `teacher_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `materials`
--

INSERT INTO `materials` (`id`, `title`, `linkPDF`, `materialsType`, `teacher_id`) VALUES
(4, '0810.1355v1.pdf', 'upload/ware/0810.1355v1.pdf', 'C', 30);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
