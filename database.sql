-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 19, 2020 at 05:49 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Facebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `user_id1` int(11) NOT NULL,
  `user_id2` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_image` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `post_message` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `post_image`, `created_at`, `updated_at`, `post_message`) VALUES
(1, 1, 'aika.jpg', '2020-04-12 15:31:43', '2020-04-19 14:25:09', 'こんにちは'),
(2, 1, NULL, '2020-04-12 15:53:11', '2020-04-12 15:53:11', 'こんにちは'),
(3, 1, NULL, '2020-04-12 16:02:55', '2020-04-12 16:02:55', 'こんにちは'),
(4, 1, NULL, '2020-04-13 06:33:23', '2020-04-13 06:33:23', 'こんにちは'),
(5, 1, NULL, '2020-04-13 06:35:51', '2020-04-13 06:35:51', 'こんにちは'),
(6, 1, NULL, '2020-04-13 06:36:27', '2020-04-13 06:36:27', 'こんにちは'),
(7, 1, NULL, '2020-04-13 06:53:09', '2020-04-13 06:53:09', 'こんにちは'),
(8, 1, NULL, '2020-04-14 20:03:19', '2020-04-14 20:03:19', 'こんにちは'),
(9, 1, NULL, '2020-04-15 06:05:05', '2020-04-15 06:05:05', 'こんにちは'),
(10, 1, NULL, '2020-04-15 06:06:06', '2020-04-15 06:06:06', 'こんにちは'),
(11, 1, NULL, '2020-04-15 06:22:14', '2020-04-15 06:22:14', 'こんにちは'),
(12, 1, NULL, '2020-04-15 06:22:57', '2020-04-15 06:22:57', 'こんにちは'),
(13, 1, NULL, '2020-04-15 06:24:04', '2020-04-15 06:24:04', 'こんにちは'),
(14, 1, NULL, '2020-04-15 06:57:09', '2020-04-15 06:57:09', 'こんにちは'),
(15, 1, NULL, '2020-04-15 06:58:34', '2020-04-15 06:58:34', 'こんにちは'),
(16, 1, NULL, '2020-04-15 06:59:10', '2020-04-15 06:59:10', 'こんにちは'),
(17, 1, NULL, '2020-04-15 06:59:55', '2020-04-15 06:59:55', 'こんにちは'),
(18, 1, NULL, '2020-04-15 07:00:17', '2020-04-15 07:00:17', 'こんにちは'),
(19, 1, NULL, '2020-04-15 13:25:35', '2020-04-15 13:25:35', '今日のご飯はカレーです。'),
(20, 1, NULL, '2020-04-15 13:33:12', '2020-04-15 13:33:12', '今日のご飯はカレーです。'),
(21, 1, NULL, '2020-04-15 13:39:54', '2020-04-15 13:39:54', '今日のご飯はカレーです。'),
(22, 1, NULL, '2020-04-15 13:41:25', '2020-04-15 13:41:25', '今日のご飯はカレーです。'),
(23, 1, NULL, '2020-04-15 13:41:31', '2020-04-15 13:41:31', 'gennki\r\n'),
(24, 1, NULL, '2020-04-15 13:42:22', '2020-04-15 13:42:22', 'gennki\r\n'),
(25, 1, NULL, '2020-04-16 07:36:25', '2020-04-16 07:36:25', '今日はみんなで大池公園へいきました。'),
(26, 1, NULL, '2020-04-16 07:37:07', '2020-04-16 07:37:07', '今日の朝ごはんはヨーグルトも一緒に食べました。'),
(27, 2, NULL, '2020-04-18 02:29:35', '2020-04-18 02:29:35', 'こんばんは'),
(28, 2, NULL, '2020-04-18 02:30:13', '2020-04-18 02:30:13', 'こんばんは'),
(29, 1, NULL, '2020-04-19 14:14:42', '2020-04-19 14:14:42', 'おはようございます。'),
(30, 1, NULL, '2020-04-19 14:22:28', '2020-04-19 14:22:28', 'おはようございます。'),
(31, 1, NULL, '2020-04-19 14:24:04', '2020-04-19 14:24:04', 'おはようございます。'),
(32, 1, NULL, '2020-04-19 14:25:17', '2020-04-19 14:25:17', 'おはようございます。'),
(33, 1, NULL, '2020-04-19 14:26:17', '2020-04-19 14:26:17', ''),
(34, 1, '4a631ef01f0cd6716391d99317c137fb_m.jpg', '2020-04-19 14:29:29', '2020-04-19 14:29:29', ''),
(35, 1, '4a631ef01f0cd6716391d99317c137fb_m.jpg', '2020-04-19 14:34:44', '2020-04-19 14:34:44', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_icon` varchar(100) NOT NULL,
  `user_header_image` varchar(100) DEFAULT NULL,
  `employer` varchar(200) DEFAULT NULL,
  `alma_mater` varchar(200) DEFAULT NULL,
  `home_address` varchar(200) DEFAULT NULL,
  `birthplace` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
