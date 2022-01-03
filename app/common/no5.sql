-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 03, 2022 lúc 04:22 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `no5`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
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
-- Cấu trúc bảng cho bảng `events`
--

CREATE TABLE `events` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `slogan` char(10) NOT NULL,
  `leader` varchar(250) NOT NULL,
  `avatar` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
-- Cấu trúc bảng cho bảng `event_timelines`
--

CREATE TABLE `event_timelines` (
  `id` int(10) NOT NULL,
  `event_id` int(10) NOT NULL,
  `form` time NOT NULL,
  `to` time NOT NULL,
  `name` varchar(250) NOT NULL,
  `detail` text NOT NULL,
  `PoC` varchar(250) NOT NULL,
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
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
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_id` (`login_id`);

--
-- Chỉ mục cho bảng `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
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
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `event_comments`
--
ALTER TABLE `event_comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `event_timelines`
--
ALTER TABLE `event_timelines`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
