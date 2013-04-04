-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Hostiteľ: localhost
-- Vygenerované: Št 04.Apr 2013, 07:41
-- Verzia serveru: 5.5.20-log
-- Verzia PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáza: `task_manager`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `attachments`
--

DROP TABLE IF EXISTS `attachments`;
CREATE TABLE IF NOT EXISTS `attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `filetype` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `id_task` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_task_idx` (`id_task`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `changelog`
--

DROP TABLE IF EXISTS `changelog`;
CREATE TABLE IF NOT EXISTS `changelog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `operation` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `id_task` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_task_idx` (`id_task`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `id_task` int(3) DEFAULT NULL,
  `id_user` int(3) DEFAULT NULL,
  `dateTime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_task_idx` (`id_task`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=12 ;

--
-- Sťahujem dáta pre tabuľku `comments`
--

INSERT INTO `comments` (`id`, `body`, `id_task`, `id_user`, `dateTime`) VALUES
(1, 'asdasf', 14, 1, '2013-03-28 13:01:25'),
(2, 'ssddd', 14, 1, '2013-03-30 15:02:41'),
(7, 'new new', 14, 1, '2013-03-30 13:25:27'),
(11, '132', 7, 1, '2013-03-31 17:31:51');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` varchar(300) COLLATE utf8_bin DEFAULT NULL COMMENT '	',
  `subject` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `from_user` int(3) DEFAULT NULL,
  `to_user` int(3) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_from_idx` (`from_user`),
  KEY `fk_user_to_idx` (`to_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `priority`
--

DROP TABLE IF EXISTS `priority`;
CREATE TABLE IF NOT EXISTS `priority` (
  `id` int(11) NOT NULL,
  `priority` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Sťahujem dáta pre tabuľku `priority`
--

INSERT INTO `priority` (`id`, `priority`) VALUES
(1, 'Trivial'),
(2, 'Minor'),
(3, 'Major'),
(4, 'Critical'),
(5, 'Blocker');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `state`
--

DROP TABLE IF EXISTS `state`;
CREATE TABLE IF NOT EXISTS `state` (
  `id` int(11) NOT NULL,
  `state` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Sťahujem dáta pre tabuľku `state`
--

INSERT INTO `state` (`id`, `state`) VALUES
(1, 'Open'),
(2, 'In Progress'),
(3, 'Reopened'),
(4, 'Resolved'),
(5, 'Closed');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
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
  KEY `id_state_idx` (`id_state`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=15 ;

--
-- Sťahujem dáta pre tabuľku `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `desc`, `created`, `deadline`, `id_assigned_user`, `id_priority`, `id_state`) VALUES
(1, 'titla  sasasas', 'lorem ipsum sakalaka', '2013-03-10', NULL, 2, 2, 1),
(2, 'bbbb', 'asdasdasd', '2013-03-08', NULL, 2, 3, 1),
(3, 'ccccc', 'cqweqweqweqwe', '2013-03-07', NULL, 2, 4, 2),
(6, 'Lorem ipsum aaa', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras et metus tellus. Cras pretium ligula lorem, ac bibendum metus. Curabitur vitae orci eu metus ultricies pharetra at ac tellus. Nam hendrerit gravida est, placerat pulvinar quam mollis commodo. Quisque non feugiat nisl. Sed sodales, sapien non ornare tincidunt, risus mi ornare diam, a tristique magna nunc sed magna. Nulla et nisi ac metus', '2013-03-13', '2020-04-21', 2, 5, 1),
(7, 'aa', 'ss', '2013-03-25', '0000-00-00', 1, 1, NULL),
(8, '223', 'ffff', '2013-03-25', '2012-01-21', 2, 3, 1),
(9, '531', 'ccc', '2013-03-25', '2012-01-21', 2, 3, 1),
(10, 'sssdd1', 'sdfsdfsd222', '2013-03-25', '2012-12-22', 1, 1, 1),
(11, 'ssss', 'werer', '2013-03-25', '2012-12-22', 1, 1, 1),
(12, '12234', 'werer', '2013-03-25', '2012-12-22', 1, 1, 1),
(13, 'new ttle', 'id_user', '2013-03-26', '2001-01-20', 2, 4, 3),
(14, 'ttl123123', 'kkk34', '2013-03-26', '2012-12-22', 2, 5, 5);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `tasks_version`
--

DROP TABLE IF EXISTS `tasks_version`;
CREATE TABLE IF NOT EXISTS `tasks_version` (
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
  KEY `id_state_idx` (`id_state`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `role` tinyint(4) DEFAULT NULL,
  `blocked` int(1) NOT NULL DEFAULT '0',
  `lastLogin` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Sťahujem dáta pre tabuľku `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `blocked`, `lastLogin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 0, '2013-04-01 15:20:51'),
(2, 'fero', '21232f297a57a5a743894a0e4a801fc3', 2, 0, '2013-03-09 00:00:00');

--
-- Obmedzenie pre exportované tabuľky
--

--
-- Obmedzenie pre tabuľku `attachments`
--
ALTER TABLE `attachments`
  ADD CONSTRAINT `attachments_id_task` FOREIGN KEY (`id_task`) REFERENCES `tasks` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Obmedzenie pre tabuľku `changelog`
--
ALTER TABLE `changelog`
  ADD CONSTRAINT `changeLog_id_task` FOREIGN KEY (`id_task`) REFERENCES `tasks` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Obmedzenie pre tabuľku `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `id_task` FOREIGN KEY (`id_task`) REFERENCES `tasks` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Obmedzenie pre tabuľku `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_from_user` FOREIGN KEY (`from_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_to_user` FOREIGN KEY (`to_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Obmedzenie pre tabuľku `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `id_assigned_user` FOREIGN KEY (`id_assigned_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_priority` FOREIGN KEY (`id_priority`) REFERENCES `priority` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_state` FOREIGN KEY (`id_state`) REFERENCES `state` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Obmedzenie pre tabuľku `tasks_version`
--
ALTER TABLE `tasks_version`
  ADD CONSTRAINT `tasks_version_ibfk_1` FOREIGN KEY (`id_priority`) REFERENCES `priority` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tasks_version_ibfk_2` FOREIGN KEY (`id_state`) REFERENCES `state` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tasks_version_ibfk_3` FOREIGN KEY (`id_assigned_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
