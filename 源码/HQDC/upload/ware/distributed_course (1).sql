-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-01-07 13:52:36
-- 服务器版本： 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `distributed_course`
--

-- --------------------------------------------------------

--
-- 表的结构 `course_info`
--

CREATE TABLE `course_info` (
  `id` int(11) NOT NULL,
  `course_introduce` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT '课程简介',
  `teaching_environment` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT '教学条件',
  `teaching_program` text COLLATE utf8_unicode_ci NOT NULL COMMENT '教学大纲'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL COMMENT '文件的唯一标识',
  `name` text COLLATE utf8_unicode_ci NOT NULL COMMENT '文件的名字',
  `type` int(50) NOT NULL COMMENT '文件类型',
  `task_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL COMMENT '上传人的id',
  `upload_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '上传的时间',
  `url` text COLLATE utf8_unicode_ci NOT NULL COMMENT '文件URL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `file`
--

INSERT INTO `file` (`id`, `name`, `type`, `task_id`, `teacher_id`, `upload_time`, `url`) VALUES
(1, 'bare_conf.pdf', 0, 111, 0, '2015-12-29 12:14:40', 'upload/bare_conf.pdf'),
(3, 'bare_conf- 副本- 副本.pdf', 0, 111, 0, '2015-12-29 13:12:27', 'upload/bare_conf.pdf'),
(4, 'task.sql', 0, 112, 0, '2015-12-30 06:42:45', 'upfile/file/task.sql'),
(7, 'file- 副本.sql', 0, 113, 0, '2015-12-30 07:05:34', 'upfile/file/file.sql');

-- --------------------------------------------------------

--
-- 表的结构 `grade`
--

CREATE TABLE `grade` (
  `id` int(10) NOT NULL,
  `task_id` int(10) NOT NULL,
  `student_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '学生的学号',
  `score` int(1) NOT NULL COMMENT '分数  （0-100）编写存储过程',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '评分的时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `permissions` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `group`
--

INSERT INTO `group` (`id`, `name`, `permissions`) VALUES
(1, 'standard users', ''),
(2, 'admin', '{"admin":1}'),
(3, 'teacher', '{"teacher":1}'),
(4, 'student', '{"student":1}');

-- --------------------------------------------------------

--
-- 表的结构 `materials`
--

CREATE TABLE `materials` (
  `id` int(10) NOT NULL COMMENT '资料的唯一标识',
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '资料的名称',
  `link_PDF` int(10) NOT NULL COMMENT 'PDF唯一标识的外键',
  `type` char(1) COLLATE utf8_unicode_ci NOT NULL COMMENT 'C表示课件，R表示参考文献'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'news, notice',
  `title` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT '新闻的标题',
  `context` text COLLATE utf8_unicode_ci NOT NULL COMMENT '内容',
  `upload_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '上传时间',
  `upload_people` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '上传人的姓名'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='新闻动态表';

--
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`id`, `type`, `title`, `context`, `upload_time`, `upload_people`) VALUES
(1, 'notice', 'test', '<p>setset</p>', '2016-01-04 19:30:09', ''),
(2, 'notice', 'adfadfad', '<p>adfadfadfa</p>', '2016-01-04 19:37:44', 'chenxiaolei'),
(3, 'notice', 'adfadf', '<p>adfadfadfa</p>', '2016-01-04 19:40:39', 'chenxiaolei'),
(4, 'notice', 'adfadf打发', '<p>adfadfadfa</p>', '2016-01-04 19:41:11', 'chenxiaolei'),
(5, 'news', '阿打发打发', '<p>阿打发打发打发</p>', '2016-01-04 19:41:39', 'chenxiaolei'),
(6, 'news', '阿打发打发', '<p>热情而且而且二</p>', '2016-01-04 19:46:56', 'chenxiaolei'),
(7, 'notice', '这只是一个特使的例子', '<p>所有的这些懂事打发大姐夫傲娇广佛俺姐夫哥我哦啊叫发个毛我软件而叫姐夫哥我偶奇偶发公交价格我哦啊见是覅偶噶及覅偶感觉 &nbsp; &nbsp;家地偶发基地哦按是法 到肌肤爱哦的Fiona爱多久富哦啊及的覅偶阿迪哦交电费较多富哦啊大剿匪阿迪哦发爱哦的富哦啊的覅偶傲娇的感觉爱哦的风格&nbsp;</p>', '2016-01-05 00:21:45', 'chenxiaolei'),
(8, 'notice', '阿迪发动', '<p>阿打发打发</p>', '2016-01-05 00:54:55', 'chenxiaolei'),
(9, 'notice', 'adfadf', '<p>adfadfadfadsf</p>', '2016-01-05 01:04:53', 'chenxiaolei');

-- --------------------------------------------------------

--
-- 表的结构 `notice`
--

CREATE TABLE `notice` (
  `id` int(10) NOT NULL COMMENT '唯一标识',
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '标题',
  `context` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT '内容',
  `upload_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '上传时间',
  `upload_people` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '上传人的姓名'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `pdf`
--

CREATE TABLE `pdf` (
  `fileID` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '文件的唯一标识',
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '文件的名字',
  `upload_people` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '上传人的姓名',
  `upload_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '上传的时间',
  `url` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `post`
--

CREATE TABLE `post` (
  `id` int(10) NOT NULL COMMENT '帖子的唯一标识',
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '帖子的标题',
  `context` varchar(800) COLLATE utf8_unicode_ci NOT NULL COMMENT '帖子的内容',
  `release_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '发帖的时间',
  `release_people` int(10) NOT NULL COMMENT '发帖人id',
  `imgs` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `post`
--

INSERT INTO `post` (`id`, `title`, `context`, `release_time`, `release_people`, `imgs`) VALUES
(1, '想用 GO 写一个开源分布式数据处理相关的系统，并学习 GO，有什么建议？', 'Update：原问题还请教了有哪些开源项目可以参与实践，这个我了解不多，请有需要的看其它人的回答。 1. Distributed-systems-readings这个网址里收集了一堆美帝各TOP大学分布式相关的课程，我就是从这找到MIT的那门课的。 2. Paxos算法要问为啥单独把这个算法…...', '2015-11-11 16:00:00', 30, '0ff41bd5ad6eddc43bb8e6873fdbb6fd5266336a.jpg|20151202114315658.jpg|20151203152354755.jpg'),
(3, '分布式系统领域有哪些经典论文？', '分布式系统是一个很大的领域，里面包含很多方向。既然你都要读paper了，应该也有一定基础了。伊利诺伊大学的Advanced Distributed Systems 里把各个方向重要papers...', '2015-12-02 06:08:44', 30, '20151202114315658.jpg|20151203152354755.jpg'),
(6, '123', '123', '2015-12-04 00:45:56', 30, '20151204084550838.jpg'),
(7, '123', '123', '2015-12-04 00:46:21', 30, '20151204084550838.jpg|20151204084617887.jpg|20151204084620771.jpg'),
(8, '2015 年国内外有什么让你眼前一亮的 App？', '2015 年国内外有什么让你眼前一亮的 App？', '2015-12-04 00:56:00', 30, '20151204085555736.jpg|20151204085558346.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `post_reply`
--

CREATE TABLE `post_reply` (
  `id` int(10) NOT NULL COMMENT '回复帖子的ID',
  `post_id` int(10) NOT NULL,
  `context` varchar(800) COLLATE utf8_unicode_ci NOT NULL COMMENT '回复的内容',
  `reply_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '回复的时间',
  `sender` int(10) NOT NULL COMMENT '回复人的姓名',
  `receiver` int(10) NOT NULL,
  `is_readed` tinyint(1) NOT NULL DEFAULT '0',
  `imgs` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='回复贴表';

--
-- 转存表中的数据 `post_reply`
--

INSERT INTO `post_reply` (`id`, `post_id`, `context`, `reply_time`, `sender`, `receiver`, `is_readed`, `imgs`) VALUES
(1, 1, '分布式系统在互联网时代，尤其是大数据时代到来之后，成为了每个程序员的必备技能之一。分布式系统从上个世纪80年代就开始有了不少出色的研究和论文，我在这里只列举最近15年范围以内我觉得有重大影响意义的15篇论文（15 within 15）。\n1. The Google File System: 这是分布式文件系统领域划时代意义的论文，文中的多副本机制、控制流与数据流隔离和追加写模式等概念几乎成为了分布式文件系统领域的标准，其影响之深远通过其5000+的引用就可见一斑了，Apache Hadoop鼎鼎大名的HDFS就是GFS的模仿之作；\n2. MapReduce: Simplified Data Processing on Large Clusters：这篇也是Google的大作，通过Map和Reduce两个操作，大大简化了分布式计算的复杂度，使得任何需要的程序员都可以编写分布式计算程序，其中使用到的技术值得我们好好学习：简约而不简单！Hadoop也根据这篇论文做了一个开源的MapReduce；\n3. Bigtable: A Distributed Storage System for Structured Data：Google在NoSQL领域的分布式表格系统，LSM树的最好使用范例，广泛使用到了网页索引存储、YouTube数据管理等业务，Hadoop对应的开源系统叫HBase（我在前公司任职时也开发过一个相应的系统叫BladeCube，性能较HBase有数倍提升）；\n4. The Chubby lock service for loosely-coupled distributed systems：Google的分布式锁服务，基于Paxos协议，这篇文章相比于前三篇可能知道的人就少了，但是其对应的开源系统zookeeper几乎是每个后端同学都接触过，其影响力其实不亚于', '2015-11-26 09:31:48', 44, 30, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE `student` (
  `id` int(10) NOT NULL COMMENT '外键',
  `phone` char(11) COLLATE utf8_unicode_ci NOT NULL COMMENT '手机号码',
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '邮箱地址',
  `user` int(11) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='学生表';

-- --------------------------------------------------------

--
-- 表的结构 `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL COMMENT '主键',
  `teacher_id` int(11) NOT NULL COMMENT '外键',
  `title` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '任务的标题',
  `context` varchar(300) COLLATE utf8_unicode_ci NOT NULL COMMENT '任务的内容',
  `start_time` int(11) DEFAULT NULL COMMENT '任务的开始时间',
  `end_time` int(11) DEFAULT NULL COMMENT '任务的结束时间',
  `type` char(1) COLLATE utf8_unicode_ci NOT NULL COMMENT 'H表示作业，E表示实验'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='作业、实验统称为任务';

--
-- 转存表中的数据 `task`
--

INSERT INTO `task` (`id`, `teacher_id`, `title`, `context`, `start_time`, `end_time`, `type`) VALUES
(110, 30, '测试上传', '提交结束出现文件上传', 82800, 169200, 'H'),
(111, 30, '测试上传', '提交结束出现文件上传', 2415600, 15202800, 'H'),
(112, 30, 'ceshi', 'cesshi', 1450479600, 1451602800, 'H'),
(113, 30, 'qweqwe', 'qweqwe', 1449702000, 1449097200, 'H');

--
-- 触发器 `task`
--
DELIMITER $$
CREATE TRIGGER `DelTask` AFTER DELETE ON `task` FOR EACH ROW delete from file where task_id=old.id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `task_old`
--

CREATE TABLE `task_old` (
  `id` int(11) NOT NULL COMMENT '主键',
  `file_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '文件id，用分号分割',
  `title` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '任务的标题',
  `context` varchar(300) COLLATE utf8_unicode_ci NOT NULL COMMENT '任务的内容',
  `start_time` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '任务的开始时间',
  `end_time` datetime DEFAULT NULL COMMENT '任务的结束时间',
  `type` char(1) COLLATE utf8_unicode_ci NOT NULL COMMENT 'H表示作业，E表示实验',
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='作业、实验统称为任务';

--
-- 转存表中的数据 `task_old`
--

INSERT INTO `task_old` (`id`, `file_id`, `title`, `context`, `start_time`, `end_time`, `type`, `teacher_id`) VALUES
(2, '', '作业1', 'sfsg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'H', 0),
(3, '', '实验1', 'sfsg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'H', 0),
(4, '', '实验2', 'sfsg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'H', 0),
(5, '2;3', '测试', '这是一个测试', '2015-12-30 03:15:45', '2015-01-01 21:12:00', 'H', 0),
(6, '2;3', '实验', '这是一个实验的测试', '2015-12-30 03:16:13', '2015-01-01 21:12:00', 'E', 0),
(7, '2;3', '实验的顶顶顶顶顶', '这是一个实验的测试', '2015-12-30 03:27:37', '2015-01-01 21:12:00', 'E', 0);

-- --------------------------------------------------------

--
-- 表的结构 `task_submit`
--

CREATE TABLE `task_submit` (
  `id` int(10) NOT NULL,
  `task_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `file_link` varchar(255) NOT NULL,
  `score` int(10) NOT NULL COMMENT '分数'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `task_submit`
--

INSERT INTO `task_submit` (`id`, `task_id`, `user_id`, `file_link`, `score`) VALUES
(1, 2, 30, 'dgdgdfgdfghfsh', 56),
(2, 1, 44, 'sdfdsf', 80);

-- --------------------------------------------------------

--
-- 表的结构 `teacher`
--

CREATE TABLE `teacher` (
  `id` int(10) NOT NULL,
  `professional_title` char(1) COLLATE utf8_unicode_ci NOT NULL COMMENT '职称，自己定义字段代表什么',
  `main_job` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '在课程中的主要工作',
  `research_achievements` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT '研究经历',
  `record_information` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT '获奖经历',
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `teacher`
--

INSERT INTO `teacher` (`id`, `professional_title`, `main_job`, `research_achievements`, `record_information`, `user_id`) VALUES
(1, '', '', '', '', 30);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varbinary(64) NOT NULL,
  `salt` varbinary(32) NOT NULL,
  `name` varchar(50) NOT NULL,
  `joined` datetime NOT NULL,
  `portraits` varchar(255) NOT NULL,
  `group` char(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `salt`, `name`, `joined`, `portraits`, `group`) VALUES
(30, 'c123123', 0x96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e, 0x9ed538314cf47d896271ed34a13ac32105a48e0b84da5f7f347ea0d59f51e173, '蔡建宇', '2015-01-08 16:21:15', 'hp3.jpg', 'S'),
(44, 'c111111', 0x96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e, 0x077034ab104747cf92c413ce4fda3f3cf5363269699c5bb2dff89ca50e569fd4, '陈晓磊', '2015-05-21 13:47:56', 'hp5.jpg', 'T'),
(45, 'c123123123', 0x96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e, 0xa29a993ad7ed55322b2c3e500a5ef7a4c8e282e2b43204b77f6e2daaee68f84c, '马锐', '2015-05-23 16:42:31', 'hp17.jpg', 'S'),
(46, '1120112180', 0x5b15d370bdb8f7cce6df6baa8892349f2a0945898139262c4b12a4f6082d2233, 0x18682bcf9ea8ff1ff6f8dc93c3adbe17881b404305773102977ab1431036619b, '陈晓磊', '2015-12-29 09:41:58', '', 'M'),
(48, '1120112150', 0x5b15d370bdb8f7cce6df6baa8892349f2a0945898139262c4b12a4f6082d2233, 0x897def4f5522c1e9cee3d6728c4152a857277945b279ec16295342503a07f7d0, 'chenxiaolei', '2016-01-07 03:12:51', '', 'S'),
(49, '1120112181', 0x5b15d370bdb8f7cce6df6baa8892349f2a0945898139262c4b12a4f6082d2233, 0xfa2d259333e54db0d291fd56c26367e68e6a2c6199bcfe65451d917e6aa2800d, '陈晓磊', '2016-01-07 03:51:53', '', 'S');

-- --------------------------------------------------------

--
-- 表的结构 `users_session`
--

CREATE TABLE `users_session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varbinary(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_info`
--
ALTER TABLE `course_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pdf`
--
ALTER TABLE `pdf`
  ADD PRIMARY KEY (`fileID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_reply`
--
ALTER TABLE `post_reply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `replyTime` (`reply_time`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_old`
--
ALTER TABLE `task_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_submit`
--
ALTER TABLE `task_submit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
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
-- 使用表AUTO_INCREMENT `course_info`
--
ALTER TABLE `course_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文件的唯一标识', AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用表AUTO_INCREMENT `post`
--
ALTER TABLE `post`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '帖子的唯一标识', AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `post_reply`
--
ALTER TABLE `post_reply`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '回复帖子的ID', AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键', AUTO_INCREMENT=114;
--
-- 使用表AUTO_INCREMENT `task_old`
--
ALTER TABLE `task_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键', AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `task_submit`
--
ALTER TABLE `task_submit`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
