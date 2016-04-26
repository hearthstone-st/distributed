-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-12-29 07:56:04
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
-- 表的结构 `calendar`
--

CREATE TABLE `calendar` (
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

--
-- 转存表中的数据 `course_info`
--

INSERT INTO `course_info` (`id`, `course_introduce`, `teaching_environment`, `teaching_program`) VALUES
(1, '<p>蔷薇蔷薇蔷薇</p>', '', '<p>adfadfadf<b>adfadfadf<u>sdfsdfsdfsdf</u></b></p>');

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
  `id` int(10) NOT NULL COMMENT '外键',
  `title` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT '新闻的标题',
  `context` text COLLATE utf8_unicode_ci NOT NULL COMMENT '内容',
  `upload_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '上传时间',
  `upload_people` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '上传人的姓名'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='新闻动态表';

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
  `upload_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '上传的时间'
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
  `release_people` int(10) NOT NULL COMMENT '发帖人id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `post`
--

INSERT INTO `post` (`id`, `title`, `context`, `release_time`, `release_people`) VALUES
(1, '想用 GO 写一个开源分布式数据处理相关的系统，并学习 GO，有什么建议？', 'Update：原问题还请教了有哪些开源项目可以参与实践，这个我了解不多，请有需要的看其它人的回答。 1. Distributed-systems-readings这个网址里收集了一堆美帝各TOP大学分布式相关的课程，我就是从这找到MIT的那门课的。 2. Paxos算法要问为啥单独把这个算法…...', '2015-11-11 16:00:00', 30);

-- --------------------------------------------------------

--
-- 表的结构 `post_reply`
--

CREATE TABLE `post_reply` (
  `post_id` int(10) NOT NULL COMMENT '主帖子的ID',
  `id` int(10) NOT NULL COMMENT '回复帖子的ID',
  `context` varchar(800) COLLATE utf8_unicode_ci NOT NULL COMMENT '回复的内容',
  `reply_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '回复的时间',
  `senter` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '回复人的姓名',
  `receiver` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='回复贴表';

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE `student` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `phone` char(11) COLLATE utf8_unicode_ci NOT NULL COMMENT '手机号码',
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '邮箱地址',
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='学生表';

-- --------------------------------------------------------

--
-- 表的结构 `task`
--

CREATE TABLE `task` (
  `taskID` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '任务的唯一标识',
  `title` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '任务的标题',
  `context` varchar(300) COLLATE utf8_unicode_ci NOT NULL COMMENT '任务的内容',
  `linkPDF` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '上传的PDF的外键',
  `startTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '任务的开始时间',
  `endTime` timestamp NULL DEFAULT NULL COMMENT '任务的结束时间',
  `taskType` char(1) COLLATE utf8_unicode_ci NOT NULL COMMENT 'H表示作业，E表示实验'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='作业、实验统称为任务';

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
(1, 1, 30, 'dgdgdfgdfghfsh', 80),
(2, 2, 30, 'sdfdsf', 22);

-- --------------------------------------------------------

--
-- 表的结构 `teacher`
--

CREATE TABLE `teacher` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `professional_title` char(1) COLLATE utf8_unicode_ci NOT NULL COMMENT '职称，自己定义字段代表什么',
  `main_job` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '在课程中的主要工作',
  `research_achievements` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT '研究经历',
  `record_information` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT '获奖经历'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` char(10) NOT NULL,
  `password` varbinary(64) NOT NULL,
  `salt` varbinary(32) NOT NULL,
  `name` varchar(50) NOT NULL,
  `joined` datetime NOT NULL,
  `portraits` varchar(255) NOT NULL,
  `group` char(1) NOT NULL DEFAULT 'S' COMMENT 'S表示学生|T表示教师|M表示管理员'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `salt`, `name`, `joined`, `portraits`, `group`) VALUES
(63, '1120112180', 0xe3a04a4e6026ec613a982b987d8aa0a7e7041b01e7a4ca43a8506d2120c74b52, 0x0d16df3aa60e4ad6106404c22c7f869f6a1252ec315c2534f72726882ea49c06, 'chen1234', '2015-12-08 03:14:42', '', 'S'),
(64, '1120112181', 0x3ef7b7e73fde5a60c6684d85da0204db9044f13fe74266e38d40d691d3aaf2d0, 0xc0ded813ad3a35bf33e3f9d2c8ed0dbfa643a9e1ea4c812cfdcb1f0a595cc0d2, 'chen1234', '2015-12-08 03:18:59', '', 'S'),
(65, '1120112182', 0x73b87570c065507f94beeff14e3987f6149f66f70a22fad1999dc8707b3b8ef9, 0xf681261ee5111cddf95282c7561912a43b12aaedd0505bacae382e09a786bc85, 'chen1234', '2015-12-08 03:20:25', '', 'S'),
(80, '1120112144', 0x5b15d370bdb8f7cce6df6baa8892349f2a0945898139262c4b12a4f6082d2233, 0x9307682f711013a89f2ab4620358d4fa0deb6b1be0d1409b149fca76eadd4d57, 'chen1234', '2015-12-15 08:38:11', '', 'S'),
(67, '1546453', 0x65336230633434323938666331633134396166626634633839393666623932343237616534316534363439623933346361343935393931623738353262383535, 0x1e98e37348fa19a149e0eefb73989ae2c27764cd26a05d61d5933e594c516bf9, '???Ϸ???', '2015-12-08 03:37:08', '', 'S'),
(79, '1120112145', 0x5b15d370bdb8f7cce6df6baa8892349f2a0945898139262c4b12a4f6082d2233, 0xd98c859fc229e74a010626d73ec5059c90236fb1e82e03fac57bbb0744a4a843, 'chen1234', '2015-12-15 08:35:53', '', 'S'),
(69, '6489515564', 0x65336230633434323938666331633134396166626634633839393666623932343237616534316534363439623933346361343935393931623738353262383535, 0x02028ec1e863ca1aecb0a0a79b864264b754ad9fe2953e37c406d57979a68036, '阿迪发动', '2015-12-08 03:43:07', '', 'S'),
(78, '1120112199', 0x8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92, 0x9354249798b57ec8cadf43d79a7504a5913c693c57a42c54671b6852b3e547f8, 'ce', '2015-12-15 08:32:51', '', 'S'),
(72, '1212121212', 0x3ea87a56da3844b420ec2925ae922bc731ec16a4fc44dcbeafdad49b0e61d39c, 0x07d4b250a930ec0664bef6542fa786baaf06fb59973fde9edfe3d98c001542f5, '张伟', '2015-12-13 15:42:37', '', 'T'),
(77, '1111111111', 0xbcb15f821479b4d5772bd0ca866c00ad5f926e3580720659cc80d39c9d09802a, 0xce30bf4e9eec6182ecf22421008ef0cf624a3a084958b3c0b979c0000f94e771, 'asdas', '2015-12-15 07:58:57', '', 'S'),
(76, '1120112177', 0x5b15d370bdb8f7cce6df6baa8892349f2a0945898139262c4b12a4f6082d2233, 0x61741a5f7915133fefca1adbac647d117f3dd5ff94f71611ce923d21d3fd6201, '陈晓咧', '2015-12-15 07:56:41', '', 'S'),
(81, '1234567988', 0x96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e, 0xb1bf17d63c466866b7b7ce496d5c5bedfabef12d26a2fac468f54e30fadabad3, '123', '2015-12-15 09:02:43', '', 'S'),
(82, '1231231231', 0x96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e, 0x8cb49d5a933058aa0c72458260f501817395f9e4d79e082e549344684e3d78e5, '123', '2015-12-15 09:05:14', '', 'S'),
(83, '学号', 0xc4d678ef6e371279eb1fbd06fca1c7cf06b7b6e0565c1e9b9fccda5b48f12451, 0x39977e65abfdb68a3349f502964f0333813a41e12a4994965721f0a0e71e0c99, '姓名', '2015-12-15 12:18:47', '', '身'),
(84, '1120112188', 0x167bad9f111a4a5ef527beb93cf8e7a26027b806858e7710822d937fb01ba032, 0x141fff74cc72e0cbbaa138364e9b4d7b35581c403e2531dddc4abfc3fb163c2e, '电风扇', '2015-12-15 12:18:47', '', 'S'),
(85, '1120131218', 0x456b978b89276d0fb6cd473000007ab64029bb0ee883ebb2a633c9f76d3eace0, 0xbd4f8c4f4f86707f28827b23d268e5581cb46e9d444a09b4f3f7cc579522fb54, '胜多负少', '2015-12-15 12:18:47', '', 'T');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_info`
--
ALTER TABLE `course_info`
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
  ADD PRIMARY KEY (`post_id`,`id`),
  ADD KEY `replyTime` (`reply_time`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`taskID`);

--
-- Indexes for table `task_submit`
--
ALTER TABLE `task_submit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `course_info`
--
ALTER TABLE `course_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `post`
--
ALTER TABLE `post`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '帖子的唯一标识', AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `task_submit`
--
ALTER TABLE `task_submit`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
