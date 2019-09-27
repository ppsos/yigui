/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : yigui

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-09-27 10:46:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for banner
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(12) NOT NULL COMMENT '图片标题',
  `cover_id` int(10) NOT NULL COMMENT '图片ID',
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  `link` varchar(255) NOT NULL COMMENT '链接地址',
  `target` int(2) NOT NULL DEFAULT '0' COMMENT '是否新窗口打开 1是',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `status` int(4) NOT NULL COMMENT '是否显示',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of banner
-- ----------------------------
INSERT INTO `banner` VALUES ('1', '图片标题', '6', '0', '是打发斯蒂芬撒旦法撒旦法', '1', '1569485082', '1');
INSERT INTO `banner` VALUES ('2', 'test', '5', '0', '是打发斯蒂芬撒旦法撒旦法', '1', '1569488407', '1');
INSERT INTO `banner` VALUES ('3', '123123', '5', '0', '士大夫撒旦防守打法f', '0', '1569488444', '1');

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(12) NOT NULL COMMENT '分类名称',
  `sort` int(10) NOT NULL COMMENT '排序',
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '是否显示',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', '春天', '1', '1');
INSERT INTO `category` VALUES ('2', '夏天', '2', '1');
INSERT INTO `category` VALUES ('3', '秋天', '3', '1');
INSERT INTO `category` VALUES ('4', '冬天111', '4', '1');

