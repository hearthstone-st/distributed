-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-04-11 11:14:46
-- 服务器版本： 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `distributed_course`
--

-- --------------------------------------------------------

--
-- 表的结构 `course_info`
--

CREATE TABLE IF NOT EXISTS `course_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_introduce` text COLLATE utf8_unicode_ci NOT NULL COMMENT '课程简介',
  `teaching_environment` text COLLATE utf8_unicode_ci NOT NULL COMMENT '教学条件',
  `teaching_program` text COLLATE utf8_unicode_ci NOT NULL COMMENT '教学大纲',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `course_info`
--

INSERT INTO `course_info` (`id`, `course_introduce`, `teaching_environment`, `teaching_program`) VALUES
(1, '<p>课程名称：分布式精品课程</p><p>学分/学时：3/48</p><p>开课单位：北京理工大学</p><p>面向对象：2015级研究生</p><p>本课程主要介绍无线网络、Ad hoc、Wireless Sensor Networks、移动定位与位置管理、移动网络QoS等基本原理、概念与开发方法，了解移动计算技术发展的前沿与最新进展，了解日益普及的移动互联网和移动计算原理和技术。</p><p>目标：了解移动计算前沿与课题，掌握研究方式、方法和工具，为后续研究打下基础；在阅读最新文献的基础上进行分析、归纳和总结，完成某个研究领域相关理论与技术的综述报告或技术研究报告<br></p>', '<p>122</p>', '<p style="text-align: center;"><a><span style="font-size: 22pt;">《分布式系统》教学大纲</span></a></p><p><b><span style="font-size: 12pt; color: black;">课程名称：分布式系统</span></b></p><p><b><span style="font-size: 12pt; color: black;">学分：</span></b><b><span style="font-size: 12pt; color: black;">4</span></b><b></b></p><p><b><span style="font-size: 12pt; color: black;">学时：64&nbsp;&nbsp;&nbsp;&nbsp; </span></b><b><span style="font-size: 12pt;">讲课学时：</span></b><b><span style="font-size: 12pt; color: black;">32</span></b><span style="font-size: 12pt;">　　　　</span><span style="font-size: 12pt;">；</span><b><span style="font-size: 12pt;">实验（实践）学时：</span></b><b><span style="font-size: 12pt; color: black;">32</span></b></p><p><b><span style="font-size: 12pt; color: black;">先修课程：</span></b><b><span style="font-size: 12pt;">无</span></b></p><p><b><span style="font-size: 12pt; color: black;">适用专业：软件工程</span></b></p><p><b><span style="font-size: 12pt;">开课学科部：软件学院</span></b></p><p>一、课程性质、目的和培养目标</p><p><b><span style="font-size: 12pt;">课程类型：</span></b><span style="font-size: 12pt;">学科专业核心课</span></p><p><b><span style="font-size: 12pt; color: black;">课程性质</span></b><span style="color: black;">：选修课</span></p><p><b><span style="font-size: 12pt; color: black;">课程目的：本课程的教学目标是：使学生了解并掌握分布式系统的定义、优势、缺点、应用和测试，拓宽学生的视野，提高学生的专业素质。</span></b></p><p><b><span style="font-size: 12pt; color: black;">与本教程配套的教学支持网站内容丰富，为教师教学和学生学习提供帮助。</span></b></p><p><b><span style="font-size: 12pt; color: black;">培养目标</span></b><span style="font-size: 12pt; color: black;">：</span><span style="font-size: 12pt;">使学生在课程结束时基本掌握分布式系统，并能将课程内容运用于实践当中。</span></p><p>二、课程内容和建议学时分配</p><p style="margin-left: 0cm;"><b><span style="font-size: 12pt;">本课程教学内容主要包括以下几个方面：分布式系统的基本概念、分布式程序设计语言、分布式文件系统、分布式数据库系统、分布式邮件系统、分布式系统的应用和标准、分布式系统的优缺点、分布式系统的应用、分布式系统的测试、分布式系统的目标。</span></b><b></b></p><p><b><span style="font-size: 12pt; color: black;">&nbsp;</span></b></p><p><b><span style="font-size: 12pt; color: black;">课程教学建议与说明</span></b></p><p><span style="font-size: 12pt; color: black;">分布式系统教学应强调实际运用能力。可通过开展形式多样的课堂教学活动，鼓励学生积极参与，并应努力促使学生自学、启发学生的兴趣。</span></p><p><span style="color: black;">三、实验（上机）内容和建议学时分配</span></p><p style="margin-left: 21pt;"><span style="font-size: 12pt;">分布式系统的实际应用，32学时。</span></p><p>四、教材和参考书目</p><p><span style="font-size: 12pt;">分布式系统原理与泛型&nbsp;&nbsp;&nbsp; AndrewS．Tanenbaum&nbsp;&nbsp; 清华大学出版社</span></p><p>五、考核方式</p><p><span style="font-size: 12pt; color: black;">本课程为考试课程，由课堂提问、书面作业、书面考试、项目实践组成。课堂提问、书面作业构成平时成绩，占总评的20%；期末书面考试占总评的40%，项目实践占40%。</span></p>');

