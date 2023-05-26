-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: May 08, 2023 at 05:24 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_artist`
--

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `artist_id` int(11) NOT NULL,
  `artistname` varchar(40) NOT NULL,
  `artistbio` varchar(200) NOT NULL,
  `fbemail` varchar(40) NOT NULL,
  `twemail` varchar(40) NOT NULL,
  `instaemail` varchar(40) NOT NULL,
  `artistfees` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`artist_id`, `artistname`, `artistbio`, `fbemail`, `twemail`, `instaemail`, `artistfees`) VALUES
(2, 'A.R. Rehman', 'Allah Rakha Rahman is an Indian music composer, record producer, singer, songwriter, musician, multi-instrumentalist and philanthropist, popular for his works in Indian cinema;', 'ar_rahman123@.com', 'ar_rahman123@.com', 'ar_rahman123@.com', 1100),
(3, 'Kumar Sanu', 'He is known as the King of Melody in Bollywood. He is famous for singing thousands of Bollywood Hindi Super Hit songs', 'Kumari@gmail.com', 'Kumari@gmail.com', 'Kumari@gmail.com', 1000),
(4, 'Beyoncé', 'Beyoncé Giselle Knowles-Carter is an American singer, songwriter and dancer. Regarded as one of the most successful performers of her generation, she is known for her boundary-pushing artistry and voc', 'Beyoncay@gmail.com', 'Beyoncay@gmail.com', 'Beyoncay@gmail.com', 1200),
(5, 'Rihanna', 'Demi Lovato  Shawn Mendes  Rihanna Rihanna Robyn Rihanna Fenty NH is a Barbadian singer, actress, fashion designer, and businesswoman.', 'riri@gmail.com', 'riri@gmail.com', 'riri@gmail.com', 1500),
(6, 'A.R Rehman', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `parent_id`, `comment`, `sender`, `date`) VALUES
(1, 0, 'A', 'A', '2023-05-08 13:51:39'),
(2, 1, 'good', 'Abdullah', '2023-05-08 14:18:18'),
(3, 0, 'a', 'hello', '2023-05-08 14:19:28');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(255) NOT NULL,
  `eventdate` date NOT NULL,
  `stime` time NOT NULL,
  `etime` time NOT NULL,
  `location` varchar(50) NOT NULL,
  `category` varchar(20) NOT NULL,
  `fees` int(200) NOT NULL,
  `mcapacity` int(200) NOT NULL,
  `details` varchar(255) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `enrolled` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `eventdate`, `stime`, `etime`, `location`, `category`, `fees`, `mcapacity`, `details`, `artist_id`, `enrolled`) VALUES
(1, '2023-05-18', '19:00:00', '23:00:00', 'F9 Park', 'Music', 1500, 500, 'Concert', 4, 5),
(2, '2023-05-20', '14:10:00', '16:30:00', 'Auditorium', 'Poetry', 1000, 200, 'Poetry', 3, 200),
(3, '2023-05-01', '14:10:00', '16:30:00', 'Auditorium', 'Poetry', 1000, 200, 'Poetry', 3, 200),
(4, '2023-05-02', '14:10:00', '16:30:00', 'Greens avenue', 'Poetry', 1000, 200, 'Poetry', 4, 200),
(5, '2023-05-03', '14:10:00', '16:30:00', 'Murree', 'Comedy', 1000, 200, 'Poetry', 3, 200);

-- --------------------------------------------------------

--
-- Table structure for table `event_artist`
--

CREATE TABLE `event_artist` (
  `id` int(255) NOT NULL,
  `eventdate` date NOT NULL,
  `stime` time NOT NULL,
  `etime` time NOT NULL,
  `category` varchar(255) NOT NULL,
  `fees` int(200) NOT NULL,
  `mcapacity` int(200) NOT NULL,
  `artistname` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `fbemail` varchar(50) NOT NULL,
  `twemail` varchar(50) NOT NULL,
  `instaemail` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_artist`
--

INSERT INTO `event_artist` (`id`, `eventdate`, `stime`, `etime`, `category`, `fees`, `mcapacity`, `artistname`, `message`, `fbemail`, `twemail`, `instaemail`, `photo`) VALUES
(2, '2023-04-27', '03:33:00', '10:38:00', 'music', 55, 0, 'abc', 'def', 'abc', 'sdfg', 'knnknnbnbjk', ''),
(35, '0000-00-00', '00:00:00', '00:00:00', '', 0, 0, 'Hafiz sahab', '', 'abc', 'def', 'ghi', ''),
(36, '0000-00-00', '00:00:00', '00:00:00', '', 0, 0, 'hafiz', '', 'abc', 'def', 'ghi', '');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticketid` int(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `quantity` int(100) NOT NULL,
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticketid`, `email`, `quantity`, `id`) VALUES
(1, 'a@gmail.com', 5, 83),
(2, 'abd@cds.com', 50, 55),
(3, 'a@gmail.com', 5, 85),
(4, 'a@gmail.com', 900, 85),
(5, 'a@gmail.com', 7, 85),
(6, 'a@gmail.com', 11, 87),
(7, 'a@gmail.com', 2, 85),
(8, 'a@gmail.com', 4, 85),
(9, 'a@gmail.com', 200, 2),
(10, 'user@gmail.com', 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artist_ibfk_1` (`artist_id`);

--
-- Indexes for table `event_artist`
--
ALTER TABLE `event_artist`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `artistname` (`artistname`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticketid`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `artist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event_artist`
--
ALTER TABLE `event_artist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticketid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`artist_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
