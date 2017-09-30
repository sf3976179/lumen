-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 �?09 �?30 �?07:34
-- 服务器版本: 5.5.53
-- PHP 版本: 5.6.27

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `lumen`
--

-- --------------------------------------------------------

--
-- 表的结构 `lu_article`
--

CREATE TABLE IF NOT EXISTS `lu_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '索引id',
  `ac_name` varchar(100) NOT NULL COMMENT '分类名称',
  `ac_parent_id` int(10) DEFAULT '0' COMMENT '父级id',
  `ac_subtitle` varchar(100) NOT NULL COMMENT '副标题',
  `member_id` int(10) NOT NULL COMMENT '会员id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='文章分类表' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `lu_article`
--

INSERT INTO `lu_article` (`id`, `ac_name`, `ac_parent_id`, `ac_subtitle`, `member_id`) VALUES
(4, '文章大标题1', 0, '文章小标题1', 4),
(5, '文章大标题2', 0, '文章小标题2', 4),
(6, '文章大标题3', 5, '文章小标题3', 4);

-- --------------------------------------------------------

--
-- 表的结构 `lu_article_comment`
--

CREATE TABLE IF NOT EXISTS `lu_article_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL COMMENT '会员ID',
  `parent_id` int(10) DEFAULT '0' COMMENT '评论上级、层主直接回复消息id',
  `article_id` int(10) NOT NULL COMMENT '文章id',
  `comment` text COMMENT '文章评论',
  `type` tinyint(2) NOT NULL COMMENT '1:点赞 2:评论',
  `star` tinyint(2) unsigned zerofill DEFAULT '00' COMMENT '1代表点赞 0回复初始',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='文章评论表' AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `lu_article_comment`
--

INSERT INTO `lu_article_comment` (`id`, `user_id`, `parent_id`, `article_id`, `comment`, `type`, `star`) VALUES
(1, 4, 0, 1, NULL, 1, 01),
(2, 4, 0, 1, NULL, 1, 01),
(3, 4, 0, 1, NULL, 1, 01),
(4, 4, 0, 2, '文章2写的不错！！！', 2, 00),
(5, 4, 0, 2, '文章5写的不错！！！', 2, 00),
(6, 4, 0, 2, '文章2写的不错！！！', 2, 00),
(7, 4, 5, 2, '文章2写的不错！！！', 2, 00),
(8, 4, 0, 1, NULL, 1, 01),
(9, 4, 0, 1, NULL, 1, 01);

-- --------------------------------------------------------

--
-- 表的结构 `lu_article_content`
--

