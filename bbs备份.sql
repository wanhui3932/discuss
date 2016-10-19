-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 05 月 03 日 08:53
-- 服务器版本: 5.5.24
-- PHP 版本: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `bbs`
--

-- --------------------------------------------------------

--
-- 表的结构 `reply`
--

CREATE TABLE IF NOT EXISTS `reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `content` text NOT NULL,
  `addate` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `reply`
--


-- --------------------------------------------------------

--
-- 表的结构 `thread`
--

CREATE TABLE IF NOT EXISTS `thread` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text,
  `addate` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `thread`
--

INSERT INTO `thread` (`id`, `uid`, `title`, `content`, `addate`) VALUES
(1, 1, '欢迎光临PHP学科的小论坛！', '<p style=''color:red''><b>论坛的各位童鞋们：</b></p>\r\n<p style=''color:blue''>感谢大家的不断支持！我们的小小论坛正式上线啦！如果有任何学习的问题，可以在论坛上发起问题？我们的专业老师，会在指定的时间内，给大家回复！如果大家有关于报名的问题，可以登录我们的网站，有专门的老师给大家服务！我们的官方地址是：http://www.itcast.cn</p>\r\n', 1462235886),
(2, 1, '大家五一都想着去干啥？', '<p>\r\n	其实呢~~~~\r\n</p>\r\n<p>\r\n	放假的意义就在于，一个说不起就不起的早晨、一个说不睡就不睡的深夜和一个说不出门就不出门的白天。\r\n</p>\r\n<p>\r\n	<img src="/js/editor/attached/image/20160503/20160503085150_54997.jpg" alt="" />\r\n</p>', 1462236713);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` char(32) NOT NULL,
  `name` char(3) NOT NULL,
  `lastloginip` char(15) DEFAULT NULL,
  `lastlogintime` int(10) DEFAULT NULL,
  `addate` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `lastloginip`, `lastlogintime`, `addate`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '姚长江', '127.0.0.1', 1462235643, 1462235318);
