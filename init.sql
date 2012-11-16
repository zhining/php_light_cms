-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2012 年 11 月 16 日 06:51
-- 服务器版本: 5.5.27
-- PHP 版本: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- 数据库: `speedphp`
--
CREATE DATABASE `speedphp` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `speedphp`;

-- --------------------------------------------------------

--
-- 表的结构 `acl`
--

CREATE TABLE IF NOT EXISTS `acl` (
  `acl_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `controller` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`acl_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `acl`
--

INSERT INTO `acl` (`acl_id`, `name`, `controller`, `action`, `role`) VALUES
(1, '测试', 'Main', 'admin_index', 'USER');

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `parent_category_id` int(11) DEFAULT NULL COMMENT '父分类ID',
  `type` varchar(20) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL COMMENT '分类名称',
  `alias` varchar(128) DEFAULT NULL COMMENT '分类别名',
  `rank` int(5) DEFAULT NULL COMMENT '分类等级',
  PRIMARY KEY (`category_id`),
  KEY `FK_CATEGORY_ITSELF` (`parent_category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='分类表，可用于文章分类' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '评论ID',
  `parent_comment_id` int(11) DEFAULT NULL COMMENT '父评论ID',
  `post_id` int(11) NOT NULL COMMENT '文章ID',
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `title` varchar(128) DEFAULT NULL COMMENT '评论标题',
  `body` text COMMENT '评论内容',
  `created` datetime DEFAULT NULL COMMENT '创建时间',
  `modified` datetime DEFAULT NULL COMMENT '修改时间',
  `status` varchar(20) DEFAULT NULL COMMENT '状态（publish显示，draft不显示）',
  PRIMARY KEY (`comment_id`),
  KEY `FK_COMMENT_ITSELF` (`parent_comment_id`),
  KEY `FK_FK_POST_COMMENT` (`post_id`),
  KEY `FK_PK_USER_COMMENT` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='树状节点的评论表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章ID',
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `category_id` int(11) NOT NULL COMMENT '分类ID',
  `title` varchar(255) DEFAULT NULL COMMENT '文章标题',
  `excerpt` varchar(255) DEFAULT NULL COMMENT '文章摘录',
  `body` text COMMENT '文章主体',
  `status` varchar(20) DEFAULT NULL COMMENT 'publish 发布，draft 草稿即不发布',
  `rank` int(5) DEFAULT NULL COMMENT '文章等级排名',
  `created` datetime DEFAULT NULL COMMENT '文章创建时间',
  `modified` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`post_id`),
  KEY `FK_FK_CATEGORY_POST` (`category_id`),
  KEY `FK_FK_POST_USER` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='文章表' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `category_id`, `title`, `excerpt`, `body`, `status`, `rank`, `created`, `modified`) VALUES
(1, 0, 0, 'First', 'asdasdasd', '<p>This is First Post<br /></p><p>This is First Post<br /></p><p>This is First Post<br /></p><p>This is First Post<br /></p>', NULL, 100, '2012-11-15 00:00:00', NULL),
(2, 0, 0, 'Second', 'safasfasf', '<p>This is Second Post<br /></p><p>This is Second Post<br /></p><p>This is Second Post<br /></p><p>This is Second Pos<br /></p>', NULL, 10, '2012-11-20 00:00:00', NULL),
(4, 0, 0, 'Distributing elements on a circle with the right angles', 'Distributing elements on a circle with the right angles--------------------\r\n--------------------Distributing elements on a circle with the right angles-', '<p> &nbsp;</p><p>Distributing elements on a circle with the right angles--------------------</p><p>--------------------Distributing elements on a circle with the right angles-</p><p><br /></p><p>Distributing elements on a circle with the right angles--------------------</p><p>--------------------Distributing elements on a circle with the right angles-</p><p><br /></p><p>Distributing elements on a circle with the right angles--------------------</p><p>--------------------Distributing elements on a circle with the right angles-</p><p><br /></p><p>Distributing elements on a circle with the right angles--------------------</p><p>--------------------Distributing elements on a circle with the right angles-</p><p><br /></p>', NULL, 1, '2012-11-27 06:18:00', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `username` varchar(128) DEFAULT NULL COMMENT '用户名',
  `password` varchar(128) DEFAULT NULL COMMENT '用户密码',
  `role` varchar(50) DEFAULT 'VISITOR',
  `nickname` varchar(50) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL COMMENT '电子邮件',
  `url` varchar(128) DEFAULT NULL COMMENT '个人主页',
  `created` datetime DEFAULT NULL COMMENT '创建时间',
  `status` varchar(20) DEFAULT NULL COMMENT '状态（active激活，unactive未激活）',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户表，记录用户的数据' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `role`, `nickname`, `email`, `url`, `created`, `status`) VALUES
(1, 'root', '162d6567f99eb74df3f3dc666d3a3721', 'visitor', '植宁', NULL, NULL, NULL, NULL);
