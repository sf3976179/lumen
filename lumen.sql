/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : lumen

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-09-30 16:08:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `lu_article`
-- ----------------------------
DROP TABLE IF EXISTS `lu_article`;
CREATE TABLE `lu_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '索引id',
  `ac_name` varchar(100) NOT NULL COMMENT '分类名称',
  `ac_parent_id` int(10) DEFAULT '0' COMMENT '父级id',
  `ac_subtitle` varchar(100) NOT NULL COMMENT '副标题',
  `member_id` int(10) NOT NULL COMMENT '会员id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='文章分类表';

-- ----------------------------
-- Records of lu_article
-- ----------------------------
INSERT INTO `lu_article` VALUES ('4', '文章大标题1', '0', '文章小标题1', '4');
INSERT INTO `lu_article` VALUES ('5', '文章大标题2', '0', '文章小标题2', '4');
INSERT INTO `lu_article` VALUES ('6', '文章大标题3', '5', '文章小标题3', '4');

-- ----------------------------
-- Table structure for `lu_article_comment`
-- ----------------------------
DROP TABLE IF EXISTS `lu_article_comment`;
CREATE TABLE `lu_article_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL COMMENT '会员ID',
  `parent_id` int(10) DEFAULT '0' COMMENT '评论上级、层主直接回复消息id',
  `article_id` int(10) NOT NULL COMMENT '文章id',
  `comment` text COMMENT '文章评论',
  `type` tinyint(2) NOT NULL COMMENT '1:点赞 2:评论',
  `star` tinyint(2) unsigned zerofill DEFAULT '00' COMMENT '1代表点赞 0回复初始',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='文章评论表';

-- ----------------------------
-- Records of lu_article_comment
-- ----------------------------
INSERT INTO `lu_article_comment` VALUES ('1', '4', '0', '1', null, '1', '01');
INSERT INTO `lu_article_comment` VALUES ('2', '4', '0', '1', null, '1', '01');
INSERT INTO `lu_article_comment` VALUES ('3', '4', '0', '1', null, '1', '01');
INSERT INTO `lu_article_comment` VALUES ('4', '4', '0', '2', '文章2写的不错！！！', '2', '00');
INSERT INTO `lu_article_comment` VALUES ('5', '4', '0', '2', '文章5写的不错！！！', '2', '00');
INSERT INTO `lu_article_comment` VALUES ('6', '4', '0', '2', '文章2写的不错！！！', '2', '00');
INSERT INTO `lu_article_comment` VALUES ('7', '4', '5', '2', '文章2写的不错！！！', '2', '00');
INSERT INTO `lu_article_comment` VALUES ('8', '4', '0', '1', null, '1', '01');
INSERT INTO `lu_article_comment` VALUES ('9', '4', '0', '1', null, '1', '01');

