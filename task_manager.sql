/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50525
 Source Host           : localhost
 Source Database       : task_manager

 Target Server Type    : MySQL
 Target Server Version : 50525
 File Encoding         : utf-8

 Date: 03/26/2013 00:26:13 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `attachments`
-- ----------------------------
DROP TABLE IF EXISTS `attachments`;
CREATE TABLE `attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `filetype` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `id_task` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_task_idx` (`id_task`),
  CONSTRAINT `attachments_id_task` FOREIGN KEY (`id_task`) REFERENCES `tasks` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
--  Table structure for `changeLog`
-- ----------------------------
DROP TABLE IF EXISTS `changeLog`;
CREATE TABLE `changeLog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `operation` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `id_task` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_task_idx` (`id_task`),
  CONSTRAINT `changeLog_id_task` FOREIGN KEY (`id_task`) REFERENCES `tasks` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
--  Table structure for `comments`
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `id_task` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_task_idx` (`id_task`),
  CONSTRAINT `id_task` FOREIGN KEY (`id_task`) REFERENCES `tasks` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
--  Table structure for `messages`
-- ----------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` varchar(300) COLLATE utf8_bin DEFAULT NULL COMMENT '	',
  `subject` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `from_user` int(3) DEFAULT NULL,
  `to_user` int(3) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_from_idx` (`from_user`),
  KEY `fk_user_to_idx` (`to_user`),
  CONSTRAINT `fk_from_user` FOREIGN KEY (`from_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_to_user` FOREIGN KEY (`to_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
--  Table structure for `priority`
-- ----------------------------
DROP TABLE IF EXISTS `priority`;
CREATE TABLE `priority` (
  `id` int(11) NOT NULL,
  `priority` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
--  Records of `priority`
-- ----------------------------
BEGIN;
INSERT INTO `priority` VALUES ('1', 'Trivial'), ('2', 'Minor'), ('3', 'Major'), ('4', 'Critical'), ('5', 'Blocker');
COMMIT;

-- ----------------------------
--  Table structure for `state`
-- ----------------------------
DROP TABLE IF EXISTS `state`;
CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `state` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
--  Records of `state`
-- ----------------------------
BEGIN;
INSERT INTO `state` VALUES ('1', 'Open'), ('2', 'In Progress'), ('3', 'Reopened'), ('4', 'Resolved'), ('5', 'Closed');
COMMIT;

-- ----------------------------
--  Table structure for `tasks`
-- ----------------------------
DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `desc` varchar(400) COLLATE utf8_bin DEFAULT NULL,
  `created` date DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `id_assigned_user` int(2) DEFAULT NULL,
  `id_priority` int(1) DEFAULT NULL,
  `id_state` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_assigned_user_idx` (`id_assigned_user`),
  KEY `id_priority_idx` (`id_priority`),
  KEY `id_state_idx` (`id_state`),
  CONSTRAINT `id_priority` FOREIGN KEY (`id_priority`) REFERENCES `priority` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_state` FOREIGN KEY (`id_state`) REFERENCES `state` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_assigned_user` FOREIGN KEY (`id_assigned_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
--  Records of `tasks`
-- ----------------------------
BEGIN;
INSERT INTO `tasks` VALUES ('1', 'titla  sasasas', 'lorem ipsum sakalaka', '2013-03-10', null, '2', '2', '1'), ('2', 'bbbb', 'asdasdasd', '2013-03-08', null, '2', '3', '1'), ('3', 'ccccc', 'cqweqweqweqwe', '2013-03-07', null, '2', '4', '2'), ('6', 'Lorem ipsum aaa', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras et metus tellus. Cras pretium ligula lorem, ac bibendum metus. Curabitur vitae orci eu metus ultricies pharetra at ac tellus. Nam hendrerit gravida est, placerat pulvinar quam mollis commodo. Quisque non feugiat nisl. Sed sodales, sapien non ornare tincidunt, risus mi ornare diam, a tristique magna nunc sed magna. Nulla et nisi ac metus', '2013-03-13', '2020-04-21', '2', '5', '1'), ('7', 'aa', 'ss', '2013-03-25', '0000-00-00', '1', '1', null), ('8', '223', 'ffff', '2013-03-25', '2012-01-21', '2', '3', '1'), ('9', '531', 'ccc', '2013-03-25', '2012-01-21', '2', '3', '1'), ('10', 'sssdd1', '									sdfsdfsd222', '2013-03-25', '2012-12-22', '1', '1', '1'), ('11', 'ssss', 'werer', '2013-03-25', '2012-12-22', '1', '1', '1'), ('12', '12234', 'werer', '2013-03-25', '2012-12-22', '1', '1', '1'), ('13', 'new ttle', 'id_user', '2013-03-26', '2001-01-20', '2', '4', '1'), ('14', 'ttl123123', 'kkk', '2013-03-26', '2012-12-22', '2', '5', '1');
COMMIT;

-- ----------------------------
--  Table structure for `tasks_version`
-- ----------------------------
DROP TABLE IF EXISTS `tasks_version`;
CREATE TABLE `tasks_version` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `desc` varchar(400) COLLATE utf8_bin DEFAULT NULL,
  `created` date DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `id_assigned_user` int(2) DEFAULT NULL,
  `id_priority` int(1) DEFAULT NULL,
  `id_state` int(1) DEFAULT NULL,
  `version` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_assigned_user_idx` (`id_assigned_user`),
  KEY `id_priority_idx` (`id_priority`),
  KEY `id_state_idx` (`id_state`),
  CONSTRAINT `tasks_version_ibfk_1` FOREIGN KEY (`id_priority`) REFERENCES `priority` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tasks_version_ibfk_2` FOREIGN KEY (`id_state`) REFERENCES `state` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tasks_version_ibfk_3` FOREIGN KEY (`id_assigned_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `role` tinyint(4) DEFAULT NULL,
  `lastLogin` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', '2013-03-26 00:19:50'), ('2', 'fero', '21232f297a57a5a743894a0e4a801fc3', '2', '2013-03-09 00:00:00');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
