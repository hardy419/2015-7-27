-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015-08-13 17:08:42
-- 服务器版本: 5.5.42-cll
-- PHP 版本: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `cccfywed_db`
--

-- --------------------------------------------------------

--
-- 表的结构 `tbl_aboutus`
--

CREATE TABLE IF NOT EXISTS `tbl_aboutus` (
  `a_id` int(25) NOT NULL AUTO_INCREMENT,
  `a_type` int(4) DEFAULT NULL,
  `a_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `link` varchar(2048) CHARACTER SET utf8 NOT NULL,
  `target` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `a_content` text CHARACTER SET utf8,
  `a_encontent` text CHARACTER SET utf8,
  `a_cncontent` text CHARACTER SET utf8,
  `a_entitle` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `a_cntitle` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `a_date` date NOT NULL,
  `add_time` datetime NOT NULL,
  `year_id` int(20) DEFAULT '0',
  `order` int(11) DEFAULT NULL,
  `contype` int(4) DEFAULT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_access_control`
--

CREATE TABLE IF NOT EXISTS `tbl_access_control` (
  `teacher_id` int(10) unsigned NOT NULL DEFAULT '0',
  `access_teacher` tinyint(1) NOT NULL DEFAULT '0',
  `access_student` tinyint(1) NOT NULL DEFAULT '0',
  `access_class` tinyint(1) NOT NULL DEFAULT '0',
  `access_activity` tinyint(1) NOT NULL DEFAULT '0',
  `access_calendar` tinyint(1) NOT NULL DEFAULT '0',
  `access_news` tinyint(1) NOT NULL DEFAULT '0',
  `access_outside` tinyint(1) NOT NULL DEFAULT '0',
  `access_file` tinyint(1) NOT NULL DEFAULT '0',
  `access_match` tinyint(1) NOT NULL DEFAULT '0',
  `access_content` tinyint(1) NOT NULL DEFAULT '0',
  `access_headmaster` tinyint(1) NOT NULL DEFAULT '0',
  `access_topmark` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `access_calendar_2` tinyint(1) NOT NULL DEFAULT '0',
  `access_assignment` tinyint(1) NOT NULL DEFAULT '0',
  `access_calendar_s` tinyint(1) NOT NULL DEFAULT '0',
  `access_calendar_h` tinyint(1) NOT NULL DEFAULT '0',
  `access_calendar_p` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`teacher_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tbl_access_control`
--

INSERT INTO `tbl_access_control` (`teacher_id`, `access_teacher`, `access_student`, `access_class`, `access_activity`, `access_calendar`, `access_news`, `access_outside`, `access_file`, `access_match`, `access_content`, `access_headmaster`, `access_topmark`, `access_calendar_2`, `access_assignment`, `access_calendar_s`, `access_calendar_h`, `access_calendar_p`) VALUES
(6, 1, 0, 1, 1, 1, 1, 0, 1, 0, 0, 0, 0, 1, 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `tbl_access_control_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_access_control_detail` (
  `teacher_id` int(10) unsigned NOT NULL DEFAULT '0',
  `cms_category` int(10) unsigned NOT NULL DEFAULT '0',
  `category_id` int(10) unsigned NOT NULL DEFAULT '0',
  `level` tinyint(3) unsigned NOT NULL DEFAULT '0',
  KEY `teacher_id` (`teacher_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tbl_access_control_detail`
--

INSERT INTO `tbl_access_control_detail` (`teacher_id`, `cms_category`, `category_id`, `level`) VALUES
(6, 6, 9, 1),
(6, 6, 10, 1);

-- --------------------------------------------------------

--
-- 表的结构 `tbl_activity`
--

CREATE TABLE IF NOT EXISTS `tbl_activity` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `year` int(4) NOT NULL DEFAULT '0',
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `participant` varchar(254) DEFAULT NULL,
  `description` text NOT NULL,
  `modified_by` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `type_id` int(10) unsigned NOT NULL DEFAULT '0',
  `class_year` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `file_file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `year_id` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_activity_gallery`
--

CREATE TABLE IF NOT EXISTS `tbl_activity_gallery` (
  `act_id` int(10) unsigned NOT NULL DEFAULT '0',
  `file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `ori_file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `g_order` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`file_name`),
  KEY `act_id` (`act_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_activity_type`
--

CREATE TABLE IF NOT EXISTS `tbl_activity_type` (
  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `type_order` int(10) unsigned NOT NULL DEFAULT '0',
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_art`
--

CREATE TABLE IF NOT EXISTS `tbl_art` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `year` int(4) NOT NULL DEFAULT '0',
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `modified_by` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `type_id` int(10) unsigned NOT NULL DEFAULT '0',
  `class_year` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `file_file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `year_id` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_art_gallery`
--

CREATE TABLE IF NOT EXISTS `tbl_art_gallery` (
  `act_id` int(10) unsigned NOT NULL DEFAULT '0',
  `file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `ori_file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `g_order` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`file_name`),
  KEY `act_id` (`act_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_art_type`
--

CREATE TABLE IF NOT EXISTS `tbl_art_type` (
  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `type_order` int(10) unsigned NOT NULL DEFAULT '0',
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_assignment`
--

CREATE TABLE IF NOT EXISTS `tbl_assignment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `photo` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_calendar`
--

CREATE TABLE IF NOT EXISTS `tbl_calendar` (
  `calendarid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL DEFAULT '0',
  `poster` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `date` date NOT NULL DEFAULT '0000-00-00',
  `exp_date` date NOT NULL DEFAULT '0000-00-00',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `serial` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `content` mediumtext NOT NULL,
  `posttime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `link_text` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `link_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `link_open_window` enum('Y','N') NOT NULL DEFAULT 'Y',
  `type` enum('T','S','N','H','P') NOT NULL DEFAULT 'T',
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'calendar/calendarview.php',
  `is_news` enum('Y','N') DEFAULT 'N',
  `web_type` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`calendarid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 PACK_KEYS=0 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_chancellor`
--

CREATE TABLE IF NOT EXISTS `tbl_chancellor` (
  `file_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file_type_id` int(10) unsigned NOT NULL DEFAULT '0',
  `file_date` date NOT NULL DEFAULT '0000-00-00',
  `file_exp_date` date NOT NULL DEFAULT '0000-00-00',
  `file_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `file_content` text NOT NULL,
  `file_link_text` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `file_link_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `file_link_new_window` tinyint(1) NOT NULL DEFAULT '0',
  `file_file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `file_year` smallint(6) NOT NULL DEFAULT '0',
  `file_serial` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `file_add_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `file_add_date` date NOT NULL DEFAULT '0000-00-00',
  `file_photo` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 PACK_KEYS=0 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_chancellor_type`
--

CREATE TABLE IF NOT EXISTS `tbl_chancellor_type` (
  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `type_order` int(10) unsigned NOT NULL DEFAULT '0',
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_class`
--

CREATE TABLE IF NOT EXISTS `tbl_class` (
  `class_id` int(10) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `year` mediumint(4) unsigned NOT NULL DEFAULT '0',
  `serial_no` int(11) DEFAULT '0',
  `old_class_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `old_year` mediumint(4) DEFAULT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_contest`
--

CREATE TABLE IF NOT EXISTS `tbl_contest` (
  `a_id` int(25) NOT NULL AUTO_INCREMENT,
  `a_type` int(4) DEFAULT NULL,
  `a_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `target` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `a_content` text CHARACTER SET utf8,
  `a_date` date NOT NULL,
  `add_time` datetime NOT NULL,
  `year_id` int(20) DEFAULT '0',
  `order` int(11) DEFAULT NULL,
  `contype` int(4) DEFAULT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_down`
--

CREATE TABLE IF NOT EXISTS `tbl_down` (
  `a_id` int(25) NOT NULL AUTO_INCREMENT,
  `a_type` int(4) DEFAULT NULL,
  `a_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `a_content` text CHARACTER SET utf8,
  `down_file` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `a_date` date NOT NULL,
  `add_time` datetime NOT NULL,
  `year_id` int(20) DEFAULT '0',
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_file`
--

CREATE TABLE IF NOT EXISTS `tbl_file` (
  `file_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file_type_id` int(10) unsigned NOT NULL DEFAULT '0',
  `file_date` date NOT NULL DEFAULT '0000-00-00',
  `file_exp_date` date NOT NULL DEFAULT '0000-00-00',
  `file_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `file_content` text NOT NULL,
  `file_link_text` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `file_link_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `file_link_new_window` tinyint(1) NOT NULL DEFAULT '0',
  `file_file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `file_year` smallint(6) NOT NULL DEFAULT '0',
  `file_serial` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `file_add_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `file_add_date` date NOT NULL DEFAULT '0000-00-00',
  `file_photo` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 PACK_KEYS=0 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_file_type`
--

CREATE TABLE IF NOT EXISTS `tbl_file_type` (
  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `type_order` int(10) unsigned NOT NULL DEFAULT '0',
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_lastest`
--

CREATE TABLE IF NOT EXISTS `tbl_lastest` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `year` int(4) NOT NULL DEFAULT '0',
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `participant` varchar(254) DEFAULT NULL,
  `description` text NOT NULL,
  `modified_by` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `type_id` int(10) unsigned NOT NULL DEFAULT '0',
  `class_year` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `file_file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `year_id` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_lastest_gallery`
--

CREATE TABLE IF NOT EXISTS `tbl_lastest_gallery` (
  `act_id` int(10) unsigned NOT NULL DEFAULT '0',
  `file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `ori_file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `g_order` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`file_name`),
  KEY `act_id` (`act_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_link`
--

CREATE TABLE IF NOT EXISTS `tbl_link` (
  `link_id` int(11) NOT NULL AUTO_INCREMENT,
  `link_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `link_sort` int(11) NOT NULL,
  `link_address` text CHARACTER SET utf8 NOT NULL,
  `link_logo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `link_remark` varchar(255) CHARACTER SET utf8 NOT NULL,
  `link_type` int(11) NOT NULL,
  PRIMARY KEY (`link_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_match`
--

CREATE TABLE IF NOT EXISTS `tbl_match` (
  `match_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `match_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '0',
  `match_year` smallint(5) unsigned NOT NULL DEFAULT '0',
  `activity_id` int(10) unsigned NOT NULL DEFAULT '0',
  `match_subject` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `match_sponsor` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `match_date` date NOT NULL DEFAULT '0000-00-00',
  `match_add_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`match_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_match_record`
--

CREATE TABLE IF NOT EXISTS `tbl_match_record` (
  `match_id` int(10) unsigned NOT NULL DEFAULT '0',
  `match_record_student_id` int(10) unsigned NOT NULL DEFAULT '0',
  `match_record_student_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `match_record_class_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `match_record_outside_praise` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `match_record_inside_praise` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `match_record_order` int(10) unsigned NOT NULL DEFAULT '0',
  KEY `match_id` (`match_id`),
  KEY `student_id` (`match_record_student_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 PACK_KEYS=0;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_movie`
--

CREATE TABLE IF NOT EXISTS `tbl_movie` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `year` int(4) NOT NULL DEFAULT '0',
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `modified_by` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `type_id` int(10) unsigned NOT NULL DEFAULT '0',
  `class_year` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `file_file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `year_id` int(4) NOT NULL DEFAULT '0',
  `poster` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_news`
--

CREATE TABLE IF NOT EXISTS `tbl_news` (
  `a_id` int(25) NOT NULL AUTO_INCREMENT,
  `a_type` int(4) DEFAULT NULL,
  `a_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `a_content` text CHARACTER SET utf8,
  `a_date` date NOT NULL,
  `add_time` datetime NOT NULL,
  `year_id` int(20) DEFAULT '0',
  `order` int(11) DEFAULT NULL,
  `contype` int(4) DEFAULT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_notice`
--

CREATE TABLE IF NOT EXISTS `tbl_notice` (
  `a_id` int(25) NOT NULL AUTO_INCREMENT,
  `a_type` int(4) DEFAULT NULL,
  `a_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `a_content` text CHARACTER SET utf8,
  `down_file` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `a_date` date NOT NULL,
  `add_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `year_id` int(20) DEFAULT '0',
  `order` int(11) DEFAULT '100',
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_other`
--

CREATE TABLE IF NOT EXISTS `tbl_other` (
  `a_id` int(25) NOT NULL AUTO_INCREMENT,
  `a_type` int(4) DEFAULT NULL,
  `a_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `link` varchar(2048) CHARACTER SET utf8 NOT NULL,
  `target` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `a_content` text CHARACTER SET utf8,
  `a_encontent` text CHARACTER SET utf8,
  `a_cncontent` text CHARACTER SET utf8,
  `down_file` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `a_entitle` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `a_cntitle` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `a_date` date NOT NULL,
  `add_time` datetime NOT NULL,
  `year_id` int(20) DEFAULT '0',
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_sessions`
--

CREATE TABLE IF NOT EXISTS `tbl_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_student`
--

CREATE TABLE IF NOT EXISTS `tbl_student` (
  `student_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `student_class_no` tinyint(3) unsigned DEFAULT NULL,
  `student_login` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `class_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `student_login` (`student_login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_stuteacher`
--

CREATE TABLE IF NOT EXISTS `tbl_stuteacher` (
  `a_id` int(25) NOT NULL AUTO_INCREMENT,
  `a_type` int(4) DEFAULT NULL,
  `a_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `link` varchar(2048) CHARACTER SET utf8 NOT NULL,
  `target` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `a_content` text CHARACTER SET utf8,
  `a_encontent` text CHARACTER SET utf8,
  `a_cncontent` text CHARACTER SET utf8,
  `a_entitle` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `a_cntitle` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `a_date` date NOT NULL,
  `add_time` datetime NOT NULL,
  `year_id` int(20) DEFAULT '0',
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_teacher`
--

CREATE TABLE IF NOT EXISTS `tbl_teacher` (
  `teacher_id` mediumint(5) unsigned NOT NULL AUTO_INCREMENT,
  `teacher_name` varchar(50) NOT NULL DEFAULT '',
  `teacher_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `teacher_intro` text,
  `teacher_login` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `admin` enum('Y','N') NOT NULL DEFAULT 'N',
  `subject` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `show` enum('Y','N') DEFAULT 'N',
  `order` smallint(6) DEFAULT '100',
  `docoment_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `level` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `got_degree` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `take_train` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `pass_english_test` tinyint(1) NOT NULL DEFAULT '0',
  `pass_putonghua_test` tinyint(1) NOT NULL DEFAULT '0',
  `year_experience` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `duty_admin` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `duty_teach` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `access_control_id` int(10) unsigned NOT NULL DEFAULT '0',
  `is_superuser` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `type_id` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`teacher_id`),
  UNIQUE KEY `teacher_login` (`teacher_login`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=115 ;

--
-- 转存表中的数据 `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`teacher_id`, `teacher_name`, `teacher_email`, `teacher_intro`, `teacher_login`, `password`, `admin`, `subject`, `show`, `order`, `docoment_name`, `level`, `got_degree`, `take_train`, `pass_english_test`, `pass_putonghua_test`, `year_experience`, `duty_admin`, `duty_teach`, `access_control_id`, `is_superuser`, `type_id`, `title`) VALUES
(6, 'admin', '', '', 'admin', 'b59c67bf196a4758191e42f76670ceba', 'N', '', 'N', 100, NULL, 1, 0, 0, 0, 0, 0, '', '', 0, 0, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `tbl_teacher_type`
--

CREATE TABLE IF NOT EXISTS `tbl_teacher_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(50) DEFAULT '',
  `access_control_id` int(10) unsigned NOT NULL DEFAULT '0',
  `type_order` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_topmark`
--

CREATE TABLE IF NOT EXISTS `tbl_topmark` (
  `topmark_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `topmark_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '0',
  `topmark_year` smallint(5) unsigned NOT NULL DEFAULT '0',
  `activity_id` int(10) unsigned NOT NULL DEFAULT '0',
  `topmark_section` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `topmark_add_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `topmark_add_date` text NOT NULL,
  PRIMARY KEY (`topmark_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_topmark_record`
--

CREATE TABLE IF NOT EXISTS `tbl_topmark_record` (
  `topmark_id` int(10) unsigned NOT NULL DEFAULT '0',
  `topmark_record_student_id` int(10) unsigned NOT NULL DEFAULT '0',
  `topmark_record_student_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `topmark_record_class_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `topmark_record_subject` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `topmark_record_rank` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `topmark_record_order` int(10) unsigned NOT NULL DEFAULT '0',
  KEY `match_id` (`topmark_id`),
  KEY `student_id` (`topmark_record_student_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 PACK_KEYS=0;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_web_content`
--

CREATE TABLE IF NOT EXISTS `tbl_web_content` (
  `web_content_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `web_content_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `web_content_parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `img_left_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `img_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `cms_type` tinyint(2) NOT NULL DEFAULT '0',
  `is_cms` tinyint(1) NOT NULL DEFAULT '0',
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `web_content_order` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`web_content_id`),
  KEY `parent_id` (`web_content_parent_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 PACK_KEYS=0 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_web_sub_content`
--

CREATE TABLE IF NOT EXISTS `tbl_web_sub_content` (
  `web_sub_content_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `web_content_id` int(10) unsigned NOT NULL DEFAULT '0',
  `web_sub_content_title` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `web_sub_content_template` tinyint(4) NOT NULL DEFAULT '1',
  `web_sub_content_description` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `web_sub_content_order` int(10) unsigned NOT NULL DEFAULT '0',
  `web_sub_content_inner` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`web_sub_content_id`),
  KEY `web_id` (`web_content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_web_sub_content_file`
--

CREATE TABLE IF NOT EXISTS `tbl_web_sub_content_file` (
  `file_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `web_sub_content_item_id` int(10) unsigned NOT NULL DEFAULT '0',
  `file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `file_remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`file_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_web_sub_content_gallery`
--

CREATE TABLE IF NOT EXISTS `tbl_web_sub_content_gallery` (
  `web_sub_content_item_id` int(10) unsigned NOT NULL DEFAULT '0',
  `file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `ori_file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `g_order` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`file_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_web_sub_content_item`
--

CREATE TABLE IF NOT EXISTS `tbl_web_sub_content_item` (
  `web_sub_content_item_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `web_sub_content_id` int(10) unsigned NOT NULL DEFAULT '0',
  `web_sub_content_item_title` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `web_sub_content_item_html` mediumtext NOT NULL,
  `web_sub_content_item_text` mediumtext NOT NULL,
  `web_sub_content_item_order` int(10) unsigned NOT NULL DEFAULT '10',
  `date` date DEFAULT NULL,
  `bg_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`web_sub_content_item_id`),
  KEY `web_id` (`web_sub_content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_words`
--

CREATE TABLE IF NOT EXISTS `tbl_words` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) CHARACTER SET utf8 NOT NULL,
  `word` text CHARACTER SET utf8 NOT NULL,
  `order` tinyint(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