-- ----------------------------
-- Table structure for `lu_article_content`
-- ----------------------------
DROP TABLE IF EXISTS `lu_article_content`;
CREATE TABLE `lu_article_content` (
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='文章内容表';

-- ----------------------------
-- Records of lu_article_content
-- ----------------------------
INSERT INTO `lu_article_content` VALUES ('1', '4', '6', '文章大标题-好的文章', '文章小标题-好的小标题', '自定义1，自定义2，自定义3', '2017091407235259ba2e8852211.png', '', '1', '随着iPhone8的发布，依然有唱衰者跳出来，责怪库克让苹果走下了神坛，更有人大放厥词称库克在吃乔帮主留下来的“老本”。试问，在这个科技快速迭代的时代，有哪个公司的“老本”够后来者吃上七年之久。苹果已然不是曾经那个苹果，但它依旧屹立在世界之巅，还是那个孤独的守擂者。\n从长期来看，唱衰者100%是正确的。但如果就此把苹果的平庸化归罪于库克，那未免有失偏颇。乔布斯给苹果打下的个人色彩太过于鲜明，以至于似乎除了他本人，任何人接班苹果都会是一个错误。', '1505381105', '1505381105');
INSERT INTO `lu_article_content` VALUES ('2', '4', '6', '文章大标题-好的文章', '文章小标题-好的小标题', '自定义1，自定义2，自定义3', '2017091407235259ba2e8852211.png', '', '1', '随着iPhone8的发布，依然有唱衰者跳出来，责怪库克让苹果走下了神坛，更有人大放厥词称库克在吃乔帮主留下来的“老本”。试问，在这个科技快速迭代的时代，有哪个公司的“老本”够后来者吃上七年之久。苹果已然不是曾经那个苹果，但它依旧屹立在世界之巅，还是那个孤独的守擂者。\n从长期来看，唱衰者100%是正确的。但如果就此把苹果的平庸化归罪于库克，那未免有失偏颇。乔布斯给苹果打下的个人色彩太过于鲜明，以至于似乎除了他本人，任何人接班苹果都会是一个错误。', '1505381143', '1505381143');
INSERT INTO `lu_article_content` VALUES ('3', '4', '6', '文章大标题-好的文章', '文章小标题-好的小标题', '自定义1，自定义2，自定义3', '2017091407235259ba2e8852211.png', '', '1', '随着iPhone8的发布，依然有唱衰者跳出来，责怪库克让苹果走下了神坛，更有人大放厥词称库克在吃乔帮主留下来的“老本”。试问，在这个科技快速迭代的时代，有哪个公司的“老本”够后来者吃上七年之久。苹果已然不是曾经那个苹果，但它依旧屹立在世界之巅，还是那个孤独的守擂者。\n从长期来看，唱衰者100%是正确的。但如果就此把苹果的平庸化归罪于库克，那未免有失偏颇。乔布斯给苹果打下的个人色彩太过于鲜明，以至于似乎除了他本人，任何人接班苹果都会是一个错误。', '1505381198', '1505381198');
INSERT INTO `lu_article_content` VALUES ('4', '4', '6', '文章大标题-好的文章', '文章小标题-好的小标题', '自定义1，自定义2，自定义3', '2017091407235259ba2e8852211.png', '', '1', '随着iPhone8的发布，依然有唱衰者跳出来，责怪库克让苹果走下了神坛，更有人大放厥词称库克在吃乔帮主留下来的“老本”。试问，在这个科技快速迭代的时代，有哪个公司的“老本”够后来者吃上七年之久。苹果已然不是曾经那个苹果，但它依旧屹立在世界之巅，还是那个孤独的守擂者。\n从长期来看，唱衰者100%是正确的。但如果就此把苹果的平庸化归罪于库克，那未免有失偏颇。乔布斯给苹果打下的个人色彩太过于鲜明，以至于似乎除了他本人，任何人接班苹果都会是一个错误。', '1505793086', '1505793086');

-- ----------------------------
-- Table structure for `lu_integer_goods`
-- ----------------------------
DROP TABLE IF EXISTS `lu_integer_goods`;
CREATE TABLE `lu_integer_goods` (
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='积分商品表';

-- ----------------------------
-- Records of lu_integer_goods
-- ----------------------------
INSERT INTO `lu_integer_goods` VALUES ('1', '积分商品01', '积分商品副标题01', '1,3,7', '1.05', '100', '0', '0', null, '2000', '1.jpg', '积分商品01的商品描述', '1', '1505983243', '1505983243', '0');
INSERT INTO `lu_integer_goods` VALUES ('2', '积分商品01', '积分商品副标题01', '1,3,7', '1.05', '100', '0', '0', null, '2000', '1.jpg', '积分商品01的商品描述', '1', '1505983243', '1505983243', '0');
INSERT INTO `lu_integer_goods` VALUES ('3', '积分商品01', '积分商品副标题01', '1,3,7', '1.05', '100', '0', '0', null, '2000', '1.jpg', '积分商品01的商品描述', '1', '1505983243', '1505983243', '0');
INSERT INTO `lu_integer_goods` VALUES ('4', '积分商品01', '积分商品副标题01', '1,3,7', '1.05', '100', '0', '0', null, '2000', '1.jpg', '积分商品01的商品描述', '1', '1505983243', '1505983243', '0');
INSERT INTO `lu_integer_goods` VALUES ('5', '积分商品01', '积分商品副标题01', '1,3,7', '1.05', '100', '0', '0', null, '2000', '1.jpg', '积分商品01的商品描述', '1', '1505983243', '1505983243', '0');
INSERT INTO `lu_integer_goods` VALUES ('6', '积分商品01', '积分商品副标题01', '1,3,7', '1.05', '100', '0', '0', null, '2000', '1.jpg', '积分商品01的商品描述', '1', '1505983243', '1505983243', '0');
INSERT INTO `lu_integer_goods` VALUES ('7', '积分商品01', '积分商品副标题01', '1,3,7', '1.05', '100', '0', '0', null, '2000', '1.jpg', '积分商品01的商品描述', '1', '1505983243', '1505983243', '0');
INSERT INTO `lu_integer_goods` VALUES ('8', '积分商品01', '积分商品副标题01', '1,3,7', '1.05', '100', '0', '0', null, '2000', '1.jpg', '积分商品01的商品描述', '1', '1505983243', '1505983243', '0');
INSERT INTO `lu_integer_goods` VALUES ('9', '', '积分商品副标题01', '1,3,7', '1.05', '100', '0', '0', null, '2000', '1.jpg', '积分商品01的商品描述', '1', '1505983243', '1505983243', '0');
INSERT INTO `lu_integer_goods` VALUES ('10', '积分商品01', '积分商品副标题01', '1,3,7', '1.05', '100', '0', '0', null, '2000', '1.jpg', '积分商品01的商品描述', '1', '1505983243', '1505983243', '0');
INSERT INTO `lu_integer_goods` VALUES ('11', '积分商品01', '积分商品副标题01', '', '0.00', '100', '0', '0', null, '2000', '1.jpg', '积分商品01的商品描述', '1', '1505983243', '1505983243', '0');
INSERT INTO `lu_integer_goods` VALUES ('12', '积分商品01', '积分商品副标题01', '1,3,7', '10000.11', '100', '0', '0', null, '2000', '1.jpg', '积分商品01的商品描述', '1', '1505983243', '1505983243', '0');
INSERT INTO `lu_integer_goods` VALUES ('20', '积分商品01', '积分商品副标题01', '1,3,7', '1.05', '100', '0', '0', null, '2000', '1.jpg', '积分商品01的商品描述', '1', '1505983243', '1505983243', '0');

-- ----------------------------
-- Table structure for `lu_integer_goods_spec_key`
-- ----------------------------
DROP TABLE IF EXISTS `lu_integer_goods_spec_key`;
CREATE TABLE `lu_integer_goods_spec_key` (
  `attr_key_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品规格id',
  `goods_id` int(10) NOT NULL COMMENT '商品id',
  `attr_name` varchar(50) NOT NULL COMMENT '属性名称',
  `add_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '增加时间',
  PRIMARY KEY (`attr_key_id`),
  KEY `id` (`attr_key_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='商品规格属性名';

-- ----------------------------
-- Records of lu_integer_goods_spec_key
-- ----------------------------

-- ----------------------------
-- Table structure for `lu_integer_goods_spec_sku`
-- ----------------------------
DROP TABLE IF EXISTS `lu_integer_goods_spec_sku`;
CREATE TABLE `lu_integer_goods_spec_sku` (
  `id` int(10) NOT NULL COMMENT 'SKU',
  `goods_id` int(10) NOT NULL COMMENT '商品id',
  `attr_symbol_path` varchar(10) NOT NULL COMMENT '规格值',
  `price` decimal(10,2) NOT NULL COMMENT '价格',
  `stock` int(10) NOT NULL COMMENT '库存',
  `stock_alarm` int(10) DEFAULT NULL COMMENT '预警值',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='商品规格信息表';

-- ----------------------------
-- Records of lu_integer_goods_spec_sku
-- ----------------------------

-- ----------------------------
-- Table structure for `lu_integer_goods_spec_value`
-- ----------------------------
DROP TABLE IF EXISTS `lu_integer_goods_spec_value`;
CREATE TABLE `lu_integer_goods_spec_value` (
  `attr_key_id` int(10) NOT NULL COMMENT '商品规格id',
  `goods_id` int(10) NOT NULL COMMENT '商品id',
  `symbol` int(10) NOT NULL COMMENT '属性编码',
  `attr_value` varchar(100) NOT NULL COMMENT '属性值'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='商品属性值';

-- ----------------------------
-- Records of lu_integer_goods_spec_value
-- ----------------------------

-- ----------------------------
-- Table structure for `lu_integer_goodsclass`
-- ----------------------------
DROP TABLE IF EXISTS `lu_integer_goodsclass`;
CREATE TABLE `lu_integer_goodsclass` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL COMMENT '分类名称',
  `category_describe` varchar(100) NOT NULL COMMENT '分类描述',
  `parent_id` int(10) DEFAULT '0' COMMENT '上级id',
  `category_img` varchar(100) DEFAULT NULL COMMENT '分类图片',
  `level` tinyint(1) NOT NULL COMMENT '分类等级（1：一级 2：二级 3:三级）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='积分商品分类表';

-- ----------------------------
-- Records of lu_integer_goodsclass
-- ----------------------------
INSERT INTO `lu_integer_goodsclass` VALUES ('1', '积分大类1', '大类1，大类1', '0', null, '1');
INSERT INTO `lu_integer_goodsclass` VALUES ('2', '积分大类2', '大类2，大类2', '0', null, '1');
INSERT INTO `lu_integer_goodsclass` VALUES ('3', '积分中类1', '', '1', null, '2');
INSERT INTO `lu_integer_goodsclass` VALUES ('4', '积分中类2', '', '2', null, '2');
INSERT INTO `lu_integer_goodsclass` VALUES ('5', '积分小类1', '', '3', null, '3');
INSERT INTO `lu_integer_goodsclass` VALUES ('6', '积分小类2', '', '3', null, '3');
INSERT INTO `lu_integer_goodsclass` VALUES ('7', '积分中类1下的积分小类3', '三级，三级，三级', '3', null, '3');
INSERT INTO `lu_integer_goodsclass` VALUES ('8', '积分大类2下的积分中类3', '二级，二级，二级', '2', null, '3');

-- ----------------------------
-- Table structure for `lu_member`
-- ----------------------------
DROP TABLE IF EXISTS `lu_member`;
CREATE TABLE `lu_member` (
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='会员表';

-- ----------------------------
-- Records of lu_member
-- ----------------------------
INSERT INTO `lu_member` VALUES ('1', 'zhangyi', 'dc69cdbcfb6f6be93cd46a3544069948be379571', '1111113@qq.com', '13720165413', null, null, '0', '2017-09-07 14:54:37', '2017-09-07 14:54:37');
INSERT INTO `lu_member` VALUES ('2', 'zhanger', 'dc69cdbcfb6f6be93cd46a3544069948be379571', '1111113@qq.com', '13720165413', null, null, '0', '2017-09-07 14:54:37', '2017-09-07 14:54:37');
INSERT INTO `lu_member` VALUES ('3', 'zhangsan', 'dc69cdbcfb6f6be93cd46a3544069948be379571', '1111113@qq.com', '13720165413', null, null, '0', '2017-09-07 14:54:37', '2017-09-07 14:54:37');
INSERT INTO `lu_member` VALUES ('4', 'wangwu', 'dc69cdbcfb6f6be93cd46a3544069948be379571', '1111113@qq.com', '13720165413', null, null, '2', '2017-09-07 15:00:31', '2017-09-21 11:51:36');
INSERT INTO `lu_member` VALUES ('5', 'zhangsi1', 'dc69cdbcfb6f6be93cd46a3544069948be379571', '1111113@qq.com', '13720165413', null, null, '0', '2017-09-07 15:01:32', '2017-09-07 15:01:32');
INSERT INTO `lu_member` VALUES ('6', 'zhangsi2', 'dc69cdbcfb6f6be93cd46a3544069948be379571', '1111113@qq.com', '13720165413', null, null, '0', '2017-09-07 17:20:58', '2017-09-07 17:20:58');
INSERT INTO `lu_member` VALUES ('7', '新用户', 'dc69cdbcfb6f6be93cd46a3544069948be379571', '1362132031@qq.com', '13720165413', '0', '20.01', '0', '2017-09-20 14:43:47', '2017-09-20 14:43:47');

-- ----------------------------
-- Table structure for `lu_migrations`
-- ----------------------------
DROP TABLE IF EXISTS `lu_migrations`;
CREATE TABLE `lu_migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of lu_migrations
-- ----------------------------
INSERT INTO `lu_migrations` VALUES ('1', '2017_09_05_064016_create_users_table', '1');

-- ----------------------------
-- Table structure for `lu_sign_log`
-- ----------------------------
DROP TABLE IF EXISTS `lu_sign_log`;
CREATE TABLE `lu_sign_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sign_reward_id` int(10) NOT NULL COMMENT '签到奖励ID',
  `member_id` int(10) NOT NULL COMMENT '会员ID',
  `sign_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT '签到日期',
  `sign_comment` varchar(100) NOT NULL COMMENT '签到备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='签到日志表';

-- ----------------------------
-- Records of lu_sign_log
-- ----------------------------
INSERT INTO `lu_sign_log` VALUES ('1', '2', '4', '2017-09-13 15:39:29', '连续签到+1');
INSERT INTO `lu_sign_log` VALUES ('2', '3', '4', '2017-09-16 15:39:29', '连续签到+1');
INSERT INTO `lu_sign_log` VALUES ('5', '3', '4', '2017-09-30 15:39:29', '当日签到');
INSERT INTO `lu_sign_log` VALUES ('7', '3', '4', '2017-09-29 15:39:29', '连续签到+1');
INSERT INTO `lu_sign_log` VALUES ('8', '3', '7', '2017-09-21 11:41:45', '连续签到+1');
INSERT INTO `lu_sign_log` VALUES ('12', '3', '4', '2017-09-20 15:39:29', '当日签到');
INSERT INTO `lu_sign_log` VALUES ('13', '4', '4', '2017-09-21 11:51:04', '连续签到+1');

-- ----------------------------
-- Table structure for `lu_sign_reward_setting`
-- ----------------------------
DROP TABLE IF EXISTS `lu_sign_reward_setting`;
CREATE TABLE `lu_sign_reward_setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_integral` int(10) NOT NULL COMMENT '积分设置',
  `date_day` int(10) NOT NULL COMMENT '几号',
  `date_month` int(10) NOT NULL COMMENT '哪月',
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT '日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='签到奖励设置表';

-- ----------------------------
-- Records of lu_sign_reward_setting
-- ----------------------------
INSERT INTO `lu_sign_reward_setting` VALUES ('1', '10', '18', '10', '2017-09-21 09:27:47');
INSERT INTO `lu_sign_reward_setting` VALUES ('2', '20', '17', '9', '2017-09-21 11:45:04');
INSERT INTO `lu_sign_reward_setting` VALUES ('3', '30', '20', '9', '2017-09-21 09:27:42');
INSERT INTO `lu_sign_reward_setting` VALUES ('4', '35', '21', '9', '2017-09-21 09:27:44');
INSERT INTO `lu_sign_reward_setting` VALUES ('5', '40', '22', '9', '2017-09-21 09:27:45');

-- ----------------------------
-- Table structure for `lu_users`
-- ----------------------------
DROP TABLE IF EXISTS `lu_users`;
CREATE TABLE `lu_users` (
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
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of lu_users
-- ----------------------------
INSERT INTO `lu_users` VALUES ('114', '4', 'wangwu', 'dc69cdbcfb6f6be93cd46a3544069948be379571', '1111113@qq.com', 'moOFSzgiNacbBPOYrnREqn9Z3HuDvKq9F6VMDHFOzoCIHcqKOCDybyMA2dtf', '2017-09-11 16:24:56', '2017-09-11 16:24:56');
INSERT INTO `lu_users` VALUES ('117', '5', 'zhangsi1', 'dc69cdbcfb6f6be93cd46a3544069948be379571', '1111113@qq.com', 'lhu01Pl2zqTCWiKy1xJYXU84S8MJJz4W6GFMIVqSJQ4cEYGDRNw4qXBY3viN', '2017-09-12 11:54:01', '2017-09-12 11:54:01');
INSERT INTO `lu_users` VALUES ('118', '7', '新用户', 'dc69cdbcfb6f6be93cd46a3544069948be379571', '1362132031@qq.com', 'gNLleszeXFyabC0AvH5sBLTgIGFgYNrVVqaMRYKs1qUNJvMySlG351Ijdqoi', '2017-09-20 14:43:47', '2017-09-20 14:43:47');