CREATE TABLE IF NOT EXISTS `lu_article_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL COMMENT '会员id',
  `ac_id` varchar(20) NOT NULL DEFAULT '0' COMMENT '文章分类id',
  `main_title` varchar(100) NOT NULL COMMENT '文章大标题',
  `subtitle` varchar(100) NOT NULL COMMENT '文章小标题',
  `ac_tag` varchar(255) DEFAULT NULL COMMENT '自定义标签',
  `image_name` varchar(200) DEFAULT NULL COMMENT '图片名称',
  `movie_name` varchar(100) DEFAULT NULL COMMENT '视频名称',
  `ac_display` tinyint(3) NOT NULL DEFAULT '0' COMMENT '文章显示方式 0：公开 1：私人',
  `content` text COMMENT '文章内容',
  `add_time` int(10) NOT NULL COMMENT '文章添加时间',
  `update_time` int(10) NOT NULL COMMENT '文章更改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='文章内容表' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `lu_article_content`
--

INSERT INTO `lu_article_content` (`id`, `user_id`, `ac_id`, `main_title`, `subtitle`, `ac_tag`, `image_name`, `movie_name`, `ac_display`, `content`, `add_time`, `update_time`) VALUES
(1, 4, '6', '文章大标题-好的文章', '文章小标题-好的小标题', '自定义1，自定义2，自定义3', '2017091407235259ba2e8852211.png', '', 1, '随着iPhone8的发布，依然有唱衰者跳出来，责怪库克让苹果走下了神坛，更有人大放厥词称库克在吃乔帮主留下来的“老本”。试问，在这个科技快速迭代的时代，有哪个公司的“老本”够后来者吃上七年之久。苹果已然不是曾经那个苹果，但它依旧屹立在世界之巅，还是那个孤独的守擂者。\n从长期来看，唱衰者100%是正确的。但如果就此把苹果的平庸化归罪于库克，那未免有失偏颇。乔布斯给苹果打下的个人色彩太过于鲜明，以至于似乎除了他本人，任何人接班苹果都会是一个错误。', 1505381105, 1505381105),
(2, 4, '6', '文章大标题-好的文章', '文章小标题-好的小标题', '自定义1，自定义2，自定义3', '2017091407235259ba2e8852211.png', '', 1, '随着iPhone8的发布，依然有唱衰者跳出来，责怪库克让苹果走下了神坛，更有人大放厥词称库克在吃乔帮主留下来的“老本”。试问，在这个科技快速迭代的时代，有哪个公司的“老本”够后来者吃上七年之久。苹果已然不是曾经那个苹果，但它依旧屹立在世界之巅，还是那个孤独的守擂者。\n从长期来看，唱衰者100%是正确的。但如果就此把苹果的平庸化归罪于库克，那未免有失偏颇。乔布斯给苹果打下的个人色彩太过于鲜明，以至于似乎除了他本人，任何人接班苹果都会是一个错误。', 1505381143, 1505381143),
(3, 4, '6', '文章大标题-好的文章', '文章小标题-好的小标题', '自定义1，自定义2，自定义3', '2017091407235259ba2e8852211.png', '', 1, '随着iPhone8的发布，依然有唱衰者跳出来，责怪库克让苹果走下了神坛，更有人大放厥词称库克在吃乔帮主留下来的“老本”。试问，在这个科技快速迭代的时代，有哪个公司的“老本”够后来者吃上七年之久。苹果已然不是曾经那个苹果，但它依旧屹立在世界之巅，还是那个孤独的守擂者。\n从长期来看，唱衰者100%是正确的。但如果就此把苹果的平庸化归罪于库克，那未免有失偏颇。乔布斯给苹果打下的个人色彩太过于鲜明，以至于似乎除了他本人，任何人接班苹果都会是一个错误。', 1505381198, 1505381198),
(4, 4, '6', '文章大标题-好的文章', '文章小标题-好的小标题', '自定义1，自定义2，自定义3', '2017091407235259ba2e8852211.png', '', 1, '随着iPhone8的发布，依然有唱衰者跳出来，责怪库克让苹果走下了神坛，更有人大放厥词称库克在吃乔帮主留下来的“老本”。试问，在这个科技快速迭代的时代，有哪个公司的“老本”够后来者吃上七年之久。苹果已然不是曾经那个苹果，但它依旧屹立在世界之巅，还是那个孤独的守擂者。\n从长期来看，唱衰者100%是正确的。但如果就此把苹果的平庸化归罪于库克，那未免有失偏颇。乔布斯给苹果打下的个人色彩太过于鲜明，以至于似乎除了他本人，任何人接班苹果都会是一个错误。', 1505793086, 1505793086);

-- --------------------------------------------------------

--
-- 表的结构 `lu_integer_goods`
--

CREATE TABLE IF NOT EXISTS `lu_integer_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '积分商品id',
  `goods_name` varchar(20) NOT NULL COMMENT '商品名称',
  `goods_subtitle` varchar(40) NOT NULL COMMENT '商品副标题',
  `goods_class` varchar(10) NOT NULL COMMENT '商品分类',
  `goods_price` decimal(10,2) NOT NULL COMMENT '积分商品价格',
  `goods_storage_alarm` tinyint(3) NOT NULL COMMENT '库存报警值',
  `goods_follow` int(10) DEFAULT '0' COMMENT '商品关注数量（用户关注）',
  `goods_salenum` int(10) DEFAULT '0' COMMENT '销售数量',
  `spec_id` varchar(50) DEFAULT NULL COMMENT '商品规格id',
  `goods_storage` int(10) NOT NULL COMMENT '商品库存',
  `goods_image` varchar(100) NOT NULL COMMENT '商品图片',
  `goods_body` text NOT NULL COMMENT '商品描述',
  `goods_state` tinyint(2) DEFAULT '1' COMMENT '商品状态 1：正常 2：下架',
  `goods_addtime` int(10) NOT NULL COMMENT '商品添加时间',
  `goods_edittime` int(10) NOT NULL COMMENT '商品修改时间',
  `goods_commend` tinyint(2) DEFAULT '0' COMMENT '商品推荐 0：否 1：是',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='积分商品表' AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `lu_integer_goods`