-- --------------------------------------------------------

--
-- 表的结构 `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文件的唯一标识',
  `name` text COLLATE utf8_unicode_ci NOT NULL COMMENT '文件的名字',
  `type` int(50) NOT NULL COMMENT '文件类型',
  `task_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL COMMENT '上传人的id',
  `upload_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '上传的时间',
  `url` text COLLATE utf8_unicode_ci NOT NULL COMMENT '文件URL',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `file`
--

INSERT INTO `file` (`id`, `name`, `type`, `task_id`, `teacher_id`, `upload_time`, `url`) VALUES
(1, 'bare_conf.pdf', 0, 111, 0, '2015-12-29 12:14:40', 'upload/bare_conf.pdf'),
(3, 'bare_conf- 副本- 副本.pdf', 0, 111, 0, '2015-12-29 13:12:27', 'upload/bare_conf.pdf'),
(4, 'task.sql', 0, 112, 0, '2015-12-30 06:42:45', 'upfile/file/task.sql'),
(7, 'file- 副本.sql', 0, 113, 0, '2015-12-30 07:05:34', 'upfile/file/file.sql'),
(8, 'distributed_course.sql', 0, 110, 0, '2016-01-15 12:15:47', 'upload/distributed_course.sql'),
(9, 'p2218921443.jpg', 0, 2, 0, '2016-01-16 06:26:39', 'upload/p2218921443.jpg'),
(11, '%E9%AB%98%E6%B8%85%E7%A7%8D%E5%AD%90.zip', 0, 9, 0, '2016-01-18 14:06:12', 'upload/%E9%AB%98%E6%B8%85%E7%A7%8D%E5%AD%90.zip'),
(13, '用户账号表_模板- 副本.xlsx', 0, 14, 48, '2016-01-19 05:17:46', 'upload/用户账号表_模板- 副本.xlsx');

-- --------------------------------------------------------

--
-- 表的结构 `grade`
--

CREATE TABLE IF NOT EXISTS `grade` (
  `id` int(10) NOT NULL,
  `task_id` int(10) NOT NULL,
  `student_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '学生的学号',
  `score` int(1) NOT NULL COMMENT '分数  （0-100）编写存储过程',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '评分的时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `permissions` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

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

