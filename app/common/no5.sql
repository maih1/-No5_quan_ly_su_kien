-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2021 at 07:55 AM
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
<<<<<<< HEAD
-- Cơ sở dữ liệu: `no5`
=======
-- Database: `no5`
>>>>>>> origin/test_2
--

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Cấu trúc bảng cho bảng `admins`
=======
-- Table structure for table `admins`
>>>>>>> origin/test_2
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `login_id` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `actived_flag` int(1) NOT NULL DEFAULT 1,
  `reset_password_token` varchar(100) NOT NULL,
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Cấu trúc bảng cho bảng `events`
=======
-- Table structure for table `events`
>>>>>>> origin/test_2
--

CREATE TABLE `events` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
<<<<<<< HEAD
  `slogan` char(10) NOT NULL,
=======
  `slogan` varchar(250) NOT NULL,
>>>>>>> origin/test_2
  `leader` varchar(250) NOT NULL,
  `avatar` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
<<<<<<< HEAD
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `events`
--

INSERT INTO `events` (`id`, `name`, `slogan`, `leader`, `avatar`, `description`, `updated`, `created`) VALUES
(2, 'Nguyen Thu Thao', 'LaConTrai', 'PVM', 'Picture1.jpg', 'Thao la mot nguoi dan ong dich thuc', '2022-01-03 22:18:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `event_comments`
=======
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `event_comments`
>>>>>>> origin/test_2
--

CREATE TABLE `event_comments` (
  `id` int(10) NOT NULL,
  `event_id` int(10) NOT NULL,
  `avatar` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Cấu trúc bảng cho bảng `event_timelines`
=======
-- Table structure for table `event_timelines`
>>>>>>> origin/test_2
--

CREATE TABLE `event_timelines` (
  `id` int(10) NOT NULL,
  `event_id` int(10) NOT NULL,
<<<<<<< HEAD
  `form` time NOT NULL,
=======
  `from` time NOT NULL,
>>>>>>> origin/test_2
  `to` time NOT NULL,
  `name` varchar(250) NOT NULL,
  `detail` text NOT NULL,
  `PoC` varchar(250) NOT NULL,
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Cấu trúc bảng cho bảng `users`
=======
-- Table structure for table `users`
>>>>>>> origin/test_2
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `type` int(1) NOT NULL DEFAULT 1,
  `name` varchar(250) NOT NULL,
  `user_id` char(15) NOT NULL,
  `avatar` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
<<<<<<< HEAD
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
=======
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
>>>>>>> origin/test_2
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_id` (`login_id`);

--
<<<<<<< HEAD
-- Chỉ mục cho bảng `events`
=======
-- Indexes for table `events`
>>>>>>> origin/test_2
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
<<<<<<< HEAD
-- Chỉ mục cho bảng `event_comments`
--
ALTER TABLE `event_comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `event_timelines`
--
ALTER TABLE `event_timelines`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
=======
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
>>>>>>> origin/test_2
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
<<<<<<< HEAD
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
=======
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
>>>>>>> origin/test_2
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
<<<<<<< HEAD
-- AUTO_INCREMENT cho bảng `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `event_comments`
=======
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_comments`
>>>>>>> origin/test_2
--
ALTER TABLE `event_comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
<<<<<<< HEAD
-- AUTO_INCREMENT cho bảng `event_timelines`
=======
-- AUTO_INCREMENT for table `event_timelines`
>>>>>>> origin/test_2
--
ALTER TABLE `event_timelines`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
<<<<<<< HEAD
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
=======
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

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
>>>>>>> origin/test_2
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
