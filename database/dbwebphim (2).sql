-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 29, 2013 at 06:36 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbwebphim`
--

-- --------------------------------------------------------

--
-- Table structure for table `film_bo`
--

CREATE TABLE IF NOT EXISTS `film_bo` (
  `film_bo_id` int(11) NOT NULL AUTO_INCREMENT,
  `film_bo_name` varchar(45) NOT NULL,
  `film_bo_name_vi` varchar(45) NOT NULL,
  `film_bo_sotap` int(11) NOT NULL,
  `film_bo_namsx` int(11) NOT NULL,
  `film_bo_cataloge_id_first` int(11) NOT NULL,
  `film_bo_cataloge_id_second` int(11) NOT NULL,
  `film_bo_cataloge_id_third` int(11) NOT NULL,
  `film_bo_country_id` int(11) NOT NULL,
  `film_bo_nhasx_id` int(11) NOT NULL,
  `film_bo_content` text NOT NULL COMMENT 'nội dung chữ và hình để giới thiệu film',
  `film_bo_avatar` text NOT NULL,
  `film_bo_cover` text NOT NULL,
  `film_bo_daodien` text NOT NULL,
  `film_bo_dienvien` text NOT NULL,
  `film_bo_postdate` date NOT NULL,
  `film_bo_viewed` int(11) NOT NULL,
  `film_bo_rate` int(11) NOT NULL,
  PRIMARY KEY (`film_bo_id`),
  UNIQUE KEY `film_bo_name_vi_UNIQUE` (`film_bo_name_vi`),
  UNIQUE KEY `film_bo_name_UNIQUE` (`film_bo_name`),
  KEY `film_bo_nhasx_id` (`film_bo_nhasx_id`),
  KEY `film_bo_cataloge_id_first` (`film_bo_cataloge_id_first`),
  KEY `film_bo_cataloge_id_second` (`film_bo_cataloge_id_second`),
  KEY `film_bo_cataloge_id_third` (`film_bo_cataloge_id_third`),
  KEY `film_bo_country_id` (`film_bo_country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `film_bo`
--

