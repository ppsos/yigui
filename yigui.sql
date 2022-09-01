/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : yigui

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-11-05 13:05:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for address
-- ----------------------------
DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mobile` varchar(255) DEFAULT NULL,
  `uid` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of address
-- ----------------------------
INSERT INTO `address` VALUES ('1', '3', '3', '南职院', '小小', '1', '3');
INSERT INTO `address` VALUES ('5', '3', '3', '南宁职业技术学院大学西路169号', '花西米', '1', '3');
INSERT INTO `address` VALUES ('6', '123', '1', '123', '123', '1', '1');
INSERT INTO `address` VALUES ('4', '18562347856', '1', '南宁职业技术学院大学西路169号', '花西米', '1', '1');
INSERT INTO `address` VALUES ('7', '123456', '1', '123456', '啊呆', '1', '1');
INSERT INTO `address` VALUES ('8', '12312321312321', '1', '123', '1213', '1', '1');

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
INSERT INTO `banner` VALUES ('1', '图片标题', '9', '0', '是打发斯蒂芬撒旦法撒旦法', '1', '1569485082', '1');
INSERT INTO `banner` VALUES ('2', 'test', '8', '0', '是打发斯蒂芬撒旦法撒旦法', '1', '1569488407', '1');
INSERT INTO `banner` VALUES ('3', '123123', '7', '0', '士大夫撒旦防守打法f', '0', '1569488444', '1');

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
-- Table structure for fac
-- ----------------------------
DROP TABLE IF EXISTS `fac`;
CREATE TABLE `fac` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `openid` varchar(32) NOT NULL COMMENT 'openid 随机32位',
  `name` varchar(12) NOT NULL COMMENT '名称',
  `led_status` int(2) NOT NULL COMMENT '紫外线灯状态',
  `hot_status` int(2) NOT NULL COMMENT '烘干机状态',
  `status` int(2) NOT NULL COMMENT '设备状态',
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fac
-- ----------------------------
INSERT INTO `fac` VALUES ('1', '7w9ce4lorcm4c7617ch9ahh2hjtjfldt', '设备一号', '0', '0', '1', '3');
INSERT INTO `fac` VALUES ('2', '0b8evr12h3t80o4roa4d4h5kqljtf5uw', '设备二号', '1', '1', '1', '3');
INSERT INTO `fac` VALUES ('3', 'dsvobmtmn0s6g8oo2kp12irhqbeijlj0', '设备三号', '1', '0', '1', '3');

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
INSERT INTO `manager` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '12', '1571817774', '0', '1', '2130706433');
INSERT INTO `manager` VALUES ('2', '总编', 'e10adc3949ba59abbe56e057f20f883e', '0', '0', '1', '1', null);
INSERT INTO `manager` VALUES ('3', '栏目主编', 'e10adc3949ba59abbe56e057f20f883e', '0', '0', '2', '1', null);

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) DEFAULT '0' COMMENT 'UID',
  `orderid` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '订单号',
  `price` varchar(12) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '价格',
  `product_id` int(10) NOT NULL DEFAULT '0' COMMENT '产品ID',
  `create_time` int(12) DEFAULT NULL,
  `status` int(4) NOT NULL DEFAULT '1' COMMENT '状态0 未完成 状态1 已完成',
  `shop_id` int(10) NOT NULL DEFAULT '0' COMMENT '商家ID',
  `order_status` int(4) NOT NULL DEFAULT '0' COMMENT '0未发货 1已发货 2已退货',
  `address_id` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES ('1', '4', '201910177243235934', '10', '2', '1571285447', '1', '1', '2', '0');
INSERT INTO `order` VALUES ('2', '2', '201910171627933318', '10', '2', '1571285663', '1', '1', '0', '0');
INSERT INTO `order` VALUES ('3', '2', '201910171855331880', '20', '3', '1571285871', '1', '1', '0', '0');
INSERT INTO `order` VALUES ('4', '2', '201910179086139271', '50', '4', '1571286072', '1', '3', '1', '0');
INSERT INTO `order` VALUES ('5', '4', '201910178752424757', '50', '4', '1571298019', '1', '3', '1', '0');
INSERT INTO `order` VALUES ('6', '4', '201910174531528457', '50', '4', '1571298025', '1', '3', '1', '0');
INSERT INTO `order` VALUES ('7', '1', '201910304197141082', '50', '4', '1572434353', '1', '3', '2', '0');
INSERT INTO `order` VALUES ('9', '1', '201910317023988606', '50', '4', '1572486613', '1', '3', '1', '0');
INSERT INTO `order` VALUES ('10', '1', '201910313697342291', '50', '4', '1572486716', '1', '3', '1', '0');
INSERT INTO `order` VALUES ('11', '1', '201910311200645839', '50', '4', '1572486746', '1', '3', '1', '0');
INSERT INTO `order` VALUES ('12', '1', '201911050613325567', '50', '4', '1572929655', '1', '3', '0', '4');

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
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of picture
-- ----------------------------
INSERT INTO `picture` VALUES ('1', '20190925/34fe9754fbc194249315d156cf9dda65.jpg', '', '030e3cc5bda2dbb864121a70b9d2a2d0', '83ad9e660df741ac98fe2fea55efff337ae872bf', '1', '1569425519');
INSERT INTO `picture` VALUES ('2', '20190926/e3ba942db6a52d134c3079563df85f0c.jpg', '', '82ab0e11fc58732ab04a77562b7d5045', '5e488b7810b529ad6c88424d2e0a04ead9010154', '1', '1569428205');
INSERT INTO `picture` VALUES ('3', '20190926/ae268d47e7e72574b5f9d8a02137c56d.jpg', '', '8e196f4c9394a77904da371d098eec96', '666b6694dab18c937d24c8db83a449a29a9506f0', '1', '1569429040');
INSERT INTO `picture` VALUES ('4', '20190926/00e4ffe7e89c20e701d295a9a85c2e6f.png', '', 'a0519cde5499a68607b30471be41ad11', '4f72e9e7f465c2474123cb924b2c86f02a27b2d5', '1', '1569429873');
INSERT INTO `picture` VALUES ('5', '20190926/6e84cd2fa0b1c775aadb1a077eaf129a.jpg', '', '90cb41a981bf009f55217aa5fc4dd545', '472126ad7147ff4d3af1b18ec381a4e8a08ac693', '1', '1569485029');
INSERT INTO `picture` VALUES ('6', '20190926/8e09e8cca2df5411350c5d5a53b77e2c.jpg', '', '130aa0b92a0dec42ddb90cf2c0b4f8eb', 'cc4d607d4b2b0abbf818ecce2d34fecd26ae14c0', '1', '1569487828');
INSERT INTO `picture` VALUES ('7', '20190927/6c95a2b6d07e7a3208ca5657aac047a7.jpg', '', '547f70e2a466725845daa21694ee31cd', '19fad91cb1f5dbb598851cbe3e973a7c93b4cb48', '1', '1569569156');
INSERT INTO `picture` VALUES ('8', '20190927/e3c6dfec113b3a0d0ef8a6fc78616bf1.jpg', '', '2634fe8807381cec8f02b26a83396621', '00affd03f1284711b98d058b0c5e781d57fcaac6', '1', '1569569191');
INSERT INTO `picture` VALUES ('9', '20190927/5b42b9cc694181062527227ae4df1b28.jpg', '', '81387f153dc9aa831d536b6d6e004f0f', 'c251c1c8f2fcdbbcf229ec72e8886fef6b892909', '1', '1569569204');
INSERT INTO `picture` VALUES ('10', '20191007/ce35abdfcf7ce30500b98c3a6a4c2f1e.jpg', '', 'a5e4e55dcccd1580c5584e55d47a1ce0', 'e646973211fdbaabdb9458720ab49688b5a9553d', '1', '1570431759');
INSERT INTO `picture` VALUES ('11', '20191007/d1ef8736d35c97c9a88597561d7b6a05.jpg', '', 'fb1c0bf1695c586e6cc94d4de79f55dd', 'c1de51a6b8f2757d500608f6b1846cfcba834847', '1', '1570431939');
INSERT INTO `picture` VALUES ('12', '20191007/6cfcee71e2037a5078b96b3ed1ec854e.jpg', '', '2ba1d8606c3831e2ba4a12081b965e30', 'fc8ea402de938da27fcdf5450feadfae9282270a', '1', '1570432569');
INSERT INTO `picture` VALUES ('13', '20191007/878c8dc99cb30a0b2d4c321754c3ec0c.jpg', '', 'b53329f89fcb7ab7c2effe7f5bcf5278', '4615f81e799bf14456576581b432eb1231f60e96', '1', '1570434289');
INSERT INTO `picture` VALUES ('14', '20191007/e45cd89c8efcffc4a4887ff087b2c88e.jpg', '', '3608fb4b788a221f975adb4938eabdef', '51b9b4d51e51225dd21012f08778a23eaaa5da5e', '1', '1570436443');
INSERT INTO `picture` VALUES ('15', '20191009/e724979b869ca6fa63a7243a0b08854c.jpg', '', 'b11249f05e7eb95f9899a54e3728e3f3', '82a4d70eda8d50ce76dd2e7229265dded9a34534', '1', '1570611534');
INSERT INTO `picture` VALUES ('16', '20191010/a59e0881c9b4f8369ce79044d188c514.jpg', '', 'd9840f61098b63f4518693a9dfd81657', '23a7b10ebdc1549e8763c66ba501d486bc3582f9', '1', '1570697315');
INSERT INTO `picture` VALUES ('17', '20191017/290176920867204e0c353c84d4044550.jpg', '', '60452b5a79f0fe7e0ec8bf92a29da640', '7df200626015c24b76ad7402bd9233a5f4c49ac4', '1', '1571281893');
INSERT INTO `picture` VALUES ('18', '20191023/11a0780ee7632330fdf6977d8a0db588.jpg', '', '4a33a9de50a820098f4c954e7e9bfc93', '78c7e76952bec46c5ef0ff09ce4e9fe3087940f6', '1', '1571818796');
INSERT INTO `picture` VALUES ('19', '20191023/2a324f263041a6ce32e6b4bcb3da75ee.png', '', 'e77973cc42b62e63991989715c842da8', 'd3962231cfbff9eb9275b8ef6e5f4d8ccba722dc', '1', '1571818822');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `title` varchar(12) NOT NULL COMMENT '标题',
  `shop_id` int(10) NOT NULL DEFAULT '0' COMMENT '商家ID',
  `price` varchar(12) NOT NULL COMMENT '价格',
  `cover_id` int(10) NOT NULL COMMENT '缩略图',
  `status` int(4) NOT NULL COMMENT '是否显示',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('1', '1', '三人沙发套干洗单次', '0', '80', '13', '1');
INSERT INTO `product` VALUES ('2', '1', '衣服干洗（一桶）', '0', '10', '14', '1');
INSERT INTO `product` VALUES ('3', '1', '干洗球鞋', '0', '20', '15', '1');
INSERT INTO `product` VALUES ('4', '3', 'test', '0', '50', '17', '1');

-- ----------------------------
-- Table structure for shop
-- ----------------------------
DROP TABLE IF EXISTS `shop`;
CREATE TABLE `shop` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL COMMENT 'UID',
  `title` varchar(12) NOT NULL COMMENT '店铺名称',
  `name` varchar(12) NOT NULL COMMENT '姓名',
  `cover_id` int(12) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` varchar(32) NOT NULL COMMENT '地址',
  `set_up` int(2) NOT NULL DEFAULT '1' COMMENT '开店状态  1开 0关',
  `status` int(4) NOT NULL DEFAULT '0' COMMENT '店铺状态 1通过 0不通过',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop
