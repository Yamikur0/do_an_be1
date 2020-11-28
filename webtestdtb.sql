-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 28, 2020 at 10:13 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webtestdtb`
--
CREATE DATABASE IF NOT EXISTS `webtestdtb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `webtestdtb`;

-- --------------------------------------------------------

--
-- Table structure for table `body`
--

DROP TABLE IF EXISTS `body`;
CREATE TABLE IF NOT EXISTS `body` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `thutu` int(11) NOT NULL,
  `new_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `body`
--

INSERT INTO `body` (`id`, `title`, `content`, `thutu`, `new_id`) VALUES
(8, 'Tạo thư mục và file', 'Các bạn hãy tạo thư mục có cấu trúc như sau', 2, 6),
(7, 'Kiến thức cần thiết', 'Trước tiên, các bạn cần có những kiến thức cơ bản về python và pygame', 1, 6),
(6, '2. Setup ', 'Các bạn tự setup các thứ để bắt đầu một dự án React Native như bình thường', 2, 5),
(5, '1. Cơ duyên gặp gỡ', 'Dự án vẫn trôi nhẹ nhẹ qua những spring', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `new_id` int(11) NOT NULL,
  `img` text NOT NULL,
  `header_title` varchar(200) NOT NULL,
  `header_content` text NOT NULL,
  `footer_title` varchar(200) NOT NULL,
  `footer_content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `new_id`, `img`, `header_title`, `header_content`, `footer_title`, `footer_content`) VALUES
(5, 1, 'img test 1', 'Tôi Đã Biến Website Thành Ứng Dụng Di Động Như Thế Nào?', 'Trong một dự án, khi gặp yêu cầu phải làm gấp một ứng dụng di động,', 'Tạm kết', 'Như tôi đã viết ở mục 1,'),
(6, 2, 'lap-trinh-game-dua-xe-voi-pygame-63741703749.7302.jpg', 'Lập Trình Game Đua Xe Với Pygame', 'Chào mọi người! Trong bài hướng dẫn này', 'Kết', 'Vậy là chúng ta đã hoàn thành xong game đua xe đơn giản rồi.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