CREATE TABLE IF NOT EXISTS `materials` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '资料的唯一标识',
  `title` text COLLATE utf8_unicode_ci NOT NULL COMMENT '资料的名称',
  `linkPDF` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'PDF唯一标识的外键',
  `materialsType` char(1) COLLATE utf8_unicode_ci NOT NULL COMMENT 'C表示课件，R表示参考文献',
  `teacher_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `materials`
--

INSERT INTO `materials` (`id`, `title`, `linkPDF`, `materialsType`, `teacher_id`) VALUES
(4, '0810.1355v1.pdf', 'upload/ware/0810.1355v1.pdf', 'C', 30),
(5, '网络态势感知系统研究综述.pdf', 'upload/ware/网络态势感知系统研究综述.pdf', 'R', 73),
(6, 'distributed_course (1).sql', 'upload/ware/distributed_course (1).sql', 'C', 76),
(7, 'multisensor data fusion for next generation distributed intrusion detection systems.pdf', 'upload/ware/multisensor data fusion for next generation distributed intrusion detection systems.pdf', '', 76),
(8, 'multisensor data fusion for next generation distributed intrusion detection systems- 副本.pdf', 'upload/ware/multisensor data fusion for next generation distributed intrusion detection systems.pdf', 'C', 76),
(9, 'mat-erials (1).sql', 'upload/ware/mat-erials (1).sql', 'C', 76),
(10, 'ajdfjakldjfkljadkljfkjfdkljfkjsdklfjklsdjkfljksdljfklsjdkfljskldfjklsjdklfj.sql', 'upload/ware/ajdfjakldjfkljadkljfkjfdkljfkjsdklfjklsdjkfljksdljfklsjdkfljskldfjklsjdklfj.sql', 'C', 76),
(11, 'distributed_course.sql', 'upload/ware/distributed_course.sql', 'C', 76),
(12, 'GitHubLog.txt', 'upload/ware/GitHubLog.txt', 'R', 76),
(13, '名单2.xlsx', 'upload/ware/名单2.xlsx', 'R', 76);

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '外键',
  `title` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT '新闻的标题',
  `context` text COLLATE utf8_unicode_ci NOT NULL COMMENT '内容',
  `upload_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '上传时间',
  `upload_people` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '上传人的姓名',
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='新闻动态表' AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`id`, `title`, `context`, `upload_time`, `upload_people`, `type`) VALUES
(2, '实验1验收安排', '<p style="text-align: left;">初定1月20日（星期三）进行实验1的验收。</p><p style="text-align: left;">请各位同学们先把1月20日的时间空闲出来。</p><p style="text-align: left;">我需要下星期一（1月18日）去学院办公室协商好教室后再行发布实验验收的后续通知。</p><p style="text-align: left;">请同学们互相转告，谢谢！</p>', '2016-01-17 17:21:18', 'chenxiaolei', 'news'),
(3, '课程互动加分申请', '<p style="text-align: left;"><br>课堂参与加分的公示期自课代表发帖至下一次课程上课前。如在公示期内无异议，则默认通过公示，主讲教师自动记录加分项。</p><p style="text-align: left;">主讲教师不再另行发通知说明公示期问题。</p><p style="text-align: left;">请互相转告，谢谢！</p>', '2016-01-17 17:22:26', 'chenxiaolei', 'notice'),
(4, '期末考试时间安排', '<p style="text-align: left;">分布式精品课程网站考试时间已定，将于2016年1月25号18:00-20:00在研究生楼302举行，请同学带好相关证件准时参加，谢谢！<br></p>', '2016-01-17 17:56:02', 'chenxiaolei', 'notice'),
(5, '实验2验收安排', '<p style="text-align: left;">今天是预通知，初定1月20日（星期三）进行软件验收。</p><p style="text-align: left;">请各位同学先把1月20日的时间空闲出来。</p><p style="text-align: left;">我需要下星期一（1月18日）去学院办公室协商好教室后再行发布软件验收的后续通知。</p><p style="text-align: left;">请同学们互相转告，谢谢！</p>', '2016-01-17 18:00:04', 'chenxiaolei', 'news'),
(6, '实验3验收安排', '<p style="text-align: left;">今天是预通知，初定1月20日（星期三）进行软件验收。</p><p style="text-align: left;">请各位同学先把1月20日的时间空闲出来。</p><p style="text-align: left;">我需要下星期一（1月18日）去学院办公室协商好教室后再行发布软件验收的后续通知。</p><p style="text-align: left;">请同学们互相转告，谢谢！</p>', '2016-01-17 18:00:09', 'chenxiaolei', 'news'),
(7, '交作业', '<p>交作业</p>', '2016-01-18 19:20:45', '蔡建宇1', 'notice'),
(8, 'test', '<p>test</p>', '2016-01-18 22:16:13', '蔡建宇', 'news');

-- --------------------------------------------------------

--
-- 表的结构 `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '唯一标识',
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '标题',
  `context` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT '内容',
  `upload_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '上传时间',
  `upload_people` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '上传人的姓名',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `PDF`
--