-- ----------------------------
-- Table structure for document
-- ----------------------------
DROP TABLE IF EXISTS `document`;
CREATE TABLE `document` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `title` varchar(32) NOT NULL COMMENT '标题',
  `category_id` int(10) NOT NULL COMMENT '分类ID',
  `cover_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '图片ID',
  `content` text NOT NULL COMMENT '内容',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `view` int(12) NOT NULL DEFAULT '0' COMMENT '查看次数',
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  `is_index` int(2) unsigned NOT NULL DEFAULT '0' COMMENT '是否推荐位 1是 0否',
  `status` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of document
-- ----------------------------
INSERT INTO `document` VALUES ('1', '广州房价“骨折”，北京房租下降，行情变了？', '3', '3', '<p>近日，多家机构发布的数据均显示，9月核心城市的房租有所降温。</p><p><br/></p><p>9月24日，贝壳研究院提供的一组数据显示，2019年以来房租同环比一路上涨的北京，在8月停下了租金上涨的脚步，平均租金为88.3元/平米，环比下降4.2%，同比下降2.0%，这是北京近年来首次同比下降，也是3月来的首次环比下降。另外，深圳、上海的房租也纷纷环比下降。</p><p><br/></p><p>中国社科院财经战略研究院住房大数据项目组，在近日发布的2019年8月《中国住房市场发展月度分析报告》也提到，核心城市住房租金在5-6月季节性上涨之后，7月涨幅有明显减缓。2019年7月，《报告》所使用的纬房数据，其租金核心指数为104.84点，环比上涨0.13%，涨速比上月下降0.36个百分点。与上年同月相比，2019年7月核心城市住房租金下降了0.56%。</p>', '1569426717', '0', '0', '1', '1');
INSERT INTO `document` VALUES ('2', '重磅！新闻联播一天连发3篇人民日报评论', '3', '4', '<p><span style=\"color: rgb(80, 80, 80); font-family: helvetica; font-size: 18px; text-align: justify; background-color: rgb(255, 255, 255);\">9月25日晚的央视新闻联播聚焦三篇《人民日报》评论文章。其中，《雄关漫道真如铁》为《人民日报》26日将刊发的“宣言”署名文章；《汇聚起实现民族复兴的磅礴力量》《大变局中的中国与世界》为25日已出版的《人民日报》见报文章。</span><img src=\"/ueditor/php/upload/image/20190926/1569429876.png\" title=\"1569429876.png\" alt=\"2.png\"/></p>', '1569428208', '0', '0', '1', '1');
INSERT INTO `document` VALUES ('3', '家长先送礼后举报，教师身正则不怕“挖坑”', '3', '3', '<p>老师被举报“收礼”面临调岗，家长们却百般请愿挽留——今天，一则看似“矛盾”的新闻引发关注。</p><p><br/></p><p>据南方都市报报道，深圳市南山区某学校六年级一位班主任被某家长举报“收礼”遭到校方的调查。但数位家长却反映，这名班主任一直以来公平公正，深受学生们爱戴，此次遭到班上某位家长的陷害，是因为没有满足这名家长要孩子当班长、评优等不正当要求，希望校方还班主任一个公道。目前，当地教育部门已介入调查。</p><p><img src=\"/ueditor/php/upload/image/20190926/1569429778.jpg\" title=\"1569429778.jpg\" alt=\"1.jpg\"/></p><p>据一位家长转述，举报者提出老师收受过其赠送的礼物，还对他家孩子冷暴力；另一位家长则表示，这是场“陷害”：“那位家长以前一直和老师以闺蜜相处，送过几次礼物，比如商场标价500元的包，但老师每次都有回礼，有次送回了一个价值800元的玩具飞机，而家长却把每次送礼的截图都保留下来”。</p><p><br/></p><p>老师也是普通人，在亲友之间收礼回礼实为人之常情。若这名家长与老师之间果真存在“闺蜜之情”，你给我送个包包，我给你送双鞋子，礼尚往来，也是人情交往中的常事。但这位班主任恐怕没想到的是：你待对方如闺蜜，对方待你如“宿敌”。留下送礼截图，进而以此相要挟；纵然有回礼，但却无心保留证据，百口莫辩。</p><p><br/></p><p>老师收礼遭家长举报后被查处，之前媒体也曾有过报道，2017年1月28日（正月初一），广东连州一班主任因此前多次拒绝家长要求给其孩子调换座位的要求，收到学生家长发来的88.88元的微信红包，以为是春节期间，属于礼尚往来，于是点开后马上回赠90元红包，但家长没领取，然后截图举报老师收红包。虽然这名老师最后在舆论的支援下，免予纪律处分，但仍作出了给予其诫勉处理的决定。</p><p><br/></p><p>毫无疑问，先“挖坑”式送礼、后恶意举报的行为跟正义不沾边，也绝不应被鼓励。特别是截图不截全、不合乎事实的举报，若在诬陷之列该治理就得治理。</p><p><br/></p><p>这事对很多教师也是警醒：家长与老师之间的关系与亲友不同，可近可远、可松可紧、可真可假，这其中难免产生信任风险。古人云“瓜田不纳履，李下不整冠”，身为老师，最好的自我保护方法就是谨守职业规范，在处理生活问题时也要考虑到职业的特殊性，避免落人口实。</p><p><br/></p><p>不知道家长发来红包的真实意图，无论如何都不能点开；即便是闺蜜送的礼物，考虑到闺蜜的孩子在本班，也不妨明确拒绝、说明缘由——真正的闺蜜不会刻意让人为难。</p><p><br/></p><p>如今调查正在继续，期待此事以不偏不倚、让人信服的处理结果收尾。而教师们也宜从中得到启示：对很多老师来说，私人生活和工作职责之间无法全然隔离，中间还有不小的模糊地带，处理不慎就可能生活与工作同时受波及。最优的解决方式是明确界限，与工作挂钩的私人来往要特别注重规范，凡事大方、正直应对，家长和老师之间也能少些揣测和猜疑。</p><p><br/></p>', '1569429736', '0', '0', '1', '1');

-- ----------------------------
-- Table structure for manager
-- ----------------------------
DROP TABLE IF EXISTS `manager`;
CREATE TABLE `manager` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(25) NOT NULL COMMENT '用户名',
  `pwd` char(32) NOT NULL COMMENT '密码',
  `login_times` int(10) NOT NULL DEFAULT '0' COMMENT '登录次数',
  `last_login_time` int(10) NOT NULL COMMENT '最后登录时间',
  `role` int(4) NOT NULL COMMENT '角色 0超级管理员 1总编 2栏目主编',
  `status` tinyint(4) DEFAULT '0' COMMENT '用户状态',
  `last_login_ip` char(35) DEFAULT NULL COMMENT '登录IP',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of manager
-- ----------------------------
INSERT INTO `manager` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '3', '1569549623', '0', '1', '2130706433');
INSERT INTO `manager` VALUES ('2', '总编', 'e10adc3949ba59abbe56e057f20f883e', '0', '0', '1', '1', null);
INSERT INTO `manager` VALUES ('3', '栏目主编', 'e10adc3949ba59abbe56e057f20f883e', '0', '0', '2', '1', null);

-- ----------------------------
-- Table structure for picture
-- ----------------------------
DROP TABLE IF EXISTS `picture`;
CREATE TABLE `picture` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id自增',
  `path` varchar(255) NOT NULL DEFAULT '' COMMENT '路径',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '图片链接',
  `md5` char(32) NOT NULL DEFAULT '' COMMENT '文件md5',
  `sha1` char(40) NOT NULL DEFAULT '' COMMENT '文件 sha1编码',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of picture
-- ----------------------------
INSERT INTO `picture` VALUES ('1', '20190925/34fe9754fbc194249315d156cf9dda65.jpg', '', '030e3cc5bda2dbb864121a70b9d2a2d0', '83ad9e660df741ac98fe2fea55efff337ae872bf', '1', '1569425519');
INSERT INTO `picture` VALUES ('2', '20190926/e3ba942db6a52d134c3079563df85f0c.jpg', '', '82ab0e11fc58732ab04a77562b7d5045', '5e488b7810b529ad6c88424d2e0a04ead9010154', '1', '1569428205');
INSERT INTO `picture` VALUES ('3', '20190926/ae268d47e7e72574b5f9d8a02137c56d.jpg', '', '8e196f4c9394a77904da371d098eec96', '666b6694dab18c937d24c8db83a449a29a9506f0', '1', '1569429040');
INSERT INTO `picture` VALUES ('4', '20190926/00e4ffe7e89c20e701d295a9a85c2e6f.png', '', 'a0519cde5499a68607b30471be41ad11', '4f72e9e7f465c2474123cb924b2c86f02a27b2d5', '1', '1569429873');
INSERT INTO `picture` VALUES ('5', '20190926/6e84cd2fa0b1c775aadb1a077eaf129a.jpg', '', '90cb41a981bf009f55217aa5fc4dd545', '472126ad7147ff4d3af1b18ec381a4e8a08ac693', '1', '1569485029');
INSERT INTO `picture` VALUES ('6', '20190926/8e09e8cca2df5411350c5d5a53b77e2c.jpg', '', '130aa0b92a0dec42ddb90cf2c0b4f8eb', 'cc4d607d4b2b0abbf818ecce2d34fecd26ae14c0', '1', '1569487828');