--

INSERT INTO `lu_integer_goods` (`id`, `goods_name`, `goods_subtitle`, `goods_class`, `goods_price`, `goods_storage_alarm`, `goods_follow`, `goods_salenum`, `spec_id`, `goods_storage`, `goods_image`, `goods_body`, `goods_state`, `goods_addtime`, `goods_edittime`, `goods_commend`) VALUES
(1, '积分商品01', '积分商品副标题01', '1,3,7', '1.05', 100, 0, 0, NULL, 2000, '1.jpg', '积分商品01的商品描述', 1, 1505983243, 1505983243, 0),
(2, '积分商品01', '积分商品副标题01', '1,3,7', '1.05', 100, 0, 0, NULL, 2000, '1.jpg', '积分商品01的商品描述', 1, 1505983243, 1505983243, 0),
(3, '积分商品01', '积分商品副标题01', '1,3,7', '1.05', 100, 0, 0, NULL, 2000, '1.jpg', '积分商品01的商品描述', 1, 1505983243, 1505983243, 0),
(4, '积分商品01', '积分商品副标题01', '1,3,7', '1.05', 100, 0, 0, NULL, 2000, '1.jpg', '积分商品01的商品描述', 1, 1505983243, 1505983243, 0),
(5, '积分商品01', '积分商品副标题01', '1,3,7', '1.05', 100, 0, 0, NULL, 2000, '1.jpg', '积分商品01的商品描述', 1, 1505983243, 1505983243, 0),
(6, '积分商品01', '积分商品副标题01', '1,3,7', '1.05', 100, 0, 0, NULL, 2000, '1.jpg', '积分商品01的商品描述', 1, 1505983243, 1505983243, 0),
(7, '积分商品01', '积分商品副标题01', '1,3,7', '1.05', 100, 0, 0, NULL, 2000, '1.jpg', '积分商品01的商品描述', 1, 1505983243, 1505983243, 0),
(8, '积分商品01', '积分商品副标题01', '1,3,7', '1.05', 100, 0, 0, NULL, 2000, '1.jpg', '积分商品01的商品描述', 1, 1505983243, 1505983243, 0),
(9, '', '积分商品副标题01', '1,3,7', '1.05', 100, 0, 0, NULL, 2000, '1.jpg', '积分商品01的商品描述', 1, 1505983243, 1505983243, 0),
(10, '积分商品01', '积分商品副标题01', '1,3,7', '1.05', 100, 0, 0, NULL, 2000, '1.jpg', '积分商品01的商品描述', 1, 1505983243, 1505983243, 0),
(11, '积分商品01', '积分商品副标题01', '', '0.00', 100, 0, 0, NULL, 2000, '1.jpg', '积分商品01的商品描述', 1, 1505983243, 1505983243, 0),
(12, '积分商品01', '积分商品副标题01', '1,3,7', '10000.11', 100, 0, 0, NULL, 2000, '1.jpg', '积分商品01的商品描述', 1, 1505983243, 1505983243, 0),
(20, '积分商品01', '积分商品副标题01', '1,3,7', '1.05', 100, 0, 0, NULL, 2000, '1.jpg', '积分商品01的商品描述', 1, 1505983243, 1505983243, 0);

-- --------------------------------------------------------

--
-- 表的结构 `lu_integer_goodsclass`
--

CREATE TABLE IF NOT EXISTS `lu_integer_goodsclass` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL COMMENT '分类名称',
  `category_describe` varchar(100) NOT NULL COMMENT '分类描述',
  `parent_id` int(10) DEFAULT '0' COMMENT '上级id',
  `category_img` varchar(100) DEFAULT NULL COMMENT '分类图片',
  `level` tinyint(1) NOT NULL COMMENT '分类等级（1：一级 2：二级 3:三级）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='积分商品分类表' AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `lu_integer_goodsclass`
--

