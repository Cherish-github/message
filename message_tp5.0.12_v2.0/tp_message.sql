-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-02-27 15:37:09
-- 服务器版本： 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp_message`
--

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL COMMENT '留言ID',
  `user_id` int(11) NOT NULL COMMENT '留言用户ID',
  `title` varchar(225) NOT NULL COMMENT '留言标题',
  `content` text NOT NULL COMMENT '留言内容',
  `create_time` int(11) NOT NULL COMMENT '留言时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='留言表';

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`id`, `user_id`, `title`, `content`, `create_time`) VALUES
(3, 3, '三色幼儿园事件', '太可怕了，现在的幼儿园虐童事件怎么越来越多了。。。。', 1512704914),
(4, 2, 'thinkphp 留言本怎么用的', '你看，就这么用', 1512704959),
(5, 3, '大家都来评评理', '你说说这人，怎么能怎样呢', 1512704990),
(6, 2, '心塞！女朋友不理我了', '不知道为什么女朋友突然就生气了。。。。。。有人知道吗？？？', 1512705024),
(7, 3, '啦啦奥', '数代表参数即初步设计发动机', 1512829997),
(8, 3, '啊啊啊啊', '臭傻逼啊啊啊啊', 1512833003),
(9, 3, '号外号外 那个人竟然只得第二，谁是第一', '甩你玩的，我当第二，谁敢当第一', 1512838330);

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL COMMENT '评论ID',
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `article_id` int(11) NOT NULL COMMENT '留言ID',
  `content` text NOT NULL COMMENT '评论内容',
  `create_time` int(11) NOT NULL COMMENT '评论时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='评论表';

--
-- 转存表中的数据 `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `article_id`, `content`, `create_time`) VALUES
(3, 2, 2, '哈哈哈', 0),
(4, 2, 2, '哈哈哈', 0),
(5, 2, 3, '嘻嘻嘻', 0),
(6, 2, 3, '就是啊', 1512813339),
(7, 2, 3, '5楼为什么那样笑，，，好可怕。。。。。', 1512815387),
(8, 2, 2, '我觉得温水挺好的', 1512815424),
(9, 2, 2, '3楼那个，人家在问问题，你笑什么？？？？神经病啊？？？', 1512815454),
(10, 3, 4, '你看。就这么用', 1512816309),
(11, 3, 3, '就是，你该不会是变态吧？？？', 1512816342),
(12, 3, 5, '没人理我吗。。。。', 1512816371),
(13, 3, 5, '自挽。。。', 1512816386),
(14, 3, 5, '没意思了没意思了', 1512816398),
(15, 3, 6, '分手吧。。。', 1512816436),
(16, 3, 5, '好孩子天天睡觉', 1512838220),
(17, 3, 5, '去死，', 1512838242);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '用户ID',
  `username` varchar(10) NOT NULL COMMENT '用户名',
  `password` varchar(50) NOT NULL COMMENT '用户密码',
  `create_time` int(11) NOT NULL COMMENT '注册时间',
  `update_time` int(11) NOT NULL COMMENT '更改时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `create_time`, `update_time`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1512797517, 1512797517),
(3, 'test', '098f6bcd4621d373cade4e832627b4f6', 1512816247, 1512816247);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '留言ID', AUTO_INCREMENT=10;
--
-- 使用表AUTO_INCREMENT `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '评论ID', AUTO_INCREMENT=18;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '用户ID', AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
