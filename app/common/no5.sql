-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2022 at 09:13 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `no5`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `login_id` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `actived_flag` int(1) NOT NULL DEFAULT 1,
  `reset_password_token` varchar(100) NOT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `login_id`, `password`, `actived_flag`, `reset_password_token`, `updated`, `created`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, '', '2022-01-06 14:58:00', '2022-01-06 14:58:00');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `slogan` varchar(250) NOT NULL,
  `leader` varchar(250) NOT NULL,
  `avatar` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `slogan`, `leader`, `avatar`, `description`, `updated`, `created`) VALUES
(1, 'Chào đón sinh viên K66', 'Chào tân sinh viên', 'Giảng viên', 'K66.jpg', 'Đón tân sinh viên nhập học', '2022-01-06 14:48:17', '2022-01-06 14:48:17'),
(2, 'Công bố điểm chuẩn năm 2021', 'Công bố điểm chuẩn', 'Giảng viên', 'HUS.jpg', 'Công bố điểm chuẩn', '2022-01-06 14:55:19', '2022-01-06 14:55:19');

-- --------------------------------------------------------

--
-- Table structure for table `event_comments`
--

CREATE TABLE `event_comments` (
  `id` int(10) NOT NULL,
  `event_id` int(10) NOT NULL,
  `avatar` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_comments`
--

INSERT INTO `event_comments` (`id`, `event_id`, `avatar`, `content`, `updated`, `created`) VALUES
(1, 1, 'HUS.jpg', 'Chào tân sinh viên', '2022-01-06 15:03:31', '2022-01-06 15:03:31'),
(2, 1, 'K66.jpg', 'Chào tân sinh viên', '2022-01-06 15:06:44', '2022-01-06 15:06:44');

-- --------------------------------------------------------

--
-- Table structure for table `event_timelines`
--

CREATE TABLE `event_timelines` (
  `id` int(10) NOT NULL,
  `event_id` int(10) NOT NULL,
  `from` time NOT NULL,
  `to` time NOT NULL,
  `name` varchar(250) NOT NULL,
  `detail` text NOT NULL,
  `PoC` varchar(250) NOT NULL,
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_timelines`
--

INSERT INTO `event_timelines` (`id`, `event_id`, `from`, `to`, `name`, `detail`, `PoC`, `updated`, `created`) VALUES
(1, 1, '08:00:00', '09:00:00', 'Đón tiếp', 'Đón tiếp sinh viên', 'Sinh viên tình nguyện', '2022-01-06 15:01:25', '2022-01-06 15:01:25'),
(2, 1, '10:00:00', '11:00:00', 'Văn nghệ', 'Tổ chức văn nghệ', 'Giảng viên A', '2022-01-06 15:02:38', '2022-01-06 15:02:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `type` int(1) NOT NULL DEFAULT 1,
  `name` varchar(250) NOT NULL,
  `user_id` char(15) NOT NULL,
  `avatar` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `name`, `user_id`, `avatar`, `description`, `updated`, `created`) VALUES
(1, 2, 'Nguyễn Văn A', 'user1', 'HUS.jpg', 'Giảng viên', '2022-01-06 15:10:23', '2022-01-06 15:10:23'),
(2, 1, 'Trần Văn B', 'user2', 'hus1.jpg', 'Sinh viên', '2022-01-06 15:11:41', '2022-01-06 15:11:41'),
(3, 3, 'Vũ Thị C', 'user3', 'hus2.jpg', 'Cựu sinh viên', '2022-01-06 15:12:31', '2022-01-06 15:12:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_id` (`login_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_comments`
--
ALTER TABLE `event_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `event_timelines`
--
ALTER TABLE `event_timelines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event_comments`
--
ALTER TABLE `event_comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event_timelines`
--
ALTER TABLE `event_timelines`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event_comments`
--
ALTER TABLE `event_comments`
  ADD CONSTRAINT `event_comments_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);

--
-- Constraints for table `event_timelines`
--
ALTER TABLE `event_timelines`
  ADD CONSTRAINT `event_timelines_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;