INSERT INTO `lu_integer_goodsclass` (`id`, `category_name`, `category_describe`, `parent_id`, `category_img`, `level`) VALUES
(1, '积分大类1', '大类1，大类1', 0, NULL, 1),
(2, '积分大类2', '大类2，大类2', 0, NULL, 1),
(3, '积分中类1', '', 1, NULL, 2),
(4, '积分中类2', '', 2, NULL, 2),
(5, '积分小类1', '', 3, NULL, 3),
(6, '积分小类2', '', 3, NULL, 3),
(7, '积分中类1下的积分小类3', '三级，三级，三级', 3, NULL, 3),
(8, '积分大类2下的积分中类3', '二级，二级，二级', 2, NULL, 3);

-- --------------------------------------------------------

--
-- 表的结构 `lu_integer_goods_spec_key`
--

CREATE TABLE IF NOT EXISTS `lu_integer_goods_spec_key` (
  `attr_key_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品规格id',
  `goods_id` int(10) NOT NULL COMMENT '商品id',
  `attr_name` varchar(50) NOT NULL COMMENT '属性名称',
  `add_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '增加时间',
  PRIMARY KEY (`attr_key_id`),
  KEY `id` (`attr_key_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='商品规格属性名' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `lu_integer_goods_spec_sku`
--

CREATE TABLE IF NOT EXISTS `lu_integer_goods_spec_sku` (
  `id` int(10) NOT NULL COMMENT 'SKU',
  `goods_id` int(10) NOT NULL COMMENT '商品id',
  `attr_symbol_path` varchar(10) NOT NULL COMMENT '规格值',
  `price` decimal(10,2) NOT NULL COMMENT '价格',
  `stock` int(10) NOT NULL COMMENT '库存',
  `stock_alarm` int(10) DEFAULT NULL COMMENT '预警值',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='商品规格信息表';

-- --------------------------------------------------------

--
-- 表的结构 `lu_integer_goods_spec_value`
--

CREATE TABLE IF NOT EXISTS `lu_integer_goods_spec_value` (
  `attr_key_id` int(10) NOT NULL COMMENT '商品规格id',
  `goods_id` int(10) NOT NULL COMMENT '商品id',
  `symbol` int(10) NOT NULL COMMENT '属性编码',
  `attr_value` varchar(100) NOT NULL COMMENT '属性值'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='商品属性值';

-- --------------------------------------------------------

--
-- 表的结构 `lu_member`
--

CREATE TABLE IF NOT EXISTS `lu_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL COMMENT '用户名',
  `password` varchar(100) NOT NULL COMMENT '密码',
  `email` varchar(100) NOT NULL COMMENT '邮箱',
  `phone` char(11) NOT NULL COMMENT '手机号',
  `member_experience` int(10) DEFAULT '0' COMMENT '会员经验值',
  `member_integral` decimal(10,2) DEFAULT '0.00' COMMENT '会员积分',
  `member_m_sign` int(10) DEFAULT '0' COMMENT '当月连续签到天数',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '注册时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='会员表' AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `lu_member`
--

INSERT INTO `lu_member` (`id`, `user_name`, `password`, `email`, `phone`, `member_experience`, `member_integral`, `member_m_sign`, `created_at`, `updated_at`) VALUES
(1, 'zhangyi', 'dc69cdbcfb6f6be93cd46a3544069948be379571', '1111113@qq.com', '13720165413', NULL, NULL, 0, '2017-09-07 06:54:37', '2017-09-07 06:54:37'),
(2, 'zhanger', 'dc69cdbcfb6f6be93cd46a3544069948be379571', '1111113@qq.com', '13720165413', NULL, NULL, 0, '2017-09-07 06:54:37', '2017-09-07 06:54:37'),
(3, 'zhangsan', 'dc69cdbcfb6f6be93cd46a3544069948be379571', '1111113@qq.com', '13720165413', NULL, NULL, 0, '2017-09-07 06:54:37', '2017-09-07 06:54:37'),
(4, 'wangwu', 'dc69cdbcfb6f6be93cd46a3544069948be379571', '1111113@qq.com', '13720165413', NULL, NULL, 2, '2017-09-07 07:00:31', '2017-09-21 03:51:36'),
(5, 'zhangsi1', 'dc69cdbcfb6f6be93cd46a3544069948be379571', '1111113@qq.com', '13720165413', NULL, NULL, 0, '2017-09-07 07:01:32', '2017-09-07 07:01:32'),
(6, 'zhangsi2', 'dc69cdbcfb6f6be93cd46a3544069948be379571', '1111113@qq.com', '13720165413', NULL, NULL, 0, '2017-09-07 09:20:58', '2017-09-07 09:20:58'),
(7, '新用户', 'dc69cdbcfb6f6be93cd46a3544069948be379571', '1362132031@qq.com', '13720165413', 0, '20.01', 0, '2017-09-20 06:43:47', '2017-09-20 06:43:47');

-- --------------------------------------------------------

--
-- 表的结构 `lu_migrations`
--

CREATE TABLE IF NOT EXISTS `lu_migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `lu_migrations`
--

INSERT INTO `lu_migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_09_05_064016_create_users_table', 1);

-- --------------------------------------------------------

--
-- 表的结构 `lu_sign_log`
--

CREATE TABLE IF NOT EXISTS `lu_sign_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sign_reward_id` int(10) NOT NULL COMMENT '签到奖励ID',
  `member_id` int(10) NOT NULL COMMENT '会员ID',
  `sign_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT '签到日期',
  `sign_comment` varchar(100) NOT NULL COMMENT '签到备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='签到日志表' AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `lu_sign_log`
--

INSERT INTO `lu_sign_log` (`id`, `sign_reward_id`, `member_id`, `sign_date`, `sign_comment`) VALUES
(1, 2, 4, '2017-09-13 07:39:29', '连续签到+1'),
(2, 3, 4, '2017-09-16 07:39:29', '连续签到+1'),
(5, 3, 4, '2017-09-30 07:39:29', '当日签到'),
(7, 3, 4, '2017-09-29 07:39:29', '连续签到+1'),
(8, 3, 7, '2017-09-21 03:41:45', '连续签到+1'),
(12, 3, 4, '2017-09-20 07:39:29', '当日签到'),
(13, 4, 4, '2017-09-21 03:51:04', '连续签到+1');

-- --------------------------------------------------------

--
-- 表的结构 `lu_sign_reward_setting`
--

CREATE TABLE IF NOT EXISTS `lu_sign_reward_setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_integral` int(10) NOT NULL COMMENT '积分设置',
  `date_day` int(10) NOT NULL COMMENT '几号',
  `date_month` int(10) NOT NULL COMMENT '哪月',
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT '日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='签到奖励设置表' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `lu_sign_reward_setting`
--

INSERT INTO `lu_sign_reward_setting` (`id`, `member_integral`, `date_day`, `date_month`, `date`) VALUES
(1, 10, 18, 10, '2017-09-21 01:27:47'),
(2, 20, 17, 9, '2017-09-21 03:45:04'),
(3, 30, 20, 9, '2017-09-21 01:27:42'),
(4, 35, 21, 9, '2017-09-21 01:27:44'),
(5, 40, 22, 9, '2017-09-21 01:27:45');

-- --------------------------------------------------------

--
-- 表的结构 `lu_users`
--

CREATE TABLE IF NOT EXISTS `lu_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户名',
  `member_id` int(10) NOT NULL COMMENT '会员ID',
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `api_token` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_api_token_unique` (`api_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=119 ;

--
-- 转存表中的数据 `lu_users`
--

INSERT INTO `lu_users` (`id`, `member_id`, `user_name`, `password`, `email`, `api_token`, `created_at`, `updated_at`) VALUES
(114, 4, 'wangwu', 'dc69cdbcfb6f6be93cd46a3544069948be379571', '1111113@qq.com', 'moOFSzgiNacbBPOYrnREqn9Z3HuDvKq9F6VMDHFOzoCIHcqKOCDybyMA2dtf', '2017-09-11 08:24:56', '2017-09-11 08:24:56'),
(117, 5, 'zhangsi1', 'dc69cdbcfb6f6be93cd46a3544069948be379571', '1111113@qq.com', 'lhu01Pl2zqTCWiKy1xJYXU84S8MJJz4W6GFMIVqSJQ4cEYGDRNw4qXBY3viN', '2017-09-12 03:54:01', '2017-09-12 03:54:01'),
(118, 7, '新用户', 'dc69cdbcfb6f6be93cd46a3544069948be379571', '1362132031@qq.com', 'gNLleszeXFyabC0AvH5sBLTgIGFgYNrVVqaMRYKs1qUNJvMySlG351Ijdqoi', '2017-09-20 06:43:47', '2017-09-20 06:43:47');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
