-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2012 年 11 月 26 日 05:56
-- 服务器版本: 5.5.27
-- PHP 版本: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `speedphp`
--

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `acl`
--

INSERT INTO `acl` (`acl_id`, `name`, `controller`, `action`, `role`) VALUES
(1, '后台文章列表', 'post', 'admin_index', 'ADMIN'),
(2, '后台文章删除', 'post', 'admin_ajax_str_delete', 'ADMIN');

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `parent_id` int(11) DEFAULT NULL COMMENT '父分类ID',
  `type` varchar(20) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL COMMENT '分类名称',
  `alias` varchar(128) DEFAULT NULL COMMENT '分类别名',
  `rank` int(5) DEFAULT '0' COMMENT '分类等级',
  PRIMARY KEY (`category_id`),
  KEY `FK_CATEGORY_ITSELF` (`parent_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='分类表，可用于文章分类' AUTO_INCREMENT=25 ;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`category_id`, `parent_id`, `type`, `name`, `alias`, `rank`) VALUES
(1, NULL, 'post', 'WEB前端开发', '前端', 10),
(2, NULL, 'post', '移动网络', '移动前端', 10),
(3, NULL, 'post', '用户体验', 'User experience', 0),
(4, 1, 'post', 'HTML5', NULL, 0),
(5, 1, 'post', 'CSS3', NULL, 0),
(6, 1, 'post', 'javascript', NULL, 0),
(7, 2, 'post', 'iOS', NULL, 0),
(8, 2, 'post', 'Android', NULL, 0),
(9, NULL, 'post', '关于我们', 'About Us', 0),
(24, 0, 'post', '随心随意', NULL, 10);

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '评论ID',
  `parent_id` int(11) DEFAULT NULL COMMENT '父评论ID',
  `post_id` int(11) NOT NULL COMMENT '文章ID',
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `title` varchar(128) DEFAULT NULL COMMENT '评论标题',
  `body` text COMMENT '评论内容',
  `created` datetime DEFAULT NULL COMMENT '创建时间',
  `modified` datetime DEFAULT NULL COMMENT '修改时间',
  `status` varchar(20) DEFAULT NULL COMMENT '状态（publish显示，draft不显示）',
  PRIMARY KEY (`comment_id`),
  KEY `FK_COMMENT_ITSELF` (`parent_id`),
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='文章表' AUTO_INCREMENT=57 ;

--
-- 转存表中的数据 `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `category_id`, `title`, `excerpt`, `body`, `status`, `rank`, `created`, `modified`) VALUES
(55, 2, 1, '杭州WEB前端会展中心', ' 岗位要求：\r\n1 .  负责网站WEB页面前端开发；\r\n2 . 对WEB设计稿进行切割并且符合W3C标准；', '<p> &nbsp;<span style="background-color:#FFFFFF;color:#5C5C5C;font-family:&#39;lucida grande&#39;, verdana, helvetica, arial, sans-serif;font-size:14px;line-height:2em;text-indent:2em;">岗位要求：</span></p><ol style="margin:0px;padding:0px;border:0px;font-size:14px;font:inherit;vertical-align:baseline;list-style:none;color:#5c5c5c;font-family:&#39;lucida grande&#39;, verdana, helvetica, arial, sans-serif;background-color:#ffffff;"><li style="margin:8px 0px 8px 60px;padding:0px;border:0px;font-size:14px;font:inherit;vertical-align:baseline;list-style:decimal;"><p>负责网站WEB页面前端开发；</p></li><li style="margin:8px 0px 8px 60px;padding:0px;border:0px;font-size:14px;font:inherit;vertical-align:baseline;list-style:decimal;"><p>对WEB设计稿进行切割并且符合W3C标准；</p></li><li style="margin:8px 0px 8px 60px;padding:0px;border:0px;font-size:14px;font:inherit;vertical-align:baseline;list-style:decimal;"><p>实现各种页面脚本需求，并协同技术部门完成产品开发计划；</p></li><li style="margin:8px 0px 8px 60px;padding:0px;border:0px;font-size:14px;font:inherit;vertical-align:baseline;list-style:decimal;"><p>长期进行产品维护和更新升级。 专业技能</p></li></ol><p><br /></p>', NULL, NULL, '2012-11-24 20:12:14', NULL),
(56, 2, 24, '[转]一位校长写给大学学生的一封信', '“不要说上课听不懂，不要说教师不关心，不要说专业不感兴趣，不要说学校太烂，堕落不需要理由，只需要借口。” ', '<p> &nbsp;<span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;">“不要说上课听不懂，不要说教师不关心，不要说专业不感兴趣，不要说学校太烂，堕落不需要理由，只需要借口。” </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; &nbsp;你们经历了高三，但是它对于你们来说并不是黑色的，只是一种比平时紧张的感觉而已，在内心深处你们还没有真正意义上体会到了为了自己的目标拼命的含义，在这一次比较苍白的过程中，你们已经丧失了一次铸炼自己的机会。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; &nbsp;一个人失去一次机会并不算什么，可是就是在这一次一次的失去中，有许多人就失去了成功的人生。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; &nbsp;那么，我的同学们，你们失去了什么？ </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; &nbsp;黑色是压抑和沉闷的，但是在它的背后，却代表成熟与大气。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; &nbsp;在你经历的大学生活中，你是不是有许多时间都不知所措，有许多时间都在宿舍里床上度过，有许多时间都用在QQ上的闲聊，有许多时间都在网络游戏里厮杀。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; &nbsp;一学期、一年、两年过去了……突然发现自己没有认真听过几节课，虽然给你们上课都是讲师以上级别的；突然发现自己没有认真读过几本书，虽然你们大学里的图书馆有很多的藏书；突然发现自己没有学到东西，虽然大学里有很多的可以学习东西。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; &nbsp;你现在是不是正在为期末考试过关，而不是达到优秀而发愁，正在盘算不会被亮红点的各种方法：突击学习，考试作弊，请酒送礼，独自祷告……</span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; &nbsp;一、读大学是享受生活还是塑造自我？ </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; &nbsp;在你们经历的大学生活中，有许多同学都反映到了这样一个问题：不知道自己一天到底要做什么，或是做什么都不起劲。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; &nbsp;这在刚进入大学的学生当中是一个非常普遍的现像，因为你们丧失了目标。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; &nbsp;对于许多同学而言，大学是你们最后的求学阶段。读完大学就要找工作，可是这对于已经做了十二年学生你们而言仍然显得那么的遥不可及。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; &nbsp;在大学里面没有任何一个教师会围绕你们转，学不学完全是自己的事。没有了以前做不完的作业你们觉得上课对自己空荡荡的，学了又怎么样，不学又怎么样？与其让自己学得这样辛苦，还不如让自己过得洒脱一点。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; &nbsp;没有任何人给你讲你应该去做什么，让你们觉得茫然不知所措。你们大多数人缺乏精神的独立与良好的自控，你们根本无法去把握这些显得过多的自由。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; &nbsp;到底要做怎样的人，到底要干什么样的事业，这些对于你们而言是毫无概念。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; &nbsp;从小学时代我的理想，到初中时代我的将来，到高中时代我的大学，到大学时代我的迷茫，你们在这一过程中完成了人生目标的蜕变，最后剩下的是死掉的虫皮。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; &nbsp;正是因为你们丧失了目标，</span><strong style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;">没有方向的船，什么风都不是顺风</strong><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;">。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; &nbsp;我相信，如果每一个同学都有一个目标，你们会过得很充实，会过得很忙碌，并且会得到很多。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; &nbsp;所以，请每一个同学都给自己定下一个目标吧。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; &nbsp;生活就像巧克力盒，你永远都不知道下一颗会是什么样的滋味！ </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; &nbsp;也许有的人会这样问：为什么别人可以潇洒地生活，而我却要痛苦的拼搏。我把它换成另外一个问题：读大学到底是享受生活还是塑造自我。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; &nbsp;有许多同学在刚进大学的时候都去尝试过竞选学生会、各种社团的干事与干部。事后，有许多同学都发出了这样的叹：不公平，做什么都要凭关系。我到想请问，学校尚且如此，社会又怎样呢？社会上对权术、关系、金钱不是玩得更彻底吗？以后你到底凭什么在社会上立足？要权力没权力，要关系没关系，要钞票没钞票，那到底还有什么呢？ </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; &nbsp;当你们大学毕业以后，却突然发现自己除了拿到了一个大学毕业证之外，除了能说一点好像很深奥的话题之外，并没有学到真正过硬的本事时，你们做的工作也许只是名称好听点而已，也许是任何人都可以做的而已。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; 到那时你们是不是还要怨天尤人？ </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; 我们每一个人都想过上高质量的生活，都想让自己的至亲过上无忧的生活，都想在世上留下自己价值的痕迹，但这些不是在享受中就可以实现的。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; 上天给了我们每个人一双手和一个大脑，就是要让我们去创造与思考。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; 大学这段时间是你们最佳的学习时间，所以请你们放弃享受，努力地重塑自我，为以后的腾飞积聚力量。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp;二、感情泛滥得只是被当成了一种需要！ </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; 既然是谈大学生活，那么爱情是一定要谈的。大学里面的正是青春期的少男与少女，爱情在这里不可避免地发生了。但不知何时起，这正常的不能再正常的事情却遭遇从来没有过的质疑：现在的大学生感情泛滥。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; 现在大学生的情感里面夹杂了大多的功利、欲望、放纵在里面。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; 每年毕业时，情侣们最后一顿饭，最后一次拥抱，最后一次亲吻，然后转身离开，踏上各自的旅途，从此把这段感情遗忘，就像从来没有发生一样。爱情只是被当成了一种需要。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; 有许多人要抓住爱情或是被爱情抓住。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; 但是我希望你们的爱情是真诚的，是认真的，是纯洁的，是本色的。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;如果你觉得他很帅，想去和他谈恋爱，请三思； </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;如果你觉得她很美，想去和她谈恋爱，请三思； </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;如果你觉得很孤单，想去找一个人谈恋爱，请三思； </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;如果你只是因为听了朋友的几句言语，就去和某个人谈恋爱，请放弃。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; &nbsp;“爱”字实际上已经清楚的表明它的对象： </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; &nbsp;下面的“友”字说明你应该很了解他（她），他（她）应该是你的朋友； </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; “ㄇ”说明你要在这些朋友之间认真选择； </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; “ノ”说明你只能在精挑细选中选出一个作为你的爱人，其它的只能作为你的朋友。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; &nbsp;请珍惜自己的情感，否则它会变得很廉价。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; &nbsp;爱情是什么？ </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; &nbsp;这个你们心里面应该清楚。我觉得：因为优秀而被吸引，因为吸引而被爱，因为被爱而学会爱，这才是爱的过程。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; &nbsp;三、责任，是成熟的思想内定的！ </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; 你们现在是在大学里求学，是在接受一种高额费用的教育，可是你们的父母高额的投入，在你们的身上得到了多少出？ </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; 你们没有多少人家里有万贯家财，你们现在用的每一分钱都是父母挣来的血汗钱，甚至是到处借来的钱，其间蕴含着无比的艰辛与对你们的爱。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; 在他们被岁月留下创痕的老脸上，还有一双对你们充满希望的眼睛，那一双浑浊甚至有一点模糊的眼睛。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; 责任，并不是别人给你的，而是自己成熟的思想内定的。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; 你们都说自己长大了，都说自己成熟了，但我觉得，20岁的你们只是一种表向的成熟。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; 你对自己父母具有永远都无法推卸的责任，但是你们却在无为与堕落当中放弃了承担的使命。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; 一学期结束后，回到家里过年时，你的父母仍旧对你宠爱有加，仍旧对你充满希望，仍旧对你叮咛嘱咐……</span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; 建造一个事物很难，摧毁一个事物却很容易。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; 同学们，请牢记并承担起你们对父母的责任。 </span><br style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;" /><span style="color:#454545;font-family:tahoma, helvetica, arial;font-size:14px;line-height:21px;background-color:#ffffff;"> &nbsp; &nbsp; 在你们的身边有太多的混日子的大学生，他们过着同龄人向往的潇洒生活；但是成功与伟大的人都是孤独与寂寞的，他们忍耐的过程中培养了他们超强的毅力与过人的智慧，或许我们就需要这些。</span></p>', NULL, NULL, '2012-11-24 22:43:44', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `username` varchar(128) DEFAULT NULL COMMENT '用户名',
  `password` varchar(128) DEFAULT NULL COMMENT '用户密码',
  `role` varchar(50) DEFAULT 'USER' COMMENT '用户身份',
  `nickname` varchar(50) DEFAULT NULL COMMENT '呢称',
  `email` varchar(128) DEFAULT NULL COMMENT '电子邮件',
  `url` varchar(128) DEFAULT NULL COMMENT '个人主页',
  `created` datetime DEFAULT NULL COMMENT '创建时间',
  `status` varchar(20) DEFAULT 'active' COMMENT '状态（active激活，unactive未激活）',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户表，记录用户的数据' AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `role`, `nickname`, `email`, `url`, `created`, `status`) VALUES
(1, 'root', '162d6567f99eb74df3f3dc666d3a3721', 'ROOT', '植宁', 'czn_574775237@163.com', 'www.zhining.com', '2012-11-24 09:00:00', 'active'),
(2, 'admin', '162d6567f99eb74df3f3dc666d3a3721', 'ADMIN', '管理员', 'sadasd@sad.com', '', NULL, NULL),
(3, '103094', '162d6567f99eb74df3f3dc666d3a3721', 'USER', '胡莹', 'asdsad@saasd.com', '', NULL, NULL),
(11, 'czn574775237', 'd95ab0d7b4823bdef8c2157578bb6c41', 'VISITOR', 'Zhining', 'zhining_temp@163.com', 'www.zhining.com', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
