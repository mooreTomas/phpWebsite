-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2021 at 12:59 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `Name` varchar(25) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`Name`, `Email`, `Phone`, `Message`) VALUES
('Brendan Jones', '1234@yahoo.net', '+35243217654', 'test message'),
('Thomas Moore', 'tommymoore@live.ie', '0857213618', 'wddfs');

-- --------------------------------------------------------

--
-- Table structure for table `day`
--

CREATE TABLE `day` (
  `id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `Temperature` varchar(20) NOT NULL,
  `Breakfast` varchar(20) NOT NULL,
  `Lunch` varchar(20) NOT NULL,
  `Activities` varchar(30) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `day`
--

INSERT INTO `day` (`id`, `child_id`, `Temperature`, `Breakfast`, `Lunch`, `Activities`, `date`) VALUES
(10, 7, '1', '1', '1', '1', '0001-01-01'),
(11, 7, '1', '1', '1', '11', '0001-01-01'),
(12, 8, '2', '2', '2', '2', '0222-02-02'),
(13, 20, '100', 'Cheese', 'Toast', 'Soccer', '2021-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `feature_box`
--

CREATE TABLE `feature_box` (
  `image` varchar(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `detail` varchar(20) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `link` varchar(20) NOT NULL,
  `linkText` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feature_box`
--

INSERT INTO `feature_box` (`image`, `title`, `detail`, `content`, `link`, `linkText`) VALUES
('feature1.png', 'Event', 'Pajama Day', 'Pajama day is this Friday.<br><br>  Please remember to wear regular shoes not slippers. <br> Choose jammies that are appropriate for the weather.<br> Children are permitted to bring stuffed animals however, we request that they must be able to fit in you childs backpack. <br><br>If you have any querys please don\'t hesitate to ', 'contact.php', 'let us know'),
('feature2.png', 'Hiring', 'Part-time Position', 'Are you interested in working for a dynamic & exciting company? Send your CV directly to griffithkids@gmail.com <br><br>Requirements:<br>  Candidates must have at least FETAC level 5 qualifications in early education or equivalent. <br>  Candidates must have at least one year of work experience in the early stage industry. <br>  Familiar with Aistear and Siolta stanadards, Tusla regulations, Fire and Safety along with garda vetting <br>  Have experience in planning and implementing age-appropriate courses.', '', ''),
('feature3.png', 'On the fence', 'Honest Opinions', 'If you are considering Griffith Kids but are still unsure, find out what people are saying.<br><br> Here you can view the honest feedback from our clients and get a personal insight into our company. Take a look at our ', 'testimonials.php', 'testimonials page');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `child_name` varchar(20) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `service_type` int(11) DEFAULT NULL,
  `duration` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `user_id`, `child_name`, `category`, `service_type`, `duration`) VALUES
(7, 1, 'test', 'Baby', 3, 1),
(8, 1, 'Thomas', 'Toddlers', 1, 10),
(9, 1, 'Mary', 'Baby', 1, 12),
(15, 1, 'dfsdfsdf', 'Baby', 1, 1),
(16, 1, 'test', 'Baby', 1, 1),
(17, 0, 'Thomas Moore', 'Toddlers', 1, 2),
(18, 9, 'hhh', 'Preschool', 1, 1),
(19, 9, 'Thomas Mooreggg', 'Toddlers', 1, 4),
(20, 9, 'tomtom', 'Baby', 1, 4),
(21, 9, 'george', 'Baby', 1, 1),
(22, 9, 'mark', 'Preschool', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `fee` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `fee`) VALUES
(1, 'Half day care', 140),
(2, 'Full day care', 200),
(3, 'Weekend care', 80);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `is_show` tinyint(1) DEFAULT 0,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `service_id`, `review`, `is_show`, `user_id`) VALUES
(1, 1, 'good service', 0, 8),
(2, 1, 'test', 0, 8),
(3, 1, 'test', 0, 8),
(11, 2, 'Very good service!', 0, 8),
(17, 1, 'test', 0, 2),
(18, 1, 'test', 0, 2),
(19, 1, 'test', 0, 1),
(20, 1, 'test', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `userlevel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`, `userlevel`) VALUES
(1, 'user1@gmail.com', 'user1', 'e38ad214943daad1d64c102faec29de4afe9da3d', 'Member'),
(2, 'user2@gmail.com', 'user2', 'e38ad214943daad1d64c102faec29de4afe9da3d', 'Admin'),
(3, 'public@gmail.com', 'Public User', 'f4da941f0f5b6e5ef630d7879051310adea86dab', 'Public'),
(8, 'test@gmail.com', 'test', '785c835e5a358512af0327e8f3718d7fe6cb5f7a', 'Member'),
(9, 'tommymoore@live.ie', 'TM', '38159062b0d4b13fa105e280cdd89c980705c691', 'Member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `day`
--
ALTER TABLE `day`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `day`
--
ALTER TABLE `day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