CREATE TABLE IF NOT EXISTS `PDF` (
  `fileID` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '文件的唯一标识',
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '文件的名字',
  `upload_people` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '上传人的姓名',
  `upload_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '上传的时间',
  PRIMARY KEY (`fileID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '帖子的唯一标识',
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '帖子的标题',
  `context` varchar(800) COLLATE utf8_unicode_ci NOT NULL COMMENT '帖子的内容',
  `release_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '发帖的时间',
  `release_people` int(10) NOT NULL COMMENT '发帖人id',
  `imgs` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=41 ;

--
-- 转存表中的数据 `post`
--

INSERT INTO `post` (`id`, `title`, `context`, `release_time`, `release_people`, `imgs`) VALUES
(1, '想用 GO 写一个开源分布式数据处理相关的系统，并学习 GO，有什么建议？', 'Update：原问题还请教了有哪些开源项目可以参与实践，这个我了解不多，请有需要的看其它人的回答。 1. Distributed-systems-readings这个网址里收集了一堆美帝各TOP大学分布式相关的课程，我就是从这找到MIT的那门课的。 2. Paxos算法要问为啥单独把这个算法…...', '2015-11-11 16:00:00', 30, '0ff41bd5ad6eddc43bb8e6873fdbb6fd5266336a.jpg|20151202114315658.jpg|20151203152354755.jpg'),
(3, '分布式系统领域有哪些经典论文？', '分布式系统是一个很大的领域，里面包含很多方向。既然你都要读paper了，应该也有一定基础了。伊利诺伊大学的Advanced Distributed Systems 里把各个方向重要papers...', '2015-12-02 06:08:44', 30, '20151202114315658.jpg|20151203152354755.jpg'),
(8, '2015 年国内外有什么让你眼前一亮的 App？', '2015 年国内外有什么让你眼前一亮的 App？', '2015-12-04 00:56:00', 30, '20151204085555736.jpg|20151204085558346.jpg'),
(36, '关于实验2中论文作者的书写规范', '<p style="text-align: left;">我给出的是基本的实际工作状态，已经是经过我初步处理的数据。</p><p style="text-align: left;">现实生活中人工工作状态下，也有可能有很多种方式表达同一问题。在数据库建库、数据装入的过程中都需要考虑。</p><p style="text-align: left;">你需要根据我给出的基础数据进行进一步的处理，满足你建立数据库的基本要求，然后才能做导入、查询处理。这在实际的项目中，有的单位会专门成立标准化部门，也有的会成立数据预处理部门进行数据的前期处理。实际编程中，也可以不对姓名进行约束，导入后再建立一张姓名映射表进行关联查询。</p><p style="text-align: left;">如果你是单条插入数据，则可按照你自己定义的格式自行进行插入。</p><p style="text-align: left;">希望我回答并正确回答了你的问题。欢迎继续交流。</p>', '2016-01-18 06:12:41', 48, ''),
(37, '实验3实验报告提交情况', '<p>学生人数是40人，目前提交实验报告是38分，还有两名同学未提交实验报告，请未提交实验报告的同学尽快提交，实验报告提交截止时间是2016.1.19 24点<br></p>', '2016-01-18 06:16:14', 48, ''),
(38, '实验2验收需准备的材料', '<p>请问老师1月20号试验2的验收需要准备什么材料，打分表是自带还是不需要自带？<br></p>', '2016-01-18 06:18:47', 47, ''),
(40, '新帖子', '<p>1</p>', '2016-01-18 22:20:13', 48, '20160119062011911.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `post_reply`
--

CREATE TABLE IF NOT EXISTS `post_reply` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '回复帖子的ID',
  `post_id` int(10) NOT NULL,
  `context` varchar(800) COLLATE utf8_unicode_ci NOT NULL COMMENT '回复的内容',
  `reply_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '回复的时间',
  `sender` int(10) NOT NULL COMMENT '回复人的姓名',
  `receiver` int(10) NOT NULL,
  `is_readed` tinyint(1) NOT NULL DEFAULT '0',
  `imgs` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `replyTime` (`reply_time`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='回复贴表' AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `post_reply`
--

INSERT INTO `post_reply` (`id`, `post_id`, `context`, `reply_time`, `sender`, `receiver`, `is_readed`, `imgs`) VALUES
(1, 1, '分布式系统在互联网时代，尤其是大数据时代到来之后，成为了每个程序员的必备技能之一。分布式系统从上个世纪80年代就开始有了不少出色的研究和论文，我在这里只列举最近15年范围以内我觉得有重大影响意义的15篇论文（15 within 15）。\n1. The Google File System: 这是分布式文件系统领域划时代意义的论文，文中的多副本机制、控制流与数据流隔离和追加写模式等概念几乎成为了分布式文件系统领域的标准，其影响之深远通过其5000+的引用就可见一斑了，Apache Hadoop鼎鼎大名的HDFS就是GFS的模仿之作；\n2. MapReduce: Simplified Data Processing on Large Clusters：这篇也是Google的大作，通过Map和Reduce两个操作，大大简化了分布式计算的复杂度，使得任何需要的程序员都可以编写分布式计算程序，其中使用到的技术值得我们好好学习：简约而不简单！Hadoop也根据这篇论文做了一个开源的MapReduce；\n3. Bigtable: A Distributed Storage System for Structured Data：Google在NoSQL领域的分布式表格系统，LSM树的最好使用范例，广泛使用到了网页索引存储、YouTube数据管理等业务，Hadoop对应的开源系统叫HBase（我在前公司任职时也开发过一个相应的系统叫BladeCube，性能较HBase有数倍提升）；\n4. The Chubby lock service for loosely-coupled distributed systems：Google的分布式锁服务，基于Paxos协议，这篇文章相比于前三篇可能知道的人就少了，但是其对应的开源系统zookeeper几乎是每个后端同学都接触过，其影响力其实不亚于', '2015-11-26 09:31:48', 44, 30, 1, ''),
(13, 1, '<p>test</p>', '2016-01-18 19:39:35', 48, 44, 0, ''),
(14, 38, '<p>123</p>', '2016-01-18 22:19:45', 48, 47, 0, '20160119061943867.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '外键',
  `phone` char(11) COLLATE utf8_unicode_ci NOT NULL COMMENT '手机号码',
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '邮箱地址',
  `user` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='学生表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `student`
--

INSERT INTO `student` (`id`, `phone`, `email`, `user`, `user_id`) VALUES
(1, '', '', 0, 47),
(2, '', '', 0, 44);

-- --------------------------------------------------------

--
-- 表的结构 `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `teacher_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL COMMENT '外键',
  `title` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '任务的标题',
  `context` varchar(300) COLLATE utf8_unicode_ci NOT NULL COMMENT '任务的内容',
  `start_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '任务的开始时间',
  `end_time` int(11) DEFAULT NULL COMMENT '任务的结束时间',
  `type` char(1) COLLATE utf8_unicode_ci NOT NULL COMMENT 'H表示作业，E表示实验',
  `importance` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='作业、实验统称为任务' AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `task`
--

INSERT INTO `task` (`id`, `teacher_id`, `title`, `context`, `start_time`, `end_time`, `type`, `importance`) VALUES
(4, '48', '大家试一试', '克隆 BSP在本实验中, 将使用Visual Studio 2005中的Clone BSP 工具来创建一个Device Emulator Board Support Package (BSP)的拷贝. 在接下来的实验中可以		\n					\n					\n					\n			', '2016-01-18 13:16:39', 1453244400, 'E', 1),
(5, '30', '作业3', '这是作业3', '2016-01-18 13:16:39', 1453244400, 'H', 5),
(7, '48', '实验3', '简单的分布式文件系统', '2016-01-18 11:43:21', 1454194800, 'E', 5),
(8, '48', '作业4', '作业4', '2016-01-18 12:39:51', 1453158000, 'E', 2),
(9, '48', '实验1', '自行查阅资料，编写一个简单的分布式文件系统。		\n			', '2016-01-18 12:47:14', 1453244400, 'E', 3),
(14, '48', '新作业', '新作业', '2016-01-19 05:17:46', 1453244400, 'H', 9);

--
-- 触发器 `task`
--
DROP TRIGGER IF EXISTS `Del_Task`;
DELIMITER //
CREATE TRIGGER `Del_Task` AFTER DELETE ON `task`
 FOR EACH ROW delete a.*,b.* 
from task_submit a,file b where a.task_id=old.id and b.task_id=old.id
//
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `task_submit`
--

CREATE TABLE IF NOT EXISTS `task_submit` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `task_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `file_link` text CHARACTER SET utf8 NOT NULL,
  `score` int(10) NOT NULL COMMENT '分数',
  PRIMARY KEY (`id`),
  UNIQUE KEY `task_id` (`task_id`,`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `task_submit`
--

INSERT INTO `task_submit` (`id`, `task_id`, `user_id`, `file_link`, `score`) VALUES
(2, 4, 44, 'sdfdsf', 82),
(4, 5, 44, 'upload/materials.sql', 67),
(5, 7, 44, 'upload/materials.sql', 54),
(6, 6, 47, 'upload/materials.sql', 90),
(11, 9, 47, 'upload/homework/[neubt][CMCT].????.1991.????.?????CMCT??.torrent', 90),
(13, 7, 47, 'upload/homework/Scala??.pdf', 90),
(15, 8, 47, 'upload/homework/Spark??????-????.doc', 80),
(17, 4, 47, 'upload/homework/[neubt][NYPT].最强大脑第三季 20160108期 完整版：王石奏响大佬级嘉宾序曲 SNH48青春演绎“.torrent', 30),
(19, 5, 47, 'upload/homework/用户账号表_模板.xlsx', 0),
(20, 14, 47, 'upload/homework/用户账号表_模板.xlsx', 90);

-- --------------------------------------------------------

--
-- 表的结构 `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `professional_title` varchar(25) COLLATE utf8_unicode_ci NOT NULL COMMENT '职称，自己定义字段代表什么',
  `main_job` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '在课程中的主要工作',
  `research_achievements` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT '研究经历',
  `record_information` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT '获奖经历',
  `user_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `teacher`
--

INSERT INTO `teacher` (`id`, `professional_title`, `main_job`, `research_achievements`, `record_information`, `user_id`) VALUES
(1, '教授', 'IBM首席架构师、微软首席工程师、谷歌总工程师', '研究方向为人工智能、网络安全。\r\n承担了包括863、国家自然科学基金、北京市自然科学基金、国防基础研究课题、公安部重点实验室课题、教育部留学回国人员科研启动基金课题等十余项。\r\n发表论文20余篇，其中SCI或EI收录的17篇，申请发明专利1项，编写翻译教材3部。', '2012年获得教育部专业综合改革项目奖教金\r\n2010年获得全国大学生信息安全竞赛优秀指导教师奖\r\n2009年获得北京理工大学科技成果一等奖\r\n', 48);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varbinary(64) NOT NULL,
  `salt` varbinary(32) NOT NULL,
  `name` varchar(50) NOT NULL,
  `joined` datetime NOT NULL,
  `portraits` varchar(255) NOT NULL,
  `group` char(1) NOT NULL,
  `sex` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=86 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `salt`, `name`, `joined`, `portraits`, `group`, `sex`) VALUES
(30, 'c123123', '���\\詰$Ax�(�l,�8W#�jk��X���\n', '�����#�6Yc{@m���-��(MŴ`�J���W', '蔡建宇', '2015-01-08 16:21:15', 'hp3.jpg', 'M', ''),
(44, 'c111111', '932f3c1b56257ce8539ac269d7aab42550dacf8818d075f0bdf1990562aae3ef', '9aae02d8c3b3abaad4340af0082446a0', '陈晓磊', '2015-05-21 13:47:56', 'hp5.jpg', 'S', ''),
(45, 'c123123123', '���\\詰$Ax�(�l,�8W#�jk��X���\n', '���:��U2+,>P\n^�����2�n-��h�L', '马锐', '2015-05-23 16:42:31', 'hp17.jpg', 'M', ''),
(47, '2220150544', '���\\詰$Ax�(�l,�8W#�jk��X���\n', '��$����%p�ƍ\r�\0�d��\nC����j�', 'Jerry', '2016-01-16 07:49:26', 'hp_defalut_stu_male.png', 'S', 'M'),
(48, '2220150545', '���\\詰$Ax�(�l,�8W#�jk��X���\n', '\\�o�����3�~��ȡ*&l����9�\n�	�', '陈超源', '2016-01-18 12:09:59', 'hp_defalut_tea_male.png', 'T', 'M');

--
-- 触发器 `user`
--
DROP TRIGGER IF EXISTS `delete_user`;
DELIMITER //
CREATE TRIGGER `delete_user` AFTER DELETE ON `user`
 FOR EACH ROW begin
delete from task where teacher_id=old.id;
delete from task_submit where user_id=old.id;
delete from student where  user_id=old.id;
delete from teacher where user_id=old.id;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `users_session`
--

CREATE TABLE IF NOT EXISTS `users_session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varbinary(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