-- ----------------------------
INSERT INTO `shop` VALUES ('3', '2', 'ck干洗店', 'ck', '15', '18577786023', '南宁市西乡塘区大学东路169号', '1', '1');
INSERT INTO `shop` VALUES ('4', '3', 'c18249985330', 'vv', '11', '18249985330', '12312', '1', '1');

-- ----------------------------
-- Table structure for sms
-- ----------------------------
DROP TABLE IF EXISTS `sms`;
CREATE TABLE `sms` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `mobile` varchar(15) NOT NULL COMMENT '手机号码',
  `code` int(6) NOT NULL COMMENT '验证码',
  `send_time` int(12) NOT NULL COMMENT '发送时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sms
-- ----------------------------
INSERT INTO `sms` VALUES ('1', '18577786023', '781591', '1570593050');
INSERT INTO `sms` VALUES ('2', '18577786023', '333349', '1570697276');
INSERT INTO `sms` VALUES ('3', '18249985330', '698397', '1571277532');
INSERT INTO `sms` VALUES ('4', '15994517147', '505834', '1571283928');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(25) DEFAULT NULL COMMENT '用户名',
  `mobile` varchar(25) NOT NULL COMMENT '手机号码',
  `password` char(32) NOT NULL COMMENT '密码',
  `login_times` int(10) NOT NULL DEFAULT '0' COMMENT '登录次数',
  `last_login_time` int(10) NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `status` tinyint(4) DEFAULT '0' COMMENT '用户状态',
  `last_login_ip` char(35) DEFAULT NULL COMMENT '登录IP',
  `create_time` int(12) NOT NULL,
  `money` char(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '18577786024', '1', 'e10adc3949ba59abbe56e057f20f883e', '16', '1572929640', '1', '2130706433', '1570593069', '0');
INSERT INTO `user` VALUES ('2', null, '18577786023', 'e10adc3949ba59abbe56e057f20f883e', '9', '1572434479', '1', '2130706433', '1570697289', '0');
INSERT INTO `user` VALUES ('3', null, '3', 'e10adc3949ba59abbe56e057f20f883e', '8', '1572929931', '1', '2130706433', '1571277657', '122');
INSERT INTO `user` VALUES ('4', null, '15994517147', 'e10adc3949ba59abbe56e057f20f883e', '2', '1571297363', '1', '2130706433', '1571283947', '0');

-- ----------------------------
-- Table structure for wsd
-- ----------------------------
DROP TABLE IF EXISTS `wsd`;
CREATE TABLE `wsd` (
  `id` int(11) NOT NULL,
  `temp` int(11) DEFAULT NULL,
  `humi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of wsd
-- ----------------------------
INSERT INTO `wsd` VALUES ('1', '20', '20');