INSERT INTO `film_bo` (`film_bo_id`, `film_bo_name`, `film_bo_name_vi`, `film_bo_sotap`, `film_bo_namsx`, `film_bo_cataloge_id_first`, `film_bo_cataloge_id_second`, `film_bo_cataloge_id_third`, `film_bo_country_id`, `film_bo_nhasx_id`, `film_bo_content`, `film_bo_avatar`, `film_bo_cover`, `film_bo_daodien`, `film_bo_dienvien`, `film_bo_postdate`, `film_bo_viewed`, `film_bo_rate`) VALUES
(1, 'Breaking Bad - season 5', 'Rẽ Trái - phần 5', 5, 2013, 1, 2, 3, 1, 5, '[center][b]Trailer\r\n[video]Xb7NBLiQRkM[/video]\r\n[/b][/center]\r\nKhi được chẩn đoán bị ung thư phổi giai đoạn III và chỉ còn sống được 2 năm, giáo viên hóa học Walter White quyết định rằng mình chẳng còn gì để mất. Ông sống cùng vợ và cậu con trai bị chứng bệnh về não ở bang New Mexico. Để đảm bảo tương lai an toàn cho vợ con một khi mình mất đi, ông đã gia nhập vào thế giới tội phạm và ma túy. Ông đã chứng tỏ khả năng của mình trong thế giới mới đó bằng việc phối hợp với một học sinh cũ của mình đề điều chế và bán methamphetamine (hay còn gọi là “ ma túy đá”). Bộ [url=http://thegioiphim.com/][b]phim[/b][/url] đã diễn tả sự ảnh hưởng của căn bệnh nan y đến tâm lý của một người đàn ông, từ một người thầy giáo bình thường, hiền lành đã làm thế nào để trở thành một ông trùm ma túy khét tiếng. [url=http://thegioiphim.com/][b]Phim[/b][/url] phản ảnh hiện thực của xã hội Mỹ với những hình ảnh bạo lực, tình dục rất chân thật, phản ánh 1 cách chân thực cuộc sống của 1 phần Xã hội Mỹ: Dân nghiền bồ đề, Hút Cỏ, Đập đá... với những tình tiết hấp dẫn, li kỳ, hồi hộp, chắc chắn là một trong những bộ [url=http://thegioiphim.com/][b]phim[/b][/url] truyền hình được đánh giá hay nhất trong lịch sử...', 'breaking-bad-season5-avatar.jpg', 'breaking-bad-season-5-Cover.jpg', 'Vince Gilligan', 'Brian Granston, Anna Gunn, Aaron Paul', '2013-11-05', 0, 0),
(2, 'Breaking Bad - season 4', 'Rẽ Trái - phần 4', 2, 2012, 3, 3, 2, 1, 5, '[center]﻿[b]Trailer\r\n[video]alFsfEUtDmQ[/video]\r\n[/b][/center]Nội dung phim Breaking Bad 4: Khi được chẩn đoán bị ung thư phổi giai đoạn III và chỉ còn sống được 2 năm, giáo viên hóa học Walter White quyết định rằng mình chẳng còn gì để mất. Ông sống cùng vợ và cậu con trai bị chứng bệnh về não ở bang New Mexico. Để đảm bảo tương lai an toàn cho vợ con một khi mình mất đi, ông đã gia nhập vào thế giới tội phạm và ma túy. Ông đã chứng tỏ khả năng của mình trong thế giới mới đó bằng việc phối hợp với một học sinh cũ của mình đề điều chế và bán methamphetamine (hay còn gọi là “ ma túy đá”). Bộ [url=http://phim3s.net/][b]phim[/b][/url] đã diễn tả sự ảnh hưởng của căn bệnh nan y đến tâm lý của một người đàn ông, từ một người thầy giáo bình thường, hiền lành đã làm thế nào để trở thành một ông trùm ma túy khét tiếng. Phim phản ảnh hiện thực của xã hội Mỹ với những hình ảnh bạo lực, tình dục rất chân thật, với những tình tiết hấp dẫn, li kỳ, hồi hộp, chắc chắn là một trong những bộ phim truyền hình được đánh giá hay nhất trong lịch sử.', 'breaking-bad-season4-avatar.jpg', 'breaking-bad-season4-cover.jpg', 'Vince Gilligan', 'Brian Granston, Anna Gunn, Aaron Paul', '2013-11-05', 0, 0),
(3, 'Breaking Bad - season 2', 'Rẽ Trái - phần 2', 0, 2010, 3, 2, 2, 1, 5, '[b][center]Không Có Nội Dung[/center][/b]', 'Breaking-Bad-season2_avatar.jpg', 'breaking-bad-season2-cover.jpg', 'Vince Gilligan', 'Brian Granston, Anna Gunn, Aaron Paul', '2013-11-09', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `film_bo_ct`
--

CREATE TABLE IF NOT EXISTS `film_bo_ct` (
  `film_bo_ct_id` int(11) NOT NULL,
  `film_bo_ct_tap` varchar(45) NOT NULL,
  `film_bo_ct_link` varchar(255) NOT NULL,
  PRIMARY KEY (`film_bo_ct_id`,`film_bo_ct_tap`),
  KEY `film_bo_ct_id` (`film_bo_ct_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `film_bo_ct`
--

INSERT INTO `film_bo_ct` (`film_bo_ct_id`, `film_bo_ct_tap`, `film_bo_ct_link`) VALUES
(1, '1', 'http://www.youtube.com/watch?v=hgdvPhr2Kz8'),
(1, '2', 'http://www.youtube.com/watch?v=hgdvPhr2Kz8'),
(1, '3', 'http://www.youtube.com/watch?v=hgdvPhr2Kz8'),
(1, '4', 'http://www.youtube.com/watch?v=hgdvPhr2Kz8'),
(1, '5', 'http://www.youtube.com/watch?v=hgdvPhr2Kz8'),
(2, '1', 'http://www.youtube.com/watch?v=hgdvPhr2Kz8'),
(2, '2', 'http://www.youtube.com/watch?v=hgdvPhr2Kz8');

-- --------------------------------------------------------

--
-- Table structure for table `film_cataloge`
--

CREATE TABLE IF NOT EXISTS `film_cataloge` (
  `film_cataloge_id` int(11) NOT NULL AUTO_INCREMENT,
  `film_cataloge_name` varchar(45) NOT NULL,
  PRIMARY KEY (`film_cataloge_id`),
  UNIQUE KEY `film_cataloge_name_UNIQUE` (`film_cataloge_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `film_cataloge`
--

INSERT INTO `film_cataloge` (`film_cataloge_id`, `film_cataloge_name`) VALUES
(2, 'Hài Hước'),
(3, 'Hành Động'),
(4, 'Hoạt Hình'),
(1, 'Kinh Dị'),
(5, 'Tâm Lý');

-- --------------------------------------------------------

--
-- Table structure for table `film_country`
--

CREATE TABLE IF NOT EXISTS `film_country` (
  `film_country_id` int(11) NOT NULL AUTO_INCREMENT,
  `film_country_name` varchar(45) NOT NULL,
  PRIMARY KEY (`film_country_id`),
  UNIQUE KEY `film_country_name_UNIQUE` (`film_country_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `film_country`
--

INSERT INTO `film_country` (`film_country_id`, `film_country_name`) VALUES
(2, 'Hàn Quốc'),
(1, 'Mỹ'),
(3, 'Nga');

-- --------------------------------------------------------

--
-- Table structure for table `film_le`
--

CREATE TABLE IF NOT EXISTS `film_le` (
  `film_le_id` int(11) NOT NULL AUTO_INCREMENT,
  `film_le_name` varchar(45) NOT NULL,
  `film_le_name_vi` varchar(45) NOT NULL,
  `film_le_namsx` int(11) NOT NULL,
  `film_le_cataloge_id_first` int(11) NOT NULL,
  `film_le_cataloge_id_second` int(11) NOT NULL,
  `film_le_cataloge_id_third` int(11) NOT NULL,
  `film_le_country_id` int(11) NOT NULL,
  `film_le_nhasx_id` int(11) NOT NULL,
  `film_le_content` text NOT NULL,
  `film_le_avatar` text NOT NULL,
  `film_le_cover` text NOT NULL,
  `film_le_daodien` text NOT NULL,
  `film_le_dienvien` text NOT NULL,
  `film_le_postdate` date NOT NULL,
  `film_le_link` varchar(255) NOT NULL,
  `film_le_viewed` int(11) NOT NULL,
  `film_le_rate` int(11) NOT NULL,
  PRIMARY KEY (`film_le_id`),
  UNIQUE KEY `film_le_name_UNIQUE` (`film_le_name`),
  UNIQUE KEY `film_le_name_vi_UNIQUE` (`film_le_name_vi`),
  KEY `film_le_cataloge_id_first` (`film_le_cataloge_id_first`),
  KEY `film_le_cataloge_id_second` (`film_le_cataloge_id_second`),
  KEY `film_le_cataloge_id_third` (`film_le_cataloge_id_third`),
  KEY `film_le_country_id` (`film_le_country_id`),
  KEY `film_le_nhasx_id` (`film_le_nhasx_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `film_le`
--

INSERT INTO `film_le` (`film_le_id`, `film_le_name`, `film_le_name_vi`, `film_le_namsx`, `film_le_cataloge_id_first`, `film_le_cataloge_id_second`, `film_le_cataloge_id_third`, `film_le_country_id`, `film_le_nhasx_id`, `film_le_content`, `film_le_avatar`, `film_le_cover`, `film_le_daodien`, `film_le_dienvien`, `film_le_postdate`, `film_le_link`, `film_le_viewed`, `film_le_rate`) VALUES
(1, 'The Wolverine', 'Người Sói 2013', 2013, 3, 3, 3, 1, 6, '[center]Trailer\r\n[video]g7kdUy5_WlI[/video]﻿[/center]', 'wolverine-Avatar.jpg', 'Wolverine-cover.jpg', 'James Mangold', 'Hugh Jackman, Will Yun Lee', '2013-11-09', 'http://www.youtube.com/watch?v=g7kdUy5_WlI', 0, 0),
(2, 'Despicable Me 2', 'Kẻ Cắp Mặt Trăng', 2013, 4, 5, 2, 1, 7, '[center]﻿[b]Trailer[/b][/center][center]﻿[video]HwXbtZXjbVE[/video][/center][center]﻿[b]screenshot[/b][/center][center]﻿[img]http://www.capsulecomputers.com.au/wp-content/uploads/2013/06/despicable-me-2-screenshot-05.jpg[/img]﻿[/center][center][img]http://rorschachreviews.files.wordpress.com/2013/06/despicable-me-2-screenshot-06.jpg[/img]﻿[/center]', 'Despicable-Me-2-Movie-Avatar.jpg', 'Despicable-Me-2-Movie-Cover.jpg', 'Pierre Coffin, Chris Renaud', 'Al Pacino, Steve Carell và Miranda Cosgrove...', '2013-11-29', 'http://www.youtube.com/watch?v=HwXbtZXjbVE', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `film_nhasx`
--

CREATE TABLE IF NOT EXISTS `film_nhasx` (
  `film_nhasx_id` int(11) NOT NULL AUTO_INCREMENT,
  `film_nhasx_name` varchar(255) NOT NULL,
  PRIMARY KEY (`film_nhasx_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `film_nhasx`
--

INSERT INTO `film_nhasx` (`film_nhasx_id`, `film_nhasx_name`) VALUES
(1, 'Legendary'),
(2, 'Paramount'),
(4, 'Colombia'),
(5, 'AMC'),
(6, '20 Century Fox'),
(7, 'Universal');

-- --------------------------------------------------------

--
-- Table structure for table `film_yeucau`
--

CREATE TABLE IF NOT EXISTS `film_yeucau` (
  `film_yeucau_id` int(11) NOT NULL AUTO_INCREMENT,
  `film_yeucau_user_id` int(11) NOT NULL,
  `film_yeucau_name` text NOT NULL,
  `film_yeucau_name_vi` text NOT NULL,
  `film_yeucau_namsx` int(11) NOT NULL,
  `film_yeucau_postdate` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`film_yeucau_id`),
  KEY `film_yeucau_user_id` (`film_yeucau_user_id`),
  KEY `film_yeucau_user_id_2` (`film_yeucau_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `film_yeucau`
--

INSERT INTO `film_yeucau` (`film_yeucau_id`, `film_yeucau_user_id`, `film_yeucau_name`, `film_yeucau_name_vi`, `film_yeucau_namsx`, `film_yeucau_postdate`) VALUES
(3, 2, 'Sex and zend', 'Nhục Bổ Đoàn(film xxx 3D)', 2011, '2013-11-03'),
(5, 2, 'Ironman 3', 'Người sắt 3', 2013, '2013-11-03'),
(6, 3, 'Ironman 3', 'Người Thiếc 3', 2013, '2013-11-27');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(45) NOT NULL,
  `user_level_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email_UNIQUE` (`user_email`),
  KEY `user_level_id` (`user_level_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_password`, `user_level_id`) VALUES
(1, 'vietnt134@gmail.com', '0bc38833e1fe971694e668384b9f3274fae74ef1', 1),
(2, 'samurai_lonely134@yahoo.com', 'd218b7e80a0a91b4456df68009ba7712c0ec567e', 2),
(3, '10520649@gm.uit.edu.vn', '7c222fb2927d828af22f592134e8932480637c0d', 2),
(4, 'trongloikt192@gmail.com', '3973d59aa685657bb732c4741e39e527bd80d53d', 2),
(5, '10520403@gm.uit.edu.vn', '0bc38833e1fe971694e668384b9f3274fae74ef1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE IF NOT EXISTS `user_level` (
  `user_level_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_level_name` varchar(45) NOT NULL,
  PRIMARY KEY (`user_level_id`),
  UNIQUE KEY `user_level_name_UNIQUE` (`user_level_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`user_level_id`, `user_level_name`) VALUES
(1, 'Admin'),
(3, 'Locked-User'),
(2, 'User');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `film_bo`
--
ALTER TABLE `film_bo`
  ADD CONSTRAINT `film_bo_ibfk_1` FOREIGN KEY (`film_bo_nhasx_id`) REFERENCES `film_nhasx` (`film_nhasx_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `film_bo_ibfk_2` FOREIGN KEY (`film_bo_cataloge_id_first`) REFERENCES `film_cataloge` (`film_cataloge_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `film_bo_ibfk_3` FOREIGN KEY (`film_bo_country_id`) REFERENCES `film_country` (`film_country_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `film_bo_ibfk_4` FOREIGN KEY (`film_bo_cataloge_id_second`) REFERENCES `film_cataloge` (`film_cataloge_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `film_bo_ibfk_5` FOREIGN KEY (`film_bo_cataloge_id_third`) REFERENCES `film_cataloge` (`film_cataloge_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `film_bo_ct`
--
ALTER TABLE `film_bo_ct`
  ADD CONSTRAINT `film_bo_ct_ibfk_1` FOREIGN KEY (`film_bo_ct_id`) REFERENCES `film_bo` (`film_bo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `film_le`
--
ALTER TABLE `film_le`
  ADD CONSTRAINT `film_le_ibfk_1` FOREIGN KEY (`film_le_cataloge_id_first`) REFERENCES `film_cataloge` (`film_cataloge_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `film_le_ibfk_2` FOREIGN KEY (`film_le_cataloge_id_second`) REFERENCES `film_cataloge` (`film_cataloge_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `film_le_ibfk_3` FOREIGN KEY (`film_le_cataloge_id_third`) REFERENCES `film_cataloge` (`film_cataloge_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `film_le_ibfk_4` FOREIGN KEY (`film_le_country_id`) REFERENCES `film_country` (`film_country_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `film_le_ibfk_5` FOREIGN KEY (`film_le_nhasx_id`) REFERENCES `film_nhasx` (`film_nhasx_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `film_yeucau`
--
ALTER TABLE `film_yeucau`
  ADD CONSTRAINT `film_yeucau_ibfk_1` FOREIGN KEY (`film_yeucau_user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_level_id`) REFERENCES `user_level` (`user_level_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
