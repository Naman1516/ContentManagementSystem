-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2022 at 09:19 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `repository_content`
--

CREATE TABLE `repository_content` (
  `repo_id` int(11) NOT NULL,
  `repo_doc` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `repository_details`
--

CREATE TABLE `repository_details` (
  `repo_id` int(11) NOT NULL,
  `repo_name` varchar(255) NOT NULL,
  `u_id` int(11) NOT NULL,
  `visibility` enum('true','false') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `repository_details`
--

INSERT INTO `repository_details` (`repo_id`, `repo_name`, `u_id`, `visibility`) VALUES
(2250, 'video_repository', 6, 'true'),
(3019, 'new_repository', 14, 'true'),
(7077, 'test_repository', 6, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `repository_video`
--

CREATE TABLE `repository_video` (
  `repo_id` int(11) NOT NULL,
  `repo_video` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `repository_video`
--

INSERT INTO `repository_video` (`repo_id`, `repo_video`) VALUES
(1326, 'The Breathtaking Beauty of Nature HD.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` enum('creator','guest') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `username`, `password`, `name`, `email`) VALUES
(6, 'creator', 'bishal_saha', '81dc9bdb52d04dc20036dbd8313ed055', 'Bishal Saha', 'sahabishal59@gmail.com'),
(11, 'guest', 'guest_new', '81dc9bdb52d04dc20036dbd8313ed055', 'New Guest', 'guest@gmail.com'),
(12, 'creator', 'new_user', '81dc9bdb52d04dc20036dbd8313ed055', 'New User', 'newuser@gmail.com'),
(13, 'creator', 'test_new', '81dc9bdb52d04dc20036dbd8313ed055', 'Test New', 'testnew@gmail.com'),
(14, 'creator', 'new_creator', '81dc9bdb52d04dc20036dbd8313ed055', 'New Creator', 'newcreator@gmail.com'),
(15, 'guest', 'new_guest1', '81dc9bdb52d04dc20036dbd8313ed055', 'New Guest', 'guest@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `repository_details`
--
ALTER TABLE `repository_details`
  ADD PRIMARY KEY (`repo_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
